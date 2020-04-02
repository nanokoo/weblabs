<?php
header('Content-type: text/plain');
error_reporting(-1);
const KM_TO_MILES = 1.60934;
$numOfDistances = rand(5,20);
$arrDistances = array_fill(0, $numOfDistances, 0);

for($i = 0; $i < $numOfDistances; $i++){
    $arrDistances[$i] = rand(1,100);
}

$arrMiles;

for($i = 0; $i < sizeof($arrDistances); $i++){
  $arrMiles[$i] = $arrDistances[$i] / KM_TO_MILES;
}
asort($arrMiles);
echo "KM \t MI". PHP_EOL;
foreach($arrMiles as $i){
  printf("%u \t %f \n", $i * KM_TO_MILES ,number_format($i,3));
}
?>
