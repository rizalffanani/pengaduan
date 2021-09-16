<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengurus extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'nama', 'jabatan','id_lembaga', 'created_at'
    ];

    protected $hidden = [
    
    ];

    public function lbg() {
        return $this->belongsTo(Lembaga::class, 'id_lembaga', 'id');
    }

}
