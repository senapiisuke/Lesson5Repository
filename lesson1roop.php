﻿<?php
// 配列に「日本,アメリカ,イギリス,フランス」を格納し、foreach文を使って順番に下記のフォーマットで出力して下さい。
// 要素番号:国名
$countryNames = ['日本', 'アメリカ', 'イギリス', 'フランス'];

foreach ($countryNames as $countryName){
    echo $countryName;
    echo '<br>';
};