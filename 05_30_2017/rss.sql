SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `rss_details` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `description` mediumtext CHARACTER SET utf8 NOT NULL,
  `link` text CHARACTER SET utf8,
  `language` text CHARACTER SET utf8,
  `image_title` text CHARACTER SET utf8,
  `image_url` text CHARACTER SET utf8,
  `image_link` text CHARACTER SET utf8,
  `image_width` text CHARACTER SET utf8,
  `image_height` text CHARACTER SET utf8
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `rss_details` (`id`, `title`, `description`, `link`, `language`, `image_title`, `image_url`, `image_link`, `image_width`, `image_height`) VALUES
(1, 'Przykładowy kanał RSS - WIT - zajęcia 13', 'Ten kanał demonstruje użycie technologii RSS w połączeniu z PHP (dynamiczne generowanie dokumentu XML zgodnego z formatem RSS).', 'http://localhost/rss', 'pl-PL', 'wit.edu.pl', 'wit.jpg', 'http://www.wit.edu.pl', '271', '154');

CREATE TABLE `rss_items` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `description` mediumtext CHARACTER SET utf8 NOT NULL,
  `link` text CHARACTER SET utf8
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `rss_items` (`id`, `title`, `description`, `link`) VALUES
(1, 'Portal gazeta.pl', 'Bardzo ciekawy portal informacyjny gazeta.pl', 'http://www.gazeta.pl'),
(2, 'Portal onet.pl', 'Bardzo ciekawy portal informacyjny onet.pl', 'http://www.onet.pl'),
(3, 'Portal wp.pl', 'Bardzo ciekawy portal informacyjny wp.pl', 'http://www.wp.pl');


ALTER TABLE `rss_details`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `rss_items`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `rss_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `rss_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
