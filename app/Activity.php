<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected  $table = "activities";

    protected $fillable = ['code', 'name'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
