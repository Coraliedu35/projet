<?php 

    $bdd=mysqli_connect("localhost","root","","bdd_promo");
    if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

?>