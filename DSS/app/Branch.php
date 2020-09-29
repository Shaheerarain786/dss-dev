<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'branch_name','branch_code','branch_manager_name', 'branch_contact_no', 'branch_it_support_name', 'branch_it_support_no','device_group_id'
    ];

    public function devices(){
        return $this->hasMany(Device::class);
    }

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }

    public function deviceGroups()
    {
       return $this->hasMany(DeviceGroup::class);
    }

    public function device_group()
    {
        return $this->hasMany(DeviceGroup::class);
    }
}
