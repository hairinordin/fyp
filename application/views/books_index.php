<table id="premise-table" class=" display table table-bordered table-striped table-hover">
<thead>
    <tr>
        <th></th><th>Premise</th><th>Bandar</th><th>Negeri</th><th>Jenis Industri</th><th>Alamat</th><th></th>
    </tr>
    
    
</thead>
<tbody>
</tbody>
</table>
<form method="post" action="<?= base_url() ?>chat/submit/">
                    <div class="well">
                        <?= form_hidden('idpremis', $idpremis) ?>
                        <?= form_hidden('emt_id', $emt_id) ?>
                        <div class="row">
                            <h3>Suggestions to Pegawai Penyelia : </h3>
                            <h4><label class="radio-inline"><input type="radio" name="ketetapan" value="approve" required>Approve</label></h4>
                            <h4><label class="radio-inline"><input type="radio" name="ketetapan" value="reject" required>Reject</label></h4>

                            <h3>Return to premise : </h3>
                            <h4><label class="radio-inline"><input id="radioRevert" type="radio" name="ketetapan" value="revert" required>Revert to Premise</label></h4>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="control-group">
                                <div class="controls">
                                    <textarea id="textarea_editor"  style="width:100%" rows="5" placeholder="Remark for Pegawai Penyelia" name="chatDOE"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="row">

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
<?php 
    
var_dump($data);

?>
