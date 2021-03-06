<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = "positions";

    public function processes()
    {
        return $this->belongsToMany(Process::class);
    }
}
