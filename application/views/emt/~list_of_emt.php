<h2>Senarai dan status EMT yang dihantar</h2>


<div class="panel-group">
<!-- #################### EMT 1 BEGIN ######################## -->
  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 1 - Environmental Policy</div>
    <div class="panel-body">
   

<?php if(isset($emt1_answers)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<p class="bg-success">
	<?php
		if($this->session->flashdata('emt1_created')):
			echo $this->session->flashdata('emt1_created');
		endif;
	?>
</p>

<tr>
	<td>
	Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	Comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<a href="<?php echo base_url()?>emt1/emt_1_submitted/<?php echo $emt1_answers->premis_id?>">
		<?php echo $emt1_answers->emt_status ?>
		</a>
		</td>
		<td>
		<?php echo $emt1_answers->self_assessment ?>
		</td>
		<td>
		<?php echo $emt1_answers->date_implement ?>
		</td>
		<td>
		<?php echo $emt1_answers->comment ?>
		</td>
		<td>
		<?php 
		foreach ($emt1_attachments as $file):

		 	echo $file['attachment_link']."<br>";

		endforeach;
		?>
		</td>
	</tr>

</table>
</div>
<?php } else { ?>


<a href="<?php echo base_url()?>emt1/">Isi baru</a>


<?php	} ?>
</div>
</div>

<!-- #################### EMT 2 BEGIN ######################## -->

  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 2 - Environmental Budget</div>
    <div class="panel-body">
   
<?php if(isset($emt2_answers)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<a href="<?php echo base_url()?>emt2/emt_2_submitted/<?php echo $emt2_answers->premis_id?>">
		<?php echo $emt2_answers->emt_status ?>
		</a>
		</td>
		<td>
		<?php echo $emt2_answers->self_assessment ?>
		</td>
		<td>
		<?php echo $emt2_answers->date_implement ?>
		</td>
		<td>
		<?php echo $emt2_answers->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>
</div>
<?php } else { ?>


<a href="<?php echo base_url()?>emt2/">Isi baru</a>


<?php	} ?>
</div>
</div>


<!-- #################### EMT 3 BEGIN ######################## -->
  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 3 - Environmental Monitoring Committee</div>
    <div class="panel-body">
   

<?php if(isset($emt3_answers_epmc)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt3_answers_epmc->emt_status ?>
		</td>
		<td>
		<?php echo $emt3_answers_epmc->self_assessment ?>
		</td>
		<td>
		<?php echo $emt3_answers_epmc->date_implement ?>
		</td>
		<td>
		<?php echo $emt3_answers_epmc->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


EPMC - <a href="<?php echo base_url()?>emt3/index/epmc">Isi baru</a>


<?php	} ?>



<?php if(isset($emt3_answers_ercmc)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt3_answers_ercmc->emt_status ?>
		</td>
		<td>
		<?php echo $emt3_answers_ercmc->self_assessment ?>
		</td>
		<td>
		<?php echo $emt3_answers_ercmc->date_implement ?>
		</td>
		<td>
		<?php echo $emt3_answers_ercmc->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>ERCMC - <a href="<?php echo base_url()?>emt3/index/ercmc">Isi baru</a>


<?php	} ?>
</div>
</div>

<!-- #################### EMT 4 BEGIN ######################## -->
  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 4 - Environmental Facility</div>
    <div class="panel-body">
   


<?php if(isset($emt4_answers_bmps)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt4_answers_bmps->emt_status ?>
		</td>
		<td>
		<?php echo $emt4_answers_bmps->self_assessment ?>
		</td>
		<td>
		<?php echo $emt4_answers_bmps->date_implement ?>
		</td>
		<td>
		<?php echo $emt4_answers_bmps->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


BMPs - <a href="<?php echo base_url()?>emt4/index/bmps">Isi baru</a>


<?php	} ?>



<?php if(isset($emt4_answers_iets)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt4_answers_iets->emt_status ?>
		</td>
		<td>
		<?php echo $emt4_answers_iets->self_assessment ?>
		</td>
		<td>
		<?php echo $emt4_answers_iets->date_implement ?>
		</td>
		<td>
		<?php echo $emt4_answers_iets->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>IETS - <a href="<?php echo base_url()?>emt4/index/iets">Isi baru</a>

<?php	} ?>


<?php if(isset($emt4_answers_apcs)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt4_answers_apcs->emt_status ?>
		</td>
		<td>
		<?php echo $emt4_answers_apcs->self_assessment ?>
		</td>
		<td>
		<?php echo $emt4_answers_apcs->date_implement ?>
		</td>
		<td>
		<?php echo $emt4_answers_apcs->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>APCS - <a href="<?php echo base_url()?>emt4/index/apcs">Isi baru</a>


<?php	} ?>



