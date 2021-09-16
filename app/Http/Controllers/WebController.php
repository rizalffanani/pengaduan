<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Berita;
use App\Models\Katberita;
use App\Models\User;
use App\Models\Lembaga;
use App\Models\Pengurus;

class WebController extends Controller
{
    public function index() {
        return view('news',[
            'news' => Berita::where('status','=', 'Y')->get(),
            'kat' => Katberita::all(),
        ]);
    }

    public function index2() {
        return view('news2',[
            'lem' => Lembaga::all(),
            'peng' => Pengurus::all(),
        ]);
    }
}