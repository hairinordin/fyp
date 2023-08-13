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
<h3>Laporan Pencapaian EMT bagi Bulan <strong><?= $target_month . ' ' . $target_year ?></strong></h3>
    
<a class="btn btn-info" href="<?= base_url('kpi/view_monthly_xls/'.$target_monthcode.'/'.$target_year.'/'.$target_state.'/bm')?>" >Excel</a>
<table class="table-bordered table-striped">
    <thead>
        <tr>
            <td>PYDT</td>
            <td>Inventory</td>
            <td>Sasaran Bulan <?= $target_month?></td>
            <td>BM (Bulan Semasa)</td>
            <td>Bil. Premis 7/7 (Bulan Semasa)</td>
            <td>BM % (Compare dengan sasaran bulan semasa)</td>
            <td>BM % (Compare dengan Inventory)</td>
            <td>Bil. Premis 7/7 %(Compare dengan sasaran bulan semasa)</td>
            <td>Bil. Premis 7/7 %(Compare dengan Inventory)</td>
        </tr>
    </thead>
      <?php
      
//      echo '<pre>';
//      print_r($sasaran_bulan_kks);
//      echo '</pre>';
      ?>
    <tr>
            <td>KKS</td>
            <td><input type='text' size="4" value="<?= $inventory_kks?>" disabled></td>
            <td><input type='text' size="4" value="<?= $sasaran_bulan_kks->sasaran_bulan?>" disabled></td>
            <td><input type='text' size="4" value="<?= $total_bm_kks?>" disabled></td>
            <td><input type='text' size="4" value="<?= $total_bm_7per7_kks?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_kks / $sasaran_bulan_kks->sasaran_bulan) * 100 ?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_kks / $inventory_kks->inventory) * 100 ?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_7per7_kks / $sasaran_bulan_kks->sasaran_bulan) * 100 ?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_7per7_kks / $inventory_kks->inventory) * 100 ?>" disabled></td>
    </tr>

            <tr>
            <td>KG</td>
            <td><input type='text' size="4" value="<?= $inventory_kg?>" disabled></td>
            <td><input type='text' size="4" value="<?= $sasaran_bulan_kg->sasaran_bulan?>" disabled></td>
            <td><input type='text' size="4" value="<?= $total_bm_kg?>" disabled></td>
            <td><input type='text' size="4" value="<?= $total_bm_7per7_kg?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_kg / $sasaran_bulan_kg->sasaran_bulan) * 100 ?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_kg / $inventory_kg->inventory) * 100 ?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_7per7_kg / $sasaran_bulan_kg->sasaran_bulan) * 100 ?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_7per7_kg / $inventory_kg->inventory) * 100 ?>" disabled></td>
            </tr>
          

        <tr>
            <td>BT</td>
            
          <td><input type='text' size="4" value="<?= $inventory_bt?>" disabled></td>
            <td><input type='text' size="4" value="<?= $sasaran_bulan_bt->sasaran_bulan?>" disabled></td>
            <td><input type='text' size="4" value="<?= $total_bm_bt?>" disabled></td>
            <td><input type='text' size="4" value="<?= $total_bm_7per7_bt?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_bt / $sasaran_bulan_bt->sasaran_bulan) * 100 ?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_bt / $inventory_bt->inventory) * 100 ?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_7per7_bt / $sasaran_bulan_bt->sasaran_bulan) * 100 ?>" disabled></td>
            <td><input type='text' size="4" value="<?= ($total_bm_7per7_bt / $inventory_bt->inventory) * 100 ?>" disabled></td>

        </tr>
    
    
</table>

<div class='table table-bordered table-striped'>
    <div class="thead">
         <div class="tr">
            <div class="td">PYBDT</div>
            <div class="td">Inventory</div>
            <div class="td">Sasaran <?= $target_month?></div>
            <div class="td">BM (Bulan Semasa)</div>
            <div class="td">Bil. Premis 7/7 (Bulan Semasa)</div>
            <div class="td">BM % (Compare dengan sasaran bulan semasa)</div>
            <div class="td">BM % (Compare dengan Inventory)</div>
            <div class="td">Bil. Premis 7/7 (Compare dengan sasaran bulan semasa)</div>
            <div class="td">Bil. Premis 7/7 (Compare dengan Inventory)</div>
        </div>
    </div>
    <?php foreach($list_of_sic as $sic): ?>   
    <div class="tr">      
        <div class="td"><?= $sic->SIC . ' : ' .$sic->KETERANGAN_SIC?></div>
        
        <?php 
        
         //$quarterly_kpi = ${"quarterly_kpi_$sic->SIC"};
         $inventory_sic = ${"inventory_$sic->SIC"};
         $sasaran_bulan_sic = ${"sasaran_bulan_$sic->SIC"};
         $total_bm = ${"total_bm_".$sic->SIC};
         $total_bm_7per7 = ${"total_bm_7per7_".$sic->SIC};
         ?>
            <div class="td"><input type='text' name='inventory_<?= $sic->SIC?>' size="4" value="<?= $inventory_sic?>" disabled></div>
            <div class="td"><input type='text' name='jum_<?= $sic->SIC?>' size="4" value="<?= $sasaran_bulan_sic->sasaran_bulan?>" disabled></div>
             <div class="td"><input type='text' size="4" value="<?= $total_bm?>" disabled></div>
            <div class="td"><input type='text' size="4" value="<?= $total_bm_7per7?>" disabled></div>
            <div class="td"><input type='text' size="4" value="<?= ($sasaran_bulan_sic->sasaran_bulan == 0)? 0  : round(($total_bm / $sasaran_bulan_sic->sasaran_bulan) * 100, 2) ?>" disabled></div>
            <div class="td"><input type='text' size="4" value="<?= ($inventory_sic->inventory == 0)? 0 : round(($total_bm / $inventory_sic->inventory) * 100, 2) ?>" disabled></div>
            <div class="td"><input type='text' size="4" value="<?= ($sasaran_bulan_sic->sasaran_bulan == 0)? 0  : round(($total_bm_7per7 / $sasaran_bulan_sic->sasaran_bulan) * 100, 2) ?>" disabled></div>
            <div class="td"><input type='text' size="4" value="<?= ($inventory_sic->inventory == 0)? 0 : round(($total_bm_7per7 / $inventory_sic->inventory) * 100, 2) ?>" disabled></div>
    </div>
    <?php    endforeach; ?>
</div>
