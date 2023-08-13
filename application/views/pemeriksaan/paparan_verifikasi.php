<legend>Jawapan Pemeriksaan</legend>

<?php foreach($tajuk_modul as $key => $modul): ?>
<br><b><?= $modul->keterangan ?></b><br><!-- Tool title-->

<?php foreach($set_soalan as $key => $soalan): 
    
    if($soalan->keterangan == $modul->keterangan){
    ?>
<div class="xbox">
    
    <div class="panel panel-default">
    <div class="panel-body"><?=$soalan->soalan ?>
     <br>
    
    <?php 
        //print_r($jawapan);
       foreach($jawapan as $key => $val){
           
           
            if($soalan->id == $val->id_soalan){
                //echo '<pre>';
                //print_r($val);
                // echo '</pre>';

                    echo '<br>Jawapan : ' . $val->jawapan;
                    
                    //if($val->id_jawapan == 'NULL'){ ***BUGGGGGGG...SADASD //Database structure for ulasan field 
                        //echo '<br>Catatan : ' . $val->jawapan_ulasan;
                   // }
                    
                
             }
        
           }
        ?> <!-- ganti switch case without break -->

    <br>

    
</div></div>
  </div>

<?php }?>
<?php endforeach; ?>
<?php endforeach; ?>
