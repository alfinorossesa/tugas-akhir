<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table="lokasi";
    // protected $primaryKey="id";
    protected $fillable=['id','nama_lokasi','slug'];

    public function produk()
    {
        return $this->hasMany('App\Models\Produk');
    }
    
}
