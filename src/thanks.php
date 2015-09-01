<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ありがとうございました</title>
  <link rel="stylesheet" href="style.css" media="all">
</head>
<body>
  <?php
    session_start();
    if ($_POST['token'] != $_SESSION['token']) {
      echo '<h1>ページ遷移が正しくありません</h1>';
    } else {
      echo '<h1>ありがとうございました</h1>';
      echo '名前：' . $_SESSION['name'] .'<br>';
      echo '年齢：' . $_SESSION['age'];
      session_destroy();
    }
   ?>
</body>
</html>
