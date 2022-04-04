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
        <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$usulanKegiatan}}</h3>

              <h4>Usulan Kegiatan</h4>
              <p>Jumlah usulan yang masuk hari ini</p>
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
    <!-- col-md-3 -->
    <div class="col-md-3 ">
        <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$totalUsulanKegiatan}}</h3>

              <h4>Total Usulan Kegiatan</h4>
              <p>Total usulan yang sudah masuk sampai hari ini</p>
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
    <div class="col-md-3 ">
        <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$antrianUsulanKegiatan}}</h3>

              <h4>Antrian Usulan Kegiatan</h4>
              <p>Jumlah antrian usulan yang belum memiliki status</p>
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
    <div class="col-md-3 ">
        <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$statusUsulanKegiatan}}</h3>

              <h4>Status Usulan</h4>
              <p>Jumlah usulan yang sudah memiliki status</p>
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
<!-- row -->  

@if($groupUser == 3 || $groupUser == 1)
<div class="row">
  <div class="col-md-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$jumlahDokumenMasukPerencanaan}}</h3>

        <h4></h4>
        <p>{{$deskripsiMasukPerencanaan}}</p>
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
  <div class="col-md-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$jumlahDokumenSelesaiPerencanaan}}</h3>

        <h4></h4>
        <p>{{$deskripsiSelesaiPerencanaan}}</p>
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
  <!-- col-md-6 -->
</div>
<!-- row -->
@endif

@if($groupUser == 4 || $groupUser == 1)
<div class="row">
  <div class="col-md-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$jumlahDokumenMasukPenelaahan}}</h3>

        <h4></h4>
        <p>{{$deskripsiMasukPenelaahan}}</p>
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
  <div class="col-md-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$jumlahDokumenSelesaiPenelaahan}}</h3>

        <h4></h4>
        <p>{{$deskripsiSelesaiPenelaahan}}</p>
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
  <!-- col-md-6 -->
</div>
<!-- row -->
@endif

@if($groupUser == 1 || $groupUser == 5)
<div class="row">
  <div class="col-md-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$jumlahDokumenMasukKapus}}</h3>

        <h4></h4>
        <p>{{$deskripsiMasukKapus}}</p>
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
  <div class="col-md-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$jumlahDokumenSelesaiKapus}}</h3>

        <h4></h4>
        <p>{{$deskripsiSelesaiKapus}}</p>
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
  <!-- col-md-6 -->
</div>
<!-- row -->
@endif
<div class="row">
  <!-- /.col (LEFT) -->
    <div class="col-md-6">
    <!-- LINE CHART -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Grafik Jumlah Pengajuan Kegiatan Total Berdasarkan Status</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <canvas id="lineChart" class="chart-legend"></canvas>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (RIGHT) -->
  <div class="col-md-6">
    <!-- LINE CHART -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Grafik Jumlah Pengajuan Kegiatan Total Per Bidang/Kelompok/Bagian</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <canvas id="grafikBidang"></canvas>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (RIGHT) -->
  <div class="col-md-6">
    <!-- LINE CHART -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Grafik Jumlah Pengajuan Kegiatan Total Berdasarkan Sumber Dana (dalam 1 juta)</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <canvas id="grafikSumberDana"></canvas>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (RIGHT) -->
  @if($groupUser == 1)
    <div class="col-md-6">
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
@endif
</div>
<!-- /.row -->

@endsection


@section('page-level-script')
<!-- ChartJS -->
<script src="{{ asset('theme/AdminLTE/bower_components/chart.js/Chart.js')}}"></script>
  <!-- page script -->
