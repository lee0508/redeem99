<?php
$sub_menu = "100000";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$g5['title'] = 'sample 테마 설정';
include_once(G5_ADMIN_PATH.'/admin.head.php');
?>
<style>
.alert {
	border: 1px solid #FCF;
	padding: 0.5em;
	margin-top: 5px;
	border-radius: 0.5em;
}
</style>
<?php
if($install === 'ok') {
	// 변경한 파일
	function recurse_copy($src,$dst) { 
		$dir = opendir($src); 
		@mkdir($dst); 
		while(false !== ( $file = readdir($dir)) ) { 
			if (( $file != '.' ) && ( $file != '..' )) { 
				if ( is_dir($src . '/' . $file) ) { 
					recurse_copy($src . '/' . $file,$dst . '/' . $file); 
				} 
				else { 
					@copy($src . '/' . $file,$dst . '/' . $file); 
				} 
			} 
		} 
		closedir($dir); 
	}
	
	// 부가환경설정 필드 추가
	if (!isset($config['cf_data'])) {
		sql_query(" ALTER TABLE `{$g5['config_table']}` ADD `cf_data` TEXT NOT NULL DEFAULT '' AFTER `cf_10` ", false);
		echo '<div class="alert">환경설정테이블에 부가환경설정필드(cf_data) 추가</div>';
	}
	
	// cf_title, cf_theme, 
	// cf_search_skin, cf_new_skin, cf_search_skin, cf_connect_skin, cf_faq_skin, cf_member_skin, 
	// cf_mobile_new_skin, cf_mobile_search_skin, cf_mobile_connect_skin, cf_mobile_faq_skin, cf_mobile_member_skin,
	// cf_data
	$n_config = unserialize( file_get_contents('./var_n_config.txt') );
	$sql_common = '';
	if(is_array($n_config)) {
		foreach($n_config as $kk=>$vv) {
			$sql_common .= "{$kk} = '".sql_real_escape_string($vv)."',";
		}
	}
	$sql_common = trim($sql_common, ',');
	$sql = " update {$g5['config_table']} set $sql_common ";
	sql_query($sql);
	echo '<div class="alert">환경설정 정보 추가</div>';
	
	$sql = "select * from {$g5['board_table']} limit 1";
	$board = sql_fetch($sql);
	//{{{ 게시판 정보 필드 추가
	if(!isset($board['bo_me_code'])) {
		 sql_query(" ALTER TABLE {$g5['board_table']} ADD `bo_me_code` varchar(255) NOT NULL DEFAULT '' AFTER `bo_10` ", false);
	}
	if(!isset($board['bo_head_bg_class'])) {
		 sql_query(" ALTER TABLE {$g5['board_table']} ADD `bo_head_bg_class` varchar(255) NOT NULL DEFAULT '' AFTER `bo_me_code` ", false);
	}
	if(!isset($board['bo_head_sub_title'])) {
		 sql_query(" ALTER TABLE {$g5['board_table']} ADD `bo_head_sub_title` varchar(255) NOT NULL DEFAULT '' AFTER `bo_head_bg_class` ", false);	
	}
	//}}} 게시판 정보 필드 추가
	echo '<div class="alert">게시판 정보 필드 추가(bo_me_code,bo_head_bg_class,bo_head_sub_title)</div>';
	


	//{{{ 기본게시판 생성
	$bo_tablem = unserialize( file_get_contents('./var_bo_tablem.txt') );

	$file = file(G5_PATH.'/adm/sql_write.sql');
	foreach($bo_tablem as $bo_table=>$row_board) {
		@mkdir(G5_DATA_PATH.'/file/'.$bo_table, G5_DIR_PERMISSION);
		$row = sql_fetch(" select count(*) as cnt from {$g5['board_table']} where bo_table = '{$bo_table}' ");
		
		$sql_common = '';
		if(is_array($row_board)) {
			foreach($row_board as $kk=>$vv) {
				$sql_common .= "{$kk} = '".sql_real_escape_string($vv)."',";
			}
		}
		
		$sql_common = trim($sql_common, ',');
		if ($row['cnt'] == 0) {
			$sql = " insert into {$g5['board_table']} set {$sql_common} ";
			// echo $sql; echo '<br>';
			sql_query($sql);
			
			
			// 게시판 테이블 생성
			$sql = implode($file, "\n");
			$create_table = $g5['write_prefix'] . $bo_table;
			
			// sql_board.sql 파일의 테이블명을 변환
			$source = array('/__TABLE_NAME__/', '/;/');
			$target = array($create_table, '');
			$sql = preg_replace($source, $target, $sql);
			sql_query($sql, FALSE);
			
		} else {
			$sql = " update {$g5['board_table']} set {$sql_common} where bo_table = '{$bo_table}'";
			// echo $sql; echo '<br>';
			sql_query($sql);
		}
	}
	//}}} 기본게시판 생성
	echo '<div class="alert">기본게시판 생성</div>';
	
	//{{{ 게시물 입력 
	$bo_board_datam = unserialize( file_get_contents('./var_bo_board_data.txt') );
	foreach($bo_board_datam as $bo_table => $list) {
		$write_table = $g5['write_prefix'].$bo_table;
		for($i=0; $i<count($list); $i++) {
			$row = $list[$i];
			$sql_common = '';
			if(is_array($row)) {
				foreach($row as $kk=>$vv) {
					$sql_common .= "{$kk} = '".sql_real_escape_string($vv)."',";
				}
			}
			$sql_common = trim($sql_common, ',');
			$sql = " insert into {$write_table} set {$sql_common}";
			sql_query($sql);
		}
	}
	//}}} 게시물 입력
	echo '<div class="alert">게시물 입력</div>';
	

	//{{{ 게시물 파일 입력
	$bo_board_file_data = unserialize( file_get_contents('./var_bo_board_file_data.txt') );
	for($i=0; $i<count($bo_board_file_data); $i++) {
		$row = $bo_board_file_data[$i];
		$sql_common = '';
		if(is_array($row)) {
			foreach($row as $kk=>$vv) {
				$sql_common .= "{$kk} = '".sql_real_escape_string($vv)."',";
			}
		}
		$sql_common = trim($sql_common, ',');
		$sql = " insert into {$g5['board_file_table']} set {$sql_common}";
		sql_query($sql);
	}
	//}}} 게시물 파일 입력
	echo '<div class="alert">게시물 파일 입력</div>';


	recurse_copy('./file', G5_DATA_PATH.'/file');
	recurse_copy('./editor', G5_DATA_PATH.'/editor');
	sql_query($sql, false);
	echo '<div class="alert">게시판 파일복사 데이타 입력</div>';

    //{{{ 메뉴입력
	$menus = unserialize( file_get_contents('./var_menus.txt') );
	foreach($menus as $k=>$menu) {
		$sql_common = '';
		if(is_array($menu)) {
			foreach($menu as $kk=>$vv) {
				$sql_common .= "{$kk} = '".sql_real_escape_string($vv)."',";
			}
		}
		$sql_common = trim($sql_common, ',');
		$sql = " insert into {$g5['menu_table']} set $sql_common ";
	    sql_query($sql);
	}
	//}}} 메뉴 생성
	echo '<div class="alert">메뉴입력</div>';
} else {
?>
<button type="button" class="btn btn_submit" onclick="go_install()">sample 테마 설치</button>
<script>
function go_install() {
	if(confirm("설치하시겠습니까?")) {
		location.href = 'install.php?install=ok';
	}
}
</script>
<?php
}
include_once(G5_ADMIN_PATH.'/admin.tail.php');
?>