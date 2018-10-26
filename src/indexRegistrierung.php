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
   <link href="../src/index.css" rel="stylesheet">
  </head>

  <body/>
   <a href="index.php"><h1 id="pageheader">Zockanzeigen</h1></a>
   <?php
     $db = mysqli_connect("localhost", "root", "", "image_upload");
     
    $showFormular = true; //Variable ob die Registrierung angezeigt werden soll

    if(isset($_GET['register'])) {
     $error = false;
     $name = $_POST['name'];
     $passwort = $_POST['passwort'];
     $passwort2 = $_POST['passwort2'];
     $email = $_POST['email'];
     $plz = $_POST['plz'];

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
     $statement = $db->prepare("SELECT * FROM kunde WHERE email = :email");
     $result = $statement->execute(array('email' => $email));
     $kunde = $statement->fetch();

     if($kunde !== false) {
     echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
     $error = true;
     }
    }

    //Keine Errors, wir können den Nutzer registrieren
    if(!$error) {
     $statement = $db->prepare("INSERT INTO kunde (name, passwort, email, plz) VALUES (:name, :passwort, :email, :plz)");
     $result = $statement->execute(array('name' => $name, 'passwort' => $passwort, 'email' => $email, 'plz' => $plz));

     if($result) {
      echo 'Du wurdest erfolgreich registriert.<a href="login.php">Zum Login</a>';
      $showFormular = false;
     } else {
        echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>Bitte Angaben überprüfen';
       }
     }
    }

    if($showFormular) {
     //öffnet die If Bedingung
   ?>
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
