<?php
require_once(__DIR__ . '/dbconnect.php');
ini_set( 'display_errors', 1 );

//[処理の流れ]
//最終ゴール：新しい家計簿が追加されて、TOPに戻る

//1.画面で入力[createForm.php]された値の取得
//2.PHPからMYSQLへ接続
//3.SQL文を作成して、画面で入力された値をrecordsテーブルに追加する
//4.index.phpに画面遷移する


$date = $_POST['date'];
$title = $_POST['title'];
$amount = $_POST['amount'];
$type = $_POST['type'];

//insert文の作成
$sql = "INSERT INTO records(title , type , amount , date ,created_at , updated_at) VALUES(:title, :type , :amount , :date, now(), now())";

//作成したSQLを実行できるように準備
$stmt = $pdo->prepare($sql);

//値の設定
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':type', $type, PDO::PARAM_INT);
$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
$stmt->bindParam(':date', $date, PDO::PARAM_STR);

//SQLを実行
$stmt->execute();

header('Location: ./index.php');
exit;

?>