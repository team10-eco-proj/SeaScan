SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('google','facebook','twitter','linkedin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'google',
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

DROP TABLE IF EXISTS `water_data`;
CREATE TABLE `water_data` (
  `data_pk` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  `salinity` decimal(10,0) NOT NULL,
  `grid_lat` varchar(20) NOT NULL,
  `grid_long` varchar(20) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `water_data`
  ADD PRIMARY KEY (`data_pk`);

ALTER TABLE `water_data`
  MODIFY `data_pk` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
