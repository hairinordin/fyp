
    
    <div class="form-group">
<?php
$attributes = array('id'=> 'register_form', 'class'=> 'form_horizontal'); ?>


<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open('users/register/'. $premise_info->IDPREMIS, $attributes); ?>
</div>
<?php

	$data = array(
			'idpremis' =>$premise_info->IDPREMIS);

	echo form_hidden($data);
	?>
<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('DOE File No');
	$data = array(
			'class' => 'controls span5',
			'name' => 'no_fail_jas',
			'value' =>$premise_info->NOFAILJAS,
			'readonly'=>'true' //repopulating field
		);
	echo form_input($data);
	?>
    </div>
</div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Premise Name');
	$data = array(
			'class' => 'controls span11',
			'name' => 'nama_premis',
			'value' =>$premise_info->NAMAPREMIS,
			'readonly'=>'true',
		);
	echo form_input($data);
	?>
    </div></div>
    

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('No Pendaftaran Syarikat');
	$data = array(
			'class' => 'controls span5',
			'name' => 'no_roc',
			'value' =>$premise_info->NO_ROC,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Alamat');
	$data = array(
			'class' => 'controls span11',
			'name' => 'alamat',
			'value' =>$premise_info->PALAMAT,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Poskod');
	$data = array(
			'class' => 'controls span5',
			'name' => 'poskod',
			'value' =>$premise_info->PPOSKOD,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Bandar');
	$data = array(
			'class' => 'controls span5',
			'name' => 'bandar',
			'value' =>$premise_info->PKODBANDAR,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Negeri');
	$data = array(
			'class' => 'controls span5',
			'name' => 'negeri',
			'value' =>$premise_info->PKODNEGERI,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Parlimen');
	$data = array(
			'class' => 'controls span5',
			'name' => 'parlimen',
			'value' =>$premise_info->PARLIMEN,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Telefon');
	$data = array(
			'class' => 'controls span5',
			'name' => 'tel',
			'value' =>$premise_info->PNOTELEFON,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Faks');
	$data = array(
			'class' => 'controls span5',
			'name' => 'faks',
			'value' =>$premise_info->PNOFAKS,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Kategori Premis');
	$data = array(
			'class' => 'controls span5',
			'name' => 'kategori',
			'value' =>$premise_info->KATEGORIPREMIS,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Sic');
	$data = array(
			'class' => 'controls span5',
			'name' => 'sic',
			'value' =>$premise_info->SIC,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

<div class="control-group">
    <div class="control-label">
	<?php
	
	echo form_label('Sub Sic');
	$data = array(
			'class' => 'controls span5',
			'name' => 'subsic',
			'value' =>$premise_info->SUB_SIC,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>
    </div>

    
    




<div class="form-group">
	<?php
	
	echo form_label('Email');
	$data = array(
			'class' => 'form-control',
			'name' => 'email'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Name');
	$data = array(
			'class' => 'form-control',
			'name' => 'name'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('IC No');
	$data = array(
			'class' => 'form-control',
			'name' => 'ic_no'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Position');
	$data = array(
			'class' => 'form-control',
			'name' => 'position'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Username');
	$data = array(
			'class' => 'form-control',
			'name' => 'username'
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
<?php echo form_error('confirm_password', '<p class="bg-danger">', '</p>'); ?>
<div class="form-group">
	<?php
	
	//echo form_label('Confirm Password');
	$data = array(
			'class' => 'form-control',
			'name' => 'confirm_password',
			'placeholder' => 'Confirm Password'
		);
	echo form_password($data);
	?>
	
</div>




<div class="form-group">
	<?php
	
	$data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit',
			'value' => 'Register'
		);
	echo form_submit($data);
	?>
	
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
