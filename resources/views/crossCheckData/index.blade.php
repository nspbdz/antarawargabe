@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<!-- <div class="row">
    <div class="col-md-12"> -->
    <div class="container">

        <form method="POST" id="search_form" class="form-horizontal">
                <div class="row">
                    <div class="col-md-6">
                        <label for="search">Code Project</label>
                        <input type="text" class="form-control" placeholder="masukan Code Project" id="code"
                            name="search">
                    </div>
                    <div class="col-md-6">
                        <label for="search">Tanggal</label>
                        <input type="text" class="form-control" placeholder="Masukkan Tanggal" id="search"
                            name="search">
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="search">No. Bast</label>
                        <input type="text" class="form-control" placeholder="Masukkan NoBast" id="search"
                            name="search">
                    </div>
                    <div class="col-md-6">
                        <label for="search">Status</label>
                        <input type="text" class="form-control" placeholder="Masukkan Status" id="search"
                            name="search">
                    </div>

                </div>

                <div class="btn-group float-right" style="margin-top: 15px;">
                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"
                        title="Cari Data"> <i class="bx bx-search"></i> Cari </button>
                    <button type="reset" class="btn btn-warning" data-toggle="tooltip" id="reset_form"
                        data-placement="bottom" title="Reset Filter"><i class="bx bx-reset"></i> Reset
                    </button>
                </div>
        </form>
        <br></br>

            <div class="table-responsive" id="table-menu">
                    <table class="table data-table table-striped table-hover table-bordered" id="table_reporting"
                        data-url="{{ route('crosscheckdata.index') }}" data-switchurl="{{ route('crosscheckdata.status') }}" data-backurl="{{ route('crosscheckdata.index') }}"
                        style="width: 100% !important" ">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Action</th>
                                <!-- <th>Status</th> -->
                                <th>Project Code</th>
                                <th>Nama Pekerjaan</th>
                                <!-- <th>Date</th> -->
                                <th>Approval Status</th>
                                <th>Status Approval PM</th>
                                <th>Approval PM</th>
                                <th>Status Approval P&P</th>
                                <th>Approval P&P</th>
                            </tr>
                        </thead>
                        <tbody id="tabel_result">

                        </tbody>
                    </table>
                </div>
      </div>


    <!-- </div>
</div> -->


@endsection
<!-- <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-3.5.1.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->


<!-- jquery.dataTables.min -->

<!-- <script src=" {{asset('js/datatable/jquery.dataTables.min.js')}} " type="text/javascript"></script> -->
<!-- <script src=" {{asset('js/datatable/dataTables.bootstrap4.min.js')}} " type="text/javascript"></script> -->
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 <script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script src="{{asset('js/crossCheckData/crossCheckData.js')}}"></script>



