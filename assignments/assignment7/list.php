<?php
    Function fileList()
    {
        require_once "Db_conn.php";
        $dbconn = new DatabaseConn();
        $db = $dbconn->dbOpen();
        $STH = $db->query('SELECT file_name, file_path FROM files');
        while($row = $STH->fetch()) 
        {
            $fpath = ($row['file_path']);
            $fname = ($row['file_name']);
            echo "<li><a target='_blank' href=$fpath>$fname</a></li>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatable" content="IE=edge">
    <meta name="viewport" content="width=device-width" , intel-scale=1.0>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Links</title>
    <style>
		* {margin: 0; padding: 15;}
		body {font: 120%/1.5 sans-serif;}
		#wrapper {width: 1000px; margin: 0 auto; border: 1px solid black;}
		main {padding: 10px;}
		main h1 {margin: 15px 10;}
		main p {margin-bottom: 15px;}
		footer {background: #eee; padding: 10px 0; text-align: center}
		footer p {font-size: .8em;}
	</style>
</head>

<body>
    <form method="post" action="#">
        <div class="form-group">
            <div class="form group col-md-10">
                <header>
                    <h1>
                        <b>List Files</b>
                        <br>
                    </h1>
                </header>
            </div>
            <div class="form group col-md-10">
                <a href="./Form.php">Add File</a>
            </div>
            </div>
                <div class="form group col-md-8">
                    <ul>
                        <?php fileList() ?>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</body>

</html>