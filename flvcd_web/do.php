<?php
$url = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
if(strpos($_SERVER["HTTP_HOST"], "nabice") !== FALSE || $_SERVER["HTTP_HOST"] == "172.20.0.105"){
    exit;
}
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent:'.$_SERVER['HTTP_USER_AGENT']));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($ch);
$replace_str = '<form target="flvcd" action="/" method="POST"><input type="hidden" name="url" value="'.$url.'"/><input id="nabice_tv" class="button" style="width:100%;height:50px;border: 0px none;background-color:#eee;" type="submit" value="Play On TV"/></form><iframe style="width:0;height:0;display:none" name="flvcd" id="flvcd"></iframe><script>setTimeout("document.getElementById(\'nabice_tv\').style.display=\'none\';", 30000);</script>';
if(strpos($_SERVER["REQUEST_URI"], "v_show")){
	$content = preg_replace("/ id=\"(q|m)header\"/", ' style="display:none;" id="$1header"', $content);
	echo preg_replace("/(<body[^>]*>)/", '$1'.$replace_str, $content);
}elseif(strpos($_SERVER["HTTP_HOST"], "tv.sohu.com") !== FALSE && preg_match("/var vid ?=/", $content)){
	$content = preg_replace("/ id=\"hd-navMiniBar\"/", ' style="display:none;" id="$0"', $content);
	$content = preg_replace("/<header/", '<header style="display:none;"', $content);
	echo preg_replace("/(<body[^>]*>)/", '$1'.$replace_str, $content);
}else{
	echo $content;
}
?>
