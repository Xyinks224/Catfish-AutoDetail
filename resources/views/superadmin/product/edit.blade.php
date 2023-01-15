@extends('layouts.app', [
    'class' => ''
])

@section('title')
Product - Add
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="{{ route('superadmin.product.index') }}" class="breadcrumb-item">Home</a>
                        <li class="breadcrumb-item">Edit</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header text-center text-white bg-dark">
                <h5><b>Edit Product</b></h5>
            </div>
            <form action="{{ route('superadmin.product.update', $product->id) }}" class="mt-4" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('success')}}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="text-dark">Nama Produk</label>
                                <input name="name" type="text" class="bg-light form-control @error('name') is-invalid @enderror" value="{{old('name', $product->name ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'name'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price" class="text-dark">Harga Produk</label>
                                <input name="price" type="number" class="bg-light form-control @error('price') is-invalid @enderror" value="{{old('price', $product->price ?? '')}}" required>
                                @include('layouts.error', ['errorName' => 'price'])
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="facility" class="text-dark">Fasilitas Produk</label>
                                <textarea name="facility" id="facility" cols="30" rows="10" class="bg-light form-control @error('facility') is-invalid @enderror" required>{{  old('facility', $product->facility ?? '') }}</textarea>
                                @include('layouts.error', ['errorName' => 'facility'])
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
