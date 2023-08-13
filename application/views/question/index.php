<?php //debugging purposes
//echo '<pre>';
//print_r($tool_status);
//echo '</pre>';
//
//echo $tool_status[1]->status;
?>
<div class="container-fluid">
    <div class="col-md-12">

        <div class="page-header">
            <h1><small>To be completed by </small>31 August 2018</h1> <h1 class="text-right"><small>Days remaining  </small>65 Days</h1> 
        </div>
        <?php $random = rand(5, 80) ?>

        <div class="progress" style="border-radius: 3px; height: 30px;">
            <div class="progress-bar progress-bar-striped active" role="progressbar"  style="width: <?= $random ?>%; ">
                <?= $random ?>% Complete
            </div>
        </div>
        <table class="table table-hover">
            <tr>
                <td><b>Tool</b></td>
                <td><b>Status</b></td>
                <td><b>Action</b></td>
            </tr>

            <?php
            foreach ($tools as $tool) {
                echo '<tr><td>';
                echo 'Tool - ' . $tool->tool_no . ' : ' . $tool->tool_title . ' ' . $tool->tool_shortform;
                echo '</td><td>';
                echo 'Draft/Submit/On Review/Revert back';
                echo '</td><td>';
                
                if($tool_status[$tool->tool_no]){
                if($tool->tool_no == $tool_status[$tool->tool_no]->id_tool){
                    if($tool_status[$tool->tool_no]->status == 'submit'){
                      echo  '<a href='. base_url() . '/questions/view_answer_dynamically/' . $this->idpremis . '/' . $tool->tool_no . '>View <i class="fa fa-search" aria-hidden="true"></i></a>  ';  
                    } elseif ($tool_status[$tool->tool_no]->status == 'draft') {
                      echo '<a href= ' . base_url() .'/questions/edit_view/' . $tool->tool_no . '>Edit</a>';
                    } 
 
                }
                }else{
                      echo '<a href= ' . base_url() .'/questions/view_question_dynamically/' . $tool->tool_no . '>Answer <i class="fa fa-pencil" aria-hidden="true"></i></a>';
                    }
 
                echo '</td></tr>';
            }
            ?>

        </table>

    </div>
</div>