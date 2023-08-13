<legend>Tambah Soalan</legend>
<div class="container-fluid">
<form method="post" action="<?=base_url()?>soalan/save">
    <div class="col-md-10 well">
        
        <div class="row">
            <div class="col-md-2"><b>Modul</b></div>
            <div class="col-md-10">
                <select class="form-control" name="id_modul">
                    <?php foreach ($moduls as $key => $data): ?>
                        <option value="<?= $data->id ?>"><?= $data->keterangan ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="hidden" name="hidden_kat" value="<?=$kat ?>">
            <div class="col-md-2"><b>Soalan</b></div>
            <div class="col-md-10"><textarea id="textarea_editor" rows="5" name="soalan" class="form-control">Polisi Pematuhan Kendiri Alam Sekitar (Self Regulatory Environmental Policy)</textarea></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2"><b>Jenis Jawapan</b></div>
            <div class="col-md-10">
                <input type="radio" name="jenis_jawapan" value="rb" checked=""> One (radio button) &nbsp;
                <input type="radio" name="jenis_jawapan" value="cb"> Multiple (check box) &nbsp;
                <input type="radio" name="jenis_jawapan" value="txt"> Text <br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2"><b>Pilihan Jawapan</b></div>
            <div class="col-md-10">
<!--                <span class="glyphicon glyphicon-plus-sign" style="font-size: 16px" onclick="addInput('dynamicInput');"></span>-->
<!--                <span class="glyphicon glyphicon-plus-sign" style="font-size: 16px" class="add"></span>-->
                <div class="optionBox">
                    <div class='block'><input name='myInputs[]' type='text' ><span class='remove'>Remove Option</span></div>
                    <div class='block'><input name='myInputs[]' type='text' ><span class='remove'>Remove Option</span></div>
                <!--    <div class="col-md-2">
                        <span class="glyphicon glyphicon-trash"></span>
                    </div>-->
                </div>
                
                <span class="add">Add Option</span>
                <!--<input type="button" value="Remove" onClick="removeInput('dynamicInput');">-->
                <!--<input type="button" value="Remove" class="remove">-->
                
    

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2"><b>Ada Ulasan ?</b></div>
            <div class="col-md-10">
                <input type="radio" name="ada_ulasan" value="Y" checked=""> Ya &nbsp;
                <input type="radio" name="ada_ulasan" value="T"> Tidak <br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2"> </div>
            <div class="col-md-10"><input type="button" onclick="history.go(-1);" value="Back" class="btn btn-default">&nbsp;<input type="submit" class="btn btn-primary" value="Simpan"></div>
        </div>
    </div>
</form>
</div>
<script>
$('.add').click(function() {
    $('.block:last').before("<div class='block'><input name='myInputs[]' type='text' ><span class='remove'>Remove Option</span></div>");
});
$('.optionBox').on('click','.remove',function() {
 	$(this).parent().remove();
});
</script>
