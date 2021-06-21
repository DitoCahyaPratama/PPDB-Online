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
            <h6 class="m-0 font-weight-bold text-primary">Seleksi Jalur Raport Jurusan {{$departement}}</h6>
        </div>
        <div class="card-body">
            <h6>Tanggal Hari Ini : {{ date('d M Y') }}</h6>
            <h6>Jumlah Pendaftar : {{ $countStudents }}</h6>
            @if (date('Y-m-d') >= $configData->date_registration_selection_report_end)
                @if ($countStudents == 0)
                <div class="alert alert-warning">
                    <span>Seleksi telah berakhir, data jurusan {{$departement}} tidak difinalisasi dikarenakan jumlah siswa masih kosong</span>
                </div>
                @else 
                <div class="alert alert-info">
                    <span>Seleksi telah berakhir, silahkan untuk menekan tombol berikut untuk memfinalisasi seleksi data jurusan {{$departement}}</span>
                    <br>
                    <a href="{{route('selectionreports.finalization',['departementId'=>$depId])}}" class="btn btn-info @if ($countFinalization > 0) disabled @endif">Finalisasi</a>
                </div>
                @endif
            @endif
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Calon Siswa</th>
                            <th>Agama</th>
                            <th>PKN</th>
                            <th>BI</th>
                            <th>IPA</th>
                            <th>IPS</th>
                            <th>Rata-Rata</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                    @endphp
                    @foreach ($reportData as $reportDatas)
                    <tr>
                        <td>{{ $no++ }}</td>    
                        <td>{{ $reportDatas->nameStudents }}</td>    
                        <td>{{ $reportDatas->agama }}</td>      
                        <td>{{ $reportDatas->pkn }}</td>      
                        <td>{{ $reportDatas->bi }}</td>      
                        <td>{{ $reportDatas->ipa }}</td>
                        <td>{{ $reportDatas->ips }}</td>
                        <td>{{ $reportDatas->avg }}</td>
                        <td>
                            @if ($reportDatas->status == 0)
                            belum ada status
                            @elseif ($reportDatas->status == 1)
                            diterima
                            @else
                            ditolak
                            @endif
                            {{-- {{ $reportDatas->status == 0 ? 'belum ada status' : $reportDatas->status == 1 ? 'diterima' : 'ditolak'}} --}}
                        </td>
                    </tr>
                    @endforeach 
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

