<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="container">
        <div>
            <h1 class="title">GENERATE</h1>
            <p class="text">テキスト生成結果</p>
        </div>
        <form method="POST" action="insert.php">
            <fieldset class="container">
                <label><textArea class="promptArea" name="prompt1"></textArea></label><br>
                <label><textArea class="generateArea" name="generate"></textArea></label><br>
                <input class="btn" name="submit2"  type="submit" value="送信">
                <a href="select.php" class="btn2">履歴</a>
            </fieldset>
        </form>
    </div>
    <br><br><br>
