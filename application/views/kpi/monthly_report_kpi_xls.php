<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=monthly_rpt.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<style>
    
    table, th, td {
    border: 1px solid black;
}

    </style>
    
<h3>Laporan Pencapaian bulanan maklumbalas EMT bagi <strong><?= $target_month . ' ' . $target_year ?></strong></h3>

<table>
    <thead>
  
            <th>PYDT</th>
            <th>Inventory</th>
            <th>Sasaran Bulan <?= $target_month?></th>
            <th>BM</th>
            <th>Bil. Premis 7/7</th>
            <th>BM % (Sasaran Bulan)</th>
            <th>BM % (Inventory)</th>
            <th>Bil. Premis 7/7 %(Sasaran Bulan)</th>
            <th>Bil. Premis 7/7 %(Inventory)</th>
        
    </thead>

    <tr>
            <td>KKS</td>
            <td><?= $inventory_kks->inventory?></td>
            <td><?= $sasaran_bulan_kks->sasaran_bulan?></td>
            <td><?= $total_bm_kks?></td>
            <td><?= $total_bm_7per7_kks?></td>
            <td><?= ($total_bm_kks / $sasaran_bulan_kks->sasaran_bulan) * 100 . '%'?></td>
            <td><?= ($total_bm_kks / $inventory_kks->inventory) * 100 . '%'?></td>
            <td><?= ($total_bm_7per7_kks / $sasaran_bulan_kks->sasaran_bulan) * 100 . '%'?></td>
            <td><?= ($total_bm_7per7_kks / $inventory_kks->inventory) * 100 . '%'?></td>
    </tr>

            <tr>
            <td>KG</td>
            <td><?= $inventory_kg->inventory?></td>
            <td><?= $sasaran_bulan_kg->sasaran_bulan?></td>
            <td><?= $total_bm_kg?></td>
            <td><?= $total_bm_7per7_kg?></td>
            <td><?= ($total_bm_kg / $sasaran_bulan_kg->sasaran_bulan) * 100 . '%'?></td>
            <td><?= ($total_bm_kg / $inventory_kg->inventory) * 100 . '%'?></td>
            <td><?= ($total_bm_7per7_kg / $sasaran_bulan_kg->sasaran_bulan) * 100 . '%'?></td>
            <td><?= ($total_bm_7per7_kg / $inventory_kg->inventory) * 100 . '%'?></td>
            </tr>
          

        <tr>
            <td>BT</td>
            <td><?= $inventory_bt->inventory?></td>
            <td><?= $sasaran_bulan_bt->sasaran_bulan?></td>
            <td><?= $total_bm_bt?></td>
            <td><?= $total_bm_7per7_bt?></td>
            <td><?= ($total_bm_bt / $sasaran_bulan_bt->sasaran_bulan) * 100 . '%'?></td>
            <td><?= ($total_bm_bt / $inventory_bt->inventory) * 100 . '%'?></td>
            <td><?= ($total_bm_7per7_bt / $sasaran_bulan_bt->sasaran_bulan) * 100 . '%'?></td>
            <td><?= ($total_bm_7per7_bt / $inventory_bt->inventory) * 100 . '%'?></td>
        </tr>
    
    
</table>

<table>
    <thead>
  
            <th>PYBDT</th>
            <th>Inventory</th>
            <th>Sasaran Bulan <?= $target_month?></th>
            <th>BM</th>
            <th>Bil. Premis 7/7</th>
            <th>BM % (Sasaran Bulan)</th>
            <th>BM % (Inventory)</th>
            <th>Bil. Premis 7/7 %(Sasaran Bulan)</th>
            <th>Bil. Premis 7/7 %(Inventory)</th>
        
    </thead>
    <?php foreach($list_of_sic as $sic): ?>   
    <tr>      
        <td><?= $sic->SIC . ' : ' .$sic->KETERANGAN_SIC?></td>
        
        <?php 
        
         //$quarterly_kpi = ${"quarterly_kpi_$sic->SIC"};
         $inventory_sic = ${"inventory_$sic->SIC"};
         $sasaran_bulan_sic = ${"sasaran_bulan_$sic->SIC"};
         $total_bm = ${"total_bm_".$sic->SIC};
         $total_bm_7per7 = ${"total_bm_7per7_".$sic->SIC};
         ?>
            <td><?= $inventory_sic->inventory?></td>
            <td><?= $sasaran_bulan_sic->sasaran_bulan?></td>
            <td><?= $total_bm?></td>
            <td><?= $total_bm_7per7?></td>
            <td><?= ($sasaran_bulan_sic->sasaran_bulan == 0)? 0 .'%' : round(($total_bm / $sasaran_bulan_sic->sasaran_bulan) * 100, 2) . '%'?></td>
            <td><?= ($inventory_sic->inventory == 0)? 0 .'%' : round(($total_bm / $inventory_sic->inventory) * 100, 2) . '%'?></td>
            <td><?= ($sasaran_bulan_sic->sasaran_bulan == 0)? 0 .'%' : round(($total_bm_7per7 / $sasaran_bulan_sic->sasaran_bulan) * 100, 2) . '%'?></td>
            <td><?= ($inventory_sic->inventory == 0)? 0 .'%': round(($total_bm_7per7 / $inventory_sic->inventory) * 100, 2) . '%'?></td>
    </tr>
    <?php    endforeach; ?>
</table>
