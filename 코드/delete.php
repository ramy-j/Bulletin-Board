<?
include_once("./common.php");

$db_conn = mysql_conn();

$mode = $_REQUEST["mode"];
$idx = $_REQUEST["idx"];
$page = "checking.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="pricing-header text-center px-3 py-3 mx-auto">
                <h1 class="display-4">Delete Page</h1>
                <hr>
            </div>
            <div class="container">
                <form action="<?= $page ?>" method="POST">
                    <div class="form-group ">
                        <label>Password</label>
                        <input type="password" class="form-control " name="password" placeholder="Password Input">
                    </div>
                    <br>
                    <div class="text-center">
                        <input type="hidden" name="idx" value="<?= $idx ?>">
                        <input type="hidden" name="mode" value="<?= $mode ?>">
                        <button type="submit" class="btn btn-danger">delete</button>
                        <button type="button" class="btn btn-outline-danger" onclick="history.back(-1);">Back</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>