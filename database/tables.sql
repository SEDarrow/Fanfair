CREATE TABLE `user` (
  `username` varchar(128),
  `password` varchar(128),
  `score` int,
  PRIMARY KEY (`username`)
);

CREATE TABLE `playlist` (
  `pid` varchar(16),
  `add` boolean,
  `username` varchar(128),
  PRIMARY KEY (`pid`),
  FOREIGN KEY (`username`) REFERENCES `user` (`username`)
);

CREATE TABLE `song` (
  `url` varchar(128),
  `sid` varchar(16),
  `title` varchar(256),
  PRIMARY KEY (`sid`)
);

CREATE TABLE `playist_contains_song` (
  `pid` varchar(16),
  `sid` varchar(16),
  `upvote` int,
  `downvote` int,
  `encore` int,
  PRIMARY KEY (`pid`,`sid`),
  FOREIGN KEY (`pid`) REFERENCES `playlist` (`pid`),
  FOREIGN KEY (`sid`) REFERENCES `song` (`sid`)
);

CREATE TABLE `vote` (
  `username` varchar(128),
  `pid` varchar(16),
  `sid` varchar(16),
  PRIMARY KEY (`pid`,`username`, `sid`),
  FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  FOREIGN KEY (`pid`) REFERENCES `playlist` (`pid`),
  FOREIGN KEY (`sid`) REFERENCES `song` (`sid`)
);