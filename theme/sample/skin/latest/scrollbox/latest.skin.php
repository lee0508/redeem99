<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
add_javascript('<script src="'.$latest_skin_url.'/jquery.scrollbox.js"></script>',1);
?>
<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->

<div class="lt_wrap" id="lt_wrap_<?php echo $bo_table?>">
    <div class="lt" id="lt_<?php echo $bo_table?>">
        <ul>
            <?php for ($i=0; $i<count($list); $i++) {  ?>
            <li>
                <?php
            //echo $list[$i]['icon_reply']." ";
            echo "<a href=\"".$list[$i]['href']."\">";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];

            if ($list[$i]['comment_cnt'])
                echo $list[$i]['comment_cnt'];

            echo "</a>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

            if (isset($list[$i]['icon_new'])) echo " " . $list[$i]['icon_new'];
            if (isset($list[$i]['icon_hot'])) echo " " . $list[$i]['icon_hot'];
            if (isset($list[$i]['icon_file'])) echo " " . $list[$i]['icon_file'];
            if (isset($list[$i]['icon_link'])) echo " " . $list[$i]['icon_link'];
            if (isset($list[$i]['icon_secret'])) echo " " . $list[$i]['icon_secret'];
            
			echo "<span class=\"b_date\">{$list[$i][datetime]}</span>"; 
            ?>
            </li>
            <?php }  ?>
            <?php if (count($list) == 0) { //게시물이 없을 때  ?>
            <li>게시물이 없습니다.</li>
            <?php } ?>
        </ul>
    </div>
    <div class="ctl"> <img src="<?php echo $latest_skin_url?>/img/btn_prev.gif" alt="이전" class="btn_prev"><br>
        <img src="<?php echo $latest_skin_url?>/img/btn_stop.gif" alt="멈춤" class="btn_toggle" data-auto="1"><br>
        <img src="<?php echo $latest_skin_url?>/img/btn_next.gif" alt="다음" class="btn_next"> </div>
</div>
<script>
$('#lt_<?=$bo_table?>').scrollbox();
$('#lt_wrap_<?=$bo_table?> .btn_prev').click(function () {
  $('#lt_<?=$bo_table?>').trigger('backward');
});
$('#lt_wrap_<?=$bo_table?> .btn_next').click(function () {
  $('#lt_<?=$bo_table?>').trigger('forward');
});
$('#lt_wrap_<?=$bo_table?> .btn_toggle').click(function () {
  var auto = $(this).data('auto');
  if(auto == '1') {
	$('#lt_<?=$bo_table?>').trigger('updateConfig',{autoPlay:false, paused:true});
  	
	$(this).data('auto','0');
  	var src = $(this).attr('src');
  	$(this).attr('src', src.replace('btn_stop','btn_play'));
  }
  else {
	$('#lt_<?=$bo_table?>').trigger('updateConfig',{autoPlay:true, paused:false});
	$('#lt_<?=$bo_table?>').trigger('forward');
  	$(this).data('auto','1');
  	var src = $(this).attr('src');
  	$(this).attr('src', src.replace('btn_play','btn_stop'));
  }
});
</script> 
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->