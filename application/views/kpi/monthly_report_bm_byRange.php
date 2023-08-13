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
<h3>Laporan Pencapaian EMT 7/7 
    <?= $from_month .' '. $from_year . ' - ' . $to_month .' '. $to_year  ?> bagi <strong><?= $this->ref->return_state($state_code) ?></strong></h3>
    
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead>
        <tr class="bg-info">
            <td>PYDT</td>
            <td>Inventory</td>
            <td>Sasaran Bulan</td>
            <td>
                <form method="post" action="<?= base_url('kpi/list_premises_bm')?>" class="display:inline;">
                    <input type="hidden" name="from" value="<?=$from ?>">
                    <input type="hidden" name="to" value="<?=$to?>">
                    <input type="hidden" name="from_month" value="<?=$from_month ?>">
                    <input type="hidden" name="from_year" value="<?=$from_year?>">
                    <input type="hidden" name="to_month" value="<?=$to_month ?>">
                    <input type="hidden" name="to_year" value="<?=$to_year?>">
                    <input type="hidden" name="to_year" value="<?=$to_year?>">
                    <input type="hidden" name="state_code" value="<?=$state_code?>">
                    <button type="submit" class="btn btn-default">
                      BM <i class="fa fa-file-excel-o"></i>
                    </button>
                </form>
            </td><!-- Compare dengan sasaran bulan semasa % -->
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
</div>

<div class="table-responsive">
<table class='table table-bordered table-striped'>
       <thead>
        <tr class="bg-info">
            <td>PYBDT</td>
            <td>Inventory</td>
            <td>Sasaran Bulan</td>
            <td>
                <form method="post" action="<?= base_url('kpi/list_premises_bm')?>" class="display:inline;">
                    <input type="hidden" name="from_month" value="<?=$from_month ?>">
                    <input type="hidden" name="from_year" value="<?=$from_year?>">
                    <input type="hidden" name="to_month" value="<?=$to_month ?>">
                    <input type="hidden" name="to_year" value="<?=$to_year?>">
                    <input type="hidden" name="to_year" value="<?=$to_year?>">
                    <input type="hidden" name="state_code" value="<?=$state_code?>">
                    <button type="submit" class="btn btn-default">
                      BM <i class="fa fa-file-excel-o"></i>
                    </button>
                </form>
            </td><!-- Compare dengan sasaran bulan semasa % -->
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
</div>
