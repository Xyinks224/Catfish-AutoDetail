<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutoDetailController extends Controller
{
    public function index()
    {
        return view('superadmin.auto_detail.home');
    }
}
