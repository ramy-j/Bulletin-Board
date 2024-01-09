<?
include_once("./common.php");

$db_conn = mysql_conn();
$idx = $_REQUEST["idx"];
$query = "select * from {$tb_name} where idx={$idx}";

$result = $db_conn->query($query);
$num = $result->num_rows;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Read Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="pricing-header text-center px-3 py-3 mx-auto">
                <h1 class="display-4">Read Page</h1>
                <hr>
            </div>

            <div class="container">
                <?
                if ($num != 0) {
                    $row = $result->fetch_assoc(); // php 에서 결과 집합 에서 다음 행을 연관 배열 형태(키가 컬럼 이름으로 매핑된 배열)로 가져옴.
                ?>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row" width="20%" class="text-center">Title</th>
                                <td><?= $row["title"] ?></td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%" class="text-center">Writer</th>
                                <td><?= $row["writer"] ?></td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%" class="text-center">Date</th>
                                <td><?= $row["regdate"] ?></td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%" class="text-center">Contents</th>
                                <td><?= $row["content"] ?></td>
                            </tr>
                            <? if (!empty($row["file"])) { ?>
                                <tr>
                                    <th scope="row" width="20%" class="text-center">File</th>
                                    <td><img src="upload/<?= $row["file"] ?>" alt="<?= $row["file"] ?>" style="max-width: 100%; height: auto;"></a></td>
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>
                    <div class="text-end">
                        <button type="button" class="btn btn-outline-dark" onclick="location.href='edit.php?idx=<?=$row["idx"]?>'">Edit</button>
                        <button type="button" class="btn btn-outline-danger" onclick="location.href='delete.php?mode=delete&idx=<?=$row["idx"]?>'">Delete</button>
                        <button type="button" class="btn btn-outline-warning" onclick="location.href='index.php'">Home</button>
                    </div>
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