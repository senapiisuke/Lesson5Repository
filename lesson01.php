﻿<?php
// 変数に値を代入し、
// その値が50より大きければ
// 「50より大きい」
// 50より小さければ
// 「50より小さい」
// 50と同値であれば
// 「50です」
// という文字列を出力してください。

// また最低限どういう値でテストすればいいか
// 確認したテスト値をコメントアウトですべて示してください。

$number = 50;

if($number > 50){
    echo '50より大きい';
}else if($number < 50){
    echo '50より小さい';
}else if($number === 50){
    echo '50です';
}

//$number = 30を代入　出力結果：50より小さい
//$number = 60を代入　出力結果：50より大きい
//$number = 50を代入　出力結果：50です