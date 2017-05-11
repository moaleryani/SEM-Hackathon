<!DOCTYPE html>
<html lang="en">
<head>
  <title>Euro Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="eurovision-mock-db.json"></script>
    
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
      .thumbnail img {
          height:200px; 
          width: 400px;
          overflow: auto;
          text-align: center;
      }
      
                  .alert{
                margin-bottom: 50px;
                width: 400px;
                background-position: center;
                margin: auto;
                color: #009688;

            }
      
      .song{
          background-color: #009688;
          color: white;
      }
      
  </style>
        <script type="text/javascript"> 
        var countryName = "<?php echo $_GET["countryName"]?>";
        console.log(countryName);
        function readTextFile(file, callback) {
            var rawFile = new XMLHttpRequest();
            rawFile.overrideMimeType("application/json");
            rawFile.open("GET", file, true);
            rawFile.onreadystatechange = function() {
            if (rawFile.readyState === 4 && rawFile.status == "200") {
                callback(rawFile.responseText);
            }     
        }
            rawFile.send(null);
        }

        readTextFile("./eurovision-mock-db.json", function(text){
            var data = JSON.parse(text);
            var performerName, performerPic, performerPoints;
            console.log(data);
            for(var i = 0; i < data.length; i++) {
                var obj = data[i];
                if(obj.Country == countryName){
                    console.log(obj.Performer);
                    console.log(obj.Song);
                    console.log(obj.Points);
                    console.log(obj.PerformerImage);
                    performerName = obj.Performer;
                    
                    $('img').attr('src', obj.PerformerImage);
                    
                    document.getElementById('performername').innerHTML = obj.Performer;
                    document.getElementById('songname').innerHTML = obj.Song;
                    document.getElementById('points').innerHTML = obj.Points;
                }
            }
        });    
        </script> 
    
    
</head>
<body>

    
<nav class="navbar navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Euro Quiz</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="./index.php">Quiz Time</a></li>
      <li class="active"><a href="./browse.php">Browse</a></li>
      <li><a href="./profileview.php">Random</a></li>
    </ul>
</nav>

    <div class="well text-center" align="center">
    <!-- Page Content -->
        <div>
            <img class="profilepic img-circle" src="imagenotfound.jpg" width="400" height="400" >
            
  </div>
        <h3 class="media-heading" id="performername">NAME HERE<small>COUNTRY HERE</small></h3>
        <div class="alert text-center song" align="justify"> <span><strong>Song: </strong></span>
                        <span id="songname"></span></div>
           <div class="alert text-center" align="justify"> <span><strong>Total Points: </strong></span>
                        <span id="points">POINTS HERE</span></div>         

    </div>

        

        
</body>
</html>

