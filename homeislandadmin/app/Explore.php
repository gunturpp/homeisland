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
        'category',
        'nama_tempat',
        'open_sale_hour',
        'open_sale_minute',
        'close_sale_hour',
        'close_sale_minute',
        'alamat',
        'lat',
        'long',
        'foto_1',
        'foto_2',
        'foto_3'
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
