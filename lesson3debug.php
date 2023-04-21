<?php
// デバック練習問題
// コードを読みデバックしつつジャンケンゲームを完成させてください。
// 判定が勝った時のみ勝利回数を表示させてください。
// 例)
// 山田太郎はグーを出しました。
// 相手はチョキを出しました。
// 勝敗は勝ちです。
// 3回目の勝利です。
// $_SESSIONの挙動やswitch文については調べてみてください。
session_start();
//キー'result'が登録されていなければ、０を設定
if (! isset($_SESSION['result'])) {
    $_SESSION['result'] = 0;
}

class Player
{
    //$jankenに$choiceによってグーチョキパーのいずれかがかえる関数
    public function jankenConverter(int $choice): string
    {
        $janken = '';
        switch ($choice) {
            //$choice = 1の時、$jankenに”グー”が代入される
            case 1:
                $janken = 'グー';
                break;
            //$choice = 2の時、$jankenに”チョキ”が代入される
            case 2:
                $janken = 'チョキ';
                //breakされてなかったので追記
                break;
            //$choice = 3の時、$jankenに”パー”が代入される
            case 3:
                $janken = 'パー';
                break;
            //上記どれにも当てはまらなかった時にdefaultのブロックが実行される
            default:
                break;
        }
        return $janken;
    }
}

//Playerを継承する
class Me extends Player
{
    private $name;
    private $choice;

    public function __construct(string $lastName, string $firstName, int $choice)
    {
        $this->name   = $lastName.$firstName;
        $this->choice = $choice;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChoice(): string
    {
        return $this->jankenConverter($this->choice);
    }
}

//Playerクラスを継承する
class Enemy extends Player
{
    private $choice;
    public function __construct()
    {
        $this->choice = random_int(1, 3);
    }

    public function getChoice(): string
    {
        return $this->jankenConverter($this->choice);
    }
}

class Battle
{
    private $first;
    private $second;
    public function __construct(Me $me, Enemy $enemy)
    {
        $this->first  = $me->getChoice();
        $this->second = $enemy->getChoice();
    }
    //int→string
    private function judge(): string
    {
        if ($this->first === $this->second) {
            return '引き分け';
        }

        if ($this->first === 'グー' && $this->second === 'チョキ') {
            return '勝ち';
        }

        if ($this->first === 'グー' && $this->second === 'パー') {
            return '負け';
        }

        if ($this->first === 'チョキ' && $this->second === 'グー') {
            return '負け';
        }

        if ($this->first === 'チョキ' && $this->second === 'パー') {
            return '勝ち';
        }

        if ($this->first === 'パー' && $this->second === 'グー') {
            return '勝ち';
        }

        if ($this->first === 'パー' && $this->second === 'チョキ') {
            return '負け';
        }
    }

    public function countVictories()
    {
        if ($this->judge() === '勝ち') {
            $_SESSION['result'] = $_SESSION["result"] + 1;
        }
        return $_SESSION['result'];
    }


    public function getVitories()
    {
        return $_SESSION['result'];
    }

    public function showResult()
    {
        return $this->judge();
    }
}


//＄_POSTが空っぽではない時に{}の処理をする
if (! empty($_POST)) {
    $me = new Me($_POST['last_name'], $_POST['first_name'], $_POST['choice'], $_POST['choice']);
    $enemy = new Enemy();
//ここは勝敗に関わらず出力されるのが正
    echo $me->getName().'は'.$me->getChoice().'を出しました。';
    //";"が足りていなかったので追記
    echo '<br>';
    echo '相手は'.$enemy->getChoice().'を出しました。';
    echo '<br>';
    $battle = new Battle($me, $enemy);
    echo '勝敗は'.$battle->showResult().'です。';
//ここは勝ちの場合にのみ出力されるのが正
    if ($battle->showResult() === '勝ち') {
        echo '<br>';
        echo $battle->countVictories().'回目の勝利です。';
    }
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
    <form action='./lesson3debug.php' method="post">
        <label>姓</label>
        <input type="text" name="last_name" value="<?php echo '山田' ?>" />
        <label>名</label>
        <input type="text" name="first_name" value="<?php echo '太郎' ?>" />
        <select name='choice'>
            <option value=0 >--</option>
            <option value=1 >グー</option>
            <option value=2 >チョキ</option>
            <option value=3 >パー</option>
        </select>
        <input type="submit" value="送信する"/>
    </form>
    </section>
</body>
</html>
