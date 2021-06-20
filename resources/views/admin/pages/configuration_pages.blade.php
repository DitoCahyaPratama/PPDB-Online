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
        <h6 class="m-0 font-weight-bold text-primary">Konfigurasi</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('config.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Nama Sekolah</label>
              <input type="text" name="name_school" class="form-control @error('name_school') is-invalid @enderror" value="{{$dataConfig->name_school}}" >
              @error('name_school')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
            </div>
            <div class="form-group">
                <label>Alamat Sekolah</label>
                <input type="text" required name="address_school" class="form-control" value="{{$dataConfig->address_school}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Kesehatan Mulai</label>
                <input type="date" required name="date_registration_selection_health_start" class="form-control" value="{{$dataConfig->date_registration_selection_health_start}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Kesehatan Berakhir</label>
                <input type="date" required class="form-control" name="date_registration_selection_health_end" value="{{$dataConfig->date_registration_selection_health_end}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Seleksi Jalur Prestasi Mulai</label>
                <input type="date" required class="form-control" name="date_registration_selection_achievement_start" value="{{$dataConfig->date_registration_selection_achievement_start}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Seleksi Jalur Prestasi Berakhir</label>
                <input type="date" required class="form-control" name="date_registration_selection_achievement_end" value="{{$dataConfig->date_registration_selection_achievement_end}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Seleksi Jalur Rapor Mulai</label>
                <input type="date" required class="form-control" name="date_registration_selection_report_start" value="{{$dataConfig->date_registration_selection_report_start}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Seleksi Jalur Rapor Berakhir</label>
                <input type="date" required class="form-control" name="date_registration_selection_report_end" value="{{$dataConfig->date_registration_selection_report_end}}">
            </div>
            <div class="form-group">
                <label>Tanggal Pengumuman Jalur Prestasi Mulai</label>
                <input type="date" required class="form-control" name="date_announcement_achievement_start" value="{{$dataConfig->date_announcement_achievement_start}}">
            </div>
            <div class="form-group">
                <label>Tanggal Pengumuman Jalur Prestasi Berakhir</label>
                <input type="date" required class="form-control" name="date_announcement_achievement_end" value="{{$dataConfig->date_announcement_achievement_end}}">
            </div>
            <div class="form-group">
                <label>Tanggal Pengumuman Jalur Rapor Mulai</label>
                <input type="date" required class="form-control" name="date_announcement_report_start" value="{{$dataConfig->date_announcement_report_start}}">
            </div>
            <div class="form-group">
                <label>Tanggal Pengumuman Jalur Rapor Berakhir</label>
                <input type="date" required class="form-control" name="date_announcement_report_end" value="{{$dataConfig->date_announcement_report_end}}">
            </div>
            <button type="submit" class="btn btn-primary">Tetapkan Konfigurasi</button>
          </form>
    </div>

</div>
@endsection