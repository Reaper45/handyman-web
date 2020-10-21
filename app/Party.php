<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = [
        'name', 'email', 'phone_number'
    ];

    public function user() {
        return $this->hasOne(User::class);
    }

    //
    public function jobs() {
        return $this->hasMany(Job::class);
    }

    //
    public function categories()
    {
        # code...
        return $this->belongsToMany(Category::class, 'party_categories', 'party_id', 'category_id');

    }
}
