<?php
require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');

session_start();

// ログイン中か確認する
if(empty($_SESSION['member'])){
    header('Location: '.SITE_URL.'login.php');
    exit;
}

$member = $_SESSION['member'];  // クライアントの会員データを取得
$dbh = get_db_connect();

//掲示板の削除を行う
if (isset($_POST["id"])){
    $id = $_POST['id'];
    $del_pass = $_POST['delete_pass'];
    
    $sql_bbsdata = "SELECT * FROM bbs WHERE id = '".$id."'";
    $delete_data = $dbh->query($sql_bbsdata);
    $delete_bbs = $delete_data -> fetchAll(PDO::FETCH_ASSOC);

    $delete_bbs_pass = $delete_bbs[0]['delete_pass'];

    if(isset($delete_bbs_pass)){
        $del_pass = $_POST['delete_pass'];
        
        if(password_verify($del_pass, $delete_bbs_pass)){
            // パスワードを検証する

            // 正しければ削除を実行
            $dbh -> exec("DELETE FROM bbs WHERE id = '$id'");
            echo "削除しました。<BR><BR>";

        }else{
            echo '削除に失敗しました<BR>';
        }

    }else{
        $dbh -> exec("DELETE FROM bbs WHERE id = '$id'");
        echo "削除しました。<BR><BR>";
    }

    // if(isset($_POST["img"])){
    //     // 画像が存在したら消す
    //     unlink($img);
    // }
    
    
    echo "<a href='apps.php'>掲示板へ戻る</a>";
}


?>