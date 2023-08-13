  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo base_url(); ?>assets/img/demo/stock1.jpg" alt="Stock Photo 1" style="width:100%;">
      </div>

      <div class="item">
        <img src="<?php echo base_url(); ?>assets/img/demo/stock2.jpg" alt="Stock Photo 2" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="<?php echo base_url(); ?>assets/img/demo/stock3.jpg" alt="Stock Photo 3"style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


<div class="jumbotron">
    That's what it said on 'Ask Jeeves.'

There's so many poorly chosen words in that sentence. First place chick is hot, but has an attitude, doesn't date magicians. No… but I'd like to be asked! As you may or may not know, Lindsay and I have hit a bit of a rough patch.

Well, what do you expect, mother? No… but I'd like to be asked! Bad news. Andy Griffith turned us down. He didn't like his trailer. I don't understand the question, and I won't respond to it. Now, when you do this without getting punched in the chest, you'll have more fun.
                <p><a href="<?= base_url() ?>users/find" class="btn btn-primary btn-lg btn-block btn-huge">Pendaftaran Industri <i class="glyphicon glyphicon-chevron-right"></i></a>
                </p>
            </div>



<form method="post" action="<?= base_url() ?>auth/login" onsubmit='return validate()'>
    <div class="row">
        <div class="col col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Log Masuk</div>
                <div class="panel-body">
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
                        <div class="col col-md-8"><input type="text" name="id" class="form-control" required></div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4">Katalaluan</div>
                        <div class="col col-md-8"><input type="password" name="pwd" class="form-control" required></div>
                    </div>
                    <div class="row">
                        <div class="col col-md-1"></div>
                        <div class="col col-md-11"><input type="submit" class="btn btn-primary" value="Log Masuk">&ensp;<input type="button" value="Lupa Katalaluan" class="btn btn-warning" data-toggle="modal" data-target="#myModal"></div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4"></div>
<!--                        <div class="col col-md-8"><a href="<?= base_url() ?>katalaluan">Lupa Katalaluan</a></div>-->
                        <div class="col col-md-8"></div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="col col-md-8 well" style="background-color: #ffcccc;"><b> Pengumuman Terkini : <br> </b>
  <?php 
  if (count ($getText)== 0){
      echo "Tiada pengumuman terkini";
  }
  else {
  echo $getText[0]->textinput;}?> </div>
    </div>
</form>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tukar kata laluan</h4>
      </div>
      <div class="modal-body">         
          <form id="resetPassword" name="resetPassword" method="post" action="<?php echo base_url();?>auth/forgotPassword" onsubmit ='return validate()'>
         <table class="table table-bordered table-hover table-striped">                                      
                    <tbody>
                        <tr>
                            <td>
                                No Fail JAS:
                            </td>
                            <td>
                            <input type="text" name="nofailjas" id="nofailjas" style="width:250px" required>
                            </td>
                            
                        </tr>
                    <tr>
                    <td>Emel: </td>
                    <td>
                <input type="email" name="email" id="email" style="width:250px" required>
                
                 </td>
           
                    <td><input type = "submit" value="submit" class="button"></td>
                    </tr>
                   
                    </tbody>               </table></form> 
                                     <div id="fade" class="black_overlay"></div>       
                      
        </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>