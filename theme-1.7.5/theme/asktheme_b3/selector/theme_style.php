<?php
if (!defined("_GNUBOARD_")) {
    exit;
}

add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/theme_style.css">', 0);
$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
?>
<div id="style-selector">
	<div class="style-toggle">
		<i class="fa fa-cog" aria-hidden="true"></i>
	</div>
	<div id="style-selector-container">
		<div class="style-selector-wrapper">
			<div class="ss-content ss-content-first clearfix">
				<a href="https://sir.kr/cmall/1499991844" target="_blank" class="btn btn-primary btn-block">구매하기</a>
			</div>
			<span class="ss-title">미리보기</span>
			<div class="ss-content ss-policies">
				<div class="preview-device">
					<a href="http://themeb3.asktheme.net/preview.php?device=mobile" target='_top' class="btn btn-info">
                        <i class="fa fa-mobile fa-2x" aria-hidden="true"></i>
                        <span>Mobile</span>
                    </a>
					<a href="http://themeb3.asktheme.net/preview.php?device=tablet" target='_top' class="btn btn-info">
                        <i class="fa fa-tablet fa-2x" aria-hidden="true"></i>
                        <span>Tablet</span>
                    </a>
					<a href="http://themeb3.asktheme.net/preview.php?device=laptop" target='_top' class="btn btn-info">
                        <i class="fa fa-laptop fa-2x" aria-hidden="true"></i>
                        <span>Laptop</span>
                    </a>
				</div>
			</div>
			<span class="ss-title">MENU</span>
			<div class="ss-content clearfix">
				<div class="preview-menu btn-group" style="margin-bottom:10px;">
					<?php
if (get_session('menu_type') == 'black') {
    $menu_select_black = " active ";
} elseif (get_session('menu_type') == 'white') {
    $menu_select_white = " active ";
} elseif (get_session('menu_type') == 'gray') {
    $menu_select_gray = " active ";
} elseif (get_session('menu_type') == 'morph') {
    $menu_select_morph = " active ";
} elseif (get_session('menu_type') == 'full') {
    $menu_select_full = " active ";
} elseif (get_session('menu_type') == 'pure') {
    $menu_select_pure = " active ";
} else {
    $menu_select_black = " active ";
}
?>
					<a href="http://themeb3.asktheme.net/?menu_type=black&ask_url=<?php echo $escaped_url ?>" class='<?php echo $menu_select_black ?> btn btn-sm btn-outline-secondary'>
                        Black
                    </a>
					<a href="http://themeb3.asktheme.net/?menu_type=white&ask_url=<?php echo $escaped_url ?>" class="<?php echo $menu_select_white ?> btn btn-sm btn-outline-secondary">
                        White
                    </a>
					<a href="http://themeb3.asktheme.net/?menu_type=gray&ask_url=<?php echo $escaped_url ?>" class="<?php echo $menu_select_gray ?> btn btn-sm btn-outline-secondary">
                        Gray
                    </a>
				</div>
				<div class="preview-menu btn-group ">
					<a href="http://themeb3.asktheme.net/?menu_type=morph&ask_url=<?php echo $escaped_url ?>" class="<?php echo $menu_select_morph ?> btn btn-sm btn-outline-secondary">
                        Morph
                    </a>
					<a href="http://themeb3.asktheme.net/?menu_type=full&ask_url=<?php echo $escaped_url ?>" class="<?php echo $menu_select_full ?> btn btn-sm btn-outline-secondary">
                        Full
                    </a>
					<a href="http://themeb3.asktheme.net/?menu_type=pure&ask_url=<?php echo $escaped_url ?>" class="<?php echo $menu_select_pure ?> btn btn-sm btn-outline-secondary">
                        Pure
                    </a>
				</div>
			</div>
			<span class="ss-title">ASIDE</span>
			<div class="ss-content clearfix">
				<div class="preview-aside">
					<?php
