SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `localstorage` (
`id` int(11) NOT NULL,
  `key` varchar(500) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

ALTER TABLE `localstorage`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `localstorage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;