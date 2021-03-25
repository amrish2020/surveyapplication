<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question'];

    public function surveys()
    {
        return $this->belongsToMany('App\Models\Survey', 'survey_question')->withTimestamps();
    }

    public function answers()
    {
        return $this->belongsToMany('App\Models\Answer', 'question_answer')->withTimestamps();
    }

}
