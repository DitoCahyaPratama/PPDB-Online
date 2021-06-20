@extends('admin.layouts.admin')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Detail Prestasi Calon Siswa</h6>
    </div>
    <div class="card-body">
        <h6>Nama Calon Siswa : <b>{{$achievData->nameStudents}}</b></h6>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <img src="{{asset($achievData->achievementsPhoto1)}}" class="img-fluid">
                <h6 class="text-center">{{$achievData->achievements2}}</h6>
            </div>
            <div class="col-lg-4">
                <img src="{{asset($achievData->achievementsPhoto2)}}" class="img-fluid">
                <h6 class="text-center">{{$achievData->achievements2}}</h6>
            </div>
            <div class="col-lg-4">
                <img src="{{asset($achievData->achievementsPhoto3)}}" class="img-fluid">
                <h6 class="text-center">{{$achievData->achievements3}}</h6>
            </div>
        </div>
    </div>

</div>

@endsection