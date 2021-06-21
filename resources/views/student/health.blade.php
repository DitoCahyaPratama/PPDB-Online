@extends('layouts.app')

@section('content')
    <section class="show" id="pendidikan">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumbs">
                    <a href="{{route('dashboard.student')}}">Dashboard</a> » <span>Kesehatan</span>
                </li>
            </ul>
            <h4>Data Kesehatan</h4>
            <p>Menampilkan informasi kesehatan</p>
            <hr>
            <div class="row text-center">
                <div class="col-md-12 col-sm-12">
                    <div class="card text-center" style="padding: 20px">
                        <p>Scan Surat Kesehatan(didapat dari puskesmas terdekat)</p>
                        @if($health ? $health->photo != null : 0)
                            <img src="{{asset('storage/'.$health->photo)}}" class="card-img-top"  style="width: 100px" alt="..." onclick="perbesar('{{asset('storage/'.$health->photo)}}')">
                        @else
                            <img src="{{asset('student/img/users.png')}}" class="card-img-top" style="width: 100px" alt="..." onclick="perbesar('{{asset('student/img/users.png')}}')">
                        @endif
                        <br/>
                        <small>*Klik gambar untuk memperbesar</small>

                        <hr>
                        <div class="card-body">
                            <p style="text-align: center; color: red">Perbarui Scan Surat Kesehatan</p>
                            <div class="form well">
                                <form enctype="multipart/form-data" action="{{route('student.uploadSuratKesehatan')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <a class="file-input-wrapper btn styled-file btn btn-block">Pilih file scan Surat Kesehatan
                                            <input class="styled-file btn btn-block" name="photo" type="file" title="Pilih file scan Surat Kesehatan" style="left: -130.25px; top: 15.8906px;"></a>
                                    </div>
                                    <input class="btn btn-info" type="submit" name="yt0" value="Simpan">
                                    <input class="btn btn-danger" name="yt1" type="reset" value="Batal">
                                </form>
                                <br>
                                <a target="_blank" href="/siswa/download/ex/ample/pribadi">Unduh contoh scan Surat Kesehatan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('jsCode')
    <script src="{{ asset('student/js/sweetalert.js') }}"></script>
    <script type="text/javascript">
            function perbesar(image){
                Swal.fire({
                    imageUrl: image,
                    imageWidth: 300,
                    imageHeight: 400,
                    imageAlt: 'Foto Anda',
                    animation: true
                })
            }
        </script>
@endpush
