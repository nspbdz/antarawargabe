@extends('layouts.template')

@section('menu-title')
Dashboard
@endsection

@section('breadcrumb')
@endsection

@section('content')
<style>
    .text-white {
        color: black !important;
        font-family: Inter;
        font-style: normal;
        font-weight: 600;
        font-size: 18px;
        line-height: 20px;
        text-align: center
    }
    p {
        color: black !important;
        font-family: Inter;
        font-style: normal;
        font-weight: 600;
        font-size: 72px;
        line-height: 20px;
        text-align: center
    }

    .dashboardsUpload {
        background: #7B89FA;
        border-radius: 10px;
    }

    .dashboardsData {
        background: #FC8686;
        border-radius: 10px;
    }

    .dashboardsAntrian {
        background: #A6E276;
        border-radius: 10px;
    }

    .dashboardsStatus {
        background: #F5E79C;
        border-radius: 10px;
    }

    .jmlUser {
        background: #ECEEFF;
        border: 3px solid #7B89FA;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .usulUpload {
        background: #FFE2E2;
        border: 3px solid #FC8686;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .antrianDataPermintaan {
        background: #F0F7EA;
        border: 3px solid #A6E276;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .dataPermintaan {
        background: #FFFBE9;
        border: 3px solid #F5E79C;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .penyetujuan {
        background: #FFE2E2;
        border: 3px solid #FC8686;
        box-sizing: border-box;
        border-radius: 10px;
    }

    .reportDataPermintaan {
        background: #ECEEFF;
        border: 3px solid #7B89FA;
        box-sizing: border-box;
        border-radius: 10px;
    }

</style>
<div class="row">

    <div class="col-lg-3 mb-3">
        <div class="card dashboardsUpload text-white shadow">

        <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('icons/upload-cloud.svg') }}" width="100" height="100" alt="">
                    </div>
                    <div class="col-md-6">
                        Primary
                        <br><br><br>

                        <p>9</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 mb-3">
        <div class="card dashboardsData text-white shadow">


            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('icons/file-text.svg') }}" width="100" height="100" alt="">
                    </div>
                    <div class="col-md-6">
                        Primary
                        <br><br><br>
                        <p>9</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-3 mb-3">
        <div class="card dashboardsAntrian text-white shadow">

             <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('icons/text-align.svg') }}" width="100" height="100" alt="">
                    </div>
                    <div class="col-md-6">
                        Primary
                        <br><br><br>
                        <p>9</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-3 mb-3">
        <div class="card dashboardsStatus text-white shadow">

             <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('icons/check-circle.svg') }}" width="100" height="100" alt="">
                    </div>
                    <div class="col-md-6">
                        Primary
                        <br><br><br>
                        <p>9</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<br> </br>
<!-- row -->
<div class="row">
    <div class="col-lg-6 mb-6">
        <div class="card jmlUser text-white shadow">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('icons/user-dashboard.svg') }}" width="100" height="100" alt="">
                    </div>
                    <div class="col-md-6">

                        Primary
                        <br><br><br>
                        <p>9</p>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-6 mb-6">
        <div class="card usulUpload text-white shadow">

             <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('icons/file-plus.svg') }}" width="100" height="100" alt="">
                    </div>
                    <div class="col-md-6">
                        Primary
                        <br><br><br>
                        <p>9</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 mb-6">
        <div class="card antrianDataPermintaan text-white shadow">

             <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('icons/text-align.svg') }}" width="100" height="100" alt="">
                    </div>
                    <div class="col-md-6">
                        Primary
                        <br><br><br>
                        <p>9</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-6 mb-6">
        <div class="card dataPermintaan text-white shadow">

         <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('icons/file-text.svg') }}" width="100" height="100" alt="">
                    </div>
                    <div class="col-md-6">
                        Primary
                        <br><br><br>
                        <p>9</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<br>

<div class="row">
    <div class="col-lg-6 mb-6">
        <div class="card penyetujuan text-white shadow">

         <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('icons/check-circle.svg') }}" width="100" height="100" alt="">
                    </div>
                    <div class="col-md-6">
                        Primary
                        <br><br><br>
                        <p>9</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-6 mb-6">
        <div class="card reportDataPermintaan text-white shadow">

         <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('icons/file.svg') }}" width="100" height="100" alt="">
                    </div>
                    <div class="col-md-6">
                        Primary
                        <br><br><br>
                        <p>9</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- row -->


