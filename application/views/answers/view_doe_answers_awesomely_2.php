<?php
//untuk count element 
$x = array();
$y = array();

if ($done) {
    $readonly = 'readonly';
    $disabled = 'disabled';
} else {
    $readonly = '';
    $disabled = '';
}

if ($declaration_accepted) {
    $accepted = 'checked';
    $disabled_click = 'onclick="return false;"';
} else {
    $accepted = '';
    $disabled_click = '';
}
?>

<form id="myForm" action="<?php //echo base_url('questions/submit_answer2')     ?>" data-toggle="validator" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <input type="hidden" id="method" name='method' value="submit">
    <input type="hidden" id="data_id" name='data_id' value="<?= $idpremis ?>">
    <!-- SmartWizard html  -->
    <div id="smartwizard">
        <ul class="text-center">
            <li><a href="#step-1">Step 1<br /><small>Tool 1 : EP</small></a></li>
            <li><a href="#step-2">Step 2<br /><small>Tool 2 : EB</small></a></li>
            <li><a href="#step-3">Step 3<br /><small>Tool 3 : EMC</small></a></li>
            <li><a href="#step-4">Step 4<br /><small>Tool 4 : EF</small></a></li>
            <li><a href="#step-5">Step 5<br /><small>Tool 5 : EC</small></a></li>
            <li><a href="#step-6">Step 6<br /><small>Tool 6 : ERC</small></a></li>
            <li><a href="#step-7">Step 7<br /><small>Tool 7 : ET</small></a></li>
            <li><a href="#step-8">Step 8<br /><small>File Upload</small></a></li>
            <li><a href="#step-9">Step 9<br /><small>Submission</small></a></li>
        </ul>

        <div>

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
                                    <label class="radio-inline tool_check"><input id="tool<?= $tool->tool_no ?>_yes_check" type="radio" name="question_enable_tool<?= $tool->tool_no ?>" value="true"  <?= $disabled ?>>Yes</label> <!-- temporary remove required -->
                                    <label class="radio-inline tool_check"><input id="tool<?= $tool->tool_no ?>_no_check" type="radio" name="question_enable_tool<?= $tool->tool_no ?>" value="false"  <?= $disabled ?>>No</label>
                                    <br><br>

                                    <div id="justification_implement<?= $tool->tool_no ?>" style="display:none">
                                        Justification is required, before proceeding
                                        <div class="panel-body">
                                            <input type="hidden" value="<?= $tool->tool_no ?>" name="tool<?= $tool->tool_no ?>">
                                            <div id='implementation_tool_justification<?= $tool->tool_no ?>'>
                                                <textarea <?= $disabled ?> id='tool_no_justification<?= $tool->tool_no ?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no ?>"></textarea><br>

                                            </div>
                                        </div>
                                    </div>


                                    <button id="btn_tool<?= $tool->tool_no ?>" type="button" class="btn btn-info" style="display:none">Justification</button>
                                </h4>

                                <div class="help-block with-errors" style='text-align: center'></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <table class="table">
                                        <tr>
                                            <td style="width: 25%">
                                                <h4><b>Date of Implementation : </b><?php
                                                    $data = array(
                                                        'class' => 'form-control',
                                                        'name' => 'date_implement#' . $tool->id,
                                                        'placeholder' => 'Select date',
                                                        'type' => 'date',
                                                        'readonly' => $readonly
                                                    );
                                                    echo form_input($data);
                                                    ?> </h4>
                                                <div class="help-block with-errors"></div>
                                            </td>
                                            <td style="width: 5%">

                                            </td>
                                            <td style="width: 70%">
                                                <h4><b>File(s) uploaded : </b></h4>

                                                <?php foreach ($attachments as $file): ?>

                                                    <?php if ($file->id_tool == $tool->tool_no): ?>
                                                <li class="imagelocation<?= $file->id ?>" >

                                                    <a href="<?= base_url($file->path) ?>"  target="_blank" ><?= $file->file_name ?></a>&nbsp;

                                                </li>
                                            <?php endif;
                                        endforeach; ?>

                                        </td>

                                        </tr>

                                    </table>

                                </div>
                            </div>
                            <div id="table-overlay<?= $tool->tool_no ?>">
                                <table  id="table-tool<?= $tool->tool_no ?>" class="table table-full ">

                                    <tr>
                                        <td>
                                            <!--                                            No-->
                                        </td>
                                        <td  style="width: 40%">
                                            Subject
                                        </td>
                                        <td style="width: 25%">
                                           Premise Status
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
                                        <td  class="doestatus-column">
                                            DOE Status
                                            <table class="table borderless" >
                                                <tr>
                                                    <td style="width:114px"  class="doestatus-column">
                                                        <b>Yes</b> 
                                                    </td>
                                                    <td  style="width:114px"  class="doestatus-column">
                                                        <b>No</b> 
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php // ########  TOOL 2 & 7 ###########  ?>
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
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                                        <label for="yesCheck<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>

                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                                        <label for="noCheck<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable" <?= $disabled ?>>
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
                                                                            <textarea class="textarea_editor" rows="6" placeholder="Justification " name="question_id_<?= $quest->id ?>[justification]" <?= $disabled ?>></textarea><br>
                                                                        </div>
                                                                        <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td class="doestatus-column">
                                                                        <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                                        <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">

                                                                        <table class="table borderless">
                                                                            <tr>
                                                                                <td class="doestatus-column">
                                                                                    <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerYes<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                                    <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td class="doestatus-column">
                                                                                    <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNo<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                                    <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2"  class="doestatus-column">
                                                                                    <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                                        <label for="sel1">Score:</label>
                                                                                        <select class="form-control" name='scoreDOE<?= $quest->id ?>'>
                                                                                            <option value="<?= $quest->score ?>"><?= $quest->score ?></option> <!-- Full Score -->
                                                                                            <option value="<?= $quest->score / 2 ?>"><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                            <option value="<?= $quest->score / 4 ?>"><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                        </select>
                                                                                    </div>
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
                                                                        <div class="form-group">
                                                                            <table class="table table- table-condensed">
                                                                                <tr>
                                                                                    <td>
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                                        <label for="yesCheck<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                                        <label for="noCheck<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable" <?= $disabled ?>>
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
                                                                            <textarea class="textarea_editor" rows="6" placeholder="Justification " name="question_id_<?= $quest->id ?>[justification]" <?= $disabled ?>></textarea><br>
                                                                        </div>
                                                                        <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td class="doestatus-column">
                                                                        <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                                        <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">

                                                                        <table class="table borderless">
                                                                            <tr>
                                                                                <td class="doestatus-column">
                                                                                    <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerYes<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                                    <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td class="doestatus-column">
                                                                                    <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNo<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                                    <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2" class="doestatus-column">
                                                                                    <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                                        <label for="sel1">Score:</label>
                                                                                        <select class="form-control" name='scoreDOE<?= $quest->id ?>'>
                                                                                            <option value="<?= $quest->score ?>"><?= $quest->score ?></option> <!-- Full Score -->
                                                                                            <option value="<?= $quest->score / 2 ?>"><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                            <option value="<?= $quest->score / 4 ?>"><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                        </select>
                                                                                    </div>
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

                                        <?php // ########  TOOL 4 & 6 ########### ?>
                                    <?php elseif ($tool->tool_no == '4' || $tool->tool_no == '6'):
                                        foreach ($questions_title as $titles):

                                            foreach ($titles as $title) {
                                                if ($tool->tool_no == $title->id_tool) {
                                                    ?>
                                                    <?php
                                                    if (in_array($title->id_categories, $rules_applied)) {
                                                        echo '<tr>';
                                                        echo '<td></td>';
                                                        echo '<td style="background-color: #ccffcc;">';
                                                        echo $title->main_subject;
                                                        echo '</td>';
                                                        echo '<td style="background-color: #ccffcc;"></td>';
                                                        echo '<td style="background-color: #ccffcc;"></td>';
                                                        echo '<td style="background-color: #ccffcc;"></td>';
                                                        echo '</tr>';
                                                    } else {
                                                        //do nothing                                                          
                                                    }
                                                    ?>


                                                    <?php foreach ($questions as $question): ?>
                                                        <?php foreach ($question as $quest): ?> 
                                                            <?php
                                                            // kalau ada title untuk question 
                                                            if ($quest->id_question_title != NULL && $quest->id_question_title == $title->id) {
                                                                ?> 
                                                                <?php
                                                                if (in_array($title->id_categories, $rules_applied)) {
                                                                    echo '<tr>';
                                                                    echo '<td></td>';
                                                                    echo '<td>';
                                                                    echo $quest->subject;
                                                                    echo '</td>';
                                                                    echo '<td>';
                                                                    ?>
                                                                    <div class="form-group">
                                                                        <table class="table table- table-condensed">
                                                                            <tr>
                                                                                <td>
                                                                                    <input class="magic-doe-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                                    <label for="yesCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-doe-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-doe-radio radio-inline" type="radio"  id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable" <?= $disabled ?>>
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                    <input type='hidden' id='tool_answers_id<?= $quest->id ?>' name="tool_answers_id<?= $quest->id ?>" value="">
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>


                                                                    <?php echo '</td>'; ?>
                                                                    <td>
                                                                        <div id='ifNo<?= $quest->id ?>' style="display:none">
                                                                            <textarea class="textarea_editor" rows="6" placeholder="Justification " name="question_id_<?= $quest->id ?>[justification]" <?= $disabled ?>></textarea><br>
                                                                        </div>
                                                                        <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td class="doestatus-column">
                                                                        <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                                        <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">

                                                                        <table class="table borderless">
                                                                            <tr>
                                                                                <td class="doestatus-column">
                                                                                    <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerYes<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                                    <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td class="doestatus-column">
                                                                                    <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNo<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                                    <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2" class="doestatus-column">
                                                                                    <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                                        <label for="sel1">Score:</label>
                                                                                        <select class="form-control" name='scoreDOE<?= $quest->id ?>'>
                                                                                            <option value="<?= $quest->score ?>"><?= $quest->score ?></option> <!-- Full Score -->
                                                                                            <option value="<?= $quest->score / 2 ?>"><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                            <option value="<?= $quest->score / 4 ?>"><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                        </select>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                    <?php
                                                                    echo '</tr>';
                                                                } else {
                                                                    
                                                                }
                                                                ?>

                                                                <?php
                                                            } endforeach;
                                                    endforeach;
                                                }
                                            } endforeach;
                                        ?>




                                        <?php // ########  TOOL 3 ########### ?>
                                        <?php
                                    //elseif ($tool->tool_no == '3' || $tool->tool_no == '4' || $tool->tool_no == '6'):
                                    elseif ($tool->tool_no == '3'):
                                        foreach ($questions_title as $titles):

                                            foreach ($titles as $title) {
                                                if ($tool->tool_no == $title->id_tool) {
                                                    ?>

                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td style="background-color: #ccffcc;">
                                                            <?php
                                                            if (in_array($title->id_categories, $rules_applied)) {
                                                                echo $title->main_subject;
                                                            } else {
                                                                //do nothing
                                                                if ($tool->tool_no == '3') {
                                                                    echo $title->main_subject;
                                                                }
                                                            }
                                                            ?>
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
                                                                        <?php
                                                                        if (in_array($title->id_categories, $rules_applied)) {
                                                                            echo $quest->subject;
                                                                        } else {
                                                                            //do nothing
                                                                            if ($tool->tool_no == '3') {
                                                                                echo $quest->subject;
                                                                            }
                                                                        }
                                                                        ?>

                                                                    </td>
                                                                    <td>
                                <?php if ($quest->id_tool == 3) { ?>
                                                                            <div class="form-group">
                                                                                <table class="table table- table-condensed">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                                            <label for="yesCheck<?= $quest->id ?>">
                                                                                                &nbsp;
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                                            <label for="noCheck<?= $quest->id ?>">
                                                                                                &nbsp;
                                                                                            </label>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input class="magic-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable" <?= $disabled ?>>
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
                                                                            <textarea class="textarea_editor" rows="6" placeholder="Justification " name="question_id_<?= $quest->id ?>[justification]" <?= $disabled ?>></textarea><br>
                                                                        </div>
                                <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td class="doestatus-column">
                                                                        <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                                        <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">

                                                                        <table class="table borderless">
                                                                            <tr>
                                                                                <td class="doestatus-column">
                                                                                    <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerYes<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                                    <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td class="doestatus-column">
                                                                                    <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNo<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                                    <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2" class="doestatus-column">
                                                                                    <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                                        <label for="sel1">Score:</label>
                                                                                        <select class="form-control" name='scoreDOE<?= $quest->id ?>'>
                                                                                            <option value="<?= $quest->score ?>"><?= $quest->score ?></option> <!-- Full Score -->
                                                                                            <option value="<?= $quest->score / 2 ?>"><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                            <option value="<?= $quest->score / 4 ?>"><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                        </select>
                                                                                    </div>
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

                                        <?php //kalau tool ini tiada main subject ########  TOOL 1 & 5 ###########  ?>

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
                                                                            <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                            <label for="yesCheck<?= $quest->id ?>">
                                                                                &nbsp;
                                                                            </label>
                                                                        </td>
                                                                        <td>
                                                                            <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                            <label for="noCheck<?= $quest->id ?>">
                                                                                &nbsp;
                                                                            </label>
                                                                        </td>
                                                                        <td>
                                                                            <input class="magic-radio radio-inline" type="radio" id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable" <?= $disabled ?>>
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
                                                                <textarea class="textarea_editor" rows="6" placeholder="Justification " name="question_id_<?= $quest->id ?>[justification]" <?= $disabled ?>></textarea><br>
                                                            </div>
                    <?php $x[] = $quest->id ?>
                                                        </td>
                                                        <td class="doestatus-column">
                                                            <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                            <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">

                                                            <table class="table borderless">
                                                                <tr>
                                                                    <td class="doestatus-column">
                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerYes<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                        <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                            &nbsp;
                                                                        </label>
                                                                    </td>
                                                                    <td class="doestatus-column">
                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNo<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                        <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                            &nbsp;
                                                                        </label>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class="doestatus-column">
                                                                        <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                            <label for="sel1">Score:</label>
                                                                            <select class="form-control" name='scoreDOE<?= $quest->id ?>'>
                                                                                <option value="<?= $quest->score ?>"><?= $quest->score ?></option> <!-- Full Score -->
                                                                                <option value="<?= $quest->score / 2 ?>"><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                <option value="<?= $quest->score / 4 ?>"><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                } endforeach;
                                        endforeach;
                                        ?>

    <?php endif ?>
                                </table>
                            </div>

                            <div class="row">

                                <!-- Auto Calculated based on score -->
    <?php echo form_label('Assessment of strength of Tool ' . $tool->tool_no . ' : ' . $tool->tool_title); ?>

                                
                                <h4 id="progress-text<?= $tool->tool_no ?>"></h4>

                                <?php
                                $y[] = $tool->tool_no;
                                ?>


                            </div>
                        </div>


                    </div>
                </div>

<?php endforeach; ?>
            <div id="step-8">
                <div id="form-step-7" role="form" data-toggle="validator">
                    <iframe src="<?php echo base_url(); ?>upload/index/<?= $idpremis ?>" height="800" width="800" style="border:none"></iframe>

                </div>
            </div>
            <div id="step-9">
                <div id="form-step-8" role="form" data-toggle="validator">


                    <div class="panel-body">
                        <h3 style="text-align:center">EMT completed for your premise is </h3> <h2 style="text-align:center"><span class="label label-success"><span id='total_yes'>X</span> / 7 </span></h2>
                        <br>
                        <div class="well">
                            <p>
                                <input class= "magic-checkbox" type="checkbox" name="declaration" id="declaration_cb" value="accept"  checked="<?= $accepted ?>" <?= $disabled_click ?>>
                                <label for="declaration_cb">

                                    &quot; I declare that the entire report is the product of my own work and all the fact stated in it and the accompanying information is true and correct and that
                                    I have not withheld or distorted any material facts&quot;
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
                                        'value' => date("d M Y", strtotime($answers2->submission_date)),
                                        'readonly' => true,
                                        'style' => 'font-size:15pt'
                                    );
                                    echo form_input($data);
                                    ?> 
                                </td>

                            </tr>

                        </table>

                    </div>
                </div>
            </div>

            </div>
        </div>
</form>



<?php //print_r($x)    ?>
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
                <!--<div id="implementation_tool<?= $tool->tool_no ?>" class="modal fade" role="dialog">
                     <div class="modal-dialog">

                          Modal content
                         <div class="modal-content">
                             <form id="justificationModal<?= $tool->tool_no ?>" method="post">
                             <div class="modal-header">

                                 <h4 class="modal-title">Justification is required, before proceeding</h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" value="<?= $tool->tool_no ?>" name="tool<?= $tool->tool_no ?>">
                             <div id='implementation_tool_justification<?= $tool->tool_no ?>'>
                                 <textarea id='tool_no_justification<?= $tool->tool_no ?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no ?>"></textarea><br>
                                 <button onclick='submit_justification(<?= $tool->tool_no ?>)'>submit</button>
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
//            url : "<?php echo site_url('questions/submit_implementation_justification/') ?>"+tool_no ,
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
//        url : "<?php echo site_url('questions/get_tool_submission_status/') ?>" + idpremise,
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
        $("input[type=radio][name=question_enable_tool" + value + "]").change(function () {
            //ENABLE/DISABLE QUESTION

            if (this.value == 'true') {
                $("#step-" + value + " :input").removeAttr('disabled').removeClass('ui-state-disabled');
                $("#tool" + value + "_no_check").removeAttr('disabled').removeClass('ui-state-disabled');
                $("#tool_no").attr("disabled", false);
                $('#justification_implement' + value).slideUp("slow")
            } else if (this.value == 'false') {
                //$("#my_form :input").attr("disabled", true).addClass('ui-state-disabled');
                $("#step-" + value + " :input").attr("disabled", true).addClass('ui-state-disabled');
                //$("#btn_tool"+value).removeAttr('disabled').removeClass( 'ui-state-disabled' );
                $("#tool" + value + "_yes_check").removeAttr('disabled').removeClass('ui-state-disabled');
                $("#tool" + value + "_no_check").removeAttr('disabled').removeClass('ui-state-disabled');
                //$("#submit_btn").attr("disabled", false);
                $("#tool_no").attr("disabled", false);
                $('#tool_no_justification' + value).removeAttr('disabled').removeClass('ui-state-disabled');
                $("#implementation_tool" + value).modal('show');
                $('#justification_implement' + value).slideDown("slow");

            }


        });

        $("input").change(function () {
            calculateScore(value);
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
    //IF YES ENABLE SCORE FIELD
    function DOEanswerYesCheck() {

        $.each(varray, function (index, value) {
            // IF no option checked, show justification text field

            if (document.getElementById('DoeAnswerYes' + value).checked) {
                document.getElementById('ifDOEYes' + value).style.display = 'block';
            } else {
                document.getElementById('ifDOEYes' + value).style.display = 'none';
            }
        });
    }


    //ENABLE/DISABLE JUSTIFICAITON CHECK

    function yesnoCheck() {

        $.each(varray, function (index, value) {
            // IF no option checked, show justification text field
            if (document.getElementById('noCheck' + value).checked) {
                document.getElementById('ifNo' + value).style.display = 'block';
            } else {
                document.getElementById('ifNo' + value).style.display = 'none';
            }
        });
    }

    function calculateScore(tool_no) {
        var div = $("div#step-" + tool_no);
        var radiosBtns = div.find("input[type='radio'][id*=yesCheck]:checked");
        //var score = radiosBtns.find("input[type='hidden'][name*=score-]");
        var totalScore = 0;
        var rating = "";


        var sumAll = function (i, radiobtn) {
            if (radiobtn.value == 'Yes') {
                no = radiobtn.id.match(/\d+/); //extract no from radiobtn id

                totalScore = totalScore + parseInt($('input[name=score-' + no + ']').val());
            }

            //console.log(totalScore);
        };

        $.each(radiosBtns, sumAll);


        if (totalScore <= 19) { //Poor
            rating = 'Poor';
        } else if (totalScore >= 20 && totalScore <= 39) { // Fair
            rating = 'Fair';
        } else if (totalScore >= 40 && totalScore <= 59) { //Average
            rating = 'Average';
        } else if (totalScore >= 60 && totalScore <= 79) { // Good
            rating = 'Good';
        } else if (totalScore >= 80 && totalScore <= 100) { // Excellent
            rating = 'Excellent';
        }

        $('#progress' + tool_no).attr('style', "width:" + totalScore + "%;");

        $('#progress-text' + tool_no).html("<h4><b>" + rating + "</b></h4>");

    }

    $.each(no_of_tool, function (index, value) {
        $('#btn' + value).click(function () {
            var v = $('#value' + value).val();

            $('#progress' + value).attr('style', "width:" + v + "%;");
        });
    });



    //DOCUMENT READY
    $(document).ready(function () {
        $(function () {
            //$("input").prop('required',true); temporary
        });

        var idpremise = $("#data_id").val();

//        var havebeenAnswered = <?php //echo ((site_url('questions/get_tool_submission_status/') +idpremise) ? true : false);    ?>;
//        
//        if(havebeenAnswered == true){
        populate_form(idpremise);
//        }

        var session_id = <?php echo json_encode($this->idpremis) ?>;
        //get_tool_status(session_id);


        //$('#myForm :input').attr("disabled", true); //Untuk disable all form field
        
        
        $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'dots',
                    transitionEffect:'fade',
                    keyNavigation:'false',
                    toolbarSettings: {toolbarPosition: 'both',
                                      toolbarButtonPosition: 'right' // left, right
                                      //toolbarExtraButtons: [btnCancel, btnSave, btnFinish]
                                    },
                    anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                 });
    });


    $("#myForm").submit(function (e) {

        $.ajax({
            type: 'POST',
            data: $("#myForm").serialize(),
            url: '<?php echo site_url('answers/submit_review/') ?>"',
            success: function (data) {
//                $("#download_link").html(data);
//                $("#download_modal").modal("show");
                window.setTimeout(function () {
                    //
                    $.notify("Form has been submitted, this page will now refresh");

                }, 500);
//                    window.setTimeout(function(){
//                                     //
//                                    window.location.href = '<?php echo site_url('dashboard/company/') ?>';  
//                                    
//                                      }, 2000);
            }
        });
        return false;
    });

    function populate_form(idpremis)
    {
        //save_method = 'update';
        //$('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('questions/get_tool_submission_status/') ?>" + idpremis,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                for (var key in data) {
                    if (data.hasOwnProperty(key)) {
                        //console.log(key + " -> " + data[key].id_question);

                        if (data[key].status === 'No') {
                            //$('[id="ifNo'+data[key].id_question+'"]').style.display = 'block';
                            document.getElementById('ifNo' + data[key].id_question).style.display = 'block';
                            $('[name="question_id_' + data[key].id_question + '[justification]"]').val(data[key].justification);
                        }

                        $('[name="DoeAnswer' + data[key].id_question + '[status]"][value="' + data[key].doe_status + '"]').prop('checked', true);
                        if (data[key].doe_status === 'Yes') {
                            //$('[id="ifNo'+data[key].id_question+'"]').style.display = 'block';
                            document.getElementById('ifDOEYes' + data[key].id_question).style.display = 'block';
                            $('[name="scoreDOE' + data[key].id_question + '"][value="'+ data[key].doe_score +'"]').prop('selected',true);
                            $('[name="scoreDOE' + data[key].id_question + '"]').prop('disabled', 'disabled');
                  
                           
                        }
                
                
                        $('[name="question_id_' + data[key].id_question + '[status]"][value="' + data[key].status + '"]').prop('checked', true);
                        document.getElementById('tool_answers_id' + data[key].id_question).value = data[key].tool_answers_id;

                        if (data[key].tool7_implementation === 'false') {

                            document.getElementById('justification_implement7').style.display = 'block';
                            $('[id="tool_no_justification7"]').val(data[key].tool7_justification);
                            disable_input(7)
                        }
                        if (data[key].tool1_implementation === 'false') {

                            document.getElementById('justification_implement1').style.display = 'block';
                            $('[id="tool_no_justification1"]').val(data[key].tool1_justification);
                        }
                        if (data[key].tool2_implementation === 'false') {

                            document.getElementById('justification_implement2').style.display = 'block';
                            $('[id="tool_no_justification2"]').val(data[key].tool2_justification);
                        }
                        if (data[key].tool3_implementation === 'false') {

                            document.getElementById('justification_implement3').style.display = 'block';
                            $('[id="tool_no_justification3"]').val(data[key].tool3_justification);
                        }
                        if (data[key].tool4_implementation === 'false') {

                            document.getElementById('justification_implement4').style.display = 'block';
                            $('[id="tool_no_justification4"]').val(data[key].tool4_justification);
                        }
                        if (data[key].tool5_implementation === 'false') {

                            document.getElementById('justification_implement5').style.display = 'block';
                            $('[id="tool_no_justification5"]').val(data[key].tool5_justification);
                        }
                        if (data[key].tool6_implementation === 'false') {

                            document.getElementById('justification_implement6').style.display = 'block';
                            $('[id="tool_no_justification6"]').val(data[key].tool6_justification);
                        }

                        $('[name="question_enable_tool1"][value=' + data[key].tool1_implementation + ']').prop('checked', true);
                        $('[name="question_enable_tool2"][value=' + data[key].tool2_implementation + ']').prop('checked', true);
                        $('[name="question_enable_tool3"][value=' + data[key].tool3_implementation + ']').prop('checked', true);
                        $('[name="question_enable_tool4"][value=' + data[key].tool4_implementation + ']').prop('checked', true);
                        $('[name="question_enable_tool5"][value=' + data[key].tool5_implementation + ']').prop('checked', true);
                        $('[name="question_enable_tool6"][value=' + data[key].tool6_implementation + ']').prop('checked', true);
                        $('[name="question_enable_tool7"][value=' + data[key].tool7_implementation + ']').prop('checked', true);


                        if (data[key].tool1_date_implement === '0000-00-00') {
                            $('[name="date_implement#1"]').val('');
                        } else {
                            $('[name="date_implement#1"]').val(data[key].tool1_date_implement);
                        }

                        if (data[key].tool2_date_implement === '0000-00-00') {
                            $('[name="date_implement#2"]').val('');
                        } else {
                            $('[name="date_implement#2"]').val(data[key].tool2_date_implement);
                        }

                        if (data[key].tool3_date_implement === '0000-00-00') {
                            $('[name="date_implement#3"]').val('');
                        } else {
                            $('[name="date_implement#3"]').val(data[key].tool3_date_implement);
                        }

                        if (data[key].tool4_date_implement === '0000-00-00') {
                            $('[name="date_implement#4"]').val('');
                        } else {
                            $('[name="date_implement#4"]').val(data[key].tool4_date_implement);
                        }

                        if (data[key].tool5_date_implement === '0000-00-00') {
                            $('[name="date_implement#5"]').val('');
                        } else {
                            $('[name="date_implement#5"]').val(data[key].tool5_date_implement);
                        }

                        if (data[key].tool6_date_implement === '0000-00-00') {
                            $('[name="date_implement#6"]').val('');
                        } else {
                            $('[name="date_implement#6"]').val(data[key].tool6_date_implement);
                        }

                        if (data[key].tool7_date_implement === '0000-00-00') {
                            $('[name="date_implement#7"]').val('');
                        } else {
                            $('[name="date_implement#7"]').val(data[key].tool7_date_implement);
                        }
                        //console.log(key.hasOwnProperty());

                        //assign tool_answers_id to hidden input
                        if (data[key].tool1_score_premise != 0) {
                            $('#progress1').width(data[key].tool1_score_premise + '%');
                        }
                        if (data[key].tool2_score_premise != 0) {
                            $('#progress2').width(data[key].tool2_score_premise + '%');
                        }
                        if (data[key].tool3_score_premise != 0) {
                            $('#progress3').width(data[key].tool3_score_premise + '%');
                        }
                        if (data[key].tool4_score_premise != 0) {
                            $('#progress4').width(data[key].tool4_score_premise + '%');
                        }
                        if (data[key].tool5_score_premise != 0) {
                            $('#progress5').width(data[key].tool5_score_premise + '%');
                        }
                        if (data[key].tool6_score_premise != 0) {
                            $('#progress6').width(data[key].tool6_score_premise + '%');
                        }
                        if (data[key].tool7_score_premise != 0) {
                            $('#progress7').width(data[key].tool7_score_premise + '%');
                        }
                       
                       calculateScore(1);
                       calculateScore(2);
                       calculateScore(3);
                       calculateScore(4);
                       calculateScore(5);
                       calculateScore(6);
                       calculateScore(7);
                    }

                }

                //$('#data_id').val(data[key].id);



//            $('[name="id"]').val(data.id);
//            $('[name="jum_sasar_desktop"]').val(data.jum_sasar_desktop);
//            $('[name="jum_desktop"]').val(data.jum_desktop);
//            $('[name="jum_lawatan"]').val(data.jum_lawatan);
//            $('[name="jum_sasar_lawatan"]').val(data.jum_sasar_lawatan);
//            $('[name="jum_sasar_premis"]').val(data.jum_sasar_premis);


                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                //$('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });


    }


    function disable_input(id) {
        //disable input
        //$("#my_form :input").attr("disabled", true).addClass('ui-state-disabled');
        $("#step-" + id + " :input").attr("disabled", true).addClass('ui-state-disabled');
        //$("#btn_tool"+value).removeAttr('disabled').removeClass( 'ui-state-disabled' );
        $("#tool" + id + "_yes_check").removeAttr('disabled').removeClass('ui-state-disabled');
        $("#tool" + id + "_no_check").removeAttr('disabled').removeClass('ui-state-disabled');
        //$("#submit_btn").attr("disabled", false);
        $("#tool_no").attr("disabled", false);
        $('#tool_no_justification' + id).removeAttr('disabled').removeClass('ui-state-disabled');
        $("#implementation_tool" + id).modal('show');
        $('#justification_implement' + id).slideDown("slow");
    }



</script>