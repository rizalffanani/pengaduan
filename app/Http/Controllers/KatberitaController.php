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

class KatberitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::user()->roles != 'ADMIN'){
            Alert::warning('Peringatan', 'Maaf Anda tidak punya akses');
            return back();
        }

        $data = Katberita::all();
        return view('pages.admin.kategori.index',[
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
        return view('pages.admin.kategori.create',[
            'items' => $data,
            'actions' => 'kategori.store'
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
        'kategori' => 'required|string|max:35',
        ]);

        $user = $request->all();

        $user = Katberita::create([
        'kategori' => $request->kategori,
        ]);

        Alert::success('Berhasil', 'Kategori baru ditambahkan');
        return redirect('admin/kategori');
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
        $item = Katberita::find($id);
        return view('pages.admin.kategori.create',[
        'item' => $item,
        'actions' => 'kategori.update'
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
        'kategori' => 'required|string|max:50',
        ]);

        $flight = Katberita::find($id);
        $flight->kategori = $request->kategori;
        $flight->save();
          
        Alert::success('Berhasil', 'Kategori dirubah');
        return redirect('admin/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Katberita::find($id);
        $berita->delete();

        Alert::success('Berhasil', 'Kategori telah di hapus');
        return redirect('admin/kategori');
    }
}
