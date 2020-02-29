<?php

/**
 *
 * ASK THEME B3
 *
 */
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) {
	exit;
} // 개별 페이지 접근 불가

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();

if (!isset($g5['title'])) {
	$g5['title'] = $config['cf_title'];
	$g5_head_title = $g5['title'];
} else {
	$g5_head_title = $g5['title']; // 상태바에 표시될 제목
	$g5_head_title .= " | " . $config['cf_title'];
}

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location']) {
	$g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
}
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/' . G5_ADMIN_DIR . '/') || $is_admin == 'super') {
	$g5['lo_url'] = '';
}
//관리권한 체크 
if (auth_idcheck() == true) {
	$is_auth == true;
}
/*
  // 만료된 페이지로 사용하시는 경우
  header("Cache-Control: no-cache"); // HTTP/1.1
  header("Expires: 0"); // rfc2616 - Section 14.21
  header("Pragma: no-cache"); // HTTP/1.0
 */
?>
<!doctype html>
<html lang="ko">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
	<meta name="HandheldFriendly" content="true">
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="X-UA-Compatible" content="IE=11,chrome=1">
	<meta name="author" content="asktheme_business.gnuboard">
	<?php
	/**
	 * ASK Metatag Generator
	 */
	include_once G5_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'ask-metagen' . DIRECTORY_SEPARATOR . 'askmetagen.php';
	?>
	<!-- favicon -->
	<link rel="shortcut icon" size="32x32" href="<?php echo G5_THEME_IMG_URL ?>/favicon-32.png">
	<link rel="apple-touch-icon" size="57x57" href="<?php echo G5_THEME_IMG_URL ?>/favicon-57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo G5_THEME_IMG_URL ?>/favicon-72.png">
	<link rel="google-tv-icon" sizes="96x96" href="<?php echo G5_THEME_IMG_URL ?>/favicon-96.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo G5_THEME_IMG_URL ?>/favicon-120.png">
	<link rel="chrome-webstore-icon" sizes="128x128" href="<?php echo G5_THEME_IMG_URL ?>/favicon-128.png">
	<link rel="IE-10-icon" sizes="144x144" href="<?php echo G5_THEME_IMG_URL ?>/favicon-144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo G5_THEME_IMG_URL ?>/favicon-152.png">

	<?php
	//반응형 - 모바일 구분하지 않음

	if ($config['cf_add_meta']) {
		echo $config['cf_add_meta'] . PHP_EOL;
	}
	?>
	<title><?php echo $g5_head_title; ?></title>
	<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL ?>/default.css?ver=<?php echo G5_CSS_VER ?>">
	<!-- 위 라인을 변경하면 add_stylesheet 함수가 작동하지 않습니다. 변경 금지 -->


	<!-- ##############################################################
		페이지 로딩속도를 개선하려면 css 파일을 하나로 합쳐서 사용해 보세요.
	############################################################## -->

	<!-- css 합본 <link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/dist.css?ver=<?php echo G5_CSS_VER; ?>"> -->
	<?php
	add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/bootstrap.css?ver=' . G5_CSS_VER . '">', 10);
	add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/font-awesome.min.css?ver=' . G5_CSS_VER . '">', 11);
	add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/lineio.css?ver=' . G5_CSS_VER . '">', 12);
	add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_URL . '/plugin/noty/lib/noty.css?ver=' . G5_CSS_VER . '">', 13);
	add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_URL . '/plugin/tether/dist/css/tether.min.css?ver=' . G5_CSS_VER . '">', 14);
	add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_URL . '/plugin/swiper/dist/css/swiper.min.css?ver=' . G5_CSS_VER . '">', 15);
	add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_URL . '/plugin/jquery.mb.ytplayer/dist/css/jquery.mb.YTPlayer.min.css?ver=' . G5_CSS_VER . '">', 16);
	?>

	<!--[if lte IE 8]>
        <script src="<?php echo G5_JS_URL ?>/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">
		// 자바스크립트에서 사용하는 전역변수 선언
		var g5_url = "<?php echo G5_URL ?>";
		var g5_bbs_url = "<?php echo G5_BBS_URL ?>";
		var g5_is_member = "<?php echo isset($is_member) ? $is_member : ''; ?>";
		var g5_is_admin = "<?php echo isset($is_admin) ? $is_admin : ''; ?>";
		var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
		var g5_bo_table = "<?php echo isset($bo_table) ? $bo_table : ''; ?>";
		var g5_sca = "<?php echo isset($sca) ? $sca : ''; ?>";
		var g5_editor = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor']) ? $config['cf_editor'] : ''; ?>";
		var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
		var g5_theme_url = "<?php echo G5_THEME_URL ?>";
	</script>

	<!-- script -->
	<!-- #######################################################################
		페이지 로딩속도를 개선하려면 javascript 파일을 하나로 합쳐서 사용해 보세요.
	######################################################################### -->
	<!-- 구버전 웹브라우저 IE11 지원 polyfill -->

	<?php
	add_javascript('<script crossorigin="anonymous" src="//polyfill.io/v3/polyfill.min.js?features=default%2Ces5%2Ces6%2Ces7"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/jquery/dist/jquery.min.js?ver=<?php echo G5_JS_VER; ?>"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/jquery-migrate/dist/jquery-migrate.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/js-offcanvas/dist/_js/js-offcanvas.pkgd.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/tether/dist/js/tether.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/noty/lib/noty.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/swiper/dist/js/swiper.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/snapsvg/dist/snap.svg-min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/enquire.js/dist/enquire.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/popper.js/dist/umd/popper.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/bootstrap/dist/js/bootstrap.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/scrollmagic/scrollmagic/minified/ScrollMagic.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/scrollmagic/scrollmagic/minified/plugins/animation.velocity.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/scrollmagic/scrollmagic/minified/plugins/jquery.ScrollMagic.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/jquery.stellar/jquery.stellar.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_URL  . '/plugin/jquery-match-height/dist/jquery.matchHeight-min.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_THEME_JS_URL . '/dist-min.js"></script>');
	add_javascript('<script src="' . G5_JS_URL . '/common.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_JS_URL . '/wrest.js?ver=' . G5_JS_VER   . '"></script>');
	add_javascript('<script src="' . G5_JS_URL . '/modernizr.custom.70111.js?ver=' . G5_JS_VER   . '"></script>');

	if (G5_IS_MOBILE) {
		add_javascript('<script src="' . G5_JS_URL . '/modernizr.custom.70111.js"></script>') . PHP_EOL; // overflow scroll 감지
	}
	if (!defined('G5_IS_ADMIN')) {
		echo $config['cf_add_script'];
	}
	?>
</head>
<?php
$data_target = "#basic-primary-menu";
if (is_mobile() == true) {
	$data_target = "#moile-side-menu";
}
?>

<body class="stretched" data-spy="scroll" data-target="<?php echo $data_target ?>" data-offset="0">
	<a name="home" class="home-anchor" id="home"></a>
	<div id="wrapper" class="wrapper">
		<?php
		if ($is_member) { // 회원이라면 로그인 중이라는 메세지를 출력해준다.
			$sr_admin_msg = '';
			if ($is_admin == 'super') {
				$sr_admin_msg = "최고관리자 ";
			} else {
				if ($is_admin == 'group') {
					$sr_admin_msg = "그룹관리자 ";
				} else {
					if ($is_admin == 'board') {
						$sr_admin_msg = "게시판관리자 ";
					}
				}
			}

			echo '<div id="hd_login_msg" class="sr-only">' . $sr_admin_msg . get_text($member['mb_nick']) . '님 로그인 중 ';
			echo '<a href="' . G5_BBS_URL . '/logout.php">로그아웃</a></div>';
		}
		?>