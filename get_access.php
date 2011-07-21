<?php
//作者：水水水 
	include_once( 'config.php' );
	
	get_access_token($_GET['site']);
		
	//$url = './index.php';
	//header('Location:'.$url);
	header('Location:index.php');
	