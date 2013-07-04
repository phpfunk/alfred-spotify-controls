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
                if ($x < $max_releases) {

                    $title = 'Version ' . $release;
                    if ($current > $n) {
                        $subtitle = 'Downgrade to version ' . $release . '. (Ctrl+Enter to view release)';
                    }
                    elseif ($current < $n) {
                        $subtitle = 'Upgrade to version ' . $release . '. (Ctrl+Enter to view release)';
                    }
                    else {
                        $title    .= ' (Current Version)';
                        $subtitle = 'This is the version you are currently running.';
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
}