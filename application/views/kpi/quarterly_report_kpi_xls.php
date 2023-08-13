
<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=quarterly_rpt.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>
    
    table, th, td {
    border: 1px solid black;
}

    </style>
<!--<div class="row-fluid">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" id="myTab">
             Top level Tabs
            <li><a class="tab-rpt" data-toggle="tab" href="#desktop">Desktop</a></li>
            <li><a class="tab-rpt" data-toggle="tab" href="#fi">Field Inspection</a></li>
        </ul>
    </div>
</div> 

<div class="tab-pane">
    <ul class="nav nav-tabs" id="brands_tabs">
        <li><a href="<?= base_url('kpi/view_quarterly/1') ?>">Quarter 1</a></li>
        <li><a href="<?= base_url('kpi/view_quarterly/2') ?>">Quarter 2</a></li>
        <li><a href="<?= base_url('kpi/view_quarterly/3') ?>">Quarter 3</a></li>
        <li><a href="<?= base_url('kpi/view_quarterly/4') ?>">Quarter 4</a></li>
    </ul>
</div>-->




<div class="tab-content">

<!--TAB FIELD INSPECTION-->
<div id="fi" class="tab-pane fade">
<h3>Laporan Pencapaian Suku Tahunan Pemeriksaan Lapangan - Quarter <?= $target_quarter ?></h3>
<table>
    <thead>
        <tr>
            <th>PYDT</th>
            <th>Inventory</th>
            <th>Jumlah premis yang akan diperiksa tahun semasa ---- SP + SPD</th>
            <th>Jumlah premis yang disasarkan untuk dilawat (SP)</th>
            <th>Jumlah lawatan yang disasarkan (SL)</th>
            <th>SP</th>
            <th>BP</th>
            <th>FI</th>
            <th>SL</th>
            <th>BL</th>
            <th>Bil Premis Patuh (Effluen)</th>
            <th>Bil Premis Tidak Patuh (Effluen)</th>
            <th>Bil Premis Patuh (PUB)</th>
            <th>Bil Premis Tidak Patuh (PUB)</th>
            <th>Bil Premis Patuh (BT)</th>
            <th>Bil Premis Tidak Patuh (BT)</th>
            <th>Bil Premis Patuh (Keseluruhan)</th>
            <th>Bil Premis Tidak Patuh (Keseluruhan)</th>
        </tr>
    </thead>

    <tr>
           <td>KKS</td>
            <td><?= isset($inventory_kks->inventory) ? $inventory_kks->inventory : 'Inventory not set' ?></td>
            <td><?= isset($quarterly_kpi_kks->sp) ? $quarterly_kpi_kks->sp + $quarterly_kpi_kks->spd : 'SP not set' ?></td>
            <td><?= isset($quarterly_kpi_kks->sp) ? $quarterly_kpi_kks->sp : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_kks->sl) ? $quarterly_kpi_kks->sl : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_kks->sp) ? $quarterly_kpi_kks->sp : 'not set' ?></td>
            <td><?= isset($bp_kks) ? $bp_kks : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_kks->fi) ? $quarterly_kpi_kks->fi : 'not set' ?></td> 
            <td><?= isset($quarterly_kpi_kks->sl) ? $quarterly_kpi_kks->sl : 'not set' ?></td>
            <td><?= isset($bl_kks) ? $bl_kks : 'not set' ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>   
    </tr>

    <tr>
           <td>KG</td>
            <td><?= isset($inventory_kg->inventory) ? $inventory_kg->inventory : 'Inventory not set' ?></td>
            <td><?= isset($quarterly_kpi_kg->sp) ? $quarterly_kpi_kg->sp + $quarterly_kpi_kg->spd : 'SP not set' ?></td>
            <td><?= isset($quarterly_kpi_kg->sp) ? $quarterly_kpi_kg->sp : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_kg->sl) ? $quarterly_kpi_kg->sl : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_kg->sp) ? $quarterly_kpi_kg->sp : 'not set' ?></td>
            <td><?= isset($bp_kg) ? $bp_kg : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_kg->fi) ? $quarterly_kpi_kg->fi : 'not set' ?></td> 
            <td><?= isset($quarterly_kpi_kg->sl) ? $quarterly_kpi_kg->sl : 'not set' ?></td>
            <td><?= isset($bl_kg) ? $bl_kg : 'not set' ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>   
    </tr>


    <tr>
           <td>BT</td>
            <td><?= isset($inventory_bt->inventory) ? $inventory_bt->inventory : 'Inventory not set' ?></td>
            <td><?= isset($quarterly_kpi_bt->sp) ? $quarterly_kpi_bt->sp + $quarterly_kpi_bt->spd : 'SP not set' ?></td>
            <td><?= isset($quarterly_kpi_bt->sp) ? $quarterly_kpi_bt->sp : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_bt->sl) ? $quarterly_kpi_bt->sl : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_bt->sp) ? $quarterly_kpi_bt->sp : 'not set' ?></td>
            <td><?= isset($bp_bt) ? $bp_bt : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_bt->fi) ? $quarterly_kpi_bt->fi : 'not set' ?></td> 
            <td><?= isset($quarterly_kpi_bt->sl) ? $quarterly_kpi_bt->sl : 'not set' ?></td>
            <td><?= isset($bl_bt) ? $bl_bt : 'not set' ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>   
    </tr>


