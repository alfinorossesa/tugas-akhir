<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Brand;
use App\Models\Lokasi;
use App\User;

class ProdukClientController extends Controller
{
    public function client()
    {
        $produk = Produk::latest()->paginate(20);
        $listBrand = Brand::all();

        return view('client.produk',compact('produk','listBrand'));
    }

    public function showBrand($brand)
    {
        $filterBrand = Brand::where('slug',$brand)->first();
        $brandId = $filterBrand->id;
        $listBrand = Brand::all();
        $produk = Produk::where('brand_id',$brandId)->paginate(20);

        $stok = Produk::where('brand_id',$brandId)->count();
         
        return view('client.produk', compact( 'produk', 'listBrand','stok'));
         
     }

     public function showDetail($id)
    {
        $produk = Produk::find($id);
        return view('client.detailproduk', compact('produk'));
    }

    public function beliSekarang($id)
    {
        $produk = Produk::find($id);
        $user = User::all();
        return view('client.belisekarang', compact('produk','user'));
    }

    public function aturLokasi($lokasi)
    {
        $filterLokasi = Lokasi::where('slug',$lokasi)->first();
        $lokasiId = $filterLokasi->id;
        $aturLokasi = Lokasi::all();
        $listBrand = Brand::all();
        $produk = Produk::where('lokasi_id',$lokasiId)->paginate(20);
        $stok = Produk::where('lokasi_id',$lokasiId)->count();
         
        return view('client.produk', compact( 'produk', 'aturLokasi', 'listBrand','stok'));
         
     }
}
