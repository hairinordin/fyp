<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>eMAINS</title>
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
        <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded" rel="stylesheet">
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/assets/css/dashboard.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= base_url() ?>theme1/bootstrap/css/bootstrap.min.css">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
        <link href="<?= base_url() ?>theme1/assets/css/loader.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url() ?>theme1/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>theme1/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Notify -->
        <link href="<?= base_url() ?>theme1/assets/bs-notify/animate.css" rel="stylesheet" type="text/css" />
        <!-- BS Notify -->
        <script type="text/javascript" src="<?= base_url() ?>theme1/assets/bs-notify/bootstrap-notify.js"></script>
        <!-- JQUERY VALIDATION -->
        <script type="text/javascript" src="<?= base_url() ?>theme1/assets/jq-validation/dist/jquery.validate.js"></script>

        <style>
            body { 
                background-color:#C7D9EA;
                font-family: 'Encode Sans Expanded', sans-serif;
                font-size: 12px;

            }

            .error{
                color: red;
            }
            /*Fix unscrollable modal*/
            .modal {
                overflow-y:auto;
            }
            #myVideo {
                position: fixed;
                right: 0;
                bottom: 0;
                min-width: 100%; 
                min-height: 100%;
            }
            
            .nav-tabs > li, .nav-pills > li {
                float:none;
                display:inline-block;
                *display:inline; /* ie7 fix */
                 zoom:1; /* hasLayout ie7 trigger */
            }

            .nav-tabs, .nav-pills {
                text-align:center;
            }
            .panel{border-bottom:0;
            border-left:0;
            border-right:0;}
            .panel.with-nav-tabs .panel-heading{
                padding: 5px 5px 0 5px;
            }
            .panel.with-nav-tabs .nav-tabs{
                    border-bottom: none;
            }
            .panel.with-nav-tabs .nav-justified{
                    margin-bottom: -1px;
            }

        </style>
        <meta name="google-site-verification" content="gw1X-ow2ri33O7gEuMNl-uXR97WN8DVzi-kk-GKkNzE" />
    </head>

<!--<body background="<?= base_url() ?>assets/img/backg.png" >-->
    <body >
        <video autoplay muted loop id="myVideo">
           <source src="<?= base_url() ?>theme1/assets/truck.mp4" type="video/mp4">
            Your browser does not support HTML5 video. Please update your browser to the latest version.
        </video>
        <div class="text-center mb-4">

            <!-- Header for logo -->
            <div id="header"  >
                <div class="container" >
                    <div class="row">
                        <div class="col-md-12">
                            <br>

                            <img class="mb-4" src="<?= base_url() ?>theme1/assets/images/JATA2.png" alt="" width="140" height="120">
                            <br>
                            <img src="<?= base_url() ?>theme1/assets/images/EMAINS2.png" alt="" width="510" height="150">  
