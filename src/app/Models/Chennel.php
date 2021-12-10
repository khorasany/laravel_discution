<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chennel extends Model
{
    use HasFactory;

    public function threads() {
        return $this->hasMany(Thread::class);
    }
}
