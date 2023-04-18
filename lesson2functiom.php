<?php
// 以下をそれぞれ表示してください。（すべて改行を行って出力すること)
// 現在時刻を自動的に取得するPHPの関数があるので調べて実装してみて下さい。
// 実行するとその都度現在の日本の日時に合わせて出力されるされるようになればOKです。
// 日時がおかしい場合、PHPのタイムゾーン設定を確認して下さい。
date_default_timezone_set("Asia/Tokyo");
// ・現在日時（xxxx年xx月xx日（x曜日））
echo date("Y年m月d日");
$week = [
    '日', //0
    '月', //1
    '火', //2
    '水', //3
    '木', //4
    '金', //5
    '土', //6
  ];
$date = date('w');
echo $week[$date]."曜日"."<br>";

// ・現在日時から３日後（yyyy年mm月dd日 H時i分s秒）
echo date("Y年m月d日 H時i分s秒",strtotime("+3 days"))."<br>";

// ・現在日時から１２時間前（yyyy年mm月dd日 H時i分s秒）
echo date("Y年m月d日 H時i分s秒",strtotime("-12 hours"))."<br>";

// ・2020年元旦から現在までの経過日数 (ddd日)
$date_before = new DateTime("2020-01-01");
$date_now = new DateTime("now");
$interval = $date_before->diff($date_now);
echo $interval->days."日"."<br>";