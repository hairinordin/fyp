<br>

<div class="page-header">
  <h1><small>To be completed by </small>31 August 2018</h1> <h1 class="text-right"><small>Days remaining  </small>65 Days</h1> 
</div>
        

<?php 
if (isset($ep)) {
    if ($ep == 'submit') {
        $style = "progress-bar progress-bar-success";
    } else {
        $style = "progress-bar progress-bar-danger";
    }
}

if(isset($eb)){
    if ($eb == 'submit') {
        $style2 = "progress-bar progress-bar-success";
    } else {
        $style2 = "progress-bar progress-bar-danger";
    }
}

if(isset($epmc) || isset($ercmc)){
    if ($epmc == 'submit' && $ercmc == 'submit') {
        $style3 = "progress-bar progress-bar-success";
    } else {
        $style3 = "progress-bar progress-bar-danger";
    }
}

if(isset($bmps) || isset($iets) || isset($iets) || isset($apcs) || isset($swmi) || isset($labf) || isset($pmi) || isset($others4)){
    if ($bmps == 'submit' && $iets == 'submit' && $apcs == 'submit' && $swmi == 'submit' && $labf == 'submit' && $pmi == 'submit' && $others4 == 'submit') {
        $style4 = "progress-bar progress-bar-success";
    } else {
        $style4 = "progress-bar progress-bar-danger"; 
    }
}

if(isset($csec) || isset($cepietsobp) || isset($cepietsopcp) || isset($cepswam) || isset($cepso) || isset($cebfo) || isset($ceppome) || isset($cepstpo)){
    if ($csec == 'submit' && $cepietsobp == 'submit' && $cepietsopcp == 'submit' && $cepswam == 'submit' && $cepso == 'submit' && $cebfo == 'submit' && $ceppome == 'submit' && $cepstpo == 'submit') {
        $style5 = "progress-bar progress-bar-success";
    } else {
        $style5 = "progress-bar progress-bar-danger"; 
    }
}

if(isset($cc) || isset($da) || isset($ir) || isset($others6)){
    if ($cc == 'submit' && $da == 'submit' && $ir == 'submit' && $others6 == 'submit') {
        $style6 = "progress-bar progress-bar-success";
    } else {
        $style6 = "progress-bar progress-bar-danger"; 
    }
}

if(isset($esr) || isset($ws) || isset($bb) || isset($fl)){
    if ($esr == 'submit' && $ws == 'submit' && $bb == 'submit' && $fl == 'submit') {
        $style7 = "progress-bar progress-bar-success";
    } else {
        $style7 = "progress-bar progress-bar-danger"; 
    }
}
?>
<h2 class="text-center">Timeline</h2>

<ul class="timeline">
    <li>
        <div class="timeline-badge">
          <a><i class="fa fa-circle" id=""></i></a>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4>Tool completed</h4>
            </div>
            <div class="timeline-body">
                <p>Tool 5 has been completed</p>
            </div>
            <div class="timeline-footer">
                <p class="text-right">April-21-2014</p>
            </div>
        </div>
    </li>
    
    <li class="timeline-inverted">
        <div class="timeline-badge">
            <a><i class="fa fa-circle invert" id=""></i></a>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4>Tool completed</h4>
            </div>
            <div class="timeline-body">
                <p>Tool 4 has been completed</p>
            </div>
            <div class="timeline-footer">
                <p class="text-right">Mac-23-2014</p>
            </div>
        </div>
    </li>
    
    <li>
        <div class="timeline-badge">
            <a><i class="fa fa-circle" id=""></i></a>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4>Tool completed</h4>
            </div>
            <div class="timeline-body">
                <p>Tool 3 has been completed</p>
            </div>
            <div class="timeline-footer">
                <p class="text-right">Mac-23-2014</p>
            </div>
        </div>
    </li>
    
    <li class="timeline-inverted">
        <div class="timeline-badge">
            <a><i class="fa fa-circle invert" id=""></i></a>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4>Tool completed</h4>
            </div>
            <div class="timeline-body">
                <p>Tool 2 has been completed</p>
            </div>
            <div class="timeline-footer">
                <p class="text-right">Feb-27-2014</p>
            </div>
        </div>
    </li>
    
    <li>
        <div class="timeline-badge">
            <a><i class="fa fa-circle" id=""></i></a>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4>Tool completed</h4>
            </div>
            <div class="timeline-body">
                <p>Tool 1 has been completed</p>
            </div>
            <div class="timeline-footer">
                <p class="text-right">Feb-8-2014</p>
            </div>
        </div>
    </li>
    
    <li  class="timeline-inverted">
        <div class="timeline-badge">
            <a><i class="fa fa-circle invert" id=""></i></a>
        </div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4>1st time login</h4>
            </div>
            <div class="timeline-body">
                <p>Registered on eMAINS.</p>
            </div>
            <div class="timeline-footer primary">
                <p class="text-right">Feb-02-2018</p>
            </div>
        </div>
    </li>
    <li class="clearfix no-float"></li>
