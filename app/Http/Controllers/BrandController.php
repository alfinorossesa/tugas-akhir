<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::paginate(10);
        return view('admin.brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'nama'=> 'required'
        ]);

        Brand::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-')
        ]);

        alert()->success('Berhasil Menambah Brand','Sukses');
        return redirect()->route('brand.index')->with('sukses', 'Data Brand Berhasil Ditambahkan');
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
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
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
        $this->validate($request, [
            'nama'=> 'required'
        ]);

        $brand = Brand::find($id);
        $brand->update($request->all());

        alert()->success('Berhasil Mengupdate Brand','Sukses');
        return redirect()->route('brand.index')->with('sukses', 'Data Brand Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        $brand->delete();

        alert()->success('Berhasil Hapus Brand','Sukses');
        return redirect()->route('brand.index')->with('sukses','Data Brand Berhasil Dihapus');
    }
}
