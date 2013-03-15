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

function fetch($url)
{
     $ch = curl_init($url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
     curl_setopt($ch, CURLOPT_TIMEOUT, 5);
     $page    = curl_exec($ch);
     $info    = curl_getinfo($ch);
     curl_close($ch);
     return ($info['http_code'] == '200') ? $page : null;
}

function getTrackArtwork($type, $id)
{
     $html = fetch('http://open.spotify.com/' . $type . '/' . $id);
     if (! empty($html)) {
         preg_match_all('/.*?og:image.*?content="(.*?)">.*?/is', $html, $m);
         return (isset($m[1][0])) ? $m[1][0] : '';
     }
     return '';
}