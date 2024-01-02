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
<div class="container-fluid">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Input DMR</h6>
            </div>
            <div class="card-body">
  <form class="form-horizontal style-form" style="margin-top: 10px;" action="<?php echo base_url('klinik/input_dmr/simpan_dmr')?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div class="panel-body">
    <!--<form class="form-horizontal style-form" style="margin-top: 10px;" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">-->
      
      <div class="form-group row">
        <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-3">
            <input type="date" value="<?php echo date('Y-m-d');?>" name="tgl" class="form-control form-control-sm">
          </div>
        </div>
      
       <div class="form-group row">
        <label class="col-sm-2 col-sm-2 control-label">Kode Pasien</label>
        <div class="col-sm-3">
          <input name="nik" type="text" id="nik"   placeholder="Input Nama Pasien" class="form-control form-control-sm" value="<?= $detail['kode'];?>" readonly /> </div>
          <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
          <div class="list-group" id="show-list" style="margin-bottom:10px;"></div>	                          
          <div class="col-sm-3">
            <input name="kode" type="text" id="kode" value="DMR<?php echo sprintf("%04s", $kode)?>" class="form-control form-control-sm" readonly="readonly" />
          </div>
          
        </div>
        <!--</form> -->
        <input name="no_dmr" type="hidden" id="no_dmr" class="form-control" placeholder="Tidak perlu di isi" value="" readonly="readonly" />
        
      <div class="form-group row">
        <label class="col-sm-2 col-sm-2 control-label">Nama, JK, Umur</label>
        <div class="col-sm-3">
          <input name="nm" class="form-control form-control-sm" id="nm" type="text" placeholder="Nama Pasien" value="<?= $detail['nama'];?>" readonly="readonly"  />
        </div>
        <div class="col-sm-3">
          <input name="jk" class="form-control form-control-sm" id="jk" type="text" placeholder="Jenis Kelamin" value="<?= $detail['jk'];?>"  readonly="readonly"/>
        </div>
        <div class="col-sm-3">
          <input name="umur" class="form-control form-control-sm" id="umur" type="text" placeholder="Umur" value="<?= umurmu($detail['tgl_lhr']);?>" readonly="readonly"/>
        </div>
      </div>
    

    <div class="form-group row">
      
        <label class="col-sm-2 col-sm-2 control-label">Perush, Dept, Posisi</label>
        <div class="col-sm-3">
          <input name="perush" class="form-control form-control-sm" id="perush" type="text" placeholder="Perusahaan" value="<?= $detail['perush'];?>" readonly="readonly"/>
        </div>
        <div class="col-sm-3">
          <input name="dept" class="form-control form-control-sm" id="dept" type="text" placeholder="Departemen" value="<?= $detail['dept'];?>" readonly="readonly"/>
        </div>
        <div class="col-sm-3">
          <input name="jbtn" class="form-control form-control-sm" id="jbtn" type="text" placeholder="Jabatan" value="<?= $detail['posisi'];?>" readonly="readonly"/>
        </div>
      </div>
    

    <div class="form-group row">
      <label class="col-sm-2 col-sm-2 control-label">Case</label>
        <div class="col-sm-3">
          <select class="form-control form-control-sm" name="kunj" id="kunj" required>
            <option value=""> -- Pilih Salah Satu --</option>
            <option value="FV"> FIRST VISIT</option>
            <option value="FU"> FOLLOW UP</option>
          </select>
        </div>
        <div class="col-sm-3">
          <select class="form-control form-control-sm" name="accid" id="accid" required>
            <option value=""> -- Accident ? --</option>
            <option value="Yes"> Y E S</option>
            <option value="No"> N O</option>
          </select>
        </div>
        <div class="col-sm-3">
          <select class="form-control form-control-sm" name="ohr" id="ohr" required>
            <option value=""> -- Pilih Salah Satu --</option>
            <option value="OHR"> O H R</option>
            <option value="NOHR"> N O H R</option>
          </select>
        </div>
      </div>
    

    <div class="form-group row">
      <label class="col-sm-2 col-sm-2 control-label">Diagnosa</label>
        <div class="col-sm-4">
          <select class="form-control form-control-sm" name="diag" id="diag" required>
            <option value="">--Pilih Diagnosa--</option>
            <?php 
            foreach($diagnosa as $diag):
             ?> 
             <option value="<?php echo $diag->diag ?>"><?php echo $diag->diag?></option>
           <?php endforeach ;
           ?> 
         </select>
       </div>
     </div>
   

   <div class="form-group">
    <div class="row">
      <label class="col-sm-2 col-sm-2 control-label">Detail</label>
      <div class="col-sm-8">
        <input name="detail" class="form-control form-control-sm" id="detail" type="text" placeholder="Detail" required />
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <label class="col-sm-2 col-sm-2 control-label">Investigasi</label>
      <div class="col-sm-8">
        <input name="invest" class="form-control form-control-sm" id="invest" type="text" placeholder="Investigasi" required />
      </div>
    </div>
  </div>


  <div class="form-group">
    <div class="row">
      <label class="col-sm-2 col-sm-2 control-label">Treatment</label>
      <div class="col-sm-8">
        <input name="treat" class="form-control form-control-sm" id="treat" type="text" placeholder="Treatment" required />
      </div>
    </div>
  </div>
  <hr>
  <div class="form-group">
    <div class="row">
      <label class="col-sm-2 col-sm-2 control-label">Penggunaan Obat  :</label>
      <div class="col-sm-8">
        <input name="" class="form-control form-control-sm" id="treat" type="hidden" "Treatment" required />
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="input_fields_wrap">
      <div class="row mb-1">
        <label class="col-sm-2 col-sm-2 control-label"></label>
        <div class="col-sm-5">
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
       
       <div class="col-sm-1">
        <input name="qty[]" class="form-control form-control-sm" id="qty" type="text" placeholder="Qty" required/>
       </div>
      <a href="javascript:void(0);" class="btn btn-sm btn-primary add_field_button ml-3" >+add</a>
     </div>
  </div>
