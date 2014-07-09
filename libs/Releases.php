<?php

class Releases {


    public static function get($repo, $release, $user='phpfunk', $max_releases=5)
    {
        $releases = json_decode(Tools::fetch('https://api.github.com/repos/' . $user . '/' . $repo . '/tags'));
        $arr      = array();

        // If good-to-go, do it
        if (json_last_error() == JSON_ERROR_NONE && ! empty($releases) && ! isset($releases->message)) {
            foreach ($releases as $k => $obj) {
                $version = str_replace('.', '', $obj->name);
                if (is_numeric($version)) {
                    $arr[$version] = $obj->name;
                }
            }

            krsort($arr);

            $releases = array();
            $x        = 1;
            $current  = str_replace('.', '', $release);

            foreach ($arr as $n => $release) {
                if ($x <= $max_releases) {

                    $title = 'Version ' . $release;
                    if ($current > $n) {
                        $subtitle = 'Downgrade to version ' . $release . '.';
                    }
                    elseif ($current < $n) {
                        $subtitle = 'Upgrade to version ' . $release . '.';
                    }
                    else {
                        $title    .= ' (Current Version)';
                        $subtitle = 'This is the version you are running.';
                    }

                    array_push($releases, array(
                        'arg'             => $release,
                        'title'           => $title,
                        'subtitle'        => $subtitle,
                        'icon'            => 'icon.png',
                        'autocomplete'    => $release
                    ));
                    $x += 1;
                }
                else {
                    break;
                }
            }
        }
        else {
            $release = array();
            array_push($releases, array(
                'arg'             => 'error',
                'title'           => 'Error',
                'subtitle'        => 'There was an error extracting the releases from Github.',
                'icon'            => 'icon.png',
                'autocomplete'    => 'error'
            ));
        }

        if (! empty($releases)) {
            print Tools::arrayToXML($releases);
        }
    }

    public static function update($release)
    {
        $user_folder = explode('/', dirname(__FILE__));
        $user_folder = '/' . $user_folder[1] . '/' . $user_folder[2];
        $dl_locale   = $user_folder . '/Downloads/Spotify.alfredworkflow';
        $workflow    = 'https://github.com/phpfunk/alfred-spotify-controls/raw/' . $release . '/Spotify.alfredworkflow';
        $file        = fopen($dl_locale, 'w');
        $ch          = curl_init();
        curl_setopt($ch, CURLOPT_URL, $workflow);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FILE, $file);
        curl_exec($ch);
        curl_close($ch);
        fclose($file);

        if (! file_exists($dl_locale)) {
            print 'Sorry, could NOT download the update :(';
        }
        else {
            shell_exec('open "' . $dl_locale . '"');
        }
    }
}