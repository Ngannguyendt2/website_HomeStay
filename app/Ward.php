<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function houses () {
        return $this->hasMany(House::class);
    }
}
