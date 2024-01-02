<!-- Begin Page Content -->
<div class="row">
  <div class="col-md-8">
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Detail Pasien</h6>
        </div>
        <div class="card-body">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="<?php echo base_url ('klinik/ps')?>" class="btn btn-sm btn-info"><i class="fas fa-reply fa-sm text-white-50"></i> Kembali</a>
          </div>
          <div class="">
            <div class="col-md-8">
              <div class="table-responsive">
                <table class="table table-borderless">
                  <thead style="font-size:12px">
                  <tr><td>No Registrasi</td><td>:</td><td><?php echo $detail_ps['kode'];?></td></tr>
                  <tr><td>Nama</td><td>:</td><td><?php echo $detail_ps['nama'];?></td></tr>
                  <tr><td>Jenis Kelamin</td><td>:</td><td><?php echo $detail_ps['jk'];?></td></tr>
                  <tr><td>Umur</td><td>:</td><td><?php echo umurmu($detail_ps['tgl_lhr']);?></td></tr>
                  <tr><td>Perusahaan</td><td>:</td><td><?php echo $detail_ps['perush'];?></td></tr>
                  <tr><td>Departemen</td><td>:</td><td><?php echo $detail_ps['dept'];?></td></tr>
                  <tr><td>Posisi</td><td>:</td><td><?php echo $detail_ps['posisi'];?></td></tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
function umurmu ($lahir) {
 $pecah = explode("-", $lahir);
 $tgl = intval($pecah['2']);
 $bln = intval($pecah['1']);
 $thn = $pecah['0'];
 $utahun = date("Y") - $thn;
 $ubulan = date("m") - $bln;
 $uhari = date("j") - $tgl;
 if($uhari < 0){
  $uhari = date("t",mktime(0,0,0,$bln-1,date("m"),date("Y"))) - abs($uhari); $ubulan = $ubulan - 1;
}
if($ubulan < 0){
  $ubulan = 12 - abs($ubulan); $utahun = $utahun - 1;
}
$usia = $utahun.'Th '.$ubulan.'Bl '.$uhari.'Hr';
return $usia;
}
?>
