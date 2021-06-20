@extends('admin.layouts.admin')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Detail Data Kesehatan</h6>
    </div>
    <div class="card-body">
        <h6>Nama Calon Siswa : <b>{{$healthDataDetail->student->name}}</b></h6>
        <hr>
        <img src="{{asset($healthDataDetail->photo)}}" class="img-fluid" style="width: 100%">
    </div>

</div>

@endsection