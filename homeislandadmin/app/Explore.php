<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Explore extends Model
{
    protected $table = 'explores';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin',
        'kabupaten',
        'kategori',
        'nama_tempat',
        'open_sale',
        'lat',
        'long',
        'foto_1',
        'foto_2',
        'foto_3',
        'alamat',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'remember_token',
    ];
}
