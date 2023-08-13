<h2>EMT 3 - Environmental Monitoring Committee (EMC)</h2>
<?php
$attributes = array('id'=> 'emt_form', 'class'=> 'form-vertical'); ?>


<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open_multipart('emt3/submit/'. $this->session->userdata('user_id'), $attributes); ?>

<div class="panel-group">
<!-- EMT 1 EP-->
  <div class="panel panel-primary"> 
  <div class="panel-heading">EPMC <br>

    <label for="chkPanelEPMC">
    <input type="checkbox" id="chkPanelEPMC" />
      Not relevant
    </label>
  </div>
    <div id= "panelEPMC" class="panel-body">
    	
<div class="form-group">

<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
	<tr>
		<td>
		<?php echo form_radio('self_assessment', '0');
			  echo form_label('0'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '1');
			  echo form_label('1'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '2');
			  echo form_label('2'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '3');
			  echo form_label('3'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '4');
			  echo form_label('4'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '5');
			  echo form_label('5'); ?>
		</td>
	</tr>

</table>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Date of Implementation');
	$data = array(
			'class' => 'form-control',
			'name' => 'date_implement',
			'type' => 'date',
			'width' => '200px'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group" >
	<?php 

	/*echo form_label('Attachment');
	$data = array(
			'name' => 'user_file'
		);

	echo form_input($data);*/

	?>
	<p>Upload file(s):</p>
<?php echo form_error('uploaded_docs[]'); ?>
<?php echo form_upload('uploaded_docs[]','','multiple'); ?>

</div>


<div class="form-group">
	<?php
	
	echo form_label('Comments');
	$data = array(
			'class' => 'form-control',
			'name' => 'comment'
		);
	echo form_textarea($data);
	?>
</div>


	<div class="form-group">	

	<?php
	
	$data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit_EPMC_btn',
			'value' => 'Submit'
		);
	echo form_submit($data);

	?>


	
</div> 
</div>


    </div>

    <div class="panel panel-primary"> 
  <div class="panel-heading">ERCMC<br>

<label for="chkPanelERCMC">
    <input type="checkbox" id="chkPanelERCMC" />
      Not relevant
    </label>
  </div>
    <div id= "panelERCMC" class="panel-body">
    	
<div class="form-group">

<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
	<tr>
		<td>
		<?php echo form_radio('self_assessment', '0');
			  echo form_label('0'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '1');
			  echo form_label('1'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '2');
			  echo form_label('2'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '3');
			  echo form_label('3'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '4');
			  echo form_label('4'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '5');
			  echo form_label('5'); ?>
		</td>
	</tr>

</table>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Date of Implementation');
	$data = array(
			'class' => 'form-control',
			'name' => 'date_implement',
			'type' => 'date',
			'width' => '200px'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group" >
	<?php 

	/*echo form_label('Attachment');
	$data = array(
			'name' => 'user_file'
		);

	echo form_input($data);*/

	?>
	<p>Upload file(s):</p>
<?php echo form_error('uploaded_docs[]'); ?>
<?php echo form_upload('uploaded_docs[]','','multiple'); ?>

</div>
<div class="form-group">
	<?php
	
	echo form_label('Comments');
	$data = array(
			'class' => 'form-control',
			'name' => 'comment'
		);
	echo form_textarea($data);
	?>
</div>


	<div class="form-group">	

	<?php
	
	$data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit_ERCMC_btn',
			'value' => 'Submit'
		);
	echo form_submit($data);

	?>


	
</div>  
</div>


    </div>
  </div>



 
<?php echo form_close(); ?>



<?php if(isset($premise_info)): ?>

<?php //print_r($premise_info) ?>

<table>
	<tr>
		<td>
			<?php echo $premise_info->NAMAPREMIS; ?>
			<?php echo $premise_info->IDPREMIS; ?>
		</td>
		
	</tr>
</table>



<?php endif; ?>

<p class="bg-success">
	<?php
		if($this->session->flashdata('login_success')):
			echo $this->session->flashdata('login_success');
		endif;
	?>
</p>

<p class="bg-success">
	<?php
		if($this->session->flashdata('user_registered')):
			echo $this->session->flashdata('user_registered');
		endif;
	?>
</p>

<p class="bg-danger">
	<?php
		if($this->session->flashdata('login_failed')):
			echo $this->session->flashdata('login_failed');
		endif;
	?>
</p>

<script>
	
	webshims.setOptions('forms-ext', {types: 'date'});
	webshims.polyfill('forms forms-ext');



	$(function () {
        $("#chkPanelEPMC").click(function () {
            if ($(this).is(":checked")) {
                $("#panelEPMC").hide();
            } else {
                $("#panelEPMC").show();
            }
        });

        $("#chkPanelERCMC").click(function () {
            if ($(this).is(":checked")) {
                $("#panelERCMC").hide();
            } else {
                $("#panelERCMC").show();
            }
        });

    });


</script>