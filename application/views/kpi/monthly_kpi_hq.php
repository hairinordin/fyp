<style>
    input[type=number]{
        width: 50px;

    } 
    .officer-head-col{
        background-color: #999999;
    }
    .officer-col{
        background-image: linear-gradient(to left top, #a4a4a4, #b4b4b4, #c5c5c5, #d6d6d6, #e7e7e7);
    }
    
    #show{
    display: <?= ($showTable == TRUE) ? 'block' : 'none'?>;
    }
</style>

<h3>Monthly KPI for the year of <?= $year ?> 
    <small> <?= isset($stateTitle) ? $stateTitle : '' ?> </small>
</h3>
<hr>

  <?php 
    //Set $flag_february to 1, if still in $feb_every_year             
    $feb_every_year = date('Y-02-01'); //Stored current date every 1st february every year
    $flag_february = 0;
    if (date("Y-m-d") > $feb_every_year){
        $flag_february = 0;
    }else {
        $flag_february = 1;
    }           
?>
<?php if($this->role == 'KPI'): ?>
<div class="row">
    
    <div class="col-md-6 pull-right">
        <h4>Status - <?= ($kpi_status) ? '<span class="label label-success">Verified</span>' : '<span class="label label-warning">Not Verified</span>'?></h4>
        <br>
        <button class="btn btn-success btn-lg" onclick="verify_submit()" <?= ($kpi_status)? 'disabled':'' ?>>Confirm KPI</button>
    </div>
</div>
<?php endif; ?>

<form method="post" action="<?= base_url('kpi/monthly_kpi') ?>" id="myform">
<div class="row">
    <div class="col-md-2 col-xs-2">
        <div class="form-group">
            <label for="sel1">Select Year:</label>
            <select class="form-control" name="year" id="sel1">
<!--                <option value="2018">Select one</option>-->
                <?php 
                $selected18 = '';
                $selected19 = '';
                if($year == 2018){
                    $selected18 = "selected='selected'";
                } elseif($year == 2019){
                    $selected19 = "selected='selected'";
                }
                ?>
                <option value="2018" <?=$selected18 ?>>2018</option>
                <option value="2019" <?=$selected19 ?>>2019</option>
<!--                <option value="2020">2020</option>-->
            </select>
        </div>
    </div> 
</div>
    <?php 
        //IF HQ, Allowed state selection
        if($this->state == 16) { 
        ?>
<div class="row">
    <div class="col-md-2 col-xs-2">
        <div class="form-group">
            <label for="sel2">Select State:</label>
            <select class="form-control" name="state" id="sel2">
                <option value="00">Select one</option>
<!-- Disabled select option based on KPI Status-->
            <?php
            foreach($state_kpi_status as $key => $value){ 
                //if($key != 16){ 
                ?>
               <option value="<?= $value['kod_negeri'] ?>" <?= ($value['status'])? '':'disabled' ?>><?= $value['negeri']?></option>
            <?php
            //} 
            
                }

            ?>
                
            </select>
        </div>
    </div> 
</div>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>&nbsp;</th><th>State</th><th>KPI Status</th><th>Action</th>
                </thead>
                <?php 
                foreach($state_kpi_status as $key => $value){ 
                    
                    //if($key != 16){ 
                ?>
                
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $value['negeri'] ?></td>
                    <td><?= ($value['status'])? '<span class="label label-success">Verified</span>':'<span class="label label-warning">Not Verified</span>' ?></td>
                    <td>
                        
                        <a href="<?= base_url('kpi/allow_edit/' . $key)?>" onclick="setDraft(<?=$key ?>); return false;"><?= ($value['status'])? 'Set to draft' : '' ?></a> </td>
                </tr>
                    <?php //}
                    
                    } ?>
            </table>
        </div>        
    </div>
    <?php } ?>
</form>



