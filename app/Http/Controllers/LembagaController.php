<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Lembaga;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LembagaController extends Controller
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

        $data = Lembaga::all();
        return view('pages.admin.lembaga.index',[
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
        $data = Lembaga::all();
        return view('pages.admin.lembaga.create',[
            'items' => $data,
            'actions' => 'lembaga.store'
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
        'nama_lembaga' => 'required|string|max:35',
        ]);

        $user = $request->all();

        $user = Lembaga::create([
        'nama_lembaga' => $request->nama_lembaga,
        ]);

        Alert::success('Berhasil', 'lembaga baru ditambahkan');
        return redirect('admin/lembaga');
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
        $item = Lembaga::find($id);
        return view('pages.admin.lembaga.create',[
        'item' => $item,
        'actions' => 'lembaga.update'
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
        'nama_lembaga' => 'required|string|max:50',
        ]);

        $flight = Lembaga::find($id);
        $flight->nama_lembaga = $request->nama_lembaga;
        $flight->save();
          
        Alert::success('Berhasil', 'lembaga dirubah');
        return redirect('admin/lembaga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Lembaga::find($id);
        $berita->delete();

        Alert::success('Berhasil', 'lembaga telah di hapus');
        return redirect('admin/lembaga');
    }
}
