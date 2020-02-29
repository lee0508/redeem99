<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}

include_once(G5_THEME_PATH.'/html/tl_pop_mail.php');
?>
<script>
$(function() {	
	$('#mail_popup').bind('click', function(e) {
		e.preventDefault();
		// Triggering bPopup when click event is fired
		$('#mail_bpopup_form').bPopup();
		//alert('준비중비니다.');
	});
});

$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>



<section class="footer">
    <div class="nav_warp">
        <div class="content">
            <ul>
                <li><a href="<?=G5_THEME_URL?>/html/group.php">회사소개</a></li>
                <li><a href="/bbs/content.php?co_id=privacy"><span style="color:#F00">개인정보취급방침</span></a></li>
                <li><a id="mail_popup" href="#">이메일무단수집거부</a></li>
                <li><a href="/adm/" target="_blank" title="관리자 페이지"><i class="fa fa-cog" aria-hidden="true" style="padding-top:3px"></i></a></li>
            </ul>
            <address>
            <em><i class="fa fa-map-marker" aria-hidden="true" style="margin-right:5px"></i> 부산시 광안로7번길 22 (구: 수영구 광안동 145-28)</em> <span>대표이사 : 홍길동, 사업자등록번호 : 617-86-10993</span>이메일상담 : swing1984@naver.com
            </address>
            <dl>
                <dt>대표번호</dt>
                <dd><span>051)325-6700</span></dd>
            </dl>
            <p class="copyright">copyright© 2019 tlog ALL RIGHTS RESERVED. Creative by <a href="http://tlog.kr" target="_blank"><span style="color:#0CF">TLOG</span></a></p>
        </div>
        <!--content--> 
    </div>
    <!--nav_warp--> 
</section>
<button type="button" id="top_btn"><i class="material-icons">arrow_upward</i><span class="sound_only">상단으로</span></button>
<script>
	$(function() {
		$("#top_btn").on("click", function() {
			$("html, body").animate({scrollTop:0}, '500');
			return false;
		});
	});
	</script> 
<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>
<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>
