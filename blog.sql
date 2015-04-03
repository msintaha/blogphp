-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2015 at 11:59 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

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
(30, 12, 'Looks so yummy! :D', 'Naruto', '2015-03-31 21:35:52'),
(31, 12, 'Stop drooling Naruto "-_-', 'Sasuke', '2015-03-31 21:36:23'),
(32, 15, 'Nice recipe! Thanks for sharing.', 'Joan', '2015-04-03 14:58:41'),
(35, 16, 'IKR!', 'Tony', '2015-04-03 15:29:49'),
(36, 10, 'Can''t wait to try this out today! :D', 'Cara', '2015-04-03 15:56:22');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `title`, `contents`, `date_posted`, `img`) VALUES
(11, 3, 'Flourless Meyer Lemon Almond Loaf Cake Recipe', 'Ingredients:\r\n\r\n2 EGGS\r\nZEST FROM 2 MEYER LEMONS\r\n2 TABLESPOONS + 2 TEASPOONS SUGAR\r\n3/4 CUP ALMOND FLOUR/GROUND ALMONDS\r\n1/2 TEASPOON BAKING POWDER\r\n1/8 TSP CARDAMOM\r\nPINCH OF SALT\r\nTHYME SPRIGS, LEMON SLICES AND POWDERED SUGAR, TO SERVE\r\n\r\nDirections:\r\n\r\nPreheat your oven to 350Â°F. Lightly butter or grease your loaf pan (I used a small loaf pan, similar to these).\r\nSeparate your eggs carefully: yolks into a medium-sized bowl and whites going into a large absolutely grease-free bowl. You need to make sure the bowl of whites have absolutely no fat â€“ this will help them whip up nice and fluffy. Lightly beat the yolks and add the zest and 2 tablespoons of sugar. Mix until smooth. Add the ground almonds, baking powder, and cardamom. Mix until smooth.\r\n\r\nWith an electric mixer, or good old fashioned elbow grease, whip up the egg whites until they start foaming. Sprinkle on a pinch of salt, which will help the structure of the whites. As they start increasing in volume, sprinkle on the remaining 2 teaspoons of sugar into the eggs as you beat until soft to medium peaks form.\r\n\r\nFold a small amount of the whites into the yolk mixture being sure not to over mix. Gradually fold in all the whites, a bit at a time, being sure not to deflate. You should have a light and fluffy batter. Pour the batter into your prepared pan and bake for 25-30 minutes. Remove from the oven and cool. Lightly dust with icing sugar and enjoy with thinly sliced lemons and thyme sprigs.', '2015-03-26 16:19:31', 'http://s.iamafoodblog.com/wp-content/uploads/2014/12/lemon-almond-loaf-4.jpg'),
(12, 4, 'Frico Eggs: Crispy Fried Cheesy Eggs', 'Ingredients:\r\n\r\n2 TABLESPOONS SHREDDED CHEESE, EITHER CHEDDAR, PARMESAN, OR MANCHEGO\r\nEGG\r\nSALT AND PEPPER\r\nON THE SIDE: SLICED AVOCADO, GREENS, ETC\r\n\r\nDirections:\r\n\r\nHeat up a heavy-bottomed, non-stick pan over medium heat. Sprinkle the shredded cheese in the centre of the pan, in circular shape. You want a thin, even layer. Once the cheese melts a bit, crack an egg on top, cover with a lid and cook to your desired doneness. I find it helpful to use a glass lid. Remove from the heat, let sit for a minute for the cheese to crisp up and then loosen by sliding a silicone spatula underneath. Plate, season with salt and pepper and enjoy hot!\r\n\r\nFeel free to toast up some soldiers to dip into your runny yolk. I kept it carb-free and had mine with some avocado.', '2015-03-26 17:04:12', 'http://s.iamafoodblog.com/wp-content/uploads/2015/02/crispy-cheesy-egg-recipe-6.jpg'),
(13, 4, 'Cheesy, Saucy, Crunchy Handheld Two-Bite Mini Lasagna Cups', 'Ingredients:\r\n\r\noil to grease muffin tins\r\n1 cup ricotta cheese\r\n12-16 fresh wonton wrappers\r\n1-2 cups of your favourite tomato based pasta sauce (I used some leftover bolognese sauce)\r\n1 cup shredded mozzarella\r\nfresh basil leaves\r\n\r\nDirections:\r\n\r\nPreheat the oven to 375Â°F. Lightly oil 6-8 wells of a mini muffin tin.\r\n\r\nPress a wonton wrapper into the bottom of the muffin tin making sure to push the wrapper down and up the sides. Top with a small spoonful of ricotta, a spoonful of sauce, a bit of mozzarella, and a fresh basil leaf. Repeat with another layer.\r\n\r\nBake until cheese is melty, golden brown and delicious, about 12 minutes. Let cool slight, remove from the tins, top with fresh basil and enjoy!\r\n\r\nNote: I could only get two layers into my mini tins, but if you can fit more layers in, go for it!', '2015-03-26 17:05:42', 'http://s.iamafoodblog.com/wp-content/uploads/2015/02/wonton-lasagna-cups-recipe-7.jpg'),
(16, 6, 'Raspberry Mint Julep Recipe', 'makes 1 julep\r\n\r\nIngredients:\r\n\r\n1 OUNCE RASPBERRY SIMPLE SYRUP\r\n2 CUPS CRUSHED ICE, DIVIDED\r\n2 OUNCES BOURBON\r\nFRESH MINT AND RASPBERRIES TO GARNISH\r\nIn a metal cup, add 1/2 an ounce of simple syrup. Place 4-5 mint leaves into the cup and muddle gently. Add 1/2 of the crushed ice and pour on the bourbon. Top with the remaining simple syrup and ice. Idealy, you should heap on the ice so it looks sort of like a snow cone. Garnish with mint and raspberries and enjoy immediately.\r\n\r\nRaspberry Simple Syrup Recipe\r\n\r\nmakes about 3/4 cups syrup\r\n\r\n1/2 CUP SUGAR\r\n1/2 CUP WATER\r\n1/2 CUP RASPBERRIES\r\n\r\nDirections:\r\n\r\nIn a small saucepan, bring the sugar, water and raspberries up to a boil over medium heat. Stir until sugar is dissolved, raspberries are muddled and syrup is bright pink. Strain out the raspberry bits, pressing down on them to release as much juice as possible. Chill before using.', '2015-03-26 17:16:12', 'http://s.iamafoodblog.com/wp-content/uploads/2014/07/raspberry-mint-julep-4.jpg'),
(15, 6, 'Bourbon Peach Julep Fizz Recipe', 'Ingredients:\r\n\r\nPEACH SIMPLE SYRUP\r\n\r\n1/2 CUP SUGAR\r\n1/2 CUP WATER\r\n1 PEACH, SLICED\r\nJULEP FIZZ\r\n\r\n1 SHOT OF YOUR FAVOURITE BOURBON\r\n1 TABLESPOON PEACH SIMPLE SYRUP\r\nTONIC\r\nPEACH SLICES\r\nMINT\r\n\r\nDirections:\r\n\r\nIn a small sauce pan, combine the sugar, water and peach slices. Bring to a boil and then reduce heat and simmer gently until sugar is dissolved and syrup has thickened slightly. Remove from heat, spoon out the peaches (you can eat them as a snack), and cool.\r\n\r\nIn a low ball glass, over some ice cubes, pour a shot of bourbon, add a tablespoon of peach syrup, some peach slices and mint. Top with tonic water, stir and enjoy!', '2015-03-26 17:11:18', 'http://s.iamafoodblog.com/wp-content/uploads/2013/08/peachjulep-5.jpg'),
(10, 4, 'Grilled Cheese Pizza Recipe', 'Ingredients:\r\n1 (14 ounce) package prebaked pizza crust (such as BoboliÂ®)\r\n 1 cup diced cooked chicken breast\r\n 3 tablespoons Buffalo wing sauce\r\n 1/2 cup Buffalo wing sauce\r\n1 (4 ounce) package crumbled blue cheese\r\n 1 stalk celery, thinly sliced\r\n 1 cup shredded mozzarella cheese\r\n\r\nDirections:\r\n\r\n-Preheat oven to 475 degrees F (245 degrees C). Line a baking sheet with aluminum foil.\r\n-Place pizza crust on the prepared baking sheet.\r\n-Mix chicken and 3 tablespoons wing sauce together in a bowl until evenly coated.\r\n-Spread 1/2 cup wing sauce on the pizza crust; top with blue cheese, chicken mixture, and celery. Cover pizza with mozzarella cheese.\r\n-Bake in the preheated oven until pizza is cooked through and cheese is bubbling, about 12 minutes. Cool pizza about 5 minutes before cutting into squares.', '2015-03-25 22:50:44', 'http://4.bp.blogspot.com/-3DiMSK1ZvGg/UHjMIt1YitI/AAAAAAAAAJY/2Vc_4bvCrwQ/s1600/Date+Pizza+copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` int(4) NOT NULL,
  `rating` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(19, 10, 5),
(20, 15, 5),
(21, 15, 5),
(22, 12, 3),
(23, 12, 3),
(24, 15, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
