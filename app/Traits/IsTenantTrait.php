<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Scopes\ConstrainByTenantIdScope;
use App\Models\Admin\Tenant;

trait IsTenantTrait
{
    // include the boot method that contains the scope
    protected static function booted()
    {
        // Don't apply to seeding!
        if (Auth::check()) {
            static::addGlobalScope(new ConstrainByTenantIdScope);

            static::creating(function ($model) {
                $model->tenant_id = Auth::user()->tenant_id;
            });
        }
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
