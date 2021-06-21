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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Info Terkini</h6>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Tambah Info
        </button>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        {{-- <th>No</th> --}}
                        <th>Judul Info</th>
                        <th>Photo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $no=1;
                    @endphp --}}
                    @foreach ( $info as $infos )
                    <tr>
                        {{-- <td>{{$no++}}</td> --}}
                        <td>{{$infos->title}}</td>
                        <td style="width: 30%">
                            @if ($infos->image == null)
                                <img src="{{asset('img/imgnotfound.png')}}" class="img-fluid" style="width: 50%">    
                            @else
                            <img src="{{asset('storage/'.$infos->image)}}" class="img-fluid" style="width: 50%">
                            @endif
                        </td>
                        <td>
                            <a href="{{route('info.delete',['id'=>$infos->id])}}" class="btn btn-danger" onclick="return confirm('Hapus info ini ?')">Hapus</a>
                            <a href="{{route('info.detail',['id'=>$infos->id])}}" class="btn btn-warning">Detail</a>
                            <a href="{{route('info.editform',['id'=>$infos->id])}}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <center>
                <div class="d-flex">
                    {{ $info->links('pagination::bootstrap-4') }}
                </div>
            </center>
        </div>
        
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Info</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{route('info.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="submit" value="Tambah" class="btn btn-success">
          </form>
        </div>

  
      </div>
    </div>
  </div>
@endsection