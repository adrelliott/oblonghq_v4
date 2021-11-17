<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['sections'];
    protected $guarded = ['id', 'tenant_id', 'company_id'];

    public function sections()
    {
        return $this->belongsToMany(Section::class)
            ->orderBy('order', 'asc');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
