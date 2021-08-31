<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Berita;
use App\Models\Katberita;
use App\Models\User;

class WebController extends Controller
{
    public function index() {
        return view('news',[
            'news' => Berita::where('status','=', 'Y')->get(),
            'kat' => Katberita::all(),
        ]);
    }
}