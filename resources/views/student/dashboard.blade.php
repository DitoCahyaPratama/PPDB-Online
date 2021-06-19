@extends('layouts.app')

@section('content')
    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
          <span class="border tip">
            <a href="?p=<?php echo crypt('biodata','DitoCahyaPratama') ?>">
              <img src="assets/front_end/images/user.png">
              <p>Biodata</p>
            </a>
          </span>
                <span class="border tip">
            <a href="?p=<?php echo crypt('ekonomi','DitoCahyaPratama') ?>">
              <img src="assets/front_end/images/money.png">
              <p>Ekonomi</p>
            </a>
          </span>
                <span class="border tip">
            <a href="?p=<?php echo crypt('keluarga','DitoCahyaPratama') ?>">
              <img src="assets/front_end/images/family.png">
              <p>Keluarga</p>
            </a>
          </span>
                <span class="border tip">
            <a href="?p=<?php echo crypt('prestasi','DitoCahyaPratama') ?>">
              <img src="assets/front_end/images/cup.png">
              <p>Prestasi</p>
            </a>
          </span>
                <span class="border tip">
            <a href="?p=<?php echo crypt('asalSekolah','DitoCahyaPratama') ?>">
              <img src="assets/front_end/images/school.png">
              <p>Sekolah</p>
            </a>
          </span>
                <span class="border tip">
            <a href="?p=<?php echo crypt('pilihJurusan','DitoCahyaPratama') ?>">
              <img src="assets/front_end/images/pensil.png">
              <p>Jurusan</p>
            </a>
          </span>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <h4>Langkah pendaftar mahasiswa baru</h4>
                    <p>Langkah-langkah yang harus dilakukan oleh siswa untuk menjadi mahasiswa tahun 2019</p>
                    <div class="row">
                        <a href="?p=<?php echo crypt('biodata','DitoCahyaPratama') ?>" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">1</span> Biodata</h5>
                                <p>Mengisi/melengkapi biodata pendaftar bidikmisi</p>
                                <small><i>wajib diisi</i></small>
<!--                                --><?php
//                                $query = _run("SELECT * FROM biographies WHERE user_id='".$id."' AND nisn IS NOT NULL AND nama IS NOT NULL AND nik IS NOT NULL AND tempat_lahir IS NOT NULL AND tanggal_lahir IS NOT NULL AND jk IS NOT NULL AND tb IS NOT NULL AND bb IS NOT NULL AND religion_id IS NOT NULL AND alamat IS NOT NULL AND kebangsaan IS NOT NULL AND province_id IS NOT NULL AND regency_id IS NOT NULL AND district_id IS NOT NULL AND village_id IS NOT NULL AND email IS NOT NULL AND no_hp IS NOT NULL AND photo IS NOT NULL AND nisn != '' AND nama != '' AND nik != '' AND tempat_lahir != '' AND tanggal_lahir != '' AND jk != '' AND tb != '' AND bb != '' AND religion_id != '' AND alamat != '' AND kebangsaan != '' AND province_id != '' AND regency_id != '' AND district_id != '' AND village_id != '' AND email != '' AND no_hp != '' AND photo != ''");
//                                $row = _num($query);
//                                if($row == 1){
//                                ?>
                                <span class="badge badge-success">Data sudah lengkap</span>
                                <?php
//                                }else{
                                ?>
                                <span class="badge badge-warning">Data belum lengkap</span>
                                <?php
//                                }
                                ?>
                            </div>
                        </a>
                        <a href="?p=<?php echo crypt('ekonomi','DitoCahyaPratama') ?>" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">2</span> Kondisi Ekonomi</h5>
                                <p>Mengisi data kondisi ekonomi keluarga mahasiswa baru</p>
                                <small><i>wajib diisi</i></small>
                                <?php
//                                $query = _run("SELECT * FROM economies WHERE user_id='".$id."' AND penghasilan_ayah IS NOT NULL AND penghasilan_ibu IS NOT NULL AND hutang IS NOT NULL AND cicilan_hutang IS NOT NULL AND piutang IS NOT NULL AND cicilan_piutang IS NOT NULL AND tabungan_keluarga IS NOT NULL AND penghasilan_ayah != '' AND penghasilan_ibu != ''");
//                                $row = _num($query);
//                                if($row == 1){
                                ?>
                                <span class="badge badge-success">Data sudah lengkap</span>
                                <?php
//                                }else{
                                ?>
                                <span class="badge badge-warning">Data belum lengkap</span>
                                <?php
