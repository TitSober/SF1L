-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 21. jul 2022 ob 20.52
-- Različica strežnika: 10.4.22-MariaDB
-- Različica PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `f1_database`
--

-- --------------------------------------------------------

--
-- Struktura tabele `driver`
--

CREATE TABLE `driver` (
  `iddriver` int(11) NOT NULL,
  `ime` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `discord_username` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `platform` enum('PlayStation','Steam','Xbox') COLLATE utf8_slovenian_ci NOT NULL,
  `front_photo` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `left_profile_photo` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `right_profile_photo` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `winner_photo` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `LT_photo` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `game_tag` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `steam_friend_code` varchar(256) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `driver_status` enum('stalni','rezervni') COLLATE utf8_slovenian_ci NOT NULL,
  `assists` enum('gearbox','traction control','abs','racing line') COLLATE utf8_slovenian_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `equipment` text COLLATE utf8_slovenian_ci NOT NULL,
  `teams_idteams` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `pit_stops`
--

CREATE TABLE `pit_stops` (
  `idpit_stops` int(11) NOT NULL,
  `lap` int(11) NOT NULL,
  `tire` enum('S','M','H','I','W') COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `pit_stops_per_race_and_driver`
--

CREATE TABLE `pit_stops_per_race_and_driver` (
  `pit_stops_idpit_stops` int(11) DEFAULT NULL,
  `driver_iddriver` int(11) DEFAULT NULL,
  `races_idraces` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `qualification_race`
--

CREATE TABLE `qualification_race` (
  `idqualification_race` int(11) NOT NULL,
  `races_idraces` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `qualification_race_driver`
--

CREATE TABLE `qualification_race_driver` (
  `driver_iddriver` int(11) DEFAULT NULL,
  `qualification_race_idqualification_race` int(11) DEFAULT NULL,
  `race_time` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `tire` enum('S','M','H','I','W') COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `races`
--

CREATE TABLE `races` (
  `idraces` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `location` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `number_laps` int(6) NOT NULL,
  `track_photo` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `flag` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `season_idseason` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `race_driver`
--

CREATE TABLE `race_driver` (
  `driver_iddriver` int(11) DEFAULT NULL,
  `races_idraces` int(11) DEFAULT NULL,
  `race_time` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `fastest_lap` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `starting_position` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `starting_tire` enum('S','M','H','I','W') COLLATE utf8_slovenian_ci NOT NULL,
  `points` int(11) NOT NULL,
  `dnf` tinyint(1) NOT NULL,
  `dns` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `season`
--

CREATE TABLE `season` (
  `idseason` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `sponsors`
--

CREATE TABLE `sponsors` (
  `idsponsors` int(11) NOT NULL,
  `display_name` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `website` varchar(256) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `sponsors_per_season`
--

CREATE TABLE `sponsors_per_season` (
  `sponsors_idsponsors` int(11) DEFAULT NULL,
  `season_idseason` int(11) DEFAULT NULL,
  `amount_sponsored` varchar(256) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `sprint_race`
--

CREATE TABLE `sprint_race` (
  `idsprint_race` int(11) NOT NULL,
  `races_idraces` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `sprint_race_driver`
--

CREATE TABLE `sprint_race_driver` (
  `sprint_race_idsprint_race` int(11) DEFAULT NULL,
  `driver_iddriver` int(11) DEFAULT NULL,
  `race_time` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `fastest_lap` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `starting_position` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `starting_tire` enum('S','M','H','I','W') COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `teams`
--

CREATE TABLE `teams` (
  `idteams` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `logo` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `line` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `engine` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `primary_color` varchar(256) COLLATE utf8_slovenian_ci NOT NULL,
  `secondary_color` varchar(256) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `video_archive`
--

CREATE TABLE `video_archive` (
  `idvideo_archive` int(11) NOT NULL,
  `link` varchar(512) COLLATE utf8_slovenian_ci NOT NULL,
  `name` varchar(256) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`iddriver`),
  ADD KEY `driver_ibfk_1` (`teams_idteams`);

--
-- Indeksi tabele `pit_stops`
--
ALTER TABLE `pit_stops`
  ADD PRIMARY KEY (`idpit_stops`);

--
-- Indeksi tabele `pit_stops_per_race_and_driver`
--
ALTER TABLE `pit_stops_per_race_and_driver`
  ADD KEY `pit_stops_per_race_and_driver_ibfk_1` (`pit_stops_idpit_stops`),
  ADD KEY `pit_stops_per_race_and_driver_ibfk_2` (`driver_iddriver`),
  ADD KEY `pit_stops_per_race_and_driver_ibfk_3` (`races_idraces`);

--
-- Indeksi tabele `qualification_race`
--
ALTER TABLE `qualification_race`
  ADD PRIMARY KEY (`idqualification_race`),
  ADD KEY `qualification_race_ibfk_1` (`races_idraces`);

--
-- Indeksi tabele `qualification_race_driver`
--
ALTER TABLE `qualification_race_driver`
  ADD KEY `qualification_race_driver_ibfk_1` (`driver_iddriver`),
  ADD KEY `qualification_race_driver_ibfk_2` (`qualification_race_idqualification_race`);

--
-- Indeksi tabele `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`idraces`),
  ADD KEY `races_ibfk_1` (`season_idseason`);

--
-- Indeksi tabele `race_driver`
--
ALTER TABLE `race_driver`
  ADD KEY `race_driver_ibfk_1` (`driver_iddriver`),
  ADD KEY `race_driver_ibfk_2` (`races_idraces`);

--
-- Indeksi tabele `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`idseason`);

--
-- Indeksi tabele `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`idsponsors`);

--
-- Indeksi tabele `sponsors_per_season`
--
ALTER TABLE `sponsors_per_season`
  ADD KEY `sponsors_per_season_ibfk_1` (`sponsors_idsponsors`),
  ADD KEY `sponsors_per_season_ibfk_2` (`season_idseason`);

--
-- Indeksi tabele `sprint_race`
--
ALTER TABLE `sprint_race`
  ADD PRIMARY KEY (`idsprint_race`),
  ADD KEY `sprint_race_ibfk_1` (`races_idraces`);

--
-- Indeksi tabele `sprint_race_driver`
--
ALTER TABLE `sprint_race_driver`
  ADD KEY `sprint_race_driver_ibfk_1` (`sprint_race_idsprint_race`),
  ADD KEY `sprint_race_driver_ibfk_2` (`driver_iddriver`);

--
-- Indeksi tabele `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`idteams`);

--
-- Indeksi tabele `video_archive`
--
ALTER TABLE `video_archive`
  ADD PRIMARY KEY (`idvideo_archive`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `driver`
--
ALTER TABLE `driver`
  MODIFY `iddriver` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `pit_stops`
--
ALTER TABLE `pit_stops`
  MODIFY `idpit_stops` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `qualification_race`
--
ALTER TABLE `qualification_race`
  MODIFY `idqualification_race` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `races`
--
ALTER TABLE `races`
  MODIFY `idraces` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `season`
--
ALTER TABLE `season`
  MODIFY `idseason` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `idsponsors` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `sprint_race`
--
ALTER TABLE `sprint_race`
  MODIFY `idsprint_race` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `teams`
--
ALTER TABLE `teams`
  MODIFY `idteams` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `video_archive`
--
ALTER TABLE `video_archive`
  MODIFY `idvideo_archive` int(11) NOT NULL AUTO_INCREMENT;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`teams_idteams`) REFERENCES `teams` (`idteams`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `pit_stops_per_race_and_driver`
--
ALTER TABLE `pit_stops_per_race_and_driver`
  ADD CONSTRAINT `pit_stops_per_race_and_driver_ibfk_1` FOREIGN KEY (`pit_stops_idpit_stops`) REFERENCES `pit_stops` (`idpit_stops`) ON DELETE CASCADE,
  ADD CONSTRAINT `pit_stops_per_race_and_driver_ibfk_2` FOREIGN KEY (`driver_iddriver`) REFERENCES `driver` (`iddriver`) ON DELETE CASCADE,
  ADD CONSTRAINT `pit_stops_per_race_and_driver_ibfk_3` FOREIGN KEY (`races_idraces`) REFERENCES `races` (`idraces`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `qualification_race`
--
ALTER TABLE `qualification_race`
  ADD CONSTRAINT `qualification_race_ibfk_1` FOREIGN KEY (`races_idraces`) REFERENCES `races` (`idraces`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `qualification_race_driver`
--
ALTER TABLE `qualification_race_driver`
  ADD CONSTRAINT `qualification_race_driver_ibfk_1` FOREIGN KEY (`driver_iddriver`) REFERENCES `driver` (`iddriver`) ON DELETE CASCADE,
  ADD CONSTRAINT `qualification_race_driver_ibfk_2` FOREIGN KEY (`qualification_race_idqualification_race`) REFERENCES `qualification_race` (`idqualification_race`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `races`
--
ALTER TABLE `races`
  ADD CONSTRAINT `races_ibfk_1` FOREIGN KEY (`season_idseason`) REFERENCES `season` (`idseason`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `race_driver`
--
ALTER TABLE `race_driver`
  ADD CONSTRAINT `race_driver_ibfk_1` FOREIGN KEY (`driver_iddriver`) REFERENCES `driver` (`iddriver`) ON DELETE CASCADE,
  ADD CONSTRAINT `race_driver_ibfk_2` FOREIGN KEY (`races_idraces`) REFERENCES `races` (`idraces`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `sponsors_per_season`
--
ALTER TABLE `sponsors_per_season`
  ADD CONSTRAINT `sponsors_per_season_ibfk_1` FOREIGN KEY (`sponsors_idsponsors`) REFERENCES `sponsors` (`idsponsors`) ON DELETE CASCADE,
  ADD CONSTRAINT `sponsors_per_season_ibfk_2` FOREIGN KEY (`season_idseason`) REFERENCES `season` (`idseason`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `sprint_race`
--
ALTER TABLE `sprint_race`
  ADD CONSTRAINT `sprint_race_ibfk_1` FOREIGN KEY (`races_idraces`) REFERENCES `races` (`idraces`) ON DELETE CASCADE;

--
-- Omejitve za tabelo `sprint_race_driver`
--
ALTER TABLE `sprint_race_driver`
  ADD CONSTRAINT `sprint_race_driver_ibfk_1` FOREIGN KEY (`sprint_race_idsprint_race`) REFERENCES `sprint_race` (`idsprint_race`) ON DELETE CASCADE,
  ADD CONSTRAINT `sprint_race_driver_ibfk_2` FOREIGN KEY (`driver_iddriver`) REFERENCES `driver` (`iddriver`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
