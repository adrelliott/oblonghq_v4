<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'company_id'];

    public function members()
    {
        return $this->belongsToMany(Contact::class);
    }

    public function addMembers($contactIds)
    {
        return $this->members()->attach($contactIds);
    }

    public function removeMembers($contactIds)
    {
        return $this->members()->detach($contactIds);
    }

    public function syncMembers($contactIds)
    {
        return $this->members()->sync($contactIds);
    }
}

