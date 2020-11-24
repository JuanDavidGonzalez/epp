<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = 'processes';

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
