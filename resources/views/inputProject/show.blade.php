@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<!-- <div class="row">
    <div class="col-md-12"> -->
 <?php
 dd($inputProject->getIO)
//  dd($inputProject);
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
    <a href="' . route('input-project.show', $inputProject->id) . '">
        <button type="button" class="btn "> Detail Project</button>
    </a>
  </li>
  <li class="nav-item <?php echo UserHelp::isActiveRoute('reporting.index') ?>">
  <a href="/input-project/history-approval/{{$inputProject->id}}">
        <button type="button" class="btn "> History Approval</button>
    </a>
  </li>
  <!-- <li><a href="#">...</a></li> -->
</ul>
</div>
    <br> </br>


    <div class="table-responsive" id="table-menu">
        <table class="table data-table table-striped table-hover table-bordered" id="table_reporting"
            data-url="{{ route('input-project.index') }}"
            data-switchurl="{{ route('input-project.status') }}"
            data-backurl="{{ route('input-project.index') }}" style="width: 100% !important" >
            <thead>
            <tr>
            <!-- <th width=" 10%">No</th> -->
            <!-- <th style="min-width: 130px;white-space: nowrap"> Action</th> -->
            <th>Nama Inisiatif</th>
            <th>Nama Pekerjaan</th>
            <th>Project Code</th>
            <th>IO</th>
            <th>No. Formulir Permintaan</th>
            <th>Permintaan Upload</th>
            <th>Nama vendor</th>
            <th>No Bast</th>
            <th>No. SPP/SPK/PO</th>
            <th>Jumlah Upload</th>
            <th>Total Jumlah Upload</th>
            <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{ $inputProject->initiativename }}</td>
                <td>{{ $inputProject->projectname }}</td>
                <td>{{ $inputProject->projectcode }}</td>
                <td>{{ $inputProject->getIO->name }}</td>
                <td>{{ $inputProject->noformrequest }}</td>
                <td>{{ $inputProject->requestuploadfrom }}</td>
                <td>"vendor"</td>
                <td>{{ $inputProject->bastno }}</td>
                <td>{{ $inputProject->sppno }}</td>
                <td>{{ $inputProject->qtyupload }}</td>
                <td>{{ $inputProject->totalupload }}</td>
                <td>{{ $inputProject->note }}</td>
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