</table>

<table>
    <thead>
        <tr>
            <th>PYDT</th>
            <th>Inventory</th>
            <th>Jumlah premis yang akan diperiksa tahun semasa ---- SP + SPD</th>
            <th>Jumlah premis yang disasarkan untuk dilawat (SP)</th>
            <th>Jumlah lawatan yang disasarkan (SL)</th>
            <th>SP</th>
            <th>BP</th>
            <th>FI</th>
            <th>SL</th>
            <th>BL</th>
            <th>Bil Premis Patuh (Effluen)</th>
            <th>Bil Premis Tidak Patuh (Effluen)</th>
            <th>Bil Premis Patuh (PUB)</th>
            <th>Bil Premis Tidak Patuh (PUB)</th>
            <th>Bil Premis Patuh (BT)</th>
            <th>Bil Premis Tidak Patuh (BT)</th>
            <th>Bil Premis Patuh (Keseluruhan)</th>
            <th>Bil Premis Tidak Patuh (Keseluruhan)</th>
        </tr>
    </thead>
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
        <tr> 
            <td><?= $sic->SIC . ' : ' . $sic->KETERANGAN_SIC ?></td> 
            <td><?= isset($inventory_sic->inventory) ? $inventory_sic->inventory : 'Inventory not set' ?></td>
            <td><?= isset($quarterly_kpi->spd) ? $quarterly_kpi->sp + $quarterly_kpi->spd : 'SP not set' ?></td>
            <td><?= isset($quarterly_kpi->sp) ? $quarterly_kpi->sp : 'not set' ?></td>
            <td><?= isset($quarterly_kpi->sl) ? $quarterly_kpi->sl : 'not set' ?></td>
            <td><?= isset($quarterly_kpi->sp) ? $quarterly_kpi->sp : 'not set' ?></td>
            <td><?= isset($bp_sic) ? $bp_sic : 'not set' ?></td>
            <td><?= isset($quarterly_kpi->fi) ? $quarterly_kpi->fi : 'not set' ?></td>
            <td><?= isset($bl_sic) ? $bl_sic : 'not set' ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<?php endforeach; ?>

</table>
</div>
<!--TAB DESKTOP-->
<div id="desktop" class="tab-pane fade">
<!---DESKTOP --->
<h3>Laporan Pencapaian Suku Tahunan Pemeriksaan Desktop - Quarter <?= $target_quarter ?></h3>
<table>
    <thead>
        <tr>
            <th>PYDT</th>
            <th>Inventory</th>
            <th>Jumlah premis yang akan diperiksa tahun semasa</th>
            <th>Jumlah premis yang disasarkan untuk diperiksa melalui Desktop (SPD)</th>
            <th>Jumlah pemeriksaan Desktop (SD)</th>
            <th>SPD</th>
            <th>BPD</th>
            <th>BPD(SP)</th>
            <th>SD</th>
            <th>BD</th>
            <th>Bil Premis Patuh (Effluen)</th>
            <th>Bil Premis Tidak Patuh (Effluen)</th>
            <th>Bil Premis Patuh (PUB)</th>
            <th>Bil Premis Tidak Patuh (PUB)</th>
            <th>Bil Premis Patuh (BT)</th>
            <th>Bil Premis Tidak Patuh (BT)</th>
            <th>Bil Premis Patuh (Keseluruhan)</th>
            <th>Bil Premis Tidak Patuh (Keseluruhan)</th>
        </tr>
    </thead>
