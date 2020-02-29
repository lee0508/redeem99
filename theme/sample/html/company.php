<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');

$hb_me_code = '1010'; // 메뉴 코드(로그인 -> 서브페이지 -> 헤더관리 -> 찾기에서 확인가능)
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
        <h3>인사말</h3>
        <p class="subTxt1"><?php echo get_text($config['cf_1'])?><?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?></p>
        <!-- // PageTitle & Text -->
        
        <!--txtCon--> 
        <div class="txtCon">
            <div class="overCon">
               <div class="greeting_point">
                <div><img src="<?=G5_THEME_URL?>/img/ceo_message.jpg" width="100%"></div>
              </div>
            <div class="colum">
                    <h2>기회는 찾는 자의 몫이고 도전하는자의 몫이라고 합니다</h2>
                    2018년의 마지막달 12월이 사작되었습니다 
                    12월은 소리없이 내려 소복이 쌓이는 하얀 눈처럼 행복이 당신의 마음속에
                    소복소복 쌓였으면 좋겠어요
                    추은날 건가아시고 마음은 늘 따뜻한 당신이길 빌어봅니다
                    언제나 행복이 가득하시길 바랍니다
                    12월하면 마지막 끝이라는 단어가 생각납니다
                    하지만 또다르게 12월은 새로운 시작을 준비하는 달이기도 합니다
                    <br>
                    <br>
                    기회는 찾는 자의 몫이고 도전하는자의 몫이라고 합니다
                    12월에는 당신에게 좋은일이 많이 생기를 바랍니다
                    어느덧 시간이 흘러 한해의 마지막달이 되었습니다
                    1월부터 12월까지 달려오는동안 많은 일들이 있었는지 돌아보게 됩니다
                    남은 한달도 계획하신대로 잘 마무리 하시길 바랍니다
                    2018년도도 이제 저물어 가네요
                    한해를 돌아보는 시간 되시고 행복한 꿈을 향해 도약의 시간 되세요 
                     <p class="sign sign01">회장 <span class="name">홍길동</span></p>
               </div>
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
