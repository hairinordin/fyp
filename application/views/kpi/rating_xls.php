<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=monthly_rating_rpt.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3>SCORE RATING REPORT BY DOE (<?= $target_state?>) FOR <strong><?= strtoupper($target_month) . ' ' . $target_year ?></strong></h3>
    
<table class="table table-bordered table-striped">
    <thead>
        <tr class="bg-info">
            <td>PYDT</td>
            <td>Inventory</td>
            <td>Total Submission</td>
            <td>Poor </td>
            <td>Fair </td>
            <td>Average </td> 
            <td>Good</td>
            <td>Excellent</td>
        </tr>
</thead>

<tbody>
    <tr>
        <td>KKS</td>
        <td><?= $inventory_kks?></td>
        <td><?= sizeof($emt_by_sic['41'])?></td>
        <td>
            <?php 
                $numbers_of_rating_poor = 0;
                
                if(sizeof($emt_by_sic['41']) > 0){
                  foreach($emt_by_sic['41'] as $emt){
                    
                        if($emt->scoreDOE == 'Poor'){
                            $numbers_of_rating_poor++;
                        }     
                    }  
                }
                
                
                echo $numbers_of_rating_poor;
            ?>     
        </td>
        <td>
            <?php 
                $numbers_of_rating_fair = 0;
                
                if(sizeof($emt_by_sic['41']) > 0){
                    foreach($emt_by_sic['41'] as $emt){

                        if($emt->scoreDOE == 'Fair'){
                            $numbers_of_rating_fair++;
                        }     
                    }
                }
                
                echo $numbers_of_rating_fair;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_average = 0;
                
                if(sizeof($emt_by_sic['41']) > 0){
                    foreach($emt_by_sic['41'] as $emt){

                        if($emt->scoreDOE == 'Average'){
                            $numbers_of_rating_average++;
                        }     
                    }
                }
                
                echo $numbers_of_rating_average;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_good = 0;
                
                if(sizeof($emt_by_sic['41']) > 0){
                    foreach($emt_by_sic['41'] as $emt){

                        if($emt->scoreDOE == 'Good'){
                            $numbers_of_rating_good++;
                        }     
                    }
                }
                
                echo $numbers_of_rating_good;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_excellent = 0;
                
                if(sizeof($emt_by_sic['41']) > 0){
                    foreach($emt_by_sic['41'] as $emt){

                        if($emt->scoreDOE == 'Excellent'){
                            $numbers_of_rating_excellent++;
                        }     
                    }
                }
                
                echo $numbers_of_rating_excellent;
            ?>
        </td>
    </tr>
    
    <tr>
        <td>KG</td>
        <td><?= $inventory_kg?></td>
        <td><?= sizeof($emt_by_sic['40'])?></td>
        <td>
            <?php 
                $numbers_of_rating_poor = 0;
                
                if(sizeof($emt_by_sic['40'])){
                foreach($emt_by_sic['40'] as $emt){
                    
                    if($emt->scoreDOE == 'Poor'){
                        $numbers_of_rating_poor++;
                    }     
                }
                }
                
                echo $numbers_of_rating_poor;
            ?>     
        </td>
        <td>
            <?php 
                $numbers_of_rating_fair = 0;
                
                if(sizeof($emt_by_sic['40'])){
                foreach($emt_by_sic['40'] as $emt){
                    
                    if($emt->scoreDOE == 'Fair'){
                        $numbers_of_rating_fair++;
                    }     
                }
                }
                echo $numbers_of_rating_fair;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_average = 0;
                
                if(sizeof($emt_by_sic['40'])){
                foreach($emt_by_sic['40'] as $emt){
                    
                    if($emt->scoreDOE == 'Average'){
                        $numbers_of_rating_average++;
                    }     
                }
                }
                echo $numbers_of_rating_average;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_good = 0;
                
                if(sizeof($emt_by_sic['40'])){
                foreach($emt_by_sic['40'] as $emt){
                    
                    if($emt->scoreDOE == 'Good'){
                        $numbers_of_rating_good++;
                    }     
                }
                }
                
                echo $numbers_of_rating_good;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_excellent = 0;
                
                if(sizeof($emt_by_sic['40'])){
                foreach($emt_by_sic['40'] as $emt){
                    
                    if($emt->scoreDOE == 'Excellent'){
                        $numbers_of_rating_excellent++;
                    }     
                }
                }
                
                echo $numbers_of_rating_excellent;
            ?>
        </td>
    </tr>
    
    <tr>
        <td>BT</td>
        <td><?= $inventory_bt?></td>
        <td><?= sizeof($emt_by_sic['42'])?></td>
        <td>
            <?php 
                $numbers_of_rating_poor = 0;
                
                if(sizeof($emt_by_sic['42'])){
                foreach($emt_by_sic['42'] as $emt){
                    
                    if($emt->scoreDOE == 'Poor'){
                        $numbers_of_rating_poor++;
                    }     
                }
                }
                
                echo $numbers_of_rating_poor;
            ?>     
        </td>
        <td>
            <?php 
                $numbers_of_rating_fair = 0;
                
                if(sizeof($emt_by_sic['42'])){
                foreach($emt_by_sic['42'] as $emt){
                    
                    if($emt->scoreDOE == 'Fair'){
                        $numbers_of_rating_fair++;
                    }     
                }
                }
                
                echo $numbers_of_rating_fair;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_average = 0;
                
                if(sizeof($emt_by_sic['42'])){
                foreach($emt_by_sic['42'] as $emt){
                    
                    if($emt->scoreDOE == 'Average'){
                        $numbers_of_rating_average++;
                    }     
                }
                }
                
                echo $numbers_of_rating_average;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_good = 0;
                
                if(sizeof($emt_by_sic['42'])){
                foreach($emt_by_sic['42'] as $emt){
                    
                    if($emt->scoreDOE == 'Good'){
                        $numbers_of_rating_good++;
                    }     
                }
                }
                
                echo $numbers_of_rating_good;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_excellent = 0;
                
                if(sizeof($emt_by_sic['42'])){
                foreach($emt_by_sic['42'] as $emt){
                    
                    if($emt->scoreDOE == 'Excellent'){
                        $numbers_of_rating_excellent++;
                    }     
                }
                }
                echo $numbers_of_rating_excellent;
            ?>
        </td>
    </tr>
