<style>
    #company_info {
    padding: 50px;
    display: none;
}
</style>

<div class="row">
    <div id="company_info">
    <div class="col-md-12">
        <?= $paparan_maklumat_syarikat?>
    </div>
    </div>
    
</div>
<div class="row">
<div class="col-md-12 text-center"> 
    <button id="btn-comp-info" class="btn btn-info btn-lg">Show/Hide company info</button><br><br>
</div>
</div>
<div class="row">
    <div class="btn-group btn-group-justified">
   
        <a class="btn btn-info btn-lg" href="<?= base_url() . 'answers/answers_by_premise/' . $idpremis . '/1' ?>" onclick="emt1Toggle()"  > Tool 1</a>
 
  
        <a class="btn btn-info btn-lg"  href="<?= base_url() . 'answers/answers_by_premise/' . $idpremis . '/2' ?>" onclick="emt1Toggle()"  > Tool 2</a>
 

        <a class="btn btn-info btn-lg"  href="<?= base_url() . 'answers/answers_by_premise/' . $idpremis . '/3' ?>" onclick="emt1Toggle()"  > Tool 3</a>

        <a class="btn btn-info btn-lg"  href="<?= base_url() . 'answers/answers_by_premise/' . $idpremis . '/4' ?>" onclick="emt1Toggle()"  > Tool 4</a>


        <a class="btn btn-info btn-lg"  href="<?= base_url() . 'answers/answers_by_premise/' . $idpremis . '/5' ?>" onclick="emt1Toggle()"  > Tool 5</a>

        <a class="btn btn-info btn-lg"  href="<?= base_url() . 'answers/answers_by_premise/' . $idpremis . '/6' ?>" onclick="emt1Toggle()"  > Tool 6</a>

          <a class="btn btn-info btn-lg"  href="<?= base_url() . 'answers/answers_by_premise/' . $idpremis . '/7' ?>" onclick="emt1Toggle()"  > Tool 7</a> 
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $paparan_jawapan?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $paparan_pematuhan?>
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