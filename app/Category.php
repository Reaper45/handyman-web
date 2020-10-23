<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function jobs() {
        return $this->hasMany(Jobs::class);
    }

    public function services() {
        return $this->hasMany(Service::class);
    }
}
