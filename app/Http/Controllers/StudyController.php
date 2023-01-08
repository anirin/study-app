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


class StudyController extends Controller
{
    public function login() {
        
        return view('login');
    }
    public function index() {
        $id = \Auth::user()->id;
        $user = User::find($id);
        
        return view('index', compact('user'));
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
        $record = new Record;
        $record->subject_id = $request->subject_id;
        $record->comment = $request->comment;
        $record->time = $request->hidden_time;
        $record->studied_date = $request->created_at;
        $record->timestamps = false;
        $record->user_id = \Auth::id();
        $record->save();
        
        //return view('index',compact('record'));
        return redirect()->route('study.index');
    }
    
    public function result() {
        
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
        
        return view('result', compact('today_time', 'month_time'));
    }
    
    public function comment(Post $post) {
        $comments = Post::orderBy('created_at', 'desc')
            ->get();
        $id = \Auth::user()->id;
        $now = Carbon::now();
        $today = $now->format('Y-m-d');
        $tomorrow = $now->modify('+1 days')->format('Y-m-d');
        $records = DB::select("
            SELECT * FROM(
            SELECT S.user_id, max(S.time) AS time, count(A.time) + 1 AS rank FROM (
                SELECT user_id, sum(time) AS time 
                FROM records
                WHERE studied_date >= '$today'
                AND studied_date <= '$tomorrow'
                GROUP BY user_id
                ORDER BY time DESC
            ) S
            LEFT JOIN (
                SELECT sum(time) AS time 
                FROM records
                WHERE studied_date = '$today'
                AND studied_date <= '$tomorrow'
                GROUP BY user_id
            ) A ON S.time < A.time
            GROUP BY S.user_id
            ORDER BY time DESC
            )C
            WHERE C.user_id = $id
            ");
        
        return view('ranking', compact('comments', 'records'));
    }
    
    public function post(Request $request) {
        $posts = new Post();
        
        $posts->user_id = \Auth::user()->id;
        $posts->comment = $request->comment;
        $posts->save();
        
        $comments = Post::orderBy('created_at', 'desc')
            ->get();
        
        return view('ranking', compact('comments'));
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
        
        return redirect()->route("study.show_setting");
    }
}
