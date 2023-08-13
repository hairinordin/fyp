<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=monthly_rpt_tools.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>
    thead {
    font-size: 75%;
}
    </style>
<h3>Laporan Pencapaian EMT mengikut tools bagi <strong><?= $target_month . ' ' . $target_year ?></strong></h3> 

<table class='table table-bordered table-striped table-responsive'>
    <thead>
            <tr>
              <td rowspan="3">PYDT</td>
              <td rowspan="3">Inventory</td>
              <td rowspan="3">Sasaran</td>
              <td colspan="6">EP</td>
              <td colspan="6">EB</td>
              <td colspan="6">EMC</td>
              <td colspan="6">EF</td>
              <td colspan="6">EC</td>
              <td colspan="6">ERC</td>
              <td colspan="6">ET</td>
            </tr>
            <tr>
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
              
               <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
             
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
              
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
              
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
              
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
              
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
            </tr>
            <tr>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
            </tr>
    </thead>
    <tr>
            <td>KKS</td>
            <td><?= $inventory_kks?></td>
            <td><?= isset($sasaran_bulan_kks->sasaran_bulan)? $sasaran_bulan_kks->sasaran_bulan : ''?></td>
            <td><?=$total_tool1_implementation_true_kks?></td> 
            <td><?=$total_tool1_implementation_false_kks?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan)){echo round(($total_tool1_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan)){echo round(($total_tool1_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool1_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool1_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool2_implementation_true_kks?></td> <td><?=$total_tool2_implementation_false_kks?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool2_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool2_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool2_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool2_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool3_implementation_true_kks?></td> <td><?=$total_tool3_implementation_false_kks?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool3_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool3_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool3_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool3_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool4_implementation_true_kks?></td> <td><?=$total_tool4_implementation_false_kks?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool4_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool4_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool4_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool4_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool5_implementation_true_kks?></td> <td><?=$total_tool5_implementation_false_kks?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool5_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool5_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool5_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool5_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool6_implementation_true_kks?></td> <td><?=$total_tool6_implementation_false_kks?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool6_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool6_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool6_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool6_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool7_implementation_true_kks?></td> <td><?=$total_tool7_implementation_false_kks?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool7_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool7_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool7_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kks){echo round(($total_tool7_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            
            
    </tr>

            <tr>
            <td>KG</td>
            <td><?= $inventory_kg?></td>
            <td><?= isset($sasaran_bulan_kg->sasaran_bulan)? $sasaran_bulan_kg->sasaran_bulan : ''?></td>
            <td><?=$total_tool1_implementation_true_kg?></td> <td><?=$total_tool1_implementation_false_kg?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool1_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool1_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool1_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool1_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool2_implementation_true_kg?></td> <td><?=$total_tool2_implementation_false_kg?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool2_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool2_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool2_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool2_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool3_implementation_true_kg?></td> <td><?=$total_tool3_implementation_false_kg?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool3_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool3_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool3_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool3_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool4_implementation_true_kg?></td> <td><?=$total_tool4_implementation_false_kg?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool4_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool4_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool4_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool4_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool5_implementation_true_kg?></td> <td><?=$total_tool5_implementation_false_kg?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool5_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool5_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool5_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool5_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool6_implementation_true_kg?></td> <td><?=$total_tool6_implementation_false_kg?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool6_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool6_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool6_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool6_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool7_implementation_true_kg?></td> <td><?=$total_tool7_implementation_false_kg?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool7_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool7_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool7_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> <td><?php if($inventory_kg){echo round(($total_tool7_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            
            </tr>
          

        <tr>
            <td>BT</td>
            
          <td><?= $inventory_bt?></td>
            <td><?= isset($sasaran_bulan_bt->sasaran_bulan)? $sasaran_bulan_bt->sasaran_bulan : ''?></td>
            <td><?=$total_tool1_implementation_true_bt?></td> <td><?=$total_tool1_implementation_false_bt?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool1_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool1_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool1_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool1_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool2_implementation_true_bt?></td> <td><?=$total_tool2_implementation_false_bt?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool2_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool2_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool2_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool2_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool3_implementation_true_bt?></td> <td><?=$total_tool3_implementation_false_bt?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool3_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool3_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool3_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool3_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool4_implementation_true_bt?></td> <td><?=$total_tool4_implementation_false_bt?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool4_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool4_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool4_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool4_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool5_implementation_true_bt?></td> <td><?=$total_tool5_implementation_false_bt?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool5_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool5_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool5_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool5_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool6_implementation_true_bt?></td> <td><?=$total_tool6_implementation_false_bt?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool6_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool6_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool6_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool6_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool7_implementation_true_bt?></td> <td><?=$total_tool7_implementation_false_bt?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool7_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool7_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool7_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> <td><?php if($inventory_bt){echo round(($total_tool7_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            

        </tr>
    
    
</table>

<table class='table table-bordered table-striped'>
  <thead>
            <tr>
              <td rowspan="3">PYBDT</td>
              <td rowspan="3">Inventory</td>
              <td rowspan="3">Sasaran</td>
              <td colspan="6">EP</td>
              <td colspan="6">EB</td>
              <td colspan="6">EMC</td>
              <td colspan="6">EF</td>
              <td colspan="6">EC</td>
              <td colspan="6">ERC</td>
              <td colspan="6">ET</td>
            </tr>
            <tr>
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
              
               <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
             
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
              
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
              
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
              
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
              
              <td colspan="2">Bilangan Premis</td>
              <td colspan="2">% Perbandingan dengan Sasaran</td>
              <td colspan="2">% Perbandingan Dengan Inventory</td>
            </tr>
            <tr>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              <td>Ada</td>
              <td>Tiada</td>
              
            </tr>
    </thead>
    <?php unset($list_of_sic[39], $list_of_sic[40], $list_of_sic[41]); //remove SIC 40, 41, 42 key ?>
    <?php foreach($list_of_sic as $sic): ?>   
    <tr>      
        <td><?= $sic->SIC . ' : ' .$sic->KETERANGAN_SIC?></td>
        
        <?php 
        
         $inventory_sic = ${"inventory_$sic->SIC"};
         $sasaran_bulan_sic = ${"sasaran_bulan_$sic->SIC"};
         $total_bm = ${"total_bm_".$sic->SIC};
         $total_bm_7per7 = ${"total_bm_7per7_".$sic->SIC};
         
         $total_tool1_implementation_true = ${"total_tool1_implementation_true_$sic->SIC"};
         $total_tool2_implementation_true = ${"total_tool2_implementation_true_$sic->SIC"};
         $total_tool3_implementation_true = ${"total_tool3_implementation_true_$sic->SIC"};
         $total_tool4_implementation_true = ${"total_tool4_implementation_true_$sic->SIC"};
         $total_tool5_implementation_true = ${"total_tool5_implementation_true_$sic->SIC"};
         $total_tool6_implementation_true = ${"total_tool6_implementation_true_$sic->SIC"};
         $total_tool7_implementation_true = ${"total_tool7_implementation_true_$sic->SIC"};
         
         $total_tool1_implementation_false = ${"total_tool1_implementation_false_$sic->SIC"};
         $total_tool2_implementation_false = ${"total_tool2_implementation_false_$sic->SIC"};
         $total_tool3_implementation_false = ${"total_tool3_implementation_false_$sic->SIC"};
         $total_tool4_implementation_false = ${"total_tool4_implementation_false_$sic->SIC"};
         $total_tool5_implementation_false = ${"total_tool5_implementation_false_$sic->SIC"};
         $total_tool6_implementation_false = ${"total_tool6_implementation_false_$sic->SIC"};
         $total_tool7_implementation_false = ${"total_tool7_implementation_false_$sic->SIC"};
         
         ?>
            <td><?= $inventory_sic?></td>
            <td><?= isset($sasaran_bulan_sic->sasaran_bulan)? $sasaran_bulan_sic->sasaran_bulan : ''?></td>
            <td><?=$total_tool1_implementation_true ?></td> <td><?=$total_tool1_implementation_false ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool1_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool1_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool1_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool1_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool2_implementation_true ?></td> <td><?=$total_tool2_implementation_false ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool2_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool2_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool2_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool2_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool3_implementation_true ?></td> <td><?=$total_tool3_implementation_false ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool3_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool3_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool3_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool3_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool4_implementation_true ?></td> <td><?=$total_tool4_implementation_false ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool4_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool4_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool4_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool4_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool5_implementation_true ?></td> <td><?=$total_tool5_implementation_false ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool5_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool5_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool5_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool5_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool6_implementation_true ?></td> <td><?=$total_tool6_implementation_false ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool6_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool6_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool6_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool6_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            <td><?=$total_tool7_implementation_true ?></td> <td><?=$total_tool7_implementation_false ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool7_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool7_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool7_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> <td><?php if($inventory_sic){echo round(($total_tool7_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
    </tr>
    <?php    endforeach; ?>
</table>
