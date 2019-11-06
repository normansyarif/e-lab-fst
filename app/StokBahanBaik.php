<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokBahanBaik extends Model
{
    protected $table = 'stok_bahan_baik';

    public function stok() {
    	return $this->belongsTo('App\StokBahan', 'stok_id');
    }
}
