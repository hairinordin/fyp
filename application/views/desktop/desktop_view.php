<h2>Desktop Enforcement</h2>


<div class="panel-group">
  <div class="panel panel-primary"> 
  <div class="panel-heading">List of EMT Submitted by premises</div>
    <div class="panel-body">
   

<?php if(isset($emt_answers)): ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Premis Id
	</td>
	<td>
	Email
	</td>
	<td>
	Attachment
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Tindakan
	</td>
</tr>
<?php foreach($emt_answers as $answer): ?>
	<tr>
		<td>
		#Belum buat
		</td>
		<td>
		<?php echo $answer->idpremis ?>
		</td>
		<td>
		<?php echo $answer->email ?>
		</td>
		<td>
		<?php echo $answer->attachment ?>
		</td>
		<td>
		<?php echo $answer->self_assessment ?>
		</td>
		<td>
		<a href="<?php echo base_url()?>desktop/assessment/<?php echo $answer->idpremis?>">Start</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
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