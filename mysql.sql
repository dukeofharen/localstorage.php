CREATE TABLE IF NOT EXISTS `localstorage` (
`id` int(11) NOT NULL,
  `key` varchar(500) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `localstorage`
 ADD PRIMARY KEY (`id`);