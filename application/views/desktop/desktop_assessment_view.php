<div class="panel-group">
<!-- EMT 1 EP-->
  <div class="panel panel-primary"> 
  <div class="panel-heading">Tool 1 - Verifikasi EMT - Environmental Policy</div>
    <div class="panel-body">


<div class="form-group">

<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
	<tr>
	<?php
	$option0 = '';
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';

	?>
	<?php 


	if($emt_1->self_assessment == 0){
		$option0 = 'selected';
	}

	elseif ($emt_1->self_assessment == 1) {
	 	$option1 = 'selected';
	 } 
	elseif ($emt_1->self_assessment == 2) {
		$option2 = 'selected';
	}
	elseif ($emt_1->self_assessment == 3) {
		$option3 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 4) {
		$option4 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 5) {
		$option5 = 'selected';
	}
	

	

	?>
		<td>
		<?php echo form_radio('self_assessment', '0', $option0, 'disabled');
			  echo form_label('0'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '1', $option1, 'disabled');
			  echo form_label('1'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '2', $option2, 'disabled');
			  echo form_label('2'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '3', $option3, 'disabled');
			  echo form_label('3'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '4', $option4, 'disabled');
			  echo form_label('4'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '5', $option5, 'disabled');
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
			'width' => '200px',
			'value' => $emt_1->date_implement,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
<ul>

	<?php 


	if(isset($emt_1_attachments)){
		foreach($emt_1_attachments as $key => $data){


	//print_r($data);
	

?>

<li>
<a href="<?php echo base_url() .$data['attachment_link']?> "><?php echo $data['attachment_link']?></a>

</li>
<?php }} ?>

</ul>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Comments');
	$data = array(
			'class' => 'form-control',
			'name' => 'comment',
			'value' => $emt_1->comment,
			'readonly'=>'true'
		);
	echo form_textarea($data);
	?>
</div>
	
	<div class="form-group">

Polisi Pematuhan Kendiri Alam Sekitar(Self Regulatory Environmental Policy)

	<?php

	$data = array(
        'name'          => 'tool1',
        'id'            => 'tool1',
        'value'         => 'Ada',
        'checked'       => TRUE,
        'style'         => 'margin:10px'
	);

	echo form_radio($data);
	
	?>
	Ada

	<?php

	$data = array(
        'name'          => 'tool1',
        'id'            => 'tool1',
        'value'         => 'Tiada',
        'style'         => 'margin:10px'
	);

	echo form_radio($data);
	
	?>
	Tiada
</div>
<div class="form-group">
	<?php
	
	echo form_label('Ulasan(Jika ada)');
	$data = array(
			'class' => 'form-control',
			'name' => 'ulasan',
			'placeholder' => 'Ulasan berkaitan Environmental Policy'
		);
	echo form_password($data);
	?>
	
</div>
<div class="form-group">
	<?php
	
	$data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit',
			'value' => 'Login'
		);
	echo form_submit($data);
	?>
	
</div>


    </div>
  </div><!-- End of EMT 1 EP-->
 
<!-- EMT 2 EB-->
  <div class="panel panel-primary"> 
  <div class="panel-heading">Tool 2 - Verifikasi EMT - Environmental Budget</div>
    <div class="panel-body">


<div class="form-group">

<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
	<tr>
	<?php
	$option0 = '';
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';

	?>
	<?php 


	if($emt_2->self_assessment == 0){
		$option0 = 'selected';
	}

	elseif ($emt_2->self_assessment == 1) {
	 	$option1 = 'selected';
	 } 
	elseif ($emt_2->self_assessment == 2) {
		$option2 = 'selected';
	}
	elseif ($emt_2->self_assessment == 3) {
		$option3 = 'selected';
	}
	
	elseif ($emt_2->self_assessment == 4) {
		$option4 = 'selected';
	}
	
	elseif ($emt_2->self_assessment == 5) {
		$option5 = 'selected';
	}
	

	

	?>
		<td>
		<?php echo form_radio('self_assessment', '0', $option0, 'disabled');
			  echo form_label('0'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '1', $option1, 'disabled');
			  echo form_label('1'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '2', $option2, 'disabled');
			  echo form_label('2'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '3', $option3, 'disabled');
			  echo form_label('3'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '4', $option4, 'disabled');
			  echo form_label('4'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '5', $option5, 'disabled');
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
			'width' => '200px',
			'value' => $emt_2->date_implement,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
