Spotify Controls for Alfred
============

An AppleScript so you can control Spotify from [Alfred App](http://alfredapp.com/). You will need Alfred and the Powerpack to use this.

Installation
----------------

To install Spotify Controls in Alfred double click on the extension file: Spotify-Controls.alfredextension.

How to use
----------------

Once installed with Alfred you can run the following commands


    spot start  ::  To open or activate the Spotify application (can also use 'spot init')
    spot quit   ::  To quit the application (can also use 'spot end' or 'spot kill')
    spot pause  ::  Pause the current track (can also use 'spot stop')
    spot play   ::  Play the current track
    spot next   ::  Go to the next track
    spot prev   ::  Go to the previous track
    spot mute   ::  Toggles mute from on/off
    spot 50     ::  Sets the volume to the number specified after 'spot'
    spot now    ::  Growl notification of current track name, artist, album and duration (can also use 'spot current')
    spot i OPT  ::  Growl notification of information requested, replace OPT with one of following
      artist        ::  For artist name
      album         ::  For album name
      disc          ::  For disc number
      time          ::  For track time in minutes and seconds (can also use duration)
      plays         ::  For your play count of the current track (can also use count)
      track         ::  For the track number
      starred       ::  If you have this track starred or not
      rank          ::  Track rank out of 100 (can also use popularity)
      id            ::  The track ID
      song          ::  The current track name (can also use name)
      album_artist  ::  The album artist
      url           ::  The spotify URL
      

Examples
----------------
    $ spot next
    $ spot pause
    $ spot now
    $ spot 75
    $ spot i artist
    $ spot i rank
    $ spot i url


Download
----------------
[Spotify Controls](http://dl.dropbox.com/u/45930/Alfred%20Apps/Spotify%20Controls/Spotify%20Controls.alfredextension)
    

## Version History ##
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