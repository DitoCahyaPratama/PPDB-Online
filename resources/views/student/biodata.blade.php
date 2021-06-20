@extends('layouts.app')

@section('content')
    <div class="pb-4 mb-4">
        <section class="show" id="biodata">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumbs">
                        <a href="{{route('dashboard.student')}}">Dashboard</a> » <span>Biodata</span>
                    </li>
                </ul>
                <h4>Biodata Siswa</h4>
                <p>Menampilkan informasi biodata siswa</p>
                <?php
                //            $query_verification = _run("SELECT * FROM users WHERE verification_status='1'");
                //            $data = _get($query_verification);
                //            if($data){
                //
                //            }else{
                ?>
                <button class="btn btn-success" onclick="show()"><i class="icon-pencil icon-white"></i> Perbarui Biodata</button>
                <?php
                //            }
                ?>
                <hr>
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="alert alert-info">
                            Jika terdapat kesalahan NAMA, silahkan perbarui NAMA Anda yang benar pada sistem ini, kemudian pilih tombol "PERBARUI NAMA" di sebelah kanan kolom NAMA SISWA.
                        </div>
                        <table class="table table-striped table-bordered">
                            <?php
                            //                        $query = _run("SELECT * FROM biographies WHERE user_id = '".$id."'");
                            //                        $data = _get($query);
                            ?>
                            <tbody>
                            <tr>
                                <th width="180px">NISN</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Nama siswa</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>
                                    <?php
                                    //                                $religion_id = $data['religion_id'];
                                    //                                $query_religion = _run("SELECT * FROM religions WHERE id='".$religion_id."'");
                                    //                                $data_religion = _get($query_religion);
                                    //                                echo $data_religion['name'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tempat lahir</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Desa</th>
                                <td>
                                    <?php
                                    //                                $village_id = $data['village_id'];
                                    //                                $query_village = _run("SELECT * FROM villages WHERE id='".$village_id."'");
                                    //                                $data_village = _get($query_village);
                                    //                                echo $data_village['name'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>
                                    <?php
                                    //                                $district_id = $data['district_id'];
                                    //                                $query_district = _run("SELECT * FROM districts WHERE id='".$district_id."'");
                                    //                                $data_district = _get($query_district);
                                    //                                echo $data_district['name'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Kab/Kota</th>
                                <td>
                                    <?php
                                    //                                $regency_id = $data['regency_id'];
                                    //                                $query_regency = _run("SELECT * FROM regencies WHERE id='".$regency_id."'");
                                    //                                $data_regency = _get($query_regency);
                                    //                                echo $data_regency['name'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>
                                    <?php
                                    //                                $province_id = $data['province_id'];
                                    //                                $query_province = _run("SELECT * FROM provinces WHERE id='".$province_id."'");
                                    //                                $data_province = _get($query_province);
                                    //                                echo $data_province['name'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Kebangsaan</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>No. Handphone</th>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card" style="padding: 20px">
                            <p>Foto Pribadi</p>
                            <?php
                            //                        if($data['photo']){
                            ?>
                            {{--                        <img src="temp/image/pribadi/<?php echo $data['photo'] ?>" class="card-img-top" style="" alt="..." onclick="perbesar('temp/image/pribadi/<?php echo $data['photo'] ?>')">--}}
                            <?php
                            //                        }else{
                            ?>
                            <img src="{{asset('student/img/users.png')}}" class="card-img-top" style="" alt="..." onclick="perbesar('{{asset('student/img/users.png')}}')">
                            <?php
                            //                        }
                            ?>
                            <small>*Klik gambar untuk memperbesar</small>

                            <hr>
                            <div class="card-body">
                                <p style="text-align: center; color: red">Perbarui Foto Pribadi</p>
                                <div class="form well">
                                    <form enctype="multipart/form-data" action="server.php?p=uploadFotoBiodata" method="post">
                                        <div class="row">
                                            <a class="file-input-wrapper btn styled-file btn btn-block">Pilih file foto pribadi
                                                <input class="styled-file btn btn-block" name="foto" type="file" title="Pilih file foto pribadi" style="left: -130.25px; top: 15.8906px;"></a>
                                        </div>
                                        <input class="btn btn-info" type="submit" name="yt0" value="Simpan">
                                        <input class="btn btn-danger" name="yt1" type="reset" value="Batal">
                                    </form>
                                    <br>
                                    {{--                                <a target="_blank" href="/siswa/download/ex/ample/pribadi">Unduh contoh foto pribadi</a>            --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hide" id="editBiodata">
            <?php
            //        $query_ambil = _run("SELECT * FROM biographies WHERE user_id='".$id."'");
            //        $data_ambil = _get($query_ambil);
            ?>
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumbs">
                        <a href="{{route('dashboard.student')}}">Dashboard</a> » <a href="#" onclick="show()">Biodata</a> » <span>Perbarui Biodata</span>
                    </li>
                </ul>
                <h4>Perbarui Biodata Siswa</h4>
                <p>Menampilkan form untuk melengkapi biodata siswa</p>
                <hr>
                <form action="server.php?p=updateBiodata" method="POST">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div style="border: dotted; padding: 20px; margin: 10px">
                                <div class="alert alert-info">
                                    Kolom dengan tanda * harus diisi.
                                </div>
                                <div class="form-group">
                                    <label for="nisn">Nomor Induk Siswa Nasional (NISN) <span class="required">*</span></label>
                                    <input type="number" class="form-control" name="nisn" placeholder="NISN ..." required="" value="">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Siswa <span class="required">*</span></label>
                                    <small class="form-text text-muted">Nama Anda harus sama dengan nama yang dimasukkan di Kartu Keluarga.</small>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Siswa ... " required="" value="">
                                </div>
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Kependudukan (NIK) <span class="required">*</span></label>
                                    <input type="number" class="form-control" name="nik" placeholder="NIK ..." required="" value="">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir ..." required="" value="">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir <span class="required">*</span></label>
                                    <small class="form-text text-muted">Tanggal Lahir Anda harus sama dengan tanggal lahir yang dimasukkan di Kartu Keluarga.</small>
                                    <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir ... " required="" value="">
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin <span class="required">*</span></label>
                                    <div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="jk" value="L" >Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="jk" value="P" >Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tb">Tinggi Badan <span class="required">*</span></label>
                                            <input type="number" class="form-control" name="tb" placeholder="Tinggi Badan ..." required="" value="">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="bb">Berat Badan <span class="required">*</span></label>
                                            <input type="number" class="form-control" name="bb" placeholder="Berat Badan ..." required="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama <span class="required">*</span></label>
                                    <select name="agama" class="form-control" required="">
                                        <option value="">Pilih agama...</option>
                                        {{--                                    <?php--}}
                                        {{--                                    $query = _run('SELECT * FROM religions');--}}
                                        {{--                                    while($data = _get($query)){--}}
                                        {{--                                    ?>--}}
                                        {{--                                    <option value="<?php echo $data['id']; ?>" <?php if($data_ambil['religion_id'] == $data['id']){?> selected <?php } ?>><?php echo $data['name']; ?></option>--}}
                                        {{--                                    <?php--}}
                                        {{--                                    }--}}
                                        {{--                                    ?>--}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat<span class="required">*</span></label>
                                    <textarea name="alamat" class="form-control" placeholder="Alamat ..." required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kebangsaan">Kebangsaan <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="kebangsaan" placeholder="Kebangsaan ..." required="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div style="border: dotted; padding: 20px; margin: 10px">
                                <div class="form-group">
                                    <label for="provinsi">Provinsi <span class="required">*</span></label>
                                    <select name="provinsi" class="form-control" onchange="loadKab()" id="provinsi" required="">
                                        <option value="">Pilih Provinsi...</option>
                                        {{--                                    <?php--}}
                                        {{--                                    $query = _run("SELECT * FROM provinces");--}}
                                        {{--                                    while($data = _get($query)){--}}
                                        {{--                                    ?>--}}
                                        {{--                                    <option value="<?php echo $data['id'] ?>" <?php if($data_ambil['province_id'] == $data['id']){?> selected <?php } ?>><?php echo $data['name'] ?></option>--}}
                                        {{--                                    <?php--}}
                                        {{--                                    }--}}
                                        {{--                                    ?>--}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten <span class="required">*</span></label>
                                    <input type="hidden" id="regency_id" value="">
                                    <select name="kabupaten" class="form-control" required="" id="kabupaten" onchange="loadKec()">
                                        <option value="">Pilih Kabupaten...</option>
                                    </select>
                                    <span class="badge badge-info hide" id="loading_kota">Loading Kota</span>
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan <span class="required">*</span></label>
                                    <input type="hidden" id="district_id" value="">
                                    <select name="kecamatan" class="form-control" required="" id="kecamatan" onchange="loadDesa()">
                                        <option value="">Pilih Kecamatan...</option>
                                    </select>
                                    <span class="badge badge-info hide" id="loading_kecamatan">Loading Kecamatan</span>
                                </div>
                                <div class="form-group">
                                    <label for="desa">Desa <span class="required">*</span></label>
                                    <input type="hidden" id="village_id" value="">
                                    <select name="desa" class="form-control" required="" id="desa">
                                        <option value="">Pilih Desa...</option>
                                    </select>
                                    <span class="badge badge-info hide" id="loading_desa">Loading Desa</span>
                                </div>
                            </div>
                            <div style="border: dotted; padding: 20px; margin: 10px; margin-top: 30px">
                                <div class="form-group">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email ..." required="" value="">
                                </div>
                                <div class="form-group">
                                    <label for="notelp">No. Telepon</label>
                                    <input type="text" class="form-control" name="notelp" placeholder="No. Telepon ..." value="">
                                </div>
                                <div class="form-group">
                                    <label for="nohp">No. Handphone <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="nohp" placeholder="No. Handphone ..." required="" value="">
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
    </div>
@endsection

@push('jsCode')
    <script src="{{ asset('student/js/sweetalert.js') }}"></script>
    <script type="text/javascript">
        var tampil_biodata = document.getElementById('biodata');
        var edit_biodata = document.getElementById('editBiodata');
        // loadKab();
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
            if(tampil_biodata.className == 'show'){
                tampil_biodata.className = 'hide';
                edit_biodata.className = 'show';
            }else{
                tampil_biodata.className = 'show';
                edit_biodata.className = 'hide';
            }
        }
        // function loadKab(){
        //     var provinsi = $('#provinsi').val();
        //     var regency_id = $('#regency_id').val();
        //     $.ajax({
        //         url: 'server.php?p=getKabupaten',
        //         data: {
        //             provinsi:provinsi,
        //             regency_id:regency_id
        //         },
        //         type: 'POST',
        //         beforeSend:function(){
        //             $("#kabupaten").attr("disabled",true);
        //             $("#loading_kota").show();
        //         },
        //         success:function(data){
        //             $("#loading_kota").hide();
        //             $("#kabupaten").removeAttr("disabled");
        //             if(data == ""){
        //                 $("#kabupaten").html("<option value=''>Pilih Kabupaten...</option>");
        //                 $("#kecamatan").html("<option value=''>Pilih Kecamatan...</option>");
        //                 $("#desa").html("<option value=''>Pilih Desa...</option>");
        //             }else{
        //                 $("#kabupaten").html("<option value=''>Pilih Kabupaten...</option>"+data);
        //                 $("#kecamatan").html("<option value=''>Pilih Kecamatan...</option>");
        //                 $("#desa").html("<option value=''>Pilih Desa...</option>");
        //             }
        //             loadKec();
        //         },
        //         error:function(err){
        //             alert(err);
        //         }
        //     })
        // }
        // function loadKec(){
        //     var kabupaten = $('#kabupaten').val();
        //     var district_id = $('#district_id').val();
        //     $.ajax({
        //         url: 'server.php?p=getKecamatan',
        //         data: {
        //             kabupaten:kabupaten,
        //             district_id:district_id
        //         },
        //         type: 'POST',
        //         beforeSend:function(){
        //             $("#kecamatan").attr("disabled",true);
        //             $("#loading_kecamatan").show();
        //         },
        //         success:function(data){
        //             $("#loading_kecamatan").hide();
        //             $("#kecamatan").removeAttr("disabled");
        //             if(data == ""){
        //                 $("#kecamatan").html("<option value=''>Pilih Kecamatan...</option>");
        //                 $("#desa").html("<option value=''>Pilih Desa...</option>");
        //             }else{
        //                 $("#kecamatan").html("<option value=''>Pilih Kecamatan...</option>"+data);
        //                 $("#desa").html("<option value=''>Pilih Desa...</option>");
        //             }
        //             loadDesa();
        //         },
        //         error:function(err){
        //             alert(err);
        //         }
        //     })
        // }
        // function loadDesa(){
        //     var kecamatan = $('#kecamatan').val();
        //     var village_id = $('#village_id').val();
        //     $.ajax({
        //         url: 'server.php?p=getDesa',
        //         data: {
        //             kecamatan:kecamatan,
        //             village_id:village_id
        //         },
        //         type: 'POST',
        //         beforeSend:function(){
        //             $("#desa").attr("disabled",true);
        //             $("#loading_desa").show();
        //         },
        //         success:function(data){
        //             $("#loading_desa").hide();
        //             $("#desa").removeAttr("disabled");
        //             if(data == ""){
        //                 $("#desa").html("<option value=''>Pilih Desa...</option>");
        //             }else{
        //                 $("#desa").html("<option value=''>Pilih Desa...</option>"+data);
        //             }
        //         },
        //         error:function(err){
        //             alert(err);
        //         }
        //     })
        // }
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
