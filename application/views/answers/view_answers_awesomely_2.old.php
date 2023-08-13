<?php
//untuk count element 
$x = array();
$y = array();
?>


    <form id="myForm" action="<?= base_url('questions/submit_answer2') ?>" data-toggle="validator" enctype="multipart/form-data" method="post" accept-charset="utf-8">

        <!-- SmartWizard html -->
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
                    <div id="step-<?= ++$j ?>">
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

                                <div class="form-group">
                                    <table class="table">
                                        <tr>
                                            <td style="width: 25%">
                                                <h4><b>Date of Implementation : </b><?php
                                                    $data = array(
                                                        'class' => 'form-group',
                                                        'name' => 'date_implement#' . $tool->id,
                                                        'type' => 'date'
                                                    );
                                                    echo form_input($data);
                                                    ?> </h4>
                                            </td>

                                        </tr>

                                    </table>

                                </div>

                                <h4 style='text-align: center' class="bg-warning">
                                    Is the implementation of the tool <?= $tool->tool_no . ' : ' . $tool->tool_title . ' ' ?> complete?  
                                    <br>
                                    <label class="radio-inline tool_check"><input id="tool_yes_check<?= $tool->tool_no ?>" type="radio" name="question_enable" value="true" onclick="enable_input()">Yes</label>
                                    <label class="radio-inline tool_check"><input id="tool_no_check<?= $tool->tool_no ?>" type="radio" name="question_enable" value="false" onclick="disable_input()">No</label>
                                </h4>





                                <table  class="table table-full ">

                                    <tr>
                                        <td>
                                            No
                                        </td>
                                        <td  style="width: 50%">
                                            Subject
                                        </td>
                                        <td style="width: 20%">
                                            Status (Answers)
                                        </td>
                                        <td style="width: 20%">
                                            Score
                                        </td>
                                        <td>
                                            Status (DOE)
                                           <table class="table borderless">
                                                <tr>
                                                    <td>
                                                        Yes
                                                    </td>
                                                    <td>
                                                        No
                                                    </td>
                                                </tr>
                                            </table>
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
                    <?= $title->main_subject . 'test' ?>
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
                                                                    <td>
                                                                        
                                                                        <?php 
                                                                            $strings = array(
                                                                                'Yes',
                                                                                'No',
                                                                                'Not applicable'
                                                                                );
                                                                                $key = array_rand($strings);
                                                                                echo $strings[$key];
                                                                        
                                                                        ?>
<!--                                                                         <table class="table borderless">
                                                                            <tr>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="Yes" >
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        Yes
                                                                                    </label>
                                                                                    
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="No">
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        No
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="Not applicable">
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        Not applicable
                                                                                    </label>
                                                                                </td>
                                                                               
                                                                            </tr>
                                                                        </table>-->
                                                                    </td>
                                                                    <td>
                                                                        
                                                                        <?php 
                                                                            $strings = array(
                                                                                '5',
                                                                                '10',
                                                                                '15'
                                                                                );
                                                                                $key = array_rand($strings);
                                                                                echo $strings[$key];
                                                                        
                                                                        ?>
                                                                        
                                                                        <div id='ifNo<?= $quest->id ?>' style="display:none">
                                                                            <textarea class="textarea_editor" rows="6" placeholder="Justification " name="<?= $quest->id ?>[justification]"></textarea><br>
                                                                        </div>
                                <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td>
                                                                            <table class="table borderless">
                                                                            <tr>
                                                                                
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "doe_yes<?= $quest->id ?>" name="<?= $quest->id ?>[DOE]" value="Yes">
                                                                                    <label for="doe_yes<?= $quest->id ?>">
                                                                                        Yes
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "doe_no<?= $quest->id ?>" name="<?= $quest->id ?>[DOE]" value="No">
                                                                                    <label for="doe_no<?= $quest->id ?>">
                                                                                        No
                                                                                    </label>
                                                                                </td>
                                                                             
                                                                            </tr>
                                                                        </table>
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
                                                                        <?php 
                                                                            $strings = array(
                                                                                'Yes',
                                                                                'No',
                                                                                'Not applicable'
                                                                                );
                                                                                $key = array_rand($strings);
                                                                                echo $strings[$key];
                                                                        
                                                                        ?>
