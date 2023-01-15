@extends('layouts.app', [
    'class' => ''
])

@section('title')
Crew - Detail
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
                        <li class="breadcrumb-item">Detail</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header text-center text-white bg-dark">
                <h5><b>Detail Crew</b></h5>
            </div>
            <div class="card-body mt-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="name" class="text-dark">Nama</label>
                    </div>
                    <div class="col-md-6">
                        {{ $crew->name }}
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="name" class="text-dark">Posisi</label>
                    </div>
                    <div class="col-md-6">
                        {{ $crew->position }}
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="name" class="text-dark">Bekerja Mulai</label>
                    </div>
                    <div class="col-md-6">
                        {{ $crew->date_start_work }}
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="name" class="text-dark">Nomor Telepon</label>
                    </div>
                    <div class="col-md-6">
                        {{ $crew->phone_number }}
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="name" class="text-dark">Email</label>
                    </div>
                    <div class="col-md-6">
                        {{ $crew->email }}
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="name" class="text-dark">Tempat, Tanggal Lahir</label>
                    </div>
                    <div class="col-md-6">
                        {{ $crew->birthplace }}, {{ date('d-m-Y', strtotime($crew->birthdate)) }}
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="name" class="text-dark">Alamat</label>
                    </div>
                    <div class="col-md-6">
                        {{ $crew->address }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
