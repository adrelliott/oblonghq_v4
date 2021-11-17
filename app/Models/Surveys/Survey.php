<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['sections'];
    protected $guarded = ['id', 'tenant_id', 'client_id'];

    public function sections()
    {
        return $this->belongsToMany(Section::class)
            ->orderBy('order', 'asc');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
