<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    protected $fillable = ['name', 'position', 'facility', 'date_start_work', 'phone_number', 'email', 'birthplace', 'birthdate', 'address'];
}
