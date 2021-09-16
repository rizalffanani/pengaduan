<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\Pengurus;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if( Auth::user()->roles != 'ADMIN')
        {
        
        Alert::warning('Peringatan', 'Maaf Anda tidak punya akses');
        return back();
        }
    }

    public function index2($id)
    {
        if( Auth::user()->roles != 'ADMIN')
        {
        
        Alert::warning('Peringatan', 'Maaf Anda tidak punya akses');
        return back();
        }
        $data = DB::table('penguruses')->where('id_lembaga','=', $id)->whereNull('deleted_at')->get();
        $item = Lembaga::find($id);
        return view('pages.admin.pengurus.index',[
            'data' => $data,
            'item' => $item,
            'id_lembaga' => $id
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Pengurus::all();
        
    }
    public function create2($id)
    {
        return view('pages.admin.pengurus.create',[
            'actions' => 'pengurus.store',
            'id_lembaga' => $id
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
        'nama' => 'required|string|max:255',
        'id_lembaga' => 'required|string|max:15',
        'jabatan' => 'required|string|max:255',
        ]);

        $user = Pengurus::create([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'id_lembaga' => $request->id_lembaga,
        ]);

        Alert::success('Berhasil', 'pengurus baru ditambahkan');
        return redirect('admin/pengurus/index2/'.$request->id_lembaga);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(pengurus $pengurus)
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
        $item = Pengurus::find($id);
        return view('pages.admin.pengurus.create',[
        'item' => $item,
        'actions' => 'pengurus.update'
        ]);

    }

    public function edit2($peng,$id)
    {
        $item = Pengurus::find($id);
        return view('pages.admin.pengurus.create',[
        'item' => $item,
        'id_lembaga' => $peng,
        'actions' => 'pengurus.update'
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
        'nama' => 'required|string|max:255',
        'id_lembaga' => 'required|string|max:15',
        ]);

        $flight = Pengurus::find($id);

        $flight->nama = $request->nama;
        $flight->jabatan = $request->jabatan;
        $flight->save();
          
        Alert::success('Berhasil', 'Berita dirubah');
        return redirect('admin/pengurus/index2/'.$request->id_lembaga);
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
    public function destroy2(Request $request, $peng, $id){
        $berita = Pengurus::find($id);
        $berita->delete();

        Alert::success('Berhasil', 'Pengaduan telah di hapus');
        return redirect('admin/pengurus/index2/'.$peng);
    }
    public function destroy3($peng,$id)
    {
        $berita = Pengurus::find($id);
        $berita->delete();

        Alert::success('Berhasil', 'Pengaduan telah di hapus');
        return redirect('admin/pengurus/index2/'.$peng);
    }
}
