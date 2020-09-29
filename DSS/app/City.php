<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class City extends Model
{

    protected $fillable = ['name', 'slug', 'zone_id'];

    public function zone()
    {

        return $this->belongsTo(Zone::class, 'zone_id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($attr) {
            $attr->slug = Str::slug($attr->name, '-');
        });
        static::updating(function ($attr) {
            $attr->slug = Str::slug($attr->name, '-');
        });
    }

    public function scopeIsNotAssinged($query)
    {
        return $query->where('zone_id', '=', null);
    }
}
