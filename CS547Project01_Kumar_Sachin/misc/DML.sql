INSERT INTO `games` (`id`, `title`, `description`, `genre`, `artist`, `cost`, `release_date`, `rating`, `created_date`, `updated_date`) VALUES (NULL, 'sac_title', 'sac_description', 'genre-4', 'artist-5', '6', '2018-10-31 00:00:00', '8', '2018-10-12 00:00:00', '2018-10-12 00:00:00')

UPDATE games SET title = 'abc' WHERE id = 22;
UPDATE `games` SET `title` = 'sac_title1', `description` = 'sac_description1', `genre` = 'genre-41' WHERE `games`.`id` = 10000