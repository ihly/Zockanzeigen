<?php
 //load_product.php
 $connect = mysqli_connect("localhost", "michael", "michael", "image_upload");
 if(isset($_POST["price"]))
 {
      $output = '';
      $query = "SELECT * FROM images WHERE price <= ".$_POST['price']." ORDER BY price desc";
      $result = mysqli_query($connect, $query);
      if(mysqli_num_rows($result) > 0)
      {
        while ($row = mysqli_fetch_array($result)) {
            echo "<div id='img_div'>";
            echo "<img src='images/".$row['image']."' >";
            echo "<p>".$row['image_text']."</p>";
            echo "</div>";
      }
      }
      else
      {
           $output = "No Product Found";
      }
      echo $output;
 }
 ?>
