<div class="container-fluid">
   <h2><?php echo $mainTitle ?></h2><h4><?php if(isset($title))echo $title ?></h4>
    <hr>
    <div class="row-fluid">
<?php
$attributes = array('id'=> 'emt_form', 'class'=> 'form-vertical'); ?>

<?php foreach($emt_answers as $key => $emt_answer):?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open_multipart('emt/edit_submit/' .$emt_type. '/'. $emt_answer->id, $attributes); ?>

<div class="panel-group">
<!-- EMT 1 EP-->
  <div class="panel panel-primary"> 
  <div class="panel-heading"></div>
    <div class="panel-body">
    	
<div class="form-group">
<?php echo form_hidden('emt_no', $emt_no) ?>
<table class="table table-bordered">
<?php echo form_label('Self Assessment'); ?>
<?php

    if($emt_answer->emt_status == 'draft'){
        $option0 = '';
	$option1 = '';
	$option2 = '';
	$option3 = '';
	$option4 = '';
	$option5 = '';

	
	$comment = '';
    }

	?>
	<?php 

	if(isset($emt_answer)){

	$date_implement = $emt_answer->date_implement;

	$comment = $emt_answer->comment;


		if($emt_answer->self_assessment == 0){
			$option0 = 'checked';
		}

		elseif ($emt_answer->self_assessment == 1) {
		 	$option1 = 'checked';
		 } 
		elseif ($emt_answer->self_assessment == 2) {
			$option2 = 'checked';
		}
		elseif ($emt_answer->self_assessment == 3) {
			$option3 = 'checked';
		}
		
		elseif ($emt_answer->self_assessment == 4) {
			$option4 = 'checked';
		}
		
		elseif ($emt_answer->self_assessment == 5) {
			$option5 = 'checked';
		}
	
}
	

	?>
	<tr>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="0" <?php echo $option0 ?>/>
            0 - None </label>
		</td>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="1" <?php echo $option1 ?>/>
            1 - Poor </label>
		</td>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="2" <?php echo $option2 ?>/>
            2 - Fair </label>
		</td>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="3" <?php echo $option3 ?>/>
            3 - Average </label>
		</td>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="4" <?php echo $option4 ?>/>
            4 - Good </label>
		</td>
		<td>
            <label>
            <input type="radio" name="self_assessment" value="5" <?php echo $option5 ?>/>
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

	//print_r($emt1_attachments);
	if(!empty($emt_attachments)):
		foreach($emt_attachments as $key => $data):


	//print_r($data); To Do : To fix uploading files cannot be open
	$filename = explode('/',$data['attachment_link']);

        
       
        
?>

<li>
<a class="imagelocation<?php echo $data['id'] ?>" href="<?php echo base_url() .$data['attachment_link']?> " target="_blank"><?php echo $filename[4]?></a>

<span style="cursor:pointer;" onclick="javascript:deleteimage(<?php echo $data['id'] ?>)">X</span>

</li>

<?php
 endforeach;
        endif;
echo form_error('uploaded_docs[]');
echo form_upload('uploaded_docs[]','','multiple');
?>

<small>File Size : max 3MB each file</small>
</div>  
        
        <hr>
        <div class="control-group">
          <form>
            <div class="controls">
                <textarea id="textarea_editor"  style="width:100%" rows="10" placeholder="Enter text ..." name="comment"><?=$emt_answer->comment?></textarea>
            </div>
          </form>
        </div>
        <hr>

	<div class="form-group">	

	<?php
	if($emt_answer->emt_status == 'draft'){
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
}
	?>
<?php        endforeach; ?>

	
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

function deleteimage(image_id)
{
var answer = confirm ("Are you sure you want to delete from this post?");
if (answer)
{
        $.ajax({
                type: "POST",
                url: "<?php echo base_url('emt/deleteimage');?>",
                data: "image_id="+image_id,
                success: function (response) {
                  if (response == 1) {
                    $(".imagelocation"+image_id).remove(".imagelocation"+image_id);
                  };
                  
                }
            });
      }
}
</script>