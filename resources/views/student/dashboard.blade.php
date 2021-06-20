@extends('layouts.app')

@section('content')
    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <h4>Langkah pendaftar siswa baru</h4>
                    <p>Langkah-langkah yang harus dilakukan oleh siswa untuk pendaftaran</p>
                    <div class="row">
                        <a href="{{route('student.biodata')}}" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">1</span> Biodata</h5>
                                <p>Mengisi/melengkapi biodata pendaftar</p>
                                <small><i>wajib diisi</i></small>
                                @if($verifyBiodata)
                                <span class="badge badge-success">Data sudah lengkap</span>
                                @else
                                <span class="badge badge-warning">Data belum lengkap</span>
                                @endif
                            </div>
                        </a>
                        <a href="{{route('student.schoolorigin')}}" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">2</span> Data Asal Sekolah</h5>
                                <p>Mengisi data sekolah asal pendaftar siswa</p>
                                <small><i>wajib diisi</i></small>
                                @if(count($verifySchoolOrigin))
                                    <span class="badge badge-success">Data sudah lengkap</span>
                                @else
                                    <span class="badge badge-warning">Data belum lengkap</span>
                                @endif
                            </div>
                        </a>
                        <a href="{{route('student.achievement')}}" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">3</span> Data Prestasi</h5>
                                <p>Jika anda akan mendaftar jalur prestasi silahkan masukkan data disini</p>
                                <small><i>Dilakukan pada tanggal </i></small>
                            </div>
                        </a>
                        <a href="{{route('student.report')}}" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="badge badge-warning">4</span> Data Raport</h5>
                                <p>Jika anda akan mendaftar jalur raport silahkan masukkan data disini</p>
                                <small><i>Dilakukan pada tanggal</i></small>
                            </div>
                        </a>

                        @if(1)
                            <a href="" target="_blank"
                               class="col-md-4 col-sm-12">
                                <div class="well well-white">
                                    <h5><span class="badge badge-warning">5</span> Cetak Bukti Pendaftaran</h5>
                                    <p>Mencetak bukti pendaftaran siswa</p>
                                    <small><i>wajib dicetak</i></small>
                                </div>
                            </a>
                        @else
                            <a class="col-md-4 col-sm-12">
                                <div class="well well-white">
                                    <h5><span class="badge badge-warning">5</span> Cetak Bukti Pendaftaran</h5>
                                    <p>Mencetak bukti pendaftaran siswa</p>
                                    <span class="badge badge-warning">Lengkapi data terlebih dahulu</span>
                                </div>
                            </a>
                        @endif

                        @if(1)
                            <a href="" target="_blank" class="col-md-4 col-sm-12">
                                <div class="well well-white">
                                    <h5><span class="badge badge-warning">6</span> Cetak Bukti Penerimaan</h5>
                                    <p>Mencetak bukti penerimaan siswa</p>
                                    <small><i>wajib dicetak</i></small>
                                </div>
                            </a>
                        @endif
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
