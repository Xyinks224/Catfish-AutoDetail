@extends('layouts.app', [
    'class' => ''
])

@section('title')
Form Auto Detailing - Kendaraan Diserahkan
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
            <div class="card card-stats bg-dark border-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="icon-big text-center">
                                <h6 class="text-danger">6</h6>
                            </div>
                        </div>
                        <div class="col-md-8 text-center">
                            <p class="text-light card-category">Kendaraan Diserahkan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="card mt-4">
            <div class="card-header text-center mt-4">
                <h5><b>Dokumen Penyerahan Kendaraan</b></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.form.vehicle.delivery.store', $autoDetail->id) }}"  enctype="multipart/form-data" class="mt-2" method="POST">
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
                                <label for="date_delivery" class="text-dark">Tanggal Penyerahan</label>
                                <input name="date_delivery" type="date" class="bg-light form-control @error('date_delivery') is-invalid @enderror" value="{{old('date_delivery', $autoDetail->date_delivery)}}" required>
                                @include('layouts.error', ['errorName' => 'date_delivery'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="crew_delivery" class="text-dark">Yang Menyerahkan</label>
                                <input name="crew_delivery" type="text" class="bg-light form-control @error('crew_delivery') is-invalid @enderror" value="{{old('crew_delivery', $autoDetail->crew_delivery)}}" required>
                                @include('layouts.error', ['errorName' => 'crew_delivery'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver_delivery" class="text-dark">Yang Menerima</label>
                                <input name="receiver_delivery" type="text" class="bg-light form-control @error('receiver_delivery') is-invalid @enderror" value="{{old('receiver_delivery', $autoDetail->receiver_delivery)}}" required>
                                @include('layouts.error', ['errorName' => 'receiver_delivery'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vehicle_condition" class="text-dark">Kondisi Kendaraan</label>
                                <input name="vehicle_condition" type="text" class="bg-light form-control @error('vehicle_condition') is-invalid @enderror" value="{{old('vehicle_condition', $autoDetail->vehicle_condition)}}" required>
                                @include('layouts.error', ['errorName' => 'vehicle_condition'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="delivery_evidence_1Preview" src="{{ $autoDetail->delivery_evidence_1 ? asset('storage/'.$autoDetail->delivery_evidence_1) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="delivery_evidence_1" id="delivery_evidence_1" type="file" class="form-control mt-2 @error('delivery_evidence_1') is-invalid @enderror" value="{{old('delivery_evidence_1')}}" onchange="delivery_evidence_1PreviewImage();">                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="delivery_evidence_2Preview" src="{{ $autoDetail->delivery_evidence_2 ? asset('storage/'.$autoDetail->delivery_evidence_2) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="delivery_evidence_2" id="delivery_evidence_2" type="file" class="form-control mt-2 @error('delivery_evidence_2') is-invalid @enderror" value="{{old('delivery_evidence_2')}}" onchange="delivery_evidence_2PreviewImage();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="delivery_evidence_3Preview" src="{{ $autoDetail->delivery_evidence_3 ? asset('storage/'.$autoDetail->delivery_evidence_3) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="delivery_evidence_3" id="delivery_evidence_3" type="file" class="form-control mt-2 @error('delivery_evidence_3') is-invalid @enderror" value="{{old('delivery_evidence_3')}}" onchange="delivery_evidence_3PreviewImage();">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="delivery_evidence_4Preview" src="{{ $autoDetail->delivery_evidence_4 ? asset('storage/'.$autoDetail->delivery_evidence_4) : asset('paper') . '/' . ("img/input-file.png") }}" class="img-fluid" width="200px">
                                <input name="delivery_evidence_4" id="delivery_evidence_4" type="file" class="form-control mt-2 @error('delivery_evidence_4') is-invalid @enderror" value="{{old('delivery_evidence_4')}}" onchange="delivery_evidence_4PreviewImage();">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right" onclick="this.form.submit()">
                        <a href="{{ route('superadmin.form.invoice.payment', $autoDetail->id) }}" class="btn btn-dark ">Kembali</a>
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
    function delivery_evidence_1PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("delivery_evidence_1").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("delivery_evidence_1Preview").src = oFREvent.target.result;
        };
    };

    function delivery_evidence_2PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("delivery_evidence_2").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("delivery_evidence_2Preview").src = oFREvent.target.result;
        };
    };

    function delivery_evidence_3PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("delivery_evidence_3").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("delivery_evidence_3Preview").src = oFREvent.target.result;
        };
    };

    function delivery_evidence_4PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("delivery_evidence_4").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("delivery_evidence_4Preview").src = oFREvent.target.result;
        };
    };
</script>
@endpush