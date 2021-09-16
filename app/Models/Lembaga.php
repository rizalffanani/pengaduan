<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lembaga extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'id', 'nama_lembaga'
    ];

    protected $hidden = [
    
    ];

    public function peng(){
        return $this->hasMany(Pengurus::class, 'id', 'id');
    }
}


