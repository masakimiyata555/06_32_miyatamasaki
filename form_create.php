<?php

// 送信確認
//  var_dump($_POST);
//  exit();

// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
if (
  !isset($_POST['todo']) || $_POST['todo']=='' ||
  !isset($_POST['deadline']) || $_POST['deadline']==''
  ) {
  exit('ParamError');
  }



$todo = $_POST['todo'];
$deadline = $_POST['deadline'];


// 受け取ったデータを変数に入れる



// DB接続の設定
// DB名は`gsacf_x00_00`にする
$dbn = 'mysql:dbname=gsf_d06_db32;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  // ここでDB接続処理を実行する
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// var_dump($_POST);
// exit();
// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO  formcheck_table(id, todo, deadline, created_at, updated_at, Luggage_information, comment)
VALUES(NULL, :todo, :deadline, sysdate(), sysdate(),)';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$status = $stmt->execute(); 




// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:'.$error[2]);

  


} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header('Location:form_input.php');

}
?>