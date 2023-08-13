

<div class="container-fluid">
    <div class="row">
    <a href="<?= base_url('notification')?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to list</a>
<br>
</div>
    <div class="row-fluid">
        <div class="col-md-8">

            <?php //$paparan_maklumat_syarikat ?>
        </div>
        

    </div>
    <div class="row-fluid">
        <div class="col-md-8">
            <legend>List of Email Notifications</legend>
        <table class="table table-bordered">
        <thead>
        <td>No</td><td>Type of Notification</td><td>Email Send Date</td>
        </thead>
        <tbody>
            <?php $i = 0 ?>
            <?php foreach($notifications as $notification): ?>
            <?php 
                if($notification->noti_type == 'V30'){
                    $type = 'Voluntarily - 30 Days reminder';
                } else if($notification->noti_type == 'C15'){
                    $type = 'Compulsary - 15 Due Days reminder';
                } else if($notification->noti_type == 'C30'){
                    $type = 'Compulsary - 30 Due Days reminder';
                } else if($notification->noti_type == 'C31'){
                    $type = 'Compulsary - Exceeded Submission Due Date reminder';
                }
            ?>
            <tr>
                <td><?= ++$i?></td><td><?= $type ?></td><td><?= date("d/m/Y", strtotime($notification->sent_date)) ?></td>
            
            <tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        </div>
        
        

    </div>
    <hr>
    </div>
