<?php
include dirname(__FILE__) . '/autoload.php';
$query          = $argv[2];
$show_images    = (isset($argv[1]) && trim(strtolower($argv[1])) == 'yes') ? true : false;
$tmp            = explode(' ', $query);
$type           = $tmp[0];
$query          = trim(str_replace($type, '', $query));
$type           = strtolower($type);
$thumbs_path    = 'artwork';
$x              = 1;
$key            = $type . 's';
$max            = ($show_images === true) ? 5 : 15;

if (($type != 'artist' && $type != 'album' && $type != 'track') || strlen($query) < 3) {
    exit;
}

$results = array();
$json    = Tools::fetch('http://ws.spotify.com/search/1/' . $type . '.json?q=' . urlencode($query));
$error   = (empty($json)) ? true : false;
$json    = json_decode($json);
$error   = (Tools::getJsonError() !== false) ? true : $error;

if ($error === true) {
    array_push($results, array(
        'uid'          => $type,
        'arg'          => null,
        'title'        => 'Error Found',
        'subtitle'     => 'Could not find or parse results',
        'icon'         => 'icon.png',
        'autocomplete' => htmlentities($query, ENT_QUOTES, 'UTF-8')
    ));
}
elseif ($json->info->num_results < 1 || !isset($json->info->num_results) || !isset($json->{$key})) {
    array_push($results, array(
        'uid'          => $type,
        'arg'          => null,
        'title'        => 'Came up empty',
        'subtitle'     => 'No results found for ' . htmlentities($query, ENT_QUOTES, 'UTF-8'),
        'icon'         => 'icon.png',
        'autocomplete' => htmlentities($query, ENT_QUOTES, 'UTF-8')
    ));
}
else {
    foreach ($json->{$key} as $k => $obj) {
        if ($x <= $max) {
            $name           = (isset($obj->name)) ? htmlentities($obj->name, ENT_QUOTES, 'UTF-8') : null;
            $album          = (isset($obj->album->name)) ? htmlentities($obj->album->name, ENT_QUOTES, 'UTF-8') : null;
            $artist_name    = (isset($obj->artists[0]->name)) ? htmlentities($obj->artists[0]->name, ENT_QUOTES, 'UTF-8') : null;

            if ($type == 'artist') {
                $subtitle        = 'Artist';
                $autocomplete    = $name;
            }
            elseif ($type == 'album') {
                $subtitle        = $artist_name;
                $autocomplete    = $artist_name . ' ' . $name;
            }
            else {
                $subtitle        = $artist_name . ' - ' . $album;
                $autocomplete    = $artist_name . ' ' . $album;
            }

            if ($show_images === true) {
                $hrefs         = explode(':', $obj->href);
                $track_id      = $hrefs[2];
                $thumb_path    = $thumbs_path . '/' . $track_id . '.png';

                if (! file_exists($thumb_path)) {
                    $artwork = Tools::getTrackArtwork($type, $track_id);
                    if (! empty($artwork)) {
                        shell_exec('curl -s ' . $artwork . ' -o ' . $thumb_path);
                    }
                }

                $icon = (! file_exists($thumb_path)) ? 'icon.png' : $thumb_path;
            }
            else {
                $icon = 'icon.png';
            }

            array_push($results, array(
                'uid'             => $type,
                'arg'             => $obj->href,
                'title'           => $name,
                'subtitle'        => $subtitle,
                'icon'            => $icon,
                'autocomplete'    => $autocomplete
            ));
            $x += 1;
        }
        else {
            break;
        }
    }
}

print Tools::arrayToXML($results);