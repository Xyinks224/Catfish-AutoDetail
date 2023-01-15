<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable =[
        'customer_id',
        'crew_id',
        'merk',
        'model',
        'type',
        'year',
        'km',
        'received_date',
        'vehicle_equipment',
        'exterior_front',
        'back_exterior',
        'exterior_front_right',
        'exterior_front_left',
        'exterior_back_right',
        'exterior_back_left',
        'interior_dashboard',
        'interior_spedometer',
        'interior_front_seat',
        'interior_back_seat',
        'interior_front_window',
        'interior_right_window',
        'interior_left_window',
        'interior_back_window',
        'interior_back_right_window',
        'interior_back_left_window',
        'interior_trunk_window',
        'trunk',
        'engine',
        'jack',
        'other',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    public function crew()
    {
        return $this->belongsTo('App\Crew', 'crew_id', 'id');
    }
}
