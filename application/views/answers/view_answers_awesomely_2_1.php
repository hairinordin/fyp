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


//Tool5 Checkbox
$ceppome_chk = ($tool5_cp->ceppome == 1) ? 'checked' : '';
$cepstpo_chk = ($tool5_cp->cepstpo == 1) ? 'checked' : '';
$cepltpo_chk = ($tool5_cp->cepltpo == 1) ? 'checked' : '';
$cepietso_chk = ($tool5_cp->cepietso == 1) ? 'checked' : '';
$csec_chk = ($tool5_cp->csec == 1) ? 'checked' : '';
$cepswam_chk = ($tool5_cp->cepswam == 1) ? 'checked' : '';
$cebfo_chk = ($tool5_cp->cebfo == 1) ? 'checked' : '';
$cepso_chk = ($tool5_cp->cepso == 1) ? 'checked' : '';
?>

<?php
//echo '<pre>';
//print_r($answers);
//echo '</pre>';
?>
<form id="myForm" action="<?php //echo base_url('answers/submit_review') ?>" data-toggle="validator" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <input type="hidden" id="method" name='method' value="submit">
    <input type="hidden" id="data_id" name='data_id' value="">
    <input type="hidden" id="idpremise" name='idpremise' value="<?= $idpremis ?>">
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
<!--            <li><a href="#step-8">Step 8<br /><small>File Upload</small></a></li>-->
            <li><a href="#step-8">Step 8<br /><small>Submission</small></a></li>
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
    <?php
    if ($tool->tool_no == '1') {
        if ($answers2->tool1_implementation == 'true') {
            $radioYes = 'checked';
            $radioNo = 'disabled';
        } elseif ($answers2->tool1_implementation == 'false') {
            $radioYes = 'disabled';
            $radioNo = 'checked';
        }
    } elseif ($tool->tool_no == '2') {
        if ($answers2->tool2_implementation == 'true') {
            $radioYes = 'checked';
            $radioNo = 'disabled';
        } elseif ($answers2->tool2_implementation == 'false') {
            $radioYes = 'disabled';
            $radioNo = 'checked';
        }
    } elseif ($tool->tool_no == '3') {
        if ($answers2->tool3_implementation == 'true') {
            $radioYes = 'checked';
            $radioNo = 'disabled';
        } elseif ($answers2->tool3_implementation == 'false') {
            $radioYes = 'disabled';
            $radioNo = 'checked';
        }
    } elseif ($tool->tool_no == '4') {
        if ($answers2->tool4_implementation == 'true') {
            $radioYes = 'checked';
            $radioNo = 'disabled';
        } elseif ($answers2->tool4_implementation == 'false') {
            $radioYes = 'disabled';
            $radioNo = 'checked';
        }
    } elseif ($tool->tool_no == '5') {
        if ($answers2->tool5_implementation == 'true') {
            $radioYes = 'checked';
            $radioNo = 'disabled';
        } elseif ($answers2->tool5_implementation == 'false') {
            $radioYes = 'disabled';
            $radioNo = 'checked';
        }
    } elseif ($tool->tool_no == '6') {
        if ($answers2->tool6_implementation == 'true') {
            $radioYes = 'checked';
            $radioNo = 'disabled';
        } elseif ($answers2->tool6_implementation == 'false') {
            $radioYes = 'disabled';
            $radioNo = 'checked';
        }
    } elseif ($tool->tool_no == '7') {
        if ($answers2->tool7_implementation == 'true') {
            $radioYes = 'checked';
            $radioNo = 'disabled';
        } elseif ($answers2->tool7_implementation == 'false') {
            $radioYes = 'disabled';
            $radioNo = 'checked';
        }
    }
    ?>

                                    <label class="radio-inline tool_check"><input type="radio" name="question_enable_tool<?= $tool->tool_no ?>" value="true"  <?= $radioYes ?>>Yes</label> <!-- temporary remove required -->
                                    <label class="radio-inline tool_check"><input type="radio" name="question_enable_tool<?= $tool->tool_no ?>" value="false"  <?= $radioNo ?>>No</label>
                                    <br><br>




    <?php
    if ($tool->tool_no == '1') {
        if (isset($answers2->tool1_justification)) {
            $justificationTxt = $answers2->tool1_justification;
            ?>
                                            <div id="justification_implement<?= $tool->tool_no ?>" style="display:block">
                                                Justification is required, before proceeding
                                                <div class="panel-body">
                                                    <div class="form-group" id='implementation_tool_justification<?= $tool->tool_no ?>'>
                                                        <textarea <?= $disabled ?> id='tool_no_justification<?= $tool->tool_no ?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no ?>"><?= $justificationTxt ?></textarea><br>
                                                    </div>
                                                </div>
                                            </div>
            <?php
        } else {
            $justificationTxt = '';
        }
    } elseif ($tool->tool_no == '2') {
        if (isset($answers2->tool2_justification)) {
            $justificationTxt = $answers2->tool2_justification;
            ?>
                                            <div id="justification_implement<?= $tool->tool_no ?>" style="display:block">
                                                Justification is required, before proceeding
                                                <div class="panel-body">
                                                    <div class="form-group" id='implementation_tool_justification<?= $tool->tool_no ?>'>
                                                        <textarea <?= $disabled ?> id='tool_no_justification<?= $tool->tool_no ?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no ?>"><?= $justificationTxt ?></textarea><br>
                                                    </div>
                                                </div>
                                            </div>
            <?php
        } else {
            $justificationTxt = '';
        }
    } elseif ($tool->tool_no == '3') {
        if (isset($answers2->tool3_justification)) {
            $justificationTxt = $answers2->tool3_justification;
            ?>
                                            <div id="justification_implement<?= $tool->tool_no ?>" style="display:block">
                                                Justification is required, before proceeding
                                                <div class="panel-body">
                                                    <div class="form-group" id='implementation_tool_justification<?= $tool->tool_no ?>'>
                                                        <textarea <?= $disabled ?> id='tool_no_justification<?= $tool->tool_no ?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no ?>"><?= $justificationTxt ?></textarea><br>
                                                    </div>
                                                </div>
                                            </div>
            <?php
        } else {
            $justificationTxt = '';
        }
    } elseif ($tool->tool_no == '4') {
        if (isset($answers2->tool4_justification)) {
            $justificationTxt = $answers2->tool4_justification;
            ?>
                                            <div id="justification_implement<?= $tool->tool_no ?>" style="display:block">
                                                Justification is required, before proceeding
                                                <div class="panel-body">
                                                    <div class="form-group" id='implementation_tool_justification<?= $tool->tool_no ?>'>
                                                        <textarea <?= $disabled ?> id='tool_no_justification<?= $tool->tool_no ?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no ?>"><?= $justificationTxt ?></textarea><br>
                                                    </div>
                                                </div>
                                            </div>
            <?php
        } else {
            $justificationTxt = '';
        }
    } elseif ($tool->tool_no == '5') {
        if (isset($answers2->tool5_justification)) {
            $justificationTxt = $answers2->tool5_justification;
            ?>
                                            <div id="justification_implement<?= $tool->tool_no ?>" style="display:block">
                                                Justification is required, before proceeding
                                                <div class="panel-body">
                                                    <div class="form-group" id='implementation_tool_justification<?= $tool->tool_no ?>'>
                                                        <textarea <?= $disabled ?> id='tool_no_justification<?= $tool->tool_no ?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no ?>"><?= $justificationTxt ?></textarea><br>
                                                    </div>
                                                </div>
                                            </div>
            <?php
        } else {
            $justificationTxt = '';
        }
    } elseif ($tool->tool_no == '6') {
        if (isset($answers2->tool6_justification)) {
            $justificationTxt = $answers2->tool6_justification;
            ?>
                                            <div id="justification_implement<?= $tool->tool_no ?>" style="display:block">
                                                Justification is required, before proceeding
                                                <div class="panel-body">
                                                    <div class="form-group" id='implementation_tool_justification<?= $tool->tool_no ?>'>
                                                        <textarea <?= $disabled ?> id='tool_no_justification<?= $tool->tool_no ?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no ?>"><?= $justificationTxt ?></textarea><br>
                                                    </div>
                                                </div>
                                            </div>
            <?php
        } else {
            $justificationTxt = '';
        }
    } elseif ($tool->tool_no == '7') {
        if (isset($answers2->tool7_justification)) {
            $justificationTxt = $answers2->tool7_justification;
            ?>
                                            <div id="justification_implement<?= $tool->tool_no ?>" style="display:block">
                                                Justification is required, before proceeding
                                                <div class="panel-body">
                                                    <div class="form-group" id='implementation_tool_justification<?= $tool->tool_no ?>'>
                                                        <textarea <?= $disabled ?> id='tool_no_justification<?= $tool->tool_no ?>' class="textarea_editor" rows="6" placeholder="Justification " name="tool_justification<?= $tool->tool_no ?>"><?= $justificationTxt ?></textarea><br>
                                                    </div>
                                                </div>
                                            </div>
            <?php
        } else {
            $justificationTxt = '';
        }
    }
    ?>
                                    <input type="hidden" value="<?= $tool->tool_no ?>" name="tool<?= $tool->tool_no ?>">




        <!--                                    <button id="btn_tool<?= $tool->tool_no ?>" type="button" class="btn btn-info" style="display:none">Justification</button>-->
                                </h4>

                                <div class="help-block with-errors" style='text-align: center'></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <table class="table">
                                        <tr>
                                            <td style="width: 25%">
                                                <h4><b>Date of Implementation : </b><?php
                                if ($tool->tool_no == '1') {
                                    $date_implementation = $answers2->tool1_date_implement;
                                } elseif ($tool->tool_no == '2') {
                                    $date_implementation = $answers2->tool2_date_implement;
                                } elseif ($tool->tool_no == '3') {
                                    $date_implementation = $answers2->tool3_date_implement;
                                } elseif ($tool->tool_no == '4') {
                                    $date_implementation = $answers2->tool4_date_implement;
                                } elseif ($tool->tool_no == '5') {
                                    $date_implementation = $answers2->tool5_date_implement;
                                } elseif ($tool->tool_no == '6') {
                                    $date_implementation = $answers2->tool6_date_implement;
                                } elseif ($tool->tool_no == '7') {
                                    $date_implementation = $answers2->tool7_date_implement;
                                }

                                $data = array(
                                    'class' => 'form-control',
                                    'name' => 'date_implement#' . $tool->id,
                                    'placeholder' => 'Select date',
                                    'type' => 'date',
                                    'readonly' => $readonly,
                                    'value' => ($date_implementation == '0000-00-00') ? '' : $date_implementation
                                );
                                echo form_input($data);
    ?> </h4>
                                                <div class="help-block with-errors"></div>
                                            </td>
                                            <td style="width: 5%">

                                            </td>
                                            <td style="width: 70%">
                                                <h4><b>File(s) uploaded : </b></h4>

    <?php if (($attachments)) { ?>
        <?php foreach ($attachments as $file): ?>
                                                        <?php if (isset($file)) { ?>
                                                            <?php if ($file->id_tool == $tool->tool_no): ?>
                                                        <li class="imagelocation<?= $file->id ?>" >

                                                            <a href="<?= base_url($file->path) ?>"  target="_blank" ><?= $file->file_name ?></a>&nbsp;

                                                        </li>
                    <?php
                endif;
            }
        endforeach;
    }
    ?>

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
    <?php
    if ($tool->tool_no == 6) {
        echo '<b>Not related</b> ';
    }
    ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="width: 25%">

                                        </td>
                                        <td class="doestatus-column">
                                            DOE Status
                                            <table class="table borderless" >
                                                <tr>
                                                    <td style="width:114px" class="doestatus-column">
                                                        <b>Yes</b> 
                                                    </td>
                                                    <td  style="width:114px" class="doestatus-column">
                                                        <b>No</b> 
                                                    </td>
                                                    <td  style="width:114px" class="doestatus-column">
                                                        <b>Not Applicable</b> 
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
    <?php // ########  TOOL 2 & 7 ###########    ?>
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

                                                                                    <td colspan="3"> 
                                <?php
                                foreach ($answers as $tool_answer):
                                    if ($quest->id == $tool_answer->id_question) {

                                        echo $tool_answer->status;

                                        if ($tool_answer->status == 'No') {
                                            echo '<br><h4><u>Justification</u></h4>' . $tool_answer->justification;
                                        }
//                                                                                            print_r($answers); 
                                    }


                                endforeach;
                                ?>
                                <!--                                                                                        <input class="magic-radio radio-inline" type="radio" id = "yesCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Yes" <?= $disabled ?>>
                                                                                        <label for="yesCheck<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>-->

                                                                                    </td>
                                <!--                                                                                    <td>
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
                                                                                    </td>-->

                                                                                </tr>
                                                                            </table>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>  

                                <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                        <?php //if(($quest->id == 120) || ($quest->id == 121) || ($quest->id == 122)){ ?>
                                                                    <td class="doestatus-column">
                                                                        <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                                        <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">
                                                                        <div class="form-group">
                                                                            <table class="table borderless">
                                                                                <tr>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerYes<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Yes">
                                                                                        <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>
                                                                                    </td>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNo<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="No">
                                                                                        <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>

                                                                                    </td>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNa<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Not Applicable">
                                                                                        <label for="DoeAnswerNa<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>

                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3" class="doestatus-column">
                                                                                        <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                                            <label for="sel1">Score:</label>
                                                                                            <?php if(($quest->id == 120) || ($quest->id == 121) || ($quest->id == 122)){ ?>
                                                                                            <select class="form-control" name='scoreDOE<?= $quest->id ?>' onchange="changeScore(this.value)">
                                                                                                <option value="<?= $quest->score ?>"><?= $quest->score ?></option> <!-- Full Score -->
                                                                                                <option value="<?= $quest->score  / 2?>"><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                                <option value="<?= $quest->score / 4 ?>"><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                            </select>
                                                                                            <?php } else { ?>
                                                                                            <select class="form-control" name='scoreDOE<?= $quest->id ?>'>
                                                                                                <option><?= $quest->score ?></option> <!-- Full Score -->
                                                                                                <option><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                                <option><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                            </select>
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </td>
                                <?php //} else {  ?>

                                                                    <?php //} ?>
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
                                                                                    <td colspan="3">
                                <?php
                                foreach ($answers as $tool_answer):
                                    if ($quest->id == $tool_answer->id_question) {

                                        echo $tool_answer->status;

                                        if ($tool_answer->status == 'No') {
                                            echo '<br><h4><u>Justification</u></h4>' . $tool_answer->justification;
                                        }
//                                                                                            print_r($answers); 
                                    }
                                endforeach;
                                ?>
                                                                                    </td>
                                <!--                                                                                    <td>
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
                                                                                    </td>-->
                                                                                </tr>
                                                                            </table>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>

                                <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td class="doestatus-column">
                                                                        <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                                        <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">
                                                                        <div class="form-group">
                                                                            <table class="table borderless">
                                                                                <tr>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerYes<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Yes">
                                                                                        <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>
                                                                                    </td>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNo<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="No">
                                                                                        <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>

                                                                                    </td>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNa<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Not Applicable">
                                                                                        <label for="DoeAnswerNa<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3" class="doestatus-column">
                                                                                        <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                                            <label for="sel1">Score:</label>
                                                                                            <select class="form-control" name='scoreDOE<?= $quest->id ?>'>
                                                                                                <option><?= $quest->score ?></option> <!-- Full Score -->
                                                                                                <option><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                                <option><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                <?php
                            }
                        } endforeach;
                }
            } endforeach;
        ?>

                                        <?php // ########  TOOL 4 & 6 ########### ?>
                                    <?php elseif ($tool->tool_no == '4' || $tool->tool_no == '6' || $tool->tool_no == '5'):

                                        foreach ($questions_title as $titles):

                                            foreach ($titles as $title) {
                                                if ($tool->tool_no == $title->id_tool) {
                                                    ?>
                                                    <?php
                                                    if ($rules_applied) {
                                                        if ($title->id_categories == 'A' && in_array($title->id_categories, $rules_applied)) {
                                                            echo '<tr><td></td><td colspan="5" style="background-color: #ccffcc;">';
                                                            echo '<b>Environmental Quality Act (Industrial Effluent) 2009</b><br>';
                                                            echo '<b>Environmental Quality Act (Sewage) 2009</b><br>';
                                                            echo '<b>Environmental Quality Act (Prescribe Premise) (Crude Palm Oil) 1977</b><br>';
                                                            echo '</td></tr>';
                                                        } if ($title->id_categories == 'B' && in_array($title->id_categories, $rules_applied)) {
                                                            echo '<tr><td></td><td colspan="5" style="background-color: #ccffcc;">';
                                                            echo '<b>Environmental Quality Act (Schedule Waste) 2005</b>';
                                                            echo '</td></tr>';
                                                        } if ($title->id_categories == 'C' && in_array($title->id_categories, $rules_applied)) {
                                                            echo '<tr><td></td><td colspan="5" style="background-color: #ccffcc;">';
                                                            echo '<b>Environmental Quality Act (Clean Air) 2014</b>';
                                                            echo '</td></tr>';
                                                        }
                                                    }




                                                    if (in_array($title->id_categories, $rules_applied)) {

                                                        if ($tool->tool_no == '5') {
                                                            //INPUT FOR SELECTION CP COURSE

                                                            echo '<tr>';
                                                            echo '<td></td>';
                                                            echo '<td style="background-color: #ccffcc;">';

                                                            if ($title->id_categories == 'A' && in_array($title->id_categories, $rules_applied)) {
                                                                ?>                                                      
                                                                <input class="magic-checkbox radio-inline" type="checkbox" id = "ceppomeChk"  <?= $ceppome_chk ?> onclick="return false;">
                                                                <label for="ceppomeChk">
                                                                    CePPOME
                                                                </label>
                                                                <input class="magic-checkbox radio-inline" type="checkbox" id = "cepstpoChk"  <?= $cepstpo_chk ?> onclick="return false;">
                                                                <label for="cepstpoChk">
                                                                    CePSTPO
                                                                </label>
                                                                <input class="magic-checkbox radio-inline" type="checkbox" id = "cepltpoChk" <?= $cepltpo_chk ?> onclick="return false;">
                                                                <label for="cepltpoChk">
                                                                    CePLTPO
                                                                </label>
                                                                <input class="magic-checkbox radio-inline" type="checkbox" id = "cepietsoChk" <?= $cepietso_chk ?> onclick="return false;">
                                                                <label for="cepietsoChk">
                                                                    CePIETSO
                                                                </label>
                                                                <input class="magic-checkbox radio-inline" type="checkbox" id = "csecChk" <?= $csec_chk ?> onclick="return false;">
                                                                <label for="csecChk">
                                                                    CSEC
                                                                </label>

                            <?php } if ($title->id_categories == 'B' && in_array($title->id_categories, $rules_applied)) { ?>
                                                                <input class="magic-checkbox radio-inline" type="checkbox" id = "cepswamChk" <?= $cepswam_chk ?> onclick="return false;">
                                                                <label for="cepswamChk">
                                                                    CEPSWAM
                                                                </label>
                            <?php } if ($title->id_categories == 'C' && in_array($title->id_categories, $rules_applied)) { ?>
                                                                <input class="magic-checkbox radio-inline" type="checkbox" id = "cebfoChk"  <?= $cebfo_chk ?> onclick="return false;">
                                                                <label for="cebfoChk">
                                                                    CeBFO
                                                                </label>
                                                                <input class="magic-checkbox radio-inline" type="checkbox" id = "cepsoChk"  <?= $cepso_chk ?> onclick="return false;">
                                                                <label for="cepsoChk">
                                                                    CePSO
                                                                </label>

                            <?php }
                            ?>

                                                            <?php
                                                            echo '</td>';
                                                            echo '<td style="background-color: #ccffcc;"></td>';
                                                            echo '<td style="background-color: #ccffcc;"></td>';
                                                            echo '<td style="background-color: #ccffcc;"></td>';
                                                            echo '</tr>';
                                                        } else {
                                                            echo '<tr>';
                                                            echo '<td></td>';
                                                            echo '<td style="background-color: #ccffcc;">';
                                                            echo $title->main_subject;
                                                            echo '</td>';
                                                            echo '<td style="background-color: #ccffcc;"></td>';
                                                            echo '<td style="background-color: #ccffcc;"></td>';
                                                            echo '<td style="background-color: #ccffcc;"></td>';
                                                            echo '</tr>';
                                                        }
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
                                                                                <td colspan="3">
                                    <?php
                                    foreach ($answers as $tool_answer):
                                        if ($quest->id == $tool_answer->id_question) {

                                            echo $tool_answer->status;

                                            if ($tool_answer->status == 'No') {
                                                echo '<br><h4><u>Justification</u></h4>' . $tool_answer->justification;
                                            }
//                                                                                            print_r($answers); 
                                        }
                                    endforeach;
                                    ?>
                                                                                </td>
                                    <!--                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio" id = "noCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="No" <?= $disabled ?>>
                                                                                    <label for="noCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                </td>
                                                                                <td>
                                                                                    <input class="magic-radio radio-inline" type="radio"  id = "naCheck<?= $quest->id ?>" onclick="yesnoCheck()" name="question_id_<?= $quest->id ?>[status]" value="Not applicable" <?= $disabled ?>>
                                                                                    <label for="naCheck<?= $quest->id ?>">
                                                                                        &nbsp;
                                                                                    </label>
                                                                                    <input type='hidden' id='tool_answers_id<?= $quest->id ?>' name="tool_answers_id<?= $quest->id ?>" value="">
                                                                                </td>-->
                                                                            </tr>
                                                                        </table>
                                                                        <div class="help-block with-errors"></div>
                                                                    </div>


                                    <?php echo '</td>'; ?>
                                                                    <td>

                                    <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td class="doestatus-column">
                                                                        <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                                        <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">
                                                                        <div class="form-group">
                                                                            <table class="table borderless">
                                                                                <tr >
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerYes<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Yes">
                                                                                        <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>
                                                                                    </td>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNo<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="No">
                                                                                        <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>

                                                                                    </td>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNa<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Not Applicable">
                                                                                        <label for="DoeAnswerNa<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3" class="doestatus-column">
                                                                                        <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                                            <label for="sel1">Score:</label>
                                                                                            <select class="form-control" name='scoreDOE<?= $quest->id ?>'>
                                                                                                <option><?= $quest->score ?></option> <!-- Full Score -->
                                                                                                <option><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                                <option><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
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




        <?php // ########  TOOL 3 ###########  ?>
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
                                                                                        <td colspan="3">
                                    <?php
                                    foreach ($answers as $tool_answer):
                                        if ($quest->id == $tool_answer->id_question) {

                                            echo $tool_answer->status;

                                            if ($tool_answer->status == 'No') {
                                                echo '<br><h4><u>Justification</u></h4>' . $tool_answer->justification;
                                            }
//                                                                                            print_r($answers); 
                                        }
                                    endforeach;
                                    ?>
                                                                                        </td>
                                    <!--                                                                                        <td>
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
                                                                                        </td>-->
                                                                                    </tr>
                                                                                </table>
                                                                                <div class="help-block with-errors"></div>
                                                                            </div>

                                <?php } ?>
                                                                    </td>
                                                                    <td> 
                                <?php $x[] = $quest->id ?>
                                                                    </td>
                                                                    <td class="doestatus-column">
                                                                        <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                                        <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">
                                                                        <div class="form-group">
                                                                            <table class="table borderless">
                                                                                <tr>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerYes<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Yes">
                                                                                        <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>
                                                                                    </td>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNo<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="No">
                                                                                        <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>

                                                                                    </td>
                                                                                    <td class="doestatus-column">
                                                                                        <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNa<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Not Applicable">
                                                                                        <label for="DoeAnswerNa<?= $quest->id ?>">
                                                                                            &nbsp;
                                                                                        </label>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="3" class="doestatus-column">
                                                                                        <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                                            <label for="sel1">Score:</label>
                                                                                            <select class="form-control" name='scoreDOE<?= $quest->id ?>'>
                                                                                                <option><?= $quest->score ?></option> <!-- Full Score -->
                                                                                                <option><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                                <option><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <div class="help-block with-errors"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>


                                <?php
                            } endforeach;
                    endforeach;
                }
            } endforeach;
        ?>

                                        <?php //kalau tool ini tiada main subject ########  TOOL 1 & 5 ###########    ?>

                                    <?php elseif ($tool->tool_no == '1'): ?>
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
                                                                        <td colspan="3">
                    <?php
                    foreach ($answers as $tool_answer):
                        if ($quest->id == $tool_answer->id_question) {

                            echo $tool_answer->status;

                            if ($tool_answer->status == 'No') {
                                echo '<br><h4><u>Justification</u></h4>' . $tool_answer->justification;
                            }
//                                                                                            print_r($answers); 
                        }
                    endforeach;
                    ?>
                                                                        </td>
                    <!--                                                                        <td>
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
                                                                        </td>-->
                                                                    </tr>
                                                                </table>
                                                                <div class="help-block with-errors"></div>
                                                            </div>

                                                        </td>
                                                        <td>

                    <?php $x[] = $quest->id ?>
                                                        </td>
                                                        <td class="doestatus-column">
                                                            <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                            <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">
                                                            <div class="form-group">
                                                                <table class="table borderless">
                                                                    <tr>
                                                                        <td class="doestatus-column">
                                                                            <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerYes<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Yes">
                                                                            <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                                &nbsp;
                                                                            </label>
                                                                        </td>
                                                                        <td class="doestatus-column">
                                                                            <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNo<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="No">
                                                                            <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                                &nbsp;
                                                                            </label>

                                                                        </td>
                                                                        <td class="doestatus-column">
                                                                            <input class="magic-doe-radio radio-inline" type="radio" id = "DoeAnswerNa<?= $quest->id ?>" onclick="DOEanswerYesCheck()" name="DoeAnswer<?= $quest->id ?>[status]" value="Not Applicable">
                                                                            <label for="DoeAnswerNa<?= $quest->id ?>">
                                                                                &nbsp;
                                                                            </label>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3" class="doestatus-column">
                                                                            <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                                <label for="sel1">Score:</label>
                                                                                <select class="form-control" name='scoreDOE<?= $quest->id ?>'>
                                                                                    <option><?= $quest->score ?></option> <!-- Full Score -->
                                                                                    <option><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                    <option><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
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


                                <h4 id="progress-text<?= $tool->tool_no ?>">
    <?php
    if ($tool->tool_no == '1') {
        echo $score1;
    } elseif ($tool->tool_no == '2') {
        echo $score2;
    } elseif ($tool->tool_no == '3') {
        echo $score3;
    } elseif ($tool->tool_no == '4') {
        echo $score4;
    } elseif ($tool->tool_no == '5') {
        echo $score5;
    } elseif ($tool->tool_no == '6') {
        echo $score6;
    } elseif ($tool->tool_no == '7') {
        echo $score7;
    }
    ?>
                                </h4>  
                                    <?php
                                    $y[] = $tool->tool_no;
                                    ?>


                            </div>
                        </div>


                    </div>
                </div>

