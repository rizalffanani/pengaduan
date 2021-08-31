<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Katberita;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::user()->roles != 'ADMIN')
        {
        
        Alert::warning('Peringatan', 'Maaf Anda tidak punya akses');
        return back();
        }

        $data = Berita::all();
        return view('pages.admin.berita.index',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Katberita::all();
        return view('pages.admin.berita.create',[
            'items' => $data,
            'actions' => 'berita.store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'judul' => 'required|string|max:50',
        'kategori' => 'required|string|max:15',
        'artikel' => 'required|string|max:255',
        'status' => 'required|string|max:15',
        ]);

        $user = $request->all();
        if($request->hasFile('image')){ 
            $foto = $request->file('image')->store('assets/berita', 'public');
        }else{
            $foto = "assets/berita/news.png";
        }
        $user = Berita::create([
        'judul' => $request->judul,
        'id_kategori' => $request->kategori,
        'artikel' => $request->artikel,
        'status' => $request->status,
        'user_id' => $request->id_user,
        'image' => $foto,
        ]);

        Alert::success('Berhasil', 'Berita baru ditambahkan');
        return redirect('admin/berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Berita::find($id);
        $data = Katberita::all();
        return view('pages.admin.berita.create',[
        'item' => $item,
        'items' => $data,
        'actions' => 'berita.update'
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'judul' => 'required|string|max:50',
        'kategori' => 'required|string|max:15',
        'artikel' => 'required|string|min:5',
        'status' => 'required|string|max:15',
        ]);

        $flight = Berita::find($id);

        $flight->judul = $request->judul;
        $flight->id_kategori = $request->kategori;
        $flight->artikel = $request->artikel;
        $flight->status = $request->status;
        $flight->user_id = $request->id_user;
        if($request->hasFile('image')){ 
            $flight->image = $request->file('image')->store('assets/berita', 'public');
        }
        $flight->save();
          
        Alert::success('Berhasil', 'Berita dirubah');
        return redirect('admin/berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();

        Alert::success('Berhasil', 'Pengaduan telah di hapus');
        return redirect('admin/berita');
    }
}
