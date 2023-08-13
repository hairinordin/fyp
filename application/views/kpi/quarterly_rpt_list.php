<legend>Quarterly KPI Report</legend>
<input type="hidden" id="negeri" value="<?= $this->state?>" >
<div class="well">
    
<div class="col-md-2">
Year : 
<select id="tahun">
    <option value="2017">2017</option>
    <option value="2018" selected>2018</option>
</select>
</div>


<div class="col-md-2">
Quarter :
<select id="quarter">
    <option value="1">Quarter 1</option>
    <option value="2">Quarter 2</option>
    <option value="3">Quarter 3</option>
    <option value="4">Quarter 4</option>
</select>
</div>

<button onclick="myFunction()">Generate Quarterly Report</button>

</div>

<p style="text-align: center">
    
</p>

<p style="text-align: center" id="demo"><?php if(isset($rpt_not_available)){ ?>Report for the selected quarter for the year of <?= $target_year?> is not ready. Please contact KPI officer. <?php } ?></p>

<script>

    function myFunction() {
    var quarter = document.getElementById("quarter").value;
    var tahun = document.getElementById("tahun").value;
    var negeri = document.getElementById("negeri").value;   
    
//    $.get("<?= base_url('kpi/get_month')?>", function(data, status){
//            alert("Data: " + data + "\nStatus: " + status);
//        });
        document.getElementById("demo").innerHTML = ''; // set blank
        document.getElementById("demo").innerHTML = '<h4><a href="<?=base_url()?>kpi/view_quarterly/'+ quarter +'/' + tahun  + '/' + negeri +'">View</a></h4>';
    }

</script>