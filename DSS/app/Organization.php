<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use App\Zone;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Organization extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name','slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($activity){
            $activity->slug = Str::slug($activity->name,'-');
        });

        static::updating(function ($activity){
            $activity->slug = Str::slug($activity->name,'-');
        });
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function zones(){
        return $this->hasMany(Zone::class);
    }
}
