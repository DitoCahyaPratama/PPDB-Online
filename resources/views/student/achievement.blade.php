@extends('layouts.app')

@section('content')
    <div class="registration-page-area bg-secondary">
        <section class="show" id="prestasi">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumbs">
                        <a href="{{route('dashboard.student')}}">Dashboard</a> » <span>Prestasi Siswa</span>
                    </li>
                </ul>
                <h4>Data Prestasi Siswa</h4>
                <p>Menampilkan informasi data prestasi siswa</p>
                <button class="btn btn-success" onclick="show()"><i class="icon-plus icon-white"></i> Tambah Prestasi</button>
                <hr>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="alert alert-info">
                            Menampilkan data sejumlah ...
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th id="prestasi-sekolah-grid_c0">Nama Kegiatan</th>
                                <th id="prestasi-sekolah-grid_c1">Pencapaian</th>
                                <th id="prestasi-sekolah-grid_c2">Tahun</th>
                                <th id="prestasi-sekolah-grid_c3">Jenis</th>
                                <th id="prestasi-sekolah-grid_c4">Tingkat</th>
                                <th class="button-column" id="prestasi-sekolah-grid_c6">Sertifikat</th>
                                <th class="button-column" id="prestasi-sekolah-grid_c7">opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($achievement as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->champion }}</td>
                                    <td>{{ $data->year }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td>{{ $data->level }}</td>
                                    <td><img src="{{asset('storage/'.$data->photo)}}" class="card-img-top"  style="width: 100px" alt="..." onclick="perbesar('{{asset('storage/'.$data->photo)}}')"></td>
                                    <td>
                                        <form action="{{ route('student.delete.achievement',$data->id) }}" method="POST">
                                            <a class="btn btn-primary btn-sm" href="{{ route('student.edit.achievement', $data->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="var a = confirm('Apakah anda yakin akan menghapus data ini ?'); if(a == true){ }else{return false;}" type="submit " class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-primary" onclick="showSubmit()"><i class="icon-plus icon-white"></i> Konfirmasi Data Pendaftaran</button>
                    </div>
                </div>

            </div>
        </section>

        <section class="hide" id="addPrestasi">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumbs">
                        <a href="{{route('dashboard.student')}}">Dashboard</a> » <a href="#" onclick="show()">Prestasi Siswa</a> » <span>Tambah Prestasi Siswa</span>
                    </li>
                </ul>
                <h4>Tambah Data Prestasi Siswa</h4>
                <p>Menampilkan form untuk menambah data prestasi siswa</p>
                <hr>
                <form enctype="multipart/form-data" action="{{route('student.add.achievement')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div style="border: dotted; padding: 20px; margin: 10px">
                                <div class="alert alert-info">
                                    Kolom dengan tanda * harus diisi.
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Kegiatan<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama Kegiatan ..." required="">
                                </div>
                                <div class="form-group">
                                    <label for="champion">Pencapaian<span class="required">*</span></label>
                                    <select name="champion" class="form-control" required="">
                                        <option value="">--Pilih Pencapaian--</option>
                                        <option value="Juara 1">Juara 1</option>
                                        <option value="Juara 2">Juara 2</option>
                                        <option value="Juara 3">Juara 3</option>
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
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="type">Jenis<span class="required">*</span></label>
                                    <select name="type" class="form-control" required="">
                                        <option value="">--Pilih Jenis--</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Kelompok">Kelompok</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="level">Tingkat<span class="required">*</span></label>
                                    <select name="level" class="form-control" required="">
                                        <option value="">--Pilih Tingkat--</option>
                                        <option value="Kab/Kota">Kab/Kota</option>
                                        <option value="Provinsi">Provinsi</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Internasional">Internasional</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div style="border: dotted; padding: 20px; margin: 10px">
                                <p>Scan Sertifikat</p>
                                <img src="{{asset('student/img/users.png')}}" class="card-img-top" style="width: 100px" alt="..." onclick="perbesar('{{asset('student/img/users.png')}}')">
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

        <section class="hide" id="submitPrestasi">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumbs">
                        <a href="{{route('dashboard.student')}}">Dashboard</a> » <a href="#" onclick="show()">Prestasi Siswa</a> » <span>Tambah Prestasi Siswa</span>
                    </li>
                </ul>
                <h4>Konfirmasi Pendaftaran Jalur Prestasi</h4>
                <p>Menampilkan form untuk menambah data prestasi siswa</p>
                <hr>
                <form enctype="multipart/form-data" action="{{route('student.final.achievement')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div style="border: dotted; padding: 20px; margin: 10px">
                                <div class="alert alert-info">
                                    Kolom dengan tanda * harus diisi.
                                </div>
                                <div class="form-group">
                                    <label for="achievement_id_1">Prestasi 1<span class="required">*</span></label>
                                    <select name="achievement_id_1" class="form-control" required="">
                                        <option value="">--Pilih Pencapaian--</option>
                                        @foreach($achievement as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="achievement_id_2">Prestasi 2<span class="required">*</span></label>
                                    <select name="achievement_id_2" class="form-control">
                                        <option value="" >--Pilih Pencapaian--</option>
                                        @foreach($achievement as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="achievement_id_3">Prestasi 3<span class="required">*</span></label>
                                    <select name="achievement_id_3" class="form-control">
                                        <option value="">--Pilih Pencapaian--</option>
                                        @foreach($achievement as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="department_id">Jurusan<span class="required">*</span></label>
                                    <select name="department_id" class="form-control" required="">
                                        <option value="">--Pilih Jurusan--</option>
                                        @foreach($department as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button onclick="var a = confirm('Apakah anda yakin melakukan finalisasi ini ? (Data yang sudah di finalisasi tidak dapat di ubah)'); if(a == true){ }else{return false;}" type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('jsCode')
    <script src="{{ asset('student/js/sweetalert.js') }}"></script>
    <script type="text/javascript">
        var tampil_prestasi = document.getElementById('prestasi');
        var add_prestasi = document.getElementById('addPrestasi');
        var submit_prestasi = document.getElementById('submitPrestasi');

        function centerModal() {
            $(this).css('display', 'block');
            var $dialog = $(this).find(".modal-dialog");
            var offset = ($(window).height() - $dialog.height()) / 2;
            // Center modal vertically in window
            $dialog.css("margin-top", offset);
        }

        $('.modal').on('show.bs.modal', centerModal);
        $(window).on("resize", function () {
            $('.modal:visible').each(centerModal);
        });
        function show(){
            if(tampil_prestasi.className == 'show'){
                tampil_prestasi.className = 'hide';
                add_prestasi.className = 'show';
                submit_prestasi.className = 'hide';
            }else{
                tampil_prestasi.className = 'show';
                add_prestasi.className = 'hide';
                submit_prestasi.className = 'hide';
            }
        }

        function showSubmit(){
            if(tampil_prestasi.className == 'show'){
                tampil_prestasi.className = 'hide';
                submit_prestasi.className = 'show';
                add_prestasi.className = 'hide';
            }else{
                tampil_prestasi.className = 'show';
                submit_prestasi.className = 'hide';
                add_prestasi.className = 'hide';
            }
        }

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
