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
        'judul',
        'deskripsi',
        'foto_1',
        'foto_2',
        'foto_3',
        'lat',
        'long',
        'web',
        'id_ig',
        'id_line',
        'date_start',
        'date_end',
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
