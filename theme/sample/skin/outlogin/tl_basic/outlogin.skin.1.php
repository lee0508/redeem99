<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
if($X_LOGIN != true) add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<aside id="ol_before" class="ol">
    <h2>회원로그인</h2>
    <!-- 로그인 전 외부로그인 시작 -->
    <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
    <fieldset>
        <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
        <input type="text" id="ol_id" name="mb_id" placeholder="회원아이디(필수)" required class="required" maxlength="20">
        <input type="password" id="ol_pw" name="mb_password" placeholder="비밀번호(필수)" required class="required" maxlength="20">
        <div style="margin-bottom:15px;">
            <input type="checkbox" id="auto_login" name="auto_login" value="1">
            <label for="auto_login" id="auto_login_label">자동로그인</label>
         </div>
        <input type="submit" id="ol_submit" value="로그인">
        <div class="call"><a href="tel:051-325-6700"><div class="icon"><i class="material-icons">call</i></div> <div class="tel">전화걸기</div></a></div>  
        <div id="ol_svc">
            <a href="<?php echo G5_BBS_URL ?>/register.php"><b>회원가입</b></a><span style="padding:0 5px 0 15px; color:#999;">l</span>
            <a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost">ID/PW찾기</a>
        </div>
    </fieldset>
    </form>
</aside>
<?php
if($X_LOGIN != true) {
?>
<script>
$("#auto_login").click(function(){
    if (this.checked) {
        this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
    }
});
function fhead_submit(f)
{
    return true;
}
</script>
<?php
}
?>
<!-- 로그인 전 외부로그인 끝 -->
