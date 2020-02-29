<?php
    /*
     * ASKTHEME 첫게시물 사진출력
     */
    if (!defined('_GNUBOARD_')) {
        exit;
    }
    add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 0);
    //이미지 크기 설정
    $ask_img['width']  = 400;
    $ask_img['height'] = 300;
    $str_pic           = '';
    $str               = '';
?>
<?php for ($i = 0; $i < count($list); $i++) {?>
<?php
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $ask_img['width'], $ask_img['height']);
        if ($thumb == false) {
            $thumb['src'] = G5_THEME_IMG_URL . "/no-image.png";
        }

        $wr_info = '<span class="write-info">';
        $wr_info .= "<span class='date badge badge-light'>" . substr($list[$i]['datetime'], 5) . "</span>";
        $wr_info .= '</span>';

        if ($i == 0) {
            $str_pic .= "<div class='img-wrap'><img src='{$thumb['src']}' class='thumb'></div>";
            $str_pic .= "<a href=\"" . $list[$i]['href'] . "\" class='first-subject'>";
            $str_pic .= "{$list[$i]['subject']}";
            $str_pic .= "</a>";
        } else if ($i > 0) {
            //echo $list[$i]['icon_reply']." ";
            $str .= "<li>";
            $str .= "<a href=\"" . $list[$i]['href'] . "\">";
            //$str .= $wr_info;
            if ($list[$i]['is_notice']) {
                $str .= " <strong>" . $list[$i]['subject'] . "</strong>";
            } else {
                $str .= $list[$i]['subject'];
            }
            $str .= "</a>";
            $str .="<div class='icon-wrap'>";
            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

            if (isset($list[$i]['icon_new'])) {
                $str .= " " . $list[$i]['icon_new'];
            }
            if (isset($list[$i]['icon_hot'])) {
                $str .= " " . $list[$i]['icon_hot'];
            }
            if (isset($list[$i]['icon_file'])) {
                $str .= " " . $list[$i]['icon_file'];
            }
            if (isset($list[$i]['icon_link'])) {
                $str .= " " . $list[$i]['icon_link'];
            }
            if (isset($list[$i]['icon_secret'])) {
                $str .= " " . $list[$i]['icon_secret'];
            }
            if ($list[$i]['comment_cnt']) {
                $str .= "<span class='badge badge-light'><i class='fa fa-commenting-o' aria-hidden='true'></i> " . $list[$i]['comment_cnt'] . "</span>";
            }
            $str .= "</div>";

        }
        
        $str .= '</li>';

}?>

<div class="latest-firstpic-wrap">
    <div class="border border-gray">
        <div class='latest-equal-item'>
            <div class="latest-title">
                <a href="<?php echo ask_get_pretty_board_url($bo_table);?>"><?php echo $bo_subject; ?></a>
            </div>
            <div class='media-body'>
                <div class='row'>
                    <div class='thumbnails col-sm-12 col-md-5 col-lg-5'>
                        <?php echo $str_pic ?>
                    </div>
                    <div class='col-sm-12 col-md-7 col-lg-7'>
                        <ul class="latest-content">
                            <?php echo $str; ?>
                            <?php if (count($list) == 0) {?>
                                <li class="empty-latest-article">게시물이 없습니다.</li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>