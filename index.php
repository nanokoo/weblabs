<!doctype html>
<html>
<form action="index.php" method="POST" id="data">
  <label for="first_name">First name: </label>
  <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name."><br>
  <label for="first_name">Middle name:</label>
  <input type="text" id="middle_name" name="middle_name" placeholder="Enter your middle name."><br>
  <label for="last_name">Last name: </label>
  <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name."><br>
  <label for="select_salut">Choose your salutation</label>
  <select id="select_salut" name="select_salut">
    <option value=''>Select</option>
    <option value='Mr'>Mr</option>
    <option value='Mrs'>Mrs</option>
    <option value='Ms'>Ms</option>
    <option value='Sir'>Sir</option>
    <option value='Prof'>Prof</option>
    <option value='Dr'>Dr</option>
  </select><br>
  <label for='age'>Age:</label>
  <input type='number' id='age' name='age' min='17' max='99' value='18' required><br>
  <label for='email'>Email:</label>
  <input type='email' id='email' name='email' required placeholder="Enter a valid email address"><br>
  <label for='phone'>Contact phone:</label>
  <input type='tel' id='phone' name='phone' placeholder="55555555"><br>
  <label for='date'>Date of arrival:</label>
  <input type='date' id='date' name='date' required><br>
  <label for='message'>Enter other info:</label><br>
  <textarea id='message' name='message' rows='5' cols="20"></textarea>
  <input type='submit' name="submitbutton" value='Submit'>
</form>

<?php
$first_name = $_POST["first_name"];
$middle_name = $_POST["middle_name"];
$last_name = $_POST["last_name"];
$salut = $_POST["select_salut"];
$age = $_POST["age"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date = $_POST["date"];
$message = $_POST["message"];
$submitbutton= $_POST['submitbutton'];


$data = $first_name  . PHP_EOL .
        $middle_name . PHP_EOL .
        $last_name   . PHP_EOL .
        $salut       . PHP_EOL .
        $age         . PHP_EOL .
        $email       . PHP_EOL .
        $phone       . PHP_EOL .
        $date        . PHP_EOL .
        $message     . PHP_EOL ."-----------" . PHP_EOL;

if ($submitbutton){
  file_put_contents('ppl.txt', $data, FILE_APPEND | LOCK_EX);

  echo $first_name. "<br>".
       $middle_name. "<br>".
       $last_name. "<br>".
       $salut. "<br>".
       $age. "<br>".
       $email. "<br>".
       $phone. "<br>".
       $date. "<br>".
       $message. "<br>";
}

$file = fopen("ppl.txt", "r") or exit("Unable to open file!");
$regnr = 0;
while(!feof($file))
  {
  if( fgets($file) == "-----------" . PHP_EOL){
    $regnr += 1;
    }
  }
fclose($file);
echo "Number of registrations: " . $regnr . "<br>";
?>
<a href="ppl.txt" download>Download Registration data</a>
</html>
