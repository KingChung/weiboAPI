<?php
//水水水
session_start();
@require_once dirname(__FILE__).'/OAuthLite.php';
header('Content-Type:text/html;charset=utf-8');	//����Ϊutf-8

/**
* qq: 
*	$akey = cc57ddbc54654e17baf85a418e7b3875
*	$skey = e50de19a67435b99d07c03122cf090a3
*	$host = https://open.t.qq.com/cgi-bin
*
*
* sina:
*	$akey = 343700186
*	$skey = cc55e6b8f3fb79d7496801e9abfb41d3
*	$host = http://api.t.sina.com.cn/oauth
*
*/

/**
*	初始化应用参数
*/
function init($akey,$skey,$host,$site)
{
	$site_info = array(
				'akey'=>$akey,
				'skey'=>$skey,
				'host'=>$host,
			);
	
	$_SESSION[$site] = $site_info;
}

/**
*	获取request token
*/
function get_request_token($site,$callback)
{
	$site_info = $_SESSION[$site];
	$akey = $site_info['akey'];
	$skey = $site_info['skey'];
	$host = $site_info['host'];
	
	$o = new OAuthLite( $akey , $skey );
	$o->init( $host );
	$keys = $o->getRequestToken($callback);
	$aurl = $o->getAuthorizeURL( $keys['oauth_token'] ,false,'');
	$_SESSION[$site]['keys'] = $keys;
	return $aurl;
}

/**
	获取access token
*/
function get_access_token($site)
{
	$site_info = $_SESSION[$site];
	$akey = $site_info['akey'];
	$skey = $site_info['skey'];
	$host = $site_info['host'];
	$keys = $site_info['keys'];
	
	$o = new OAuthLite( $akey , $skey , $keys['oauth_token'] , $keys['oauth_token_secret']  );
	$o->init( $host );
	$last_key = $o->getAccessToken(  $_REQUEST['oauth_verifier'] ) ;
	$_SESSION[$site]['last_key'] = $last_key;
}

