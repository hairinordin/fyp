<div class="container-fluid">
    <h4><?php echo $mainTitle ?></h4><h6><?php echo empty($title)? '': $title; ?></h6>
    <hr>
    <div class="row-fluid">
<?php
$attributes = array('id'=> 'emt_form', 'class'=> 'form-vertical'); ?>
        
<?php
?>
        
<?php echo validation_errors("<p class='bg-danger'>"); ?>
<?php echo form_open_multipart('emt/submit/' .$emt_type, $attributes); ?>


<div class="panel-group">
<!-- EMT 1 EP-->
  <div class="panel panel-primary"> 
  <div class="panel-heading"></div>
    <div class="panel-body">
    	
<div class="form-group">
 <?php if (isset($emt_answers->emt_status)): ?>
    <?php 
        
        if($emt_answers->emt_status == 'draft')
            echo 'im set and draft';
        else
            echo 'im set and submit';
    ?>
<?php endif; ?>
    <?php echo form_hidden('emt_no', $emt_no) ?>
<table class="table table-bordered">

<?php echo form_label('Self Assessment'); ?>
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

<hr>
<div class="form-group" style="width: 25%">
	<?php
	
	echo form_label('Date of Implementation');
	$data = array(
			'class' => 'form-control',
			'name' => 'date_implement',
			'type' => 'date'
		);
	echo form_input($data);
	?>
   
</div>
<hr>
<div class="form-group" >
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

echo form_error('uploaded_docs[]');
echo form_upload('uploaded_docs[]','','multiple');

	 ?>
<small>File Size : max 3MB each file</small>
 
</div>  

        
        <hr>
        <div class="control-group">
          
            <div class="controls">
                <textarea id="textarea_editor"  style="width:100%" rows="6" placeholder="Enter text ..." name="comment"></textarea>
            </div>
          
        </div>
        <hr>
        <br>
	<div class="form-group">	

	<?php
	
        $save = array(
			'class' => 'btn btn-alert',
			'name' => 'save_btn',
			'value' => 'Save as draft' 
		);
	echo form_submit($save);
        
	$submit = array(
			'class' => 'btn btn-primary',
			'name' => 'submit_btn',
			'value' => 'Submit'
		);
	echo form_submit($submit);
        
        

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
		if($this->session->flashdata('emt_created')):
			echo $this->session->flashdata('emt_created');
		endif;
	?>
</p>

<p class="bg-danger">
	<?php
		if($this->session->flashdata('emt_failed')):
			echo $this->session->flashdata('emt_failed');
		endif;
	?>
</p>
</div>
<script>
	
	//webshims.setOptions('forms-ext', {types: 'date'});
	//webshims.polyfill('forms forms-ext');

</script>