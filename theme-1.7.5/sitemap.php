<?php
/**
 *
 * ASKTHEME B3
 * Site Map
 * 테마의 일부입니다. 불법복제시 불이익을 받을 수 있습니다.
 * 그누보드 5.4 짧은주소 지원
 */

include_once "./_common.php";
header('Content-type: text/xml; charset=utf-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
//메뉴를 사이트맵으로 작성
$sql = " select * from {$g5['menu_table']} where me_use = '1' and length(me_code) = '2' order by me_order, me_id ";
$result = sql_query($sql, false);
for ($i = 0; $row = sql_fetch_array($result); $i++) {
    //1단 메뉴
    echo '<url>' . PHP_EOL;
    //URL
    echo '<loc>' . htmlspecialchars(ask_short_url_clean($row['me_link'])) . '</loc>' . PHP_EOL;
    $lastmod = get_lastmodify_date($row['me_link']);
    echo '<lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
    //수정빈도
    echo '<changefreq>weekly</changefreq>' . PHP_EOL;
    //중요도
    echo '<priority>0.9</priority>';
    echo '</url>' . PHP_EOL;
    $sql2 = " select * from {$g5['menu_table']} where me_use = '1' and length(me_code) = '4' and substring(me_code, 1, 2) = '{$row['me_code']}' order by me_order, me_id ";
    $result2 = sql_query($sql2);

    for ($k = 0; $row2 = sql_fetch_array($result2); $k++) {
        //2단 메뉴
        echo '<url>' . PHP_EOL;
        //URL
        echo '<loc>' . htmlspecialchars(ask_short_url_clean($row2['me_link'])) . '</loc>' . PHP_EOL;
        $lastmod = get_lastmodify_date($row2['me_link']);
        echo '<lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
        //수정빈도
        echo '<changefreq>weekly</changefreq>' . PHP_EOL;
        //중요도
        echo '<priority>0.5</priority>';
        echo '</url>' . PHP_EOL;
    }
}
echo '</urlset>';
