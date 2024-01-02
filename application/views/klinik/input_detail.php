<?php

foreach($datapasien as $dt_ps) : ?>

  <div class="row">
    <div class="col-sm-5">
      <pre>
        Nama          : <?php echo $dt_ps['nama'] ?> <br>
        Jenis kelamin : <?php echo $dt_ps['jk'] ?> <br>
        Umur          : <?php echo $dt_ps['umur'] ?> <br>
      </pre>
    </div>
    <div class="col-sm-5">
      <pre>
        Perusahaan    : <?php echo $dt_ps['perush'] ?> <br>
        Departemen    : <?php echo $dt_ps['dept'] ?> <br>
        Posisi        : <?php echo $dt_ps['posisi'] ?> <br>
      </pre>
    </div>

  <div class="form-group">
   <div class="row">
    <label class="col-sm-2 col-sm-2 control-label">Nama, JK, Umur</label>
    <div class="col-sm-3">
      <input class="form-control" name="nama" type="text" value="<?php echo $dt_ps['nama'] ?>" readonly="readonly"/>
    </div>
    <div class="col-sm-3">
      <input  name="jk" class="form-control" id="jk" type="text" placeholder="Jenis Kelamin" value="<?php echo $dt_ps['jk'] ?>" readonly="readonly"/>
    </div>
    <div class="col-sm-2">
      <input name="umur" class="form-control" id="umur" type="text" placeholder="Umur" value="<?php echo $dt_ps['umur'] ?>" readonly="readonly"/>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="row">
    <label class="col-sm-2 col-sm-2 control-label">Perush, Dept, Posisi</label>
    <div class="col-sm-3">
      <input name="perush" class="form-control" id="perush" type="text" placeholder="Perusahaan" value="<?php echo $dt_ps['perush'] ?>" readonly="readonly"/>
    </div>
    <div class="col-sm-3">
      <input name="dept" class="form-control" id="dept" type="text" placeholder="Departemen" value="<?php echo $dt_ps['dept'] ?>" readonly="readonly"/>
    </div>
    <div class="col-sm-3">
      <input name="jbtn" class="form-control" id="jbtn" type="text" placeholder="Jabatan" value="<?php echo $dt_ps['posisi'] ?>" readonly="readonly"/>
    </div>
  </div>
</div> 
<?php endforeach ; ?>
