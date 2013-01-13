<?php
function arrayToXML($a)
{
    if (! is_array($a)) {
        return false;
    }

    $items = new SimpleXMLElement("<items></items>");

    foreach($a as $b) {
        $c = $items->addChild('item');
        $c_keys = array_keys($b);
        foreach($c_keys as $key) {
            if ($key == 'uid') {
                $c->addAttribute('uid', $b[$key]);
            }
            elseif ($key == 'arg') {
                $c->addAttribute('arg', $b[$key]);
            }
            else {
                $c->addChild($key, $b[$key]);
            }
        }
    }

    return $items->asXML();
}

$query  = urldecode($_GET['q']);
$tmp    = explode(' ', $query);
$type   = $tmp[0];
$query  = trim(str_replace($type, '', $query));
$type   = strtolower($type);
$key    = $type . 's';

if (($type != 'artist' && $type != 'album' && $type != 'track') || strlen($query) < 3) {
    exit(1);
}

$max    = 15;
$json = file_get_contents('http://ws.spotify.com/search/1/' . $type . '.json?q=' . urlencode($query));
$results = array();

if (! empty($json)) {
    $json = json_decode($json);
    $x = 1;
    foreach ($json->{$key} as $k => $obj) {
        if ($x < $max) {
            if ($type == 'artist') {
                $subtitle        = 'Artist';
                $autocomplete    = htmlentities($obj->name, ENT_QUOTES, 'UTF-8');
            }
            elseif ($type == 'artist') {
                $subtitle        = htmlentities($obj->artists[0]->name, ENT_QUOTES, 'UTF-8');
                $autocomplete    = htmlentities($obj->artists[0]->name, ENT_QUOTES, 'UTF-8'). ' ' .htmlentities($obj->name, ENT_QUOTES, 'UTF-8');
            }
            else {
                $subtitle        = htmlentities($obj->artists[0]->name, ENT_QUOTES, 'UTF-8'). " - " .htmlentities($obj->album->name, ENT_QUOTES, 'UTF-8');
                $autocomplete    = htmlentities($obj->artists[0]->name, ENT_QUOTES, 'UTF-8'). ' ' .htmlentities($obj->album->name, ENT_QUOTES, 'UTF-8');
            }

            array_push($results, array(
                'uid'             => $type,
                'arg'             => $obj->href,
                'title'           => htmlentities($obj->name, ENT_QUOTES, 'UTF-8'),
                'subtitle'        => $subtitle,
                'icon'            => 'icon.png',
                'autocomplete'    => $autocomplete
            ));
        }
    }
    print arrayToXML($results);
}