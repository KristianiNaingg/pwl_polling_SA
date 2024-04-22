@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hasil Polling</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Hasil polling detail </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <!-- <div class="card-footer">
            <div class="container-fluid">
                <div class="card-body">
                    <a href="{{route('matkul-create')}}" class="btn btn-success">Tambah MataKuliah </a>
                </div>
            </div>

        </div> -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        <table id="table-matkul" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Status Pemilihan</th>
                                <th>Nama Mahasiswa Pemilih</th>
                                <th>Nama Mata Kuliah</th>
                                <th> Tanggal Polling <th>         
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($matkuls as  $matkul)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
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
    <script>
        $(document).ready(function() {
            $('#table-matkul').DataTable();
        });
    </script>
@endsection
