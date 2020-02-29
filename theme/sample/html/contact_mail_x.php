<?php
include './_common.php';
include_once(G5_LIB_PATH.'/mailer.lib.php');
$data = array('error'=>'');
if(trim($co_name) == '') {
	$data['error'] = "이름을 입력하세요";
	echo json_encode($data); exit;
}
if(trim($co_email) == '') {
	$data['error'] = "이메일을 입력하세요";
	echo json_encode($data); exit;
}

if(trim($co_message) == '') {
	$data['error'] = "내용을 입력하세요";
	echo json_encode($data); exit;
}

$content = "<div><strong>이름</strong>: ".get_text($co_name)."</div>";
$content .= "<div><strong>이메일</strong>: ".get_text($co_email)."</div>";
$content .= "<div><strong>내용</strong>: <div>".get_text($co_message,1)."</div></div>";

//mailer($co_name, $co_email, $config['cf_admin_email'], '[Homepage]Contacs us '.$co_name, get_text($co_message,1), 1);
$system_email = "admin@tloghost.kr";
mailer('시스템', $system_email, $config['cf_admin_email'], '[Homepage]Contacs us '.$co_name, $content, 1);
echo json_encode($data);
?>