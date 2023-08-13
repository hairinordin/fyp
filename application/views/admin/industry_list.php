<legend>List of Industrial Users</legend>

<?php
    if($this->session->flashdata('addUser')) {
    $message = $this->session->flashdata('addUser');
    
    ?>
    

<div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?></div>
    <?php } ?>
    
<div class="well">
    <form method="post" action="<?= base_url() ?>admin/industry">
        <input type="text" name="search_txt" value="<?= $search?>">
        <input type="submit" value="Search User" class="btn btn-primary btn-sm">
        <a href="<?= base_url('admin/reset_industry/'); ?>" class="btn btn-warning btn-sm">Reset</a>
        
    </form>

</div>

<table class="table table-bordered table-striped">
    <tr class="info">
        <td>No</td>
        <td>Premise Name</td>
        <td>DOE File</td>
        <td>Email</td>
        <td>Username</td>
        <td>City</td>
        <td>State</td>
        <td>Action</td>
    </tr>
    <?php
    foreach ($list_user as $key => $user):
        ?>
        <tr>
            <td><?= ++$row ?></td>
            <td><?= $user->namapremis ?></td>
            <td><?= $user->nofaildoe ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->username?></td>
            <td><?= $user->bandar ?></td>            
            <td><?= $user->negeri ?></td>
            <td style="width:10%">
                <a href="<?= base_url('admin/email_update/' . $user->id) ?>"><span class="fa fa-pencil"></span> <small>Update Email</small></a>
                <br>
                <a href="<?= base_url('admin/reset_password/' . $user->id) ?>" onclick="return confirm('Are you sure?')"><span class="fa fa-key"></span> <small>Reset Password</small></a>
            </td>
        </tr>
    <?php endforeach; ?>
        
        <?php 
        if(count($list_user) == 0){
            echo "<tr>";
            echo "<td colspan='6'>No record found.</td>";
            echo "</tr>";
        }
        ?>
</table>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php echo $this->pagination->create_links(); ?>
    </ul>
</nav>