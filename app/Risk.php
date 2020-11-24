<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    protected $table = 'risks';

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }
}
