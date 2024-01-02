 <div class="container-fluid">
     <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Absen Illness</h6>
          </div>
     <div class="card-body">
       
         
 <?= $this->session->flashdata('message');?>
 	<a href="<?php echo base_url('hrd/absill_approved');?>" class="btn btn-sm btn-danger mb-3"><i class="fas fa-reply fa-sm" ></i> Approved</a>
	<div class="table-responsive">
 	<table id="data_Table" class="table table-bordered">
 		<thead class="text-center" style="font-size:15px;">
 			<tr>
 				<th>Tanggal</th>
 				<th>Nama Karyawan</th>
 				<th>Tanggal Cuti</th>
 				<th>Pot Lbr</th>
 				<th>Lama Cuti</th>
 				<th>Status</th>
 				<th>User</th>
 			</tr>
 		</thead>
 		<tbody style="font-size:12px">
 		<?php foreach($absill as $ab) : ?>
 			
 				<tr>
 					<td><?php echo date('d M Y', strtotime($ab->tgl)) ?></td>
 					<td><?php echo $ab->nama ?></td>
 					<td><center><?php echo date('d M Y',strtotime($ab->tgskt1)).' - '.date('d M Y',strtotime($ab->tgskt2));?></center></td>
                    <td><center><?php echo $ab->pot_lbr.'  hari' ?></center></td>
 					<td><center><?php echo (daysBetween($ab->tgskt1, $ab->tgskt2)-$ab->pot_lbr).' hari';?></center></td>
 					<td><center><?php if($ab->status==1){
 						echo '<span class="badge badge-primary">Verified</span>';
 					}elseif($ab->status==2) { echo '<span class="badge badge-danger">Approved</span>';
 				}else{echo '<span class="badge badge-success">Waiting</span>';}?></center></td>
 				<td><?php echo $ab->user ?></td>
 				</tr>
 		
 	<?php endforeach ; ?>
 	</tbody>
	</table>
	</div>
 <div class="row">
 	<div class="col">
 		<!--Tampilkan pagination-->
 		<?php 
 		echo $this->pagination->create_links();
 		?>
 	</div>
 </div>
</div>
<!-- Dmr Modal-->
<div class="modal fade" id="absillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Input Absen Illness</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url(). 'user/absill/tambah';?>" method="post">
					<fieldset>
					<input type="hidden" id="tgl" name="tgl" value="<?php echo date('Y-m-d');?>">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">NIK</label>
							<div class="col-md-5">
								<input name="nik" type="text" id="nik" class="form-control" placeholder="" value="1401045">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Nama Kary</label>
							<div class="col-md-9">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Karyawan" value="">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Departemen</label>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" id="inputCity" placeholder="Departemen" value="">
							</div>
						</div>
					</fieldset>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Nama Dokter</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="dokter" name="dokter" placeholder="Nama Dokter" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Dokter">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Diagnosa</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="diag" name="diag" placeholder="Diagnosa Dokter">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Tgl Awal</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="tgskt1" name="tgskt1">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Tgl Akhir</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="tgskt2" name="tgskt2" placeholder="">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Input File</label>
						<div class="col-sm-7">
							<input type="file" class="form-control" id="inputfile" placeholder="" required>
						</div>
					</div>
					<fieldset>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">PIC</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="user" name="user" value="<?= $dashboard['nama'];?>" readonly>
						</div>
					</div>	
					</fieldset>	
                    <div class="modal-footer">
				     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				     <button class="btn btn-primary" type="submit">Submit</a>
			        </div>					
				</form>
			</div>
			
		</div>
	</div>
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
