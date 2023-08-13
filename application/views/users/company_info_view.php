<br>
<div class="form-group row">
    <div class="col-md-6">
        <h4><?= $premise_info->namapremis ?> <small><?= $premise_info->no_roc ?></small></h4>
    </div>

</div>
<br>
<div class="form-group row"> 
    <div class="col-md-6">
        <h4><small>DOE File No -</small> <?= $premise_info->nofaildoe ?></h4> 
    </div>
</div>
<br>
<div class="form-group row">
    <h5>
        <i class="fa fa-map-marker fa-lg fa-2x" aria-hidden="true"></i>&nbsp;
    <?= ' ' . strtoupper($premise_info->alamat) . ', ' . $premise_info->poskod . ', ' . strtoupper($premise_info->bandar) ?>
    <?= ' ' . strtoupper($premise_info->parlimen) . ', ' . strtoupper($premise_info->negeri) ?>
    </h5>
</div>
<br>
<div class="form-group row">
    <h5><i class="fa fa-phone fa-lg fa-2x" aria-hidden="true"></i> 
    <?= (!empty($premise_info->telefon)) ? $premise_info->telefon : ' -' ?> </h5>
</div>
<br>
<div class="form-group row">
   <h5> <i class="fa fa-fax fa-lg fa-2x" aria-hidden="true"></i> 
        <?= (!empty($premise_info->faks)) ? $premise_info->faks : ' -' ?> </h5> 
</div>
<br>
<div class="form-group row">
    <h5><i class="fa fa-envelope fa-lg fa-2x" aria-hidden="true"></i>
        <?= (!empty($premise_info->email)) ? $premise_info->email : '-' ?>   </h5>
</div>

<hr>
<div class="form-group">
    <h5>
        <small>Authorized Person</small>  <?= $premise_info->name ?>
    </h5>


    <h5>
        <small>ID</small> <?= $premise_info->ic_no ?>
    </h5>
    <h5>
        <small>Designation</small> <?= $premise_info->position ?>
    </h5>
</div>

<!--    <small>*orang yang tersenarai diatas akan bertanggungjawab melaporkan EMT</small>-->
<hr>