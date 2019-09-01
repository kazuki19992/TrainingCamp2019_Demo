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
$members = array();



// 以下、コピペ改変----------------------------------------------------


// 掲示板の全投稿を取得する
$thread = $dbh -> query("SELECT COUNT(*) FROM bbs");
$listcount = $thread -> fetchColumn();
$thread -> closeCursor();

//変数宣言
$i = $listcount;
$html = "";

//掲示板が存在した場合リンクを表示
if ($listcount > 0){
       
    //SQLを使用し、投稿順に並べる
    $thread = $dbh -> query("SELECT * FROM bbs ORDER BY post_time DESC");
    $list = $thread -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($list as $row) {
        //リストの生成

        //投稿者情報の取得
        $sql_posted = "SELECT * FROM members WHERE email = '".html_escape($row['post_user'])."' LIMIT 1";
        $posted_data = $dbh->query($sql_posted);
        $posted_user = $posted_data -> fetchAll(PDO::FETCH_ASSOC);
        $userName = html_escape($posted_user[0]['name']);
        // var_dump($userName);
        if($row['img_path'] === NULL && $row['post_user'] === $member['email']){
            if($row['delete_pass'] === NULL){
                // 画像なし、本人投稿、削除パスワード設定なし
                $html .= "<div class=\"card\"> <div class=\"card-content\">";
                $html .= "<h5 class=\"metadata\">".$row['id']." : ".$userName." - ".$row['post_time']."</h5>";
                $html .= "<p class=\"replytxt\">".$row["content"]."</p><BR><BR> ";
                $html .= "<div class=\"card-action\">";
                $html .= "<form action=\"del.php\" method=\"post\">";
                $html .= "<input type=\"hidden\" name=\"id\" value=\"".$row['id']."\">";
                $html .= "<button type=\"submit\" class=\"waves-effect waves-teal btn-flat\"><span class=\"yellow-text text-darken-3\">削除</span></a>";
                $html .= "</form></div></div></div><BR>";
            }else{
                // 画像なし、本人投稿、削除パスワード設定あり
                $html .= "<div class=\"card\"> <div class=\"card-content\">";
                $html .= "<h5 class=\"metadata\">".$row['id']." : ".$userName." - ".$row['post_time']."</h5>";
                $html .= "<p class=\"replytxt\">".$row["content"]."</p><BR><BR> ";
                $html .= "<div class=\"card-action\">";
                $html .= "<form action=\"del.php\" method=\"post\">";
                $html .= "<input type=\"hidden\" name=\"id\" value=\"".$row['id']."\">";
                $html .= "<div class=\"input-field\" >
                            <input id=\"bbsdeletePass\" type=\"password\" class=\"validate\" name=\"delete_pass\" data-length=\"120\">
                            <label for=\"bbsdeletePass\">削除用パスワード</label>
                        </div>";
                $html .= "<button type=\"submit\" class=\"waves-effect waves-teal btn-flat\"><span class=\"yellow-text text-darken-3\">削除</span></a>";
                $html .= "</form></div></div></div><BR>";
            }
        }elseif($row['img_path'] === NULL && $row['post_user'] !== $member['email']){
            // 画像なし、他人投稿
            $html .= "<div class=\"card\"> <div class=\"card-content\">";
            $html .= "<h5 class=\"metadata\">".$row['id']." : ".$userName." - ".$row['post_time']."</h5>";
            $html .= "<p class=\"replytxt\">".$row["content"]."</p><BR><BR> ";
            $html .= "</div></div><BR>";
        }

        
        // $html .= "<div class=\"bbslist\"><h5 class=\"metadata\">".$i.":名無しの学生:".$row['updtime']."</h5><p class=\"replytxt\">"
        // .$row["dbname_kana"]."</p> <a href='del.php?dbname={$row["dbname"]}'><span class=\"removebbs\">削除する</span></a></div><br>";




        $i--;
    }
}
$dbh = null;


include_once('./views/apps_view.php');