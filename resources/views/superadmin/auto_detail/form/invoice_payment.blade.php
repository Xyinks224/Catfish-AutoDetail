@extends('layouts.app', [
    'class' => ''
])

@section('title')
Form Auto Detailing - Invoice Pelunasan
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
            <div class="card card-stats bg-dark border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">5</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-light card-category">Invoice Pelunasan</p>
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
                <h5><b>Dokumen Invoice Pelunasan</b></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.form.invoice.payment.store', $autoDetail->id) }}" class="mt-2" method="POST">
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
                                <label for="paid_amount" class="text-dark">Nominal DP</label>
                                <input type="text" class="form-control" value="{{old('paid_amount', $autoDetail->paid_format)}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="minus_amount" class="text-dark">Nominal Pelunasan</label>
                                <input type="text" class="form-control" value="{{old('minus_amount', $autoDetail->minus_format)}}" disabled>
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
                                <label for="payment_method" class="text-dark">Metode Pembayaran</label>
                                <select name="payment_method" class="form-control" disabled>
                                    <option value="transfer" {{ old('payment_method', $autoDetail->payment_method ?? '') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                    <option value="tunai" {{ old('payment_method', $autoDetail->payment_method ?? '') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                </select>
                                @include('layouts.error', ['errorName' => 'payment_method'])
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_facilities" class="text-dark">Fasilitas Produk</label>
                                <input type="text" class="form-control" value="{{old('product_facilities', $autoDetail->product->facility)}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_payment" class="text-dark">Tanggal Pembayaran</label>
                                <input name="date_payment" type="date" class="bg-light form-control @error('date_payment') is-invalid @enderror" value="{{old('date_payment', $autoDetail->date_payment)}}" required>
                                @include('layouts.error', ['errorName' => 'date_payment'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver_payment" class="text-dark">Penerima</label>
                                <input name="receiver_payment" type="text" class="bg-light form-control @error('receiver_payment') is-invalid @enderror" value="{{old('receiver_payment', $autoDetail->receiver_payment)}}" required>
                                @include('layouts.error', ['errorName' => 'receiver_payment'])
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right" onclick="this.form.submit()">
                        <a href="{{ route('superadmin.form.warrant', $autoDetail->id) }}" class="btn btn-dark ">Kembali</a>
                        <button name="next_type" value="print" class="btn btn-outline-danger">Simpan & BUAT PDF</button>
                        <button name="next_type" value="next" class="btn btn-danger">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
