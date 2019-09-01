<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Share!</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0">
        <meta name="theme-color" content="#ffb60f">
        <script type="text/javascript" src="./JS/func.js"></script>
        <!-- <link rel="stylesheet" href="CSS/style.css" media="all"> -->
        <link rel="stylesheet" href="CSS/style2.css" media="all">
        <link rel="stylesheet" href="CSS/style3.css" media="all">
        <link rel="stylesheet" href="CSS/HamburgerMenu.css" media="all">
        <link rel="stylesheet" href="CSS/SNS.css" media="all">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
        <link rel="shortcut icon" href="IMG/favicon.ico" />
        <link rel="stylesheet" href="CSS/Loading.css" media="all">

        <!-- Inport Google iCon Font -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="CSS/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width * 0.9, initial-scale=1.0"/>

        <link rel="stylesheet" href="CSS/style.css" media="all">

        <!-- オートスクロール -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script type="text/javascript" src="./JS/autoscrool_newbbs.js"></script>

        <!-- プッシュ通知 -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.9/push.min.js"></script>
        <link rel="manifest" href="./JSON/manifest.json">


    </head>
    <!-- <body style="margin:5em,5em;"> -->
    <body class="indexb">
        <div id="indexphp">
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="JS/materialize.min.js"></script>

        <!-- ローディングのアニメーション -->
        <!-- <div id="is-loading">
            <div id="loading">
                <img src="ローディング画像" alt="loadingなう" />
            </div>
        </div> -->

        <!-- 背景 -->
        <div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
        </div >

        <header>
            <?php require('./views/nav_menu.php'); ?>
            <center>

            <h1 class="title">Share!</h1>
            <div class="info">この掲示板の基幹部分は<a  href="https://qiita.com/torokko/items/8a07519782f01a68c627">このページ</a>を参考にしました。</div>
            <BR>

            </center>
        </header>
            

        <!-- 投稿ボタン -->

        <div class="addbbs">
            <!-- 投稿ボタン -->
            <a class="btn-floating btn-large waves-effect waves-light red" href="#bbsname"><i class="material-icons">edit</i></a>
        </div>


        <div class="contents">

            <!-- <hr style="margin-top:15em;"> -->
            <!-- 作成日の記述 -->
            <div align="right" class="date">
                <i>Ver.0.0.1</i><BR>
            </div>
            <BR>

            <div class="func">
                <h3><?php echo html_escape($member['name']); ?></h3>
                <p><i><?php echo html_escape($member['email']); ?></i></p>
                
            </div>

            <BR>
            <h4 class="bbslisttitle">投稿する！</h4>
            <!-- <?php echo $build; ?> -->

            <script>
            $(document).ready(function() {
                $('input#input_text, textarea#textarea2').characterCounter();
            });
            </script>

            
            <form action="build.php" method="post">
            <!-- <input type="hidden" name="post_user" value="<?php echo $member['email']; ?>"> -->
            <table style="border:none;">
                <tr style="border:none;">
                    <td style="width:70%; border:none;">
                        <div class="input-field" >
                            <input id="bbs" type="text" class="validate" name="bbs" data-length="120">
                            <label for="bbs">あなたの今の思いをシェアしよう！</label>
                        </div>
                    </td>
                    <td style="width:30%; border:none;">
                        <div class="input-field" >
                            <input id="deletePass" type="password" class="validate" name="delete_pass" data-length="120">
                            <label for="deletePass">削除用パスワード(任意)</label>
                        </div>
                    </td>
                </tr>
            </table>
            <button class="btn waves-effect waves-light light-green darken-1" type="submit" name="newbbs[]"><i class="material-icons right">send</i>Share!</button>
            </form>
            

            <h4 class="bbslisttitle">掲示板</h4>
            <?php echo $html; ?>
            <!-- <?php echo $build; ?> -->
            <h4 class="bbslisttitle">作成者・管理人情報</h4>
            u306065 櫛田一樹<br>
            <!-- Twitter：@Tech_Kazu</p> -->

            <a href="https://twitter.com/Tech_Kazu" class="btn-social-flat">
                <span class="btn-social-flat-icon btn-social-flat-icon--twitter"><i class="fab fa-twitter"></i></span>
                <span class="btn-social-flat-text">@Tech_Kazu</span>
            </a>
            </div>
        </div>

    </body>

    <!-- The core Firebase JS SDK is always required and must be listed first
    <script src="/__/firebase/6.2.4/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#reserved-urls -->

    <!-- Initialize Firebase -->
    <!-- <script src="/__/firebase/init.js"></script> -->

    <!-- ServiceWorker登録 -->
    <!-- <script type="text/javascript">
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js');

        navigator.serviceWorker.ready
            .then(function (registration) {
                return registration.pushManager.subscribe({ userVisibleOnly: true });
            })
            .then(function (subscription) {
                console.log('GCM EndPoint is:' + subscription.endpoint);
                var auth = subscription.getKey('auth') ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('auth')))) : '';
                console.log('User Auth is:' + auth);
                var publicKey = subscription.getKey('p256dh') ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('p256dh')))) : '';
                console.log('User PublicKey is:' + publicKey);
            })
            .catch(console.error.bind(console));
    } -->
    </script>
</html>