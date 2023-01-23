@extends('layouts.app', [
    'class' => ''
])

@section('title')
Invoice Payment
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Invoice Payment</h4>
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('success')}}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead class="text-white bg-dark">
                                <tr>
                                    <th>ORDER ID</th>
                                    <th>Nama</th>
                                    <th>Produk yang dipilih</th>
                                    <th>Tanggal Pelunasan</th>
                                    <th>Penerima</th>>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($autoDetails as $autoDetail)
                                    <tr>
                                        <td>{{ $autoDetail->order_id }}</td>
                                        <td>{{ $autoDetail->customer->name }}</td>
                                        <td>{{ $autoDetail->product->name }}</td>
                                        <td>{{ $autoDetail->date_payment }}</td>
                                        <td>{{ $autoDetail->receiver_payment }}</td>
                                        <td>
                                            <div class="row">
                                                <a href="#" class="btn btn-info" ><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" style="background-color: red;" type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @push('scripts')
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script>
    ;
    $('#dataTable').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "{!! route('superadmin.product.data') !!}",
            type: 'GET'
        },
        columns:[
            {
                data: 'banner',
                name: 'banner'
            },

        ]
    });
</script>
@endpush --}}


