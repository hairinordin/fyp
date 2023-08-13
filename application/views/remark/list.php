<div class="row">
<div class="col-md-10">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">LAWATAN (FIELD INSPECTION)</div>
  <div class="panel-body">
      <table class="table table-hover">
    <thead>
        <td> No </td><td>Keterangan Lawatan</td><td>Tarikh Lawatan</td>
        
    </thead>
    <?php $i = 1?>
    <?php foreach($lawatan as $key => $value):?>
    <tr>
        <td>
            #<?= $i++?>
        </td>
        <td>
             <?= $value['keterangan']?>
        </td>
        <td>
             <?= $value['tarikh_lawatan']?>
        </td>
        <td>
            <a href="<?=base_url() ?>lawatan/delete_lawatan/<?= $idpremis . '/' . $value['id']?>" >Padam</a>
        </td>
    </tr>
   
    <?php endforeach;?>
</table>
          
          
      <a href="<?=base_url() ?>lawatan/form/<?=$idpremis?>" >Lawatan baru</a>
      
      </div>


</div>
</div></div>