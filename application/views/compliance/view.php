<?php 
        $pub_cb =FALSE;
        $eff_cb =FALSE;
        $bt_cb =FALSE;
        $sewage_cb = FALSE;
        $kks_cb = FALSE;
        
        $car_disabled = '';
        $car_comply_checked = '';
        $car_notcomply_checked = '';
        $eff_disabled = '';
        $eff_comply_checked = '';
        $eff_notcomply_checked = '';
        $sewage_disabled = '';
        $sewage_comply_checked = '';
        $sewage_notcomply_checked = '';
        $bt_disabled = '';
        $bt_comply_checked = '';
        $bt_notcomply_checked = '';
        $kks_disabled = '';
        $kks_comply_checked = '';
        $kks_notcomply_checked = '';
        
        
        if($premise_info->tertakluk_pub == 'T' && $premise_info->pub == 'Y'){
            $pub_cb = TRUE;
            
            if(isset($rules->car_compliance) && $rules->car_compliance == 'Complied'){
                $car_disabled = 'disabled';
                $car_comply_checked = 'checked';
            } elseif(isset($rules->car_compliance) && $rules->car_compliance == 'Not complied'){
                $car_disabled = 'disabled';
                $car_notcomply_checked = 'checked'; 
            } else{
                $car_disabled = 'disabled';
            }
        }
        
        if($premise_info->tertakluk_eff == 'T' && $premise_info->effluent == 'Y'){
            $eff_cb = TRUE;
            
            if(isset($rules->eff_compliance) && $rules->eff_compliance == 'Complied'){
                $eff_disabled = 'disabled';
                $eff_comply_checked = 'checked';
            } elseif(isset($rules->eff_compliance) && $rules->eff_compliance == 'Not complied'){
                $eff_disabled = 'disabled';
                $eff_notcomply_checked = 'checked';
            } else{
                $eff_disabled = 'disabled';
            }
        }
        
        if($premise_info->sewage == 'Y' && $premise_info->tertakluk_kum == 'T'){
            $sewage_cb = TRUE;
            
            if(isset($rules->sewage_compliance) && $rules->sewage_compliance == 'Complied'){
                $sewage_disabled = 'disabled';
                $sewage_comply_checked = 'checked';
            } elseif(isset($rules->sewage_compliance) && $rules->sewage_compliance == 'Not complied'){
                $sewage_disabled = 'disabled';
                $sewage_notcomply_checked = 'checked';
            } else {
                $sewage_disabled = 'disabled';
            }
        }
        
        if($premise_info->bt == 'Y'){
            $bt_cb = TRUE;
            
            if(isset($rules->sw_compliance) && $rules->sw_compliance == 'Complied'){
                $bt_disabled = 'disabled';
                $bt_comply_checked = 'checked';
            } elseif(isset($rules->sw_compliance) && $rules->sw_compliance == 'Not complied'){
                $bt_disabled = 'disabled';
                $bt_notcomply_checked = 'checked';
            } else{
                $bt_disabled = 'disabled'; 
            }
        }
        
        if($premise_info->kks == 'Y'){
            $kks_cb = TRUE;
            
            if(isset($rules->pom_compliance) && $rules->pom_compliance == 'Complied'){
                $kks_disabled = 'disabled';
                $kks_comply_checked = 'checked';
            } elseif(isset($rules->pom_compliance) && $rules->pom_compliance == 'Not complied'){
                $kks_disabled = 'disabled';
                $kks_notcomply_checked = 'checked';
            }else {
                $kks_disabled = 'disabled';
                
            }
        }
    
//        echo 'eff' . $eff_cb . '\n';
//        echo 'sewage' . $sewage_cb . '\n';
//        echo 'kks' . $kks_cb . '\n';
//        echo 'bt' . $bt_cb . '\n';
//        echo 'pub' . $pub_cb . '\n';
        
?>

