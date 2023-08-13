<div class="row">
<button type="button" onclick='window.history.back();' class="btn btn-default btn-lg"  style="font-size : 13px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to list</button> 
<br>
</div>
<div class="row">
<div class="col-md-10">
     
<legend>Field Inspection</legend>

<form method="post" action="<?=base_url() ?>fieldinspection/hantar/">
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
            <div class="form-group" style="width: 50%">
	<?php
	
	echo form_label('Date');
	$data = array(
			'class' => 'form-control',
			'name' => 'tarikh_lawatan',
			'type' => 'date',
                        'required' => 'required'
		);
	echo form_input($data);
	?>
   
</div>
        </div>
        
        <div class="row">
            <hr>         
            <div class="col col-md-1"><input type="submit" value="Submit" class="btn btn-primary"></div>
        </div>
    </div>
</form>
          
          
      
  </div>
</div>
