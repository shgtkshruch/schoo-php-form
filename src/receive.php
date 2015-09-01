<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>入力データの確認</title>
  <link rel="stylesheet" href="style.css" media="all">
</head>
<body>
  <h1>入力データの確認</h1>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
      $age = (int)$_POST['age'];

      $err = '';

      if ($name) {
        if (strlen($name) > 30) {
          $err = 'ユーザー名が長いです';
        }
      } else {
        $err = '名前の入力がありません';
      }

      if (preg_match('/^[0-9]+$/', $age)) {
        if ($age > 200) {
          $err = '正しい年齢を入力してください';
        }
      } else {
        $err = '年齢は半角英数字を入れてください';
      }
    }

    if ($err) {

      echo '<form action="receive.php" method="post">';
      echo 'エラー：<?php echo $err; ?><br>';
      echo '<label for="name">名前</label>';
      echo '<input type="text" name="name" id="name" placeholder="山田　花子"><br>';
      echo '<label for="age">年齢</label>';
      echo '<input type="number" name="age" id="age" placeholder="20"><br>';
      echo '<input type="submit" value="データを送信">';
      echo '</form>';

    } else {
      $bytes = openssl_random_pseudo_bytes(16);
      $token = bin2hex($bytes);

      session_start();
      $_SESSION['name'] = $name;
      $_SESSION['age'] = $age;
      $_SESSION['token'] = $token;
      ?>
      名前：<?php echo $name; ?><br>
      年齢：<?php echo $age; ?><br>
      <form action="thanks.php" method="post">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="submit" value="データを送信">
      </form>
  <?php }
  ?>
</body>
</html>
