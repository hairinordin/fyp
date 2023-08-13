<style>
    input[type=number]{
        width: 50px;

    } 
</style>

<h4>Monthly KPI <small><?= $negeri . ' | ' . $this->session->userdata('name') ?> </small></h4>
<hr>
<div class="alert alert-warning">
<!--    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
    <strong>Warning!</strong> KPI telah dihantar untuk pengesahan, sebarang perubahan perlu melalui ibu pejabat.
</div>

<?php
$flashdata = $this->session->flashdata('item');
if (isset($flashdata)) {
    $message = $this->session->flashdata('item');
    ?>
    <div class="alert alert-<?php echo $message['class'] ?>">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?php echo $message['class'] ?>!</strong> <?php echo $message['message']; ?>
    </div>

    <?php
}
?>
<div class='table table-bordered table-striped'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYDT</div>
            <div class="td">Inventory</div>
            <div class="td">January</div>
            <div class="td">February</div>
            <div class="td">March</div>
            <div class="td">April</div>
            <div class="td">May</div>
            <div class="td">June</div>
            <div class="td">July</div>
            <div class="td">August</div>
            <div class="td">September</div>
            <div class="td">October</div>
            <div class="td">November</div>
            <div class="td">December</div>
            <div class="td">Total</div>
            <div class="td">Action</div>
        </div>
    </div>

    <?php if ($inventory_kks != 0): ?>
        <?php $month = 1 ?>
        <form class="tr" method="post" action="<?= base_url('kpi/set_monthly') ?>">
            <?= form_hidden('email', $this->session->userdata('user_id')); ?>
            <?= form_hidden('kat', '41'); ?>
            <div class="td">KKS</div>
            <div class="td" id="inventorykks"><?= $inventory_kks ?></div>
            <?php
//            echo '<pre>';
//            print_r($monthly_kpi_kks);
//            echo '</pre>';
            ?>
            <?php for ($i = 0; $i < 12; $i++) { ?>
                <?php
                if (isset($monthly_kpi_kks[$i]->id)) {
                    echo form_hidden('update_id_'.$month, $monthly_kpi_kks[$i]->id);
                    ?>
                    <div class="td" id='kks_<?= $i ?>'><input type='number' name='41_<?= $month++ ?>' min='0' value='<?= $monthly_kpi_kks[$i]->sasaran_bulan ?>' required></div>
                <?php } else { ?>
                    <div class="td" id='kks_<?= $i ?>'><input type='number' name='41_<?= $month++ ?>' min='0' value='0' required></div>

                <?php
                }
            }
            ?>

            <div class="td" id='total_kpi_kks'></div> 
            <div class="td"><button id="btnkks">Update</button><span class="label label-danger" style="display: none" id="lbl_41">Click here to save</span></div>
        </form>
    <?php endif; ?>

    <?php if ($inventory_kg != 0): ?>
            <?php $month = 1 ?>
        <form class="tr" method="post" action="<?= base_url('kpi/set_monthly') ?>">
            <?= form_hidden('email', $this->session->userdata('user_id')); ?>
    <?= form_hidden('kat', '40'); ?>
            <div class="td">KG</div>
            <div class="td" id="inventorykg"><?= $inventory_kg ?></div>

            <?php for ($i = 0; $i < 12; $i++) { ?>
                <?php
                if (isset($monthly_kpi_kg[$i]->id)) {
                    echo form_hidden('update_id_'.$month, $monthly_kpi_kg[$i]->id);
                    ?>
                    <div class="td" id='kg_<?= $i ?>'><input type='number' name='40_<?= $month++ ?>' min='0' value='<?= $monthly_kpi_kg[$i]->sasaran_bulan ?>' required></div>
        <?php } else { ?>
                    <div class="td" id='kg_<?= $i ?>'><input type='number' name='40_<?= $month++ ?>' min='0' value='0' required></div>

                <?php }
            }
            ?>

            <div class="td" id='total_kpi_kg'></div> 
            <div class="td"><button id="btnkg">Update</button><span class="label label-danger" style="display: none" id="lbl_40">Click here to save</span></div>
        </form> 
    <?php endif; ?>

        <?php if ($inventory_bt != 0): ?>
            <?php $month = 1 ?>
        <form class="tr" method="post" action="<?= base_url('kpi/set_monthly') ?>">
            <?= form_hidden('email', $this->session->userdata('user_id')); ?>
    <?= form_hidden('kat', '42'); ?>

            <div class="td">BT</div>
            <div class="td" id="inventorybt"><?= $inventory_bt ?></div>

            <?php for ($i = 0; $i < 12; $i++) { ?>
                <?php
                if (isset($monthly_kpi_bt[$i]->id)) {
                    echo form_hidden('update_id_'.$month, $monthly_kpi_bt[$i]->id);
                    ?>
                    <div class="td" id='bt_<?= $i ?>'><input type='number' name='42_<?= $month++ ?>' min='0' value='<?= $monthly_kpi_bt[$i]->sasaran_bulan ?>' required></div>
                <?php } else { ?>
                    <div class="td" id='bt_<?= $i ?>'><input type='number' name='42_<?= $month++ ?>' min='0' value='0' required></div>

        <?php }
    }
    ?>
            <div class="td" id='total_kpi_bt'></div> 
            <div class="td"><button id="btnbt">Update</button><span class="label label-danger" style="display: none" id="lbl_42">Click here to save</span></div>
        </form> 
