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
            <h6 class="m-0 font-weight-bold text-primary">Seleksi Kesehatan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Calon Siswa</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($healthData as $healthDatas)
                        <tr>
                            <td>{{ $no++ }}</td>    
                            <td>{{ $healthDatas->student->name }}</td>    
                            <td style="width: 30%"><center><img src="{{ asset('storage/'.$healthDatas->photo) }}" class="img-fluid" width="50%"></center></td>    
                            <td>
                                @if ($healthDatas->status == 0)
                                    <h6>Belum Terdapat Status</h6>
                                @elseif ($healthDatas->status == 1)
                                    <h6 class="text-success">Diterima</h6>
                                @elseif ($healthDatas->status == 2)
                                    <h6 class="text-danger">Ditolak</h6>
                                @endif
                            </td>    
                            <td>
                                <a href="{{route('selectionhealths.detail',['id'=>$healthDatas->id])}}" class="btn btn-warning ">Detail</a>
                                <a href="{{route('selectionhealths.statusupdate',['id'=>$healthDatas->id,'status'=>1])}}" class="btn btn-success @if ($healthDatas->status == 1 || $healthDatas->status == 2) disabled @endif" onclick="return confirm('Terima surat kesehatan ?')">Terima</a>
                                <a href="{{route('selectionhealths.statusupdate',['id'=>$healthDatas->id,'status'=>2])}}" class="btn btn-danger @if ($healthDatas->status == 1 || $healthDatas->status == 2) disabled @endif" onclick="return confirm('Tolak surat kesehatan ?')">Tolak</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
