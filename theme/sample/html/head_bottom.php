<!--{{{ sub_visual visual<?php echo $hb_bg?>-->
<div class="sub_visual visual<?php echo $hb_bg?>">
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
    <?php } ?>
      <p class="sub_title"><?php echo get_text($hb_subtitle)?></p>
    <h3><?php echo $MENUM[$hb_key]['me_name']?></h3>
  
    <p class="cover"></p>
    <p class="bg"></p>

</div>
<!--}}} sub_visual visual<?php echo $hb_bg?>-->