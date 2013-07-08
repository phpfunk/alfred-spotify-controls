<?php
include dirname(__FILE__) . '/autoload.php';
include dirname(__FILE__) . '/shared/commands.php';
include dirname(__FILE__) . '/shared/query.php';

$results = array();
foreach ($commands as $k => $arr) {
    if (empty($query) || substr($k, 0, $len) == $key) {
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