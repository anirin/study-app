<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;
    
    public function getLists()
    {
        $professions = Profession::orderBy('id','asc')->pluck('profession', 'id');
        return $professions;
    }
    
    public function users() {
        return $this->hasMany('APP\Models\User');
    }
}
