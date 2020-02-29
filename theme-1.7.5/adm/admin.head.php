<?php
    if (!defined('_GNUBOARD_')) {
        exit;
    }

    $begin_time = get_microtime();

    $files = glob(G5_ADMIN_PATH . '/css/admin_extend_*');
    if (is_array($files)) {
        foreach ((array) $files as $k => $css_file) {

            $fileinfo = pathinfo($css_file);
            $ext      = $fileinfo['extension'];
            if ($ext !== 'css') {
                continue;
            }

            $css_file = str_replace(G5_ADMIN_PATH, G5_ADMIN_URL, $css_file);
            add_stylesheet('<link rel="stylesheet" href="' . $css_file . '?v=111">', $k);
        }
    }

    include_once G5_ADMIN_PATH . '/head.sub.php'; //askadmin - 관리자 경로에 넣음

    /**
     * @param $key
     * @param $no
     * @return mixed
     */
    function print_menu1($key, $no = '')
    {
        global $menu;

        $str = print_menu2($key, $no);

        return $str;
    }

    /**
     * @param $key
     * @param $no
     * @return mixed
     */
    function print_menu2($key, $no = '')
    {
        global $menu, $auth_menu, $is_admin, $auth, $g5, $sub_menu;

        $str .= "<ul class='nav flex-column'>";
        for ($i = 1; $i < count($menu[$key]); $i++) {
            if ($is_admin != 'super' && (!array_key_exists($menu[$key][$i][0], $auth) || !strstr($auth[$menu[$key][$i][0]], 'r'))) {
                continue;
            }

            if (($menu[$key][$i][4] == 1 && $gnb_grp_style == false) || ($menu[$key][$i][4] != 1 && $gnb_grp_style == true)) {
                $gnb_grp_div = 'gnb_grp_div';
            } else {
                $gnb_grp_div = '';
            }

            if ($menu[$key][$i][4] == 1) {
                $gnb_grp_style = 'gnb_grp_style';
            } else {
                $gnb_grp_style = '';
            }

            $current_tag = '';

            if ($menu[$key][$i][0] == $sub_menu) {
                $current_tag = ' <i class="fa fa-folder-open-o" aria-hidden="true"></i> ';
            }

            $str .= '<li data-menu="' . $menu[$key][$i][0] . '" class="nav-item"><a href="' . $menu[$key][$i][2] . '" class="nav-link gnb_2da ' . $gnb_grp_style . ' ' . $gnb_grp_div . '">' . $current_tag . $menu[$key][$i][1] . '</a></li>';

            $auth_menu[$menu[$key][$i][0]] = $menu[$key][$i][1];
        }
        $str .= "</ul>";

        return $str;
    }

    $adm_menu_cookie = array(
        'container' => '',
        'gnb'       => '',
        'btn_gnb'   => '',
    );
    //add_stylesheet('<link rel="stylesheet" href="' . G5_ADMIN_URL . '/css/askadmin.css">', 1);
?>

<script>
    var tempX = 0;
    var tempY = 0;

    function imageview(id, w, h)
    {

        menu(id);

        var el_id = document.getElementById(id);

        //submenu = eval(name+".style");
        submenu = el_id.style;
        submenu.left = tempX - (w + 11);
        submenu.top = tempY - (h / 2);

        selectBoxVisible();

        if (el_id.style.display != 'none')
            selectBoxHidden(id);
    }
</script>
<div id="to_content" class="sr-only"><a href="#container">본문 바로가기</a></div>
<script type="text/javascript">
    $(function () {
        //슬라이드 메뉴 상태 기억
        $('#aside-view-trigger').click(function () {
            $('body').toggleClass(function () {
                if ($(this).hasClass('show-aside')) {
                    Cookies.set('aside-status', 'closed', {expires: 7, path: ''});
                    return "show-aside";
                } else {
                    Cookies.set('aside-status', 'opened', {expires: 7, path: ''});
                    return "show-aside";
                }
            });
        });

        //슬라이드 아이콘만 출력
        $('.hide-menu-group').click(function () {
            $('body').toggleClass(function () {

                if ($(this).hasClass('show-only-icon')) {
                    //열림
                    Cookies.set('aside-icon-status', 'closed', {expires: 7, path: ''});
                    $('.nav-link.nav-parent-link').attr('data-hover', 'no-tab');
                    return "show-only-icon";
                } else {
                    //닫힘
                    Cookies.set('aside-icon-status', 'opened', {expires: 7, path: ''});
                    $('.nav-link.nav-parent-link').attr('data-hover', 'tab');
                    return "show-only-icon";
                }
            });
            $(this).toggleClass('rotate180');
        });



        $('.nav-parent-link, .tab-content').on("mouseenter", function () {
            var aside = $('body').hasClass('show-aside');
            var icon = $('body').hasClass('show-only-icon');
            if (aside == true && icon == true) {
                $('.ask-side-menu').addClass('hover-menu');
            }
        });
        $('.nav-parent-link, .tab-content').on("mouseleave", function () {
            var aside = $('body').hasClass('show-aside');
            var icon = $('body').hasClass('show-only-icon');
            if (aside == true && icon == true) {
                $('.ask-side-menu').removeClass('hover-menu');
            }
        });

        $('.nav-parent-link').hover(function (e) {
            $(document).on('mouseenter.bs.tab.data-api', '[data-toggle="tab"], [data-hover="tab"]', function () {
                var aside = $('body').hasClass('show-aside');
                var icon = $('body').hasClass('show-only-icon');
                if (aside == true && icon == true) {
                    $(this).tab('show');
                    console.log(e);
                }
            });
            e.stopImmediatePropagation();
        });
    });
    /*
     (function ($) {
     $(function () {
     $(document).off('click.bs.tab.data-api', '[data-hover="tab"]');
     $(document).on('mouseenter.bs.tab.data-api', '[data-toggle="tab"], [data-hover="tab"]', function () {
     $(this).tab('show');
     });
     });
     })(jQuery);
     *
     */
