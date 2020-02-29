<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');

$hb_me_code = '1040'; // 메뉴 코드(로그인 -> 서브페이지 -> 헤더관리 -> 찾기에서 확인가능)
$hb_key = substr($hb_me_code, 0, 2); // 서버메뉴를 가져오는 키값 (수정금지)
$hb_subtitle = "WebAgentGroup Tlog"; // 대메뉴 밑에 카피문구
$hb_bg = '01'; // 서브 상단배경 순서 (대메뉴 기준으로 01, 02, 03 ... 식으로 진행) // ex) 1번째 대메뉴에 속한 서브메뉴 파일에서 02나 03으로 수정하지말것, 무조건 01로 기입 

include_once(G5_THEME_PATH.'/html/head_bottom.php');
include_once(G5_THEME_PATH.'/html/sub_navi.php');

?>

<!--wrap-->
<div id="wrap">

    <!--content subContent--> 
    <section class="content subContent">

        
        <!-- PageTitle & Text -->
        <h3>오시는 길</h3>
        <p class="subTxt1"><?php echo get_text($config['cf_1'])?><?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?></p>
        <!-- // PageTitle & Text -->
        
        <!--txtCon--> 
        <div class="txtCon">
            <!--contact_address-->
    <div class="contact_address">
        <ul>
            <li><strong>A.</strong>부산시 광안로7번길 22<li>
            <li><strong>T.</strong>051)325-6700</li>
        </ul>
    </div>
    <!--contact_address-->
    
    <!--contact_traffic-->
    <div class="contact_traffic">
        <ul class="bus">
            <h3><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;&nbsp;버스 이용시</h3>
            <li>KTX울산역 5002번(급행) - 현대자동차정문 정류장 하차</li>
            <li>KTX울산역 5001번(급행) - 십리대밭교 정류장 하차 -  106번(꽃바위순환)(우정지하도) 승차 - 현대자동차4공장앞 정류장 하차</li>
            <li>KTX울산역 5003번(급행) - 현대자동차4공장앞 정류장 하차</li>
            <li>KTX울산역 807번(순환) - 태화루 정류장 하차 - 106번(꽃바위순환)(우정지하도) 승차 - 현대자동차4공장앞 정류장 하차</li>
            <li>KTX울산역 5001번(급행) - 무거복개천 정류장 하차 - 104번(율리순환)(삼호교) 승차 - 현대자동차4공장앞 정류장 하차</li>
        </ul>
        <ul class="subway">
            <h3><i class="fa fa-subway" aria-hidden="true"></i>&nbsp;&nbsp;지하철 이용시</h3>
            <li>2호선 - 광안역 하차 - 3번 출구</li>
        </ul>
    </div>
    <!--contact_traffic-->
    
</div>
<!--txtCon-->

<div style="position:relative; max-width:1200px; height:0; margin:auto; z-index:9999">
    <div class="map_info"><span>티로그</span>
        <p>주소: 부산시 광안로7번길 22 </p>
        <div class="map_btn"><a href="http://map.naver.com/?edid=821782551&elng=b9b6af615276c3ea44664763657c7af3&elat=09541113536db4b575f26ca664b4632f&eText=%EC%83%A4%EB%9E%84%EB%9E%84%EB%9D%BC&eType=SITE_1" target="_blank">빠른길 찾기</a>
            <!--<a href="javascript:window.print();">인쇄하기</a>-->
        </div>
    </div>
</div>
<iframe name="tlog" src="http://tlog.kr/ctl/map.php?icon=&lat=35.155343&lng=129.118801&title=%ED%8B%B0%EB%A1%9C%EA%B7%B8&info=&gesture_handling=" frameborder="0" width="100%" height="600px" marginwidth="0" marginheight="0" scrolling="no"></iframe>
          
        </div>
        <!--txtCon--> 
        
    </section>
    <!--content subContent--> 
</div>
<!--wrap-->









<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
