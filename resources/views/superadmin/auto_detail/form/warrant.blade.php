@extends('layouts.app', [
    'class' => ''
])

@section('title')
Form Auto Detailing - SPK Pekerjaan
@endsection

@section('content')
<div class="content">
    <div class="container">
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>This is a notification with close button.</span>
        </div>

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
                <h5><b>Dokumen Invoice Down Payment</b></h5>
            </div>
            <div class="card-body">
                <form action="" class="mt-2">
                    <h6 class="mb-3">Informasi Data Diri</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_name" class="text-dark">Nama Customer</label>
                                <input name="customer_name" type="text" class="bg-light form-control @error('customer_name') is-invalid @enderror" value="{{old('customer_name')}}" required>
                                @include('layouts.error', ['errorName' => 'customer_name'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="order_id" class="text-dark">ORDER ID</label>
                                <input name="order_id" type="text" class="bg-light form-control @error('order_id') is-invalid @enderror" value="{{old('order_id')}}" required>
                                @include('layouts.error', ['errorName' => 'order_id'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label name="product_id" class="text-dark">Produk Yang Dipilih</label>
                                <select name="product_id" id="" class="bg-light form-control @error('product_id') is-invalid @enderror" value="{{old('product_id')}}">
                                    <option value="">A</option>
                                    <option value="">B</option>
                                    <option value="">C</option>
                                </select>
                                @include('layouts.error', ['errorName' => 'product_id'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dp_date" class="text-dark">Estimasi Waktu</label>
                                <input name="dp_date" type="date" class="bg-light form-control @error('dp_date') is-invalid @enderror" value="{{old('dp_date')}}" required>
                                @include('layouts.error', ['errorName' => 'dp_date'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_facilities" class="text-dark">Fasilitas Produk</label>
                                <input type="text" name="product_facilities" class="bg-light form-control @error('product_facilities') is-invalid @enderror" value="{{old('product_facilities')}}" required></input>
                                @include('layouts.error', ['errorName' => 'product_facilities'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note" class="text-dark">Catatan Tambahan</label>
                                <input type="note" name="note" class="bg-light form-control @error('note') is-invalid @enderror" value="{{old('note')}}" required></input>
                                @include('layouts.error', ['errorName' => 'note'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dp" class="text-dark">Nama Crew</label>
                                <input name="dp" type="text" class="bg-light form-control @error('dp') is-invalid @enderror" value="{{old('type')}}" required>
                                @include('layouts.error', ['errorName' => 'type'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="insufficient_payment" class="text-dark">Nama PIC</label>
                                <input name="insufficient_payment" type="text" class="bg-light form-control @error('insufficient_payment') is-invalid @enderror" value="{{old('insufficient_payment')}}" required>
                                @include('layouts.error', ['errorName' => 'insufficient_payment'])
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
