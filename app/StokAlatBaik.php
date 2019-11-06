<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokAlatBaik extends Model
{
    protected $table = 'stok_alat_baik';

    public function stok() {
    	return $this->belongsTo('App\StokAlat', 'stok_id');
    }
}
