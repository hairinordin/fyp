<legend>List of Premises Submission</legend> 
<div class="row">
    <div class="col-md-12 well">
        <form method="post" action="<?= base_url() ?>remark/">
            <div class="form-group col-md-4">   
                <input type="text" class="form-control" name="search_txt" placeholder="Search" value="<?= $search ?>"> 
            </div>
            <div class="form-group col-md-3">
                <button type="submit" value="Search" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
                <a href="<?= base_url('remark/reset/'); ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Reset">Reset</a>
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
            <?php if ($this->state == '16') { ?>
                <th>State</th>
            <?php } ?>
            <th>Pegawai Pemeriksa</th>
            <th>Pegawai Penyelia</th>
            <th>Pegawai Pelulus</th>
            <th>Date Submitted</th>
            <th>Date Validate</th>
            <th>Status 
            <a href="#" data-toggle="modal" data-target="#tipsModal" title="Status Definition" data-content=""><i class="fa fa-2x fa-question"></i></a>
            </th> 
            <?php //if($this->role == 'ADM' && $this->state == '16'){ ?>
                    
            <?php //} else { ?>
            <th>Action</th>
            <?php //} ?>
            </thead>
            <?php
//           echo '<pre>';
//            print_r($premis_berdaftar );
//            echo '</pre>';
            ?>
            <?php foreach ($premis_berdaftar as $premise): ?>
            <?php //if(!$premise->commentOnPremise){ ?>
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
                    <?php if ($this->state == '16') { ?>
                        <td>
                            <?= $premise->negeri ?>
                        </td>
                    <?php } ?>
                    <td>
                        <?= $premise->pm ?> <!--'Pegawai A | Pegawai B | Belum ada tindakan dari siapa2'-->
                    </td>
                    <td>
                        <?= $premise->pn ?><!--'Pegawai A | Pegawai B | Belum ada tindakan dari siapa2'-->
                    </td>
                    <td>
                        <?= $premise->pl ?><!--'Pegawai A | Pegawai B | Belum ada tindakan dari siapa2'-->
                    </td>
                    <td>
                        <?= (isset($premise->submission_date) && $premise->submission_date != '0000-00-00') ? date("d/m/Y", strtotime($premise->submission_date)) : 'No submission yet' ?>
                    </td>
                    <td>
                        <?= ($premise->date_validate) ? date("d/m/Y", strtotime($premise->date_validate)) : '' ?>
                    </td>
                    <td>
                        <?php
                        if ($premise->emt_status == 2) { //submit for review
                            echo 'Pending for assessment';
                        } else if ($premise->emt_status == 4 || $premise->emt_status == 5 || $premise->emt_status == 12) {
                            echo 'Pegawai Penyelia Verification';
                        } else if ($premise->emt_status == 7 || $premise->emt_status == 8) {
                            echo 'Pegawai Pelulus Approval';
                        } else if ($premise->emt_status == 1) {
                            echo 'Draft';
                        }  else if ($premise->emt_status == 10 || $premise->emt_status == 11) {
                            echo 'Complete';
                        } //else
                        ?>
                    </td>
                    <?php if($this->role == 'ADM' && $this->state == '16'){ ?>
                    <td>
                        <?php echo '<a href="' . base_url() . 'remark/pemeriksa_form/' . $premise->idpremis . '/' . $premise->id . ' ">View</a>' ?>
                    </td>
                     <?php } else { ?>
                    <td><?php
                        /*
                          1-Draft
                          2-Submit
                          3-Review
                          4-Completed for verification
                          5-Rejected for verification
                          6-Revert to premise
                          7-Completed for Approval
                          8-Rejected for Approval
                          9-Revert to Pegawai Pemeriksa
                          10-Completed
                          11-Rejected
                          12-Revert to Pegawai Penyelia
                         */
                        ?>
                        <?php
//                        $arrayStatusPM = array(1, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12);
//                        $arrayStatusPN = array(1, 2, 3, 6, 7, 8, 9, 10, 11, 12);
//                        $arrayStatusPL = array(1, 2, 3, 4, 5, 6, 9, 10, 11, 12);

                        if ($premise->emt_status == 10 || $premise->emt_status == 11) {
                            $txtLink = 'Notification to premise';
                        } else {
                            $txtLink = 'Submission form';
                        }

                        if ($this->role == 'PM') {
                            //if (!$premise->commentOnPremise) {
                                echo '<a href="' . base_url() . 'remark/pemeriksa_form/' . $premise->idpremis . '/' . $premise->id . ' ">' . $txtLink . '</a>';
                            //}
//                            if(!in_array($premise->emt_status, $arrayStatusPM)){
//                            } else {
//                                echo 'Not available for remark';
//                            }
                            } elseif ($this->role == 'PN') {
//                            if(!in_array($premise->emt_status, $arrayStatusPN)){
                                //if (!$premise->commentOnPremise) {
                                    echo '<a href="' . base_url() . 'remark/penyelia_form/' . $premise->idpremis . '/' . $premise->id . ' ">Submission form</a>';
                                //}
//                            } else {
//                                echo 'Not available for remark';
//                            }
                            } elseif ($this->role == 'PL') {
//                            if(!in_array($premise->emt_status, $arrayStatusPL)){
                                //if (!$premise->commentOnPremise){
                                    echo '<a href="' . base_url() . 'remark/pelulus_form/' . $premise->idpremis . '/' . $premise->id . ' ">Submission form</a>';
                            //}
//                            } else {
//                                echo 'Not available for remark';
//                            }
                        }
                        ?>

                    </td>
                     <?php } ?>
                </tr>

            <?php //} 
            endforeach; ?>



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
            <td>1)</td><td>Pending for assessment - EMT dihantar dan menunggu semakan pegawai pemeriksa</td>
        </tr>
        <tr>
            <td>2)</td><td>Pegawai Penyelia Verification - EMT dihantar kepada pegawai penyelia untuk pengesahan</td>
        </tr>
        <tr>
            <td>3)</td><td>Pegawai Pelulus Approval - EMT dihantar kepada pegawai pelulus untuk kelulusan/penolakan</td>
        </tr>
    
        <tr>
            <td>4)</td><td>Draft - EMT sedang diisi oleh premis</td>
        </tr>
        <tr>
            <td>5)</td><td>Complete - EMT telah lengkap dinilai</td>
        </tr>
    </table></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
