<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use Illuminate\Support\Facades\Log; 

class StudyController extends Controller
{
    public function index() {
        return view('index');
    }
    
    public function store(Request $request) {
       $record = new Record;
       $record->comment = $request->comment;
       $record->time = $request->hidden_time;
       $record->timestamps = false;
       return view('record',compact('record'));
    }
    
    public function restore(Request $request) {
        $record = new Record;
        $record->subject = $request->subject;
        $record->comment = $request->comment;
        $record->time = $request->hidden_time;
        $record->studied_date = $request->created_at;
        $record->timestamps = false;
        $record->save();
        return view('index',compact('record'));
    }
}
