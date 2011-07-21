<?php
include_once( 'config.php' );

$site_info = $_SESSION['sina'];
$akey = $site_info['akey'];
$skey = $site_info['skey'];
$last_key = $site_info['last_key'];
$sina = new sina( $akey ,$skey, $last_key['oauth_token'] , $last_key['oauth_token_secret']);

//var_dump($qq);exit;
$text = '12312312gfdsgdsfgds3';
//$pic_path = null;
$pic_path = 'http://ec4.images-amazon.com/images/I/51IaIKoj8BL.jpg';

$msg = $sina->send($text,$pic_path);
var_dump($msg);