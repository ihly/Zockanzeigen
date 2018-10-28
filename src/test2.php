<?php
   $connect = mysqli_connect("localhost", "root", "", "image_upload");
   $query = "SELECT * FROM images ORDER BY price desc";
   $result = mysqli_query($connect, $query);

   $tab_query = "SELECT * FROM category ORDER BY category_id ASC";
   $tab_result = mysqli_query($connect, $tab_query);
   $tab_menu = '';
   $tab_content = '';
   $i = 0;

   while($row = mysqli_fetch_array($tab_result))
   {
    if($i == 0)
    {
     $tab_menu .= '
      <li class="active"><a href="#'.$row["category_id"].'" data-toggle="tab">'.$row["category_name"].'</a></li>
     ';
     $tab_content .= '
      <div id="'.$row["category_id"].'" class="tab-pane fade in active">
     ';
    }
    else
    {
     $tab_menu .= '
      <li><a href="#'.$row["category_id"].'" data-toggle="tab">'.$row["category_name"].'</a></li>
     ';
     $tab_content .= '
      <div id="'.$row["category_id"].'" class="tab-pane fade">
     ';
    }
    $product_query = "SELECT * FROM images WHERE category = '".$row["category_name"]."'";
    $product_result = mysqli_query($connect, $product_query);
    while($sub_row = mysqli_fetch_array($product_result))
    {
     $tab_content .= '
     <div class="col-md-3" style="margin-bottom:36px;">
      <img src="images/'.$sub_row["image"].'" class="img-responsive img-thumbnail" />
      <h4>'.$sub_row["name"].'</h4>
     </div>
     ';
    }
    $tab_content .= '<div style="clear:both"></div></div>';
    $i++;
   }
   ?>

<!DOCTYPE html>

<html lang="de">

   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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

      <!-- <ul class="nav">
         <a href="indexKonsole.php">Konsolen</a>
         <a href="#">PS4-Spiele</a>
         <a href="#">XBOX One Spiele</a>
         <a href="#">Nintendo Spiele</a>
         <a href="#">Sonstige</a>
         <li>.</li>
         <a href="login.php">Anmeldung</a>
      </ul> -->



       <ul class="nav">
       <?php
       echo $tab_menu;
       ?>
       <a href="IndexBeitragErstellen.php" class="anzeigeErstellen">
          <p id="anzeigeErstellenText">
           Anzeige erstellen
          </p>
       <a href="login.php">Anmeldung</a>
       </ul>
             <div class="container">
       <div class="tab-content">

       <?php
       echo $tab_content;
       ?>
       </div>

	  <!-- <div id="mainbar">
		  <div class="box">
			 <div class="container-4">
				<a href="IndexBeitragErstellen.php" class="anzeigeErstellen">
				   <p id="anzeigeErstellenText">
					  Anzeige erstellen
				   </p>
				</a>
				<input type="search" id="search" placeholder="Produktsuche..." />
			 </div>
		  </div> -->


		  <br /><br />



		  <!-- <div class="container" style="width:800px;">
			 <br />
			 <h3 align="center">Nach Preis filtern</h3>
			 <br />
			 <div align="center">
				<input type="range" min="0" max="1000" step="50" value="10" id="min_price" name="min_price" />
				<span id="price_range"></span>
			 </div>
			 <br /><br /><br />
		  </div> -->


      <!-- <div id="Sidebar">
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
   </body>
</html> -->

<!-- <script>
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
</script> -->
