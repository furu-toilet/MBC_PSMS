<?php
require "./php/Common.php";
$test = new Common();
$list = null;                 //テーブル名リスト


/*  テーブル一覧取得  */
  $tbal = $test->db_sql("select pg_statio_user_tables.relname
			from pg_catalog.pg_class,pg_catalog.pg_statio_user_tables
			where relkind='r'
			and pg_catalog.pg_statio_user_tables.relid=pg_catalog.pg_class.relfilenode;");  //データを取得

function h($str){
	return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}


$cnt = 0;
foreach($tbal as $value){		//配列を調整
        $list[$cnt] = $value['relname'];
        $cnt++;
}


?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>right</title>
    <link rel="stylesheet" href="./css/style_left.css">
  </head>
  <body>
  <div id="left">
    <div id="file">
      <h3>ファイル</h3>
      <div class="button">
        <input class="left-in" type="submit" name="export" value="エクスポート">
        <input class="left-in" type="submit" name="import" value="インポート">
      </div>
    </div>
    <div class="space"></div>
    <h3>メニュー</h3>
    <ul id="menu">
      
      <li>テーブル一覧
        <ul>
          <?php foreach($list as $value){ ?>
          <li><?php echo $value; ?></li>
          <?php } //foreach終了 ?>
        </ul>
      </li>
      
      
    </ul>
  </div>
  </body>
</html>
