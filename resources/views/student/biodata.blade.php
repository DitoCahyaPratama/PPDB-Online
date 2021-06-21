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
                @if(1)
                <button class="btn btn-success" onclick="show()"><i class="icon-pencil icon-white"></i> Perbarui Biodata</button>
                @endif
                <hr>
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="alert alert-info">
                            Jika terdapat kesalahan NAMA, silahkan perbarui NAMA Anda yang benar pada sistem ini, kemudian pilih tombol "PERBARUI NAMA" di sebelah kanan kolom NAMA SISWA.
                        </div>
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th width="180px">NISN</th>
                                <td>{{$student ? $student->nisn : ""}}</td>
                            </tr>
                            <tr>
                                <th>Nama siswa</th>
                                <td>{{$student ? $student->name : ""}}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>{{$student ? $student->nik : ""}}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{$student ? $student->gender : ""}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$student ? $student->email : ""}}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>{{$student ? $student->phone_number : ""}}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>{{$student ? $studentReligion->name : ""}}</td>
                            </tr>
                            <tr>
                                <th>Tempat lahir</th>
                                <td>{{$student ? $student->place_born : ""}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{$student ? $student->date_born : ""}}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{$student ? $student->address : ""}}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>{{$student ? ucwords($studentProvince->name) : ""}}</td>
                            </tr>
                            <tr>
                                <th>Kab/Kota</th>
                                <td>{{$student ? ucwords($studentRegency->name) : ""}}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>{{$student ? ucwords($studentDistrict->name) : ""}}</td>
                            </tr>
                            <tr>
                                <th>Desa</th>
                                <td>{{$student ? ucwords($studentVillage->name) : "" }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card text-center" style="padding: 20px">
                            <p>Foto Pribadi</p>
                            @if($student ? $student->photo != null : 0)
                            <img src="{{asset('storage/'.$student->photo)}}" class="card-img-top"  style="width: 100px" alt="..." onclick="perbesar('{{asset('storage/'.$student->photo)}}')">
                            @else
                            <img src="{{asset('student/img/users.png')}}" class="card-img-top" style="width: 100px" alt="..." onclick="perbesar('{{asset('student/img/users.png')}}')">
                            @endif
                            <br/>
                            <small>*Klik gambar untuk memperbesar</small>

                            <hr>
                            <div class="card-body">
                                <p style="text-align: center; color: red">Perbarui Foto Pribadi</p>
                                <div class="form well">
                                    <form enctype="multipart/form-data" action="{{route('student.uploadPhoto')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <a class="file-input-wrapper btn styled-file btn btn-block">Pilih file foto pribadi
                                                <input class="styled-file btn btn-block" name="photo" type="file" title="Pilih file foto pribadi" style="left: -130.25px; top: 15.8906px;"></a>
                                        </div>
                                        <input class="btn btn-info" type="submit" name="yt0" value="Simpan">
                                        <input class="btn btn-danger" name="yt1" type="reset" value="Batal">
                                    </form>
                                    <br>
                                    <a target="_blank" href="/siswa/download/ex/ample/pribadi">Unduh contoh foto pribadi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hide" id="editBiodata">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumbs">
                        <a href="{{route('dashboard.student')}}">Dashboard</a> » <a href="#" onclick="show()">Biodata</a> » <span>Perbarui Biodata</span>
                    </li>
                </ul>
                <h4>Perbarui Biodata Siswa</h4>
                <p>Menampilkan form untuk melengkapi biodata siswa</p>
                <hr>
                <form action="{{route('student.updateBiodata')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div style="border: dotted; padding: 20px; margin: 10px">
                                <div class="alert alert-info">
                                    Kolom dengan tanda * harus diisi.
                                </div>
                                <div class="form-group">
                                    <label for="nisn">Nomor Induk Siswa Nasional (NISN) <span class="required">*</span></label>
                                    <input type="number" class="form-control" name="nisn" placeholder="NISN ..." required="" value="{{$student ? $student->nisn : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Siswa <span class="required">*</span></label>
                                    <small class="form-text text-muted">Nama Anda harus sama dengan nama yang dimasukkan di Kartu Keluarga.</small>
                                    <input type="text" class="form-control" name="name" placeholder="Nama Siswa ... " required="" value="{{$student ? $student->name : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Kependudukan (NIK) <span class="required">*</span></label>
                                    <input type="number" class="form-control" name="nik" placeholder="NIK ..." required="" value="{{$student ? $student->nik : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat<span class="required">*</span></label>
                                    <textarea name="address" class="form-control" placeholder="Alamat ..." required="">{{$student ? $student->address : ""}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="place_born">Tempat Lahir <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="place_born" placeholder="Tempat Lahir ..." required="" value="{{$student ? $student->place_born : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="date_born">Tanggal Lahir <span class="required">*</span></label>
                                    <small class="form-text text-muted">Tanggal Lahir Anda harus sama dengan tanggal lahir yang dimasukkan di Kartu Keluarga.</small>
                                    <input type="date" class="form-control" name="date_born" placeholder="Tanggal Lahir ... " required="" value="{{$student ? $student->date_born : ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin <span class="required">*</span></label>
                                    <div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" value="L" {{ $student ? (($student->gender == "L")  ? "checked" : "") : "" }}>Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" value="P" {{ $student ? (($student->gender == "P")  ? "checked" : "") : "" }}>Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="religion_id">Agama <span class="required">*</span></label>
                                    <select name="religion_id" class="form-control" required="">
                                        <option value="">Pilih agama...</option>
                                        @foreach($religions as $data)
                                            <option value="{{$data->id}}" {{$student ? ($student->religion_id == $data->id  ? "selected" : "") : "" }}>{{$data->name}}</option>
                                        @endforeach
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
                                            <option value="{{$data->id}}" {{$student ? ($student->province_id == $data->id  ? "selected" : "") : "" }}>{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="regency_id">Kabupaten <span class="required">*</span></label>
                                    <input type="hidden" id="regency_id" value="{{$student ? $student->regency_id : ""}}">
                                    <select name="regency_id" class="form-control" required="" id="kabupaten" onchange="loadKec()">
                                        <option value="">Pilih Kabupaten...</option>
                                    </select>
                                    <span class="badge badge-info hide" id="loading_kota">Loading Kota</span>
                                </div>
                                <div class="form-group">
                                    <label for="district_id">Kecamatan <span class="required">*</span></label>
                                    <input type="hidden" id="district_id" value="{{$student ? $student->district_id : ""}}">
                                    <select name="district_id" class="form-control" required="" id="kecamatan" onchange="loadDesa()">
                                        <option value="">Pilih Kecamatan...</option>
                                    </select>
                                    <span class="badge badge-info hide" id="loading_kecamatan">Loading Kecamatan</span>
                                </div>
                                <div class="form-group">
                                    <label for="village_id">Desa <span class="required">*</span></label>
                                    <input type="hidden" id="village_id" value="{{ $student ? $student->village_id : "" }}">
                                    <select name="village_id" class="form-control" required="" id="desa">
                                        <option value="">Pilih Desa...</option>
                                    </select>
                                    <span class="badge badge-info hide" id="loading_desa">Loading Desa</span>
                                </div>
                            </div>
                            <div style="border: dotted; padding: 20px; margin: 10px; margin-top: 30px">
                                <div class="form-group">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Email ..." required="" value="{{$email}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">No. Telepon</label>
                                    <input type="text" class="form-control" name="phone_number" placeholder="No. Telepon ..." value="{{$student ? $student->phone_number : ""}}">
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
        $(document).ready(function(){
            loadKab();
        })
        var tampil_biodata = document.getElementById('biodata');
        var edit_biodata = document.getElementById('editBiodata');

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
                    console.log(data);
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
                imageAlt: 'Foto Anda',
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
