
      Dashboard for <?= $this->role ?> 
  <div class="container-fluid">
<div class="row-fluid">
    <div class="col-lg-12">
        <ul class="nav nav-tabs">
             <li><a data-toggle="tab" href="#dashboard"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a></li>
            <li><a data-toggle="tab" href="#premise">List of premises registered</a></li>
            <li><a data-toggle="tab" href="#submission">List of premise submission</a></li>
            <li><a data-toggle="tab" href="#notification">List of notification</a></li>
<!--            <li><a data-toggle="tab" href="#report">Report</a></li>-->
        </ul>
    </div>
</div> 
     
<div class="tab-content">
   <!--TAB DASHBOARD-->
<div id="dashboard" class="tab-pane fade">
    <div class="container-fluid">
        
            <div id="container-registered" style="min-width: 500px; height: auto;  text-align: right;"></div>
            <br>
            <div id="container2" style="min-width: 500px; height: 400px; "></div>
            <br>
            <div id="container3" style="min-width: 500px; height: 400px;"></div>
            <br>
            <div id="container4" style="min-width: 500px; height: 400px;"></div>


    </div>
</div>
    <!--TAB PREMISE-->
    <div id="premise" class="tab-pane fade">
        <div class="row-fluid">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> List of premise registered</h3>
                    </div>
                    <div class="panel-body">
                        <table id="premise-table" class=" display table table-bordered table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th><th>Premise</th><th>City</th><th>State</th><th>Type</th><th>Date Registered</th>
                                </tr>

                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--TAB SUBMISSION-->
<div id="submission" class="tab-pane fade">
    <div class="row-fluid">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> List of premise submission</h3>
                </div>
                <div class="panel-body">
                    <table id="premise-table-submission" class=" display table table-bordered table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Premise</th><th>City</th><th>State</th><th>Type</th><th>EMT Status</th><th></th>
                            </tr>

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--TAB NOTIFICATION-->
<div id="notification" class="tab-pane fade">
    <div class="row-fluid">
        <br>
        <div class="col-lg-12">
            <div class="panel">
<!--                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addNewPremiseModal" >Add/Change Submission Type</button>-->
            </div>
        </div>
        <br>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> List of notification</h3>
                </div>
                <div class="panel-body">
                     
                    <table id="premise-table-notifications" class=" display table table-bordered table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Premise</th><th>City</th><th>State</th><th>EMT Submission Type</th><th>Submission Date</th><th>Submission Due Date</th><th>Actions</th>
                            </tr>
                            

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
      </div>
<br>

<div class="modal fade" id="addNewPremiseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="addNewNotifications">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                
                <div id="loginbox" style="align-content: center; padding-top: 10%">
                    
                    <input type="hidden" name="idpremis" id="idpremis" value="">
                            
                                <?php
//                                echo '<b style="color:red">*</b>';
//                                echo form_label('DOE File No');
//                                $data = array(
//                                    'class' => 'form-control',
//                                    'name' => 'no_fail_jas',
//                                    'id' => 'no_fail_jas',
//                                    'placeholder' => 'Contoh : AS(S)001/001/001',
////                                    'onKeyUp' => 'showPremise(this.value)',
//                                    'required' => true,
//                                    'value' => set_value('no_fail_jas') //repopulating field
//                                );
//                                echo form_input($data);
                                ?><?php // echo form_error('no_fail_jas'); ?>

                                <?php
                                echo '<b style="color:red">*</b>';
                                echo form_label('Premise Name');
                                $data = array(
                                    'class' => 'form-control',
                                    'name' => 'nama_premis',
                                    'id' => 'nama_premis',
                                    'placeholder' => 'Syarikat ABC',
                                    'readonly' => true,
                                    'value' => set_value('nama_premis')
                                );
                                echo form_input($data);
                                ?>
                                
                                <?php
                                echo '<b style="color:red">*</b>';
                                echo form_label('Reference Number');
                                $data = array(
                                    'class' => 'form-control',
                                    'name' => 'ref_no',
                                    'id' => 'ref_no',
                                    'placeholder' => 'reference number',
                                    'required' => true,
                                    'value' => set_value('')
                                );
                                echo form_input($data);
                                ?>
                    
                                <?php
                                echo '<b style="color:red">*</b>';
                                echo form_label('Issued Date');
                                $data = array(
                                    'class' => 'form-control',
                                    'name' => 'issued_date',
                                    'id' => 'issued_date',
                                    'type' => 'date',
                                    'required' => true,
                                    'value' => set_value('')
                                );
                                echo form_input($data);
                                ?>
                                
                            
                       

                    </div>
                    
                </div>
            <div class="modal-footer search-footer">

                                <?php
                                $data = array(
                                    'class' => 'btn btn-primary',
                                    'name' => 'submit',
                                    'value' => 'Add',
                                    'id' => 'add'
                                );
                                echo form_submit($data);
                                ?>
                <button type="button" class="btn btn-warning" data-dismiss="modal" >Cancel</button>
                            </div>
            </div>
        </div>
    </form>
    </div>



