<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ログイン</title>
    </head>
    <body>
        <h1>LogIn...</h1>
        <form action="" method="POST">
            <p>メールアドレス:<input type="text" name="email"> <?php echo html_escape($errs['email']); ?></p>
            <p>パスワード:<input type="text" name="password"> <?php echo html_escape($errs['password']); ?></p>
            <p><input type="submit" value="ログイン"></p>
            <p><a href="signup.php">新規登録</a></p>
        </form>
    </body>
</html>