<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
if($X_LOGIN != true) add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<!-- 로그인 후 외부로그인 시작 -->
<aside id="ol_after" class="ol">
    <footer id="ol_after_ft">
        <div class="modify"><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info">정보수정</a></div>
        <div class="logout"><a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout">로그아웃</a></div>
        <div class="call"><a href="tel:051-325-6700"><div class="icon"><i class="material-icons">call</i></div> <div class="tel">전화걸기</div></a></div>  
    </footer>
</aside>
<!-- 로그인 후 외부로그인 끝 --> 
