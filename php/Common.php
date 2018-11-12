<?php
Class Common {
  private $pdo = null;
  private $stmt = null;
  private $sql = null;
  private $errmsg = null;


  function Common(){
	/*  PostgreSQLに接続  */
	try{
	$url = parse_url(getenv('DATABASE_URL'));		//リモートのPostgreSQLからDB情報取得
	$dsn = sprintf("pgsql:host=%s;dbname=%s",$url['host'],substr($url['path'],1));		//設定

	$this->pdo = new PDO($dsn,$url['user'],$url['pass']);				//PDO作成
	$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		//エラーモード設定
	}catch(Exception $e){		//例外処理
		exit('データベース接続失敗：' .$e->getMessage());
	}

  }


	/*  SQL文をDBに投げる （戻り値有 SELECT） */
  function db_sql($sql){

	try{
			
		$this->stmt = $this->pdo->prepare($sql);
		$this->stmt->execute();
		
		$all = $this->stmt->fetchALL(PDO::FETCH_ASSOC);
		
		return $all;
		
	}catch (PDOException $e){
		$this->errmsg = 'SQL実行エラー:' . $e->getMessage();
	}
	
  }
    /*  エラーメッセージ取得  */
  function db_msg(){
  	$msg = $this->errmsg;
	return $msg;
  }

    /* DBとの接続の切断  */
  function db_close(){
	$pdo = null;
  }

}

?>
