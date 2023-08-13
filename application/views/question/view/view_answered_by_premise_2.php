

<div class="row">
    <div class="col-md-12">
        <h3 style="text-align: center">
            <small>Submission Date </small> <?= date("d M Y", strtotime($answers2->submission_date))?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
            <small>Submission Type </small> <?= $answers2->emt_type?> 
        </h3>
        
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <?= $paparan_jawapan?>
    </div>
</div>

<script>
$(document).ready(function(){
    $("#btn-comp-info").click(function(){
        $("#company_info").slideToggle(1000);

    });
});

</script>