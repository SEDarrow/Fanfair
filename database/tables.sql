CREATE TABLE `user` (
  `username` varchar(128),
  `password` varchar(128),
  `score` int(11),
  PRIMARY KEY (`username`)
);

CREATE TABLE `playlist` (
  `pid` varchar(16),
  `username` varchar(128),
  PRIMARY KEY (`pid`,`username`),
  FOREIGN KEY (`username`) REFERENCES `user` (`username`)
);

CREATE TABLE `songInfo` (
  `url` varchar(128),
  `title` varchar(128),
  PRIMARY KEY (`url`)
);

CREATE TABLE `song` (
  `url` varchar(128),
  `pid` varchar(16),
  `upvotes` int(11),
  `downvotes` int(11),
  PRIMARY KEY (`url, pid`)
  FOREIGN KEY (`pid`) REFERENCES `playlist` (`pid`)
  FOREIGN KEY (`url`) REFERENCES `songInfo` (`url`)
);
