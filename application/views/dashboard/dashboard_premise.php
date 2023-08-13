<input type='hidden' id='idpremis' value="<?= $premise_info->idpremis ?>">
<?php
$emtCompleted = '';
$pub_cb = 'disabled';
$eff_cb = 'disabled';
$bt_cb = 'disabled';
$sewage_cb = 'disabled';
$kks_cb = 'disabled';
$landfill_cb = 'disabled';
$kg_cb = 'disabled';

if ($premise_info->tertakluk_pub == 'T' && $premise_info->pub == 'Y') {
    $pub_cb = 'checked onclick="return false"';
}

if ($premise_info->tertakluk_eff == 'T' && $premise_info->effluent == 'Y') {
    $eff_cb = 'checked onclick="return false"';
}

if ($premise_info->sewage == 'Y' && $premise_info->tertakluk_kum == 'T') {
    $sewage_cb = 'checked onclick="return false"';
}

if ($premise_info->bt == 'Y') {
    $bt_cb = 'checked onclick="return false"';
}

if ($premise_info->kks == 'Y') {
    $kks_cb = 'checked onclick="return false"';
}

if ($premise_info->landfill == 'Y') {
    $landfill_cb = 'checked onclick="return false"';
}

if ($premise_info->kg == 'Y') {
    $kg_cb = 'checked onclick="return false"';
}
?>
<div class="row">
    <div id="company_info">
        <div class="col-md-5">
            
            <?= $paparan_maklumat_syarikat ?>
        </div>
    </div>


    <div class="col-md-7">
        <table class="table table-full">
            <thead>
            <th colspan="3">Rules and regulation applied <button class="btn-info" data-toggle="tooltip" title="If you are unsure, please contact DOE for confirmation"><span class="fa fa-info" aria-hidden="true"></span></button></th>
            </thead> 
            <tr>
                <td>

                </td>
                <td>   
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="EFF_cb" value="Effluent" <?= $eff_cb ?>>
                    <label for="EFF_cb">
                        Environmental Quality (Industrial Effluent) 2009
                    </label> 
                </td>

            </tr>  
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="SEWAGE_cb" <?= $sewage_cb ?>>
                    <label for="SEWAGE_cb">
                        Environmental Quality (Sewage) 2009
                    </label> 
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="KKS_cb" <?= $kks_cb ?>>
                    <label for="KKS_cb">
                        Environmental Quality (Prescribe Premise)(Crude Palm Oil) 1977
                    </label> 

                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="SW_cb" value="SW" <?= $bt_cb ?>>
                    <label for="SW_cb">
                        Environmental Quality (Schedule Waste) 2005
                    </label> 
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="CAR_cb" value="CAR" <?= $pub_cb ?>>
                    <label for="CAR_cb">
                        Environmental Quality (Clean Air) 2014
                    </label> 
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="Landfill_cb" value="LANDFILL" <?= $landfill_cb ?>>
                    <label for="Landfill_cb">
                        Environmental Quality (Control of Pollution From Solid Waste Transfer Station and Landfill) 2009
                    </label> 
                </td>

            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input class= "magic-checkbox" type="checkbox" name="rules" id="kg_cb" value="KG" <?= $kg_cb ?>>
                    <label for="kg_cb">
                        Environmental Quality (Prescribe Premise) (Raw Natural Rubber) 1978
                    </label> 
                </td>

            </tr>
        </table>
    </div>

</div>

<div class="row">
    <legend>EMT Submission Status</legend>
    <div class="col-md-12">

        <table class="table table-full table-hover">
            <thead>
            <th>Started Date</th>
            <th>Completed Date</th>
            <th>Type</th>
            <th>Status</th>
            <th>Tool Completed</th>
<!--            <th>Tool Completed (DOE)</th>-->
            <th>Score</th>
<!--            <th>EMT Assessment</th>-->
            <th></th>
            <th></th>
            </thead>
            
            <?php 
