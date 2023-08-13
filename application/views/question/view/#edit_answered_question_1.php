<div class="container-fluid">
    <?php echo form_open_multipart('questions/submit_edit_answer/' . $tool->tool_no); ?>
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
                 <?php 

                $option0 = '';
                $option1 = '';
                $option2 = '';
                $option3 = '';
                $option4 = '';
                $option5 = '';

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
                 <?php 
                 $arr = array();
                 foreach($answers as $answer): ?>
                <?php 
                 $arr [$answer->id_question] = $answer->status; 
                ?>
                
                <?php endforeach;?>
                    <input type="hidden" name="tool_no" value="<?= $tool->tool_no?>" />
                    <input type="hidden" name="answer_id" value="<?= $answers2->id?>" />
                    <table  class="table table-bordered">

                        <tr>
                            <td>
                                No
                            </td>
                            <td  style="width: 50%">
                                Subject
                            </td>
                            <td>
                                Status
                            </td>
                            <td>
                                Score
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                              1  
                            </td>
                            <td>
                               EP was prepared for the premise 
                            </td>
                            <td>

                                <label class="radio-inline"><input type="radio" name="tool1-1" value="Yes"<?=($arr['tool1-1']=='Yes') ? 'checked':''?>>Yes</label>
                                <label class="radio-inline"><input type="radio" name="tool1-1" value="No"<?=($arr['tool1-1']=='No') ? 'checked':''?>>No</label>
                                
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                              2  
                            </td>
                            <td>
                               Reflects Management commitment in handling environmental pollution and control, in tandem with Self Regulation culture 
                            </td>
                            <td>
                                <label class="radio-inline"><input type="radio" name="tool1-2" value="Yes"<?=($arr['tool1-2']=='Yes') ? 'checked':''?>>Yes</label>
                                <label class="radio-inline"><input type="radio" name="tool1-2" value="No"<?=($arr['tool1-2']=='No') ? 'checked':' '?>>No</label>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                              3  
                            </td>
                            <td>
                               Reflects Management's new strategy in handling environmental pollution and control, in tandem with Self Regulation culture
                            </td>
                            <td>
                                <label class="radio-inline"><input type="radio" name="tool1-3" value="Yes"<?=($arr['tool1-3']=='Yes') ? 'checked':' '?>>Yes</label>
                                <label class="radio-inline"><input type="radio" name="tool1-3" value="No"<?=($arr['tool1-3']=='No') ? 'checked':' '?>>No</label>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                              4  
                            </td>
                            <td>
                               Evidence EP made aware to premise's staff 
                            </td>
                            <td>
                                <label class="radio-inline"><input type="radio" name="tool1-4" value="Yes"<?=($arr['tool1-4']=='Yes') ? 'checked':' '?>>Yes</label>
                                <label class="radio-inline"><input type="radio" name="tool1-4" value="No"<?=($arr['tool1-4']=='No') ? 'checked':' '?>>No</label>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                              5  
                            </td>
                            <td>
                               Evidence EP made aware to premise's contractors
                            </td>
                            <td>
                                <label class="radio-inline"><input type="radio" name="tool1-5" value="Yes"<?=($arr['tool1-5']=='Yes') ? 'checked':' '?>>Yes</label>
                                <label class="radio-inline"><input type="radio" name="tool1-5" value="No"<?=($arr['tool1-5']=='No') ? 'checked':' '?>>No</label>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                              6  
                            </td>
                            <td>
                               Evidence EP made aware to premise's suppliers
                            </td>
                            <td>
                                <label class="radio-inline"><input type="radio" name="tool1-6" value="Yes"<?=($arr['tool1-6']=='Yes') ? 'checked':' '?>>Yes</label>
                                <label class="radio-inline"><input type="radio" name="tool1-6" value="No"<?=($arr['tool1-6']=='No') ? 'checked':' '?>>No</label>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                              7  
                            </td>
                            <td>
                               Evidence EP made aware to premise's other stakeholders 
                            </td>
                            <td>
                                <label class="radio-inline"><input type="radio" name="tool1-7" value="Yes"<?=($arr['tool1-7']=='Yes') ? 'checked':' '?>>Yes</label>
                                <label class="radio-inline"><input type="radio" name="tool1-7" value="No"<?=($arr['tool1-7']=='No') ? 'checked':' '?>>No</label>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                              8 
                            </td>
                            <td>
                               EP signed by top Management Representative
                            </td>
                            <td>
                                <label class="radio-inline"><input type="radio" name="tool1-8" value="Yes"<?=($arr['tool1-8']=='Yes') ? 'checked':' '?>>Yes</label>
                                <label class="radio-inline"><input type="radio" name="tool1-8" value="No"<?=($arr['tool1-8']=='No') ? 'checked':' '?>>No</label>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                              9  
                            </td>
                            <td>
                               EP up-to-date
                            </td>
                            <td>
                                <label class="radio-inline"><input type="radio" name="tool1-9" value="Yes"<?=($arr['tool1-9']=='Yes') ? 'checked':' '?>>Yes</label>
                                <label class="radio-inline"><input type="radio" name="tool1-9" value="No"<?=($arr['tool1-9']=='No') ? 'checked':' '?>>No</label>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    </table>

                      <div class="form-group" style="width: 25%">
                        <?php
                        echo form_label('Date of Implementation');
                        $data = array(
                            'class' => 'form-control',
                            'name' => 'date_implement',
                            'type' => 'date',
                            'value' => $date_implement
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

<a class="imagelocation<?php echo $data->id?>"  href="<?php echo base_url(). $data->path?> " target="_blank"><?php echo $filename[3]?></a>
<span style="cursor:pointer;" onclick="javascript:deleteimage(<?php echo $data->id ?>)">X</span>
</li>


        <?php }}else{
            
            echo form_error('uploaded_docs[]');
            echo form_upload('uploaded_docs[]','','multiple');
        }
?></div>
        
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


                    <input type="submit" name="draft_btn" value="save as draft">    <input type="submit" name="submit_btn">
                
            </div>
        </div>
    </div>
        </form>
</div>

<script>

function deleteimage(image_id)
{
var answer = confirm ("Are you sure you want to delete this file?");
if (answer)
{
        $.ajax({
                type: "POST",
                url: "<?php echo base_url('questions/deleteFile');?>",
                data: "image_id="+image_id,
                success: function (response) {
                  if (response == 1) {
                    $(".imagelocation"+image_id).remove(".imagelocation"+image_id);
                  };
                  
                }
            });
      }
}
</script>