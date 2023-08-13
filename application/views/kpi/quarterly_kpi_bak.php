<h4>Quarterly KPI - Desktop & Lawatan</h4>
Kalau sasaran belum ada 
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
        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#q1">Quarter 1</a></li>
            <li><a data-toggle="tab" href="#q2">Quarter 2</a></li>
            <li><a data-toggle="tab" href="#q3">Quarter 3</a></li>
            <li><a data-toggle="tab" href="#q4">Quarter 4</a></li>
        </ul>
    </div>
</div> 


<div class='table table-bordered table-striped'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jum. Premis yang akan diperiksa 2018 (SP + SPD)</div>
            <div class="td">Q1</div>
            <div class="td">Q2</div>
            <div class="td">Q3</div>
            <div class="td">Q4</div>
            <div class="td">Jumlah sasaran diperiksa melalui dekstop(SPD)</div>
            <div class="td">Jumlah sasaran diperiksa melalui lawatan (SP)</div>
            <div class="td">Jumlah pemeriksaan desktop (SD)</div>
            <div class="td">Jumlah lawatan disasarkan (SL)</div>
            <div class="td">Action</div>
        </div>
    </div>
    
    <!-- BEGIN QUARTER 1 -->
        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'kks');?>
            <div class="td">KKS</div>
             <?php if($quarterly_kpi_kks){?>
            <div class="td"><input type='text' name='inventory_kks' size="4" value="<?= $inventory_kks->inventory?>" disabled></div>
            <div class="td"><input type='text' name='jum_kks' size="4" value="<?= $quarterly_kpi_kks->spd + $quarterly_kpi_kks->sp?>" disabled></div>
            <div class="td"><input type='text' name='q1_kks' size="4" value="<?= $quarterly_kpi_kks->q1?>" disabled></div>
            <div class="td"><input type='text' name='q2_kks' size="4" value="<?= $quarterly_kpi_kks->q2?>" disabled></div>
            <div class="td"><input type='text' name='q3_kks' size="4" value="<?= $quarterly_kpi_kks->q3?>" disabled></div>
            <div class="td"><input type='text' name='q4_kks' size="4" value="<?= $quarterly_kpi_kks->q4?>" disabled></div>
            <div class="td"><input type='text' name='spd_kks' size="4" value="<?= $quarterly_kpi_kks->spd?>" disabled></div>
            <div class="td"><input type='text' name='sp_kks' size="4" value="<?= $quarterly_kpi_kks->sp?>" disabled></div>
            <div class="td"><input type='text' name='sd_kks' size="4" value="<?= $quarterly_kpi_kks->sd?>" disabled></div>
            <div class="td"><input type='text' name='sl_kks' size="4" value="<?= $quarterly_kpi_kks->sl?>" disabled></div>
            <?php } else { ?>  
            <div class="td"><input type='text' name='inventory_kks' size="4" value="<?= isset($inventory_kks->inventory) ? $inventory_kks->inventory : '' ?>" <?= isset($inventory_kks->inventory) ? 'readonly' : 'required' ?>></div>
             <div class="td"><input type='text' name='jum_kks' size="4"  required></div>
            <div class="td"><input type='text' name='q1_kks' size="4"  required></div>
            <div class="td"><input type='text' name='q2_kks' size="4"  required></div>
            <div class="td"><input type='text' name='q3_kks' size="4"  required></div>
            <div class="td"><input type='text' name='q4_kks' size="4"  required></div>
            <div class="td"><input type='text' name='spd_kks' size="4"  required></div>
            <div class="td"><input type='text' name='sp_kks' size="4"  required></div>
            <div class="td"><input type='text' name='sd_kks' size="4"  required></div>
            <div class="td"><input type='text' name='sl_kks' size="4"  required></div>
             <?php } ?>
            
            <?php if($quarterly_kpi_kks){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/kks"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?>    
        </form>
 <!-- END QUARTER 1 -->
 
 
        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'kg');?>
            <div class="td">KG</div>
            
            <?php if($quarterly_kpi_kg){?>
            <div class="td"><input type='text' name='inventory_kg' size="4" value="<?= $inventory_kg->inventory?>" disabled></div>
            <div class="td"><input type='text' name='jum_kg' size="4" value="<?= $quarterly_kpi_kg->spd + $quarterly_kpi_kg->sp?>" disabled></div>
            <div class="td"><input type='text' name='q1_kg' size="4" value="<?= $quarterly_kpi_kg->q1?>" disabled></div>
            <div class="td"><input type='text' name='q2_kg' size="4" value="<?= $quarterly_kpi_kg->q2?>" disabled></div>
            <div class="td"><input type='text' name='q3_kg' size="4" value="<?= $quarterly_kpi_kg->q3?>" disabled></div>
            <div class="td"><input type='text' name='q4_kg' size="4" value="<?= $quarterly_kpi_kg->q4?>" disabled></div>
            <div class="td"><input type='text' name='spd_kg' size="4" value="<?= $quarterly_kpi_kg->spd?>" disabled></div>
            <div class="td"><input type='text' name='sp_kg' size="4" value="<?= $quarterly_kpi_kg->sp?>" disabled></div>
            <div class="td"><input type='text' name='sd_kg' size="4" value="<?= $quarterly_kpi_kg->sd?>" disabled></div>
            <div class="td"><input type='text' name='sl_kg' size="4" value="<?= $quarterly_kpi_kg->sl?>" disabled></div>
            <?php } else { ?>  
            <div class="td"><input type='text' name='inventory_kg' size="4" value="<?= isset($inventory_kg->inventory) ? $inventory_kg->inventory : '' ?>" <?= isset($inventory_kg->inventory) ? 'readonly' : 'required' ?>></div>
             <div class="td"><input type='text' name='jum_kg' size="4"  required></div>
            <div class="td"><input type='text' name='q1_kg' size="4"  required></div>
            <div class="td"><input type='text' name='q2_kg' size="4"  required></div>
            <div class="td"><input type='text' name='q3_kg' size="4"  required></div>
            <div class="td"><input type='text' name='q4_kg' size="4"  required></div>
            <div class="td"><input type='text' name='spd_kg' size="4"  required></div>
            <div class="td"><input type='text' name='sp_kg' size="4"  required></div>
            <div class="td"><input type='text' name='sd_kg' size="4"  required></div>
            <div class="td"><input type='text' name='sl_kg' size="4"  required></div>

             <?php } ?>
            
            <?php if($quarterly_kpi_kg){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/kg"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
        </form> 

        <form class="tr" method="post" action="<?= base_url('kpi/set_quarterly')?>">
            <?= form_hidden('kat', 'bt');?>
            <div class="td">BT</div>
            
           <?php if($quarterly_kpi_bt){?>
            <div class="td"><input type='text' name='inventory_bt' size="4" value="<?= $inventory_bt->inventory?>" disabled></div>
            <div class="td"><input type='text' name='jum_bt' size="4" value="<?= $quarterly_kpi_bt->spd + $quarterly_kpi_kg->sp?>" disabled></div>
            <div class="td"><input type='text' name='q1_bt' size="4" value="<?= $quarterly_kpi_bt->q1?>" disabled></div>
            <div class="td"><input type='text' name='q2_bt' size="4" value="<?= $quarterly_kpi_bt->q2?>" disabled></div>
            <div class="td"><input type='text' name='q3_bt' size="4" value="<?= $quarterly_kpi_bt->q3?>" disabled></div>
            <div class="td"><input type='text' name='q4_bt' size="4" value="<?= $quarterly_kpi_bt->q4?>" disabled></div>
            <div class="td"><input type='text' name='spd_bt' size="4" value="<?= $quarterly_kpi_bt->spd?>" disabled></div>
            <div class="td"><input type='text' name='sp_bt' size="4" value="<?= $quarterly_kpi_bt->sp?>" disabled></div>
            <div class="td"><input type='text' name='sd_bt' size="4" value="<?= $quarterly_kpi_bt->sd?>" disabled></div>
            <div class="td"><input type='text' name='sl_bt' size="4" value="<?= $quarterly_kpi_bt->sl?>" disabled></div>
            <?php } else { ?>  
            <div class="td"><input type='text' name='inventory_kks' size="4" value="<?= isset($inventory_bt->inventory) ? $inventory_bt->inventory : '' ?>" <?= isset($inventory_bt->inventory) ? 'readonly' : 'required' ?>></div>
             <div class="td"><input type='text' name='jum_bt' size="4"  required></div>
            <div class="td"><input type='text' name='q1_bt' size="4"  required></div>
            <div class="td"><input type='text' name='q2_bt' size="4"  required></div>
            <div class="td"><input type='text' name='q3_bt' size="4"  required></div>
            <div class="td"><input type='text' name='q4_bt' size="4"  required></div>
            <div class="td"><input type='text' name='spd_bt' size="4"  required></div>
            <div class="td"><input type='text' name='sp_bt' size="4"  required></div>
            <div class="td"><input type='text' name='sd_bt' size="4"  required></div>
            <div class="td"><input type='text' name='sl_bt' size="4"  required></div>

             <?php } ?>
            
            <?php if($quarterly_kpi_bt){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/bt"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
        </form> 
    
    
</div>

<div class='table table-bordered table-striped'>
    <div class="thead">
         <div class="tr">
            <div class="td">PYBDT</div>
            <div class="td">Inventory</div>
            <div class="td">Jum. Premis yang akan diperiksa 2018 (SP + SPD)</div>
            <div class="td">Q1</div>
            <div class="td">Q2</div>
            <div class="td">Q3</div>
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
        <div class="td"><?= $sic->SIC . ' : ' .$sic->KETERANGAN_SIC?></div>
        
        <?php 
        
         $quarterly_kpi = ${"quarterly_kpi_$sic->SIC"};
         $inventory_sic = ${"inventory_$sic->SIC"};  
         ?>
 
         <?php if($quarterly_kpi){?>
            <div class="td"><input type='text' name='inventory_<?= $sic->SIC?>' size="4" value="<?= $inventory_sic->inventory?>" disabled></div>
            <div class="td"><input type='text' name='jum_<?= $sic->SIC?>' size="4" value="<?= $quarterly_kpi->spd + $quarterly_kpi->sp?>" disabled></div>
            <div class="td"><input type='text' name='q1_<?= $sic->SIC?>' size="4" value="<?= $quarterly_kpi->q1?>" disabled></div>
            <div class="td"><input type='text' name='q2_<?= $sic->SIC?>' size="4" value="<?= $quarterly_kpi->q2?>" disabled></div>
            <div class="td"><input type='text' name='q3_<?= $sic->SIC?>' size="4" value="<?= $quarterly_kpi->q3?>" disabled></div>
            <div class="td"><input type='text' name='q4_<?= $sic->SIC?>' size="4" value="<?= $quarterly_kpi->q4?>" disabled></div>
            <div class="td"><input type='text' name='spd_<?= $sic->SIC?>' size="4" value="<?= $quarterly_kpi->spd?>" disabled></div>
            <div class="td"><input type='text' name='sp_<?= $sic->SIC?>' size="4" value="<?= $quarterly_kpi->sp?>" disabled></div>
            <div class="td"><input type='text' name='sd_<?= $sic->SIC?>' size="4" value="<?= $quarterly_kpi->sd?>" disabled></div>
            <div class="td"><input type='text' name='sl_<?= $sic->SIC?>' size="4" value="<?= $quarterly_kpi->sl?>" disabled></div>
            <?php } else { ?>  
            <div class="td"><input type='text' name='inventory_<?= $sic->SIC?>' size="4" value="<?= isset($inventory_sic->inventory) ? $inventory_sic->inventory : '' ?>" <?= isset($inventory_sic->inventory) ? 'readonly' : 'required' ?>></div>
             <div class="td"><input type='text' name='jum_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='text' name='q1_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='text' name='q2_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='text' name='q3_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='text' name='q4_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='text' name='spd_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='text' name='sp_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='text' name='sd_<?= $sic->SIC?>' size="4"  required></div>
            <div class="td"><input type='text' name='sl_<?= $sic->SIC?>' size="4"  required></div>

             <?php } ?>       
        
        <?php if($quarterly_kpi){?>
                <div class="td"><a href="<?= base_url() ?>kpi/delete_quarterly/<?= $sic->SIC?>"><span class="glyphicon glyphicon-trash"></span></a></div>
            <?php } else { ?>
                <div class="td"><button>Save</button></div>
            <?php } ?> 
    </form>
    <?php    endforeach; ?>
</div>

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


<!-- MODAL NEW SASARAN -->
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
</div>
