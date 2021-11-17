<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'contact_id'];

    public function contact()
    {
        return $this->HasOne(Contact::class);
    }

    public function question()
    {
        return $this->HasOne(Question::class);
    }
}
