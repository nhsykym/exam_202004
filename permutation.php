<?php

$stdin_arr = str_split($argv[1]);

function permutation($array, $prefix = '') {
  if (count($array) == 1) {
    echo $prefix . $array[0] . "\n";
  } else {
    for ($i = 0; $i < count($array); $i++) {
      $target = array_splice($array, $i, 1);
      permutation($array, $prefix.$target[0]);
      array_splice($array, $i, 0, $target);
    }
  }
}

permutation($stdin_arr);