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
        <h6 class="m-0 font-weight-bold text-primary">Edit Info</h6>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{$info['title']}}">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control">{{$info['description']}}</textarea>
            </div>
            <div class="row">
                <div class="col-lg-6">
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <img src="{{asset('img/'.$info['image'])}}">
            </div>
        </div>
            </div>
            <input type="submit" value="Edit Info" class="btn btn-success">
        </form>
    </div>
</div>

@endsection