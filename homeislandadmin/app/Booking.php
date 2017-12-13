<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_booking',
        'total_price',
        'id_user',
        'id_homestay',
        'id_user',
        'status',
        'nama_pemesan',
        'nama_homestay',
        'date_checkin',
        'sum_menginap',
        'sum_room'    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
