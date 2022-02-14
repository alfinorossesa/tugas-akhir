<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Brand;
use App\Models\Lokasi;
use File;
use Auth;

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
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_produk'=> 'required',
            'brand_id'=> 'required',
            'stok'=> 'required',
            'deskripsi'=> 'required',
            'harga'=> 'required',
            'lokasi_id'=> 'required',
            'foto_produk' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
     
        $userId = Auth::user()->id;
        
        $foto = $request->file('foto_produk');
        $nama_foto = time()."_".$foto->getClientOriginalName();
        $foto->move('img/produk',$nama_foto);
     
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'brand_id' => $request->brand_id,
            'user_id' => $userId,
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
