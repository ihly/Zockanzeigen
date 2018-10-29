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
      <li class="active" style="margin-bottom:40px; height:100%;"><a href="#'.$row["category_id"].'" data-toggle="tab">'.$row["category_name"].'</a></li>
     ';
     $tab_content .= '
      <div id="" style="margin-bottom:40px; height:100px;"'.$row["category_id"].'" class="tab-pane fade in active">
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
     <div class="col-md-3" style="margin-bottom:40px; height:100%;">
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

	   	   <div id="iFeatures">
				<div class="ticker">
					<li><p><a href="##">Release Red Dead Redemption bricht Rekorde!</a></p></li>
					<li><p><a href="##">Jones kommt mit Git ned klar</a></p></li>
					<li><p><a href="##">Hallo Welt Programmiererwort des Jahres</a></p></li>
				</div>
			</div>

       <ul class="nav">
       <?php
       echo $tab_menu;
       ?>
       <a href="IndexBeitragErstellen.php" class="anzeigeErstellen">
          <p id="anzeigeErstellenText">
           Anzeige erstellen
          </p>
       <a href="login.php" class="anzeigeErstellen"><p id="anzeigeErstellenText">Anmeldung</p></a>
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

		  <br/><br/>





   </body>
</html>
