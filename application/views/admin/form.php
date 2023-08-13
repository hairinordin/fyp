<div class="row">
        <a href="<?= base_url('admin') ?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to list</a>
        <br>
</div>
<br>
<legend>User Information</legend>

<?php
    if($this->session->flashdata('addUser')) {
    $message = $this->session->flashdata('addUser');
    
    ?>
    

<div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?></div>
    <?php } ?>
<div class="col col-md-6"><?php echo $this->util->err(validation_errors()) ?></div>
<form method="post" action="<?= base_url('admin/save') ?>">
    <input type="hidden" name="id" value="<?= $admin->id ?>">
    <div class="col-md-10 well">
        <div class="row">
            <div class="col-md-2">Nama</div>
            <div class="col-md-10"><input type="text" name="name" value="<?= $admin->name ?>" class="form-control"></div>
        </div>
        <div class="row">
            <div class="col-md-2">Emel</div>
            <div class="col-md-10"><input type="text" name="email" value="<?= $admin->email ?>" class="form-control"></div>
        </div>
        <div class="row">
            <div class="col-md-2">Username</div>
            <div class="col-md-10"><input type="text" name="username" value="<?= $admin->username ?>" class="form-control"></div>
        </div>
        <div class="row">
            <div class="col-md-2">Katalaluan</div>
            <div class="col-md-10"><input type="password" name="pwd" value="9999" class="form-control"></div>
        </div>
        <div class="row">
            <div class="col-md-2">Peranan</div>
            <div class="col-md-10"><?= form_dropdown('role', $this->ref->data('role'),$admin->role, "class='form-control'") ?></div>
        </div>
        <div class="row">
            <div class="col-md-2">Negeri</div>
            <div class="col-md-10"><?= form_dropdown('state', $this->ref->data('state'),$admin->state, "class='form-control'") ?> </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </div>
    </div>
</form>