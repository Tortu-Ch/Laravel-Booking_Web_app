<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Mail\ResetPassword;
use Mail;
use App\Location;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'username','firstname', 'lastname', 'password','image','active','email_token','provider','provider_id','location_id','email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Set the verified status to true and make the email token null
    public function verified()
    {
       $this->active = 1;
       $this->email_token = null;
       $this->save();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $email = new ResetPassword($this,$token);
        Mail::to($this->email)->send($email);
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }


}
