<div class="row">
<div class="col-md-10">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"></div>
  <div class="panel-body">
     
<legend>Remark</legend>

<form method="post" action="<?=base_url() ?>remark/submit/">
    <div class="well">
        <div class="row">
           
            <div class="control-group">
                
                    <div class="controls">
                        <textarea id="textarea_editor"  style="width:100%" rows="10" placeholder="Enter text ..." name="comment"></textarea>
                    </div>
                
            </div>
            
        </div>
        <?=  '';//form_hidden('idpremis', $idpremis) ?>
        
        
        <div class="row">
            <hr>
            <div class="col col-md-1"><input type="submit" value="Draft" class="btn btn-warning"></div>
            <div class="col col-md-1"><input type="submit" value="Submit" class="btn btn-primary"></div>
        </div>
    </div>
</form>
          
          
      
  </div>


</div>
</div></div>