<?php endforeach; ?>
            <!--            <div id="step-8">
                            <div id="form-step-7" role="form" data-toggle="validator">
                                <iframe src="<?php echo base_url(); ?>upload/index/<?= $idpremis ?>" height="800" width="800" style="border:none"></iframe>
            
                            </div>
                        </div>-->
            <div id="step-8">
                <div id="form-step-7" role="form" data-toggle="validator">
                    <div class="panel-body">

                        <h3 style="text-align:center">EMT completed for this premise is </h3> <h2 style="text-align:center"><span class="label label-success"><span><?= $total_tool_implement ?></span> / 7 </span></h2>
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
<!--                        <table class="table">
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
//                                    echo form_input($data);
?> 
                                </td>

                            </tr>

                        </table>-->

                    </div>
                </div>
            </div>

        </div>
    </div>
</form>



<?php //print_r($x)       ?>
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
<!-- MODAL TYPE OF VERIFICATION -->
<div class="modal fade" id="confirm-verification" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Type of Verification</h4>
            </div>

            <div class="modal-body">
                <p>
                <div class="form-group">
<!--                    <label class="radio-inline tool_check"><input id="type_desktop" type="radio" name="verify_type" value="Desktop" required>Desktop</label>-->
<!--                    <label class="radio-inline tool_check"><input id="type_fi" type="radio" name="verify_type" value="FI" required>Field Inspection</label>-->
                    <input type="hidden" name="verify_type" value="FI">
                </div>
                </p>
                <p>Do you want to proceed?</p>
                <p class="debug-url"></p>
            </div>

            <div class="modal-footer">
                <button id="update_verification" class="btn btn-danger btn-ok">Proceed</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.history.back();">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div id="dialog-confirm" title="Send for approval?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Thank you. Please send the form for Pegawai Penyelia approval via Assessment Submission menu or click the button below.</p>