</ul>

<hr>
<h4 style="text-align:center">EMT yang perlu dilengkapkan</h4>

<div class="progress" style="height:40px">
    <div class="<?=$style?>" role="progressbar" style="width:14.29%">
        <a href="#" onclick="emt1Toggle()" style="color: white; font-size: 20px; line-height:40px ">EMT 1</a>
    </div>
    <div class="<?=$style2?>" role="progressbar" style="width:14.29%">
      <a href="#" onclick="emt2Toggle()" style="color: white; font-size: 20px; line-height:40px ">  EMT 2</a>
    </div>
    <div class="<?= $style3 ?>" role="progressbar" style="width:14.29%">
        <a href="#" onclick="emt3Toggle()" style="color: white; font-size: 20px; line-height:40px " >  EMT 3</a>    
    </div>
     <div class="<?= $style4 ?>" role="progressbar" style="width:14.29%">
      <a href="#" onclick="emt4Toggle()" style="color: white; font-size: 20px; line-height:40px ">  EMT 4</a> 
    </div>
     <div class="<?= $style5 ?>" role="progressbar" style="width:14.29%">
     <a href="#" onclick="emt5Toggle()" style="color: white; font-size: 20px; line-height:40px ">  EMT 5</a> 
    </div>
     <div class="<?= $style6 ?>" role="progressbar" style="width:14.29%">
      <a href="#" onclick="emt6Toggle()" style="color: white; font-size: 20px; line-height:40px ">  EMT 6</a> 
    </div>
     <div class="<?= $style7 ?>" role="progressbar" style="width:14%">
      <a href="#" onclick="emt7Toggle()" style="color: white; font-size: 20px; line-height:40px ">  EMT 7</a> 
    </div>
     
  </div>

<!-- EMT 1 Panel -->
<div class="panel panel-default" id="emt1" style="display:none">
    <div class="panel-body">
        <div >
             <ul>
                 <a href="<?php echo base_url() . 'emt/index/ep' ?>">Environmental Policy (EP)
                 <?php
                    if (isset($ep)) {
                        
                        if($ep == 'draft'){
                            echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                        }
                        elseif($ep == 'submit'){
                            echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"> </i>';
                        }
//                        print_r($ep);
//                        echo "<br>";
                    }
                    ?></a>
             </ul>       
        </div>
    </div>
</div>

<!-- EMT 2 Panel -->
<div class="panel panel-default" id="emt2" style="display:none">
    <div class="panel-body">
        <div >
                <ul>
                    <a href="<?php echo base_url() . 'emt/index/eb' ?>">Environmental Budget (EB)
                    <?php
                    if (isset($eb)) {
                        if($eb == 'draft'){
                            echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                        }
                        elseif($eb == 'submit'){
                            echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                        }
//                        print_r($eb);
//                        echo "<br>";
                    }
                    ?>
                        </a>
                </ul>
                
        </div>
    </div>
</div>

