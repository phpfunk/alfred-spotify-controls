# Spotify Controls for Alfred

An Alfred Workflow so you can control Spotify from [Alfred App](http://alfredapp.com/). You will need Alfred Version 2 and the Powerpack to use this.

If you are looking for the Spotify Extension for Alfred Version 1, you can find it [here](https://github.com/phpfunk/alfred-spotify-controls/tree/v1)

## Installation

To install Spotify Controls in Alfred double click on `Spotify.alfredworkflow` or drag the workflow to the workflow window in Alfred.

## Using automatic updates
The auto-updater is baked just for this extension. It will ping Github and get the last 5 releases of this extension. You can easily press `Enter` to install a new version, or downgrade to an older version. If you would like to view the release first, simply `Control + Enter` to be taken directly to the release page on Github. You can also use `Option + Enter` to read the release notes for the release. Yep that's it. No more downloading squat from here.

### Get the 5 latest releases
```
spot update

Enter           = Install release
Control + Enter = View codebase of release
Option + Enter  = Read the release notes for the release
```

## Hotkeys
Version 2.2.1 introduced the use of Hotkeys to invoke certain actions. All hotkeys are customizable in the workflow.

#### Hotkey for Search

```
Command + Enter
```

This hotkey will bring open a default search box where you can just type one of the following commands to search:

```
artist De La Soul
album Stakes is High
track Sunshine
```

#### Hotkey for Radio Stations

```
Option + Command + R
```

This hotkey will simply create a new Spotify radio station from the currently playing track.


## How to use (Basic Commands)

```
spot start    ::  To open or activate the Spotify application (can also use open or init)
spot quit     ::  To quit the application (can also use kill or exit)
spot pause    ::  Pause the current track (can also use stop)
spot play     ::  Play the current track
spot >        ::  Go to the next track (can also use next)
spot <        ::  Replay the current track (can also use prev)
spot <<       ::  Go to the previous track
spot mute     ::  Toggles mute from on/off (can also use unmute)
spot vol 50   ::  Sets the volume to the number specified after 'spot vol'
spot app      ::  Open spotify application (only available in 0.8.0 or above)
spot shuffle  ::  Toggle shuffle (only available in 0.8.0 or above)
spot repeat   ::  Toggle repeat (only available in 0.8.0 or above)
spot help     ::  Open this help file
spot dev      ::  My info
spot clear    ::  Clears any artwork cache from you HDD
spot update   ::  Gets the last 5 releases of the extension, enter to install, ctrl+enter to view release
spot new      ::  Visit the new releases search results

Commands that also send a notification
spot now      ::  Current track name, artist, album and duration (can also use i or current)
spot artist   ::  Artist and Album Artist if applicable or search for an artist
spot album    ::  Album name of current playing track or search by album
spot disc     ::  Disc # if available
spot time     ::  Track duration (can also use t or duration)
spot plays    ::  Total plays for this track (can also use count)
spot track    ::  The song name (can also use t or song or name)
spot starred  ::  If the song is starred or not (can also use star or fav)
spot rank     ::  The popularity of the song from 0 to 100 (can also use pop or popularity)
spot id       ::  The spotify ID
spot url      ::  The spotify HTTP URL
spot appurl   ::  The spotify application URL
spot version  ::  The spotify application version
spot dev      ::  My info
spot clear    ::  Clears any artwork cache from you HDD

Commands that also copy the result to the clipboard
spot id       ::  The spotify ID
spot url      ::  The spotify HTTP URL
spot appurl   ::  The spotify application URL
spot version  ::  The spotify application version
```



### Examples
```
$ spot next
$ spot pause
$ spot now
$ spot vol 75
$ spot artist
$ spot rank
$ spot url
$ spot <<
$ spot <
$ spot app lastfm
$ spot shuffle
$ spot repeat
$ spot help
$ spot dev
$ spot version
$ spot update
$ spot new
```

## Searching using the Hotkey (default to Command + Return)
Version 2.2.1 introduced the addition of Hotkey search. By default press `Command + Return` to invoke the Spotify search bar. The Hotkey can be customized in the workflow to anything you would like. can bFrom here you can just type on of the following commands:
```
artist De La Soul
album Stakes is High
track Sunshine
```

You can `Control + Enter` on any result and start a radio station from that result. A normal `Enter` will just go to that result within Spotify.

## How to use Search (Old Method prior to 2.2.1, will always work)

You can also search inline with results showing up in the results panel of Alfred. Simply type `spot` followed by `artist` or `album` or `track` then your query. The results will start to appear in the file list within Alfred. After that, find the result you want and either press `Return` on your keyboard or click the result. Spotify will open and go directly to that result.

### Examples
```
spot search artist De La Soul
spot search album Stakes is High
spot search track Sunshine
```

## Searching with images enabled (Thanks to [Robin Enhorn](https://github.com/enhorn) for this addition)

Instead of using the default Spotify logo for search results you can use the actual images found for your search. This feature does not ship enabled with this worfklow because Spotify does **NOT** include the image in their API response.

Instead it calls out to the actual Spotify URL and scrapes the image from the page. Since this takes some time to get all the images, you have to enable this feature. Also by enabling this feature it will cut your possible results from 15 to 5 to save some time.

### How To

* Open the workflow in Alfred (open Alfred preferences, clicks on the Workflows icon and click the `Spotify` worklow)
* Double click the action labeled `spot search`
* Change `IMAGES="no"` to `IMAGES="yes"`
* Save
* Done


### Creating a Radio Station from the current track
Easy, just press the Hotkey command of `Option + Command + R` and the workflow will create a Spotify radio station from the current track playing. The Hotkey can be customized in the workflow to anything you would like.


### Using automatic updates
The auto-updater is baked just for this extension. It will ping Github and get the last 5 releases of this extension. You can easily press `Enter` to install a new version, or downgrade to an older version. If you would like to view the release first, simply `Control + Enter` to be taken directly to the release page on Github. You can also use `Option + Enter` to read the release notes for the release. Yep that's it. No more downloading squat from here.

## Contributors

* [Jeff Johns](https://github.com/phpfunk)
* [Robin Enhorn](https://github.com/enhorn)
* [Simon Støvring](https://github.com/simonbs)

## Download

[Spotify Controls](https://github.com/phpfunk/alfred-spotify-controls/archive/master.zip)


## Version History

### 2.2.3 - July 8, 2013
* Cleaned up codebase and workflow like whoa
* Removed my keyword actions from workflow
* Added autocomplete file to populate commands
* Added better support for clone actions (IE: >, next = same thing)
* Removed `applescript.txt` file, can see in the code now
* Executing OSA and Bash from command line now for consolidation purposes
* Added new `commands.php` file to keep track of commands and what to execute
* Update release to 2.2.3 for auto-updater
* Added various applescripts for commands requiring some logic
* Removed the shorcuts for `spot artist {SEARCH}`, `spot album {SEARCH}` and `spot track {SEARCH}` to avoid conflicts, now required to use the hotkey shortcut or type `spot search artist|album|track {SEARCH}`. Hotkey is recommended :)
* Added the ability to hit `Control + Enter` on a search result to start a radio station from that result
* Added the ability to read about a specific release by using `Option + Enter` on an auto-update search result

### 2.2.2 - July 7, 2013
* Added support for automatic updates `spot update`
* Updated Spotify icon
* Updated codebase a bit
* Added easy way to find new releases `spot new`

### 2.2.1 - July 3, 2013
* Added hotkey support for searching
* Added hotkey support for creating custom radio stations

### 2.2.0 - June 15, 2013
* Updated workflow to simply search
* `spot artist de la soul`
* `spot album stakes is high`
* `spot track sunshine`
* `spot search [artist|album|track] {QUERY}` will still work as well
* `spot album`. `spot track` and `spot artist` will still work to notify you of current playing track's album, track or artist

### 2.1.9 - March 29, 2013
* Fixed repeat toggle, switch `repating` to `repeating` - DOH!

### 2.1.8 - January 21, 2013
* Update bundle ID

### 2.1.7 - January 13, 2012
* Updated readme, forgot it

### 2.1.6 - January 13, 2012
* Removed option to assume track as search because it slows down the search. You must type `artist`, `album` or `track` before you query.
* Added `spot clear` to clear any images cached in the `artwork` folder.


### 2.1.5 - January 13, 2012
* Many code optimizations, optimize layout of workflow, add the ability to return image icons in search results, added `artwork` folder to cache images in and put secondary PHP pages in the `incl` folder.

### 2.1.4 - January 13, 2012

- Updated volume controls to `spot vol {NUM}`

### 2.1.3 - January 13, 2012

- Updated search codebase just to clean it up a bit.

### 2.1.2 - January 13, 2012

- Updated search workflow so that if Spotify isn't open it activates it first, then runs search.

### 2.1.1 - January 13, 2012

- Split all the commands into their own workflows. This will allow lists of commands to appear for Spotify.

### 2.1.0 - January 12, 2012

- Removed basic in-app search
- Added the ability to search albums, artist and/or tracks and have the results appear in the Alfred result list.

### 2.0.0 - January 12, 2012

- Extension ported to a workflow for version 2 of Alfred.

### 1.3.9 - August 2, 2012

- Further removed code to support non growl version.

### 1.3.8 - July 24, 2012

- Add a second extension that does not use growl. Not optimal but for users with no growl installed, please use this one until I have no growl installs figured out with applescript.

### 1.3.7 - July 24, 2012

- Update eval of isRunning to isRunning is true to try and solve not having growl installed issue

### 1.3.6 - April 8, 2012

- Added version variable to show Spotify version and copy to clipboard

### 1.3.5 - March 26, 2012

- Removed log call in splitString, hoping it fixes an issue for a user

### 1.3.4 - March 26, 2012 ###

- Now checks if shuffling and repeating are enabled in current view before toggling them

### 1.3.3 - December 20, 2011 ###

- Arg, missed a testing line in the script, removed it ;)

### 1.3.2 - December 20, 2011 ###

- Fixed issue with repeat and shuffle

### 1.3.1 - December 16, 2011 ###

- spot url now returns the actual HTTP url for linking (thanks gfontenot)
- spot appurl will return the actual application URL

### 1.3.0 - December 14, 2011 ###

- Added ability to open applications
- Added ability to toggle shuffling
- Added ability to toggle repeating
- Added help link
- Add developer information call

### 1.2.0 - December 12, 2011 ###

- Added search capabilities ;)

### 1.1.0 - December 12, 2011###

- Removed need to return info by calling 'spot i OPT' you can now just use 'spot OPT'. The former will still work.
- Added more aliases for controls
- Added support for true previous track 'spot <<' will take you to the actual previous track and not just the beginning of the same song.
- When calling the next or previous track, growl will automatically fire to show what the track is
- Combined artist and album_artist into the same method and will return both if they are not equal. If equal just the artist will be returned
- Added new internal method of filterData()
- Combined play, pause and stop into the same method for 'playpause'
- If you call this extension with no command it will use 'playpause'

### 1.0.5 - December 9, 2011###

- Updated growl notifications to updated spec on growl.info. Should work with all versions of growl now.

### 1.0.4 - October 25, 2011###

- Added growl notification if you call an invalid argument. IE: 'spot i hey'

### 1.0.3 - October 20, 2011###

- Fixed issue if no album artwork exists, Growl will use the Spotify icon

### 1.0.2 - August 10, 2011###

- Added functionality to add any info returned from 'spot i OPT' automatically to the clipboard

### 1.0.1 - August 10, 2011###

- Added support for track information and growl

### 1.0.0 - August 9, 2011###

- Commit: Initial Release