<!--                            &nbsp;&nbsp;<img class="mb-4" src="<?= base_url() ?>theme1/assets/images/jaslogo.png" alt="" width="120" height="120">-->



                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end header -->


            <div class="container">
                <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 loginbox"> 
                    <div class="panel with-nav-tabs panel-info" > 
                        <div class="panel-heading"> 
                            <div class="panel-title" style="font-size:100%">
                                <ul class="nav nav-pills">       
                                    <li class="dropdown">
                                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-book"> </i> &nbsp;Directive <span class="caret"></span></a>
                                      <ul class="dropdown-menu">
                                        <li><a href="<?= base_url() ?>theme1/assets/EM_Directive_BM.pdf">Malay</a></li>
                                        <li><a href="<?= base_url() ?>theme1/assets/EM_Directive_BI.pdf">English</a></li>                       
                                      </ul>
                                    </li>
                                    <li><a href="<?= base_url() ?>theme1/assets/Explanatory-Note-for-EMT-Compliance-Report_EMAINS_.pdf"><i class="glyphicon glyphicon-grain"> </i> &nbsp;Explanatory Notes</a></li>
                                    <li><a href="<?= base_url() ?>theme1/assets/User-Manual-Premise.pdf"><i class="glyphicon glyphicon-hand-right"> </i> &nbsp;User Manual</a> </li>
                                    <li><a href="#" data-toggle="modal" data-target="#contactModal" ><i class="glyphicon glyphicon-envelope"></i> &nbsp;Contact Us</a> </li>
                                  </ul>
                            </div> 

                        </div> 
                        <div class="panel-body panel-pad"> 
                            <div id="login-alert" class="alert alert-danger col-sm-12 login-alert"></div> 
                            <form id="loginform" class="form-horizontal" role="form" method="post" action="<?= base_url() ?>auth/login" >


                                <div class="input-group margT25"> 
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span> 
                                    <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username" required> 
                                </div> 
                                <div class="input-group margT25"> 
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
                                    <input id="login-password" type="password" class="form-control" name="pwd" placeholder="password" required> 
                                </div> 
                                <div class="input-group margT25 checkbox">
                                    <label style="font-size:13px"><input type="checkbox" name="doe_chkbox"> DOE Officer</label>
                                </div>
                                <div class="form-group margT10"> 
                                    <div class="col-sm-12 controls"> 
                                        <?php if ($this->session->flashdata('err')): ?>
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Warning!</strong> <?= $this->session->flashdata('err'); ?>
                                            </div>

                                        <?php endif; ?>

                                        <?php if ($this->session->flashdata('success')): ?>
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Password reset!</strong> <?= $this->session->flashdata('success'); ?>
                                            </div>

                                        <?php endif; ?>

                                    </div>
                                </div> 
                                <div class="form-group margT10"> 
                                    <!-- Button --> 
                                    <div class="col-sm-12 controls"> 
                                        <button type="submit" class="btn btn-block btn-success">Login </button>

                                        <input class="btn btn-block btn-danger" type="reset" value="Cancel">


                                        <br> <div class="forgot-password" > <a href="#" data-toggle="modal" data-target="#myModal" style="font-size:12px" >Forgot password?</a> </div>
                                    </div> 

                                </div> 

                                <div class="form-group"> 
                                    <div class="col-md-12 control"> 
                                        <div class="no-acc"> 
                                            <h4>Don't have an account? 
                                                <a href="#" data-toggle="modal" data-target="#searchModal"> <strong>Sign Up Here </strong> </a> </h4>
                                            <strong><p>**For DOE officer, please contact DOE HQ for registration**</p> </strong>
                                        </div> 
                                    </div> 
                                </div> 
                            </form>
                            <div class="form-group"> 
                                <!-- Button --> 
                                <?php if (isset($maklumat_wujud)): ?>

                                    <div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                                        <h4 class="alert-heading"><?php echo $premise_info->NAMAPREMIS; ?></h4>
    <!--                                                            <span class=""><a href="<?php echo base_url() . 'auth/view_profile/' . $premise_info->IDPREMIS; ?>" class="flip-link btn btn-success" id="to-recover">Verify Premise Information</a></span>-->
                                        <button data-dismiss="modal" onclick="populate_user('<?php echo $premise_info->IDPREMIS; ?>')"> Verify </button>

                                    </div>
                                <?php endif; ?>	
                            </div>  
                        </div> 
                    </div> 
                </div> 


            </div> 


            <!-- Footer -->
            <div id="footer" style="background-color:#89bdd3; color: white">
                <div class="container" >
                    <div class="row">
                        <div class="col-md-12">

<!--<p style="font-size:1.2em;color:#b1d800;font-weight:bold">The site is best viewed in....</p> -->

                            <br>

                            <p><strong>Jabatan Alam Sekitar </strong> <br><strong>Kementerian Sumber Asli, Alam Sekitar Dan Perubahan Iklim</strong><br>Aras 1 - 4, Podium 2 & 3, Wisma Sumber Asli No.25, Persiaran Perdana, Presint 4, <br>Pusat Pentadbiran Kerajaan Persekutuan, 62574 Putrajaya, Malaysia. <br>General Line: 03 - 8871 2000 / 8871 2200 Fax Number : 03 - 8889 1973/75</p>
                            <br>


                            <p style="font-size:0.8em">Disclaimer : The Government of Malaysia shall not be liable for any loss or damage caused by the usage of any information obtained from this web site.
                                <br>Best viewed in 1024 x 768 using Google Chrome </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end footer -->
        </div>
        <!-- Image loader -->
        <!--    <div class="se-pre-con"></div>-->
    </body>
