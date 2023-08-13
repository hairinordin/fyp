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
?>
<style>
    @media print
    {
      h4,h3,table,a,b {
        height: auto;
        font-size: 10px; /* changing to 10pt has no impact */
        }
        /* Don't print link hrefs */
        a[href]:after {
        content: none
      }
    }
</style>
<?= $paparan_maklumat_syarikat?>

Submission Date : <?= ($answers2->submission_date == '0000-00-00') ? '' : date("d/m/Y", strtotime($answers2->submission_date));?>

<br>
<hr>
<br>
    <?php foreach ($tools as $tool) : ?>
<h3 style="page-break-before: always;text-align: right"><b>Assessment of strength of Tool <?= $tool->tool_no ?>: <?= $tool->tool_title?> </b> : <?= $tool->assessLvl?></h3>
<h4>Is the implementation of tool <?= $tool->tool_no . ' : ' . $tool->tool_title . ' ' ?>complete ?    <b><?= $tool->tool_implementation == 'true' ? 'Yes' : 'No' ?> </b>  <small>   <?= $tool->tool_justification ? 'Justification :' . $tool->tool_justification : ' ' ?></small></h4>
<h4>Date Implemented :  <?= ($tool->date_implement == '0000-00-00') ? ' - ': date("d/m/Y", strtotime($tool->date_implement));?></h4> 
<h4>File(s) upload : </h4>
        <?php 
        if(($attachments)){ 
            foreach ($attachments as $file): 
                if (isset($file)) { 
                    if ($file->id_tool == $tool->tool_no): ?>
                        
                        <li class="imagelocation<?= $file->id ?>" >
                            <a href="<?= base_url($file->path) ?>"  target="_blank" ><?= $file->file_name ?></a>&nbsp;
                        </li>
        <?php
                    endif;
                                }
                    endforeach; } ?>
                        <hr>         
                        <table class="table table-bordered table-hover" style="font-size:10px">
    <thead>
    <th class="col-xs-6">Subject</th>
    <th class="col-xs-1"> Premise Status </th>
    <th class="col-xs-1"> DOE Status </th>
    <th class="col-xs-4"> Notes </th>
    </thead>
    <!--
        START OF TOOL 2 AND TOOL 7 LOOPING
    -->
    <?php if ($tool->tool_no == '2' || $tool->tool_no == '7'): ?>
        
        <?php foreach ($questions_title as $titles): ?>

            <?php
            foreach ($titles as $title) {
                if ($tool->tool_no == $title->id_tool) {
                    ?>


                    <tr style="background-color: #ccffcc;">
                        <td colspan="3">
                            <?= $title->main_subject ?>
                        </td>
          
                    </tr>
                    <?php foreach ($questions as $question): ?>

                        <?php
                        foreach ($question as $quest) {
                            if ($quest->id_question_title != NULL && $quest->id_question_title == $title->id) {
                                ?> 

                                <tr>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?= $quest->subject ?>

                                    </td>
                                    <td>
                                        <span class="label label-default" ><?= $quest->status_answers ?></span>
                                        <br>
                                        <?= 'Justification(if any) - ' . $quest->justification?>
                                    </td>
                                    <td>                            
                                        <span class="label label-primary" ><?= $quest->doe_status_answer?></span>
                                        <span class="label label-primary" ><?= 'Score - ' . $quest->doe_score?></span>
                                    </td>
                                    <td>
                                        
                                    </td>

                                </tr>


                            <?php } elseif ($quest->id_question_title == NULL && $quest->id_tool == $title->id_tool) { ?>
                                <tr>

                                    <td>
                                        <?= $quest->subject ?>
                                    </td>
                                    <td>
                                        <span class="label label-default" ><?= $quest->status_answers ?></span>
                                        <br>
                                        <?= 'Justification(if any) - ' . $quest->justification?>
                                    </td>
                                    <td>                            
                                        <span class="label label-primary" ><?= $quest->doe_status_answer?></span>
                                        <span class="label label-primary" ><?= 'Score - ' . $quest->doe_score?></span>
                                    </td>
                                    <td>
                                        
                                    </td>

                                </tr>

                                <?php
                            }
                        } endforeach;
                }
            } endforeach;
        ?>
        <!--
           END OF TOOL 2 AND TOOL 7 LOOPING
        -->   

        <!--
            START OF TOOL 4 AND TOOL 6 LOOPING
        -->
    <?php elseif ($tool->tool_no == '4' || $tool->tool_no == '6' || $tool->tool_no == '5'): ?>
        <?php foreach ($questions_title as $titles): ?>

            <?php
            foreach ($titles as $title) {
                if ($tool->tool_no == $title->id_tool) {
                    //print_r($rules_applied);
                    ?>
                    <?php
                    if ($rules_applied) {
                        if ($title->id_categories == 'A' && in_array($title->id_categories, $rules_applied)) {
                            echo '<tr><td colspan="3" style="background-color: #ccffcc;">';
                            echo '<b>Environmental Quality Act (Industrial Effluent) 2009</b><br>';
                            echo '<b>Environmental Quality Act (Sewage) 2009</b><br>';
                            echo '<b>Environmental Quality Act (Prescribe Premise) (Crude Palm Oil) 1977</b><br>';
                            echo '</td></tr>';
                        } if ($title->id_categories == 'B' && in_array($title->id_categories, $rules_applied)) {
                            echo '<tr><td colspan="3" style="background-color: #ccffcc;">';
                            echo '<b>Environmental Quality Act (Schedule Waste) 2005</b>';
                            echo '</td></tr>';
                        } if ($title->id_categories == 'C' && in_array($title->id_categories, $rules_applied)) {
                            echo '<tr><td colspan="3" style="background-color: #ccffcc;">';
                            echo '<b>Environmental Quality Act (Clean Air) 2014</b>';
                            echo '</td></tr>';
                        }
                    }




                    if (in_array($title->id_categories, $rules_applied)) {
                        if ($tool->tool_no == '5') {
                                                            //INPUT FOR SELECTION CP COURSE
                                                        
                                                            echo '<tr>';
                                                            //echo '<td></td>';
                                                            echo '<td colspan="3" style="background-color: #ccffcc;">';

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
//                                                            echo '<td style="background-color: #ccffcc;"></td>';
//                                                            echo '<td style="background-color: #ccffcc;"></td>';
                                                            echo '<td></td>';
                                                            echo '</tr>';
                                                        } else {
                                                            echo '<tr>';
                                                            echo '<td colspan="3" style="background-color: #ccffcc;">';
                                                            echo $title->main_subject;
                                                            echo '</td>';
                                                            echo '<td></td>';
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
                                    ?>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $quest->subject ?></td>
                                        <td>
                                            <span class="label label-default" ><?= $quest->status_answers ?></span>
                                            <br>
                                            <?= 'Justification(if any) - ' . $quest->justification?>
                                        </td>
                                        <td>                            
                                            <span class="label label-primary" ><?= $quest->doe_status_answer?></span>
                                            <span class="label label-primary" ><?= 'Score - ' . $quest->doe_score?></span>
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>



                                    <?php
                                } else {
                                    
                                }
                                ?>

                                <?php
                            } endforeach;
                    endforeach;
                }
            } endforeach;
        ?>
        <!--
           START OF TOOL 4 AND TOOL 6 LOOPING
        -->

        <!--
            START OF TOOL 3 LOOPING
        -->
    <?php elseif ($tool->tool_no == '3'): ?> 
      
        <?php foreach ($questions_title as $titles): ?>

            <?php
            foreach ($titles as $title) {
                if ($tool->tool_no == $title->id_tool) {
                    ?>
                    <tr style="background-color: #ccffcc;">
                        <td colspan="3">
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
                        
                    </tr>



                    <?php foreach ($questions as $question): ?>
                        <?php foreach ($question as $quest): ?> 
                            <?php
                            // kalau ada title untuk question 
                            if ($quest->id_question_title != NULL && $quest->id_question_title == $title->id) {
                                ?> 

                                <tr>

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
                                        <span class="label label-default" ><?= $quest->status_answers ?></span>
                                        <br>
                                        <?= 'Justification(if any) - ' . $quest->justification?>
                                    </td>
                                    <td>                            
                                        <span class="label label-primary" ><?= $quest->doe_status_answer?></span>
                                        <span class="label label-primary" ><?= 'Score - ' . $quest->doe_score?></span>
                                    </td>
                                    <td>
                                        
                                    </td>

                                </tr>
                                <?php
                            } endforeach;
                    endforeach;
                    ?>


                    <?php
                }
            } endforeach;
        ?>
        <!--
            END OF TOOL 3 LOOPING
        -->

        <!--
            START OF TOOL 1 AND TOOL 5 LOOPING
        -->
    <?php elseif ($tool->tool_no == '1' || $tool->tool_no == '5'): ?>
        <?php foreach ($questions as $question): ?>
            <?php foreach ($question as $quest): ?>      
                <?php if ($quest->id_tool == $tool->tool_no) { ?>
                    <tr>
                        <td>
                    <?= $quest->subject ?>
                        </td>
                        <td>
                            <span class="label label-default" ><?= $quest->status_answers ?></span>
                            <br>
                            <?= 'Justification(if any) - ' . $quest->justification?>
                        </td>
                        <td>                            
                            <span class="label label-primary" ><?= $quest->doe_status_answer?></span>
                            <span class="label label-primary" ><?= 'Score - ' . $quest->doe_score?></span>
                        </td>
                        <td>
                            
                        </td>


                    </tr>

                    <?php
                } endforeach;
        endforeach;
        ?>

        <!--
            END OF TOOL 1 AND TOOL 5 LOOPING
        -->
    <?php endif; ?>
