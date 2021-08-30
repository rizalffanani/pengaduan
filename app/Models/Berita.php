<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'judul', 'views','artikel', 'id_kategori', 'user_id', 'created_at', 'status'
    ];

    protected $hidden = [
    
    ];

    public function kateg() {
        return $this->belongsTo(Katberita::class, 'id_kategori', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
