<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $table = 'bahan';

    public function jenis() {
    	return $this->belongsTo('App\Jenis', 'id_jenis');
    }

    public function stoks() {
    	return $this->hasMany('App\StokBahan', 'id_bahan');
    }
}
