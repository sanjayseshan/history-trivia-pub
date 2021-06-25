<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
$myfile = fopen('../../tournament.txt', "r") or die("Unknown tournament. This tournament has been corrupted.");
$tournament = trim(fgets($myfile));
fclose($myfile);

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["tournament"]!==$tournament){
    header("location: ../../login.php");
    exit;
}

if (!($_SESSION["role"] == "Tournament Director" || $_SESSION["role"] == "Judge" || $_SESSION["role"] == "Referee" || $_SESSION["username"] == basename(dirname(__FILE__)))) {
    header("location: ../");
    exit;
}

?>

<a href="../"><img src="http://archive.ev3lessons.com/arrow.jpg"></a>
<h1>Participant Management</h1>


<?php

// configuration
//$url = 'setup.php';
$file = 'data.txt';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    $file = str_replace("\r", "", $file);
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    //header(sprintf('Location: %s', $url));

printf('<b style="color: red">Saved</b><br><!--<a href="">Return</a>.-->');
 
echo "";
}

// read the textfile
$text = file_get_contents($file);

?>

<!-- HTML form -->

<?php
$teamno = basename(dirname(__FILE__));

echo "<a href='../../scorer/index.php?team=".$teamno."'><img src='http://archive.ev3lessons.com/folder.gif'>Load Trivia Questions</a><br />";


?>
