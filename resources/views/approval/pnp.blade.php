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
//  dd($pnpId);
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
            <a href="/approval/{{$approval->id}}">
                <button type="button" class="btn "> Detail Project</button>
            </a>
        </li>
        @if($userNow->getAccess->getRole['name'] == "pm-dh" || $userNow->getAccess->getRole['name']== "pm-tl" )
        <li class="nav-item <?php echo UserHelp::isActiveRoute('approval.index') ?>">
            <a href="/approval/pm/{{ $approval->id }}">
                <button type="button" class="btn ">  Approval PM</button>
            </a>
        </li>
        @elseif ($userNow->getAccess->getRole['name'] == "pnp-tl")
        <li class="nav-item <?php echo UserHelp::isActiveRoute('approval.index') ?>">
            <a href="/approval/pnp/{{ $approval->id }}">
                <button type="button" class="btn ">  Approval P&P</button>
            </a>
        </li>
        @else
        <li class="nav-item <?php echo UserHelp::isActiveRoute('approval.index') ?>">
            <a href="/approval/pm/{{ $approval->id }}">
                <button type="button" class="btn ">  Approval PM</button>
            </a>
        </li>
        <li class="nav-item <?php echo UserHelp::isActiveRoute('approval.index') ?>">
            <a href="/approval/pnp/{{ $approval->id }}">
                <button type="button" class="btn ">  Approval P&P</button>
            </a>
        </li>
        @endif
    </ul>
</div>

    <br> </br>


    <div class="table-responsive" id="table-menu">
        <table class="table data-table table-striped table-hover" id="table_reporting"
            data-url="{{ route('approval.index') }}" data-id="{{$pnpId}}"

            data-backurl="{{ route('approval.index') }}" style="width: 100% !important" >
            <thead>
            <tr>
            <!-- <th width=" 10%">No</th> -->
            <!-- <th style="min-width: 130px;white-space: nowrap"> Action</th> -->
            <th colspan="2">Register</th>
            <th colspan="2">Approved by TL/PM</th>
            <!-- <th colspan="2">Approved by DH PM</th> -->
            <!-- <th colspan="2">Approved by TL P&P</th> -->
            </tr>
            </thead>
            <tbody id="tabel_result">
            </tbody>
            <!-- </tbody> -->
        </table>
    </div>
</div>

<div id="btnapproved">


@if ( count($statusPnpPmTl)==1 && count($statusPnpPmDh)==1 )
@if ( count($approvalStatusBtn)==0)


@if($userNow->getAccess->getRole['name']=="pnp-tl" )


    <div class="row mb-0">
        <div class="col-md-12 offset-md-4">
            @csrf
            <button id="{{ $pnpId }}" class="btn btn-primary approve">
                Approve
            </button>

            <button id="{{ $pnpId }}" type="button" class="btn btn-danger reject">
                Reject
            </button>
        </div>
    </div>
    @else


@endif
@endif
@endif
</div>


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

<script src="{{ asset('js/approval/approvalPnp.js') }}"></script>
