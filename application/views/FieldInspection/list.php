<legend>List of Field Inspection</legend> 
<div class="row">

    <div class="well">
        <form method="post" action="<?= base_url() ?>fieldinspection/">
            <input type="text" name="search_txt" value="<?= $search ?>">
            <input type="submit" value="Search" class="btn btn-primary btn-sm">
            <a href="<?= base_url('fieldinspection/reset/'); ?>" class="btn btn-warning btn-sm">Reset</a>

        </form>

    </div>


    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>No</th>
            <th>Premise Name</th>
            <th>Branch</th>
            <th>State</th>
            <th></th>
            </thead>
            
            <?php foreach ($premises as $premise): ?>
                <tr>
                    <td>
                        <?= ++$row ?>
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
                        <a href="<?= base_url() . 'fieldinspection/view/' . $premise->idpremis ?>"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>   


<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php echo $this->pagination->create_links(); ?>
    </ul>
</nav>
