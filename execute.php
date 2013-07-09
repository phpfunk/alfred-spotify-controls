<?php
$dirname = dirname(__FILE__);
include $dirname . '/autoload.php';
include $dirname . '/shared/commands.php';
include $dirname . '/shared/query.php';

$app_dir = $dirname . '/applescripts/';
$query   = trim(str_replace($key, '', $query));

if (array_key_exists($key, $commands)) {
    if (isset($commands[$key]['bash'])) {
        $command = $commands[$key]['bash'];
    }
    else {
        $command = str_replace('{query}', $query, $commands[$key]['command']);
        if (stristr($command, '.scpt')) {
            $command = 'q=' . $query . ' osascript "' . $app_dir . $command . '"';
        }
        else {
            $command = 'osascript -e \'tell application "Spotify"' . "\n" . $command . "\n" . 'end tell\'';
        }
    }

    $output = trim(shell_exec($command));

    if (! empty($output)) {
        print $output;
    }
}
else {
    print "Command not found.";
}