</html>

<script>
    
    var today = (new Date()).getTime();
		var expired = (new Date("22 May 2023")).getTime(); //Hari last event pendigitalan jas

		if(today <= expired) {
			$(window).on('load', function() {
			$('#eswisModal').modal('show');
			});
		//alert("Working!");
		}
                
    $(document).ready(function () {
        //$.notify("Front page loaded");
        //$("#eswisModal").modal('show');
        
        if (navigator.userAgent.search("Chrome") >= 0) {
            console.log('Compatible browser used. ^_^ ');
        } else {
            $('#compabilityModal').modal({
    		backdrop: 'static',
    		keyboard: false
		});
           $("#compabilityModal").modal('show');
           
        }
        
        $("#form").validate();
        $("#btnSave").click(function () {

            if ($("#form").valid()) {
                $("#btnSave").attr("disabled", "disabled");
                register();

            } else {
                alert("Please fill up the form!");
            }

        });
    });

    function populate_user(id)
    {

        //save_method = 'update';
       // $('#form')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('auth/ajax_signup/') ?>",
            data: {'nofail' : id},
            type: "POST",
            dataType: "JSON",
            success: function (data)
            {
                //var old = JSON.stringify(data).replace(/null/g, '"Information not provided"'); //convert to JSON string
                var old = JSON.stringify(data, (key, value) => {
                        if (value === null && typeof value === "object") {
                          return "Information not provided";
                        }
                        return value;
                      });
                var data = JSON.parse(old);

                $('[name="id"]').val(data[0].ID_PREMIS);
                $('[name="nofail"]').val(data[0].NO_FAIL_JAS);
                $('[name="namapremis"]').val(data[0].PREMIS);
                // $('[name="sic"]').val(data.SIC);
                // $('[name="subsic"]').val(data.SUB_SIC);
                // $('[name="jnsindustri"]').val(data.JNSINDUSTRI);
                $('[name="alamat"]').val(data[0].ALAMAT_PREMIS_1);
                $('[name="sposkod"]').val(data[0].POSKOD_PREMIS);
                // $('[name="skodbandar"]').val(data.PKODBANDAR);
                // $('[name="skodnegeri"]').val(data.PKODNEGERI);
                $('[name="snotelefon"]').val(data[0].NO_TEL_PREMIS);
                $('[name="snofaks"]').val(data[0].NO_FAKS_PREMIS);
                $('[name="parlimen"]').val(data[0].PARLIMEN_PREMIS_DESC);
                // $('[name="keep"]').val(data.KEEP);
                // $('[name="effluent"]').val(data.EFFLUENT);
                // $('[name="bt"]').val(data.BT);
                // $('[name="pub"]').val(data.PUB);
                // $('[name="kg"]').val(data.KG);
                // $('[name="kks"]').val(data.KKS);
                // $('[name="tp"]').val(data.TP);
                // $('[name="pydtbt"]').val(data.PYDT_BT);
                // $('[name="loji"]').val(data.LOJI);
                // $('[name="sewage"]').val(data.SEWAGE);
                // $('[name="sisapepejal"]').val(data.SISA_PEPEJAL);
                // $('[name="kategoripremis"]').val(data.KATEGORIPREMIS);
                // $('[name="tertaklukeff"]').val(data.TERTAKLUK_EFF);
                // $('[name="tertaklukkum"]').val(data.TERTAKLUK_KUM);
                // $('[name="tertaklukpub"]').val(data.TERTAKLUK_PUB);

                $('#modal_view').modal('show'); // show bootstrap modal when complete loaded

                //$('.modal-title').text('Premise Information'); // Set title to Bootstrap modal title
                console.log(data[0].NO_FAIL_JAS);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function register()
    {
        var url;

        url = "<?php echo site_url('auth/ajax_register/') ?>";

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            beforeSend: function () {
                $("#loader").show();
            },
            success: function (data)
            {
                //if success close modal and reload ajax table
                $('#modal_view').modal('hide');
                //location.reload();// for reload a page
                //alert('Registration successful');
                //

                if (data.ajax_status === 'success') {
                    $.notify({
                        message: "Registration is successful, please log in"
                    },
                            {
                                placement: {
                                    from: "top",
                                    align: "center"
                                },
                                type: "success"
                            });

                } else if (data.ajax_status === 'error in database') {
                    $.notify({
                        message: "There's something wrong, please contact administrator"
                    },
                            {
                                placement: {
                                    from: "top",
                                    align: "center"
                                },
                                type: "danger"
                            });
                } else if (data.ajax_status === 'email exists') {
                    $.notify({
                        message: "Email already exists, please use different email address"
                    },
                            {
                                placement: {
                                    from: "top",
                                    align: "center"
                                },
                                type: "danger"
                            });
                }
            },
            complete: function (data) {
                // Hide image container
                $("#loader").hide();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Some error occured, please contact administrator');
//                console.log('jqXHR - ' + jqXHR);
//                console.log('textStatus - ' + textStatus);
//                console.log('errorThrown - ' + errorThrown);
//                console.log('FORM - ' + $('#form').serialize());

            }

        });
    }


    function search() {

        var namapremis = $("#nama_premis").val();
        var nofail = $("#no_fail_jas").val();


        if(nofail.length !== 0){
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('auth/ajax_find/') ?>",
            type: "POST",
            data: {nama_premis: namapremis, no_fail_jas: nofail},
            cache: false,
            success: function (data) {
                //console.log(data);
                if (data == 'registered') {
                    $(".search-footer").empty().append('Have been registered.');
                } else if (data === 'undefined') {
                    $(".search-footer").empty().append('Not Found, Please contact DOE');
                    
                }else {
                    //console.log(data);
                    var data = JSON.parse(data);
                    
                    if(data.status == '500'){
                    $(".search-footer").empty().append('Not Found, Please contact DOE');
                    } else {
                      var pematuhan = data[0].KATEGORI_PEMATUHAN_DESC.PEMATUHAN;
//                    console.log(pematuhan);
//
//                    pematuhan.forEach(function(patuh){
//                        console.log(patuh.DESCRIPTION);
//                        console.log(patuh.bt); //1
//                        console.log(patuh.pub); //undefined
//                    });
                   // console.log(pematuhan.indexOf(bt));
            
                    var btnstart = '<mark>Is this your company? If not please contact DOE for assistant</mark> <button class="btn btn-lg btn-default" data-dismiss="modal" onclick="populate_user(';
                    var btnend = ')"> Sign Up </button></div>';

                    var lblStart = '<hr><div class="row"><h4>';
                    var lblEnd = '</h4>';
                    $(".search-footer").empty().append(lblStart + " " + data[0].PREMIS + " " + lblEnd + " " + btnstart + " '" + data[0].NO_FAIL_JAS + "'" + btnend);  
                    }   
                    

                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error getting data from ajax');
            }
        });
        } else {
        alert('Doe File No is mandatory');
        }

        $("#register_form").trigger("reset");
    }





