<?php
//Tool5 Checkbox
$ceppome_chk = ($tool5_cp->ceppome == 1) ? 'checked' : '';
$cepstpo_chk = ($tool5_cp->cepstpo == 1) ? 'checked' : '';
$cepltpo_chk = ($tool5_cp->cepltpo == 1) ? 'checked' : '';
$cepietso_chk = ($tool5_cp->cepietso == 1) ? 'checked' : '';
$csec_chk = ($tool5_cp->csec == 1) ? 'checked' : '';
$cepswam_chk = ($tool5_cp->cepswam == 1) ? 'checked' : '';
$cebfo_chk = ($tool5_cp->cebfo == 1) ? 'checked' : '';
$cepso_chk = ($tool5_cp->cepso == 1) ? 'checked' : '';

//Navigation tab flag
$tool1_assessment_status = ($tool1_assessment_status) ? '<i class="fa fa-check fa-fw greeniconcolor" aria-hidden="true"></i>' : '<i class="fa fa-times fa-fw rediconcolor" aria-hidden="true"></i>';
$tool2_assessment_status = ($tool2_assessment_status) ? '<i class="fa fa-check fa-fw greeniconcolor" aria-hidden="true"></i>' : '<i class="fa fa-times fa-fw rediconcolor" aria-hidden="true"></i>';
$tool3_assessment_status = ($tool3_assessment_status) ? '<i class="fa fa-check fa-fw greeniconcolor" aria-hidden="true"></i>' : '<i class="fa fa-times fa-fw rediconcolor" aria-hidden="true"></i>';
$tool4_assessment_status = ($tool4_assessment_status) ? '<i class="fa fa-check fa-fw greeniconcolor" aria-hidden="true"></i>' : '<i class="fa fa-times fa-fw rediconcolor" aria-hidden="true"></i>';
$tool5_assessment_status = ($tool5_assessment_status) ? '<i class="fa fa-check fa-fw greeniconcolor" aria-hidden="true"></i>' : '<i class="fa fa-times fa-fw rediconcolor" aria-hidden="true"></i>';
$tool6_assessment_status = ($tool6_assessment_status) ? '<i class="fa fa-check fa-fw greeniconcolor" aria-hidden="true"></i>' : '<i class="fa fa-times fa-fw rediconcolor" aria-hidden="true"></i>';
$tool7_assessment_status = ($tool7_assessment_status) ? '<i class="fa fa-check fa-fw greeniconcolor" aria-hidden="true"></i>' : '<i class="fa fa-times fa-fw rediconcolor" aria-hidden="true"></i>';
?>
<?php
        $tool1_DOE_score = ${"tool1_DOE_score_emt$emt_id"};
        $tool2_DOE_score = ${"tool2_DOE_score_emt$emt_id"};
        $tool3_DOE_score = ${"tool3_DOE_score_emt$emt_id"};
        $tool4_DOE_score = ${"tool4_DOE_score_emt$emt_id"};
        $tool5_DOE_score = ${"tool5_DOE_score_emt$emt_id"};
        $tool6_DOE_score = ${"tool6_DOE_score_emt$emt_id"};
        $tool7_DOE_score = ${"tool7_DOE_score_emt$emt_id"};
        
        //Not divide with 100
        $tool1_DOE_score2_wRules = $tool1_DOE_score ? $tool1_DOE_score : '0';
        $tool2_DOE_score2_wRules = $tool2_DOE_score ? $tool2_DOE_score : '0';
        $tool3_DOE_score2_wRules = $tool3_DOE_score ? $tool3_DOE_score : '0';
        $tool4_DOE_score2_wRules = $tool4_DOE_score ? round(($tool4_DOE_score / $no_of_rules), 1) : '0';
        $tool5_DOE_score2_wRules = $tool5_DOE_score ? round(($tool5_DOE_score / $no_of_rules), 1) : '0';
        $tool6_DOE_score2_wRules = $tool6_DOE_score ? round(($tool6_DOE_score / $no_of_rules), 1) : '0';
        $tool7_DOE_score2_wRules = $tool7_DOE_score ? $tool7_DOE_score : '0';
        
        //Divide with 100
        $tool1_DOE_score2 = $tool1_DOE_score ? ($tool1_DOE_score * $tool_weightage[0]->tool_full_score) / 100 : '0';
        $tool2_DOE_score2 = $tool2_DOE_score ? ($tool2_DOE_score * $tool_weightage[1]->tool_full_score) / 100 : '0';
        $tool3_DOE_score2 = $tool3_DOE_score ? ($tool3_DOE_score * $tool_weightage[2]->tool_full_score) / 100 : '0';
        $tool4_DOE_score2 = $tool4_DOE_score ? round((($tool4_DOE_score / $no_of_rules) * $tool_weightage[3]->tool_full_score) / 100, 1) : '0';
        $tool5_DOE_score2 = $tool5_DOE_score ? round((($tool5_DOE_score / $no_of_rules) * $tool_weightage[4]->tool_full_score) / 100, 1) : '0';
        $tool6_DOE_score2 = $tool6_DOE_score ? round((($tool6_DOE_score / $no_of_rules) * $tool_weightage[5]->tool_full_score) / 100, 1) : '0';
        $tool7_DOE_score2 = $tool7_DOE_score ? ($tool7_DOE_score * $tool_weightage[6]->tool_full_score) / 100 : '0';

        $tool1_premise_score = $answers2->tool1_implementation == 'false' ? 0 : $answers2->tool1_score_premise / 100 * $tool_weightage[0]->tool_full_score;
        $tool2_premise_score = $answers2->tool2_implementation == 'false' ? 0 : $answers2->tool2_score_premise / 100 * $tool_weightage[1]->tool_full_score;
        $tool3_premise_score = $answers2->tool3_implementation == 'false' ? 0 : $answers2->tool3_score_premise / 100 * $tool_weightage[2]->tool_full_score;
        $tool4_premise_score = $answers2->tool4_implementation == 'false' ? 0 : $answers2->tool4_score_premise / 100 * $tool_weightage[3]->tool_full_score;
        $tool5_premise_score = $answers2->tool5_implementation == 'false' ? 0 : $answers2->tool5_score_premise / 100 * $tool_weightage[4]->tool_full_score;
        $tool6_premise_score = $answers2->tool6_implementation == 'false' ? 0 : $answers2->tool6_score_premise / 100 * $tool_weightage[5]->tool_full_score;
        $tool7_premise_score = $answers2->tool7_implementation == 'false' ? 0 : $answers2->tool7_score_premise / 100 * $tool_weightage[6]->tool_full_score;
        ?>
