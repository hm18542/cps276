<?php

$output = "";
$name = "";
$arr = "";

    if(isset($_POST['addNameButton'])){
        
        $name = $_POST["name"];
        $nameArr = array(explode(" ",$name));
        $output = arsort($nameArr);
    }


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Name Form</title>
  </head>
  <body>
    <main class="container">
      <h1>Add Names</h1>
      <form action="NameForm.php" method="post">
      <div class="form-group">
        <input type="submit" class="btn btn-success" name="addNameButton" id="addNameButton" value="Add Name" />
        <input type="reset" class="btn btn-success" name="clearNameButton" id="clearNameButton" value="Clear Names" />
      </div>
      <div class="form-group">
        <label for="name">Enter Name</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>
      <div class="form-group">
        <label for="listOfNames">List of Names</label>
        <textarea name="listOfNames" class="form-control" id="listOfNames" rows="10" cols="50"><?php echo $output; ?></textarea>
      </div>
      </form>
      

      

      
    </main>
  </body>
</html>