</div>
<div class="modal-loading"></div>

<script>

    var varray = <?php echo json_encode($x) ?>;
    var no_of_tool = <?php echo json_encode($y) ?>;


    //console.log(varray.toString());

    //IF YES ENABLE SCORE FIELD
    function DOEanswerYesCheck() {

        $.each(varray, function (index, value) {
            // IF no option checked, show justification text field
            if(value == 120 || value == 121 || value == 122){
                
                    if (document.getElementById('DoeAnswerYes' + value).checked) {
                        
//                       document.getElementById('ifDOEYes120').style.display = 'block';
//                       document.getElementById('ifDOEYes121').style.display = 'block';
//                       document.getElementById('ifDOEYes122').style.display = 'block';
                       
                       document.getElementById('ifDOEYes' + value).style.display = 'block';
                       
//                       document.getElementById('DoeAnswerYes120').checked = true;
//                       document.getElementById('DoeAnswerYes121').checked = true;
//                       document.getElementById('DoeAnswerYes122').checked = true;
                       
                   } else if(document.getElementById('DoeAnswerNo' + value).checked){
//                       document.getElementById('ifDOEYes120').style.display = 'none';
//                       document.getElementById('ifDOEYes121').style.display = 'none';
//                       document.getElementById('ifDOEYes122').style.display = 'none';
                       
                       document.getElementById('ifDOEYes' + value).style.display = 'none';
//                       document.getElementById('DoeAnswerNo120').checked = true;
//                       document.getElementById('DoeAnswerNo121').checked = true;
//                       document.getElementById('DoeAnswerNo122').checked = true;
                   } else if(document.getElementById('DoeAnswerNa' + value).checked){
//                       document.getElementById('ifDOEYes120').style.display = 'none';
//                       document.getElementById('ifDOEYes121').style.display = 'none';
//                       document.getElementById('ifDOEYes122').style.display = 'none';
                       
                       document.getElementById('ifDOEYes' + value).style.display = 'none';
//                       document.getElementById('DoeAnswerNa120').checked = true;
//                       document.getElementById('DoeAnswerNa121').checked = true;
//                       document.getElementById('DoeAnswerNa122').checked = true;
                   }
                   
            } else {
                
                if (document.getElementById('DoeAnswerYes' + value).checked) {
                    document.getElementById('ifDOEYes' + value).style.display = 'block';
                } else {
                    document.getElementById('ifDOEYes' + value).style.display = 'none';
                }
            }
            
        });
    }
    
    function changeScore(score){
        $.each(varray, function (index, value) {
            // IF no option checked, show justification text field
            if(value == 120 || value == 121 || value == 122){
                //alert(value);name="scoreDOE120"
                $('[name=scoreDOE120]').val(score);
                $('[name=scoreDOE121]').val(score);
                $('[name=scoreDOE122]').val(score);
            }
        });
        
    }
    
   $body = $("body");
   
   $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }    
    });
    //DOCUMENT READY
    $(document).ready(function () {
        
        var idpremise = $("#idpremise").val();
        var emt_id = $("#data_id").val();

        checkVerificationExist(idpremise);


        function checkVerificationExist(idpremise) {
            $.ajax({
                type: 'GET',
                url: "<?php echo site_url('answers/checkVerification/') ?>" + idpremise,
                //data: { postVar1: 'theValue1', postVar2: 'theValue2' },
                success: function (data) {
                    // successful request; do something with the data
                    if (data === 'Desktop' || data === 'FI') {
                        $('#confirm-verification').modal('hide');
                    } else {
                        $('#confirm-verification').modal('show');
                        //loadVerificationModal();
                    }
                },
                error: function () {
                    // failed request; give feedback to user
                    //$('#ajax-panel').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
                    alert('error');
                }
            });
        }

//        function loadVerificationModal(){
//        //Verification modal
//        $(window).on('load',function(){
//            $('#confirm-verification').modal('show');
//        });
//        
//        $('#confirm-verification').on('show.bs.modal', function(e) {
//            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
//            
//            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
//        });
//        
//        $('#confirm-verification').on('hidden.bs.modal', function () {
//            window.alert('hidden event fired!');
//        });
//        }

        $("#update_verification").click(function (e) {
            e.preventDefault();
            //var isChecked = $("[name=verify_type]:checked").length;
//            if (isChecked) {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('answers/setVerificationType/') ?>" + idpremise,
                data: {
                    verify_type: $("[name=verify_type]").val()
                },
                success: function (result) {
                    $('#confirm-verification').modal('hide');
                },
                error: function (result) {
                    alert('error');
                }
            });
//            } else {
//                window.setTimeout(function () {
//                    $.notify({
//                        message: "Please select one of the verification type."
//                    },
//                            {
//                                placement: {
//                                    from: "top",
//                                    align: "center"
//                                },
//                                type: "danger"
//                            });
//
//                }, 500);
//            }

        });

        $(function () {
            $("input").prop('required', true);
        });



        var session_id = <?php echo json_encode($this->idpremis) ?>;
        //get_tool_status(session_id);

        var btnDoeFinish = $('<button></button>').text('Submit score')
                .attr("id", "submit_btn")
                .val('submit')
                .addClass('btn btn-info')
                .addClass('btn-finish')
                .prop("disabled", true)
                .on('click', function () {

                    if (!$(this).hasClass('disabled')) {
                        var elmForm = $("#myForm");
                        if (elmForm) {
                            elmForm.validator('validate');
                            var elmErr = elmForm.find('.has-error');

                            //return true;
                            if (elmErr && elmErr.length > 0) {
                                alert('Oops we still have error in the form');

                                return false;
                            } else {
                                method.value = "submit";
                                elmForm.submit();
                                return false;
                            } // temporary disable
                            //elmForm.submit();
                        }
                    }
                });

        var btnSave = $('<button></button>').text('Save as draft and exit')
                .attr("id", "save_btn")
                .val('save')
                .addClass('btn btn-success')
                .on('click', function () {
                    //$('#smartwizard').smartWizard("reset");
                    //$('#myForm').find("input, textarea").val("");
                    method.value = "save";
                });


        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            transitionEffect: 'fade',
            keyNavigation: 'false',
            toolbarSettings: {toolbarPosition: 'both',
                toolbarButtonPosition: 'right', // left, right
                toolbarExtraButtons: [btnSave, btnDoeFinish]
            },
            anchorSettings: {
                markDoneStep: true, // add done css
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            }
        });


        $("#myForm").submit(function (e) {
            e.preventDefault();

            var btn = $(this).find("button:focus").val();

            var dialogTxt = '';
            var notifyTxt = '';
            var submit_flag = false;
            if (btn == 'submit') {
                dialogTxt = 'Do you want to submit this form?';
                notifyTxt = 'Your form has been submitted.';
                submit_flag = true;

                //return false;
            } else if (btn == 'save') {
                dialogTxt = 'Do you want to save this form?';
                notifyTxt = 'Your form has been saved.';
                //console.log('im save');
            }

            $('#save_btn, #submit_btn').click(function (event) {
                if ($(event.target).attr('id') == 'save_btn') {
                    dialogTxt = 'Do you want to save this review?';
                } else if ($(event.target).attr('id') == 'submit_btn') {
                    dialogTxt = 'Do you want to submit this review?';
                }
            });

            var confirmDialog = confirm(dialogTxt);
            if (confirmDialog == true) {
                $.ajax({
                    type: 'POST',
                    data: $("#myForm").serialize(),
                    url: '<?php echo site_url('answers/submit_review/') ?>"',
                    success: function (data) {

                        window.alert(notifyTxt);

                        if (submit_flag) {
                            $(function () {
                                $("#dialog-confirm").dialog({
                                    resizable: false,
                                    height: "auto",
                                    width: 400,
                                    modal: true,
                                    buttons: {
                                        "Send for approval": function () {
                                            window.location.href = '<?php echo site_url('remark/pemeriksa_form/') . $idpremis . '/' . $emt_id ?>';
                                        },
                                        "Back to list": function () {
                                            window.location.href = '<?php echo site_url('answers') ?>';
                                        }
                                    }
                                });
                            });
                        } else {
                            window.location.href = '<?php echo site_url('answers') ?>';
                        }
                    }
                });
            } else {
                return false;
            }
        });


