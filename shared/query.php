<?php
$query = (isset($argv[1])) ? trim(strtolower($argv[1])) : null;
$space = false;

if (stristr($query, ' ')) {
    $tmp   = explode(' ', $query);
    $key   = $tmp[0];
    $space = true;
}
else {
    $key   = $query;
}

$len = strlen($key);