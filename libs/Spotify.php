<?php

class Spotify {

    private static $max_releases = 5;
    private static $releases     = '2.2.2';

    public function _construct()
    {

    }

    public static function getReleases()
    {
        $releases = json_decode(file_get_contents('https://api.github.com/repos/phpfunk/alfred-spotify-controls/tags'));

        // If good-to-go, do it
        if (json_last_error() == JSON_ERROR_NONE) {
            print '<pre>';
            print_r($releases);
        }
    }
}