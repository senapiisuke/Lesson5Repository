﻿<?php
// 以下をfor文を使用して表示してください。
// ヒント: forの中でforを３回使用

// ********1
// *******121
// ******12321
// *****1234321
// ****123454321
// ***123456 54321
// **1234567 654321
// *12345678 7654321
// 12345678987654321

//9回ループする
for($a = 1 ; $a <= 9 ; $a ++){
    //$bが$aより大きい間は$b -1を繰り返す
    for($b = 8 ; $b >= $a; $b --){
    //*を出力する（2以上の値は＊で出力させる。1以下はそのままの数値で出力する。）
    echo "*";
    }
     //1 12 123 1234となる処理を書く
     for($c = 1 ; $c <= $a ;$c ++){
        //cを出力する　１以下の時に出力したい
        echo $c;
        }
      //1 21 321 4321..となる処理を書く
      for($d =$c -2 ; $d >= 1 ; $d--){
        echo $d;
      }
      echo "<br />";
    }

//メモ：考え方↓
// ******** 1（* = 98765432）
// ******* 12　1（* = 8765432）
// ****** 123　21　（* = 765432）
// ***** 1234　321　（* = 65432）
// **** 12345　4321　（* = 5432）
// *** 123456 54321　（* = 432）
// ** 1234567 654321　（* = 32）
// * 12345678 7654321　（* = 2）
// 123456789　87654321