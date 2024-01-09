<?
  include_once("./common.php");
  
  $db_conn = mysql_conn();

  $search_type = $_POST["search_type"];
  $keyword = $_POST["keyword"];
  $query = "select * from {$tb_name} where gubun='{$gubun}' order by idx desc";
  $result = $db_conn->query($query);
  $num = $result->num_rows;
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bulletin Board</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <div class="pricing-header text-center px-3 py-3 mx-auto">
        <h1 class="display-4">Bulletin Board</h1>
        <hr>
      </div>
      <div class="container">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th width="5%" scope="col" class="text-center">NO.</th>
              <th width="20%" scope="col" class="text-center">Writer</th>
              <th width="55%" scope="col" class="text-center">Title</th>
              <th width="20%" scope="col" class="text-center">Date</th>
            </tr>
          </thead>
          <tbody>
            <?
            if ($num != 0) {
              for ($i = 0; $i < $num; $i++) {
                $row = $result->fetch_assoc(); // php 에서 결과 집합 에서 다음 행을 연관 배열 형태(키가 컬럼 이름으로 매핑된 배열)로 가져옴.
            ?>
                <tr>
                  <th scope="row" class="text-center"><?= $row["idx"] ?></th>
                  <td class="text-center"><?= $row["writer"] ?></td>
                  <td class="text-center"><a href="read.php?idx=<?= $row["idx"] ?>"><?= $row["title"] ?></a></td>
                  <td class="text-center"><?= $row["regdate"] ?></td>
                </tr>
              <?
              }
            } else {
              ?>
              <tr>
                <td colspan="4" class="text-center">Empty</td>
              </tr>
            <?
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-2">
      <div class="container pt-md-5">
        <br>
        <button type="button" class="btn btn-outline-dark" onclick="location.href='write.php'">Write</button>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
<?
  $db_conn->close();
?>