<?php
$tool1_score_premise = ($answers2->tool1_score_premise / 100 * $tool_weightage[0]->tool_full_score);
if (isset($tool1_DOE_score)) {
    $tool1_score_doe = $tool1_DOE_score->doe_score ? ($tool1_DOE_score->doe_score / 100 * $tool_weightage[0]->tool_full_score) : '0';
}

$tool2_score_premise = ($answers2->tool2_score_premise / 100 * $tool_weightage[1]->tool_full_score);
if (isset($tool2_DOE_score)) {
    $tool2_score_doe = $tool2_DOE_score->doe_score ? ($tool2_DOE_score->doe_score / 100 * $tool_weightage[1]->tool_full_score) : '0';
}

$tool3_score_premise = ($answers2->tool3_score_premise / 100 * $tool_weightage[2]->tool_full_score);
if (isset($tool3_DOE_score)) {
    $tool3_score_doe = $tool3_DOE_score->doe_score ? ($tool3_DOE_score->doe_score / 100 * $tool_weightage[2]->tool_full_score) : '0';
}

$tool4_score_premise = ($answers2->tool4_score_premise / 100 * $tool_weightage[3]->tool_full_score);
if (isset($tool4_DOE_score)) {
    $tool4_score_doe = $tool4_DOE_score->doe_score ? ($tool4_DOE_score->doe_score / 100 * $tool_weightage[3]->tool_full_score) : '0';
}

$tool5_score_premise = ($answers2->tool5_score_premise / 100 * $tool_weightage[4]->tool_full_score);
if (isset($tool5_DOE_score)) {
    $tool5_score_doe = $tool5_DOE_score->doe_score ? ($tool5_DOE_score->doe_score / 100 * $tool_weightage[4]->tool_full_score) : '0';
}

$tool6_score_premise = ($answers2->tool6_score_premise / 100 * $tool_weightage[5]->tool_full_score);
if (isset($tool6_DOE_score)) {
    $tool6_score_doe = $tool6_DOE_score->doe_score ? ($tool6_DOE_score->doe_score / 100 * $tool_weightage[5]->tool_full_score) : '0';
}

$tool7_score_premise = ($answers2->tool7_score_premise / 100 * $tool_weightage[6]->tool_full_score);
if (isset($tool7_DOE_score)) {
    $tool7_score_doe = $tool7_DOE_score->doe_score ? ($tool7_DOE_score->doe_score / 100 * $tool_weightage[6]->tool_full_score) : '0';
}
?>


<style>
    #company_info {
        padding: 50px;

    }
</style>
<div class="container-fluid">
    <div class="row">
        <a href="<?= base_url('answers') ?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to list</a>
        <br>
    </div>
    <div class="row-fluid">

        <div class="col-md-12">
<?= $paparan_maklumat_syarikat ?>
        </div>


    </div>

    <div class="row-fluid">

        <div class="col-md-12">
            List of EMT Submitted
            <table class="table table-bordered">
                <thead>
                <td>No</td><td>Type of submission</td><td>Verification</td><td>Current Status</td><td>Completed ?</td><td>Submission Date</td><td>Completed Date</td><td>Action</td><td></td>
                </thead>
<?php
$i = 0;
foreach ($list_of_emt as $emt) {
    if ($emt->emt_status != 1) {
        ?>
                        <tr>
                            <td>
        <?= ++$i ?>
                            </td>
                            <td>
        <?= $emt->emt_type ?>
                            </td>
                            <td>
        <?= $emt->verification_type ?>    
                            </td>
                            <td>
        <?= $this->ref->return_emt_status($emt->emt_status) ?>    
                            </td>
                            <td>
        <?= ($emt->completed == 1) ? 'Yes' : 'No' ?>    
                            </td>
                            <td>
        <?= isset($emt->submission_date)? date("d/m/Y", strtotime($emt->submission_date)) : '' ?>    
                            </td>
                            <td>
        <?= isset($emt->completed_date)? date("d/m/Y", strtotime($emt->completed_date)) : '' ?>    
                            </td>
                            <td  style="font-size: 20px">
        <?php if ($emt->completed != 0): ?> 
                                                                
                                <a type="button" class="btn btn-default" href="<?= base_url('answers/answers_by_doe/') . $emt->idpremise . '/' . $emt->id ?>">
                                    <span class="fa fa-search" data-toggle="tooltip" title="View"></span>
                                </a>
                                <a type="button" class="btn btn-default" onclick="printPage('<?= base_url("answers/print_answers/") .$emt->idpremise . "/" . $emt->id ?>');">
                                    <span class="fa fa-print" data-toggle="tooltip" title="Print"></span>
                                </a>
                                
        <?php endif; ?>
                            </td>
                            <td>
        <?php
//echo '<pre>';
//        print_r($all_remark);
//        echo '</pre>';
       // foreach ($all_remark as $remark):
           // if ($remark->emt_id == $emt->id):
                ?>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?= $emt->id ?>"><i class="fa fa-commenting" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#scoreModal<?= $emt->id ?>"><i class="fa fa-list" aria-hidden="true"></i></button>

                   <?php //else:?>
                                       
            <?php //endif;
       // endforeach; ?>
                            </td>


                        </tr>

                        <!-- For Remark Message -->

                        <?php
                    }
                }
                ?>

            </table>
        </div>


    </div>
    <hr>



