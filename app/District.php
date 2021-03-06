<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function wards() {
        return $this->hasMany(Ward::class);
    }

    public function houses(){
        $this->hasMany(House::class);
    }
}
