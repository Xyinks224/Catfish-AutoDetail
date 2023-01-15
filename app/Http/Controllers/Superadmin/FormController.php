<?php

namespace App\Http\Controllers\Superadmin;

use App\AutoDetail;
use App\Crew;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Product;
use App\Vehicle;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public function index()
    {
        return view('superadmin.auto_detail.form.home');
    }

    public function vehicleReceived()
    {
        $crew = Crew::get();
        return view('superadmin.auto_detail.form.vehicle_received', [
            'crews' => $crew
        ]);
    }

    public function vehicleReceivedstore(Request $request)
    {
        $validate = $request->validate([
            'crew_id' => 'required',
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:customers',
            'birthdate' => 'required',
            'address' => 'required',
            'type' => 'required',
            'merk' => 'required',
            'model' => 'required',
            'license_plate' => 'required',
            'year' => 'required',
            'km' => 'required',
            'received_date' => 'required',
            'receiver' => 'required',
        ]);
        $input = $request->all();

        $customer = Customer::updateOrCreate([
            'name' => $input['name'],
        ], [
            'phone_number' => $input['phone_number'],
            'email' => $input['email'],
            'birthdate' => $input['birthdate'],
            'address' => $input['address'],
        ]);

        $input['customer_id'] = $customer->id;
        $input['received_date'] = date('Y-m-d', strtotime('now'));
        $vehicle = Vehicle::create($input);

        $autoDetail = AutoDetail::updateOrCreate([
            'customer_id' => $customer->id,
            'vehicle_id' => $vehicle->id,
        ],[
            'order_id' => IdGenerator::generate(['table' => 'auto_details', 'field' => 'order_id', 'length' => 10, 'prefix' =>'INV-']),
        ]);


        if ($input['next_type'] == 'next') {
            return redirect()->route('superadmin.form.invoice.dp', $autoDetail->id);
        } else {
            return back()->with('success', 'Dokumen Penerimaan berhasil dibuat!');
        }
    }

    public function invoiceDp(AutoDetail $autoDetail)
    {
        $crew = Crew::get();
        $product = Product::get();
        return view('superadmin.auto_detail.form.invoice_dp', [
            'autoDetail' => $autoDetail,
            'products' => $product,
            'crews' => $crew
        ]);
    }

    public function invoiceDpStore(Request $request, AutoDetail $autoDetail)
    {
        $validate = $request->validate([
            'product_id' => 'required',
            'down_payment_date' => 'required',
            'payment_method' => 'required',
            'note_payment' => 'required',
            'paid_amount' => 'required|numeric',
            'minus_amount' => 'required|numeric'
        ]);
        $input = $request->all();
        // dd($input);

        $autoDetail->updateOrCreate([
            'id' => $autoDetail->id,
        ],[
            'product_id' => $input['product_id'],
            'down_payment_date' => $input['down_payment_date'],
            'payment_method' => $input['payment_method'],
            'note_payment' => $input['note_payment'],
            'paid_amount' => $input['paid_amount'],
            'minus_amount' => $input['minus_amount'],
        ]);

        if ($input['next_type'] == 'next') {
            return redirect()->route('superadmin.form.invoice.dp', $autoDetail->id);
        } else {
            return back()->with('success', 'Dokumen Penerimaan berhasil dibuat!');
        }
    }

    public function vehicleInspection(AutoDetail $autoDetail)
    {
        $crew = Crew::get();

        return view('superadmin.auto_detail.form.vehicle_inspection', [
            'autoDetail' => $autoDetail,
            'crews' => $crew
        ]);
    }

    public function vehicleInspectionStore(Request $request, AutoDetail $autoDetail)
    {
        $validate = $request->validate([
            'product_id' => 'required',
            'down_payment_date' => 'required',
            'payment_method' => 'required',
            'note_payment' => 'required',
            'paid_amount' => 'required|numeric',
            'minus_amount' => 'required|numeric'
        ]);
        $input = $request->all();
        // dd($input);

        $autoDetail->updateOrCreate([
            'id' => $autoDetail->id,
        ],[
            'product_id' => $input['product_id'],
            'down_payment_date' => $input['down_payment_date'],
            'payment_method' => $input['payment_method'],
            'note_payment' => $input['note_payment'],
            'paid_amount' => $input['paid_amount'],
            'minus_amount' => $input['minus_amount'],
        ]);

        if ($input['next_type'] == 'next') {
            return redirect()->route('superadmin.form.invoice.dp', $autoDetail->id);
        } else {
            return back()->with('success', 'Dokumen Penerimaan berhasil dibuat!');
        }
    }

    public function warrant()
    {
        return view('superadmin.auto_detail.form.warrant');
    }

    public function invoicePayment()
    {
        return view('superadmin.auto_detail.form.invoice_payment');
    }

    public function vehicleDelivery()
    {
        return view('superadmin.auto_detail.form.vehicle_delivery');
    }
}
