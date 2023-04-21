<?php
// デバック練習
// 氏名入力時に入力内容が表示されるようにプログラムを完成させてください。
// プログラム内にバグが含まれているので正常に動くように修正してください。

//変数を初期化する
$lastName = '';
$firstName = '';
//姓と名両方が入力された場合に{}内の処理を行う
if (!empty($_POST['last_name']) && !empty($_POST['first_name'])) {
    //$lastNameに入力値を代入する
    $lastName = $_POST['last_name'];
    //$firstNameに入力値を代入する
    $firstName = $_POST['first_name'];
    echo '私の名前は'.$lastName.$firstName.'です。';
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>デバック練習</title>
</head>
<body>
    <section>
    <form action='./lesson1debug.php' method="post">
        <label>姓</label>
        <input type="text" name="last_name"/>
        <label>名</label>
        <!-- name="first_nae"→"first_name"に修正 -->
        <input type="text" name="first_name" />
        <input type="submit" value="送信する"/>
    </form>
    </section>
</body>
</html>


