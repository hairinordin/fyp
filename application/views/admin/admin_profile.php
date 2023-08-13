
<div class="col-md-8">
        <div class="row">
    
        <h4><small>Name </small><br><?= $profile->name ?> </h4>
       
        </div>
        <div class="row">
            <h4><small>Username </small><br><?= $profile->username ?></h4>
        </div>
        <div class="row">
            <h4><small>Email </small><br><?= $profile->email ?></h4>
        </div>
        
        <div class="row">
            <h4><small>Role </small><?= form_dropdown('role', $this->ref->data('role'),$profile->role, "class='form-control' disabled") ?></h4>
            
        </div>
        <div class="row">
            <h4><small>State </small><?= form_dropdown('state', $this->ref->data('state'),$profile->state, "class='form-control' disabled") ?> </h4>
            
        </div>
    <br>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#changePasswordModal" title="Update Password"><i class="fa fa-key" aria-hidden="true"></i> Update Password</button> 
            
        
    </div><!-- Modal - Change Password -->
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
                        
                        
                            <?= form_hidden('username', $profile->username); ?>                      
                        

                        <tr>
                            <td>
                                Password
                            </td>
                            <td>
                                <?php
                                $data = array(
                                    'class' => 'form-control',
                                    'id' => 'pwd',
                                    'name' => 'password',
                                    'placeholder' => 'Enter Password',
                                    'value' => 'xxxxxxx',
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
                                    'placeholder' => 'Confirm Password',
                                    'value' => 'xxxxxxx',
                                    'required' => true,
                                    'title' => 'Password not match!'
                                );
                                echo form_password($data);
                                ?>
                                
                                <label id="lbl_errpwd" style="color:red; display: none">Password not match!</label>
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

    
    
    <script>
            
   $("#pwd2").keyup(function(){
 
        var password1 = $("#pwd").val();
        var password2 = $("#pwd2").val();
        
        if(password1 == password2) {
             $('#submit-btn').prop('disabled', false);
             $('#lbl_errpwd').hide();
         }
         else {
             $('#submit-btn').prop('disabled', true);
             $('#lbl_errpwd').show();
         }
    });
    
  
    
    function update_pwd() {

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('admin/update_pwd') ?>",
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
        
        }
        </script>