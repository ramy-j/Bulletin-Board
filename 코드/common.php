<?php
	header("Content-Type: text/html; charset=UTF-8;");

	$tb_name = "tb_board";
	$gubun = "board";

	function mysql_conn() {
		$host = "127.0.0.1";
		$id = "root";
		$pw = "apmsetup";
		$db = "pentest";
	
		$db_conn = new mysqli($host, $id, $pw, $db);

		return $db_conn;
	}
?>