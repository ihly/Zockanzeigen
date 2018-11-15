<?php
   $connect = mysqli_connect("localhost", "root", "", "image_upload");
   $query = "SELECT * FROM images ORDER BY price desc";
   $result = mysqli_query($connect, $query);

   $tab_query = "SELECT * FROM category ORDER BY category_id ASC";
   $tab_result = mysqli_query($connect, $tab_query);
   $tab_menu = '';
   $tab_content = '';
   $i = 0;
   $e = 0;
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
    if($e == 0)
    {
      $product_query = "SELECT * FROM images";
      $e++;
    }
    else
    {
      $product_query = "SELECT * FROM images WHERE category = '".$row["category_name"]."'";
    }
    $product_result = mysqli_query($connect, $product_query);
    while($sub_row = mysqli_fetch_array($product_result))
    {
     $tab_content .= '
     <div class="col-md-3" style="margin-bottom:40px; height:100%;">
     <a href="detail.php?id='  . $sub_row["id"] . '">
      <img src="images/'.$sub_row["image"].'" class="img-responsive img-thumbnail" style="height:200px; width: 300px"/>
      <h4>'.$sub_row["name"].'</h4>
      <h4>'.$sub_row["price"].'€</h4>
      </a>
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


      <ul class="nav">

       <?php
        echo $tab_menu;
        ?>


       <a href="login.php" class="anzeigeErstellen">
          <p id="anzeigeErstellenText">Anzeige erstellen</p>
       <a href="login.php" class="anzeigeErstellen"><p id="anzeigeAnmeldung">Anmeldung</p></a>

       </ul>


       <div class="tab-content">

       <?php
       echo $tab_content;
       ?>

       </div>

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
		  <br/><br/>
   </body>
</html>
