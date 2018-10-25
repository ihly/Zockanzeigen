<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "image_upload");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    $category = mysqli_real_escape_string($db, $_POST['category']);

    $price = mysqli_real_escape_string($db, $_POST['price']);

    $name = mysqli_real_escape_string($db, $_POST['name']);


  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text, category, price, name) VALUES ('$image', '$image_text', '$category', '$price', '$name')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
      header("Location: index.php");
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>


<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beitrag erstellen</title>
	 <script src="../inhalt/index.js"></script>
    <link href="../inhalt/index.css" rel="stylesheet">
  </head>
  <body/>
  	<a href="index.php"><h1 id="pageheader">Zockanzeigen</h1></a>

  	<div id="Sidebar">
  <a href="https://euw.leagueoflegends.com/de/" target="_blank">
    <img class="mySlides" src="../Grafiken index.html/Werbung2.jpg" alt="Selfhtml" />
  </a>
  <a href="https://www.callofduty.com/de/blackops4" target="_blank">
    <img class="mySlides" src="../Grafiken index.html/Werbung1.jpg" alt="Selfhtml"/>
  </a>
  <a href="https://playhearthstone.com/de-de/" target="_blank">
    <img class="mySlides" src="../Grafiken index.html/Werbung3.jpg" alt="Selfhtml"/>
  </a>
  <a href="https://fallout.bethesda.net/" target="_blank">
    <img class="mySlides" src="../Grafiken index.html/Werbung4.jpg" alt="Selfhtml"/>
  </a>
</div>



<center>

  <form method="POST" action="indexBeitragErstellen.php" enctype="multipart/form-data">
  <div class="format">
    <input type="hidden" name="size" value="1000000">

    <div>

         <p class="Form">Artikelname</p>
         <input id="name" type="tablerow" name="name" placeholder="Artikelname" style="width:111.85px" minlength="5"/>

    </div>

    <div>

             <p class="Form">Kategorie</p>

          <select name="category" size="1">
            <option>-------</option>
            <option>Konsole</option>
            <option>PS4 Spiel</option>
            <option>X-BOX Spiel</option>
            <option>Nintendo Spiel</option>
            <option>Zubehör</option>
          </select>

    </div>

    <div>

         <p class="Form">Preis</p>
         <input id="price" type="tablerow" name="price" placeholder="Preis" style="width:111.85px"/>

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
      <button type="submit" name="upload">Beitrag erstellen</button>
    </div>
	</div>
  </form>


  </div>
</center>
</html>
