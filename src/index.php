<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Webフォームの基礎</title>
  <link rel="stylesheet" href="style.css" media="all">
</head>
<body>
  <h1>Webフォームの入力テスト</h1>
  <form action="receive.php" method="post">
    <label for="name">名前</label>
    <input type="text" name="name" id="name" placeholder="山田　花子"><br>
    <label for="age">年齢</label>
    <input type="number" name="age" id="age" placeholder="20"><br>
    <input type="submit" value="データを送信">
  </form>
</body>
</html>
