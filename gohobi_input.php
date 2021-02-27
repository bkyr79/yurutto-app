<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>ご褒美入力</title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>

<?php
  require "menu.php";
?>

<div class="action-list"><p>Reward Add</p></div>
<br/>
<form method="post" action="gohobi_check.php">
<div class="contentA">
<div class="input-the-list"><span>Input the reward.</span></div>
<input type="text" name="gohobi" style="width:200px"><br/>
<div class="input-the-list"><span>Point?</span></div>
<input type="text" name="point" style="width:200px"><br/>
</div>
<input type="button" class="confirm-button" onclick="history.back()" value="Back">
<input type="submit" class="confirm-submit" value="OK">
</form>
</body>
</html>