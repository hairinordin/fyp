<legend>Report Summary</legend>
<input type="hidden" id="negeri" value="<?= $this->state ?>" >
<div class="well well-sm">

    <div class="form-inline">
        <div class="form-group">
            <div class="col-md-10"><label>Year :</label><?= form_dropdown('year', $this->ref->data('year'), '', "class='form-control' id='year'") ?> </div>
        </div>


        <div class="form-group">
            <div class="col-md-10"><label>State :</label><?= form_dropdown('state', $this->ref->data('state'), '', "class='form-control' id='state'") ?> </div>
        </div>
        
        <div class="form-group">
        <button class="btn btn-primary" onclick="myFunction()">Generate Report</button>
        </div>
    </div>
</div>

<?php if (isset($rpt_not_available)) { ?>
    <p style="text-align: center">
        Please contact KPI officer
    </p>
<?php } ?>
<p style="text-align: center" id="demo"></p>

<script>

    function myFunction() {
        var year = document.getElementById("year").value;
        var state = document.getElementById("state").value;

        document.getElementById("demo").innerHTML = '<h4><a href="<?= base_url() ?>kpi/summaryByState/' + year + '/' + state + '">View</a></h4>';
    }

</script>