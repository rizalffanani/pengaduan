<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Katberita extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'id', 'kategori'
    ];

    protected $hidden = [
    
    ];

    public function ketegoris(){
        return $this->hasMany(Berita::class, 'id', 'id');
    }
}


