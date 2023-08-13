<style>
    .error{
        color: red;
    }
</style>
<div class="container-fluid">
<div class="row">
    <a href="<?= base_url('dashboard/company') ?>" class="btn btn-default "><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to dashboard</a>
</div>
<h3>Company Information / Management</h3>
<br>

    <div class="row">
        <div class="col-md-8">

            <?= $paparan_maklumat_syarikat ?>
        </div>



    </div>

<div class="row">
    <div class="col-md-8 text-center">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#changePasswordModal" title="Update Password"><i class="fa fa-key" aria-hidden="true"></i> Update Password</button> 
        &nbsp;
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#changePicModal" title="Update Authorised Person"><i class="fa fa-id-badge" aria-hidden="true"></i> Update Authorized Person</button>

    </div>
</div>



</div>


<!-- Modal - Change Password -->
<div id="changePasswordModal" class="modal fade" role="dialog">
   
        <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Change Password</h4>
                </div>
                <div class="modal-body">
                    <form id="formChangePassword" class="form-horizontal" action="#">
                    <table class="table table-condensed">
                        <thead>
                        <th colspan="2">

                            <?php echo form_error('confirm_password', '<p class="bg-danger">', '</p>'); ?>
                        </th>
                        </thead>
                        <tr>
                            <?= form_hidden('namapremis', $premise_info->namapremis); ?>
                            <?= form_hidden('nofaildoe', $premise_info->nofaildoe); ?>
                            <?= form_hidden('idpremis', $premise_info->idpremis); ?>
                            <td>
                                Username
                            </td>
                            <td>
                                <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'name' => 'username',
                                    'value' => $premise_info->username,
                                    'readonly' => 'true'
                                );
                                echo form_input($data);
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                New Password
                            </td>
                            <td>
                                <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'pwd',
                                    'name' => 'password',
                                    'placeholder' => 'Enter New Password',
                                    'value' => '',
                                    'required' => true
                                );
                                echo form_password($data);
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Confirm Password
                            </td>
                            <td>
                                <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'pwd2',
                                    'equalTo' => '#pwd',
                                    'name' => 'confirm_password',
                                    'placeholder' => 'Confirm New Password',
                                    'value' => '',
                                    'required' => true,
                                    'title' => 'Password not match!'
                                );
                                echo form_password($data);
                                ?>
                            </td>
                        </tr>
                    </table>
                  </form>
                </div>
                <div class="modal-footer">
                     <?php
                                $data = array(
                                    'class' => 'btn btn-primary',
                                    'name' => 'submit',
                                    'id' => 'submit-btn',
                                    'value' => 'Update',
                                    'onClick' => 'update_pwd()'
                                );
                                echo form_submit($data);
                                ?>
                </div>
            </div>

        </div>
</div>


<!-- Modal - Change Authorised Person -->

<div id="changePicModal" class="modal fade" role="dialog">
   
        <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Change Authorized Person</h4>
                </div>
                <div class="modal-body">
                    <form id="formChangePic" class="form-horizontal" action="#" >
                    <table class="table table-condensed">  
                        <tr>
                            <?= form_hidden('namapremis', $premise_info->namapremis); ?>
                            <?= form_hidden('nofaildoe', $premise_info->nofaildoe); ?>
                            <?= form_hidden('idpremis', $premise_info->idpremis); ?>
                            <td>
                                Email
                            </td>
                            <td>
                                
                                
                                <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'type' => 'email',
                                    'name' => 'email',
                                    'value' => $premise_info->email,
                                    'required' => true
                                );
                                echo form_input($data);
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'name' => 'picname',
                                    'value' => $premise_info->name,
                                    'required' => true
                                );
                                echo form_input($data);
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                IC No
                            </td>
                            <td>
                                <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'type' => 'number',
                                    'name' => 'icno',       
                                    'value' => $premise_info->ic_no,
                                    'required' => true,
                                );
                                echo form_input($data);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Designation
                            </td>
                            <td>
                                <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'name' => 'pos',       
                                    'value' => $premise_info->position,
                                    'required' => true,
                                );
                                echo form_input($data);
                                ?>
                            </td>
                        </tr>
                    </table>
                        <?php
                                $data = array(
                                    'class' => 'btn btn-primary',
                                    'name' => 'submit',
                                    'id' => 'submit-btn',
                                    'value' => 'Update'
                                );
                                echo form_submit($data);
                                ?>
                  </form>
                </div>
                <div class="modal-footer">
                     
                </div>
            </div>

        </div>
</div>

<script>
    function update_pwd() {
        
        var ready = false;
 
        if(!$('#pwd, #pwd2').val())
        {
           ready = false;
        }
        else {
           ready = true;
        }

        
        if(ready){
           //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('users/update_pwd') ?>",
            type: "POST",
            data: $('#formChangePassword').serialize(),
            cache: false,
            success: function (data) {
                var data = JSON.parse(data);
                
                if (data.ajax_status == 'success') {
                    
                   $.notify({
                        message : 'Password changed successfully'
                    },
                    {
                        placement: {
                        from: "top",
                        align: "center"
                        },
                        type: "success"
                    });

                    $('#changePasswordModal').modal('hide');
                } else {
                    $.notify({
                        message : 'Password changed failed'
                    },
                    {
                        placement: {
                        from: "top",
                        align: "center"
                        },
                        type: "danger"
                    });
                    
                    //$('#searchModal').html('hello hello');
                    
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        }); 
        } else {
            alert("Field is empty");
        }
 
        }
        
    $(document).ready(function() {
    

   $("#pwd2").keyup(function(){
 
        var password1 = $("#pwd").val();
        var password2 = $("#pwd2").val();
        
        if(password1 == password2) {
             $('#submit-btn').prop('disabled', false);
         }
         else {
             $('#submit-btn').prop('disabled', true);
         }
    });
    
  
    
    
      
        
        
        var picForm = $('#formChangePic');

        picForm.on('submit', function(ev){
        ev.preventDefault();

         //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('users/update_pic') ?>",
            type: "POST",
            data: $('#formChangePic').serialize(),
            cache: false,
            success: function (data) {
                var data = JSON.parse(data);
                
                if (data.ajax_status == 'success') {
                    
                    $.notify({
                        message : 'Update success'
                    },
                    {
                        placement: {
                        from: "top",
                        align: "center"
                        },
                        type: "success"
                    });
                    
                    $('#changePicModal').modal('hide');
                } else {
                   $.notify({
                        message : 'Update failed'
                    },
                    {
                        placement: {
                        from: "top",
                        align: "center"
                        },
                        type: "danger"
                    });
                    
                    //$('#searchModal').html('hello hello');
                    
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    });
    });
</script>