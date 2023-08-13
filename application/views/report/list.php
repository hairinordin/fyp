<legend>Senarai Laporan</legend>

<div class="row">
<div class="col-md-3 well">
    <div>Year</div> 
    <div><?= form_dropdown('year', $this->ref->data('year'),$year, "class='form-control'") ?>
    </div>   
    <br>
    <br>
    <div>State</div> 
    <div><?= form_dropdown('state', $this->ref->data('state'),$this->state, "class='form-control'") ?>
    </div>   
    <br>
    <a href="#" class="btn btn-primary btn-sm">Filter</a>
</div>
<div class="col-md-1">

</div>
<div class="col-md-8">
<h4>Laporan Pencapaian Bulanan Maklumbalas EMT</h4>
<ul>
    <li><a href="<?= base_url() ?>kpi/view_monthly">Papar</a></li>
</ul>
    
<h4>Laporan Pencapaian Suku Tahunan</h4>
<ul>
    <li><a href="<?= base_url() ?>reportQuarter/search/lapangan">Pemeriksaan Desktop</a></li>
    <li><a href="<?= base_url() ?>report/month/lapangan">Pemeriksaan Lapangan</a></li>
</ul>
</div>
</div>