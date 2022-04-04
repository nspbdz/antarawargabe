@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<?php
// dd($pnpbtn);
// dd($approval->getProjectDetail['projectid']);
// dd($inputProject['id']);
// dd($userNow->roleid);
 ?>

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
        @if ( count($approvalStatusPnpPmTl)==1 && count($approvalStatusPnpPmDh)==1 )
        @if($pnpNavigation !== null)
        <li class="nav-item <?php echo UserHelp::isActiveRoute('approval.index') ?>">
            <a href="/approval/pnp/{{ $approval->id }}">
                <button type="button" class="btn ">  Approval P&P</button>
            </a>
        </li>
        @endif
        @endif
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
<!-- approval show -->
<div class="row">
    <div class="col-md-6">
        <label>nama Inisiatif <span class="danger"></span></label>
        <input id="initiativename" type="text" class="form-control @error('initiativename') is-invalid @enderror"
            name="initiativename"
            value="{{ isset($approval) ? $approval['initiativename'] : $id }}"
            required autocomplete="initiativename" autofocus disabled>

        @error('initiativename')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label>No Bast <span class="danger"></span></label>
        <input id="bastno" type="text" class="form-control @error('bastno') is-invalid @enderror" name="bastno"
            value="{{ isset($approval) ? $approval['bastno'] : $id }}"
            required autocomplete="bastno" autofocus disabled>

        @error('bastno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>
<br>

<div class="row">

    <div class="col-md-6">
        <label>nama Pekerjaan <span class="danger"></span></label>
        <input id="projectname" type="text" class="form-control @error('projectname') is-invalid @enderror" name="projectname"
            value="{{ isset($approval) ? $approval['projectname'] : $id }}" required
            autocomplete="projectname" autofocus disabled>

        @error('projectname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label>No. SPP/SPK/PO <span class="danger"></span></label>
        <input id="sppno" type="text" class="form-control @error('sppno') is-invalid @enderror" name="sppno"
            value="{{ isset($approval) ? $approval['sppno'] : $id }}"
            required autocomplete="sppno" autofocus disabled>

        @error('sppno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

<br>

<div class="row">

    <div class="col-md-6">
        <label>Project Code <span class="danger"></span></label>
        <input id="projectcode" type="text" class="form-control @error('projectcode') is-invalid @enderror" name="projectcode"
            value="{{ isset($projectById) ? $projectById['projectcode'] : $id }}" required
            autocomplete="projectcode" autofocus disabled disabled>

        @error('projectcode')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label>Jumlah Upload <span class="danger"></span></label>
        <input id="qtyupload" type="number" class="form-control @error('qtyupload') is-invalid @enderror"
            name="qtyupload"
            value="{{ isset($approval) ? $approval['qtyupload'] : $id }}"
            required autocomplete="qtyupload" autofocus disabled>

        @error('qtyupload')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

<br>

<div class="row">

    <div class="col-md-6">
        <label>IO <span class="danger"></span></label>
        <input id="internalOrder" type="text" class="form-control @error('internalOrder') is-invalid @enderror"
            name="internalOrder"
            value="{{ isset($ioById) ? $ioById['iocode'] : $id }}"
            required autocomplete="internalOrder" autofocus disabled disabled>
                        </div>
                        <div class="col-md-6">
                            <label>Total Jumlah Upload <span class="danger"></span></label>
                            <input id="totalupload" type="number" class="form-control @error('totalupload') is-invalid @enderror"
                                name="totalupload"
                                value="{{ isset($approval) ? $approval['totalupload'] : $id }}"
                                required autocomplete="totalupload" autofocus disabled>

                                    @error('totalupload')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>

                    </div>

                    <br>

                    <div class="row">

                        <div class="col-md-6">
                            <label>No Formulir Permintaan <span class="danger"></span></label>
                            <input id="noformrequest" type="text" class="form-control @error('noformrequest') is-invalid @enderror"
                                name="noformrequest"
                                value="{{ isset($approval) ? $approval['noformrequest'] : $id }}"
                                required autocomplete="noformrequest" autofocus disabled>

                                    @error('noformrequest')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Keterangan <span class="danger"></span></label>
                            <input id="note" type="text" class="form-control @error('note') is-invalid @enderror"
                                name="note"
                                value="{{ isset($approval) ? $approval['note'] : $id }}"
                                required autocomplete="note" autofocus disabled>

                                    @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>

                    </div>
                    <br>

                    <div class="row">

                        <div class="col-md-6">
                            <label>Permintaan Upload Dari <span class="danger"></span></label>
                            <input id="requestuploadfrom" type="text" class="form-control @error('requestuploadfrom') is-invalid @enderror"
                                name="requestuploadfrom"
                                value="{{ isset($approval) ? $approval['requestuploadfrom'] : $id }}"
                                required autocomplete="requestuploadfrom" autofocus disabled>

                                    @error('requestuploadfrom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Nomor Nota ke SPM <span class="danger"></span></label>
                            <input id="notano" type="text" class="form-control @error('notano') is-invalid @enderror"
                                name="notano"
                                value="{{ isset($approval) ? $approval['notano'] : $id }}"
                                required autocomplete="notano" autofocus disabled>

                                    @error('notano')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                        </div>

                    </div>
                   <br>

        <br>
   <div id="btnapproved">
<!-- pm tl -->

@if ( count($approvalStatusBtn)==0)
@if($userNow->getAccess->getRole['name']=="pm-tl" )

    <div class="row mb-0">
        <div class="col-md-12 offset-md-4">

            @csrf
            <button id="{{ $approval->id }}" class="btn btn-primary approve">
                Approve
            </button>

            <button id="{{ $approval->id }}" type="button" class="btn btn-danger reject">
                Reject
            </button>
        </div>
    </div>

@endif
@endif
<!-- pm tl -->


<!-- pm dh -->
@if($approvalStatusReject == 0)
@if ($approvalStatusPmDh !== null)
@if ( count($approvalStatusBtn)==0)
@if($userNow->getAccess->getRole['name']=="pm-dh" )

    <div class="row mb-0">
        <div class="col-md-12 offset-md-4">

            @csrf
            <button id="{{ $approval->id }}" class="btn btn-primary approve">
                Approve
            </button>

            <button id="{{ $approval->id }}" type="button" class="btn btn-danger reject">
                Reject
            </button>
        </div>
    </div>
@endif
@endif
@endif
@endif

<!-- pm dh -->

<!-- pnp tl -->

@if($approvalStatusReject == 0)

@if ( count($approvalStatusPnpPmTl)==1 && count($approvalStatusPnpPmDh)==1 )
@if ( count($approvalStatusBtn)==0)

@if($userNow->getAccess->getRole['name']=="pnp-tl" )

@if($pnpNavigation !== null)

    <div class="row mb-0">
        <div class="col-md-12 offset-md-4">
            @csrf
            <button id="{{ $approval->id }}" class="btn btn-primary approve">
                Approve
            </button>

            <button id="{{ $approval->id }}" type="button" class="btn btn-danger reject">
                Reject
            </button>
        </div>
    </div>
@endif

    @else


@endif
@endif
@endif
@endif
<!-- pnp tl -->





    <!-- @if($userNow->getAccess->getRole['name']=="pm-tl" ||$userNow->getAccess->getRole['name']=="pm-dh" ||$userNow->getAccess->getRole['name']=="pnp-tl" )
        <div class="row mb-0">
            <div class="col-md-12 offset-md-4">
                @csrf
                <button id="{{ $approval->id }}" class="btn btn-primary approve">
                    Approve
                </button>

                <button id="{{ $approval->id }}" type="button" class="btn btn-danger reject">
                    Reject
                </button>
            </div>
        </div>
        @endif -->


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

        <script src="{{ asset('js/approval/approval.js') }}"></script>
