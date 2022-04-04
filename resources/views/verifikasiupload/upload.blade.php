@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection
<?php
//  dd($file);
 ?>
@section('content')
<!-- <div class="row">
    <div class="col-md-12"> -->
<form method="POST" action="{{ route('verifikasi-upload.store') }}" enctype="multipart/form-data">
    @csrf

    @if(isset($file))
        <input type="text" class="form-control" name="projectdetailid" value="{{ $projectDetailId->id }}" hidden>
        <input type="text" class="form-control" name="id" value="{{ $file->id }}" hidden>

        <!-- <input type="hidden" name="data_id" id="data_id"> -->
        <div class="file-upload-wrapper">
            <input type="file" id="input-file-now-custom-2" class="file-upload" data-height="500" name="file" />
           <br></br>
           <!-- <br> -->
            <h5>file Lama</h5>
            <h5>{{isset($file) ? $file['name'] : $id }}</h5>
            <!-- <input id="bastno" type="text" class="form-control @error('bastno') is-invalid @enderror"
                                name="bastno"
                                value="{{ isset($file) ? $file['name'] : $id }}"
                                required autocomplete="bastno" autofocus>
        </div> -->
        <br>
        <div class="row mb-0">
            <div class="col-md-12 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
                <a href="{{ route('verifikasi-upload.index') }}">
                    <button type="button" class="btn btn-danger"> Cancel
                    </button>
                </a>
            </div>
        </div>

    @else

    <input type="text" class="form-control" name="projectdetailid" value="{{ $projectDetailId->id }}" hidden>

    <input type="hidden" name="data_id" id="data_id">
    <div class="file-upload-wrapper">
        <input type="file" id="input-file-now-custom-2" class="file-upload" data-height="500" name="file" />
    </div>
    <br>
    <div class="row mb-0">
        <div class="col-md-12 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Upload') }}
            </button>
            <a href="{{ route('verifikasi-upload.index') }}">
                <button type="button" class="btn btn-danger"> Cancel
                </button>
            </a>
        </div>
    </div>
    @endif

</form>
<!-- </div>
</div> -->


@endsection
<!-- <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-3.5.1.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->
<style>
    $('.file-upload').file_upload();

</style>

<!-- jquery.dataTables.min -->

<!-- <script src=" {{ asset('js/datatable/jquery.dataTables.min.js') }} " type="text/javascript"></script> -->
<!-- <script src=" {{ asset('js/datatable/dataTables.bootstrap4.min.js') }} " type="text/javascript"></script> -->
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('js/verifikasiupload/verifikasiupload.js') }}"></script>
