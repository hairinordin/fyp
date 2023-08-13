<legend>
    <b>Laporan Sukuan Pemeriksaan Desktop - Jumlah Sasaran, Jumlah Pencapaian dan Pematuhan</b>
</legend>
<br>
<table style="border: 1px solid #CCC">
    <tr>
        <td>Inventori JAS Negeri</td>
        <td><?= $sasaran->jum_sasaran ?></td>
    </tr>
    <tr>
        <td>Jum. Premis yg akan diperiksa 2017</td>
        <td></td>
    </tr>
</table>
<br>
<table border="1" style="border: 1px solid #CCC">
    <tr style="background-color:#ff9">
        <td>Bil</td>
        <td>PYDT</td>
        <td>Jum. Premis yg Disasarkan untuk Diperiksa melalui Dekstop (SPD)</td>
        <td>Jumlah Pemeriksaan Dekstop (SD)</td>
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
    <?php
    $i = 1;
    foreach ($arr as $a) :
    ?>
    <tr>
        <td><?= $i++ ?>.</td>
        <td><?= $a ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php
    endforeach;
    ?>
</table>

<style>
    td {
        border: 1px solid #CCC;
        font-family: Arial;
        font-size: 11px;
    }
</style>