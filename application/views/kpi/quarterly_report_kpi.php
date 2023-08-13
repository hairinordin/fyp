<?php
$flashdata = $this->session->flashdata('item');
if (isset($flashdata)) {
    $message = $this->session->flashdata('item');
    ?>
    <div class="alert alert-<?php echo $message['class'] ?>">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?php echo $message['class'] ?>!</strong> <?php echo $message['message']; ?>
    </div>

    <?php
}
?>

<div class="row-fluid">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" id="myTab">
            <!-- Top level Tabs-->
            <li><a href="<?= base_url('kpi/view_quarterly/1') ?>">Quarter 1</a></li>
            <li><a href="<?= base_url('kpi/view_quarterly/2') ?>">Quarter 2</a></li>
            <li><a href="<?= base_url('kpi/view_quarterly/3') ?>">Quarter 3</a></li>
            <li><a href="<?= base_url('kpi/view_quarterly/4') ?>">Quarter 4</a></li>
            
        </ul>
    </div>
</div> 
<br>
<div class="row-fluid">
    <a class="btn btn-info" href="<?= base_url('kpi/view_quarterly_xls/'.$target_quarter)?>" >Export to xls</a>
</div>
<br>
<div class="tab-pane">
    <ul class="nav nav-tabs" id="brands_tabs">
       <li><a class="tab-rpt" data-toggle="tab" href="#desktop">Desktop</a></li>
       <li><a class="tab-rpt" data-toggle="tab" href="#fi">Field Inspection</a></li>
    </ul>
</div>




<div class="tab-content">

<!--TAB FIELD INSPECTION-->
<div id="fi" class="tab-pane fade">
<h3>Laporan Pencapaian Suku Tahunan Pemeriksaan Lapangan - Quarter <?= $target_quarter ?></h3>

<div class='table table-bordered table-striped'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jumlah premis yang akan diperiksa tahun semasa ---- SP + SPD</div>
            <div class="td">Jumlah premis yang disasarkan untuk dilawat (SP)</div>
            <div class="td">Jumlah lawatan yang disasarkan (SL)</div>
            <div class="td col-sasaranPremis">SP</div>
            <div class="td col-sasaranPremis">BP</div>
            <div class="td" style="background-color: #4271f4; width: 8%">FI</div>
            <div class="td col-BilLawatan">SL</div>
            <div class="td col-BilLawatan">BL</div>
            <div class="td">Bil Premis Patuh (Effluen)</div>
            <div class="td">Bil Premis Tidak Patuh (Effluen)</div>
            <div class="td">Bil Premis Patuh (PUB)</div>
            <div class="td">Bil Premis Tidak Patuh (PUB)</div>
            <div class="td">Bil Premis Patuh (BT)</div>
            <div class="td">Bil Premis Tidak Patuh (BT)</div>
            <div class="td">Bil Premis Patuh (Keseluruhan)</div>
            <div class="td">Bil Premis Tidak Patuh (Keseluruhan)</div>
        </div>
    </div>
    <?php
