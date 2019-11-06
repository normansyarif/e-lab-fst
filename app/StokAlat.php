<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokAlat extends Model
{
    protected $table = 'stok_alat';

    public function alat() {
    	return $this->belongsTo('App\Alat', 'id_alat');
    }

    public function user() {
    	return $this->belongsTo('App\Lokasi', 'id_pemilik');
    }

    public function kondisi_baik() {
    	return $this->hasOne('App\StokAlatBaik', 'stok_id');
    }

    public function kondisi_buruk() {
    	return $this->hasOne('App\StokAlatBuruk', 'stok_id');
    }

}
