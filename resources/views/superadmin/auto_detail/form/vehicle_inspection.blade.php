@extends('layouts.app', [
    'class' => ''
])

@section('title')
Form Auto Detailing - Inspeksi Kendaraan
@endsection

@section('content')
<div class="content">
    <div class="container">
        <h6>Alur Pengerjaan</h6>
        <div class="card-group">
            <div class="card card-stats bg-light border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="icon-big">
                                <h6 class="text-danger">1</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-dark card-category">Kendaraan Diterima</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-stats bg-light border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">2</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-dark">Invoice DP</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-stats bg-dark border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">3</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-white card-category">Inspeksi Kendaraan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-stats bg-light border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">4</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-dark card-category">SPK Pekerjaan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-stats bg-light border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">5</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-dark card-category">Invoice Pelunasan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-stats bg-light border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">6</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-dark card-category">Kendaraan Diserahkan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="card mt-4">
            <div class="card-header text-center mt-4">
                <h5><b>Dokumen Inspeksi Kendaraan</b></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.form.vehicle.inspection.store', $autoDetail->id) }}" enctype="multipart/form-data" method="POST" class="mt-2" >
                    @csrf
                    @method('PUT')
                    <h6 class="mb-3">Laporan Pengecekan Kendaraan</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_name" class="text-dark">Nama Customer</label>
                                <input type="text" class="form-control" value="{{old('customer_name', $autoDetail->customer->name ?? '')}}" disabled>
                                @include('layouts.error', ['errorName' => 'customer_name'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="order_id" class="text-dark">ORDER ID</label>
                                <input type="text" class="form-control" value="{{old('order_id', $autoDetail->order_id ?? '')}}" disabled>
                                @include('layouts.error', ['errorName' => 'order_id'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inspection_date" class="text-dark">Tanggal Pengecekan</label>
                                <input name="inspection_date" type="date" class="bg-light form-control @error('inspection_date') is-invalid @enderror" value="{{old('inspection_date', $autoDetail->inspection_date ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'inspection_date'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inspector_id" class="text-dark">Inspektor</label>
                                <select name="inspector_id" id="" class="bg-light form-control @error('inspector_id') is-invalid @enderror" value="{{old('inspector_id')}}" required>
                                    @foreach ($crews as $crew)
                                        <option value="{{ $crew->id }}" {{ old('inspector_id', $crew->id) == $crew->id ? 'selected' : '' }}>{{ $crew->name }}</option>
                                    @endforeach
                                </select>
                                @include('layouts.error', ['errorName' => 'inspector_id'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type" class="text-dark">Tipe</label>
                                <select id="type" class="form-control" value="{{old('type')}}" disabled>
                                    <option value=""></option>
                                    <option value="2_wheels" {{ old('type', $autoDetail->vehicle->type ?? '') == '2_wheels' ? 'selected' : '' }}>Roda 2</option>
                                    <option value="4_wheels" {{ old('type', $autoDetail->vehicle->type ?? '') == '4_wheels' ? 'selected' : '' }}>Roda 4</option>
                                </select>
                                @include('layouts.error', ['errorName' => 'type'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="brand" class="text-dark">Merek</label>
                                <input type="text" class="form-control" value="{{old('merk', $autoDetail->vehicle->merk)}}" disabled>
                                @include('layouts.error', ['errorName' => 'brand'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="model" class="text-dark">Model</label>
                                <input type="text" class="form-control" value="{{old('model', $autoDetail->vehicle->model)}}" disabled>
                                @include('layouts.error', ['errorName' => 'model'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="license_plate" class="text-dark">Plat Nomor Kendaraan</label>
                                <input  type="text" class="form-control" value="{{old('license_plate', $autoDetail->vehicle->license_plate)}}" disabled>
                                @include('layouts.error', ['errorName' => 'license_plate'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vehicle_year" class="text-dark">Tahun Mobil</label>
                                <input type="text" class="form-control @" value="{{old('year', $autoDetail->vehicle->year)}}" disabled>
                                @include('layouts.error', ['errorName' => 'vehicle_year'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="km" class="text-dark">Kilometer</label>
                                <input type="year" class="form-control " value="{{old('km', $autoDetail->vehicle->km)}}" disabled>
                                @include('layouts.error', ['errorName' => 'km'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fuel_total" class="text-dark">Jumlah BBM</label>
                                <input name="fuel_total" type="number " class="bg-light form-control @error('fuel_total') is-invalid @enderror" value="{{old('fuel_total', $autoDetail->fuel_total)}}" required>
                                @include('layouts.error', ['errorName' => 'fuel_total'])
                            </div>
                        </div>
                    </div>

                    <br>

                    <h6 class="mb-3">Catatan Montir</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="front_left_tire" class="text-dark">Kondisi Ban Kiri Depan</label>
                                <input name="front_left_tire" type="text" class="bg-light form-control @error('front_left_tire') is-invalid @enderror" value="{{old('front_left_tire', $autoDetail->front_left_tire)}}" required>
                                @include('layouts.error', ['errorName' => 'front_left_tire'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="back_left_tire" class="text-dark">Kondisi Ban Kiri Belakang</label>
                                <input name="back_left_tire" type="text" class="bg-light form-control @error('back_left_tire') is-invalid @enderror" value="{{old('back_left_tire', $autoDetail->back_left_tire)}}" required>
                                @include('layouts.error', ['errorName' => 'back_left_tire'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="front_right_tire" class="text-dark">Kondisi Ban Kanan Depan</label>
                                <input name="front_right_tire" type="text" class="bg-light form-control @error('front_right_tire') is-invalid @enderror" value="{{old('front_right_tire', $autoDetail->front_right_tire)}}" required>
                                @include('layouts.error', ['errorName' => 'front_right_tire'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="back_right_tire" class="text-dark">Kondisi Ban Kanan Belakang</label>
                                <input name="back_right_tire" type="text" class="bg-light form-control @error('back_right_tire') is-invalid @enderror" value="{{old('back_right_tire', $autoDetail->back_right_tire)}}" required>
                                @include('layouts.error', ['errorName' => 'back_right_tire'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="spare_tire" class="text-dark">Kondisi Ban serep</label>
                                <input name="spare_tire" type="text" class="bg-light form-control @error('spare_tire') is-invalid @enderror" value="{{old('spare_tire', $autoDetail->spare_tire)}}" required>
                                @include('layouts.error', ['errorName' => 'spare_tire'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="other_condition" class="text-dark">Kondisi Lain - Lain</label>
                                <input name="other_condition" type="text" class="bg-light form-control @error('other_condition') is-invalid @enderror" value="{{old('other_condition', $autoDetail->other_condition)}}" required>
                                @include('layouts.error', ['errorName' => 'other_condition'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="vehicle_note" class="text-dark">Catatan Montir</label>
                                <input name="vehicle_note" type="text" class="bg-light form-control @error('vehicle_note') is-invalid @enderror" value="{{old('vehicle_note', $autoDetail->vehicle_note)}}" required>
                                @include('layouts.error', ['errorName' => 'vehicle_note'])
                            </div>
                        </div>
                    </div>

                    <br>

                    <h6 class="mb-3">Perlengkapan Kendaraan</h6>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="ac" {{ old('vehicle_equipment', in_array('ac', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('AC') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="jam" {{ old('vehicle_equipment', in_array('jam', $equipment) ?? '') == 'jam' ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Jam') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="mirror_inside" {{ old('vehicle_equipment', in_array('mirror_inside', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Kaca Spion Dalam') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="mirror_outside" {{ old('vehicle_equipment', in_array('mirror_outside', $equipment) ?? '')? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Kaca Spion Luar') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="front_carpet" {{ old('vehicle_equipment', in_array('front_carpet', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Karpet Depan') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="back_carpet" {{ old('vehicle_equipment', in_array('back_carpet', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Karpet Belakang') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="horn" {{ old('vehicle_equipment', in_array('horn', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Klakson') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="lighter" {{ old('vehicle_equipment', in_array('lighter', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Pemantik Api') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="speaker" {{ old('vehicle_equipment', in_array('speaker', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Speaker') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="p3k" {{ old('vehicle_equipment', in_array('p3k', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('P3k') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="sun_protection" {{ old('vehicle_equipment', in_array('sun_protection', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Penahan Sinar Matahari') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="media_player" {{ old('vehicle_equipment', in_array('media_player', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Radio/Tape/LCD') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="headrest" {{ old('vehicle_equipment', in_array('headrest', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Sandaran Kepala') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="antenna" {{ old('vehicle_equipment', in_array('antenna', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Antena') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="wheel_dop" {{ old('vehicle_equipment', in_array('wheel_dop', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Wheel Dop') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="mudguard" {{ old('vehicle_equipment', in_array('mudguard', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Penahan Lumpur') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="safety_triangle" {{ old('vehicle_equipment', in_array('safety_triangle', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Segitiga Pengaman') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="jack" {{ old('vehicle_equipment', in_array('jack', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Dongkrak') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="gutter" {{ old('vehicle_equipment', in_array('gutter', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Talang Air') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="spare_tire" {{ old('vehicle_equipment', in_array('spare_tire', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Ban Serep') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="tool_set" {{ old('vehicle_equipment', in_array('tool_set', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Tool Set') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="spoiler" {{ old('vehicle_equipment', in_array('spoiler', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Spoiler') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="remote_device" {{ old('vehicle_equipment', in_array('remote_device', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Kunci/Radio Remote') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="vehicle_registration" {{ old('vehicle_equipment', in_array('vehicle_registration', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('STNK') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-check">
                                         <label class="form-check-label">
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="bumper_light" {{ old('vehicle_equipment', in_array('bumper_light', $equipment) ?? '') ? 'checked' : '' }}>
                                            <span class="form-check-sign"></span>
                                            {{ __('Lampu Bemper') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <h6 class="mb-3">Foto Kendaraan</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="exterior_frontPreview" src="{{ $autoDetail->vehicle->exterior_front ? asset('storage/'.$autoDetail->vehicle->exterior_front) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="exterior_front" id="exterior_front" type="file" class="form-control mt-2 @error('exterior_front') is-invalid @enderror" value="{{old('exterior_front')}}" onchange="exterior_frontPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Eksterior Depan
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="exterior_backPreview" src="{{ $autoDetail->vehicle->exterior_back ? asset('storage/'.$autoDetail->vehicle->exterior_back) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="exterior_back" id="exterior_back" type="file" class="form-control mt-2 @error('exterior_back') is-invalid @enderror" value="{{old('exterior_back')}}" onchange="exterior_backPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Eksterior Belakang
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="exterior_front_rightPreview" src="{{ $autoDetail->vehicle->exterior_front_right ? asset('storage/'.$autoDetail->vehicle->exterior_front_right) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="exterior_front_right" id="exterior_front_right" type="file" class="form-control mt-2 @error('exterior_front_right') is-invalid @enderror" value="{{old('exterior_front_right')}}" onchange="exterior_front_rightPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Eksterior Depan Kanan
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="exterior_front_leftPreview" src="{{ $autoDetail->vehicle->exterior_front_left ? asset('storage/'.$autoDetail->vehicle->exterior_front_left) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="exterior_front_left" id="exterior_front_left" type="file" class="form-control mt-2 @error('exterior_front_left') is-invalid @enderror" value="{{old('exterior_front_left')}}" onchange="exterior_front_leftPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Eksterior Depan Kiri
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="exterior_back_rightPreview" src="{{ $autoDetail->vehicle->exterior_back_right ? asset('storage/'.$autoDetail->vehicle->exterior_back_right) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="exterior_back_right" id="exterior_back_right" type="file" class="form-control mt-2 @error('exterior_back_right') is-invalid @enderror" value="{{old('exterior_back_right')}}" onchange="exterior_back_rightPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Eksterior Belakang Kanan
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="exterior_back_leftPreview" src="{{ $autoDetail->vehicle->exterior_back_left ? asset('storage/'.$autoDetail->vehicle->exterior_back_left) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="exterior_back_left" id="exterior_back_left" type="file" class="form-control mt-2 @error('exterior_back_left') is-invalid @enderror" value="{{old('exterior_back_left')}}" onchange="exterior_back_leftPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Eksterior Belakang Kiri
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="interior_dashboardPreview" src="{{ $autoDetail->vehicle->interior_dashboard ? asset('storage/'.$autoDetail->vehicle->interior_dashboard) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="interior_dashboard" id="interior_dashboard" type="file" class="form-control mt-2 @error('interior_dashboard') is-invalid @enderror" value="{{old('interior_dashboard')}}" onchange="interior_dashboardPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Interior Dashboard
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="interior_speedometerPreview" src="{{ $autoDetail->vehicle->interior_speedometer ? asset('storage/'.$autoDetail->vehicle->exterior_front) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="interior_speedometer" id="interior_speedometer" type="file" class="form-control mt-2 @error('interior_speedometer') is-invalid @enderror" value="{{old('interior_speedometer')}}" onchange="interior_speedometerPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Interior Speedometer
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="interior_front_seatPreview" src="{{ $autoDetail->vehicle->interior_front_seat ? asset('storage/'.$autoDetail->vehicle->interior_front_seat) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="interior_front_seat" id="interior_front_seat" type="file" class="form-control mt-2 @error('interior_front_seat') is-invalid @enderror" value="{{old('interior_front_seat')}}" onchange="interior_front_seatPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Interior Jok Depan
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="interior_back_seatPreview" src="{{ $autoDetail->vehicle->interior_back_seat ? asset('storage/'.$autoDetail->vehicle->interior_back_seat) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="interior_back_seat" id="interior_back_seat" type="file" class="form-control mt-2 @error('interior_back_seat') is-invalid @enderror" value="{{old('interior_back_seat')}}" onchange="interior_back_seatPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Interior Jok Belakang
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="interior_front_windowPreview" src="{{ $autoDetail->vehicle->interior_front_window ? asset('storage/'.$autoDetail->vehicle->interior_front_window) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="interior_front_window" id="interior_front_window" type="file" class="form-control mt-2 @error('interior_front_window') is-invalid @enderror" value="{{old('interior_front_window')}}" onchange="interior_front_windowPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Depan Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="interior_right_windowPreview" src="{{ $autoDetail->vehicle->interior_right_window ? asset('storage/'.$autoDetail->vehicle->interior_right_window) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="interior_right_window" id="interior_right_window" type="file" class="form-control mt-2 @error('interior_right_window') is-invalid @enderror" value="{{old('interior_right_window')}}" onchange="interior_right_windowPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Samping Kanan Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="interior_left_windowPreview" src="{{ $autoDetail->vehicle->interior_left_window ? asset('storage/'.$autoDetail->vehicle->interior_left_window) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="interior_left_window" id="interior_left_window" type="file" class="form-control mt-2 @error('interior_left_window') is-invalid @enderror" value="{{old('interior_left_window')}}" onchange="interior_left_windowPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Samping Kiri Bagian Dalam
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="interior_back_right_windowPreview" src="{{ $autoDetail->vehicle->interior_back_right_window ? asset('storage/'.$autoDetail->vehicle->interior_back_right_window) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="interior_back_right_window" id="interior_back_right_window" type="file" class="form-control mt-2 @error('interior_back_right_window') is-invalid @enderror" value="{{old('interior_back_right_window')}}" onchange="interior_back_right_windowPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Belakang Kanan Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="interior_back_left_windowPreview" src="{{ $autoDetail->vehicle->interior_back_left_window ? asset('storage/'.$autoDetail->vehicle->interior_back_left_window) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="interior_back_left_window" id="interior_back_left_window" type="file" class="form-control mt-2 @error('interior_back_left_window') is-invalid @enderror" value="{{old('interior_back_left_window')}}" onchange="interior_back_left_windowPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Belakang Kiri Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="interior_back_windowPreview" src="{{ $autoDetail->vehicle->interior_back_window ? asset('storage/'.$autoDetail->vehicle->interior_back_window) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="interior_back_window" id="interior_back_window" type="file" class="form-control mt-2 @error('interior_back_window') is-invalid @enderror" value="{{old('interior_back_window')}}" onchange="interior_back_windowPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Bagasi Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="enginePreview" src="{{ $autoDetail->vehicle->engine ? asset('storage/'.$autoDetail->vehicle->engine) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="engine" id="engine" type="file" class="form-control mt-2 @error('engine') is-invalid @enderror" value="{{old('engine')}}" onchange="enginePreviewImage();">
                                &nbsp;&nbsp;&nbsp; Mesin Mobil
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="trunkPreview" src="{{ $autoDetail->vehicle->trunk ? asset('storage/'.$autoDetail->vehicle->trunk) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="trunk" id="trunk" type="file" class="form-control mt-2 @error('trunk') is-invalid @enderror" value="{{old('trunk')}}" onchange="trunkPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Ruang Bagasi
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="jackPreview" src="{{ $autoDetail->vehicle->jack ? asset('storage/'.$autoDetail->vehicle->jack) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="jack" id="jack" type="file" class="form-control mt-2 @error('jack') is-invalid @enderror" value="{{old('jack')}}" onchange="jackPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Dongkrak
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="otherPreview" src="{{ $autoDetail->vehicle->other ? asset('storage/'.$autoDetail->vehicle->other) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="other" id="other" type="file" class="form-control mt-2 @error('other') is-invalid @enderror" value="{{old('other')}}" onchange="otherPreviewImage();">
                                &nbsp;&nbsp;&nbsp; Lainya
                            </div>
                        </div>
                    </div>

                    <br>

                    <h6 class="mb-3">Foto Kerusakan</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="damage_1Preview" src="{{ $autoDetail->damage_1 ? asset('storage/'.$autoDetail->damage_1) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="damage_1" id="damage_1" type="file" class="form-control mt-2 @error('damage_1') is-invalid @enderror" value="{{old('damage_1')}}" onchange="damage_1PreviewImage();">
                                &nbsp;&nbsp;&nbsp; Kerusakan 1
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="damage_2Preview" src="{{ $autoDetail->damage_1 ? asset('storage/'.$autoDetail->damage_1) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="damage_2" id="damage_2" type="file" class="form-control mt-2 @error('damage_2') is-invalid @enderror" value="{{old('damage_2')}}" onchange="damage_2PreviewImage();">
                                &nbsp;&nbsp;&nbsp; Kerusakan 2
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="damage_3Preview" src="{{ $autoDetail->damage_3 ? asset('storage/'.$autoDetail->damage_3) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="damage_3" id="damage_3" type="file" class="form-control mt-2 @error('damage_3') is-invalid @enderror" value="{{old('damage_3')}}" onchange="damage_3PreviewImage();">
                                &nbsp;&nbsp;&nbsp; Kerusakan 3
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="damage_4Preview" src="{{ $autoDetail->damage_4 ? asset('storage/'.$autoDetail->damage_4) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="damage_4" id="damage_4" type="file" class="form-control mt-2 @error('damage_4') is-invalid @enderror" value="{{old('damage_4')}}" onchange="damage_4PreviewImage();">
                                &nbsp;&nbsp;&nbsp; Kerusakan 4
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="damage_5Preview" src="{{ $autoDetail->damage_5 ? asset('storage/'.$autoDetail->damage_5) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="damage_5" id="damage_5" type="file" class="form-control mt-2 @error('damage_5') is-invalid @enderror" value="{{old('damage_5')}}" onchange="damage_5PreviewImage();">
                                &nbsp;&nbsp;&nbsp; Kerusakan 5
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="damage_6Preview" src="{{ $autoDetail->damage_6 ? asset('storage/'.$autoDetail->damage_6) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="damage_6" id="damage_6" type="file" class="form-control mt-2 @error('damage_6') is-invalid @enderror" value="{{old('damage_6')}}" onchange="damage_6PreviewImage();">
                                &nbsp;&nbsp;&nbsp; Kerusakan 6
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="damage_7Preview" src="{{ $autoDetail->damage_7 ? asset('storage/'.$autoDetail->damage_7) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="damage_7" id="damage_7" type="file" class="form-control mt-2 @error('damage_7') is-invalid @enderror" value="{{old('damage_7')}}" onchange="damage_7PreviewImage();">
                                &nbsp;&nbsp;&nbsp; Kerusakan 7
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="damage_8Preview" src="{{ $autoDetail->damage_8 ? asset('storage/'.$autoDetail->damage_8) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="damage_8" id="damage_8" type="file" class="form-control mt-2 @error('damage_8') is-invalid @enderror" value="{{old('damage_8')}}" onchange="damage_8PreviewImage();">
                                &nbsp;&nbsp;&nbsp; Kerusakan 8
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="damage_9Preview" src="{{ $autoDetail->damage_9 ? asset('storage/'.$autoDetail->damage_9) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="damage_9" id="damage_9" type="file" class="form-control mt-2 @error('damage_9') is-invalid @enderror" value="{{old('damage_9')}}" onchange="damage_9PreviewImage();">
                                &nbsp;&nbsp;&nbsp; Kerusakan 9
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="damage_10Preview" src="{{ $autoDetail->damage_10 ? asset('storage/'.$autoDetail->damage_10) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="damage_10" id="damage_10" type="file" class="form-control mt-2 @error('damage_10') is-invalid @enderror" value="{{old('damage_10')}}" onchange="damage_10PreviewImage();">
                                &nbsp;&nbsp;&nbsp; Kerusakan 10
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right" onclick="this.form.submit()">
                        <a href="{{ route('superadmin.form.invoice.dp', $autoDetail->id) }}" class="btn btn-dark ">Kembali</a>
                        <button name="next_type" value="print" class="btn btn-outline-danger">Simpan & BUAT PDF</button>
                        <button name="next_type" value="next" class="btn btn-danger">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    function damage_1PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_1").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_1Preview").src = oFREvent.target.result;
        };
    };

    function damage_2PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_2").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_2Preview").src = oFREvent.target.result;
        };
    };

    function damage_3PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_3").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_3Preview").src = oFREvent.target.result;
        };
    };

    function damage_4PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_4").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_4Preview").src = oFREvent.target.result;
        };
    };
    function damage_5PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_5").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_5Preview").src = oFREvent.target.result;
        };
    };

    function damage_6PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_6").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_6Preview").src = oFREvent.target.result;
        };
    };

    function damage_7PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_7").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_7Preview").src = oFREvent.target.result;
        };
    };
    function damage_8PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_8").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_8Preview").src = oFREvent.target.result;
        };
    };

    function damage_9PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_9").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_9Preview").src = oFREvent.target.result;
        };
    };

    function damage_10PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_10").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_10Preview").src = oFREvent.target.result;
        };
    };
</script>
<script type="text/javascript">
    function exterior_frontPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("exterior_front").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("exterior_frontPreview").src = oFREvent.target.result;
        };
    };

    function exterior_backPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("exterior_back").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("exterior_backPreview").src = oFREvent.target.result;
        };
    };

    function exterior_front_rightPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("exterior_front_right").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("exterior_front_rightPreview").src = oFREvent.target.result;
        };
    };

    function exterior_front_leftPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("exterior_front_left").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("exterior_front_leftPreview").src = oFREvent.target.result;
        };
    };

    function exterior_back_rightPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("exterior_back_right").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("exterior_back_rightPreview").src = oFREvent.target.result;
        };
    };
    function exterior_back_leftPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("exterior_back_left").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("exterior_back_leftPreview").src = oFREvent.target.result;
        };
    };

    function interior_dashboardPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("interior_dashboard").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("interior_dashboardPreview").src = oFREvent.target.result;
        };
    };

    function interior_speedometerPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("interior_speedometer").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("interior_speedometerPreview").src = oFREvent.target.result;
        };
    };
    function interior_front_seatPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("interior_front_seat").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("interior_front_seatPreview").src = oFREvent.target.result;
        };
    };

    function interior_back_seatPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("interior_back_seat").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("interior_back_seatPreview").src = oFREvent.target.result;
        };
    };

    function interior_front_windowPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("interior_front_window").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("interior_front_windowPreview").src = oFREvent.target.result;
        };
    };
    function interior_right_windowPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("interior_right_window").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("interior_right_windowPreview").src = oFREvent.target.result;
        };
    };

    function interior_left_windowPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("interior_left_window").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("interior_left_windowPreview").src = oFREvent.target.result;
        };
    };

    function interior_back_windowPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("interior_back_window").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("interior_back_windowPreview").src = oFREvent.target.result;
        };
    };

    function interior_back_right_windowPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("interior_back_right_window").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("interior_back_right_windowPreview").src = oFREvent.target.result;
        };
    };
    function interior_back_left_windowPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("interior_back_left_window").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("interior_back_left_windowPreview").src = oFREvent.target.result;
        };
    };

    function enginePreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("engine").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("enginePreview").src = oFREvent.target.result;
        };
    };

    function trunkPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("trunk").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("trunkPreview").src = oFREvent.target.result;
        };
    };
    function jackPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("jack").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("jackPreview").src = oFREvent.target.result;
        };
    };

    function otherPreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("other").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("otherPreview").src = oFREvent.target.result;
        };
    };

    function damage_10PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("damage_10").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("damage_10Preview").src = oFREvent.target.result;
        };
    };
</script>
@endpush
