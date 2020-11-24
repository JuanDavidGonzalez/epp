<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected  $table = "activities";

    protected $fillable = ['code', 'name', 'process_id'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function risks()
    {
        return $this->belongsToMany(Risk::class);
    }
}
