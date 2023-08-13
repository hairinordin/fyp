<legend>List of Premises Submission</legend> 
<div class="row">
    <div class="col-md-12 well">
        <form method="post" action="<?= base_url() ?>answers/">

            <div class="form-group col-md-4">   
                <input type="text" class="form-control" name="search_txt" placeholder="Search" value="<?= $search ?>"> 
            </div>
            <div class="form-group col-md-3">
                <button type="submit" value="Search" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
                <a href="<?= base_url('answers/reset/'); ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Reset">Reset</a>
            </div>
        </form>

    </div>
    
    <div class="col-md-12">
        <label>No of records : <?= $total_rows ?></label>
    </div>

    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <th>No</th>
            <th>Premise Name</th>
            <th>Cawangan JAS</th>
            <th>City</th>
            <th>State</th>
            <th>Pegawai Pemeriksa</th>
<!--            <th>Pegawai Penyelia</th>
            <th>Pegawai Pelulus</th>-->
            <th>Date Submitted</th>
            <th>Status <a href="#" data-toggle="modal" data-target="#tipsModal" title="Status Definition" data-content=""><i class="fa fa-2x fa-question"></i></a></th> 
            <?php //if($this->role == 'ADM' && $this->state == '16'){ ?>
            
            <?php //} else { ?>
            <th>Action</th>
            <?php //} ?>
            </thead>
            <?php 
//            echo '<pre>';
//            print_r($premis_berdaftar );
//            echo '</pre>';
            ?>
            <?php foreach ($premis_berdaftar as $premise): ?>
                <tr>
                    <td>
                        <?= ++$row ?>
                    </td>
                    <td>
                        <?= $premise->namapremis ?>
                    </td>
                    <td>
                        <?= $premise->cawangan_jas ?>
                    </td>
                    <td>
                        <?= $premise->bandar ?>
                    </td>
                    <td>
                        <?= $premise->negeri ?>
                    </td>
                    <td>
                        <?= isset($premise->reviewed_by) ? $premise->reviewed_by : ''  ?> <!-- Pemeriksa -->
                    </td>
<!--                    <td>
                        <?= isset($premise->reviewed_by) ? $premise->reviewed_by : ''  ?> Penyelia 
                    </td>
                    <td>
                        <?= isset($premise->reviewed_by) ? $premise->reviewed_by : ''  ?> Pelulus 
                    </td>-->
                    <td>
                        <?= ($premise->submission_date != '0000-00-00') ? date("d/m/Y", strtotime($premise->submission_date)) : ''  ?>
                    </td>
                    <td>
                        <?php
                        if($premise->emt_status == 2 ){
                            echo 'Pending for assessment';
                        } else if ($premise->emt_status == 4 || $premise->emt_status == 5 ){
                            echo 'Pegawai Penyelia Verification';
                        } else if($premise->emt_status == 3) {
                            echo $premise->assessmentComplete ? 'Review completed' : 'Being reviewed by Pegawai Pemeriksa';
                           
                        } else if($premise->emt_status == 1) {
                            echo 'Draft';
                        } else if($premise->emt_status == 6) {
                            echo 'Revert to premise';
                        } else if ($premise->emt_status == 7 || $premise->emt_status == 8) {
                            echo 'Pegawai Pelulus Approval';
                        }
                        ?>
                    </td>
                    <?php if($this->role == 'ADM' && $this->state == '16'){ ?>
                    <td>
                            <?php echo '<a href="' . base_url() . 'remark/pemeriksa_form/' . $premise->idpremis . '/' . $premise->id . ' ">View</a>' ?>
                    </td> 
                    <?php } else { ?>
                    <td>
                        <?php 
                        // 2 - Submit
                        // 3 - Review
                        // 13 - Review (Draft)
                        $arrayStatus = array(1, 4, 5, 6, 7, 8, 9, 10, 11); ?>
                        <?php if(!in_array($premise->emt_status, $arrayStatus) && $this->role == 'PM'){ 
                            
                            if($premise->verification_type == ''){
                                $displayTxt = 'Validate';
                            } else {
                                $displayTxt = 'Continue Validate';
                            } 

                            ?>
                        <!-- New Validate atau Continue dari Draft atau Assessment Complete -->
                        <?php //if($premise->assessmentComplete && $premise->emt_status == 3){ 
                        if($premise->assessmentComplete && ($premise->emt_status == 4 || $premise->emt_status == 5)){ 
                        ?>
                        <a href="<?= base_url() . 'answers/answersbaru/' . $premise->idpremis . '/'. $premise->id ?>">View</a> |
                        <?php } else { ?>
<!--                        <a href="<?= base_url() . 'answers/answers_by_premise/' . $premise->idpremis . '/'. $premise->id ?>"><?= $displayTxt?></a> |-->
                          <a href="<?= base_url() . 'answers/answersbaru/' . $premise->idpremis . '/'. $premise->id ?>"><?= $displayTxt?></a> |
                        <?php } ?> 
                        <?php } else if ($premise->emt_status != 1) { ?>
                        
                        <a href="<?= base_url() . 'answers/answersbaru/' . $premise->idpremis . '/'. $premise->id ?>">View</a> |
                        <?php    } ?>
                        
                        <a href="<?= base_url() . 'answers/view_review/' . $premise->idpremis ?>">Overview</a>
<!--                        <a href="<?= base_url() . 'answers/print_answers/' . $premise->idpremis. '/'. $premise->id ?>"  >| Print</a>-->
                        <a href="javascript: w=window.open('<?= base_url() . 'answers/print_answers/' . $premise->idpremis. '/'. $premise->id ?>'); w.print();"  >| Print</a>
                        
                    </td>
                     <?php } ?>
                </tr>
           
            <?php endforeach; ?>



        </table>
        <nav aria-label="Page navigation">
    <ul class="pagination">
        <?php echo $this->pagination->create_links(); ?>
    </ul>
</nav>
    </div></div>

<!-- Modal -->
<div id="tipsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p><table class="table">
        <tr>
            <td>1)</td><td>Pending for assessment - EMT dihantar daripada Premis kepada pegawai pemeriksa untuk dinilai</td>
        </tr>
        <tr>
            <td>2)</td><td>Being Review by Pegawai Pemeriksa - EMT sedang disemak/nilai oleh pegawai pemeriksa</td>
        </tr>
        <tr>
            <td>3)</td><td>Review Completed - EMT telah dinilai</td>
        </tr>
        <tr>
            <td>4)</td><td>Pegawai Penyelia Verification - EMT dihantar daripada pegawai pemeriksa kepada pegawai penyelia untuk pengesahan</td>
        </tr>
        <tr>
            <td>5)</td><td>Pegawai Pelulus Approval -  EMT dihantar daripada pegawai penyelia kepada pegawai pelulus untuk kelulusan</td>
        </tr>
        <tr>
            <td>6)</td><td>Revert to premise - EMT dipulangkan kepada premis untuk pembetulan</td>
        </tr>
        <tr>
            <td>7)</td><td>Draft - EMT sedang diisi oleh premis</td>
        </tr>
    </table></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>