//                echo '<pre>';
//                print_r($answers2);
//                echo '</pre>';
            ?>
            <?php if ($answers2): ?>
                <?php foreach ($answers2 as $emt) { ?>
                    <tr>     
                        <td><?= ($date_started->date_started  != '0000-00-00') ? date("d/m/Y", strtotime($date_started->date_started))  : ''?></td>              
                        <td><?= ($emt->submission_date != '0000-00-00') ? date("d/m/Y", strtotime($emt->submission_date)) : '' ?></td>
                        <td><?= $emt->emt_type ?></td>
                        <td><?= $this->ref->return_emt_status_premise($emt->emt_status) ?></td>
                        <td><?= $emt->total_emt ?>/7</td>
<!--                        <td><?= $emt->no_tool_completed_DOE ?>/7</td>-->
                        <td style="font-size: 20px"><span class="label label-success"><?= round($emt->score, 2) ?></span></td>
<!--                        <td style="font-size: 20px">
                            <?php if (($emt->emt_status == 10 || $emt->emt_status == 11) && $emt->notify_score == 1): ?>
                            <span class="label label-success">
                                <?= $emt->scoreDOE ?>
                            </span> 
                            <?php else : ?>
                                Not available
                            <?php endif;?>
                        </td>-->
                        <td style="font-size: 20px">
                            <?php if ($emt->emt_status == 1) { ?>
                                <a href="<?= base_url('questions/view_question/'). $premise_info->idpremis . '/' . $emt->id ?>"><span class="label label-warning">Proceed to Updating/Submitting EMT</span></a>
                            <?php } else { ?>
                                <a href="<?= base_url('questions/print_answers/') . $premise_info->idpremis . '/' . $emt->id ?>">
                                        <span class="label label-default"><i class="fa fa-search" aria-hidden="true" data-toggle="tooltip" title="View"></i></span>
                                </a>
                               
                               
                                <a href="#"><span onclick="printPage('<?= base_url("questions/print_answers/") . $premise_info->idpremis . "/" . $emt->id ?>');" class="label label-default"><i class="fa fa-print" aria-hidden="true" data-toggle="tooltip" title="Print"></i></span></a>
                                
        <?php } ?>
                        </td>
                        <td>
                            <?php //if (!empty($emt->ulasan) && ($emt->ulasan[0]->suggestion == 'revert') ) { ?>
                            <?php 
//                            echo '<pre>';
//                            print_r($emt->ulasan);
//                            echo '</pre>';
                            if(!empty($emt->ulasan)){ ?>
                                <i class="fa fa-envelope" aria-hidden="true" data-toggle="modal" data-target="#ulasanModal<?= $emt->id?>"></i>
                            <?php } ?>
        <?php //} ?>
                        </td>     
                    </tr>
                    <?php
                    if ($emt->completed == 1) {
                        $emtCompleted = 'Yes';
                    } else {
                        $emtCompleted = 'No';
                    }
                    ?>

                <?php } ?>
<?php else: ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
<?php endif; ?>
        </table>
    </div>
</div>
 <?php if ($answers2): ?>
  <?php foreach ($answers2 as $emt) { ?>
<?php //if (($emt->ulasan == 'revert') ): ?>
    <!-- Ulasan Modal -->
    <?php if(!empty($emt->ulasan)){ ?>
    <div id="ulasanModal<?=$emt->id ?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Feedback from DOE officer </h4>
                </div>
                <div class="modal-body">
                    <p>
                    <table class="table">
                        <tr>
                            <td>
                                Message
                            </td>
                            <td>
                                From
                            </td>
                            <td>
                                Date/Time
                            </td>
                        </tr>
                    <?php 
                        foreach($emt->ulasan as $comment):
                    ?>
                    
                    
                        <tr>
                            <td>
                                <?= $comment->comment ?>
                            </td>
                            <td>
                                <?= $comment->sender ?>
                            </td>
                            <td>
                                <?= $comment->datetime ?>
                            </td>
                        </tr>
                    
                    
                    <?php endforeach;?>
                        </table>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <?php } } endif;?>
<div class="row">
    <div class="col-md-12 text-center">
        <?php
     
        if ($emtCompleted == 'No') {
            ?>
            <input type="submit" class="btn btn-lg"
                   value="Start" disabled="disabled" />
            <button class="btn-info" data-toggle="tooltip" title="Your EMT has not yet submitted or been reviewed, multiple submission is not require"><span class="fa fa-info" aria-hidden="true"></span></button>
            <?php
        } elseif ($emtCompleted == 'Yes') {
            ?>

            <input type="submit" class="btn btn-primary btn-lg"
                   value="Start" onclick="promptProceed()" />
               <?php } else { ?>
               
            <input type="submit" class="btn btn-primary btn-lg"
                   value="Start" onclick="promptProceed()" />
            <?php
               }
               ?>


    </div>
</div>
<script>
    function promptProceed() {

        if (confirm("Do you want to proceed?")) {
            set_date();
            window.location.href = "<?php echo base_url('questions/view_question'); ?>";

        } else {
            //Do nothing       
        }

    }


    function set_date() {

        var idpremis = $("#idpremis").val();

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url('questions/start_date/') ?>",
            type: "POST",
            data: {idpremis: idpremis},
            cache: false,
            success: function (data) {
                if (data) {
                    //var data = JSON.parse(data);
                    //$('#searchModal').html('hello hello');
                    console.log(data);


                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error on setting date, the page will now refresh');
                
                window.location.href = "<?php echo base_url('dashboard/company'); ?>";
            }
        });
    }
    
    //Printing
    function closePrint () {
  document.body.removeChild(this.__container__);
    }

    function setPrint () {
      this.contentWindow.__container__ = this;
      this.contentWindow.onbeforeunload = closePrint;
      this.contentWindow.onafterprint = closePrint;
      this.contentWindow.focus(); // Required for IE
      this.contentWindow.print();
    }

    function printPage (sURL) {
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



