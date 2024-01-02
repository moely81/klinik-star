<div class="form-group mt-4">
    <div class="form-controls">
    <button id="" type="button" class="btn btn-sm btn-warning"><i class="fas fa-file-excel mr-2"></i>Export Excel</button>
    </div>
</div>
<table class="table table-bordered">
    <thead class="text-center" style="font-size:15px">
        <tr>
            <th>NO</th>
            <th>NIK</th>
            <th>Nama Karyawan</th>
            <th>Departemen</th>
            <th>Tanggal Cuti</th>
            <th>Lama Cuti</th>
            <th>Diagnosa</th>
        </tr>
    </thead>
    <?php foreach($dt_result as $row) : 
    $sub_total [] = daysBetween($row->tgskt1, $row->tgskt2)-$row->pot_lbr ; $total = array_sum($sub_total);
    $days = $total*8;
    $ner = ($days/84597)*100;
    ?>
<tbody style="font-size:12px">
    <tr>
       <td><center><?php echo $no++ ?></center></td>
       <td><center><?php echo $row->nik_br ?></center></td>
       <td><?php echo $row->nama ?></td>
       <td><?php echo $row->dept ?></td>
       <td><center><?php echo date('d M Y',strtotime($row->tgskt1)).' - '.date('d M Y',strtotime($row->tgskt2)) ?></center></td>
       <td><center><?php echo (daysBetween($row->tgskt1, $row->tgskt2)-$row->pot_lbr).' hari' ?></center></td>
       <td><?php echo $row->diag ?></td>
    </tr>
</tbody>    
<?php endforeach ; ?>
<tfoot>
   <tr>
     <td colspan="5" align="right"><strong>Lost Working Day : </strong></td>
     <td align="right"><?php echo $total.' hari' ?></td>
   </tr>
   <tr>
     <td colspan="5" align="right"><strong>Lost Time Sick : </strong></td>
     <td align="right"><?php echo $days.' jam' ?></td>
   </tr>
   <tr>
     <td colspan="5" align="right"><strong>Non Effective Rate Illness : </strong></td>
     <td align="right"><?php echo $ner.' %' ?></td>
   </tr>
</tfoot>
</table>

<?php
 function daysBetween($s, $e)
  {
   $s = strtotime($s);
   $e = strtotime($e);
   return ($e - $s)/ (24 *3600)+1;
   }
  ?>
