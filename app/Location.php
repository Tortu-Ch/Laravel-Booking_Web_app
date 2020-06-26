<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Email;
use App\Phonenumber;
use App\Landlord;
use App\housingAuthority;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = ['location'];

    public function housingAuthority()
    {
        return $this->hasOne('App\housingAuthority');
    }

   
}