//      echo '<pre>';
//      print_r($quarterly_kpi_kks);
//
//      echo '</pre>';
    ?>
    <form class="tr" method="post" action="<?= base_url('kpi/set_fi/'.$target_quarter) ?>">
            <?= form_hidden('kat', 'kks');?>
             <?= isset($quarterly_kpi_kks) ? form_hidden('tbl_id', $quarterly_kpi_kks->id) : ''?>
            <div class="td">KKS</div>
            <div class="td"><?= isset($inventory_kks->inventory) ? $inventory_kks->inventory : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi_kks->sp)? $quarterly_kpi_kks->sp + $quarterly_kpi_kks->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi_kks->sp) ? $quarterly_kpi_kks->sp : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi_kks->sl) ? $quarterly_kpi_kks->sl : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi_kks->sp) ? $quarterly_kpi_kks->sp : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($bp_kks) ? $bp_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td" style="background-color: #4271f4"><?= isset($quarterly_kpi_kks->fi)? $quarterly_kpi_kks->fi : '' ?></div> 
            <div class="td"><?= isset($quarterly_kpi_kks->sl) ? $quarterly_kpi_kks->sl : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($bl_kks) ? $bl_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>   
    </form>

    <form class="tr" method="post" action="<?= base_url('kpi/set_fi/'.$target_quarter) ?>">
        <?= form_hidden('kat', 'kg');?>
        <?= isset($quarterly_kpi_kg)? form_hidden('tbl_id', $quarterly_kpi_kg->id) : ''?>
        <div class="td">KG</div>
        <div class="td"><?= isset($inventory_kg->inventory) ? $inventory_kg->inventory : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_kg->sp)? $quarterly_kpi_kg->sp + $quarterly_kpi_kg->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_kg->sp) ? $quarterly_kpi_kg->sp : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_kg->sl) ? $quarterly_kpi_kg->sl : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_kg->sp) ? $quarterly_kpi_kg->sp : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($bp_kg) ? $bp_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td" style="background-color: #4271f4"><?= isset($quarterly_kpi_kg->fi)? $quarterly_kpi_kg->fi : '' ?></div>
        <div class="td"><?= isset($quarterly_kpi_kg->sl) ? $quarterly_kpi_kg->sl : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($bl_kg) ? $bl_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
    </form>


    <form class="tr" method="post" action="<?= base_url('kpi/set_fi/'.$target_quarter) ?>">
        <?= form_hidden('kat', 'bt');?>
        <?= isset($quarterly_kpi_bt)? form_hidden('tbl_id', $quarterly_kpi_bt->id) : ''?>
        <div class="td">BT</div> 
        <div class="td"><?= isset($inventory_bt->inventory) ? $inventory_bt->inventory : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_bt->sp)? $quarterly_kpi_bt->sp + $quarterly_kpi_bt->spd : '<i class="fa fa-ban" title="Not set"></i>'?></div>
        <div class="td"><?= isset($quarterly_kpi_bt->sp) ? $quarterly_kpi_bt->sp : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_bt->sl) ? $quarterly_kpi_bt->sl : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_bt->sp) ? $quarterly_kpi_bt->sp : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($bp_bt) ? $bp_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td" style="background-color: #4271f4"><?=isset($quarterly_kpi_bt->fi)? $quarterly_kpi_bt->fi : '' ?></div>
        <div class="td"><?= isset($quarterly_kpi_bt->sl) ? $quarterly_kpi_bt->sl : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($bl_bt) ? $bl_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
    </form>


</div>

<div class='table table-bordered table-striped'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jumlah premis yang akan diperiksa tahun semasa</div>
            <div class="td">Jumlah premis yang dissasarkan untuk dilawat (SP)</div>
            <div class="td">Jumlah lawatan yang disasarkan (SL)</div>
            <div class="td col-sasaranPremis">SP</div>
            <div class="td col-sasaranPremis">BP</div>
            <div class="td" style="background-color: #4271f4; width:8%">FI</div>
            <div class="td col-BilLawatan">SL</div>
            <div class="td col-BilLawatan">BL</div>
            <div class="td">Bil Premis Patuh (Effluen)</div>
            <div class="td">Bil Premis Tidak Patuh (Effluen)</div>
            <div class="td">Bil Premis Patuh (PUB)</div>
            <div class="td">Bil Premis Tidak Patuh (PUB)</div>
            <div class="td">Bil Premis Patuh (BT)</div>
            <div class="td">Bil Premis Tidak Patuh (BT)</div>
            <div class="td">Bil Premis Patuh (Keseluruhan)</div>
            <div class="td">Bil Premis Tidak Patuh (Keseluruhan)</div>

        </div>
    </div>
    <?php foreach ($list_of_sic as $sic): ?>   
    <?php
            $quarterly_kpi = ${"quarterly_kpi_$sic->SIC"};
            $inventory_sic = ${"inventory_$sic->SIC"};
            $bp_sic = ${"bp_$sic->SIC"};
            $bl_sic = ${"bl_$sic->SIC"};
            //$sasaran_bulan_sic = ${"sasaran_bulan_$sic->SIC"};
//         echo '<pre>';
//      print_r($inventory_sic);
//
//      echo '</pre>';
            ?>
        <form class="tr" method="post" action="<?= base_url('kpi/set_fi/'.$target_quarter) ?>">
            <?= form_hidden('kat', $sic->SIC);?>
            <?php if(isset($quarterly_kpi->id)): ?>
            <?= form_hidden('tbl_id', $quarterly_kpi->id)?>
            <?php endif; ?>
            <div class="td"><?= $sic->SIC . ' : ' . $sic->KETERANGAN_SIC ?></div> 
            <div class="td"><?= isset($inventory_sic->inventory) ? $inventory_sic->inventory : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi->spd) ? $quarterly_kpi->sp + $quarterly_kpi->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi->sp) ? $quarterly_kpi->sp : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi->sl) ? $quarterly_kpi->sl : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi->sp) ? $quarterly_kpi->sp : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($bp_sic) ? $bp_sic : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td" style="background-color: #4271f4"><?=isset($quarterly_kpi->fi)? $quarterly_kpi->fi : '' ?></div>
            <div class="td"><?= isset($bl_sic) ? $bl_sic : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
        </form>
