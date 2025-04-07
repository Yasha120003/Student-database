<?php
  $db_server = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "studentdb2";
  $connection = "";

  $connection = mysqli_connect($db_server, 
                                   $db_user, 
                                   $db_pass, 
                                   $db_name );

   
  
   if($connection) {
    echo "you are connected to your database<br><br><br>";
   }  
                 

?>