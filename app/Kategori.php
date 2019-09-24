<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    public function alat() {
    	return $this->hasMany('App\Alat', 'id_kategori');
    }
}