<?php endforeach; ?>
</div>
</div>

<!--TAB DESKTOP-->
<div id="desktop" class="tab-pane fade">
<!---DESKTOP --->
<h3>Laporan Pencapaian Suku Tahunan Pemeriksaan Desktop - Quarter <?= $target_quarter ?></h3>
<div class='table table-bordered table-striped'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jumlah premis yang akan diperiksa tahun semasa</div>
            <div class="td">Jumlah premis yang disasarkan untuk diperiksa melalui Desktop (SPD)</div>
            <div class="td">Jumlah pemeriksaan Desktop (SD)</div>
            <div class="td col-sasaranPremis">SPD</div>
            <div class="td col-sasaranPremis">BPD</div>
            <div class="td" style="background-color: #4271f4; width:8%">BPD(SP)</div>
            <div class="td col-BilLawatan">SD</div>
            <div class="td col-BilLawatan">BD</div>
            <div class="td">Bil Premis Patuh (Effluen)</div>
            <div class="td">Bil Premis Tidak Patuh (Effluen)</div>
            <div class="td">Bil Premis Patuh (PUB)</div>
            <div class="td">Bil Premis Tidak Patuh (PUB)</div>
            <div class="td">Bil Premis Patuh (BT)</div>
            <div class="td">Bil Premis Tidak Patuh (BT)</div>
            <div class="td">Bil Premis Patuh (Keseluruhan)</div>
            <div class="td">Bil Premis Tidak Patuh (Keseluruhan)</div>
        </div>
    </div>
<?php
//      echo '<pre>';
//      print_r($sasaran_bulan_kks);
//      echo '</pre>';
?>
    <form class="tr" method="post" action="<?= base_url('kpi/set_bpdsp/'.$target_quarter) ?>">
        <?= form_hidden('kat', 'kks');?>
        <?php if(isset($quarterly_kpi_kks->id)):?>
        <?= form_hidden('tbl_id', $quarterly_kpi_kks->id)?>
        <?php endif; ?>
        <div class="td">KKS</div>
            <div class="td"><?= isset($inventory_kks->inventory) ? $inventory_kks->inventory : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi_kks->spd) ? $quarterly_kpi_kks->sp + $quarterly_kpi_kks->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi_kks->spd) ? $quarterly_kpi_kks->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi_kks->sd) ? $quarterly_kpi_kks->sd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi_kks->spd) ? $quarterly_kpi_kks->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($bpd_kks) ? $bpd_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td" style="background-color: #4271f4"><?=isset($quarterly_kpi_kks->bpdsp)? $quarterly_kpi_kks->bpdsp : '' ?></div>
            <div class="td"><?= isset($quarterly_kpi_kks->sd) ? $quarterly_kpi_kks->sd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($bd_kks) ? $bd_kks : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>  
    </form>

    <form class="tr" method="post" action="<?= base_url('kpi/set_bpdsp/'.$target_quarter) ?>">
        <?= form_hidden('kat', 'kg');?>
        <?php if(isset($quarterly_kpi_kg->id)): ?>
        <?= form_hidden('tbl_id', $quarterly_kpi_kg->id)?>
        <?php endif; ?>
        <div class="td">KG</div>
        <div class="td"><?= isset($inventory_kg->inventory) ? $inventory_kg->inventory : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_kg->spd) ?$quarterly_kpi_kg->sp + $quarterly_kpi_kg->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_kg->spd) ? $quarterly_kpi_kg->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_kg->sd) ? $quarterly_kpi_kg->sd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_kg->spd) ? $quarterly_kpi_kg->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($bpd_kg) ? $bpd_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td" style="background-color: #4271f4"><?=isset($quarterly_kpi_kg->bpdsp)? $quarterly_kpi_kg->bpdsp : '' ?></div>
        <div class="td"><?= isset($quarterly_kpi_kg->sd) ? $quarterly_kpi_kg->sd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($bd_kg) ? $bd_kg : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
    </form>


    <form class="tr" method="post" action="<?= base_url('kpi/set_bpdsp/'.$target_quarter) ?>">
        <?= form_hidden('kat', 'bt');?>
        <?php if(isset($quarterly_kpi_bt->id)): ?>
        <?= form_hidden('tbl_id', $quarterly_kpi_bt->id)?>
        <?php endif; ?>
        <div class="td">BT</div> 
        <div class="td"><?= isset($inventory_bt->inventory) ? $inventory_bt->inventory : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_bt->spd) ?$quarterly_kpi_bt->sp + $quarterly_kpi_bt->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_bt->spd) ? $quarterly_kpi_bt->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_bt->sd) ? $quarterly_kpi_bt->sd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($quarterly_kpi_bt->spd) ? $quarterly_kpi_bt->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($bpd_bt) ? $bpd_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td" style="background-color: #4271f4"><?=isset($quarterly_kpi_bt->bpdsp)? $quarterly_kpi_bt->bpdsp : '' ?></div>
        <div class="td"><?= isset($quarterly_kpi_bt->sd) ? $quarterly_kpi_bt->sd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"><?= isset($bd_bt) ? $bd_bt : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>
        <div class="td"></div>


    </form>


