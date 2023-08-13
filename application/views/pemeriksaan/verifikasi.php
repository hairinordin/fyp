<legend>Jawapan Pemeriksaan</legend>

<form action="<?=base_url() ?>pemeriksaan/hantar/<?= $idpremis?>" method="POST">
<?php foreach($tajuk_modul as $key => $modul): ?>
<br><b><?= $modul->keterangan ?></b><br><!-- Tool title-->

<?php foreach($set_soalan as $key => $soalan): 
    
    if($soalan->keterangan == $modul->keterangan){
    ?>
<div class="xbox">
    
    <div class="panel panel-default">
    <div class="panel-body"><?=$soalan->soalan ?>
     <br>
    <input type="hidden" value ="soalan"<?=$soalan->id?> >
    <?php 
        foreach($pilihan_jawapan as $key => $jawapan){
            if($soalan->id == $jawapan->id_soalan){
                
                switch($soalan->jenis_jawapan):
                    case 'rb':
                        echo "<input type='radio' name='$soalan->id[radio]' value=$jawapan->id> $jawapan->jawapan <br>";
                        break;
                    
                    case 'cb':
                        echo "<input type='checkbox' name='$soalan->id[checkbox][]' value=$jawapan->id>$jawapan->jawapan <br>";
                        break;
                    
                    case 'txt':
                        echo "<input type='text' name='$soalan->id[text]'> <br>";
                        break;
                endswitch;

             }
        
           }
        ?> <!-- ganti switch case without break -->

    <br>

    <?php if($soalan->ada_catatan == 'Y'){ ?>
    Nota <br>
    <textarea name="<?=$soalan->id ?>[catatan]"></textarea>
    <?php }?>
</div></div>
  </div>

<?php }?>
<?php endforeach; ?>
<?php endforeach; ?>

<input type="submit" value="Hantar "  />
</form>
