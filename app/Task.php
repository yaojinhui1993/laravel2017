<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function isComplete()
    {
        return false;
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', false);
    }
}
