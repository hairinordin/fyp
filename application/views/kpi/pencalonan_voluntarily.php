
<h4><a href="<?= base_url() ?>kpi/pencalonan" >List of Compulsory Premise</a> | <a href="<?= base_url() ?>kpi/pencalonan_voluntarily" >List of Voluntarily Premise</a> <small>  <?= $state[$this->state] ?></small></h4>
<br>
<div class="col-md-12 well">
    <form  class="form-horizontal" method="post" action="<?= base_url() ?>kpi/pencalonan_voluntarily/">
        <div class="form-group col-md-4">    
            <input type="text" class="form-control" name="search_txt" placeholder="Search" value="<?= $search ?>"> 
        </div> 
        
       <div class="form-group col-md-3">
           <!--  <div class="radio radio-inline">
                 <label for='reg_chk'>Registered ? </label>
                 <label><input type="radio" name="reg_chk" value="yes" required data-toggle="tooltip" title="Registered">Yes</label>
                 <label><input type="radio" name="reg_chk" value="no" required data-toggle="tooltip" title="Not registered">No</label>
            </div>-->
        </div>
        
        <div class="form-group col-md-3">
            <button type="submit" value="Search" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
            <a href="<?= base_url('kpi/reset_voluntarily/'); ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Reset">Reset</a>
        </div>
        
    </form>

</div>

<!--<br style="clear:both">
<a href="<?= base_url() ?>kpi/premis" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Add compulsory premise">Add New Premise</a>-->
<hr>
<h4>List of Voluntarily premise</h4>
<table class="table table-bordered table-striped">
    <tr class="info">
        <td>No</td>
        <td>Premise Name</td>
        <td>DOE File No</td>
        <td>Type of submission</td>
        <td>System Registration Status</td>
        <td>Date Registered</td>
    </tr>
    <?php
    
    if (!empty($premis_berdaftar)) {
        foreach ($premis_berdaftar as $key => $data) {
            ?>
            <tr>
                <td><?= ++$row ?></td>
                <td><?= $data->namapremis ?></td>
                <td><?= $data->nofaildoe ?></td>
                <td><?= $data->submission_type ?></td>
                <td><?= ($data->username)? 'Registered' : 'Not Registered' ?></td>
                <td><?= date("d/m/Y", strtotime($data->register_date)) ?></td>
<!--                <td><a href="<?//= base_url() ?>kpi/delete_pencalonan/<?//=$data->idpremis ?>"><span class="glyphicon glyphicon-trash"></span></a></td>-->
                
            </tr>
            
    <?php }}?>
            
</table>
   <nav aria-label="Page navigation">
    <ul class="pagination">
        <?php echo $this->pagination->create_links(); ?>
    </ul>
</nav>

