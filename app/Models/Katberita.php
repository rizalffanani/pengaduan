<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katberita extends Model
{
    use HasFactory;

    public function ketegoris(){
        return $this->hasMany(Berita::class, 'id', 'id');
    }
}


