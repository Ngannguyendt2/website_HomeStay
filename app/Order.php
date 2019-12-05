<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = ['approved_at'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function house()
    {
        return $this->belongsTo('App\House');
    }
}
