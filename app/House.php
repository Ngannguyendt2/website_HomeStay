<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class House extends Model
{
    protected $fillable = ['approved_at'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function ward()
    {
        return $this->belongsTo('App\Ward');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function customers()
    {
        return $this->belongsToMany('App\Customer', 'orders');
    }
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