<div class="alert alert-info">
  <strong>Pengemaskinian KPI perlu dibuat sebelum 1 Februari pada setiap tahun. 
      Perubahan selepas tarikh tersebut perlu melalui Ibu Pejabat.</strong>
</div>
<div id="show">
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>PYDT</th>
            <th>Inventory</th>
            <th>January</th>
            <th>February</th>
            <th>March</th>
            <th>April</th>
            <th>May</th>
            <th>June</th>
            <th>July</th>
            <th>August</th>
            <th>September</th>
            <th>October</th>
            <th>November</th>
            <th>December</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>

    <?php if ($inventory_kks != 0): ?>
        <?php $month = 1 ?>
        <tbody>
            <tr>
                <td>KKS</td>
                <td id="inventorykks"><?= $inventory_kks ?></td>

                <?php for ($i = 0; $i < 12; $i++) { ?> 
                    <td id='kks_<?= $i ?>'><?= isset($monthly_kpi_kks[$i]->sasaran_bulan) ? $monthly_kpi_kks[$i]->sasaran_bulan : '0' ?></td>
                <?php } ?>

                <td id='total_kpi_kks'></td> 
                <td>
                
                </td>
            </tr>
            
        </tbody>
    <?php endif; ?>

    <?php if ($inventory_kg != 0): ?>
        <?php $month = 1 ?>
        <tbody>
            <tr>
                <td>KG</td>
                <td id="inventorykg"><?= $inventory_kg ?></td>

                <?php for ($i = 0; $i < 12; $i++) { ?>
                    <td id='kg_<?= $i ?>'><?= isset($monthly_kpi_kg[$i]->sasaran_bulan) ? $monthly_kpi_kg[$i]->sasaran_bulan : '0' ?></td>

                <?php } ?>

                <td id='total_kpi_kg'></td> 
                <td > 
                    
                </td>
            </tr>
        </tbody>
    <?php endif; ?>

    <?php if ($inventory_bt != 0): ?>
        <?php $month = 1 ?>
        <tbody>
            <tr>
                <td>BT</td>
                <td id="inventorybt"><?= $inventory_bt ?></td>

                <?php for ($i = 0; $i < 12; $i++) { ?>
                    <td id='bt_<?= $i ?>'><?= isset($monthly_kpi_bt[$i]->sasaran_bulan) ? $monthly_kpi_bt[$i]->sasaran_bulan : '0' ?></td>
                <?php } ?>
                <td id='total_kpi_bt'></td> 
                <td > 
                    
                </td>
            </tr>
            
        </tbody>
    <?php endif; ?>
</table>

<table class='table table-bordered'>
    <thead>
        <tr>
            <th>PYBDT</th>
            <th>Inventory</th>
            <th>January</th>
            <th>February</th>
            <th>March</th>
            <th>April</th>
            <th>May</th>
            <th>June</th>
            <th>July</th>
            <th>August</th>
            <th>September</th>
            <th>October</th>
            <th>November</th>
            <th>December</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($list_of_sic as $sic): ?>
        <?php
        $monthly_kpi = ${"monthly_kpi_$sic->SIC"};
        $inventory_sic = ${"inventory_$sic->SIC"};
      
        ?>

        <?php if ($inventory_sic != 0): ?>
            <?php $month = 1 ?>
            <tr>
                <td><?= $sic->SIC . ' : ' . $sic->KETERANGAN_SIC ?></td>
                <td id="inventory<?=$sic->SIC?>"><?= $inventory_sic ?></td>
                
                <?php for ($i = 0; $i < 12; $i++) { ?>
                    <td id='sic<?= $sic->SIC ?>_<?= $i ?>'><?= isset($monthly_kpi[$i]->sasaran_bulan) ? $monthly_kpi[$i]->sasaran_bulan : '0' ?></td>
                <?php } ?>
                    
                <td id='total_kpi_<?= $sic->SIC ?>'></td> 
                <td>
                </td>
            </tr>
          
        <?php endif; ?>
    <?php endforeach; ?>
             </tbody>
   

