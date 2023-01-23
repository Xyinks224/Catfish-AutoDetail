@extends('layouts.app', [
    'class' => ''
])

@section('title')
Form Auto Detailing - SPK Pekerjaan
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
            <div class="card card-stats bg-dark border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">4</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-white card-category">SPK Pekerjaan</p>
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
                <h5><b>Dokumen Surat Perintah Kerja</b></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.form.warrant.store', $autoDetail->id) }}" class="mt-2" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_name" class="text-dark">Nama Customer</label>
                                <input type="text" class="form-control" value="{{old('customer_name', $autoDetail->customer->name ?? '')}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="order_id" class="text-dark">ORDER ID</label>
                                <input type="text" class="form-control" value="{{old('order_id', $autoDetail->order_id)}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_id" class="text-dark">Produk Yang Dipilih</label>
                                <select name="product_id" id="product_id" class="form-control" disabled>
                                    <option value="{{ $autoDetail->product->id }}">{{ $autoDetail->product->name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estimate" class="text-dark">Estimasi Waktu</label>
                                <input name="estimate" type="date" class="bg-light form-control @error('estimate') is-invalid @enderror" value="{{old('estimate', $autoDetail->estimate)}}" required>
                                @include('layouts.error', ['errorName' => 'estimate'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_facilities" class="text-dark">Fasilitas Produk</label>
                                <input type="text" class="form-control" value="{{old('product_facilities', $autoDetail->product->facility)}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="warrant_notes" class="text-dark">Catatan Tambahan</label>
                                <input type="warrant_notes" name="warrant_notes" class="bg-light form-control @error('warrant_notes') is-invalid @enderror" value="{{old('warrant_notes',$autoDetail->warrant_notes)}}" required>
                                @include('layouts.error', ['errorName' => 'warrant_notes'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="crew_id" class="text-dark">Nama Crew</label>
                                <select name="crew_id" id="" class="bg-light form-control @error('crew_id') is-invalid @enderror" value="{{old('crew_id')}}" required>
                                    @foreach ($crews as $crew)
                                        <option value="{{ $crew->id }}" {{ old('crew_id', $crew->id) == $crew->id ? 'selected' : '' }}>{{ $crew->name }}</option>
                                    @endforeach
                                </select>
                                @include('layouts.error', ['errorName' => 'crew_id'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pic_id" class="text-dark">Nama PIC</label>
                                <select name="pic_id" id="" class="bg-light form-control @error('pic_id') is-invalid @enderror" value="{{old('pic_id')}}" required>
                                    @foreach ($crews as $crew)
                                        <option value="{{ $crew->id }}" {{ old('pic_id', $crew->id) == $crew->id ? 'selected' : '' }}>{{ $crew->name }}</option>
                                    @endforeach
                                </select>
                                @include('layouts.error', ['errorName' => 'pic_id'])
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right" onclick="this.form.submit()">
                        <a href="{{ route('superadmin.form.vehicle.inspection', $autoDetail->id) }}" class="btn btn-dark ">Kembali</a>
                        <button name="next_type" value="print" class="btn btn-outline-danger">Simpan & BUAT PDF</button>
                        <button name="next_type" value="next" class="btn btn-danger">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
