<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/style.css">
<title></title>
</head>
<body>

<?php
require "menu.php";

ini_set('display_errors', 0);

$con = mysqli_connect('us-cdbr-east-03.cleardb.com', 'b91426ab53392b', '92927f19');
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysqli_select_db($con, 'heroku_ebf52ea237485c7');
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysqli_query($con, 'SET NAMES utf8');
if (!$result) {
  exit('文字コードを指定できませんでした。');
}

$con = mysqli_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

$n_point=$_POST['nPoint'];

$pdo = new PDO('mysql:dbname=heroku_ebf52ea237485c7;host=us-cdbr-east-03.cleardb.com;' , 'b91426ab53392b', '');
$stmt = $pdo->prepare('INSERT INTO users(point) VALUES (' .$n_point.'*-1);');
$stmt->execute();

$stmt = $pdo->prepare('SELECT SUM(point) as sum_point FROM users;');
$stmt->execute();
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$sum_point=$rec['sum_point'];

if(isset($_POST['nPoint'])){
  print '<div class="contentR">';
  print '<div class="have-a-fun-time">Have a Fun time🎶';
  print '</div>';
  print '<div class="point-in-hand">POINT in hand';
  print '</div>';
  print '<div class="sum_pointR"><span>'.$sum_point.'P';
  print '</span></div>';
  print '</div>';
}
// print '<div class="your-point"><p>your Point</p></div>';
// print '<div class="your-point-font"><span>'.$sum_point.' P</span></div>';

?>
</br>
</body>
</html>