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
            <h6 class="m-0 font-weight-bold text-primary">Data Prestasi Calon Siswa {{ $departement }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Calon Siswa</th>
                            <th>Prestasi 1</th>
                            <th>Prestasi 2</th>
                            <th>Prestasi 3</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($achievData as $achievDatas)
                            <tr>
                                <td>{{ $no++ }}</td> 
                                <td>{{$achievDatas->student->name}}</td>
                                <td>{{$achievDatas->achievement1->name}}</td>
                                <td>{{$achievDatas->achievement2->name}}</td>
                                <td>{{$achievDatas->achievement3->name}}</td>
                                <td>
                                    @if ($achievDatas->status == 0)
                                        <span>Belum Ada Status</span>
                                    @elseif ($achievDatas->status == 1)
                                        <span class="text-success">Lolos</span>
                                    @elseif ($achievDatas->status == 2)
                                        <span class="text-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('selectionachievement.detail',['id'=>$achievDatas->id])}}" class="btn btn-warning">Detail</a>
                                    <a href="{{route('selectionachievement.statusupdate',['id'=>$achievDatas->id,'departementId'=>$achievDatas->department_id,'status'=>1])}}" class="btn btn-success @if ($achievDatas->status == 1 || $achievDatas->status == 2) disabled @endif">Lolos</a>
                                    <a href="{{route('selectionachievement.statusupdate',['id'=>$achievDatas->id,'departementId'=>$achievDatas->department_id,'status'=>2])}}" class="btn btn-danger @if ($achievDatas->status == 1 || $achievDatas->status == 2) disabled @endif">Tolak</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
