

<div class="container-fluid">
    <div class="row">
        <a href="<?= base_url('remark') ?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to dashboard</a>
        <br>
    </div>
    <div class="row-fluid">
        <div class="col-md-12">

            <?= $paparan_maklumat_syarikat ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-12">
            <?= $paparan_score ?>
        </div>
    </div>
    <hr>
     <div class="row-fluid">
        <div class="col-md-12">
            
            <?= $paparan_remark ?>
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-md-12">

            <?php if ($status_emt == 3) { //review ?> 
<!-- BEGIN FORM REMARK -->
                <form method="post" action="<?= base_url() ?>remark/pemeriksa_submit/">
                    <div class="well">
                        <?= form_hidden('idpremis', $idpremis) ?>
                        <?= form_hidden('emt_id', $emt_id) ?>
                        <div class="row">
                            <h3>Suggestions to Pegawai Penyelia : </h3>
                            <h4><label class="radio-inline"><input type="radio" name="ketetapan" value="approve" required>Approve</label></h4>
                            <h4><label class="radio-inline"><input type="radio" name="ketetapan" value="reject" required>Reject</label></h4>
   
                        </div>
                        <hr>
                        <div class="row">

                            <div class="control-group">

                                <div class="controls">
                                    <textarea id="textarea_editor"  style="width:100%" rows="5" placeholder="Remark for Pegawai Penyelia" name="commentDOE"></textarea>
                                </div>

                            </div>

                        </div>
                       

                        <div class="row">
                            
                            <div class="col col-md-1"><input type="submit" value="Submit" class="btn btn-primary" onclick="return confirm('Do you want to submit?');"></div>
                        </div>
                    </div>
                </form>
           <!-- END FORM REMARK --> 
     <?php } elseif(in_array ($status_emt, array(9))) { ?>       
           <!-- 
           Return to premise dengan remark untuk premise, dan 
           set submission mereka kepada draft untuk pembetulan
          -->  
           <!-- BEGIN FORM REVERT -->
           <form method="post" action="<?= base_url() ?>remark/set_draft/"  onsubmit="return submitForm(this);">
                    <div class="well">
                        <?= form_hidden('idpremis', $idpremis) ?>
                        <?= form_hidden('emt_id', $emt_id) ?>
                        
                        <div class="row">
                            <h3>Remark for Premise <small> and Set submission to draft</small></h3>
                            <div class="control-group">

                                <div class="controls">
                                    <textarea id="textarea_editor"  style="width:100%" rows="5" placeholder="Remark for Premise" name="comment"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col col-md-1"><input type="submit" value="Submit" class="btn btn-primary" onclick="return confirm('Do you want to submit?');"></div>
                        </div>
                    </div>
                </form>
           <!-- END FORM REVERT -->
   <?php } elseif(in_array ($status_emt, array(10,11)) ){//&& $completeOrNot != 1) { ?>
           <!-- 
           Return to premise dengan remark untuk premise, dan 
           Set notify score
          -->
          
          <?php 
          $chkBox = '';
          $radioApprove = '';
          $radioReject = '';
          
         if($notify == 1){
            $chkBox = 'checked';
         }
         
         if($suggestPL == 'approve'){
            $radioApprove = 'checked';
            
         } else if($suggestPL == 'reject'){
            $radioReject = 'checked';
         }
          ?>
           <!-- BEGIN FORM COMPLETED/REJECT/NOTIFY SCORE -->
           <?php if(!$completeWithComment){ ?>
           <form method="post" action="<?= base_url() ?>remark/set_complete/" onsubmit="return submitForm(this);">
                    <div class="well">
                        <?= form_hidden('idpremis', $idpremis) ?>
                        <?= form_hidden('emt_id', $emt_id) ?>
                        <div class="row">
                            <h3>EMT Assessment Status </h3><!-- buat read only -->
                            <h4><label class="radio-inline"><input type="radio" name="ketetapan" value="approve" <?= $radioApprove?> disabled>Approved</label></h4>
                            <h4><label class="radio-inline"><input type="radio" name="ketetapan" value="reject" <?= $radioReject?> disabled>Rejected</label></h4>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <h3><label class="radio-inline"><input type="checkbox" name="notify" value="1" <?= $chkBox?> disabled>&nbsp;Notify Score</label></h3>    <!-- buat read only -->
                            </div>
                        </div>
                        <div class="row">
                            <h3>Remark to Premise : </h3>
                            <div class="control-group">

                                <div class="controls">
                                    <textarea id="textarea_editor"  style="width:100%" rows="5" placeholder="Remark for Premise" name="comment"></textarea>
                                </div>

                            </div>

                        </div>
                       

                        <div class="row">
                            
                            <div class="col col-md-1"><input type="submit" value="Submit" class="btn btn-primary" onclick="return confirm('Do you want to submit?');"></div>
                        </div>
                    </div>
                </form>
           <?php } ?>
           <!-- END FORM COMPLETED/REJECT/NOTIFY SCORE -->
           
            <?php //} elseif(in_array ($status_emt, array(1,2,4,5,6,7,8,9,10,11,12))) { ?>
                <!--No display needed -->
            <?php } else { ?>
                
            <?php } ?>
        </div></div></div>

<?php
foreach ($list_of_emt as $emt) {
    foreach ($all_remark as $remark):
        if ($remark->emt_id == $emt->id):
            ?>
            <!-- Remark Modal -->
            <div id="myModal<?= $emt->id ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <?= $paparan_remark?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            
        <?php endif; endforeach;?>
            <?php
    
} ?>

            <script>
                function submitForm() {
                    return confirm('Do you really want to submit the form?');
                  }
                </script>