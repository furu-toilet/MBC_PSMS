<!DOCTYPE html>
<html>
  	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>PSMS  PostgreSQLManegmentStudio</title>
	    <link rel="stylesheet" href="./css/style_index.css">
  	</head>
<body>
	<header>
	<h1>PSMS  PostgreSQLManegmentStudio</h1>
	</header>
    	<iframe class="leftframe" src="left.php"></iframe>
    	<div class="right">
	      <form method="post" name="SQL_sendform">
	      <h2>SQL</h2>
		<textarea class="sendarea" name="sql"></textarea><br>
		<div class="right-inputarea">
			<input class="right-in" type="submit" value="実行" name="sql_submit" id="sql_submit">
			<input class="right-in" type="reset" value="リセット" name="sql_reset" id="sql_reset">
		</div>
		</form>
		<button id="ajax">ajax</button>
      <div id="log">
        <h2>実行結果</h2>
	<script type="text/javascript">

        $(function(){
            // Ajax button click
            $('#ajax').on('click',function(){
                $.ajax({
                    url:'./result.php',
                    type:'POST',
                    data:{
                        'sql':$('#sql').val(),
                    }
                })
                // Ajaxリクエストが成功した時発動
                .done( (data) => {
                    $('.result').html(data);
                    console.log(data);
                })
                // Ajaxリクエストが失敗した時発動
                .fail( (data) => {
                    $('.result').html(data);
                    console.log(data);
                })
                // Ajaxリクエストが成功・失敗どちらでも発動
                .always( (data) => {

                });
            });
        });

    </script>
		</div>
	</div>
</body>
</html>
