<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    protected $table = 'souvenirs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin', 'nama_toko', 'foto', 'alamat', 'lang', 'long'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
