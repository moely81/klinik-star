<table class="table table-bordered">
    <thead class="text-center" style="font-size:15px">
        <tr>
            <th>NO</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Obat</th>
            <th>Qty</th>
            <th>Satuan</th>
        </tr>
    </thead>
    <?php foreach($dt_result as $row) : ?>
<tbody style="font-size:12px">
    <tr>
       <td><center><?php echo $no++ ?></center></td>
       <td><center><?php echo date('d/m/Y',strtotime($row->tgl)) ?></center></td>
       <td><?php echo $row->nama ?></td>
       <td><?php echo $row->dept ?></td>
       <td><?php echo $row->nm_erp ?></td>
       <td><center><?php echo $row->qty ?></center></td>
       <td><?php echo $row->unit ?></td>
    </tr>
</tbody>    
<?php endforeach ; ?>
</table>

<?php
 function daysBetween($s, $e)
  {
   $s = strtotime($s);
   $e = strtotime($e);
   return ($e - $s)/ (24 *3600)+1;
   }
  ?>
