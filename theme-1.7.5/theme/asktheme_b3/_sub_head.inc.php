<?php
/**
 * 하위페이지 해더 공통
 */
if (!defined("_GNUBOARD_")) {
    exit;
}
$rand_page = rand(1, 4);

//하위메뉴 자동출력 - 작동하지 않을경우 직접 메뉴를 작성하세요.
$submenu = Asktheme::get_sub_menu();
if ($submenu) {
    $menu_str   = '<div class="sub-menu-wrap"><ul class="side-left-menu">';
    $menu_title = "";
    foreach ($submenu as $menu) {
        $active = "";
        if (strstr($menu['me_link'], Asktheme::get_script_name())) {
            $active     = " class='active'";
            $menu_title = $menu['me_name'];
            //관리자 메뉴에 Hash를 사용할 경우
            if (strstr($menu['me_link'], '#')) {
                $menu_title = $g5['title'];
            }
        }
        $menu_str .= "<li {$active}><a href='{$menu['me_link']}'>{$menu['me_name']}</a></li>";
    }
    $menu_str .= '</ul></div>';
}

if ($menu_title) {
    $page_title = $menu_title;
    if ($bo_table) {
        $page_title = $board['bo_subject'];
    }
} else {
    if ($bo_table) {
        $page_title = $board['bo_subject'];
    } else {
        $page_title = $g5['title'];
    }
}
//내용관리 제목 반영하기
if (isset($co_id) && $co_id != '') {
    $page_title_tmp = explode('|', $g5['title']);
    $page_title     = trim($page_title_tmp['0']);
}
