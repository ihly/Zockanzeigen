<?php
$connect = mysqli_connect("localhost", "root", "", "image_upload");
$query = "SELECT * FROM images ORDER BY price desc";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zockanzeigen für Gamer</title>
  <script src="../src/index.js"></script>
	<link href="../src/index.css" rel="stylesheet">
  </head>


  <body>

    <a href="http://localhost/Zockanzeigen/src/index.php"><h1 id="pageheader">Zockanzeigen</h1></a>

<ul class="nav">
  <a href="indexKonsole.php">Konsolen</a>
  <a href="#">PS4-Spiele</a>
  <a href="#">XBOX One Spiele</a>
  <a href="#">Nintendo Spiele</a>
  <a href="#">Zubehör</a>
  <li>.</li>
  <a href="login.php">Anmeldung</a>
</ul>

<div class="box">
  <div class="container-4">
    <a href="IndexBeitragErstellen.php" class="anzeigeErstellen"><p id="anzeigeErstellenText">
      Anzeige erstellen
    </p></a>
    <input type="search" id="search" placeholder="Produktsuche..." />
  </div>
</div>


<div>
<div id="Sidebar">
  <a href="https://euw.leagueoflegends.com/de/" target="_blank">
    <img class="mySlides" src="../Grafiken/Werbung2.jpg" alt="Selfhtml" />
  </a>
  <a href="https://www.callofduty.com/de/blackops4" target="_blank">
    <img class="mySlides" src="../Grafiken/Werbung1.jpg" alt="Selfhtml"/>
  </a>
  <a href="https://playhearthstone.com/de-de/" target="_blank">
    <img class="mySlides" src="../Grafiken/Werbung3.jpg" alt="Selfhtml"/>
  </a>
  <a href="https://fallout.bethesda.net/" target="_blank">
    <img class="mySlides" src="../Grafiken/Werbung4.jpg" alt="Selfhtml"/>
  </a>
</div>


<br /><br />

<div class="container" style="width:800px;">
     <br />
     <h3 align="center">Nach Preis filtern</h3>
     <br />
     <div align="center">
          <input type="range" min="0" max="1000" step="50" value="10" id="min_price" name="min_price" />
          <span id="price_range"></span>
     </div>
     <br /><br /><br />
	 </div>



	 <div id="Produkte">
     <div id="product_loading">
     <?php
     if(mysqli_num_rows($result) > 0)
     {
          while($row = mysqli_fetch_array($result))
          {
     ?>
     <div class="col-md-4">
          <div style="padding:5ex; margin-bottom:5ex; height:70ex;" align="center">
               <?php echo "<img src='images/".$row['image']."' class='img-responsive'>"; ?>
               <h3><?php echo $row["name"]; ?></h3>
               <h4>Preis : <?php echo $row["price"]; ?>€</h4>
          </div>
     </div>
     <?php
          }
     }
     ?>
     </div>
	 </div>




  </body>
</html>

<script>
$(document).ready(function(){
     $('#min_price').change(function(){
          var price = $(this).val();
          $("#price_range").text("Artikel unter " + price + "€");
          $.ajax({
               url:"load_product.php",
               method:"POST",
               data:{price:price},
               success:function(data){
                    $("#product_loading").fadeIn(500).html(data);
               }
          });
     });
});
</script>
