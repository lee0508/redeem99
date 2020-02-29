<?php
include_once('../../../../../../common.php');
function alert_x($error, $np1='', $np2='') {
	global $data;
	$data['error'] = $error;
	$data['np1'] = $np1;
	$data['np2'] = $np2;
	
	echo json_encode($data);
	exit;
}
$OUTLOGIN_SKIN_DIR = 'theme/tl_basic';
?>