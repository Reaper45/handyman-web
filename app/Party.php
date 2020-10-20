<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = [
        'name', 'email'
    ];

    public function user() {
        return $this->hasOne(User::class);
    }

    //
    public function jobs() {
        return $this->hasMany(Job::class);
    }
}
