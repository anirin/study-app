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
        
    
    
    public function subject() {
        return this->hasOne('App/Models/Subject');
    }
}
