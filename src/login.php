<?php
// Create database connection
 $db = mysqli_connect("localhost", "root", "", "image_upload");

 if(isset($_GET['login'])) {
  $email = $_POST['email'];
  $passwort = $_POST['passwort'];
  $statement = $pdo->prepare("SELECT * FROM kunde WHERE email = :email");
  $result = $statement->execute(array('email' => $email));
  $kunde = $statement->fetch();

  //Überprüfung des Passworts
  if ($kunde !== false && password_verify($passwort, $kunde['passwort'])) {
   $_SESSION['kundeid'] = $kunde['id'];
   die('Login erfolgreich.'<a href="geheim.php">internen Bereich</a>);
  } else {
     $errorMessage = "Email-Adresse oder Passwort war ungültig"<br>;
  }

 }
?>
<!DOCTYPE html>
<html lang="de">
 <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Anmeldung</title>
  <link href="../inhalt/index.css" rel="stylesheet">
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
   <a id="link" href="indexRegistrierung.html">Noch kein Kunde? Hier Registrieren.</a>
  </center>
 </body/>
</html>
