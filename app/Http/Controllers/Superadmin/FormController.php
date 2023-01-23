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
use Auth;
use PDF;
use Storage;

class FormController extends Controller
{
    public function index()
    {
        return view('superadmin.auto_detail.form.home');
    }

    public function start()
    {
        $autoDetail = AutoDetail::create();

        return redirect(route('superadmin.form.vehicle.received', $autoDetail->id));
    }

    public function vehicleReceived(AutoDetail $autoDetail)
    {
        $crew = Crew::get();
        return view('superadmin.auto_detail.form.vehicle_received', [
            'crews' => $crew,
            'autoDetail' => $autoDetail
        ]);
    }

    public function vehicleReceivedstore(AutoDetail $autoDetail, Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email|max:255|unique:customers,email,'.$autoDetail->customer->id,
            'birthdate' => 'required',
            'address' => 'required',
            'type' => 'required',
            'merk' => 'required',
            'model' => 'required',
            'license_plate' => 'required',
            'km' => 'required',
            'received_date' => 'required',
            'receiver' => 'required',
        ]);
        $input = $request->all();
        // dd($input);

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
        $vehicle['crew_id'] = $input['receiver'];
        $vehicle = $autoDetail->vehicle->update(array_merge($vehicle, $input));
        // dd($vehicle);

        $input['order_id'] = IdGenerator::generate(['table' => 'auto_details', 'field' => 'order_id', 'length' => 10, 'prefix' =>'INV-']);
        $autoDetail->update();


        if ($input['next_type'] == 'next') {
            return redirect()->route('superadmin.form.invoice.dp', $autoDetail->id);
        } else {
            return redirect()->route('superadmin.form.vehicle.received.pdf', $autoDetail->id);
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
            'date_down_payment' => 'required',
            'payment_method' => 'required',
            'note_payment' => 'required',
            'paid_amount' => 'required|numeric',
            'minus_amount' => 'required|numeric'
        ]);
        $input = $request->all();

        $product = Product::where('id', $input['product_id'])->first();

        if ($input['paid_amount'] > $product->price) {
            return back()->with('success', 'Jumlah DP tidak boleh lebih dari harga Produk!');
        }
        // dd($input);

        $autoDetail->update($input);

        if ($input['next_type'] == 'next') {
            return redirect()->route('superadmin.form.vehicle.inspection', $autoDetail->id);
        } else {
            return back()->with('success', 'Dokumen Invoice Down Payment berhasil dibuat!');
        }
    }

    public function vehicleInspection(AutoDetail $autoDetail)
    {
        $array = [];
        if ($autoDetail->vehicle->vehicle_equipment) {
            foreach (json_decode($autoDetail->vehicle->vehicle_equipment, true) as $source) {
                $array[] = $source;
            };
        }

        $crew = Crew::get();

        return view('superadmin.auto_detail.form.vehicle_inspection', [
            'autoDetail' => $autoDetail,
            'crews' => $crew,
            'equipment' => $array
        ]);
    }

    public function vehicleInspectionStore(Request $request, AutoDetail $autoDetail)
    {
        $validate = $request->validate([
            'inspector_id' => 'required',
            'inspection_date' => 'required',
            'fuel_total' => 'required',
            'front_left_tire' => 'required',
            'back_left_tire' => 'required',
            'front_right_tire' => 'required',
            'back_right_tire' => 'required',
            'spare_tire' => 'required',
            'other_condition' => 'required',
            'vehicle_note' => 'required',
        ]);
        $input = $request->all();
        $input['vehicle_equipment'] = $request->input('vehicle_equipment');
        // dd($input);

        if ($request->exterior_front) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('exterior_front'));
            $input['exterior_front'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/exterior_front', $request->exterior_front);
        }
        if ($request->exterior_back) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('exterior_back'));
            $input['exterior_back'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/exterior_back', $request->exterior_back);
        }
        if ($request->exterior_front_right) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('exterior_front_right'));
            $input['exterior_front_right'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/exterior_front_right', $request->exterior_front_right);
        }
        if ($request->exterior_front_left) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('exterior_front_left'));
            $input['exterior_front_left'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/exterior_front_left', $request->exterior_front_left);
        }
        if ($request->exterior_back_right) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('exterior_back_right'));
            $input['exterior_back_right'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/exterior_back_right', $request->exterior_back_right);
        }
        if ($request->exterior_back_left) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('exterior_back_left'));
            $input['exterior_back_left'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/exterior_back_left', $request->exterior_back_left);
        }
        if ($request->interior_dashboard) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('interior_dashboard'));
            $input['interior_dashboard'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/interior_dashboard', $request->interior_dashboard);
        }
        if ($request->interior_speedometer) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('interior_speedometer'));
            $input['interior_speedometer'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/interior_speedometer', $request->interior_speedometer);
        }
        if ($request->interior_front_seat) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('interior_front_seat'));
            $input['interior_front_seat'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/interior_front_seat', $request->interior_front_seat);
        }
        if ($request->interior_back_seat) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('interior_back_seat'));
            $input['interior_back_seat'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/interior_back_seat', $request->interior_back_seat);
        }
        if ($request->interior_front_window) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('interior_front_window'));
            $input['interior_front_window'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/interior_front_window', $request->interior_front_window);
        }
        if ($request->interior_right_window) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('interior_right_window'));
            $input['interior_right_window'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/interior_right_window', $request->interior_right_window);
        }
        if ($request->interior_left_window) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('interior_left_window'));
            $input['interior_left_window'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/interior_left_window', $request->interior_left_window);
        }
        if ($request->interior_back_window) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('interior_back_window'));
            $input['interior_back_window'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/interior_back_window', $request->interior_back_window);
        }
        if ($request->interior_back_right_window) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('interior_back_right_window'));
            $input['interior_back_right_window'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/interior_back_right_window', $request->interior_back_right_window);
        }
        if ($request->interior_back_left_window) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('interior_back_left_window'));
            $input['interior_back_left_window'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/interior_back_left_window', $request->interior_back_left_window);
        }
        if ($request->engine) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('engine'));
            $input['engine'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/engine', $request->engine);
        }
        if ($request->trunk) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('trunk'));
            $input['trunk'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/trunk', $request->trunk);
        }
        if ($request->jack) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('jack'));
            $input['jack'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/jack', $request->jack);
        }
        if ($request->other) {
            Storage::delete($autoDetail->vehicle->getRawOriginal('other'));
            $input['other'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/other', $request->other);
        }
        if ($request->damage_1) {
            Storage::delete($autoDetail->getRawOriginal('damage_1'));
            $input['damage_1'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/damage_1', $request->damage_1);
        }
        if ($request->damage_2) {
            Storage::delete($autoDetail->getRawOriginal('damage_2'));
            $input['damage_2'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/damage_2', $request->damage_2);
        }
        if ($request->damage_3) {
            Storage::delete($autoDetail->getRawOriginal('damage_3'));
            $input['damage_3'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/damage_3', $request->damage_3);
        }
        if ($request->damage_4) {
            Storage::delete($autoDetail->getRawOriginal('damage_4'));
            $input['damage_4'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/damage_4', $request->damage_4);
        }
        if ($request->damage_5) {
            Storage::delete($autoDetail->getRawOriginal('damage_5'));
            $input['damage_5'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/damage_5', $request->damage_5);
        }
        if ($request->damage_6) {
            Storage::delete($autoDetail->getRawOriginal('damage_6'));
            $input['damage_6'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/damage_6', $request->damage_6);
        }
        if ($request->damage_7) {
            Storage::delete($autoDetail->getRawOriginal('damage_7'));
            $input['damage_7'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/damage_7', $request->damage_7);
        }
        if ($request->damage_8) {
            Storage::delete($autoDetail->getRawOriginal('damage_8'));
            $input['damage_8'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/damage_8', $request->damage_8);
        }
        if ($request->damage_9) {
            Storage::delete($autoDetail->getRawOriginal('damage_9'));
            $input['damage_9'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/damage_9', $request->damage_9);
        }
        if ($request->damage_10) {
            Storage::delete($autoDetail->getRawOriginal('damage_10'));
            $input['damage_10'] = Storage::put('vehicle/'.$autoDetail->customer_id.'/damage_10', $request->damage_10);
        }

        $vehicle = Vehicle::where('id', $autoDetail->vehicle_id)->first();
        $vehicle->update($input);

        $autoDetail->update($input);

        if ($input['next_type'] == 'next') {
            return redirect()->route('superadmin.form.warrant', $autoDetail->id);
        } else {
            return back()->with('success', 'Dokumen Inspeksi berhasil dibuat!');
        }
    }

    public function warrant(AutoDetail $autoDetail)
    {
        $crew = Crew::get();

        return view('superadmin.auto_detail.form.warrant', [
            'autoDetail' => $autoDetail,
            'crews' => $crew,
        ]);
    }

    public function warrantStore(AutoDetail $autoDetail, Request $request)
    {
        $validate = $request->validate([
            'crew_id' => 'required',
            'pic_id' => 'required',
            'estimate' => 'required',
            'warrant_notes' => 'required',            
        ]);
        $input = $request->all();
        // dd($input);

        $autoDetail->update($input);

        if ($input['next_type'] == 'next') {
            return redirect()->route('superadmin.form.invoice.payment', $autoDetail->id);
        } else {
            return back()->with('success', 'Dokumen SPK berhasil dibuat!');
        }
    }

    public function invoicePayment(AutoDetail $autoDetail)
    {
        return view('superadmin.auto_detail.form.invoice_payment', [
            'autoDetail' => $autoDetail
        ]);
    }

    public function invoicePaymentStore(AutoDetail $autoDetail, Request $request)
    {
        $validate = $request->validate([
            'date_payment' => 'required',
            'receiver_payment' => 'required',     
        ]);
        $input = $request->all();
        // dd($input);

        $autoDetail->update($input);

        if ($input['next_type'] == 'next') {
            return redirect()->route('superadmin.form.vehicle.delivery', $autoDetail->id);
        } else {
            return back()->with('success', 'Dokumen Invoice Payment berhasil dibuat!');
        }
    }

    public function vehicleDelivery(AutoDetail $autoDetail)
    {
        return view('superadmin.auto_detail.form.vehicle_delivery', [
            'autoDetail' => $autoDetail
        ]);
    }

    public function vehicleDeliveryStore(AutoDetail $autoDetail, Request $request)
    {
        $validate = $request->validate([
            'date_delivery' => 'required',
            'crew_delivery' => 'required',
            'receiver_delivery' => 'required',
            'vehicle_condition' => 'required',
        ]);
        $input = $request->all();
        // dd($input);

        if ($request->delivery_evidence_1) {
            Storage::delete($autoDetail->getRawOriginal('delivery_evidence_1'));
            $input['delivery_evidence_1'] = Storage::put('evidence/delivery/'.$autoDetail->customer_id.'/delivery_evidence_1', $request->delivery_evidence_1);
        }
        if ($request->delivery_evidence_2) {
            Storage::delete($autoDetail->getRawOriginal('delivery_evidence_2'));
            $input['delivery_evidence_2'] = Storage::put('evidence/delivery/'.$autoDetail->customer_id.'/delivery_evidence_2', $request->delivery_evidence_2);
        }
        if ($request->delivery_evidence_3) {
            Storage::delete($autoDetail->getRawOriginal('delivery_evidence_3'));
            $input['delivery_evidence_3'] = Storage::put('evidence/delivery/'.$autoDetail->customer_id.'/delivery_evidence_3', $request->delivery_evidence_3);
        }
        if ($request->delivery_evidence_4) {
            Storage::delete($autoDetail->getRawOriginal('delivery_evidence_4'));
            $input['delivery_evidence_4'] = Storage::put('evidence/delivery/'.$autoDetail->customer_id.'/delivery_evidence_4', $request->delivery_evidence_4);
        }

        $autoDetail->update($input);

        if ($input['next_type'] == 'next') {
            return redirect()->route('superadmin.form.finish', $autoDetail->id);
        } else {
            return back()->with('success', 'Dokumen Penyerahan berhasil dibuat!');
        }
    }

    public function finish(AutoDetail $autoDetail)
    {
        return view('superadmin.auto_detail.form.finish', [
            'autoDetail' => $autoDetail
        ]);
    }

    public function vehicleReceivedPDF(AutoDetail $autoDetail)
    {
     	$pdf = PDF::loadview('superadmin.auto_detail.pdf.vehicle_received',['autoDetail' => $autoDetail]);
    	return $pdf->download('kendaraan-diterima-'.$autoDetail->order_id.'.pdf');
    }
}