<script>
  $(document).ready(function () {

    var jmlUsulan = {!! json_encode($jumlahUsulanStatus->toArray()) !!}
    var dataLabel = new Array();
    var usulanData = new Array();

    //-------------
    //- status CHART -
    //--------------

    for (var i = 0; i < jmlUsulan.length; i++) {
        dataLabel.push(jmlUsulan[i].nama_status);
        usulanData.push(jmlUsulan[i].jmlUsulan);
    }

    var grafikStatusDatas = {
      labels  : dataLabel,
      datasets: [
        {
          label               : 'Status',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : usulanData
        }
      ]
    }

    var grafikStatusCanvas                   = $('#lineChart').get(0).getContext('2d')
    var grafikStatusChart                         = new Chart(grafikStatusCanvas)
    var grafikStatusData                     = grafikStatusDatas
    grafikStatusDatas.datasets[0].fillColor   = '#00a65a'
    grafikStatusDatas.datasets[0].strokeColor = '#00a65a'
    grafikStatusDatas.datasets[0].pointColor  = '#00a65a'
    var grafikStatusOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    grafikStatusOptions.datasetFill = false
    grafikStatusChart.Bar(grafikStatusData, grafikStatusOptions)


    // console.log(jmlUsulan.length);

    // var dataDraft = new Array(dataLabel.length);
    // var dataRevisiVerifikasi = new Array(dataLabel.length);
    // var dataVerifikasi = new Array(dataLabel.length);
    // var dataRevisiTelaah = new Array(dataLabel.length);
    // var dataTelaah = new Array(dataLabel.length);
    // var dataDisetujui = new Array(dataLabel.length);

    // for (var i = 0; i < jmlUsulan.length; i++) {
    //   var index = $.inArray(jmlUsulan[i].tanggal_usulan, dataLabel);
    //   // console.log(jmlUsulan[i].status + " " + jmlUsulan[i].tanggal_usulan);
    //   if(jmlUsulan[i].status == 1){
    //     dataDraft[index] = jmlUsulan[i].jmlUsulan;
    //   }else
    //   if(jmlUsulan[i].status == 1.50){
    //     dataRevisiVerifikasi[index] =jmlUsulan[i].jmlUsulan;
    //   }else
    //   if(jmlUsulan[i].status == 3){
    //     dataVerifikasi[index] =jmlUsulan[i].jmlUsulan;
    //   }else
    //   if(jmlUsulan[i].status == 3.50){
    //     dataRevisiTelaah[index] =jmlUsulan[i].jmlUsulan;
    //   }else
    //   if(jmlUsulan[i].status == 4){
    //     dataTelaah[index] =jmlUsulan[i].jmlUsulan;
    //   }else
    //   if(jmlUsulan[i].status == 5){
    //     dataDisetujui[index] =jmlUsulan[i].jmlUsulan;
    //   }

    // }

    // // console.log(dataLabel);
    // // console.log(dataRevisiVerifikasi);

    // var areaChartData = {
    //   labels  : dataLabel,
    //   datasets: [
    //     {
    //       label               : 'Draft',
    //       fillColor           : 'rgba(216, 27, 96, 1)',
    //       strokeColor         : 'rgba(216, 27, 96, 1)',
    //       pointColor          : 'rgba(216, 27, 96, 1)',
    //       pointStrokeColor    : '#D81B60',
    //       pointHighlightFill  : '#fff',
    //       pointHighlightStroke: 'rgba(220,220,220,1)',
    //       data                : dataDraft
    //     },
    //     {
    //       label               : 'Revisi Verifikasi',
    //       fillColor           : 'rgba(210, 214, 222, 1)',
    //       strokeColor         : 'rgba(210, 214, 222, 1)',
    //       pointColor          : 'rgba(210, 214, 222, 1)',
    //       pointStrokeColor    : '#d2d6de',
    //       pointHighlightFill  : '#fff',
    //       pointHighlightStroke: 'rgba(220,220,220,1)',
    //       data                : dataRevisiVerifikasi
    //     },
    //     {
    //       label               : 'Verifikasi',
    //       fillColor           : 'rgba(243, 156, 18, 1)',
    //       strokeColor         : 'rgba(243, 156, 18, 1)',
    //       pointColor          : 'rgba(243, 156, 18, 1)',
    //       pointStrokeColor    : '#f39c12',
    //       pointHighlightFill  : '#fff',
    //       pointHighlightStroke: 'rgba(220,220,220,1)',
    //       data                : dataVerifikasi
    //     },
    //     {
    //       label               : 'Revisi Telaah',
    //       fillColor           : 'rgba(255, 133, 27, 1)',
    //       strokeColor         : 'rgba(255, 133, 27, 1)',
    //       pointColor          : 'rgba(255, 133, 27, 1)',
    //       pointStrokeColor    : '#ff851b',
    //       pointHighlightFill  : '#fff',
    //       pointHighlightStroke: 'rgba(220,220,220,1)',
    //       data                : dataRevisiTelaah
    //     },
    //     {
    //       label               : 'Telaah',
    //       fillColor           : 'rgba(0, 166, 90, 1)',
    //       strokeColor         : 'rgba(0, 166, 90, 1)',
    //       pointColor          : 'rgba(0, 166, 90, 1)',
    //       pointStrokeColor    : '#00a65a',
    //       pointHighlightFill  : '#fff',
    //       pointHighlightStroke: 'rgba(220,220,220,1)',
    //       data                : dataTelaah
    //     },
    //     {
    //       label               : 'Disetujui',
    //       fillColor           : 'rgba(210, 214, 222, 1)',
    //       strokeColor         : 'rgba(63, 191, 191, 1)',
    //       pointColor          : 'rgba(63, 191, 191, 1)',
    //       pointStrokeColor    : '#c1c7d1',
    //       pointHighlightFill  : '#fff',
    //       pointHighlightStroke: 'rgba(220,220,220,1)',
    //       data                : dataDisetujui
    //     }
    //   ]
    // }
    
    // var areaChartOptions = {
    //   scaleOverride : true,
    //     scaleSteps : 5,
    //     scaleStepWidth : 5,
    //     scaleStartValue : 0 ,
    //   //Boolean - If we should show the scale at all
    //   showScale               : true,
    //   showLegend               : true,
    //   //Boolean - Whether grid lines are shown across the chart
    //   scaleShowGridLines      : false,
    //   //String - Colour of the grid lines
    //   scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //   //Number - Width of the grid lines
    //   scaleGridLineWidth      : 1,
    //   //Boolean - Whether to show horizontal lines (except X axis)
    //   scaleShowHorizontalLines: true,
    //   //Boolean - Whether to show vertical lines (except Y axis)
    //   scaleShowVerticalLines  : true,
    //   //Boolean - Whether the line is curved between points
    //   bezierCurve             : true,
    //   //Number - Tension of the bezier curve between points
    //   bezierCurveTension      : 0.3,
    //   //Boolean - Whether to show a dot for each point
    //   pointDot                : true,
    //   //Number - Radius of each point dot in pixels
    //   pointDotRadius          : 4,
    //   //Number - Pixel width of point dot stroke
    //   pointDotStrokeWidth     : 1,
    //   //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    //   pointHitDetectionRadius : 20,
    //   //Boolean - Whether to show a stroke for datasets
    //   datasetStroke           : true,
    //   //Number - Pixel width of dataset stroke
    //   datasetStrokeWidth      : 2,
    //   //Boolean - Whether to fill the dataset with a color
    //   datasetFill             : true,
    //   //String - A legend template
    //   legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //   //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    //   maintainAspectRatio     : true,
    //   //Boolean - whether to make the chart responsive to window resizing
    //   responsive              : true,

    //    legend: {
    //         display: true,
    //     }
    // }
    
    // var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    // var lineChart                = new Chart(lineChartCanvas)
    // var lineChartOptions         = areaChartOptions
    // lineChartOptions.datasetFill = false
    // lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- bidang CHART -
    //-------------

    var jmlUsulanBidang = {!! json_encode($jumlahUsulanBidang->toArray()) !!}
    var bidangs = new Array();
    var bidangData = new Array();
    
    for (var i = 0; i < jmlUsulanBidang.length; i++) {
        bidangs.push(jmlUsulanBidang[i].nama_bidang);
        bidangData.push(jmlUsulanBidang[i].jmlUsulan);
        console.log(jmlUsulanBidang[i].nama_bidang + " " + jmlUsulanBidang[i].jmlUsulan);
    }

    console.log(bidangs);
    console.log(bidangData);

    var grafikBidangDatas = {
      labels  : bidangs,
      datasets: [
        {
          label               : 'Bidang',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : bidangData
        }
      ]
    }

    var grafikBidangCanvas                   = $('#grafikBidang').get(0).getContext('2d')
    var grafikBidangChart                         = new Chart(grafikBidangCanvas)
    var grafikBidangData                     = grafikBidangDatas
    grafikBidangDatas.datasets[0].fillColor   = '#00a65a'
    grafikBidangDatas.datasets[0].strokeColor = '#00a65a'
    grafikBidangDatas.datasets[0].pointColor  = '#00a65a'
    var grafikBidangOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    grafikBidangOptions.datasetFill = false
    grafikBidangChart.Bar(grafikBidangData, grafikBidangOptions)


    //-------------
    //- sumber dana CHART -
    //-------------

    var jmlUsulanSumberDana = {!! json_encode($jumlahUsulanSumberDana->toArray()) !!}
    var sumberDanas = new Array();
    var sumberDanaData = new Array();
    
    for (var i = 0; i < jmlUsulanSumberDana.length; i++) {
        sumberDanas.push(jmlUsulanSumberDana[i].nama_sumber_dana);
        sumberDanaData.push(jmlUsulanSumberDana[i].jmlUsulan);
        console.log(jmlUsulanSumberDana[i].nama_sumber_dana + " " + jmlUsulanSumberDana[i].jmlUsulan);
    }

    console.log(sumberDanas);
    console.log(sumberDanaData);

    var grafikSumberDanaDatas = {
      labels  : sumberDanas,
      datasets: [
        {
          label               : 'Sumber Dana',
          fillColor           : 'rgba(63, 191, 191)',
          strokeColor         : 'rgba(63, 191, 191)',
          pointColor          : 'rgba(63, 191, 191)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : sumberDanaData
        }
      ]
    }

    var grafikSumberDanaCanvas                   = $('#grafikSumberDana').get(0).getContext('2d')
    var grafikSumberDanaChart                         = new Chart(grafikSumberDanaCanvas)
    var grafikSumberDanaData                     = grafikSumberDanaDatas
    // grafikBidangDatas.datasets[0].fillColor   = '#00a65a'
    // grafikBidangDatas.datasets[0].strokeColor = '#00a65a'
    // grafikBidangDatas.datasets[0].pointColor  = '#00a65a'
    var grafikSumberDanaOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    grafikSumberDanaOptions.datasetFill = false
    grafikSumberDanaChart.Bar(grafikSumberDanaData, grafikSumberDanaOptions)

  })
</script>
@endsection      
