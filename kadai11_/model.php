<?php

if(isset($_POST['submit2'])){


//2. DB接続します
function db_connect()
{
    try {
    //ID:'root', Password: xamppは 空白 ''
    $pdo = new PDO('mysql:dbname=kadai08;charset=utf8;host=localhost','root','');
    return $pdo;
    } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
    }
}

function get_all_posts($pdo)
{
    //1. POSTデータ取得
    $prompt1 = $_POST['prompt1'];
    $generate = $_POST['generate'];
    //３．データ登録SQL作成
    // 1. SQL文を用意
    $stmt = $pdo->prepare("INSERT INTO kadai_table(
                                                    id,date,prompt1,generate
                                                )VALUES(
                                                    NULL, sysdate(), :prompt1, :generate
                                                )");

    //  2. バインド変数を用意
    // Integer 数値の場合 PDO::PARAM_INT
    // String文字列の場合 PDO::PARAM_STR

    $stmt->bindValue(':prompt1', $prompt1, PDO::PARAM_STR);
    $stmt->bindValue(':generate', $generate, PDO::PARAM_STR);

    //  3. 実行
    $status = $stmt->execute();

    //４．データ登録処理後
    $view = '';
    if($status === false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);
    }else{
    //５．(登録が成功した時の処理) index.phpへリダイレクト
    // header("Location:ai.php");
    }
    }
}


function get_all_posts2($pdo)
{
    //２．データ取得SQL作成
    $stmt = $pdo->prepare("SELECT * FROM kadai_table");
    $status = $stmt->execute();

    //３．データ表示
    $view="";
    if ($status==false) {
        //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);

    }else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= "<p>";
        $view .= '<a href="detail.php?id='.$result['id'].'">';
        $view .= ' ■ '.h($result['date']).' : '.h($result['prompt1']).' | '.h($result['generate']); //$resultの中身を追記する（.=だと追記、ただの＝だと上書き）
        $view .= '<a href="delete.php?id='.$result['id'].'">';
        $view .= ' [削除] ';
        $view .= "</p>";
    }
    return $view;
    }
}