<legend>Senarai Modul</legend>

<table class="table table-bordered table-striped">
    <tr class="info">
        <td>Bil</td>
        <td>Modul</td>
        <td>Tindakan</td>
    </tr>
    <?php
    $bil = 1;
    foreach ($moduls as $modul) :
    ?>
    <tr>
        <td><?= $bil++ ?>.</td>
        <td><?= $modul->keterangan ?></td>
        <td>
            <a href="<?=base_url()?>soalan/listing/<?=$modul->id?>"><span class="glyphicon glyphicon-search"></span></a>
            <a href="<?=base_url()?>soalan/update_modul/<?=$modul->id?>"><span class="glyphicon glyphicon-pencil"></span></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


