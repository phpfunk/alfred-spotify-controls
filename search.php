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

$query  = $argv[1];
$tmp    = explode(' ', $query);
$type   = $tmp[0];
$query  = trim(str_replace($type, '', $query));
$type   = strtolower($type);
$key    = $type . 's';

if (($type != 'artist' && $type != 'album' && $type != 'track') || strlen($query) < 3) {
    exit(1);
}

$max        = 15;
$json       = file_get_contents('http://ws.spotify.com/search/1/' . $type . '.json?q=' . urlencode($query));
$results    = array();

if (! empty($json)) {
    $json    = json_decode($json);
    $x       = 1;

    foreach ($json->{$key} as $k => $obj) {
        if ($x < $max) {
            $name           = (isset($obj->name)) ? htmlentities($obj->name, ENT_QUOTES, 'UTF-8') : null;
            $album          = (isset($obj->album->name)) ? htmlentities($obj->album->name, ENT_QUOTES, 'UTF-8') : null;
            $artist_name    = (isset($obj->artists[0]->name)) ? htmlentities($obj->artists[0]->name, ENT_QUOTES, 'UTF-8') : null;

            if ($type == 'artist') {
                $subtitle        = 'Artist';
                $autocomplete    = $name;
            }
            elseif ($type == 'artist') {
                $subtitle        = $artist_name;
                $autocomplete    = $artist_name . ' ' . $name;
            }
            else {
                $subtitle        = $artist_name . ' - ' . $album;
                $autocomplete    = $artist_name . ' ' . $album;
            }

            array_push($results, array(
                'uid'             => $type,
                'arg'             => $obj->href,
                'title'           => $name,
                'subtitle'        => $subtitle,
                'icon'            => 'icon.png',
                'autocomplete'    => $autocomplete
            ));
        }
    }
    print arrayToXML($results);
}