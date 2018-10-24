<?php
  // Create database connection
  $db = mysqli_connect("localhost", "michael", "michael", "image_upload");

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


  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text, category, price) VALUES ('$image', '$image_text', '$category', '$price')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
      header("Location: index.html");
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
    <link href="../inhalt/index.css" rel="stylesheet">
  </head>
  <body/>
  	<a href="index.html"><h1 id="pageheader">Zockanzeigen</h1></a>


<center>
  <form method="POST" action="indexBeitragErstellen.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea
        id="text"
        cols="40"
        rows="4"
        name="image_text"
        placeholder="Beschreibe den Artikel..."></textarea>
    </div>
    <div>
      <tr id="tablerow" name="category">
             <td style="allign: left">Kategorie</td>
             <td>
          <select name="category" size="1">
            <option>-------</option>
            <option>Konsole</option>
            <option>PS4 Spiel</option>
            <option>X-BOX Spiel</option>
            <option>Nintendo Spiel</option>
            <option>Zubehör</option></td>
          </select>
      </tr>
    </div>
    <div>
      <tr id="tablerow">
         <td style="allign: left">Preis</td>
         <td><input id="price" type="tablerow" name="price" placeholder="Preis" style="width:111.85px" minlength="5"/></td>
      </tr>
    </div>
    <div>
      <button type="submit" name="upload">Beitrag erstellen</button>
    </div>
  </form>
  </div>
</center>





<!-- <center>

      <table id="createcontent">
	  <caption id="table">Beitrag erstellen</caption>
	  <form method="post" action="index.php" enctype="multipart/form-data">
	  <input type="hidden" name="size" value="1000000">



		<tr id="tablerow">
           <td style="allign: left">Kategorie</td>
           <td>
				<select name="top5" size="1">
					<option>-------</option>
					<option>Konsole</option>
					<option>PS4 Spiel</option>
					<option>X-BOX Spiel</option>
					<option>Nintendo Spiel</option>
					<option>Zubehör</option></td>
				</select>
        </tr>

        <tr id="tablerow">
           <td style="allign: left">Foto</td>
           <td><input id="pic" type="file" name="picture" style="width:111.85px" minlength="5"/></td>
        </tr>

		    <tr id="tablerow">
          <td style="allign:left">Bezeichnung</td>
			    <td><input id="descr" type="tablerow"  name="username" placeholder="Bezeichnung" style="width:110px"/></td>
		    </tr>

		    <tr id="tablerow">
			     <td style="allign: left">Preis</td>
		       <td><input id="price" type="tablerow" name="price" placeholder="Preis" style="width:111.85px" minlength="5"/></td>
	      </tr>

        <tr id="tablerow">
          <td style="allign:left">Informationen</td>
			    <td><input id="info" type="tablerow"  name="information" placeholder="Informationen" style="height:150px" style="width:111.85px"/></td>
		    </tr>

        <tr>
         <td></td>
         <td>
            <input id="submitlogin" type="submit" tabindex="5" value="Beitrag veröffentlichen"/>
         </td>
        </tr>
		</form>
      </table>


    </center>

  </body/> -->

</html>
