<?php

while ($line = fgets(STDIN)) {
  $domains[] = trim($line);
}

for ($i = 1; $i < $argc; $i++) {
  $queries[] = ["pattern" => $argv[$i], "presence" => 0];
}

foreach ($queries as $query) {
  foreach ($domains as $domain) {
    if (preg_match("/${domain}\z/", $query["pattern"]) == 1) {
      echo $query["pattern"] . ":" . $domain . "\n";
      $query["presence"] = 1;
      break;
    }
  }
  if ($query["presence"] == 0) {
    echo $query["pattern"] . ":NONE\n";
  }
}