<script type="text/javascript">
    
    $(document).ready(function() {
        if (location.hash) {
            $("a[href='" + location.hash + "']").tab("show");
        }
        $(document.body).on("click", "a[data-toggle]", function(event) {
            location.hash = this.getAttribute("href");
        });
    });
    $(window).on("popstate", function() {
        var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
        $("a[href='" + anchor + "']").tab("show");
    });

    function showPremise(str) {
    if (str == "") {
        document.getElementById("idpremis").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                document.getElementById("nama_premis").value = data[0];
                //document.getElementById("idpremis").value = data[1];
                console.log(data.length);
            }
        };
        xmlhttp.open("POST",'<?php echo site_url("dashboard/get_premiseFromEKAS?") ?>q='+str,true);
        xmlhttp.send();
    }
}

    $(document).on("click", "#modal-btn", function () {
             var idpremis = $(this).data('id');
             $("#idpremis").val( idpremis );
             showPremise(idpremis);
             console.log(idpremis);
    });
    
    $(function(){
        $('#addNewNotifications').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: '<?php echo site_url("dashboard/set_notifications/") ?>',
                type: 'POST',
                data: $('#addNewNotifications').serialize(),
                success: function(data){
                    //console.log(data);
                     //$('#responsestatus').val(data);
                     $('#addNewPremiseModal').modal('hide');
                     location.reload();
                }
            });
        });
    });
    
    // <![CDATA[
		$(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container-registered',
	                type: 'column',
	                
	            },
                    
	            title: {
	                text: '<b>Total Premises Registered</b>',
	                x: -20 //center
	            },
	            subtitle: {
	                text: '',
	                x: -20
	            },
	            xAxis: {
	                categories: []
	            },
