@extends('layouts.app',
            [
                'checkPoint' => 'dashboard',
                'pageTitle'=>'Dashboard',
                'mainPage'=> 'Dashboard',
            ]
        )
@section('content')
@php
    // $lembaga = $pelanggaran;
    // $pelanggaran = $pelanggaran;
@endphp
   
    <!--state overview start-->
    <div class="row state-overview">
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol terques">
                    <i class="fa fa-user"></i>
                </div>
                <div class="value">
                    <h1 class="count">
                        {{$jumlah_pengawasan}}
                    </h1>
                    <p>Jumlah Laporan Pengawasan</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol red">
                    <i class="fa fa-legal"></i>
                </div>
                <div class="value">
                    <h1 class=" count2">
                        {{$jumlah_pelanggaran}}
                    </h1>
                    <p>Jumlah Temuan Pelanggaran</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol yellow">
                    <i class="fa fa-tags"></i>
                </div>
                <div class="value">
                    <h1 class=" count3">
                        {{$jumlah_sengketa}}
                    </h1>
                    <p>Jumlah Laporan Sengketa</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol blue">
                    <i class="fa fa-suitcase"></i>
                </div>
                <div class="value">
                    <h1 class=" count4">
                        {{$jumlah_divisi}}
                    </h1>
                    <p>Jumlah Divisi</p>
                </div>
            </section>
        </div>
    </div>
    <!--state overview end-->
 <div class="container col-12">
    <div class="row">
        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">Laporan Sengketa</div>
                <div class="chart-container">
                    <div class="pie-chart-container">
                      <canvas id="pie-chart-sengketa"></canvas>
                    </div>
                  </div>
                    <div class="panel-body">
                         <div id="container"></div>
                    </div>
                </div>
            </div>
        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">Laporan Pelanggaran</div>
                <div class="chart-container">
                    <div class="pie-chart-container">
                      <canvas id="pie-chart-pelanggaran"></canvas>
                    </div>
                  </div>
                    <div class="panel-body">
                         <div id="container"></div>
                    </div>
                </div>
            </div>
        </div>
 </div> 
 
   <script>
  $(function(){
      
      var cData = JSON.parse(`<?php echo $sengketa; ?>`);
      var sengketa = $("#pie-chart-sengketa");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Laporan Jumlah Paslon Berdasarkan sengketa",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(sengketa, {
        type: "pie",
        data: data,
        options: options
      });
      


    //   Chart Berdasarkan Pelanggaran
      var cData = JSON.parse(`<?php echo $pelanggaran; ?>`);
      var pelanggaran = $("#pie-chart-pelanggaran");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Laporan Jumlah Paslon Berdasarkan Pelanggaran",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(pelanggaran, {
        type: "pie",
        data: data,
        options: options
      });
 
  });
</script>
@endsection
