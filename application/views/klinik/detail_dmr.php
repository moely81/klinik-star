<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail DMR</h6>
    </div>
    <div class="card-body">

      <!-- Page Heading -->
      <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-info mb-3"><i class="fas fa-reply fa-sm text-white-50"></i> Kembali</a>
      <div class="row">
        <div class="col-md-5">
          <div class="table-responsive">
            <table class="table table-borderless">
              <thead style="font-size:12px">
              <tr><td><strong>Tanggal Periksa</strong></td><td>:</td><td><?php echo date('d M Y', strtotime( $detail_dmr['tgl']));?></td></tr>
              <tr><td><strong>No DMR</strong></td><td>:</td><td><?php echo $detail_dmr['no_dmr'];?></td></tr>
              <tr><td><strong>Nama Pasien</strong></td><td>:</td><td><?php echo $detail_dmr['nama'];?></td></tr>
              <tr><td><strong>Departemen</strong></td><td>:</td><td><?php echo $detail_dmr['dept'];?></td></tr>
              <tr><td><strong>Accident</strong></td><td>:</td><td><?php echo $detail_dmr['accid'];?></td></tr>
              </thead>
            </table>
          </div>
        </div>
        <div class="col-md-5">
          <div class="table-responsive">
            <table class="table table-borderless">
              <thead style="font-size:12px">
              <tr><td><strong>NOHR</strong></td><td>:</td><td><?php echo $detail_dmr['ohr'];?></td></tr>
              <tr><td><strong>Detail</td><td>:</strong></td><td><?php echo $detail_dmr['detail'];?></td></tr>
              <tr><td><strong>Investigasi</strong></td><td>:</td><td><?php echo $detail_dmr['invest'];?></td></tr>
              <tr><td><strong>Diagnosa</strong></td><td>:</td><td><?php echo $detail_dmr['diag'];?></td></tr>
              <tr><td><strong>Pic</strong></td><td>:</td><td><?php echo $detail_dmr['pic'];?></td></tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <hr>
      <div class="table-responsive">

        <table class="table table-bordered">
          <thead  style="font-size:15px">
            <tr>
              <td align="center"><strong>No</strong></td>
              <td align="center"><strong>Nama Obat</strong></td>
              <td align="center"><strong>Harga</strong></td>
              <td align="center"><strong>Qty</strong></td>
              <td align="center"><strong>Sub Total</strong></td>
            </tr>
          </thead>
          <tbody  style="font-size:11px">
            <?php foreach($detail_obat as $do) :
           $sub_total [] = ($do->harga)*($do->qty); $total = array_sum($sub_total);
           ?>
              <tr>
                <td align="center"><?php echo $no++ ?></td>
                <td><?php echo $do->nm_erp ?></td>
                <td align="right">Rp. <?php echo number_format($do->harga, 0, ',', '.') ?></td>
                <td align="center"><?php echo $do->qty ?></td>
                <td align="right">Rp. <?php echo number_format(($do->harga*$do->qty), 0, ',', '.') ?></td>
              </tr>
            <?php endforeach ; ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4" align="right"><strong>Total : </strong></td>
              <td align="right">Rp. <?php echo number_format(($total), 0, ',', '.')  ?></td>
            </tr>
         </tfoot>
        </table>
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
