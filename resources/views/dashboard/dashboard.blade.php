@extends('layouts.template')

@section('menu-title')
Dashboard
@endsection

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
@endsection

@section('content')
  @if($userSipera->status==0)
    @include('dashboard.dashboard-admin')
  @else
    @include('dashboard.dashboard-user')
  @endif
@endsection