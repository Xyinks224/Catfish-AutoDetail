@extends('layouts.app', [
    'class' => ''
])

@section('title')
Form Auto Detailing - Finish
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
            <div class="card card-stats bg-dark border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">5</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-white card-category">Invoice Pelunasan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-stats bg-dark border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">6</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-white card-category">Kendaraan Diserahkan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="card mt-4">
            <div class="card-header text-center mt-4">
                <h5 class="text-danger"><b>Autodetailing Selesai!</b></h5>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('paper') . '/' . ("img/car-1.png") }}" alt="">
                <p>
                    Terimakasih pengerjaan autodetail ORDER ID <b>{{ $autoDetail->order_id }}</b> atas nama customer <b>{{ $autoDetail->customer->name }}</b>, tipe <b>{{ $autoDetail->vehicle->type == '2_wheels' ? 'Motor' : 'Mobil' }}</b> merk <b>{{ $autoDetail->vehicle->merk }}</b> model <b>{{ $autoDetail->vehicle->model }}</b> nopol <b>{{ $autoDetail->vehicle->license_plate }}</b> pilihan paket <b>{{ $autoDetail->product->name }}</b> telah selesai dilakukan.
                </p>
            </div>
            <div class="card-footer text-center">
                <p class="card-category">Klik Finish untuk melakukan pengerjaan autodetailing berikutnya !</p>
                <a href="{{ route('superadmin.form.home') }}" class="btn btn-danger">Finish</a>
            </div>
        </div>
    </div>
</div>
@endsection