<!-- EMT 3 Panel -->
<div class="panel panel-default" id="emt3" style="display:none">
    <div class="panel-body">
        

           <ul><a href="<?php echo base_url() . 'emt/index/epmc' ?>">Environmental Monitoring Committee (EMC) - EPMC
            <?php
                    if (isset($epmc)) {

                        if($epmc == 'draft'){
                            echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                        }
                        elseif($epmc == 'submit'){
                            echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                        }
                    }
                    ?>
              </a></ul>

        <ul><a href="<?php echo base_url() . 'emt/index/ercmc' ?>">Environmental Monitoring Committee (EMC) - ERCMC
                <?php
                if (isset($ercmc)) {

                    if ($ercmc == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($ercmc == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
                }
                ?></a></ul>
               
    </div>
</div>

<!--EMT 4 Panel -->
<div class="panel panel-default" id="emt4" style="display:none">
    <div class="panel-body">
        <ul><a href="<?php echo base_url() . 'emt/index/bmps' ?>">Environmental Facility (EF) - BMPS
            
            
        <?php
        if (isset($bmps)) {

             if ($bmps == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($bmps == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>

        <ul><a href="<?php echo base_url() . 'emt/index/iets' ?>">Environmental Facility (EF) - IETS
             <?php
        if (isset($iets)) {

             if ($iets == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($iets == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?>
            </a></ul>

        <ul><a href="<?php echo base_url() . 'emt/index/apcs' ?>">Environmental Facility (EF) - APCS
            <?php
        if (isset($apcs)) {

             if ($apcs == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($apcs == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?>
            </a></ul>



        <ul><a href="<?php echo base_url() . 'emt/index/swmi' ?>">Environmental Facility (EF) - SWMI
            <?php
        if (isset($swmi)) {

             if ($swmi == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($swmi == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?>
            </a></ul>


        <ul><a href="<?php echo base_url() . 'emt/index/labf' ?>">Environmental Facility (EF) - LABF
            <?php
        if (isset($labf)) {

             if ($labf == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($labf == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?>
            </a></ul>
        <ul><a href="<?php echo base_url() . 'emt/index/pmi' ?>">Environmental Facility (EF) - PMI
            <?php
        if (isset($pmi)) {

             if ($pmi == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($pmi == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?>
            </a></ul>

        <ul><a href="<?php echo base_url() . 'emt/index/others4' ?>">Environmental Facility (EF) - OTHERS
            <?php
        if (isset($others4)) {

             if ($others4 == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($others4 == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?>
            </a></ul>
    </div>
</div>

<!--EMT 5 Panel -->
<div class="panel panel-default" id="emt5" style="display:none">
    <div class="panel-body">
        
     <ul><a href="<?php echo base_url() . 'emt/index/csec' ?>">Environmental Competency (EC) - CSEC
         <?php
        if (isset($csec)) {

             if ($csec == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($csec == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?>
         </a></ul>
     <ul><a href="<?php echo base_url() . 'emt/index/cepietsobp' ?>">Environmental Competency (EC) - CePIETSO - BP
         <?php
        if (isset($cepietsobp)) {

             if ($cepietsobp == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($cepietsobp == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>
     <ul><a href="<?php echo base_url() . 'emt/index/cepietsopcp' ?>">Environmental Competency (EC) - CePIETSO - PCP
         <?php
        if (isset($cepietsopcp)) {

             if ($cepietsopcp == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($cepietsopcp == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>
     <ul><a href="<?php echo base_url() . 'emt/index/cepswam' ?>">Environmental Competency (EC) - CePSWAM
         <?php
        if (isset($cepswam)) {

             if ($cepswam == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($cepswam == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>
     <ul><a href="<?php echo base_url() . 'emt/index/cepso' ?>">Environmental Competency (EC) - CePSO
         <?php
        if (isset($cepso)) {

             if ($cepso == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($cepso == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>
     <ul><a href="<?php echo base_url() . 'emt/index/cebfo' ?>">Environmental Competency (EC) - CeBFO
         <?php
        if (isset($cebfo)) {

             if ($cebfo == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($cebfo == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>
     <ul><a href="<?php echo base_url() . 'emt/index/ceppome' ?>">Environmental Competency (EC) - CePPOME
         <?php
        if (isset($ceppome)) {

             if ($ceppome == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($ceppome == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>
     <ul><a href="<?php echo base_url() . 'emt/index/cepstpo' ?>">Environmental Competency (EC) - CePSTPO
         <?php
        if (isset($cepstpo)) {

             if ($cepstpo == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($cepstpo == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>
     
    </div>
</div>

<!--EMT 6 Panel -->
<div class="panel panel-default" id="emt6" style="display:none">
    <div class="panel-body">
        <ul><a href="<?php echo base_url() . 'emt/index/cc' ?>">Environmental Reporting & Communication (ERC) - CC
            <?php
        if (isset($cc)) {

             if ($cc == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($cc == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>
        <ul><a href="<?php echo base_url() . 'emt/index/da' ?>">Environmental Reporting & Communication (ERC) - DA
            <?php
        if (isset($da)) {

             if ($da == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($da == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>
        <ul><a href="<?php echo base_url() . 'emt/index/ir' ?>">Environmental Reporting & Communication (ERC) - IR
            <?php
        if (isset($ir)) {

             if ($ir == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($ir == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        ?></a></ul>
        <ul><a href="<?php echo base_url() . 'emt/index/others6' ?>">Environmental Reporting & Communication (ERC) - OTHERS
            <?php
        if (isset($others6)) {

             if ($others6 == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($others6 == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        
        
        ?></a></ul>
        
    </div>
</div>

<!--EMT 7 Panel -->
<div class="panel panel-default" id="emt7" style="display:none">
    <div class="panel-body">
        <ul><a href="<?php echo base_url() . 'emt/index/esr' ?>">Environmental Transparency (ET) - ESR
            <?php
        if (isset($esr)) {

             if ($esr == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($esr == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        
        
        ?></a></ul>
        <ul><a href="<?php echo base_url() . 'emt/index/ws' ?>">Environmental Transparency (ET) - WS
            <?php
        if (isset($ws)) {

             if ($ws == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($ws == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        
        
        ?></a></ul>
        <ul><a href="<?php echo base_url() . 'emt/index/bb' ?>">Environmental Transparency (ET) - BB
            <?php
        if (isset($bb)) {

             if ($bb == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($bb == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        
        
        ?></a></ul>
        <ul><a href="<?php echo base_url() . 'emt/index/fl' ?>">Environmental Transparency (ET) - FL
            <?php
        if (isset($fl)) {

             if ($fl == 'draft') {
                        echo '<i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="draft"></i>';
                    } elseif ($fl == 'submit') {
                        echo '<i class="fa fa-check-square" aria-hidden="true" data-toggle="tooltip" title="submit"></i>';
                    }
        }
        
        
        ?></a></ul>
    </div>
</div>



<script>
    var emt1 = document.getElementById("emt1");
    var emt2 = document.getElementById("emt2");
    var emt3 = document.getElementById("emt3");
    var emt4 = document.getElementById("emt4");
    var emt5 = document.getElementById("emt5");
    var emt6 = document.getElementById("emt6");
    var emt7 = document.getElementById("emt7");
    
function emt1Toggle() {
    
     
    if (emt1.style.display === "none") {
        emt1.style.display = "block";
        emt2.style.display = "none";
        emt3.style.display = "none";
        emt4.style.display = "none";
        emt5.style.display = "none";
        emt6.style.display = "none";
        emt7.style.display = "none";
        
    } else {
        emt1.style.display = "none";
    }
}

function emt2Toggle() {
    var emt2 = document.getElementById("emt2");
    if (emt2.style.display === "none") {
        emt1.style.display = "none";
        emt2.style.display = "block";
        emt3.style.display = "none";
        emt4.style.display = "none";
        emt5.style.display = "none";
        emt6.style.display = "none";
        emt7.style.display = "none";
    } else {
        emt2.style.display = "none";
    }
}

function emt3Toggle() {
    var emt3 = document.getElementById("emt3");
    if (emt3.style.display === "none") {
        emt1.style.display = "none";
        emt2.style.display = "none";
        emt3.style.display = "block";
        emt4.style.display = "none";
        emt5.style.display = "none";
        emt6.style.display = "none";
        emt7.style.display = "none";
    } else {
        emt3.style.display = "none";
    }
}

function emt4Toggle() {
    var emt4 = document.getElementById("emt4");
    if (emt4.style.display === "none") {
        emt1.style.display = "none";
        emt2.style.display = "none";
        emt3.style.display = "none";
        emt4.style.display = "block";
        emt5.style.display = "none";
        emt6.style.display = "none";
        emt7.style.display = "none";
    } else {
        emt4.style.display = "none";
    }
}

function emt5Toggle() {
    var emt5 = document.getElementById("emt5");
    if (emt5.style.display === "none") {
        emt1.style.display = "none";
        emt2.style.display = "none";
        emt3.style.display = "none";
        emt4.style.display = "none";
        emt5.style.display = "block";
        emt6.style.display = "none";
        emt7.style.display = "none";
    } else {
        emt5.style.display = "none";
    }
}

function emt6Toggle() {
    var emt6 = document.getElementById("emt6");
    if (emt6.style.display === "none") {
        emt1.style.display = "none";
        emt2.style.display = "none";
        emt3.style.display = "none";
        emt4.style.display = "none";
        emt5.style.display = "none";
        emt6.style.display = "block";
        emt7.style.display = "none";
    } else {
        emt6.style.display = "none";
    }
}

function emt7Toggle() {
    var emt7 = document.getElementById("emt7");
    if (emt7.style.display === "none") {
        emt1.style.display = "none";
        emt2.style.display = "none";
        emt3.style.display = "none";
        emt4.style.display = "none";
        emt5.style.display = "none";
        emt6.style.display = "none";
        emt7.style.display = "block";
    } else {
        emt7.style.display = "none";
    }
}
</script>