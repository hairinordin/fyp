<h1>Manage Subject</h1>

<form method="post" action="<?=base_url() ?>questions/add_new_subject/">
    (If any)Title: <input type="text" name="title" ><br>
    Subject: <input type="text" name="subject" ><br>
    <select name="id_tool">
    <option value=""></option>
    <?php 
        #                             !vCHANGEv!
        foreach($list_of_tools as $tool => $value) 
        {
           //$tool = htmlspecialchars($tool); 
           echo '<option value="'. $value['tool_no'] .'">' . 'Tool ' . $value['tool_no'] . ': '. $value['tool_title'] .'</option>';
        }
    ?>
    </select>
    <input type="submit">
</form>