<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Email;
use App\Phonenumber;
use App\Address;
use App\Tenant;

class Landlord extends Model
{
    protected $table = 'land_lords';
    protected $fillable = ['firstname', 'lastname', 'created_by','created_at','updated_at','deleted_at'];

    protected $date = ['deleted_at'];

     public function emails()
    {
        return $this->belongsToMany('App\Email','land_lords_emails','land_lord_id','email_id')->withPivot('is_primary')->withTimestamps();
    }

       public function phone_numbers()
    {
        return $this->belongsToMany('App\Phonenumber','land_lords_phone_numbers','land_lord_id','phone_numbers_id')->withPivot('is_primary')->withTimestamps();
    }

       public function addresses()
    {
        return $this->belongsToMany('App\Address','land_lords_properties','land_lord_id','address_id')->withPivot('is_permanent')->withTimestamps();
    }

       public function permanentaddresses()
    {
        return $this->belongsToMany('App\Address','land_lords_properties','land_lord_id','address_id')->wherePivot('is_permanent', 1);
    }

       public function primary_phone_number()
    {
        return $this->belongsToMany('App\Phonenumber','land_lords_phone_numbers','land_lord_id','phone_numbers_id')->wherePivot('is_primary', 1);
    }

       public function primary_phone_email()
    {
         return $this->belongsToMany('App\Email','land_lords_emails','land_lord_id','email_id')->wherePivot('is_primary', 1);
    }

       public function properties()
    {
        return $this->belongsToMany('App\Address','land_lords_properties','land_lord_id','address_id')->wherePivot('is_permanent', 0);
    }

     public function fullName() {
        return ucfirst($this->firstname) . ' ' . ucfirst($this->lastname);
    }
}