<!--                                                                        <table class="table table- table-condensed">
                                                                            <tr>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="Yes">
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        Yes
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="No">
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        No
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="Not applicable">
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        Not applicable
                                                                                    </label>
                                                                                </td>
                                                                            </tr>
                                                                        </table>-->
                                                                    </td>
                                                                    <td>
                                                                        <?php 
                                                                            $strings = array(
                                                                                '5',
                                                                                '10',
                                                                                '15'
                                                                                );
                                                                                $key = array_rand($strings);
                                                                                echo $strings[$key];
                                                                        
                                                                        ?>
                                                                        <div id='ifNo<?= $quest->id ?>' style="display:none">
                                                                            <textarea class="textarea_editor" rows="6" placeholder="Justification " name="<?= $quest->id ?>[justification]"></textarea><br>
                                                                        </div>
                                <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td>
                                  <table class="table borderless">
                                                                            <tr>
                                                                                
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "doe_yes<?= $quest->id ?>" name="<?= $quest->id ?>[DOE]" value="Yes">
                                                                                    <label for="doe_yes<?= $quest->id ?>">
                                                                                        Yes
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "doe_no<?= $quest->id ?>" name="<?= $quest->id ?>[DOE]" value="No">
                                                                                    <label for="doe_no<?= $quest->id ?>">
                                                                                        No
                                                                                    </label>
                                                                                </td>
                                                                             
                                                                            </tr>
                                                                        </table>
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
                                                                        
                                                                        <?php 
                                                                            $strings = array(
                                                                                'Yes',
                                                                                'No',
                                                                                'Not applicable'
                                                                                );
                                                                                $key = array_rand($strings);
                                                                                echo $strings[$key];
                                                                        
                                                                        ?>
<!--                                                                          <table class="table table- table-condensed">
                                                                            <tr>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="Yes">
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        Yes
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="No">
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        No
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="Not applicable">
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        Not applicable
                                                                                    </label>
                                                                                </td>
                                                                            </tr>
                                                                            </table>-->

                                <?php } elseif ($quest->id_tool == 4 || $quest->id_tool == 6) { ?>
                                                                        <?php 
                                                                            $strings = array(
                                                                                'Yes',
                                                                                'No',
                                                                                'Not applicable'
                                                                                );
                                                                                $key = array_rand($strings);
                                                                                echo $strings[$key];
                                                                        
                                                                        ?>
<!--                                                                            <table class="table table- table-condensed">
                                                                            <tr>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="Yes">
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        Yes
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="No">
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        No
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio"  id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="Not applicable">
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        Not applicable
                                                                                    </label>
                                                                                </td>
                                                                            </tr>
                                                                        </table>-->

                                <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php 
                                                                            $strings = array(
                                                                                '5',
                                                                                '10',
                                                                                '15'
                                                                                );
                                                                                $key = array_rand($strings);
                                                                                echo $strings[$key];
                                                                        
                                                                        ?>
                                                                        <div id='ifNo<?= $quest->id ?>' style="display:none">
                                                                            <textarea class="textarea_editor" rows="6" placeholder="Justification " name="<?= $quest->id ?>[justification]"></textarea><br>
                                                                        </div>
                                                                        <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td>
                                                                        <table class="table borderless">
                                                                            <tr>
                                                                                
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "doe_yes<?= $quest->id ?>" name="<?= $quest->id ?>[DOE]" value="Yes">
                                                                                    <label for="doe_yes<?= $quest->id ?>">
                                                                                        Yes
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "doe_no<?= $quest->id ?>" name="<?= $quest->id ?>[DOE]" value="No">
                                                                                    <label for="doe_no<?= $quest->id ?>">
                                                                                        No
                                                                                    </label>
                                                                                </td>
                                                                             
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>


                                                            <?php
                                                            } endforeach;
                                                    endforeach;
                                                }
                                            } endforeach;
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
                                                            <?php 
                                                                            $strings = array(
                                                                                'Yes',
                                                                                'No',
                                                                                'Not applicable'
                                                                                );
                                                                                $key = array_rand($strings);
                                                                                echo $strings[$key];
                                                                        
                                                                        ?>
