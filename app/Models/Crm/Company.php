<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\IsTenantTrait as BelongsToATenant;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Company extends Model
{
    use HasFactory, BelongsToATenant, SoftDeletes;

    protected $guarded = ['id', 'company_id', 'tenant_id'];

    public const STAGES = [
      1 => 'Prospect',
      2 => 'Lead',
      3 => 'Client',
      4 => 'Closed',
   ];

    // Groups. Users can add or remove (soft delete) groups.
    // To add contacts to a group, use Group.php model
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function addGroup($groupName)
    {
        return $this->groups()->create([
            'name' => $groupName
        ]);
    }

    public function removeGroup($groupId)
    {
        return $this->groups()->find($groupId)->delete();
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public static function getStageId($stage)
    {
      return array_search($stage, self::STAGES);
    }

    public static function getStageName($stage_id)
    {
      return array_search($stage_id, self::STAGES);
    }


    // Contacts. Users can add contacts as either contacts (no status), employees or client contacts (e.g. manager or owner )
    // See Contact::TYPES constant for mapping
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    // Adds an array of contacts by ID, if they're not already added
    public function addContacts(Array $contactIds, $contactType = 1)
    {
        return $this->contacts()->syncWithoutDetaching($contactIds, ['type_id' => $contactType]);
        // return $this->contacts()->attach($contactIds);
    }

    public function removeContacts(Array $contactIds)
    {
        return $this->contacts()->detach($contactIds);
    }

    // Employees (where Contact::TYPES=2)
    public function employees()
    {
        return $this->hasMany(Contact::class)
            ->where('type_id', 2);
    }

    public function addEmployees(Array $contactIds)
    {
        return $this->addContacts($contactIds, 2);
    }

    public function removeEmployees(Array $contactIds)
    {
        return $this->removeContacts($contactIds);
    }

    // ClientContacts: Maybe a manager or owner of a busines (client) where Contact::TYPES=4)
    public function clientContacts()
    {
        return $this->hasMany(Contact::class)
            ->where('type_id', 4);
    }

    public function addClientContact(Array $contactIds)
    {
        return $this->addContacts($contactIds, 4);
    }

    public function removeClientContact(Array $contactIds)
    {
        return $this->removeContacts($contactIds);
    }

    // Surveys: A client can have many surveys
    public function surveys()
    {
        return $this->hasMany(Contact::class);
    }

    // public function addClientContact(Array $contactIds)
    // {
    //     return $this->addContacts($contactIds, 4);
    // }

    // public function removeClientContact(Array $contactIds)
    // {
    //     return $this->removeContacts($contactIds);
    // }

    // Source (i.e. where they came from)
    public function source()
    {
        return $this->hasOne(Source::class);
    }


}
