<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sources extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'tenant_id'];

     /**
   * Source Types
   *
   * @var array
   */
   public const SOURCES = [
      1 => 'Paid Traffic',
      2 => 'Organic',
      3 => 'Referral',
      // 4 => 'Client',

   ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
