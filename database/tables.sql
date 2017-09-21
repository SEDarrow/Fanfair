CREATE TABLE `playlist` (
  `pid` varchar(16),
  PRIMARY KEY (`pid`)
);

CREATE TABLE `song` (
  `url` varchar(128),
  `pid` varchar(16),
  `score` int(11),
  PRIMARY KEY (`url`)
);

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(128),
  `password` varchar(128),
  `score` int(11),
  PRIMARY KEY (`username`)
);

CREATE TABLE `contains` (
  `pid` varchar(16),
  `url` varchar(128),
  PRIMARY KEY (`pid`,`url`),
  FOREIGN KEY (`pid`) REFERENCES `playlist` (`pid`),
  FOREIGN KEY (`url`) REFERENCES `song` (`url`)
);

CREATE TABLE `owns` (
  `username` varchar(128),
  `pid` varchar(16),
  PRIMARY KEY (`pid`,`username`),
  FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  FOREIGN KEY (`pid`) REFERENCES `playlist` (`pid`)
);
