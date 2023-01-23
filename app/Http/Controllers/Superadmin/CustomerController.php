<?php

namespace App\Http\Controllers\Superadmin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Vehicle;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();

        return view('superadmin.customer.index', [
            'customers' => $customers
        ]);
    }

    public function edit(Customer $customer)
    {
        $vehicle = Vehicle::where('customer_id', $customer->id)->first();
        return view('superadmin.customer.edit', [
            'customer' => $customer,
            'vehicle' => $vehicle
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        $input = $request->all();

        $vehicle = Vehicle::where('customer_id', $customer->id)->first();
        $vehicle->update($input);
        $customer->update($input);

        return back()->with('success', 'Custoemr '.$customer->name.' berhasil diubah!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return back()->with('success', 'Customer '.$customer->name.' berhasil dihapus!');
    }
}
