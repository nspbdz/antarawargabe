@extends('layouts.template')

@section('menu-title')
Artikel
@endsection

@section('breadcrumb')
<li><a href="{{ route('dashboard.artikel',['id'=>'cek']) }}">Artikel</a></li>
@endsection

@section('content')
  <div class="row">
  <div class="col-md-3">
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
            <div class="box-body" style="overflow-y: scroll;">
              <ul class="products-list product-list-in-box">
                @foreach($artikels as $art)
                <li class="item">
                  <div class="product-img container-fluid" style="align-content: center;">
                      <h4><i class="fa fa-newspaper-o" style="align-self: center;"></i></h4>
                  </div>
                  <div class="product-info">
                    <!-- <a href="javascript:void(0)" class="product-title">Samsung TV -->
                    <a href="{{ route('dashboard.artikel',['id'=>$art->id])}}" class="product-title">{{$art->judul}}</a>
                    <span class="product-description">
                          {!!$art->content!!}
                        </span>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
  </div>
  <!-- col-md-3 -->
  <div class="col-md-9">
    <div class="box box-primary">
      <div class="box-header">
        <div class="box-title" id="title">
          <h3>{{ $artikel->judul }}</h3>
        </div>
      </div>
      <div class="box-body" id="artikel">
        <div>
          {!!$artikel->content!!}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- row -->
@endsection

@section('page-level-script')
<script type="text/javascript">

  function showArtikel(title, artikel){
    $("#title").text(title);
    $("#artikel").text(artikel);
  }
</script>
@endsection