//                                }
                                ?>
                            </div>
                        </a>
                        <a href="?p=<?php echo crypt('keluarga','DitoCahyaPratama') ?>" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">3</span> Data Keluarga</h5>
                                <p>Mengisi data keluarga pendaftar (ayah/ibu/wali)</p>
                                <small><i>wajib diisi</i></small>
                                <?php
//                                $query = _run("SELECT * FROM families WHERE user_id='".$id."' AND nama_ayah IS NOT NULL AND status_ayah IS NOT NULL AND hubungan_ayah IS NOT NULL AND pendidikan_ayah IS NOT NULL AND pekerjaan_ayah IS NOT NULL AND detil_ayah IS NOT NULL AND nama_ibu IS NOT NULL AND status_ibu IS NOT NULL AND hubungan_ibu IS NOT NULL AND pendidikan_ibu IS NOT NULL AND pekerjaan_ibu IS NOT NULL AND detil_ibu IS NOT NULL AND jumlah_tanggungan IS NOT NULL AND no_ortu IS NOT NULL AND photo IS NOT NULL AND nama_ayah != '' AND status_ayah != '' AND hubungan_ayah != '' AND pendidikan_ayah != '' AND pekerjaan_ayah != '' AND detil_ayah != '' AND nama_ibu != '' AND status_ibu != '' AND hubungan_ibu != '' AND pendidikan_ibu != '' AND pekerjaan_ibu != '' AND detil_ibu != '' AND jumlah_tanggungan != '' AND no_ortu != '' AND photo != ''");
//                                $row = _num($query);
//                                if($row == 1){
                                ?>
                                <span class="badge badge-success">Data sudah lengkap</span>
                                <?php
//                                }else{
                                ?>
                                <span class="badge badge-warning">Data belum lengkap</span>
                                <?php
//                                }
                                ?>
                            </div>
                        </a>
                    </div>
                    <div class="row">
                        <a href="?p=<?php echo crypt('prestasi','DitoCahyaPratama') ?>" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">4</span> Data Prestasi</h5>
                                <p>Mengisi data prestasi ko dan ekstrakulikuler</p>
                                <small><i>opsional (jika ada)</i></small>
                            </div>
                        </a>
                        <a href="?p=<?php echo crypt('asalSekolah','DitoCahyaPratama') ?>" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">5</span> Data Asal Sekolah</h5>
                                <p>Mengisi data sekolah asal pendaftar mahasiswa</p>
                                <small><i>wajib diisi</i></small>
                                <?php
//                                $query = _run("SELECT * FROM educations WHERE user_id='".$id."' AND name IS NOT NULL AND address IS NOT NULL AND tahun_lulus IS NOT NULL AND province_id IS NOT NULL AND regency_id IS NOT NULL AND district_id IS NOT NULL AND village_id IS NOT NULL AND jenis IS NOT NULL AND photo_skl IS NOT NULL AND name != '' AND address != '' AND tahun_lulus != '' AND province_id != '' AND regency_id != '' AND district_id != '' AND village_id != '' AND jenis != '' AND photo_skl != ''");
//                                $row = _num($query);
//                                if($row == 1){
                                ?>
                                <span class="badge badge-success">Data sudah lengkap</span>
                                <?php
//                                }else{
                                ?>
                                <span class="badge badge-warning">Data belum lengkap</span>
                                <?php
//                                }
                                ?>
                            </div>
                        </a>
                        <a href="?p=<?php echo crypt('pilihJurusan','DitoCahyaPratama') ?>" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">6</span> Pilih Program Studi</h5>
                                <p>Mengisi program studi</p>
                                <small><i>wajib diisi</i></small>
                                <?php
//                                $query = _run("SELECT * FROM forms WHERE user_id='".$id."' AND study_id IS NOT NULL AND study_id_2 IS NOT NULL AND wave_id IS NOT NULL AND study_id != '' AND study_id_2 != '' AND wave_id != ''");
//                                $row = _num($query);
//                                if($row == 1){
                                ?>
                                <span class="badge badge-success">Data sudah lengkap</span>
                                <?php
//                                }else{
                                ?>
                                <span class="badge badge-warning">Data belum lengkap</span>
                                <?php
//                                }
                                ?>
                            </div>
                        </a>
                    </div>
                    <div class="row">
                        <?php
