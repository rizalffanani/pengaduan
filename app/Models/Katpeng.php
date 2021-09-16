<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Katpeng extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'id', 'kategori'
    ];

    protected $hidden = [
    
    ];

    public function ketegoris(){
        return $this->hasMany(Pengaduan::class, 'id', 'id');
    }
}


