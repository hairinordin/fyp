<style>
    input[type=checkbox].bigChk {
        transform: scale(1.5);
    }

    input[type=radio].bigRad {
        transform: scale(1.5);
    }
</style>

<div class="container-fluid">
    <div class="row">
        <a href="<?= base_url('remark') ?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to list</a>
        <br>
    </div>
    <div class="row-fluid">
        <div class="col-md-12">

            <?= $paparan_maklumat_syarikat ?>
        </div>

    </div>
    <div class="row-fluid">
        <div class="col-md-12">
            <?= $paparan_score ?>
        </div>
    </div>
    <hr>
    <div class="row-fluid">
        <div class="col-md-12">
            <?= $paparan_remark ?>
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-md-12">

            <?php if (in_array($status_emt, array(4, 5, 12))) { //completed,rejected for verification, Revert to Pemeriksa ?>

                <form method="post" action="<?= base_url() ?>remark/penyelia_submit/" onsubmit="return submitForm(this);">
                    <div class="well">
                        <?= form_hidden('idpremis', $idpremis) ?>
                        <?= form_hidden('emt_id', $emt_id) ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h4><label>Suggestions to Pegawai Pelulus : </label></h4>
                                    <h5><label class="radio-inline"><input type="radio" name="ketetapan" value="approve" required>Approve</label></h5>
                                    <h5><label class="radio-inline"><input type="radio" name="ketetapan" value="reject" required>Reject</label></h5>
                                    <h4><label>Return to premise : </label></h4>
                                    <h5><label class="radio-inline"><input type="radio" name="ketetapan" value="revert" required>Revert to Pegawai Pemeriksa</label></h5>
                                </div><br>
                                <div class="form-group">
                                    <h4><label>Remark for Pegawai Pelulus</label></h4>
                                    <div class="controls">
                                        <textarea id="textarea_editor"  style="width:100%" rows="5" placeholder="Remark" name="commentDOE"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id='completedEMT' >
                                    <h3>EMT Completed : <label id="tool">0</label><b>/7</b></h3>
                                    <table class="table" style="font-size: 50%">
                                        <tr>
                                            <?php
                                            for ($i = 1; $i <= 7; $i++) {
                                                echo '<tr>';
                                                echo '<td><h4> Tool ' . $i, '</h4></td>';
                                                echo '<td>';
                                                echo '<div class="btn-group" data-toggle="buttons">';
                                                echo '<label class="btn btn-default">';
                                                echo '<input class="radio-completed" type="radio" autocomplete="off" name="toolComplete' . $i . '" value="1" required> Completed';
                                                echo '</label>';
                                                echo '<label class="btn btn-default">';
                                                echo '<input class="radio-completed" type="radio" autocomplete="off" name="toolComplete' . $i . '"  value="0" required> Not Completed';
                                                echo '</label>';
                                                echo '</div>';
                                                echo '</td>';
                                                echo '</tr>';
                                            }

                                            echo '<input type="hidden" id="totalComplete" name="totalComplete"  value="0">';
                                            ?>

                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">

                            <div class="col col-md-1"><input type="submit" value="Submit" class="btn btn-primary" onclick="return confirm('Do you want to submit?');"></div>
                        </div>

                    </div>

                </form>

                <?php //} elseif(in_array ($status_emt, array(1,2,3,6,7,8,9,10,11,12))) { ?>
                <!--No display needed -->
                <?php //} else { ?>
                <!--            Please complete the assessment-->
            <?php } ?>
        </div></div></div>
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
                            <?= $paparan_remark ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <?php
        endif;
    endforeach;
}
?>
<script>

<?php
$comp = $this->session->flashdata('comp');
if ($comp == 1) {
    ?>
        alert("EMT has been completed");
    <?php
}
?>
    $("input[type=radio][class=radio-completed]").change(function () {

        if (this.value === '1') {
            // $(this).parent().addClass("btn-info");
            $(this).parent().attr("class", "btn btn-info");
            $(this).parent().siblings("label").attr("class", "btn btn-default");

        } else {
            $(this).parent().attr("class", "btn btn-warning");
            $(this).parent().siblings("label").attr("class", "btn btn-default");
        }
    });

    $("input[type=radio][class=radio-completed]").click(function () {
        $("label").removeClass("btn-default");
    });

    function submitForm() {
        return confirm('Do you really want to submit the form?');
    }

    $("input[type=radio][name=ketetapan]").change(function () {

        if (this.value === 'approve' || this.value === 'reject') {
            $('#notifyChk').show();
            $('#completedEMT').show();
            $("#completedEMT").find("input").prop('required', true);
        } else {
            $('#notifyChk').hide();
            $('#completedEMT').hide();
            $("#completedEMT").find("input").removeAttr('required');
        }
    });

    $("input[type=radio][name*=toolComplete]").change(function () {
        var emtCompleted = 0;
        $("#totalComplete").val(function () {
            $("input[type=radio][name*=toolComplete]:checked").each(function () {
                emtCompleted += ~~$(this).val();
            });
        });

        $("#totalComplete").val(emtCompleted);
        $("#tool").text(emtCompleted);
    });
</script>