<?php
  $id = $_GET["id"];

  $connect = mysqli_connect("localhost", "root", "", "image_upload");
  $query = "SELECT * FROM images WHERE id = $id";
  $result = mysqli_query($connect, $query);
  $product_content = '';
  while($row = mysqli_fetch_array($result))
  {
  $product_content .= '
    <div class="col-md-3" style="margin-bottom:40px; height:100%;">
     <img src="images/'.$row["image"].'" class="img-responsive img-thumbnail" style="height:auto; width: auto"/>
     <h4>'.$row["name"].'</h4>
     <h4>'.$row["price"].'€</h4>
     <h4>'.$row["category"].'</h4>
     <h4>'.$row["image_text"].'</h4>
     </a>
    </div>
    ';
  }

?>

<!DOCTYPE html>
<html lang="de">
   <head>
      <meta charset="utf-8" />

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Zockanzeigen für Gamer</title>
      <script src="../src/index.js"></script>
      <link href="../src/index.css" rel="stylesheet">
   </head>
   <body>
      <a href="http://localhost/Zockanzeigen/src/index.php">
         <h1 id="pageheader">Zockanzeigen</h1>
      </a>


    <div id="iFeatures">
      <div class="ticker">
			<li><p>+++ Nvidia Geforce RTX 2080 Ti - Weitere Berichte über Ausfälle inklusive brennender Grafikkarte +++</p></li>
			<li><p>+++ Echtgeld-Preise im Fallout 76 Atomic-Shop - Und so viel Gratis-Atome gibt's pro Woche +++</p></li>
			<li><p>+++ Game Releases 2018/2019 +++ Read Dead Redemption 2 released!!! +++ Battlefield V 20. November 2018 +++ Super Smash Bros. Ultimate 7. Dezember 2018 +++ Metro Exodus 22. Februar 2019 +++ Kingdom Hearts 25.Januar 2019 +++</p></li>
			<li><p>+++ Warcraft 3 Reforged kommt! +++</p></li>
		  </div>
    </div>
    <center>
      <table>
        <caption id="table"></caption>
        <tr></tr>
        <tr></tr>
        <tr>
          <td id="anzeige" style="allign:right; length: auto; width: auto"></td>
          <td id="anzeige" style="allign:right; length: auto; width: auto">
            <?php
            echo $product_content;
            ?>
          </td>
        </tr>

      </table>
    </center>

      <div class="product_content">



     </div>


   </body>
</html>
