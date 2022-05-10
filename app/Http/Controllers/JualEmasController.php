<?php

namespace App\Http\Controllers;

use App\Http\Requests\JualEmasRequest;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Brand;
use App\Models\Lokasi;

class JualEmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        $brand = Brand::all();
        $lokasi = Lokasi::all();

        return view('client.jualemas',compact('produk','brand','lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
        $lokasi = Lokasi::all();
        return view('client.jualemas',compact('brand','lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JualEmasRequest $request)
    {
        $foto = $request->file('foto_produk');
        $nama_foto = time()."_".$foto->getClientOriginalName();
        $foto->move('img/produk',$nama_foto);
     
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'brand_id' => $request->brand_id,
            'user_id' => auth()->user()->id,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'harga'=> $request->harga,
            'lokasi_id' => $request->lokasi_id,
            'foto_produk' => $nama_foto
        ]);

        return redirect('produk')->with('sukses', 'Data Produk Berhasil Ditambahkan');
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
        //
    }
}
