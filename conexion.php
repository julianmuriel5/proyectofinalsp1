<?php 

      $host = 'localhost';
      $user = 'root' ;
      $password = '';
      $db = 'tecut'  

      $conection = @mysqli_connect($host,$user,$password,$db);

      if(!$conection){
             echo "error en la conexion";
      }else {
             echo "conexion exitosa";
      }    
?>      