<?php
//untuk count element 
$x = array();
$y = array();
?>
<input type="submit" class="btn btn-lg"
               value="Edit" onclick="edit_form()" />

    <form id="myForm" action="<?php //echo base_url('questions/submit_answer2') ?>" data-toggle="validator" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" id="method" name='method' value="submit">
        <input type="hidden" id="data_id" name='data_id' value="">
        <!-- SmartWizard html  -->
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Step 1<br /><small>Tool 1 : EP</small></a></li>
                <li><a href="#step-2">Step 2<br /><small>Tool 2 : EB</small></a></li>
                <li><a href="#step-3">Step 3<br /><small>Tool 3 : EMC</small></a></li>
                <li><a href="#step-4">Step 4<br /><small>Tool 4 : EF</small></a></li>
                <li><a href="#step-5">Step 5<br /><small>Tool 5 : EC</small></a></li>
                <li><a href="#step-6">Step 6<br /><small>Tool 6 : ERC</small></a></li>
                <li><a href="#step-7">Step 7<br /><small>Tool 7 : ET</small></a></li>
                <li><a href="#step-8">Step 8<br /><small>Submission</small></a></li>
            </ul>

            <div>




                <!--        <div class="btn-group pull-right">
                                      <a href="<?= base_url('questions') ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left" style="font-size:30px;color:whitesmoke"></i></a>
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-save" style="font-size:30px;color:whitesmoke"></i></button>
                                      <button type="submit" class="btn btn-primary" id="submit_btn"><i class="fa fa-paper-plane" style="font-size:30px;color:whitesmoke"></i></button>
                
                <?php
                $data = array(
                    'class' => 'btn btn-primary',
                    'name' => 'submit_btn',
                    'value' => 'Submit'
                );
                //echo form_submit($data);

                $data = array(
                    'class' => 'btn btn-primary',
                    'name' => 'draft_btn',
                    'value' => 'Draft'
                );
                //echo form_submit($data);
                ?>
                                </div>-->
                <?php $j = 0; ?>
<?php foreach ($tools as $tool): ?> 
                    <div id="step-<?= ++$j ?>" class="clear<?= $j ?>">
                        <div id="form-step-<?= $j - 1 ?>" role="form" data-toggle="validator">
                            <h3>Tool <?= $tool->tool_no . ' : ' . $tool->tool_title . ' ' ?><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#howtoFill<?= $tool->tool_no ?>" title="How to fill up this form?">?</button></h3>
                            <!-- Trigger the modal with a button -->



                            <div class="clearfix"></div>

                            <div class="panel-body">
                                <?php
                                foreach ($information as $info):

                                    if ($info->id_tool == $tool->id):
                                        ?>
            <?php if ($info->info): ?>
                                            <div class="well"><?= $info->info ?>

                                            </div>
                                            <?php
                                        endif;

                                    endif;

                                endforeach;
                                ?>

                              
                                <div class="form-group col-md-12">
                                <h4 style='text-align: center'>
                                    Is the implementation of the tool <?= $tool->tool_no . ' : ' . $tool->tool_title . ' ' ?> complete?  
                                   <br>
                                    <label class="radio-inline tool_check"><input id="tool<?= $tool->tool_no ?>_yes_check" type="radio" name="question_enable_tool<?= $tool->tool_no ?>" value="true" >Yes</label> <!-- temporary remove required -->
                                    <label class="radio-inline tool_check"><input id="tool<?= $tool->tool_no ?>_no_check" type="radio" name="question_enable_tool<?= $tool->tool_no ?>" value="false"  >No</label>
                                    <br><br>
                                   
                                    <div id="justification_implement<?= $tool->tool_no ?>" style="display:none">
                                        Justification is required, before proceeding
                                        <div class="panel-body">
                                           <input type="hidden" value="<?= $tool->tool_no ?>" name="tool<?= $tool->tool_no ?>">
                                                    <div id='implementation_tool_justification<?= $tool->tool_no ?>'>
                                                        <textarea id='tool_no_justification<?= $tool->tool_no ?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no ?>"></textarea><br>
