-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Már 12. 12:26
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `elso`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kutya`
--

CREATE TABLE `kutya` (
  `SORSZAM` int(11) NOT NULL,
  `NEV` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `NEME` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `SZUL_DATUM` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `BEKER_DATUM` date NOT NULL,
  `MERET` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `SZORHOSSZ` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `KOR` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `JELLEMZES` text COLLATE utf8_hungarian_ci NOT NULL,
  `KEP` text COLLATE utf8_hungarian_ci NOT NULL,
  `STATUSZ` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `USERNAME` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kutya`
--

INSERT INTO `kutya` (`SORSZAM`, `NEV`, `NEME`, `SZUL_DATUM`, `BEKER_DATUM`, `MERET`, `SZORHOSSZ`, `KOR`, `JELLEMZES`, `KEP`, `STATUSZ`, `USERNAME`) VALUES
(2, 'Bubu', 'ivaros kan', '2000-01-01', '2001-01-01', 'kicsi (5-15 kg)', 'rövid', 'kölyök', 'jó', 'foto', 'gazdikereső', 'nabe'),
(3, 'Simi', 'ivaros szuka', '2000-01-01', '2001-01-01', 'nagy (>30kg)', 'rövid', 'fiatal', 'jó', 'foto', 'gazdikereső', 'kibe'),
(4, 'Fitos', 'ivartalanított szuka', '2000-01-01', '2001-01-01', 'közepes (15-30kg)', 'rövid', 'fiatal', 'jó', 'foto', 'gazdikereső', 'kibe'),
(5, 'Folti', 'ivartalanított kan', '2000-01-01', '2001-01-01', 'közepes (15-30kg)', 'hosszú', 'fiatal', 'jó', 'foto', 'gazdikereső', 'nabe'),
(7, 'Kutyikó', 'ivartalanított szuka', '2000-01-01', '2001-01-01', 'közepes (15-30kg)', 'rövid', 'kölyök', 'jó', 'foto', 'gazdikereső', 'lader'),
(8, 'Kira', 'ivartalanított szuka', '2020.', '0000-00-00', 'közepes 	(15-30kg)', 'közepes', 'fiatal', 'jó kutya', 'pictureBox1', 'gazdikereső', 'nabe'),
(9, 'Cézár', 'ivaros kan', '2019.', '0000-00-00', 'nagy	 (>30kg)', 'rövid', 'felnőtt ', 'jól nevelt', 'pictureBox1', 'gazdikereső', 'nabe'),
(11, 'Samu', 'ivaros kan', '2022', '0000-00-00', 'közepes 	(15-30kg)', 'rövid', 'kölyök', 'aranyos', '', 'gazdikereső', 'kibe'),
(12, 'Fáni', 'ivaros szuka', '2019', '0000-00-00', 'kicsi 	(<15 kg)', 'közepes', 'fiatal', 'cuki', 'pictureBox1', 'gazdikereső', 'kibe'),
(13, 'Curti', 'ivaros szuka', '2011', '0000-00-00', 'közepes 	(15-30kg)', 'közepes', 'fiatal', 'cukika', 'pictureBox1', 'gazdikereső', 'nabe'),
(15, 'Lina', 'ivaros kan', '2000', '0000-00-00', 'kicsi 	(<15 kg)', 'rövid', 'kölyök', '', '', 'gazdikereső', 'nabe'),
(16, 'Dagi', 'ivaros kan', '2020', '0000-00-00', 'közepes 	(15-30kg)', 'rövid', 'kölyök', '', 'pictureBox1', 'gazdikereső', 'edi'),
(17, 'Sib', 'ivaros szuka', '2020', '2022-01-05', 'közepes 	(15-30kg)', 'közepes', 'fiatal', '', 'pictureBox1', 'gazdikereső', 'nabe'),
(18, 'Kicsike', 'ivaros szuka', '2021', '2022-02-26', 'közepes 	(15-30kg)', 'közepes', 'kölyök', '', 'pictureBox1', 'gazdikereső', 'kibe'),
(19, 'Simi', 'ivartalanított kan', '2021', '2022-02-15', 'közepes 	(15-30kg)', 'közepes', 'fiatal', '', 'pictureBox1', 'gazdikereső', 'lader'),
(20, 'Bert', 'ivartalanított kan', '2015', '2021-12-07', 'nagy	 (>30kg)', 'hosszú', 'felnőtt ', '', '', 'gazdikereső', 'lader');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mentett`
--

CREATE TABLE `mentett` (
  `SORSZAM` int(11) NOT NULL,
  `USERNAME` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `KUTYA_SORSZ` int(11) NOT NULL,
  `MENTETT` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `regisztracio`
--

CREATE TABLE `regisztracio` (
  `SORSZAM` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `USERNAME` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `PASSWORD` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `ADOSZAM` int(15) NOT NULL,
  `SZLASZAM` int(40) NOT NULL,
  `WEBLINK` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `MEGYE` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `regisztracio`
--

INSERT INTO `regisztracio` (`SORSZAM`, `NAME`, `USERNAME`, `EMAIL`, `PASSWORD`, `ADOSZAM`, `SZLASZAM`, `WEBLINK`, `MEGYE`) VALUES
(1, 'Nagy Benő', 'nabe', 'nabe@g.hu', 'pert', 1, 2345, 'www.vt.hu', 'Pest megye'),
(2, 'Kis Tomi Benő', 'kibe', 'kibe@g.hu', 'rut', 1, 2345, 'www.vtoi.hu', 'Vas megye'),
(3, 'Éles Dobi', 'edi', 'edi@h.hu', 'ertz', 2233, 2345, 'www.vtoi.hu', 'Vas megye'),
(4, 'Botond', 'boti', 'boti@gmail.com', 'NQt77', 2233, 2345, 'www.vtoi.hu', 'Pest megye'),
(5, 'Köteles', 'lader', 'lader@gmail.com', 'Kutya2', 2233, 2345, 'www.cica.hu', 'Pest megye'),
(6, 'Bors', 'bors', 'bors@bo.hu', 'pozi', 0, 0, '', '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kutya`
--
ALTER TABLE `kutya`
  ADD PRIMARY KEY (`SORSZAM`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- A tábla indexei `mentett`
--
ALTER TABLE `mentett`
  ADD PRIMARY KEY (`SORSZAM`),
  ADD KEY `KUTYA_SORSZ` (`KUTYA_SORSZ`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- A tábla indexei `regisztracio`
--
ALTER TABLE `regisztracio`
  ADD PRIMARY KEY (`SORSZAM`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kutya`
--
ALTER TABLE `kutya`
  MODIFY `SORSZAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `mentett`
--
ALTER TABLE `mentett`
  MODIFY `SORSZAM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `regisztracio`
--
ALTER TABLE `regisztracio`
  MODIFY `SORSZAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `kutya`
--
ALTER TABLE `kutya`
  ADD CONSTRAINT `kutya_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `regisztracio` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `mentett`
--
ALTER TABLE `mentett`
  ADD CONSTRAINT `mentett_ibfk_1` FOREIGN KEY (`KUTYA_SORSZ`) REFERENCES `kutya` (`SORSZAM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mentett_ibfk_2` FOREIGN KEY (`USERNAME`) REFERENCES `regisztracio` (`USERNAME`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
