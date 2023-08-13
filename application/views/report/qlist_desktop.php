<?php
$CI = &get_instance();
$CI->load->model('Ref_model', 'ref');
?>



<div class="col-md-10">
    <legend>LAPORAN PENCAPAIAN SUKUAN TAHUN PEMERIKSAAN DESKTOP</legend>
<!--    <form method="post" action="<?= base_url('reportQuarter/search') ?>">
        <div class="col-md-12 well">
            <div class="row">
                <div class="col col-md-1">Tahun</div>
                <div class="col col-md-4">
                    <?= form_dropdown('tahun', $year, $tahun, "class='form-control'") ?>
                </div>
                <div class="col-md-1 control-label">Sektor</div>
                <div class="col col-md-4">
                    <?= form_dropdown('sektor', $CI->ref->data('sektor'), $sektor, "class='form-control'") ?>
                </div>
                <div class="col col-md-1"><input type="submit" class="btn btn-primary btn-sm" value="Cari"></div>
            </div>
        </div>
    </form>-->

    <table class="table table-bordered table-striped">
        <tr class="info">
            <td >Bil</td>
            <td >Sukuan Tahunan</td>
            <td width="10%">Muat Turun</td>
        </tr>
        <?php
        for ($i = 1; $i <= $q; $i++) :
            ?>
            <tr>
                <td><?= $i ?>.</td>
                <td>Suku <?= $i ?> (<?= $m[$i] ?>)</td>
                <td align="center"><a href="<?= base_url() ?>report/qdesktop/<?= $tahun ?>/<?= $i ?>/<?= $sektor ?>"><span class="glyphicon glyphicon-download" style="font-size: 24px"></span></a></td>

            </tr>
        <?php endfor; ?>
    </table>
</div>