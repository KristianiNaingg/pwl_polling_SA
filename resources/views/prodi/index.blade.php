@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1 class="m-0">Jadwal Polling</h1>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Jadwal Polling</li>
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
                    <a href="{{route('prodi-create')}}" class="btn btn-success">Tambah Jadwal Polling </a>
                </div>
            </div>

        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <table id="table-kk" class="table table-striped">
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
                              @foreach($prodis as $prodi)
                                <tr>
                                    <td>{{ $prodi->id }}</td>
                                    <td>{{ $prodi->nama_polling}}</td>
                                    <td>{{ $prodi->tgl_buka }}</td>
                                    <td>{{ $prodi->tgl_tutup}}</td>
                                    <td><a href="{{route('matkul-list')}}">Detail</a> </td>
                                    <td>
                                        <a href="{{route('prodi-edit',['prodi'=> $prodi-> id])}}" class="btn btn-warning " role="button"><i class= "fas fa-edit"></i></a>
                                        {{--                                        <a href="{{route('kk-delete',['kartuKeluarga'=> $kk-> no])}}" class="btn btn-danger " role="button"><i class= "fas fa-trash"></i></a>--}}
                                        <a href="{{ route('prodi-delete', ['prodi' => $prodi->id]) }}" class="btn btn-danger del-button" role="button" data-confirm="Apakah kamu yakin menghapus ini?"><i class="fas fa-trash"></i></a>

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

@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
{{--    <script>--}}
{{--        $('#table-kk').DataTable();--}}
{{--    </script>--}}

    <script>
        // $('#table-kk').DataTable();
        // $('.del-button').on('click', function (e){
        //     e.preventDefault();
        //     Swal.fire({
        //         title : "Yakin",
        //         showCancelButton:true;
        //     }).then((result) => {
        //         if(result.isConfirmed){
        //             window.location =this.href;
        //         }
        //     })
        // })
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function (event) {
                    const confirmationMessage = button.getAttribute('data-confirm');
                    if (!confirm(confirmationMessage)) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>

@endsection
