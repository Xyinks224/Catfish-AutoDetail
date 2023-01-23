@extends('layouts.app', [
    'class' => ''
])

@section('title')
Form Auto Detailing - Kendaraan Diterima
@endsection

@section('content')
<div class="content">
    <div class="container">

        <h6>Alur Pengerjaan</h6>
        <div class="card-group">
            <div class="card card-stats bg-dark border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="icon-big">
                                <h6 class="text-danger">1</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-white card-category">Kendaraan Diterima</p>
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
            <div class="card card-stats bg-light border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">3</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-dark card-category">Inspeksi Kendaraan</p>
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
                <h5><b>Dokumen Penerimaan Kendaraan</b></h5>
            </div>
            <form action="{{ route('superadmin.form.vehicle.received.store', $autoDetail->id) }}" method="POST" class="mt-2">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <h6 class="mb-3">Informasi Data Diri</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="text-dark">Nama</label>
                                <input name="name" type="text" class="bg-light form-control @error('name') is-invalid @enderror" value="{{old('name', $autoDetail->customer->name ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'name'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number" class="text-dark">Nomor Telepon</label>
                                <input name="phone_number" type="text" class="bg-light form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number', $autoDetail->customer->phone_number ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'phone_number'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="text-dark">Email</label>
                                <input name="email" type="text" class="bg-light form-control @error('email') is-invalid @enderror" value="{{old('email', $autoDetail->customer->email ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'email'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthdate" class="text-dark">Tanggal Lahir</label>
                                <input name="birthdate" type="date" class="bg-light form-control @error('birthdate') is-invalid @enderror" value="{{old('birthdate', $autoDetail->customer->birthdate ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'birthdate'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address" class="text-dark">Alamat Lengkap</label>
                                <textarea name="address" class="bg-light form-control @error('address') is-invalid @enderror" required id="" cols="30" rows="10">{{old('address', $autoDetail->customer->address ?? '')}}</textarea>
                                @include('layouts.error', ['errorName' => 'address'])
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-3 mt-4">Informasi Kendaraan</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type" class="text-dark">Tipe</label>
                                <select name="type" id="type" class="bg-light form-control @error('type') is-invalid @enderror" required>
                                    <option value="2_wheels" {{ old('type', $autoDetail->vehicle->type ?? '') == '2_wheels' ? 'selected' : '' }}>Roda 2</option>
                                    <option value="4_wheels" {{ old('type', $autoDetail->vehicle->type ?? '') == '4_wheels' ? 'selected' : '' }}>Roda 4</option>
                                </select>
                                @include('layouts.error', ['errorName' => 'type'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="merk" class="text-dark">Merek</label>
                                <input name="merk" type="text" class="bg-light form-control @error('merk') is-invalid @enderror" value="{{old('merk', $autoDetail->vehicle->merk ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'merk'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="model" class="text-dark">Model</label>
                                <input name="model" type="text" class="bg-light form-control @error('model') is-invalid @enderror" value="{{old('model', $autoDetail->vehicle->model ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'model'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="license_plate" class="text-dark">No Polisi</label>
                                <input name="license_plate" type="text" class="bg-light form-control @error('license_plate') is-invalid @enderror" value="{{old('license_plate', $autoDetail->vehicle->license_plate ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'license_plate'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year" class="text-dark">Tahun Mobil</label>
                                <input name="year" type="text" class="bg-light form-control @error('year') is-invalid @enderror" value="{{old('year', $autoDetail->vehicle->year ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'year'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="km" class="text-dark">Kilometer</label>
                                <input name="km" type="number" class="bg-light form-control @error('km') is-invalid @enderror" value="{{old('km', $autoDetail->vehicle->km ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'km'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="received_date" class="text-dark">Tanggal Penerimaan</label>
                                <input name="received_date" type="date" class="bg-light form-control @error('received_date') is-invalid @enderror" value="{{old('received_date', $autoDetail->vehicle->received_date ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'received_date'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver" class="text-dark">Penerima</label>
                                <select name="receiver" id="" class="bg-light form-control @error('receiver') is-invalid @enderror" required>
                                    @foreach ($crews as $crew)
                                        <option value="{{ $crew->id }}" {{ old('receiver', $autoDetail->crew->id ?? '') == $crew->id ? 'selected' : '' }}>{{ $crew->name }}</option>
                                    @endforeach
                                </select>
                                @include('layouts.error', ['errorName' => 'receiver'])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right mt-4 mb-4" onclick="this.form.submit()">
                    <a href="{{ route('superadmin.form.home') }}" class="btn btn-dark ">Kembali</a>
                    <button name="next_type" value="print" class="btn btn-outline-danger">Simpan & BUAT PDF</button>
                    <button name="next_type" value="next" class="btn btn-danger">Selanjutnya</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
