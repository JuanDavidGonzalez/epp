<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "items";

    protected  $fillable = ['code', 'name', 'img', 'rule', 'specification'];

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }
}
