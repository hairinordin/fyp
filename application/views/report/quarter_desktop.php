<div class="container-fluid">
<legend>
    Laporan Sukuan Tahun Pemeriksaan Desktop - 
    Jumlah Sasaran, Jumlah Pencapaian dan Pematuhan
   
</legend>

<div class="panel panel-default">
  <div class="panel-body">
  <table class="table table-bordered table-striped">
    <tr>
        <td class="col-md-4">Inventori JAS Negeri</td><td class="col-md-4">100</td>
    </tr>
    <tr>
        <td>Jumlah Premis yang akan diperiksa bagi tahun 2017</td><td>50</td>
    </tr>
    <tr>
        <td>Jumlah Premis yang disasarkan (Desktop)</td><td>25</td>
    </tr>
    <tr>
        <td>Jumlah Pemeriksaan Dekstop (SD)</td><td>50</td>
    </tr>
</table>
  
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-body">
<table class="table table-bordered table-striped">
    <th>
    <td colspan="6"></td>
    <td colspan="2">Pelepasan Effluen</td>
    <td colspan="2">Pelepasan Udara Bersih</td>
    <td colspan="2">Pengurusan Buangan Terjadual</td>
    <td colspan="3">Pematuhan Keseluruhan</td>
    </th>
    <tr style="background-color:#ff9">
        <td>Bil</td>
        <td>PYDT</td>
        
        <td>SPD</td>
        <td>BPD</td>
        <td>BPD(SP)</td>
        <td>SD</td>
        <td>BD</td>
        <td>Bil. Premis Patuh</td>
        <td>Bil. Premis Tidak Patuh</td>
        <td>Bil. Premis Patuh</td>
        <td>Bil. Premis Tidak Patuh</td>
        <td>Bil. Premis Patuh</td>
        <td>Bil. Premis Tidak Patuh</td>
        <td>Bil. Premis Patuh</td>
        <td>Bil. Premis Tidak Patuh</td>
        <td>% Pematuhan</td>
    </tr>
    <?php $i = 0;?>
    <?php foreach($sektor as $key): ?>
    <tr>
        <td><?= ++$i?></td>
        <td><?= $key?></td>
        
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(1,20)?></td>
        <td><?= rand(70,90)?></td>
    <?php endforeach; ?>
    </tr>
    
</table>

<div class="col-md-12" style="text-align: center">
    <button type="button" class="btn btn-info">Cetak</button>
</div></div></div>
</div>