<legend>LAPORAN PENCAPAIAN BULANAN PEMERIKSAAN <?= strtoupper($jenis_laporan) ?></legend>

<div class="well">
    
<input id="jLaporan" type="hidden" value="<?= $jenis_laporan?>" > 
<div class="col-md-2">
Tahun : 
<select id="tahun">
    <option value="2017">2017</option>
</select>
</div>

<div class="col-md-2">
Bulan :
<select id="bulan">
    <option value="januari">Januari</option>
    <option value="februari">Februari</option>
    <option value="mac">Mac</option>
    <option value="april">April</option>
    <option value="mei">Mei</option>
    <option value="jun">Jun</option>
    <option value="julai">Julai</option>
    <option value="ogos">Ogos</option>
    <option value="september">September</option>
    <option value="oktober">Oktober</option>
    <option value="november">November</option>
    <option value="disember">Disember</option>
</select>
</div>

<button onclick="myFunction()">Jana Laporan</button>

</div>
<p style="text-align: center" id="demo"></p>

<script>
    function myFunction() {
    var bulan = document.getElementById("bulan").value;
    var tahun = document.getElementById("tahun").value;
    var jenis_laporan = document.getElementById("jLaporan").value;
    
        document.getElementById("demo").innerHTML = '<h4><a href="<?=base_url()?>report/monthly/' + bulan + '/' + tahun + '/' + jenis_laporan + '">Lihat laporan</a></h4>';
}

</script>
    