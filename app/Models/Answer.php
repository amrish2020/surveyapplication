<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer'];

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'question_answer')->withTimestamps();
    }
}
