

<div class="container-fluid">
    <div class="row">
        <a href="<?= base_url('remark') ?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to dashboard</a>
        <br>
    </div>
    <div class="row-fluid">
        <div class="col-md-12">

            <?= $paparan_maklumat_syarikat ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-12">
            <h4> <a href="<?= base_url('answers/answers_by_doe/'.$idpremis .'/'.$emt_id)?>">view EMT</a></h4>
            <hr>
        </div>
    </div>
    
     <div class="row-fluid">
        <div class="col-md-12">

            <?= $paparan_remark ?>
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-md-12">

            <?php if ($status_emt == 3) { ?>

                <form method="post" action="<?= base_url() ?>remark/pemeriksa_submit/">
                    <div class="well">
                        <?= form_hidden('idpremis', $idpremis) ?>
                        <?= form_hidden('emt_id', $emt_id) ?>
                        <div class="row">
                            <h3>Suggestions to Pegawai Penyelia : </h3>
                            <h4><label class="radio-inline"><input type="radio" name="ketetapan" value="approve" required>Approve</label></h4>
                            <h4><label class="radio-inline"><input type="radio" name="ketetapan" value="reject" required>Reject</label></h4>

                            
                        </div>
                        <hr>
                        <div class="row">

                            <div class="control-group">

                                <div class="controls">
                                    <textarea id="textarea_editor"  style="width:100%" rows="5" placeholder="Remark for Pegawai Penyelia" name="commentDOE"></textarea>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <h3>Return to premise : </h3>
                            <h4><label class="radio-inline"><input id="radioRevert" type="radio" name="ketetapan" value="revert" required>Revert to Premise</label></h4>
                            <div class="control-group">
                                <div class="controls">
                                    <textarea id="textarea_editor2"  style="width:100%" rows="5" placeholder="Remark for Premise" name="commentPremise"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                             <h3><label class="radio-inline"><input type="checkbox" name="notify" value="1" >&nbsp;Notify Score</label></h3>    
                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="col col-md-1"><input type="submit" value="Submit" class="btn btn-primary"></div>
                        </div>
                    </div>
                </form>

            <?php } elseif(in_array ($status_emt, array(1,2,4,5,6,7,8,9,10,11,12))) { ?>
                <!--No display needed -->
            <?php } else { ?>
            Please complete the assessment
            <?php } ?>
        </div></div></div>
