<?php
include dirname(__FILE__) . '/autoload.php';
include dirname(__FILE__) . '/shared/commands.php';

$query    = (isset($argv[1])) ? trim(strtolower($argv[1])) : null;
$tmp      = explode(' ', $query);
$c        = $tmp[0];
$len      = strlen($c);

$results = array();
foreach ($commands as $key => $arr) {
    if (empty($query) || substr($key, 0, $len) == $c) {
        array_push($results, array(
            'uid'             => $key,
            'arg'             => $query,
            'title'           => $arr['title'],
            'subtitle'        => $arr['subtitle'],
            'icon'            => 'icon.png',
            'autocomplete'    => $key
        ));
    }
}

if (! empty($results)) {
    print Tools::arrayToXML($results);
}