<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'client_id'];

    /**
   * Contact Types
   *
   * @var array
   */
   public const TYPES = [
      1 => 'Contact',
      2 => 'Employee',
      3 => 'Manager',
      4 => 'Client',
      // Add more here - high values = more access
   ];

   /**
   * returns the id of a given type  //  Does this need ot be static?
   *
   * @param string $type  contact's type
   * @return int typeId
   */
   public static function getTypeId($type)
   {
      return array_search($type, self::TYPES);
   }

   /**
   * get contact's type
   */
   public function getTypeAttribute()
   {
      return self::TYPES[ $this->attributes['type_id'] ];
   }

   /**
   * set contact's type
   */
   public function setTypeAttribute($value)
   {
      $typeId = self::getTypeId($value);
      if ($typeId) {
         $this->attributes['type_id'] = $typeId;
      }
   }


}