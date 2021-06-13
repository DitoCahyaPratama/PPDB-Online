@extends('admin.layouts.admin')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Konfigurasi</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
              <label>Nama Sekolah</label>
              <input type="text" class="form-control" value="{{$dataConfig->name_school}}">
            </div>
            <div class="form-group">
                <label>Alamat Sekolah</label>
                <input type="text" class="form-control" value="{{$dataConfig->address_school}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Kesehatan Mulai</label>
                <input type="date" class="form-control" value="{{$dataConfig->date_registration_selection_health_start}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Kesehatan Berakhir</label>
                <input type="date" class="form-control" value="{{$dataConfig->date_registration_selection_health_end}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Seleksi Jalur Prestasi Mulai</label>
                <input type="date" class="form-control" value="{{$dataConfig->date_registration_selection_achievement_start}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Seleksi Jalur Prestasi Berakhir</label>
                <input type="date" class="form-control" value="{{$dataConfig->date_registration_selection_achievement_end}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Seleksi Jalur Rapor Mulai</label>
                <input type="date" class="form-control" value="{{$dataConfig->date_registration_selection_report_start}}">
            </div>
            <div class="form-group">
                <label>Tanggal Registerasi Seleksi Jalur Rapor Berakhir</label>
                <input type="date" class="form-control" value="{{$dataConfig->date_registration_selection_report_end}}">
            </div>
            <div class="form-group">
                <label>Tanggal Pengumuman Jalur Prestasi Mulai</label>
                <input type="date" class="form-control" value="{{$dataConfig->date_announcement_achievement_start}}">
            </div>
            <div class="form-group">
                <label>Tanggal Pengumuman Jalur Prestasi Berakhir</label>
                <input type="date" class="form-control" value="{{$dataConfig->date_announcement_achievement_end}}">
            </div>
            <div class="form-group">
                <label>Tanggal Pengumuman Jalur Rapor Mulai</label>
                <input type="date" class="form-control" value="{{$dataConfig->date_announcement_report_start}}">
            </div>
            <div class="form-group">
                <label>Tanggal Pengumuman Jalur Rapor Berakhir</label>
                <input type="date" class="form-control" value="{{$dataConfig->date_announcement_report_end}}">
            </div>
            <button type="submit" class="btn btn-primary">Tetapkan Konfigurasi</button>
          </form>
    </div>

</div>
@endsection