<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DeviceGroup extends Model
{
    protected $fillable = ['name', 'slug', 'device'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($activity) {
            $activity->slug = Str::slug($activity->name, '-');
        });

        static::updating(function ($activity) {
            $activity->slug = Str::slug($activity->name, '-');
        });
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function devices(){
        return $this->hasMany(Device::class);
    }

    public function scopeIsNotAssinged($query){
        return $query->where('branch_id','=', null);
    }
}
