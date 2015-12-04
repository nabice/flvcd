<?php
if($_POST["url"]){
    $fd = fopen("/tmp/http_video.url", "w");
    if(strpos($_POST["url"], 'http') !== 0){
        $url = 'http://'.$_POST["url"];
    }else{
        $url = $_POST["url"];
    }
    fwrite($fd, $url);
    fclose($fd);
    exec("super kill -10 \$(/bin/ps -ef| /bin/grep dnspod| /bin/grep python|/usr/bin/awk '{print \$2}')");
}
?>
<!doctype html>
<html>
<head>
<title>FLVCD</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<form method="POST"><input style="width:500px;" type="text" name="url"/><input type="submit" value="Play"/></form>
</body>
</html>
