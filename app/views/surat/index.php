<?php 
   defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Pengelolaan Surat</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>"> <i class="ti-home"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Pengelolaan Surat</a></li>
        </ul>
    </div>
</div>
<style type="text/css">
  @media (min-width: 576px){
    .col-sm-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 46.666667%;
        max-width: 46.666667%;
    }
  }
  .form-group {
      margin-bottom: 0.25em;
  }
</style>

<?php 
  foreach($openprakDesc as $fetchOpenPrakDesc) {
    $tahun   = $fetchOpenPrakDesc->TAHUN_JADWAL_PEMBUKAAN;
    $periode =  $fetchOpenPrakDesc->PERIODE_JADWAL_PEMBUKAAN;
  } 
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
              <!-- <div class="sub-title m-b-5" scope="row">Pengumuman Praktikum</div> -->
              <div class="table-responsive">
                <table class="table  invoice-detail-table">
                  <thead>
                    <tr class="thead-default">
                      <th><i class="ti-arrow-circle-right"></i> Cetak Peserta Praktikum</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td width="35%">Nama Praktikum</td>
                      <td>
                        <form method="post" action="<?php echo base_url() ?>/surat/cetakPesertaPraktikum" id="myForm" target="_blank">
                          <div class="form-group row">
                            <div class="col-sm-5">
                              <input type="hidden" class="form-control form-control-sm" id="TAHUN_JADWAL_PEMBUKAAN" name="TAHUN_JADWAL_PEMBUKAAN" value="<?= $tahun ?>">
                              <input type="hidden" class="form-control form-control-sm" id="PERIODE_JADWAL_PEMBUKAAN" name="PERIODE_JADWAL_PEMBUKAAN" value="<?= $periode ?>">
                              <input type="hidden" id="NAMA_PRAKTIKUM" name="NAMA_PRAKTIKUM" class="form-control form-control-sm"  >
                              <?php $i = 0; $no=1; if($openprak): ?>
                                <select id="KODE_PRAKTIKUM" name="KODE_PRAKTIKUM" class="form-control form-control-sm" onchange="myFunction(event)">
                                  <option value="blank">- Pilih -</option>
                                  <?php foreach($openprak as $row): ?>
                                  <option value="<?php echo $row->KODE_PRAKTIKUM;?>"><?php echo $row->NAMA_PRAKTIKUM;?></option>
                                  <?php ++$i;  endforeach; ?>
                                </select>
                              <?php endif; ?>
                            </div>
                            <div class="col-sm-3">
                              <button class="btn btn-grd-info btn-sm btnExportPeserta"><i class="ti-printer"></i>Cetak Peserta</button>
                            </div>
                          </div>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="table-responsive">
                <table class="table  invoice-detail-table">
                  <thead>
                    <tr class="thead-default">
                      <th><i class="ti-arrow-circle-right"></i> Pengumuman Praktikum</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Pembukaan Pendaftaran Praktikum</td>
                      <td><button class="btn btn-grd-info btn-sm"><i class="ti-printer"></i>Cetak Surat</button></td>
                    </tr>
                    <tr>
                      <td>Pengiriman Data Nilai</td>
                      <td><button class="btn btn-grd-info btn-sm"><i class="ti-printer"></i>Cetak Surat</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="table-responsive">
                <table class="table  invoice-detail-table">
                  <thead>
                    <tr class="thead-default">
                      <th><i class="ti-arrow-circle-right"></i> Pengolahan Dana Praktikum</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Pengajuan Dana</td>
                      <td>
                        <a class="btn btn-grd-info btn-sm" href="<?php echo site_url('surat/cetak_pengajuan_dana_praktikum');?>" target="_blank">
                            <i class="ti-printer"></i>
                            Cetak Surat
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>Lembar Pertanggung Jawaban</td>
                      <td><button class="btn btn-grd-info btn-sm"><i class="ti-printer"></i>Cetak Surat</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript"> 
  $('.btnExportPeserta').click(function(e) {
    // stop the form from submitting the normal way and refreshing the page
    e.preventDefault();

    var idPrak         = document.getElementById("NAMA_PRAKTIKUM").value;
    // console.log(idPrak);
    if (idPrak == "- Pilih -") {
      console.log("isi");
    } else {
      $("#myForm").submit();
    }

  });

  function myFunction(e) {
    // document.getElementById("myText").value = e.target.value
    var x = $('#KODE_PRAKTIKUM :selected').html();
    document.getElementById("NAMA_PRAKTIKUM").value = x;
  }
</script>