<?php
mb_internal_encoding("utf8");

//仮保存されたファイル名で画像ファイルを取得（サーバーへ仮アップロードされたディレクトリとファイル名）
$temp_pic_name = $_FILES['picture']['tmp_name'];

//元のファイル名で画像ファイルを取得。事前に画像を格納する「image」という名前のフォルダを作成しておく必要があり
$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

//仮保存のファイル名を、imageフォルダに、元のファイル名で移動させる
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="register_confirm.css">
    </head>

    <body>
        <!--この中に、マイページの表示部分を記述（HTMLとPOSTで記述）-->
        <header>
            <img src="4eachblog_logo.jpg">
                <div class="login"><a href="login.php">ログイン</a></div>
        </header>

        <main>
            <div class="main_contents">
                <div class="form_contents">
                    <h2>会員登録 確認</h2>
                    <p>こちらの内容で登録しても宜しいでしょうか？</p>
                    <div class="name">
                        <label>氏名：<?php echo $_POST['name'];?></label>
                    </div>

                    <div class="mail">
                        <label>メール：<?php echo $_POST['mail'];?></label>
                    </div>

                    <div class="password">
                        <label>パスワード：<?php echo $_POST['password'];?></label>
                    </div>

                    <div class="picture">
                        <label>プロフィール写真：<?php echo $original_pic_name; ?></label>
                    </div>

                    <div class="comments">
                        <label>コメント：<?php echo $_POST['comments'];?></label>
                    </div>

                    <div class="button_box">
                        <form action="register.php" method="post">
                            <input type="submit" class="back_button" value="戻って修正する">
                        </form>
                        
                        <form action="register_insert.php" method="post">
                            <input type="submit" class="submit_button" value="登録する">
                            <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
                            <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                            <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                            <input type="hidden" value="<?php echo $path_filename; ?>" name="path_filename">
                            <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            @ 2018 TnterNous.inc.All rights reserved
        </footer>
    </body>
</html>