@extends('admin.layouts.admin')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Detail Prestasi Calon Siswa</h6>
    </div>
    <div class="card-body">
        <h6>Nama Calon Siswa : <b>{{$achievData->student->name}}</b></h6>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <img src="{{asset($achievData->achievement1->photo)}}" class="img-fluid">
                <br>
                <br>
                <h6><b>Data:</b></h6>
                <h6>Nama : {{$achievData->achievement1->name}}</h6>
                <h6>Tahun : {{$achievData->achievement1->year}}</h6>
                <h6>Tingkat : {{$achievData->achievement1->level}}</h6>
            </div>
            <div class="col-lg-4">
                <img src="{{asset($achievData->achievement2->photo)}}" class="img-fluid">
                <br>
                <br>
                <h6><b>Data:</b></h6>
                <h6>Nama : {{$achievData->achievement2->name}}</h6>
                <h6>Tahun : {{$achievData->achievement2->year}}</h6>
                <h6>Tingkat : {{$achievData->achievement2->level}}</h6>
            </div>
            <div class="col-lg-4">
                <img src="{{asset($achievData->achievement3->photo)}}" class="img-fluid">
                <br>
                <br>
                <h6><b>Data:</b></h6>
                <h6>Nama : {{$achievData->achievement3->name}}</h6>
                <h6>Tahun : {{$achievData->achievement3->year}}</h6>
                <h6>Tingkat : {{$achievData->achievement3->level}}</h6>
            </div>
        </div>
    </div>

</div>

@endsection