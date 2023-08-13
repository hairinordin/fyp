<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

 <title>eMAINS</title>
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>theme1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>theme1/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>theme1/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    
<style>
body { 
    background-color:#C7D9EA;
}

</style>
</head>
    
<!--<body background="<?= base_url() ?>assets/img/backg.png" >-->
    <body >
     <div class="text-center mb-4">
    
        <!-- Header for logo -->
        <div id="header"  >
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                     <br>
                  
                    <img class="mb-4" src="<?= base_url() ?>theme1/assets/images/JATA2.png" alt="" width="140" height="120">
                      
                    &nbsp;&nbsp;<img class="mb-4" src="<?= base_url() ?>theme1/assets/images/jaslogo.png" alt="" width="120" height="120">
                

                       <br>
                     <br>
                </div>
            </div>
        </div>
    </div>
        
        <!-- end header -->
        
       <img src="<?= base_url() ?>theme1/assets/images/EMAINS2.png" alt="" width="400" height="130">    
<div class="container">
	<div id="loginbox" class="col-md-12 col-sm-8 loginbox"> 
		<div class="panel panel-info" > 
			<div class="panel-heading"> 
				<div class="panel-title"> Sign In </div> 
				 
			</div> 
			<div class="panel-body panel-pad"> 
				<div id="login-alert" class="alert alert-danger col-sm-12 login-alert"></div> 
                                <form id="loginform" class="form-horizontal" role="form" method="post" action="<?= base_url() ?>auth/login" onsubmit='return validate()' >
						  <div class="form-group">
                                                <?php

                                                $data = array(
                                                                'idpremis' =>$premise_info->IDPREMIS);

                                                echo form_hidden($data);
                                                ?>
                                            </div>

                                        <div class="form-group">
                                            <h4><?=$premise_info->NAMAPREMIS ?><small>   <?= $premise_info->NO_ROC?></small></h4>


                                        </div>

                                            <div class="form-group">
                                            <label>DOE File No - <?=$premise_info->NOFAILJAS ?></label>
                                            </div>


                                          <div class="well">
                                              Kategori Premis - <?= $premise_info->KATEGORIPREMIS?> <br>
                                              SIC - <?= $premise_info->SIC?><br>
                                              SUB SIC - <?= $premise_info->SUB_SIC?>
                                           </div>

                                          <table class="table table-condensed">
                                              <tr>
                                                  <td colspan="2">
                                                      <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                                              <?= $premise_info->PALAMAT . ', ' .$premise_info->PPOSKOD . ', ' . $premise_info->PKODBANDAR ?>
                                              <?= $premise_info->PARLIMEN . ', ' .$premise_info->PKODNEGERI ?>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                     <i class="fa fa-phone fa-lg" aria-hidden="true"></i> <?= ' ' . $premise_info->PNOTELEFON?>
                                                  </td>
                                                  <td>
                                                      <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                     <i class="fa fa-fax fa-lg" aria-hidden="true"></i> <?= ' ' . $premise_info->PNOFAKS?>
                                                  </td>
                                                  <td>

                                                  </td>
                                              </tr>
                                          </table>

                                            <hr>

                                            <table class="table table-bordered">
                                                <tr  class="info">
                                                    <td width="30%">
                                                        Reporting officer
                                                    </td>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        IC No
                                                    </td>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        Position (in company)
                                                    </td>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>
                                            </table>
                                            <small>*orang yang tersenarai diatas akan bertanggungjawab melaporkan EMT</small>
						<div class="form-group margT10"> 
						<!-- Button --> 
							<div class="col-sm-12 controls"> 
                                                            <button type="submit" class="btn btn-block btn-success">Login </button>
							
                                                                <input class="btn btn-block btn-danger" type="reset" value="Cancel">
                                                                
                                      
                                                                <br> <div class="forgot-password" > <a href="#" data-toggle="modal" data-target="#myModal">Forgot password?</a> </div>
							</div> 
                                              
						</div> 
						<div class="form-group"> 
							<div class="col-md-12 control"> 
								<div class="no-acc"> 
									Don't have an account? 
                                                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()" data-toggle="modal" data-target="#searchModal"> <strong>Sign Up Here </strong> </a> 
                                                                        <strong><p>**For DOE officer, please contact DOE HQ for registration**</p> </strong>
								</div> 
							</div> 
						</div> 
					</form> 
				</div> 
		
                    			<div class="panel-heading"> 
                                            <div class="panel-title">
                                                <span >
								<i class="glyphicon glyphicon-book"> </i> &nbsp;<a href="#">User Manual</a> 
							</span> 
                                                <span ><br>
								<i class="glyphicon glyphicon-grain"> </i> &nbsp;<a href="#">Rules and Regulation</a> 
							</span>
                                            </div> 
				 
			</div> 
                
                </div> 
		</div> 		
</div> 
        
        
        <!-- Footer -->
        <div id="footer" style="background-color:#89bdd3">
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    
                    <!--<p style="font-size:1.2em;color:#b1d800;font-weight:bold">The site is best viewed in....</p> -->

                    <br>

                    <p><strong>Jabatan Alam Sekitar, Malaysia <br> Kementerian Sumber Asli Dan Alam Sekitar</strong> <br>Aras3, Podium 3, Wisma Sumber Asli, No.25, Persiaran Perdana, Presint 4, 62574 W.P. PUTRAJAYA <br>General Line: 03 - 8871 2000 / 8871 2200 Fax Number : 03 - 8889 1973/75</p>
                     <br>
                

                    <p style="font-size:0.8em">Disclaimer : The Government of Malaysia shall not be liable for any loss or damage caused by the usage of any information obtained from this web site.
                    <br>Best viewed in 1024 x 768 using Google Chrome or Mozilla Firefox </p>
                     <br>
                </div>
            </div>
        </div>
    </div>
        
        <!-- end footer -->
        </div>
</body>
</html>



