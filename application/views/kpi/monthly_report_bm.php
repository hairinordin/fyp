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
<h3>Laporan Pencapaian EMT 7/7 bagi Bulan <strong><?= $target_month . ' ' . $target_year ?></strong></h3>
    
<a class="btn btn-info" href="<?= base_url('kpi/view_monthly_xls/'.$target_monthcode.'/'.$target_year.'/'.$target_state.'/bm')?>" >Excel</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr class="bg-info">
            <td>PYDT</td>
            <td>Inventory</td>
            <td>Sasaran Bulan <?= $target_month?></td>
            <td>BM </td><!-- Compare dengan sasaran bulan semasa % -->
            <td>Bil. Premis 7/7 </td><!-- Compare dengan sasaran bulan semasa % -->
            
        </tr>
</thead>
      <?php
      
//      echo '<pre>';
//      print_r($sasaran_bulan_kks);
//      echo '</pre>';
      ?>
<tbody>
    <tr>
            <td>Kilang Kelapa Sawit</td>
            <td data-container="body" data-toggle="tooltip" title="Inventory for Kilang Kelapa Sawit" ><?= $inventory_kks?></td>
            <td data-container="body" data-toggle="tooltip" title="Sasaran for Kilang Kelapa Sawit" ><?= isset($sasaran_bulan_kks->sasaran_bulan)? $sasaran_bulan_kks->sasaran_bulan : '' ?></td>
            <td data-container="body" data-toggle="tooltip" title="Total BM Kilang Kelapa Sawit" ><?= $total_bm_kks?></td>
            <td data-container="body" data-toggle="tooltip" title="Total 7/7 Kilang Kelapa Sawit" ><?= $total_bm_7per7_kks?></td>
            </tr>

            <tr>
            <td>Kilang Getah</td>
            <td data-container="body" data-toggle="tooltip" title="Inventory for Kilang Getah" ><?= $inventory_kg?></td>
            <td data-container="body" data-toggle="tooltip" title="Sasaran for Kilang Getah" ><?= isset($sasaran_bulan_kg->sasaran_bulan)? $sasaran_bulan_kg->sasaran_bulan : '' ?></td>
            <td data-container="body" data-toggle="tooltip" title="Total BM Kilang Getah" ><?= $total_bm_kg?></td>
            <td data-container="body" data-toggle="tooltip" title="Total 7/7 Kilang Getah" ><?= $total_bm_7per7_kg?></td>
            </tr>
          

        <tr>
            <td>Buangan Terjadual</td>
            
            <td data-container="body" data-toggle="tooltip" title="Inventory for Buangan Terjadual" ><?= $inventory_bt?></td>
            <td data-container="body" data-toggle="tooltip" title="Sasaran for Buangan Terjadual"><?= isset($sasaran_bulan_bt->sasaran_bulan)? $sasaran_bulan_bt->sasaran_bulan : '' ?></td>
            <td data-container="body" data-toggle="tooltip" title="Total BM Buangan Terjadual"><?= $total_bm_bt?></td>
            <td data-container="body" data-toggle="tooltip" title="Total 7/7 Buangan Terjadual"><?= $total_bm_7per7_bt?></td>
            
        </tr>
    
</tbody>
    
</table>


<table class='table table-bordered table-striped'>
       <thead>
        <tr class="bg-info">
            <td>PYBDT</td>
            <td>Inventory</td>
            <td>Sasaran Bulan <?= $target_month?></td>
            <td>BM </td><!-- Compare dengan sasaran bulan semasa % -->
            <td>Bil. Premis 7/7 </td><!-- Compare dengan sasaran bulan semasa % -->
            
        </tr>
</thead>
<tbody>
     <?php unset($list_of_sic[39], $list_of_sic[40], $list_of_sic[41]); //remove SIC 40, 41, 42 key ?>
    <?php foreach($list_of_sic as $sic): ?>   
    <tr>      
        <td><?= $sic->KETERANGAN_SIC?></td>
        
        <?php 
        
         //$quarterly_kpi = ${"quarterly_kpi_$sic->SIC"};
         $inventory_sic = ${"inventory_$sic->SIC"};
         $sasaran_bulan_sic = ${"sasaran_bulan_$sic->SIC"};
         $total_bm = ${"total_bm_".$sic->SIC};
         $total_bd = ${"total_bd_".$sic->SIC};
         $total_fi = ${"total_fi_".$sic->SIC};
         $total_bm_7per7 = ${"total_bm_7per7_".$sic->SIC};
         ?>
        <td data-container="body" data-toggle="tooltip" title="Inventory for <?= $sic->KETERANGAN_SIC?>" ><?= $inventory_sic?></td>
        <td data-container="body" data-toggle="tooltip" title="Sasaran for <?= $sic->KETERANGAN_SIC?>"><?= isset($sasaran_bulan_sic->sasaran_bulan)? $sasaran_bulan_sic->sasaran_bulan : ''?></td>
        <td data-container="body" data-toggle="tooltip" title="Total BM <?= $sic->KETERANGAN_SIC?>"><?= $total_bm?></td>
        <td data-container="body" data-toggle="tooltip" title="Total 7/7 <?= $sic->KETERANGAN_SIC?>"><?= $total_bm_7per7?></td>
           
    </tr>
    <?php    endforeach; ?>
</tbody>
</table>
