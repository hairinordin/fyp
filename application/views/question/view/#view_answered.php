<div class="container-fluid">
    <div class="panel-group">
        <div class="panel panel-primary"> 
            <div class="panel-heading"><h3>Tool <?= $tool->tool_no . ' : ' . $tool->tool_title ?></h3></div>
            <div class="panel-body">
                <?php if($information):?>
                <div class="well"><?= $information->info ?></div>
                <?php endif; ?>
                
                <?php 
                
                $option0 = 'disabled';
                $option1 = 'disabled';
                $option2 = 'disabled';
                $option3 = 'disabled';
                $option4 = 'disabled';
                $option5 = 'disabled';

                $date_implement = '';
                $assessment = '';
                
                if(isset($answers2)){
                    $date_implement = $answers2->ans_date_implementation;
                    $assessment = $answers2->ans_self_assessment;
                    
                    if($answers2->ans_self_assessment == 0){
			$option0 = 'checked';
                    }

                    elseif ($answers2->ans_self_assessment == 1) {
		 	$option1 = 'checked';
                    } 
                    elseif ($answers2->ans_self_assessment == 2) {
			$option2 = 'checked';
                    }
                    elseif ($answers2->ans_self_assessment == 3) {
			$option3 = 'checked';
                    }
		
                    elseif ($answers2->ans_self_assessment == 4) {
                            $option4 = 'checked';
                    }

                    elseif ($answers2->ans_self_assessment == 5) {
                            $option5 = 'checked';
                    }
                }
                ?>
                <?php echo form_open_multipart('questions/edit_view/' . $tool->tool_no); ?>
                
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
                                    <?= '<b>' . $main_subject->main_subject . '</b>'?>
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
                                   <?php
                                        foreach($answers as $answer){
                                            
                                            if($answer->id_subject == $question->id){
                                                
                                              ?>
                                    <label class="radio-inline"><input type="radio" name="ans[<?= $question->id ?>]" value="Yes" <?=($answer->answer=='Yes') ? 'checked':'disabled'?>>Yes</label>
                                            <label class="radio-inline"><input type="radio" name="ans[<?= $question->id ?>]" value="No" <?=($answer->answer=='No') ? 'checked':'disabled'?>>No</label>
                                    <?php
                                            }
                                            
                                        }
                                   ?>
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
                                    <?php
                                        foreach($answers as $answer){
                                            
                                            if($answer->id_subject == $question->id){
                                                ?>
                                               <label class="radio-inline"><input type="radio" name="ans[<?= $question->id ?>]" value="Yes" <?=($answer->answer=='Yes') ? 'checked':'disabled'?>>Yes</label>
                                            <label class="radio-inline"><input type="radio" name="ans[<?= $question->id ?>]" value="No" <?=($answer->answer=='No') ? 'checked':'disabled'?>>No</label>
                                     <?php       }
                                            
                                        }
                                   ?>
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
                            'type' => 'date',
                            'value' => $date_implement,
                            'readonly' => 'disabled'
                        );
                        echo form_input($data);
                        ?>

                    </div>

                    <div class="form-group" >
                        <p>Uploaded file(s):</p>

                                               
                    <?php 

	//print_r($emt1_attachments);
	if(!empty($attachments)){
		foreach($attachments as $key => $data){


	//print_r($data); To Do : To fix uploading files cannot be open
	$filename = explode('/',$data->path);
        

?>

<li>
<a href="<?php echo base_url() .$data->path?> " target="_blank"><?php echo $filename[3]?></a>

</li>

        <?php }} ?></div>

                    <table class="table table-bordered">

<?php echo form_label('Self Assessment'); ?>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="0" <?=$option0?>/>
                                    0 - None </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="1" <?=$option1?>/>
                                    1 - Poor </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="2" <?=$option2?>/>
                                    2 - Fair </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="3" <?=$option3?>/>
                                    3 - Average </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="4" <?=$option4?>/>
                                    4 - Good </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="5" <?=$option5?>/>
                                    5 - Excellent </label>
                            </td>
                        </tr>

                    </table>


                    <input type="submit" name="edit_btn" value="Edit">
                </form>
            </div>
        </div>
    </div>
</div>
