<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Phonenumber;
use App\Address;
use App\Landlord;
use App\Tenant;

class Email extends Model
{
    protected $table = 'emails';
    protected $fillable = ['email','created_at','updated_at'];

     public function tenant()
    {
        return $this->belongsToMany('App\Tenant','tenants_emails');
    }

    public function landlord()
    {
        return $this->belongsToMany('App\Landlord','land_lords_emails');
    }
}
