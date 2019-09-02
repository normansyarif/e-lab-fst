<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';

    public function kategori() {
    	return $this->belongsTo('App\Kategori', 'id_kategori');
    }

    public function stoks() {
    	return $this->hasMany('App\StokAlat', 'id_alat');
    }

}