</table>
    
</div>

<script>
//    $(function() {
//        $('#sel1').change(function() {
//            if($('#sel2').val !== '00'){
//                $('#myform').submit();
//            }    
//        });
//    });
    
    $(function() {
        $('#sel2').change(function() {
            if($('#sel2').val !== '00'){
                $('#myform').submit();
            }
        });
    });

    $("input[type='number']").focus(function () {
        var input = this.name;
        var sic_no = input.substring(0, input.indexOf("_"));
        //alert(sic_no);
        $("span[id='lbl_" + sic_no + "']").show();

    });


//$("input[type='number']" ).blur(function(){
//    var input = this.name;
//    var sic_no = input.substring(0, input.indexOf("_"));
//    //alert(sic_no);
//    $("span[id='lbl_"+ sic_no  +"']" ).show();
//});

    function deleteConfirmation(sic, tahun) {
        if (!confirm("Are you sure to delete?")) {
            return false;
        } else
        {
            window.location = "<?= base_url() ?>kpi/delete_monthly/" + sic + "/" + tahun;
        }
    }

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
                total += parseInt($("[id='sic" + value.SIC + "_" + i + "'] > input").val());
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

            //console.log(total);

            var totalkks = 0;

            if (sic == 41) {
                for (i = 0; i < 12; i++) {
                    totalkks += parseInt($("[id='kks_" + i + "'] > input").val());
                }

            } else {
                for (i = 0; i < 12; i++) {
                    totalkks += parseInt($("[id='kks_" + i + "']").text());
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
                    totalkg += parseInt($("[id='kg_" + i + "']").text());
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
                    totalbt += parseInt($("[id='bt_" + i + "']").text());
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
        
        //KKS
        var totalkks = 0;
        for (i = 0; i < 12; i++) {
            totalkks += parseInt($("[id='kks_" + i + "']").text());
        }

        $("#total_kpi_kks").text(totalkks = totalkks || 0); //if NaN, change to zero
        //KG
        var totalkg = 0;
        for (i = 0; i < 12; i++) {
            totalkg += parseInt($("[id='kg_" + i + "']").text());
        }

        $("#total_kpi_kg").text(totalkg = totalkg || 0); //if NaN, change to zero
        //BT
        var totalbt = 0;
        for (i = 0; i < 12; i++) {
            totalbt += parseInt($("[id='bt_" + i + "']").text());
        }

        $("#total_kpi_bt").text(totalbt = totalbt || 0); //if NaN, change to zero

        //PYBDT
        $.each(words, function (key, value) {
            //console.log( key + ": " + value.SIC );
              
            var total = 0;
            for (i = 0; i < 12; i++) {
                total += parseInt($("[id='sic" + value.SIC + "_" + i + "']").text());
            }
            $("#total_kpi_" + value.SIC).text(total = total || 0);
            //console.log(total);
        });
        
        

    });
    
    function verify_submit(){
        var dont = 0;
        $.each(words, function (key, value) {
            var kpi = $("#total_kpi_" + value.SIC).text();
            var inv = $("[id='inventory" + value.SIC + "']").text();
            
            if(kpi > inv){
                alert('Exceeds on ' + value.KETERANGAN_SIC + ', adjustment required.');
                dont = 1;
            }
        });
        
        if(dont == 0){
            var r = confirm('Are you sure you want to submit this State KPI for Verification ?');
            
            if(r){
                window.location.href = "<?php echo base_url('kpi/verify/'); ?>";
                //alert('submit');
            } else{ 
                //alert('Cancel');
                return false;
            }    
        }
                
    }
    
    function setDraft(state_code){
            var r = confirm('Set to draft?');
            
            if(r){
                window.location.href = "<?php echo base_url('kpi/allow_edit/'); ?>" + state_code;
            } else{ 
                
                return false;
            } 
    }
</script>