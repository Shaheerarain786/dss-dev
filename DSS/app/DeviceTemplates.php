<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DeviceTemplates extends Model
{
    public function device(){
        $this->belongsTo(Device::class);
    }
}
