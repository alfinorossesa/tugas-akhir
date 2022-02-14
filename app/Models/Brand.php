<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Brand extends Model
{
    protected $table="brand";
    // protected $primaryKey="id";
    protected $fillable=['id','nama','slug'];

    public function produk()
    {
        return $this->hasMany('App\Models\Produk');
    }
    
}