<?php if(isset($emt4_answers_swmi)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt4_answers_swmi->emt_status ?>
		</td>
		<td>
		<?php echo $emt4_answers_swmi->self_assessment ?>
		</td>
		<td>
		<?php echo $emt4_answers_swmi->date_implement ?>
		</td>
		<td>
		<?php echo $emt4_answers_swmi->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>SWMI - <a href="<?php echo base_url()?>emt4/index/swmi">Isi baru</a>


<?php	} ?>


<?php if(isset($emt4_answers_labf)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt4_answers_labf->emt_status ?>
		</td>
		<td>
		<?php echo $emt4_answers_labf->self_assessment ?>
		</td>
		<td>
		<?php echo $emt4_answers_labf->date_implement ?>
		</td>
		<td>
		<?php echo $emt4_answers_labf->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>LABF - <a href="<?php echo base_url()?>emt4/index/labf">Isi baru</a>


<?php	} ?>


<?php if(isset($emt4_answers_pmi)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt4_answers_pmi->emt_status ?>
		</td>
		<td>
		<?php echo $emt4_answers_pmi->self_assessment ?>
		</td>
		<td>
		<?php echo $emt4_answers_pmi->date_implement ?>
		</td>
		<td>
		<?php echo $emt4_answers_pmi->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>PMI - <a href="<?php echo base_url()?>emt4/index/pmi">Isi baru</a>


<?php	} ?>


<?php if(isset($emt4_answers_others)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt4_answers_others->emt_status ?>
		</td>
		<td>
		<?php echo $emt4_answers_others->self_assessment ?>
		</td>
		<td>
		<?php echo $emt4_answers_others->date_implement ?>
		</td>
		<td>
		<?php echo $emt4_answers_others->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>Others - <a href="<?php echo base_url()?>emt4/index/others">Isi baru</a>


<?php	} ?>
</div>
</div>


  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 5 - Environmental Competency</div>
    <div class="panel-body">
   
<!-- #################### EMT 5 BEGIN ######################## -->
<?php if(isset($emt5_answers_csec)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt5_answers_csec->emt_status ?>
		</td>
		<td>
		<?php echo $emt5_answers_csec->self_assessment ?>
		</td>
		<td>
		<?php echo $emt5_answers_csec->date_implement ?>
		</td>
		<td>
		<?php echo $emt5_answers_csec->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>CSEC - <a href="<?php echo base_url()?>emt5/index/csec">Isi baru</a>


<?php	} ?>


<?php if(isset($emt5_answers_cepietsobp)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt5_answers_cepietsobp->emt_status ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepietsobp->self_assessment ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepietsobp->date_implement ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepietsobp->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>CePIETSO - BP - <a href="<?php echo base_url()?>emt5/index/cepietsobp">Isi baru</a>


<?php	} ?>


<?php if(isset($emt5_answers_cepietsopcp)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt5_answers_cepietsopcp->emt_status ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepietsopcp->self_assessment ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepietsopcp->date_implement ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepietsopcp->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>CePIETSO - PCP - <a href="<?php echo base_url()?>emt5/index/cepietsopcp">Isi baru</a>


<?php	} ?>


<?php if(isset($emt5_answers_cepswam)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt5_answers_cepswam->emt_status ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepswam->self_assessment ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepswam->date_implement ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepswam->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>CePSWAM - <a href="<?php echo base_url()?>emt5/index/cepswam">Isi baru</a>


<?php	} ?>


<?php if(isset($emt5_answers_cepso)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt5_answers_cepso->emt_status ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepso->self_assessment ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepso->date_implement ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepso->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>CePSO - <a href="<?php echo base_url()?>emt5/index/cepso">Isi baru</a>


<?php	} ?>

<?php if(isset($emt5_answers_cebfo)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt5_answers_cebfo->emt_status ?>
		</td>
		<td>
		<?php echo $emt5_answers_cebfo->self_assessment ?>
		</td>
		<td>
		<?php echo $emt5_answers_cebfo->date_implement ?>
		</td>
		<td>
		<?php echo $emt5_answers_cebfo->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>CeBFO - <a href="<?php echo base_url()?>emt5/index/cebfo">Isi baru</a>


<?php	} ?>

<?php if(isset($emt5_answers_ceppome)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt5_answers_ceppome->emt_status ?>
		</td>
		<td>
		<?php echo $emt5_answers_ceppome->self_assessment ?>
		</td>
		<td>
		<?php echo $emt5_answers_ceppome->date_implement ?>
		</td>
		<td>
		<?php echo $emt5_answers_ceppome->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>CePPOME - <a href="<?php echo base_url()?>emt5/index/ceppome">Isi baru</a>


<?php	} ?>

