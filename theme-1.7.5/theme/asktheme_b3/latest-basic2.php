<?php
    /**
     * 최신글 샘플 페이지 - Basic 2
     */
    include_once "./_common.php";
    $g5['title']          = "최신글 샘플 Basic 2";
    $g5['ask_title_desc'] = 'Latest Samples';
    //썸네일 함수, 갤러리 최신글 사용시 포함하세요.
    include_once G5_LIB_PATH . '/thumbnail.lib.php';

    include_once G5_THEME_PATH . '/head.php';
    define('_INDEX_SUBPAGE_', true);
    add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 1);
?>

<div class="latest-wrap container">
    <h2 class="page-title">기본 최신글</h2>
    <p>
        PC 4열, 태블릿 2열, 폰 1열 출력, no-gutters 클래스를 추가하면 좌우 공백없이 붙여서 출력됩니다.
    </p>
    <!-- 기본 최신글 -->
    <!-- 좌우 간격을 없애려면 아래 row 클래스에 no-gutters 클래스를 추가하세요. -->
    <section class="row basic-latest latest-equal-wrap">
        <div class="cols col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic2', 'notice', 5, 39); ?>
        </div>
        <div class="cols  col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic2', 'freeboard', 5, 39); ?>
        </div>
        <div class="cols col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic2', 'qa', 5, 39); ?>
        </div>
        <div class="cols col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic2', 'recruit', 5, 39); ?>
        </div>
    </section>
    <p>
        여백 없이 붙여서 출력, 4개 출력기준입니다.
    </p>
    <section class="no-gutters row basic-latest latest-equal-wrap">
        <div class="cols col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic2', 'notice', 5, 39); ?>
        </div>
        <div class="cols  col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic2', 'freeboard', 5, 39); ?>
        </div>
        <div class="cols col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic2', 'qa', 5, 39); ?>
        </div>
        <div class="cols col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic2', 'recruit', 5, 39); ?>
        </div>
    </section>
    
    <h2 class="page-title">웹진 최신글</h2>
    <p>
        PC 2열, 태블릿 2열, 폰 1열 출력, 오른쪽 사진
    </p>
    <!-- 우측사진 웹진형 -->
    <section class="row basic-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-webzine2', 'notice', 3, $latest_len); ?>
        </div>
        <div class = "col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-webzine2', 'freeboard', 3, $latest_len); ?>
        </div>
    </section>

    <h2 class="page-title">복합 최신글</h2>
    <p>
        첫번째 게시물 강조형
    </p>
    <!-- 첫게시물만 사진출력 -->
    <section class="row basic-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-firstpic', 'notice', 7, $latest_len); ?>
        </div>
        <div class = "col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-firstpic', 'freeboard', 7, $latest_len); ?>
        </div>
    </section>


</div>
<script type = "text/javascript">
    $(function () {
        var autoHeightTarget = $('.latest-equal-wrap .latest-equal-item');
        $(autoHeightTarget).matchHeight();
    });
</script>
<?php
include_once G5_THEME_PATH . '/tail.php';