<?php endif; ?>


</div>

<div class='table table-bordered'>
    <div class="thead">
        <div class="tr">
            <div class="td">PYBDT</div>
            <div class="td">Inventory</div>
            <div class="td">January</div>
            <div class="td">February</div>
            <div class="td">March</div>
            <div class="td">April</div>
            <div class="td">May</div>
            <div class="td">June</div>
            <div class="td">July</div>
            <div class="td">August</div>
            <div class="td">September</div>
            <div class="td">October</div>
            <div class="td">November</div>
            <div class="td">December</div>
            <div class="td">Total</div>
            <div class="td">Action</div>
        </div>
    </div>
    <?php foreach ($list_of_sic as $sic): ?>
        <?php
        $monthly_kpi = ${"monthly_kpi_$sic->SIC"};
        $inventory_sic = ${"inventory_$sic->SIC"};
        ?>

            <?php if ($inventory_sic != 0): ?>
        <?php $month = 1 ?>
            <form class="tr" method="post" action="<?= base_url('kpi/set_monthly') ?>">
                <?= form_hidden('email', $this->session->userdata('user_id')); ?>
                <?= form_hidden('kat', $sic->SIC); ?>
                <div class="td"><?= $sic->SIC . ' : ' . $sic->KETERANGAN_SIC ?></div>
                <div class="td" id="inventory<?= $sic->SIC ?>"><?= $inventory_sic ?></div>

                <?php for ($i = 0; $i < 12; $i++) { ?>
                    <?php
                    if (isset($monthly_kpi[$i]->id)) {
                        echo form_hidden('update_id'.$month, $monthly_kpi[$i]->id);
                        ?>
                        <div class="td" id='sic<?= $sic->SIC ?>_<?= $i ?>'><input type='number' name='<?= $sic->SIC . '_' . $month++ ?>' min='0' value='<?= $monthly_kpi[$i]->sasaran_bulan ?>' required></div>
                    <?php } else { ?>
                        <div class="td" id='sic<?= $sic->SIC ?>_<?= $i ?>'><input type='number' name='<?= $sic->SIC . '_' . $month++ ?>' min='0' value='0' required></div>

            <?php }
        }
        ?>
                <div class="td" id='total_kpi_<?= $sic->SIC ?>'></div> 
                <div class="td"><button id="btn<?= $sic->SIC ?>">Update</button><span class="label label-danger" style="display: none" id="lbl_<?= $sic->SIC ?>">Click here to save</span></div>
            </form> 
    <?php endif; ?>
        
<?php endforeach; ?>

</div>

<!-- MODAL BLOCK PAST FEB -->
<!--<div class="modal fade" id="confirm-verification" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Type of Verification</h4>
            </div>

            <div class="modal-body">
                <p>
                    Pengemaskinian KPI perlu dibuat sebelum 1 Februari setiap tahun, perubahan selepas tarikh tersebut perlu melalui ibu pejabat.
                </p>
                
            </div>

            <div class="modal-footer">
                <button id="update_verification" class="btn btn-danger btn-ok">Proceed</button>
                <button id="magic-btn" type="button" class="btn btn-default" data-dismiss="modal" onclick="document.location.href = '<?= base_url('dashboard')?>'">Cancel</button>
            </div>
        </div>
    </div>
</div>-->

<script>
    

