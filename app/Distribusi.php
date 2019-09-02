<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    protected $table = 'distribusi';

    public function tujuan() {
    	return $this->belongsTo('App\User', 'id_tujuan');
    }
}
