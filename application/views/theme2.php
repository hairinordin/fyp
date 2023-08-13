<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>eMAINS</title>
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/assets/css/layout.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!--        <script src="<?= base_url() ?>theme1/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>-->
       
        <script src="<?= base_url() ?>theme1/jquery-ui/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>theme1/jquery-ui/jquery-ui.js" type="text/javascript"></script>
        <link href="<?= base_url() ?>theme1/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
       
        
        <script src="<?= base_url() ?>theme1/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-wysihtml5.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>assets/js-webshim/minified/polyfiller.js"></script>
         <!--   <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
        <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div id="xheader">
                Header 
            </div>

            <div>
                <nav class="navbar navbar-inverse">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= base_url() ?>">Laman Utama</a></li>
<!--                        <li><a href="<?= base_url() ?>home/contact_us">Hubungi Kami</a></li>
                        <li><a href="<?= base_url() ?>users/find">Daftar</a></li>-->
                    </ul>
                </div>
                </nav>
            </div>

            <div id="xcontent">
                <?php $this->load->view($view) ?>
            </div>

            <div id="xfooter" class="col col-md-12 navbar navbar-inverse">
               <?php $this->load->view('footer'); ?>
            </div>
        </div>
    </body>
</html>
