<?php $attributes = array('id'=> 'update_kpi_form', 'class'=> 'form_horizontal'); ?>
<?php echo validation_errors("<p class='bg-danger'>"); ?>
<legend><?= $sic_name ?> KPI for <?= $off_name?></legend>

    
    <div class="col-md-12">
        <?php echo form_open('kpi/save_monthly/', $attributes); ?>
        <input type="hidden" name="sic" value="<?= $sic?>"> 
        <input type="hidden" name="off_id" value="<?= $off_id?>">
        <?php if(!empty($kpi)) { ?>
        
        <?php foreach ($kpi as $k): ?>
        
            <div class="form-group">
                <div class="col-xs-1">
                <?php
                
                    switch($k->bulan):
                        case 1:
                            echo form_label('Januari');
                            break;
                        case 2:
                            echo form_label('Februari');
                            break;
                        case 3:
                            echo form_label('Mac');
                            break;
                        case 4:
                            echo form_label('April');
                            break;
                        case 5:
                            echo form_label('Mei');
                            break;
                        case 6:
                            echo form_label('Jun');
                            break;
                        case 7:
                            echo form_label('Julai');
                            break;
                        case 8:
                            echo form_label('Ogos');
                            break;
                        case 9:
                            echo form_label('September');
                            break;
                        case 10:
                            echo form_label('Oktober');
                            break;
                        case 11:
                            echo form_label('November');
                            break;
                        case 12:
                            echo form_label('Disember');
                            break;
                                               
                    endswitch;
                
                    //echo form_label($k->bulan);
                    $data = array(
                                    'class' => 'form-control',
                                    'name' => $k->bulan.'[value]' ,
                                    'value' =>$k->sasaran_bulan,
                                    'type' => 'number',
                                    'min' => 0,
                                    'required' => 'required'
                                 );
                    echo form_input($data);
                ?>
                    <input type="hidden" name="<?=$k->bulan?>[upd_id]" value="<?=$k->id?>"> 
                    <input type="hidden" name="<?=$k->bulan?>[bulan]" value="<?=$k->bulan?>">
                    
                </div>
            </div>
            <?php //print_r($k); ?>
        <?php endforeach; ?>
        
        <?php } else { 
            for($i = 1; $i <= 12; $i++) {
            ?>
        <div class="form-group">
                <div class="col-xs-1">
                    <?php
                
                    switch($i):
                        case 1:
                            echo form_label('Januari');
                            break;
                        case 2:
                            echo form_label('Februari');
                            break;
                        case 3:
                            echo form_label('Mac');
                            break;
                        case 4:
                            echo form_label('April');
                            break;
                        case 5:
                            echo form_label('Mei');
                            break;
                        case 6:
                            echo form_label('Jun');
                            break;
                        case 7:
                            echo form_label('Julai');
                            break;
                        case 8:
                            echo form_label('Ogos');
                            break;
                        case 9:
                            echo form_label('September');
                            break;
                        case 10:
                            echo form_label('Oktober');
                            break;
                        case 11:
                            echo form_label('November');
                            break;
                        case 12:
                            echo form_label('Disember');
                            break;
                                               
                    endswitch; ?>
        <input type="number" class="form-control" name='<?= $i ?>[value]' value="0" min='0' required="required">
        <input type="hidden" name="<?=$i?>[bulan]" value="<?=$i?>">
        </div>
            </div>
            <?php } } ?>
        
        &nbsp;
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <input type="submit" class="btn btn-primary" value="Update">&nbsp;
                <a href="<?= base_url('kpi/monthly_kpi')?>" class="btn btn-warning" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back to List</a>
            </div>
        </div>
<?php echo form_close(); ?>
    
    </div>
