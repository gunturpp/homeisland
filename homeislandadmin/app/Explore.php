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
        'nama_wisata',
        'foto',
        'alamat',
        'lang',
        'long',
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
