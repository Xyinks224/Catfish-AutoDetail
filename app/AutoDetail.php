<?php

namespace App;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;

class AutoDetail extends Model
{
    protected $fillable = [
        'order_id',
        'customer_id',
        'vehicle_id',
        'inspector_id',
        'pic_id',
        'crew_id',
        'product_id',
        'date_down_payment',
        'payment_method',
        'note_payment',
        'paid_amount',
        'minus_amount',
        'fuel_total',
        'front_left_tire',
        'front_right_tire',
        'back_left_tire',
        'back_right_tire',
        'spare_tire',
        'other_condition',
        'vehicle_note',
        'damage_1',
        'damage_2',
        'damage_3',
        'damage_4',
        'damage_5',
        'damage_6',
        'damage_7',
        'damage_8',
        'damage_9',
        'damage_10',
        'estimate',
        'warrant_notes',
        'date_payment',
        'receiver_payment',
        'date_delivery',
        'crew_delivery',
        'receiver_delivery',
        'delivery_evidence_1',
        'delivery_evidence_2',
        'delivery_evidence_3',
        'delivery_evidence_4',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle', 'vehicle_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function crew()
    {
        return $this->belongsTo('App\Crew', 'crew_id', 'id');
    }
}
