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
            <li class="breadcrumb-item"><a href="{{ route('project.index') }}"> {{ $title[1] }} </a></li>
            <li class="breadcrumb-item active">{{ $title[2] }}</li>
        </ol>
    </nav>

    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('project.store') }}">
                @csrf
                <input type="hidden" name="data_id" id="data_id">


                @if(isset($project))
                    <input type="text" class="form-control" name="id" value="{{ $project->id }}" hidden>
                    <div class="row">

                        <div class="col-md-4">
                            <label>code <span class="danger"></span></label>
                            <input type="text" class="form-control" name="projectcode" value="{{ isset($project) ? $project['projectcode'] : $id }}" hidden>

                            <input id="projectcode" type="text" class="form-control @error('projectcode') is-invalid @enderror"
                                name="projectcode"
                                value="{{ isset($project) ? $project['projectcode'] : $id }}"
                                required autocomplete="projectcode" autofocus disabled>

                            @error('projectcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>nama Projek <span class="danger"></span></label>
                            <input id="projectname" type="text" class="form-control @error('projectname') is-invalid @enderror"
                                name="projectname"
                                value="{{ isset($project) ? $project['projectname'] : $id }}"
                                required autocomplete="projectname" autofocus>

                            @error('projectname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label>Nama Inisiatif <span class="danger"></span></label>
                            <input id="initiativename" type="text" class="form-control @error('initiativename') is-invalid @enderror"
                                name="initiativename"
                                value="{{ isset($project) ? $project['initiativename'] : $id }}"
                                required autocomplete="initiativename" autofocus>

                            @error('initiativename')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                    </div>

                @else
                    <div class="row">

                        <div class="col-md-6">
                            <label>Code <span class="danger">*</span></label>
                            <input id="projectcode" type="projectcode" class="form-control @error('projectcode') is-invalid @enderror"
                                name="projectcode" value="{{ old('projectcode') }}" required autocomplete="projectcode">

                            @error('projectcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label> Nama Inisiatif <span class="danger">*</span></label>
                            <input id="initiativename" type="text" class="form-control @error('initiativename') is-invalid @enderror"
                                name="initiativename" value="{{ old('initiativename') }}" required autocomplete="initiativename"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <br></br>
                   <div class="row">
                        <div class="col-md-6">
                        <label> nama project <span class="danger">*</span></label>
                            <input id="projectname" type="text" class="form-control @error('projectname') is-invalid @enderror"
                                name="projectname" value="{{ old('projectname') }}" required autocomplete="projectname"
                                autofocus>

                            @error('projectname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                        <label> Budget Allocation <span class="danger">*</span></label>
                            <input id="budgetallocation" type="number" class="form-control @error('budgetallocation') is-invalid @enderror"
                                name="budgetallocation" value="{{ old('budgetallocation') }}" required autocomplete="budgetallocation"
                                autofocus>

                            @error('budgetallocation')
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
                        <a href="{{ route('project.index') }}">
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

<script src="{{ asset('js/master/project/project.js') }}"></script>
