<?php
    /*
    * Date: 2021-09-30
    * Author: Denis C
    * Description: 
    */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            color:  rgb(6, 82, 248);
            
        }
        #input_container{
         align-items: center;
         background: rgb(189, 189, 241);
         margin: 30px;
        }
        #output_container{
        background: rgb(218, 241, 165);
         margin: 30px;
        }

    </style>
</head>
<body>
    <h1>Super Movies</h1>
    <div id="input_container" class=input><br>
         afficher les erreurs
        <div id="error"></div><br>
        <input type="text" id="input_tv" placeholder="Search TvMaze..."/><br><br>
        <button id="tv_search_button"  onclick="search_tv()">Search</button><br><br>        
    </div>
    <div id="output_container">
        searche movies...
    </div>
</body>
    <script>
        function search_tv() {
            var input_tv = document.getElementById("input_tv").value;

            var endpoint = "https://api.tvmaze.com/search/shows?q=";
            var requested_endpoint = endpoint + "?query" + input_tv;

            var output ="";

            //console.log(requested_endpoint);
            
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  

                    var number_tv = output.lenght;
                    for (var i = 0; i < number_tv; i ++) {
                        var score = output[i]['score'];
                        var show = output[i]['show'];
                        var url = output[i]['url'];

                        var output_html  = "<div class = 'tv_afficher'>" + score + ">" + score + ">" + url +  "</div><br><br><br>";

                        var currentHTML = document.getElementById("output_container").innerHTML;
                        curentHTML += output_html;

                        document.getElementById("output_container").innerHTML = currentHTML;
                    }
                }
            };
            xhttp.open("GET", requested_endpoint , true);
            xhttp.send(); 
        }
    </script>
</html>