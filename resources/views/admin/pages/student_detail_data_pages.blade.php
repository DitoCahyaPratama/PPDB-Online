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
                    <center><img src="{{asset('storage/'.$studentData->photo)}}" class="img-fluid" style="width: 80%"></center>
                </div>
                <div class="col-lg-6">
                    <h5><b>Data Umum</b></h5>
                    <h5>Nama</h5>
                    <p><b>{{$studentData->name}}</b></p>
                    <h5>Alamat</h5>
                    <p><b>{{$studentData->address}}</b></p>
                    <h5>NIK</h5>
                    <p><b>{{$studentData->nik}}</b></p>
                    <h5>Tempat Lahir</h5>
                    <p><b>{{$studentData->place_born}}</b></p>
                    <h5>Tanggal Lahir</h5>
                    <p><b>{{$studentData->date_born}}</b></p>
                    <h5>Jenis Kelamin</h5>
                    <p><b>{{$studentData->gender}}</b></p>
                    <h5>Agama</h5>
                    <p><b>{{$studentData->nameReligion}}</b></p>
                    <h5>No Hp</h5>
                    <p><b>{{$studentData->phone_number}}</b></p>
                    <hr>
                    <h5><b>Data Tempat Tinggal</b></h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Provinsi</h5>
                            <p><b>{{$studentData->nameProvinces}}</b></p>
                        </div>
                        <div class="col-lg-6">
                            <h5>Kabupaten/Kota</h5>
                            <p><b>{{$studentData->nameRegencies}}</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Kecamatan</h5>
                            <p><b>{{$studentData->nameDistricts}}</b></p>
                        </div>
                        <div class="col-lg-6">
                            <h5>Desa</h5>
                            <p><b>{{$studentData->nameVillages}}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
