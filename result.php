<?php
$result = null;
$msg = null;
if(isset($_POST['sql_submit'])){    //実行ボタン後の処理
	require "./php/Common.php";
	$db = new Common();
	$sql = $_POST['sql'];
	$result = $db->db_sql($sql);   //SQL実行（戻り値あり）
	
	
	$db->db_close();          //接続切断
}
if(isset($_POST['sql_reset'])){     //リセットボタン後の処理
  
  
}
function h($str){                   //HTMLに文字列出力
	return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php if(!empty($_POST['sql'])){           //SQL実行した場合?>       
          <?=h('実行SQL：' . $_POST['sql'])?>	
	  </br>
    <?php if($db->db_msg() == null){       //エラー時の表示を制御  ?>
	    <?=h('正常終了') ?></br>
            <table>
            <tr>
        <?php foreach($result[0] as $key => $_): ?>
            <th><?=h($key) ?></th>
        <?php endforeach; ?>
            </tr>
        <?php foreach($result as $values): ?>
            <tr>
                <?php foreach($values as $value): ?>
                    <td><?=h($value)?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
            </table>

    <?php }else{  //エラーメッセージ ?>	  
          <?= h($db->db_msg()) ?>	     
    <?php }   //else end  ?>
          
<?php } ?>          
</body>
</html>


