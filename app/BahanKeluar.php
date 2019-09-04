<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanKeluar extends Model
{
    protected $table = 'bahan_keluar';

    public function bahan() {
    	return $this->belongsTo('App\Bahan', 'id_bahan');
    }

    public function tujuan() {
    	return $this->belongsTo('App\User', 'id_tujuan');
    }
}
