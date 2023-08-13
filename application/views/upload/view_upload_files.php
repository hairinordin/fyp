<?php if($answered) : ?>
    <div class="row">
        <input type='hidden' id='idpremise' value='' name="idpremise">
      <div class = "upload-image-messages"></div>
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
                                    <td width="70%">
                                        <?php foreach($answered as $file):?>
                                        
                                        <?php if($file->id_tool == $i):?>
                                <li class="imagelocation<?=$file->id ?>" >
                                    
                                    <a href="<?= base_url($file->path)?>"  target="_blank" ><?= $file->file_name ?></a>&nbsp;
                                       
                                </li>
                                        <?php endif; endforeach;?>
                                         
                                    </td>
                                </tr>

                                <?php endfor;?>
                                
                            </table>
                        </div>
                    </div>
<?php else : ?>
<div class="row">
    <h4>No attachment provided</h4>
    </div>
<?php endif; ?>
