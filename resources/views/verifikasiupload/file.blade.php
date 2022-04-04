@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<!-- <div class="row">
    <div class="col-md-12"> -->
<?php
//  dd($inputProject->getIO[0]->name)
//  dd(count($statusTl));
//  dd($approval->getProjectDetailApprovalHistory);
// dd(Route::currentRouteName());

 ?>
<style>
    .btn-icon {
        /* display: inline; */
        position: sticky;
        /* padding:0; */
        /* float:left; */
        right: 0;
        /* margin:0; */
    }

</style>
<div class="container">
    <div class="btn-group">
    <ul class="nav nav-pills">
        <li class="nav-item <?php echo UserHelp::isActiveRoute('approval.index') ?>">
            <a href="/verifikasi-upload/{{$approval->id}}">
                <button type="button" class="btn "> Detail Project</button>
            </a>
        </li>
        <li class="nav-item <?php echo UserHelp::isActiveRoute('approval.index') ?>">
            <a href="/verifikasi-upload/pm/{{ $approval->id }}">
                <button type="button" class="btn ">  Approval PM</button>
            </a>
        </li>
        <li class="nav-item <?php echo UserHelp::isActiveRoute('approval.index') ?>">
            <a href="/verifikasi-upload/pnp/{{ $approval->id }}">
                <button type="button" class="btn ">  Approval P&P</button>
            </a>
        </li>
        <li class="nav-item <?php echo UserHelp::isActiveRoute('approval.index') ?>">
            <a href="/verifikasi-upload/file/{{ $approval->id }}">
                <button type="button" class="btn ">  File</button>
            </a>
        </li>
    </ul>
</div>

    <br> </br>
    <div class="container">
        verifikasi file :
        <a href="/verifikasi-upload/downloads/{{$id}}">{{$dataFile->name}}</a>
    </div>


</div>

<div id="btnapproved">

</div>
@endsection
<!-- <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-3.5.1.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

<!-- jquery.dataTables.min -->

<!-- <script src=" {{ asset('js/datatable/jquery.dataTables.min.js') }} " type="text/javascript"></script> -->
<!-- <script src=" {{ asset('js/datatable/dataTables.bootstrap4.min.js') }} " type="text/javascript"></script> -->
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<!-- <script src="{{ asset('js/verifikasiupload/verifikasiPm.js') }}"></script> -->

