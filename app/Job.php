<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // Handyman
    public function handyman() {
        return $this->hasOne(Party::class, 'foreign_key', 'assign_to_id');
    }

    // Cretor of the job
    public function creator() {
        return $this->belongTo(Party::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
}