<!--                                                                        <table class="table table- table-condensed">
                                                                            <tr>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="Yes">
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        Yes
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="No">
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        No
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="<?= $quest->id ?>[status]" value="Not applicable">
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        Not applicable
                                                                                    </label>
                                                                                </td>
                                                                            </tr>
                                                                            </table>-->

                                                        </td>
                                                        <td>
                                                            <?php 
                                                                            $strings = array(
                                                                                '5',
                                                                                '10',
                                                                                '15'
                                                                                );
                                                                                $key = array_rand($strings);
                                                                                echo $strings[$key];
                                                                        
                                                                        ?>
                                                            <div id='ifNo<?= $quest->id ?>' style="display:none">
                                                                <textarea class="textarea_editor" rows="6" placeholder="Justification " name="<?= $quest->id ?>[justification]"></textarea><br>
                                                            </div>
                    <?php $x[] = $quest->id ?>
                                                        </td>
                                                        <td>
                                                                        <table class="table borderless">
                                                                            <tr>
                                                                                
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "doe_yes<?= $quest->id ?>" name="<?= $quest->id ?>[DOE]" value="Yes">
                                                                                    <label for="doe_yes<?= $quest->id ?>">
                                                                                        Yes
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "doe_no<?= $quest->id ?>" name="<?= $quest->id ?>[DOE]" value="No">
                                                                                    <label for="doe_no<?= $quest->id ?>">
                                                                                        No
                                                                                    </label>
                                                                                </td>
                                                                             
                                                                            </tr>
                                                                        </table>
                                                        </td>
                                                    </tr>

                <?php } endforeach;
        endforeach;
        ?>

                                    <?php endif ?>
                                </table>

                                <div class="row">
                                    <div class="col-md-6">
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
                                    
                                   
                                </div>
                                <br>

                                <div class="row">
                                    <input type="button" value="Click here to update score" onclick="calculateScore(<?=$tool->tool_no?>)" >
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
  
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8">
                                        
                                        <div class="controls">
                                            <textarea id="textarea_editor"  style="width:100%" rows="10" placeholder="Enter text ..." name="comment"></textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <h3><b>Evaluation : </b></h3><h2><?php
                                    $data = array(
                                        'class' => 'form-group',
                                        'name' => 'evaluation',
                                        'maxlength'     => '2',
                                        'size'          => '2'
                                     
                                    );
                                   
                                    echo form_input($data);
                                    ?>/ 10</h2>
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
<?php endforeach; ?>

                <div id="step-8">
                    <div id="form-step-7" role="form" data-toggle="validator">
                        <legend>EMT completed for your premise is X/7 </legend>

                        <div class="row">
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
                                <tr>
                                    <td style="width: 25%">
                                        <h3><b>Date </b><?php
                                            $data = array(
                                                'class' => 'form-group',
                                                'size' => 10,
                                                'name' => 'declaration_date',
                                                'type' => 'text',
                                                'value' => date("d M Y"),
                                                'readonly' => true
                                            );
                                            echo form_input($data);
                                            ?> </h3>
                                    </td>

                                </tr>

                            </table>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" value = "Save" >
                                <input type="button" value = "Update" >
                                <input type="button" value = "Submit" >
                            </div>
                        </div>
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


<script>
    $(document).ready(function () {
        //OPTION BOX STYLE
        $(function () {
            $(".status-option").checkboxradio({
                icon: false
            });
        });

    });


    //ENABLE/DISABLE QUESTION
    function disable_input() {
        $("#my_form :input").attr("disabled", true).addClass('ui-state-disabled');
        $("#tool_yes_check").attr("disabled", false);
        $("#tool_no_check").attr("disabled", false);
        //$("#submit_btn").attr("disabled", false);
        $("#tool_no").attr("disabled", false);
    }

    function enable_input() {
        $("#my_form :input").attr("disabled", false);
        $("#tool_yes_check").attr("disabled", false);
        $("#tool_no_check").attr("disabled", false);
        $("#tool_no").attr("disabled", false);
    }

    //ENABLE/DISABLE JUSTIFICAITON CHECK

    var varray = <?php echo json_encode($x) ?>;
    var no_of_tool = <?php echo json_encode($y) ?>;
    var score1 = parseInt(0);
    var score2 = parseInt(0);
    var score3 = parseInt(0);

    console.log(varray.toString());

    function yesnoCheck() {

        $.each(varray, function (index, value) {
            // IF no option checked, show justification text field
            if (document.getElementById('noCheck' + value).checked) {
                document.getElementById('ifNo' + value).style.display = 'block';
            } else{
                document.getElementById('ifNo' + value).style.display = 'none';
            }
            
            
            
//            if(document.getElementById('yesCheck' + value).checked){
//                
//                score2 = score2 + parseInt($('input[name=score-'+ value +']' ).val());
//                console.log(score2);    
//            }
        


    });
    }
      function calculateScore(tool_no){
      var div = $("div#step-"+tool_no);
      var radiosBtns = div.find("input[type='radio'][id*=yesCheck]:checked");
      var score = radiosBtns.find("input[type='hidden'][name*=score-]");
      var totalScore = 0;
      
        
        var sumAll = function(i,radiobtn){
            if(radiobtn.value == 'Yes'){
                no = radiobtn.id.match(/\d+/); //extract no from radiobtn id
                
                totalScore = totalScore + parseInt($('input[name=score-'+ no +']').val());
            }
                
             console.log(totalScore);
        };
        
        $.each(radiosBtns,sumAll);
        
         $('#progress' + tool_no).attr('style', "width:" + totalScore + "%;");
         $('#progress-text' + tool_no).html("<h4><b>"+ totalScore + "%</b></h4>");

    }
//    <input type="hidden" value="<?= $quest->score?>" name="score#<?= $quest->id?>" id="score#<?= $quest->id?>">

//    <input type="text" id="value<?= $tool->tool_no ?>">
    //Progress bar 


    //console.log(no_of_tool.toString());


    $.each(no_of_tool, function (index, value) {
        $('#btn' + value).click(function () {
            var v = $('#value' + value).val();

            $('#progress' + value).attr('style', "width:" + v + "%;");
        });
    });

</script>
