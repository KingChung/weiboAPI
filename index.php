<?php include 'config.php'; ?>
<html>
	<head>
	</head>
	<body>
		<form method="post" action="weiboaction.php" enctype="multipart/form-data">
		<p>Welcome</p>
		Content:<textarea name="base[content]" ></textarea><br />
		Pictrue:<input type="text" name="base[pic]"><br />
		Sina:<input type="checkbox" name="check[sina]" />QQ:<input type="checkbox" name="check[qq]"  checked="true" />
		<br />
		<input type="submit" name="dosubmit" value="提交" />
		</form>
		<br />
		QQ:<input type="button" onclick="window.location='./get_request.php?site=qq'" value="申请权限" />
		<?php
			if(isset($_SESSION['qq'])&&isset($_SESSION['qq']['last_key']))
				echo 'ok!';
		?>
		Sina:<input type="button" onclick="window.location='./get_request.php?site=sina'" value="申请权限" />
		<?php
			if(isset($_SESSION['sina'])&&isset($_SESSION['sina']['last_key']))
				echo 'ok!';
		?>
	</body>
</html>