<?php
$flashdata = $this->session->flashdata('item');
if(isset($flashdata)) {
  $message = $this->session->flashdata('item');
  ?>
<div class="alert alert-<?php echo $message['class']?>">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo $message['class']?>!</strong> <?php echo $message['message']; ?>
</div>

<?php 
}
?>
<h3>Laporan Pencapaian bulanan maklumbalas EMT bagi <strong><?= $target_month . ' ' . $target_year ?></strong></h3>
    
<a class="btn btn-info" href="<?= base_url('kpi/view_monthly_xls/'.$target_monthcode.'/'.$target_year.'/'.$target_state.'/bm')?>" >Excel</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>PYDT</td>
            <td>Inventory</td>
            <td>Sasaran Bulan <?= $target_month?></td>
            <td>BM </td><!-- Compare dengan sasaran bulan semasa % -->
            <td>Bil. Premis 7/7 </td><!-- Compare dengan sasaran bulan semasa % -->
            <td>BD </td> 
            <td>FI</td>
        </tr>
</thead>
      <?php
      
//      echo '<pre>';
//      print_r($sasaran_bulan_kks);
//      echo '</pre>';
      ?>
<tbody>
    <tr>
            <td>KKS</td>
            <td><?= $inventory_kks?></td>
            <td><?= $sasaran_bulan_kks->sasaran_bulan?></td>
            <td><?= $total_bm_kks?></td>
            <td><?= $total_bm_7per7_kks?></td>
            <td><?= $total_bd_kks?></td>
            <td><?= $total_fi_kks?></td>
    </tr>

            <tr>
            <td>KG</td>
            <td><?= $inventory_kg?></td>
            <td><?= $sasaran_bulan_kg->sasaran_bulan?></td>
            <td><?= $total_bm_kg?></td>
            <td><?= $total_bm_7per7_kg?></td>
            <td><?= $total_bd_kg?></td>
            <td><?= $total_fi_kg?></td>
            </tr>
          

        <tr>
            <td>BT</td>
            
          <td><?= $inventory_bt?></td>
            <td><?= $sasaran_bulan_bt->sasaran_bulan?></td>
            <td><?= $total_bm_bt?></td>
            <td><?= $total_bm_7per7_bt?></td>
            <td><?= $total_bd_bt?></td>
            <td><?= $total_fi_bt?></td>

        </tr>
    
</tbody>
    
</table>


<table class='table table-bordered table-striped'>
       <thead>
        <tr>
            <td>PYBDT</td>
            <td>Inventory</td>
            <td>Sasaran Bulan <?= $target_month?></td>
            <td>BM </td><!-- Compare dengan sasaran bulan semasa % -->
            <td>Bil. Premis 7/7 </td><!-- Compare dengan sasaran bulan semasa % -->
            <td>BD </td> 
            <td>FI</td>
        </tr>
</thead>
<tbody>
    <?php foreach($list_of_sic as $sic): ?>   
    <tr>      
        <td><?= $sic->SIC . ' : ' .$sic->KETERANGAN_SIC?></td>
        
        <?php 
        
         //$quarterly_kpi = ${"quarterly_kpi_$sic->SIC"};
         $inventory_sic = ${"inventory_$sic->SIC"};
         $sasaran_bulan_sic = ${"sasaran_bulan_$sic->SIC"};
         $total_bm = ${"total_bm_".$sic->SIC};
         $total_bd = ${"total_bd_".$sic->SIC};
         $total_fi = ${"total_fi_".$sic->SIC};
         $total_bm_7per7 = ${"total_bm_7per7_".$sic->SIC};
         ?>
        <td><?= $inventory_sic?></td>
            <td><?= $sasaran_bulan_sic->sasaran_bulan?></td>
             <td><?= $total_bm?></td>
            <td><?= $total_bm_7per7?></td>
            <td><?= $total_bd ?></td>
            <td><?= $total_fi ?></td>
           
    </tr>
    <?php    endforeach; ?>
</tbody>
</table>
