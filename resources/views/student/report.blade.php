@extends('layouts.app')

@section('content')
    <section class="show" id="prestasi">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumbs">
                    <a href="{{route('dashboard.student')}}">Dashboard</a> » <span>Raport Siswa</span>
                </li>
            </ul>
            <h4>Data Raport Siswa</h4>
            <p>Menampilkan informasi data raport siswa</p>
            <button class="btn btn-success" onclick="show()"><i class="icon-plus icon-white"></i> Perbarui Prestasi</button>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th id="prestasi-sekolah-grid_c0">Agama</th>
                            <th id="prestasi-sekolah-grid_c1">PKN</th>
                            <th id="prestasi-sekolah-grid_c2">BI</th>
                            <th id="prestasi-sekolah-grid_c3">MTK</th>
                            <th id="prestasi-sekolah-grid_c4">IPA</th>
                            <th id="prestasi-sekolah-grid_c4">IPS</th>
                            <th id="prestasi-sekolah-grid_c4">BING</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($report != null)
                            <tr>
                                <td>{{ $report ? $report->agama : "" }}</td>
                                <td>{{ $report ? $report->pkn : "" }}</td>
                                <td>{{ $report ? $report->bi : "" }}</td>
                                <td>{{ $report ? $report->mtk : "" }}</td>
                                <td>{{ $report ? $report->ipa : "" }}</td>
                                <td>{{ $report ? $report->ips : "" }}</td>
                                <td>{{ $report ? $report->bing : "" }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="7">Data Kosong</td>
                            </tr>
                        @endif
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
                    <a href="{{route('dashboard.student')}}">Dashboard</a> » <a href="#" onclick="show()">Raport Siswa</a> » <span>Perbarui Rapot Siswa</span>
                </li>
            </ul>
            <h4>Data Raport Siswa</h4>
            <p>Menampilkan form untuk memperbarui data raport siswa</p>
            <hr>
            <form action="{{route('student.add.report')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div style="border: dotted; padding: 20px; margin: 10px">
                            <div class="alert alert-info">
                                Kolom dengan tanda * harus diisi.
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama<span class="required">*</span></label>
                                <input type="number" class="form-control" name="agama" min="0" max="100" value="{{$report ? $report->agama : ""}}" placeholder="Nilai Agama ..." required="">
                            </div>
                            <div class="form-group">
                                <label for="pkn">PKN<span class="required">*</span></label>
                                <input type="number" class="form-control" name="pkn" min="0" max="100" value="{{$report ? $report->pkn : ""}}" placeholder="Nilai PKN ..." required="">
                            </div>
                            <div class="form-group">
                                <label for="name">BI<span class="required">*</span></label>
                                <input type="number" class="form-control" name="bi" min="0" max="100" value="{{$report ? $report->bi : ""}}" placeholder="Nilai BI ..." required="">
                            </div>
                            <div class="form-group">
                                <label for="name">MTK<span class="required">*</span></label>
                                <input type="number" class="form-control" name="mtk" min="0" max="100" value="{{$report ? $report->mtk : ""}}" placeholder="Nilai MTK ..." required="">
                            </div>
                            <div class="form-group">
                                <label for="name">IPA<span class="required">*</span></label>
                                <input type="number" class="form-control" name="ipa" min="0" max="100" value="{{$report ? $report->ipa : ""}}" placeholder="Nilai IPA ..." required="">
                            </div>
                            <div class="form-group">
                                <label for="name">IPS<span class="required">*</span></label>
                                <input type="number" class="form-control" name="ips" min="0" max="100" value="{{$report ? $report->ips : ""}}" placeholder="Nilai IPS ..." required="">
                            </div>
                            <div class="form-group">
                                <label for="name">BING<span class="required">*</span></label>
                                <input type="number" class="form-control" name="bing" min="0" max="100" value="{{$report ? $report->bing : ""}}" placeholder="Nilai BING ..." required="">
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
