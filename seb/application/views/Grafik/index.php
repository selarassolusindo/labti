<script type = "text/javascript" >
document.addEventListener("DOMContentLoaded", function (event) {
  var config = {
    type: 'line',
   data: {
      labels: [<?php foreach($models as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
      endforeach;?>],
      datasets: [{
        label: "Data Ampas Awal",
        fill: false,
        backgroundColor: window.chartColors.red,
        borderColor: window.chartColors.red,
        data: [<?php foreach($models as $garis): echo json_encode($garis->ampas_saldoawal).",";
      endforeach;?>],
      },
      {
        label: "Data Ampas Keluar",
        fill: false,
        backgroundColor: window.chartColors.blue,
        borderColor: window.chartColors.blue,
        data: [<?php foreach($models as $garis): echo json_encode($garis->ampas_keluar).",";
      endforeach;?>],
      }]
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Ampas'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Date'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      }
    }
  };

  var config1 = {
    type: 'line',
   data: {
      labels: [<?php foreach($models as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
      endforeach;?>],
      datasets: [{
        label: "Data Gelondongan Awal",
        fill: false,
        backgroundColor: window.chartColors.red,
        borderColor: window.chartColors.red,
        data: [<?php foreach($models as $garis): echo json_encode($garis->gelondongan_saldoawal).",";
      endforeach;?>],
      },
      {
        label: "Data Gelondongan Keluar",
        fill: false,
        backgroundColor: window.chartColors.blue,
        borderColor: window.chartColors.blue,
        data: [<?php foreach($models as $garis): echo json_encode($garis->gelondongan_keluar).",";
      endforeach;?>],
      }]
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Gelondongan'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Date'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      }
    }
  };

  var config2 = {
    type: 'line',
   data: {
      labels: [<?php foreach($models as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
      endforeach;?>],
      datasets: [{
        label: "Data Karton Awal",
        fill: false,
        backgroundColor: window.chartColors.red,
        borderColor: window.chartColors.red,
        data: [<?php foreach($models as $garis): echo json_encode($garis->karton_saldoawal).",";
      endforeach;?>],
      },
      {
        label: "Data Karton Keluar",
        fill: false,
        backgroundColor: window.chartColors.blue,
        borderColor: window.chartColors.blue,
        data: [<?php foreach($models as $garis): echo json_encode($garis->karton_keluar).",";
      endforeach;?>],
      }]
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Karton'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Date'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      }
    }
  };

  var conMixing = {
    type: 'line',
   data: {
      labels: [<?php foreach($mixing as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
      endforeach;?>],
      datasets: [{
        label: "Data Total Bahan",
        fill: false,
        backgroundColor: window.chartColors.red,
        borderColor: window.chartColors.red,
        data: [<?php foreach($mixing as $garis): echo json_encode($garis->total).",";
      endforeach;?>],
      },
      {
        label: "Data Jumlah Mixing",
        fill: false,
        backgroundColor: window.chartColors.blue,
        borderColor: window.chartColors.blue,
        data: [<?php foreach($mixing as $garis): echo json_encode($garis->totalb).",";
      endforeach;?>],
      }]
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Mixing Bahan Baku'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Date'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      }
    }
  };

  var conhpp1 = {
    type: 'line',
   data: {
      labels: [<?php foreach($formula1 as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
      endforeach;?>],
      datasets: [{
        label: "Data Formula 1",
        fill: false,
        backgroundColor: window.chartColors.red,
        borderColor: window.chartColors.red,
        data: [<?php foreach($formula1 as $garis): echo json_encode($garis->hpp).",";
      endforeach;?>],
      }]
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'HP Produksi'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Date'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value HPP'
          }
        }]
      }
    }
  };

  var conhpp2 = {
    type: 'line',
   data: {
      labels: [<?php foreach($formula2 as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
                        endforeach;?>],
      datasets: [{
        label: "Data Formula 2",
        fill: false,
        backgroundColor: window.chartColors.blue,
        borderColor: window.chartColors.blue,
        data: [<?php foreach($formula2 as $garis): echo json_encode($garis->hpp).",";
      endforeach;?>],
      }]
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'HP Produksi'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Date'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value HPP'
          }
        }]
      }
    }
  };

  var conbp = {
    type: 'line',
   data: {
      labels: [<?php foreach($biaya_produksi as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
      endforeach;?>],
      datasets: [{
        label: "Data Total",
        fill: false,
        backgroundColor: window.chartColors.red,
        borderColor: window.chartColors.red,
        data: [<?php foreach($biaya_produksi as $garis): echo json_encode($garis->total).",";
      endforeach;?>],
      }]
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Biaya Produksi'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Date'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value Total'
          }
        }]
      }
    }
  };

  var consp = {
    type: 'line',
     data: {
        labels: [<?php foreach($stok_produksi as $rowz): echo json_encode(date(" d-m-Y ", strtotime($rowz->tanggal))).",";
        endforeach;?>],
        datasets: [{
          label: "Data Total",
          fill: false,
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [<?php foreach($stok_produksi as $garis): echo json_encode($garis->total).",";
        endforeach;?>],
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Stok Produksi'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Date'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Value'
            }
          }]
        }
      }
    };

  

  window.onload = function () {
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myLine = new Chart(ctx, config);

    var ctx1 = document.getElementById("canvas1").getContext("2d");
    window.myLine = new Chart(ctx1, config1);

    var ctx2 = document.getElementById("canvas2").getContext("2d");
    window.myLine = new Chart(ctx2, config2);

    var mixing = document.getElementById("mixing").getContext("2d");
    window.myLine = new Chart(mixing, conMixing);

    var hpp1 = document.getElementById("hpp1").getContext("2d");
    window.myLine = new Chart(hpp1, conhpp1);

    var hpp2 = document.getElementById("hpp2").getContext("2d");
    window.myLine = new Chart(hpp2, conhpp2);

    var biaya_produksi = document.getElementById("biaya_produksi").getContext("2d");
    window.myLine = new Chart(biaya_produksi, conbp);

    var stok_produksi = document.getElementById("stok_produksi").getContext("2d");
    window.myLine = new Chart(stok_produksi, consp);
  };

  

}); 
</script>