<?php if(isset($emt5_answers_cepstpo)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt5_answers_cepstpo->emt_status ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepstpo->self_assessment ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepstpo->date_implement ?>
		</td>
		<td>
		<?php echo $emt5_answers_cepstpo->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>CePSTPO - <a href="<?php echo base_url()?>emt5/index/cepstpo">Isi baru</a>


<?php	} ?>
</div>
</div>



  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 6 - Environmental Reporting & Communication (ERC)</div>
    <div class="panel-body">
   
<!-- #################### EMT 6 BEGIN ######################## -->
<?php if(isset($emt6_answers_cc)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt6_answers_cc->emt_status ?>
		</td>
		<td>
		<?php echo $emt6_answers_cc->self_assessment ?>
		</td>
		<td>
		<?php echo $emt6_answers_cc->date_implement ?>
		</td>
		<td>
		<?php echo $emt6_answers_cc->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>CC - <a href="<?php echo base_url()?>emt6/index/cc">Isi baru</a>


<?php	} ?>

<?php if(isset($emt6_answers_da)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt6_answers_da->emt_status ?>
		</td>
		<td>
		<?php echo $emt6_answers_da->self_assessment ?>
		</td>
		<td>
		<?php echo $emt6_answers_da->date_implement ?>
		</td>
		<td>
		<?php echo $emt6_answers_da->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>DA - <a href="<?php echo base_url()?>emt6/index/da">Isi baru</a>


<?php	} ?>

<?php if(isset($emt6_answers_ir)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt6_answers_ir->emt_status ?>
		</td>
		<td>
		<?php echo $emt6_answers_ir->self_assessment ?>
		</td>
		<td>
		<?php echo $emt6_answers_ir->date_implement ?>
		</td>
		<td>
		<?php echo $emt6_answers_ir->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>IR - <a href="<?php echo base_url()?>emt6/index/ir">Isi baru</a>


<?php	} ?>

<?php if(isset($emt6_answers_others)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt6_answers_others->emt_status ?>
		</td>
		<td>
		<?php echo $emt6_answers_others->self_assessment ?>
		</td>
		<td>
		<?php echo $emt6_answers_others->date_implement ?>
		</td>
		<td>
		<?php echo $emt6_answers_others->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>Others - <a href="<?php echo base_url()?>emt6/index/others">Isi baru</a>


<?php	} ?>
</div>
</div>


  <div class="panel panel-primary"> 
  <div class="panel-heading">EMT 7 - Environmental Transparency (ET)</div>
    <div class="panel-body">
   
<!-- #################### EMT 7 BEGIN ######################## -->

<?php if(isset($emt7_answers_esr)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt7_answers_esr->emt_status ?>
		</td>
		<td>
		<?php echo $emt7_answers_esr->self_assessment ?>
		</td>
		<td>
		<?php echo $emt7_answers_esr->date_implement ?>
		</td>
		<td>
		<?php echo $emt7_answers_esr->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>ESR - <a href="<?php echo base_url()?>emt7/index/esr">Isi baru</a>


<?php	} ?>

<?php if(isset($emt7_answers_ws)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt7_answers_ws->emt_status ?>
		</td>
		<td>
		<?php echo $emt7_answers_ws->self_assessment ?>
		</td>
		<td>
		<?php echo $emt7_answers_ws->date_implement ?>
		</td>
		<td>
		<?php echo $emt7_answers_ws->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>WS - <a href="<?php echo base_url()?>emt7/index/ws">Isi baru</a>


<?php	} ?>

<?php if(isset($emt7_answers_bb)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt7_answers_bb->emt_status ?>
		</td>
		<td>
		<?php echo $emt7_answers_bb->self_assessment ?>
		</td>
		<td>
		<?php echo $emt7_answers_bb->date_implement ?>
		</td>
		<td>
		<?php echo $emt7_answers_bb->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>BB - <a href="<?php echo base_url()?>emt7/index/bb">Isi baru</a>


<?php	} ?>

<?php if(isset($emt7_answers_fl)){ ?> 

<div class="form-group">


<table class="table table-bordered">
<tr>
	<td>
	#Status EMT
	</td>
	<td>
	Self Assessment
	</td>
	<td>
	Date of implementation
	</td>
	<td>
	comment
	</td>
	<td>
	Attachment
	</td>
</tr>

	<tr>
		<td>
		<?php echo $emt7_answers_fl->emt_status ?>
		</td>
		<td>
		<?php echo $emt7_answers_fl->self_assessment ?>
		</td>
		<td>
		<?php echo $emt7_answers_fl->date_implement ?>
		</td>
		<td>
		<?php echo $emt7_answers_fl->comment ?>
		</td>
		<td>
		#attachment
		</td>
	</tr>

</table>

</div>
<?php } else { ?>


<br>FL - <a href="<?php echo base_url()?>emt7/index/fl">Isi baru</a>


<?php	} ?>


</div>
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