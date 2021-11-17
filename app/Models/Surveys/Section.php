<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['questions'];
    protected $guarded = ['id'];

    public function survey()
    {
        return $this->belongsToMany(Survey::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function getQuestions()
    {
        return $this->questions()->orderBy('order', 'asc');
    }

    public function getQuestionCountAttribute()
    {
        return $this->questions->count();
    }

    public function addQuestions(Array $questionIds)
    {
        return $this->questions()->sync($questionIds);
    }
}