//                        $query = _run("SELECT * FROM biographies WHERE user_id='".$id."' AND nisn IS NOT NULL AND nama IS NOT NULL AND nik IS NOT NULL AND tempat_lahir IS NOT NULL AND tanggal_lahir IS NOT NULL AND jk IS NOT NULL AND tb IS NOT NULL AND bb IS NOT NULL AND religion_id IS NOT NULL AND alamat IS NOT NULL AND kebangsaan IS NOT NULL AND province_id IS NOT NULL AND regency_id IS NOT NULL AND district_id IS NOT NULL AND village_id IS NOT NULL AND email IS NOT NULL AND no_hp IS NOT NULL AND photo IS NOT NULL AND nisn != '' AND nama != '' AND nik != '' AND tempat_lahir != '' AND tanggal_lahir != '' AND jk != '' AND tb != '' AND bb != '' AND religion_id != '' AND alamat != '' AND kebangsaan != '' AND province_id != '' AND regency_id != '' AND district_id != '' AND village_id != '' AND email != '' AND no_hp != '' AND photo != ''");
//                        $row = _num($query);
//                        $query1 = _run("SELECT * FROM economies WHERE user_id='".$id."' AND penghasilan_ayah IS NOT NULL AND penghasilan_ibu IS NOT NULL AND hutang IS NOT NULL AND cicilan_hutang IS NOT NULL AND piutang IS NOT NULL AND cicilan_piutang IS NOT NULL AND tabungan_keluarga IS NOT NULL AND penghasilan_ayah != '' AND penghasilan_ibu != ''");
//                        $row1 = _num($query1);
//                        $query2 = _run("SELECT * FROM families WHERE user_id='".$id."' AND nama_ayah IS NOT NULL AND status_ayah IS NOT NULL AND hubungan_ayah IS NOT NULL AND pendidikan_ayah IS NOT NULL AND pekerjaan_ayah IS NOT NULL AND detil_ayah IS NOT NULL AND nama_ibu IS NOT NULL AND status_ibu IS NOT NULL AND hubungan_ibu IS NOT NULL AND pendidikan_ibu IS NOT NULL AND pekerjaan_ibu IS NOT NULL AND detil_ibu IS NOT NULL AND jumlah_tanggungan IS NOT NULL AND no_ortu IS NOT NULL AND photo IS NOT NULL AND nama_ayah != '' AND status_ayah != '' AND hubungan_ayah != '' AND pendidikan_ayah != '' AND pekerjaan_ayah != '' AND detil_ayah != '' AND nama_ibu != '' AND status_ibu != '' AND hubungan_ibu != '' AND pendidikan_ibu != '' AND pekerjaan_ibu != '' AND detil_ibu != '' AND jumlah_tanggungan != '' AND no_ortu != '' AND photo != ''");
//                        $row2 = _num($query2);
//                        $query3 = _run("SELECT * FROM educations WHERE user_id='".$id."' AND name IS NOT NULL AND address IS NOT NULL AND tahun_lulus IS NOT NULL AND province_id IS NOT NULL AND regency_id IS NOT NULL AND district_id IS NOT NULL AND village_id IS NOT NULL AND jenis IS NOT NULL AND photo_skl IS NOT NULL AND name != '' AND address != '' AND tahun_lulus != '' AND province_id != '' AND regency_id != '' AND district_id != '' AND village_id != '' AND jenis != '' AND photo_skl != ''");
//                        $row3 = _num($query3);
//                        if($row == 1 && $row1 == 1 && $row2 == 1 && $row3 == 1){
                        ?>
                        <a href="?p=<?php echo crypt('cetakKartuPeserta','DitoCahyaPratama') ?>&id=" target="_blank" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">7</span> Cetak kartu peserta</h5>
                                <p>Mencetak kartu peserta pendaftaran mahasiswa tahun 2019</p>
                                <small><i>wajib dicetak</i></small>
                            </div>
                        </a>
                        <?php
//                        }else{
                        ?>
                        <a class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">7</span> Cetak kartu peserta</h5>
                                <p>Mencetak kartu peserta pendaftaran mahasiswa tahun 2019</p>
                                <span class="badge badge-warning">Lengkapi data terlebih dahulu</span>
                            </div>
                        </a>
                        <?php
//                        }
//                        if($row == 1 && $row1 == 1 && $row2 == 1 && $row3 == 1){
                        ?>
                        <a href="?p=<?php echo crypt('cetakFormulir','DitoCahyaPratama') ?>&id=" target="_blank" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">8</span> Cetak formulir</h5>
                                <p>Mencetak formulir peserta pendaftaran mahasiswa tahun 2019</p>
                                <small><i>wajib dicetak</i></small>
                            </div>
                        </a>
                        <?php
