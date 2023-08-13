<div class="col-md-12">
<?php echo validation_errors("<a class='close' data-dismiss='alert' href='#'>×</a>"); ?>
    <div id="loginbox" style="align-content: center">
<?php
$attributes = array('id'=> 'register_form', 'class'=> 'form_horizontal'); ?>



<p class="bg-success">
	<?php
		if($this->session->flashdata('user_registered')):
			echo $this->session->flashdata('user_registered');
		endif;
	?>
</p>   
<?php echo form_open('users/find', $attributes); ?>
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="panel panel-default">
    <div class="panel-body">
        
          <?php
	echo '<b style="color:red">*</b>';
	echo form_label('DOE File No');
	$data = array(
			'class' => 'form-control',
			'name' => 'no_fail_jas',
			'placeholder' => 'Contoh : AS(S)001/001/001',
			'value' =>set_value('no_fail_jas') //repopulating field
		);
	echo form_input($data);
	?>

                        <?php
	echo '<b style="color:red">*</b>';
	echo form_label('Premise Name');
	$data = array(
			'class' => 'form-control',
			'name' => 'nama_premis',
			'placeholder' => 'Syarikat ABC',
			'value' =>set_value('nama_premis')
		);
	echo form_input($data);
	?>
        </div>
        <div class="panel-footer">
        
              <?php
	
	$data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit',
			'value' => 'Search'
		);
	echo form_submit($data);
	?>
          
        </div>
    
</div>
</div>
<div class="col-md-4"></div>      

            <div class="form-actions">
                                
                
            </div>
                        
            <?php echo form_close(); ?>
    
     <?php if(isset($maklumat_wujud)): ?>

          <div class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading"><?php echo $premise_info->namapremis; ?></h4>
              <span class=""><a href="<?php echo base_url().'users/view_profile/' . $premise_info->idpremis;?>" class="flip-link btn btn-success" id="to-recover">Verify Premise Information</a></span>
              </div>
    <?php endif; ?>
</div>
    
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

</div>