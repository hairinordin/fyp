<?php
$flashdata = $this->session->flashdata('item');
if(isset($flashdata)) {
  $message = $this->session->flashdata('item');
  ?>
<div class="alert alert-<?php echo $message['class']?>">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo $message['class']?>!</strong> <?php echo $message['message']; ?>
</div>

<?php 
}
?>
<h3>Senarai Maklumbalas Premis
    <?= $from_month .' '. $from_year . ' - ' . $to_month .' '. $to_year  ?> bagi <strong><?= $this->ref->return_state($state_code) ?></strong></h3>

<div class="table-responsive">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> </h3>
                </div>
                <div class="panel-body">
                    <table id="premise-table-CompleteSubmission" class=" display table table-bordered table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Premise</th><th>City</th><th>State</th><th>Cawangan JAS</th><th>Type</th><th>EMT Status</th><th></th>
                            </tr>

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
      var dt = $('#premise-table-CompleteSubmission').DataTable({
                    "processing" : true,
                    "pageLength" : 10,
                    //"serverSide": true,
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "ajax":{
                        url:"<?php echo site_url("kpi/json_bm_list/".$state_code.'/'.$from .'/'.$to) ?>",
                        type:'GET'
                    }, 
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			"buttons": [
				'colvis',
				'copyHtml5',
                                'csvHtml5',
				'excelHtml5',
                                'pdfHtml5',
				'print'
			],
                    
                     "columnDefs": [ 
                      {
                        "targets": 0,
                        "data": 1
                      },
                      {
                        "targets": 1,
                        "data": 2
                      },
                      {
                        "targets": 2,
                        "data": 4
                      },
                      {
                        "targets": 3,
                        "data": 7
                      },
                      {
                        "targets": 4,
                        "data": 5
                      },
                      {
                        "targets": 5,
                        "data": 6
                      },
                      {
                        "targets": 6,
                        "data": 3, 
                        "render": function ( data, type, row, meta ) {
                            return '<a href="<?= base_url()  ?>answers/view_review/'+data+'">Review</a> ' ;
                          }
                      }]
                                       
                });
                
                });
    </script>