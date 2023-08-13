<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<form method="post" action="<?= base_url() ?>auth/login">
    <div class="row">
        <div class="col col-md-4" style="background-color: #eee;">
            <?php
            // display err msg
            $err = $this->session->flashdata('err');
            if ($err) {
                echo "<div class='alert alert-danger'>";
                echo $this->session->flashdata('err');
                echo "</div>";
            }
            ?>
            <div class="row">
                <div class="col col-md-4">Emel</div>
                <div class="col col-md-8"><input type="text" name="id"></div>
            </div>
            <div class="row">
                <div class="col col-md-4">Katalaluan</div>
                <div class="col col-md-8"><input type="password" name="pwd"></div>
            </div>
            <div class="row">
                <div class="col col-md-4"></div>
                <div class="col col-md-8"><input type="submit"></div>
            </div>
        </div>

        <div class="col col-md-7" style="background-color: #ffcccc;">Announcement</div>
    </div>
</form>