<?php if($eff_cb == TRUE || $sewage_cb == TRUE || $kks_cb == TRUE || $bt_cb == TRUE || $pub_cb == TRUE ) { ?>
<div class="container text-center" >
<legend>Compliance</legend>

<form method="post" action="<?=base_url() ?>rules/submit/<?=$premise_info->idpremis?>">
    <div class="well">
        <div class="row">
          
            <table class="table table-striped">
                 <?php if($eff_cb): ?>
                <tr>
                    
                    <td>
                        Environmental Quality (Industrial Effluent) 2009
                    </td>
                </tr>
                
                <tr>
                   
                    <td>
                        <label class="radio-inline"><input class="status-option" type="radio" name="EFF_compliance" value="Complied" <?= $eff_disabled . ' ' . $eff_comply_checked?>>Complied</label>
                        <label class="radio-inline"><input class="status-option" type="radio" name="EFF_compliance" value="Not complied" <?= $eff_disabled . ' ' . $eff_notcomply_checked?>>Not complied</label>
                    </td>
                </tr>
                <?php endif; ?>
                 <?php if( $sewage_cb): ?>
                <tr>
                  
                    <td>
                       Environmental Quality (Sewage) 2009                     
                    </td>
                </tr>
                
                <tr>
                   
                    <td>
                        <label class="radio-inline"><input class="status-option" type="radio" name="SEWAGE_compliance" value="Complied" <?= $sewage_disabled . ' ' . $sewage_comply_checked?>>Complied</label>
                        <label class="radio-inline"><input class="status-option" type="radio" name="SEWAGE_compliance" value="Not complied" <?= $sewage_disabled . ' ' . $sewage_notcomply_checked?>>Not complied</label>
                    </td>
                </tr>
                <?php endif; ?>
                 <?php if($kks_cb): ?>
                <tr>
                    
                    <td>
                        Environmental Quality (Prescribe Premise)(Crude Palm Oil) 1977
                    </td>
                </tr>
                
                <tr>
                   
                    <td>
                        <label class="radio-inline"><input class="status-option" type="radio" name="POM_compliance" value="Complied" <?= $kks_disabled . ' ' . $kks_comply_checked?>>Complied</label>
                        <label class="radio-inline"><input class="status-option" type="radio" name="POM_compliance" value="Not complied" <?= $kks_disabled . ' ' . $kks_notcomply_checked?>>Not complied</label>
                    </td>
                </tr>
                <?php endif; ?>
                 <?php if($bt_cb): ?>
                <tr>
                   
                    <td>
                        Environmental Quality (Schedule Waste) 2005
                    </td>
                </tr>
                
                <tr>
                   
                    <td>
                        <label class="radio-inline"><input class="status-option" type="radio" name="SW_compliance" value="Complied" <?= $bt_disabled . ' ' . $bt_comply_checked?>>Complied</label>
                        <label class="radio-inline"><input class="status-option" type="radio" name="SW_compliance" value="Not complied" <?= $bt_disabled . ' ' . $bt_notcomply_checked?>>Not complied</label>
                    </td>
                </tr>
                <?php endif; ?>
                 <?php if($pub_cb): ?>
                
                <tr>
                   
                    <td>
                        Environmental Quality (Clean Air) 2014
                    </td>
                </tr>
                
                <tr>
                   
                    <td>
                        <label class="radio-inline"><input class="status-option" type="radio" name="CAR_compliance" value="Complied" <?= $car_disabled . ' ' . $car_comply_checked?>>Complied</label>
                        <label class="radio-inline"><input class="status-option" type="radio" name="CAR_compliance" value="Not complied" <?= $car_disabled . ' ' . $car_notcomply_checked?>>Not complied</label>
                    </td>
                </tr>
                <?php endif; ?>
                 
                
                
                
            </table>
            
        </div>
 
        
        
        <div class="row">

<!--            <div class="col col-md-3 pull-right"><input type="submit" value="Submit" class="btn btn-primary"></div>-->
        </div>
    </div>
</form>
</div>
<?php } else { ?>
<!-- Not applicable to premise (sebab semua rules tak apply)-->
<?php } ?>
<script>
 $(document).ready(function() {  
    //OPTION BOX STYLE
  $( function() {
    $( ".status-option" ).checkboxradio({
      icon: false
    });
  } );
    });
    
 </script>