Spotify Controls for Alfred
============

An AppleScript so you can control Spotify from [Alfred App](http://alfredapp.com/). You will need Alfred and the Powerpack to use this.

Installation
----------------

To install Spotify Controls in Alfred double click on the extension file.

How to use
----------------

Once installed with Alfred you can run the following commands


    spot start    ::  To open or activate the Spotify application (can also use s or init)
    spot quit     ::  To quit the application (can also use kill, end, exit, q or e)
    spot pause    ::  Pause the current track (can also use stop or no command)
    spot play     ::  Play the current track (can also use no command)
    spot next     ::  Go to the next track (can also use n or >)
    spot prev     ::  Go to the previous track (can also use pr, previous, <, or <<)
    spot mute     ::  Toggles mute from on/off (can also use m)
    spot 50       ::  Sets the volume to the number specified after 'spot'
    spot search   ::  Search spotify
    spot app      ::  Open spotify application (only available in 0.8.0 or above)
    spot shuffle  ::  Toggle shuffle (only available in 0.8.0 or above)
    spot repeat   ::  Toggle repeat (only available in 0.8.0 or above)
    spot help     ::  Open this help file
    spot dev      ::  My info
    
    Growl Notifications (automatically copies results to the clipboard)
    spot now      ::  Current track name, artist, album and duration (can also use i or current)
    spot artist   ::  Artist and Album Artist if applicable
    spot album    ::  Album name
    spot disc     ::  Disc # if available
    spot time     ::  Track duration (can also use t or duration)
    spot plays    ::  Total plays for this track (can also use count)
    spot track    ::  The song name (can also use t or song or name)
    spot starred  ::  If the song is starred or not (can also use star or fav)
    spot rank     ::  The popularity of the song from 0 to 100 (can also use pop or popularity)
    spot id       ::  The spotify ID
    spot url      ::  The spotify HTTP URL
    spot appurl   ::  The spotify application URL
      

Examples
----------------
    $ spot next
    $ spot pause
    $ spot now
    $ spot 75
    $ spot artist
    $ spot rank
    $ spot url
    $ spot <<
    $ spot <
    $ spot
    $ spot search de la soul
    $ spot search artist:de la soul
    $ spot search album:stakes is high
    $ spot search track:sunshine
    $ spot app lastfm
    $ spot shuffle
    $ spot repeat
    $ spot help
    $ spot dev
    
Notes
----------------
All growl notifications copy the contents of the notification automatically to your clipboard.

This extension prior to 1.1 had you get info from Spotify by calling: spot i OPT. That will still work but you no longer need to do that. You can just call spot OPT now. The 'spot i' method will always work in order to maintain backwards compatibility.


Download
----------------
[Spotify Controls](https://github.com/phpfunk/alfred-spotify-controls/downloads)
    

## Version History ##
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