</script>


<div id="download_modal" class="modal fade bs-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="dialog-download">
            <br/><br/><h2>Your Download is ready.</h2>
            <hr/>
            Your Download link is here<a id="download_link" target="_blank"> </a>
            <br/>
        </div>
    </div>
</div>

<!--################################ MODAL FORGOT PASSWORD ################################-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Forgot Password?</h4>
            </div>
            <div class="modal-body">         
                <form id="resetPassword" name="resetPassword" method="post" action="<?php echo base_url(); ?>auth/forgotPassword" onsubmit ='return validate()'>
                    <table class="table table-bordered table-hover table-striped">                                      
                        <tbody>
<!--                            <tr>
                                <td>
                                    DOE File No
                                </td>
                                <td>
                                    <input type="text" name="nofailjas" id="nofailjas" style="width:250px" required>
                                </td>

                            </tr>-->
                            <tr>
                                <td>Email </td>
                                <td>
                                    <input type="email" name="email" id="email" style="width:250px" required>



                                    <input type = "submit" value="submit" class="button">


                        </tbody>               </table></form> 
                <div id="fade" class="black_overlay"></div>       

            </div>  

        </div>
    </div>
</div>


<!--################################ MODAL SEARCH PREMISES ################################-->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="loginbox" style="align-content: center; padding-top: 10%">



                    <?php
                    echo '<b style="color:red">*</b>';
                    echo form_label('DOE File No');
                    $data = array(
                        'class' => 'form-control',
                        'name' => 'no_fail_jas',
                        'id' => 'no_fail_jas',
                        'placeholder' => 'eg : AS(S)001/001/001',
                        'value' => set_value('no_fail_jas') //repopulating field
                    );
                    echo form_input($data);
                    ?>
                    <br>

                    <?php
                    //echo '<b style="color:red">*</b>';
                    echo form_label('Premise Name');
                    $data = array(
                        'class' => 'form-control',
                        'name' => 'nama_premis',
                        'id' => 'nama_premis',
                        'placeholder' => 'eg : Syarikat Rafflesia ',
                        'value' => set_value('nama_premis')
                    );
                    echo form_input($data);
                    ?>





                </div>
                <hr>
                <?php
                $data = array(
                    'class' => 'btn btn-primary',
                    'name' => 'submit',
                    'value' => 'Search',
                    'id' => 'search',
                    'onClick' => 'search()'
                );
                echo form_submit($data);
                ?>
                <button type="reset" class="btn btn-warning" data-dismiss="modal" >Close</button>
            </div>
            <div class="modal-footer search-footer">


            </div>
        </div>
    </div>
