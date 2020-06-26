<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Email;
use App\Phonenumber;
use App\Address;
use App\Landlord;
use App\ScheduleInspection;

class Tenant extends Model
{
    protected $table = 'tenants';
    protected $fillable = ['firstname', 'lastname','caseworker','created_by','created_at','updated_at','deleted_at'];

    protected $date = ['deleted_at'];

     public function emails()
    {
        return $this->belongsToMany('App\Email','tenants_emails','tenant_id','email_id')->withPivot('is_primary');
    }

      public function phone_numbers()
    {
        return $this->belongsToMany('App\Phonenumber','tenants_phone_numbers','tenant_id','phone_numbers_id')->withPivot('is_primary');
    }

       public function addresses()
    {
        return $this->belongsToMany('App\Address','tenants_addresses','tenants_id','address_id')->withPivot('is_permanent');
    }

    //   public function leaseaddresses()
    // {
    //     return $this->belongsToMany('App\Address','tenants_addresses','tenants_id','address_id')->wherePivot('is_permanent',0);
    // }

        public function permanentaddresses()
    {
        return $this->belongsToMany('App\Address','tenants_addresses','tenants_id','address_id')->wherePivot('is_permanent', 1);
    }
       public function propertyaddress()
    {
        return $this->belongsToMany('App\Address','tenants_addresses','tenants_id','address_id')->wherePivot('is_permanent', 0);
    }

    public function shedule_data()
    {
        return $this->hasOne('App\ScheduleInspection','tenant_id');
    }
}
