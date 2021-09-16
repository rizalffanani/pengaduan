<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Katpeng;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class KatpengController extends Controller
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

        $data = Katpeng::all();
        return view('pages.admin.katpeng.index',[
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
        return view('pages.admin.katpeng.create',[
            'actions' => 'katpeng.store'
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

        $user = Katpeng::create([
        'kategori' => $request->kategori,
        ]);

        Alert::success('Berhasil', 'Kategori baru ditambahkan');
        return redirect('admin/katpeng');
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
        $item = Katpeng::find($id);
        return view('pages.admin.katpeng.create',[
        'item' => $item,
        'actions' => 'katpeng.update'
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

        $flight = Katpeng::find($id);
        $flight->kategori = $request->kategori;
        $flight->save();
          
        Alert::success('Berhasil', 'Kategori dirubah');
        return redirect('admin/katpeng');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Katpeng::find($id);
        $berita->delete();

        Alert::success('Berhasil', 'Kategori telah di hapus');
        return redirect('admin/katpeng');
    }
}
