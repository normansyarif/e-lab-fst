<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanMasuk extends Model
{
    protected $table = 'bahan_masuk';

    public function user() {
    	return $this->belongsTo('App\Lokasi', 'id_user');
    }

    public function bahan() {
    	return $this->belongsTo('App\Bahan', 'id_bahan');
    }
}
