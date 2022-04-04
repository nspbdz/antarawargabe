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
            <li class="breadcrumb-item"><a href="{{ route('internal-order.index') }}"> {{ $title[1] }} </a></li>
            <li class="breadcrumb-item active">{{ $title[2] }}</li>
        </ol>
    </nav>
    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('internal-order.store') }}">
                @csrf
                <input type="hidden" name="data_id" id="data_id">


                @if(isset($internalOrder))
                    <input type="text" class="form-control" name="id" value="{{ $internalOrder->id }}" hidden>
                    <div class="row">

                        <div class="col-md-6">
                            <label>divisiname <span class="danger"></span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ isset($internalOrder) ? $internalOrder['name'] : $id }}"
                                required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                        <label> Code <span class="danger"></span></label>
                            <input id="iocode" type="text" class="form-control @error('iocode') is-invalid @enderror"
                                name="iocode" value="{{ isset($internalOrder) ? $internalOrder['iocode'] : $id }}" required autocomplete="iocode"
                                autofocus>

                            @error('iocode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>



                @else
                <div class="row">
                        <div class="col-md-6">
                            <label> Code <span class="danger">*</span></label>
                            <input id="iocode" type="text" class="form-control @error('iocode') is-invalid @enderror"
                                name="iocode" value="{{ old('iocode') }}" required autocomplete="iocode"
                                autofocus>

                            @error('iocode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- <div class="col-md-6">
                            <label>Inisiatif <span class="danger">*</span></label>
                            <input id="inisiatif" type="inisiatif" class="form-control @error('inisiatif') is-invalid @enderror"
                                name="inisiatif" value="{{ old('inisiatif') }}" required autocomplete="inisiatif">

                            @error('inisiatif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label> name <span class="danger">*</span></label>
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

<script src="{{ asset('js/internal-order/internal-order.js') }}"></script>
