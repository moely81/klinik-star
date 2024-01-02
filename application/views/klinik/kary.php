  <div class="container-fluid">
      <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
      </div>
      <div class="card-body">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#inputpsModal"><i class="fas fa-plus-circle fa-sm" ></i> Input Karyawan Baru</button>
    <div class="table-responsive">
      <table id="dataTable" class="table table-hover table-bordered">
        <thead class="text-center" style="font-size:15px">
         <tr>
          <th>NIK</th>
          <th>Nama Karyawan</th>
  		  <th>Perusahaan</th>
          <th>Departemen</th>
          <th>Aksi</th>
          </tr>
        </thead>
		<tbody style="font-size:12px">
        <?php
  		//$start = $this->uri->segment(4); 
        foreach($pasien as $ps) : 
         ?>
         
          <tr>
           <td><?php echo $ps->nik_br ?></td>
           <td><?php echo $ps->nama ?></td>
  					<!--<td><?php echo $ps->jk ?></td>
             <td><?php echo umurmu($ps->tgl_lhr) ?></td> -->
             <td><?php echo $ps->perush ?></td>
             <td><?php echo $ps->dept ?></td>
             <td><center><a href="<?= base_url('klinik/kary') . $ps->no ;?>" class="badge badge-success"><i class="fa fa-eye"></i></a>
              <a href="" class="badge badge-primary"><i class="fa fa-edit"></i></a>
              <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('klinik/kary/hapus/') . $ps->no ;?>" class="badge badge-danger"><i class="fa fa-trash"></i></a>
            </center></td>
           </tr>
         
       <?php endforeach ;
       ?>
			 </tbody>
     </table>
   </div>
   <div class="row">
    <div class="col">
     <!--Tampilkan pagination-->
   <?php echo $this->pagination->create_links(); ?> 
   </div>
 </div>	
</div>
<!-- Modal input-->
<div class="modal fade" id="inputpsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Input Karyawan Baru</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
   </button>
 </div>
 <div class="modal-body">
  <form action="<?php echo base_url().'klinik/kary/tambah'; ?>" method="post">
   <fieldset>
    <div class="form-group row">
     <label class="col-sm-3 col-form-label">NIK</label>
     <div class="col-md-5">
      <input name="kode" type="text" id="kode" class="form-control" placeholder="STARxxxx" 
      value="STAR<?php echo sprintf("%04s", $kode)?>" readonly>
    </div>
  </div>
</fieldset>
<div class="form-group row">
 <label class="col-sm-3 col-form-label">Nama</label>
 <div class="col-md-9">
   <input type="text" name="nama" class="form-control" id="inputCity" onkeyup="this.value = this.value.toUpperCase()" placeholder="Nama" value="">
 </div>
</div>
<div class="form-group row">
 <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
 <div class="col-sm-6">
   <select class="custom-select mr-sm-4" id="inlineFormCustomSelect" name="jk">
     <option selected>--Pilih Salah Satu--</option>
     <option value="LAKI-LAKI">LAKI-LAKI</option>
     <option value="PEREMPUAN">PEREMPUAN</option>
   </select>
 </div>
</div>
<div class="form-group row">
 <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
 <div class="col-md-6">
   <input type="date" class="form-control" id="inputCity" placeholder="Nama" name="tgl_lhr" value="">
 </div>
</div>
<div class="form-group row">
 <label for="inputEmail3" class="col-sm-3 col-form-label">Perusahaan</label>
 <div class="col-sm-9">
   <input type="text" name="perush" class="form-control" id="inputEmail3" onkeyup="this.value = this.value.toUpperCase()" placeholder="">
 </div>
</div>
<div class="form-group row">
 <label for="inputEmail3" class="col-sm-3 col-form-label">Departemen</label>
 <div class="col-sm-6">
   <select class="custom-select mr-sm-2" name="dept" id="inlineFormCustomSelect">
     <option selected>--Pilih Salah Satu--</option>
     <?php foreach($departemen as $dept): ?> 
       <option value="<?php echo $dept->dept ?>"><?php echo $dept->dept?></option>
     <?php endforeach ; ?> 
   </select>
 </div>
</div>
<div class="form-group row">
 <label for="inputEmail3" class="col-sm-3 col-form-label">Posisi</label>
 <div class="col-sm-9">
   <input type="text" name="posisi" class="form-control" id="inputEmail3" onkeyup="this.value = this.value.toUpperCase()" placeholder="">
 </div>
</div>
<div class="modal-footer">
 <a class="btn btn-secondary" href="">Cancel</a>
 <button class="btn btn-primary" type="submit" name="submit">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>



<!-- Modal detail-->

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

