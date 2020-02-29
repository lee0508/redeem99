<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>
<div id="outlogin-wrapper">
<?php
$skin_dir = $OUTLOGIN_SKIN_DIR;
if(preg_match('#^theme/(.+)$#', $skin_dir, $match)) {
	if (G5_IS_MOBILE) {
		$outlogin_skin_path = G5_THEME_MOBILE_PATH.'/'.G5_SKIN_DIR.'/outlogin/'.$match[1];
		if(!is_dir($outlogin_skin_path))
			$outlogin_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/outlogin/'.$match[1];
		$outlogin_skin_url = str_replace(G5_PATH, G5_URL, $outlogin_skin_path);
	} else {
		$outlogin_skin_path = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/outlogin/'.$match[1];
		$outlogin_skin_url = str_replace(G5_PATH, G5_URL, $outlogin_skin_path);
	}
	$skin_dir = $match[1];
} else {
	if (G5_IS_MOBILE) {
		$outlogin_skin_path = G5_MOBILE_PATH.'/'.G5_SKIN_DIR.'/outlogin/'.$skin_dir;
		$outlogin_skin_url = G5_MOBILE_URL.'/'.G5_SKIN_DIR.'/outlogin/'.$skin_dir;
	} else {
		$outlogin_skin_path = G5_SKIN_PATH.'/outlogin/'.$skin_dir;
		$outlogin_skin_url = G5_SKIN_URL.'/outlogin/'.$skin_dir;
	}
}
include $outlogin_skin_path.'/outlogin.lib.php';
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 1);
echo outlogin_x($OUTLOGIN_SKIN_DIR);
?>
</div>
<script>
var outlogin_skin_url = '<?=$outlogin_skin_url?>';
$('#outlogin-wrapper').on('click', "#auto_login", function(){
    if (this.checked) {
        this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
    }
});

//로그인 상태 가져옴
function login_state_x() {
	$.ajax({
		method: "GET",
		type: "GET",
		url: outlogin_skin_url+"/outlogin_x.php",
		data: {},
		dataType: "html"
	})
		.done(function(data) {
			$('#outlogin-wrapper').html(data);
			/*
			setTimeout(function() {
				$('#open-button').trigger('click');
			}, 500);
			*/
		});
}

function fhead_submit(f)
{
	var data = $(f).serialize();
	var login_url = $(f).attr('action'); 
	$.ajax({
		method: "POST",
		type: "POST",
		url: login_url,
		data: data,
		dataType: "json"
	})
		.done(function(data) {
			if(data['error']) alert(data['error']);
			else {
				login_state_x()
			}
		});
	
    return false;
}

$('#outlogin-wrapper').on('click', '#ol_after_logout', function(e) {
	e.preventDefault();
	$.ajax({
		method: "GET",
		type: "GET",
		url: outlogin_skin_url + '/logout.php',
		data: {},
		dataType: "json"
	})
		.done(function(data) {
			if(data['error']) alert(data['error']);
			else {
				login_state_x()
			}
		});
});


</script>