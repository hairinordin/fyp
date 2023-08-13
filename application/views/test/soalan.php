<form method="post" action="<?= base_url('test/save') ?>">
<?php
foreach ($rows as $row) {
    echo '<b>'.$row->soalan . '</b><br>';
    $jwp = $this->pilihan->jawapan($row->id);
    $id_soalan = $row->soalan_id;
    $jenis_jwp = $row->jenis_jawapan;
    foreach ($jwp as $j) {
        $id_jwp = $j->id;
        echo "<input type='hidden' name='soalan_$id_soalan'>";
        if ($jenis_jwp === 'rb') {
            echo "<input type='radio' name='jawapan_$id_soalan' value='$id_jwp'>";
        } else if ($jenis_jwp === 'cb') {
            echo "<input type='checkbox' name='jawapan_".$id_soalan."[]' value='$id_jwp'>";
        }
        echo $j->jawapan . '<br>';
    }
    echo '<hr>';
} 
?>
    <input type="submit" value="Submit">
</form>