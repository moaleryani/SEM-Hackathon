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
            .navbar {
                margin-bottom: 0;
            }
            .songname {
                margin: 20;
            }

        </style>
        
        <script>
        var username; 
        function setCookie(cname,cvalue) {
            document.cookie = cname + "=" + cvalue;
        }

        function setCookie4Scores(cname, cvalue){
            document.cookie = cname + "=" + cvalue;
        }    
            
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
            
        function checkCookie() {
            var user=getCookie("username");
            var totalScore = getCookie("score");
            if (user != "") {
                document.getElementById('cookietime').innerHTML = "Sup " + user + "!";
            } else {
               user = prompt("Please enter your name:","");
               if (user != "" && user != null) {
                   setCookie("username", user, 30);
                   setCookie4Scores("score", 0);
                   username=user;
                document.getElementById('cookietime').innerHTML = "Sup " + user + "!";
               }
            }
        }
        
        </script>
        
    </head>
    <body  onload="checkCookie()">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Euro Quiz</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active" id="brand"><a href="./index.php">Quiz Time</a></li>
                    <li><a href="./browse.php">Browse</a></li>
                    <li><a href="./profileview.php">Random</a></li>
                </ul>
            </div>
        </nav>

        <div class="well text-center">
            <div class="col-lg-12">
                <h1 id="cookietime">Welcome!</h1>
                <h2 id="Changethis"class="page-header">Who got the most votes? (Choose by clicking the picture.)</h2>
            </div>    
            
        <div class="row">

            <div class="col-md-6">
                <h1 class="media-heading" id="performerfromcountry1">Perfrom from Country</h1>   
                    
                    <img id="firstEntry" src="imagenotfound.jpg" width="400" height="400" alt="./imagenotfound.jpg"  class="img-circle">

                
                
                <div> <span><strong>Song: </strong></span>
                    <span class="label label-info" id="songperformed1">Song Performed</span></div>
                </div>
            
            <div class="col-md-6">
            <h1 class="media-heading" id="performerfromcountry2">Perfrom from Country</h1> 
            
                <img id="secondEntry" src="imagenotfound.jpg" width="400" height="400" alt="./imagenotfound.jpg"  class="img-circle">
                
            <div> <span id="songname"><strong>Song: </strong></span>
                <span class="label label-info" id="songperformed2">Song Performed</span>
            </div>
                

            </div>
        </div>
            <h3 id="scoreboard">Your score will be displayed here...</h3>
            <button class="btn btn-primary btn-lg" id="next" onclick="nextFunction()">Next Question</button>
        </div>
    
        <script>

        function getCookieByName(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length == 2) return parts.pop().split(";").shift();
            concole.log("COOKIE PARTS", parts);
        }
    
        //converting json file to global variable
        var json = (function() {
            var json = null;
            $.ajax({
                'async': false,
                'global': true,
                'url': "/eurovision-mock-db.json",
                'dataType': "json",
                'success': function (data) {
                    json = data;
                }
            });
            return json;
        })();
                     
        //get json object by index    
        function getObjectByIndex(index){
            return json[index];
        }
        
        var score = 0;
        var answer;
        function setTwoPerformers(){
            var entry1 = json[Math.floor(Math.random()*json.length)];
            var entry2 = json[Math.floor(Math.random()*json.length)];
            while (entry1==entry2){
                entry2 = json[Math.floor(Math.random()*json.length)];
            }            
            performerName1 = entry1.Performer;
            performerPoints1 = entry1.Points;

            performerName2 = entry2.Performer;
            performerPoints2 = entry2.Points;
            
            document.getElementById('performerfromcountry1').innerHTML = entry1.Performer + " from " + entry1.Country;
            document.getElementById('performerfromcountry2').innerHTML = entry2.Performer + " from " + entry2.Country;
            document.getElementById('songperformed1').innerHTML = entry1.Song;
            document.getElementById('songperformed2').innerHTML = entry2.Song;
            
            var image1 = document.getElementById('firstEntry');
            image1.src = entry1.PerformerImage;
            var image2 = document.getElementById('secondEntry');
            image2.src = entry2.PerformerImage;

            if (entry1.Points > entry2.Points){
                answer = true;
            } else {
                answer = false;
            }
            document.getElementById('next').style.visibility = 'hidden';
            document.getElementById('firstEntry').addEventListener('click', function(){
                if (entry1.Points > entry2.Points){
                    score+=10;
                } else {
                    score-=10;
                }
                document.getElementById('firstEntry').style.pointerEvents = 'none';
                document.getElementById('secondEntry').style.pointerEvents = 'none';
                document.getElementById('performerfromcountry1').innerHTML = entry1.Performer + " got " + entry1.Points + " points.";
                document.getElementById('performerfromcountry2').innerHTML = entry2.Performer + " got " + entry2.Points + " points.";
                document.getElementById('scoreboard').innerHTML = "Your Current Score is: " + score;
                document.getElementById('next').style.visibility = 'visible';

            });
            
            document.getElementById('secondEntry').addEventListener('click', function(){
                if (entry2.Points > entry1.Points){
                    score+=10;
                } else {
                    score-=10;
                }
                document.getElementById('firstEntry').style.pointerEvents = 'none';
                document.getElementById('secondEntry').style.pointerEvents = 'none';
                document.getElementById('performerfromcountry1').innerHTML = entry1.Performer + " got " + entry1.Points + " points.";
                document.getElementById('performerfromcountry2').innerHTML = entry2.Performer + " got " + entry2.Points + " points.";
                document.getElementById('scoreboard').innerHTML = "Your Current Score is: " + score;
                document.getElementById('next').style.visibility = 'visible';
            });
            
            $('.firstEntry').attr('src', entry1.PerformerImage);
            $('.secondEntry').attr('src', entry2.PerformerImage);
            
            console.log("THE SCORE IS: ", score);
        }
        
        function nextFunction() {
            setTwoPerformers();
            document.getElementById('firstEntry').style.pointerEvents = 'auto';
            document.getElementById('secondEntry').style.pointerEvents = 'auto';
            document.getElementById('Changethis').innerHTML = "Who got the most votes?";

        }   
        
        setTwoPerformers();
            
    </script>

        
        
    </body>
</html>