//                        if(_num(_run("SELECT * FROM registrations WHERE user_id='".$id."'")) >= 1){
                        ?>
                        <a href="?p=<?php echo crypt('registrasi','DitoCahyaPratama') ?>" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">9</span>Registrasi</h5>
                                <p>Silahkan lakukan registrasi</p>
                                <small><i>wajib dibayar</i></small>
                            </div>
                        </a>
                        <?php
//                        }
//                        }else{
                        ?>
                        <a class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">8</span> Cetak formulir</h5>
                                <p>Mencetak formulir peserta pendaftaran mahasiswa tahun 2019</p>
                                <span class="badge badge-warning">Lengkapi data terlebih dahulu</span>
                            </div>
                        </a>
                        <?php
//                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <?php
//                            $queryFoto = _run("SELECT * FROM biographies WHERE user_id = '".$id."'");
//                            $dataFoto = _get($queryFoto);
                            ?>
                            <?php
//                            if($dataFoto['photo']){
                            ?>
{{--                            <h5 class="card-title"><img src="temp/image/pribadi/" width="50px" style="border-radius: 5px; margin-right: 20px"></img><?php echo $_SESSION['username'] ?></h5>--}}
                            <?php
//                            }else{
                            ?>
{{--                            <h5 class="card-title"><img src="assets/front_end/images/student_image.png"></img><?php echo $_SESSION['username'] ?></h5>--}}
                            <?php
//                            }
                            ?>
                            <?php
//                            $queryUser = _run("SELECT * FROM users WHERE id='".$id."'");
//                            $dataUser = _get($queryUser);
//                            $no_daftar = substr($dataUser['created_at'], 0,3).".".substr($dataUser['created_at'], 3,1).substr($dataUser['created_at'], 5,2).".".substr($dataUser['created_at'], 8,2).substr($dataUser['created_at'], 11,1).".".substr($dataUser['created_at'], 12,1).substr($dataUser['created_at'], 14,2).".".substr($dataUser['created_at'], 17,2).$dataUser['id'];
                            ?>
{{--                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_SESSION['email'] ?></h6>--}}
{{--                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $no_daftar ?></h6>--}}
                            <!-- <a href="#" class="card-link">Ubah password</a> -->
                            <!-- <a href="#" class="card-link">Ubah email</a>/ -->
                        </div>
                    </div>
                    <?php
//                    $queryForms = _run("SELECT * FROM forms WHERE user_id='".$id."'");
//                    $dataForms = _get($queryForms);
//                    if($dataForms['status'] == 'Diterima' || $dataForms['status'] == 'Ditolak'){
                    ?>
                    <div class="card" style="width: 18rem;">
                        <div class="alert alert-info">
                            INFO TERKINI !! <br>
                            <?php
//                            if($dataForms['status'] == 'Diterima'){
//                            $queryRegistrasi = _run("SELECT registrations.id, registrations.study_id, studies.name , registrations.status, registrations.photo FROM registrations INNER JOIN studies ON registrations.study_id = studies.id  WHERE user_id = '".$id."'");
//                            $dataRegistrasi = _get($queryRegistrasi);
                            ?>
                            <ul>
{{--                                <li>Selamat anda diterima di program studi <?php echo $dataRegistrasi['name'] ?></li>--}}
                                <?php
//                                if($dataRegistrasi['photo'] && $dataRegistrasi['status'] == '0'){
                                    echo '<li>Harap menunggu maksimal 24 jam untuk proses registrasi.</li>';
//                                }else if($dataRegistrasi['photo'] && $dataRegistrasi['status'] == '1'){
                                    echo '<li>Anda sudah dikonfirmasi dan harap membawa berkas-berkas ke unisma malang pada tanggal 30 juni 2019.</li>';
//                                }else{
                                    echo '<li>Harap melakukan registrasi pada menu registrasi</li>';
//                                }
                                ?>
                            </ul>
                            <?php
//                            }else{
                            ?>
                            Mohon Maaf anda tidak diterima
                            <?php
//                            }
                            ?>
                        </div>
                    </div>
                    <?php
//                    }
//                    if($row == 1 && $row1 == 1 && $row2 == 1 && $row3 == 1){
                    ?>
                    <div class="card" style="width: 18rem;">
                        <button></button>
                    </div>
                    <?php
//                    }

                    ?>
                </div>
            </div>
        </div>
    </section>
@endsection