</tbody>
    
</table>

<table class='table table-bordered table-striped'>
       <thead>
        <tr class="bg-info">
            <td>PYBDT</td>
            <td>Inventory</td>
            <td>Total Submission</td>
            <td>Poor </td>
            <td>Fair </td>
            <td>Average </td> 
            <td>Good</td>
            <td>Excellent</td>
        </tr>
</thead>
<tbody>
    <?php foreach ($list_of_sic as $sic): ?>
        <?php
          $inventory_sic = ${"inventory_$sic->SIC"};
        ?>

        <?php if ($inventory_sic != 0): ?>
            <?php $month = 1 ?>
            <tr>
                <td><?= $sic->SIC . ' : ' . $sic->KETERANGAN_SIC ?></td>
                <td><?= $inventory_sic ?></td>
                <td><?= sizeof($emt_by_sic[$sic->SIC])?></td> 
                <td>
            <?php 
                $numbers_of_rating_poor = 0;
                
                if(sizeof($emt_by_sic[$sic->SIC])){
                foreach($emt_by_sic[$sic->SIC] as $emt){
                    
                    if($emt->scoreDOE == 'Poor'){
                        $numbers_of_rating_poor++;
                    }     
                }
                }
                
                echo $numbers_of_rating_poor;
            ?>     
        </td>
        <td>
            <?php 
                $numbers_of_rating_fair = 0;
                
                if(sizeof($emt_by_sic[$sic->SIC])){
                foreach($emt_by_sic[$sic->SIC] as $emt){
                    
                    if($emt->scoreDOE == 'Fair'){
                        $numbers_of_rating_fair++;
                    }     
                }
                }
                echo $numbers_of_rating_fair;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_average = 0;
                
                if(sizeof($emt_by_sic[$sic->SIC])){
                foreach($emt_by_sic[$sic->SIC] as $emt){
                    
                    if($emt->scoreDOE == 'Average'){
                        $numbers_of_rating_average++;
                    }     
                }
                }
                echo $numbers_of_rating_average;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_good = 0;
                
                if(sizeof($emt_by_sic[$sic->SIC])){
                foreach($emt_by_sic[$sic->SIC] as $emt){
                    
                    if($emt->scoreDOE == 'Good'){
                        $numbers_of_rating_good++;
                    }     
                }
                }
                echo $numbers_of_rating_good;
            ?>
        </td>
        <td>
            <?php 
                $numbers_of_rating_excellent = 0;
                
                if(sizeof($emt_by_sic[$sic->SIC])){
                foreach($emt_by_sic[$sic->SIC] as $emt){
                    
                    if($emt->scoreDOE == 'Excellent'){
                        $numbers_of_rating_excellent++;
                    }     
                }
                }
                echo $numbers_of_rating_excellent;
            ?>
        </td>
            </tr>
 
        <?php endif; ?>
    <?php endforeach; ?>
</tbody>
</table>