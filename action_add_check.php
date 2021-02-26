<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>継続アプリ「ゆるっと」</title>
<link type="text/css" rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php
require "menu.php";

$li_list = $_POST['list'];
$li_point = $_POST['point'];
$li_praise = $_POST['praise'];

if ($li_list == '' || $li_point == '') {
  print '<div class="cannot-added-mes-aa"><h3>Please input.</h3></div>';
  print '<a href="action_add.php" class="back-from-actiondisp"><p>BACK</p></a>';
  exit();
}
if($li_point > 5){
  print 'point input is not correct.';
  print '<a href="action_add.php">BACK</a>';
  exit();
}

$dsn = 'mysql:dbname=heroku_ebf52ea237485c7;host=us-cdbr-east-03.cleardb.com;charset=utf8';
$user = 'b91426ab53392b';
$password ='92927f19';

try {
  $db = new PDO($dsn,$user,$password);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

  $stmt = $db->prepare("
    INSERT INTO actions(list,point,praise)
    VALUES (:list, :point, :praise)"
  );

  $stmt->bindParam(':list', $li_list, PDO::PARAM_STR);
  $stmt->bindParam(':point', $li_point, PDO::PARAM_STR);
  $stmt->bindParam(':praise', $li_praise, PDO::PARAM_STR);

  $stmt->execute();

  header('Location: index2.php');
  exit();
} catch(PDOException $e){
  die ('エラー：' . $e->getMessage());
}

?>
</body>
</html>