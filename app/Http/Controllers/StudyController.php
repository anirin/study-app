<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Subject;
use App\Models\Post;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

$now = Carbon::now();
        $today = $now->format('Y-m-d');
        $year = $now->format('Y');
        $month = $now->format('m');

class StudyController extends Controller
{
    public function index() {
        return view('index');
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
        
        return view('index',compact('record'));
    }
    
    public function result() {
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
        $record =DB::select("SELECT * FROM(
            SELECT S.user_id, max(S.time) AS time, count(A.time) + 1 AS rank FROM (
                SELECT user_id, sum(time) AS time FROM records
                GROUP BY user_id
                ORDER BY time DESC
            ) S
            LEFT JOIN (
                SELECT sum(time) AS time FROM records
                GROUP BY user_id
            ) A ON S.time < A.time
            GROUP BY S.user_id
            ORDER BY time DESC
            )C
            WHERE C.user_id = $id");
        
        //dd($record);
        $rank = $record[0];
        //dd($rank);
            
        return view('ranking',compact('comments', 'rank'));
    }
    
    public function post(Request $request) {
        $posts = new Post();
        
        $posts->user_id = \Auth::user()->id;
        $posts->comment = $request->comment;
        $posts->save();
        
        $comments = Post::orderBy('created_at', 'desc')
            ->get();
        
        return view('ranking',compact('comments'));
    }
}
