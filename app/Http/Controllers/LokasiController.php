<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasi = Lokasi::paginate(10);
        return view('admin.lokasi.lokasi',compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_lokasi'=> 'required'
        ]);

        Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'slug' => Str::slug($request->nama_lokasi, '-')
        ]);

        alert()->success('Berhasil Menambahkan Lokasi','Sukses');
        return redirect()->route('lokasi.index')->with('sukses', 'Data Brand Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::find($id);

        $lokasi->delete();

        alert()->success('Berhasil Hapus Lokasi','Sukses');
        return redirect()->route('lokasi.index')->with('sukses','Data Brand Berhasil Dihapus');
    }
}
