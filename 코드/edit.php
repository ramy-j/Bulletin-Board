<?
include_once("./common.php");

$db_conn = mysql_conn();
$idx = $_GET["idx"];

$query = "select * from {$tb_name} where idx={$idx}";

$result = $db_conn->query($query);
$num = $result->num_rows;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="pricing-header text-center px-3 py-3 mx-auto">
                <h1 class="display-4">Edit Page</h1>
                <hr>
            </div>
            <?
            if ($num != 0) {
                $row = $result->fetch_assoc(); // php 에서 결과 집합 에서 다음 행을 연관 배열 형태(키가 컬럼 이름으로 매핑된 배열)로 가져옴.
            ?>
                <div class="container">
                    <form action="checking.php?gubun=board" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title Input" value="<?= $row["title"] ?>">
                        </div>
                        <div class="form-group">
                            <label>Writer</label>
                            <input type="text" class="form-control" name="writer" placeholder="Writer Input" value="<?= $row["writer"] ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password Input">
                        </div>
                        <div class="form-group">
                            <label>Contents</label>
                            <textarea class="form-control" name="content" rows="5" placeholder="Contents Input"><?= $row["content"] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="hidden" class="form-control" name="oldfile" value="<?= $row["file"] ?>">
                            <input type="file" class="form-control" name="userfile">
                        </div>
                        <br>
                        <div class="text-end">
                            <input type="hidden" name="idx" value="<?= $row["idx"] ?>">
                            <input type="hidden" name="mode" value="modify">
                            <button type="submit" class="btn btn-outline-dark">Edit</button>
                            <button type="button" class="btn btn-outline-danger" onclick="history.back(-1);">Back</button>
                        </div>
                    </form>
                </div>
            <?
            } else {
            ?>
                <script>
                    alert("존재하지 않는 게시글 입니다.");
                    history.back(-1);
                </script>
            <?
            }
            ?>
        </div>
        <div class="col-2"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>