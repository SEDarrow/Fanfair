# Fanfair

#### admin
   * create acount
   * login
   * logout
   * create playlist
   * delete playlist
   * add music
   * remove music
   * vote
   * listen to playlist
   * view playlist

#### user
   * create acount
   * login
   * logout
   * add music
   * vote
   * listen to playlist
   * view playlist

#### audience
   * listen to playlist
   * view playlist

#### sql database
   * store playlists
   * store users
    
#### playlist page
   * user/admin
   * non-user/audience
   
# Requirements
## High priority

#### 1. create acount
   * Description:
      - Users who are designated as Miestro(Admin) or Groupie(User w/ Account) must create an account in order to create or vote on playlists
   * Actors:
      - Maistros (Users with Admin Privledges), and Groupies (Users with normal priviledges)
   * Steps:
      - User presses the "Create Account" Button
      - User is prompted to input a username and password
      - If the username is already taken, or the username / password does not meet specifications of having at least three characters, the user will be prompted to enter another username or password.
      - User is told they have successfully created an account, and is taken to the playlists page

#### 2. login
   * Description:
      - Users who are designated as Miestro(Admin) or Groupie(User w/ Account) must be able to login so that they can perform their avaliable actions
   * Actors:
      - Maistros (Users with Admin Privledges), and Groupies (Users with normal priviledges)
   * Steps:
      - User presses the "Login" Button
      - User is prompted to enter a username and password
      - If the username / password combination is incorrect (not in the database), the user will be prompted to try again
      - Once the correct username and password are entered, the user is taken to the playlist page and has Miestro and Groupie privledges

#### 3. logout
  * Description
    - A user can logout, and will no longer be able to perform the actions of a Miestro or Groupie
  * Actors:
      - Maistros (Users with Admin Privledges), and Groupies (Users with normal priviledges)
  * Steps:
      - User presses the "Logout" Button
      - User is taken to the Login page

#### 4. add music
   * Description:
      - Users who are designated as Miestro(Admin) or Groupie(User w/ Account) would have the ability to add music to the playlist.
        The user types in a song name and is given song choices to pick from. 
        The song picked by the user would be added to the playlist.
   * Actors:
      - Maistros (Users with Admin Privledges), and Groupies (Users with normal priviledges)
   * Steps:
      - User presses the "Add Song Button".
      - Users type in a song name into the search bar.
      - Song is searched on youtube and the user is given the first 5 video results to choose from.
      - Once the user selects the proper video the video url is sent to the database. 
      - Duplicate songs are not allowed, so if a duplicate is requested, the user will be propted to select another song.
      - The song is then added to the overall playlist, the song name comes from the Youtube Video title.
      - The song is ranked at the median (0 position) of the playlist and it's position in the playlist shows Name and current vote             score.
      
#### 5. remove music:
   * Description:
      - Users who are designated as Miestro(Admin) would have the ability to remove songs from the playlist.
      - Songs are also removed from playlist if it is played or downvoted enough
      - This feature is a man
   * Actors:
      - Maistros (Users with Admin Privledges)
   * Steps:
      - User presses the "Remove Song Button".
      - The song is removed from the playlist

#### 6. view sequential playlist
   * Description:
      - The music playlist would be based on a priority queue. This priority would be directly linked to the voting "score" of each             song. The song with the highest vote score would be moved to the top of the queue, the next ranking song would be below it, and         so on. As songs are played, they are removed from the queue and the next highest scored song takes its place.
   * Actors:
       - Users, Admins, and Members.
    
   * Steps:
        - Song is added to the queue. 
        - Song is placed at the 0 position of the queue (Below positive scored songs, above negative scored songs). 
        - Song is then voted on by the users and moved up and down the playlist priority qeue accordingly. 
        - The song eventually is played in the order of it's score, and then removed from the playlist.
    
#### 7. voting system
   * Description:
      - Songs added to the playlist are given a score modifier, each song's score is determined by the users that vote on the songs in    the playlist. Each song's score is displayed between two buttons. One button increases the song's score by one point, and another button decreases the song's score by one point. Users are only able to vote once on a song. Songs that are upvoted are ranked in the playlist accordingly (See "Sequential Playlist" Description). The number of negatively ranked songs allowed in the playlist will be a function of the number of positively scored songs / 5. This means that if there are 5 songs in the playlist, only one negatively scored song will be allowed, anything more than that will automatically be removed from the playlist.
    * Actors: Members, Admins
    * Steps:
         - A song is added to the playlist.
         - The song is added to the bottom (but above the negative) portion of the playlist with a starting score of "0".
         - Users vote using buttons on either side of the displayed score.
         - See "Sequential Playlist" for continuation of steps.
           
#### 8. encore system
   * Desctiption:
      -Members listening to the song may want the opportunity to play that song over again, if this is the case, the member is allowed to press a button on the current song banner to re-add the currently playing song into the playlist. Once the button is pushed, the song will be re-added to the playlist with a score of "0". This allows users to vote on this song again and determine if the song is truly good enough for a replay. Once the song has been re-added to the playlist, the "encore" button loses functionality until the next song.
    * Actors: Members, Admins.
    
    * steps: 
         - A song is played from the playlist based off of its score (See "Sequential Playlist" Section.)
         - A button on the "Now Playing" banner will allow users to re-add the song to the playlist.
         - The button is pressed by the member/user and the song is added to the playlist with a score of "0".
         - Button loses functionality until the next song begins.

#### 9. listen to playlist - audio output
   * Description:
      -Audio output will be on a hosted "Main" computer, this client machine will be connected to a audio system such as a surround sound system. This "Main" client will play music by using the youtube URL's entered by the users in the playlist. After the video is finished playing, it automatically requests the next song in the playlist and begins playing it. If the users vote to skip the song the video is ended and the next song in the playlist is requested and played. Should the playlist run out, there will be no songs playing. Audio is adjusted on the physical hardware (stereo system volume knob)
   * Actors: Main computer connected to the stereo system.
   
   * Steps: 
         - Users determine what computer will be the main computer for the audio playback.
         - Users connect computer to audio system via a AUX cable.
         - Users log into the site with the main computer.
         - Computer handles playing youtube videos added to the playlist as they are ranked in the playlist.
         - Should users vote to skip a song, the song is skipped and the next song is played.

## Medium priority
#### 10. Create Playlist

#### 11. Delete Playlist

#### 12. History of recently played songs
   * ability to re-add songs
#### 13. User leader board

## Low priority
#### 14. import external playlists
   * youtube playlists
   * spotify playlists
#### 15. transfer playlist ownership
   * Description:
    - A Maistro can transfer the ownership of a playlist to a Groupie.  The Groupie will become the Maistro of that playlist, and the Maistro will become a Groupie.
   * Actors: Maistro
   * Steps: 
      - Users presses the "Transfer Playlist Ownership" button
      - User is asked for the username to give the playlist to
      - The playlist no longer appears in the users's playlist list, and it appears in the playlist list of the user it is transfered to
