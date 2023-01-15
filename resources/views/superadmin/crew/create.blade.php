@extends('layouts.app', [
    'class' => ''
])

@section('title')
Crew - Add
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
                        <li class="breadcrumb-item">Add</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header text-center text-white bg-dark">
                <h5><b>Add Crew</b></h5>
            </div>
            <form action="{{ route('superadmin.crew.store') }}" class="mt-4" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('success')}}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="text-dark">Nama</label>
                                <input name="name" type="text" class="bg-light form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="position" class="text-dark">Position</label>
                                <input name="position" type="text" class="bg-light form-control @error('position') is-invalid @enderror" value="{{old('position')}}" required>
                                @if ($errors->has('position'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="date_start_work" class="text-dark">Bekerja Mulai</label>
                                <input name="date_start_work" type="date" class="bg-light form-control @error('date_start_work') is-invalid @enderror" value="{{old('date_start_work')}}" required>
                                @if ($errors->has('date_start_work'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('date_start_work') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone_number" class="text-dark">Nomor Telepon</label>
                                <input name="phone_number" type="number" class="bg-light form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number')}}" required>
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
                                <input name="email" type="text" class="bg-light form-control @error('email') is-invalid @enderror" value="{{old('email')}}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="birthplace" class="text-dark">Tempat Lahir</label>
                                <input name="birthplace" type="text" class="bg-light form-control @error('birthplace') is-invalid @enderror" value="{{old('birthplace')}}" required>
                                @if ($errors->has('birthplace'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('birthplace') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="birthdate" class="text-dark">Tanggal Lahir</label>
                                <input name="birthdate" type="date" class="bg-light form-control @error('birthdate') is-invalid @enderror" value="{{old('birthdate')}}" required>
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
                                <textarea name="address" id="address" cols="30" rows="10" class="bg-light form-control @error('address') is-invalid @enderror" value="{{old('address')}}"></textarea>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-danger"> ADD </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
