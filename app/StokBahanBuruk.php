<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokBahanBuruk extends Model
{
    protected $table = 'stok_bahan_buruk';

    public function stok() {
    	return $this->belongsTo('App\StokBahan', 'stok_id');
    }
}
