<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';

    public function bahan() {
    	return $this->hasMany('App\Bahan', 'id_jenis');
    }
}
