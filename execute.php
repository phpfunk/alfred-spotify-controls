<?php
include dirname(__FILE__) . '/autoload.php';
include dirname(__FILE__) . '/shared/commands.php';

$app_dir = dirname(__FILE__) . '/applescripts/';
$query   = (isset($argv[1])) ? trim(strtolower($argv[1])) : null;
$tmp     = explode(' ', $query);
$key     = $tmp[0];
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