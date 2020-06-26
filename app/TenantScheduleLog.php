<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Address;

class TenantScheduleLog extends Model
{
    protected $table = 'inspector_schedule_history';
     protected $fillable = ['schedule_id','inspector_id','schedule_id','inspector_notes','tenant_id','land_lord_id','land_lords_property_id','status','inspection_date','created_by','updated_by','created_at','updated_at','inspection_type','address','state','city','zip'];

  
       public function inspector()
    {
        return $this->belongsTo('App\User','inspector_id');
    }

      public function landlord()
    {
        return $this->belongsTo('App\Landlord','land_lord_id');
    }   

      public function tenant()
    {
        return $this->belongsTo('App\Tenant','tenant_id');
    }

    public function landlord_property()
    {
        return $this->belongsTo('App\Address','land_lords_property_id');
    }

      public function inspection_form()
    {
        return $this->hasOne('App\InspectionFormLog','inspector_schedule_id');
    }

         public function leaseaddresses()
    {
        return $this->belongsTo('App\Address','lease_address_id');
    }
    
}
