<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}



include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');


/*웹아이콘*/
add_stylesheet('<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">');
/*웹아이콘*/

add_javascript('<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>');
add_javascript('<script src="'.G5_THEME_URL.'/js/jquery.dbNaviFull.js"></script>');
add_javascript('<script src="'.G5_THEME_URL.'/js/jquery.bpopup.min.js"></script>');
add_javascript('<script src="'.G5_THEME_URL.'/js/owl.carousel.js"></script>');
add_javascript('<script src="'.G5_THEME_URL.'/js/jquery.easing.min.js"></script>');


add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/owl.carousel.css">');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/table.css">');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/navi.css">');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/layout.css">');
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/contents.css">');



$MENUM = array();
$sql = "select * from {$g5['menu_table']} where CHAR_LENGTH(me_code)=2 and me_use=1 order by me_order";
$result = sql_query($sql);
while($tmp = sql_fetch_array($result)) {
    $MENUM[$tmp['me_code']] = $tmp;
}
foreach($MENUM as $k=>$v) {
    $sql = "select * from {$g5['menu_table']} where me_code like '{$k}%' and CHAR_LENGTH(me_code)=4 and me_use=1 order by me_order";
    $result = sql_query($sql);
    while($tmp = sql_fetch_array($result)) {
        $MENUM[$k]['ms'][$tmp['me_code']] = $tmp;
    }
}
?>
<script>
$(function(){ 
    var menupos = $("#category-wrap").offset().top; 
    $(window).scroll(function(){ 
        var wst = $(window).scrollTop();
	    if(wst >= menupos) { 
            $("#category-wrap").css("position","fixed"); 
            $("#category-wrap").css("top","0px");
        }
	    else {
            $("#category-wrap").css("position","relative");
	   		
	    }
	   
	    if(wst > 10) {
	   	    $('body').addClass('scrolled');
	    } else {
	       $('body').removeClass('scrolled');
	    }
    }); 
 }); 
</script>
<!-- 상단 시작 { -->

<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <div id="hd_wrapper">
        <ul id="tnb">
            <?php if ($is_member) {  ?>
            <?php if ($is_admin || $member['mb_level'] >= 9) {  ?>
            <li><a href="<?php echo G5_ADMIN_URL ?>"><b>관리자</b></a></li>
            <?php }  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
            <?php } else {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/login.php"><b>로그인</b></a></li>
            <?php }  ?>
        </ul>
    </div>
    <hr>
    <div id="category-wrap">
        <nav id="gnb">
            <h2>메인메뉴</h2>
            <div class="main-wrapper clearfix">
                <div class="logo"><a href="/"><img src="<?php echo G5_THEME_URL.'/img/logo.png'?>" alt="로고"></a></div>
                <ul class="main clearfix" style="float:right;">
                    <?php
                    
                    $gnu_idx1 = 0;
                    foreach ($MENUM as $k=>$row) {
                       $gnu_idx1++;
                    ?>
                    <li class="menu<?php echo $gnu_idx1?>"><a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="mask">
                <div class="sub-set-wrapper clearfix">
                    <div class="sub-set">
                        <?php
                    $gnu_idx1 = 0;
                    foreach ($MENUM as $k=>$row) {
                       $gnu_idx1++;
                    ?>
                        <ul class="set<?php echo $gnu_idx1;?>">
                            <?php
                        foreach($MENUM[$k]['ms'] as $kk=>$row2) {
                        ?>
                            <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
                            <?php
                        }
                        ?>
                        </ul>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            <?php  if ($gnu_idx1 == 0) {  ?>
            <div id="gnb_empty">메뉴 준비 중입니다.
                <?php if ($is_admin) { ?>
                <br>
                <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.
                <?php } ?>
            </div>
            <?php } ?>
        </nav>
    </div>
</div>
<script>
$(function() {
	jQuery('#gnb').dbNaviFull();
});
</script>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
<div id="m-hd">
    <a href="/" class="logo"></a>
    <button type="button" class="btn-menu">
        <div class="navicon-line nl1"></div>
        <div class="navicon-line nl2"></div>
        <div class="navicon-line nl3"></div>
    </button>
    <div class="m-block"></div>
    <div class="m-menu">
        <ul class="m-nav">
           <li>
            <?php echo outlogin('theme/tl_basic'); // 외부 로그인 ?>
           </li>
            <?php
            $gnu_idx1 = 0;
            foreach ($MENUM as $k=>$row) {
               $gnu_idx1++;
            ?>
            <li class="menu-large">
                <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a>
                <span class="btn-down"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                <ul class="m-sub-nav">
                    <?php
                foreach($MENUM[$k]['ms'] as $kk=>$row2) {
                ?>
                    <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
                    <?php
                }
                ?>
                </ul>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
<script>
$(function() {
	$('#m-hd .btn-menu, #m-hd .m-block').click(function(e) {
		var $btn_menu = $('#m-hd .btn-menu');
		if($btn_menu.hasClass('on')) {
			$btn_menu.removeClass('on');
			$('#m-hd .m-menu').removeClass('on');
			$('#m-hd .m-block').removeClass('on');
		} else {
			$btn_menu.addClass('on');
			$('#m-hd .m-menu').addClass('on');
			$('#m-hd .m-block').addClass('on');
		}
		$btn_menu.blur();
	});
	
	$('#m-hd .btn-down').click(function(e) {
        var $this = $(this);
		var $parent = $this.parent();
		if($this.hasClass('on')) {
			$this.removeClass('on');
			$parent.find('ul').removeClass('on');
			$parent.find('ul').stop().slideUp(200);
		} else {
			$this.addClass('on');
			$parent.find('ul').addClass('on');
			$parent.find('ul').stop().slideDown(200);
		}
    });
	$(window).load(function(e) {
    	set_menu_height();
	});
	
	$(window).resize(function(e) {
    	set_menu_height();
	});
	
	function set_menu_height() {
		var wh = $(window).height() + 60;
        $('#m-hd .m-menu').css('height',wh+'px');
	}
	
	/*
	$(window).load(function() {
		$('body').fragmentScroll({offset: 100, speed:400});
	});
	*/
});
</script>
<!-- } 상단 끝 -->