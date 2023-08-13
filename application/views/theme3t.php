<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>KPI GSR</title>
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/assets/css/layout.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url() ?>theme1/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>theme1/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div id="xheader2">
                Header ssw
            </div>

            <div id="xmenu">
                <a href="<?= base_url() ?>">Home</a> | 
                Kontak | 
                <a href="<?= base_url() ?>users/find">Daftar Premis</a>
            </div>

            <div id="xcontent">
                <?php $this->load->view($view) ?>
            </div>

            <div id="xfooter" class="col col-md-12">
                Footer
            </div>
        </div>
    </body>
</html>
