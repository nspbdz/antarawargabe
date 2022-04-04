@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <section class="card">

        <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                <!-- <div class="container-fluid"> -->
                    <div>
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
                            <label>Nama  <span class="danger">*</span></label>
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>


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



                   </div>
                    <br> </br>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{ route('login') }}">
                                <button type="button" class="btn btn-danger"> Login
                                </button>
                                </a>
                            </div>
                        </div>
                    </form>
        </div>
    </section>
    </div>


@endsection
