<?php

$stdin_arr = str_split($argv[1]);

function permutation($array, $prefix = '') {
  static $result = [];
  if (count($array) == 1 && !in_array($prefix . $array[0], $result)) {
    echo $prefix . $array[0] . "\n";
    $result[] = $prefix . $array[0];
  } else {
    for ($i = 0; $i < count($array); $i++) {
      $target = array_splice($array, $i, 1);
      permutation($array, $prefix.$target[0]);
      array_splice($array, $i, 0, $target);
    }
  }
}

permutation($stdin_arr);