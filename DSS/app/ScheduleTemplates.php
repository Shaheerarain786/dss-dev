<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleTemplates extends Model
{
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'logo',
        'video',
        'ticker'
    ];

    public function devices(){
        return $this->belongsTo(Device::class,'device_id');
    }
}
