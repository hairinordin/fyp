
<legend>New KPI</legend>

    
    <div class="col-md-8">
    <div class="">
        <form method="post" action="<?php echo base_url() ?>kpi/sasaranbaru">
        <input type="hidden" name="id" value="<?= $row->id ?>">
        
        <div class="row">
            <div class="col-md-2">Bulan</div> 
            <div class="col-md-4"><?= form_dropdown('month', $this->ref->data('month'), $month, "class='form-control'") ?> </div>
            
            <div class="col-md-2">Tahun</div> 
            <div class="col-md-4"><?= form_dropdown('year', $this->ref->data('year'), $year, "class='form-control'") ?> </div>  
       
        </div>
        <br>
        <div class="row"> 
            <div class="col-md-6"><p><strong>Jumlah keseluruhan Sasaran Premis (SP)</strong></p></div>
            <div class="col-md-4"><input type="text" class="form-control" name="jum_sasar_premis" value ='<?= $row->jum_sasar_premis ?>'></div>
        </div>
        <br>
        
        <div class="row"> 
            <div class="col-md-6"><p><strong>Jumlah Sasaran Premis Desktop</strong></p></div>
            <div class="col-md-4"><input type="text" class="form-control" name="jum_sasar_desktop" value ='<?= $row->jum_sasar_desktop ?>'></div>
        </div>
        
        <br>
        <div class="row"> 
            <div class="col-md-6"><p><strong>Jumlah Pemeriksaan Desktop</strong></p></div>
            <div class="col-md-4"><input type="text" class="form-control" name="jum_desktop" value ='<?= $row->jum_desktop ?>'></div>
        </div> 
        <br>
        <div class="row"> 
            <div class="col-md-6"><p><strong>Jumlah Sasaran Premis Lawatan</strong></p></div>
            <div class="col-md-4"><input type="text" class="form-control" name="jum_sasar_lawatan" value ='<?= $row->jum_sasar_lawatan ?>'></div>
        </div>
        <br>
        <div class="row"> 
            <div class="col-md-6"><p><strong>Jumlah Pemeriksaan Lawatan</strong></p></div>
            <div class="col-md-4"><input type="text" class="form-control" name="jum_lawatan" value ='<?= $row->jum_lawatan ?>'></div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><input type="submit" class="btn btn-primary" value="Save">&nbsp;<input type='button' class="btn btn-warning" onclick="window.history.back()" value="Go back"></div>
        </div>
</form>
    </div>
    </div>
