<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_produk'=> 'required',
            'brand_id'=> 'required',
            'stok'=> 'required',
            'deskripsi'=> 'required',
            'harga'=> 'required',
            'lokasi_id'=> 'required',
            'foto_produk' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