//    function loadFebBlockerModal(){
//            //blocker modal
//            $(window).on('load',function(){
//                $('#confirm-verification').modal('show');
//            });
//
//            $('#confirm-verification').on('show.bs.modal', function(e) {
//                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
//
//            });
//
//        }

    $("input[type='number']").focus(function () {
        var input = this.name;
        var sic_no = input.substring(0, input.indexOf("_"));
        //alert(sic_no);
        $("span[id='lbl_" + sic_no + "']").show();

    });


    var words = <?php echo json_encode($list_of_sic) ?>;// don't use quotes

    $("input").change(function (e) {

        $.each(words, function (key, value) {
            //console.log( key + ": " + value.SIC );

            var sic = e.target;
            sic = sic.name;
            sic = sic.substring(0, sic.indexOf('_'));
            //console.log(sic.substring(0, sic.indexOf('_')));

            var total = 0;

            for (i = 1; i <= 12; i++) {
                total += parseInt($("[name='" + value.SIC + "_" + i + "']").val());
                //total += parseInt($("[name='" + value.SIC + "_" + i + "']").val());
            }
            if (sic == value.SIC) {
                if (total > parseInt($("[id='inventory" + value.SIC + "']").text())) {
                    //console.log('total is bigger than inventory');
                    $("[id='btn" + value.SIC + "']").attr("disabled", "disabled");
                    $("span[id='lbl_" + value.SIC + "']").text('Exceeds total inventory');
                } else {
                    $("[id='btn" + value.SIC + "']").removeAttr("disabled");
                    $("span[id='lbl_" + value.SIC + "']").text('Click here to save');
                }

                $("#total_kpi_" + value.SIC).text(total = total || 0);
            }

            console.log(total);

            var totalkks = 0;

            if (sic == 41) {
                for (i = 0; i < 12; i++) {
                    totalkks += parseInt($("[id='kks_" + i + "'] > input").val());
                }

            } else {
                for (i = 0; i < 12; i++) {
                    totalkks += parseInt($("[id='kks_" + i + "'] > input").val());
                }

            }

            if (totalkks > parseInt($("[id='inventorykks']").text())) {
                //console.log('total is bigger than inventory');
                $("[id='btnkks']").attr("disabled", "disabled");
                $("span[id='lbl_41']").text('Exceeds total inventory');
            } else {
                $("[id='btnkks']").removeAttr("disabled");
                $("span[id='lbl_41']").text('Click here to save');
            }

            $("#total_kpi_kks").text(totalkks = totalkks || 0);


            var totalkg = 0;
            if (sic == 40) {
                for (i = 0; i < 12; i++) {
                    totalkg += parseInt($("[id='kg_" + i + "'] > input").val());
                }

            } else {
                for (i = 0; i < 12; i++) {
                    totalkg += parseInt($("[id='kg_" + i + "'] > input").val());
                }
            }

            if (totalkg > parseInt($("[id='inventorykg']").text())) {
                //console.log('total is bigger than inventory');
                $("[id='btnkg']").attr("disabled", "disabled");
                $("span[id='lbl_40']").text('Exceeds total inventory');
            } else {
                $("[id='btnkg']").removeAttr("disabled");
                $("span[id='lbl_40']").text('Click here to save');
            }

            $("#total_kpi_kg").text(totalkg = totalkg || 0);


            var totalbt = 0;
            if (sic == 42) {
                for (i = 0; i < 12; i++) {
                    totalbt += parseInt($("[id='bt_" + i + "'] > input").val());
                }
            } else {
                for (i = 0; i < 12; i++) {
                    totalbt += parseInt($("[id='bt_" + i + "'] > input").val());
                }
            }
            if (totalbt > parseInt($("[id='inventorybt']").text())) {
                //console.log('total is bigger than inventory');
                $("[id='btnbt']").attr("disabled", "disabled");
                $("span[id='lbl_42']").text('Exceeds total inventory');
            } else {
                $("[id='btnbt']").removeAttr("disabled");
                $("span[id='lbl_42']").text('Click here to save');
            }
            $("#total_kpi_bt").text(totalbt = totalbt || 0);
        });




    });

    $(document).ready(function () {
        
        
        var CurrentDate = new Date();
        var currentYear = CurrentDate.getFullYear();
        var Feb = currentYear + '-02-01';
        Feb = new Date(Feb);
        
//        var test = '2018-01-05';
//        test = new Date(test);

//        if(Feb > CurrentDate){
////            alert('Boleh isi la kan');
////            console.log(Feb + ' ' + CurrentDate);
//        }else{
//            loadFebBlockerModal();
//        }
        
        //KKS
        var totalkks = 0;
        for (i = 0; i < 12; i++) {
            totalkks += parseInt($("[id='kks_" + i + "'] > input").val());
        }

        $("#total_kpi_kks").text(totalkks = totalkks || 0); //if NaN, change to zero
        //KG
        var totalkg = 0;
        for (i = 0; i < 12; i++) {
            totalkg += parseInt($("[id='kg_" + i + "'] > input").val());
        }

        $("#total_kpi_kg").text(totalkg = totalkg || 0); //if NaN, change to zero
        //BT
        var totalbt = 0;
        for (i = 0; i < 12; i++) {
            totalbt += parseInt($("[id='bt_" + i + "'] > input").val());
        }

        $("#total_kpi_bt").text(totalbt = totalbt || 0); //if NaN, change to zero

        //PYBDT
        $.each(words, function (key, value) {
            //console.log( key + ": " + value.SIC );

            var total = 0;
            for (i = 0; i < 12; i++) {
                total += parseInt($("[id='sic" + value.SIC + "_" + i + "'] > input").val());
            }
            $("#total_kpi_" + value.SIC).text(total = total || 0);
            //console.log(total);
        });
        
        $(":input").prop('readonly', true);
        $(":button").not('#magic-btn').prop('disabled', true);
    });
</script>