if (get_session('use_aside') == true) {
    $aside_select_true = "outline-";
} else {
    $aside_select_false = "outline-";
}
?>
					<a href="http://themeb3.asktheme.net/?use_aside=use&ask_url=<?php echo $escaped_url ?>" class="btn btn-sm btn-<?php echo $aside_select_false; ?>secondary">
                        사용
                    </a>
					<a href="http://themeb3.asktheme.net/?use_aside=notuse&ask_url=<?php echo $escaped_url ?>" class="btn btn-sm btn-<?php echo $aside_select_true; ?>secondary">
                        미사용
                    </a>
					<div class="alert alert-info">
						그누보드 기능에만 적용. 일반하위 페이지는 소스에서 설정
					</div>
				</div>
			</div>
			<div class="ss-content ss-no-styles">

			</div>
			<div class="ss-content demos-wrapper clearfix">
				<span class="ss-title">테마 / 플러그인 소개</span>
				<div class="goods-wrap">
					<div class='row no-gutters'>
						<div class='col col-sm-6'>
							<a href="https://sir.kr/cmall/1530604773" target='_blank'><img class="" src='<?php G5_URL?>/img/ask/card-askuploader.png'></a>
						</div>
						<div class='col col-sm-6'>
							<a href="https://sir.kr/cmall/1496363350" target='_blank'><img class="" src='<?php G5_URL?>/img/ask/card-asktools.png'></a>
						</div>
						<div class='col col-sm-6'>
							<a href="https://sir.kr/cmall/1531295950" target='_blank'><img class="" src='<?php G5_URL?>/img/ask/card-askbackup.png'></a>
						</div>
						<div class='col col-sm-6'>
							<a href="https://sir.kr/cmall/1531812976" target='_blank'><img class="" src='<?php G5_URL?>/img/ask/card-askmetagen.png'></a>
						</div>
						<div class='col col-sm-6'>
							<a href="https://sir.kr/cmall/1531902464" target='_blank'><img class="" src='<?php G5_URL?>/img/ask/card-askspam.png'></a>
						</div>
						<div class='col col-sm-6'>
							<a href="https://sir.kr/cmall/1503288760" target='_blank'><img class="" src='<?php G5_URL?>/img/ask/card-askwhitelogin.png'></a>
						</div>
					</div>
					<a href='https://sir.kr/cmall/shop.php?cp=neojins' target="_blank" class='btn btn-light pull-right'>More</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document)
		.ready(function() { if (jQuery("#style-selector")
				.width() < 281) { var e = document.getElementById("style-selector-container"),
					t = jQuery("#style-selector")
					.width();
				jQuery(".style-selector-wrapper")
					.height() > jQuery(window)
					.height() && (t += e.offsetWidth - e.clientWidth), jQuery("#style-selector")
					.width(t) } jQuery(window)
				.on("resize", function() { if (jQuery("#style-selector")
						.width() < 281) { var e = document.getElementById("style-selector-container"),
							t = jQuery("#style-selector")
							.width();
						jQuery(".style-selector-wrapper")
							.height() > jQuery(window)
							.height() && (t += e.offsetWidth - e.clientWidth), jQuery("#style-selector")
							.width(t) } }), jQuery("#style-selector .wide-button ")
				.click(function() { var e = "Wide";
					Cookies.remove("boxed_style_selector", { path: "/" }), Cookies.set("boxed_style_selector", e, { path: "/" }),
						jQuery(this)
						.addClass("active"), jQuery("#style-selector .boxed-button")
						.removeClass("active"), boxed_style_selector_change(e) }), jQuery("#style-selector .boxed-button")
				.click(function() { var e = "Boxed";
					Cookies.remove("boxed_style_selector", { path: "/" }), Cookies.set("boxed_style_selector", e, { path: "/" }),
						jQuery(this)
						.addClass("active"), jQuery("#style-selector .wide-button")
						.removeClass("active"), boxed_style_selector_change(e) }), Cookies.get("boxed_style_selector") && (
					boxed_style_selector_change(jQuery.cookie("boxed_style_selector")), "Boxed" === Cookies.get(
						"boxed_style_selector") && (jQuery("#style-selector .boxed-button")
						.addClass("active"), jQuery("#style-selector .wide-button")
						.removeClass("active"))), "disabled" === Cookies.get("style_selector_status") ? (jQuery("body")
					.removeClass("ss-close"), jQuery("body")
					.addClass("ss-open"), jQuery("#style-selector")
					.css("right", "-" + jQuery("#style-selector")
						.width() + "px")) : (jQuery("body")
					.removeClass("ss-open"), jQuery("body")
					.addClass("ss-close"), jQuery("#style-selector")
					.css("right", "0px")), jQuery("#style-selector .style-toggle")
				.click(function(e) { e.preventDefault(), jQuery("body")
						.hasClass("ss-close") ? (jQuery("body")
							.removeClass("ss-close"), jQuery("body")
							.addClass("ss-open"), jQuery("#style-selector")
							.animate({ right: "-" + jQuery("#style-selector")
									.width() + "px" }, "slow"), Cookies.remove("style_selector_status", { path: "/" }), Cookies.set(
								"style_selector_status", "disabled", { path: "/" })) : (jQuery("body")
							.removeClass("ss-open"), jQuery("body")
							.addClass("ss-close"), jQuery("#style-selector")
							.animate({ right: "0px" }, "slow"), Cookies.remove("style_selector_status", { path: "/" }), Cookies.set(
								"style_selector_status", "enabled", { path: "/" })) }), jQuery(".patterns a")
				.click(function(e) { e.preventDefault(); var t = jQuery(".wide-button.active, .boxed-button.active")
						.text(),
						s = jQuery(this)
						.attr("data-name");
					Cookies.remove("pattern_style_selector_current", { path: "/" }), Cookies.set("pattern_style_selector_current", t, { path: "/" }),
						Cookies.remove("pattern_style_selector_name", { path: "/" }), Cookies.set("pattern_style_selector_name", s, { path: "/" }),
						pattern_style_selector(t, s) }), "Boxed" === Cookies.get("boxed_style_selector") && Cookies.get(
					"pattern_style_selector_current") && Cookies.get("pattern_style_selector_name") && pattern_style_selector(Cookies
					.get("pattern_style_selector_current"), Cookies.get("pattern_style_selector_name")), jQuery(
					"#style-selector-container")
				.bind("mousewheel DOMMouseScroll", function(e) { var t = null; "mousewheel" === e.type ? t = -1 * e.originalEvent.wheelDelta :
						"DOMMouseScroll" === e.type && (t = 40 * e.originalEvent.detail), t && (e.preventDefault(), jQuery(this)
							.scrollTop(t + jQuery(this)
								.scrollTop())) }), jQuery(".clear_style_selector")
				.click(function(e) { e.preventDefault(), Cookies.remove("boxed_style_selector", { path: "/" }), Cookies.remove(
							"pattern_style_selector_current", { path: "/" }), Cookies.remove("pattern_style_selector_name", { path: "/" }),
						Cookies.remove("style_selector_status", { path: "/" }), document.location.reload(!0) }), jQuery(
					"#style-selector .demo-sites a")
				.click(function() { Cookies.remove("boxed_style_selector", { path: "/" }), Cookies.remove(
							"pattern_style_selector_current", { path: "/" }), Cookies.remove("pattern_style_selector_name", { path: "/" }),
						Cookies.remove("style_selector_status", { path: "/" }) }) });

</script>
