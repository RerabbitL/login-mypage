<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();

//mypage.phpからの導線以外は、「login_error.php」へリダイレクト
if(empty(preg_match("/^[0-9]{1,2}$/",$_POST['from_mypage']))){
    header("Location:login_error.php");
}

?>

<DOCTYPE! HTML>
<html lang="ja">
    <head>
        <meta charaset="UTF=8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css?v=2">
    </head>

    <body>
        <!--このbodyの中に、マイページとして表示する部分を記述していく
        （HTMLとsessionを記述。編集出来るように、sessionはvalueに入れる。）-->
        <header>
            <img src="4eachblog_logo.jpg">
                <div class="log_out"><a href="log_out.php">ログアウト</a></div>
        </header>

        <main>
            <form action="mypage_update.php" method="post" enctype="multipart/form-data">
                <div class="form_contents">
                    <h2>会員情報</h2>

                    <div class="hello">
                        <p>こんにちは！　<?php echo $_SESSION['name'] ?>さん<br></p>
                    </div>

                    <div class="picture">
                        <img src="<?php echo $_SESSION['picture']; ?>">
                    </div>

                    <div class="info">
                        <p>氏名：
                        <input type="text" class="formbox" size="25" name="name" value="<?php echo $_SESSION['name'] ?>" required><br></p>
                        <p>メール：
                        <input type="text" class="formbox" size="25" name="mail" value="<?php echo $_SESSION['mail'] ?>" required><br></p>
                        <p>パスワード：
                        <input type="text" class="formbox" size="25" name="password" value="<?php echo $_SESSION['password'] ?>" required><br>
                        </p>
                    </div>

                    <div class="comments">
                        <textarea rows="3" cols="60" name="comments" placeholder="<?php echo $_SESSION['comments'] ?>"></textarea>
                    </div>

                    <div class="button">
                        <input type="submit" class="hensyu_button" size="35" value="この内容に変更する">
                    </div>
                    
                </div>
            </form>
        </main>

        <footer>
            @ 2018 TnterNous.inc.All rights reserved
        </footer>
    </body>
</html>