<legend>List of System Internal Users</legend>

<?php
    if($this->session->flashdata('addUser')) {
    $message = $this->session->flashdata('addUser');
    
    ?>
    

<div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?></div>
    <?php } ?>
    
<div class="well">
    <form method="post" action="<?= base_url() ?>admin/">
        <input type="text" name="search_txt" value="<?= $search?>">
        <input type="submit" value="Search User" class="btn btn-primary btn-sm">
        <a href="<?= base_url('admin/reset/'); ?>" class="btn btn-warning btn-sm">Reset</a>
        
    </form>

</div>

<a href="<?= base_url() ?>admin/form" class="btn btn-primary">Add User</a>
<table class="table table-bordered table-striped">
    <tr class="info">
        <td>No</td>
        <td>Name</td>
        <td>Username</td>
        <td>Email</td>
        <td>Role</td>
        <td>State</td>
        <td>Action</td>
    </tr>
    <?php
    foreach ($list_user as $key => $user):
        ?>
        <tr>
            <td><?= ++$row ?></td>
            <td><?= $user->name ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->email ?></td>
            <td><?= $role[$user->role] ?></td>
            <td><?= $state[$user->state] ?></td>
            <td>
                <a href="<?= base_url('admin/update/' . $user->id) ?>"><span class="fa fa-pencil fa-2x"></span></a>
                <a href="<?= base_url('admin/delete/' . $user->id) ?>" onclick="return confirm('Delete user ?')"><span class="fa fa-trash-o fa-2x" style="color:red"></span></a>
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