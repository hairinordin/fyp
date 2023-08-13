<!-- Copy direct dari users/profile_View..-->

<div class="container-fluid">
<h2>Profile Information</h2>
<?php $attributes = array('id'=> 'register_form', 'class'=> 'form_vertical'); ?>


<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open('users/register/'. $premise_info->idpremis, $attributes); ?>
<div class="col-md-8">
<table>
    <tr> <div class="form-group">
	<?php

	$data = array( 'idpremis' =>$premise_info->idpremis);

	echo form_hidden($data);
	?>
    </div></tr>

<div class="form-group">
	<?php
	
	echo form_label('DOE File No');
	$data = array(
			'class' => 'form-control',
			'name' => 'no_fail_jas',
			'value' =>$premise_info->nofaildoe,
			'readonly'=>'true' //repopulating field
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">

	<?php
	
	echo form_label('Premise Name');
	$data = array(
			'class' => 'form-control',
			'name' => 'nama_premis',
			'value' =>$premise_info->namapremis,
			'readonly'=>'true',
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('No Pendaftaran Syarikat');
	$data = array(
			'class' => 'form-control',
			'name' => 'no_roc',
			'value' =>$premise_info->no_roc,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Alamat');
	$data = array(
			'class' => 'form-control',
			'name' => 'alamat',
			'value' =>$premise_info->alamat,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Poskod');
	$data = array(
			'class' => 'form-control',
			'name' => 'poskod',
			'value' =>$premise_info->poskod,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Bandar');
	$data = array(
			'class' => 'form-control',
			'name' => 'bandar',
			'value' =>$premise_info->bandar,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Negeri');
	$data = array(
			'class' => 'form-control',
			'name' => 'negeri',
			'value' =>$premise_info->negeri,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Parlimen');
	$data = array(
			'class' => 'form-control',
			'name' => 'parlimen',
			'value' =>$premise_info->parlimen,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Telefon');
	$data = array(
			'class' => 'form-control',
			'name' => 'tel',
			'value' =>$premise_info->telefon,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('No. Faks');
	$data = array(
			'class' => 'form-control',
			'name' => 'faks',
			'value' =>$premise_info->faks,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Kategori Premis');
	$data = array(
			'class' => 'form-control',
			'name' => 'kategori',
			'value' =>$premise_info->kategori_premis,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Sic');
	$data = array(
			'class' => 'form-control',
			'name' => 'sic',
			'value' =>$premise_info->sic,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Sub Sic');
	$data = array(
			'class' => 'form-control',
			'name' => 'subsic',
			'value' =>$premise_info->subsic,
			'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Email');
	$data = array(
			'class' => 'form-control',
			'name' => 'email',
                        'value' =>$premise_info->email,
                        'readonly'=>'true'
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Name');
	$data = array(
			'class' => 'form-control',
			'name' => 'name',
            'value' =>$premise_info->name
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('IC No');
	$data = array(
			'class' => 'form-control',
			'name' => 'ic_no',
            'value' =>$premise_info->ic_no
		);
	echo form_input($data);
	?>
</div>

<div class="form-group">
	<?php
	
	echo form_label('Position');
	$data = array(
			'class' => 'form-control',
			'name' => 'position',
            'value' => $premise_info->position
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

<div class="form-group">
	<?php
	
	$data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit',
			'value' => 'Update'
		);
	echo form_submit($data);
	?>
	
</div>
</table>
    </div>
<?php echo form_close(); ?>

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
</div>