<!-- /.row -->

@endsection


@section('page-level-script')
<!-- ChartJS -->
<!-- page script -->
<script>
    $(document).ready(function () {

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
            labels: dataLabel,
            datasets: [{
                label: 'Status',
                fillColor: 'rgba(210, 214, 222, 1)',
                strokeColor: 'rgba(210, 214, 222, 1)',
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: usulanData
            }]
        }

        var grafikStatusCanvas = $('#lineChart').get(0).getContext('2d')
        var grafikStatusChart = new Chart(grafikStatusCanvas)
        var grafikStatusData = grafikStatusDatas
        grafikStatusDatas.datasets[0].fillColor = '#00a65a'
        grafikStatusDatas.datasets[0].strokeColor = '#00a65a'
        grafikStatusDatas.datasets[0].pointColor = '#00a65a'
        var grafikStatusOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
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

        var bidangs = new Array();
        var bidangData = new Array();

        // for (var i = 0; i < jmlUsulanBidang.length; i++) {
        //     bidangs.push(jmlUsulanBidang[i].nama_bidang);
        //     bidangData.push(jmlUsulanBidang[i].jmlUsulan);
        //     console.log(jmlUsulanBidang[i].nama_bidang + " " + jmlUsulanBidang[i].jmlUsulan);
        // }

        console.log(bidangs);
        console.log(bidangData);

        var grafikBidangDatas = {
            labels: bidangs,
            datasets: [{
                label: 'Bidang',
                fillColor: 'rgba(210, 214, 222, 1)',
                strokeColor: 'rgba(210, 214, 222, 1)',
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: bidangData
            }]
        }

        var grafikBidangCanvas = $('#grafikBidang').get(0).getContext('2d')
        var grafikBidangChart = new Chart(grafikBidangCanvas)
        var grafikBidangData = grafikBidangDatas
        grafikBidangDatas.datasets[0].fillColor = '#00a65a'
        grafikBidangDatas.datasets[0].strokeColor = '#00a65a'
        grafikBidangDatas.datasets[0].pointColor = '#00a65a'
        var grafikBidangOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        }

        grafikBidangOptions.datasetFill = false
        grafikBidangChart.Bar(grafikBidangData, grafikBidangOptions)


        //-------------
        //- sumber dana CHART -
        //-------------

        var sumberDanas = new Array();
        var sumberDanaData = new Array();

        // for (var i = 0; i < jmlUsulanSumberDana.length; i++) {
        //     sumberDanas.push(jmlUsulanSumberDana[i].nama_sumber_dana);
        //     sumberDanaData.push(jmlUsulanSumberDana[i].jmlUsulan);
        //     console.log(jmlUsulanSumberDana[i].nama_sumber_dana + " " + jmlUsulanSumberDana[i].jmlUsulan);
        // }

        console.log(sumberDanas);
        console.log(sumberDanaData);

        var grafikSumberDanaDatas = {
            labels: sumberDanas,
            datasets: [{
                label: 'Sumber Dana',
                fillColor: 'rgba(63, 191, 191)',
                strokeColor: 'rgba(63, 191, 191)',
                pointColor: 'rgba(63, 191, 191)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: sumberDanaData
            }]
        }

        var grafikSumberDanaCanvas = $('#grafikSumberDana').get(0).getContext('2d')
        var grafikSumberDanaChart = new Chart(grafikSumberDanaCanvas)
        var grafikSumberDanaData = grafikSumberDanaDatas
        // grafikBidangDatas.datasets[0].fillColor   = '#00a65a'
        // grafikBidangDatas.datasets[0].strokeColor = '#00a65a'
        // grafikBidangDatas.datasets[0].pointColor  = '#00a65a'
        var grafikSumberDanaOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        }

        grafikSumberDanaOptions.datasetFill = false
        grafikSumberDanaChart.Bar(grafikSumberDanaData, grafikSumberDanaOptions)

    })

</script>
@endsection