<style>
    input[type=checkbox]{
        transform: scale(1.5);
    }

    input[type=radio]{
        transform: scale(1.5);
    }
</style>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs nav-justified">
            <li><a data-toggle="tab" href="#tab-1"><?= $tool1_assessment_status ?> Tool 1 : EP</a></li>
            <li><a data-toggle="tab" href="#tab-2"><?= $tool2_assessment_status ?> Tool 2 : EB</a></li>
            <li><a data-toggle="tab" href="#tab-3"><?= $tool3_assessment_status ?> Tool 3 : EMC</a></li>
            <li><a data-toggle="tab" href="#tab-4"><?= $tool4_assessment_status ?> Tool 4 : EF</a></li>
            <li><a data-toggle="tab" href="#tab-5"><?= $tool5_assessment_status ?> Tool 5 : EC</a></li>
            <li><a data-toggle="tab" href="#tab-6"><?= $tool6_assessment_status ?> Tool 6 : ERC</a></li>
            <li><a data-toggle="tab" href="#tab-7"><?= $tool7_assessment_status ?> Tool 7 : ET</a></li>
            <li><a data-toggle="tab" href="#tab-finish">Finish</a></li>
        </ul>
    </div>
</div>

<?php if ($answers2->emt_status == 2 ){?>
<div class="tab-content">
    <?php foreach ($tools as $tool) { ?> 
        <div id="tab-<?= $tool->tool_no ?>" class="tab-pane fade in"> <!--active-->
            <h3>Tool <?= $tool->tool_no . ' : ' . $tool->tool_title . ' ' ?></h3>

            <div class="panel-body">
                <?php
                foreach ($information as $info) {
                    if ($info->id_tool == $tool->id) {
                        if ($info->info) {
                            ?>
                            <div class="well"><?= $info->info ?></div>
                            <?php
                        }
                    }
                }
                ?>


                <div class="form-group col-md-12">
                    <h4 style='text-align: center'>
                        Is the implementation of the tool <?= $tool->tool_no . ' : ' . $tool->tool_title . ' ' ?> complete?  
                        <br>
                        <?php
                        if ($tool->tool_no == '1') {
                            echo ($answers2->tool1_implementation) ? 'Yes' : 'No';
                        } elseif ($tool->tool_no == '2') {
                            echo ($answers2->tool2_implementation) ? 'Yes' : 'No';
                        } elseif ($tool->tool_no == '3') {
                            echo ($answers2->tool3_implementation) ? 'Yes' : 'No';
                        } elseif ($tool->tool_no == '4') {
                            echo ($answers2->tool4_implementation) ? 'Yes' : 'No';
                        } elseif ($tool->tool_no == '5') {
                            echo ($answers2->tool5_implementation) ? 'Yes' : 'No';
                        } elseif ($tool->tool_no == '6') {
                            echo ($answers2->tool6_implementation) ? 'Yes' : 'No';
                        } elseif ($tool->tool_no == '7') {
                            echo ($answers2->tool7_implementation) ? 'Yes' : 'No';
                        }
                        ?>

                        <?php
                        if ($tool->tool_no == '1') {
                            echo ($answers2->tool1_justification != '') ? $answers2->tool1_justification : '';
                        } elseif ($tool->tool_no == '2') {
                            echo ($answers2->tool2_justification != '') ? $answers2->tool2_justification : '';
                        } elseif ($tool->tool_no == '3') {
                            echo ($answers2->tool3_justification != '') ? $answers2->tool3_justification : '';
                        } elseif ($tool->tool_no == '4') {
                            echo ($answers2->tool4_justification != '') ? $answers2->tool4_justification : '';
                        } elseif ($tool->tool_no == '5') {
                            echo ($answers2->tool5_justification != '') ? $answers2->tool5_justification : '';
                        } elseif ($tool->tool_no == '6') {
                            echo ($answers2->tool6_justification != '') ? $answers2->tool6_justification : '';
                        } elseif ($tool->tool_no == '7') {
                            echo ($answers2->tool7_justification != '') ? $answers2->tool7_justification : '';
                        }
                        ?>
                        <input type="hidden" value="<?= $tool->tool_no ?>" name="tool<?= $tool->tool_no ?>">
                    </h4>
                </div>
                <?php
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
                ?>

                <div class="col-md-12">
                    <div class="form-group">
                        <table class="table">
                            <tr>
                                <td style="width: 30%">
                                    <?= form_label('Date of Implementation'); ?>
                                    <h4><?= ($date_implementation == '0000-00-00') ? '' : $date_implementation; ?> </h4>
                                </td>
                                <td style="width: 35%">
                                    <!-- Auto Calculated based on score -->
                                    <?= form_label('Assessment of strength of Tool ' . $tool->tool_no . ' : ' . $tool->tool_title); ?>
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
                                </td>
                                <td style="width: 35%">
                                    <?= form_label('File(s) uploaded'); ?>
                                    <?php
                                    if ($attachments) {
                                        foreach ($attachments as $file):
                                            if ($file->id_tool == $tool->tool_no) {
                                                ?>
                                        <li class="imagelocation<?= $file->id ?>" >
                                            <a href="<?= base_url($file->path) ?>"  target="_blank" ><?= $file->file_name ?></a>&nbsp;
                                        </li>
                                        <?php
                                    }
                                endforeach;
                            } else {
                                echo "<br>No file(s) uploaded";
                            }
                            ?>
                            </td>
                            </tr>
                        </table>
                    </div>
                </div>
    <?= form_open('answers/submitBaru/' . $tool->tool_no) ?>
                <!--                                    <input type="hidden" id="method" name='method' value="submit">-->
                <input type="hidden" id="data_id" name='data_id' value="<?= ($emt_id) ? $emt_id : '' ?>">
                <input type="hidden" id="idpremise" name='idpremise' value="<?= $idpremis ?>">
            <!--<form id="myForm" action="<?= base_url('answers/submitBaru/' . $tool->tool_no) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">-->
                <div>
                    <table class="table">
                        <thead>
                        <th></th>
                        <th style="width:40%">Subject</th>
                        <th style="width:15%">Premise Status</th>
                        <th>Doe Status</th>
                        </thead>
                        <!--
                        *************
                        TOOL 1
                        *************
                        -->
                        <?php if ($tool->tool_no == '1') { ?>

                            <?php foreach ($questions as $question): ?>
            <?php foreach ($question as $quest): ?>      
                <?php if ($quest->id_tool == $tool->tool_no) { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $quest->subject ?></td>
                                            <td>        
                                                <?php
                                                foreach ($answers as $tool_answer):
                                                    if ($quest->id == $tool_answer->id_question) {
                                                        echo $tool_answer->status;
                                                        if ($tool_answer->status == 'No') {
                                                            echo '<br><h4><u>Justification</u></h4>' . $tool_answer->justification;
                                                        }
                                                    }
                                                endforeach;
                                                ?>          
                                            </td>   
                                            <td class="doestatus-column">
                                                <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                <input 
                                                                    class="radio-inline" 
                                                                    type="radio" 
                                                                    id = "DoeAnswerYes<?= $quest->id ?>" 
                                                                    onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                    name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                    value="Yes" 
                                                                    required> Yes
                                                            </label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                <label for="sel1">Score:</label>
                                                                <select class="form-control" id="scoreDOE<?= $quest->id ?>" name='scoreDOE<?= $quest->id ?>'>
                                                                    <option value="<?= $quest->score ?>"><?= $quest->score ?></option>
                                                                    <option value="<?= $quest->score / 2?>"><?= $quest->score / 2 ?></option>
                                                                    <option value="<?= $quest->score / 4 ?>"><?= $quest->score / 4 ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                <input 
                                                                    class="radio-inline" 
                                                                    type="radio" 
                                                                    id = "DoeAnswerNo<?= $quest->id ?>" 
                                                                    onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                    name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                    value="No" 
                                                                    required> No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="DoeAnswerNa<?= $quest->id ?>">
                                                                <input 
                                                                    class="radio-inline" 
                                                                    type="radio" 
                                                                    id = "DoeAnswerNa<?= $quest->id ?>" 
                                                                    onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                    name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                    value="Not Applicable" 
                                                                    required> Not Applicable
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> 
                                    <?php } endforeach;
                            endforeach;
                            ?>

    <?php } ?>
                        <!--
                        *************
                        TOOL 2 OR TOOL 7
                        *************
                        -->
                        <?php
                        if ($tool->tool_no == '2' || $tool->tool_no == '7') {

                            foreach ($questions_title as $titles) {

                                foreach ($titles as $title) {

                                    if ($tool->tool_no == $title->id_tool) {
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td style="background-color: #ccffcc;"><?= $title->main_subject ?></td>
                                            <td style="background-color: #ccffcc;"></td>
                                            <td style="background-color: #ccffcc;"></td>
                                        </tr>

                                        <?php
                                        foreach ($questions as $question):

                                            foreach ($question as $quest) {
                                                ?> 

                            <?php if ($quest->id_question_title != NULL && $quest->id_question_title == $title->id) { ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><?= $quest->subject ?></td>
                                                        <td>
                                                            <?php
                                                            foreach ($answers as $tool_answer) {
                                                                if ($quest->id == $tool_answer->id_question) {
                                                                    echo $tool_answer->status;
                                                                    if ($tool_answer->status == 'No') {
                                                                        echo '<br><h4><u>Justification</u></h4>' . $tool_answer->justification;
                                                                    }
                                                                }
                                                            }
                                                            ?>    
                                                        </td>
                                                        <td class="doestatus-column">
                                                            <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                            <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerYes<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="Yes" 
                                                                                required> Yes
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div id='ifDOEYes<?= $quest->id ?>' style="display:none;width: auto" class='form-group'>
                                                                            <label for="sel1">Score:</label>
                                <?php if (($quest->id == 120) || ($quest->id == 121) || ($quest->id == 122)) { ?>
                                                                                <select class="form-control" id="scoreDOE<?= $quest->id ?>" name='scoreDOE<?= $quest->id ?>' onchange="changeScore(<?= $quest->id ?>, this.value)">
                                                                                    <option value="<?= $quest->score ?>"><?= $quest->score ?></option> <!-- Full Score -->
                                                                                    <option value="<?= $quest->score / 2 ?>"><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                    <option value="<?= $quest->score / 4 ?>"><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                </select>
                                <?php } else { ?>
                                                                                <select class="form-control" id="scoreDOE<?= $quest->id ?>" name='scoreDOE<?= $quest->id ?>'>
                                                                                    <option value="<?= $quest->score ?>"><?= $quest->score ?></option> <!-- Full Score -->
                                                                                    <option value="<?= $quest->score /2 ?>"><?= $quest->score / 2 ?></option><!-- Half Score -->
                                                                                    <option value="<?= $quest->score /4 ?>"><?= $quest->score / 4 ?></option><!-- Quarter Score -->
                                                                                </select>
                                <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerNo<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="No" 
                                                                                required> No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="DoeAnswerNa<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerNa<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="Not Applicable" 
                                                                                required> Not Applicable
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                            <?php } elseif ($quest->id_question_title == NULL && $quest->id_tool == $title->id_tool) { ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><?= $quest->subject ?></td>
                                                        <td>
                                                            <?php
                                                            foreach ($answers as $tool_answer) {
                                                                if ($quest->id == $tool_answer->id_question) {
                                                                    echo $tool_answer->status;
                                                                    if ($tool_answer->status == 'No') {
                                                                        echo '<br><h4><u>Justification</u></h4>' . $tool_answer->justification;
                                                                    }
                                                                }
                                                            }
                                                            ?>    
                                                        </td>
                                                        <td class="doestatus-column">
                                                            <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                            <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerYes<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="Yes" 
                                                                                required> Yes
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                            <label for="sel1">Score:</label>
                                                                            <select class="form-control" id="scoreDOE<?= $quest->id ?>" name='scoreDOE<?= $quest->id ?>'>
                                                                                <option value="<?= $quest->score ?>"><?= $quest->score ?></option>  
                                                                                <option value="<?= $quest->score / 2 ?>"><?= $quest->score / 2 ?></option> 
                                                                                <option value="<?= $quest->score / 4?>"><?= $quest->score / 4 ?></option> 
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerNo<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="No" 
                                                                                required> No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="DoeAnswerNa<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerNa<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="Not Applicable" 
                                                                                required> Not Applicable
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                            } endforeach;
                                    }
                                }
                            }
                        }
                        ?>

                        <!--
                        *************
                        TOOL 4 OR TOOL 5 OR TOOL 6
                        *************
                        -->
                        <?php
                        if ($tool->tool_no == '4' || $tool->tool_no == '6' || $tool->tool_no == '5') {

                            foreach ($questions_title as $titles):
                                foreach ($titles as $title) {
                                    if ($tool->tool_no == $title->id_tool) {
                                        ?>
                                        <?php
                                        if ($rules_applied) {
                                            if ($title->id_categories == 'A' && in_array($title->id_categories, $rules_applied)) {
                                                echo '<tr><td></td><td colspan="5" style="background-color: #ccffcc;">';
                                                echo '<b>Environmental Quality (Industrial Effluent) Regulations 2009</b><br>';
                                                echo '<b>Environmental Quality (Sewage) Regulations 2009</b><br>';
                                                echo '<b>Environmental Quality (Control of Pollution From Solid Waste Transfer Station And Landfill) Regulations 2009</b><br>';
                                                echo '<b>Environmental Quality (Prescribed Premises) (Raw Rubber) Regulations 1978</b><br>';
                                                echo '<b>Environmental Quality (Prescribed Premises) (Crude Palm Oil) Regulations 1977</b><br>';
                                                echo '</td></tr>';
                                            } if ($title->id_categories == 'B' && in_array($title->id_categories, $rules_applied)) {
                                                echo '<tr><td></td><td colspan="5" style="background-color: #ccffcc;">';
                                                echo '<b>Environmental Quality (Schedule Waste) Regulations 2005</b>';
                                                echo '</td></tr>';
                                            } if ($title->id_categories == 'C' && in_array($title->id_categories, $rules_applied)) {
                                                echo '<tr><td></td><td colspan="5" style="background-color: #ccffcc;">';
                                                echo '<b>Environmental Quality (Clean Air) Regulations 2014</b>';
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

                                                echo '</tr>';
                                            } else {
                                                echo '<tr>';
                                                echo '<td></td>';
                                                echo '<td style="background-color: #ccffcc;">';
                                                echo $title->main_subject;
                                                echo '</td>';
                                                echo '<td style="background-color: #ccffcc;"></td>';
                                                echo '<td style="background-color: #ccffcc;"></td>';
                                                echo '</tr>';
                                            }
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
                                                        foreach ($answers as $tool_answer):
                                                            if ($quest->id == $tool_answer->id_question) {

                                                                echo $tool_answer->status;

                                                                if ($tool_answer->status == 'No') {
                                                                    echo '<br><h4><u>Justification</u></h4>' . $tool_answer->justification;
                                                                }
                                                            }
                                                        endforeach;
                                                        echo '</td>';
                                                        ?>
                                                        <td class="doestatus-column">
                                                            <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                            <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerYes<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="Yes" 
                                                                                required> Yes
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                            <label for="sel1">Score:</label>
                                                                            <select class="form-control" id="scoreDOE<?= $quest->id ?>" name='scoreDOE<?= $quest->id ?>'>
                                                                                <option value="<?= $quest->score ?>"><?= $quest->score ?></option>   
                                                                                <option value="<?= $quest->score / 2?>"><?= $quest->score / 2 ?></option>
                                                                                <option value="<?= $quest->score / 4?>"><?= $quest->score / 4 ?></option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerNo<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="No" 
                                                                                required> No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="DoeAnswerNa<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerNa<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="Not Applicable" 
                                                                                required> Not Applicable
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <?php
                                                        echo '</tr>';
                                                    }
                                                    ?>    
                                <?php
                            } endforeach;
                    endforeach;
                }
            } endforeach;
    }
    ?>

                        <!--
                        *************
                        TOOL 3
                        *************
                        -->      
                                <?php
                                if ($tool->tool_no == '3') {
                                    foreach ($questions_title as $titles):
                                        foreach ($titles as $title) {
                                            if ($tool->tool_no == $title->id_tool) {
                                                ?>
                                        <tr>
                                            <td></td>
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
                                            <td style="background-color: #ccffcc;"></td>
                                            <td  style="background-color: #ccffcc;"></td>
                                        </tr>

                                                <?php foreach ($questions as $question): ?>
                                                    <?php foreach ($question as $quest): ?> 
                                                        <?php
                                                        // kalau ada title untuk question 
                                                        if ($quest->id_question_title != NULL && $quest->id_question_title == $title->id) {
                                                            ?> 
                                                    <tr>
                                                        <td></td>
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
                                                            <?php
                                                            if ($quest->id_tool == 3) {
                                                                foreach ($answers as $tool_answer):
                                                                    if ($quest->id == $tool_answer->id_question) {

                                                                        echo $tool_answer->status;

                                                                        if ($tool_answer->status == 'No') {
                                                                            echo '<br><h4><u>Justification</u></h4>' . $tool_answer->justification;
                                                                        }
                                                                    }
                                                                endforeach;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="doestatus-column">
                                                            <input type="hidden" value="<?= $quest->score ?>" name="score-<?= $quest->id ?>">
                                                            <input type="hidden" value="<?= $quest->id ?>" name="q_id<?= $quest->id ?>">

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label for="DoeAnswerYes<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerYes<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="Yes" 
                                                                                required> Yes
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div id='ifDOEYes<?= $quest->id ?>' style="display:none; width: auto" class='form-group'>
                                                                            <label for="sel1">Score:</label>
                                                                            <select class="form-control" id="scoreDOE<?= $quest->id ?>" name='scoreDOE<?= $quest->id ?>'>
                                                                                <option value="<?= $quest->score ?>"><?= $quest->score ?></option>   
                                                                                <option value="<?= $quest->score / 2?>"><?= $quest->score / 2 ?></option> 
                                                                                <option value="<?= $quest->score / 4?>"><?= $quest->score / 4 ?></option> 
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="DoeAnswerNo<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerNo<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="No" 
                                                                                required> No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="DoeAnswerNa<?= $quest->id ?>">
                                                                            <input 
                                                                                class="radio-inline" 
                                                                                type="radio" 
                                                                                id = "DoeAnswerNa<?= $quest->id ?>" 
                                                                                onclick="DOEanswerYesCheck(<?= $quest->id ?>)" 
                                                                                name="DoeAnswer<?= $quest->id ?>[status]" 
                                                                                value="Not Applicable" 
                                                                                required> Not Applicable
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                <?php
                            } endforeach;
                    endforeach;
                }
            } endforeach;
    }
    ?>

                    </table>
                </div>
                <div class="row">   
                    <div class="col-md-7">
                    <div class="form-group">
                        <textarea id="textarea_editor<?= $tool->tool_no?>"  style="width:100%;font-size: 100%" rows="5" placeholder="Comment on tool (optional)" name="comment"> 
                            <?php
                                //print_r($tool3_review)
                                switch($tool->tool_no){
                                    case 1: echo isset($tool1_review)? $tool1_review->comment:''; 
                                        break;
                                    case 2: echo isset($tool2_review)? $tool2_review->comment:''; 
                                        break;
                                    case 3: echo isset($tool3_review)? $tool3_review->comment:''; 
                                        break;
                                    case 4: echo isset($tool4_review)? $tool4_review->comment:''; 
                                        break;
                                    case 5: echo isset($tool5_review)? $tool5_review->comment:''; 
                                        break;
                                    case 6: echo isset($tool6_review)? $tool6_review->comment:''; 
                                        break;
                                    case 7: echo isset($tool7_review)? $tool7_review->comment:''; 
                                        break;
                                    default : echo ''; break;          
                                }
                            ?>
                        </textarea>
                    </div>
                </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <h4>
                                Score on current tool <b>
                                <?php
                                //print_r($tool3_review)
                                switch($tool->tool_no){
                                    case 1: echo isset($tool1_DOE_score2_wRules)? $tool1_DOE_score2_wRules:''; 
                                        break;
                                    case 2: echo isset($tool2_DOE_score2_wRules)? $tool2_DOE_score2_wRules:''; 
                                        break;
                                    case 3: echo isset($tool3_DOE_score2_wRules)? $tool3_DOE_score2_wRules:''; 
                                        break;
                                    case 4: echo isset($tool4_DOE_score2_wRules)? $tool4_DOE_score2_wRules:''; 
                                        break;
                                    case 5: echo isset($tool5_DOE_score2_wRules)? $tool5_DOE_score2_wRules:''; 
                                        break;
                                    case 6: echo isset($tool6_DOE_score2_wRules)? $tool6_DOE_score2_wRules:''; 
                                        break;
                                    case 7: echo isset($tool7_DOE_score2_wRules)? $tool7_DOE_score2_wRules . '.00':''; 
                                        break;
                                    default : echo ''; break;          
                                }
                            ?> / 100.00
                                </b>
                            </h4>                            
                        </div>
                    </div>
                </div>
                <div style="text-align:center;">

                    <button class="btn btn-lg" type="submit"><i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i> Save Assessment</button>
                    <div id="sum-score-<?= $tool->tool_no ?>"></div>
                </div>

            <?= form_close() ?>


            </div>
        </div>     
        <?php } ?>  
    <div id="tab-finish" class="tab-pane fade in">
        <table class="table table-striped">
            <thead>
            <th>EMT No</th><th>Description</th><th>Status By Premise</th><th>Weightage</th> <th>Score (Premise)</th><th>Score (DOE)</th><th>Comment</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td><td><a data-toggle="tab" href="#tab-1">ENVIRONMENTAL POLICY (EP)</a></td><td><?= ($answers2->tool1_implementation) ? 'Completed' : 'Not implemented'; ?></td><td><?= $tool_weightage[0]->tool_full_score ?></td><td><?= $tool1_premise_score ?></td><td><?= $tool1_DOE_score2 ?></td>
                    <td><?= isset($tool1_review)? $tool1_review->comment:''; ?></td>
                </tr>
                <tr>
                    <td>2</td><td><a data-toggle="tab" href="#tab-2">ENVIRONMENTAL BUDGET (EB)</a></td><td><?= ($answers2->tool2_implementation) ? 'Completed' : 'Not implemented'; ?></td><td><?= $tool_weightage[1]->tool_full_score ?></td><td><?= $tool2_premise_score ?></td><td><?= $tool2_DOE_score2 ?></td>
                    <td><?= isset($tool2_review)? $tool2_review->comment:''; ?></td>
                </tr>
                <tr>
                    <td>3</td><td><a data-toggle="tab" href="#tab-3">ENVIRONMENTAL MONITORING COMMITTEE (EMC)</a></td><td><?= ($answers2->tool3_implementation) ? 'Completed' : 'Not implemented'; ?></td><td><?= $tool_weightage[2]->tool_full_score ?></td><td><?= $tool3_premise_score ?></td><td><?= $tool3_DOE_score2 ?></td>
                    <td><?= isset($tool3_review)? $tool3_review->comment:''; ?></td>
                </tr>
                <tr>
                    <td>4</td><td><a data-toggle="tab" href="#tab-4">ENVIRONMENTAL FACILITIES (EF)</a></td><td><?= ($answers2->tool4_implementation) ? 'Completed' : 'Not implemented'; ?></td><td><?= $tool_weightage[3]->tool_full_score ?></td><td><?= $tool4_premise_score ?></td><td><?= $tool4_DOE_score2 ?></td>
                    <td><?= isset($tool4_review)? $tool4_review->comment:''; ?></td>
                </tr>
                <tr>
                    <td>5</td><td><a data-toggle="tab" href="#tab-5">ENVIRONMENTAL COMPETENCY (EC)</a></td><td><?= ($answers2->tool5_implementation) ? 'Completed' : 'Not implemented'; ?></td><td><?= $tool_weightage[4]->tool_full_score ?></td><td><?= $tool5_premise_score ?></td><td><?= $tool5_DOE_score2 ?></td>
                    <td><?= isset($tool5_review)? $tool5_review->comment:''; ?></td>
                </tr>
                <tr>
                    <td>6</td><td><a data-toggle="tab" href="#tab-6">ENVIRONMENTAL REPORTING & COMMUNICATION (ERC)</a></td><td><?= ($answers2->tool6_implementation) ? 'Completed' : 'Not implemented'; ?></td><td><?= $tool_weightage[5]->tool_full_score ?></td><td><?= $tool6_premise_score ?></td><td><?= $tool6_DOE_score2 ?></td>
                    <td><?= isset($tool6_review)? $tool6_review->comment:''; ?></td>
                </tr>
                <tr>
                    <td>7</td><td><a data-toggle="tab" href="#tab-7">ENVIRONMENTAL TRANSPARENCY (ET)</a></td><td><?= ($answers2->tool7_implementation) ? 'Completed' : 'Not implemented'; ?></td><td><?= $tool_weightage[6]->tool_full_score ?></td><td><?= $tool7_premise_score ?></td><td><?= $tool7_DOE_score2 ?></td>
                    <td><?= isset($tool7_review)? $tool7_review->comment:''; ?></td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                    <td></td>
                    <td><?= $tool1_premise_score + $tool2_premise_score + $tool3_premise_score + $tool4_premise_score + $tool5_premise_score + $tool6_premise_score + $tool7_premise_score ?></td>
                    <td><?php
                        echo $tool1_DOE_score2 + $tool2_DOE_score2 + $tool3_DOE_score2 + $tool4_DOE_score2 + $tool5_DOE_score2 + $tool6_DOE_score2 + $tool7_DOE_score2;
        ?>          </td>
                </tr>
            </tbody>
        </table>
        <div style="text-align:center;">
            <a class="btn btn-success btn-lg" onclick="return confirm('Sure you want to submit? You won\'t be able to edit assessment after this?');" href="<?= base_url('answers/setAssmntComplete/'. $emt_id) ?>"><i class="fa fa-paper-plane fa-fw" aria-hidden="true"></i> Submit assessment</a>
        </div>
    </div>
</div> 
<?php } else { ?> 
<div class="col-md-12">
    <br>
    <div style="text-align:center;">
            <a class="btn btn-success btn-lg" href="<?= base_url('answers/setAssmntComplete/'. $emt_id) ?>"><i class="fa fa-paper-plane fa-fw" aria-hidden="true"></i> Submit assessment</a>
     </div>
</div>
<?php } ?>


<script type="text/javascript">

    //IF YES ENABLE SCORE FIELD
    function DOEanswerYesCheck(id) {
        //var arr_score = [];
        if (id === 120 || id === 121 || id === 122) {
            if (document.getElementById('DoeAnswerYes' + id).checked) {
                document.getElementById('ifDOEYes' + id).style.display = 'block';

            } else if (document.getElementById('DoeAnswerNo' + id).checked) {
                document.getElementById('ifDOEYes' + id).style.display = 'none';
            } else if (document.getElementById('DoeAnswerNa' + id).checked) {
                document.getElementById('ifDOEYes' + id).style.display = 'none';
            }
        } else {
            if (document.getElementById('DoeAnswerYes' + id).checked) {
                document.getElementById('ifDOEYes' + id).style.display = 'block';

//                    $("[name=scoreDOE"+id+"]").change(function(){
//                            var score = $(this).children("option:selected").val();
//                            alert("You have selected the country - " + score);
//                            arr_score[id] = score; 
//                            
//                            $("#sum-score-"+id).html(arr_score[id]);
//                            console.log(arr_score[id]);
//                        });

            } else {
                document.getElementById('ifDOEYes' + id).style.display = 'none';
            }
        }
    }

    function changeScore(id, score) {
        //$.each(varray, function (index, value) {
        // IF no option checked, show justification text field
        if (id === 120 || id === 121 || id === 122) {
            //alert(value);name="scoreDOE120"
            $('[name=scoreDOE120]').val(score);
            $('[name=scoreDOE121]').val(score);
            $('[name=scoreDOE122]').val(score);
        }
        //});     
    }

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
                if (!$.trim(data)) {
                    console.log("Blank");
                } else {
                    $('[name="scoreDOE' + '' + '"][value="' + '' + '"]'); //debugging
                    for (var key in data) {
                        
                        if (data.hasOwnProperty(key)) {

                            if (data[key].doe_status === 'Yes') {
                                document.getElementById('ifDOEYes' + data[key].id_question).style.display = 'block';       
                                //$('[name="scoreDOE' + data[key].id_question + '"][value="' + parseFloat(data[key].doe_score) + '"]').attr('selected', 'selected');
                                $('#scoreDOE'+ data[key].id_question ).val(parseFloat(data[key].doe_score));  
                            } else if (data[key].doe_status === 'Not Applicable') {
                                document.getElementById('ifDOEYes' + data[key].id_question).style.display = 'block';
                                //$('[name="scoreDOE' + data[key].id_question + '"][value="' + parseFloat(data[key].doe_score) + '"]').attr('selected', 'selected');
                                $('#scoreDOE'+ data[key].id_question ).val(parseFloat(data[key].doe_score));
                            }

                            $('[name="DoeAnswer' + data[key].id_question + '[status]"][value="' + data[key].doe_status + '"]').prop('checked', true);

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
                        }
                    }

                    $('#data_id').val(data[key].emt_id);

                    $('#modal_form').modal('show');
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function sum_score_by_tool(id)
    {
        //if (document.getElementById('DoeAnswerYes' + id).checked || )
    }

    $(document).ready(function () {

        $('input[name=DoeAnswerYes]').change(function () {
            if (!$('#subcat').is(":checked")) {
                $('#selectsec').attr('disabled', 'disabled');
            } else {
                $('#selectsec').removeAttr('disabled');
            }
        });

        populate_form();
        
        // Javascript to enable link to tab
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
        } 

        // Change hash for page-reload
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;
            window.scrollTo(0, 0);
        })

    });
</script>