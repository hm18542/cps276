<?php
require_once 'filesDirectories.php';

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>assignment5</title>

</head>

<body>
    <header>
        <h1>File and Directory Assignment</h1>
    </header>
    <div id="directions" class="form-text">
        Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.<br><br>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $object = new Directories;
        $object->makeDir();
    }
    ?>

    <form action="assignment5.php" method="post">
        <div class="form-group">
            <label for="foldername">Folder Name</label>
            <input type="text" class="form-control" name="foldername" id="foldername">
        </div>

        <div class="form-group">
            <label for="filecontent">File Content</label>
            <textarea style="height: 150px;" class="form-control" id="filecontent" name="filecontent"> </textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>
    </form>

</body>

</html>