<ul>

	<?php 


	if(isset($emt_1_attachments)){
		foreach($emt_1_attachments as $key => $data){


	print_r($data);
	

?>

<li>
<a href="<?php echo base_url() .$data['attachment_link']?> "><?php echo $data['attachment_link']?></a>

</li>
<?php }} ?>

</ul>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Comments');
	$data = array(
			'class' => 'form-control',
			'name' => 'comment',
			'value' => $emt_1->comment,
			'readonly'=>'true'
		);
	echo form_textarea($data);
	?>
</div>
		<div class="form-group">

a. Budget Allocation & Staffing Requirement
	<br>
	<?php

	$data = array(
        'name'          => 'tool1',
        'id'            => 'tool1',
        'value'         => 'Ada',
        'checked'       => TRUE,
        'style'         => 'margin:10px'
	);

	echo form_radio($data);
	
	?>
	Ada<br>

	<?php

	$data = array(
        'name'          => 'tool1',
        'id'            => 'tool1',
        'value'         => 'Tiada',
        'style'         => 'margin:10px'
	);

	echo form_radio($data);
	
	?>
	Tiada<br>

	<?php

	$data = array(
        'name'          => 'tool1',
        'id'            => 'tool1',
        'value'         => 'Tiada',
        'style'         => 'margin:10px'
	);

	echo form_radio($data);
	
	?>
	Premis ada peruntukan kewangan bagi tujuan peningkatan sistem kawalan pencemaran udara, air dan buangan terjadual/penggantian komponen/penyelenggaraan dan sebagainya.<br><br>


	b. Implementation Scheduled & Monitoring<br>
	<?php

	$data = array(
        'name'          => 'tool1',
        'id'            => 'tool1',
        'value'         => 'Ada',
        'checked'       => TRUE,
        'style'         => 'margin:10px'
	);

	echo form_radio($data);
	
	?>
	Ada<br>

	<?php

	$data = array(
        'name'          => 'tool1',
        'id'            => 'tool1',
        'value'         => 'Tiada',
        'style'         => 'margin:10px'
	);

	echo form_radio($data);
	
	?>
	Tiada<br>

	<?php

	$data = array(
        'name'          => 'tool1',
        'id'            => 'tool1',
        'value'         => 'Tiada',
        'style'         => 'margin:10px'
	);

	echo form_radio($data);
	
	?>
	Premis ada mempunyai Jadual Pelaksanaan serta program-program ke arah environmental mainstreaming.<br>
</div>


<div class="form-group">
	<?php
	
	echo form_label('Ulasan(Jika ada)');
	$data = array(
			'class' => 'form-control',
			'name' => 'ulasan',
			'placeholder' => 'Ulasan berkaitan Environmental Policy'
		);
	echo form_password($data);
	?>
	
</div>
<div class="form-group">
	<?php
	
	$data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit',
			'value' => 'Login'
		);
	echo form_submit($data);
	?>
	
</div>
    </div>
  </div><!-- End of EMT 2 EB-->


<!-- EMT 3-->
  <div class="panel panel-primary"> 
  <div class="panel-heading">Tool 3 - Environmental Monitoring Committee(EMC)</div>
    <div class="panel-body">


<div class="form-group">

<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
	<tr>
	<?php
	$option0 = '';
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';

	?>
	<?php 


	if($emt_1->self_assessment == 0){
		$option0 = 'selected';
	}

	elseif ($emt_1->self_assessment == 1) {
	 	$option1 = 'selected';
	 } 
	elseif ($emt_1->self_assessment == 2) {
		$option2 = 'selected';
	}
	elseif ($emt_1->self_assessment == 3) {
		$option3 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 4) {
		$option4 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 5) {
		$option5 = 'selected';
	}
	

	

	?>
		<td>
		<?php echo form_radio('self_assessment', '0', $option0, 'disabled');
			  echo form_label('0'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '1', $option1, 'disabled');
			  echo form_label('1'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '2', $option2, 'disabled');
			  echo form_label('2'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '3', $option3, 'disabled');
			  echo form_label('3'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '4', $option4, 'disabled');
			  echo form_label('4'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '5', $option5, 'disabled');
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
			'width' => '200px',
			'value' => $emt_1->date_implement,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
