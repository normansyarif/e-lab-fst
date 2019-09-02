<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokAlat extends Model
{
    protected $table = 'stok_alat';

    public function alat() {
    	return $this->belongsTo('App\Alat', 'id_alat');
    }

}
