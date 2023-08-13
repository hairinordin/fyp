<?php 
        $pub_cb =FALSE;
        $eff_cb =FALSE;
        $bt_cb =FALSE;
        $sewage_cb = FALSE;
        $kks_cb = FALSE;
        
        if($premise_info->tertakluk_pub == 'T' && $premise_info->pub == 'Y'){
            $pub_cb = TRUE;
        }
        
        if($premise_info->tertakluk_eff == 'T' && $premise_info->effluent == 'Y'){
            $eff_cb = TRUE;
        }
        
        if($premise_info->sewage == 'Y' && $premise_info->tertakluk_kum == 'T'){
            $sewage_cb = TRUE;
        }
        
        if($premise_info->bt == 'Y'){
            $bt_cb = TRUE;
        }
        
        if($premise_info->kks == 'Y'){
            $kks_cb = TRUE;
        }
    
//        echo 'eff' . $eff_cb . '\n';
//        echo 'sewage' . $sewage_cb . '\n';
//        echo 'kks' . $kks_cb . '\n';
//        echo 'bt' . $bt_cb . '\n';
//        echo 'pub' . $pub_cb . '\n';
?>
<?php if($eff_cb == TRUE || $sewage_cb == TRUE || $kks_cb == TRUE || $bt_cb == TRUE || $pub_cb == TRUE ) { ?>
<div class="container text-center" >
    <div class="col-md-6">
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
                        
                    </td>
                    <td>
                        <label class="radio-inline"><input class="status-option" type="radio" name="EFF_compliance" value="Complied">Complied</label>
                        <label class="radio-inline"><input class="status-option" type="radio" name="EFF_compliance" value="Not complied">Not complied</label>
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
                        
                    </td>
                    <td>
                        <label class="radio-inline"><input class="status-option" type="radio" name="SEWAGE_compliance" value="Complied">Complied</label>
                        <label class="radio-inline"><input class="status-option" type="radio" name="SEWAGE_compliance" value="Not complied">Not complied</label>
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
                        <label class="radio-inline"><input class="status-option" type="radio" name="POM_compliance" value="Complied">Complied</label>
                        <label class="radio-inline"><input class="status-option" type="radio" name="POM_compliance" value="Not complied">Not complied</label>
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
                        <label class="radio-inline"><input class="status-option" type="radio" name="SW_compliance" value="Complied">Complied</label>
                        <label class="radio-inline"><input class="status-option" type="radio" name="SW_compliance" value="Not complied">Not complied</label>
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
                        <label class="radio-inline"><input class="status-option" type="radio" name="CAR_compliance" value="Complied">Complied</label>
                        <label class="radio-inline"><input class="status-option" type="radio" name="CAR_compliance" value="Not complied">Not complied</label>
                    </td>
                </tr>
                <?php endif; ?>
                 
                
                
                
            </table>
            
        </div>
 
        
        
        <div class="row">

            <div class="col col-md-3 pull-right"><input type="submit" value="Submit" class="btn btn-primary"></div>
        </div>
    </div>
</form>
</div>
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