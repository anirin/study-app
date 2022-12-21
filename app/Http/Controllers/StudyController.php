<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Subject;
use Illuminate\Support\Facades\Log; 

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
        $record->save();
        return view('index',compact('record'));
    }
}
