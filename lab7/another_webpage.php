<a href='index.php'>Take me back</a>



<?php

session_name("SESSION_TEST");
session_start();

if(!empty($_SESSION['Logged_in'])) {
   echo 'Succesfully logged in!' . "<br>";
   if (isset($_SESSION['Count'])){
       $_SESSION['Count'] = $_SESSION['Count'] + 1;
       echo "Session count: " . $_SESSION['Count'] . '<br>';
       echo "<a href='logout.php'>Logout</a><br>";
   }else{
     $_SESSION['Count'] = 1;
   }
}else{
  echo "Unauthorized login.";
}

 ?>
