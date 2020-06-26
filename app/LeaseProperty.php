<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Email;
use App\Phonenumber;
use App\Address;
use App\Tenant;
use App\Landlord;

class LeaseProperty extends Model
{
     protected $table = 'lease_properties';
    protected $fillable = ['land_lord_id','land_lord_address_id','land_lord_email_id','land_lord_phone_id','tenant_id','tenant_address_id','tenant_email_id','tenant_phone_id','land_lords_property_id','from_date','to_date','created_at','updated_at'];

     public function landlord()
    {
        return $this->belongsTo('App\Landlord','land_lord_id');
    }

      public function tenant()
    {
        return $this->belongsTo('App\Tenant','tenant_id');
    }


    public function landlord_address()
    {
        return $this->belongsTo('App\Address','land_lord_address_id');
    }

        public function tenant_address()
    {
        return $this->belongsTo('App\Address','tenant_address_id');
    }

    public function landlord_phone()
    {
        return $this->belongsTo('App\Phonenumber','land_lord_phone_id');
    }

    public function tenant_phone()
    {
        return $this->belongsTo('App\Phonenumber','tenant_phone_id');
    }

    public function landlord_email()
    {
        return $this->belongsTo('App\Email','land_lord_email_id');
    }

    public function tenant_email()
    {
        return $this->belongsTo('App\Email','tenant_email_id');
    }

    public function landlord_property()
    {
        return $this->belongsTo('App\Address','land_lords_property_id');
    }


  
}
