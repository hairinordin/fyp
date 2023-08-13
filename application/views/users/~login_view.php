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
<h2>Login Form</h2>
<?php
$attributes = array('id'=> 'login_form', 'class'=> 'form_horizontal');
echo form_open('users/login', $attributes);
?>
<?php if($this->session->flashdata('errors')): ?>
<?php echo $this->session->flashdata('errors'); ?>
<?php endif; ?>
<div class="form-group">
	<?php
	
	echo form_label('Username');
	$data = array(
			'class' => 'form-control',
			'name' => 'username',
			'placeholder' => 'Enter Username'
		);
	echo form_input($data);
	?>
</div>
<div class="form-group">
	<?php
	
	echo form_label('Password');
	$data = array(
			'class' => 'form-control',
			'name' => 'password',
			'placeholder' => 'Enter Password'
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
<?php endif; ?>
<?php echo form_close(); ?>

<?php if($this->session->flashdata('login_success')):?>
<div class="alert alert-success">
	<?php
		echo $this->session->flashdata('login_success');
	?>
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>

<?php endif; ?>

<?php if($this->session->flashdata('login_failed')):?>
<div class="alert alert-danger">
	<?php
		echo $this->session->flashdata('login_failed');
	?>
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>

<?php endif; ?>