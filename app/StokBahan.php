<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokBahan extends Model
{
    protected $table = 'stok_bahan';

    public function bahan() {
    	return $this->belongsTo('App\Bahan', 'id_bahan');
    }

    public function user() {
    	return $this->belongsTo('App\Lokasi', 'id_pemilik');
    }

    public function kondisi_baik() {
    	return $this->hasOne('App\StokBahanBaik', 'stok_id');
    }

    public function kondisi_buruk() {
    	return $this->hasOne('App\StokBahanBuruk', 'stok_id');
    }
}
