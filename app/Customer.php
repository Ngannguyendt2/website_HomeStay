<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['phone'];
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function houses()
    {
        return $this->belongsToMany('App\House', 'orders');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
