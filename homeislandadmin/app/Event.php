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
<<<<<<< HEAD
=======
        'admin',
>>>>>>> 4c12a8ef7168df329a9fbac486402605aaf02d4f
        'judul',
        'date_start',
        'date_end',
        'deskripsi',
<<<<<<< HEAD
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
=======
        'id_line',
        'id_ig',
        'web',
        'lat',
        'long',
        'foto_1',
        'foto_2',
        'foto_3',
>>>>>>> 4c12a8ef7168df329a9fbac486402605aaf02d4f
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
