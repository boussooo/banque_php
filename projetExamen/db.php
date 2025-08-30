<?php
   $hostname="localhost";
   $username="root";
   $password="";
   $dbname="exam";

   $connection=mysqli_connect($hostname,$username,$password,$dbname);

   // verifier la connexion
   if(!$connection)
   {
    die("erreur de connexion");
    echo mysqli_connect_error();
   }else{
    //echo "Connexion reussie";
   }
?>