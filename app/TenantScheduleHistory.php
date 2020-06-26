<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Address;

class TenantScheduleHistory extends Model
{
    protected $table = 'tenant_schedule_history';
    protected $fillable = ['tenant_id', 'address_id','schedule_id','status','comment','created_at','updated_at','misc_comment'];

  
        public function leaseaddresses()
    {
        return $this->belongsTo('App\Address','address_id');
    }

     
    
}
