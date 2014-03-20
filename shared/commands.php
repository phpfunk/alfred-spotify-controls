<?php
$commands = array(
    '<' => array(
        'title'    => 'Replay Track',
        'subtitle' => 'Replay the current track',
        'command'  => 'previous track'
    ),
    '<<' => array(
        'title'    => 'Previous Track',
        'subtitle' => 'Play the previous track',
        'command'  => 'previous track' . "\n" . 'previous track'
    ),
    '>' => array(
        'title'    => 'Next Track',
        'subtitle' => 'Play the next track',
        'command'  => 'next track'
    ),
    'play' => array(
        'title'    => 'Toggle Play/Pause',
        'subtitle' => 'Toggle between play and pause state',
        'command'  => 'playpause'
    ),
    'quit' => array(
        'title'    => 'Quit',
        'subtitle' => 'Quit &amp; close Spotify',
        'command'  => 'quit'
    ),
    'open' => array(
        'title'    => 'Open',
        'subtitle' => 'Open Spotify',
        'command'  => 'activate'
    ),
    'mute' => array(
        'title'    => 'Toggle Mute/Unmute',
        'subtitle' => 'Toggle between muting and unmuting',
        'command'  => 'mute.scpt'
    ),
    'now' => array(
        'title'    => 'Show Current Track Information',
        'subtitle' => 'Track, artist and album name',
        'command'  => 'return "Now Playing: " & name of current track & " by " & artist of current track & " on " & album of current track'
    ),
    'album' => array(
        'title'    => 'Current Album Name',
        'subtitle' => 'Show the current album name',
        'command'  => 'album.scpt'
    ),
    'disc' => array(
        'title'    => 'Get Disc Number',
        'subtitle' => 'Get the disk number of the curren track',
        'command'  => 'disc.scpt'
    ),
    'artist' => array(
        'title'    => 'Current Artist',
        'subtitle' => 'Show the current artist name',
        'command'  => 'artist.scpt'
    ),
    'time' => array(
        'title'    => 'Show the Track\'s Duration',
        'subtitle' => 'Get the total time of the current track',
        'command'  => 'duration.scpt'
    ),
    'count' => array(
        'title'    => 'Total Plays',
        'subtitle' => 'Show the total plays of the current track',
        'command'  => 'return "Play Count: " & (played count of current track as string)'
    ),
    'track' => array(
        'title'    => 'Current Track',
        'subtitle' => 'Show the name of the current track',
        'command'  => 'track.scpt'
    ),
    'starred' => array(
        'title'    => 'Is This Starred?',
        'subtitle' => 'Check if the current track is starred',
        'command'  => 'starred.scpt'
    ),
    'popularity' => array(
        'title'    => 'Is This Popular?',
        'subtitle' => 'Check the popularity of the current track',
        'command'  => 'return "Popularity: " & (popularity of current track as string) & " out of 100"'
    ),
    'id' => array(
        'title'    => 'ID of Current Track',
        'subtitle' => 'Get the Spotify ID of the current track',
        'command'  => 'set the clipboard to id of current track' . "\n" . 'return "ID: " & id of current track'
    ),
    'url' => array(
        'title'    => 'Public URL of Current Track',
        'subtitle' => 'Get the external Spotify URL of the current track',
        'command'  => 'url.scpt'
    ),
    'appurl' => array(
        'title'    => 'Get Internal URL',
        'subtitle' => 'Get the internal Spotify URL of the current track',
        'command'  => 'set the clipboard to spotify url of current track' . "\n" . 'return "Spotify URL: " & spotify url of current track'
    ),
    'shuffle' => array(
        'title'    => 'Toggle Shuffle',
        'subtitle' => 'Toggle shuffling',
        'command'  => 'shuffle.scpt'
    ),
    'repeat' => array(
        'title'    => 'Toggle Repeat',
        'subtitle' => 'Toggle repeating',
        'command'  => 'repeat.scpt'
    ),
    'dev' => array(
        'title'    => 'Developer Information',
        'subtitle' => 'Get the developer\'s information',
        'command'  => 'return "Jeff Johns | http://phpfunk.me | @phpfunk"'
    ),
    'version' => array(
        'title'    => 'Get Application Version',
        'subtitle' => 'Get the version of Spotify you are running',
        'command'  => 'set the clipboard to version' . "\n" . 'return "Spotfy Version: " & version'
    ),
    'volume' => array(
        'title'    => 'Set Volume',
        'subtitle' => 'Set the volume level (0 - 100)',
        'command'  => 'volume.scpt'
    ),
    'app' => array(
        'title'    => 'Open a Spotify Application',
        'subtitle' => 'Type the name of a Spotify application to open',
        'command'  => 'app.scpt'
    ),
    'new' => array(
        'title'    => 'View New Releases',
        'subtitle' => 'Browse Spotify new releases',
        'bash'     => 'open spotify:search:tag:new'
    ),
    'help' => array(
        'title'    => 'Get Help',
        'subtitle' => 'Read the help file for this workflow',
        'bash'     => 'open "https://github.com/phpfunk/alfred-spotify-controls/wiki"'
    ),
    'bug' => array(
        'title'    => 'Submit a Bug',
        'subtitle' => 'Submit a bug report about this workflow',
        'bash'     => 'open "https://github.com/phpfunk/alfred-spotify-controls/issues/new"'
    ),
    'feature' => array(
        'title'    => 'Submit a Feature Request',
        'subtitle' => 'Submit a feature request for this workflow',
        'bash'     => 'open "https://github.com/phpfunk/alfred-spotify-controls/issues/new"'
    )
);

$clones = array(
    'prev'     => '<<',
    'next'     => '>',
    'pause'    => 'play',
    'stop'     => 'play',
    'exit'     => 'quit',
    'kill'     => 'quit',
    'start'    => 'open',
    'init'     => 'open',
    'unmute'   => 'mute',
    'current'  => 'now',
    'i'        => 'now',
    'duration' => 'time',
    'plays'    => 'count',
    'name'     => 'track',
    'song'     => 'track',
    'fav'      => 'starred',
    'rank'     => 'popularity',
    '?'        => 'help'
);

foreach ($clones as $command => $parent) {
    $commands[$command] = $commands[$parent];
}

ksort($commands);