<div class="container-fluid">
    <form id="my_form" action="http://localhost/kpigsr4_10/questions/submit_answer" enctype="multipart/form-data" method="post" accept-charset="utf-8">
         
                <h3>Tool <?= $tool->tool_no . ' : ' . $tool->tool_title . ' ' ?><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" title="How to fill up this form?">?</button></h3>
                    <!-- Trigger the modal with a button -->


                <div class="btn-group pull-right">
                    <a href="<?=base_url('questions')?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left" style="font-size:30px;color:whitesmoke"></i></a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save" style="font-size:30px;color:whitesmoke"></i></button>
                    <button type="submit" class="btn btn-primary" id="submit_btn"><i class="fa fa-paper-plane" style="font-size:30px;color:whitesmoke"></i></button>
                    
                    <?php

	$data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit_btn',
			'value' => 'Submit'
		);
	echo form_submit($data);
        
        	$data = array(
			'class' => 'btn btn-primary',
			'name' => 'draft_btn',
			'value' => 'Draft'
		);
	echo form_submit($data);
	?>
              </div>
                <div class="clearfix"></div>
            
            <div class="panel-body">
                <?php if($information->info):?>
                <div class="well"><?= $information->info ?>
                    
                </div>
                <?php endif; ?>
                
                                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td style="width: 25%">
                                <h4><b>Date of Implementation : </b><?php
                                    $data = array(
                                        'class' => 'form-group',
                                        'name' => 'date_implement',
                                        'type' => 'date'
                                    );
                                    echo form_input($data);
                                    ?> </h4>
                            </td>
                          
                        </tr>

                    </table>

                    </div>
                    <input id="tool_no" type="hidden" name="tool_no" value="<?= $tool->tool_no?>" />
                    
                    <h4 style='text-align: center' class="bg-warning">
                       Is the implementation of the tool <?= $tool->tool_no . ' : ' . $tool->tool_title . ' ' ?> complete?  
                       <br>
                    <label class="radio-inline tool_check"><input id="tool_yes_check" type="radio" name="question_enable" value="true" onclick="enable_input()">Yes</label>
                    <label class="radio-inline tool_check"><input id="tool_no_check" type="radio" name="question_enable" value="false" onclick="disable_input()">No</label>
                    </h4>
                    
                    
                    
                    
                    
                    <table  class="table table-full table-hover">

                        <tr>
                            <td>
                                No
                            </td>
                            <td  style="width: 40%">
                                Subject
                            </td>
                            <td style="width: 25%">
                                Status
                            </td>
                            <td style="width: 25%">
                                
                            </td>
                            <td>
                                Score
                            </td>
                        </tr>
                        <?php // ########  TOOL 2 & 7 ########### ?>
                        <?php 
                        $x= array();
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
                      
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "yesCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="Yes">
                                        <label for="yesCheck<?= $question->id?>">
                                          Yes
                                        </label>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "noCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="No">
                                        <label for="noCheck<?= $question->id?>">
                                          No
                                        </label>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "naCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="Not applicable">
                                        <label for="naCheck<?= $question->id?>">
                                          Not applicable
                                        </label>
                                   
                                    </td>
                                    <td>
                                        <div id='ifNo<?= $question->id?>' style="display:none">
                                                <textarea class="textarea_editor" rows="6" placeholder="Justification " name="<?= $question->id?>[justification]"></textarea><br>
                                        </div>
                                        <?php $x[] = $question->id?>
                                    </td>
                                    <td>
                                        <?= $question->score . '%'?>
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
                               
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "yesCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="Yes">
                                        <label for="yesCheck<?= $question->id?>">
                                          Yes
                                        </label>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "noCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="No">
                                        <label for="noCheck<?= $question->id?>">
                                          No
                                        </label>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "naCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="Not applicable">
                                        <label for="naCheck<?= $question->id?>">
                                          Not applicable
                                        </label>
                            </td>
                            <td>
                                <div id='ifNo<?= $question->id?>' style="display:none">
                                                <textarea class="textarea_editor" rows="6" placeholder="Justification " name="<?= $question->id?>[justification]"></textarea><br>
                                        </div>
                                        <?php $x[] = $question->id?>
                            </td>
                            <td>
                                        <?= $question->score . '%'?>
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
                                    <td  style="background-color: #ccffcc;">
                                        
                                    </td>
                                    <td  style="background-color: #ccffcc;">
                                        
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
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "yesCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="Yes">
                                        <label for="yesCheck<?= $question->id?>">
                                          Yes
                                        </label>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "noCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="No">
                                        <label for="noCheck<?= $question->id?>">
                                          No
                                        </label>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "naCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="Not applicable">
                                        <label for="naCheck<?= $question->id?>">
                                          Not applicable
                                        </label>
                                        
                                        <?php } elseif ($question->id_tool == 4 || $question->id_tool == 6 ){ ?>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "yesCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="Yes">
                                        <label for="yesCheck<?= $question->id?>">
                                          Yes
                                        </label>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "noCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="No">
                                        <label for="noCheck<?= $question->id?>">
                                          No
                                        </label>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "naCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="Not applicable">
                                        <label for="naCheck<?= $question->id?>">
                                          Not applicable
                                        </label>
                                        
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div id='ifNo<?= $question->id?>' style="display:none">
                                                <textarea class="textarea_editor" rows="6" placeholder="Justification " name="<?= $question->id?>[justification]"></textarea><br>
                                        </div>
                                        <?php $x[] = $question->id?>
                                    </td>
                                    <td>
                                        <?= $question->score . '%'?>
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
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "yesCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="Yes">
                                        <label for="yesCheck<?= $question->id?>">
                                          Yes
                                        </label>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "noCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="No">
                                        <label for="noCheck<?= $question->id?>">
                                          No
                                        </label>
                                        
                                        <input class="magic-radio radio-inline" type="radio" name="radio" id = "naCheck<?= $question->id?>" onclick="yesnoCheck()" name="<?= $question->id?>[status]" value="Not applicable">
                                        <label for="naCheck<?= $question->id?>">
                                          Not applicable
                                        </label>
                                    </td>
                                    <td>
                                        <div id='ifNo<?= $question->id?>' style="display:none">
                                                <textarea class="textarea_editor" rows="6" placeholder="Justification " name="<?= $question->id?>[justification]"></textarea><br>
                                        </div>
                                        <?php $x[] = $question->id?>
                                    </td>
                                    <td>
                                        <?= $question->score . '%'?>
                                    </td>
                                 </tr>
                                
                                 <?php endforeach; ?>
                            
                        <?php endif?>
                    </table>

                    <div class="row">
                       <h4><b>Upload file(s):</b></h4>

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
                        <small>File Size : max 30MB</small>
                    </div>
                    <br>
                    
                    <div class="row">
                        <input type="button" value="Click here to update score" >
                    </div>
                    <br>
                    
                    <div class="row">
                    <table class="table table-bordered">
<!-- Auto Calculated based on score -->
<?php echo form_label('Assessment of strength of Tool ' .$tool->tool_no . ' : ' . $tool->tool_title); ?>
                        <tr>
                            <p>
<!--  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">-->
  <div>
	<input type="text" id="value">
	<input type="button" id="btn" value="ok">
</div>
<div class="progress">
  <div class="progress-bar progress-bar-custom progress-bar-striped" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="50" style="width: 50%;">
    <span class="sr-only">60% Complete</span>
  </div>
</div>
</p>
 
<!--<div id="slider"></div>-->
<!--                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="1" disabled/>
                                    1 - Poor </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="2" disabled/>
                                    2 - Fair </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="3" disabled/>
                                    3 - Average </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="4" disabled/>
                                    4 - Good </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="self_assessment" value="5" disabled/>
                                    5 - Excellent </label>
                            </td>-->
                        </tr>

                    </table>           
            </div>
            </div>
        </form>
</div>


<?php //print_r($x)?>
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
      
      

      });
      
      
          //ENABLE/DISABLE QUESTION
        function disable_input(){
        $("#my_form :input").attr("disabled", true).addClass('ui-state-disabled');
        $("#tool_yes_check").attr("disabled", false);
        $("#tool_no_check").attr("disabled", false);
        //$("#submit_btn").attr("disabled", false);
        $("#tool_no").attr("disabled", false);
        }
    
        function enable_input(){
        $("#my_form :input").attr("disabled", false);
        $("#tool_yes_check").attr("disabled", false);
        $("#tool_no_check").attr("disabled", false);
        $("#tool_no").attr("disabled", false);
        }
        
        //ENABLE/DISABLE JUSTIFICAITON CHECK
        
        var varray = <?php echo json_encode($x) ?>;
        
        console.log(varray.toString());
        
        function yesnoCheck() {
            
            $.each(varray , function( index, value ) {
                if (document.getElementById('noCheck' + value).checked) {
                    document.getElementById('ifNo' + value).style.display = 'block';
                    }
                    else document.getElementById('ifNo' + value).style.display = 'none';
              });
        

        }    
        
        //Progress bar 
        $(function(){
	$('#btn').click(function(){
		var v=$('#value').val();
		
		$('.progress-bar').attr('style',"width:"+v+"%;");
	});
});
        
</script>
  