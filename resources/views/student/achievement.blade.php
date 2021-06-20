@extends('layouts.app')

@section('content')
    <section class="show" id="prestasi">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumbs">
                    <a href="{{route('dashboard.student')}}">Dashboard</a> » <span>Prestasi Siswa</span>
                </li>
            </ul>
            <h4>Data Prestasi Siswa</h4>
            <p>Menampilkan informasi data prestasi siswa</p>
{{--            <?php--}}
{{--            $query_verification = _run("SELECT * FROM users WHERE verification_status='1'");--}}
{{--            $data = _get($query_verification);--}}
{{--            if($data){--}}
{{--                ?>--}}

{{--              <?php--}}
{{--            }else{--}}
{{--            ?>--}}
            <button class="btn btn-success" onclick="show()"><i class="icon-plus icon-white"></i> Tambah Prestasi</button>
<!--            --><?php
//            }
//            ?>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12">
<!--                    --><?php
//                    $id = $_SESSION['id'];
//                    $q_prestasi = _run("SELECT * FROM achievements WHERE user_id = '".$id."'");
//                    ?>
                    <div class="alert alert-info">
                        Menampilkan data sejumlah ...
                    </div>
                    <table class="table table-striped table-bordered table-hover">
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
<!--                        --><?php
//                        if(_row($q_prestasi) > 0){
//                        $querynya = _run("SELECT * FROM achievements WHERE user_id = '".$id."'");
//                        while($data = _get($querynya)){
//                        ?>
                        <tr>
{{--                            <td><?php echo $data['name']; ?></td>--}}
{{--                            <td><?php echo $data['pencapaian']; ?></td>--}}
{{--                            <td><?php echo $data['tahun']; ?></td>--}}
{{--                            <td><?php echo $data['jenis']; ?></td>--}}
{{--                            <td><?php echo $data['tingkat']; ?></td>--}}
{{--                            <td><a href="temp/image/prestasi/<?php echo $data['photo'] ?>" target="_blank"><span class="icon-image" title="View Detail"></span></a></td>--}}
{{--                            <td class="button-column">--}}
{{--                                <a onclick="var a = confirm('Apakah anda yakin akan menghapus data ini ?'); if(a == true){ }else{return false;}" href="server.php?p=hapusPrestasi&id=<?php echo $data['id']; ?>"><span class="btn"><i class="icon-trash"></i></span></a>--}}
{{--                                <a href="?p=<?php echo crypt('prestasi','DitoCahyaPratama') ?>&id=<?php echo crypt($data['id'], 'DitoCahyaPratama') ?>"><span class="btn"><i class="icon-edit"></i></span></a>--}}

{{--                            </td>--}}
                        </tr>
<!--                        --><?php
//                        }
//                        }else{
//                        ?>
                        <tr>
                            <td colspan="8">Data tidak ada</td>
                        </tr>
<!--                        --><?php
//                        }
//                        ?>
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
            <form enctype="multipart/form-data" action="server.php?p=addPrestasi" method="post">
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
                                <label for="pencapaian">Pencapaian<span class="required">*</span></label>
                                <select name="pencapaian" class="form-control" required="">
                                    <option value="">--Pilih Pencapaian--</option>
                                    <option value="Juara 1">Juara 1</option>
                                    <option value="Juara 2">Juara 2</option>
                                    <option value="Juara 3">Juara 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun<span class="required">*</span></label>
                                <select name="tahun" class="form-control" required="">
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
                                <label for="jenis">Jenis<span class="required">*</span></label>
                                <select name="jenis" class="form-control" required="">
                                    <option value="">--Pilih Jenis--</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Kelompok">Kelompok</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tingkat">Tingkat<span class="required">*</span></label>
                                <select name="tingkat" class="form-control" required="">
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
                            <img src="assets/front_end/images/users.png" class="card-img-top" style="" alt="..." onclick="perbesar('assets/front_end/images/users.png')">
                            <small>*Klik gambar untuk memperbesar</small>
                            <hr>
                            <div class="card-body">
                                <p style="text-align: center; color: red">Scan Sertifikat</p>
                                <div class="form well">
                                    <div class="row">
                                        <a class="file-input-wrapper btn styled-file btn btn-block">Pilih file scan sertifikat
                                            <input class="styled-file btn btn-block" name="foto" type="file" title="Pilih file sertifikat" style="left: -130.25px; top: 15.8906px;"></a>
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
            <form enctype="multipart/form-data" action="" method="post">
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
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="achievement_id_2">Prestasi 2<span class="required">*</span></label>
                                <select name="achievement_id_2" class="form-control" required="">
                                    <option value="">--Pilih Pencapaian--</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="achievement_id_3">Prestasi 3<span class="required">*</span></label>
                                <select name="achievement_id_3" class="form-control" required="">
                                    <option value="">--Pilih Pencapaian--</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="department">Jurusan<span class="required">*</span></label>
                                <select name="department" class="form-control" required="">
                                    <option value="">--Pilih Jurusan--</option>
                                </select>
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
    <script type="text/javascript">
        var tampil_prestasi = document.getElementById('prestasi');
        var add_prestasi = document.getElementById('addPrestasi');
        var submit_prestasi = document.getElementById('submitPrestasi');

        loadKab();
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
                imageWidth: 700,
                imageHeight: 900,
                imageAlt: 'Foto SKTM',
                animation: true
            })
        }
    </script>
@endpush
