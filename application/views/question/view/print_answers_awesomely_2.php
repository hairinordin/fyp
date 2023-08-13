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
    table, h3, h4, a{
        font-size: 12px;
    }
    
    /* Don't print link hrefs */
    @media print {
      a[href]:after {
        content: none
      }
    }
    
</style>
<?php
//untuk count element 
$x = array();
$y = array();

if ($done) {
    $readonly = 'readonly';
    $disabled = 'disabled';
    $disabled_txtfld = 'disable => "disabled"';
} else {
    $readonly = '';
    $disabled = '';
    $disabled_txtfld = '';
}

if ($declaration_accepted) {
    $accepted = 'checked';
    $disabled_click = 'onclick="return false;"';
} else {
    $accepted = '';
    $disabled_click = '';
}
?>

<?= $paparan_maklumat_syarikat ?>

<h3 style="text-align: right">Submission Date : <?= date("d/m/Y", strtotime($answers2->submission_date)); ?></h3>

<?php foreach ($tools as $tool) : ?>
    <h4 style="page-break-before: always;">Is the implementation of tool <?= $tool->tool_no . ' : ' . $tool->tool_title . ' ' ?>complete ?    <b><?= $tool->tool_implementation == 'true' ? 'Yes' : 'No' ?> </b>  <small>   <?= $tool->tool_justification ? 'Justification :' . $tool->tool_justification : ' ' ?></small></h4>
    <h4>Date Implemented :  <?= ($tool->date_implement == '0000-00-00') ? ' - ' : date("d/m/Y", strtotime($tool->date_implement)); ?></h4> 
    <h4>File(s) upload : </h4>
    <?php
    if (($attachments)) {
        foreach ($attachments as $file):
            if (isset($file)) {
                if ($file->id_tool == $tool->tool_no):
                    ?>

                    <li class="imagelocation<?= $file->id ?>" >
                        <a href="<?= base_url($file->path) ?>"  target="_blank" ><?= $file->file_name ?></a>&nbsp;
                    </li>
                    <?php
                endif;
            }
        endforeach;
    }
    ?>
    <hr>         
    <table class="table table-bordered table-hover">
        <thead>
        <th class="col-xs-7">Subject</th><th class="col-xs-2"> Status </th><th class="col-xs-3"> Justification </th>
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
                                        <?= $quest->status_answers ?>
                                    </td>
                                    <td>
                                <?= $quest->justification ?>
                                    </td>

                                </tr>


                                    <?php } elseif ($quest->id_question_title == NULL && $quest->id_tool == $title->id_tool) { ?>
                                <tr>

                                    <td>
                                <?= $quest->subject ?>


                                    </td>
                                    <td>
                                        <?= $quest->status_answers ?>
                                    </td>
                                    <td>
                                <?= $quest->justification ?>
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
                            echo '<b>Environmental Quality Act (Prescribe Premise) (Crude Palm Oil) 1977</b><br>'
                            . '<b>Environmental Quality Act (Control of Pollution from Solid Waste Transfer Station and Landfill) 2009</b><br>';
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
                                    <?= $quest->status_answers ?>
                                        </td>
                                        <td>
                                    <?= $quest->justification ?>
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
                                <?= $quest->status_answers ?>
                                    </td>
                                    <td>
                                <?= $quest->justification ?>
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
    <?php elseif ($tool->tool_no == '1'): ?>
                <?php foreach ($questions as $question): ?>
                    <?php foreach ($question as $quest): ?>      
                <?php if ($quest->id_tool == $tool->tool_no) { ?>
                    <tr>
                        <td>
                    <?= $quest->subject ?>
                        </td>
                        <td>
                    <?= $quest->status_answers ?>
                        </td>
                        <td>
                    <?= $quest->justification ?>
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
    </table>
    
<?php endforeach; ?>
                        

