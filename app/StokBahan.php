<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokBahan extends Model
{
    protected $table = 'stok_bahan';

    public function user() {
    	return $this->belongsTo('App\User', 'id_pemilik');
    }
}
