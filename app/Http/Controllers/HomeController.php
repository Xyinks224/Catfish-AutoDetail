<?php

namespace App\Http\Controllers;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        switch (Auth::user()->role) {
            case 'superadmin':
                return redirect(route('superadmin.home'));
                break;

            case 'admin':
                return redirect(route('admin.home'));
                break;

            case 'user':
                return redirect(route('user.home'));
                break;

            default:
                Auth::logout();
        }
    }
}
