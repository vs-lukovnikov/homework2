<?php
$matrix_first = [
  [1, 2, 3, 1],
  [4, 0, 1, 2],
];

$matrix_second = [
  [1, 0, 1,],
  [1, 1, 1,],
  [0, 1, 0,],
  [1, 1, 0,],
];
$height = count($matrix_first);
$length = count($matrix_second[0]);
$count = count($matrix_second);

$result = [];
for($current_height = 0; $current_height < $height; $current_height++) {
  for($current_length = 0; $current_length < $length; $current_length++) {
    $number = 0;
    for($current_count = 0;  $current_count < $count; $current_count++) {
      $number += $matrix_first[$current_height][$current_count]*$matrix_second[$current_count][$current_length];
      }
      $result[$current_height][$current_length] = $number;


  }

}
var_dump($result);
