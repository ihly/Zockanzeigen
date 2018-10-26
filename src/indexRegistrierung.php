<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");
?>
<!DOCTYPE html>
 <html lang="de">

  <head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Registrierung</title>
   <link href="../inhalt/index.css" rel="stylesheet">
  </head>

  <body/>
   <a href="index.php"><h1 id="pageheader">Zockanzeigen</h1></a>
   <?php
    $showFormular = true; //Variable ob die Registrierung angezeigt werden soll

    if(isset($_GET['register'])) {
     $error = false;
     $id = $_POST['id'];
     $name = $_POST['name'];
     $passwort = $_POST['passwort'];
     $passwort2 = $_POST['passwort2'];
     $email = $_POST['email'];
     $ort = $_POST['ort'];

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
     $statement = $pdo->prepare("SELECT * FROM kunde WHERE email = :email");
     $result = $statement->execute(array('email' => $email));
     $kunde = $statement->fetch();

     if($kunde !== false) {
     echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
     $error = true;
     }
    }

    //Keine Errors, wir können den Nutzer registrieren
    if(!$error) {
     $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
     $statement = $pdo->prepare("INSERT INTO kunde (email, passwort) VALUES (:email, :passwort)");
     $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));

     if($result) {
      echo 'Du wurdest erfolgreich registriert.'
      <a href="login.php">Zum Login</a>;
      $showFormular = false;
     } else {
        echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
       }
     }
    }

    if($showFormular) {
     //öffnet die If Bedingung
   ?>
 <form action="?register=1" method="post">
 <center>
  <table id="registration">
   <caption id="table">Registrierung</caption>

   <tr>
    <td style="allign:left">Benutzername</td>
    <td><input type="tablerow"  name="username" placeholder="Benutzername" style="width:110px"/></td>
   </tr>

   <tr>
    <td style="allign: left">Passwort</td>
    <td><input type="password" name="password" placeholder="Passwort" style="width:111.85px"/></td>
   </tr>

   <tr>
    <td style="allign: left">Email</td>
    <td><input id="email" type="email" name="email" placeholder="Email-Adresse" style="width:111.85px"/></td>
   </tr>

   <tr>
    <td style="allign: left">Wohnort</td>
    <td><input id="placeOfResidenz" type="text" name="placeOfResidenz" placeholder="Wohnort" style="width:111.85px"/></td>
   </tr>

   <tr>
    <td></td>
    <td><input type="submit" value="Abschicken"/></td>
   </tr>
  </table>
 </center>
 </form>
 <?php
 //schließt die If Bedingung
 }
 ?>
  </body/>
 </html>
