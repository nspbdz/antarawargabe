@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<?php
// dd($inputProject->iocode);
// dd($inputProject->getProjectDetail['projectid']);
// dd($inputProject['id']);
// dd($projectById);
 ?>
<!-- <div class="row">
    <div class="col-md-12"> -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home"></i> Home </a></li>
            <li class="breadcrumb-item"><a href="{{ route('input-project.index') }}"> {{ $title[1] }} </a></li>
            <li class="breadcrumb-item active">{{ $title[2] }}</li>
        </ol>
    </nav>

    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('input-project.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="data_id" id="data_id">
                @if(isset($inputProject))
                    <input type="text" class="form-control" name="idDetail" value="{{ $inputProject->id }}" hidden>
                    <div class="row">

                        <div class="col-md-6">
                            <label>nama Inisiatif <span class="danger"></span></label>
                            <input id="namainisiatif" type="text" class="form-control @error('namainisiatif') is-invalid @enderror"
                                name="namainisiatif"
                                value="{{ isset($inputProject) ? $inputProject['initiativename'] : $id }}"
                                required autocomplete="namainisiatif" autofocus>

                                @error('namainisiatif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-6">
                            <label>No Bast <span class="danger"></span></label>
                            <input id="bastno" type="text" class="form-control @error('bastno') is-invalid @enderror"
                                name="bastno"
                                value="{{ isset($inputProject) ? $inputProject['bastno'] : $id }}"
                                required autocomplete="bastno" autofocus>

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
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                name="nama"
                                value="{{ isset($inputProject) ? $inputProject['projectname'] : $id }}"
                                required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-6">
                            <label>No. SPP/SPK/PO <span class="danger"></span></label>
                            <input id="sppno" type="text" class="form-control @error('sppno') is-invalid @enderror"
                                name="sppno"
                                value="{{ isset($inputProject) ? $inputProject['sppno'] : $id }}"
                                required autocomplete="sppno" autofocus>

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

                             <input id="project_select" type="text" class="form-control @error('project_select') is-invalid @enderror"
                                name="project_select"
                                value="{{ isset($projectById) ? $projectById->projectname : $id }}"
                                required autocomplete="project_select" autofocus disabled>

                                @error('project_select')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Jumlah Upload <span class="danger"></span></label>
                            <input id="qtyupload" type="number" class="form-control @error('qtyupload') is-invalid @enderror"
                                name="qtyupload"
                                value="{{ isset($inputProject) ? $inputProject['qtyupload'] : $id }}"
                                required autocomplete="qtyupload" autofocus>

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
                            <input id="io_select" type="text" class="form-control @error('io_select') is-invalid @enderror"
                                name="io_select"
                                value="{{ isset($ioById) ? $ioById->name : $id }}"
                                required autocomplete="io_select" autofocus disabled>

                            <!-- <input id="internalOrder" type="text" class="form-control @error('internalOrder') is-invalid @enderror"
                                name="internalOrder"
                                value="{{ isset($inputProject->getIO) ? $inputProject->getIO['name'] : $id }}"
                                required autocomplete="internalOrder" autofocus disabled> -->

                                <!-- @error('internalOrder')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                        </div>

                        <div class="col-md-6">
                            <label>Total Jumlah Upload <span class="danger"></span></label>
                            <input id="totalupload" type="number" class="form-control @error('totalupload') is-invalid @enderror"
                                name="totalupload"
                                value="{{ isset($inputProject) ? $inputProject['totalupload'] : $id }}"
                                required autocomplete="totalupload" autofocus>

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
                                value="{{ isset($inputProject) ? $inputProject['noformrequest'] : $id }}"
                                required autocomplete="noformrequest" autofocus>

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
                                value="{{ isset($inputProject) ? $inputProject['note'] : $id }}"
                                required autocomplete="note" autofocus>

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
                                value="{{ isset($inputProject) ? $inputProject['requestuploadfrom'] : $id }}"
                                required autocomplete="requestuploadfrom" autofocus>

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
                                value="{{ isset($inputProject) ? $inputProject['notano'] : $id }}"
                                required autocomplete="notano" autofocus>

                                @error('notano')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    </div>
                   <br>

                   <div class="row">

                    <div class="col-md-6">
                        <label>Master Asset <span class="danger"></span></label>
                        <input id="masterasset" type="text" class="form-control @error('masterasset') is-invalid @enderror"
                            name="masterasset"
                            value="{{ old('masterasset') }}"
                            required autocomplete="masterasset" autofocus disabled>

                            @error('masterasset')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="col-md-6">
                        <label>File <span class="danger">*</span></label>

                        <div class="form-group">
                        <input type="file" name="file" placeholder="Choose file" id="file">
                            @error('file')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    </div>

                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <br>

                @else
                <div class="row">
                <input type="text" class="form-control" name="idProject" value="buat" hidden>

                        <div class="col-md-6">
                            <label>nama Inisiatif <span class="danger"></span></label>
                            <input id="namainisiatif" type="text" class="form-control @error('namainisiatif') is-invalid @enderror"
                                name="namainisiatif"
                                value="{{ old('namainisiatif') }}"
                                required autocomplete="namainisiatif" autofocus>

                                @error('namainisiatif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                         <div class="col-md-6">
                            <label>No Bast <span class="danger"></span></label>
                            <input id="bastno" type="text" class="form-control @error('bastno') is-invalid @enderror"
                                name="bastno"
                                value="{{ old('bastno') }}"
                                required autocomplete="bastno" autofocus>

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
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                name="nama"
                                value="{{ old('nama') }}"     required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-6">
                            <label>No. SPP/SPK/PO <span class="danger"></span></label>
                            <input id="sppno" type="text" class="form-control @error('sppno') is-invalid @enderror"
                                name="sppno"
                                value="{{ old('sppno') }}"
                                required autocomplete="sppno" autofocus>

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
                            <label>Vendor Name <span class="danger"></span></label>

                            <input id="vendorname" type="text" class="form-control @error('vendorname') is-invalid @enderror"
                                name="vendorname"
                                value="{{ old('vendorname') }}"
                                required autocomplete="vendorname" autofocus>

                                @error('vendorname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Detail Pekerjaan <span class="danger"></span></label>
                            <input id="jobdetail" type="text" class="form-control @error('jobdetail') is-invalid @enderror"
                                name="jobdetail"
                                value="{{ old('jobdetail') }}"
                                required autocomplete="jobdetail" autofocus>

                                @error('jobdetail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        </div>

                        <br>

                        <div class="row">

                        <div class="col-md-6">
                            <label>No. Kontrak <span class="danger"></span></label>

                            <input id="kontraknumber" type="number" class="form-control @error('kontraknumber') is-invalid @enderror"
                                name="kontraknumber"
                                value="{{ old('kontraknumber') }}"
                                required autocomplete="kontraknumber" autofocus>

                                @error('kontraknumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Alokasi Anggaran <span class="danger"></span></label>
                            <input id="budgetallocation" type="number" class="form-control @error('budgetallocation') is-invalid @enderror"
                                name="budgetallocation"
                                value="{{ old('budgetallocation') }}"
                                required autocomplete="budgetallocation" autofocus>

                                @error('budgetallocation')
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
                            <select id="project_select" name="project_select" class="form-control col-md-12 @error('project_select') is-invalid @enderror" style="width: 100% !important" id="rekening_kas_select">
                                <option value="0">Pilih Proyek</option>
                                @foreach ($projectCode as $itemProject)
                                <option value="{{ $itemProject->id }}">
                                            {{ $itemProject->projectname }}</option>
                                @endforeach
                            </select>
                                <!-- <div>
                                @error('project_select')
                                <div style="width:200px" class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror -->
                                @error('project_select')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Jumlah Upload <span class="danger"></span></label>
                            <input id="qtyupload" type="number" class="form-control @error('qtyupload') is-invalid @enderror"
                                name="qtyupload"
                                value="{{ old('qtyupload') }}"
                                required autocomplete="qtyupload" autofocus>

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
                          
                            <select id="io_select" name="io_select" class="form-control col-md-12 @error('io_select') is-invalid @enderror" style="width: 100% !important" id="rekening_kas_select">
                                <option value="0">Pilih Internal Order</option>
                                @foreach ($ioCode as $itemIo)
                                <option value="{{ $itemIo->id }}">
                                            {{ $itemIo->name }}</option>
                                @endforeach
                            </select>

                                 @error('io_select')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Total Jumlah Upload <span class="danger"></span></label>
                            <input id="totalupload" type="number" class="form-control @error('totalupload') is-invalid @enderror"
                                name="totalupload"
                                value="{{ old('totalupload') }}"
                                required autocomplete="totalupload" autofocus>

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
                                value="{{ old('noformrequest') }}"
                                required autocomplete="noformrequest" autofocus>

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
                                value="{{ old('note') }}"
                                required autocomplete="note" autofocus>

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
                                value="{{ old('requestuploadfrom') }}"
                                required autocomplete="requestuploadfrom" autofocus>

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
                                value="{{ old('notano') }}"
                                required autocomplete="notano" autofocus>

                                @error('notano')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                    </div>
                   <br>
                   <div class="row">

                <div class="col-md-6">
                    <label>Master Asset <span class="danger"></span></label>
                    <input id="masterasset" type="text" class="form-control @error('masterasset') is-invalid @enderror"
                        name="masterasset"
                        value="{{ old('masterasset') }}"
                        required autocomplete="masterasset" autofocus disabled>

                        @error('masterasset')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="col-md-6">
                    <label>File <span class="danger">*</span></label>

                    <div class="form-group">
                      <input type="file" name="file" placeholder="Choose file" id="file">
                        @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>

                    @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <br>

                @endif
            <br>
                <div class="row mb-0">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                        <a href="{{ route('input-project.index') }}">
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
