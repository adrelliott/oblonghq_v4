<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function response()
    {
        return $this>hasOne(Response::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // expecting ['value' => X, 'name' => 'fff']
    public function addAnswers(Array $answers)
    {
        return $this->answers()->createMany($answers);
    }
}
