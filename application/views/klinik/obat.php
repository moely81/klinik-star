 <div class="container-fluid">
 	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#dmrModal"><i class="fas fa-plus-circle fa-sm" ></i> Input Obat</button>
	<div class="table-responsive">
 	<table id="table_id" class="table table-bordered">
 		<thead class="text-center" style="font-size:15px">
 			<tr>
 				<th>No</th>
 				<th>Nama Obat</th>
 				<th>Stock</th>
 				<th>Harga</th>
 				<th>Aksi</th>
 			</tr>
 		</thead>
 		<?php 
 		$start = $this->uri->segment(4);
 		foreach($obat as $ob) : ?>
 			<tbody style="font-size:12px">
 				<tr>
 					<td align="right"><?php echo ++$start ?></td>
 					<td><?php echo $ob->nm_erp ?></td>
 					<td align="right"><?php echo $ob->stok ?></td>
 					<td align="right"><?php echo formatrp($ob->harga) ?></td>
 					<td align="center"><a class="badge badge-success" href="">detail </a></td>
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
 				<h5 class="modal-title" id="exampleModalLabel">Input Obat</h5>
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
 							<label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
 							<div class="col-md-9">
 								<input type="text" class="form-control" id="inputCity" placeholder="Nama" value="">
 							</div>
 						</div>
 						<div class="form-group row">
 							<label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
 							<div class="form-group col-md-9">
 								<input type="text" class="form-control" id="inputCity" placeholder="Departemen" value="">
 							</div>
 						</div>
 					</fieldset>
 					<div class="form-group row">
 						<label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
 						<div class="col-sm-6">
 							<select class="custom-select mr-sm-4" id="inlineFormCustomSelect">
 								<option selected>--Pilih Salah Satu--</option>
 								<option value="1">Laki-laki</option>
 								<option value="2">Perempuan</option>
 							</select>
 						</div>
 					</div>
 					<div class="form-group row">
 						<label for="inputEmail3" class="col-sm-3 col-form-label">Accident</label>
 						<div class="col-sm-6">
 							<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
 								<option selected>--Pilih Salah Satu--</option>
 								<option value="1">FIRST VISIT</option>
 								<option value="2">FOLLOW UP</option>
 							</select>
 						</div>
 					</div>
 					<div class="form-group row" >
 						<label for="inputEmail3" class="col-sm-3 col-form-label">OHR/NOHR</label>
 						<div class="col-sm-6">
 							<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
 								<option selected>--Pilih Salah Satu--</option>
 								<option value="1">FIRST VISIT</option>
 								<option value="2">FOLLOW UP</option>
 							</select>
 						</div>
 					</div>
 					<div class="form-group row">
 						<label for="inputEmail3" class="col-sm-3 col-form-label">Detail</label>
 						<div class="col-sm-9">
 							<input type="email" class="form-control" id="inputEmail3" placeholder="">
 						</div>
 					</div>
 					<div class="form-group row">
 						<label for="inputEmail3" class="col-sm-3 col-form-label">Investigasi</label>
 						<div class="col-sm-9">
 							<input type="email" class="form-control" id="inputEmail3" placeholder="">
 						</div>
 					</div>
 					<div class="form-group row">
 						<label for="inputEmail3" class="col-sm-3 col-form-label">Diagnosa</label>
 						<div class="col-sm-6">
 							<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
 								<option selected>--Pilih Salah Satu--</option>
 								<option value="1">FIRST VISIT</option>
 								<option value="2">FOLLOW UP</option>
 							</select>
 						</div>
 					</div>
 					<div class="form-group row">
 						<label for="inputEmail3" class="col-sm-3 col-form-label">Treatment</label>
 						<div class="col-sm-9">
 							<input type="email" class="form-control" id="inputEmail3" placeholder="">
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

 <?php
 function formatrp($angka){
$rupiah="Rp " . number_format($angka,2,',','.'); // membentuk tanda pemisah seperti (.)
return $rupiah;
}
?> 