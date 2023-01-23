@extends('layouts.app', [
    'class' => ''
])

@section('title')
Form Auto Detailing - Invoice DP
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
            <div class="card card-stats bg-dark border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">2</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-white">Invoice DP</p>
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
                <h5><b>Dokumen Invoice Down Payment</b></h5>
            </div>
            <form action="{{ route('superadmin.form.invoice.dp.store', $autoDetail->id) }}" method="POST" class="mt-2">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_name" class="text-dark">Nama Customer</label>
                                <input type="text" class="form-control" value="{{old('customer_name', $autoDetail->customer->name ?? '')}}" required disabled>
                                @include('layouts.error', ['errorName' => 'customer_name'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="order_id" class="text-dark">ORDER ID</label>
                                <input type="text" class="form-control" value="{{old('order_id', $autoDetail->order_id)}}" required disabled>
                                @include('layouts.error', ['errorName' => 'order_id'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dp_date" class="text-dark">Tanggal Down Payment</label>
                                <input name="date_down_payment" type="date" class="bg-light form-control @error('date_down_payment') is-invalid @enderror" value="{{old('date_down_payment', $autoDetail->date_down_payment ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'date_down_payment'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_id" class="text-dark">Produk Yang Dipilih</label>
                                <select name="product_id" id="product_id" class="bg-light form-control @error('product_id') is-invalid @enderror" value="{{old('product_id')}}">
                                    <option value="" disabled selected>Pilih Tipe</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" {{ old('product_id', $autoDetail->product->id ?? '') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @include('layouts.error', ['errorName' => 'product_id'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_facilities" class="text-dark">Harga Produk</label>
                                <input type="text" class="product-price form-control" value="" id="product_price_0" disabled>
                                @foreach ($products as $product)
                                <input type="text" class="product-price form-control" style="display: none;" id="product_price_{{ $product->id }}" value="{{ $product->price_format }}" disabled>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment_method" class="text-dark">Metode Pembayaran</label>
                                <select name="payment_method" class="bg-light form-control @error('payment_method') is-invalid @enderror" value="{{old('payment_method')}}" required  id="">
                                    <option value="transfer" {{ old('payment_method', $autoDetail->payment_method ?? '') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                    <option value="tunai" {{ old('payment_method', $autoDetail->payment_method ?? '') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                </select>
                                @include('layouts.error', ['errorName' => 'payment_method'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_facilities" class="text-dark">Fasilitas Produk</label>
                                <input type="text" class="product form-control" value="" id="product_0" disabled>
                                @foreach ($products as $product)
                                <input type="text" class="product form-control" style="display: none;" id="product_{{ $product->id }}" value="{{ $product->facility }}" disabled>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note_payment" class="text-dark">Catatan Tambahan</label>
                                <input type="text" name="note_payment" class="bg-light form-control @error('note_payment') is-invalid @enderror" value="{{old('note_payment', $autoDetail->note_payment ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'note_payment'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paid_amount" class="text-dark">Down Payment</label>
                                <input name="paid_amount" type="number" class="bg-light form-control @error('paid_amount') is-invalid @enderror" value="{{old('paid_amount', $autoDetail->paid_amount ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'type'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="minus_amount" class="text-dark">Kekurangan</label>
                                <input name="minus_amount" type="number" class="bg-light form-control @error('minus_amount') is-invalid @enderror" value="{{old('minus_amount', $autoDetail->minus_amount ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'minus_amount'])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right" onclick="this.form.submit()">
                    <a href="{{ route('superadmin.form.vehicle.received') }}" class="btn btn-dark ">Kembali</a>
                    <button name="next_type" value="print" class="btn btn-outline-danger">Simpan & BUAT PDF</button>
                    <button name="next_type" value="next" class="btn btn-danger">Selanjutnya</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $('#product_id').on('change',function(){
        $(".product").hide();
        $(".product-price").hide();
        var some = $(this).find('option:selected').val();
        $("#product_" + some).show();
        $("#product_price_" + some).show();
    });
</script>
@endpush
