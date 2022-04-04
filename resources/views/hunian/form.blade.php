@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<?php
// dd($warga->birthdate);
 ?>
<!-- <div class="row">
    <div class="col-md-12"> -->
     <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home"></i> Home </a></li>
            <li class="breadcrumb-item"><a href="{{ route('hunian.index') }}"> {{ $title[1] }} </a></li>
            <li class="breadcrumb-item active">{{ $title[2] }}</li>
        </ol>
    </nav>

    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('hunian.store') }}">
                @csrf
                <input type="hidden" name="data_id" id="data_id">


                @if(isset($warga))
                    <input type="text" class="form-control" name="id" value="{{ $warga->id }}" hidden>
                    <div class="row">

                        <div class="col-md-6">
                            <label>NIK <span class="danger">*</span></label>
                            <input id="nik" type="number" class="form-control @error('nik') is-invalid @enderror"
                                name="nik" value="{{ isset($warga) ? $warga['nik'] : $id }}"
                            required autocomplete="nik" autofocus >

                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <label>Nama <span class="danger">*</span></label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ isset($warga) ? $warga['name'] : $id }}"
                            required autocomplete="name" autofocus >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label> Tempat Lahir <span class="danger">*</span></label>
                            <input id="tempatlahir" type="text" class="form-control @error('tempatlahir') is-invalid @enderror"
                                name="tempatlahir" value="{{ isset($warga) ? $warga['placeofbirth'] : $id }}"
                            required autocomplete="tempatlahir" autofocus >

                            @error('tempatlahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                         <?php
                        //  dd($time);
                          ?>

                        <div class="col-md-6">
                            <label>Tanggal Lahir <span class="danger">*</span></label>
                            <input id="tanggallahir" type="date" class="form-control @error('tanggallahir') is-invalid @enderror"
                                name="tanggallahir" value="{{ isset($time) ? $time : $id }}" required autocomplete="tanggallahir" autofocus >


                            @error('tanggallahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label> Pekerjaan <span class="danger">*</span></label>
                            <input id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                name="pekerjaan" value="{{ isset($warga) ? $warga['job'] : $id }}"  required autocomplete="pekerjaan" autofocus >

                            @error('pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>

                @else
                <div class="row">

                        <div class="col-md-6">
                            <label>No.Block <span class="danger">*</span></label>
                            <input id="nomor_blok" type="number" class="form-control @error('nomor_blok') is-invalid @enderror"
                                name="nomor_blok" value="{{ old('nomor_blok') }}" required autocomplete="nomor_blok">

                            @error('nomor_blok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <label>No. Rumah <span class="danger">*</span></label>
                            <input id="nomor_rumah" type="nomor_rumah" class="form-control @error('nomor_rumah') is-invalid @enderror"
                                name="nomor_rumah" value="{{ old('nomor_rumah') }}" required autocomplete="nomor_rumah">

                            @error('nomor_rumah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label> Tipe Bangunan <span class="danger">*</span></label>
                            <input id="tipe_bangungan" type="text" class="form-control @error('tipe_bangungan') is-invalid @enderror"
                                name="tipe_bangungan" value="{{ old('tipe_bangungan') }}" required autocomplete="tipe_bangungan"
                                autofocus>

                            @error('tipe_bangungan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label>Luas Tanah <span class="danger">*</span></label>
                            <input id="luas_tanah" type="number" class="form-control @error('luas_tanah') is-invalid @enderror"
                                name="luas_tanah" value="{{ old('luas_tanah') }}" required autocomplete="luas_tanah">

                            @error('luas_tanah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label> Luas Bangunan <span class="danger">*</span></label>
                            <input id="luas_bangunan" type="number" class="form-control @error('luas_bangunan') is-invalid @enderror"
                                name="luas_bangunan" value="{{ old('luas_bangunan') }}" required autocomplete="luas_bangunan"
                                autofocus>

                            @error('luas_bangunan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>



                @endif
            <br>
            </br>
                <div class="row mb-0">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                        <a href="{{ route('hunian.index') }}">
                            <button type="button" class="btn btn-danger"> Cancel
                            </button>
                        </a>
                    </div>
                </div>
            </form>


        </div>
    </section>




<!-- </div>
</div> -->


@endsection
<!-- <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-3.5.1.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->


<!-- jquery.dataTables.min -->

<!-- <script src=" {{ asset('js/datatable/jquery.dataTables.min.js') }} " type="text/javascript"></script> -->
<!-- <script src=" {{ asset('js/datatable/dataTables.bootstrap4.min.js') }} " type="text/javascript"></script> -->
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>


<script src="{{ asset('js/warga/hunian.js') }}"></script>
