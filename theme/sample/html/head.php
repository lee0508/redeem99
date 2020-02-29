<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');

/*
// 인클루드 하기 전에 정의
$hb_me_code = ...;
$hb_key = ...;
$hb_title = ...;
$hb_subtitle = ...
$hb_bg_class = ...;
*/
?>
<!--{{{ sub_visual visual<?php echo $hb_bg?>-->
<div class="sub_visual <?php echo $hb_bg_class?>">
    <h3><?php echo $hb_title?></h3>
    <p class="sub_title"><?php echo get_text($hb_subtitle)?></p>
    <p class="cover"></p>
    <p class="bg"></p>
    <?php if ($MENUM[$hb_key] && count($MENUM[$hb_key]['ms']) > 0) { ?>
    <nav class="sub_navi">
        <ul>
            <?php 
            foreach($MENUM[$hb_key]['ms'] as $k=>$sub_menu) { 
                $on = '';
                if($k == $hb_me_code) $on = ' class="on"';
                $target = '';
                if($sub_menu['me_link'] == 'self') $target = ' target="_self"';
                else if($sub_menu['me_link'] == 'blank') $target = ' target="_blank"';                
            ?>
            <li><a href="<?php echo $sub_menu['me_link']?>"<?php echo $on?><?php echo $target?>><?php echo get_text($sub_menu['me_name']); ?></a></li>
            <?php 
            } 
            ?>
        </ul>
    </nav>
    <?php } else if (is_array($sub_menus) && count($sub_menus) > 0) {?>
    <nav class="sub_navi">
        <ul>
            <?php 
            foreach($sub_menus as $k=>$sub_menu) { 
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
</div>
<!--}}} sub_visual visual<?php echo $hb_bg?>-->

<div id="wrap"> 
    <section class="content subContent">
        <?php include_once(G5_THEME_PATH.'/html/sns.php'); ?>
        <h3><?php echo get_text($hb_title)?></h3>
        <p class="subTxt1"><?php echo get_text($config['cf_1'])?><?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?></p>
        <div class="txtCon">