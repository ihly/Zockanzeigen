<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  $msg = "";

  $error = false;

  if(isset($_POST['upload'])){

    //Name

    $name = mysqli_real_escape_string($db, $_POST['name']);

    $name = mb_strtolower($name);

    $passwort = mysqli_real_escape_string($db, $_POST['passwort']);

    $passwort2 = mysqli_real_escape_string($db, $_POST['passwort2']);

    $email = mysqli_real_escape_string($db, $_POST['email']);

    $plz = mysqli_real_escape_string($db, $_POST['plz']);

    //Überprüfung ob die Email-Adresse gültig ist
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
     $error = true;
    }

    //Test ob Passwort eingetragen wurde
    if(strlen($passwort) == 0) {
     echo 'Bitte ein Passwort angeben<br>';
     $error = true;
    }

    //Test ob die Passwörter übereinstimmen
    if($passwort != $passwort2) {
     echo 'Die Passwörter müssen übereinstimmen<br>';
     $error = true;
   }

    //Überprüfung ob die Email-Adresse bereits in der DB ist
    if(!$error) {
      $sql = "INSERT INTO kunde (name, passwort, email, plz) VALUES ('$name','$passwort','$email','$plz')";

      mysqli_query($db,$sql);

      $result = mysqli_query($db, "SELECT * FROM kunde");

      if($result) {
       echo 'Du wurdest erfolgreich registriert.<a href="login.php">Zum Login</a>';
      } else {
       echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>Bitte Angaben überprüfen';
      }
      }
   }
?>

<!DOCTYPE html>
 <html lang="de">

  <head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Registrierung</title>
   <link href="../src/index.css" rel="stylesheet">
  </head>

  <body/>
   <a href="index.php"><h1 id="pageheader">Zockanzeigen</h1></a>
 <form action="?register=1" method="post">
 <center>
  <table>
   <caption id="table">Registrierung</caption>

   <tr>
    <td style="allign:left">Benutzername</td>
    <td><input type="text"  name="name" placeholder="Benutzername" minlength="5" maxlength="20" style="width:130px"/></td>
   </tr>

   <tr>
    <td style="allign: left">Passwort</td>
    <td><input type="password" name="passwort" placeholder="Passwort" minlength="5" maxlength="20" style="width:132.85px"/></td>
   </tr>

   <tr>
    <td style="allign: left">Passwort wiederholen</td>
    <td><input type="password" name="passwort2" placeholder="Passwort wiederholen" minlength="5" maxlength="20" style="width:132.85px"/></td>
   </tr>

   <tr>
    <td style="allign: left">Email</td>
    <td><input type="email" name="email" placeholder="Email-Adresse" maxlength="30" style="width:132.85px"/></td>
   </tr>

   <tr>
    <td style="allign: left">Postleitzahl</td>
    <td><input type="int" name="plz" placeholder="Postleitzahl" minlength="5" maxlength="5" style="width:132.85px"/></td>
   </tr>

   <tr>
    <td></td>
    <td><input type="submit" name="upload" value="Registrieren"/></td>
   </tr>
  </table>
 </center>
 </form>
  </body/>
 </html>
