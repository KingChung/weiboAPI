<?php
	include_once( 'config.php' );	
	
	$site = $_GET['site'];
	switch ($site)
	{
		case 'sina':
			init('343700186','cc55e6b8f3fb79d7496801e9abfb41d3','http://api.t.sina.com.cn/oauth',$site);
			break;
		case 'qq':
			init('cc57ddbc54654e17baf85a418e7b3875','e50de19a67435b99d07c03122cf090a3','http://open.t.qq.com/cgi-bin',$site);
			break;
	}
	
	$callback = 'http://10.0.1.58/weibo2/get_access.php?site='.$site;
	$aurl = get_request_token($site,$callback);
	header('Location:'.$aurl);