@extends('layouts.app', [
    'class' => ''
])

@section('title')
Customer - Edit
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="{{ route('superadmin.crew.index') }}" class="breadcrumb-item">Home</a>
                        <li class="breadcrumb-item">Edit</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header text-center text-white bg-dark">
                <h5><b>Edit Customer</b></h5>
            </div>
            <form action="{{ route('superadmin.customer.update', $customer->id) }}" class="mt-4" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('success')}}
                    </div>
                    @endif
                    <h6 class="mb-3">Informasi Data Diri</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="text-dark">Nama</label>
                                <input name="name" type="text" class="bg-light form-control @error('name') is-invalid @enderror" value="{{old('name', $customer->name)}}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone_number" class="text-dark">Nomor Telepon</label>
                                <input name="phone_number" type="number" class="bg-light form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number', $customer->phone_number)}}" required>
                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="text-dark">Email</label>
                                <input name="email" type="text" class="bg-light form-control @error('email') is-invalid @enderror" value="{{old('email', $customer->email)}}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="birthdate" class="text-dark">Tanggal Lahir</label>
                                <input name="birthdate" type="date" class="bg-light form-control @error('birthdate') is-invalid @enderror" value="{{old('birthdate', $customer->birthdate)}}" required>
                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address" class="text-dark">Alamat Lengkap</label>
                                <textarea name="address" id="address" cols="30" rows="10" class="bg-light form-control @error('address') is-invalid @enderror" required>{{old('address', $customer->address ?? '')}}</textarea>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-3 mt-4">Informasi Kendaraan</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="type" class="text-dark">Tipe</label>
                                <select name="type" id="type" class="bg-light form-control @error('type') is-invalid @enderror" required>
                                    <option value="2_wheels" {{ old('type', $vehicle->type ?? '') == '2_wheels' ? 'selected' : '' }}>Roda 2</option>
                                    <option value="4_wheels" {{ old('type', $vehicle->type ?? '') == '4_wheels' ? 'selected' : '' }}>Roda 4</option>
                                </select>
                                @include('layouts.error', ['errorName' => 'type'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="merk" class="text-dark">Merek</label>
                                <input name="merk" type="text" class="bg-light form-control @error('merk') is-invalid @enderror" value="{{old('merk', $vehicle->merk ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'merk'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="model" class="text-dark">Model</label>
                                <input name="model" type="text" class="bg-light form-control @error('model') is-invalid @enderror" value="{{old('model', $vehicle->model ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'model'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="license_plate" class="text-dark">No Polisi</label>
                                <input name="license_plate" type="text" class="bg-light form-control @error('license_plate') is-invalid @enderror" value="{{old('license_plate', $vehicle->license_plate ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'license_plate'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="km" class="text-dark">Kilometer</label>
                                <input name="km" type="number" class="bg-light form-control @error('km') is-invalid @enderror" value="{{old('km', $vehicle->km ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'km'])
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-danger"> EDIT </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