</table><hr><br>
<?php endforeach; ?>

<h3 style="text-align: right"><?= (isset($answers2->completed_date)) ? 'Completed Date : ' . date("d/m/Y", strtotime($answers2->completed_date)) : '';?></h3>
                        
<?php
   
        
            ?>
            <!-- Remark -->
            <div style="page-break-before: always;" >
                <?= $paparan_remark?>
            </div>
                            
                   
            <!-- Score overview  -->
           
                    <?php
                    $tool1_DOE_score = ${"tool1_DOE_score_emt"};
                    $tool2_DOE_score = ${"tool2_DOE_score_emt"};
                    $tool3_DOE_score = ${"tool3_DOE_score_emt"};
                    $tool4_DOE_score = ${"tool4_DOE_score_emt"};
                    $tool5_DOE_score = ${"tool5_DOE_score_emt"};
                    $tool6_DOE_score = ${"tool6_DOE_score_emt"};
                    $tool7_DOE_score = ${"tool7_DOE_score_emt"};
                    $emt_answers = ${"answers2_emt"};

                    $tool1_DOE_score = $tool1_DOE_score ? ($tool1_DOE_score * $tool_weightage[0]->tool_full_score) / 100 : '0';
                    $tool2_DOE_score = $tool2_DOE_score ? ($tool2_DOE_score * $tool_weightage[1]->tool_full_score) / 100 : '0';
                    $tool3_DOE_score = $tool3_DOE_score ? ($tool3_DOE_score * $tool_weightage[2]->tool_full_score) / 100 : '0';
                    $tool4_DOE_score = $tool4_DOE_score ? (($tool4_DOE_score / $no_of_rules) * $tool_weightage[3]->tool_full_score) / 100 : '0';
                    $tool5_DOE_score = $tool5_DOE_score ? (($tool5_DOE_score / $no_of_rules) * $tool_weightage[4]->tool_full_score) / 100 : '0';
                    $tool6_DOE_score = $tool6_DOE_score ? (($tool6_DOE_score / $no_of_rules) * $tool_weightage[5]->tool_full_score) / 100 : '0';
                    $tool7_DOE_score = $tool7_DOE_score ? ($tool7_DOE_score * $tool_weightage[6]->tool_full_score) / 100 : '0';

