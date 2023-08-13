<legend>EMT completed for your premise is X/7 </legend>

<div class="row">
    <div class="well">
        <p>
            <input class= "magic-checkbox" type="checkbox" name="declaration" id="declaration_cb" value="accept">
            <label for="declaration_cb">
                I hereby declare that the information provided is true and correct.
            </label> 
        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <table class="table table-bordered">
            <tr  class="info">
                <td width="30%">
                    Reporting officer
                </td>
                <td>
                    <?= $premise_info->name ?>
                </td>
            </tr>

            <tr>
                <td>
                    Identification no
                </td>
                <td>
                    <?= $premise_info->ic_no ?>
                </td>
            </tr>

            <tr>
                <td>
                    Position (in company)
                </td>
                <td>
                    <?= $premise_info->position ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-4">
        <table class="table table-bordered">
            <tr  class="info">
                <td width="30%">
                    Company Name
                </td>
                <td>
                    <?= $premise_info->namapremis ?>
                </td>
            </tr>

            <tr>
                <td>
                    DOE File No
                </td>
                <td>
                    <?= $premise_info->nofaildoe ?>
                </td>
            </tr>

            <tr>
                <td>
                    Position (in company)
                </td>
                <td>
                    <?= $premise_info->position ?>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="form-group">
    <table class="table">
        <tr>
            <td style="width: 25%">
                <h3><b>Date </b><?php
                    $data = array(
                        'class' => 'form-group',
                        'size' => 10,
                        'name' => 'declaration_date',
                        'type' => 'text',
                        'value' => date("d M Y"),
                        'readonly' => true
                    );
                    echo form_input($data);
                    ?> </h3>
            </td>

        </tr>

    </table>

</div>

<div class="row>"
    <div class="col-md-12">
        <input type="button" value = "Save" >
        <input type="button" value = "Update" >
        <input type="button" value = "Submit" >
    </div>
</div>