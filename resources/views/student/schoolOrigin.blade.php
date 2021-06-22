@extends('layouts.app')

@section('content')
    <div class="registration-page-area bg-secondary">
        <section class="show" id="pendidikan">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumbs">
                        <a href="{{route('dashboard.student')}}">Dashboard</a> » <span>Sekolah Asal</span>
                    </li>
                </ul>
                <h4>Data Sekolah Asal</h4>
                <p>Menampilkan informasi data asal sekolah</p>
                <button class="btn btn-success" onclick="show()"><i class="icon-pencil icon-white"></i> Perbarui Data Sekolah Asal</button>
                <hr>
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <table class="table table-striped table-bordered" id="yw0">
                            <tbody>
                            <tr>
                                <td width="180px">Nama Sekolah</td>
                                <td>{{$schoolorigin ? $schoolorigin->name : ""}}</td>
                            </tr>
                            <tr>
                                <td width="180px">Alamat Sekolah</td>
                                <td>{{$schoolorigin ? $schoolorigin->address : ""}}</td>
                            </tr>
                            <tr>
                                <td width="180px">Tahun Lulus</td>
                                <td>{{$schoolorigin ? $schoolorigin->graduation_year : ""}}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>{{$schoolorigin ? ucwords($schooloriginProvince->name) : ""}}</td>
                            </tr>
                            <tr>
                                <th>Kab/Kota</th>
                                <td>{{$schoolorigin ? ucwords($schooloriginRegency->name) : ""}}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>{{$schoolorigin ? ucwords($schooloriginDistrict->name) : ""}}</td>
                            </tr>
                            <tr>
                                <th>Desa</th>
                                <td>{{$schoolorigin ? ucwords($schooloriginVillage->name) : "" }}</td>
                            </tr>
                            <tr>
                                <td width="180px">Jenis Sekolah</td>
                                <td>{{$schoolorigin ? $schoolorigin->type : ""}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-center" style="padding: 20px">
                            <p>Scan SKL(Surat Keterangan Lulus)</p>
                            @if($schoolorigin ? $schoolorigin->photo != null : 0)
                                <img src="{{asset('storage/'.$schoolorigin->photo)}}" class="card-img-top"  style="width: 100px" alt="..." onclick="perbesar('{{asset('storage/'.$schoolorigin->photo)}}')">
                            @else
                                <img src="{{asset('student/img/users.png')}}" class="card-img-top" style="width: 100px" alt="..." onclick="perbesar('{{asset('student/img/users.png')}}')">
                            @endif
                            <br/>
                            <small>*Klik gambar untuk memperbesar</small>

                            <hr>
                            <div class="card-body">
                                <p style="text-align: center; color: red">Perbarui Scan SKL</p>
                                <div class="form well">
                                    <form enctype="multipart/form-data" action="{{route('student.uploadSKL')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <a class="file-input-wrapper btn styled-file btn btn-block">Pilih file scan SKL
                                                <input class="styled-file btn btn-block" name="photo" type="file" title="Pilih file scan SKL" style="left: -130.25px; top: 15.8906px;"></a>
                                        </div>
                                        <input class="btn btn-info" type="submit" name="yt0" value="Simpan">
                                        <input class="btn btn-danger" name="yt1" type="reset" value="Batal">
                                    </form>
                                    <br>
                                    <a target="_blank" href="/siswa/download/ex/ample/pribadi">Unduh contoh scan SKL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hide" id="editPendidikan">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumbs">
                        <a href="{{route('dashboard.student')}}">Dashboard</a> » <a href="#" onclick="show()">Pendidikan</a> » <span>Perbarui Data Pendidikan</span>
                    </li>
                </ul>
                <h4>Perbarui Data Pendidikan</h4>
                <p>Menampilkan form untuk melengkapi data pendidikan</p>
                <hr>
                <form action="{{route('student.updateSchoolorigin')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div style="border: dotted; padding: 20px; margin: 10px">
                                <div class="alert alert-info">
                                    Kolom dengan tanda * harus diisi.
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Sekolah <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama Sekolah ..." required="" value="">
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat<span class="required">*</span></label>
                                    <textarea name="address" class="form-control" placeholder="Alamat ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="graduation_year">Tahun Lulus <span class="required">*</span></label>
                                    <select name="graduation_year" class="form-control" required="">
                                        <option value="">Pilih tahun lulus...</option>
                                        @for ($x=date('Y'); $x>=2000; $x--)
                                            <option value="{{$x}}" {{$schoolorigin ? ($schoolorigin->graduation_year == $x ? "selected" : "") : ''}}>{{$x}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="type">Jenis Sekolah <span class="required">*</span></label>
                                    <select name="type" class="form-control" required="">
                                        <option value="">Pilih jenis sekolah...</option>
                                        <option value="Negeri">Negeri</option>
                                        <option value="Swasta">Swasta</option>
                                        <option value="Maarif">Ma'arif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div style="border: dotted; padding: 20px; margin: 10px">
                                <div class="form-group">
                                    <label for="province_id">Provinsi <span class="required">*</span></label>
                                    <select name="province_id" class="form-control" onchange="loadKab()" id="provinsi" required="">
                                        <option value="">Pilih Provinsi...</option>
                                        @foreach($provinces as $data)
                                            <option value="{{$data->id}}" {{$schoolorigin ? ($schoolorigin->provinces_id == $data->id  ? "selected" : "") : "" }}>{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="regency_id">Kabupaten <span class="required">*</span></label>
                                    <input type="hidden" id="regency_id" value="{{$schoolorigin ? $schoolorigin->regency_id : ""}}">
                                    <select name="regency_id" class="form-control" required="" id="kabupaten" onchange="loadKec()">
                                        <option value="">Pilih Kabupaten...</option>
                                    </select>
                                    <span class="badge badge-info hide" id="loading_kota">Loading Kota</span>
                                </div>
                                <div class="form-group">
                                    <label for="district_id">Kecamatan <span class="required">*</span></label>
                                    <input type="hidden" id="district_id" value="{{$schoolorigin ? $schoolorigin->district_id : ""}}">
                                    <select name="district_id" class="form-control" required="" id="kecamatan" onchange="loadDesa()">
                                        <option value="">Pilih Kecamatan...</option>
                                    </select>
                                    <span class="badge badge-info hide" id="loading_kecamatan">Loading Kecamatan</span>
                                </div>
                                <div class="form-group">
                                    <label for="village_id">Desa <span class="required">*</span></label>
                                    <input type="hidden" id="village_id" value="{{ $schoolorigin ? $schoolorigin->village_id : "" }}">
                                    <select name="village_id" class="form-control" required="" id="desa">
                                        <option value="">Pilih Desa...</option>
                                    </select>
                                    <span class="badge badge-info hide" id="loading_desa">Loading Desa</span>
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
    @if(1)
        <script type="text/javascript">
            var tampil_pendidikan = document.getElementById('pendidikan');
            var edit_pendidikan = document.getElementById('editPendidikan');
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
                if(tampil_pendidikan.className == 'show'){
                    tampil_pendidikan.className = 'hide';
                    edit_pendidikan.className = 'show';
                }else{
                    tampil_pendidikan.className = 'show';
                    edit_pendidikan.className = 'hide';
                }
            }
            function loadKab(){
                var provinsi = $('#provinsi').val();
                var regency_id = $('#regency_id').val();
                $.ajax({
                    url: '{{route('region.getRegencies')}}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "provinsi":provinsi,
                        "regency_id":regency_id
                    },
                    type: 'POST',
                    beforeSend:function(){
                        $("#kabupaten").attr("disabled",true);
                        $("#loading_kota").show();
                    },
                    success:function(data){
                        $("#loading_kota").hide();
                        $("#kabupaten").removeAttr("disabled");
                        if(data == ""){
                            $("#kabupaten").html("<option value=''>Pilih Kabupaten...</option>");
                            $("#kecamatan").html("<option value=''>Pilih Kecamatan...</option>");
                            $("#desa").html("<option value=''>Pilih Desa...</option>");
                        }else{
                            $("#kabupaten").html("<option value=''>Pilih Kabupaten...</option>"+data);
                            $("#kecamatan").html("<option value=''>Pilih Kecamatan...</option>");
                            $("#desa").html("<option value=''>Pilih Desa...</option>");
                        }
                        loadKec();
                    },
                    error:function(err){
                        console.log(err)
                    }
                })
            }
            function loadKec(){
                var kabupaten = $('#kabupaten').val();
                var district_id = $('#district_id').val();
                $.ajax({
                    url: '{{route('region.getDistricts')}}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        kabupaten:kabupaten,
                        district_id:district_id
                    },
                    type: 'POST',
                    beforeSend:function(){
                        $("#kecamatan").attr("disabled",true);
                        $("#loading_kecamatan").show();
                    },
                    success:function(data){
                        $("#loading_kecamatan").hide();
                        $("#kecamatan").removeAttr("disabled");
                        if(data == ""){
                            $("#kecamatan").html("<option value=''>Pilih Kecamatan...</option>");
                            $("#desa").html("<option value=''>Pilih Desa...</option>");
                        }else{
                            $("#kecamatan").html("<option value=''>Pilih Kecamatan...</option>"+data);
                            $("#desa").html("<option value=''>Pilih Desa...</option>");
                        }
                        loadDesa();
                    },
                    error:function(err){
                        console.log(err)
                    }
                })
            }
            function loadDesa(){
                var kecamatan = $('#kecamatan').val();
                var village_id = $('#village_id').val();
                $.ajax({
                    url: '{{route('region.getVillages')}}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        kecamatan:kecamatan,
                        village_id:village_id
                    },
                    type: 'POST',
                    beforeSend:function(){
                        $("#desa").attr("disabled",true);
                        $("#loading_desa").show();
                    },
                    success:function(data){
                        $("#loading_desa").hide();
                        $("#desa").removeAttr("disabled");
                        if(data == ""){
                            $("#desa").html("<option value=''>Pilih Desa...</option>");
                        }else{
                            $("#desa").html("<option value=''>Pilih Desa...</option>"+data);
                        }
                    },
                    error:function(err){
                        console.log(err)
                    }
                })
            }
            function perbesar(image){
                Swal.fire({
                    imageUrl: image,
                    imageWidth: 300,
                    imageHeight: 400,
                    imageAlt: 'Foto SKL',
                    animation: true
                })
            }
        </script>
    @else
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
    @endif
@endpush
