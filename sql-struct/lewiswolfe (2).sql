-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 feb 2020 om 16:04
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lewiswolfe`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `text` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `about`
--

INSERT INTO `about` (`id`, `text`) VALUES
(1, '<p>&nbsp;</p>\r\n<p>There comes a time in your life when you will hear your calling. You\'ll either listen, or you won\'t. Lewis Wolfe heard his years ago and found himself unable to resist it. He had to write stories. Short ones and long ones. They were all just practice for his first novel, A Monster Escapes.</p>\r\n<p>Lewis Wolfe believes that characters shape the story, never the other way around. Suspense and horror, then, are a natural extension of how people decide to lead their lives, be they real or imagined.</p>\r\n<p>Consider following Lewis Wolfe on his journey as a storyteller. He would be honored.</p>');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'Lewis Wolfe',
  `image` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `release_date` date NOT NULL,
  `genre` int(11) NOT NULL,
  `subgenre` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `asin` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL DEFAULT 'English',
  `pagecount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `books`
--

INSERT INTO `books` (`id`, `author`, `image`, `title`, `release_date`, `genre`, `subgenre`, `description`, `asin`, `language`, `pagecount`) VALUES
(6, 'Lewis Wolfe', 'newbook.jpg', 'Test bericht', '2020-02-14', 2, 1, 'fijne kerst', 'asdasd', 'English', 1),
(7, 'Lewis Wolfe', 'newbook.jpg', 'Dit is een boek', '2020-02-14', 2, 3, 'weer die dag', 'haha', 'English', 1),
(15, 'Lewis Wolfe', 'newbook.jpg', 'nieuw boek erbij', '2020-02-04', 1, 1, 'geef me een boek', 'haha', 'English', 18),
(16, 'Lewis Wolfe', 'newbook.jpg', 'google.com', '2020-02-28', 3, 1, 'toegevoegd', 'aaaa', 'English', 21),
(17, 'Lewis Wolfe', 'newbook.jpg', 'Test bericht', '2020-02-06', 1, 2, 'sdgfdgdf', 'edfgdf', 'English', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'horror'),
(2, 'thriller'),
(3, 'comedy');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `menu`
--

INSERT INTO `menu` (`id`, `item`, `type`, `slug`) VALUES
(3, 'room', 1, 'room'),
(4, 'rome', 1, 'rome');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int(11) NOT NULL,
  `menu_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `menu_type`
--

INSERT INTO `menu_type` (`id`, `menu_type`) VALUES
(1, 'a');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'LewisWolfe', '$2a$07$55SyUgmIGsEovoidt2Z9xeQ1QixEgrjYnc70V3zV4kXFpD8vd9Vme');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre link` (`genre`),
  ADD KEY `subgenre link` (`subgenre`);

--
-- Indexen voor tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexen voor tabel `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `genre link` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `subgenre link` FOREIGN KEY (`subgenre`) REFERENCES `genres` (`id`);

--
-- Beperkingen voor tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`type`) REFERENCES `menu_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
