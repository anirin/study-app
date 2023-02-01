<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Subject;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class StudyController extends Controller
{
    public function login() {
        return view('login');
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('study.index');
     }
    
    public function index() {
        if(Auth::check()) {
            $id = \Auth::user()->id;
            $user = User::find($id);
        } else {
            return view('guestindex');
        }
        
        $now = Carbon::now();
        $today = $now->format('Y-m-d');
        $year = $now->format('Y');
        $month = $now->format('m');
        
        $today_time = DB::table('records')
            ->where('user_id', \Auth::user()->id)
            ->whereDate('studied_date', $today)
            ->get()
            ->sum('time');
            
        $month_time = DB::table('records')
            ->where('user_id', \Auth::user()->id)
            ->whereYear('studied_date', $year)
            ->whereMonth('studied_date', $month)
            ->get()
            ->sum('time');
        
        $id = \Auth::user()->id;
        $tomorrow = $now->modify('+1 days')->format('Y-m-d');
        $records = DB::select("
        SELECT * FROM(
            SELECT user_id, time, RANK() OVER(ORDER BY time DESC) AS rank FROM(
                SELECT user_id, sum(time) AS time FROM records 
                WHERE studied_date >= '$today' AND studied_date <= '$tomorrow'
                GROUP BY user_id 
            ) AS rank_table
        )C
        WHERE C.user_id = $id
        ");
        
        $all_users = DB::select("
            SELECT COUNT(*) AS count FROM (
                SELECT * FROM records
                WHERE studied_date >= '$today' AND studied_date <= '$tomorrow'
                GROUP BY user_id
            ) AS all_users
        ");
       
        return view('index', compact('user', 'today_time', 'month_time', 'records', 'all_users'));
    }
    
    public function store(Request $request) {
        $subject = new Subject;
        $subjects = $subject->getLists();
        
        $record = new Record;
        $record->comment = $request->comment;
        $record->time = $request->hidden_time;
        $record->timestamps = false;
        
        return view('record',compact('record', 'subjects'));
    }
    
    public function restore(Request $request) {
        $now = Carbon::now();
        $today = $now->format('Y-m-d');
        // $subject = Subject::find($request->subject_id);
        // ->where('subject');
        $subject = Subject::where('id', $request->subject_id)
            ->first(['subject']);
        
        
        $validated = $request->validate([
            'comment' => 'required|max:255',
        ]);
        
        $record = new Record;
        $record->subject_id = $request->subject_id;
        $record->comment = $request->comment;
        $record->time = $request->hidden_time;
        $record->studied_date = $today;
        $record->timestamps = false;
        $record->user_id = \Auth::id();
        $record->save();
        
        $schedule = new Schedule;
        $schedule->start_date = $today;
        $schedule->end_date = $today;
        $schedule->event_name = "{$request->calendar_time} : {$subject->subject} : {$request->comment}";
        $schedule->user_id = \Auth::id();
        $schedule->save();
        
        return redirect()->route('study.index');
    }
    
    public function show_setting() {
        $id = \Auth::user()->id;
        $setting = User::find($id);
        
        return view('setting', compact('setting'));
    }
    
    public function setting(Request $request) {
        $id = \Auth::user()->id;
        
        $setting = User::find($id);
        $setting->study_time = $request->study_time;
        $setting->rest_time = $request->rest_time;
        $setting->save();
        
        return redirect()->route("study.index");
    }
}
