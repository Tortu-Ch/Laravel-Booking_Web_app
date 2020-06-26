<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Email;
use App\Address;
use App\Landlord;
use App\Tenant;

class Phonenumber extends Model
{
    protected $table = 'phone_numbers';
     protected $fillable = ['phone_number','created_at','updated_at'];

      public function tenant()
    {
        return $this->belongsToMany('App\Tenant','tenants_phone_numbers');
    }

    public function landlord()
    {
        return $this->belongsToMany('App\Landlord','land_lords_phone_numbers');
    }

  
}
