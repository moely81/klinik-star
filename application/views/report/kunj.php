<h4 style="text-align: center">
    REPORT KUNJUNGAN PASIEN
</h4>
<div class="container-fluid">
    <div class="row-fluid">
        <!--<div class="span4">&nbsp;</div>-->
        <div class="span4 loader" style="text-align: center">
            <div class="progress progress-striped active" style="display: none">
                <div class="bar" style="width: 100%;"></div>
            </div>
        </div>
        <div class="span4">&nbsp;</div>
    </div>

    <div style="border-bottom: 1px #999 dashed; margin-bottom: 5px"></div>

    <div class="row-fluid">
        <div id="laporanPage">
            <form class="form-horizontal" method="post" action="<?= base_url('report/kunj/cari');?>">
                <div class="row ml-3">
                <div class="form-group mr-3">
                    <label class="form-label" for="start_date">Tanggal Awal</label>
                    <div class="form-controls">
                        <input type="date" id="tgl_awal" name="tgl_awal">
                    </div>
                </div>
                <div class="form-group mr-3">
                    <label class="form-label" for="end_date">Tanggal Akhir</label>
                    <div class="form-controls">
                        <input type="date" id="tgl_akhir" name="tgl_akhir">
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="form-controls">
                        <button id="btnCari" type="button" class="btn btn-info"><i class="icon icon-white icon-search"></i> Search...</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    <div style="border-bottom: 1px #999 dashed; margin-bottom: 5px"></div>

    <div class="row-fluid">
        <div class="table-responsive" id="result"></div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#btnCari").click(function() {
var $form = $('#laporanPage').find('form'),
$tgl_awal = $("#tgl_awal").val(),
$tgl_akhir = $("#tgl_akhir").val(),
$url = $form.attr('action');
$.ajax({
type: "POST",
url: $url,
dataType: "html",
data: "tgl_awal="+$tgl_awal+"&tgl_akhir="+$tgl_akhir,
cache:false,
success: function(data){
$(".loader").fadeIn(500).fadeOut(500).queue(function(){
$('#result').html(data);
});
}
});
return false;
});
});
</script>