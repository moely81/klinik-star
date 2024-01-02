
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Cari Data Pasien</h6>
            </div>
            <div class="card-body">
    <div class="panel-body">
      <form class="form-horizontal style-form" style="margin-top: 10px;" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
         <div class="form-group row">
          <label class="col-sm-2 form-label">Cari Data</label>
          <div class="form-group ml-3">
            <input name="cari" type="text" id="cari" autofocus="on"  placeholder="Cari Nama Pasien" class="form-control form-control-sm"/> </div>
            <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
            <div class="form-group ml-3">	                          
            <button type="submit" class="btn btn-sm btn-primary">Search</button>
          </div>
        </div>
        </form>
        </div>
        
      <div class="table-responsive">
      <table id="data_Table" class="table table-hover table-bordered">
        <thead class="text-center" style="font-size:15px;">
         <tr>
          <th>Aksi</th>
          <th>No RM</th>
          <th>Nama Pasien</th>
          <th>Departemen</th>
          <th>Posisi</th>
          </tr>
        </thead>
				<tbody style="font-size:12px;">
        <?php
        $kode = $this->input->post('cari');
          if($kode != ''){foreach($pasien as $ps) : ?>
         <tr>
           <td><center><a href="<?php echo base_url('klinik/input_dmr/choose/') . $ps->id ?>" class="badge badge-success"><i class="fa fa-edit"></i>choose</a>
           </center></td>
           <td><?php echo $ps->kode ?></td>
           <td><?php echo $ps->nama ?></td>
           <td><?php echo $ps->dept ?></td>
           <td><?php echo $ps->posisi ?></td>
           </tr>
         
       <?php endforeach ;
     }
        ?>
				</tbody>
       </table>
    </div>
    </div>
    </div>
 </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

   