<ul>

	<?php 


	if(isset($emt_1_attachments)){
		foreach($emt_1_attachments as $key => $data){


	print_r($data);
	

?>

<li>
<a href="<?php echo base_url() .$data['attachment_link']?> "><?php echo $data['attachment_link']?></a>

</li>
<?php }} ?>

</ul>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Comments');
	$data = array(
			'class' => 'form-control',
			'name' => 'comment',
			'value' => $emt_1->comment,
			'readonly'=>'true'
		);
	echo form_textarea($data);
	?>
</div>

    </div>
  </div><!-- End of EMT 3-->

<!-- EMT 4-->
  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 2 - Environmental Budget</div>
    <div class="panel-body">


<div class="form-group">

<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
	<tr>
	<?php
	$option0 = '';
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';

	?>
	<?php 


	if($emt_1->self_assessment == 0){
		$option0 = 'selected';
	}

	elseif ($emt_1->self_assessment == 1) {
	 	$option1 = 'selected';
	 } 
	elseif ($emt_1->self_assessment == 2) {
		$option2 = 'selected';
	}
	elseif ($emt_1->self_assessment == 3) {
		$option3 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 4) {
		$option4 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 5) {
		$option5 = 'selected';
	}
	

	

	?>
		<td>
		<?php echo form_radio('self_assessment', '0', $option0, 'disabled');
			  echo form_label('0'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '1', $option1, 'disabled');
			  echo form_label('1'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '2', $option2, 'disabled');
			  echo form_label('2'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '3', $option3, 'disabled');
			  echo form_label('3'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '4', $option4, 'disabled');
			  echo form_label('4'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '5', $option5, 'disabled');
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
			'width' => '200px',
			'value' => $emt_1->date_implement,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
<ul>

	<?php 


	if(isset($emt_1_attachments)){
		foreach($emt_1_attachments as $key => $data){


	print_r($data);
	

?>

<li>
<a href="<?php echo base_url() .$data['attachment_link']?> "><?php echo $data['attachment_link']?></a>

</li>
<?php }} ?>

</ul>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Comments');
	$data = array(
			'class' => 'form-control',
			'name' => 'comment',
			'value' => $emt_1->comment,
			'readonly'=>'true'
		);
	echo form_textarea($data);
	?>
</div>

    </div>
  </div><!-- End of EMT 4-->


<!-- EMT 5-->
  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 2 - Environmental Budget</div>
    <div class="panel-body">


<div class="form-group">

<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
	<tr>
	<?php
	$option0 = '';
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';

	?>
	<?php 


	if($emt_1->self_assessment == 0){
		$option0 = 'selected';
	}

	elseif ($emt_1->self_assessment == 1) {
	 	$option1 = 'selected';
	 } 
	elseif ($emt_1->self_assessment == 2) {
		$option2 = 'selected';
	}
	elseif ($emt_1->self_assessment == 3) {
		$option3 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 4) {
		$option4 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 5) {
		$option5 = 'selected';
	}
	

	

	?>
		<td>
		<?php echo form_radio('self_assessment', '0', $option0, 'disabled');
			  echo form_label('0'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '1', $option1, 'disabled');
			  echo form_label('1'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '2', $option2, 'disabled');
			  echo form_label('2'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '3', $option3, 'disabled');
			  echo form_label('3'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '4', $option4, 'disabled');
			  echo form_label('4'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '5', $option5, 'disabled');
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
			'width' => '200px',
			'value' => $emt_1->date_implement,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
<ul>

	<?php 


	if(isset($emt_1_attachments)){
		foreach($emt_1_attachments as $key => $data){


	print_r($data);
	

?>

<li>
<a href="<?php echo base_url() .$data['attachment_link']?> "><?php echo $data['attachment_link']?></a>

</li>
<?php }} ?>

