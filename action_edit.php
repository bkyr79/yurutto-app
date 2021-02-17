<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>行動リスト修正</title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>
<?php
  require "menu.php";

try
{

$list_id = $_GET['id'];

$dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM actions WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$list_id;
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
<div class="list-edit">
<h3>行動リスト修正</h3>
</div>
<form method="post" action="action_edit_check.php">
<div class="contentE">
<div class="input-the-list">  
<input type="hidden" name="id" value="<?php print $list_id; ?>">
</div>
<div class="input-the-list">
<input type="text" name="list" value="<?php print $list; ?>">
</div>
<div class="input-the-list">
<input type="text" name="point" style="width:200px" value="<?php print $point; ?>">
<div class="input-the-list">
<input type="text" name="praise" value="<?php print $praise; ?>">
</div>
</div>
<input type="button" onclick="history.back()" class="confirm-button" value="戻る">
<input type="submit" class="confirm-submit" value="OK">
</form>

</body>
</html>