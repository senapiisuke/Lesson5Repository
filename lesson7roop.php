﻿<?php
// 以下はランダムな数字を格納した配列を表示するプログラムです。
// 配列内の隣合う数字を比較して左側から小さい順に表示されるよう配列の中身を並び替えてください。
// 並び替えはfor文を使用すること
// (sort関数などを使用すれば実装は可能ですが、for文を使って一つ一つの値を比較・操作して並べ替えを実装してみてください。)

$arr = [99, 3, 12, 45, 60, 100, 31, 7, 28];

// 例）
// 4, 3, 1, 2
// ↓
// 3, 4, 1, 2
// ↓
// 3, 1, 4, 2
// ↓
// 3, 1, 2, 4
// ↓
// 1, 3, 2, 4
// ↓
// 1, 2, 3, 4　←これが画面に表示される

$arr = [99, 3, 12, 45, 60, 100, 31, 7, 28];

// ここで並び替え処理
//$countに$arrの要素の数を代入する
$count = count($arr);
//$count=$arrの要素の数になるまで０からスタートしてループする
for ($i = 0; $i < $count; $i++){
    //$count=$arrの要素の数になるまで1からスタートしてループする
    for($n = 1; $n < $count; $n++){
        //もし右隣の方が大きかったら
        if($arr[$n-1] > $arr[$n]){
            //右の数字を$tempに逃がす
            $temp = $arr[$n];
            //左側を右側に代入
            $arr[$n] = $arr[$n-1];
            //逃がしていた右側を左側に代入
            $arr[$n-1] = $temp;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>数字並び替えプログラム</title>
</head>
<body>
    <!-- ここに並び替え後を表示 -->
    <?php
    foreach($arr as $value) {
        echo $value;
        echo '<br>';
    }
    ?>
</body>
</html>
