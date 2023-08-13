<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>eMAINS</title>
        <!-- Latest compiled and minified CSS -->
        <!--FAVICON-->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>theme1/assets/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>theme1/assets/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>theme1/assets/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>theme1/assets/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>theme1/assets/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>theme1/assets/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>theme1/assets/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>theme1/assets/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>theme1/assets/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>theme1/assets/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>theme1/assets/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>theme1/assets/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>theme1/assets/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo base_url(); ?>theme1/assets/images/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>theme1/assets/images/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!--END FAVICON-->
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
        <link href="<?= base_url() ?>theme1/assets/css/dashboard.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!--        <script src="<?= base_url() ?>theme1/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>-->
        <link href="<?= base_url() ?>theme1/assets/css/loader-style.css" rel="stylesheet" type="text/css"/>
<!--        <script src="<?= base_url() ?>theme1/jquery-ui/external/jquery/jquery.js" type="text/javascript"></script>-->
        <!--<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>-->
        <script src="<?= base_url() ?>theme1/jquery-1.12.4.js" type="text/javascript"></script>
        <link href="<?= base_url() ?>theme1/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
<!--        <link href="<?= base_url() ?>theme1/assets/css/timeline.css" rel="stylesheet" type="text/css"/>-->
        <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>-->
        <script src="<?= base_url() ?>theme1/jquery-ui/jquery-ui.js" type="text/javascript"></script>
        <link href="<?= base_url() ?>theme1/assets/css/magic-check.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/assets/css/magic-check-doe.css" rel="stylesheet" type="text/css"/>

        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         -->
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
        <script type="text/javascript" src="<?= base_url() ?>theme1/pdfmake.min.js"></script>
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

        <link href="<?= base_url() ?>theme1/assets/css/loader.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>theme1/assets/css/custom-table.css" rel="stylesheet" type="text/css" />


        <style>
            body {
                font-family: 'Encode Sans Expanded', sans-serif;
            }

            .dropdown-submenu {
                position: relative;
            }

            .dropdown-submenu .dropdown-menu {
                top: 0;
                left: 100%;
                margin-top: -1px;
            }

            .col-sasaranPremis{
                background-color: red;
            }

            .col-BilLawatan{
                background-color: #66ff00;
            }
            
            #loading-indicator {
                position: absolute;
                left: 10px;
                top: 10px;
              }
        </style>
    </head>
    <body> <!--onload="timeout()"-->
        <!--<div id="loader"></div>
         <div style="display:none;" id="myPage" class="animate-bottom">-->
        <div class="se-pre-con"></div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="background-color:white">
                        <span class="sr-only">Toggle navigation</span>

                    </button>
                    <img class="bavbar-brand" src="<?= base_url() ?>theme1/assets/images/EMAINS_small.png" alt="" width="250" height="63" >
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-fixed">
                        <!-- PREMIS -->
                        <?php if ($this->role == 'premis'): ?>

                            <li><a href="<?= base_url() ?>dashboard/company">Dashboard</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Help
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a target="_blank" href="https://www.doe.gov.my/portalv1/wp-content/uploads/2016/06/Environmental-Mainstreaming-Directive-and-EMT-Compliance-Report.pdf">Directive</a></li>
                                    <li><a target="_blank" href="<?= base_url() ?>theme1/assets/Explanatory-Note-for-EMT-Compliance-Report_EMAINS_.pdf">Explanatory Notes</a></li>
                                </ul>
                            </li>
                            <!-- PEGAWAI KPI -->
                        <?php elseif ($this->role == 'KPI'): ?> 
                            <li><a href="<?= base_url() ?>dashboard/#cTotalRegistered">Dashboard</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">KPI
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url() ?>kpi/monthly_kpi">View State KPI</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url() ?>notification/">Notification</a></li>
                            <li><a href="<?= base_url() ?>kpi/monthly_list">Reporting</a></li>
                            
                        <?php elseif ($this->role == 'PM' || $this->role == 'PN' || $this->role == 'PL'): ?>
                            <li><a href="<?= base_url() ?>dashboard/#cTotalRegistered">Dashboard</a></li>
                            <!-- PEGAWAI PEMERIKSA -->
                            <?php if($this->role == 'PM'){?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">KPI
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url() ?>kpi/">Add Compulsory Premise</a></li>
                                </ul>
                            </li>
                            <!-- PEGAWAI PENYELIA -->
                            <?php } elseif($this->role == 'PN') { ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">KPI
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url() ?>kpi/monthly_kpi_edit">Set My KPI</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                            <li><a href="<?= base_url() ?>answers/">Premise Assessment</a></li> 
                            <li><a href="<?= base_url() ?>remark/">Assessment Submission</a></li>
                            <li><a href="<?= base_url() ?>notification/">Notification</a></li>
                            <li><a href="<?= base_url() ?>kpi/monthly_list">Reporting</a></li>
                            

                        <?php else : ?>
                            <li><a href="<?= base_url() ?>dashboard/#cTotalRegistered">Dashboard</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">KPI
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
<!--                                    <li><a href="<?= base_url() ?>kpi/monthly_kpi">Set Monthly KPI</a></li>-->
                                    <li><a href="<?= base_url() ?>kpi/monthly_kpi">View State KPI</a></li>
                                    <li><a href="<?= base_url() ?>kpi/">Add Compulsory Premise</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url() ?>answers/">Premise Assessment</a></li>
                            <li><a href="<?= base_url() ?>remark/">Assessment Submission</a></li>
                            <li><a href="<?= base_url() ?>notification/">Notification</a></li>
                            <li><a href="<?= base_url() ?>kpi/monthly_list">Reporting</a></li>


                        <?php endif ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right ">
                        <?php if ($this->role == "ADM") { ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url() ?>admin">DOE User</a></li>
                                    <li><a href="<?= base_url() ?>admin/industry">Premise</a></li>
<!--                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= base_url() ?>admin/announcement">Pengumuman</a></li>
                                    <li role="separator" class="divider"></li>-->
<!--                                    <li><a href="#">Data Rujukan</a></li>-->
<!--                                    <li>
                                        ROLE = <?php //echo $this->role ?>
                                        <br>
                                        STATE = <?php //echo $this->state ?>
                                        <br>
                                        USER_ID = <?php //echo $this->idpremis ?>
                                    </li>-->

                                </ul>
                            </li>

                        <?php } ?>


                        <?php if ($this->role == "premis") { ?>
                            <li><small>Sign in as <?php echo $this->name ?></small></li>
                            <li><a href="<?= base_url() ?>users/view_profile/<?= $this->idpremis ?>" title="Profile"><span class=" fa fa-user-circle fa-2x"></span></a></li>
<!--                            <li style="color:white;">
                                ROLE = <?php //echo $this->role ?>
                                <br>
                                STATE = <?php //echo $this->state ?>
                                <br>
                                USER_ID = <?php //echo $this->idpremis ?>
                            </li>-->
                        <?php } else { ?>
<li><a><small>Sign in as <?php echo $this->name ?></small></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#refModal" title="Reference"><span class=" fa fa-book fa-2x"></span></a></li>
                            <li><a href="<?= base_url() ?>admin/profile" title="Profile"><span class=" fa fa-user-circle fa-2x"></span></a></li>
 
                        <?php } ?>


                        <li><a href="<?= base_url() ?>auth/logout" title="Log out"><span class="fa fa-sign-out fa-2x"></span></a></li>



                    </ul>

                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="row placeholders">
                        <div id="xcontent">
                            <br>
                            <?php $this->load->view($main_view) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
   

    
    <!-- Reference Modal -->
  <div class="modal fade" id="refModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reference</h4>
        </div>
        <div class="modal-body">
            
            <p>
                <iframe src="<?= base_url() ?>reference" 
                        frameborder="0"
                        width="100%"
                        height="700"
                        
                        ></iframe></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    
    <script>

        //Cursor Animation
//        $(document).ajaxStart(function() {
//            $(document.body).css({'cursor' : 'wait'});
//        }).ajaxStop(function() {
//            $(document.body).css({'cursor' : 'default'});
//        });
        
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
            
        });

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
        
        $('#textarea_editor1').wysihtml5({

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
        
        $('#textarea_editor3').wysihtml5({

            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false //Button to change color of font 
        });
        $('#textarea_editor4').wysihtml5({

            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false //Button to change color of font 
        });
        
        $('#textarea_editor5').wysihtml5({

            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false //Button to change color of font 
        });
        
        $('#textarea_editor6').wysihtml5({

            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false //Button to change color of font 
        });
        
        $('#textarea_editor7').wysihtml5({

            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": false, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false //Button to change color of font 
        });
        
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $('.dropdown-submenu a.ddown-sub').on("click", function (e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
  
        });
        
       
    </script>


    <!-- Include jQuery Validator plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>


    <!-- Include SmartWizard JavaScript source -->
    <script type="text/javascript" src="<?= base_url() ?>theme1/assets/smart-wizard/js/jquery.smartWizard.min.js"></script>

    <script type="text/javascript" src="<?= base_url() ?>theme1/assets/smart-wizard_config.js"></script>
    <!-- BS Notify -->
    <script type="text/javascript" src="<?= base_url() ?>theme1/assets/bs-notify/bootstrap-notify.js"></script>
    
    <script type="text/javascript" src="<?= base_url() ?>theme1/assets/preventDoubleSubmission.js"></script>
</body>



</html>
