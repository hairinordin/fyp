

<legend>Pengurusan Pengumuman</legend>

 <div clas="row"> Pengumuman sedang digunakan:</div>
    <div class="row"> <textarea class="form-control" readonly>
  <?php 
  if (count ($getText)== 0){
      echo " ";
  }
  else {
  echo $getText[0]->textinput;}?> 
  </textarea> </div>
 <br>
<div class="row">Sila masukkan pengumuman baru:
     <div class="row"> 
         <div class="row"> 
             <form action=<?php echo site_url("admin/saveAnnouncement")?> method="post">
             <div class="controls">
                <textarea id="textarea_editor"  style="width:100%" rows="6" placeholder="Enter text ..." name="textinput"></textarea>
            </div></div>
              <div class="row"> <button type="submit" class="btn btn-primary" >Simpan</button></div>
</form>
     </div>
    
    
          
    <br>
    <legend> </legend>
    
   

    <div class="row">SENARAI PENGUMUMAN </div>
   <table class="table table-bordered table-striped table-hover">
     
       <tr class="info">
           <td> <b>BIL</b> </td> 
           <td> <b>PENGUMUMAN</b> </td>
       <td> <b>TINDAKAN</b> </td>
       </tr>
       
       <?php $arrlength = count($query);
      
      for($x = 0; $x < $arrlength; $x++) { ?>
        <tr>
       <td>  <?php echo $x+1 ?> </td> 
       <td> <?php echo $query[$x]->textinput ?> </td>
         <td>
         <?php if ($query[$x]->status=='Y') { ?>
        <button type="button" class="btn btn-success disabled" > <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp Aktif</i></button> <br><br>
           <?php } else { ?>
        <button type="button" class="btn btn-info" onclick="window.location='<?php $id =$query[$x]->id; echo site_url("admin/changeAnnouncement/$id");?>'"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp Guna</i></button> <br><br>
       <?php } ?>
        <button type="button" class="btn btn-danger"  onclick="window.location='<?php $id =$query[$x]->id; echo site_url("admin/deleteAnnouncement/$id");?>'">  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp Hapus </i></button> 
       </td>
       </tr>
       
       
       <?php } ?>
</table>
   