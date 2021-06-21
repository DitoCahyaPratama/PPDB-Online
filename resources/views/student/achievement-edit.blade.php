@extends('layouts.app')

@section('content')
    <section class="show" id="addPrestasi">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumbs">
                    <a href="{{route('dashboard.student')}}">Dashboard</a> » <a href="{{route('student.achievement')}}">Prestasi Siswa</a> » <span>Edit Prestasi Siswa</span>
                </li>
            </ul>
            <h4>Edit Data Prestasi Siswa</h4>
            <p>Menampilkan form untuk memperbarui data prestasi siswa</p>
            <hr>
            <form enctype="multipart/form-data" action="{{route('student.update.achievement', $achievement->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div style="border: dotted; padding: 20px; margin: 10px">
                            <div class="alert alert-info">
                                Kolom dengan tanda * harus diisi.
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Kegiatan<span class="required">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Kegiatan ..." value="{{ old('name', $achievement->name) }}" required="">
                            </div>
                            <div class="form-group">
                                <label for="champion">Pencapaian<span class="required">*</span></label>
                                <select name="champion" class="form-control" required="">
                                    <option value="">--Pilih Pencapaian--</option>
                                    <option value="Juara 1" {{$achievement->champion == 'Juara 1' ? "selected" : ""}}>Juara 1</option>
                                    <option value="Juara 2" {{$achievement->champion == 'Juara 2' ? "selected" : ""}}>Juara 2</option>
                                    <option value="Juara 3" {{$achievement->champion == 'Juara 3' ? "selected" : ""}}>Juara 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="year">Tahun<span class="required">*</span></label>
                                <select name="year" class="form-control" required="">
                                    <option value="">--Pilih Tahun--</option>
                                    <?php
                                    $date = date('Y');
                                    for ($i=$date; $i >= 1945; $i--) {
                                    ?>
                                    <option value="<?php echo $i ?>" {{$achievement->year == $i ? "selected" : ""}} ><?php echo $i ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Jenis<span class="required">*</span></label>
                                <select name="type" class="form-control" required="">
                                    <option value="">--Pilih Jenis--</option>
                                    <option value="Individual" {{$achievement->type == 'Individual' ? "selected" : ""}}>Individual</option>
                                    <option value="Kelompok" {{$achievement->type == 'Kelompok' ? "selected" : ""}}>Kelompok</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="level">Tingkat<span class="required">*</span></label>
                                <select name="level" class="form-control" required="">
                                    <option value="">--Pilih Tingkat--</option>
                                    <option value="Kab/Kota" {{$achievement->level == 'Kab/Kota' ? "selected" : ""}}>Kab/Kota</option>
                                    <option value="Provinsi" {{$achievement->level == 'Provinsi' ? "selected" : ""}}>Provinsi</option>
                                    <option value="Nasional" {{$achievement->level == 'Nasional' ? "selected" : ""}}>Nasional</option>
                                    <option value="Internasional" {{$achievement->level == 'Internasional' ? "selected" : ""}}>Internasional</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div style="border: dotted; padding: 20px; margin: 10px">
                            <p>Scan Sertifikat</p>
                            @if($achievement ? $achievement->photo != null : 0)
                                <img src="{{asset('storage/'.$achievement->photo)}}" class="card-img-top"  style="width: 100px" alt="..." onclick="perbesar('{{asset('storage/'.$achievement->photo)}}')">
                            @else
                                <img src="{{asset('student/img/users.png')}}" class="card-img-top" style="width: 100px" alt="..." onclick="perbesar('{{asset('student/img/users.png')}}')">
                            @endif
                            <small>*Klik gambar untuk memperbesar</small>
                            <hr>
                            <div class="card-body">
                                <p style="text-align: center; color: red">Scan Sertifikat</p>
                                <div class="form well">
                                    <div class="row">
                                        <a class="file-input-wrapper btn styled-file btn btn-block">Pilih file scan sertifikat
                                            <input class="styled-file btn btn-block" name="photo" type="file" title="Pilih file sertifikat" style="left: -130.25px; top: 15.8906px;"></a>
                                    </div>
                                    <br>
                                    <a target="_blank" href="/siswa/download/ex/ample/pribadi">Unduh contoh scan sertifikat</a>            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
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
                imageAlt: 'Foto Sertifikat',
                animation: true
            })
        }
    </script>
@endpush
