<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');

$hb_me_code = '2010'; // 메뉴 코드(로그인 -> 서브페이지 -> 헤더관리 -> 찾기에서 확인가능)
$hb_key = substr($hb_me_code, 0, 2); // 서버메뉴를 가져오는 키값 (수정금지)
$hb_subtitle = "WebAgentGroup Tlog"; // 대메뉴 밑에 카피문구
$hb_bg = '02'; // 서브 상단배경 순서 (대메뉴 기준으로 01, 02, 03 ... 식으로 진행) // ex) 1번째 대메뉴에 속한 서브메뉴 파일에서 02나 03으로 수정하지말것, 무조건 01로 기입 

include_once(G5_THEME_PATH.'/html/head_bottom.php');
include_once(G5_THEME_PATH.'/html/sub_navi.php');

?>

<!--wrap-->
<div id="wrap">

    <!--content subContent--> 
    <section class="content subContent">

        
        <!-- PageTitle & Text -->
        <h3>홈페이지 제작</h3>
        <p class="subTxt1"><?php echo get_text($config['cf_1'])?><?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?></p>
        <!-- // PageTitle & Text -->
        
        <!--txtCon--> 
        <div class="txtCon">
           <div class="hompage_service">
              <h2>우리는?</h2>
              <p>티로그는 웹컨텐츠 제작에서 유지관리 및 홍보까지 종합적인 웹서비스 제공으로 고객의 편리성을 극대화하고 다양한 분야의 경험과 노하우를 통해 브랜드의 가치를 더욱 끌어 올릴 수 있는 웹에이전시 전문기업입니다.</p>
                <ul>
                <li><img src="<?=G5_THEME_URL?>/img/bussines_icon01.png"><div style="margin-top: 10px;"><strong>WEB/MOBILE</strong></div><br>기업, 브랜드, 쇼핑몰 등 다양한<br>분야의 웹/모바일 사이트 구축<br>사이트 유지보수, 웹표준, 웹접근성<br>반응형 사이트 제작</li>
                <li><img src="<?=G5_THEME_URL?>/img/bussines_icon02.png"><div style="margin-top: 10px;"><strong>HYBRID APP</strong></div><br>안드로이드/IOS 하이브리드앱<br>개발 및 서비스 운영<br>모바일 UX Strategy &amp; UI Design</li>
                <li><img src="<?=G5_THEME_URL?>/img/bussines_icon03.png"><div style="margin-top: 10px;"><strong>CAFE/BLOG</strong></div><br>다음/네이버/티스토리등<br>카페및 블로그 개설<br>디자인, 컨설팅, 운영관리</li>
                <li><img src="<?=G5_THEME_URL?>/img/bussines_icon04.png"><div style="margin-top: 10px;"><strong>CODING</strong></div><br>JS ,PHP, ASP 등<br>고객에 필요한<br>다양한 프로그램 개발</li>
                </ul>
            
            
                <ul style="margin-top: 50px;">
                <li><img src="<?=G5_THEME_URL?>/img/bussines_icon05.png"><div style="margin-top: 10px;"><strong>PRINT</strong></div><br>옥외광고, 지하철 광고<br>버스광고, 잡지 및 신문 광고<br>전단지, 리플렛, 명함등 인쇄물 광고 </li>
                <li><img src="<?=G5_THEME_URL?>/img/bussines_icon06.png"><div style="margin-top: 10px;"><strong>PHOTO</strong></div><br>무료 사진촬영<br>기업 임직원 단체사진<br>실내 및 건물 외부 풍경</li>
                <li><img src="<?=G5_THEME_URL?>/img/bussines_icon07.png"><div style="margin-top: 10px;"><strong>ADVERTISING</strong></div><br>키워드광고, 배너광고<br>로컬광고, 쇼핑몰광고<br>바이럴마케팅</li>
                <li><img src="<?=G5_THEME_URL?>/img/bussines_icon08.png"><div style="margin-top: 10px;"><strong>MAINTENANCE</strong></div><br>광고등록관리,사이트등록<br>DB백업,팝업제작<br>컨텐츠내용 수정</li>
                </ul>
            </div>
        </div>
        <!--txtCon--> 
        
    </section>
    <!--content subContent--> 
</div>
<!--wrap-->









<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
