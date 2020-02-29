<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');

$hb_me_code = '3020'; // 메뉴 코드(로그인 -> 서브페이지 -> 헤더관리 -> 찾기에서 확인가능)
$hb_key = substr($hb_me_code, 0, 2); // 서버메뉴를 가져오는 키값 (수정금지)
$hb_subtitle = "WebAgentGroup Tlog"; // 대메뉴 밑에 카피문구
$hb_bg = '03'; // 서브 상단배경 순서 (대메뉴 기준으로 01, 02, 03 ... 식으로 진행) // ex) 1번째 대메뉴에 속한 서브메뉴 파일에서 02나 03으로 수정하지말것, 무조건 01로 기입 

include_once(G5_THEME_PATH.'/html/head_bottom.php');
include_once(G5_THEME_PATH.'/html/sub_navi.php');

?>

<!--wrap-->
<div id="wrap">

    <!--content subContent--> 
    <section class="content subContent">

        
        <!-- PageTitle & Text -->
        <h3>r/d02</h3>
        <p class="subTxt1"><?php echo get_text($config['cf_1'])?><?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?></p>
        <!-- // PageTitle & Text -->
        
        <!--txtCon--> 
        <div class="txtCon">
            r/d02 컨텐츠 입력
        </div>
        <!--txtCon--> 
        
    </section>
    <!--content subContent--> 
</div>
<!--wrap-->









<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
