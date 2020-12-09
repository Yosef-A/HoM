<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hive extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
