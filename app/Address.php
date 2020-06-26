<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Email;
use App\Phonenumber;
use App\Landlord;
use App\Tenant;

class Address extends Model
{
     protected $table = 'addresses';
    protected $fillable = ['address', 'state', 'city','zip','created_at','updated_at'];

     public function tenant()
    {
        return $this->belongsToMany('App\Tenant','tenants_addresses');
    }

    public function landlord()
    {
        return $this->belongsToMany('App\Landlord','land_lords_properties','address_id','land_lord_id');
    }
}
