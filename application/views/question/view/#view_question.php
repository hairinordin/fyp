<div class="container-fluid">
    <form action="http://localhost/kpigsr4_10/questions/submit_answer" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="panel-group">
        <div class="panel panel-primary"> 
            <div class="panel-heading ">
                <div class="panel-title pull-left"><h3>Tool <?= $tool->tool_no . ' : ' . $tool->tool_title ?></h3></div>
                    
                <div class="panel-title btn-group pull-right">
                    <a href="<?=base_url('questions')?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left" style="font-size:30px;color:whitesmoke"></i></a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save" style="font-size:30px;color:whitesmoke"></i></button>
                <button type="submit" class="btn btn-primary" id="submit_btn"><i class="fa fa-paper-plane" style="font-size:30px;color:whitesmoke"></i></button>
              </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <?php if($information):?>
                <div class="well"><?= $information->info ?></div>
                <?php endif; ?>
                
                
                    <input type="hidden" name="tool_no" value="<?= $tool->tool_no?>" />
                    <table  class="table table-bordered">

                        <tr>
                            <td>
                                No
                            </td>
                            <td>
                                Subject
                            </td>
                            <td>
                                Status
                            </td>
                            <td>
                                Score
                            </td>
                        </tr>

                        
                        
                       <?php
                       $i = 0;
                       
                      
                        foreach($main_subjects as $main_subject) {
                            
                            echo $main_subject->main_subject;
                            
                                ?>
                        <?php if(!empty($main_subject->main_subject)){?>
                        <tr>
                                <td>
                                    <?=++$i?>
                                </td>
                                
                                <td style="width: 50%">
                                    <!--Question -->
                                    <?=  $main_subject->main_subject ?>
                                </td>
                                
                                <td>
                                    
                                </td>
                                <td>

                                </td>
                                
                                </tr> 
                        <?php }?>
                        <?php
                            foreach($questions as $question):    
                            if($question->id_main_subject != 0){
                            
                                if($question->id_main_subject == $main_subject->id){
                        ?>  
                                <tr>
                                <td>
                                    <?//=++$i?>
                                </td>
                                
                                <td style="width: 50% ; padding-left:3em">
                                    <!--Question -->
                                    <?=  $question->subject ?>
                                </td>
                                
                                <td>
                                    <label class="radio-inline"><input type="radio" name="ans[<?= $question->id ?>]" value="Yes">Yes</label>
                                    <label class="radio-inline"><input type="radio" name="ans[<?= $question->id ?>]" value="No">No</label>
                                </td>
                                <td>

                                </td>
                                
                                </tr> 
                        <?php } } else{
                                ?>
                                <tr>
                                <td>
                                    <?=++$i?>
                                </td>
                                
                                <td style="width: 50%">
                                    <!--Question -->
                                    <?= '<b>' . $question->subject .'</b>'?>
                                </td>
                                
                                <td>
                                    <label class="radio-inline"><input type="radio" name="ans[<?= $question->id ?>]" value="Yes">Yes</label>
                                    <label class="radio-inline"><input type="radio" name="ans[<?= $question->id ?>]" value="No">No</label>
                                </td>
                                <td>

                                </td>
                                
                                </tr> 
                                <?php
                            } endforeach; } ?>
                                
                                <?php 
                                // if we want to show the others field question, a dynamic text field ..from my perspective there's only one tool that use it 
                                //Tool No 2. No table field yet to store the value
                                $others_q = 1;
                                    if($others_q == 1):
                                ?>
                                
                                <tr>
                                <td>
                                    <?=++$i?>
                                </td>
                                
                                <td style="width: 50%">
                                    <!--Question -->
                                    <?= '<b>' . 'Others: (Contingency, Plans, Safety equipment)' .'</b>'?>
                                </td>
                                
                                <td>
                                    <label class="radio-inline"><input type="radio" name="" value="Yes">Yes</label>
                                    <label class="radio-inline"><input type="radio" name="" value="No">No</label>
                                </td>
                                <td>

                                </td>
                                
                                </tr> 
                                <?php endif;?>
                    </table>

                    <div class="form-group" style="width: 25%">
                        <?php
                        echo form_label('Date of Implementation');
                        $data = array(
                            'class' => 'form-control',
                            'name' => 'date_implement',
                            'type' => 'date'
                        );
                        echo form_input($data);
                        ?>

                    </div>

                    <div class="form-group" >
                        <p>Upload file(s):</p>

                        <?php if ($this->session->flashdata('upload_fail')): ?>
                            <div class="alert alert-danger">
                                <?php
                                echo $this->session->flashdata('upload_fail');
                                ?>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                        <?php endif; ?>

                        <?php
                        echo form_error('uploaded_docs[]');
                        echo form_upload('uploaded_docs[]', '', 'multiple');
                        ?>
                        <small>File Size : max 3MB each file</small>

                    </div>      

                    <table class="table table-bordered">

<?php echo form_label('Self Assessment'); ?>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="0"/>
                                    0 - None </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="1"/>
                                    1 - Poor </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="2"/>
                                    2 - Fair </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="3"/>
                                    3 - Average </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="4"/>
                                    4 - Good </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="5"/>
                                    5 - Excellent </label>
                            </td>
                        </tr>

                    </table>


                    <input type="submit" name="draft_btn" value="save as draft">    <input type="submit" name="submit_btn">
                
            </div>
        </div>
    </div>
        </form>
</div>
