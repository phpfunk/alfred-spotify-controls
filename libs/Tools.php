<?php

class Tools {

    public static function arrayToXML($a)
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

    public static function fetch($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Easy Fetch by Jeff Johns @phpfunk');
        $page    = curl_exec($ch);
        $info    = curl_getinfo($ch);
        curl_close($ch);
        return ($info['http_code'] == '200') ? $page : null;
    }

    public static function getJsonError()
    {

        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return false;
            break;
            case JSON_ERROR_DEPTH:
                return 'Maximum stack depth exceeded';
            break;
            case JSON_ERROR_STATE_MISMATCH:
                return 'Underflow or the modes mismatch';
            break;
            case JSON_ERROR_CTRL_CHAR:
                return 'Unexpected control character found';
            break;
            case JSON_ERROR_SYNTAX:
                return 'Syntax error, malformed JSON';
            break;
            case JSON_ERROR_UTF8:
                return 'Malformed UTF-8 characters, possibly incorrectly encoded';
            break;
            default:
                return 'Unknown error';
            break;
        }
    }

    public static function getTrackArtwork($type, $id)
    {
         $html = self::fetch('http://open.spotify.com/' . $type . '/' . $id);
         if (! empty($html)) {
             preg_match_all('/.*?og:image.*?content="(.*?)">.*?/is', $html, $m);
             return (isset($m[1][0])) ? $m[1][0] : '';
         }
         return '';
    }

}