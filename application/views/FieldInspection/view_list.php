<div class="container-fluid">
    <div class="row">
    <a href="<?= base_url('dashboard/#cTotalRegistered')?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to dashboard</a>
<br>
</div>
    <div class="row-fluid">
        <div class="col-md-8">

            <?= $paparan_maklumat_syarikat ?>
        </div>
        

    </div>
    <div class="row-fluid">
        <div class="col-md-8">
        <?= $paparan_compliance ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-12">
            <h4> <a href="<?= base_url('answers/answers_by_doe/'.$idpremis)?>">view EMT</a></h4>
        </div>
    </div>
    <hr>
    <div class="row-fluid">
        <div class="col-md-10">
            <table class="table table-hover">
                <thead>
                <td> No </td><td>Field Inspection Description</td><td>Field Inspection Date</td>

                </thead>
                <?php $i = 1 ?>
                <?php foreach ($lawatan as $key => $value): ?>
                    <tr>
                        <td>
                            <?= $i++ ?>
                        </td>
                        <td>
                            <?= $value['keterangan'] ?>
                        </td>
                        <td>
                            <?= $value['tarikh_lawatan'] ?>
                        </td>
                        <td>
                            <a href="<?= base_url() ?>fieldinspection/delete_lawatan/<?= $idpremis . '/' . $value['id'] ?>" ><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>

            <a href="<?= base_url() ?>fieldinspection/form/<?= $idpremis ?>" >New FI</a>

        </div></div></div>