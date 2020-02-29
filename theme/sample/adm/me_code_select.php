<?php
include './_common.php';

include_once G5_PATH.'/head.sub.php';
if($use == 'pc') {
	$sql_where = " where me_use = 1 ";
} else if ($use == 'mobile') {
	$sql_where = " where me_mobile_use = 1 ";
}

add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/adm/style.css">');

$sql = "select * from {$g5['menu_table']} {$sql_where} order by me_code asc ";
$result = sql_query($sql);
?>


<select id="use"><option value="">전제</option>
<option value="pc"<?php echo get_selected($use, 'pc')?>>PC만</option>
<option value="mobile"<?php echo get_selected($use, 'mobile')?>>Mobile만</option></select>

<script>
$(function() {
	$('#use').change(function(e) {
        var use = $(this).val();
    	location.href = 'me_code_select.php?use=' + use;
	});
	$('.btn-check').click(function(e) {
		var me_code = $(this).data('me_code');
		if(opener && opener['set_me_code']) {
        	opener.set_me_code(me_code);
			window.close();
		} else {
			alert("opener페이지에  set_me_code 함수를 정의하세요.\nme_code: " + me_code );
		}
		
    });
});
</script>
<table class="box-table">
	<thead>
		<tr>
			<th>코드</th>
			<th>메뉴</th>
			<th>링크</th>
			<th>PC</th>
			<th>M</th>
            <th>관리</th>
		</tr>
	</thead>
    <tbody>
<?php
while($row = sql_fetch_array($result)){
?>
		<tr>
			<td><?php echo $row['me_code']?></td>
			<td><?php if(strlen($row['me_code']) == 4) echo '&nbsp;&nbsp;'; ?><?php echo get_text($row['me_name'])?></td>
			<td class="link"><?php echo get_text($row['me_link'])?></td>
			<td class="tc td-check"><i class="fa fa-check check<?php echo get_text($row['me_use'])?>"></i></td>
			<td class="tc td-check"><i class="fa fa-check check<?php echo get_text($row['me_mobile_use'])?>"></i></td>
			<td class="tc"><button type="button" class="btn btn-check" data-me_code="<?php echo $row['me_code']?>">선택</button></td>
		</tr>
<?php
}
?>
	</tbody>
</table>
<?php
include_once G5_PATH.'/tail.sub.php';
?>
