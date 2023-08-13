<style>
    thead {
    font-size: 75%;
}
    </style>
<?php
$flashdata = $this->session->flashdata('item');
if(isset($flashdata)) {
  $message = $this->session->flashdata('item');
  ?>
<td class="alert alert-<?php echo $message['class']?>">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo $message['class']?>!</strong> <?php echo $message['message']; ?>
</td>

<?php 
}
?>
<h3>Laporan Pencapaian EMT mengikut tools bagi <strong><?= $target_month . ' ' . $target_year ?></strong></h3> 
<a class="btn btn-info" href="<?= base_url('kpi/view_monthly_xls/'.$target_monthcode.'/'.$target_year.'/'.$target_state.'/tools')?>" >Excel</a>
<div class="table-responsive">
<table class='table table-bordered table-striped'>
    <thead>
            <tr class="bg-info">
              <td rowspan="3">PYDT</td>
              <td rowspan="3">Inventory</td>
              <td rowspan="3">Sasaran</td>
              <td colspan="6" style="text-align:center">EP</td>
              <td colspan="6" style="text-align:center">EB</td>
              <td colspan="6" style="text-align:center">EMC</td>
              <td colspan="6" style="text-align:center">EF</td>
              <td colspan="6" style="text-align:center">EC</td>
              <td colspan="6" style="text-align:center">ERC</td>
              <td colspan="6" style="text-align:center">ET</td>
            </tr>
            <tr class="bg-info">
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
            <tr class="bg-info">
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
            <td>Kilang Kelapa Sawit</td>
            <td data-container="body" data-toggle="tooltip" title="Inventory for KKS"><?= $inventory_kks?></td>
            <td data-container="body" data-toggle="tooltip" title="Sasaran KKS"><?= isset($sasaran_bulan_kks->sasaran_bulan)? $sasaran_bulan_kks->sasaran_bulan : ''?></td>
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EP &#8680; Bil.Premis &#8680; Ada"><?=$total_tool1_implementation_true_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EP &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool1_implementation_false_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EP &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool1_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EP &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool1_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EP &#8680; % Inventori &#8680; Ada"><?php if($inventory_kks){echo round(($total_tool1_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EP &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kks){echo round(($total_tool1_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EB &#8680; Bil.Premis &#8680; Ada"><?=$total_tool2_implementation_true_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EB &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool2_implementation_false_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EB &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool2_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EB &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool2_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EB &#8680; % Inventori &#8680; Ada"><?php if($inventory_kks){echo round(($total_tool2_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EB &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kks){echo round(($total_tool2_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EMC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool3_implementation_true_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EMC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool3_implementation_false_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EMC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool3_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EMC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool3_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EMC &#8680; % Inventori &#8680; Ada"><?php if($inventory_kks){echo round(($total_tool3_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EMC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kks){echo round(($total_tool3_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EF &#8680; Bil.Premis &#8680; Ada"><?=$total_tool4_implementation_true_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EF &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool4_implementation_false_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EF &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool4_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EF &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool4_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EF &#8680; % Inventori &#8680; Ada"><?php if($inventory_kks){echo round(($total_tool4_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EF &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kks){echo round(($total_tool4_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool5_implementation_true_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool5_implementation_false_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool5_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool5_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EC &#8680; % Inventori &#8680; Ada"><?php if($inventory_kks){echo round(($total_tool5_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : EC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kks){echo round(($total_tool5_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ERC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool6_implementation_true_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ERC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool6_implementation_false_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ERC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool6_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ERC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool6_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ERC &#8680; % Inventori &#8680; Ada"><?php if($inventory_kks){echo round(($total_tool6_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ERC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kks){echo round(($total_tool6_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ET &#8680; Bil.Premis &#8680; Ada"><?=$total_tool7_implementation_true_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ET &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool7_implementation_false_kks?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ET &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool7_implementation_true_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ET &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kks->sasaran_bulan) && $sasaran_bulan_kks->sasaran_bulan > 0){echo round(($total_tool7_implementation_false_kks * 100)/$sasaran_bulan_kks->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ET &#8680; % Inventori &#8680; Ada"><?php if($inventory_kks){echo round(($total_tool7_implementation_true_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KKS<br>y : ET &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kks){echo round(($total_tool7_implementation_false_kks * 100)/$inventory_kks, 2);} else { echo'0';} ?></td>
            
            
    </tr>

            <tr>
            <td>Kilang Getah</td>
            <td data-container="body" data-toggle="tooltip" title="Inventory for KG"><?= $inventory_kg?></td>
            <td data-container="body" data-toggle="tooltip" title="Sasaran KG"><?= isset($sasaran_bulan_kg->sasaran_bulan)? $sasaran_bulan_kg->sasaran_bulan : ''?></td>
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EP &#8680; Bil.Premis &#8680; Ada"><?=$total_tool1_implementation_true_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EP &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool1_implementation_false_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EP &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool1_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EP &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool1_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EP &#8680; % Inventori &#8680; Ada"><?php if($inventory_kg){echo round(($total_tool1_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EP &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kg){echo round(($total_tool1_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EB &#8680; Bil.Premis &#8680; Ada"><?=$total_tool2_implementation_true_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EB &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool2_implementation_false_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EB &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool2_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EB &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool2_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EB &#8680; % Inventori &#8680; Ada"><?php if($inventory_kg){echo round(($total_tool2_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EB &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kg){echo round(($total_tool2_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EMC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool3_implementation_true_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EMC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool3_implementation_false_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EMC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool3_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EMC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool3_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EMC &#8680; % Inventori &#8680; Ada"><?php if($inventory_kg){echo round(($total_tool3_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EMC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kg){echo round(($total_tool3_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EF &#8680; Bil.Premis &#8680; Ada"><?=$total_tool4_implementation_true_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EF &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool4_implementation_false_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EF &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool4_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EF &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool4_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EF &#8680; % Inventori &#8680; Ada"><?php if($inventory_kg){echo round(($total_tool4_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EF &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kg){echo round(($total_tool4_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool5_implementation_true_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool5_implementation_false_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool5_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool5_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EC &#8680; % Inventori &#8680; Ada"><?php if($inventory_kg){echo round(($total_tool5_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : EC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kg){echo round(($total_tool5_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ERC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool6_implementation_true_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ERC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool6_implementation_false_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ERC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool6_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ERC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool6_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ERC &#8680; % Inventori &#8680; Ada"><?php if($inventory_kg){echo round(($total_tool6_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ERC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kg){echo round(($total_tool6_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ET &#8680; Bil.Premis &#8680; Ada"><?=$total_tool7_implementation_true_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ET &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool7_implementation_false_kg?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ET &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool7_implementation_true_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ET &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_kg->sasaran_bulan) && $sasaran_bulan_kg->sasaran_bulan > 0){echo round(($total_tool7_implementation_false_kg * 100)/$sasaran_bulan_kg->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ET &#8680; % Inventori &#8680; Ada"><?php if($inventory_kg){echo round(($total_tool7_implementation_true_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : KG<br>y : ET &#8680; % Inventori &#8680; Tiada"><?php if($inventory_kg){echo round(($total_tool7_implementation_false_kg * 100)/$inventory_kg, 2);} else { echo'0';} ?></td>
            
            </tr>
          

        <tr>
            <td>Buangan Terjadual</td>
            
            <td data-container="body" data-toggle="tooltip" title="Inventory for BT"><?= $inventory_bt?></td>
            <td data-container="body" data-toggle="tooltip" title="Sasaran BT"><?= isset($sasaran_bulan_bt->sasaran_bulan)? $sasaran_bulan_bt->sasaran_bulan : ''?></td>
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EP &#8680; Bil.Premis &#8680; Ada"><?=$total_tool1_implementation_true_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EP &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool1_implementation_false_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EP &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool1_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EP &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool1_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EP &#8680; % Inventori &#8680; Ada"><?php if($inventory_bt){echo round(($total_tool1_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EP &#8680; % Inventori &#8680; Tiada"><?php if($inventory_bt){echo round(($total_tool1_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EB &#8680; Bil.Premis &#8680; Ada"><?=$total_tool2_implementation_true_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EB &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool2_implementation_false_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EB &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool2_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EB &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool2_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EB &#8680; % Inventori &#8680; Ada"><?php if($inventory_bt){echo round(($total_tool2_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EB &#8680; % Inventori &#8680; Tiada"><?php if($inventory_bt){echo round(($total_tool2_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EMC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool3_implementation_true_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EMC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool3_implementation_false_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EMC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool3_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EMC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool3_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EMC &#8680; % Inventori &#8680; Ada"><?php if($inventory_bt){echo round(($total_tool3_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EMC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_bt){echo round(($total_tool3_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EF &#8680; Bil.Premis &#8680; Ada"><?=$total_tool4_implementation_true_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EF &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool4_implementation_false_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EF &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool4_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EF &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool4_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EF &#8680; % Inventori &#8680; Ada"><?php if($inventory_bt){echo round(($total_tool4_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EF &#8680; % Inventori &#8680; Tiada"><?php if($inventory_bt){echo round(($total_tool4_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool5_implementation_true_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool5_implementation_false_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool5_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool5_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EC &#8680; % Inventori &#8680; Ada"><?php if($inventory_bt){echo round(($total_tool5_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : EC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_bt){echo round(($total_tool5_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ERC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool6_implementation_true_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ERC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool6_implementation_false_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ERC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool6_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ERC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool6_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ERC &#8680; % Inventori &#8680; Ada"><?php if($inventory_bt){echo round(($total_tool6_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ERC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_bt){echo round(($total_tool6_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ET &#8680; Bil.Premis &#8680; Ada"><?=$total_tool7_implementation_true_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ET &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool7_implementation_false_bt?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ET &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool7_implementation_true_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ET &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_bt->sasaran_bulan) && $sasaran_bulan_bt->sasaran_bulan > 0){echo round(($total_tool7_implementation_false_bt * 100)/$sasaran_bulan_bt->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ET &#8680; % Inventori &#8680; Ada"><?php if($inventory_bt){echo round(($total_tool7_implementation_true_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x : BT<br>y : ET &#8680; % Inventori &#8680; Tiada"><?php if($inventory_bt){echo round(($total_tool7_implementation_false_bt * 100)/$inventory_bt, 2);} else { echo'0';} ?></td>
            

        </tr>
    
    
