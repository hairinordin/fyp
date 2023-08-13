 
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>No</th>
            <th>Premise Name</th>
            <th>Branch</th>
            <th>State</th>
            <th></th>
            </thead>
            <?php $i = 0; ?>
            <?php foreach ($premises as $premise): ?>
                <tr id="toggle<?= ++$i ?>">
                    <td>
                        <?= $i ?>
                    </td>
                    <td>
                        <?= $premise->namapremis ?>
                    </td>
                    <td>
                        <?= $premise->bandar ?>
                    </td>
                    <td>
                        <?= $premise->negeri ?>
                    </td>
                    <td>
                        <a href="<?= base_url() . 'answers/start/' . $premise->idpremis ?>"><i class="fa fa-question-circle fa-2x" aria-hidden="true"></i></a> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div></div>
