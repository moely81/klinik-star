 <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Input Absen Illness</h6>
            </div>
            <div class="card-body">
 <?= $this->session->flashdata('message');?>
 				<form action="<?php echo base_url('user/absill/tambah')?>" method="post">
					<fieldset>
					<input type="hidden" id="tgl" name="tgl" value="<?php echo date('Y-m-d');?>">
					<input type="hidden" id="nik" name="nik" value="<?php echo $detail['nik'];?>">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">NIK</label>
							<div class="col-md-3">
								<input name="nik_br" type="text" id="nik_br" class="form-control form-control-sm" placeholder="" value="<?php echo $detail['nik_br']; ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Nama Kary</label>
							<div class="col-md-8">
								<input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Karyawan" value="<?php echo $detail['nama']; ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Departemen</label>
							<div class="form-group col-md-6">
								<input type="text" class="form-control form-control-sm" id="inputCity" placeholder="Departemen" value="<?php echo $detail['dept']; ?>" readonly>
							</div>
						</div>
						
					</fieldset>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Nama Dokter</label>
						<div class="col-sm-8">
							<input type="text" class="form-control form-control-sm" id="dokter" name="dokter" placeholder="Nama Dokter" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control form-control-sm" id="alamat" name="alamat" placeholder="Alamat Dokter" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Diagnosa</label>
						<div class="col-sm-6">
							<input type="text" class="form-control form-control-sm" id="diag" name="diag" placeholder="Diagnosa Dokter" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Tgl Awal</label>
						<div class="col-sm-3">
							<input type="date" class="form-control form-control-sm" id="tgskt1" name="tgskt1" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Tgl Akhir</label>
						<div class="col-sm-3">
							<input type="date" class="form-control form-control-sm" id="tgskt2" name="tgskt2" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Input File</label>
						<div class="col-sm-5">
							<input type="file" class="form-control form-control-sm" id="inputfile" placeholder="" required>
						</div>
					</div>
					<fieldset>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">PIC</label>
						<div class="col-sm-5">
							<input type="text" class="form-control form-control-sm" id="user" name="user" value="<?= $dashboard['nama'];?>" readonly>
						</div>
					</div>	
					</fieldset>	
                    <div class="modal-footer">
				     <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				     <button class="btn btn-sm btn-primary" type="submit">Submit</a>
			        </div>					
				</form>
			</div>
			</div>
			</div>

<?php
function daysBetween($s, $e)
{
	$s = strtotime($s);
	$e = strtotime($e);

	return ($e - $s)/ (24 *3600)+1;
}
?>