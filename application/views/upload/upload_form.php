<?php 
//echo '<pre>';
//print_r($answered);
//echo '</pre>';
?>
<div class="row col-md-10">
    <div class="well">
        Maximum file size allowed 10MB
        <br>
        Type allowed : pdf, jpg, png
        <br>
        <br>
        <b>Note to premise : Compulsory documents as follows</b>
        <ul>
            <li>Tool 1 : Environmental Policy Report</li>
            <li>Tool 3 : Organisation Chart for Environmenal Monitoring Committee</li>
            <li>Tool 5 : Organisation Chart for Competent Persons (CP)</li>
        </ul>
      
    </div>
</div>
<?php if($answered) {?>

<?php echo form_open_multipart('upload/do_upload', array('class' => 'upload-image-form'));?>  
    <div class="row">
        <input type='hidden' id='idpremise' value='' name="idpremise">
<!--      <div class = "upload-image-messages"></div>-->
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <?php for($i=1; $i<8; $i++):?>
                                <tr  class="info">
                                    
                                    <td width="30%">
                                        Tool <?= $i ?>
                                    </td>    
                                    <td>
                                        <?php foreach($answered as $file):?>
                                        
                                        <?php if($file->id_tool == $i):?>
                                <li class="imagelocation<?=$file->id ?>" >
                                    
                                    <a href="<?= base_url($file->path)?>"  target="_blank" ><?= $file->file_name ?></a>&nbsp;
                                       <?php if($this->role == 'premis') : ?>
                                    <span class="fa fa-trash-o"style="cursor:pointer;" onclick="javascript:deleteimage(<?php echo $file->id ?>)"></span>
                                        <?php endif;?>
                                </li>
                                        <?php endif; endforeach;?>
                                         <input type='hidden' id='tool_no' value='<?= $i?>' name="tool_no<?= $i ?>">
                                            <input type="file" multiple = "multiple" class = "form-control" name="uploadfile_tool<?= $i ?>[]" size="20" /><br />
                                    </td>
                                </tr>

                                <?php endfor;?>
                                
                            </table>
                            <input type="submit" name = "submit" value="Upload" class = "btn btn-primary" />
                        </div>
                    </div>
</form>
<?php } else {?>

<?php echo form_open_multipart('upload/do_upload', array('class' => 'upload-image-form'));?>    
<div class="row">
    <input type='hidden' id='idpremise' value='' name="idpremise">
<!--      <div class = "upload-image-messages"></div>-->
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <?php for($i=1; $i<8; $i++):?>
                                <tr  class="info">
                                    
                                    <td width="30%">
                                                                               
                                        <?php 
                                            switch($i):
                                                case 1:
                                                    echo 'Tool 1 - Environmental Policy'; break;
                                                case 2:
                                                    echo 'Tool 2 - Environmental Budgeting'; break;
                                                case 3:
                                                    echo 'Tool 3 - Environmental Monitoring Committee'; break;
                                                case 4:
                                                    echo 'Tool 4 - Environmental Facility'; break;
                                                case 5:
                                                    echo 'Tool 5 - Environmental Competency'; break;
                                                case 6:
                                                    echo 'Tool 6 - Environmental Reporting And Communication'; break;
                                                case 7:
                                                    echo 'Tool 7 - Environmental Transparency'; break;
                                                default: echo ''; break;
                                            endswitch;
                                        ?>
                                    </td>
                                    
                                    <td>
                                          <input type='hidden' id='tool_no' value='<?= $i?>' name="tool_no<?= $i ?>">
                                            <input type="file" multiple = "multiple" class = "form-control" name="uploadfile_tool<?= $i ?>[]" size="20" /><br />
                                    </td>
                                </tr>

                                <?php endfor;?>
                                
                            </table>
                            <input type="submit" name = "submit" value="Upload" class = "btn btn-primary" />
                        </div>
                    </div>
</form>

        <?php } ?>

<script>                    
        jQuery(document).ready(function($) {

            var options = {
                beforeSend: function(){
                    // Replace this with your loading gif image
                    //$(".upload-image-messages").html('<p><img src = "<?php echo base_url() ?>theme1/assets/images/loading.gif" class = "loader" /></p>');
                },
                complete: function(response){
                    //console.log(response);
                    //window.location.replace("<?= base_url('upload/') . '?idpremise=' ?>" + data['idpremise']);
                    // Output AJAX response to the div container

                    window.setTimeout(function () {
                    //
                    $.notify({
                        message : response.responseText
                    },
                    {
                        placement: {
                        from: "bottom",
                        align: "center"
                        },
                        type: "success"
                    });
                     
                    }, 500);
                    window.setTimeout(function () {

                        location.reload();

                    }, 4000);
                    
                    //$(".upload-image-messages").html(response.responseText);
                    //$('html, body').animate({scrollTop: $(".upload-image-messages").offset().top-100}, 150);  
                },
                
            };  
            // Submit the form
            $(".upload-image-form").ajaxForm(options);  
            
            var params = location.href.split('?')[1].split('&');
            data = {};
            for (x in params)
             {
            data[params[x].split('=')[0]] = params[x].split('=')[1];
             }
            
            $('input[id=idpremise]').val(data['idpremise']);
            //console.log(data['idpremise']);
            return false;
            
        });
        
        
      function deleteimage(image_id)
        {
        var answer = confirm ("Are you sure you want to delete from this post?");
        if (answer)
        {
                $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('questions/deletefile');?>",
                        data: "image_id="+image_id,
                        success: function (response) {
                          if (response == 'deleted') {
                            $(".imagelocation"+image_id).remove(".imagelocation"+image_id);
                          };

                        }
                    });
              }
        }
        </script>