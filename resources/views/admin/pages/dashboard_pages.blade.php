@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Akun User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countUser}}</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Calon Pendaftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countStudent}}</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Jumlah Pendaftar Jalur Prestasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countSelectionAchievements}}</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Pendaftar Jalur Raport</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countSelectionReports}}</div>
                    </div>
                    {{-- <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection