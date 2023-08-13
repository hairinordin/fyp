<div class="row">
        <a href="<?= base_url('admin/industry') ?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to list</a>
        <br>
</div>
<br>
<legend>Industry Information</legend>

<?php
    if($this->session->flashdata('addUser')) {
    $message = $this->session->flashdata('addUser');
    
    ?>
    

<div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?></div>
    <?php } ?>
<div class="col col-md-6"><?php echo $this->util->err(validation_errors()) ?></div>
<form method="post" action="<?= base_url('admin/save_email') ?>">
    <input type="hidden" name="id" value="<?= $admin->id ?>">
    <div class="col-md-10 well">
        <div class="row">
            <div class="col-md-2"><label>Premise Name</label></div>
            <div class="col-md-10"><?= $admin->namapremis ?></div>
        </div>
        <div class="row">
            <div class="col-md-2"><label>No File DOE</label></div>
            <div class="col-md-10"><?= $admin->nofaildoe ?></div>
        </div>
        <div class="row">
            <div class="col-md-2"><label>Address</label></div>
            <div class="col-md-10"><?= $admin->alamat ?></div>
        </div>
        <div class="row">
            <div class="col-md-2"><label>Postcode</label></div>
            <div class="col-md-10"><?= $admin->poskod ?></div>
        </div>
        <div class="row">
            <div class="col-md-2"><label>City</label></div>
            <div class="col-md-10"><?= $admin->bandar ?></div>
        </div>
        <div class="row">
            <div class="col-md-2"><label>State</label></div>
            <div class="col-md-10"><?= $admin->negeri ?></div>
        </div>
        <div class="row">
            <div class="col-md-2"><label>Tel</label></div>
            <div class="col-md-10"><?= $admin->telefon ?></div>
        </div>
        <div class="row">
            <div class="col-md-2"><label>Fax</label></div>
            <div class="col-md-10"><?= $admin->faks ?></div>
        </div>
        <div class="row">
            <div class="col-md-2"><label>Cawangan JAS</label></div>
            <div class="col-md-10"><?= $admin->cawangan_jas ?></div>
        </div>
        <div class="row">
            <div class="col-md-2"><label>Emel</label></div>
            <div class="col-md-10"><input type="text" name="email" value="<?= $admin->email ?>" class="form-control"></div>
        </div>
        <div class="row">
            <div class="col-md-2"><label>Username</label></div>
            <div class="col-md-10"><?= $admin->username ?></div>
        </div>
<!--        <div class="row">
            <div class="col-md-2"><label>Katalaluan</label></div>
            <div class="col-md-10">Reset Password Email</div>
        </div>-->
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <input type="submit" value="Update Email" class="btn btn-primary">
            </div>
        </div>
    </div>
</form>