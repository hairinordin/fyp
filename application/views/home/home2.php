<form method="post" action="<?= base_url() ?>auth/login">
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
                        <div class="col col-md-8"><input type="text" name="id" class="form-control"></div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4">Katalaluan</div>
                        <div class="col col-md-8"><input type="password" name="pwd" class="form-control"></div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4"></div>
                        <div class="col col-md-8"><input type="submit" class="btn btn-primary"></div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4"></div>
                        <div class="col col-md-8"><a href="<?= base_url() ?>katalaluan">Lupa Katalaluan</a></div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="col col-md-8" style="background-color: #ffcccc;">
            <b> Pengumuman Terkini : <br> </b>
  <?php 
  if (count ($getText)== 0){
      echo "Tiada pengumuman terkini";
  }
  else {
  echo $getText[0]->textinput;}?> 
  </div>
    </div>
</form>