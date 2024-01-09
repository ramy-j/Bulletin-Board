<?
	header("Content-Type: text/html; charset=UTF-8");
	include ( './common.php' );
	
	$db_conn = mysql_conn();
	$mode = $_REQUEST["mode"];
    $path = "upload/";
	$ext_arr = array("gif", "png", "jpg");
	if($mode == "write") {
		$title = $_POST["title"];
		$writer = $_POST["writer"];
		$password = $_POST["password"];
		$content = $_POST["content"];
		$uploadFile = "";

		if(empty($title) || empty($writer) || empty($password) || empty($content)) {
			echo "<script>alert('입력해 주세요.');history.back(-1);</script>";
			exit();
		}
		
		if(!empty($_FILES["userfile"]["name"])) {
			$uploadFile = $_FILES["userfile"]["name"];
			$file_info = pathinfo($path.$uploadFile);
			$ext = strtolower($file_info["extension"]);
			$uploadPath = "{$path}/{$uploadFile}";

			if(!in_array($ext, $ext_arr)) {
				echo "<script>alert('허용되지 않은 확장자 입니다!');history.back(-1);</script>";
				exit();
			}

			if(!(@move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath))) { //@는 php 에서 에러 출력을 막는 역할을 함.
				echo("<script>alert('파일 업로드 실패.');history.back(-1);</script>");
				exit();
			}
		}   
		
		$content = str_replace("\r\n", "<br>", $content);
		$query = "insert into {$tb_name}(title, writer, password, content, file, regdate, gubun) values('{$title}', '{$writer}', '{$password}', '{$content}', '{$uploadFile}', now(), '{$gubun}')";
		$db_conn->query($query);
	} else if($mode == "modify") {
		$idx = $_POST["idx"];
		$title = $_POST["title"];
		$writer = $_POST["writer"];
		$password = $_POST["password"];
		$content = $_POST["content"];
		$uploadFile = $_POST["oldfile"];

		if(empty($idx) || empty($title) || empty($writer) || empty($password) || empty($content)) {
			echo "<script>alert('입력해 주세요.');history.back(-1);</script>";
			exit();
		}

		$query = "select * from {$tb_name} where idx={$idx} and password='{$password}'";
		$result = $db_conn->query($query);
		$num = $result->num_rows;

		if($num == 0) {
			echo "<script>alert('패스워드 오류.');history.back(-1);</script>";
			exit();
		}

		if(!empty($_FILES["userfile"]["name"])) {
			$uploadFile = $_FILES["userfile"]["name"];
			$file_info = pathinfo($path.$uploadFile);
			$ext = strtolower($file_info["extension"]);
			$uploadPath = "{$path}/{$uploadFile}";

			if(!in_array($ext, $ext_arr)) {
				echo "<script>alert('허용되지 않은 확장자 입니다!');history.back(-1);</script>";
				exit();
			}

			if(!(@move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadPath))) { //@는 php 에서 에러 출력을 막는 역할을 함.
				echo("<script>alert('파일 업로드 실패.');history.back(-1);</script>");
				exit();
			}
		}   
		
		$content = str_replace("\r\n", "<br>", $content);
		
		$query = "update {$tb_name} set title='{$title}', writer='{$writer}', content='{$content}', file='{$uploadFile}', regdate=now(), gubun='{$gubun}' where idx={$idx}";
		$db_conn->query($query);
	} else if($mode == "delete") {
		$idx = $_POST["idx"];
		$password = $_POST["password"];
		
		$query = "select * from {$tb_name} where idx={$idx} and password='{$password}'";
		$result = $db_conn->query($query);
		$num = $result->num_rows;

		if($num == 0) {
			echo "<script>alert('패스워드 오류.');history.back(-1);</script>";
			exit();
		}
		
		
		$query = "delete from {$tb_name} where idx={$idx}";
		$db_conn->query($query);
	}

	echo "<script>location.href='index.php';</script>";
	$db_conn->close();
?>