</table>
</div>

<div class="table-responsive">
<table class='table table-bordered table-striped'>
  <thead>
            <tr class="bg-info">
              <td rowspan="3">PYBDT</td>
              <td rowspan="3">Inventory</td>
              <td rowspan="3">Sasaran</td>
              <td colspan="6" style="text-align:center">EP</td>
              <td colspan="6" style="text-align:center">EB</td>
              <td colspan="6" style="text-align:center">EMC</td>
              <td colspan="6" style="text-align:center">EF</td>
              <td colspan="6" style="text-align:center">EC</td>
              <td colspan="6" style="text-align:center">ERC</td>
              <td colspan="6" style="text-align:center">ET</td>
            </tr>
            <tr class="bg-info">
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
            <tr class="bg-info">
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
        <td><?=$sic->KETERANGAN_SIC?></td>
        
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
            <td data-container="body" data-toggle="tooltip" title="Inventory for <?= $sic->KETERANGAN_SIC?>" ><?= $inventory_sic?></td>
            <td data-container="body" data-toggle="tooltip" title="Sasaran for <?= $sic->KETERANGAN_SIC?>"><?= isset($sasaran_bulan_sic->sasaran_bulan)? $sasaran_bulan_sic->sasaran_bulan : ''?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EP &#8680; Bil.Premis &#8680; Ada"><?=$total_tool1_implementation_true ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EP &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool1_implementation_false ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EP &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool1_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EP &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool1_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EP &#8680; % Inventori &#8680; Ada"><?php if($inventory_sic){echo round(($total_tool1_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EP &#8680; % Inventori &#8680; Tiada"><?php if($inventory_sic){echo round(($total_tool1_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EB &#8680; Bil.Premis &#8680; Ada"><?=$total_tool2_implementation_true ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EB &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool2_implementation_false ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EB &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool2_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EB &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool2_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EB &#8680; % Inventori &#8680; Ada"><?php if($inventory_sic){echo round(($total_tool2_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EB &#8680; % Inventori &#8680; Tiada"><?php if($inventory_sic){echo round(($total_tool2_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EMC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool3_implementation_true ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EMC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool3_implementation_false ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EMC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool3_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EMC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool3_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EMC &#8680; % Inventori &#8680; Ada"><?php if($inventory_sic){echo round(($total_tool3_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EMC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_sic){echo round(($total_tool3_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EF &#8680; Bil.Premis &#8680; Ada"><?=$total_tool4_implementation_true ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EF &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool4_implementation_false ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EF &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool4_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EF &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool4_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td>
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EF &#8680; % Inventori &#8680; Ada"><?php if($inventory_sic){echo round(($total_tool4_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EF &#8680; % Inventori &#8680; Tiada"><?php if($inventory_sic){echo round(($total_tool4_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool5_implementation_true ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool5_implementation_false ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool5_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool5_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EC &#8680; % Inventori &#8680; Ada"><?php if($inventory_sic){echo round(($total_tool5_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:EC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_sic){echo round(($total_tool5_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ERC &#8680; Bil.Premis &#8680; Ada"><?=$total_tool6_implementation_true ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ERC &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool6_implementation_false ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ERC &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool6_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ERC &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool6_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ERC &#8680; % Inventori &#8680; Ada"><?php if($inventory_sic){echo round(($total_tool6_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ERC &#8680; % Inventori &#8680; Tiada"><?php if($inventory_sic){echo round(($total_tool6_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
            
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ET &#8680; Bil.Premis &#8680; Ada"><?=$total_tool7_implementation_true ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ET &#8680; Bil.Premis &#8680; Tiada"><?=$total_tool7_implementation_false ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ET &#8680; % Sasaran &#8680; Ada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool7_implementation_true * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ET &#8680; % Sasaran &#8680; Tiada"><?php if(isset($sasaran_bulan_sic->sasaran_bulan) && $sasaran_bulan_sic->sasaran_bulan > 0){echo round(($total_tool7_implementation_false * 100)/$sasaran_bulan_sic->sasaran_bulan, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ET &#8680; % Inventori &#8680; Ada"><?php if($inventory_sic){echo round(($total_tool7_implementation_true * 100)/$inventory_sic, 2);} else { echo'0';} ?></td> 
            <td data-html="true" data-container="body" data-toggle="tooltip" title="x:<?= $sic->KETERANGAN_SIC?><br>y:ET &#8680; % Inventori &#8680; Tiada"><?php if($inventory_sic){echo round(($total_tool7_implementation_false * 100)/$inventory_sic, 2);} else { echo'0';} ?></td>
    </tr>
    <?php    endforeach; ?>
</table>
</div>