</div>

<div class='table table-bordered table-striped'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jumlah premis yang akan diperiksa tahun semasa</div>
            <div class="td">Jumlah premis yang dissasarkan untuk diperiksa melalui Desktop (SPD)</div>
            <div class="td">Jumlah pemeriksaan Desktop (SD)</div>
            <div class="td col-sasaranPremis">SPD</div>
            <div class="td col-sasaranPremis">BPD</div>
            <div class="td" style="background-color: #4271f4; width:8%">BPD(SP)</div>
            <div class="td col-BilLawatan">SD</div>
            <div class="td col-BilLawatan">BD</div>
            <div class="td">Bil Premis Patuh (Effluen)</div>
            <div class="td">Bil Premis Tidak Patuh (Effluen)</div>
            <div class="td">Bil Premis Patuh (PUB)</div>
            <div class="td">Bil Premis Tidak Patuh (PUB)</div>
            <div class="td">Bil Premis Patuh (BT)</div>
            <div class="td">Bil Premis Tidak Patuh (BT)</div>
            <div class="td">Bil Premis Patuh (Keseluruhan)</div>
            <div class="td">Bil Premis Tidak Patuh (Keseluruhan)</div>

        </div>
    </div>
<?php foreach ($list_of_sic as $sic): ?>   
    <?php
        $quarterly_kpi = ${"quarterly_kpi_$sic->SIC"};
        $inventory_sic = ${"inventory_$sic->SIC"};
        $sasaran_quarter_sic = ${"sasaran_quarter_$sic->SIC"};
        $bpd_sic = ${"bpd_$sic->SIC"};
        $bd_sic = ${"bd_$sic->SIC"};
        ?>
        <form class="tr" method="post" action="<?= base_url('kpi/set_bpdsp/'.$target_quarter) ?>">
            <?= form_hidden('kat', $sic->SIC);?>
            <?= isset($quarterly_kpi) ? form_hidden('tbl_id', $quarterly_kpi->id) : ''?>
            <div class="td"><?= $sic->SIC . ' : ' . $sic->KETERANGAN_SIC ?></div>
            <div class="td"><?= isset($inventory_sic->inventory)? $inventory_sic->inventory : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($sasaran_quarter_sic->spd)? $sasaran_quarter_sic->sp + $sasaran_quarter_sic->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi->spd)? $quarterly_kpi->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi->sd)? $quarterly_kpi->sd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($quarterly_kpi->spd)? $quarterly_kpi->spd : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"><?= isset($bpd_sic)? $bpd_sic : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td" style="background-color: #4271f4"><?=isset($quarterly_kpi->bpdsp)? $quarterly_kpi->bpdsp : '' ?></div>
            <div class="td"><?= isset($quarterly_kpi->sd)? $quarterly_kpi->sd : '<i class="fa fa-ban" title="Not set"></i>'  ?></div>
            <div class="td"><?= isset($bd_sic)? $bd_sic : '<i class="fa fa-ban" title="Not set"></i>' ?></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
        </form>
