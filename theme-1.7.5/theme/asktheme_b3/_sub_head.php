<?php
    /**
     * 하위페이지 해더 !!
     */
    if (!defined("_GNUBOARD_")) {
        exit;
    }
    include_once G5_THEME_PATH . "/_sub_head.inc.php";

    //기본 서브이미지 지정
    $subimg = "sub-header{$rand_page}.jpg?v=1";
    /**
     * 페이지별 서브페이지 상단 이미지 배경 다르게 하기 예제
     * 이미지는 asktheme_b3/img에 업로드 
     */
    
     //회사소개 페이지 주소가 /theme/asktheme_b3/at_introduce.php 일 경우 
     if(strstr($_SERVER['PHP_SELF'], 'at_introduce')){
         //현재 실행되는 php 파일에 at_introduce 이 포함되었을 경우 
         $subimg = "sub-header1.jpg";
     }

     //사업분야 페이지 주소가 /theme/asktheme_b3/at_service.php 일 경우 
     if(strstr($_SERVER['PHP_SELF'], 'at_service')){
        $subimg = "sub-header4.jpg";
    }

    //일반페이지 상단이미지 설정 - 회원가입페이지
    if(strstr($_SERVER['PHP_SELF'], 'register')){
        //현재 실행되는 php 파일에 register 이 포함되었을 경우 
        $subimg = "sub-header1.jpg";
    }

     //내용관리별 이미지 설정, array('privacy','provision','co_id추가가능')와 같이 내용관리 id인 co_id값을 넣어주세요.
     //입력된 co_id는 모두 같은 상단 이미지 사용.
     if(isset($co_id) && in_array($co_id, array('privacy','provision'))){
        //예) 개인정보처리방침 , 이용약관용 상단 배경
        $subimg = "sub-header2.jpg";
     }

     //개별 상단이미지 사용
     //내용관리 한개를 대상으로 상단이미지 설정. 배열에 co_id 하나만 입력
     if(isset($co_id) && in_array($co_id, array('introduce1'))){
        $subimg = "sub-introduce1.jpg";
     }

     //내용관리마다 다르게 하려면 여러개 조건문 사용하면 됩니다. 
     if(isset($co_id) && in_array($co_id, array('introduce2'))){
        $subimg = "sub-introduce2.jpg";
     }

     //게시판별 상단이미지 설정
     if(isset($bo_table) && in_array($bo_table, array('free'))){
        $subimg = "sub-header2.jpg";
     }

     //게시판 여러개 공통 상단 이미지 지정
     if(isset($bo_table) && in_array($bo_table, array('free','gallery','portfolio'))){
        $subimg = "sub-header2.jpg";
     }
?>

<div id="sub-header" class="<?php echo 'sub-header-pic ' . $theme_config['ask_sub_theme_name'] ?>" style='background-image:url(<?php echo G5_THEME_URL . "/img/{$subimg}" ?>);'>
    <div class="container">
        <h2 id="page-title" class="page-title fadeInDown"><?php echo $page_title; ?></h2>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        //PC에서만 시차 스크롤 사용
        var deviceMode = checkMod();
        if (deviceMode == 'desktop') {
            $.stellar({
                horizontalScrolling: false,
                verticalOffset: 40
            });
        }

        var mod = checkMod();
        var triggerHeight = 0.35;
        if (mod == 'phone') {
            triggerHeight = 0;
        }
        var tween = TweenMax.to('#page-title', 0.5, {css: {scaleX: .8, scaleY: .8, opacity: .2}, ease: Linear.easeNone});
        var controller_subpage = new ScrollMagic.Controller();
        var pageTitleEffect = new ScrollMagic.Scene({
            triggerElement: '#contents_wrapper', duration: 300, triggerHook: triggerHeight
        }).setTween(tween).addTo(controller_subpage);

        pageTitleEffect.on("start", function () {
            $('#page-title').removeClass('fadeInDown');
        });

    });
</script>