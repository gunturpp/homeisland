<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','kabupaten','nama_homestay',  'harga', 'kuota', 'lat', 'long', 'foto_1', 'foto_2', 'foto_3'
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