</ul>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Comments');
	$data = array(
			'class' => 'form-control',
			'name' => 'comment',
			'value' => $emt_1->comment,
			'readonly'=>'true'
		);
	echo form_textarea($data);
	?>
</div>

    </div>
  </div><!-- End of EMT 5-->

  <!-- EMT 6-->
  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 2 - Environmental Budget</div>
    <div class="panel-body">


<div class="form-group">

<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
	<tr>
	<?php
	$option0 = '';
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';

	?>
	<?php 


	if($emt_1->self_assessment == 0){
		$option0 = 'selected';
	}

	elseif ($emt_1->self_assessment == 1) {
	 	$option1 = 'selected';
	 } 
	elseif ($emt_1->self_assessment == 2) {
		$option2 = 'selected';
	}
	elseif ($emt_1->self_assessment == 3) {
		$option3 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 4) {
		$option4 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 5) {
		$option5 = 'selected';
	}
	

	

	?>
		<td>
		<?php echo form_radio('self_assessment', '0', $option0, 'disabled');
			  echo form_label('0'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '1', $option1, 'disabled');
			  echo form_label('1'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '2', $option2, 'disabled');
			  echo form_label('2'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '3', $option3, 'disabled');
			  echo form_label('3'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '4', $option4, 'disabled');
			  echo form_label('4'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '5', $option5, 'disabled');
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
			'width' => '200px',
			'value' => $emt_1->date_implement,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
<ul>

	<?php 


	if(isset($emt_1_attachments)){
		foreach($emt_1_attachments as $key => $data){


	print_r($data);
	

?>

<li>
<a href="<?php echo base_url() .$data['attachment_link']?> "><?php echo $data['attachment_link']?></a>

</li>
<?php }} ?>

</ul>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Comments');
	$data = array(
			'class' => 'form-control',
			'name' => 'comment',
			'value' => $emt_1->comment,
			'readonly'=>'true'
		);
	echo form_textarea($data);
	?>
</div>

    </div>
  </div><!-- End of EMT 6-->

<!-- EMT 7-->
  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 2 - Environmental Budget</div>
    <div class="panel-body">


<div class="form-group">

<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
	<tr>
	<?php
	$option0 = '';
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';

	?>
	<?php 


	if($emt_1->self_assessment == 0){
		$option0 = 'selected';
	}

	elseif ($emt_1->self_assessment == 1) {
	 	$option1 = 'selected';
	 } 
	elseif ($emt_1->self_assessment == 2) {
		$option2 = 'selected';
	}
	elseif ($emt_1->self_assessment == 3) {
		$option3 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 4) {
		$option4 = 'selected';
	}
	
	elseif ($emt_1->self_assessment == 5) {
		$option5 = 'selected';
	}
	

	

	?>
		<td>
		<?php echo form_radio('self_assessment', '0', $option0, 'disabled');
			  echo form_label('0'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '1', $option1, 'disabled');
			  echo form_label('1'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '2', $option2, 'disabled');
			  echo form_label('2'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '3', $option3, 'disabled');
			  echo form_label('3'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '4', $option4, 'disabled');
			  echo form_label('4'); ?>
		</td>
		<td>
		<?php echo form_radio('self_assessment', '5', $option5, 'disabled');
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
			'width' => '200px',
			'value' => $emt_1->date_implement,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
<ul>

	<?php 


	if(isset($emt_1_attachments)){
		foreach($emt_1_attachments as $key => $data){


	print_r($data);
	

?>

<li>
<a href="<?php echo base_url() .$data['attachment_link']?> "><?php echo $data['attachment_link']?></a>

</li>
<?php }} ?>

</ul>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Comments');
	$data = array(
			'class' => 'form-control',
			'name' => 'comment',
			'value' => $emt_1->comment,
			'readonly'=>'true'
		);
	echo form_textarea($data);
	?>
</div>


    </div>
  </div><!-- End of EMT 7-->





    </div> <!-- END OF PANEL-BODY -->
  </div> <!-- END OF PANEL PANEL -->
</div> <!-- END OF PANEL-GROUP -->