<section class="content">
<div class="row">
    <div class="col-xs-12">
       <div class="box">
          <div class="box-header">
             <h3 class="box-title">Grafik</h3>
          </div>


 <div class="row">
    <div class="col-md-12">
       <!-- Line chart -->
       <div class="box box-primary">
          <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
             <h3 class="box-title">Mixing Bahan Baku</h3>
          </div>
          <div class="box-body">
             <canvas id="mixing" style="height: 300px;"></canvas>
          </div>
          <!-- /.box-body-->
       </div>
       <!-- /.box -->
      </div>
  </div>


  <div class="row">
    <div class="col-md-6">
       <!-- Line chart -->
       <div class="box box-primary">
          <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
             <h3 class="box-title">HPP</h3>
          </div>
          <div class="box-body">
             <canvas id="hpp1" style="height: 300px;"></canvas>
          </div>
          <!-- /.box-body-->
       </div>
       <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-6">
       <!-- Donut chart -->
       <div class="box box-primary">
          <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
             <h3 class="box-title">HPP</h3>
          </div>
          <div class="box-body">
             <canvas id="hpp2" style="height: 300px;"></canvas>
          </div>
          <!-- /.box-body-->
       </div>
       <!-- /.box -->
    </div>
    <!-- /.col -->
 </div>
 <!-- /.row -->


 <div class="row">
    <div class="col-md-12">
       <!-- Line chart -->
       <div class="box box-primary">
          <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
             <h3 class="box-title">Biaya Produksi</h3>
          </div>
          <div class="box-body">
             <canvas id="biaya_produksi" style="height: 300px;"></canvas>
          </div>
          <!-- /.box-body-->
       </div>
       <!-- /.box -->
      </div>
  </div>


  <div class="row">
    <div class="col-md-4">
       <!-- Line chart -->
       <div class="box box-primary">
          <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
             <h3 class="box-title">Stok Bahan Baku</h3>
          </div>
          <div class="box-body">
             <canvas id="canvas" style="height: 300px;"></canvas>
          </div>
          <!-- /.box-body-->
       </div>
       <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4">
       <!-- Donut chart -->
       <div class="box box-primary">
          <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
             <h3 class="box-title">Stok Bahan Baku</h3>
          </div>
          <div class="box-body">
             <canvas id="canvas1" style="height: 300px;"></canvas>
          </div>
          <!-- /.box-body-->
       </div>
       <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4">
       <!-- Donut chart -->
       <div class="box box-primary">
          <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
             <h3 class="box-title">Stok Bahan Baku</h3>
          </div>
          <div class="box-body">
             <canvas id="canvas2" style="height: 300px;"></canvas>
          </div>
          <!-- /.box-body-->
       </div>
       <!-- /.box -->
    </div>
    <!-- /.col -->
 </div>
 <!-- /.row -->


 <div class="row">
    <div class="col-md-12">
       <!-- Line chart -->
       <div class="box box-primary">
          <div class="box-header">
             <i class="fa fa-bar-chart-o"></i>
             <h3 class="box-title">Stok Produksi</h3>
          </div>
          <div class="box-body">
             <canvas id="stok_produksi" style="height: 300px;"></canvas>
          </div>
          <!-- /.box-body-->
       </div>
       <!-- /.box -->
      </div>
  </div>

  
</section>
<!-- /.content -->
          
