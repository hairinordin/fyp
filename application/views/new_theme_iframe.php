<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>eMAINS</title>
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/assets/css/dashboard.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!--        <script src="<?= base_url() ?>theme1/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>-->
       <link href="<?= base_url() ?>theme1/assets/css/loader-style.css" rel="stylesheet" type="text/css"/>
        <script src="<?= base_url() ?>theme1/jquery-ui/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>theme1/jquery-ui/jquery-ui.js" type="text/javascript"></script>
        <link href="<?= base_url() ?>theme1/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/assets/css/timeline.css" rel="stylesheet" type="text/css"/>
       
         <link href="<?= base_url() ?>theme1/assets/css/magic-check.css" rel="stylesheet" type="text/css"/>
        
        <script src="<?= base_url() ?>theme1/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-wysihtml5.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>assets/js-webshim/minified/polyfiller.js"></script>
         <!--   <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->
        <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded" rel="stylesheet">
       
         <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
         <script type="text/javascript" src="<?= base_url() ?>theme1/highcharts/highcharts.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme1/highcharts/modules/exporting.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/wysihtml5-0.3.0.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-wysihtml5.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>theme1/datatables/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>theme1/datatables/fixedcolumns/fixedColumns.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>theme1/datatables/fixedheader/fixedHeader.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>theme1/datatables/buttons/buttons.dataTables.min.css"/>
        <script type="text/javascript" src="<?= base_url() ?>theme1/jszip.min.js"></script>
<!--        <script type="text/javascript" src="<?= base_url() ?>theme1/pdfmake.min.js"></script>-->
        <script type="text/javascript" src="<?= base_url() ?>theme1/vfs_fonts.js"></script>
         <script src="<?= base_url() ?>theme1/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
         
        <script type="text/javascript" src="<?= base_url() ?>theme1/datatables/fixedcolumns/dataTables.fixedColumns.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme1/datatables/fixedheader/dataTables.fixedHeader.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme1/datatables/buttons/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme1/datatables/buttons/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme1/datatables/buttons/buttons.flash.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme1/datatables/buttons/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme1/datatables/buttons/buttons.print.min.js"></script>
         
        <!-- Include SmartWizard CSS -->
        <link href="<?= base_url() ?>theme1/assets/smart-wizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />

        <!-- Optional SmartWizard theme -->
        <link href="<?= base_url() ?>theme1/assets/smart-wizard/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>theme1/assets/smart-wizard/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>theme1/assets/smart-wizard/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
        
        <!-- Notify -->
        <link href="<?= base_url() ?>theme1/assets/bs-notify/animate.css" rel="stylesheet" type="text/css" />
        <script type = "text/javascript" src = "<?= base_url() ?>theme1/jquery.form.js"></script>
        <style>
            body {
                font-family: 'Encode Sans Expanded', sans-serif;
            }

        </style>
    </head>
    <body> 

    <div class="container-fluid">
      <div class="row">
<div class="col-md-12">
          <div class="row placeholders">
              <div id="xcontent">
            <?php $this->load->view($main_view) ?>
              </div>
          </div>

        </div>
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
                "color": false, //Button to change color of font 
                "required" : true
            });

           $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
                
  
            });
        </script>
    
    
         <!-- Include jQuery Validator plugin -->
        <script src="<?= base_url() ?>theme1/validator.min.js"></script>


        <!-- Include SmartWizard JavaScript source -->
        <script type="text/javascript" src="<?= base_url() ?>theme1/assets/smart-wizard/js/jquery.smartWizard.min.js"></script>
        
        <script type="text/javascript" src="<?= base_url() ?>theme1/assets/smart-wizard_config.js"></script>
        <!-- BS Notify -->
        <script type="text/javascript" src="<?= base_url() ?>theme1/assets/bs-notify/bootstrap-notify.js"></script>
        
    </body>
    
    
    
</html>
