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
//  dd($inputProject)
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
  <li class="nav-item <?php echo UserHelp::isActiveRoute('reporting.index') ?>">
    <a href="' . route('input-project.show', $row['id']) . '">
        <button type="button" class="btn "> Detail Project</button>
    </a>
  </li>
  <li class="nav-item <?php echo UserHelp::isActiveRoute('input-project.history') ?>">
    <a href="' . route('input-project/history', $row['id']) . '">
        <button type="button" class="btn "> History Approval</button>
    </a>
  </li>
  <!-- <li><a href="#">...</a></li> -->
</ul>
</div>
    <br> </br>


    <div class="table-responsive" id="table-menu">
        <table class="table data-table table-striped table-hover" id="table_reporting"
            data-url="{{ route('input-project.index') }}"
            data-switchurl="{{ route('input-project.status') }}"
            data-backurl="{{ route('input-project.index') }}" style="width: 100% !important" >
            <thead>
            <tr>
            <!-- <th width=" 10%">No</th> -->
            <!-- <th style="min-width: 130px;white-space: nowrap"> Action</th> -->
            <th colspan="2">Register</th>
            <th colspan="2">Approved by TL/PM</th>
            <th colspan="2">Approved by DH PM</th>
            <th colspan="2">Approved by TL P&P</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PIC</td>
                    <td>Actual</td>
                    <td>PIC</td>
                    <td>Actual</td>
                    <td>PIC</td>
                    <td>Actual</td>
                    <td>PIC</td>
                    <td>Actual</td>
                </tr>
                <tr>
                <td>{{ $inputProject->namainisiatif }}</td>
                <td>{{ $inputProject->nama }}</td>
                <td>{{ $inputProject->code }}</td>
                <td>{{ $inputProject->getIO[0]->name }}</td>
                <td>{{ $inputProject->getProjectDetail[0]->noformrequest }}</td>
                <td>{{ $inputProject->getProjectDetail[0]->requestuploadfrom }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


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

<script src="{{ asset('js/inputProjectDetail/inputProjectDetail.js') }}"></script>
