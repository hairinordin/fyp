 <style>
     .well-found {
         background: rgb(124,181,236);
     }
</style> 
<div class="row">
    <a href="<?= base_url('kpi') ?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to list</a>
</div>
<br>
<legend>Add Compulsory Premise</legend>
<div class="row">
<form action="cari_premis" method="POST">
    <input type="hidden" name="state" value="<?= $this->state ?>">
    <div class="col-md-5 well">
        <table class="table">
            <tr>
                <td>
                    Doe File No
                </td>
                <td>
                    <input type="text" class="form-control" name="nofailjas" required>
                </td> 
            </tr>   
            <tr>
                <td>
                    Premise Name
                </td>
                <td>
                    <input type="text" class="form-control" name="namapremis" required>
                </td>  
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-primary" value="Search"></td>

            </tr>
        </table>


    </div>
</form> 
</div>

<div style="clear: both"></div>
<div class="row">
    <div class="col-md-4">
        <?php if ($this->session->flashdata('success_search')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> <?= $this->session->flashdata('success_search'); ?>
            </div>

        <?php endif; ?>
        <?php if ($this->session->flashdata('err_search')): ?>
            <div class="alert alert-danger  alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> <?= $this->session->flashdata('err_search'); ?>
            </div>

        <?php endif; ?>
        <br style="clear:both">
    </div>
</div>
<?php if (isset($premise_info)): ?>
<div class="col-md-4 well well-found">
    <form action="<?= base_url('kpi/tambah_pencalonan/' . $premise_info->IDPREMIS); ?>" method="POST" >
        <table class="table table-condensed">
        
            <tr>
                <td>
                    <h4><?php echo $premise_info->NAMAPREMIS; ?></h4>
                </td>
            </tr>
            <br>
            <tr>
                <td>
                    <label class="form-inline">Letter Date </label><input type="date" class="form-control" name="letter_date" placeholder="Letter Date" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="form-inline">Reference No </label><input type="text" class="form-control" name="letter_ref_no" placeholder="Letter Ref No" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="btn btn-primary" value="Add Premise">
                </td>
            </tr>
        
            </table>
    </form>

</div>
<?php
else :
    'Not available';
endif;
?>

