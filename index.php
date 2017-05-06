<!DOCTYPE html>
<html lang="en">
<head>
  <title>Euro Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>

  </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Euro Quiz</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="./index.php">Quiz Time</a></li>
      <li><a href="./browse.php">Browse</a></li>
      <li><a href="./profileview.php">Random</a></li>
    </ul>
  </div>
</nav>
       <?php
// Read JSON file
$json = file_get_contents('./eurovision-mock-db.json');

//Decode JSON
$json_data = json_decode($json,true);
$one_item = $json_data[rand(0, count($json_data) - 1)];
$one_item2 = $json_data[rand(0, count($json_data) - 1)];    
while ($one_item==$one_item2) {
   $one_item2 = $json_data[rand(0, count($json_data) - 1)];  
}
$one_item_string= json_encode($one_item['PerformerImage']);
$one_item2_string= json_encode($one_item2['PerformerImage']);    
?>     
<script>
function dialog(title, text, newid, script_include)
{   
    document.body.innerHTML += '<script src="' + script_include + '"><\/script>';
    document.body.innerHTML += '<div id="' + newid + '"  title="' + title + '"><p>' + text + '</p></div>';
}

</script>
    
<script>
function myFunction(performer1, performer2) {
   
    if ( parseInt(performer1) > parseInt(performer2)){
  document.getElementById("Changethis").innerHTML = 'You have answered correctly';}
        else{
              document.getElementById("Changethis").innerHTML = 'Wrong answers';
        }

}
</script>
    
    <div class="well text-center">
            <div class="col-lg-12">
                <h1 id="Changethis"class="page-header">Who got the most votes?</h1>
            </div>    <div class="row">
        <div class="col-md-6">
            <a href="./index.php"><img src=<?php echo $one_item_string; ?> width="400" height="400" alt="imagenotfound.jpg"  class="img-circle"></a>
             <h3 class="media-heading"><?php echo $one_item['Performer'];  ?><small> <?php echo $one_item['Country'];  ?></small></h3>
             <div> <span><strong>Song: </strong></span>
                        <span class="label label-info"><?php echo $one_item['Song'];  ?></span></div>
            <button onclick="myFunction('<?php echo $one_item['Points']; ?>','<?php echo $one_item2['Points'];  ?>')"><?php echo $one_item['Performer'];  ?> has more points</button>
        </div>
        <div class="col-md-6">
            <a href="./index.php"><img src=<?php echo $one_item2_string; ?> width="400" height="400" alt="imagenotfound.jpg"  class="img-circle"></a>
             <h3 class="media-heading"><?php echo $one_item2['Performer'];  ?><small> <?php echo $one_item2['Country'];  ?></small></h3>
             <div> <span><strong>Song: </strong></span>
                        <span class="label label-info"><?php echo $one_item2['Song'];  ?></span></div>
            <button onclick="myFunction('<?php echo $one_item2['Points']; ?>','<?php echo $one_item['Points'];  ?>')"><?php echo $one_item2['Performer'];  ?> has more points</button>
           

        </div>
    </div>
</div>
</body>
</html>