//                    plotOptions: {
//                        column: {           
//                        grouping: false}
//                    },
	            yAxis: {
	                title: {
	                    text: 'Total'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b> '+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },

	            series: []
	        }

	        $.getJSON("get_premise_registered_chart", function(json) {
			options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
	        	options.series[1] = json[2];
//	        	options.series[2] = json[3];
		        chart = new Highcharts.Chart(options);
	        });
	    });
            //////Chart 2
            
            $(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container2',
	                type: 'line',
	             
	            },
	            title: {
	                text: '<b>Total Premises Submitted</b>',
	                x: -20 //center
	            },
	            subtitle: {
	                text: '',
	                x: -20
	            },
	            xAxis: {
	                categories: []
	            },
	            yAxis: {
	                title: {
	                    text: 'Total'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b> '+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },

	            series: []
	        }

	        $.getJSON("get_premise_submitted_chart", function(json) {
			options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
//	        	options.series[1] = json[2];
//	        	options.series[2] = json[3];
		        chart = new Highcharts.Chart(options);
	        });
	    });
            
             //////Chart 3
            
            $(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container3',
	                type: 'column',
	            
	            },

	            title: {
	                text: '<b>Compulsory by Categories</b>',
	                x: -20 //center
	            },
	            subtitle: {
	                text: '',
	                x: -20
	            },
	            xAxis: {
	                categories: []
	            },
	            yAxis: {
	                title: {
	                    text: 'Total'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b> '+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },

	            series: []
	        }

	        $.getJSON("get_compulsory_by_industry_chart", function(json) {
			options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
	        	options.series[1] = json[2];
	        	options.series[2] = json[3];
                        options.series[3] = json[4];
	        	options.series[4] = json[5];
	        	options.series[5] = json[6];
		        chart = new Highcharts.Chart(options);
	        });
	    });
            
            
             //////Chart 4
            
            $(document).ready(function() {
			var options = {
	            chart: {
	                renderTo: 'container4',
	                type: 'column',
	            
	            },

	            title: {
	                text: '<b>Compulsory vs Total Registered</b>',
	                x: -20 //center
	            },
	            subtitle: {
	                text: '',
	                x: -20
	            },
	            xAxis: {
	                categories: []
	            },
	            yAxis: {
	                title: {
	                    text: 'Total'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b> '+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },

	            series: []
	        }

	        $.getJSON("get_compulsory_vs_registered_chart", function(json) {
			options.xAxis.categories = json[0]['data'];
	        	options.series[0] = json[1];
	        	options.series[1] = json[2];
	        	
                        
		        chart = new Highcharts.Chart(options);
	        });
	    });
// ]]></script>


<!-- DATATABLE-->

<script>

    function format ( d ) {
        console.log(d);
        return 'Alamat: '+d[13]+', '+d[6]+', '+d[2]+', ' +d[3]+'<br>';
    }
    
     $(document).ready(function() {
               var dt = $('#premise-table').DataTable({
                    "buttons": [ 'colvis' ],
                    "processing" : true,
                    "pageLength" : 10,
                    //"serverSide": true,
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "ajax":{
                        url:"<?php echo site_url("answers/premises_registered/" . $this->state) ?>",
                        type:'POST'
                    },
                    "columns" : [
                    {
                        
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    
                    ],
                    "order": [
                        [1, "desc"]
                    ],
                    "columnDefs": [ 
                        {
                              "targets": 5,
                              "data": 12
                          },
                        
                      
                          
                      ],
                      
                      
                   
                });
           
    
    
     // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#premise-table tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
            
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );
 
    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );
 });
 
 
 ////TABLE TESTING
 var dt = $('#premise-table-submission').DataTable({
                    "processing" : true,
                    "pageLength" : 10,
                    //"serverSide": true,
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "ajax":{
                        url:"<?php echo site_url("answers/testing/".$this->state) ?>",
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
                        "data": 0
                      },
                      {
                        "targets": 1,
                        "data": 1
                      },
                      {
                        "targets": 2,
                        "data": 3
                      },
                      {
                        "targets": 3,
                        "data": 4
                      },
                      {
                        "targets": 4,
                        "data": 5
                      },
                      {
                        "targets": 5,
                        "data": 2,
                        "render": function ( data, type, row, meta ) {
                            
                           // var role = '<?= $this->role ?>';
                            
                            //if(role != 'PM'){
                                return '<a href="<?= base_url()  ?>answers/answers_by_premise/'+data+' ">Validate answers</a> | \n\
                                    <a href="<?= base_url()  ?>answers/answers_by_doe/'+data+' ">View answers</a> | \n\
                                    <a href="<?= base_url()  ?>answers/view_review/'+data+'">Review</a> | \n\
                                    <a href="<?= base_url()  ?>remark/officer_form/'+data+'">Remark by Officer</a> ';
                            //} else {
                               // return 'Hola';
                            //}
                            
                          }
                      }]
                     
//                    "columnDefs": [ {
//                        "targets": 6,
//                        "data": 2,
//                        "render": function ( data, type, row, meta ) {
//                            return '<a href="<?= base_url()  ?>answers/answers_by_premise/'+data+'">Answers</a> | <a href="<?= base_url()  ?>fieldinspection/view/'+data+'">FI</a> | <a href="<?= base_url()  ?>remark/form/'+data+'">Remark</a>';
//                          }
//                      } ]
                   
                });
                
                
                 var dt = $('#premise-table-notifications').DataTable({
                    "processing" : true,
                    "pageLength" : 10,
                    //"serverSide": true,
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "createdRow": function( row, data, dataIndex ) {
                        if ( today() > data[5]  ) {        
                           $(row).find('td:eq(7)').css('background-color', 'red');

                        }
                    },
                    "ajax":{
                        url:"<?php echo site_url("answers/premises_notifications/" . $this->state) ?>",
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
                            "data": 0
                        },
                          {
                        "targets": 1,
                        "data": 1
                      },
                          {
                        "targets": 2,
                        "data": 2
                      },
                        {
                        "targets": 3,
                        "data": 3
                      },
                      {
                        "targets": 4,
                        "data": 4
                      },
                      {
                        "targets": 5,
                        "data": 5
                      },
                      
//                      {
//                        "targets": 4,
//                        "data": '0'
//                      },
//                      
//                      {
//                        "targets": 5,
//                        "data": '0'
//                      },
                      { 
                          "targets": 6,
                          "data" : 7,
                          "render": function ( data, type, row, meta ) {
                              return '<button type="button" class="btn btn-info" data-id="'+data+'" data-toggle="modal" id="modal-btn" data-target="#addNewPremiseModal" >Change Submission Type</button>';     
                          }
                      }
                        
                    
                                ]
//                    "columns" : [
//                    {
//                        
//                        "class":          "details-control",
//                        "orderable":      false,
//                        "data":           null,
//                        "defaultContent": ""
//                    },
//                    {"1" : "namapremis"},
//                    {"2" : "alamat"},
//                    {"3" : "bandar"},
//                    {"4" : "negeri"},
//                    {"5" : "telefon"}
//                    ],
//                    "order": [
//                        [1, "desc"]
//                    ],
//                    "columnDefs": [ {
//                        "targets": 6,
//                        "data": 2,
//                        "render": function ( data, type, row, meta ) {
//                            return '<a href="<?= base_url()  ?>answers/answers_by_premise/'+data+'">Answers</a> | <a href="<?= base_url()  ?>fieldinspection/view/'+data+'">FI</a> | <a href="<?= base_url()  ?>remark/form/'+data+'">Remark</a>';
//                          }
//                      } ]
                   
                });
                
                
                function today(){
                    var d = new Date();

                    var month = d.getMonth()+1;
                    var day = d.getDate();

                    var output = d.getFullYear() + '-' +
                        ((''+month).length<2 ? '0' : '') + month + '-' +
                        ((''+day).length<2 ? '0' : '') + day;
                
                        //alert(output);
                     return output;
                }
    </script>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

