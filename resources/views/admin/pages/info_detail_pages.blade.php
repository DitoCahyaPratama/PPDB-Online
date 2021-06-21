@extends('admin.layouts.admin')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Detail Info</h6>
    </div>
    <div class="card-body">
        <h5>Judul Info</h5>
        <h6><b>{{$info['title']}}</b></h6>
        <h5>Deskripsi</h5>
        <h6><b>{{$info['description']}}</b></h6>
        <h5>Foto Informasi</h5>
        @if ($info['image'] == null)
            <img src="{{asset('img/imgnotfound.png')}}" class="img-fluid" style="width: 30%">    
        @else
            <img src="{{asset('storage/'.$info['image'])}}" class="img-fluid" style="width: 30%">
        @endif
        
        
    </div>
</div>

@endsection