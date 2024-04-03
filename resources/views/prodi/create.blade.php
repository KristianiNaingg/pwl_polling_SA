
@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">

                                {{implode('',$errors-> all (':message'))}}
                            </div>
                        @endif



                        <form method="post" action="{{route('prodi-store')}}">
                            @csrf <!-- @crsf wajib ada di setiap form -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="id-prodi" class="col-sm-2 col-form-label">No</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id-prodi" placeholder="Contoh : 1" name="id" required autofocus maxlength="16">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nama-polling" class="col-sm-2 col-form-label">Nama Polling </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama-polling" placeholder="Contoh: Polling 1" required name="polling" maxlength="100">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tgl_buka" class="col-sm-2 col-form-label">Tanggal Buka</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" name="tanggalbuka" placeholder="Pilih Tanggal">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_tututp" class="col-sm-2 col-form-label">Tanggal Buka</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" name="tanggaltutup" placeholder="Pilih Tanggal">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('ExtraJS')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $('#table-prodi').DataTable();
    </script>
@endsection
