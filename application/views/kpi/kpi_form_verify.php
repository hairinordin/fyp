<h4>Submit State KPI for Verification for the year <?= $year ?> </h4>
<hr>

<div class="alert alert-info">
  <strong>Pengemaskinian KPI perlu dibuat sebelum 1 Februari pada setiap tahun. 
      Perubahan selepas tarikh tersebut perlu melalui Ibu Pejabat.</strong>
    <br>
    
</div>

<?php
    if($this->session->flashdata('status')) {
    $message = $this->session->flashdata('status');
    
    ?>
    

<div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?></div>
    <?php } ?>

<div class="row">
    <div class="col-md-12 text-center">
        <a href="<?= base_url('kpi/monthly_kpi') ?>" class="btn btn-warning btn-lg" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</a>
    </div>
</div>
