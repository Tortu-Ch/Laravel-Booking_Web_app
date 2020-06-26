<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\Email;
use App\Phonenumber;
use App\Address;
use App\User;


class housingAuthority extends Model
{	
	protected $table = 'housingAuthoritys';
    protected $fillable = ['contactname','contactnumber','unit','user_id','location_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function location()
    {
        return $this->belongsTo('App\Location');
    }
    public function emails()
    {
        return $this->belongsToMany('App\Email','housingAuthority_emails','housing_authority_id','email_id')->withPivot('is_primary');
    }

    public function phone_numbers()
    {
        return $this->belongsToMany('App\Phonenumber','housingAuthority_phone_numbers','housing_authority_id','phone_numbers_id')->withPivot('is_primary');
    }

    public function addresses()
    {
        return $this->belongsToMany('App\Address','housingAuthority_addresses','housing_authority_id','address_id')->withPivot('is_permanent');
    }
}


