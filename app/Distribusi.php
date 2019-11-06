<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    protected $table = 'distribusi';

    public function tujuan() {
    	return $this->belongsTo('App\Lokasi', 'id_tujuan');
    }

    public function alats() {
    	return $this->hasMany('App\DistribusiAlat', 'id_distribusi');
    }

    public function bahans() {
    	return $this->hasMany('App\DistribusiBahan', 'id_distribusi');
    }
}
