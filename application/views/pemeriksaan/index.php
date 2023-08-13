
<div class="row">
<div class="col-md-10">
    <?= $paparan_emt?>
</div>
</div>

<!--HISTORY SECTION-->
<div class="row">
<div class="col-md-10">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">HISTORY</div>
  <div class="panel-body">
     
<table class="table table-hover">
    <thead>
        <td> No </td><td>EMT</td><td>Description</td><td>Date Affected</td>
        
    </thead>
    <?php $i = 1?>
    <?php foreach($transaksi as $key => $value):?>
    <tr>
        <td>
            #<?= $i++?>
        </td>
        <td>
            EMT <?= $value['emt_no']?> - <?= $value['emt_type'] ?>
        </td>
        <td>
             <?= $value['description']?>
        </td>
        <td>
             <?= $value['changedate']?>
        </td>
    </tr>
   
    <?php endforeach;?>
</table>
          
          
      
  </div>
</div>
</div>
</div>


<div class="row">
<div class="col-md-10">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">LAWATAN (Field Inspection)</div>
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
    </tr>
   
    <?php endforeach;?>
</table>
          
          
      <a href="<?=base_url() ?>lawatan/listing/<?=$idpremis?>" >Lawatan baru</a>
  </div>


</div>
</div></div>


<div class="row">
<div class="col-md-10">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">VERIFIKASI EMT</div>
  <div class="panel-body">
     
      <legend>Ulasan Pemeriksa | <a href="<?php echo base_url();?>/pemeriksaan/verifikasi/<?= $idpremis?>">Jawab Soalan Verifikasi</a></legend>

<!--<form method="post" action="<?=base_url() ?>pemeriksaan/hantar/">
    <div class="well">
        <div class="row">
           
            <div class="control-group">
                
                    <div class="controls">
                        <textarea id="textarea_editor"  style="width:100%" rows="10" placeholder="Enter text ..." name="comment"></textarea>
                    </div>
                
            </div>
            
        </div>
        <?= form_hidden('idpremis', $idpremis) ?>
        <div class="row">
            
            <label class="radio-inline"><input type="radio" name="ketetapan" value="approve">Approve</label>
            <label class="radio-inline"><input type="radio" name="ketetapan" value="reject">Reject</label>
            <label class="radio-inline"><input type="radio" name="ketetapan" value="revert">Revert</label>
        </div>
        <div class="row">
            <hr>
            <div class="col col-md-1"><input type="submit" value="Draft" class="btn btn-warning"></div>
            <div class="col col-md-1"><input type="submit" value="Submit" class="btn btn-primary"></div>
        </div>
    </div>
</form>-->
          
          
      
  </div>


</div>
</div></div>

