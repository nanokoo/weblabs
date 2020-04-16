<?php


$cookieContent = "Nano khantadze";
setcookie("ctransient", $cookieContent);

$count = 0;

if (isset($_COOKIE['LongTimeCount'])){
        $count = $_COOKIE['LongTimeCount'] + 1;
}else{
        $count = 1;

}
setcookie("ShortTimeCount", $count, time()+120);
setcookie("LongTimeCount", $count, time()+3600);

if ($count > 1){
  echo "Transient cookie = " .$cookieContent. '<br>';
  echo "ShortTimeCount = " .$count. '<br>';
  echo "LongTimeCount = ". $count. '<br><br><br><br>';
}

$pass = $_POST['pass'];




if ($pass == '123123'){
  session_name("SESSION_TEST");
  session_start();

  $_SESSION['Name'] = 'Nano khantadze';
  $_SESSION['Age'] = '25';
  $_SESSION['Location'] = 'Tallinn';
  $_SESSION['Logged_in'] = True;


  echo "Logged in = " . $_SESSION['Logged_in'] . "<br>";
  echo "Name: " .$_SESSION['Name']. '<br>';
  echo "Age: "  .$_SESSION['Age']. '<br>';
  echo "Location: " .$_SESSION['Location']. '<br>';




  if (isset($_SESSION['Count'])){
      $_SESSION['Count'] = $_SESSION['Count'] + 1;
      echo "Session count: " . $_SESSION['Count'] . '<br>';
  }else{
    $_SESSION['Count'] = 1;
  }
echo "<a href='logout.php'>Logout</a><br>";
}else{
  echo "Invalid PIN. Try again!";
}


?>
<form action='' method='post'>
  <label for='pin'>PIN</label>
  <input type='password' name='pass'>
  <input type='submit' value='Enter'>
</form>

<a href='another_webpage.php'>Another webpage (2.4)</a>