//        function disable_input(id) {
//            //disable input
//            //$("#my_form :input").attr("disabled", true).addClass('ui-state-disabled');
//            $("#step-" + id + " :input").attr("disabled", true).addClass('ui-state-disabled');
//            //$("#btn_tool"+value).removeAttr('disabled').removeClass( 'ui-state-disabled' );
//            $("#tool" + id + "_yes_check").removeAttr('disabled').removeClass('ui-state-disabled');
//            $("#tool" + id + "_no_check").removeAttr('disabled').removeClass('ui-state-disabled');
//            //$("#submit_btn").attr("disabled", false);
//            $("#tool_no").attr("disabled", false);
//            $('#tool_no_justification' + id).removeAttr('disabled').removeClass('ui-state-disabled');
//            $("#implementation_tool" + id).modal('show');
//            $('#justification_implement' + id).slideDown("slow");
//        }

        var havebeenAnswered = <?php echo ((base_url('answers/get_reviewed_question_status/') . $emt_id) ? true : false); ?>;

        if (havebeenAnswered == true) {
            populate_form();
        }



    });

    function populate_form()
    {
        //save_method = 'update';
        //$('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('answers/get_reviewed_question_status/' . $emt_id) ?>",
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                if (!$.trim(data)){  
                  console.log("Blank");
                } else {
                    for (var key in data) {
                    if (data.hasOwnProperty(key)) {
                        //console.log(key + " -> " + data[key].id_question);

//                        if (data[key].status === 'No') {
//                            //$('[id="ifNo'+data[key].id_question+'"]').style.display = 'block';
//                            document.getElementById('ifNo' + data[key].id_question).style.display = 'block';
//                            $('[name="question_id_' + data[key].id_question + '[justification]"]').val(data[key].justification);
//                        }

//                        $('[name="DoeAnswer' + data[key].id_question + '[status]"][value="' + data[key].doe_status + '"]').prop('checked', true);
                        if (data[key].doe_status === 'Yes') {
                            //$('[id="ifNo'+data[key].id_question+'"]').style.display = 'block';
                            document.getElementById('ifDOEYes' + data[key].id_question).style.display = 'block';
                            $('[name="scoreDOE' + data[key].id_question + '"][value="' + data[key].doe_score + '"]').prop('selected', true);
                            //$('[name="scoreDOE' + data[key].id_question + '"]').prop('disabled', 'disabled');     
                        } else if (data[key].doe_status === 'Not Applicable') {
                            document.getElementById('ifDOEYes' + data[key].id_question).style.display = 'block';
                            $('[name="scoreDOE' + data[key].id_question + '"][value="' + data[key].doe_score + '"]').prop('selected', true);
                        }

                        $('[name="DoeAnswer' + data[key].id_question + '[status]"][value="' + data[key].doe_status + '"]').prop('checked', true);
                        //document.getElementById('tool_answers_id' + data[key].id_question).value = data[key].tool_answers_id;

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

                        //console.log(key.hasOwnProperty());

                    }

                }

                $('#data_id').val(data[key].emt_id);



//            $('[name="id"]').val(data.id);
//            $('[name="jum_sasar_desktop"]').val(data.jum_sasar_desktop);
//            $('[name="jum_desktop"]').val(data.jum_desktop);
//            $('[name="jum_lawatan"]').val(data.jum_lawatan);
//            $('[name="jum_sasar_lawatan"]').val(data.jum_sasar_lawatan);
//            $('[name="jum_sasar_premis"]').val(data.jum_sasar_premis);


                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                //$('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });


    }

</script>