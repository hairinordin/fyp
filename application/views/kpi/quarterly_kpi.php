<style>
    input[type=number]{
    width: 50px;
    
} 
</style>

<h4>Quarterly KPI - Desktop & Field Inspection <small>Negeri <?= $negeri ?></small></h4>

<div class="alert alert-warning">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> Sila lengkapkan sasaran tahunan sebelum 31 Januari tahun semasa.
</div>

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

<div class="row-fluid">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" id="myTab">
            <li><a class="tab-quarter" data-toggle="tab" href="#q1">Quarter 1</a></li>
            <li><a class="tab-quarter" data-toggle="tab" href="#q2">Quarter 2</a></li>
            <li><a class="tab-quarter" data-toggle="tab" href="#q3">Quarter 3</a></li>
            <li><a class="tab-quarter" data-toggle="tab" href="#q4">Quarter 4</a></li>
        </ul>
    </div>
</div> 

<div class="tab-content">
 
<!--TAB QUARTER 1-->
<div id="q1" class="tab-pane fade">
<!-- BEGIN QUARTER 1 -->
<div class='table table-bordered table-striped'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jum. Premis yang akan diperiksa 2018 (SP + SPD)</div>
            <div class="td">Q1</div>
            <div class="td">Jumlah sasaran diperiksa melalui dekstop(SPD)</div>
            <div class="td">Jumlah sasaran diperiksa melalui lawatan (SP)</div>
            <div class="td">Jumlah pemeriksaan desktop (SD)</div>
            <div class="td">Jumlah lawatan disasarkan (SL)</div>
            <div class="td">Action</div>
        </div>
    </div>
    
    <!-- BEGIN QUARTER 1 - KKS -->
        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'kks');?>
            <?= form_hidden('quarter', '1'); ?>
            <div class="td">KKS</div>
             <?php if($q1_kpi_kks){?>
            <div class="td"><?= $inventory_kks?></div>
            <div class="td"><?= $q1_kpi_kks->spd + $q1_kpi_kks->sp?></div>
            <div class="td"><?= $sasaran_q1_kks?></div>
            <div class="td"><?= $q1_kpi_kks->spd?></div>
            <div class="td"><?= $q1_kpi_kks->sp?></div>
            <div class="td"><?= $q1_kpi_kks->sd?></div>
            <div class="td"><?= $q1_kpi_kks->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_kks) ? $inventory_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q1_kks) ? $sasaran_q1_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sp_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sd_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sl_kks' size="4"  required></div>
             <?php } ?>
            
            <?php if($q1_kpi_kks){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/1/kks"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?>    
        </form>
    <!-- END QUARTER 1 - KKS -->
    <!-- BEGIN QUARTER 1 - KG -->
         <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'kg');?>
             <?= form_hidden('quarter', '1'); ?>
            <div class="td">KG</div>
            
            <?php if($q1_kpi_kg){?>
            <div class="td"><?= $inventory_kg?></div>
            <div class="td"><?= $q1_kpi_kg->spd + $q1_kpi_kg->sp?></div>
            <div class="td"><?= $sasaran_q1_kg?></div>
            <div class="td"><?= $q1_kpi_kg->spd?></div>
            <div class="td"><?= $q1_kpi_kg->sp?></div>
            <div class="td"><?= $q1_kpi_kg->sd?></div>
            <div class="td"><?= $q1_kpi_kg->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_kg) ? $inventory_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q1_kg) ? $sasaran_q1_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sp_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sd_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sl_kg' size="4"  required></div>

             <?php } ?>
            
            <?php if($q1_kpi_kg){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/1/kg"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
        </form> 
    <!-- END QUARTER 1 - KG -->
     <!-- BEGIN QUARTER 1 - BT -->
        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'bt');?>
            <?= form_hidden('quarter', '1'); ?>
            <div class="td">BT</div>
            
           <?php if($q1_kpi_bt){?>
            <div class="td"><?= $inventory_bt?></div>
            <div class="td"><?= $q1_kpi_bt->spd + $q1_kpi_bt->sp?></div>
            <div class="td"><?= $sasaran_q1_bt?></div>
            <div class="td"><?= $q1_kpi_bt->spd?></div>
            <div class="td"><?= $q1_kpi_bt->sp?></div>
            <div class="td"><?= $q1_kpi_bt->sd?></div>
            <div class="td"><?= $q1_kpi_bt->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_bt) ? $inventory_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
             <div class="td"><?= isset($sasaran_q1_bt) ? $sasaran_q1_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sp_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sd_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sl_bt' size="4"  required></div>

             <?php } ?>
            
            <?php if($q1_kpi_bt){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/1/bt"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
        </form> 
    <!-- END QUARTER 1 - BT -->
</div>

<!-- BEGIN QUARTER 1 - PYBDT -->    
<div class='table table-bordered table-striped'>
    <div class="thead">
         <div class="tr">
            <div class="td">PYBDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jum. Premis yang akan diperiksa 2018 (SP + SPD)</div>
            <div class="td">Q1</div>
            <div class="td">Jumlah sasaran diperiksa melalui dekstop(SPD)</div>
            <div class="td">Jumlah sasaran diperiksa melalui lawatan (SP)</div>
            <div class="td">Jumlah pemeriksaan desktop (SD)</div>
            <div class="td">Jumlah lawatan disasarkan (SL)</div>
            <div class="td">Action</div>
        </div>
    </div>
    <?php foreach($list_of_sic as $sic): ?>   
    <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">      
        <?= form_hidden('kat', $sic->SIC);?>
        <?= form_hidden('quarter', '1'); ?>
        <div class="td"><?= $sic->SIC . ' : ' .$sic->KETERANGAN_SIC?></div>
        
        <?php 
        
         $q1_kpi = ${"q1_kpi_$sic->SIC"};
         $inventory_sic = ${"inventory_$sic->SIC"};
         $sasaran_q1 = ${"sasaran_q1_$sic->SIC"};
         ?>
 
         <?php if($q1_kpi){?>
            <div class="td"><?= $inventory_sic?></div>
            <div class="td"><?= $q1_kpi->spd + $q1_kpi->sp?></div>
            <div class="td"><?= $sasaran_q1?></div>
            <div class="td"><?= $q1_kpi->spd?></div>
            <div class="td"><?= $q1_kpi->sp?></div>
            <div class="td"><?= $q1_kpi->sd?></div>
            <div class="td"><?= $q1_kpi->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_sic) ? $inventory_sic : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q1) ? $sasaran_q1 : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sp_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sd_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sl_<?= $sic->SIC?>' size="4"  required></div>

             <?php } ?>       
        
        <?php if($q1_kpi){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/1/<?= $sic->SIC?>"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
    </form>
    <?php    endforeach; ?>
</div>
<!-- END QUARTER 1 - PYBDT -->
 <!-- END QUARTER 1 -->
</div>
 <!--TAB QUARTER 2-->
<div id="q2" class="tab-pane fade">
 <!-- BEGIN QUARTER 2 -->
<div class='table table-bordered table-striped'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jum. Premis yang akan diperiksa 2018 (SP + SPD)</div>
            <div class="td">Q2</div>
            <div class="td">Jumlah sasaran diperiksa melalui dekstop(SPD)</div>
            <div class="td">Jumlah sasaran diperiksa melalui lawatan (SP)</div>
            <div class="td">Jumlah pemeriksaan desktop (SD)</div>
            <div class="td">Jumlah lawatan disasarkan (SL)</div>
            <div class="td">Action</div>
        </div>
    </div>
    
    <!-- BEGIN QUARTER 2 - KKS -->
        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'kks');?>
            <?= form_hidden('quarter', '2'); ?>
            <div class="td">KKS</div>
             <?php if($q2_kpi_kks){?>
            <div class="td"><?= $inventory_kks?></div>
            <div class="td"><?= $q2_kpi_kks->spd + $q2_kpi_kks->sp?></div>
            <div class="td"><?= $sasaran_q2_kks?></div>
            <div class="td"><?= $q2_kpi_kks->spd?></div>
            <div class="td"><?= $q2_kpi_kks->sp?></div>
            <div class="td"><?= $q2_kpi_kks->sd?></div>
            <div class="td"><?= $q2_kpi_kks->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_kks) ? $inventory_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q2_kks) ? $sasaran_q2_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sp_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sd_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sl_kks' size="4"  required></div>
             <?php } ?>
            
            <?php if($q2_kpi_kks){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/2/kks"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?>    
        </form>
    <!-- END QUARTER 2 - KKS -->
    <!-- BEGIN QUARTER 2 - KG -->
         <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'kg');?>
             <?= form_hidden('quarter', '2'); ?>
            <div class="td">KG</div>
            
            <?php if($q2_kpi_kg){?>
            <div class="td"><?= $inventory_kg?></div>
            <div class="td"><?= $q2_kpi_kg->spd + $q2_kpi_kg->sp?></div>
            <div class="td"><?= $sasaran_q2_kg?></div>
            <div class="td"><?= $q2_kpi_kg->spd?></div>
            <div class="td"><?= $q2_kpi_kg->sp?></div>
            <div class="td"><?= $q2_kpi_kg->sd?></div>
            <div class="td"><?= $q2_kpi_kg->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_kg) ? $inventory_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q2_kg) ? $sasaran_q2_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sp_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sd_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sl_kg' size="4"  required></div>

             <?php } ?>
            
            <?php if($q2_kpi_kg){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/2/kg"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
        </form> 
    <!-- END QUARTER 2 - KG -->
     <!-- BEGIN QUARTER 2 - BT -->
        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'bt');?>
            <?= form_hidden('quarter', '2'); ?>
            <div class="td">BT</div>
            
           <?php if($q2_kpi_bt){?>
            <div class="td"><?= $inventory_bt?></div>
            <div class="td"><?= $q2_kpi_bt->spd + $q2_kpi_bt->sp?></div>
            <div class="td"><?= $sasaran_q2_bt?></div>
            <div class="td"><?= $q2_kpi_bt->spd?></div>
            <div class="td"><?= $q2_kpi_bt->sp?></div>
            <div class="td"><?= $q2_kpi_bt->sd?></div>
            <div class="td"><?= $q2_kpi_bt->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_bt) ? $inventory_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q2_bt) ? $sasaran_q2_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sp_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sd_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sl_bt' size="4"  required></div>

             <?php } ?>
            
            <?php if($q2_kpi_bt){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/2/bt"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
        </form> 
    <!-- END QUARTER 2 - BT -->
</div>
 <!-- BEGIN QUARTER 2 - PYBDT -->    
<div class='table table-bordered table-striped'>
    <div class="thead">
         <div class="tr">
            <div class="td">PYBDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jum. Premis yang akan diperiksa 2018 (SP + SPD)</div>
            <div class="td">Q2</div>
            <div class="td">Jumlah sasaran diperiksa melalui dekstop(SPD)</div>
            <div class="td">Jumlah sasaran diperiksa melalui lawatan (SP)</div>
            <div class="td">Jumlah pemeriksaan desktop (SD)</div>
            <div class="td">Jumlah lawatan disasarkan (SL)</div>
            <div class="td">Action</div>
        </div>
    </div>
    <?php foreach($list_of_sic as $sic): ?>   
    <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">      
        <?= form_hidden('kat', $sic->SIC);?>
        <?= form_hidden('quarter', '2'); ?>
        <div class="td"><?= $sic->SIC . ' : ' .$sic->KETERANGAN_SIC?></div>
        
        <?php 
        
         $q2_kpi = ${"q2_kpi_$sic->SIC"};
         $inventory_sic = ${"inventory_$sic->SIC"};
         $sasaran_q2 = ${"sasaran_q2_$sic->SIC"};
         ?>
 
         <?php if($q2_kpi){?>
            <div class="td"><?= $inventory_sic?></div>
            <div class="td"><?= $q2_kpi->spd + $q2_kpi->sp?></div>
            <div class="td"><?= $sasaran_q2?></div>
            <div class="td"><?= $q2_kpi->spd?></div>
            <div class="td"><?= $q2_kpi->sp?></div>
            <div class="td"><?= $q2_kpi->sd?></div>
            <div class="td"><?= $q2_kpi->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_sic) ? $inventory_sic : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q2) ? $sasaran_q2 : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sp_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sd_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sl_<?= $sic->SIC?>' size="4"  required></div>

             <?php } ?>       
        
        <?php if($q2_kpi){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/2/<?= $sic->SIC?>"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
    </form>
    <?php    endforeach; ?>
</div>
<!-- END QUARTER 2 - PYBDT -->
 <!-- END QUARTER 2 -->
</div>

<!--TAB QUARTER 3-->
<div id="q3" class="tab-pane fade">
 <!-- BEGIN QUARTER 3 -->
<div class='table table-bordered table-striped'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jum. Premis yang akan diperiksa 2018 (SP + SPD)</div>
            <div class="td">Q3</div>
            <div class="td">Jumlah sasaran diperiksa melalui dekstop(SPD)</div>
            <div class="td">Jumlah sasaran diperiksa melalui lawatan (SP)</div>
            <div class="td">Jumlah pemeriksaan desktop (SD)</div>
            <div class="td">Jumlah lawatan disasarkan (SL)</div>
            <div class="td">Action</div>
        </div>
    </div>
    
    <!-- BEGIN QUARTER 3 - KKS -->
        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'kks');?>
            <?= form_hidden('quarter', '3'); ?>
            <div class="td">KKS</div>
             <?php if($q3_kpi_kks){?>
            <div class="td"><?= $inventory_kks?></div>
            <div class="td"><?= $q3_kpi_kks->spd + $q3_kpi_kks->sp?></div>
            <div class="td"><?= $sasaran_q3_kks?></div>
            <div class="td"><?= $q3_kpi_kks->spd?></div>
            <div class="td"><?= $q3_kpi_kks->sp?></div>
            <div class="td"><?= $q3_kpi_kks->sd?></div>
            <div class="td"><?= $q3_kpi_kks->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_kks) ? $inventory_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q3_kks) ? $sasaran_q3_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sp_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sd_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sl_kks' size="4"  required></div>
             <?php } ?>
            
            <?php if($q3_kpi_kks){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/3/kks"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?>    
        </form>
    <!-- END QUARTER 3 - KKS -->
    <!-- BEGIN QUARTER 3 - KG -->
         <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'kg');?>
             <?= form_hidden('quarter', '3'); ?>
            <div class="td">KG</div>
            
            <?php if($q3_kpi_kg){?>
            <div class="td"><?= $inventory_kg?></div>
            <div class="td"><?= $q3_kpi_kg->spd + $q3_kpi_kg->sp?></div>
            <div class="td"><?= $sasaran_q3_kg?></div>
            <div class="td"><?= $q3_kpi_kg->spd?></div>
            <div class="td"><?= $q3_kpi_kg->sp?></div>
            <div class="td"><?= $q3_kpi_kg->sd?></div>
            <div class="td"><?= $q3_kpi_kg->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_kg) ? $inventory_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q3_kg) ? $sasaran_q3_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sp_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sd_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sl_kg' size="4"  required></div>

             <?php } ?>
            
            <?php if($q3_kpi_kg){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/3/kg"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
        </form> 
    <!-- END QUARTER 3 - KG -->
     <!-- BEGIN QUARTER 3 - BT -->
        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'bt'); ?>
            <?= form_hidden('quarter', '3'); ?>
            <div class="td">BT</div>
            
           <?php if($q3_kpi_bt){?>
            <div class="td"><?= $inventory_bt?></div>
            <div class="td"><?= $q3_kpi_bt->spd + $q3_kpi_bt->sp?></div>
            <div class="td"><?= $sasaran_q3_bt?></div>
            <div class="td"><?= $q3_kpi_bt->spd?></div>
            <div class="td"><?= $q3_kpi_bt->sp?></div>
            <div class="td"><?= $q3_kpi_bt->sd?></div>
            <div class="td"><?= $q3_kpi_bt->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_bt) ? $inventory_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q3_bt) ? $sasaran_q3_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sp_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sd_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sl_bt' size="4"  required></div>

             <?php } ?>
            
            <?php if($q3_kpi_bt){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/3/bt"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
        </form> 
    <!-- END QUARTER 3 - BT -->
</div>
 <!-- BEGIN QUARTER 3 - PYBDT -->    
<div class='table table-bordered table-striped'>
    <div class="thead">
         <div class="tr">
            <div class="td">PYBDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jum. Premis yang akan diperiksa 2018 (SP + SPD)</div>
            <div class="td">Q3</div>
            <div class="td">Jumlah sasaran diperiksa melalui dekstop(SPD)</div>
            <div class="td">Jumlah sasaran diperiksa melalui lawatan (SP)</div>
            <div class="td">Jumlah pemeriksaan desktop (SD)</div>
            <div class="td">Jumlah lawatan disasarkan (SL)</div>
            <div class="td">Action</div>
        </div>
    </div>
    <?php foreach($list_of_sic as $sic): ?>   
    <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">      
        <?= form_hidden('kat', $sic->SIC);?>
        <?= form_hidden('quarter', '3'); ?>
        <div class="td"><?= $sic->SIC . ' : ' .$sic->KETERANGAN_SIC?></div>
        
        <?php 
        
         $q3_kpi = ${"q3_kpi_$sic->SIC"};
         $inventory_sic = ${"inventory_$sic->SIC"};
         $sasaran_q3 = ${"sasaran_q3_$sic->SIC"};
         ?>
 
         <?php if($q3_kpi){?>
            <div class="td"><?= $inventory_sic?></div>
            <div class="td"><?= $q3_kpi->spd + $q3_kpi->sp?></div>
            <div class="td"><?= $sasaran_q3?></div>
            <div class="td"><?= $q3_kpi->spd?></div>
            <div class="td"><?= $q3_kpi->sp?></div>
            <div class="td"><?= $q3_kpi->sd?></div>
            <div class="td"><?= $q3_kpi->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_sic) ? $inventory_sic : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q3) ? $sasaran_q3 : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sp_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sd_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sl_<?= $sic->SIC?>' size="4"  required></div>

             <?php } ?>       
        
        <?php if($q3_kpi){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/3/<?= $sic->SIC?>"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
    </form>
    <?php    endforeach; ?>
</div>
<!-- END QUARTER 3 - PYBDT -->
 <!-- END QUARTER 3 -->
</div>

<!--TAB QUARTER 4-->
<div id="q4" class="tab-pane fade">
 <!-- BEGIN QUARTER 4 -->
<div class='table table-bordered table-striped'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jum. Premis yang akan diperiksa 2018 (SP + SPD)</div>
            <div class="td">Q4</div>
            <div class="td">Jumlah sasaran diperiksa melalui dekstop(SPD)</div>
            <div class="td">Jumlah sasaran diperiksa melalui lawatan (SP)</div>
            <div class="td">Jumlah pemeriksaan desktop (SD)</div>
            <div class="td">Jumlah lawatan disasarkan (SL)</div>
            <div class="td">Action</div>
        </div>
    </div>
    
    <!-- BEGIN QUARTER 4 - KKS -->
        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'kks');?>
            <?= form_hidden('quarter', '4'); ?>
            <div class="td">KKS</div>
             <?php if($q4_kpi_kks){?>
            <div class="td"><?= $inventory_kks?></div>
            <div class="td"><?= $q4_kpi_kks->spd + $q4_kpi_kks->sp?></div>
            <div class="td"><?= $sasaran_q4_kks?></div>
            <div class="td"><?= $q4_kpi_kks->spd?></div>
            <div class="td"><?= $q4_kpi_kks->sp?></div>
            <div class="td"><?= $q4_kpi_kks->sd?></div>
            <div class="td"><?= $q4_kpi_kks->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_kks) ? $inventory_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q4_kks) ? $sasaran_q4_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sp_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sd_kks' size="4"  required></div>
            <div class="td"><input type='number' name='sl_kks' size="4"  required></div>
             <?php } ?>
            
            <?php if($q4_kpi_kks){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/4/kks"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?>    
        </form>
    <!-- END QUARTER 4 - KKS -->
    <!-- BEGIN QUARTER 4 - KG -->
         <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'kg');?>
             <?= form_hidden('quarter', '4'); ?>
            <div class="td">KG</div>
            
            <?php if($q4_kpi_kg){?>
            <div class="td"><?= $inventory_kg?></div>
            <div class="td"><?= $q4_kpi_kg->spd + $q4_kpi_kg->sp?></div>
            <div class="td"><?= $sasaran_q4_kg?></div>
            <div class="td"><?= $q4_kpi_kg->spd?></div>
            <div class="td"><?= $q4_kpi_kg->sp?></div>
            <div class="td"><?= $q4_kpi_kg->sd?></div>
            <div class="td"><?= $q4_kpi_kg->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_kg) ? $inventory_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q4_kg) ? $sasaran_q4_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sp_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sd_kg' size="4"  required></div>
            <div class="td"><input type='number' name='sl_kg' size="4"  required></div>

             <?php } ?>
            
            <?php if($q4_kpi_kg){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/4/kg"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
        </form> 
    <!-- END QUARTER 4 - KG -->
     <!-- BEGIN QUARTER 4 - BT -->
        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'bt');?>
            <?= form_hidden('quarter', '4'); ?>
            <div class="td">BT</div>
            
           <?php if($q4_kpi_bt){?>
            <div class="td"><?= $inventory_bt?></div>
            <div class="td"><?= $q4_kpi_bt->spd + $q4_kpi_bt->sp?></div>
            <div class="td"><?= $sasaran_q4_bt?></div>
            <div class="td"><?= $q4_kpi_bt->spd?></div>
            <div class="td"><?= $q4_kpi_bt->sp?></div>
            <div class="td"><?= $q4_kpi_bt->sd?></div>
            <div class="td"><?= $q4_kpi_bt->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_bt) ? $inventory_bt: '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td">></div>
            <div class="td"><?= isset($sasaran_q4_bt) ? $sasaran_q4_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sp_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sd_bt' size="4"  required></div>
            <div class="td"><input type='number' name='sl_bt' size="4"  required></div>

             <?php } ?>
            
            <?php if($q4_kpi_bt){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/4/bt"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
        </form> 
    <!-- END QUARTER 4 - BT -->
</div>
 <!-- BEGIN QUARTER 4 - PYBDT -->    
<div class='table table-bordered table-striped'>
    <div class="thead">
         <div class="tr">
            <div class="td">PYBDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jum. Premis yang akan diperiksa 2018 (SP + SPD)</div>
            <div class="td">Q4</div>
            <div class="td">Jumlah sasaran diperiksa melalui dekstop(SPD)</div>
            <div class="td">Jumlah sasaran diperiksa melalui lawatan (SP)</div>
            <div class="td">Jumlah pemeriksaan desktop (SD)</div>
            <div class="td">Jumlah lawatan disasarkan (SL)</div>
            <div class="td">Action</div>
        </div>
    </div>
    <?php foreach($list_of_sic as $sic): ?>   
    <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">      
        <?= form_hidden('kat', $sic->SIC);?>
        <?= form_hidden('quarter', '4'); ?>
        <div class="td"><?= $sic->SIC . ' : ' .$sic->KETERANGAN_SIC?></div>
        
        <?php 
        
         $q4_kpi = ${"q4_kpi_$sic->SIC"};
         $inventory_sic = ${"inventory_$sic->SIC"};
         $sasaran_q4 = ${"sasaran_q4_$sic->SIC"};
         ?>
 
         <?php if($q4_kpi){?>
            <div class="td"><?= $inventory_sic?></div>
            <div class="td"><?= $q4_kpi->spd + $q4_kpi->sp?></div>
            <div class="td"><?= $sasaran_q4?></div>
            <div class="td"><?= $q4_kpi->spd?></div>
            <div class="td"><?= $q4_kpi->sp?></div>
            <div class="td"><?= $q4_kpi->sd?></div>
            <div class="td"><?= $q4_kpi->sl?></div>
            <?php } else { ?>  
            <div class="td"><?= isset($inventory_sic) ? $inventory_sic : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
             <div class="td"></div>
            <div class="td"><?= isset($sasaran_q4) ? $sasaran_q4 : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><input type='number' name='spd_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sp_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sd_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='number' name='sl_<?= $sic->SIC?>' size="4"  required></div>

             <?php } ?>       
        
        <?php if($q4_kpi){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/4/<?= $sic->SIC?>"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
    </form>
    <?php    endforeach; ?>
</div>
<!-- END QUARTER 4 - PYBDT -->
 <!-- END QUARTER 4 -->
</div>
</div>

<script>
    $('document').ready(function(){
        //on page load, automatically load default tab link
      document.getElementsByClassName('tab-quarter')[0].click();
      
      //on page refresh, or redirect - store active tab on local storage
       $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
    
</script>