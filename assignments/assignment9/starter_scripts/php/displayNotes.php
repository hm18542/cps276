<?php
   
    if (isset( $_POST["GetNotes"]))
    {
        pullNote();
    }
    else 
    {
        $output = "";
    }

    function pullNote()
    {
        global $output;

        require_once "NoteFunct.php";
        $begDate = $_POST["begDate"];
        $endDate = $_POST["endDate"];
        $noteFunctions = new noteFunctions();
        $output = $noteFunctions->getNote($begDate, $endDate)  . "<br>";
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
    <title>Display Notes</title>
    <style>
		* {margin: auto; padding: 15;}
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
            <div class="form group col-md-8">
                <header>
                    <h1>
                        <b>Display Notes</b>
                    </h1>
                </header>
            </div>
            <div>
                <div class="form group col-md-8">
                    <a href="./AddNote.php">Add Note</a>
                </div>
            </div>
            <div>
                <div class="form group col-md-8">
                    <br>
                    <label for="begDate">Beginning Date</label>
                    <input type="date" class="form-control" id="begDate" name="begDate">
                </div>
            </div>
            <div>
                <div class="form group col-md-8">
                    <br>
                    <label for="endDate">Ending Date</label>
                    <input type="date" class="form-control" id="endDate" name="endDate">
                </div>
            </div>
            <div>
                <div class="form group col-md-8">
                    <br>
                    <input type="submit" class="btn btn-primary" name="GetNotes" value="Get Notes"/>
                </div>
            </div>
            <div>
                <div class="form group col-md-8">
                    <p>
                        <br>
                        <?php echo $output ?>
                    </p>
                </div>
            </div>
        </div>
    </form>
</body>

</html>