<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'facility'];

    public function getPriceFormatAttribute()
    {
        return 'Rp.'.number_format($this->price);
    }
}
