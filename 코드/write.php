<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Board write Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="pricing-header text-center px-3 py-3 mx-auto">
                <h1 class="display-4">Write Page</h1>
                <hr>
            </div>

            <div class="container">
                <form action="checking.php?gubun=board" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title Input">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Writer</label>
                        <input type="text" class="form-control" name="writer" placeholder="Writer Input">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password Input">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Contents</label>
                        <textarea class="form-control" name="content" rows="5" placeholder="Contents Input"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" name="userfile">
                    </div>
                    <br>
                    <div class="text-end">
                        <input type="hidden" name="mode" value="write">
                        <br>
                        <button type="submit" class="btn btn-secondary">Write</button>
                        <button type="button" class="btn btn-danger" onclick="history.back(-1);">Back</button>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>