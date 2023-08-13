<legend>Ulasan Penyelia</legend>

    <div class="well">
        <?php foreach ($ulasan as $key => $premise): ?>
        <div class="row">
            Tarikh Ketetapan : <?= $premise['created_on'] ?>
        </div>
        <div class="row">
          
            Ketetapan : <?= $premise['ketetapan_penyelia'] ?>
            
        </div>
        
        <div class="row">
            
            Ulasan Penyelia : <?= $premise['ulasan_penyelia'] ?>
        </div>
        
        
    </div><?php endforeach; ?>