</div>
<hr>
<div class="form-group">
  <div class="row">
    <label class="col-sm-2 col-sm-2 control-label">PIC</label>
    <div class="col-sm-3">
      <input name="pic" class="form-control form-control-sm" id="pic" type="text" value="<?= $dashboard['nama'];?>" readonly />
    </div>
  </div>
</div>
<div class="form-group" style="margin-bottom: 20px;">
  <label class="col-sm-2 col-sm-2 control-label"></label>
  <div class="col-sm-8">
    <input type="submit" value="Submit" class="btn btn-sm btn-primary" />&nbsp;
    <a href="" class="btn btn-sm btn-danger">Batal </a>
  </div>
</div>
<div style="margin-top: 20px;"></div>
</form>
</form>
</div>
</div>
<div class="modal fade" id="c" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Penggunaan Obat</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal style-form" style="margin-left: 10px;">
         <div class="form-group">
          <label class="col-sm-3 col-sm-3 control-label">No DMR</label>
          <div class="col-sm-4">
            <input name="nama" class="form-control" id="nama" type="text" value="DMR00001"/>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 col-sm-3 control-label">Nama Obat</label>
          <div class="col-sm-4">
            <select class="form-control" name="nm_obt" id="nm_obt">
              <option> -- Pilih Salah Satu --</option>
              <option value="FV"> FIRST VISIT</option>
              <option value="FU"> FOLLOW UP</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 col-sm-3 control-label">Q T Y</label>
          <div class="col-sm-2">
            <input name="qty" class="form-control" id="qty" type="text" maxlength="2" />
          </div>
        </div>
        <button type="button" class="btn btn-default" >Proses</button>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
</div>
</div>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
                <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                 crossorigin="anonymous"></script>-->

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
                $(wrapper).append('<div class="row p-1"><label class="col-sm-2 col-sm-2 control-label"></label><div class="col-sm-5"><select class="form-control form-control-sm" name="kd_obt[]" id="kd_obt[]" required><option value="">--Pilih Obat--</option><?php foreach($obat as $obt) : ?><option value="<?php echo $obt->kd_obt ?>"><?php echo $obt->nm_obt ?></option><?php endforeach ; ?></select></div><div class="col-sm-1"><input name="qty[]" class="form-control form-control-sm" id="qty" type="text" placeholder="Qty" required/></div><a href="javascript:void(0);" class="btn btn-sm btn-danger remove_field ml-3">X</a></div>'); //add input box     
              }
            });

               $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                 e.preventDefault(); $(this).parent('div').remove(); x--;
               }) 
             });

           </script>
