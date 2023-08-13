<?php 
     $arr = array();
     foreach($answers as $answer) 
    {
        $arr [$answer->id_question] = $answer->status; 
    }
                
                $stylizeCol1 = " ";
                $stylizeCol2 = " ";
                $stylizeCol3 = " ";
                $stylizeCol4 = " ";
                $stylizeCol5 = " ";
                
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
                    
                    if ($answers2->ans_self_assessment == 1) {
		 	$option1 = 'checked';
                        $stylizeCol = "style='color: #fff; background: #007fff;'";
                    } 
                    elseif ($answers2->ans_self_assessment == 2) {
			$option2 = 'checked';
                        $stylizeCo2 = "style='color: #fff; background: #007fff;'";
                    }
                    elseif ($answers2->ans_self_assessment == 3) {
			$option3 = 'checked';
                        $stylizeCo3 = "style='color: #fff; background: #007fff;'";
                    }
		
                    elseif ($answers2->ans_self_assessment == 4) {
                            $option4 = 'checked';
                            $stylizeCo4 = "style='color: #fff; background: #007fff;'";
                    }

                    elseif ($answers2->ans_self_assessment == 5) {
                            $option5 = 'checked';
                            $stylizeCol5 = "style='color: #fff; background: #007fff;'";
                    }
                }
