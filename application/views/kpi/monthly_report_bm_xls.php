<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=monthly_rpt_bm.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3>Laporan Pencapaian bulanan maklumbalas EMT bagi <strong><?= $target_month . ' ' . $target_year ?></strong></h3>
    
<table class="table table-bordered table-striped">
    <thead>
        <tr>
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
            <td>KKS</td>
            <td><?= $inventory_kks?></td>
              <td><?= isset($sasaran_bulan_kks->sasaran_bulan)? $sasaran_bulan_kks->sasaran_bulan : '' ?></td
            <td><?= $total_bm_kks?></td>
            <td><?= $total_bm_7per7_kks?></td>
    </tr>

            <tr>
            <td>KG</td>
            <td><?= $inventory_kg?></td>
            <td><?= isset($sasaran_bulan_kg->sasaran_bulan)? $sasaran_bulan_kg->sasaran_bulan : '' ?></td>
            <td><?= $total_bm_kg?></td>
            <td><?= $total_bm_7per7_kg?></td>
    
            </tr>
          

        <tr>
            <td>BT</td>
            
          <td><?= $inventory_bt?></td>
            <td><?= isset($sasaran_bulan_bt->sasaran_bulan)? $sasaran_bulan_bt->sasaran_bulan : '' ?></td>
            <td><?= $total_bm_bt?></td>
            <td><?= $total_bm_7per7_bt?></td>
    

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
    
        </tr>
</thead>
<tbody>
    <?php unset($list_of_sic[39], $list_of_sic[40], $list_of_sic[41]); //remove SIC 40, 41, 42 key ?>
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
            <td><?= isset($sasaran_bulan_sic->sasaran_bulan)? $sasaran_bulan_sic->sasaran_bulan : ''?></td>
             <td><?= $total_bm?></td>
            <td><?= $total_bm_7per7?></td>
    
           
    </tr>
    <?php    endforeach; ?>
</tbody>
</table>
