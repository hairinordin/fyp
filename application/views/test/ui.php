<input type="text" class="dt">
<input type="text" class="dt">
<input type="text" class="dt">
<input type="button" value="click me">
<input type="button" value="click me" id="btn">
<span>server time ...</span>

<script>
$(function() {
    $('#btn').click(function() {
       $('#xcontent span').load('<?= base_url('test/time') ?>');
    });
    
    
    $('.dt').datepicker({dateFormat:'d/m/yy'});
    $('input[type=button]:first').click(function() {
        $(this).attr('disabled', true);
        $(this).hide();
    });
    var obj = {
        nama: 'azman',
        say: function() {
            alert('hi');
        }
    }; // object literal
    console.log(obj.nama);
    obj.say();
});
</script>