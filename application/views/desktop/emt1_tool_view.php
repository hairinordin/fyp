<?php
if($this->session->userdata('logged_in')): ?>
<?php		echo form_open('users/logout'); ?>
<p>
	<?php		if($this->session->userdata('username')){
		echo "You are logged in as " . $this->session->userdata('username');
	}
	?>
</p>
<?php
		$data = array(
				'class' => 'btn btn-primary',
				'name' => 'submit',
				'value' => 'Logout'
			);
		echo form_submit($data);
		echo form_close();
?>
<?php else: ?>



<div class="panel-group">
<!-- EMT 1 EP-->
  <div class="panel panel-primary"> 
  <div class="panel-heading">Tool 1 - Verifikasi EMT - Environmental Policy</div>
    <div class="panel-body">

<h2>Desktop EMT Mainstreaming Tools</h2>
<?php
$attributes = array('id'=> 'login_form', 'class'=> 'form_horizontal');
echo form_open('users/login', $attributes);
?>
<?php if($this->session->flashdata('errors')): ?>
<?php echo $this->session->flashdata('errors'); ?>
<?php endif; ?>
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
  <div class="panel panel-default">
    <div class="panel-body">

    	<!-- EMT 1 EP-->
  <div class="panel panel-primary"> 
  <div class="panel-heading">Tool 1 - Verifikasi EMT - Environmental Policy</div>
    <div class="panel-body">

<h2>Desktop EMT Mainstreaming Tools</h2>
<?php
$attributes = array('id'=> 'login_form', 'class'=> 'form_horizontal');
echo form_open('users/login', $attributes);
?>
<?php if($this->session->flashdata('errors')): ?>
<?php echo $this->session->flashdata('errors'); ?>
<?php endif; ?>
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


    </div>
  </div>
</div>
<?php endif; ?>
<?php echo form_close(); ?>
<p class="bg-success">
	<?php
		if($this->session->flashdata('login_success')):
			echo $this->session->flashdata('login_success');
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