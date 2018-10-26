<?php
 //load_product.php
 $connect = mysqli_connect("localhost", "root", "", "image_upload");
 if(isset($_POST["price"]))
 {
      $output = '';
      $query = "SELECT * FROM images WHERE price <= ".$_POST['price']." ORDER BY price desc";
      $result = mysqli_query($connect, $query);
      if(mysqli_num_rows($result) > 0)
      {
           while($row = mysqli_fetch_array($result))
           {
                $output .= '
                     <div class="col-md-4">
                          <div style="border:1px solid #ccc; padding:12px; margin-bottom:16px; height:375px;" align="center">
                               <img src="images/'.$row["image"].'" class="img-responsive" />
							   <h3>'.$row["name"].'</h3>
                               <h4>Price - '.$row["price"].'</h4>
                          </div>
                     </div>
                ';
           }
      }
      else
      {
           $output = "Kein Produkt gefunden";
      }
      echo $output;
 }
 ?>
