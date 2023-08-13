<div class="col-md-8">

<div class="form-group">
    <h4><?=$premise_info->namapremis ?><small>   <?= $premise_info->no_roc?></small></h4>
    <label>DOE File No - <?=$premise_info->nofaildoe ?></label>
	
</div>

  
  <div class="well">
      Kategori Premis - <?= $premise_info->kategori_premis?> <br>
      SIC - <?= $premise_info->sic?><br>
      SUB SIC - <?= $premise_info->subsic?>
   </div>
  
  <table class="table table-condensed">
      <tr>
          <td colspan="2">
              <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
      <?= $premise_info->alamat . ', ' .$premise_info->poskod . ', ' . $premise_info->bandar ?>
      <?= $premise_info->parlimen . ', ' .$premise_info->negeri ?>
          </td>
      </tr>
      <tr>
          <td>
             <i class="fa fa-phone fa-lg" aria-hidden="true"></i> <?= ' ' . $premise_info->telefon?>
          </td>
          <td>
              <i class="fa fa-envelope fa-lg" aria-hidden="true"></i><?= ' ' . $premise_info->email ?>
          </td>
      </tr>
      <tr>
          <td>
             <i class="fa fa-fax fa-lg" aria-hidden="true"></i> <?= ' ' . $premise_info->faks?>
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
                <?= $premise_info->name?>
            </td>
        </tr>
        
        <tr>
            <td>
                IC No
            </td>
            <td>
                <?= $premise_info->ic_no?>
            </td>
        </tr>
        
        <tr>
            <td>
                Position (in company)
            </td>
            <td>
                <?= $premise_info->position?>
            </td>
        </tr>
    </table>
    <small>*orang yang tersenarai diatas akan bertanggungjawab melaporkan EMT</small>
    <hr>
</div>

<div class="row">
       

<div class="col-md-12">
    <legend>Details Score</legend>
        <!-- Default panel contents -->

           
            <table class="table table-full table-hover">
                <thead>
                <th>Tool</th>
                <th>Score</th>
                 <th>Rated by</th>
                 <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>Tool 1</td>
                        <td>10</td>
                        <td>Pegawai Kawalan 1</td>
                        <td><a href="<?php echo base_url('questions/view_answer/' . $premise_info->idpremis .'/1') ?>" >View answers/feedback</a></td>
                    </tr>
                    <tr>
                        <td>Tool 2</td>
                        <td>25</td>
                        <td>Pegawai Kawalan 1</td>
                        <td><a href="<?php echo base_url('questions/view_answer/' . $premise_info->idpremis .'/2') ?>" >View answers/feedback</a></td>
                    </tr>
                    <tr>
                        <td>Tool 3</td>
                        <td>10</td>
                        <td>Pegawai Kawalan 1</td>
                        <td><a href="<?php echo base_url('questions/view_answer/' . $premise_info->idpremis .'/3') ?>" >View answers/feedback</a></td>
                    </tr>
                    <tr>
                        <td>Tool 4</td>
                        <td>10</td>
                        <td>Pegawai Kawalan 2</td>
                        <td><a href="<?php echo base_url('questions/view_answer/' . $premise_info->idpremis .'/4') ?>" >View answers/feedback</a></td>
                    </tr>
                    <tr>
                        <td>Tool 5</td>
                        <td>20</td>
                        <td>Pegawai Kawalan 2</td>
                        <td><a href="<?php echo base_url('questions/view_answer/' . $premise_info->idpremis .'/5') ?>" >View answers/feedback</a></td>
                    </tr>
                    <tr>
                        <td>Tool 6</td>
                        <td>10</td>
                        <td>Pegawai Kawalan 1</td>
                        <td><a href="<?php echo base_url('questions/view_answer/' . $premise_info->idpremis .'/6') ?>" >View answers/feedback</a></td>
                    </tr>
                    <tr>
                        <td>Tool 7</td>
                        <td>10</td>
                        <td>Pegawai Kawalan 1</td>
                        <td><a href="<?php echo base_url('questions/view_answer/' . $premise_info->idpremis .'/7') ?>" >View answers/feedback</a></td>
                    </tr>
                    
                </tbody>
            </table>
   

    </div></div>


