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
                <h5><b>Dokumen Invoice Down Payment</b></h5>
            </div>
            <div class="card-body">
                <form action="" class="mt-2">
                    <h6 class="mb-3">Informasi Data Diri</h6>
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
                                <label for="date_inspection" class="text-dark">Tanggal Pengecekan</label>
                                <input name="date_inspection" type="date" class="bg-light form-control @error('date_inspection') is-invalid @enderror" value="{{old('date_inspection')}}" required>
                                @include('layouts.error', ['errorName' => 'date_inspection'])
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
                                <input name="fuel_total" type="number " class="bg-light form-control @error('fuel_total') is-invalid @enderror" value="{{old('fuel_total')}}" required>
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
                                <input name="front_left_tire" type="text" class="bg-light form-control @error('front_left_tire') is-invalid @enderror" value="{{old('front_left_tire')}}" required>
                                @include('layouts.error', ['errorName' => 'front_left_tire'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="back_left_tire" class="text-dark">Kondisi Ban Kiri Belakang</label>
                                <input name="back_left_tire" type="text" class="bg-light form-control @error('back_left_tire') is-invalid @enderror" value="{{old('back_left_tire')}}" required>
                                @include('layouts.error', ['errorName' => 'back_left_tire'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="front_right_tire" class="text-dark">Kondisi Ban Kanan Depan</label>
                                <input name="front_right_tire" type="text" class="bg-light form-control @error('front_right_tire') is-invalid @enderror" value="{{old('front_right_tire')}}" required>
                                @include('layouts.error', ['errorName' => 'front_right_tire'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="back_right_tire" class="text-dark">Kondisi Ban Kanan Belakang</label>
                                <input name="back_right_tire" type="text" class="bg-light form-control @error('back_right_tire') is-invalid @enderror" value="{{old('back_right_tire')}}" required>
                                @include('layouts.error', ['errorName' => 'back_right_tire'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="spare_tire" class="text-dark">Kondisi Ban serep</label>
                                <input name="spare_tire" type="text" class="bg-light form-control @error('spare_tire') is-invalid @enderror" value="{{old('spare_tire')}}" required>
                                @include('layouts.error', ['errorName' => 'spare_tire'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="other_condition" class="text-dark">Kondisi Lain - Lain</label>
                                <input name="other_condition" type="text" class="bg-light form-control @error('other_condition') is-invalid @enderror" value="{{old('other_condition')}}" required>
                                @include('layouts.error', ['errorName' => 'other_condition'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="vehicle_note" class="text-dark">Catatan Montir</label>
                                <input name="vehicle_note" type="text" class="bg-light form-control @error('vehicle_note') is-invalid @enderror" value="{{old('vehicle_note')}}" required>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="ac" {{ old('vehicle_equipment') == 'AC' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="jam" {{ old('vehicle_equipment') == 'jam' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="mirror_inside" {{ old('vehicle_equipment') == 'mirror_inside' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="mirror_outside" {{ old('vehicle_equipment') == 'mirror_outside' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="front_carpet" {{ old('vehicle_equipment') == 'front_carpet' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="back_carpet" {{ old('vehicle_equipment') == 'back_carpet' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="horn" {{ old('vehicle_equipment') == 'horn' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="lighter" {{ old('vehicle_equipment') == 'lighter' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="speaker" {{ old('vehicle_equipment') == 'speaker' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="p3k" {{ old('vehicle_equipment') == 'p3k' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="sun_protection" {{ old('vehicle_equipment') == 'sun_protection' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="media_player" {{ old('vehicle_equipment') == 'media_player' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="headrest" {{ old('vehicle_equipment') == 'headrest' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="antenna" {{ old('vehicle_equipment') == 'antenna' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="wheel_dop" {{ old('vehicle_equipment') == 'wheel_dop' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="mudguard" {{ old('vehicle_equipment') == 'mudguard' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="safety_triangle" {{ old('vehicle_equipment') == 'safety_triangle' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="jack" {{ old('vehicle_equipment') == 'jack' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="gutter" {{ old('vehicle_equipment') == 'gutter' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="spare_tire" {{ old('vehicle_equipment') == 'spare_tire' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="tool_set" {{ old('vehicle_equipment') == 'tool_set' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="spoiler" {{ old('vehicle_equipment') == 'spoiler' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="remote_device" {{ old('vehicle_equipment') == 'remote_device' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="vehicle_registration" {{ old('vehicle_equipment') == 'vehicle_registration' ? 'checked' : '' }}>
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
                                            <input class="form-check-input" name="vehicle_equipment[]" type="checkbox" value="bumper_light" {{ old('vehicle_equipment') == 'bumper_light' ? 'checked' : '' }}>
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
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="exterior_front" id="exterior_front" type="file" class="form-control mt-2 @error('exterior_front') is-invalid @enderror" value="{{old('exterior_front')}}">
                                &nbsp;&nbsp;&nbsp; Exterior Depan
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="back_exterior" id="back_exterior" type="file" class="form-control mt-2 @error('back_exterior') is-invalid @enderror" value="{{old('back_exterior')}}">
                                &nbsp;&nbsp;&nbsp; Exterior Belakang
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="exterior_front_right" id="exterior_front_right" type="file" class="form-control mt-2 @error('exterior_front_right') is-invalid @enderror" value="{{old('exterior_front_right')}}">
                                &nbsp;&nbsp;&nbsp; Exterior Depan Kanan
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="exterior_front_left" id="exterior_front_left" type="file" class="form-control mt-2 @error('back_exterior_left') is-invalid @enderror" value="{{old('back_exterior_left')}}">
                                &nbsp;&nbsp;&nbsp; Exterior Depan Kiri
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="exterior_back_right" id="exterior_back_right" type="file" class="form-control mt-2 @error('exterior_back_right') is-invalid @enderror" value="{{old('exterior_back_right')}}">
                                &nbsp;&nbsp;&nbsp; Exterior Belakang Kanan
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="exterior_back_left" id="exterior_back_left" type="file" class="form-control mt-2 @error('exterior_back_left') is-invalid @enderror" value="{{old('exterior_back_left')}}">
                                &nbsp;&nbsp;&nbsp; Exterior Belakang Kiri
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="interior_dashboard" id="interior_dashboard" type="file" class="form-control mt-2 @error('interior_dashboard') is-invalid @enderror" value="{{old('interior_dashboard')}}">
                                &nbsp;&nbsp;&nbsp; Interior Dashboard
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="interior_spedometer" id="interior_spedometer" type="file" class="form-control mt-2 @error('interior_spedometer') is-invalid @enderror" value="{{old('interior_spedometer')}}">
                                &nbsp;&nbsp;&nbsp; Interior Speedometer
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="interior_front_seat" id="interior_front_seat" type="file" class="form-control mt-2 @error('interior_front_seat') is-invalid @enderror" value="{{old('interior_front_seat')}}">
                                &nbsp;&nbsp;&nbsp; Interior Jok Depan
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="interior_back_seat" id="interior_back_seat" type="file" class="form-control mt-2 @error('interior_back_seat') is-invalid @enderror" value="{{old('interior_back_seat')}}">
                                &nbsp;&nbsp;&nbsp; Interior Jok Belakang
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="interior_front_window" id="interior_front_window" type="file" class="form-control mt-2 @error('interior_front_window') is-invalid @enderror" value="{{old('interior_front_window')}}">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Depan Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="interior_right_window" id="interior_right_window" type="file" class="form-control mt-2 @error('interior_right_window') is-invalid @enderror" value="{{old('interior_right_window')}}">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Samping Kanan Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="interior_left_window" id="interior_left_window" type="file" class="form-control mt-2 @error('interior_left_window') is-invalid @enderror" value="{{old('interior_left_window')}}">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Samping Kiri Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="interior_back_window" id="interior_back_window" type="file" class="form-control mt-2 @error('interior_back_window') is-invalid @enderror" value="{{old('interior_back_window')}}">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Belakang Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="interior_back_right_window" id="interior_back_right_window" type="file" class="form-control mt-2 @error('interior_back_right_window') is-invalid @enderror" value="{{old('interior_back_right_window')}}">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Belakang Kanan Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="interior_back_left_window" id="interior_back_left_window" type="file" class="form-control mt-2 @error('interior_back_left_window') is-invalid @enderror" value="{{old('interior_back_left_window')}}">
                                &nbsp;&nbsp;&nbsp; Interior Kaca Belakang Kiri Bagian Dalam
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="engine" id="engine" type="file" class="form-control mt-2 @error('engine') is-invalid @enderror" value="{{old('engine')}}">
                                &nbsp;&nbsp;&nbsp; Mesin Mobil
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="trunk" id="trunk" type="file" class="form-control mt-2 @error('trunk') is-invalid @enderror" value="{{old('trunk')}}">
                                &nbsp;&nbsp;&nbsp; Ruang Bagasi
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="jack" id="jack" type="file" class="form-control mt-2 @error('jack') is-invalid @enderror" value="{{old('jack')}}">
                                &nbsp;&nbsp;&nbsp; Dongkrak
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="other" id="other" type="file" class="form-control mt-2 @error('other') is-invalid @enderror" value="{{old('other')}}">
                                &nbsp;&nbsp;&nbsp; Dongkrak
                            </div>
                        </div>
                    </div>

                    <br>

                    <h6 class="mb-3">Foto Kendaraan</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="damage_1" id="damage_1" type="file" class="form-control mt-2 @error('damage_1') is-invalid @enderror" value="{{old('damage_1')}}">
                                &nbsp;&nbsp;&nbsp; Kerusakan 1
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="damage_2" id="damage_2" type="file" class="form-control mt-2 @error('damage_2') is-invalid @enderror" value="{{old('damage_2')}}">
                                &nbsp;&nbsp;&nbsp; Kerusakan 2
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="damage_3" id="damage_3" type="file" class="form-control mt-2 @error('damage_3') is-invalid @enderror" value="{{old('damage_3')}}">
                                &nbsp;&nbsp;&nbsp; Kerusakan 3
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="damage_4" id="damage_4" type="file" class="form-control mt-2 @error('damage_4') is-invalid @enderror" value="{{old('damage_4')}}">
                                &nbsp;&nbsp;&nbsp; Kerusakan 4
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="damage_5" id="damage_5" type="file" class="form-control mt-2 @error('damage_5') is-invalid @enderror" value="{{old('damage_5')}}">
                                &nbsp;&nbsp;&nbsp; Kerusakan 5
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="damage_6" id="damage_6" type="file" class="form-control mt-2 @error('damage_6') is-invalid @enderror" value="{{old('damage_6')}}">
                                &nbsp;&nbsp;&nbsp; Kerusakan 6
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="damage_7" id="damage_7" type="file" class="form-control mt-2 @error('damage_7') is-invalid @enderror" value="{{old('damage_7')}}">
                                &nbsp;&nbsp;&nbsp; Kerusakan 7
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="damage_8" id="damage_8" type="file" class="form-control mt-2 @error('damage_8') is-invalid @enderror" value="{{old('damage_8')}}">
                                &nbsp;&nbsp;&nbsp; Kerusakan 8
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="damage_9" id="damage_9" type="file" class="form-control mt-2 @error('damage_9') is-invalid @enderror" value="{{old('damage_9')}}">
                                &nbsp;&nbsp;&nbsp; Kerusakan 9
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="{{ asset('paper') . '/' . ("img/input-file.png") }}" alt="" class="img-fluid" width="200px">
                                <input name="damage_10" id="damage_10" type="file" class="form-control mt-2 @error('damage_10') is-invalid @enderror" value="{{old('damage_10')}}">
                                &nbsp;&nbsp;&nbsp; Kerusakan 10
                            </div>
                        </div>                        
                    </div>
                </form>
            </div>
            <div class="card-footer text-right">
                <a href="#" class="btn btn-dark ">Kembali</a>
                <a href="#" class="btn btn-outline-danger">Simpan & Buat PDF</a>
                <a href="#" class="btn btn-danger">Selanjutnya</a>
            </div>
        </div>
    </div>
</div>
@endsection
