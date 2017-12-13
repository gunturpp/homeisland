<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin',
        'judul',
        'date_start',
        'date_end',
        'deskripsi',
        'id_line',
        'id_ig',
        'web',
        'lat',
        'long',
        'foto_1',
        'foto_2',
        'foto_3',
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