<!--                                                        <button onclick='submit_justification(<?= $tool->tool_no ?>)'>submit</button>-->
                                                    </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <button id="btn_tool<?= $tool->tool_no?>" type="button" class="btn btn-info" style="display:none">Justification</button>
                                </h4>
                                    
                                    <div class="help-block with-errors" style='text-align: center'></div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <table class="table">
                                        <tr>
                                            <td style="width: 25%">
                                                <h4><b>Date of Implementation : </b><?php
                                                    $data = array(
                                                        'class' => 'form-control',
                                                        'name' => 'date_implement#' . $tool->id,
                                                        'placeholder' => 'Select date',
                                                        'type' => 'date'
                                                    );
                                                    echo form_input($data);
                                                    ?> </h4>
                                                <div class="help-block with-errors"></div>
                                            </td>

                                        </tr>

                                    </table>

                                </div>
                                </div>
                                <div id="table-overlay<?= $tool->tool_no ?>">
                               <table  id="table-tool<?= $tool->tool_no ?>" class="table table-full ">

                                    <tr>
                                        <td>
                                            No
                                        </td>
                                        <td  style="width: 40%">
                                            Subject
                                        </td>
                                        <td style="width: 25%">
                                            Status
                                            <table class="table borderless">
                                                <tr>
                                                    <td style="width:114px">
                                                        <b>Yes</b> 
                                                    </td>
                                                    <td  style="width:114px">
                                                        <b>No</b> 
                                                    </td>
                                                    <td  style="width:115px">
                                                        <b>Not applicable</b> 
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="width: 25%">

                                        </td>
                                        <td>
                                           
                                        </td>
                                    </tr>
                                    <?php // ########  TOOL 2 & 7 ########### ?>
                                    <?php if ($tool->tool_no == '2' || $tool->tool_no == '7'): ?>
                                        <?php foreach ($questions_title as $titles): ?>

                                            <?php
                                            foreach ($titles as $title) {
                                                if ($tool->tool_no == $title->id_tool) {
                                                   
                                                    ?>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td style="background-color: #ccffcc;">
                    <?= $title->main_subject ?>
                                                        </td>
                                                        <td style="background-color: #ccffcc;">

                                                        </td>
                                                        <td style="background-color: #ccffcc;">

                                                        </td>
                                                        <td style="background-color: #ccffcc;">

                                                        </td>
                                                    </tr>

                                                    <?php foreach ($questions as $question): ?>

                                                        <?php
                                                        foreach ($question as $quest) {
                                                            //echo '<pre>';
                                                            //print_r($quest);
                                                            //echo '</pre>';
                                                            // kalau ada title untuk question
                                                            if ($quest->id_question_title != NULL && $quest->id_question_title == $title->id) {
                                                                ?> 

                                                                <tr>
                                                                    <td>

                                                                    </td>
                                                                    <td>
                                <?= $quest->subject ?>

                                                                    </td>
                                                                    <td><div class="form-group">
                                                                         <table class="table borderless">
                                                                            <tr>
                                                                                
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes" title="Yes">
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                    
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No">
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable">
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                    <input type='hidden' id='tool_answers_id<?= $quest->id ?>' name="tool_answers_id<?= $quest->id ?>" value="">
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                         </table>
                                                                        <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id='ifNo<?= $quest->id ?>' style="display:none">
                                                                            <textarea class="textarea_editor" rows="6" placeholder="Justification " name="question_id_<?= $quest->id ?>[justification]"></textarea><br>
                                                                        </div>
                                <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td>
                                                                            <input type="hidden" value="<?= $quest->score?>" name="score-<?= $quest->id?>">
                                                                            <input type="hidden" value="<?= $quest->id?>" name="q_id<?= $quest->id?>">
                                                                    </td>
                                                                </tr>


                            <?php } elseif ($quest->id_question_title == NULL && $quest->id_tool == $title->id_tool) { ?>
                                                                <tr>
                                                                    <td>

                                                                    </td>
                                                                    <td>
                                <?= $quest->subject ?>


                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                        <table class="table table- table-condensed">
                                                                            <tr>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes">
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No">
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable">
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                    <input type='hidden' id='tool_answers_id<?= $quest->id ?>' name="tool_answers_id<?= $quest->id ?>" value="">
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id='ifNo<?= $quest->id ?>' style="display:none">
                                                                            <textarea class="textarea_editor" rows="6" placeholder="Justification " name="question_id_<?= $quest->id ?>[justification]"></textarea><br>
                                                                        </div>
                                <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td>
                                <input type="hidden" value="<?= $quest->score?>" name="score-<?= $quest->id?>">
                                <input type="hidden" value="<?= $quest->id?>" name="q_id<?= $quest->id?>">
                                                                    </td>
                                                                </tr>

                                                            <?php
                                                            }
                                                        } endforeach;
                                                }
                                            } endforeach;
                                        ?>

                                        <?php // ########  TOOL 3 & 4 & 6 ########### ?>
                                    <?php elseif ($tool->tool_no == '3' || $tool->tool_no == '4' || $tool->tool_no == '6'):
                                        ?>
                                        <?php foreach ($questions_title as $titles): ?>
                                            <?php
                                            foreach ($titles as $title) {
                                                if ($tool->tool_no == $title->id_tool) {
                                                    if($title->id_categories == 'A'){ //TEST letak kategori soalan kat sini
                                                    ?>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td style="background-color: #ccffcc;">
                    <?= $title->main_subject ?>
                                                        </td>
                                                        <td style="background-color: #ccffcc;">

                                                        </td>
                                                        <td  style="background-color: #ccffcc;">

                                                        </td>
                                                        <td  style="background-color: #ccffcc;">

                                                        </td>
                                                    </tr>

                                                    <?php foreach ($questions as $question): ?>
                                                        <?php foreach ($question as $quest): ?> 
                                                            <?php
                                                            // kalau ada title untuk question 
                                                            if ($quest->id_question_title != NULL && $quest->id_question_title == $title->id) {
                                                                ?> 

                                                                <tr>
                                                                    <td>

                                                                    </td>
                                                                    <td>
                                                                        <?= $quest->subject ?>

                                                                    </td>
                                                                    <td>
                                <?php if ($quest->id_tool == 3) { ?>
                                                                        <div class="form-group">
                                                                          <table class="table table- table-condensed">
                                                                            <tr>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes">
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No">
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                       &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable">
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                    <input type='hidden' id='tool_answers_id<?= $quest->id ?>' name="tool_answers_id<?= $quest->id ?>" value="">
                                                                                </td>
                                                                            </tr>
                                                                            </table>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>

                                <?php } elseif ($quest->id_tool == 4 || $quest->id_tool == 6) { ?>
                                                                        <div class="form-group">
                                                                            <table class="table table- table-condensed">
                                                                            <tr>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes">
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No">
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio"  id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable">
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                    <input type='hidden' id='tool_answers_id<?= $quest->id ?>' name="tool_answers_id<?= $quest->id ?>" value="">
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>

                                <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <div id='ifNo<?= $quest->id ?>' style="display:none">
                                                                            <textarea class="textarea_editor" rows="6" placeholder="Justification " name="question_id_<?= $quest->id ?>[justification]"></textarea><br>
                                                                        </div>
                                                                        <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td>
                                <input type="hidden" value="<?= $quest->score?>" name="score-<?= $quest->id?>">
                                <input type="hidden" value="<?= $quest->id?>" name="q_id<?= $quest->id?>">
                                                                    </td>
                                                                </tr>


                                                            <?php
                                                            } endforeach;
                                                    endforeach;
                                                }
                                            }} endforeach;
                                        ?>

                                        <?php //kalau tool ini tiada main subject ########  TOOL 1 & 5 ########### ?>

    <?php elseif ($tool->tool_no == '1' || $tool->tool_no == '5'): ?>
        <?php foreach ($questions as $question): ?>
            <?php foreach ($question as $quest): ?>      
                                                        <?php if ($quest->id_tool == $tool->tool_no) { ?>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td>
                    <?= $quest->subject ?>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                        <table class="table table- table-condensed">
                                                                            <tr>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes">
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No">
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable">
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                    <input type='hidden' id='tool_answers_id<?= $quest->id ?>' name="tool_answers_id<?= $quest->id ?>" value="">
                                                                                </td>
                                                                            </tr>
                                                                            </table>
                                                                <div class="help-block with-errors"></div>
                                                                        </div>

                                                        </td>
                                                        <td>
                                                            <div id='ifNo<?= $quest->id ?>' style="display:none">
                                                                <textarea class="textarea_editor" rows="6" placeholder="Justification " name="question_id_<?= $quest->id ?>[justification]"></textarea><br>
                                                            </div>
                    <?php $x[] = $quest->id ?>
                                                        </td>
                                                        <td>
                                                    <input type="hidden" value="<?= $quest->score?>" name="score-<?= $quest->id?>">
                                                    <input type="hidden" value="<?= $quest->id?>" name="q_id<?= $quest->id?>">
                                                        </td>
                                                    </tr>

                <?php } endforeach;
        endforeach;
        ?>

                                    <?php endif ?>
                                </table>
                                </div>

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
    echo form_error('uploaded_docs'.$tool->tool_no.'[]');
    echo form_upload('uploaded_docs'.$tool->tool_no.'[]', '', 'multiple');
    ?>
                                    <small>File Size : max 30MB</small>
                                </div>
                                <br>

                                <div class="row">
                                    <button id="calculate_btn" type="button" class="btn btn-default" onclick="calculateScore(<?=$tool->tool_no?>)">Click here to update score</button>
                                    
                                    
                                </div>
                                <br>

                                <div class="row">

                                    <!-- Auto Calculated based on score -->
    <?php echo form_label('Assessment of strength of Tool ' . $tool->tool_no . ' : ' . $tool->tool_title); ?>

                                    <div class="progress">
                                        
                                        <div class="progress-bar progress-bar-custom progress-bar-striped" id = "progress<?= $tool->tool_no ?>" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                          <span id="progress-text<?= $tool->tool_no ?>"></span>  
                                        </div>
                                    </div>

    <?php
    $y[] = $tool->tool_no;
    ?>
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



                                </div>
                            </div>


                        </div>
                    </div>
                
<?php endforeach; ?>
                
                <div id="step-8">
                    <div id="form-step-7" role="form" data-toggle="validator">
                        

                        <div class="panel-body">
                            <h3 style="text-align:center">EMT completed for your premise is </h3> <h2 style="text-align:center"><span class="label label-success"><span id='total_yes'>X</span> / 7 </span></h2>
                            <br>
                            <div class="well">
                                <p>
                                    <input class= "magic-checkbox" type="checkbox" name="declaration" id="declaration_cb" value="accept">
                                    <label for="declaration_cb">
                                        I hereby declare that the information provided is true and correct.
                                    </label> 
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tr  class="info">
                                        <td width="30%">
                                            Reporting officer
                                        </td>
                                        <td>
<?= $premise_info->name ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Identification no
                                        </td>
                                        <td>
<?= $premise_info->ic_no ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Position (in company)
                                        </td>
                                        <td>
<?= $premise_info->position ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tr  class="info">
                                        <td width="30%">
                                            Company Name
                                        </td>
                                        <td>
<?= $premise_info->namapremis ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            DOE File No
                                        </td>
                                        <td>
<?= $premise_info->nofaildoe ?>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <table class="table">
                                <tr class="col-md-2">
                                    <td style="width: 25%">
                                        <h3><b>Submission Date </b></h3><?php
                                            $data = array(
                                                'class' => 'form-control',
                                                'size' => 10,
                                                'name' => 'declaration_date',
                                                'type' => 'text',
                                                'value' => date("d M Y"),
                                                'readonly' => true,
                                                 'style'=> 'font-size:15pt'
                                            );
                                            echo form_input($data);
                                            ?> 
                                    </td>

                                </tr>

                            </table>

                        </div>

<!--                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" value = "Save" >
                                <input type="button" value = "Update" >
                                <input type="submit" value = "Submit" >
                            </div>
                        </div>-->
                    </div>
                </div>

            </div>
        </div>
    </form>



<?php //print_r($x)  ?>
<!-- Modal - How to fill up the form -->

<?php foreach ($howto_info as $howtofill): ?>
    <div id="howtoFill<?= $howtofill->tool_id ?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Explanatory notes for filling out the form</h4>
                </div>
                <div class="modal-body">
    <?= $howtofill->howto_text ?>
                </div>
            </div>

        </div>
    </div>
<?php endforeach; ?>

<!-- MODAL TOOL IMPLEMENTATION -->
<?php foreach ($tools as $tool): ?> 
<!--<div id="implementation_tool<?= $tool->tool_no?>" class="modal fade" role="dialog">
     <div class="modal-dialog">

          Modal content
         <div class="modal-content">
             <form id="justificationModal<?= $tool->tool_no?>" method="post">
             <div class="modal-header">

                 <h4 class="modal-title">Justification is required, before proceeding</h4>
             </div>
             <div class="modal-body">
                 <input type="hidden" value="<?= $tool->tool_no?>" name="tool<?= $tool->tool_no?>">
             <div id='implementation_tool_justification<?= $tool->tool_no?>'>
                 <textarea id='tool_no_justification<?= $tool->tool_no?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no?>"></textarea><br>
                 <button onclick='submit_justification(<?= $tool->tool_no?>)'>submit</button>
             </div>
             </div>
             </form>
         </div>

     </div>
 </div>-->
<?php endforeach; ?>

<script>
    
    var varray = <?php echo json_encode($x) ?>;
    var no_of_tool = <?php echo json_encode($y) ?>;
   

    //console.log(varray.toString());
     
                
         
   
    //IF NO IMPLEMENTATION JUSTIFICATION MODAL IS ENTERED, SAVE TO DATA   
//    function submit_justification(tool_no){
//        // ajax adding data to database
//            var modal = '#justificationModal' +tool_no;
//            console.log(modal);
//          $.ajax({
//            url : "<?php echo site_url('questions/submit_implementation_justification/')?>"+tool_no ,
//            type: "POST",
//            data: $(modal).serialize(),
//            dataType: "JSON",
//            success: function(data)
//            {
//               //if success close modal and reload ajax table
//               //$('#modal_form').modal('hide');
//               alert(data);
//              //location.reload();// for reload a page
//            },
//            error: function (jqXHR, textStatus, errorThrown)
//            {
//                alert('Error adding / update data' + jqXHR + ' ' + textStatus + ' ' + errorThrown);
//            }
//        });
//    }
    
//    function get_tool_status(idpremise){
//        //Ajax Load data from ajax
//      $.ajax({
//        url : "<?php echo site_url('questions/get_tool_submission_status/')?>" + idpremise,
//        type: "GET",
//        dataType: "JSON",
//        success: function(data)
//        {
//           //console.log(data);
//           
//           $.each(data, function(i, item) {
//                //$('#dobsondev-ajax-table').append('<tr><td>' + item.name + '</td><td>' + item.name + '</td><td>' + item.meta_value + '</td><td>' + item.name + '</td></tr>');
//                
//               var tool_no = this.id_tool;
//                $('#implementation_tool'+tool_no +' *').attr('disabled', true);
//                $('#table-tool'+tool_no+ ' *').attr('disabled', true); //disable input
//                $('#table-tool'+tool_no+ ' *').addClass('overlay_modal');
//                $('#table-overlay'+tool_no).addClass('overlay_parent_modal');
//                $('#tool_no_justification'+tool_no).val(this.justification);
//                    //console.log(tool_no);
//                //alert(this.justification);
//                // $("input[type=radio][name=question_enable_tool"+tool_no+"][checked]").each(
//
//                //);
//
//            });
//            
//            
//            
//            
////            $('[name="id"]').val(data.id);
////            $('[name="jum_sasar_desktop"]').val(data.jum_sasar_desktop);
////            $('[name="jum_desktop"]').val(data.jum_desktop);
////            $('[name="jum_lawatan"]').val(data.jum_lawatan);
////            $('[name="jum_sasar_lawatan"]').val(data.jum_sasar_lawatan);
////            $('[name="jum_sasar_premis"]').val(data.jum_sasar_premis);
//
//
//            //$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
//            //$('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title
//
//        },
//        error: function (jqXHR, textStatus, errorThrown)
//        {
//            alert('Error get data from ajax');
//        }
//    });
//    }
   
    $.each(no_of_tool, function (index, value) {
        $("input[type=radio][name=question_enable_tool"+value+"]").change(function() {
        //ENABLE/DISABLE QUESTION
        
        if (this.value == 'true') {
            $("#step-"+value+" :input").removeAttr('disabled').removeClass( 'ui-state-disabled' );
            $("#tool"+value+"_no_check").removeAttr('disabled').removeClass( 'ui-state-disabled' );
            $("#tool_no").attr("disabled", false);
            $('#justification_implement'+value).slideUp("slow")
        }
        else if (this.value == 'false') {
            //$("#my_form :input").attr("disabled", true).addClass('ui-state-disabled');
            $("#step-"+value+" :input").attr("disabled", true).addClass('ui-state-disabled');
            //$("#btn_tool"+value).removeAttr('disabled').removeClass( 'ui-state-disabled' );
            $("#tool"+value+"_yes_check").removeAttr('disabled').removeClass( 'ui-state-disabled' );
            $("#tool"+value+"_no_check").removeAttr('disabled').removeClass( 'ui-state-disabled' );
            //$("#submit_btn").attr("disabled", false);
            $("#tool_no").attr("disabled", false);
            $('#tool_no_justification'+value).removeAttr('disabled').removeClass( 'ui-state-disabled' );
            $("#implementation_tool"+value).modal('show');  
            $('#justification_implement'+value).slideDown("slow");
            
        }
        

        
    });
    });
     
        
     
    
    // IF MODAL IMPLEMENTATION IS CLOSED - deselect radio button NO
//    $.each(no_of_tool, function (index, value) {
//    $("#implementation_tool"+value).on("hidden.bs.modal", function () {
//                $("#tool"+value+"_yes_check").prop("checked", true);
//                $("#step-"+value+" :input").removeAttr('disabled').removeClass( 'ui-state-disabled' );
//                $("#tool"+value+"_no_check").removeAttr('disabled').removeClass( 'ui-state-disabled' );
//                $("#tool_no").attr("disabled", false);
//                //$("#tool_no_justification"+value).val("");
//        });
//    });
    
    
    //ENABLE/DISABLE JUSTIFICAITON CHECK

    function yesnoCheck() {

        $.each(varray, function (index, value) {
            // IF no option checked, show justification text field
            if (document.getElementById('noCheck' + value).checked) {
                document.getElementById('ifNo' + value).style.display = 'block';
            } else{
                document.getElementById('ifNo' + value).style.display = 'none';
            }
    });
    }
      function calculateScore(tool_no){
      var div = $("div#step-"+tool_no);
      var radiosBtns = div.find("input[type='radio'][id*=yesCheck]:checked");
      var score = radiosBtns.find("input[type='hidden'][name*=score-]");
      var totalScore = 0;
      var rating = "";
      
        
        var sumAll = function(i,radiobtn){
            if(radiobtn.value == 'Yes'){
                no = radiobtn.id.match(/\d+/); //extract no from radiobtn id
                
                totalScore = totalScore + parseInt($('input[name=score-'+ no +']').val());
            }
                
             //console.log(totalScore);
        };
        
        $.each(radiosBtns,sumAll);
        
        
        if(totalScore <= 19){ //Poor
            rating = 'Poor';
        } else if(totalScore >= 20 && totalScore <= 39){ // Fair
            rating = 'Fair';
        } else if(totalScore >= 40 && totalScore <= 59){ //Average
            rating = 'Average';
        } else if(totalScore >= 60 && totalScore <= 79){ // Good
            rating = 'Good';
        } else if(totalScore >= 80 && totalScore <= 100){ // Excellent
            rating = 'Excellent';
        }
        
         $('#progress' + tool_no).attr('style', "width:" + totalScore + "%;");
         
         $('#progress-text' + tool_no).html("<h4><b>"+ rating + "</b></h4>");

    }

    $.each(no_of_tool, function (index, value) {
        $('#btn' + value).click(function () {
            var v = $('#value' + value).val();

            $('#progress' + value).attr('style', "width:" + v + "%;");
        });
    });
    
    
    
    //DOCUMENT READY
     $(document).ready(function () {
        $(function(){
       //$("input").prop('required',true); temporary
        });
        
        var session_id = <?php echo json_encode($this->idpremis) ?>;
        //get_tool_status(session_id);
         
        });
        
 
       $("#myForm").submit(function(e){
        
        $.ajax({
            type : 'POST',
            data: $("#myForm").serialize(),
            url : '<?php echo site_url('questions/submit_answer2/')?>"',
            success : function(data){
//                $("#download_link").html(data);
//                $("#download_modal").modal("show");
                    window.setTimeout(function(){
                                     //
                                    $.notify("Form has been submitted, this page will now refresh");  
                                    
                                      }, 500);
//                    window.setTimeout(function(){
//                                     //
//                                    window.location.href = '<?php echo site_url('dashboard/company/')?>';  
//                                    
//                                      }, 2000);
            }
        });
        return false;
    }); 
      
  function edit_form()
    {
      //save_method = 'update';
      //$('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('questions/get_tool_submission_status/') ?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            
            
            for (var key in data) {
                if (data.hasOwnProperty(key)) {
                    //console.log(key + " -> " + data[key].id_question);
                    
                    if(data[key].status === 'No'){
                         //$('[id="ifNo'+data[key].id_question+'"]').style.display = 'block';
                         document.getElementById('ifNo'+data[key].id_question).style.display = 'block';
                         $('[name="question_id_'+data[key].id_question+'[justification]"]').val(data[key].justification);
                    }
                    $('[name="question_id_'+ data[key].id_question+'[status]"][value="' + data[key].status + '"]').prop('checked',true);
                    document.getElementById('tool_answers_id' + data[key].id_question).value = data[key].tool_answers_id;
                     
                        if(data[key].tool7_implementation === 'false'){
                        
                         document.getElementById('justification_implement7').style.display = 'block';
                         $('[id="tool_no_justification7"]').val(data[key].tool7_justification);
                         disable_input(7)
                        }
                        if(data[key].tool1_implementation === 'false'){
                        
                         document.getElementById('justification_implement1').style.display = 'block';
                         $('[id="tool_no_justification1"]').val(data[key].tool1_justification);
                        }
                        if(data[key].tool2_implementation === 'false'){
                        
                         document.getElementById('justification_implement2').style.display = 'block';
                         $('[id="tool_no_justification2"]').val(data[key].tool2_justification);
                        }
                        if(data[key].tool3_implementation === 'false'){
                        
                         document.getElementById('justification_implement3').style.display = 'block';
                         $('[id="tool_no_justification3"]').val(data[key].tool3_justification);
                        }  
                        if(data[key].tool4_implementation === 'false'){
                        
                         document.getElementById('justification_implement4').style.display = 'block';
                         $('[id="tool_no_justification4"]').val(data[key].tool4_justification);
                        }
                        if(data[key].tool5_implementation === 'false'){
                        
                         document.getElementById('justification_implement5').style.display = 'block';
                         $('[id="tool_no_justification5"]').val(data[key].tool5_justification);
                        }
                        if(data[key].tool6_implementation === 'false'){
                        
                         document.getElementById('justification_implement6').style.display = 'block';
                         $('[id="tool_no_justification6"]').val(data[key].tool6_justification);
                        }    
                    
                    $('[name="question_enable_tool1"][value=' + data[key].tool1_implementation + ']').prop('checked',true);
                    $('[name="question_enable_tool2"][value=' + data[key].tool2_implementation + ']').prop('checked',true);
                    $('[name="question_enable_tool3"][value=' + data[key].tool3_implementation + ']').prop('checked',true);
                    $('[name="question_enable_tool4"][value=' + data[key].tool4_implementation + ']').prop('checked',true);
                    $('[name="question_enable_tool5"][value=' + data[key].tool5_implementation + ']').prop('checked',true);
                    $('[name="question_enable_tool6"][value=' + data[key].tool6_implementation + ']').prop('checked',true);
                    $('[name="question_enable_tool7"][value=' + data[key].tool7_implementation + ']').prop('checked',true);
                    
                  
                    if(data[key].tool1_date_implement === '0000-00-00'){
                        $('[name="date_implement#1"]').val('');
                    }else{
                        $('[name="date_implement#1"]').val(data[key].tool1_date_implement);
                    }
                    
                    if(data[key].tool2_date_implement === '0000-00-00'){
                        $('[name="date_implement#2"]').val('');
                    }else{
                        $('[name="date_implement#2"]').val(data[key].tool2_date_implement);
                    }
                    
                    if(data[key].tool3_date_implement === '0000-00-00'){
                        $('[name="date_implement#3"]').val('');
                    }else{
                        $('[name="date_implement#3"]').val(data[key].tool3_date_implement);
                    }
                    
                    if(data[key].tool4_date_implement === '0000-00-00'){
                        $('[name="date_implement#4"]').val('');
                    }else{
                        $('[name="date_implement#4"]').val(data[key].tool4_date_implement);
                    }
                    
                    if(data[key].tool5_date_implement === '0000-00-00'){
                        $('[name="date_implement#5"]').val('');
                    }else{
                        $('[name="date_implement#5"]').val(data[key].tool5_date_implement);
                    }
                    
                    if(data[key].tool6_date_implement === '0000-00-00'){
                        $('[name="date_implement#6"]').val('');
                    }else{
                        $('[name="date_implement#6"]').val(data[key].tool6_date_implement);
                    }
                    
                    if(data[key].tool7_date_implement === '0000-00-00'){
                        $('[name="date_implement#7"]').val('');
                    }else{
                        $('[name="date_implement#7"]').val(data[key].tool7_date_implement);
                    }
                 //console.log(key.hasOwnProperty());
                 
                    //assign tool_answers_id to hidden input
                   
                }
                
            }
            
            $('#data_id').val(data[key].id);
            
            
            
//            $('[name="id"]').val(data.id);
//            $('[name="jum_sasar_desktop"]').val(data.jum_sasar_desktop);
//            $('[name="jum_desktop"]').val(data.jum_desktop);
//            $('[name="jum_lawatan"]').val(data.jum_lawatan);
//            $('[name="jum_sasar_lawatan"]').val(data.jum_sasar_lawatan);
//            $('[name="jum_sasar_premis"]').val(data.jum_sasar_premis);
            

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    
    
    }
    
    
    function disable_input(id){
     //disable input
                         //$("#my_form :input").attr("disabled", true).addClass('ui-state-disabled');
                        $("#step-"+id+" :input").attr("disabled", true).addClass('ui-state-disabled');
                        //$("#btn_tool"+value).removeAttr('disabled').removeClass( 'ui-state-disabled' );
                        $("#tool"+id+"_yes_check").removeAttr('disabled').removeClass( 'ui-state-disabled' );
                        $("#tool"+id+"_no_check").removeAttr('disabled').removeClass( 'ui-state-disabled' );
                        //$("#submit_btn").attr("disabled", false);
                        $("#tool_no").attr("disabled", false);
                        $('#tool_no_justification'+id).removeAttr('disabled').removeClass( 'ui-state-disabled' );
                        $("#implementation_tool"+id).modal('show');  
                        $('#justification_implement'+id).slideDown("slow");
    }
    
   
    
</script>