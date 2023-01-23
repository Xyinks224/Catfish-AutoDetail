<?php

namespace App\Http\Controllers\Superadmin;

use App\AutoDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutoDetailController extends Controller
{
    public function vehicleReceived()
    {
        $autoDetail = AutoDetail::get();

        return view('superadmin.auto_detail.list.vehicle_received',  [
            'autoDetails' => $autoDetail
        ]);
    }

    public function invoiceDp()
    {
        $autoDetail = AutoDetail::get();

        return view('superadmin.auto_detail.list.invoice_dp',  [
            'autoDetails' => $autoDetail
        ]);
    }

    public function vehicleInspection()
    {
        $autoDetail = AutoDetail::get();

        return view('superadmin.auto_detail.list.vehicle_inspection',  [
            'autoDetails' => $autoDetail
        ]);
    }

    public function warrant()
    {
        $autoDetail = AutoDetail::get();

        return view('superadmin.auto_detail.list.warrant',  [
            'autoDetails' => $autoDetail
        ]);
    }

    public function invoicePayment()
    {
        $autoDetail = AutoDetail::get();

        return view('superadmin.auto_detail.list.invoice_payment',  [
            'autoDetails' => $autoDetail
        ]);
    }

    public function vehicleDelivery()
    {
        $autoDetail = AutoDetail::get();

        return view('superadmin.auto_detail.list.vehicle_delivery',  [
            'autoDetails' => $autoDetail
        ]);
    }
}
