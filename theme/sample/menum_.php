<?php
$MENUM = array();
$MBM = array();

$where = '';
if(G5_IS_MOBILE) $where = ' where me_mobile_use=1 ';
else $where = ' where me_use=1 ';


if($member['mb_id']) {
	$where .= ' and me_state in (0,1)';
}
else {
	$where .= ' and me_state in (0,2)';
}



$sql = "select *, CHAR_LENGTH(me_code) cl from g5_menu {$where} order by me_order asc";
$res = sql_query($sql);
while($row = sql_fetch_array($res)) { 
	if($row['cl'] == 2) {
		$k1 = $row['me_code'];
		$MENUM[$k1] = $row;
		$dp1++;
		$dp2 = 0;
	}
	else if($row['cl'] == 4) {
		$k1 = substr($row['me_code'],0,2);
		$k2 = $row['me_code'];
		$MENUM[$k1]['ms'][$k2] = $row;
		$dp2++;
		$dp3 = 0;
	}
}


function top_menu_link($d_type,$d_memo,$d_name,$class='') {
	global $bo_table;
	global $wr_id;
	if($d_type == 'l') $link = $d_memo;
	else if($d_type == 'a') {
		$link = G5_URL.'/content.php?co_id='.$d_memo;
	}
	else if($d_type == 'b') {
		$link = G5_BBS_URL.'/board.php?bo_table='.$d_memo;
	}
	return '<a href="'.$link.'"'.$class.'>'.$d_name.'</a>';
}


function mobile_menu_link($d_type,$d_memo,$d_name,$class='') {
	global $bo_table;
	global $wr_id;
	if($d_type == 'l') $link = $d_memo;
	else if($d_type == 'a') {
		$link = G5_MOBILE_URL.'/content.php?co_id='.$d_memo;
	}
	else if($d_type == 'b') {
		$link = G5_BBS_URL.'/board.php?bo_table='.$d_memo;
	}
	return '<a href="'.$link.'"'.$class.'>'.$d_name.'</a>';
}
?>