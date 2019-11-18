<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['approved_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function province() {
        return $this->belongsTo('App\Province');
    }

    public function district() {
        return $this->belongsTo('App\District');
    }

    public function ward() {
        return $this->belongsTo('App\Ward');
    }
}
