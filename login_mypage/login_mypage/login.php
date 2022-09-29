<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>ログイン</title>
        <link rel="stylesheet" type="text/css" href="login.css?v=2">
    </head>

    <body>
        <header>
            <img src="4eachblog_logo.jpg">
                <div class="login"><a href="login.php">ログイン</a></div>
        </header>

        <main>
            <form action="mypage.php" method="post" enctype="multipart/form-data">
                <div class="form_contents">
                    <div class="mail_check">
                        <label>メールアドレス</label><br>
                        <input type="text" class="formbox" size="40" 
                            value="<?php if(isset($_COOKIE['login_keep'])){ echo $_COOKIE['mail'];} ?>"
                            name="mail" >
                    </div>

                    <div class="password_check">
                        <label>パスワード</label><br>
                        <input type="password" class="formbox" size="40" 
                            value="<?php if(isset($_COOKIE['login_keep'])){ echo $_COOKIE['password'];} ?>"
                            name="password">
                    </div>

                    <div class="login_keep">
                        <label><input type="checkbox" class="formbox" size="40" name="login_keep" value="login_leep"
                            <?php if(isset($_COOKIE['login_keep'])){echo "checked='checked'";} ?>>ログイン状態を保持する</label>
                    </div>

                    <div class="touroku_button">
                        <input type="submit" class="button" size="35" value="ログイン">
                    </div>
                </div>
            </form>
        </main>

        <footer>
            @ 2018 TnterNous.inc.All rights reserved
        </footer>
    </body>
</html>