</div>

<?php
foreach ($list_of_emt as $emt) {
    foreach ($all_remark as $remark):
        if ($remark->emt_id == $emt->id):
            ?>
            <!-- Remark Modal -->
            <div id="myModal<?= $emt->id ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <?= $paparan_remark?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Score overview Modal -->
            <div id="scoreModal<?= $emt->id ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <?php
                    $tool1_DOE_score = ${"tool1_DOE_score_emt$emt->id"};
                    $tool2_DOE_score = ${"tool2_DOE_score_emt$emt->id"};
                    $tool3_DOE_score = ${"tool3_DOE_score_emt$emt->id"};
                    $tool4_DOE_score = ${"tool4_DOE_score_emt$emt->id"};
                    $tool5_DOE_score = ${"tool5_DOE_score_emt$emt->id"};
                    $tool6_DOE_score = ${"tool6_DOE_score_emt$emt->id"};
                    $tool7_DOE_score = ${"tool7_DOE_score_emt$emt->id"};
                    $emt_answers = ${"answers2_emt$emt->id"};

                    $tool1_DOE_score = $tool1_DOE_score ? ($tool1_DOE_score * $tool_weightage[0]->tool_full_score) / 100 : '0';
                    $tool2_DOE_score = $tool2_DOE_score ? ($tool2_DOE_score * $tool_weightage[1]->tool_full_score) / 100 : '0';
                    $tool3_DOE_score = $tool3_DOE_score ? ($tool3_DOE_score * $tool_weightage[2]->tool_full_score) / 100 : '0';
                    $tool4_DOE_score = $tool4_DOE_score ? round((($tool4_DOE_score / $no_of_rules) * $tool_weightage[3]->tool_full_score) / 100, 1) : '0';
                    $tool5_DOE_score = $tool5_DOE_score ? round((($tool5_DOE_score / $no_of_rules) * $tool_weightage[4]->tool_full_score) / 100, 1) : '0';
                    $tool6_DOE_score = $tool6_DOE_score ? round((($tool6_DOE_score / $no_of_rules) * $tool_weightage[5]->tool_full_score) / 100, 1) : '0';
                    $tool7_DOE_score = $tool7_DOE_score ? ($tool7_DOE_score * $tool_weightage[6]->tool_full_score) / 100 : '0';

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
                    <div class="modal-content modal-lg">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Score Overview</h4>
                        </div>
                        <div class="modal-body">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif;
    endforeach;
} ?>

<script>
    //Printing
    function closePrint() {
        document.body.removeChild(this.__container__);
    }

    function setPrint() {
        this.contentWindow.__container__ = this;
        this.contentWindow.onbeforeunload = closePrint;
        this.contentWindow.onafterprint = closePrint;
        this.contentWindow.focus(); // Required for IE
        this.contentWindow.print();
    }

    function printPage(sURL) {
        var oHiddFrame = document.createElement("iframe");
        oHiddFrame.onload = setPrint;
        oHiddFrame.style.visibility = "hidden";
        oHiddFrame.style.position = "fixed";
        oHiddFrame.style.right = "0";
        oHiddFrame.style.bottom = "0";
        oHiddFrame.src = sURL;
        document.body.appendChild(oHiddFrame);
    }

</script>