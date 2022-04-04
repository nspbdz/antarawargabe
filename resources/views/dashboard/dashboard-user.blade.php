@extends('layouts.template')

@section('menu-title')
Dashboard
@endsection

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$jumlahDraft}}</h3>

        <h4>Draft</h4>
        <p>jumlah usulan kegiatan sampai hari ini </p>
      </div>
      <!-- inner -->
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <!-- icon -->
      <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
    <!-- small-box -->
  </div>
  <div class="col-md-3">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$jumlahVerifikasi}}</h3>

        <h4>Verifikasi</h4>
        <p>Jumlah usulan yang sudah diverifikasi sampai hari ini</p>
      </div>
      <!-- inner -->
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <!-- icon -->
      <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
    <!-- small-box -->
  </div>
  <div class="col-md-3">
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$jumlahTelaah}}</h3>

        <h4>Telaah</h4>
        <p>jumlah usulan yang sudah ditelaah sampai hari ini</p>
      </div>
      <!-- inner -->
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <!-- icon -->
      <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
    <!-- small-box -->
  </div>
  <div class="col-md-3">
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$jumlahDisetujui}}</h3>

        <h4>Disetujui</h4>
        <p>jumlah usulan yang disetujui</p>
      </div>
      <!-- inner -->
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <!-- icon -->
      <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
    <!-- small-box -->
  </div>
</div>


  <div class="row">
  <div class="col-md-12">
    <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Artikel</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @foreach($artikels as $artikel)
                  <li class="item">
                    <div class="product-img container-fluid" style="align-content: center;">
                        <h4><i class="fa fa-newspaper-o" style="align-self: center;"></i></h4>
                    </div>
                    <div class="product-info">
                      <a href="{{ route('dashboard.artikel',['id'=>$artikel->id])}}" class="product-title">
                        {{$artikel->judul}}
                      <span class="product-description">
                            {!!$artikel->content!!}
                          </span>
                      </a>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">Lihat Semua Artikel</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
  </div>
</div>
<!-- row -->
@endsection