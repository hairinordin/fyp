<legend>Monthly KPI Report</legend>

<div class="well">
    <div style="overflow: hidden;">
<input type="hidden" id="negeri" value="<?= $this->state ?>" >
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label"> From Year :</label> 
            <select id="fromtahun" class='form-control'>
                <option value="2017">2017</option>
                <option value="2018" selected>2018</option>
            </select>

            <label class="control-label">From Month :</label> 
            <select id="frombulan" class='form-control'>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
    </div>


    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label"> To Year :</label> 
            <select id="totahun" class='form-control'>
                <option value="2017">2017</option>
                <option value="2018" selected>2018</option>
            </select>

            <label class="control-label">To Month :</label> 
            <select id="tobulan" class='form-control'>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label class="control-label">Type of Report : </label>

            <select id="report" class='form-control'>
                <option value="tools">Pencapaian EMT Bulanan Mengikut Tools</option>
                <option value="bm">Pencapaian Maklumbalas EMT</option>
            </select>
        </div>
    </div>
<div class="col-md-2">
 <div class="form-group">
     <button onclick="myFunction()" class="btn btn-default">Generate Monthly Report</button>
     <button onclick="myFunction2()" class="btn btn-default">Generate Monthly Report (baru)</button>
 </div>
</div>
    </div>
</div>

<p style="text-align: center">

</p>

<p style="text-align: center" id="demo"><?php if (isset($rpt_not_available)) { ?>Report for the year of <?= $target_year ?> is not ready. Please contact KPI officer. <?php } ?></p>
<p style="text-align: center" id="demo2"><?php if (isset($rpt_not_available)) { ?>Report for the year of <?= $target_year ?> is not ready. Please contact KPI officer. <?php } ?></p>
<script>
    //Check valid date range
    $("select").change(function(){
    var frombulan = document.getElementById("frombulan").value;
    var fromtahun = document.getElementById("fromtahun").value;
    
    var tobulan = document.getElementById("tobulan").value;
    var totahun = document.getElementById("totahun").value;
    
    var from = new Date(fromtahun, frombulan);
    var to = new Date(totahun, tobulan);
    
    //console.log('From ' + from );
    if(from > to){
       alert('Invalid range'); 
       $("select").prop('selectedIndex',0)
    } 
    
    });

    function myFunction() {
        var bulan = document.getElementById("frombulan").value;
        var tahun = document.getElementById("fromtahun").value;
        var negeri = document.getElementById("negeri").value;
        var report = document.getElementById("report").value;

        document.getElementById("demo").innerHTML = ''; // set blank
        document.getElementById("demo").innerHTML = '<h4><a href="<?= base_url() ?>kpi/view_monthly/' + bulan + '/' + tahun + '/' + negeri + '/' + report + '">View</a></h4>';
    }
    
     function myFunction2() {
        var frombulan = document.getElementById("frombulan").value;
        var fromtahun = document.getElementById("fromtahun").value;
        var tobulan = document.getElementById("tobulan").value;
        var totahun = document.getElementById("totahun").value;
        
        var negeri = document.getElementById("negeri").value;
        var report = document.getElementById("report").value;

        document.getElementById("demo2").innerHTML = ''; // set blank
        document.getElementById("demo2").innerHTML = '<h4><a href="<?= base_url() ?>kpi/view_monthly/' + frombulan + '/' + fromtahun + '/' + tobulan + '/' + totahun +'/' + negeri + '/' + report + '">View</a></h4>';
    }
</script>