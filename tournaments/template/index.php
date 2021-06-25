<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/accordian.css">

<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
<title>Dashboard</title>
 
</head>
<body>  <script>
        $(function() {
            $("#topbar").load("../../topbar.php");
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

  <h2>  <script>
function textFileToArray(filename) {
    var reader = (window.XMLHttpRequest != null ) 
               ? new XMLHttpRequest() 
               : new ActiveXObject("Microsoft.XMLHTTP");
    reader.open("GET", filename, false );
    reader.send();
    return reader.responseText.split(/\r\n|\n|\r/);  //split(/(\r\n|\n)/g) 
}
    document.write(textFileToArray('tournament.txt'));</script>

 Trivia Dashboard
</h2>
  </section><br><section> <div class="text-body" style="font-size: 12px;">
<p style="font-size: 150%;">
<a href="login.php">Login to tournament</a><br><br>
<a href="../../welcome.php">My Account</a><br><br>

  Tournament director: Fill out the participant and questions list in the
   <a href="admin/setup.php">Tournament Director Setup Panel</a>.
<br><br>
   Particiants: Submit the answers to daily trivia questions in the <a href="teams/">Participant Submissions</a>

  
<!--
  <b>STEP 4:</b> If at any point, the Head Referee needs to make an
  adjustment to the scores because a scoring error is discovered, the
  Head Referee can access the Score Editor page.

  <script>
    document.write('<a href="login.php?data=edit">Score Editor for Head Referee</a><br>');
  </script>-->
  <br>
  <br><!--<script>
      document.write('<a href="recovery.php?data='+window.location.hash.substring(1)+'">Password Recovery</a><br>');
</script>-->
 <br>
 <br>
<script>
function textFileToArray(filename) {
    var reader = (window.XMLHttpRequest != null )
               ? new XMLHttpRequest()
               : new ActiveXObject("Microsoft.XMLHTTP");
    reader.open("GET", filename, false );
    reader.send();
    return reader.responseText.split(/\r\n|\n|\r/);  //split(/(\r\n|\n)/g)
}
  </script>




 <br>
You are running Trivia v<script>
document.write(textFileToArray('version.txt')[0]);
  </script>

<!--
. If you are using anything earlier (created tournament before 9:00 PM 10/18/15) some links may be broken/inaccessable please use the <script>
   function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
   }
 if (UrlExists(dir + '/version.txt') != true) { 
   if (UrlExists(dir + '/tournament.txt') != true) { 
      document.write('<a href="/upgrade.php#'+decodeURIComponent(window.location.hash.substring(1))+'">Upgrade Assistant</a><br>');
   } else {
document.write('<a href="/upgrade.php#'+textFileToArray(window.location.hash.substring(1) + '/tournament.txt')+'">Upgrade Assistant</a><br>');
   }} else {document.write('upgrade link (moved to Tournament Director Setup Panel).')}
 </script>
-->
  <br>
</p>
</div>

</section>
<br>
    <script> 
    $(function(){
      $("#footer").load("footer.html"); 
    });
    </script>
     <div id="footer"></div>
  </div>
<script src='js/accordian.js'></script>

</body>
