<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    public function getLists()
    {
        //orderBy　id小さい順 pluck　抽出なのでいらないかも
        $subjects = Subject::orderBy('id','asc')->pluck('subject', 'id');
        return $subjects;
    }
    
    public function records(){
        return $this->hasMany('App\Models\Record');
    }
    
    public $timestamps = false;
}
