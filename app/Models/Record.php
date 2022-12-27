<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Record extends Model
{
    use HasFactory;
    
    protected $dates = [
        'studied_date'
        ];
    //seeder update_at null 回避
    public $timestamps = false;
    
    public function subject() {
        return this->hasOne('App\Models\Subject');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
