-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2015 at 11:50 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Desserts'),
(6, 'Drinks'),
(4, 'Savoury');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(4) NOT NULL AUTO_INCREMENT,
  `post_id` int(5) NOT NULL,
  `comment_body` varchar(300) NOT NULL,
  `comment_user` varchar(30) NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `comment_body`, `comment_user`, `comment_date`) VALUES
(1, 2, 'hello this is a comment', 'Mifta', '2015-03-21 12:33:00'),
(2, 2, 'please work', 'Rakin', '2015-03-22 07:37:26'),
(5, 2, 'Awesome!', 'Pookie', '2015-03-21 14:03:41'),
(15, 6, 'Wazzaaa??', 'Barney', '2015-03-21 20:51:57'),
(16, 6, 'woah barney thanks man!', 'mifta', '2015-03-21 21:06:31'),
(19, 2, 'Yumm!', 'Cookie', '2015-03-21 21:08:37'),
(20, 2, 'Yumm!', 'Cookie', '2015-03-21 21:08:53'),
(22, 6, 'pako', 'lako', '2015-03-21 21:20:36'),
(24, 6, 'is freakin'' amazing!', 'Interstellar', '2015-03-21 22:59:59'),
(25, 6, 'blah blah', 'Mifta', '2015-03-22 10:25:31'),
(26, 7, 'sdkjfdkf', 'mifta', '2015-03-22 11:00:42'),
(27, 8, 'sdkfhsdkjfhdskj', 'sdfkdj', '2015-03-22 11:05:41'),
(28, 10, 'That''s a really good recipe!', 'Mifta', '2015-03-26 01:13:04'),
(29, 10, 'I know right?', 'Cara', '2015-03-26 16:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'msintaha94@gmail.com', 'nothing1234');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `cat_id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `title`, `contents`, `date_posted`, `img`) VALUES
(11, 3, 'Flourless Meyer Lemon Almond Loaf Cake Recipe', 'Ingredients:\r\n\r\n2 EGGS\r\nZEST FROM 2 MEYER LEMONS\r\n2 TABLESPOONS + 2 TEASPOONS SUGAR\r\n3/4 CUP ALMOND FLOUR/GROUND ALMONDS\r\n1/2 TEASPOON BAKING POWDER\r\n1/8 TSP CARDAMOM\r\nPINCH OF SALT\r\nTHYME SPRIGS, LEMON SLICES AND POWDERED SUGAR, TO SERVE\r\n\r\nDirections:\r\n\r\nPreheat your oven to 350Â°F. Lightly butter or grease your loaf pan (I used a small loaf pan, similar to these).\r\nSeparate your eggs carefully: yolks into a medium-sized bowl and whites going into a large absolutely grease-free bowl. You need to make sure the bowl of whites have absolutely no fat â€“ this will help them whip up nice and fluffy. Lightly beat the yolks and add the zest and 2 tablespoons of sugar. Mix until smooth. Add the ground almonds, baking powder, and cardamom. Mix until smooth.\r\n\r\nWith an electric mixer, or good old fashioned elbow grease, whip up the egg whites until they start foaming. Sprinkle on a pinch of salt, which will help the structure of the whites. As they start increasing in volume, sprinkle on the remaining 2 teaspoons of sugar into the eggs as you beat until soft to medium peaks form.\r\n\r\nFold a small amount of the whites into the yolk mixture being sure not to over mix. Gradually fold in all the whites, a bit at a time, being sure not to deflate. You should have a light and fluffy batter. Pour the batter into your prepared pan and bake for 25-30 minutes. Remove from the oven and cool. Lightly dust with icing sugar and enjoy with thinly sliced lemons and thyme sprigs.', '2015-03-26 16:19:31', 'http://s.iamafoodblog.com/wp-content/uploads/2014/12/lemon-almond-loaf-4.jpg'),
(10, 4, 'Yummy Pizza', 'Ingredients:\r\n1 (14 ounce) package prebaked pizza crust (such as BoboliÂ®)\r\n 1 cup diced cooked chicken breast\r\n 3 tablespoons Buffalo wing sauce\r\n 1/2 cup Buffalo wing sauce\r\n1 (4 ounce) package crumbled blue cheese\r\n 1 stalk celery, thinly sliced\r\n 1 cup shredded mozzarella cheese\r\n\r\nDirections:\r\n\r\n-Preheat oven to 475 degrees F (245 degrees C). Line a baking sheet with aluminum foil.\r\n-Place pizza crust on the prepared baking sheet.\r\n-Mix chicken and 3 tablespoons wing sauce together in a bowl until evenly coated.\r\n-Spread 1/2 cup wing sauce on the pizza crust; top with blue cheese, chicken mixture, and celery. Cover pizza with mozzarella cheese.\r\n-Bake in the preheated oven until pizza is cooked through and cheese is bubbling, about 12 minutes. Cool pizza about 5 minutes before cutting into squares.', '2015-03-25 22:50:44', 'http://4.bp.blogspot.com/-3DiMSK1ZvGg/UHjMIt1YitI/AAAAAAAAAJY/2Vc_4bvCrwQ/s1600/Date+Pizza+copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` int(4) NOT NULL,
  `rating` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `article`, `rating`) VALUES
(5, 3, 2),
(6, 3, 5),
(7, 10, 4),
(8, 10, 5),
(9, 10, 2),
(10, 10, 1),
(11, 10, 1),
(12, 10, 1),
(13, 3, 4),
(14, 3, 5),
(15, 3, 5),
(16, 11, 4),
(17, 11, 4),
(18, 11, 4),
(19, 10, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
