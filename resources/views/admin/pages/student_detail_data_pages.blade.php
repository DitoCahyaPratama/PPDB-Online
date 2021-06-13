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
            <h6 class="m-0 font-weight-bold text-primary">Detail Data Calon Siswa</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <img src="">
                </div>
                <div class="col-lg-6">
                    <h5>Nama</h5>
                    <p>{{$studentData->name}}</p>
                    <h5>Alamat</h5>
                    <p>{{$studentData->address}}</p>
                    <h5>NIK</h5>
                    <p>{{$studentData->nik}}</p>
                    <h5>Tempat Lahir</h5>
                    <p>{{$studentData->place_born}}</p>
                    <h5>Tanggal Lahir</h5>
                    <p>{{$studentData->date_born}}</p>
                    <h5>Jenis Kelamin</h5>
                    <p>{{$studentData->gender}}</p>
                    <h5>Agama</h5>
                    <p>{{$studentData->nameReligion}}</p>
                    <h5>Provinsi</h5>
                    <p>{{$studentData->nameProvinces}}</p>
                    <h5>Kabupaten</h5>
                    <p>{{$studentData->nameRegencies}}</p>
                    {{-- <h5>Kota</h5>
                    <p>{{$studentData->name']}}</p> --}}
                    <h5>Kecamatan</h5>
                    <p>{{$studentData->nameDistricts}}</p>
                    <h5>Desa</h5>
                    <p>{{$studentData->nameVillages}}</p>
                    <h5>No Hp</h5>
                    <p>{{$studentData->phone_number}}</p>
                </div>
            </div>
        </div>

    </div>
@endsection
