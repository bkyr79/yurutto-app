<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>行動リスト入力</title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>

<?php
  require "menu.php";

$id = $_POST['id'];
$list = $_POST['list'];
$point = $_POST['point'];
$praise = $_POST['praise'];  

if($point=='' || $list=='' || $praise=='')
{
  print '<div class="point-out"><h3>Please input.</h3></div>';
  print '<a href="action_edit.php" class="back-from-actiondisp"><p>　BACK</p></a>';
  exit();
}
else if($point > 5)
{
  print 'You cannot add any more.';
  print '<a href="action_edit.php">　BACK</a>';
  exit();
}
else
{
  print'<form method="post" action="action_edit_done.php">';
  print '<div class="contentEC">';
  print '<div class="action-edit-list">';
  print $list;
  print '</div>';
  print '<div class="action-edit-list">';
  print $point.' P';
  print '</div>';
  print '<div class="action-edit-list">';
  print $praise;
  print '</div>';
  print '</div>';
  print'<input type="hidden" name="id" value="'.$id.'">';
  print'<input type="hidden" name="list" value="'.$list.'">';
  print'<input type="hidden" name="point" value="'.$point.'">';
  print'<input type="hidden" name="praise" value="'.$praise.'">';
  print'<br/>';
  print'<input type="button" onclick="history.back()" class="confirm-button" value="戻る">';
  print'<input type="submit" class="confirm-submit" value="OK">';
  print'</form>';
}

?>

</body>
</html>