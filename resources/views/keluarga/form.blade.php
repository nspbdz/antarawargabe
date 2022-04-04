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
            <li class="breadcrumb-item"><a href="{{ route('keluarga.index') }}"> {{ $title[1] }} </a></li>
            <li class="breadcrumb-item active">{{ $title[2] }}</li>
        </ol>
    </nav>

    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('keluarga.store') }}">
                @csrf
                <input type="hidden" name="data_id" id="data_id">


                @if(isset($warga))
                    <input type="text" class="form-control" name="id" value="{{ $warga->id }}" hidden>
                    <div class="row">

                        <div class="col-md-6">
                            <label>nokk <span class="danger">*</span></label>
                            <input id="nokk" type="number" class="form-control @error('nokk') is-invalid @enderror"
                                name="nokk" value="{{ isset($warga) ? $warga['nokk'] : $id }}"
                            required autocomplete="nokk" autofocus >

                            @error('nokk')
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
                        <br></br>

                        <div class="row">
                            <div class="col-md-3">
                                    <label><input name="warga_lingkungan" type="radio" value="1" {{ ($warga->iswarga_lingkungan=="1")? "checked" : "" }} required> Warga Lingkungan </label>
                                </div>
                            <div class="col-md-3">
                                    <label><input name="warga_lingkungan" type="radio" value="2" {{ ($warga->iswarga_lingkungan=="2")? "checked" : "" }}>Warga Luar Lingkungan</label>
                            </div>

                            <!-- </div> -->
                        </div>


                @else
                <div class="row">

                        <div class="col-md-6">
                            <label>NO. Kartu Keluarga <span class="danger">*</span></label>
                            <input id="nokk" type="number" class="form-control @error('nokk') is-invalid @enderror"
                                name="nokk" value="{{ old('nokk') }}" required autocomplete="nokk">

                            @error('nokk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-6">
<!-- <div class="container"> -->
    <input class="typeahead form-control" type="text">
<!-- </div> -->

<script type="text/javascript">
    var path = "{{ route('keluarga.autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
                            <label>Nama <span class="danger">*</span></label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label> Tempat Lahir <span class="danger">*</span></label>
                            <input id="tempatlahir" type="text" class="form-control @error('tempatlahir') is-invalid @enderror"
                                name="tempatlahir" value="{{ old('tempatlahir') }}" required autocomplete="tempatlahir"
                                autofocus>

                            @error('tempatlahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label>Tanggal Lahir <span class="danger">*</span></label>
                            <input id="tanggallahir" type="date" class="form-control @error('tanggallahir') is-invalid @enderror"
                                name="tanggallahir" value="{{ old('tanggallahir') }}" required autocomplete="tanggallahir">

                            @error('tanggallahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label> Pekerjaan <span class="danger">*</span></label>
                            <input id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                name="pekerjaan" value="{{ old('pekerjaan') }}" required autocomplete="pekerjaan"
                                autofocus>

                            @error('pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <br></br>

                        <div class="row">
                            <div class="col-md-3">
                                    <label><input name="warga_lingkungan" type="radio"   value="1" {{ old('warga_lingkungan') == "1" ? 'checked' : '' }} required>Warga Lingkungan </label>
                                </div>
                            <div class="col-md-3">
                                    <label><input name="warga_lingkungan" type="radio"  value="2" {{ old('warga_lingkungan') == "2" ? 'checked' : '' }} >Warga Luar Lingkungan</label>
                            </div>
                            @error('warga_lingkungan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!-- </div> -->
                        </div>

                @endif
            <br>
            </br>
                <div class="row mb-0">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                        <a href="{{ route('keluarga.index') }}">
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.js" ></script> -->
<!-- <script src="bootstrap-autocomplete.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="{{ asset('js/master/keluarga/keluarga.js') }}"></script>
