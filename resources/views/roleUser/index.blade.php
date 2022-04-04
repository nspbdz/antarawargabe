@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection

@section('content')


<!-- <div class="row">
    <div class="col-md-12"> -->
    <div class="container">

    <div>
        Role
    </div>
    <br>

        <div class="row">
                    <div class="col-md-2">
                    <div class="text-right">
                        <a class="btn btn-xs btn-primary" href="{{ route('role.create') }}"> <i class="bx bxs-user-plus"></i> Tambah data </a>
                    </div>
            </div>
            </div>
          <br> </br>


            <div class="table-responsive" id="table-menu">
                    <table class="table data-table table-striped table-hover table-bordered" id="table_reporting"
                        data-url="{{ route('role.index') }}" data-switchurl="{{ route('role.status') }}" data-backurl="{{ route('role.index') }}"
                        style="width: 100% !important" ">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Nama Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
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

<script src="{{asset('js/master/roleUser/roleUser.js')}}"></script>



