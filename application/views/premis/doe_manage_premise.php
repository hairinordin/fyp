<?php 
$pub_cb = 'disabled';
$eff_cb = 'disabled';
$bt_cb = 'disabled';
$sewage_cb = 'disabled';
$kks_cb = 'disabled';
$landfill_cb = 'disabled';
$kg_cb = 'disabled';
if ($premise_info->tertakluk_pub == 'T' && $premise_info->pub == 'Y') {
    $pub_cb = 'checked onclick="return false"';
}

if ($premise_info->tertakluk_eff == 'T' && $premise_info->effluent == 'Y') {
    $eff_cb = 'checked onclick="return false"';
}

if ($premise_info->sewage == 'Y' && $premise_info->tertakluk_kum == 'T') {
    $sewage_cb = 'checked onclick="return false"';
}

if ($premise_info->bt == 'Y') {
    $bt_cb = 'checked onclick="return false"';
}

if ($premise_info->kks == 'Y') {
    $kks_cb = 'checked onclick="return false"';
}

if ($premise_info->landfill == 'Y') {
    $landfill_cb = 'checked onclick="return false"';
}

if ($premise_info->kg == 'Y') {
    $kg_cb = 'checked onclick="return false"';
}
?>
<style>
    .error{
        color: red;
    }
</style>
<div class="container-fluid">
<div class="row">
    <a href="<?= base_url('dashboard/#cTotalRegistered') ?>" class="btn btn-default "><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to dashboard</a>
</div>
<h3>Company Information / Management</h3>
<br>

    <div class="row">
        <div class="col-md-5">

            <?= $paparan_maklumat_syarikat ?>
        </div>
        
        <div class="col-md-7">
        <table class="table table-full">
            <thead>
            <th colspan="3">Rules and regulation applied <button class="btn-info" data-toggle="tooltip" title="If you are unsure, please contact DOE for confirmation"><span class="fa fa-info" aria-hidden="true"></span></button></th>
            </thead> 
            <tr>
                <td>

                </td>
                <td>   
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="EFF_cb" value="Effluent" <?= $eff_cb ?>>
                    <label for="EFF_cb">
                        Environmental Quality (Industrial Effluent) 2009
                    </label> 
                </td>

            </tr>  
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="SEWAGE_cb" <?= $sewage_cb ?>>
                    <label for="SEWAGE_cb">
                        Environmental Quality (Sewage) 2009
                    </label> 
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="KKS_cb" <?= $kks_cb ?>>
                    <label for="KKS_cb">
                        Environmental Quality (Prescribe Premise)(Crude Palm Oil) 1977
                    </label> 

                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="SW_cb" value="SW" <?= $bt_cb ?>>
                    <label for="SW_cb">
                        Environmental Quality (Schedule Waste) 2005
                    </label> 
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="CAR_cb" value="CAR" <?= $pub_cb ?>>
                    <label for="CAR_cb">
                        Environmental Quality (Clean Air) 2014
                    </label> 
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="Landfill_cb" value="LANDFILL" <?= $landfill_cb ?>>
                    <label for="Landfill_cb">
                        Environmental Quality (Control of Pollution From Solid Waste Transfer Station and Landfill) 2009
                    </label> 
                </td>
                

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="kg_cb" value="KG" <?= $kg_cb ?>>
                    <label for="kg_cb">
                        Environmental Quality (Prescribe Premise) (Raw Natural Rubber) 1978
                    </label> 
                </td>

            </tr>
        </table>
    </div>




    </div>

<div class="row">
    <div class="col-md-8 text-center">
        <?php if($this->role == 'ADM'):?>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#changePasswordModal" title="Set Password"><i class="fa fa-key" aria-hidden="true"></i> Update Password</button> 
        <?php endif;?>
        &nbsp;
        <button type="button" class="btn btn-warning" title="Sync premise information(i.e. Premise Name, Address, Phone & Fax No, Rules and regulation) with EKAS" onClick="syncEKAS()"><i class="fa fa-refresh" aria-hidden="true"></i> Sync from EKAS</button>
       
<!--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#changePicModal" title="Update Authorised Person"><i class="fa fa-id-badge" aria-hidden="true"></i> Update Authorized Person</button>-->

    </div>
</div>



</div>


<!-- Modal - Change Password -->
<div id="changePasswordModal" class="modal fade" role="dialog">
   
        <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Set Password</h4>
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
            url: "<?php echo base_url('users/update_pwd') ?>",
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
        
        function syncEKAS(){
        var syncForm = $('#formSync');
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('premise/sync/'. $premise_info->idpremis) ?>" ,
            type: "POST",
            data: syncForm.serialize(),
            cache: false,
            success: function (data) {
                var data = JSON.parse(data);
                
                if (data.ajax_status == 'success') {
                    
                    $.notify({
                        message : 'Sync success'
                    },
                    {
                        placement: {
                        from: "top",
                        align: "center"
                        },
                        type: "success"
                    });

                } else {
                   $.notify({
                        message : 'Sync failed'
                    },
                    {
                        placement: {
                        from: "top",
                        align: "center"
                        },
                        type: "danger"
                    });                    
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Sync : Error occured');
            }
        });
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

   });
</script>