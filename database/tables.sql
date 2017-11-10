CREATE TABLE `user` (
  `username` varchar(128),
  `password` varchar(128),
  `score` int,
  `admin` bool,
  PRIMARY KEY (`username`)
);

CREATE TABLE `playlist` (
  `pid` int(16) AUTO_INCREMENT,
  `add` boolean,
  `username` varchar(128),
  `playlist_name` varchar(128),
  PRIMARY KEY (`pid`),
  FOREIGN KEY (`username`) REFERENCES `user` (`username`)
);

CREATE TABLE `song` (
  `url` varchar(128),
  `sid` int(16) AUTO_INCREMENT,
  `title` varchar(256),
  PRIMARY KEY (`sid`)
);

CREATE TABLE `playlist_contains_song` (
  `pid` int(16),
  `sid` int(16),
  `upvote` int,
  `downvote` int,
  `encore` int,
  PRIMARY KEY (`pid`,`sid`),
  FOREIGN KEY (`pid`) REFERENCES `playlist` (`pid`),
  FOREIGN KEY (`sid`) REFERENCES `song` (`sid`)
);

CREATE TABLE `vote` (
  `username` varchar(128),
  `pid` int(16),
  `sid` int(16),
  PRIMARY KEY (`pid`,`username`, `sid`),
  FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  FOREIGN KEY (`pid`) REFERENCES `playlist` (`pid`),
  FOREIGN KEY (`sid`) REFERENCES `song` (`sid`)
);
