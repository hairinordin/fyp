<!DOCTYPE html>
<html lang="en">

<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/colorpicker.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/uniform.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-wysihtml5.css" />
    <script src="<?php echo base_url();?>assets/js-webshim/minified/polyfiller.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

    <!--Header-part-->
    <div id="header">
        <h1><a href="dashboard.html">Matrix Admin</a></h1>
    </div>
    <!--close-Header-part-->

    <!--top-Header-menu-->
    <!--<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>-->

    <!--start-top-serch-->
    <!--<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>-->
    <!--close-top-serch-->

    <!--sidebar-menu-->

    <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
        <ul>
            <li><a href="<?php echo base_url().'home'?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
            <!--    <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
    <li> <a href="widgets.html"><i class="icon icon-inbox"></i> <span>Widgets</span></a> </li>
    <li><a href="tables.html"><i class="icon icon-th"></i> <span>Tables</span></a></li>
    <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Full width</span></a></li>-->
            <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>EMT</span> <span class="label label-important">3</span></a>
                <ul style="display:block">
                    <li><a href="<?php echo base_url().'emt1' ?>">EMT 1 </a></li>
                    <li><a href="<?php echo base_url().'emt2' ?>">EMT 2</a></li>
                    <li><a href="#">EMT 3</a>
                        <ul style="display:block">
                            <li><a href="<?php echo base_url().'emt3/index/epmc' ?>">____EMT3a</a></li>
                            <li><a href="<?php echo base_url().'emt3/index/ercmc' ?>">____EMT3b</a></li>

                        </ul>
                    </li>
                    <li><a href="#">EMT 4</a>
                        <ul style="display:block">
                            <li><a href="<?php echo base_url().'emt4/index/bmps' ?>">____BMPS</a></li>
                            <li><a href="<?php echo base_url().'emt4/index/iets' ?>">____IETS</a></li>
                            <li><a href="<?php echo base_url().'emt4/index/apcs' ?>">____APCS</a></li>
                            <li><a href="<?php echo base_url().'emt4/index/swmi' ?>">____SWMI</a></li>
                            <li><a href="<?php echo base_url().'emt4/index/labf' ?>">____LABF</a></li>
                            <li><a href="<?php echo base_url().'emt4/index/pmi' ?>">____PMI</a></li>
                            <li><a href="<?php echo base_url().'emt4/index/others' ?>">____OTHERS</a></li>
                        </ul>
                    </li>
                    <li><a href="#">EMT 5</a>
                        <ul style="display:block">
                            <li><a href="<?php echo base_url().'emt5/index/csec' ?>">____CSEC</a></li>
                            <li><a href="<?php echo base_url().'emt5/index/cepietsobp' ?>">____CePIETSO - BP</a></li>
                            <li><a href="<?php echo base_url().'emt5/index/cepietsopcp' ?>">____CePIETSO - PCP</a></li>
                            <li><a href="<?php echo base_url().'emt5/index/cepswam' ?>">____CePSWAM</a></li>
                            <li><a href="<?php echo base_url().'emt5/index/cepso' ?>">____CePSO</a></li>
                            <li><a href="<?php echo base_url().'emt5/index/cebfo' ?>">____CeBFO</a></li>
                            <li><a href="<?php echo base_url().'emt5/index/ceppome' ?>">____CePPOME</a></li>
                            <li><a href="<?php echo base_url().'emt5/index/cepstpo' ?>">____CePSTPO</a></li>
                        </ul>
                    </li>
                    <li><a href="#">EMT 6</a>
                        <ul style="display:block">
                            <li><a href="<?php echo base_url().'emt6/index/cc' ?>">____CC</a></li>
                            <li><a href="<?php echo base_url().'emt6/index/da' ?>">____DA</a></li>
                            <li><a href="<?php echo base_url().'emt6/index/ir' ?>">____IR</a></li>
                            <li><a href="<?php echo base_url().'emt6/index/others' ?>">____OTHERS</a></li>
                        </ul>
                    </li>
                    <li><a href="#">EMT 7</a>
                        <ul style="display:block">
                            <li><a href="<?php echo base_url().'emt7/index/esr' ?>">____ESR</a></li>
                            <li><a href="<?php echo base_url().'emt7/index/ws' ?>">____WS</a></li>
                            <li><a href="<?php echo base_url().'emt7/index/bb' ?>">____BB</a></li>
                            <li><a href="<?php echo base_url().'emt7/index/fl' ?>">____FL</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Help (How to)</span></a></li>
            <li><a href="<?php echo base_url().'users/user_info' ?>"><i class="icon icon-tint"></i> <span>Company Information</span></a></li>
            <li><a href="<?php echo base_url().'users/logout'?>"><i class="icon icon-tint"></i> <span>Log Out</span></a></li>
            <!--    <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
    <li class="submenu active"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
      <ul>
        <li><a href="index2.html">Dashboard2</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="invoice.html">Invoice</a></li>
        <li><a href="chat.html">Chat option</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="error403.html">Error 403</a></li>
        <li><a href="error404.html">Error 404</a></li>
        <li><a href="error405.html">Error 405</a></li>
        <li><a href="error500.html">Error 500</a></li>
      </ul>
    </li>-->
            <!--    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>-->
            <!--    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>-->
        </ul>
    </div>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
        </div>
        <!--  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="#"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
      <li class="bg_lg"> <a href="#"> <i class="icon-shopping-cart"></i> Shopping Cart</a> </li>
      <li class="bg_ly"> <a href="#"> <i class=" icon-globe"></i> Web Marketing </a> </li>
      <li class="bg_lo"> <a href="#"> <i class="icon-group"></i> Manage Users </a> </li>
      <li class="bg_ls"> <a href="#"> <i class="icon-signal"></i> Check Statistics</a> </li>
    </ul>
  </div>-->
        <?php $this->load->view($main_view); ?>
    </div>
    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
    </div>
    <!--end-Footer-part-->
    <script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.ui.custom.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.flot.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.flot.resize.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.peity.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/matrix.js"></script>
    <script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/matrix.calendar.js"></script>
    <script src="<?php echo base_url();?>assets/js/matrix.chat.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
    <script src="<?php echo base_url();?>assets/js/matrix.form_validation.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.wizard.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.uniform.js"></script>
    <script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/matrix.popover.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/matrix.tables.js"></script>
    <script src="<?php echo base_url();?>assets/js/matrix.interface.js"></script>

    <script src="<?php echo base_url();?>assets/js/bootstrap-colorpicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.toggle.buttons.js"></script>
    <script src="<?php echo base_url();?>assets/js/masked.js"></script>

    <script src="<?php echo base_url();?>assets/js/matrix.form_common.js"></script>
    <script src="<?php echo base_url();?>assets/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-wysihtml5.js"></script>
    <script>
        $('.textarea_editor').wysihtml5();

    </script>


    <script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage(newURL) {

            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {

                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-") {
                    resetMenu();
                }
                // else, send page to designated URL            
                else {
                    document.location.href = newURL;
                }
            }
        }

        // resets the menu selection upon entry to this page:
        function resetMenu() {
            document.gomenu.selector.selectedIndex = 2;
        }

    </script>
</body>

</html>
