<style>
    input[type=checkbox].bigChk {
        transform: scale(1.5);
    }

    input[type=radio].bigRad {
        transform: scale(1.5);
    }
</style>
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

        <?php if (in_array($status_emt, array(7, 8))) { //completed, rejected for approval?>

            <form method="post" action="<?= base_url() ?>remark/pelulus_submit/">

                <div class="well">
                    <?= form_hidden('idpremis', $idpremis) ?>
                    <?= form_hidden('emt_id', $emt_id) ?>

                    <div class="row">
                        <div class="col-md-4">
                            <h3>EMT status : </h3>
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input class="bigRad" type="radio" name="ketetapan" value="approve" required>Approve</label>
                            </div>
                            <div class="form-group">
                                <h4><label class="radio-inline">
                                        <input class="bigRad" type="radio" name="ketetapan" value="reject" required>Reject</label></h4>
                            </div>
                            <div class="form-group">
                                <h4><label class="radio-inline">
                                        <input class="bigRad" id="radioRevert" type="radio" name="ketetapan" value="revert" required>Revert to Pegawai Penyelia (Return to premise)</label></h4>
                            </div>

                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <textarea id="textarea_editor"  style="width:100%" rows="5" placeholder="Remark(required)" name="commentDOE" required></textarea>
                            </div>
                        </div>       
                    </div>
                    <div class="row">

                        <div class="col-md-4" id='completedEMT' style="display:none">
                            <h3>EMT Completed : <label id="tool">0</label><b>/7</b></h3>
                            <table class="table" style="font-size: 80%">
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
                        <div class="col-md-8" id='notifyChk' style="display:none">

                <!--                                <h3><label class="radio-inline"><input class="bigChk" type="checkbox" name="notify" value="1" >&nbsp;Allow premise to see score</label><br><small> Display assessment result on premise dashboard</small></h3>    -->
                        </div>
                    </div>
                    <hr>

                    <div class="row">

                        <div class="col col-md-1"><button type="submit"  class="btn btn-primary">Submit</button></div>
                    </div>

                </div>
            </form>
        <?php } ?>
    </div></div></div>


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