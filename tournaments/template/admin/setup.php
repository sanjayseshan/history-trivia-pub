<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
$myfile = fopen('../tournament.txt', "r") or die("Unknown tournament. This tournament has been corrupted.");
$tournament = trim(fgets($myfile));
fclose($myfile);

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["tournament"]!==$tournament || $_SESSION["role"] !== "Tournament Director"){
    header("location: ../login.php");
    exit;
}
?>

<head>
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../css/accordian.css">

<link rel="stylesheet" href="../w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
<title>Setup Panel</title>
 
</head>
<body><script>
        $(function() {
            $("#topbar").load("../../../topbar.php");
        });
    </script>
    <div id="topbar"></div><br>
  <div style="max-width: 1024px;margin:0 auto;">
    <script> 
    $(function(){
      $("#header").load("header.html"); 
    });
    </script>
     <div id="header"></div><br>
  <section style="padding: 5px 5px 5px 15px;">

  <h2>Tournament Director's Setup Panel
</h2>
  </section><br><section> <div class="text-body" style="font-size: 14px;">

<i style="color: red;">* Required</i>

 <!--If you are using anything earlier please upgrade using the <script>
   function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
   }
  
document.write('<a href="/upgrade.php#'+textFileToArray('/' + window.location.href.split('/')[3] + '/tournament.txt')[0]+'">Upgrade Assistant</a><br>');
  
 </script>-->
<h2>Configuration<i style="color: red;"> *</i></h2>
<?php

// configuration
//$url = 'setup.php';
$file = 'teams.txt';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    $file = str_replace("\r", "", $file);
    file_put_contents($file, $_POST['text']);
    $textAr = explode("\n",$_POST['text']);
    foreach ($textAr as $line) {
      // processing here. 
      $teamno = explode(",",$line)[0];
      if (!file_exists("../teams/" . $teamno)) {
        exec("cp -pr ../teams/template ../teams/" . $teamno);
      }
      $teamuser = str_replace("\r", "", trim(explode(",",$line)[2]));
      // file_put_contents("../userdata/" . $teamuser, $teamno);
      $myfile = fopen('../userdata/'. $teamno, "w");
      $txt = "Participant";
      fwrite($myfile, $txt);
      fwrite($myfile, '\n'.$teamno);
      fclose($myfile);
    } 
    // redirect to form again
    //header(sprintf('Location: %s', $url));

printf('<b style="color: red">Teams have been saved</b><br><!--<a href="">Return</a>.-->');
 
echo "";
}

// read the textfile
$text = file_get_contents($file);


?>

<!-- HTML form -->
<b>Participant email list</b><br>

<form action="" method="post">
      <textarea rows="20" cols="50" id="text" name="text"><?php echo htmlspecialchars($text) ?></textarea><br>
      <input id="teams" value="Save" type="submit"/>
      <input type="reset" value="Cancel"/>
</form>

<?php

// configuration
//$url = 'setup.php';

// check if form has been submitted
if (isset($_POST['questions']))
{
  printf('<b style="color: red">Questions have been saved</b><br><!--<a href="">Return</a>.-->');
  $file = 'questions.txt';
    file_put_contents("questions.txt", $_POST['questions']);
}
$file2 = 'questions.txt';

$questions = file_get_contents($file2);
?>

<br>
<br>
<b>Question list</b><br>

<form action="" method="post">
      <textarea rows="20" cols="50" id="questions" name="questions"><?php echo htmlspecialchars($questions) ?></textarea><br>
      <input id="qsub" value="Save" type="submit"/>
      <input type="reset" value="Cancel"/>
</form>


  <br>
<!--
<br><br><br><br>
<br><b>DELETE TOURNAMENT</b><br>
<button onclick="window.location.href = '/delete.php?data=' + window.location.href.split('/')[3]">Delete This Tournament</button>
-->
</div>

</section>
<br>
    <script> 
    $(function(){
      $("#footer").load("../footer.html"); 
    });
    </script>
     <div id="footer"></div>
  </div>
<script src='js/accordian.js'></script>

</body>
