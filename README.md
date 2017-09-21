# Fanfair

# Requirements
## High priority
- admin
    * add
    * remove
    * vote
- user
    * join
    * add
    * vote
- audience
    * join
- sql database
    * store playlists
    * store users
- add music
   Description:
      - Users who are designated as Miestro(Admin) or Groupie(User w/ Account) would have the ability to add music to the playlist.
        The user types in a song name and is given song choices to pick from. 
        The song picked by the user would be added to the playlist.
   Actors:
      - Maistros (Users with Admin Privledges), and Groupies (Users with normal priviledges)
   Steps:
      - User presses the "Add Song Button".
        Users type in a song name into the search bar.
        Song is searched on youtube and the user is given the first 5 video results to choose from.
        Once the user selects the proper video the video url is sent to the database. 
        The song is then added to the overall playlist, the song name comes from the Youtube Video title.
        The song is ranked at the median (0 position) of the playlist and it's position in the playlist shows Name and current vote             score.
- sequential playlist
    * priority queue
- voting system
    * up-vote
    * down-vote
    * remove songs from playlist
- encore system
    * only on current song
    * re-add song to the playlist
- audio output
- search engine
    * source from youtube
- user end GUI
- not allow duplicate songs
- login page
- create account page
- playlist page
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
