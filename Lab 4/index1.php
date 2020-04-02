<?php
include "incl/phonics.php";

$filename = "incl/data/text.txt";
$file = file_get_contents($filename);



function phonicsCount($file){
  $count_a = 0;
  $count_e = 0;
  $count_i = 0;
  $count_o = 0;
  $count_u = 0;

  $len = strlen($file);
  for($i = 0; $i < $len; $i++){
    if($file[$i] == 'a' or $file[$i] =='A'){
      $count_a +=1;
    }
    if($file[$i] == 'e' or $file[$i] =='E'){
      $count_e +=1;
    }
    if($file[$i] == 'i' or $file[$i] =='I'){
      $count_i +=1;
    }
    if($file[$i] == 'O' or $file[$i] =='o'){
      $count_o +=1;
    }
    if($file[$i] == 'U' or $file[$i] =='u'){
      $count_u +=1;
    }
  }
  echo "<br>[A] => $count_a".
       "<br>[E] => $count_e".
       "<br>[I] => $count_i".
       "<br>[O] => $count_o".
       "<br>[U] => $count_u"."<br>";
}
phonicsCount($file);


function no_space($file){
  $len = strlen($file);
  $space_count = 0;
  for($i = 0; $i < $len; $i++){
    if (ctype_space($file[$i])){
      $space_count +=1;
      }
    }
    $chars = $len - $space_count;
   echo "Number of chars in this text is: ". $len . '(length of text) - ' .$space_count."(spaces) = ". $chars . "<br>";
}
no_space($file);

function num_of_lines($file_dir){
  $num_lines = 0;
  $handle = fopen($file_dir, "r");
    if ($handle) {
      while (($line = fgets($handle)) !== false) {
          $num_lines += 1;
        }

  fclose($handle);
  echo "Number of lines: " . $num_lines;
    }
}

num_of_lines($filename);



?>
