<html>

<center>
<?php
session_start();

// if(!isset($_SESSION["loggedin"]) || $_SESSION["role"] !== "Tournament Director"){
//     // header("location: ../login.php");
//     echo "Will be released soon...";

//     exit;
// }

$file = fopen("admin/questions.txt","r");
$i = 0;
while(! feof($file)) {
  fgets($file);
  fgets($file);
  $i = $i +1;
}
?>

        <head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


            <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>

            <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

            <!-- <meta http-equiv="refresh" content="60;"> -->
            <!-- <script type="text/javascript" src="gs_sortable.js"></script> -->
            <script type="text/javascript">
                dir = window.location.hash.substring(1);
                bufferDraw = ""

                function textFileToArray(filename) {
                    var reader = (window.XMLHttpRequest != null) ?
                        new XMLHttpRequest() :
                        new ActiveXObject("Microsoft.XMLHTTP");
                    reader.open("GET", filename, false);
                    reader.send();
                    return reader.responseText.split(/\r\n|\n|\r/); //split(/(\r\n|\n)/g) 
                }
                // col = parseInt(textFileToArray("rounds.txt")[0]) + 1;
                rounds = <?php echo $i; ?>


                col = rounds + 1;

                // tsort = ['my_table', 's'];
                // f = 1;
                // while (f < col + 1) {
                // 	tsort.push('i');
                // 	f++;
                // }


                // var TSort_Data = tsort;
                // f = f - 1;
                // var TSort_Initial = new Array('' + f + 'D');
                // tsRegister();



                teamlist = textFileToArray("admin/teams.txt");


                function fileExists(file_url) {

                    var http = new XMLHttpRequest();

                    http.open('HEAD', file_url, false);
                    http.send();

                    return http.status != 404;

                }

                function arrayMax(arr) {
                    return arr.reduce(function(p, v) {
                        return (p > v ? p : v);
                    });
                }


                function gentable(teamin) {
                    tourn = window.location.href.split('/')[3]
                    fwteam = teamin.split(',')[0];
                    team = teamin.split(',')[0]
                    bufferDraw += '<tr>';
                    c = 1;
                    bufferDraw += ' <td class="rank" id="team' + team + 'Rank"></td> <td>' + team + '</td>'
                    thisscores = []
                        // bufferDraw += "<td></td>"
                    while (c < col) {
                        if (fileExists("teams/" + fwteam + "/robotScores/" + String(c-1) + "-s.txt") == true) {
                            teamscore = textFileToArray("teams/" + fwteam + "/robotScores/" + String(c-1) + "-s.txt")[0].split(';')[0];
                        } else {
                            teamscore = 0
                        }
                        thisscores.push(parseInt(teamscore))
                        bufferDraw += ' <td id="' + fwteam + '-' + c + '">' + String(teamscore) + '</td>';
                        c++;
                    }
                    bufferDraw += ' <td id="' + fwteam + '-max">' + String(thisscores.reduce((a, b) => a + b, 0)) + '</td>'

                    bufferDraw += '</tr>'
                }
            </script>
        </head>

        <body>


            <title>Scoreboard</title>

            <center>
                <!--  <img src='images/ev3lessons.png'> -->

                <!--<img style='height:200px;width:auto' src='images/intoorbit.jpg'>-->
            </center>

            <h1>
                <script>
                    function textFileToArray(filename) {
                        var reader = (window.XMLHttpRequest != null) ?
                            new XMLHttpRequest() :
                            new ActiveXObject("Microsoft.XMLHTTP");
                        reader.open("GET", filename, false);
                        reader.send();
                        return reader.responseText.split(/\r\n|\n|\r/); //split(/(\r\n|\n)/g)
                    }
                    document.write(textFileToArray('tournament.txt')[0]);
                </script> Scoreboard</h1>
            <a href="?scroll=disable">Disable auto-scroll</a> <a href="?scroll=enable">Enable auto-scroll</a>


            <br>
            <!--** Refreshes every 60 seconds-->
            <br>
            <div id="drawMe"></div>
            <script>
                function drawScreen() {
                    document.getElementById("drawMe").innerHTML = ""
                    bufferDraw = ""
                    bufferDraw += '      <table style="width:100%;font-size:200%;border-collapse: collapse;text-align:center;" border="1" id="sort"><tr style="background-color: lime"> <td>Rank</td><td>Participant</td>'
                    n = 1;
                    while (n < col) {
                        bufferDraw += ' <td>Q' + n + '</td>';
                        n++;
                    }
                    bufferDraw += "<td>Total</td></tr>"

                    n = 0;
                    while (n < teamlist.length) {
                        gentable(teamlist[n]);
                        n++;
                    }
                    bufferDraw += "</table>"


                    document.getElementById("drawMe").innerHTML = bufferDraw
                    window.scrollTo({
                        top: 0
                    });

                    // tsInit()

                }

                function sortTable() {
                    var table, rows, switching, i, x, y, shouldSwitch;
                    table = document.getElementById("sort");
                    switching = true;
                    while (switching) {
                        switching = false;
                        rows = table.rows;
                        for (i = 1; i < (rows.length - 1); i++) {
                            shouldSwitch = false;
                            x = rows[i].getElementsByTagName("TD")[(rounds + 2)]
                            y = rows[i + 1].getElementsByTagName("TD")[(rounds + 2)] == '-' ? 0 : rows[i + 1].getElementsByTagName("TD")[(rounds + 2)];
                            xScore = x.innerHTML == '-' ? 0 : x.innerHTML
                            yScore = y.innerHTML == '-' ? 0 : y.innerHTML
                            if (Number(xScore) < Number(yScore)) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                        if (shouldSwitch) {
                            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                            switching = true;
                        }
                    }
                };

                function rankTeams() {
                    i = 1
                    rank = 1
                    while (i < document.getElementById("sort").rows.length) {
                        try {
                            if (parseInt(document.getElementById("sort").rows[i].children[document.getElementById("sort").rows[i].children.length - 1].innerHTML) > parseInt(document.getElementById("sort").rows[i + 1].children[document.getElementById("sort").rows[i+1].children.length - 1].innerHTML)) {
                                document.getElementById("sort").rows[i].children[0].innerHTML = rank
                                rank = rank + 1
                            } else {
                                document.getElementById("sort").rows[i].children[0].innerHTML = rank
                            }
                        } catch {
                            document.getElementById("sort").rows[i].children[0].innerHTML = rank
                        }
                        i = i + 1
                    }
                }

                drawScreen()
                sortTable()
                rankTeams()
            </script>

            <script>
                //language = window.location.hash.substring(1);
                /*
                 scores = textFileToArray("/"+dir+"/scores.txt");
                 scores.sort();
                 x = 1;
                 lastteam = '';
                 thisteam = '';
                 lastpoints = 0;
                 thispoints = 0;
                 count = scores.length;
                 while (x < count) {
                 RoundId = scores[x].split(', ')[0].split(' ')[0] + scores[x].split(', ')[1];
                 Points = scores[x].split(', ')[2].split(' ')[0];
                 thisteam = scores[x].split(', ')[0].split(' ')[0];
                 thispoints = parseInt(Points);
                 if (thisteam == lastteam) {
                 if (thispoints > lastpoints) {
                 document.getElementById(scores[x].split(', ')[0].split(' ')[0] + String(col-1)).innerHTML = thispoints;
                 }
                 } else {
                 document.getElementById(scores[x].split(', ')[0].split(' ')[0] + String(col-1)).innerHTML = thispoints;
                 }
                 lastteam =  scores[x].split(', ')[0].split(' ')[0];
                 lastpoints = parseInt(scores[x].split(', ')[2].split(' ')[0]);
                 x = x + 1;
                 document.getElementById(RoundId).innerHTML = Points;
                 }
                */
            </script>

        </body>

</html>
</center>


<script>
    var fps = 100;
    var speedFactor = 0.001;
    var minDelta = 0.5;
    var autoScrollSpeed = 10;
    var autoScrollTimer, restartTimer;
    var isScrolling = false;
    var prevPos = 0,
        currentPos = 0;
    var currentTime, prevTime, timeDiff;

    window.addEventListener("scroll", function(e) {
        // window.pageYOffset is the fallback value for IE
        currentPos = window.scrollY || window.pageYOffset;
    });

    window.addEventListener("wheel", handleManualScroll);
    window.addEventListener("touchmove", handleManualScroll);

    function handleManualScroll() {
        // window.pageYOffset is the fallback value for IE
        currentPos = window.scrollY || window.pageYOffset;
        clearInterval(autoScrollTimer);
        if (restartTimer) {
            clearTimeout(restartTimer);
        }
        restartTimer = setTimeout(() => {
            prevTime = null;
            setAutoScroll();
        }, 50);
    }

    function setAutoScroll(newValue) {
        if (newValue) {
            autoScrollSpeed = speedFactor * newValue;
        }
        if (autoScrollTimer) {
            clearInterval(autoScrollTimer);
        }
        autoScrollTimer = setInterval(function() {
            currentTime = Date.now();
            if (prevTime) {
                if (!isScrolling) {
                    timeDiff = currentTime - prevTime;
                    currentPos += autoScrollSpeed * timeDiff;
                    if (Math.abs(currentPos - prevPos) >= minDelta) {
                        isScrolling = true;
                        window.scrollTo(0, currentPos);
                        isScrolling = false;
                        prevPos = currentPos;
                        prevTime = currentTime;
                    }
                }
            } else {
                prevTime = currentTime;
            }
        }, 1000 / fps);
    }



    a = 0

    function getDocHeight() {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            console.log("bottom");
            //	arr = []
            //	if (a==0) {
            //	    document.getElementById('content').innerHTML=""
            //listMajors()

            a = 1
            console.log("reset")
            drawScreen()
            sortTable()
            rankTeams()

            //	location.reload();
            //	location.reload(true);
            //window.location.href = window.location.href

            //	}
        } else {
            console.log("not bottom")
            a = 0
        }
    }

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }


    if (getParameterByName("scroll") != "disable") {
        setAutoScroll(20);
        var t = setInterval(getDocHeight, 2000);
    }
</script>