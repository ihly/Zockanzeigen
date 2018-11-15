  <?php
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  $msg = "";

  $error = false;

  if (isset($_POST['upload'])) {

    $image = $_FILES['image']['name'];

  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    $category = mysqli_real_escape_string($db, $_POST['category']);

    $price = mysqli_real_escape_string($db, $_POST['price']);

    $name = mysqli_real_escape_string($db, $_POST['name']);

    $email = mysqli_real_escape_string($db, $_POST['email']);

    if(strlen($name) == 0) {
     echo 'Bitte ein Name eingeben<br>';
     $error = true;
    }

    if(strlen($price) == 0) {
     echo 'Bitte einen Preis eingeben<br>';
     $error = true;
    }

    if(strlen($category) == 0) {
     echo 'Bitte eine Kategorie eingeben<br>';
     $error = true;
    }

    if(strlen($email) == 0) {
     echo 'Bitte eine Email eingeben<br>';
     $error = true;
    }

  	$target = "images/".basename($image);

    if(!$error) {
      $sql = "INSERT INTO images (name, price, email, category, image_text) VALUES ('$name','$price','$email','$category', '$image_text ')";

      mysqli_query($db,$sql);

      $result = mysqli_query($db, "SELECT * FROM images");

      if($result) {
       echo 'Du hast erfolgreich eine Anzeige aufgegeben.<a href="indexloggedin.php">Zur Startseite</a>';
      } else {
       echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>Bitte Angaben überprüfen';
      }
    }

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }



?>


<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beitrag erstellen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	 <script src="../src/index.js"></script>
    <link href="../src/index.css" rel="stylesheet">
  </head>
  <body/>
  	<a href="indexloggedin.php"><h1 id="pageheader">Zockanzeigen</h1></a>

<center>

  <form method="POST" action="indexBeitragErstellen.php" enctype="multipart/form-data">
  <div class="format">
    <input type="hidden" name="size" value="1000000">

    <div>

         <p class="Form">Artikelname</p>
         <input id="name" type="tablerow" type="text" name="name" placeholder="Artikelname" minlength="5" style="width:111.85px" minlength="5"/>

    </div>

    <div>

             <p class="Form">Kategorie</p>

          <select name="category" size="1">
            <option></option>
            <option>Konsole</option>
            <option>PS4 Spiel</option>
            <option>X-BOX Spiel</option>
            <option>Nintendo Spiel</option>
            <option>Sonstige</option>
          </select>

    </div>

    <div>

         <p class="Form">Preis</p>
         <input id="price" type="tablerow" name="price" placeholder="Preis" minlength="2" style="width:111.85px"/>

    </div>

    <div>

         <p class="Form">Kontaktmail</p>
         <input id="email" type="tablerow" name="email" placeholder="Kontaktmail" minlength="5" style="width:111.85px"/>

    </div>

	<div>
		<p class="Form">Bild einfügen</p>
		<input type="file" name="image">
    </div>

	<p class="Form">Artikelbeschreibung</p>
	    <div id="Beschreibung">
      <textarea
        id="text"
        cols="40"
        rows="4"
        name="image_text"
        placeholder="Beschreibe den Artikel...">
		</textarea>
    </div>
    <div class="Form">
      <td><input type="submit" name="upload" value="Beitrag erstellen" style="color : black"/></td>
    </div>
	</div>
  </form>


  </div>
</center>
</html>
