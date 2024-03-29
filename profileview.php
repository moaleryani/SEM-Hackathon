<!DOCTYPE html>
<html lang="en">
<head>
  <title>Euro Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
              <!-- Material Design fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        
          <!-- Bootstrap Material Design -->
        <link href="css/bootstrap-material-design.css" rel="stylesheet">
        <link href="css/ripples.min.css" rel="stylesheet">
    
    
  <style>
      
                  .navbar {
                margin-bottom: 0;
            }
            .alert{
                margin: 50px;
                width: 400px;
                align-items: center;
                margin: auto;
                color: #009688;
            }
      
            .song{
          background-color: #009688;
          color: white;
      }
      
  </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Euro Quiz</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="./index.php">Quiz Time</a></li>
      <li><a href="./browse.php">Browse</a></li>
      <li class="active"><a href="./profileview.php">Random</a></li>
    </ul>
  </div>
</nav>               
      
    <div class="well text-center">
    <div class="row">
        
        <?php
// Read JSON file
$json = file_get_contents('./eurovision-mock-db.json');

//Decode JSON
$json_data = json_decode($json,true);
$one_item = $json_data[rand(0, count($json_data) - 1)];
           
$one_item_string= json_encode($one_item['PerformerImage']);
?>     
        <div>
            <a href="#"><img src=<?php echo $one_item_string; ?> width="400" height="400" alt="imagenotfound.jpg"  class="img-circle"></a>
            
  </div>
        <h3 class="media-heading"><?php echo $one_item['Performer'];  ?><small> <?php echo $one_item['Country'];  ?></small></h3>
        <div class="alert song text-center"> <span><strong>Song: </strong></span>
                        <span ><?php echo $one_item['Song'];  ?></span></div>
           <div class="alert "> <span><strong>Total Points: </strong></span>
                        <span><?php echo $one_item['Points'];  ?></span></div>         

    </div>
</div>

</body>
</html>

