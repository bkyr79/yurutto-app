<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>ろくまる農園</title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>
<?php
  require "menu.php";

try
{

$id=$_GET['id'];

$dsn = 'mysql:dbname=heroku_ebf52ea237485c7;host=us-cdbr-east-03.cleardb.com;charset=utf8';
$user='b91426ab53392b';
$password='92927f19';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM actions WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$id;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$list=$rec['list'];
$point=$rec['point'];
$praise=$rec['praise'];

$dbh = null;

}
catch (Exception $e)
{

  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

?>
<section class="list-disp">
<h3>Detail ~Action~</h3>
<ul>
<ol><?php print $list; ?></ol>
<ol><?php print $point; ?></ol>
<ol><?php print $praise; ?></ol>
</ul>
</section>
<form>
<div class="back-from-actiondisp">
<input type="button" onclick="history.back()" value="BACK">
</div>
</form>

</body>
</html>