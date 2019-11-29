<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Post extends Model
{
    //
    protected $fillable = ['body','house_id','user_id'];
    use Rateable;

    public function house()
    {
        return $this->belongsTo('App\House');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
