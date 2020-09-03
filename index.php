<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>视频点播系统</title>
<style>
.fil {margin-left:1em;}
.folder{font-weight:bold;}
</style>
</head>
<body>
<div style="font-size:14pt;">
    <a href="movie_play.html" target="new">直播节目</a>
</div>
<?php
$rootpath="/mnt/1s1k/mnt247/";
$file=$_GET["file"];
$file=$rootpath.$file;
function listfile($data){
    $temp=scandir($data);
    foreach($temp as $v){
        $a=$data.'/'.$v;
        if(is_dir($a)){
            if($v=='.'||$v=='..')
                continue;
            $a=str_replace("/mnt/1s1k/mnt247/","",$a);
            echo "<div class='folder'>+ <a href='index.php?file=$a'>$a</a></div>\r\n";
            //listfile($a);
        }
    }
    foreach($temp as $v)
    {
        $a=$data."/".$v;
        if(!is_dir($a)&&stripos($a,"mp4")>0)
        {
            $a=str_replace("/mnt/1s1k/mnt247/","",$a);
            echo "<div class='fil'>- <a href='movie_play.html?fn=/vod/$a' target='new'>$a</a></div>\r\n";   
        }
    }
}
echo "当前位置：".$_GET["file"]."<br /><br />\r\n";
echo "<div><a href='#' onclick='history.go(-1)'>后退</a> <a href='#' onclick='history.go(1)'>前进</a></div> \r\n";
listfile($file);
?>
</body>
</html>

