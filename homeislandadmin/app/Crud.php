<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{    
    protected $table = 'cruds';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */        
    protected $fillable = [
        'name',
         'email',
          'password',
           'handphone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password', 'remember_token',
    ];
 
}
