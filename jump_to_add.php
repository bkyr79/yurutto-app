<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>
<?php
  require "menu.php";

  ini_set('display_errors', 0);

  try
  {
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
  $sum=$_POST['sum'];

  $dsn = 'mysql:dbname=heroku_ebf52ea237485c7;host=us-cdbr-east-03.cleardb.com;charset=utf8';
  $user='b91426ab53392b';
  $password='92927f19';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
  $sql = 'SELECT count(*) as sum FROM actions';

  $stmt = $dbh->query($sql); 
  foreach($stmt as $val) {
  }

  $dbh = null;

  print '<form method="post" action="action_branch.php">';

  $result = mysqli_query($con, 'SELECT * FROM actions');

  while ($data = mysqli_fetch_array($result)) {
    print '<input type="hidden" name="id" value="'.$data['id'].'">';
  }
  
  $sum = $val['sum'];
  print '<input type="submit" id="from_menu" class="hidden-submit" name="add[add]">';
  print '<input type="hidden" name="add[sum]" value="'.$sum.'">';
  print '</form>';
  
  }
  catch(Exception $e)
  {
    print 'ただいま障害により大変ご迷惑をお掛けしています。';
    exit();
  }
  
?>
<script>
    document.getElementById('from_menu').click();
</script>
</br>
</body>
</html>