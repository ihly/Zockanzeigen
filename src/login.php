<?php
 // Create database connection
 $db = mysqli_connect("localhost", "root", "", "image_upload");

 if(isset($_GET['login'])) {

   //Formular auslesen
   $email = $_POST["email"];
   $passwort = $_POST["password"];

   $a = mysqli_query($db, "SELECT * FROM kunde WHERE email = '$email' AND passwort = '$passwort'");

   $b = mysqli_fetch_array($a);

   if($b != NULL){

     //Direktverlinkung der Startseite für Angemeldete Benutzer
    ?>
     <!DOCTYPE html>
     <html lang="de">
     <head>
       <meta charset="UTF-8">
       <meta http-equiv="refresh" content="0"; url="http://localhost/Zockanzeigen/src/indexloggedin.php">
       <script type="text/javascript">
         window.location.href="http://localhost/Zockanzeigen/src/indexloggedin.php"
       </script>
       </head>
       <body>
       </body>
     </html>
<?php

   }else{
      echo 'Login nicht erfolgreich.';
   }
 }
?>

<!DOCTYPE html>
<html lang="de">
 <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Anmeldung</title>
  <link href="../src/index.css" rel="stylesheet">
 </head>
 <body/>
  <a href="http://localhost/Zockanzeigen/src/index.php"><h1 id="pageheader">Zockanzeigen</h1></a>
  <?php
   if(isset($errorMessage)) {
    echo $errorMessage;
   }
  ?>
  <form action="?login=1" method="post">
  <center>
   <table>
    <caption id="table">Anmeldung</caption>

    <tr>
     <td style="allign:left">Email-Adresse</td>
	   <td><input type="email"  name="email" placeholder="Email" style="width:110px"/></td>
    </tr>

    <tr>
     <td style="allign: left">Passwort</td>
	   <td><input type="password" name="password" placeholder="Passwort" style="width:111.85px" minlength="5"/></td>
    </tr>

    <tr>
     <td></td>
     <td><input id="submitlogin" type="submit" tabindex="5" value="Anmelden"/></td>
    </tr>
   </table>
   <a id="link" href="indexRegistrierung.php">Noch kein Kunde? Hier Registrieren.</a>
  </center>
 </body/>
</html>
