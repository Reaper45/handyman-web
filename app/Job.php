<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // Handyman
    public function handyman() {
        return $this->hasOne(Party::class, 'id', 'assigned_to');
    }

    // Creator of the job
    public function creator() {
        return $this->belongsTo(Party::class, 'created_by');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function service() {
        return $this->belongsTo(Service::class);
    }
}