<?php
//      echo '<pre>';
//      print_r($sasaran_bulan_kks);
//      echo '</pre>';
?>
    <tr>
        
        <td>KKS</td>
            <td><?= isset($inventory_kks->inventory) ? $inventory_kks->inventory : 'Inventory not set' ?></td>
            <td><?= isset($quarterly_kpi_kks->spd) ? $quarterly_kpi_kks->sp + $quarterly_kpi_kks->spd : 'SPD not set' ?></td>
            <td><?= isset($quarterly_kpi_kks->spd) ? $quarterly_kpi_kks->spd : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_kks->sd) ? $quarterly_kpi_kks->sd : 'not set' ?></td>
            <td><?= isset($quarterly_kpi_kks->spd) ? $quarterly_kpi_kks->spd : 'not set' ?></td>
            <td><?= isset($bpd_kks) ? $bpd_kks : 'not set' ?></td>
            <td><?=$quarterly_kpi_kks->bpdsp ?></td>
            <td><?= isset($quarterly_kpi_kks->sd) ? $quarterly_kpi_kks->sd : 'not set' ?></td>
            <td><?= isset($bd_kks) ? $bd_kks : 'not set' ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>  
    </tr>

    <tr>
        <td>KG</td>
        <td><?= isset($inventory_kg->inventory) ? $inventory_kg->inventory : 'Inventory not set' ?></td>
        <td><?= isset($quarterly_kpi_kg->spd) ? $quarterly_kpi_kg->sp + $quarterly_kpi_kg->spd : 'SPD not set' ?></td>
        <td><?= isset($quarterly_kpi_kg->spd) ? $quarterly_kpi_kg->spd : 'not set' ?></td>
        <td><?= isset($quarterly_kpi_kg->sd) ? $quarterly_kpi_kg->sd : 'not set' ?></td>
        <td><?= isset($quarterly_kpi_kg->spd) ? $quarterly_kpi_kg->spd : 'not set' ?></td>
        <td><?= isset($bpd_kg) ? $bpd_kg : 'not set' ?></td>
        <td><?= isset($quarterly_kpi_kg->bpdsp) ? $quarterly_kpi_kg->bpdsp : 'not set' ?></td>
        <td><?= isset($quarterly_kpi_kg->sd) ? $quarterly_kpi_kg->sd : 'not set' ?></td>
        <td><?= isset($bd_kg) ? $bd_kg : 'not set' ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>


    <tr>
        <td>BT</td> 
        <td><?= isset($inventory_bt->inventory) ? $inventory_bt->inventory : 'Inventory not set' ?></td>
        <td><?= isset($quarterly_kpi_bt->spd) ? $quarterly_kpi_bt->sp + $quarterly_kpi_bt->spd : 'SPD not set' ?></td>
        <td><?= isset($quarterly_kpi_bt->spd) ? $quarterly_kpi_bt->spd : 'not set' ?></td>
        <td><?= isset($quarterly_kpi_bt->sd) ? $quarterly_kpi_bt->sd : 'not set' ?></td>
        <td><?= isset($quarterly_kpi_bt->spd) ? $quarterly_kpi_bt->spd : 'not set' ?></td>
        <td><?= isset($bpd_bt) ? $bpd_bt : 'not set' ?></td>
        <td><?= isset($quarterly_kpi_bt->bpdsp) ? $quarterly_kpi_bt->bpdsp : 'not set' ?></td>
        <td><?= isset($quarterly_kpi_bt->sd) ? $quarterly_kpi_bt->sd : 'not set' ?></td>
        <td><?= isset($bd_bt) ? $bd_bt : 'not set' ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>


</table>

<table>
    <thead>
        <tr>
            <th>PYDT</th>
            <th>Inventory</th>
            <th>Jumlah premis yang akan diperiksa tahun semasa</th>
            <th>Jumlah premis yang disasarkan untuk diperiksa melalui Desktop (SPD)</th>
            <th>Jumlah pemeriksaan Desktop (SD)</th>
            <th>SPD</th>
            <th>BPD</th>
            <th>BPD(SP)</th>
            <th>SD</th>
            <th>BD</th>
            <th>Bil Premis Patuh (Effluen)</th>
            <th>Bil Premis Tidak Patuh (Effluen)</th>
            <th>Bil Premis Patuh (PUB)</th>
            <th>Bil Premis Tidak Patuh (PUB)</th>
            <th>Bil Premis Patuh (BT)</th>
            <th>Bil Premis Tidak Patuh (BT)</th>
            <th>Bil Premis Patuh (Keseluruhan)</th>
            <th>Bil Premis Tidak Patuh (Keseluruhan)</th>
        </tr>
    </thead>
<?php foreach ($list_of_sic as $sic): ?>   
    <?php
        $quarterly_kpi = ${"quarterly_kpi_$sic->SIC"};
        $inventory_sic = ${"inventory_$sic->SIC"};
        $sasaran_quarter_sic = ${"sasaran_quarter_$sic->SIC"};
        $bpd_sic = ${"bpd_$sic->SIC"};
        $bd_sic = ${"bd_$sic->SIC"};
        ?>
        <tr>
            <td><?= $sic->SIC . ' : ' . $sic->KETERANGAN_SIC ?></td>
            <td><?= isset($inventory_sic->inventory)? $inventory_sic->inventory : 'Inventory not set' ?></td>
            <td><?= isset($sasaran_quarter_sic->spd)? $sasaran_quarter_sic->sp + $sasaran_quarter_sic->spd : 'SPD not set' ?></td>
            <td><?= isset($quarterly_kpi->spd)? $quarterly_kpi->spd : 'not set' ?></td>
            <td><?= isset($quarterly_kpi->sd)? $quarterly_kpi->sd : 'not set' ?></td>
            <td><?= isset($quarterly_kpi->spd)? $quarterly_kpi->spd : 'not set' ?></td>
            <td><?= isset($bpd_sic)? $bpd_sic : 'not set' ?></td>
            <td><?= isset($quarterly_kpi->bpdsp) ? $quarterly_kpi->bpdsp : 'not set' ?></td>
            <td><?= isset($quarterly_kpi->sd)? $quarterly_kpi->sd : 'not set'  ?></td>
            <td><?= isset($bd_sic)? $bd_sic : 'not set' ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<?php endforeach; ?>
        </table>>
</div>

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