</div>


<!--################################ MODAL CONTACT ################################-->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <br>
                Contact Us
                <a href="mailto:emainssupport@doe.gov.my" target="_blank">emainssupport(alias)doe(dot)gov(dot)my</a>
            </div>
        </div>
    </div>
</div>

<!--<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="col-md-12">
<?php echo validation_errors("<a class='close' data-dismiss='alert' href='#'>×</a>"); ?>
    <div id="loginbox" style="align-content: center">
<?php $attributes = array('id' => 'register_form', 'class' => 'form_horizontal'); ?>



<p class="bg-success">
<?php
if ($this->session->flashdata('user_registered')):
    echo $this->session->flashdata('user_registered');
endif;
?>
</p>   
<?php echo form_open('auth/find', $attributes); ?>
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="panel panel-default">
    <div class="panel-body">
        
<?php
echo '<b style="color:red">*</b>';
echo form_label('DOE File No');
$data = array(
    'class' => 'form-control',
    'name' => 'no_fail_jas',
    'placeholder' => 'Contoh : AS(S)001/001/001',
    'value' => set_value('no_fail_jas') //repopulating field
);
echo form_input($data);
?>

<?php
echo '<b style="color:red">*</b>';
echo form_label('Premise Name');
$data = array(
    'class' => 'form-control',
    'name' => 'nama_premis',
    'placeholder' => 'Syarikat ABC',
    'value' => set_value('nama_premis')
);
echo form_input($data);
?>
        </div>
        <div class="panel-footer">
        
<?php
$data = array(
    'class' => 'btn btn-primary',
    'name' => 'submit',
    'value' => 'Search'
);
echo form_submit($data);
?>
          
        </div>
    
</div>
</div>
<div class="col-md-4"></div>      

            <div class="form-actions">
                                
                
            </div>
                        
<?php echo form_close(); ?>
    
  
</div>
</div>
</div>-->