<?php endforeach; ?>
</div>
</div></div>

<script>
    $('document').ready(function(){
        //on page load, automatically load default tab link
      document.getElementsByClassName('tab-rpt')[0].click();  
      
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























<!--
<h3>Laporan Pencapaian Suku Tahunan Pemeriksaan Lapangan (Command and Control - CAC dan Field Inspection - FI) - Quarter 1/2/3/4</h3>

<table class="table table-bordered table-striped">

    <tr class="info">
        <td>Bil</td>
        <td>Bulan</td> 
        <td>Tahun </td>
        <td>Jumlah Sasaran Premis</td>
        <td>Jumlah Sasaran Pemeriksaan Secara Desktop</td> 
        <td>Jumlah Sasaran Pemeriksaan Secara Lawatan</td>
        <td>Jumlah Pemeriksaan Desktop</td>
        <td>Jumlah Pemeriksaan Lawatan</td>
        <td>Tindakan</td>    
    </tr>
<?php $i = 0; ?>
<?php foreach ($set_sasaran as $key => $data): ?>

            <tr>
                <td><?= ++$i ?></td>
                <td><?= $data->month ?></td>
                <td><?= $data->year ?></td>
                <td><?= $data->jum_sasar_premis ?></td>
                <td><?= $data->jum_sasar_desktop ?></td>
                <td><?= $data->jum_sasar_lawatan ?></td>
                <td><?= $data->jum_desktop ?></td>
                <td><?= $data->jum_lawatan ?></td>
                <td>
                    <a href="<?= base_url() ?>kpi/sasaranupdate/<?= $data->id ?>"><span class="fa fa-pencil fa-2x"></span></a>
                    <a href="<?= base_url() ?>kpi/sasarandelete/<?= $data->id ?>"><span class="fa fa-trash-o fa-2x" style="color:red"></span></a>   
                </td>   
            </tr>
<?php endforeach; ?> 
</table>


 MODAL NEW SASARAN 
<div id="newSasaran" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <legend>Tambah Sasaran Baru</legend>
        <div class="col-md-8">
            <div class="">
                <form method="post" action="<?php echo base_url() ?>kpi/sasaranbaru">
                    <input type="hidden" name="id" value="<?= $row->id ?>">
                    <div class="row">
                        <div class="col-md-2">Month</div> 
                        <div class="col-md-4"><?= form_dropdown('month', $this->ref->data('month'), $month, "class='form-control'") ?> </div>
                        <div class="col-md-2">Year</div> 
                        <div class="col-md-4"><?= form_dropdown('year', $this->ref->data('year'), $year, "class='form-control'") ?> </div>  
                    </div>
                    <br>
                    <div class="row"> 
                        <div class="col-md-6"><p><strong>Jumlah keseluruhan Sasaran Premis (SP)</strong></p></div>
                        <div class="col-md-4"><input type="text" class="form-control" name="jum_sasar_premis" value ='<?= $row->jum_sasar_premis ?>'></div>
                    </div>
                    <br>
                    <div class="row"> 
                        <div class="col-md-6"><p><strong>Jumlah Sasaran Premis Desktop</strong></p></div>
                        <div class="col-md-4"><input type="text" class="form-control" name="jum_sasar_desktop" value ='<?= $row->jum_sasar_desktop ?>'></div>
                    </div>
                    <br>
                    <div class="row"> 
                        <div class="col-md-6"><p><strong>Jumlah Pemeriksaan Desktop</strong></p></div>
                        <div class="col-md-4"><input type="text" class="form-control" name="jum_desktop" value ='<?= $row->jum_desktop ?>'></div>
                    </div> 
                    <br>
                    <div class="row"> 
                        <div class="col-md-6"><p><strong>Jumlah Sasaran Premis Lawatan</strong></p></div>
                        <div class="col-md-4"><input type="text" class="form-control" name="jum_sasar_lawatan" value ='<?= $row->jum_sasar_lawatan ?>'></div>
                    </div>
                    <br>
                    <div class="row"> 
                        <div class="col-md-6"><p><strong>Jumlah Pemeriksaan Lawatan</strong></p></div>
                        <div class="col-md-4"><input type="text" class="form-control" name="jum_lawatan" value ='<?= $row->jum_lawatan ?>'></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><input type="submit" class="btn btn-primary" value="Simpan"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>-->
