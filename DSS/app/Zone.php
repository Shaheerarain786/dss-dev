<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Organization;

class Zone extends Model
{
    protected $fillable = ['name','organization_id','slug'];

    public static  function boot()
    {
        parent::boot();

        static::creating(function ($attr) {
            $attr->slug = Str::slug($attr->name,'-');
        });
        static::updating(function ($attr) {
            $attr->slug = Str::slug($attr->name, '-');
        });
    }

    public function organization(){

        return $this->belongsTo(Organization::class, 'organization_id');

    }

    public function cities(){
        return $this->hasMany(City::class);
    }
}
