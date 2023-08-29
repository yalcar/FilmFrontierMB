-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 29, 2023 at 04:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(3) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`) VALUES
(1, 'Action'),
(8, 'Animation'),
(3, 'Comedy'),
(7, 'Documentary'),
(2, 'Drama'),
(11, 'Fantasy'),
(6, 'Horror'),
(10, 'Musical'),
(14, 'Musical Comedy'),
(4, 'Romance'),
(5, 'Science Fiction'),
(19, 'Simulation');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movieId` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `categoryId` int(3) NOT NULL,
  `description` varchar(800) NOT NULL,
  `director` varchar(50) NOT NULL,
  `cast` varchar(500) NOT NULL,
  `ranking` int(1) DEFAULT NULL,
  `releaseYear` int(4) NOT NULL,
  `movieImage` varchar(900) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to storage movies';

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movieId`, `title`, `categoryId`, `description`, `director`, `cast`, `ranking`, `releaseYear`, `movieImage`) VALUES
(1, 'The Godfather', 2, 'A powerful Mafia family in New York City fights to maintain its hold on the criminal underworld. Directed by Francis Ford Coppola.\r\n', 'Francis Ford Coppola', 'Marlon Brando, Al Pacino, James Caan, Robert Duvall. ', 9, 1972, 'TheGodfather.jpg'),
(2, 'Inception', 5, 'This science-fiction thriller follows a team of thieves who enter people\'s dreams to steal their secrets.', 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page, and Tom Hardy.', 0, 2010, 'inception.jpg'),
(3, 'The Shawshank', 2, 'A man is sentenced to life in prison for a crime he didn\'t commit and befriends a fellow inmate while trying to survive.', 'Frank Darabont', 'Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler.', 0, 1994, 'TheShawshankRedemption.jpg'),
(4, 'The Dark Knight', 1, 'Batman fights against his nemesis, the Joker, in a battle for the soul of Gotham City', ' Christopher Nolan', 'Cast: Christian Bale, Heath Ledger, Aaron Eckhart, Gary Oldman', 0, 2008, 'darknight.jpg'),
(5, 'Titanic', 2, 'A wealthy woman falls in love with a poor artist aboard the ill-fated ship on its maiden voyage. ', 'James Cameron', 'Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates.', 0, 1997, 'titanic.jpg'),
(6, 'Forrest Gump', 3, 'A simple man with a low IQ accomplishes great things and influences several historic events in the United States. ', ' Robert Zemeckis', 'Tom Hanks, Robin Wright, Gary Sinise, Sally Field', 0, 1995, 'ForrestGump.jpg'),
(7, 'The Social Network', 2, 'This biographical drama tells the story of the creation of Facebook by Mark Zuckerberg. ', 'David Fincher', 'Jesse Eisenberg, Andrew Garfield, and Justin Timberlake', 0, 2010, 'SocialNetwork.jpg'),
(8, 'The King\'s Speech', 7, 'historical drama tells the story of King George VI of Britain and his struggle to overcome his stammer.', 'Tom Hooper', 'Colin Firth, Geoffrey Rush, and Helena Bonham Carter.', 0, 2010, 'kingspeach.jpg'),
(9, 'Black Swan', 6, 'The psychological thriller follows a ballerina who becomes increasingly unhinged as she prepares for a big performance. ', 'Darren Aronofsky', 'Natalie Portman, Mila Kunis, and Vincent Cassel', 0, 2010, 'blackswan.jpg'),
(11, 'Gravity', 5, 'This science-fiction thriller follows two astronauts stranded in space after their shuttle is destroyed. ', 'Alfonso Cuaron', 'Sandra Bullock and George Clooney.', 0, 2013, 'Gravity_Poster.jpg'),
(12, 'Interstellar', 5, 'This science-fiction film follows a group of astronauts who travel through a wormhole in search of a new home for humanity. ', 'Christopher Nolan', 'Matthew McConaughey, Anne Hathaway, and Jessica Chastain.', 0, 2014, 'interstellar.jpg'),
(13, 'La La Land', 10, 'This romantic musical comedy-drama follows a struggling actress and a jazz musician as they pursue their dreams in Los Angeles.', 'Damien Chazelle', 'Emma Stone and Ryan Gosling', 0, 2016, 'lalalan.png'),
(74, 'Spider-Man: No Way Home', 1, 'With Spider-Man\'s identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man.', ' Jon Watts', ' Tom HollandZendayaBenedict Cumberbatch', NULL, 2022, 'Spider-Man- No Way Home .jpeg'),
(75, 'Gato', 6, 'A group of girls does wilderness therapy out at women\'s retreat Fort Wilderness. What they come to learn is a group of girls went missing in the same place a year prior, and that may have something to do with an evil entity known as Gato.\r\n\r\n', ' Curtis Everitt', 'Amelia BlueCourtney CuevasBrittni Edwards', 4, 2020, 'Gato-2020.jpeg'),
(76, 'Moto', 7, 'Moto The Movie is the first film to truly showcase the complete spectrum of dirt bike riding and racing. From Big Mountain Freeriding, Supercross, Off-road, Woods, Trials, European Extreme Enduro, FMX, and Motocross, MOTO is the ultimate off-road experience!', 'Taylor Congdon', ' Antonio CairoliTrey CanardSteve Haughelstine', NULL, 2009, 'moto-movie.jpeg'),
(77, 'amores perror', 2, 'A horrific car accident connects three stories, each involving characters dealing with loss, regret, and life\'s harsh realities, all in the name of love.', 'Alejandro G. Iñárritu', 'Emilio EchevarríaGael García BernalGoya Toledo', NULL, 2000, 'amoresperros.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewId` int(8) NOT NULL,
  `movieId` int(5) NOT NULL,
  `userId` int(4) DEFAULT NULL,
  `fullName` varchar(30) NOT NULL,
  `review` varchar(800) NOT NULL,
  `dateReview` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewId`, `movieId`, `userId`, `fullName`, `review`, `dateReview`) VALUES
(2, 2, 2, 'Smith', 'The film follows a team of skilled thieves, led by Dom Cobb (played by Leonardo DiCaprio), who enter people\'s dreams to steal their subconscious thoughts. Cobb is approached by a wealthy businessman who offers to clear his criminal record in exchange for an impossible task: to implant an idea into the mind of a rival businessman through the process of \"inception.\"\r\n\r\nThe film is a mind-bending exploration of dreams, reality, and the human mind. Nolan\'s direction is masterful, with stunning visual effects and a complex, multi-layered plot that keeps the audience engaged from start to finish. The cast is excellent, with standout performances from DiCaprio, Joseph Gordon-Levitt, and Tom Hardy.\r\n', '2023-04-21 11:05:38'),
(4, 13, 1, 'Smith', 'The film stars Emma Stone and Ryan Gosling as Mia and Sebastian, two struggling artists in Los Angeles who fall in love while pursuing their dreams. Set against a backdrop of music and dance, \"La La Land\" is a celebration of creativity, passion, and the bittersweet nature of life.\r\n\r\nChazelle\'s direction is masterful, with stunning cinematography, dazzling musical numbers, and a touching, heartfelt story that captures the essence of what it means to chase your dreams. Stone and Gosling have incredible chemistry, with both delivering standout performances that capture the joy and pain of artistic ambition.\r\n\r\nThe film\'s score, composed by Justin Hurwitz, is one of its standout features, with catchy, memorable songs that will stay with you long after the film has ended. ', '2023-04-21 11:05:58'),
(5, 9, 2, 'Smith', 'The film is a haunting exploration of the psychological toll of artistic ambition. Aronofsky\'s direction is masterful, with a dark and foreboding atmosphere that intensifies as the film progresses. The cinematography is striking, with a color palette that shifts from light and airy to dark and ominous, mirroring Nina\'s descent into madness. ', '2023-04-21 11:06:06'),
(24, 5, NULL, 'Rene', 'Final Comment', '2023-04-11 03:19:17'),
(55, 3, NULL, 'Anonymous', 'This movie is an absolute masterpiece. The acting is phenomenal, the plot is gripping, and the characters are so well-developed that you feel like you know them personally. The themes of hope, friendship, and redemption are woven throughout the story in such a powerful way that it&#039;s impossible not to be moved by it. This is one of those rare films that sticks with you long after the credits roll. I can&#039;t recommend it enough.', '2023-04-21 12:17:05'),
(57, 4, NULL, 'Conrad Brown', 'This is hands down one of the best superhero movies ever made. The performances by Heath Ledger, Christian Bale, and the rest of the cast are absolutely incredible. Ledger&#039;s Joker is terrifying and mesmerizing at the same time - he steals every scene he&#039;s in. The action scenes are intense and well-choreographed, and the story itself is both thought-provoking and emotionally powerful. Christopher Nolan did an amazing job directing this film, and it&#039;s clear that a lot of care and attention went into every aspect of it. Even if you&#039;re not a fan of superhero movies, I would highly recommend giving this one a chance.', '2023-04-21 12:19:06'),
(58, 5, NULL, 'Anonymous', 'This is a movie that truly has it all - romance, drama, action, and incredible special effects. Leonardo DiCaprio and Kate Winslet have amazing chemistry on screen, and their love story is both heartwarming and heartbreaking. The sinking of the Titanic is depicted in a way that is both realistic and terrifying, and the attention to detail is impressive. The music is also fantastic and perfectly captures the mood of the film. This is a timeless classic that I could watch over and over again.\r\n\r\n', '2023-04-21 12:20:05'),
(59, 5, NULL, 'Alejandro Perez', 'I was hesitant to watch this movie at first because I thought it was just a cheesy romance, but boy was I wrong. The story is much more than that - it&#039;s about class differences, societal expectations, and the struggles of living in a time when women didn&#039;t have many options. The attention to detail in the costumes and sets is impressive, and the special effects still hold up today. The ending is devastating, but it&#039;s a testament to the power of the film that it can still make me cry after all these years. This is a must-watch for anyone who appreciates great storytelling', '2023-04-21 12:20:38'),
(60, 13, NULL, 'Anonymous', 'The most amazing movie that I saw.', '2023-04-21 19:39:29'),
(62, 1, NULL, 'Brian', 'test 2', '2023-04-21 23:38:19'),
(63, 75, NULL, 'I like the end of this movie ', 'The final movement was amazing ', '2023-08-29 02:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(4) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `fullName`, `email`, `password`, `role`) VALUES
(1, 'yali', 'yali.carvajal@gmail.com', '123456', 'ADMIN'),
(2, 'Smith', 'laura@gmail.com', '123123', 'user'),
(9, 'alex2', 'alex@gmail.com', '123123123', 'user'),
(10, 'bobby smith', 'bob@mail.com', 'testtest', 'user'),
(11, 'admin', 'admin@gmail.com', '123123', 'ADMIN'),
(12, 'prueba2', 'prueba2@gmail.com', '123123123', 'user'),
(13, 'prueba3', 'prueba2@gmail.com', '123123123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `categoryIndex` (`name`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movieId`),
  ADD KEY `category_FK` (`categoryId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `user_FK` (`userId`),
  ADD KEY `movie_FK` (`movieId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movieId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `category_FK` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `movie_FK` FOREIGN KEY (`movieId`) REFERENCES `movie` (`movieId`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_FK` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
