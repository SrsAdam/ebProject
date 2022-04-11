-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 04. 23:15
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 8.0.15

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
  `USERNAME` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `MEGYE` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `NAME` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `WEBLINK` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kutya`
--

INSERT INTO `kutya` (`SORSZAM`, `NEV`, `NEME`, `SZUL_DATUM`, `BEKER_DATUM`, `MERET`, `SZORHOSSZ`, `KOR`, `JELLEMZES`, `KEP`, `STATUSZ`, `USERNAME`, `MEGYE`, `NAME`, `WEBLINK`) VALUES
(3, 'Simi', 'ivaros szuka', '2000-01-01', '2001-01-01', 'nagy	 (>30kg)', 'rövid', 'fiatal', 'jó', 'https://i.imgur.com/JSEHbri.png', 'gazdikereső', 'kibe', 'Bács-Kiskun megye', ' Kis Tomi Benő', 'www.vtoi.hu'),
(4, 'Fitos', 'ivartalanított szuka', '2000-01-01', '2001-01-01', 'közepes 	(15-30kg)', 'rövid', 'fiatal', 'jó', 'https://i.imgur.com/Enqyk2y.png', 'gazdikereső', 'kibe', 'Bács-Kiskun megye', ' Kis Tomi Benő', 'www.vtoi.hu'),
(7, 'Kutyikó', 'ivartalanított szuka', '2000-01-01', '2001-01-01', 'közepes 	(15-30kg)', 'rövid', 'kölyök', 'jó', 'foto', 'gazdis', 'lader', 'Pest megye', 'Köteles', 'www.cica.hu'),
(8, 'Kira', 'ivartalanított szuka', '2020.', '2022-03-15', 'közepes 	(15-30kg)', 'közepes', 'fiatal', 'jó kutya', 'pictureBox1', 'gazdikereső', 'nabe', 'Budapest', 'Nagy Benő', 'www.vt.hu'),
(9, 'Cézár', 'ivaros kan', '2019.', '2021-11-18', 'nagy	 (>30kg)', 'rövid', 'felnőtt ', 'jól nevelt', 'pictureBox1', 'gazdikereső', 'nabe', 'Budapest', 'Nagy Benő', 'www.vt.hu'),
(11, 'Samu', 'ivaros kan', '2022', '2022-01-10', 'közepes 	(15-30kg)', 'rövid', 'kölyök', 'aranyos', '', 'gazdikereső', 'kibe', 'Bács-Kiskun megye', ' Kis Tomi Benő', 'www.vtoi.hu'),
(12, 'Fanni', 'ivartalanított szuka', '2020', '2021-12-14', 'kicsi 	(<15 kg)', 'hosszú', 'fiatal', 'cuki,kedves', 'C:\\Users\\admin\\Desktop\\suli\\C-sharp\\EB_asztali\\Kicsike.JPG', 'inaktív', 'kibe', 'Bács-Kiskun megye', ' Kis Tomi Benő', 'www.vtoi.hu'),
(13, 'Curti', 'ivaros szuka', '2011', '2021-12-14', 'közepes 	(15-30kg)', 'közepes', 'fiatal', 'cukika', 'pictureBox1', 'gazdikereső', 'nabe', 'Budapest', 'Nagy Benő', 'www.vt.hu'),
(15, 'Lina', 'ivaros kan', '2000', '2021-12-22', 'kicsi 	(<15 kg)', 'rövid', 'kölyök', '', '', 'gazdikereső', 'nabe', 'Budapest', 'Nagy Benő', 'www.vt.hu'),
(16, 'Dagi', 'ivaros kan', '2020', '2022-02-14', 'kicsi 	(<15 kg)', 'rövid', 'kölyök', '', 'pictureBox1', 'gazdis', 'edi', 'Vas megye', 'Éles Dobi', 'www.gub.hu'),
(17, 'Sib', 'ivaros szuka', '2020', '2022-01-05', 'közepes 	(15-30kg)', 'közepes', 'fiatal', '', 'pictureBox1', 'gazdikereső', 'nabe', 'Budapest', 'Nagy Benő', 'www.vt.hu'),
(18, 'Kicsike', 'ivaros szuka', '2021', '2022-02-26', 'közepes 	(15-30kg)', 'közepes', 'kölyök', '', 'pictureBox1', 'gazdikereső', 'kibe', 'Bács-Kiskun megye', ' Kis Tomi Benő', 'www.vtoi.hu'),
(19, 'Simi', 'ivartalanított kan', '2021', '2022-02-15', 'közepes 	(15-30kg)', 'közepes', 'fiatal', '', 'pictureBox1', 'gazdikereső', 'lader', 'Pest megye', 'Köteles', 'www.cica.hu'),
(20, 'Bert', 'ivartalanított kan', '2015', '2021-12-07', 'nagy	 (>30kg)', 'hosszú', 'felnőtt ', '', '', 'gazdikereső', 'lader', 'Pest megye', 'Köteles', 'www.cica.hu'),
(22, 'Berci', 'ivartalanított kan', '2020', '2022-03-14', 'kicsi 	(<15 kg)', 'közepes', 'kölyök', 'jó', './img/Kicsike.JPG', 'gazdikereső', 'nabe', 'Budapest', 'Nagy Benő', 'www.egrimenhely.gportal.hu'),
(23, 'Betere', 'ivartalanított szuka', '2019', '2022-03-14', 'kicsi 	(<15 kg)', 'rövid', 'fiatal', 'cuki', 'C:\\xampp\\htdocs\\zarozaro\\img\\Kicsike.JPG', 'gazdikereső', 'nabe', 'Budapest', 'Nagy Benő', 'www.vt.hu'),
(25, 'Simi', 'ivartalanított kan', '2018', '2022-03-14', 'közepes 	(15-30kg)', 'hosszú', 'felnőtt ', 'nagyon kedves', 'https://drive.google.com/file/d/15iSKwVQhRAyE06pe_hALkj9bxbG5D4FF/view?usp=sharing', 'gazdikereső', 'lader', 'Pest megye', 'Köteles', 'www.cica.hu'),
(28, 'Vilike', 'ivartalanított kan', '2015', '2022-03-14', 'közepes 	(15-30kg)', 'rövid', 'felnőtt ', '', 'C:/Users/admin/Desktop/suli/C-sharp/EB_asztali/Kicsike.JPG', 'gazdis', 'edi', 'Vas megye', 'Éles Dobi', 'www.gub.hu'),
(34, 'Bubi', 'ivaros kan', '2010', '2022-02-14', 'nagy	 (>30kg)', 'hosszú', 'idős', 'okos', '', 'gazdikereső', 'edi', 'Vas megye', 'Éles Dobi', 'www.gub.hu'),
(35, 'Zebu', 'ivaros kan', '2008', '2022-01-11', 'nagy	 (>30kg)', 'közepes', 'idős', 'aranyos', 'C:/Users/admin/Desktop/suli/C-sharp/EB_asztali/Kicsike.JPG', 'gazdis', 'nagy', 'Szabolcs-Szatmár-Bereg megye', 'Legnagyobbmenhely', 'www.nagy.hu'),
(36, 'Barni', 'ivartalanított kan', '2015', '2022-03-14', 'kicsi 	(<15 kg)', 'közepes', 'felnőtt ', 'kedves', 'C:/Users/admin/Desktop/suli/C-sharp/EB_asztali/Kicsike.JPG', 'gazdikereső', 'kibe', 'Bács-Kiskun megye', 'Kis Tomi Benő', 'www.vtoi.hu'),
(37, 'Barki', 'ivartalanított szuka', '2019', '2022-01-12', 'közepes 	(15-30kg)', 'hosszú', 'felnőtt ', 'félős', 'C:/Users/admin/Desktop/suli/C-sharp/EB_asztali/Kicsike.JPG', 'gazdikereső', 'kibe', 'Bács-Kiskun megye', 'Kis Tomi Benő', 'www.vtoi.hu'),
(38, 'Malina', 'ivaros szuka', '2020', '2022-03-19', 'kicsi 	(<15 kg)', 'rövid', 'fiatal', 'nyugodt', 'C:/Users/admin/Desktop/suli/C-sharp/EB_asztali/Kicsike.JPG', 'gazdikereső', 'lader', 'Pest megye', 'Köteles', 'www.cica.hu'),
(39, 'Valika', 'ivaros szuka', '2018', '2022-03-07', 'kicsi 	(<15 kg)', 'rövid', 'fiatal', 'játékos', 'C:/Users/admin/Desktop/suli/C-sharp/EB_asztali/Kicsike.JPG', 'gazdikereső', 'kibe', 'Bács-Kiskun megye', 'Kis Tomi Benő', 'www.vtoi.hu'),
(40, 'Ferkó', 'ivaros kan', '2021', '2022-03-07', 'kicsi 	(<15 kg)', 'rövid', 'kölyök', 'játékos', 'https://i.imgur.com/hrMzffH.png', 'gazdikereső', 'edi', 'Vas megye', 'Éles Dobi', 'https://hu.wikipedia.org/wiki/Kutya'),
(41, 'Zümi', 'ivaros kan', '2021', '2022-03-08', 'kicsi 	(<15 kg)', 'közepes', 'kölyök', 'eleven', 'C:/Users/admin/Desktop/suli/C-sharp/EB_asztali/Kicsike.JPG', 'gazdikereső', 'edi', 'Vas megye', 'Éles Dobi', 'www.gub.hu'),
(42, 'Csibu', 'ivartalanított kan', '2019', '2022-03-28', 'közepes 	(15-30kg)', 'rövid', 'fiatal', 'https://i.imgur.com/Enqyk2y.png', 'https://i.imgur.com/ub5XWDs.png', 'gazdikereső', 'nabe', 'Budapest', 'Nagy Benő', 'www.vt.hu');

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
  `PASSWD` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `ADOSZAM` int(15) NOT NULL,
  `SZLASZAM` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `WEBLINK` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `MEGYE` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `regisztracio`
--

INSERT INTO `regisztracio` (`SORSZAM`, `NAME`, `USERNAME`, `EMAIL`, `PASSWD`, `ADOSZAM`, `SZLASZAM`, `WEBLINK`, `MEGYE`) VALUES
(1, 'Nagy Benő', 'nabe', 'nabe@g.hu', 'pert', 1, '2345', 'www.vt.hu', 'Budapest'),
(2, 'Kis Tomi Benő', 'kibe', 'kibe@g.hu', 'rut', 1, '2345', 'www.vtoi.hu', 'Bács-Kiskun megye'),
(3, 'Éles Dobi', 'edi', 'edi@h.hu', 'ertz', 2233, '2345', 'www.gub.hu', 'Vas megye'),
(4, 'Botond', 'boti', 'boti@gmail.com', 'NQt77', 2233, '2345', 'www.borog.hu', 'Baranya megye'),
(5, 'Köteles', 'lader', 'lader@gmail.com', 'Kutya2', 2233, '2345', 'www.cica.hu', 'Pest megye'),
(6, 'Bors', 'bors', 'bors@bo.hu', 'pozi', 0, '0', 'NULL', ''),
(8, 'Boder Feri', 'boder', 'boder@bo.hu', 'pozzz', 0, '0', 'www.iok.hu', 'Békés megye'),
(9, 'Tappancs menhely', 'alkat', 'alkat@g.hu', 'paszta', 123456, '111111113', 'www.tapp.hu', 'Zala megye'),
(10, 'Tipitop menhely', 'felfe', 'felfe@g.hu', 'partos', 123456, '11111111-22222222-33333333', 'www.topp.hu', 'Veszprém megye'),
(11, 'Legkisebb menhely', 'kicsi', 'kicsi@g.hu', 'kispasz', 987654322, '222222222222222222222222', 'www.kicsi.hu', 'Tolna megye'),
(12, 'Legnagyobbmenhely', 'nagy', 'nagy@g.hu', 'nagypa', 21212156, '88888888', 'www.nagy.hu', 'Szabolcs-Szatmár-Bereg megye'),
(14, 'Bartos Menhely', 'batr', 'bart@g.hu', 'bartpas', 12457896, '12365478', 'www.koz.hu', 'Somogy megye'),
(15, 'Pork menhely', 'porit', 'porit@g.hu', 'porit pass', 11223654, '1122336548', 'www.rti.hu', 'Somogy megye'),
(19, 'Lartos Menhely', 'laki', 'laki@g.hu', 'lkiup', 1236578, '236544511236547812345678', 'www.pot.hu', 'Nógrád megye'),
(20, 'Kopi Menhely', 'kopi', 'kopi@g.hu', 'lpok', 1236578, '12345678', 'www.pot.hu', 'Nógrád megye'),
(23, 'Kopi Menhely', 'kopi', 'kopi@g.hu', 'opio', 1236578, '12345678', 'www.pot.hu', 'Nógrád megye'),
(24, 'Éles Ani', 'elan', 'elan@g.hu', 'elanpa', 0, '0', '', ''),
(25, 'Borzi Pál', 'borzi', 'borzi@g.hu', 'borpa', 0, '0', '', ''),
(26, 'Felker Pál', 'feli', 'feli@g.hu', 'feli@g.hu', 0, '0', '', ''),
(27, 'kis menhely', 'kis', 'kis@g.hu', 'kispa', 12304567, '123456781234567812345678', 'www.jik.hu', 'Vas megye'),
(28, 'Barát Menhely', 'barto', 'barto@gm.hu', 'bartopa', 11, '22', 'www.barto.hu', 'Pest megye'),
(30, 'rtrt', 'rtrt', 'rtrt@k.k', 'hdMHVTYYHpB5Qp6rtrt', 0, '0', '', ''),
(33, 'trtrerer', 'eeeeeeeeeee', 'fe@g.h', 'jie', 0, '0', '', ''),
(34, 'ccccccccccc', 'ninbb', 'fe@ge.k', '313fee616d164e76f4e791840fc96144', 0, '0', '', ''),
(35, 'hhhhhhhhhhhh', 'ggggggggg', 'fe@ge.k', '838ece1033bf7c7468e873e79ba2a3ec', 0, '0', '', ''),
(40, 'gg', 'gg', 'gg@hh.j', 'ac554c4598fddecd7e5b4d6c5e7e283f', 0, '0', '', ''),
(41, 'tttttttttttttttt', 'hhhhhhhhhhhhff', 'hh@ff.h', '82b6e3bb9f8b7452cbcb988e2dea1413', 0, '0', '', ''),
(42, 're', 're', 're@re.g', 're', 0, '0', '', ''),
(43, 'ghjk', 'fghj', 'hg@gf.k', '946cc85484c4dd01e2f44fbc88afbc93', 0, '0', '', ''),
(44, 'ghjk', 'fghj', 'hg@gf.k', '946cc85484c4dd01e2f44fbc88afbc93', 0, '0', '', ''),
(45, 'xxxxxx', 'xxxxxxxx', 'xxx@d.h', 'f176fc999050e08c2c1a33b6da553adf', 0, '0', '', ''),
(46, 'ccc', 'ggg', 'gg@g.h', 'f176fc999050e08c2c1a33b6da553adf', 0, '0', '', ''),
(47, 'v', 'v', 'v@g.h', 'f176fc999050e08c2c1a33b6da553adf', 0, '0', '', ''),
(48, 'd', 'd', 'd@g.h', 'f176fc999050e08c2c1a33b6da553adf', 0, '0', '', ''),
(49, 'll', 'll', 'l@g.j', 'f176fc999050e08c2c1a33b6da553adf', 0, '0', '', ''),
(50, 'll', 'll', 'l@g.j', 'f176fc999050e08c2c1a33b6da553adf', 0, '0', '', ''),
(51, 'll', 'll', 'l@g.j', 'f176fc999050e08c2c1a33b6da553adf', 0, '0', '', ''),
(52, 'ures', 'ures', 'ures@gh', '3c8571b9847735872eeef96abcc9127e', 0, '0', '', ''),
(53, 'Reni', 'reni', 'reni@g.h', '18389a4a9ad5795744699cff0ba66c15', 0, '0', '', ''),
(54, 'Reni', 'reni', 'reni@g.h', '18389a4a9ad5795744699cff0ba66c15', 0, '0', '', ''),
(55, 'Reni', 'reni', 'reni@g.h', '18389a4a9ad5795744699cff0ba66c15', 0, '0', '', ''),
(56, 'Reni', 'reni', 'reni@g.h', '2cb9df9898e55fd0ad829dc202ddbd1c', 0, '0', '', ''),
(57, 'Reni', 'reni', 'reni@g.h', '692cf67236a82e6466f028979057f4d4', 0, '0', '', ''),
(58, 'Reni', 'reni', 'reni@g.h', '2cb9df9898e55fd0ad829dc202ddbd1c', 0, '0', '', ''),
(59, 'Reni', 'reni', 'reni@g.h', '2cb9df9898e55fd0ad829dc202ddbd1c', 0, '0', '', ''),
(60, 'berber', 'berber', 'ber@g.hu', '202cb962ac59075b964b07152d234b70', 0, '0', '', ''),
(61, 'Guno', 'guno', 'guno@g.h', '7f94dd413148ff9ac9e9e4b6ff2b6ca9', 0, '0', '', ''),
(62, 'Morgi', 'mo', 'mo@g.h', '2cb9df9898e55fd0ad829dc202ddbd1c', 0, '0', '', ''),
(64, 'rerere', 'rererer', 'rer@g.g', '7e764aa6b7529530855f0373606d1886', 0, '0', '', ''),
(65, 'bebeb', 'nabe', 'n@g.hu', '7e764aa6b7529530855f0373606d1886', 0, '0', '', ''),
(66, 'bebeb', 'nabe3', 'n@g.hu', '7e764aa6b7529530855f0373606d1886', 0, '0', '', ''),
(67, 'Keri', 'fefefe', 'h@j.h', '12eccbdd9b32918131341f38907cbbb5', 0, '0', '', ''),
(68, 'Keri', 'sdsd', 'h@j.h', '12eccbdd9b32918131341f38907cbbb5', 0, '0', '', ''),
(69, 'Kerifer', 'as', 'h@j.h', 'f970e2767d0cfe75876ea857f92e319b', 0, '0', '', ''),
(70, 'teri', 'teri', 'teri@teri.hu', 'ff73ae017ed8a921fd7a68e071edba24', 0, '0', '', ''),
(71, 'ferw', 'ferw', 'ferw@ferw.h', '1499437827bf34ea6efa89a48954323a', 0, '0', '', '');

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
  MODIFY `SORSZAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT a táblához `mentett`
--
ALTER TABLE `mentett`
  MODIFY `SORSZAM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `regisztracio`
--
ALTER TABLE `regisztracio`
  MODIFY `SORSZAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
