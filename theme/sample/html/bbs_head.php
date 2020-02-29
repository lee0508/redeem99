<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');

if($is_admin && $bo_table) {
    add_javascript('<script src="'.G5_THEME_URL.'/js/jquery.bpopup.min.js"></script>');
?>
<form action="<?php echo G5_THEME_URL.'/html/bbs_head_edit_x.php' ?>" id="head-edit-form" name="head-edit-form" style="display:none;">
    <h3>헤더 관리</h3>
    <div class="line">
        <label for="bo_me_code">메뉴 코드</label>
        <input type="text" name="bo_me_code" id="bo_me_code"  value="<?php echo get_text($board['bo_me_code']);?>" size="6">
        <a href="#" class="popup_me_code_select" data-field="bo_me_code">찾기</a>
    </div>
    <div class="line"><label for="bo_head_sub_title">서브 문구</label><input type="text" name="bo_head_sub_title" id="bo_head_sub_title" value="<?php echo get_text($board['bo_head_sub_title']);?>"></div>
    <div class="line"><label for="bo_head_bg_class">배경 이미지 class</label><input type="text" name="bo_head_bg_class" id="bo_head_bg_class" value="<?php echo get_text($board['bo_head_bg_class']);?>"></div>
    <div class="tc"><input type="submit" value="설정 저장" class="btn_submit"></div>
</form>
<script>
var target_me_code = '';
function set_me_code(me_code) {
    $('#'+target_me_code).val(me_code);
}
$(function() {
    $('.popup_me_code_select').click(function(e) {
        e.preventDefault();
        target_me_code = $(this).data('field');
        window.open('<?=G5_THEME_URL?>/adm/me_code_select.php', '', 'width=700,height=600,left=900,top=250,scrollbars=yes');
    });
    
    
    var hef_popup = null;
    $('#btn-mng-head').click(function(e) {
        hef_popup = $('#head-edit-form').bPopup();
    });
    $('#head-edit-form').submit(function(e) {
        e.preventDefault();
        var x_url = $(this).attr('action');
        $.ajax({
            method: "POST",
            type: "POST",
            url: x_url,
            data: {'bo_table':'<?=$bo_table?>', 
                'bo_head_bg_class':$('#bo_head_bg_class').val(), 
				'bo_head_sub_title':$('#bo_head_sub_title').val(),
                'bo_me_code':$('#bo_me_code').val()
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
<?php
}
$hb_me_code = $board['bo_me_code'];
$hb_key = substr($hb_me_code, 0, 2);
$hb_title = $MENUM[$hb_key]['me_name'];
$hb_subtitle = $board['bo_head_sub_title'];
$hb_bg_class = $board['bo_head_bg_class'];
?>
<!--{{{ sub_visual visual<?php echo $hb_bg?>-->
<div class="sub_visual <?php echo $hb_bg_class?>">
<?php if ($MENUM[$hb_key] && count($MENUM[$hb_key]['ms']) > 0) { ?>
    <nav class="sub_navi">
        <ul>
            <?php 
            foreach($MENUM[$hb_key]['ms'] as $k=>$sub_menu) { 
                $on = '';
                if($k == $hb_me_code) $on = ' class="on"';
                $target = '';
                if($sub_menu['me_target'] == 'self') $target = ' target="_self"';
                else if($sub_menu['me_target'] == 'blank') $target = ' target="_blank"';                
            ?>
            <li><a href="<?php echo $sub_menu['me_link']?>"<?php echo $on?><?php echo $target?>><?php echo get_text($sub_menu['me_name']); ?></a></li>
            <?php 
            } 
            ?>
        </ul>
    </nav>
    <?php } ?>
    
    <?php if($is_admin && $bo_table) {?>    
    <button type="button" id="btn-mng-head" style="">헤더 관리</button>
    <?php } ?>
  
    <p class="sub_title"><?php echo get_text($hb_subtitle)?></p>
    <h3><?php echo $hb_title?></h3>
    <p class="cover"></p>
    <p class="bg"></p>
    
</div>
<!--}}} sub_visual visual<?php echo $hb_bg?>-->

<?php include_once(G5_THEME_PATH.'/html/sub_navi.php');?>
<div id="wrap"> 
    <section class="content subContent">

        <h3><?php echo get_text($board['bo_subject'])?></h3>
        <p class="subTxt1"><?php echo get_text($config['cf_1'])?><?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?></p>
        <div class="board">