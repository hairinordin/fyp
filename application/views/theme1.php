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
       <link href="<?= base_url() ?>theme1/assets/css/loader-style.css" rel="stylesheet" type="text/css"/>
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
        <script src="<?php echo base_url(); ?>assets/js/wysihtml5-0.3.0.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-wysihtml5.js"></script>
         <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
         <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>
        
        <style>
            body {
                font-family: 'Encode Sans Expanded', sans-serif;
            }
        </style>
    </head>
    <body <!--onload="timeout()"-->
       <!--<div id="loader"></div>
        <div style="display:none;" id="myPage" class="animate-bottom">-->
        <div class="container">
            <div id="xheader">
                ROLE = <?= $this->role ?>
                <br>
                STATE = <?= $this->state ?>
                <br>
                USER_ID = <?= $this->idpremis ?>
                
            </div>

            <div id="xmenu">
                <?php
                if ($this->role === 'premis') {
                    // premis
                    include('menu_admin.php');
                } else {
                    // admin
                    include('menu_admin.php');
                }
                ?>
            </div>

            <div id="xcontent">
                <?php $this->load->view($main_view) ?>
            </div>

            <div id="xfooter" class="col col-md-12 navbar navbar-inverse">
                <?php $this->load->view('footer_-fb'); ?>
            </div>
        </div>



        
        <script>
            var myVar;

            function timeout() {
                myVar = setTimeout(showPage, 1000);
            }

            function showPage() {
              //document.getElementById("loader").style.display = "none";
              //document.getElementById("myPage").style.display = "block";
            }
            
            $('#textarea_editor').wysihtml5({

                "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
                "emphasis": true, //Italics, bold, etc. Default true
                "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                "html": false, //Button which allows you to edit the generated HTML. Default false
                "link": false, //Button to insert a link. Default true
                "image": false, //Button to insert an image. Default true,
                "color": false //Button to change color of font 
            });
            
            $('#textarea_editor2').wysihtml5({

                "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
                "emphasis": true, //Italics, bold, etc. Default true
                "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                "html": false, //Button which allows you to edit the generated HTML. Default false
                "link": false, //Button to insert a link. Default true
                "image": false, //Button to insert an image. Default true,
                "color": false //Button to change color of font 
            });
            
            
        </script>
    </body>
</html>
