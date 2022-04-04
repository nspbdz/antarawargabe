@extends('layouts.template')

@section('menu-title')
@endsection

@section('breadcrumb')
@endsection

@section('content')
<?php
// dd($access);
 ?>
<!-- <div class="row">
    <div class="col-md-12"> -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home"></i> Home </a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}"> {{ $title[1] }} </a></li>
        <li class="breadcrumb-item active">{{ $title[2] }}</li>
    </ol>
</nav>
<section class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
    </div>
    <div class="card-body">


        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <input type="hidden" name="data_id" id="data_id">

            @if(isset($user))
                <input type="text" class="form-control" name="id" value="{{ $user->id }}" hidden>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Username <span class="danger">*</span></label>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ isset($user) ? $user['username'] : $id }}"
                                required autocomplete="username" autofocus disabled>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Jabatan <span class="danger">*</span></label>
                            <input id="jabatan" type="jabatan"
                                class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"
                                value="{{ isset($user) ? $user['position'] : $id }}" required autocomplete="jabatan">

                            @error('jabatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br> </br>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Depan <span class="danger">*</span></label>
                            <input id="namadepan" type="text"
                                class="form-control @error('namadepan') is-invalid @enderror" name="namadepan"
                                value="{{ isset($user) ? $user['namadepan'] : $id }}" required autocomplete="namadepan"
                                autofocus>

                            @error('namadepan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Nama Belakang <span class="danger">*</span></label>
                            <input id="namabelakang" type="text"
                                class="form-control @error('namabelakang') is-invalid @enderror" name="namabelakang"
                                value="{{ isset($user) ? $user['namabelakang'] : $id }}" required autocomplete="namabelakang"
                                autofocus>

                            @error('namabelakang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <br> </br>
                    <div class="row">


                        <!-- <div class="col-md-6">
                                <label>password <span class="danger">*</span></label>
                                <input id="current_password"  type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current-password">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div> -->

                            <div class="col-md-6">
                                <label>New Password <span class="danger">*</span></label>
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" autocomplete="current-password">
                              @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="col-md-6">
                                <label>New Confirm Password <span class="danger">*</span></label>
                                <input id="new_confirm_password" type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" autocomplete="current-password">
                              @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="col-md-6">
                                <label>New Confirm Password <span class="danger">*</span></label>
                                <input id="new_confirm_password" type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" autocomplete="current-password">
                              @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div> -->

                    <!-- <div class="row">
                        <div class="col-md-6">
                            <label>Password <span class="danger">*</span></label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Confirmation Password <span class="danger">*</span></label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">

                        </div>
                    </div> -->

                    <br> </br>

                    <div class="row">

                        <div class="col-md-6">
                            <label>NIP <span class="danger">*</span></label>
                            <input id="nip" type="nip" class="form-control @error('nip') is-invalid @enderror"
                                name="nip" value="{{ isset($user) ? $user['nip'] : $id }}" required autocomplete="nip">

                            @error('nip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- <div class="col-md-6">
                            <label>Role <span class="danger">*</span></label>
                            <input id="role" type="role" class="form-control @error('role') is-invalid @enderror"
                                name="role" value="{{ isset($user) ? $user['roleid'] : $id }}" required autocomplete="role">

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->
                        @if(isset($role))
                     <?php
                        // dd($access['accessRole']);
                        // dd($UserAccess->getAccess['roleid']);
                     ?>
                        <div class="col-md-6">
                            <label>Role <span class="danger">*</span></label>
                            <select id="role_select" name="role_select" class="form-control col-md-12 @error('role_select') is-invalid @enderror" style="width: 100% !important" id="role_select">
                                <option value="0">Pilih Role</option>
                                @foreach ($access['accessRole'] as $itemAccess)
                                <option value="{{ $itemAccess['id'] }}"
                                {{ (isset($UserAccess) && $UserAccess->getAccess['roleid'] == $itemAccess['id']) ? 'selected' : '' }}>
                                {{ $itemAccess['text'] }}</option>
                                @endforeach
                            </select>

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @else

                        <div class="col-md-6">
                            <label>Role <span class="danger">*</span></label>
                            <input id="role" type="role" class="form-control @error('role') is-invalid @enderror"
                                name="role" value="{{ old('role') }}" required autocomplete="role" disabled>

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @endif


                    </div>
                    <br> </br>

                    <div class="row">

                        <div class="col-md-6">
                            <label>Nama Tim Leader <span class="danger">*</span></label>
                            <input id="namatimleader" type="namatimleader"
                                class="form-control @error('namatimleader') is-invalid @enderror" name="namatimleader"
                                value="{{ isset($user) ? $user['leaderteamname'] : $id }}" required
                                autocomplete="namatimleader">

                            @error('namatimleader')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Nama Validator <span class="danger">*</span></label>
                            <input id="namavalidator" type="namavalidator"
                                class="form-control @error('namavalidator') is-invalid @enderror" name="namavalidator"
                                value="{{ isset($user) ? $user['validatorname'] : $id }}" required
                                autocomplete="namavalidator">

                            @error('namavalidator')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <br> </br>

                @else
                    <div class="row">
                        <div class="col-md-6">
                            <label>Username <span class="danger">*</span></label>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" required autocomplete="username"
                                autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Jabatan <span class="danger">*</span></label>
                            <input id="jabatan" type="jabatan"
                                class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"
                                value="{{ old('jabatan') }}" required autocomplete="jabatan">

                            @error('jabatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br> </br>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Depan <span class="danger">*</span></label>
                            <input id="namadepan" type="text"
                                class="form-control @error('namadepan') is-invalid @enderror" name="namadepan"
                                value="{{ old('namadepan') }}" required autocomplete="namadepan"
                                autofocus>

                            @error('namadepan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Nama Belakang <span class="danger">*</span></label>
                            <input id="namabelakang" type="text"
                                class="form-control @error('namabelakang') is-invalid @enderror" name="namabelakang"
                                value="{{ old('namabelakang') }}" required autocomplete="namabelakang"
                                autofocus>

                            @error('namabelakang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <br> </br>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Password <span class="danger">*</span></label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Confirmation Password <span class="danger">*</span></label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">

                        </div>
                    </div>

                    <br> </br>

                    <div class="row">

                        <div class="col-md-6">
                            <label>NIP <span class="danger">*</span></label>
                            <input id="nip" type="nip" class="form-control @error('nip') is-invalid @enderror"
                                name="nip" value="{{ old('nip') }}" required autocomplete="nip">

                            @error('nip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if(isset($role))

                        <div class="col-md-6">
                            <label>Role <span class="danger">*</span></label>
                            <select id="role_select" name="role_select" class="form-control col-md-12 @error('role_select') is-invalid @enderror" style="width: 100% !important" id="role_select">
                                <option value="0">Pilih Role</option>
                                <!-- <option value="1">member</option> -->
                                @foreach ($role as $itemRole)
                                <option value="{{ $itemRole->id }}">
                                            {{ $itemRole->name }}</option>
                                @endforeach
                            </select>

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @else

                        <div class="col-md-6">
                            <label>Role <span class="danger">*</span></label>
                            <input id="role" type="role" class="form-control @error('role') is-invalid @enderror"
                                name="role" value="{{ old('role') }}" required autocomplete="role" disabled>

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @endif



                    </div>
                    <br> </br>

                    <div class="row">

                        <div class="col-md-6">
                            <label>Nama Tim Leader <span class="danger">*</span></label>
                            <input id="namatimleader" type="namatimleader"
                                class="form-control @error('namatimleader') is-invalid @enderror" name="namatimleader"
                                value="{{ old('namatimleader') }}" required
                                autocomplete="namatimleader">

                            @error('namatimleader')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Nama Validator <span class="danger">*</span></label>
                            <input id="namavalidator" type="namavalidator"
                                class="form-control @error('namavalidator') is-invalid @enderror" name="namavalidator"
                                value="{{ old('namavalidator') }}" required
                                autocomplete="namavalidator">

                            @error('namavalidator')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <br> </br>

            @endif

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                    <a href="{{ route('user.index') }}">
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

<script src="{{ asset('js/user/user.js') }}"></script>
