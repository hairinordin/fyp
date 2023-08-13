<legend>Senarai Premis Yg Telah Menghantar Borang</legend>


<h4>EMT Belum Lengkap</h4>
<table class="table table-bordered table-striped">
    <tr class="warning">
        <td>Bil</td>
        <td>Nama Premis</td>
        <td>Tindakan</td>
    </tr>
    <?php $id = 0; ?>
     <?php foreach ($premis_submitted_emt as $key => $premise): ?>
    <tr>
       
        <td><?=++$id ?></td>
        <td><?=$premise->namapremis ?></td>
        <td>
            <a href="<?=base_url()?>jawapan/emt/<?=$premise->idpremis?>"><span class="fa fa-eye fa-fw"></span>&nbsp;Maklumbalas EMT</a>&nbsp;|
            <?php //if($this->role === 'PM') : ?>
            <a href="<?=base_url()?>pemeriksaan/index/<?=$premise->idpremis?>"><span class="fa fa-pencil fa-faw"></span>&nbsp;Pemeriksaan EMT</a>&nbsp;|
            <?php //endif; ?>
            <?php //if($this->role === 'PN') : ?>
                <a href="<?=base_url()?>ulasan/form/<?=$premise->idpremis?>"><span class="fa fa-sticky-note fa-faw"></span>&nbsp;Hantar Ulasan</a>
            <?php //endif; ?>
        </td>

    </tr>
    <?php endforeach?>
    
</table>

<!--<h4>Dalam tindakan</h4>
<table class="table table-bordered table-striped">
    <tr class="success">
        <td>Bil</td>
        <td>Nama Premis</td>
        <td>Tindakan</td>
    </tr>
    
</table>-->

<h4>Selesai</h4>
<table class="table table-bordered table-striped">
    <tr class="primary">
        <td>Bil</td>
        <td>Nama Premis</td>
        <td>Tindakan</td>
    </tr>
    <?php $i = 0; ?>
     <?php foreach ($premis_completed_emt as $key => $premise): ?>
    <tr>
        <td><?=++$i?></td>
        <td><?=$premise->namapremis ?></td>
        <td><a href="<?=base_url()?>questions/view_answer/<?=$premise->idpremis?>"><i class="fa fa-search" aria-hidden="true"></i> Lihat</a></td>
    </tr>
    <?php endforeach?>
</table>