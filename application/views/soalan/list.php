<legend>Senarai Soalan</legend>
<h3><?= strtoupper($kat)?></h3>
<hr>

<a href="<?=base_url()?>soalan/create/<?=$kat?>" class="btn btn-primary btn-sm">Tambah Soalan</a>


<?php foreach($moduls as $key => $modul):?>
    <h4><?=$modul->keterangan?></h4>

<table class="table table-bordered table-striped">
    <tr class="info">
        <!--<td>Modul</td>-->
        <td>Soalan</td>
        <td width="20%">Tindakan</td>
    </tr>
<?php foreach($set_soalan as $key => $data):?>
    <?php if ($modul->id == $data->id_modul):?>
    <tr>
        
        <!--<td><?=$data->keterangan ?></td>-->
        <td><?=$data->soalan ?></td>
        <td width="20%">
            <a href="<?=base_url()?>soalan/update"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="<?=base_url()?>soalan/delete/<?=$kat?>/<?= $data->id?>"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
        
    </tr>
 <?php endif;endforeach;?>   
</table>
<?php endforeach; ?>
