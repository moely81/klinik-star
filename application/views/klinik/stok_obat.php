<div class="container-fluid">
     <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Obat Masuk</h6>
    </div>
    <div class="card-body">
        <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#inputstokModal"><i class="fas fa-plus-circle fa-sm" ></i> Input Obat Masuk</button>
    <div class="table-responsive">
 	<table id="table_id" class="table table-bordered">
 		<thead class="text-center" style="font-size:15px">
 		    <hr>
 		    <div class="ml-4">
 		     <h5>Data Obat Masuk Bulan : <?php echo date('M Y')?></h5>   
 		    </div>
 		    <hr>
 			<tr>
 				<th>Tanggal</th>
 				<th>Nama Obat</th>
 				<th>Tambah Stock</th>
 				<th>Jumlah Stok</th>
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
 					<td align="right"><?php echo $ob->harga ?></td>
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
        </div>
        </div>
        
<!-- Modal input-->
<div class="modal fade" id="inputstokModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Input Obat Masuk</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">×</span>
   </button>
 </div>
 <div class="modal-body">
  <form action="<?php echo base_url().'klinik/ps/tambah'; ?>" method="post">
   <fieldset>
    <div class="form-group row">
     <label class="col-sm-8 col-form-label">Tanggal</label>
     <div class="col-sm-4">
      <input name="tgl" type="date" id="tgl" class="form-control form-control-sm" value="">
    </div>
  </div>
</fieldset>
  <div class="form-group">
    <div class="input_fields_wrap">
      <div class="row mb-1">
        <div class="col-sm-8">
          <select class="form-control form-control-sm" name="kd_obt[]" id="kd_obt[]" required>
            <option value="">--Pilih Obat--</option>
            <?php 
            foreach($obat as $obt):
             ?> 
             <option value="<?php echo $obt->kd_obt ?>"><?php echo $obt->nm_obt ?></option>
           <?php endforeach ;
           ?> 
         </select>
         <!--<input name="nm_obat[]" class="form-control" id="nm_obat" type="text" placeholder="Nama Obat"/> -->
       </div>
       
       <div class="col-sm-2">
        <input name="qty[]" class="form-control form-control-sm" id="qty" type="text" placeholder="Qty" required/>
       </div>
      <a href="javascript:void(0);" class="btn btn-sm btn-primary add_field_button ml-3" >+add</a>
     </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
<script type="text/javascript">
 $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper       = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
  e.preventDefault();
    if(x < max_fields){ //max input box allowed
    x++; //text box increment
    $(wrapper).append('<div class="row mb-1"><div class="col-sm-8"><select class="form-control form-control-sm" name="kd_obt[]" id="kd_obt[]" required><option value="">--Pilih Obat--</option><?php foreach($obat as $obt) : ?><option value="<?php echo $obt->kd_obt ?>"><?php echo $obt->nm_obt ?></option><?php endforeach ; ?></select></div><div class="col-sm-2"><input name="qty[]" class="form-control form-control-sm" id="qty" type="text" placeholder="Qty" required/></div><a href="javascript:void(0);" class="btn btn-sm btn-danger remove_field ml-3">X</a></div>'); //add input box     
              }
            });

               $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                 e.preventDefault(); $(this).parent('div').remove(); x--;
               }) 
             });

</script>
