<?php
$do = ($_GET['do'])??'main';
include('./api/base.php');
if(!isset($_SESSION['user']) || $_SESSION['user'] != 'admin'){
    to('./index.php');
    exit();
}
$viewSum = 0;
foreach ($View->all() as $key => $value) {
	$viewSum = $viewSum+$value['total'];
}
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>健康促進網</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="all">
        <div id="title">
            <?=date('m')?> 月 <?=date('d')?> 號 <?=date('l')?> | 今日瀏覽: <?=$View->find(['date'=>date('Y-m-d')])['total']?>
            | 累積瀏覽: <?=$viewSum?> </div>
        <div id="title2" title="回首頁">
            <a href="./index.php">
                <img src="./icon/02B01.jpg" alt="回首頁">
            </a>
        </div>

        <div id="mm">
            <div class="hal" id="lef">
                <a class="blo" href="?do=admin">帳號管理</a>
                <a class="blo" href="?do=po">分類網誌</a>
                <a class="blo" href="?do=news">最新文章管理</a>
                <a class="blo" href="?do=know">講座管理</a>
                <a class="blo" href="?do=que">問卷管理</a>
            </div>
            <div class="hal" id="main">
                <div>

                    <span style="width:78%; display:inline-block;">
                        <marquee>請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章</marquee>
                    </span>
                    <?php
					if(isset($_SESSION['user'])){
						if($_SESSION['user'] == 'admin'){
					?>
                    <span style="width:18%; display:inline-block;">
                        歡迎，<?=$_SESSION['user']?>
                        <input type="button" value="管理" onclick="location.href='./back.php'">
                        <input type="button" value="登出" onclick="location.href='./api/logout.php'">
                    </span>
                    <?php	
						}else{
					?>
                    <span style="width:18%; display:inline-block;">
                        歡迎，<?=$_SESSION['user']?>
                        <input type="button" value="登出" onclick="location.href='./api/logout.php'">
                    </span>
                    <?php
						}
					}else{
					?>
                    <span style="width:18%; display:inline-block;">
                        <a href="?do=login">會員登入</a>
                    </span>
                    <?php
					}
					?>


                    <div class="content">

                        <?php
					if(file_exists('./back/'.$do.'.php')){
						include('./back/'.$do.'.php');
					}else{
						include('./back/main.php');
					}
					?>

                    </div>

                </div>
            </div>
        </div>

        <div id="bottom">
            本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2022健康促進網社群平台 All Right Reserved
            <br>
            服務信箱：health@test.labor.gov.tw<img src="./icon/02B02.jpg" width="45">
        </div>
    </div>

</body>

</html>