?>
 
                
<div class="container-fluid">
    <form action="http://localhost/kpigsr4_10/score/submit" enctype="multipart/form-data" method="post" accept-charset="utf-8">
       
               <h3>Tool <?= $tool->tool_no . ' : ' . $tool->tool_title . ' '?><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" title="How to fill up this form?">?</button></h3>
    
                <?php if($information->info):?>
                <div class="well"><?= $information->info ?>
                    
                </div>
                <?php endif; ?>
                
                                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td style="width: 25%">
                                <h4><b>Date of Implementation : </b></h4><h3><?php
                                    $data = array(
                                        'class' => 'form-group',
                                        'name' => 'date_implement',
                                        'type' => 'date',
                                        'value' => $answers2->ans_date_implementation,
                                        'readonly' => 'true'
                                     
                                    );
                                    echo form_input($data);
                                    ?></h3> 
                            </td>
                            
                        <td  style="width: 25%">

                          
                            <h4><b>Upload file(s):</b></h4>

                        <?php if ($this->session->flashdata('upload_fail')): ?>
                            <div class="alert alert-danger">
                                <?php
                                echo $this->session->flashdata('upload_fail');
                                ?>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                        <?php endif; ?>
                           <?php if($attachments):?> 
                        <?php
                        foreach($attachments as $key => $data){
                            //print_r($data); To Do : To fix uploading files cannot be open
                            $filename = explode('/',$data->path);
                            
                        ?>
                            <li>

                            <a class="imagelocation<?php echo $data->id?>"  href="<?php echo base_url(). $data->path?> " target="_blank"><?php echo $filename[3]?></a>
                            </li>
                        
                        <?php } else: ?>
                        <br>
                        <small>No file(s) uploaded</small>
                        <?php endif; ?>
                    
                        </td>
                         <td  style="width: 25%">
                            <h4><b>Evaluation : </b></h4><h3><?php
                                    $data = array(
                                        'class' => 'form-group',
                                        'name' => 'evaluation',
                                        'maxlength'     => '2',
                                        'size'          => '2'
                                     
                                    );
                                   
                                    echo form_input($data);
                                    ?>/ <?= $tool->tool_full_score?></h3> 
                        </td>
                        </tr>
                       
                    </table>

                    </div>
                    <input type="hidden" name="tool_no" value="<?= $tool->tool_no?>" />
                    <table  class="table table-full table-hover">

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
                                Marks
                            </td>
                        </tr>
                        <?php // ########  TOOL 2 & 7 ########### ?>
                        <?php 
                        if($tool->tool_no == '2'  || $tool->tool_no == '7'):?>
                        <?php foreach($questions_title as $title):?>
                        <?php //print title?>
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td style="background-color: #ccffcc;">
                                       <?= $title->main_subject  ?>
                                    </td>
                                    <td style="background-color: #ccffcc;">

                                    </td>
                                    <td style="background-color: #ccffcc;">

                                    </td>
                                 </tr>
                        
                            <?php foreach($questions as $question): ?>
                            <?php 
                            // kalau ada title untuk question
                            if($question->id_question_title != NULL && $question->id_question_title == $title->id ){
                                ?> 
                                 
                                 <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        <?= $question->subject ?>
                                        
                                       <?php 
                                       // Tool 2 ada dynamic question
                                       if($question->custom_question == 'Yes'): 
                                           
                                           ?>  
<!--                                        <div class="input-group control-group after-add-more">
			
			
                                        <input type="text" name="addmore[]" class="form-control" placeholder="Title">
                                            <div class="input-group-btn"> 
                                                  <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                            </div>
                                        
                                       </div>
                                       <div class="copy-fields hide">
                                        <div class="control-group input-group" style="margin-top:10px">
                                          <input type="text" name="addmore[]" class="form-control" placeholder="Title">
                                          <div class="input-group-btn"> 
                                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                          </div>
                                        </div>
                                      </div>-->
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <label class="radio-inline"><input class="status-option" type="radio" name=<?= $question->id?> value="Yes"<?=($arr[$question->id]=='Yes') ? 'checked':'disabled'?>>Yes</label>
                                        <label class="radio-inline"><input class="status-option" type="radio" name=<?= $question->id?> value="No"<?=($arr[$question->id]=='No') ? 'checked':'disabled'?>>No</label>
                                    </td>
                                    <td>
                                        
                                    </td>
                                 </tr>
                                
                                 
                            <?php } else {?>
                        <tr>
                            <td>
                               
                            </td>
                            <td>
                                <?= $question->subject ?>
                                        
                                       <?php if($question->custom_question == 'Yes'): ?>  
<!--                                <div class="input-group control-group after-add-more">
			
			
                                        <input type="text" name="addmore[]" class="form-control" placeholder="Title">
                                            <div class="input-group-btn"> 
                                                  <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                            </div>
                                       </div>
                                
                                       <div class="copy-fields hide">
                                        <div class="control-group input-group" style="margin-top:10px">
                                          <input type="text" name="addmore[]" class="form-control" placeholder="Title">
                                          <div class="input-group-btn"> 
                                              <span class="input-group-btn">
                                              <button class="btn btn-secondary" type="button"><i class="glyphicon glyphicon-plus"></i> Yes</button>
                                              <button class="btn btn-secondary" type="button"><i class="glyphicon glyphicon-minus"></i> No</button>
                                              
                                                <button class="btn btn-danger remove" type="button">
                                                
                                                    <i class="glyphicon glyphicon-remove"></i> Remove
                                                </button></span>
                                          </div>
                                        </div>
                                      </div>
                                        -->
                                
                                        <?php endif ?>
                            </td>
                            <td>
                               
                               <label class="radio-inline"><input class="status-option" type="radio" name=<?= $question->id?> value="Yes"<?=($arr[$question->id]=='Yes') ? 'checked':'disabled'?>>Yes</label>
                                        <label class="radio-inline"><input class="status-option" type="radio" name=<?= $question->id?> value="No"<?=($arr[$question->id]=='No') ? 'checked':'disabled'?>>No</label>
                                
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        
                            <?php } endforeach;                    endforeach;?>
                        
                        <?php // ########  TOOL 3 & 4 & 6 ########### ?>
                        <?php 
                        elseif($tool->tool_no == '3' || $tool->tool_no == '4' || $tool->tool_no == '6' ):?>
                        <?php foreach($questions_title as $title):?>
                        <?php //print title?>
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td style="background-color: #ccffcc;">
                                       <?= $title->main_subject  ?>
                                    </td>
                                    <td style="background-color: #ccffcc;">

                                    </td>
                                    <td style="background-color: #ccffcc;">

                                    </td>
                                    <td style="background-color: #ccffcc;">

                                    </td>
                                 </tr>
                        
                            <?php foreach($questions as $question): ?>
                            <?php 
                            // kalau ada title untuk question
                            if($question->id_question_title != NULL && $question->id_question_title == $title->id ){
                                ?> 
                                 
                                 <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                       <?= $question->subject ?>
                                        
                                       <?php if($question->custom_question == 'Yes'): ?>  
<!--                                        <div class="input-group control-group after-add-more">
			
			
                                        <input type="text" name="addmore[]" class="form-control" placeholder="Title">
                                            <div class="input-group-btn"> 
                                                  <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                            </div>
                                        
                                       </div>
                                       <div class="copy-fields hide">
                                        <div class="control-group input-group" style="margin-top:10px">
                                          <input type="text" name="addmore[]" class="form-control" placeholder="Title">
                                          <div class="input-group-btn"> 
                                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                          </div>
                                        </div>
                                      </div>-->
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php if($question->id_tool == 3){ ?>
                                            <label class="radio-inline"><input class="status-option" type="radio" name=<?= $question->id?> value="Yes"<?=($arr[$question->id]=='Yes') ? 'checked':'disabled'?>>Yes</label>
                                            <label class="radio-inline"><input class="status-option" type="radio" name=<?= $question->id?> value="No"<?=($arr[$question->id]=='No') ? 'checked':'disabled'?>>No</label>
                                        <?php } elseif ($question->id_tool == 4 || $question->id_tool == 6 ){ ?>
                                            <label class="radio-inline"><input class="status-option" type="radio" name=<?= $question->id?> value="Yes"<?=($arr[$question->id]=='Yes') ? 'checked':'disabled'?>>Yes</label>
                                            <label class="radio-inline"><input class="status-option" type="radio" name=<?= $question->id?> value="No"<?=($arr[$question->id]=='No') ? 'checked':'disabled'?>>No</label>
                                            <label class="radio-inline"><input class="status-option" type="radio" name="<?= $question->id?>" value="Not applicable"<?=($arr[$question->id]=='Not applicable') ? 'checked':'disabled'?>>Not applicable</label>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        
                                    </td>
                                 </tr>
                                
                                 
                            <?php }  endforeach;                    endforeach;?>
                                
                                <?php //kalau tool ini tiada main subject ########  TOOL 1 & 5 ########### ?>
                        
                        <?php elseif ($tool->tool_no == '1' || $tool->tool_no == '5'):?>
                          <?php foreach($questions as $question): ?>
                            
                                 <tr>
                                    <td>
                                        
                                    </td>
                                    <td>
                                       <?= $question->subject ?>
                                    </td>
                                    <td>
                                        <label class="radio-inline"><input class="status-option" type="radio" name=<?= $question->id?> value="Yes"<?=($arr[$question->id]=='Yes') ? 'checked':'disabled'?>>Yes</label>
                                            <label class="radio-inline"><input class="status-option" type="radio" name=<?= $question->id?> value="No"<?=($arr[$question->id]=='No') ? 'checked':'disabled'?>>No</label>
                                    </td>
                                    <td>
                                        
                                    </td>
                                 </tr>
                                
                                 <?php endforeach; ?>
                            
                        <?php endif?>
                    </table>

                    <table class="table table-bordered">

<?php echo form_label('Assessment of strength of Tool ' .$tool->tool_no . ' : ' . $tool->tool_title); ?>
                        <tr>
                            <td <?=$stylizeCol1 ?>>
                                <label>
                                    <input type="radio" name="self_assessment" value="1" <?=$option1 ?>/>
                                    1 - Poor </label>
                            </td>
                            <td <?=$stylizeCol2 ?>>
                                <label>
                                    <input type="radio" name="self_assessment" value="2" <?=$option2 ?>/>
                                    2 - Fair </label>
                            </td>
                            <td <?=$stylizeCol3 ?>>
                                <label>
                                    <input type="radio" name="self_assessment" value="3" <?=$option3 ?>/>
                                    3 - Average </label>
                            </td>
                            <td <?=$stylizeCol4 ?>>
                                <label>
                                    <input type="radio" name="self_assessment" value="4" <?=$option4 ?>/>
                                    4 - Good </label>
                            </td>
                            <td <?=$stylizeCol5 ?>>
                                <label>
                                    <input type="radio" name="self_assessment" value="5" <?=$option5 ?>/>
                                    5 - Excellent </label>
                            </td>
                        </tr>

                    </table>
        </form>
</div>

<!-- Modal - How to fill up the form -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          
        <h4 class="modal-title">Explanatory notes for filling out the form</h4>
      </div>
      <div class="modal-body">
        <p><?= $howto_info->howto_text ?></p>
      </div>
    </div>

  </div>
</div>

<script>
  $(document).ready(function() {  
    //OPTION BOX STYLE
  $( function() {
    $( ".status-option" ).checkboxradio({
      icon: false
    });
  } );
  
  //DYNAMIC INPUT
  //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
      $(".add-more").click(function(){ 
          var html = $(".copy-fields").html();
          $(".after-add-more").after(html);
      });
//here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
      
      $("")
      });
  </script>
  