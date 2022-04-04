@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<?php
 ?>
<!-- <div class="row">
    <div class="col-md-12"> -->
     <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home"></i> Home </a></li>
            <li class="breadcrumb-item"><a href="{{ route('team.index') }}"> {{ $title[1] }} </a></li>
            <li class="breadcrumb-item active">{{ $title[2] }}</li>
        </ol>
    </nav>

    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('team.store') }}">
                @csrf
                <input type="hidden" name="data_id" id="data_id">


                @if(isset($team))
                    <input type="text" class="form-control" name="id" value="{{ $team->id }}" hidden>
                    <div class="row">

                        <div class="col-md-6">
                            <label>Departement Code <span class="danger"></span></label>
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror"
                                name="name"
                                value="{{ isset($team) ? $team['divisicode'] : $id }}"
                            required autocomplete="code" autofocus disabled>

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- jika ingin tidak disabled -->
                        <!-- <div class="col-md-6">
                        <label>Departement Name <span class="danger"></span></label>
                        <select id="departement_select" name="departement_select"
                            class="form-control col-md-12 @error('departement_select') is-invalid @enderror"
                            style="width: 100% !important" id="rekening_kas_select">
                            <option value="0">Pilih Departement</option>
                            @foreach($departement as $itemDepartement)
                                <option value="{{ $itemDepartement->id }}"
                                     {{ (isset($team) && $team->departementcode == $itemDepartement['id']) ? 'selected' : '' }}>
                                    {{ $itemDepartement->name }}</option>
                            @endforeach
                        </select>
                        @error('departement_select')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> -->

                        <div class="col-md-6">
                        <label>Team Name <span class="danger"></span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ isset($team) ? $team['name'] : $id }}"
                                required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                @else
                    <div class="row">

                    <div class="col-md-6">
                            <label>Departement Name <span class="danger"></span></label>
                            <select id="departement_select" name="departement_select" class="form-control col-md-12 @error('departement_select') is-invalid @enderror" style="width: 100% !important" id="rekening_kas_select">
                                <option value="0">Pilih Departement</option>
                                @foreach ($departement as $itemDepartement)
                                <option value="{{ $itemDepartement->id }}">
                                            {{ $itemDepartement->name }}</option>
                                @endforeach
                            </select>
                                @error('departement_select')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Team name <span class="danger">*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                @endif
            <br>
                <div class="row mb-0">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>
                        <a href="{{ route('team.index') }}">
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

<script src="{{ asset('js/team/team.js') }}"></script>