<!--################################ MODAL DIPLAY PREMISES INFO ################################-->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_view" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form" class="form-horizontal" onsubmit ='return validate()'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Company Information - Sign Up</h3>
                </div>
                <div class="modal-body form ">

                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">DOE File No</label>
                            <div class="col-md-3">
                                <input name="nofail" placeholder="" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Premise Name</label>
                            <div class="col-md-9">
                                <input name="namapremis" placeholder="Premise Name" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <input name="alamat" placeholder="" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <!--                        <div class="form-group">
                                                    <label class="control-label col-md-3">Post Code</label>
                                                    <div class="col-md-3">
                                                        <input name="sposkod" placeholder="" class="form-control" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Town</label>
                                                    <div class="col-md-3">
                                                        <input name="skodbandar" placeholder="" class="form-control" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Parliament</label>
                                                    <div class="col-md-3">
                                                        <input name="parlimen" placeholder="" class="form-control" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">State</label>
                                                    <div class="col-md-3">
                                                        <input name="skodnegeri" placeholder="" class="form-control" type="text" readonly>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-md-3">Industry</label>
                                                    <div class="col-md-4">
                                                        <input name="sic" placeholder="" class="form-control" type="text" readonly>
                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Sub Industry</label>
                                                    <div class="col-md-4">
                                                        <input name="subsic" placeholder="" class="form-control" type="text" readonly>
                                                    </div>
                                                </div>-->

                        <div class="form-group">
                            <label class="control-label col-md-3">Phone</label>
                            <div class="col-md-3">
                                <input name="snotelefon" placeholder="Phone No" class="form-control" type="text" readonly>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Fax</label>
                            <div class="col-md-3">
                                <input name="snofaks" placeholder="Fax No" class="form-control" type="text" readonly>

                            </div>
                        </div>

                        <hr>
                        <h3>Contact Information</h3>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <input name="name" placeholder="Name" class="form-control" type="text" title="Please fill up this field" required minlength="3">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">IC No</label>
                            <div class="col-md-9">
                                <input name="icno" placeholder="IC No" class="form-control" type="number" title="Please enter your IC No(Only numbers allowed)" required maxlength="12" >


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Designation</label>
                            <div class="col-md-9">
                                <input name="position" placeholder="Designation" class="form-control" type="text" title="Please fill up this field" required minlength="3">


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" placeholder="Email" class="form-control" type="email" title="Please enter your email" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="username" placeholder="Username" class="form-control" type="text" title="Please enter your username(at least 6 characters)" required  minlength="6">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input id="password1" name="password" placeholder="******" class="form-control" type="password" title="your password must be at least 6 characters long" required minlength="6" maxlength="40">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Confirm Password</label>
                            <div class="col-md-9">
                                <input id="password2" name="confirm_password" placeholder="******" equalTo="#password1" class="form-control" type="password" title="Password not match!" required minlength="6" maxlength="40">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" class="btn btn-primary">Register</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- BROWSER-COMPATIBILITY MODAL-->
<div id="compabilityModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">You are using an unsupported browser</h4>
            </div>
            <div class="modal-body">
                <p style="text-align:center">
                    <a href="" data-dismiss="modal" onclick="javascript:window.location='https://www.google.com/chrome/'">
                        <img src="<?= base_url() ?>theme1/assets/images/chrome_compatible.png" title="Chrome Only" alt="Flower">
                    </a>
                    
                </p>
            </div>
        </div>
    </div>
</div>
<!-- ESWIS MODAL-->
<div id="eswisModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">WEBINAR PEMERKASAAN PENGUATKUASAAN & PEMATUHAN AKAS 1974</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
            </div>
            <div class="modal-body">
                <p class="text-center">
                    <!-- <a href="" data-dismiss="modal" onclick="javascript:window.open('https://eswis.doe.gov.my/', '_blank');">
                        <img class="img-responsive" src="<?= base_url() ?>theme1/assets/images/eswis_pematuhan.png" title="ESWIS" alt="Flower">
                    </a> -->
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLScArbf1m9jLIT1IK1IGw1Nt3lT4PCnjKeIQ8cJhsK7gHgc-jQ/viewform" target="_blank">
                        <img class="img-responsive" src="https://mypremis.doe.gov.my/storage/announcement/1683597837_73d5637c064bff70e047.jpeg" title="WEBINAR PEMERKASAAN PENGUATKUASAAN & PEMATUHAN AKAS 1974">
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
//    $('#searchModal').on('hidden.bs.modal', function () {  --Cari solution lain, sebab mengganggu proses sign up
//        location.reload();
//    })
</script>