</script>

<?php
    //페이지별 class 추가
    // parent file name without file extension
    $page_class = basename($_SERVER["SCRIPT_FILENAME"], '.php');
?>
<div id="wrapper" class="<?php echo $page_class ?>">
    <header id="hd" class="fixed-top">
        <div class="row">
            <div class="col-sm-12">
                <h1><?php echo $config['cf_title'] ?></h1>
                <div id="hd_top">
                    <button type="button" id="aside-view-trigger" class="menu-button" data-offcanvas-trigger="ask-off-canvas-menu">메뉴</button>
                    <div id="logo">
                        <a href="<?php echo G5_ADMIN_URL ?>">
                            <img src="<?php echo G5_ADMIN_URL ?>/img/logo.png" alt="<?php echo $config['cf_title'] ?> 관리자" class='d-none d-sm-inline'>
                            <span class='d-block d-sm-none'>ADM</span>
                        </a>
                    </div>

                    <div class="right-menu">
                        <div class="btn-menu">
                            <a href="<?php echo G5_URL ?>/" class="btn btn-info" target="_blank" title="커뮤니티 바로가기"><i class="fa fa-home" aria-hidden="true"></i><span class="sr-only">커뮤니티 바로가기</span></a>
                            <a href="<?php echo G5_ADMIN_URL ?>/service.php" class="btn btn-info"><i class="fa fa-krw" aria-hidden="true"></i><span class='sr-only'>부가서비스</span></a>
                            <div class="btn-group dropdown">
                                <a href="#" id='admindropmenu' class="btn btn-primary nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">관리자</a>
                                <div class="dropdown-menu" aria-labelledby='admindropmenu'>
                                    <a href="<?php echo G5_ADMIN_URL ?>/member_form.php?w=u&amp;mb_id=<?php echo $member['mb_id'] ?>" class="dropdown-item"><i class="fa fa-info-circle" aria-hidden="true"></i> 관리자정보</a>
                                    <a href="<?php echo G5_BBS_URL ?>/logout.php" class="dropdown-item"> <i class="fa fa-sign-out" aria-hidden="true"></i> 로그아웃</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="contents-wrapper">
        <aside class="ask-side-menu aside position-fixed" id="ask-off-canvas-menu">
            <nav id="gnb" class="gnb_large">
                <h2 class="sr-only">관리자 주메뉴</h2>
                <div class="tab-wrap d-flex">
                    <div class="tab-icon">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php
                                $jj   = 1;
                                $icon = array('', 'fa-cog', 'fa-user', 'fa-list', 'fa-envelope');
                                foreach ($amenu as $key => $value) {
                                    $href1 = $href2 = '';

                                    if ($menu['menu' . $key][0][2]) {
                                        $href1 = '<a href="' . $menu['menu' . $key][0][2] . '" class="gnb_1da">';
                                        $href2 = '</a>';
                                    } else {
                                        continue;
                                    }

                                    $button_title  = $menu['menu' . $key][0][1];
                                    $current_class = "";
                                    if (isset($sub_menu) && (substr($sub_menu, 0, 3) == substr($menu['menu' . $key][0][0], 0, 3))) {
                                        $current_class = " show active";
                                    }

                                    if ($_COOKIE['aside-icon-status'] == 'opened') {
                                        //닫힘
                                        $data_tap = "tab";
                                    } else {
                                        //열림
                                        $data_tap = "no-tab";
                                    }
                                ?>
                                <a class="nav-link nav-parent-link<?php echo $current_class ?>" id="v-pills-<?php echo $jj ?>-tab" data-hover="<?php echo $data_tap ?>" data-toggle="pill" href="#v-pills-<?php echo $jj ?>" role="tab" aria-controls="v-pills-<?php echo $jj ?>" aria-selected="true">
                                    <i class="fa                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo $icon[$jj] ?>" aria-hidden="true"></i>
                                    <span class="sr-only"><?php echo $button_title; ?></span>
                                </a>
                                <?php
                                    $jj++;
                                    } //end foreach
                                ?>
                        </div>
                    </div>

                    <div class="tab-contents">
                        <div class="tab-content" id="v-pills-tabContent">
                            <?php
                                $jj = 1;
                                foreach ($amenu as $key => $value) {
                                    $href1 = $href2 = '';

                                    if ($menu['menu' . $key][0][2]) {
                                        $href1 = '<a href="' . $menu['menu' . $key][0][2] . '" class="gnb_1da">';
                                        $href2 = '</a>';
                                    } else {
                                        continue;
                                    }

                                    $current_class = "";
                                    if (isset($sub_menu) && (substr($sub_menu, 0, 3) == substr($menu['menu' . $key][0][0], 0, 3))) {
                                        $current_class = " show active";
                                    }

                                    $button_title = $menu['menu' . $key][0][1];
                                ?>
                                <div class="tab-pane fade
                                 <?php echo $current_class ?> menu-list" id="v-pills-<?php echo $jj ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $jj ?>-tab">
                                    <h3 class="menu-group d-block">
                                        <?php echo $menu['menu' . $key][0][1]; ?>
                                    </h3>
                                    <?php echo print_menu1('menu' . $key, 1); ?>
                                </div>
                                <?php
                                    $jj++;
                                    } //end foreach
                                ?>
                        </div>
                    </div>
                    <button class="hide-menu-group">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </button>
                </div>
            </nav>
        </aside>
        <div id="container" class="box content-container">
            <div class="contents-hide"></div>
            <div class="container_wr">
                <h1 id="container_title"><?php echo $g5['title'] ?></h1>