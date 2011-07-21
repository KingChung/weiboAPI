<?php
include_once( 'config.php' );

if(isset($_POST['check']))
	$check = $_POST['check'];

$msg = '';

if(!empty($check)&&is_array($check))
{
	$text = $_POST['base']['content'];
	$pic = $_POST['base']['pic'];
	
	foreach($check as $k=>$v)
	{
		$site_info = $_SESSION[$k];
		$akey = $site_info['akey'];
		$skey = $site_info['skey'];
		$last_key = $site_info['last_key'];		
		$client_{$k} = new $k( $akey ,$skey, $last_key['oauth_token'] , $last_key['oauth_token_secret']);
		$msg[$k] = $client_{$k}->send($text,$pic);		
	}	
	var_dump($msg);
}
