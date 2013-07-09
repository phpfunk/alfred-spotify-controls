<?php
$dirname = dirname(__FILE__);
include $dirname . '/autoload.php';
include $dirname . '/shared/commands.php';
include $dirname . '/shared/query.php';

$results = array();
foreach ($commands as $k => $arr) {
    if (! empty($query) && substr($k, 0, $len) == $key) {
        $query = ($space === false) ? $k : $query;
        array_push($results, array(
            'uid'             => $k,
            'arg'             => $query,
            'title'           => $arr['title'],
            'subtitle'        => $arr['subtitle'],
            'icon'            => 'icon.png',
            'autocomplete'    => $k
        ));
    }
}

if (! empty($results)) {
    print Tools::arrayToXML($results);
}