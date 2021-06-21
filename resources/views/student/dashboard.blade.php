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
                                <h5><span class="label label-warning">1</span> Biodata</h5>
                                <p>Mengisi/melengkapi biodata siswa</p>
                                <small><i>wajib diisi</i></small>
                                @if($verifyBiodata)
                                <span class="label label-success">Data sudah lengkap</span>
                                @else
                                <span class="label label-warning">Data belum lengkap</span>
                                @endif
                            </div>
                        </a>
                        <a href="{{route('student.schoolorigin')}}" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="label label-warning">2</span> Data Asal Sekolah</h5>
                                <p>Mengisi/melengkapi data sekolah asal siswa</p>
                                <small><i>wajib diisi</i></small>
                                @if(count($verifySchoolOrigin))
                                    <span class="label label-success">Data sudah lengkap</span>
                                @else
                                    <span class="label label-warning">Data belum lengkap</span>
                                @endif
                            </div>
                        </a>
                        <a href="{{route('student.health')}}" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="label label-warning">3</span> Data Kesehatan</h5>
                                <p>Mengisi/melengkapi data kesehatan siswa</p>
                                @if($config->date_registration_selection_health_start <= date('Y-m-d') && $config->date_registration_selection_health_end >= date('Y-m-d'))
                                    <small><i>wajib diisi</i></small>
                                    @if(count($verifyHealth))
                                        <span class="label label-success">Data sudah lengkap</span>
                                    @else
                                        <span class="label label-warning">Data belum lengkap</span>
                                    @endif
                                @else
                                    <small><i>{{date('d/m/Y', strtotime($config->date_registration_selection_health_start))}} - {{date('d/m/Y', strtotime($config->date_registration_selection_health_end))}}</i></small>
                                @endif

                            </div>
                        </a>
                        <a href="{{route('student.achievement')}}" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="label label-warning">4</span> Data Prestasi</h5>
                                <p>Jika anda akan mendaftar jalur prestasi silahkan masukkan data disini</p>
                                @if($config->date_registration_selection_achievement_start <= date('Y-m-d') && $config->date_registration_selection_achievement_end >= date('Y-m-d'))
                                    @if(count($verifyJurusan1))
                                        <span class="label label-success">Data sudah lengkap</span>
                                    @else
                                        <span class="label label-warning">Data belum lengkap</span>
                                    @endif
                                @else
                                    <small><i>{{date('d/m/Y', strtotime($config->date_registration_selection_achievement_start))}} - {{date('d/m/Y', strtotime($config->date_registration_selection_achievement_end))}}</i></small>
                                @endif
                            </div>
                        </a>
                        <a href="{{route('student.report')}}" class="col-md-4 col-sm-12">
                            <div class="well well-white">
                                <h5><span class="label label-warning">4</span> Data Raport</h5>
                                <p>Jika anda akan mendaftar jalur raport silahkan masukkan data disini</p>
                                @if($config->date_registration_selection_report_start <= date('Y-m-d') && $config->date_registration_selection_report_end >= date('Y-m-d'))
                                    @if(count($verifyJurusan2))
                                        <span class="label label-success">Data sudah lengkap</span>
                                    @else
                                        <span class="label label-warning">Data belum lengkap</span>
                                    @endif
                                @else
                                    <small><i>{{date('d/m/Y', strtotime($config->date_registration_selection_report_start))}} - {{date('d/m/Y', strtotime($config->date_registration_selection_report_end))}}</i></small>
                                @endif
                            </div>
                        </a>

                        @if(1)
                            <a href="" target="_blank"
                               class="col-md-4 col-sm-12">
                                <div class="well well-white">
                                    <h5><span class="label label-warning">5</span> Cetak Bukti Pendaftaran</h5>
                                    <p>Cetak pendaftaran siswa, data ini digunakan untuk pendaftaran offline</p>
                                    <small><i>wajib dicetak</i></small>
                                </div>
                            </a>
                        @else
                            <a class="col-md-4 col-sm-12">
                                <div class="well well-white">
                                    <h5><span class="label label-warning">5</span> Cetak Bukti Pendaftaran</h5>
                                    <p>Cetak bukti pendaftaran siswa, data ini digunakan untuk pendaftaran offline</p>
                                    <span class="label label-warning">Lengkapi data terlebih dahulu</span>
                                </div>
                            </a>
                        @endif

                        @if(1)
                            <a href="" target="_blank" class="col-md-4 col-sm-12">
                                <div class="well well-white">
                                    <h5><span class="label label-warning">6</span> Cetak Bukti Penerimaan</h5>
                                    <p>Mencetak bukti penerimaan siswa</p>
                                    <small><i>wajib dicetak</i></small>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body text-center">
                            @if($verifyBiodata ? $verifyBiodata->photo != null : 0)
                                <img src="{{asset('storage/'.$verifyBiodata->photo)}}" class="card-img-top"  style="width: 100px" alt="..." onclick="perbesar('{{asset('storage/'.$verifyBiodata->photo)}}')">
                            @else
                                <img src="{{asset('student/img/users.png')}}" class="card-img-top" style="width: 100px" alt="..." onclick="perbesar('{{asset('student/img/users.png')}}')">
                            @endif
                            <h6 class="card-subtitle mb-2 text-muted">{{$email}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{$no_daftar}}</h6>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <div class="alert alert-warning" role="alert">
                            <p>INFO TERKINI !!</p>
                            <ul>
                                <li>Nama Sekolah : <b>{{$config->name_school}}</b></li>
                                <li>Alamat Sekolah : <b>{{$config->address_school}}</b></li>
                                <li>Tanggal upload data kesehatan : <b>{{date('d/m/Y', strtotime($config->date_registration_selection_health_start))}} - {{date('d/m/Y', strtotime($config->date_registration_selection_health_end))}}</b></li>
                                <li>Tanggal daftar jalur prestasi: <b>{{date('d/m/Y', strtotime($config->date_registration_selection_achievement_start))}} - {{date('d/m/Y', strtotime($config->date_registration_selection_achievement_end))}}</b></li>
                                <li>Tanggal daftar jalur rapot : <b>{{date('d/m/Y', strtotime($config->date_registration_selection_report_start))}} - {{date('d/m/Y', strtotime($config->date_registration_selection_report_end))}}</b></li>
                                <li>Tanggal pengumuman jalur prestasi : <b>{{date('d/m/Y', strtotime($config->date_announcement_achievement_start))}} - {{date('d/m/Y', strtotime($config->date_announcement_achievement_end))}}</b></li>
                                <li>Tanggal pengumuman jalur rapot : <b>{{date('d/m/Y', strtotime($config->date_announcement_report_start))}} - {{date('d/m/Y', strtotime($config->date_announcement_report_end))}}</b></li>
                            </ul>
                        </div>
                        <div class="alert alert-success" role="alert">
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
                </div>
            </div>
        </div>
    </section>
@endsection
