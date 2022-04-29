-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 18. 17:54
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
(1, 'Fitos', 'ivartalanított szuka', '2019', '2022-02-15', 'kicsi 	(<15 kg)', 'rövid', 'felnőtt ', 'Vagány, erős, határozott kutyus . Rendkívül tanulékony, figyelmes.Más kutyával a viszonya nem kiegyensúlyozott, a nála kisebbeket támadja, a vele azonos kanokkal sem barátságos. Tapasztalt kutyás gazdit keres', 'https://i.imgur.com/dIL1C47.png', 'gazdikereső', 'uromi', 'Pest megye', 'Ürömi Állatotthon', 'https://uromimenhely.hu/'),
(2, 'Simi', 'ivartalanított szuka', '2020', '2022-02-15', 'kicsi 	(<15 kg)', 'rövid', 'fiatal', 'Cuki, hálás, barátságos, áhítja az emberi törődést.  Stramm, jó természetű kutya, külön is szívesen költözne jó családba', 'https://i.imgur.com/2FNTYRE.png', 'gazdikereső', 'uromi', 'Pest megye', 'Ürömi Állatotthon', 'https://uromimenhely.hu/'),
(3, 'Kira', 'ivartalanított szuka', '2022', '2022-03-09', 'közepes 	(15-30kg)', 'rövid', 'kölyök', 'Mindenkivel barátságos, abszolút problémamentes, bújós, mindig vidám', 'https://i.imgur.com/DlfNAdM.png', 'gazdikereső', 'uromi', 'Pest megye', 'Ürömi Állatotthon', 'https://uromimenhely.hu/'),
(4, 'Cézár', 'ivartalanított kan', '2022', '2022-04-18', 'közepes 	(15-30kg)', 'hosszú', 'kölyök', 'Nagyon helyes, játékos, barátságos kiskutya', 'https://i.imgur.com/wvRcyTj.png', 'gazdikereső', 'uromi', 'Pest megye', 'Ürömi Állatotthon', 'https://uromimenhely.hu/'),
(5, 'Samu', 'ivartalanított kan', '2019', '2022-04-18', 'nagy	 (>30kg)', 'hosszú', 'felnőtt ', 'okosan megtanulta, a pórázon sétát, szeret játszani, szaladni, de temperamentuma kifejezetten ideális', 'https://i.imgur.com/eWm0GI7.png', 'gazdikereső', 'uromi', 'Pest megye', 'Ürömi Állatotthon', 'https://uromimenhely.hu/'),
(6, 'Fanni', 'ivartalanított szuka', '2018', '2022-04-18', 'nagy	 (>30kg)', 'hosszú', 'felnőtt ', 'A férfiak felé hamarabb megnyílik. Nőktől kicsit jobban tart.A jutifalatot kennelrácson keresztül nagyon óvatosan, finoman, míg közvetlen találkozásnál picit hevesebben veszi el.', 'https://i.imgur.com/WVZ2g6T.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(7, 'Curti', 'ivartalanított kan', '2019', '2022-04-18', 'közepes 	(15-30kg)', 'hosszú', 'felnőtt ', 'Jó, aktív, rohangálós, labdaimádó – és ezzel kiválóan motiválható, tanítható.Tényleg lesi minden szavad, mozdulatod.', 'https://i.imgur.com/6CuKfbT.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(8, 'Lina', 'ivartalanított szuka', '2017', '2022-04-18', 'közepes 	(15-30kg)', 'hosszú', 'felnőtt ', 'Elsőre kicsit tartózkodó, de hamar el lehet nyerni a bizalmát pár szem jutifalattal és halk kedves szavakkal, nyugodt mozdulatokkal, valamint akkor is, ha egy olyan ember mutatja be neki a számára ismeretlent, akiben már megbízik.', 'https://i.imgur.com/9jks8kH.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(9, 'Sib', 'ivartalanított szuka', '2018', '2022-04-18', 'kicsi 	(<15 kg)', 'hosszú', 'felnőtt ', 'Kedves kiskutya, aki a popó masszázst nagyon szereti.', 'https://i.imgur.com/vsjlxdu.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(10, 'Dagi', 'ivartalanított szuka', '2017', '2022-04-18', 'közepes 	(15-30kg)', 'hosszú', 'felnőtt ', 'Okosan megtanulta, a pórázon sétát, szeret játszani, szaladni, de temperamentuma kifejezetten ideális', 'https://i.imgur.com/h7QW5km.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(11, 'Bert', 'ivartalanított szuka', '2019', '2022-04-18', 'nagy	 (>30kg)', 'hosszú', 'fiatal', 'Nagyon szereti az embereket, más kutyákhoz, cicákhoz szoktatható, hiszen fiatal kutya. Figyelmes, megfelelni akaró, álomkedves kutyus.', 'https://i.imgur.com/NjMgb4i.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(12, 'Kicsike', 'ivartalanított szuka', '2019', '2022-04-18', 'közepes 	(15-30kg)', 'hosszú', 'felnőtt ', 'Cicát, másik kutyát inkább nem kér, ezt vedd kérlek figyelembe', 'https://i.imgur.com/7gZrL90.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(13, 'Betere', 'ivartalanított szuka', '2018', '2022-04-18', 'közepes 	(15-30kg)', 'rövid', 'felnőtt ', 'Rendkívül kedves, más kutyák iránt barátságosan érdeklődő, emberekkel szelíd figyelmes, tanulni vágyó, megfelelni akaró kutya.', 'https://i.imgur.com/TzOOYRY.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(14, 'Bubi', 'ivartalanított szuka', '2019', '2022-04-18', 'nagy	 (>30kg)', 'közepes', 'felnőtt ', '', 'https://i.imgur.com/H2CK4jU.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(15, 'Barki', 'ivartalanított szuka', '2018', '2022-04-18', 'közepes 	(15-30kg)', 'közepes', 'felnőtt ', 'Érdeklődő, szelíd, mindenkivel kedves.', 'https://i.imgur.com/7xhPlft.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(16, 'Zebus', 'ivartalanított szuka', '2020', '2022-04-18', 'közepes 	(15-30kg)', 'közepes', 'felnőtt ', 'Cicát, másik kutyát inkább nem kér, ezt vedd kérlek figyelembe.Vagány, erős, határozott kutyus . ', 'https://i.imgur.com/qOcohbk.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(17, 'Barni', 'ivartalanított szuka', '2020', '2022-01-04', 'közepes 	(15-30kg)', 'rövid', 'felnőtt ', 'jól nevelt, okos, barátságos', 'https://i.imgur.com/I6pBJEc.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(18, 'Berci', 'ivartalanított kan', '2018', '2021-12-16', 'nagy	 (>30kg)', 'rövid', 'felnőtt ', 'Barátai a kétlábúak, négylábú társait nem igazán kedveli, amiről öblös hangján tájékoztatja is őket, ha a helyzet úgy kívánja. Autóban nyugodtan utazik. Mindent elkövet egy kis simogatásért.Pórázon nem húz, békésen szagolgat és jelölget.', 'https://i.imgur.com/Oo72Rri.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(19, 'Vilike', 'ivartalanított kan', '2019', '2022-04-18', 'kicsi 	(<15 kg)', 'rövid', 'felnőtt ', 'Más kutyákkal kijön, emberekkel barátságos.', 'https://i.imgur.com/AexkeG2.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(20, 'Zebu', 'ivartalanított kan', '2018', '2022-01-04', 'közepes 	(15-30kg)', 'rövid', 'felnőtt ', 'Jól nevelt, okos, barátságos', 'https://i.imgur.com/e2QRgvD.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(21, 'Malina', 'ivartalanított szuka', '2022', '2022-01-08', 'kicsi 	(<15 kg)', 'rövid', 'kölyök', 'Kedves, élénk, kiegyenesúlyozott kutya', 'https://i.imgur.com/hrMzffH.png', 'gazdikereső', 'lelenc', 'Pest megye', 'Lelenc Kutyamentő Egyesület', 'https://www.lelenc.hu/'),
(22, 'Süti', 'ivartalanított kan', '2022', '2022-01-07', 'kicsi 	(<15 kg)', 'hosszú', 'kölyök', 'Nyugodt, nagyon kedves természetű', 'https://i.imgur.com/mWxexQw.png', 'gazdikereső', 'tappancs', 'Csongrád-Csanád megye', 'Tappancs Állatvédő Alapítvány', 'https://www.tappancs.hu/'),
(23, 'Kesu', 'ivartalanított kan', '2021', '2022-04-18', 'közepes 	(15-30kg)', 'hosszú', 'kölyök', 'Nyugodt, nagyon kedves természetű', 'https://i.imgur.com/pPzSjik.png', 'gazdikereső', 'tappancs', 'Csongrád-Csanád megye', 'Tappancs Állatvédő Alapítvány', 'https://www.tappancs.hu/'),
(24, 'Buksi', 'ivartalanított kan', '2021', '2022-04-18', 'nagy	 (>30kg)', 'közepes', 'kölyök', 'Félénk, ám szelíd', 'https://i.imgur.com/uGIKv4C.png', 'gazdikereső', 'tappancs', 'Csongrád-Csanád megye', 'Tappancs Állatvédő Alapítvány', 'https://www.tappancs.hu/');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mentett`
--

CREATE TABLE `mentett` (
  `SORSZAM` int(11) NOT NULL,
  `USERNAME` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `KUTYA_SORSZ` int(11) NOT NULL,
  `sessionId` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `mentett`
--

INSERT INTO `mentett` (`SORSZAM`, `USERNAME`, `KUTYA_SORSZ`, `sessionId`) VALUES
(0, '', 0, 't1nbh4p0ofvs64qmbhacdl8uec');

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
  `WEBLINK` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `MEGYE` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `sessionId` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `regisztracio`
--

INSERT INTO `regisztracio` (`SORSZAM`, `NAME`, `USERNAME`, `EMAIL`, `PASSWD`, `WEBLINK`, `MEGYE`, `sessionId`) VALUES
(1, 'Lelenc Kutyamentő Egyesület', 'lelenc', 'lelenc@gmail.com', 'aaf868741cb136507848cc3fde9dba92', 'https://www.lelenc.hu/', 'Pest megye', ''),
(2, 'Tappancs Állatvédő Alapítvány', 'tappancs', 'tappancs@gmail.com', '2417b7037cfde515272adc1316628615', 'https://www.tappancs.hu/', 'Csongrád-Csanád megye', ''),
(3, 'Ürömi Állatotthon', 'uromi', 'uromi@gmail.com', '4034268daec10eff50fa11760b426223', 'https://uromimenhely.hu/', 'Pest megye', ''),
(4, 'Nagy Albert', 'albi', 'albi@gmail.com', 'cf42b1c2b8978b5f4b9cd051dfedf7cd', '', '', ''),
(5, 'Kis Emma', 'emi', 'emi@gmail.com', '12b41c761b41698d39ef68fdd9429578', '', '', ''),
(6, 'Szabó Katalin', 'katika', 'katika@freemail.hu', 'af85b9ed98481408d4101739fed539d6', '', '', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `usersessions`
--

CREATE TABLE `usersessions` (
  `USERNAME` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `sessionId` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kutya`
--
ALTER TABLE `kutya`
  ADD PRIMARY KEY (`SORSZAM`);

--
-- A tábla indexei `regisztracio`
--
ALTER TABLE `regisztracio`
  ADD PRIMARY KEY (`SORSZAM`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kutya`
--
ALTER TABLE `kutya`
  MODIFY `SORSZAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `regisztracio`
--
ALTER TABLE `regisztracio`
  MODIFY `SORSZAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
