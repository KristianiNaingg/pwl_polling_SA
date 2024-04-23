@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Mata Kuliah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Mata Kuliah</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <div class="card-footer">
            <div class="container-fluid">
                <div class="card-body">
                    <a href="{{route('prodi-mkcreate')}}" class="btn btn-success">Tambah MataKuliah </a>
                </div>

            </div>
            <div class="container-fluid">
                <div class="card-body">
                    <a href="" class="btn btn-success">Hasil Polling <a>
                </div>

            </div>

        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <table id="table-matkul" class="table table-striped">
                            <thead>

                            <tr>

                                <th>No</th>
                                <th>Nama Polling</th>
                                <th>Tanggal Buka</th>
                                <th>Tanggal Tutup</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pollings as  $polling)
                                <tr>
                                    <td>{{ $polling->id_polling }}</td>
                                    <td>{{ $polling->nama_polling }}</td>
                                    <td>{{ $polling->tgl_buka }}</td>
                                    <td>{{ $polling->tgl_tutup}}</td>

                                    <td>


                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </td>

{{--                                    <td>--}}
{{--                                        <a href="{{ route('prodi-mkedit', ['matkul' => $matkul->id_matkul]) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>--}}
{{--                                        <a href="{{ route('prodi-mkupdate', ['matkul' => $matkul->id_matkul]) }}" class="btn btn-danger del-button" role="button" data-confirm="Apakah kamu yakin menghapus ini?"><i class="fas fa-trash"></i></a>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <table id="table-matkul" class="table table-striped">
                            <thead>

                            <tr>
                                <th>No</th>
                                <th>Kode Matkul</th>
                                <th>Nama Matkul</th>
                                <th>SKS</th>
                                <th>Tahun Akademik</th>
                                <th>Semester</th>
                                <th>Nama Polling</th>
                                <th>Tanggal Buka</th>
                                <th>Tanggal Tutup</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($matkuls as  $matkul)
                                <tr>
                                    <td>{{ $matkul->id_matkul }}</td>
                                    <td>{{ $matkul->kode_matkul }}</td>
                                    <td>{{ $matkul->nama_matkul }}</td>
                                    <td>{{ $matkul->sks }}</td>
                                    <td>{{ $matkul->kurikulum->tahun_akademik }}</td>
                                    <td>{{ $matkul->kurikulum->semester }}</td>



                                    <td>
                                        <select name="polling_id" id="polling_id" class="form-control @error('polling_id') is-invalid @enderror">
                                            <option value="">- Pilih kurikulum -</option>
                                            @foreach ($pollings as $polling)
                                                <option value="{{ $polling->id_polling }}">{{$polling->nama_polling }}</option>
                                            @endforeach
                                        </select>

                                    </td>



                                    <td>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
{{--                                                <input type="date" class="form-control" id="tgl_buka" name="tgl_buka" readonly>--}}
                                                <input type="text" class="form-control" name="tgl_buka" id="tgl_buka" placeholder="Tanggal Buka" >
                                            </div>
                                        </div>

                                    </td>

                                    <td>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tgl_tutup" name="tgl_tutup" readonly>
                                            </div>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </td>

                                    <td>
                                        <a href="{{ route('prodi-mkedit', ['matkul' => $matkul->id_matkul]) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('prodi-mkupdate', ['matkul' => $matkul->id_matkul]) }}" class="btn btn-danger del-button" role="button" data-confirm="Apakah kamu yakin menghapus ini?"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('project-03/public/plugins/sweetalert2/sweetalert2.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#table-matkul').DataTable();--}}
{{--        });--}}

{{--        $(document).ready(function(){--}}
{{--            $('.datepicker').datepicker({--}}
{{--                format: 'yyyy-mm-dd',--}}
{{--                autoclose: true--}}
{{--            });--}}
{{--            $('#table-prodi').DataTable();--}}
{{--        });--}}
{{--    </script>--}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#id_polling').change(function() {
                var idPolling = $(this).val();

                // Kirim permintaan AJAX ke backend
                $.ajax({
                    url: '/get-polling-details', // Ganti dengan URL yang sesuai
                    method: 'GET',
                    data: { id: id_Polling },
                    success: function(response) {
                        // Perbarui nilai tgl_buka dan tgl_tutup
                        $('#tgl_buka').val(response.tgl_buka);
                        $('#tgl_tutup').val(response.tgl_tutup);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

@endsection
