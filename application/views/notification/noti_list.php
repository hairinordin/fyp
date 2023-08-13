<legend>List of Premises Notification  <small>
        <a href="<?= base_url('notification/by_list/'); ?>" data-toggle="tooltip" title="Display by list">By List</a> | 
        <a href="<?= base_url('notification/index/'); ?>" data-toggle="tooltip" title="Display by premise">By Premise</a></small></legend> 
<div class="row">
    <div class="col-md-12 well">
        <form method="post" action="<?= base_url() ?>notification/by_list/">
            <div class="form-group col-md-4">   
                <input type="text" class="form-control" name="search_txt" placeholder="Search" value="<?= $search ?>"> 
            </div>
            <div class="form-group col-md-3">
                <button type="submit" value="Search" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
                <a href="<?= base_url('notification/by_list_reset/'); ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Reset">Reset</a>
            </div>

        </form>

    </div>
    <div class="col-md-12">
        <label>No of records : <?= $total_rows ?></label>
    </div>
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>No</th>
            <th>Premise Name</th>
            <th>Branch</th>
            <th>State</th>
            <th>Type of Notification</th>
            <th>Date Sent</th>
            <th></th>
            </thead>
            
            <?php foreach ($premis_berdaftar as $premise): ?>
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
                        <?php 
                    
                        if($premise->noti_type == 'V30'){
                            $type = 'Voluntarily - 30 Days reminder';
                        } else if($premise->noti_type == 'C15'){
                            $type = 'Compulsary - 15 Due Days reminder';
                        } else if($premise->noti_type == 'C30'){
                            $type = 'Compulsary - 30 Due Days reminder';
                        } else if($premise->noti_type == 'C31'){
                            $type = 'Compulsary - Exceeded Submission Due Date reminder';
                        }
                    
                        echo $type;
                    
                    ?>
                    </td>
                    <td>
                        
                        <?php 
                            if($premise->sent_date){
                              echo date("d/m/Y", strtotime($premise->sent_date));
                            }
                         ?>
                    </td>
                    
<!--                    <td>
                        <?php foreach($notifications as $notification){ ?>
                        <?php if($notification->idpremis == $premise->idpremis){ ?>
                        <a href="<?= base_url() . 'notification/details/' . $premise->idpremis . '/'. $premise->id ?>">Notification List</a> 
                        <?php }} ?>
                        <a href="<?= base_url() . 'remark/form/' . $premise->idpremis ?>">Supervisor form</a> 
                    </td>-->
                </tr>
                 <!--<tr id="stuff<?= $i ?>">
                    <td colspan="5">
                        <table class="table table-striped">
                            <thead>
                                <th>
                                    Tool No
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tr>
                                <td> Tool 1 </td>
                                <td> Submit</td>
                                <td>  View | Set to draft | Marking</td>
                            </tr>
                            <tr>
                                <td> Tool 2 </td>
                                <td> Draft</td>
                                <td>  View | Set to draft | Marking</td>
                            </tr>
                            <tr>
                                <td> Tool 3 </td>
                                <td> Draft</td>
                                <td>  View | Set to draft | Marking</td>
                            </tr>
                            <tr>
                                <td> Tool 4 </td>
                                <td> Draft</td>
                                <td>  View | Set to draft | Marking</td>
                            </tr>
                            
                        </table>
                    </td>
                </tr>-->
            <?php endforeach; ?>



        </table>
        <nav aria-label="Page navigation">
    <ul class="pagination">
        <?php echo $this->pagination->create_links(); ?>
    </ul>
</nav>
    </div></div>

<!--
<script>
$(document).ready(function(){
    
    var no_of_premises = parseInt("<?php echo $i ?>");
    
    
    
    
    for(i = 1; i <= no_of_premises; i++){
    //$("#stuff1"+i).hide();
    //$("#stuff2").hide();
    var toggle = "#toggle";
    var stuff = "#stuff";
    
    toggle += i;
    stuff += i;
    
    console.log(toggle);
    console.log(stuff);
    $(toggle).click(function(){
        $(stuff).toggle('slow');
    });
    
    //$("#toggle2").click(function(){
        //$("#stuff2").toggle('slow');
    //});
    }
});
</script>

$("#new_grouping_"+i).val("something"); -->