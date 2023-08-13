




<div class="container-fluid">
    <h4><?php echo $title ?></h4>
    <hr>
    <div class="row-fluid">
<?php
$attributes = array('id'=> 'emt_form', 'class'=> 'form-vertical'); ?>



<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open_multipart('emt2/submit/'. $this->session->userdata('user_id'), $attributes); ?>


<div class="panel-group">
<!-- EMT 1 EP-->
  <div class="panel panel-primary"> 
  <div class="panel-heading"></div>
    <div class="panel-body">
    	
<div class="form-group">

<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
<?php

	$option0 = '';
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';

	$date_implement = '';
	$comment = '';

	

	?>
	<?php 

	if(isset($emt2_answers)){

	$date_implement = $emt2_answers->date_implement;

	$comment = $emt2_answers->comment;


		if($emt2_answers->self_assessment == 0){
			$option0 = 'selected';
		}

		elseif ($emt2_answers->self_assessment == 1) {
		 	$option1 = 'selected';
		 } 
		elseif ($emt2_answers->self_assessment == 2) {
			$option2 = 'selected';
		}
		elseif ($emt2_answers->self_assessment == 3) {
			$option3 = 'selected';
		}
		
		elseif ($emt2_answers->self_assessment == 4) {
			$option4 = 'selected';
		}
		
		elseif ($emt2_answers->self_assessment == 5) {
			$option5 = 'selected';
		}
	
}
	

	?>
	<tr>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="0"/>
            0 - None </label>
		</td>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="1"/>
            1 - Poor </label>
		</td>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="2"/>
            2 - Fair </label>
		</td>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="3"/>
            3 - Average </label>
		</td>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="4"/>
            4 - Good </label>
		</td>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="5"/>
            5 - Excellent </label>
		</td>
	</tr>

</table>
</div>
<hr>
<div class="form-group">
	<?php
	
	echo form_label('Date of Implementation');
	$data = array(
			'class' => 'form-control',
			'name' => 'date_implement',
			'type' => 'date',
			'width' => '200px',
			'value' => $date_implement
		);
	echo form_input($data);
	?>
</div>
<hr>
<div class="form-group" >
	<?php 

	/*echo form_label('Attachment');
	$data = array(
			'name' => 'user_file'
		);

	echo form_input($data);*/

	?>
	<p>Upload file(s):</p>

	<?php if($this->session->flashdata('upload_fail')):?>
	<div class="alert alert-danger">
	<?php
			echo $this->session->flashdata('upload_fail');
	?>
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	</div>
	<?php endif;?>
	
	<?php 

	//print_r($emt2_attachments);
	if(!empty($emt2_attachments)){
		foreach($emt2_attachments as $key => $data){


	//print_r($data); To Do : To fix uploading files cannot be open
	

?>

<li>
<a href="<?php echo base_url() .$data['attachment_link']?> "><?php echo $data['attachment_link']?></a>

</li>
<?php }} else {

echo form_error('uploaded_docs[]');
echo form_upload('uploaded_docs[]','','multiple');

	} ?>
<small>File Size : max 3MB each file</small>
</div>  

<div class="form-group">
	<?php
	
	/*echo form_label('Comments');
	$data = array(
			'class' => 'form-control',
			'name' => 'comment',
			'value' => $comment
		);
	echo form_textarea($data);*/
	?>
</div>
        
        <hr>
        <div class="control-group">
          <form>
            <div class="controls">
              <textarea class="textarea_editor span12" rows="6" placeholder="Enter text ..." name="comment"></textarea>
            </div>
          </form>
        </div>

	<div class="form-group">	

	<?php
	if(!isset($emt2_answers)){
	$data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit_btn',
			'value' => 'Submit'
		);
	echo form_submit($data);
}
	?>


	
</div>
</div>


    </div>
  </div><!-- End of EMT 1 EP-->



 
<?php echo form_close(); ?>
</div>
</div>
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

</script>