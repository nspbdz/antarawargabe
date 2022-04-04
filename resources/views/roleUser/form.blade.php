@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection
<?php
// dd($role);
 ?>
@section('content')
<?php
 ?>
<style>
    ul {
        list-style-type: none;
    }

</style>
<!-- <div class="row">
    <div class="col-md-12"> -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home"></i> Home </a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('role.index') }}"> {{ $title[1] }} </a></li>
        <li class="breadcrumb-item active">{{ $title[2] }}</li>
    </ol>
</nav>
<section class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
    </div>
    <div class="card-body">


        <form method="POST" action="{{ route('role.store') }}">
            @csrf
            <input type="hidden" name="data_id" id="data_id">

            @if(isset($role))
                <input type="text" class="form-control" name="id" value="{{ $role->id }}" hidden>
                <div class="row">

                    <div class="col-md-6">
                        <label>Nama Role <span class="danger">*</span></label>
                         <input type="text" class="form-control" name="name" value="{{ $role->name }}" hidden>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ isset($role) ? $role['name'] : $id }}"
                            required autocomplete="name" autofocus disabled>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <br>

                <h5>Menu</h5>
                <div class="container" id="checkboxes">

                    <div class="form-group" id="pagesCheckboxes">
                        @foreach($allPages as $item)
                            <div class="checkbox checkbox-info checkbox-inline">
                                <input class="pages_group_checkbox" type="checkbox" value="{{ $item }}"
                                    name="{{ $item }}" id="pages_group{{ $item }}" @foreach ($pagesDataExplode as
                                    $pages) @if($item==$pages ) checked @endif @endforeach />
                                <label for="pages_group{{ $item }}">{{ $item }}</label>
                            </div>
                        @endforeach
                    </div>

                </div>

            @else
                <!-- create -->
                <div class="col-md-6">
                    <label>Nama Role <span class="danger">*</span></label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                    <br>

                    <h5>Menu</h5>
                    <div class="container" id="checkboxes">

                    <div class="form-group" id="pagesCheckboxes">
                        @foreach($allPages as $key => $item)
                            <div class="checkbox checkbox-info checkbox-inline">
                                <input class="pages_group_checkbox" type="checkbox" value="{{ $item }}"
                                    name="{{ $item }}" id="pages_group{{$key+1}}" />
                                <label for="pages_group{{ $item }}">{{ $item }}</label>
                            </div>
                        @endforeach
                    </div>

            @endif

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                    <!-- <button  class="btn btn-primary">
                            {{ __('Save') }}
                        </button> -->
                    <a href="{{ route('crosscheckdata.index') }}">
                        <button type="button" class="btn btn-danger"> Cancel
                        </button>
                    </a>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("input[name='master']").change(function () {
            if ($(this).is(":checked")) {
                console.log(this)
                $("#pagesCheckboxes #pages_group8").prop('checked', true);
                $("#pagesCheckboxes #pages_group9").prop('checked', true);
                $("#pagesCheckboxes #pages_group10").prop('checked', true);
                $("#pagesCheckboxes #pages_group11").prop('checked', true);
                $("#pagesCheckboxes #pages_group12").prop('checked', true);
                $("#pagesCheckboxes #pages_group12").prop('checked', true);
                $("#pagesCheckboxes #pages_group13").prop('checked', true);
                $("#pagesCheckboxes #pages_group14").prop('checked', true);

            } else {
                $("#pagesCheckboxes #pages_group8").prop('checked', false);
                $("#pagesCheckboxes #pages_group9").prop('checked', false);
                $("#pagesCheckboxes #pages_group10").prop('checked', false);
                $("#pagesCheckboxes #pages_group11").prop('checked', false);
                $("#pagesCheckboxes #pages_group12").prop('checked', false);
                $("#pagesCheckboxes #pages_group12").prop('checked', false);
                $("#pagesCheckboxes #pages_group13").prop('checked', false);
                $("#pagesCheckboxes #pages_group14").prop('checked', false);
            }

        });
        $("button").click(function () {
            // $('#checkboxes input:checked').each(function() {
            //     console.log(this);
            //     $(this).attr('value', 1);
            // });
            // $('#checkboxes input:checkbox:not(:checked)').each(function() {
            //     console.log(this);
            //     $(this).attr('value', "kosong");
            // });

        });
    });

</script>

<!-- jquery.dataTables.min -->

<!-- <script src=" {{ asset('js/datatable/jquery.dataTables.min.js') }} " type="text/javascript"></script> -->
<!-- <script src=" {{ asset('js/datatable/dataTables.bootstrap4.min.js') }} " type="text/javascript"></script> -->
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('js/master/roleUser/roleUser.js') }}"></script>
