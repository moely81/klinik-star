 <div class="container-fluid">
 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<h6 class="m-0 font-weight-bold text-primary">Data D M R</h6>
 		</div>
 		<div class="card-body">
 		    <?= $this->session->flashdata('message');?>
 			<!--<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#dmrModal"><i class="fas fa-plus-circle fa-sm" ></i> Input DMR</button>-->
 			<a class="btn btn-sm btn-primary mb-3" href="<?= base_url('klinik/cari_ps');?>" ><i class="fas fa-plus-circle fa-sm" ></i> Input DMR</a>
 			<div class="table-responsive">
 				<table id="table_id" class="table table-bordered">
 					<thead class="text-center" style="font-size:15px;">
 						<tr>
 							<th>Tanggal</th>
 							<th>Nama Pasien</th>
 							<th>Departemen</th>
 							<th>Diagnosa</th>
 							<th>Aksi</th>
 						</tr>
 					</thead>
 					<?php foreach($kary as $r) : ?>
 						<tbody style="font-size:12px">
 							<tr>
 								<td><?php echo $r->tgl ?></td>
 								<td><?php echo $r->nama ?></td>
 								<td><?php echo $r->dept ?></td>
 								<td><?php echo $r->diag ?></td>
 								<td><a href="<?= base_url('klinik/dmr/detail_dmr/') . $r->no_dmr ;?>" class="badge badge-success">Detail</a></td>
 							</tr>
 						</tbody>
 					<?php endforeach ; ?>
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
 		<div class="modal fade" id="dmrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 			<div class="modal-dialog" role="document">
 				<div class="modal-content">
 					<div class="modal-header">
 						<h5 class="modal-title" id="exampleModalLabel">Input DMR</h5>
 						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
 							<span aria-hidden="true">×</span>
 						</button>
 					</div>
 					<div class="modal-body">
 						<form action="" method="post">
 							<fieldset disabled>
 								<div class="form-group row">
 									<label for="inputEmail3" class="col-sm-3 col-form-label">No RM</label>
 									<div class="col-md-5">
 										<input name="kode" type="text" id="kode" class="form-control" placeholder="STARxxxx" value="">
 									</div>
 								</div>
 								<div class="form-group row">
 									<label for="inputEmail3" class="col-sm-3 col-form-label">Nama Pasien</label>
 									<div class="col-md-9">
 										<input type="text" class="form-control" id="nama" placeholder="Nama" value="">
 									</div>
 								</div>
 								<div class="form-group row">
 									<label for="inputEmail3" class="col-sm-3 col-form-label">Departemen</label>
 									<div class="form-group col-md-9">
 										<input type="text" class="form-control" id="inputCity" placeholder="Departemen" value="">
 									</div>
 								</div>
 							</fieldset>
 							<div class="form-group row">
 								<label for="inputEmail3" class="col-sm-3 col-form-label">Case</label>
 								<div class="col-sm-6">
 									<select class="custom-select mr-sm-4" id="case" name="case">
 										<option selected>--Pilih Salah Satu--</option>
 										<option value="FV">FIRST VISIT</option>
 										<option value="FU">FOLLOW UP</option>
 									</select>
 								</div>
 							</div>
 							<div class="form-group row">
 								<label for="inputEmail3" class="col-sm-3 col-form-label">Accident</label>
 								<div class="col-sm-6">
 									<select class="custom-select mr-sm-2" id="accid" name="accid">
 										<option selected>--Pilih Salah Satu--</option>
 										<option value="Yes">YES</option>
 										<option value="No">NO</option>
 									</select>
 								</div>
 							</div>
 							<div class="form-group row" >
 								<label for="inputEmail3" class="col-sm-3 col-form-label">OHR/NOHR</label>
 								<div class="col-sm-6">
 									<select class="custom-select mr-sm-2" id="ohr" name="ohr">
 										<option selected>--Pilih Salah Satu--</option>
 										<option value="NOHR">NOHR</option>
 										<option value="OHR">OHR</option>
 									</select>
 								</div>
 							</div>
 							<div class="form-group row">
 								<label for="inputEmail3" class="col-sm-3 col-form-label">Detail</label>
 								<div class="col-sm-9">
 									<input type="text" class="form-control" id="detail" name="detail" placeholder="">
 								</div>
 							</div>
 							<div class="form-group row">
 								<label for="inputEmail3" class="col-sm-3 col-form-label">Investigasi</label>
 								<div class="col-sm-9">
 									<input type="text" class="form-control" id="invest" name="invest" placeholder="">
 								</div>
 							</div>
 							<div class="form-group row">
 								<label class="col-sm-3 col-form-label">Diagnosa</label>
 								<div class="col-sm-6">
 									<select class="custom-select mr-sm-2" id="diag" name="diag">
 										<option selected>--Pilih Salah Satu--</option>
 										<option value="1">FIRST VISIT</option>
 										<option value="2">FOLLOW UP</option>
 									</select>
 								</div>
 							</div>
 							<div class="form-group row">
 								<label class="col-sm-3 col-form-label">Treatment</label>
 								<div class="col-sm-9">
 									<input type="text" class="form-control" id="treat" name="treat" placeholder="">
 								</div>
 							</div>
 							<div class="form-group row">
 								<label for="inputEmail3" class="col-sm-3 col-form-label">PIC</label>
 								<div class="col-sm-5">
 									<input type="email" class="form-control" id="inputEmail3" placeholder="">
 								</div>
 							</div>					
 						</form>
 					</div>
 					<div class="modal-footer">
 						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
 						<a class="btn btn-primary" href="">Submit</a>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

 