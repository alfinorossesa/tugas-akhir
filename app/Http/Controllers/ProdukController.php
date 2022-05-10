<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Produk;
use App\Models\Lokasi;
use File;
use App\Http\Requests\ProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::latest()->paginate(10);
        $brand = Brand::all();

        return view('admin.produk.index',compact('produk','brand'));
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
        return view('admin.produk.create',compact('brand','lokasi'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
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
        
        alert()->success('Berhasil Menambahkan Produk','Sukses');
        return redirect()->route('produk.index')->with('success','berhasil');
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
        $produk = Produk::find($id);
        $brand = Brand::all();
        $lokasi = Lokasi::all();
        return view('admin.produk.edit',compact('produk','brand','lokasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukRequest $request, $id)
    {
        $produk = Produk::find($id);
        $produk->update($request->all());
        // // update foto            
        if($request->hasFile('foto_produk')){
            File::delete('img/produk/'.$produk->foto_produk);
            $foto = $request->file('foto_produk');
            $nama_foto = time()."_".$foto->getClientOriginalName();
            $foto->move('img/produk',$nama_foto);
            $produk->foto_produk = $nama_foto;
            $produk->update();            
        }

        alert()->success('Berhasil Mengupdate Produk','Sukses');
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        File::delete('img/produk/'.$produk->foto_produk);
        
        $produk->delete();
        
        alert()->success('Berhasil Hapus Produk','Sukses');
        return redirect()->route('produk.index');
    }
}