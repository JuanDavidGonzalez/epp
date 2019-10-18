<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = "requests";

    protected  $fillable = ['user_id', 'activity_id'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
