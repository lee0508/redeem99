<?php
include './_common.php';
$data = array('error'=>'');
if(!$is_admin) {
    $data['error'] = '관리자로 로그인 하세요.';
    echo json_encode($data); exit;
}
if($co_id == '') {
    $data['error'] = '내용관리 아이디를 지정하셔야 합니다.';
    echo json_encode($data); exit;
}
$sql = "select * from {$g5['content_table']} where co_id='{$co_id}' ";
$co = sql_fetch($sql);
if(!isset($co['co_me_code'])) {
    sql_query(" ALTER TABLE {$g5['content_table']} ADD `co_me_code` varchar(255) NOT NULL DEFAULT '' AFTER `co_include_tail` ", false);
}
if(!isset($co['co_head_bg_class'])) {
    sql_query(" ALTER TABLE {$g5['content_table']} ADD `co_head_bg_class` varchar(255) NOT NULL DEFAULT '' AFTER `co_me_code` ", false);
}
if(!isset($co['co_head_sub_title'])) {
    sql_query(" ALTER TABLE {$g5['content_table']} ADD `co_head_sub_title` varchar(255) NOT NULL DEFAULT '' AFTER `co_head_bg_class` ", false);    
}
if($co['co_id'] == '') {
    $data['error'] = '유효하지 않은 접근입니다.'; 
    echo json_encode($data); exit;
}

$sql = "update {$g5['content_table']} set ".
    "co_me_code='{$co_me_code}', ".
    "co_head_bg_class='{$co_head_bg_class}', ".
    "co_head_sub_title='{$co_head_sub_title}' ".
    "where co_id='{$co_id}' ";
$data['sql'] = $sql;
sql_query($sql);
echo json_encode($data); exit;
?>