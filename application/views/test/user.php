<div class="col-md-4">
    <table class="table" id="mytable">
        <tr>
            <td>Nama</td>
        </tr>
        <?php
        foreach ($users as $user) :
            ?>
            <tr>
                <td><a href="#" data="<?= $user->id ?>"><?= $user->name ?></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="col-md-8 well">
    Nama : <span id="nama"></span><br>
    Email : <span id="email"></span><br>
</div>

<script>
$(function() {
    $('#mytable a').click(function() {
        var data = $(this).attr('data');
        //console.log(data);
        $.get('<?= base_url('test/profile') ?>', {id : data}, function(data) {
            $('#nama').text(data.name);
            $('#email').text(data.email);
        }, 'json');
    });
});
</script>