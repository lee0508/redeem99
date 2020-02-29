<?php
    /*
     * 배너 테스트
     */
    if (!defined('_GNUBOARD_')) {
        exit;
    }
    add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 0);
    
    //썸네일 크기 설정
    $ask_img['width'] = 400;
    $ask_img['height'] = 300;
?>

<div class="latest-banner-wrap">
<?php
    for ($i = 0; $i < count($list); $i++) {
        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $ask_img['width'], $ask_img['height']);
        if ($thumb == false) {
            $thumb['src'] = G5_THEME_IMG_URL . "/no-image.png";
        }
        echo "<div class='gallery-image'>";
        //게시판 링크#1번 이용
        echo "<a href='{$list[$i]['wr_link1']}'>";
        //이미지 썸네일
        echo "<img src='{$thumb['src']}' style='width:100%;'>";
        echo "</a>";
        echo "</div>";
}?>
</div>