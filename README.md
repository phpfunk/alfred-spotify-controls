Spotify Controls for Alfred
============

An AppleScript so you can control Spotify from [Alfred App](http://alfredapp.com/). You will need Alfred and the Powerpack to use this.

Installation
----------------

To install Spotify Controls in Alfred double click on the extension file: Spotify-Controls.alfredextension

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
[http://cl.ly/3N2D0c1G0p1G3W2U2T0j](http://cl.ly/3N2D0c1G0p1G3W2U2T0j)
    

## Version History ##
### 1.0.1 - August 9, 2011###
 
- Added support for track information and growl

### 1.0.0 - August 9, 2011###
 
- Commit: Initial Release