//                    $tool1_premise_score = $emt_answers->tool1_implementation == 'false' ? $tool_weightage[0]->tool_full_score : $emt_answers->tool1_score_premise / 100 * $tool_weightage[0]->tool_full_score;
//                    $tool2_premise_score = $emt_answers->tool2_implementation == 'false' ? $tool_weightage[1]->tool_full_score : $emt_answers->tool2_score_premise / 100 * $tool_weightage[1]->tool_full_score;
//                    $tool3_premise_score = $emt_answers->tool3_implementation == 'false' ? $tool_weightage[2]->tool_full_score : $emt_answers->tool3_score_premise / 100 * $tool_weightage[2]->tool_full_score;
//                    $tool4_premise_score = $emt_answers->tool4_implementation == 'false' ? $tool_weightage[3]->tool_full_score : $emt_answers->tool4_score_premise / 100 * $tool_weightage[3]->tool_full_score;
//                    $tool5_premise_score = $emt_answers->tool5_implementation == 'false' ? $tool_weightage[4]->tool_full_score : $emt_answers->tool5_score_premise / 100 * $tool_weightage[4]->tool_full_score;
//                    $tool6_premise_score = $emt_answers->tool6_implementation == 'false' ? $tool_weightage[5]->tool_full_score : $emt_answers->tool6_score_premise / 100 * $tool_weightage[5]->tool_full_score;
//                    $tool7_premise_score = $emt_answers->tool7_implementation == 'false' ? $tool_weightage[6]->tool_full_score : $emt_answers->tool7_score_premise / 100 * $tool_weightage[6]->tool_full_score;
                    
                    $tool1_premise_score = $emt_answers->tool1_implementation == 'false' ? 0 : $emt_answers->tool1_score_premise / 100 * $tool_weightage[0]->tool_full_score;
                    $tool2_premise_score = $emt_answers->tool2_implementation == 'false' ? 0 : $emt_answers->tool2_score_premise / 100 * $tool_weightage[1]->tool_full_score;
                    $tool3_premise_score = $emt_answers->tool3_implementation == 'false' ? 0 : $emt_answers->tool3_score_premise / 100 * $tool_weightage[2]->tool_full_score;
                    $tool4_premise_score = $emt_answers->tool4_implementation == 'false' ? 0 : $emt_answers->tool4_score_premise / 100 * $tool_weightage[3]->tool_full_score;
                    $tool5_premise_score = $emt_answers->tool5_implementation == 'false' ? 0 : $emt_answers->tool5_score_premise / 100 * $tool_weightage[4]->tool_full_score;
                    $tool6_premise_score = $emt_answers->tool6_implementation == 'false' ? 0 : $emt_answers->tool6_score_premise / 100 * $tool_weightage[5]->tool_full_score;
                    $tool7_premise_score = $emt_answers->tool7_implementation == 'false' ? 0 : $emt_answers->tool7_score_premise / 100 * $tool_weightage[6]->tool_full_score;

