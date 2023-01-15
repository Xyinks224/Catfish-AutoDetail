@extends('layouts.app', [
    'class' => ''
])

@section('title')
Crew
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Crew List</h4>
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('success')}}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <a href="{{ route('superadmin.crew.create') }}" class="btn btn-danger">Add Crew</a>
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead class="text-white bg-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Posisi</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($crews as $crew)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $crew->name }}</td>
                                        <td>{{ $crew->position }}</td>
                                        <td>{{ $crew->phone_number }}</td>
                                        <td>{{ $crew->birthplace }}</td>
                                        <td>{{ $crew->birthdate }}</td>
                                        <td>{{ $crew->address }}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('superadmin.crew.show', $crew->id) }}" class="btn btn-info" ><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('superadmin.crew.edit', $crew->id) }}" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('superadmin.crew.destroy', $crew->id) }}" method="POST">
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


