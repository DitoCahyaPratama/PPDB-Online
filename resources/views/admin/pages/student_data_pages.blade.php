@extends('admin.layouts.admin')

@section('content')
@if(session('successful_message'))
<div class="alert alert-success">
    {{ session('successful_message') }}
</div>
@endif

@if(session('failed_message'))
<div class="alert alert-danger">
    {{ session('failed_message') }}
</div>
@endif
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Calon Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>No Hp</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                    @endphp
                    @foreach ($studentData as $studentDatas)
                    <tr>
                        <td>{{ $no++ }}</td>    
                        <td>{{ $studentDatas->name }}</td>    
                        <td>{{ $studentDatas->nik }}</td>      
                        <td>{{ $studentDatas->gender }}</td>      
                        <td>{{ $studentDatas->phone_number }}</td>      
                        <td><img src="{{ $studentDatas->phone_number }}" class="img-fluid"></td>    
                        <td>
                            <a href="{{route('studentdata.detail',['id'=>$studentDatas->id])}}" class="btn btn-success">Detail</a>
                            {{-- <a href="{{route('userdata.delete',['id'=>$studentDatas->id])}}" class="btn btn-danger" onclick="return confirm('hapus data user yang anda pilih?')">Hapus</a> --}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
