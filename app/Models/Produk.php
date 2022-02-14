<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table="produk";
    // protected $primaryKey="id";
    protected $fillable=['id','nama_produk','brand_id','user_id','stok','deskripsi','harga', 'lokasi_id','foto_produk'];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }

}
