<style>
    #company_info {
    padding: 50px;
    display: none;
}
</style>

<div class="row">
    <a href="<?= base_url('answers')?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to dashboard</a>
<br>
</div>

<div class="row">
    <div id="company_info">
    <div class="col-md-6">
        <?= $paparan_maklumat_syarikat?>
    </div>
    </div>
    
</div>
<div class="row">
   <div class="col-md-4"></div>
<div class="col-md-4"> 
    <button id="btn-comp-info" class="btn btn-info btn-lg">Show/Hide company info</button><br><br>
</div>
<div class="row">
    <div class="col-md-12">
        <h3 style="text-align: center"><small>Completed Date </small> <?= date("d M Y", strtotime($answers2->submission_date))?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;<small>Submission Type </small> <?= $answers2->emt_type?></h3>
        
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <?= $paparan_jawapan?>
    </div>
</div>

<!--<div class="row">
<div class="col-md-12">
    <legend>Audit Trails</legend>
         Default panel contents 

           
            <table class="table table-condensed">
                <thead>
                <th>No</th>
                <th>Action</th>
                <th>Date/Time</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Submitted tool</td>
                        <td>2018-02-11 21:20</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tool is being review</td>
                        <td>2018-02-12 08:20</td>
                    </tr>
                </tbody>
            </table>
   

    </div></div>-->
<script>
$(document).ready(function(){
    $("#btn-comp-info").click(function(){
        $("#company_info").slideToggle(1000);

    });
});

</script>