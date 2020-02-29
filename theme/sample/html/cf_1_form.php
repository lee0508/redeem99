
<button type="button" id="btn-cf_1"><i class="fa fa-gear"></i></button>

<form action="<?php echo G5_THEME_URL.'/html/cf_1_edit_x.php' ?>" id="cf_1_form" name="cf_1_form" style="display:none;">
    <h3>부가설명</h3>
    <div class="line"><input type="text" name="cf_1" id="cf_1" value="<?php echo get_text($config['cf_1']);?>"></div>
    <div class="tc"><input type="submit" value="설정 저장" class="btn_submit"></div>
</form>
<script>
$(function() {
    var cf_popup = null;
    $('#btn-cf_1').click(function(e) {
        cf_popup = $('#cf_1_form').bPopup();
    });
    $('#cf_1_form').submit(function(e) {
        e.preventDefault();
        var x_url = $(this).attr('action');
        $.ajax({
            method: "POST",
            type: "POST",
            url: x_url,
            data: {
                'cf_1':$('#cf_1').val()
            },
            dataType: "json"
        })
            .done(function(data) {
                if(data['error']) alert(data['error']);
                else {
                    window.location.reload();
                }
            });
    
    });
});
</script>