//print_r($emt_answers); echo '<br>';
                    ?>
                    <!-- Modal content-->
                   <div style="page-break-before: always;" >
                            <legend>Score Overview</legend>
                       
                            <table class="table table-bordered">
                                <tr>
                                    <td>EMT No</td><td>Description</td><td>Status</td><td>Weightage</td> <td>Score (Premise)</td><td>Score (DOE)</td>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td>1</td><td><a href="<?= base_url() . 'answers/answers_by_doe/' . $emt_answers->idpremise . '/' . $emt_answers->id . '#step-1' ?>" >ENVIRONMENTAL POLICY (EP)</a></td><td><?= $emt_answers->tool1_implementation == 'true' ? 'Completed' : 'Not implemented' ?></td><td><?= $tool_weightage[0]->tool_full_score ?></td><td><?= $tool1_premise_score ?></td><td><?= $tool1_DOE_score ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td><td><a href="<?= base_url() . 'answers/answers_by_doe/' . $emt_answers->idpremise . '/' . $emt_answers->id . '#step-2' ?>" >ENVIRONMENTAL BUDGET (EB)</a></td><td><?= $emt_answers->tool2_implementation == 'true' ? 'Completed' : 'Not implemented' ?></td><td><?= $tool_weightage[1]->tool_full_score ?></td><td><?= $tool2_premise_score ?></td><td><?= $tool2_DOE_score ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td><td><a href="<?= base_url() . 'answers/answers_by_doe/' . $emt_answers->idpremise . '/' . $emt_answers->id . '#step-3' ?>" >ENVIRONMENTAL MONITORING COMMITTEE (EMC)</a></td><td><?= $emt_answers->tool3_implementation == 'true' ? 'Completed' : 'Not implemented' ?></td><td><?= $tool_weightage[2]->tool_full_score ?></td><td><?= $tool3_premise_score ?></td><td><?= $tool3_DOE_score ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td><td><a href="<?= base_url() . 'answers/answers_by_doe/' . $emt_answers->idpremise . '/' . $emt_answers->id . '#step-4' ?>" >ENVIRONMENTAL FACILITIES (EF)</a></td><td><?= $emt_answers->tool4_implementation == 'true' ? 'Completed' : 'Not implemented' ?></td><td><?= $tool_weightage[3]->tool_full_score ?></td><td><?= $tool4_premise_score ?></td><td><?= $tool4_DOE_score ?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td><td><a href="<?= base_url() . 'answers/answers_by_doe/' . $emt_answers->idpremise . '/' . $emt_answers->id . '#step-5' ?>" >ENVIRONMENTAL COMPETENCY (EC)</a></td><td><?= $emt_answers->tool5_implementation == 'true' ? 'Completed' : 'Not implemented' ?></td><td><?= $tool_weightage[4]->tool_full_score ?></td><td><?= $tool5_premise_score ?></td><td><?= $tool5_DOE_score ?></td>
                                    </tr>
                                    <tr>
                                        <td>6</td><td><a href="<?= base_url() . 'answers/answers_by_doe/' . $emt_answers->idpremise . '/' . $emt_answers->id . '#step-6' ?>" >ENVIRONMENTAL REPORTING & COMMUNICATION (ERC)</a></td><td><?= $emt_answers->tool6_implementation == 'true' ? 'Completed' : 'Not implemented' ?></td><td><?= $tool_weightage[5]->tool_full_score ?></td><td><?= $tool6_premise_score ?></td><td><?= $tool6_DOE_score ?></td>
                                    </tr>
                                    <tr>
                                        <td>7</td><td><a href="<?= base_url() . 'answers/answers_by_doe/' . $emt_answers->idpremise . '/' . $emt_answers->id . '#step-7' ?>" >ENVIRONMENTAL TRANSPARENCY (ET)</a></td><td><?= $emt_answers->tool7_implementation == 'true' ? 'Completed' : 'Not implemented' ?></td><td><?= $tool_weightage[6]->tool_full_score ?></td><td><?= $tool7_premise_score ?></td><td><?= $tool7_DOE_score ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td></td>
                                        <td><?= $tool1_premise_score + $tool2_premise_score + $tool3_premise_score + $tool4_premise_score + $tool5_premise_score + $tool6_premise_score + $tool7_premise_score ?></td>
                                        <td><?php
            echo $tool1_DOE_score + $tool2_DOE_score + $tool3_DOE_score + $tool4_DOE_score + $tool5_DOE_score + $tool6_DOE_score + $tool7_DOE_score;
            ?></td>
                                    </tr>

                                </tbody>

                            </table>
                   </div>
                        
