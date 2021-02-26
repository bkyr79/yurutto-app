<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>継続アプリ「ゆるっと」</title>
<link type="text/css" rel="stylesheet" href="./css/menu.css">
<script src="./js/jquery-3.5.1.min.js"></script>
</head>
<body>
<?php
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
$result = mysqli_query($con, 'SELECT * FROM actions');
$sum = $val['sum'];
}
catch(Exception $e)
{
  print 'ただいま障害により大変ご迷惑をお掛けしています。';
  exit();
}
?>

<header>

<button type="button" id="js-buttonHamburger" class="c-button p-hamburger" aria-controls="global-nav" aria-expanded="false">
  <span class="p-hamburger__line">
    <span class="u-visuallyHidden">
      メニューを開閉する
    </span>
  </span>
</button>

<nav>
  <ul class="ul">
    <li><a href="index.php">Action</a></li>
    <li><a href="action_list.php">List</a></li>
    <li><a href="gohobi_list.php">Reward</a></li>
    <?php
    print '<form method="post" action="action_branch.php" class="form-action-list2">';
    print '<input type="hidden" name="sum" value="'.$sum.'">';
    print '<input type="submit" name="add[add]" class="reward-add" value="Reward Add">';
    print '</form>';
    ?>
    <li><a href="your_point.php">Point</a></li>
  </ul>
</nav>
</header>

<script>
  const btn = document.querySelector('#js-buttonHamburger');
  const nav = document.querySelector('nav');  
  btn.addEventListener('click', () => {
    nav.classList.toggle('open-menu')
  });

  (function () {
    $('#js-buttonHamburger').click(function () {
      $('body').toggleClass('is-drawerActive');

      if ($(this).attr('aria-expanded') == 'false') {
        $(this).attr('aria-expanded', true);
      } else {
        $(this).attr('aria-expanded', false);
      }
    });
  }) ();
</script>
</body>
</html>