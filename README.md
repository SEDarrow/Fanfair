# Fanfair

# Requirements
## High priority
#### admin
    * add
    * remove
    * vote

#### user
    * join
    * add
    * vote

#### audience
    * join

#### sql database
    * store playlists
    * store users

#### add music
   * Description:
      - Users who are designated as Miestro(Admin) or Groupie(User w/ Account) would have the ability to add music to the playlist.
        The user types in a song name and is given song choices to pick from. 
        The song picked by the user would be added to the playlist.
   * Actors:
      - Maistros (Users with Admin Privledges), and Groupies (Users with normal priviledges)
   * Steps:
      1.User presses the "Add Song Button".
      2.Users type in a song name into the search bar.
      3.Song is searched on youtube and the user is given the first 5 video results to choose from.
      4.Once the user selects the proper video the video url is sent to the database. 
      5.The song is then added to the overall playlist, the song name comes from the Youtube Video title.
      6.The song is ranked at the median (0 position) of the playlist and it's position in the playlist shows Name and current vote             score.

#### sequential playlist
    * Description:
      - The music playlist would be based on a priority queue. This priority would be directly linked to the voting "score" of each             song. The song with the highest vote score would be moved to the top of the queue, the next ranking song would be below it, and         so on. As songs are played, they are removed from the queue and the next highest scored song takes its place.
    
    *Actors:
        *Users, Admins, and Members.
    
    *Steps:
        1.Song is added to the queue. 
        2.Song is placed at the 0 position of the queue (Below positive scored songs, above negative scored songs). 
        3.Song is then voted on by the users and moved up and down the playlist priority qeue accordingly. 
        4.The song eventually is played in the order of it's score, and then removed from the playlist.
    
#### voting system
    * Description:
      -Songs added to the playlist are given a score modifier, each song's score is determined by the users that vote on the songs in the playlist. Each song's score is displayed between two buttons. One button increases the song's score by one point, and another button decreases the song's score by one point. Users are only able to vote once on a song. Songs that are upvoted are ranked in the playlist accordingly (See "Sequential Playlist" Description). The number of negatively ranked songs allowed in the playlist will be a function of the number of positively scored songs / 5. This means that if there are 5 songs in the playlist, only one negatively scored song will be allowed, anything more than that will automatically be removed from the playlist.
    * Actors: Members, Admins
    * Steps:
         * 1.A song is added to the playlist.
           2.The song is added to the bottom (but above the negative) portion of the playlist with a starting score of "0".
           3.Users vote using buttons on either side of the displayed score.
           4.See "Sequential Playlist" for continuation of steps.
           
#### encore system
    * Desctiption:
      -Members listening to the song may want the opportunity to play that song over again, if this is the case, the member is allowed to press a button on the current song banner to re-add the currently playing song into the playlist. Once the button is pushed, the song will be re-added to the playlist with a score of "0". This allows users to vote on this song again and determine if the song is truly good enough for a replay. Once the song has been re-added to the playlist, the "encore" button loses functionality until the next song.
    * Actors: Members, Admins.
    
    * steps: 
         * 1.A song is played from the playlist based off of its score (See "Sequential Playlist" Section.)
           2.A button on the "Now Playing" banner will allow users to re-add the song to the playlist.
           3.The button is pressed by the member/user and the song is added to the playlist with a score of "0".
           4.Button loses functionality until the next song begins.

#### audio output
   * Description:
      -Audio output will be on a hosted "Main" computer, this client machine will be connected to a audio system such as a surround sound system. This "Main" client will play music by using the youtube URL's entered by the users in the playlist. After the video is finished playing, it automatically requests the next song in the playlist and begins playing it. If the users vote to skip the song the video is ended and the next song in the playlist is requested and played. Should the playlist run out, there will be no songs playing. Audio is adjusted on the physical hardware (stereo system volume knob)
   * Actors: Main computer connected to the stereo system.
   * Steps: 
         * 1.Users determine what computer will be the main computer for the audio playback.
           2.Users connect computer to audio system via a AUX cable.
           3.Users log into the site with the main computer.
           4.Computer handles playing youtube videos added to the playlist as they are ranked in the playlist.
           5.Should users vote to skip a song, the song is skipped and the next song is played.
#### search engine
    * source from youtube
#### user end GUI

#### not allow duplicate songs

#### login page

#### create account page

#### playlist page
    * user/admin
    * non-user/audience

## Medium priority
- history of recently played songs
    * ability to re-add songs
- multiple rooms

- user leader board

## Low priority
- import external playlists
    * youtube playlists
    * spotify playlists
