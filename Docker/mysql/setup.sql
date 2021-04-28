-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Kwi 2021, 03:48
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `raportlink`
--

CREATE DATABASE raportlink_db;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_do_logowania`
--

CREATE TABLE `raportlink_db`.`dane_do_logowania` (
  `nrid` int(11) NOT NULL,
  `nrid_pracownika` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` text COLLATE utf8mb4_polish_ci NOT NULL,
  `email` text COLLATE utf8mb4_polish_ci NOT NULL,
  `ostatnia_zmiana_hasla` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firma`
--

CREATE TABLE `raportlink_db`.`firma` (
  `nrid` int(11) NOT NULL,
  `nrid_zdjecie` int(11) NOT NULL,
  `nazwa` text COLLATE utf8mb4_polish_ci NOT NULL,
  `adr_kod_pocztowy` text COLLATE utf8mb4_polish_ci NOT NULL,
  `adr_miasto` text COLLATE utf8mb4_polish_ci NOT NULL,
  `adr_ulica` text COLLATE utf8mb4_polish_ci NOT NULL,
  `adr_numer` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `raportlink_db`.`pracownicy` (
  `nrid` int(11) NOT NULL,
  `Imie` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Rola_w_systemie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy_uprawnienia`
--

CREATE TABLE `raportlink_db`.`pracownicy_uprawnienia` (
  `nrid` int(11) NOT NULL,
  `nrid_pracownika` int(11) NOT NULL,
  `nrid_uprawnienia` int(11) NOT NULL,
  `status` smallint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `raporty`
--

CREATE TABLE `raportlink_db`.`raporty` (
  `nrid` int(11) NOT NULL,
  `nazwa` text COLLATE utf8mb4_polish_ci NOT NULL,
  `data_zalozenia` date NOT NULL,
  `zalozyl` int(11) NOT NULL,
  `nrid_firmy` int(11) NOT NULL,
  `szablon` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `raporty_zawartosc`
--

CREATE TABLE `raportlink_db`.`raporty_zawartosc` (
  `nrid` int(11) NOT NULL,
  `nrid_raportu` int(11) NOT NULL,
  `numer_elementu` int(11) NOT NULL,
  `zawartosc` text COLLATE utf8mb4_polish_ci NOT NULL,
  `nrid_zdjecia` int(11) NOT NULL,
  `widocznosc` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `raport_statusy`
--

CREATE TABLE `raportlink_db`.`raport_statusy` (
  `nrid` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `szablony`
--

CREATE TABLE `raportlink_db`.`szablony` (
  `nrid` int(11) NOT NULL,
  `nrid_firmy` int(11) NOT NULL,
  `naglowek` text COLLATE utf8mb4_polish_ci NOT NULL,
  `stopka` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uprawnienia`
--

CREATE TABLE `raportlink_db`.`uprawnienia` (
  `nrid` int(11) NOT NULL,
  `nazwa` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecie`
--

CREATE TABLE `raportlink_db`.`zdjecie` (
  `nrid` int(11) NOT NULL,
  `nazwa` text COLLATE utf8mb4_polish_ci NOT NULL,
  `szerokosc` int(11) NOT NULL,
  `wysokosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_do_logowania`
--
ALTER TABLE `raportlink_db`.`dane_do_logowania`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `nrid_pracownika` (`nrid_pracownika`);

--
-- Indeksy dla tabeli `firma`
--
ALTER TABLE `raportlink_db`.`firma`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `nrid_zdjecie` (`nrid_zdjecie`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `raportlink_db`.`pracownicy`
  ADD PRIMARY KEY (`nrid`);

--
-- Indeksy dla tabeli `pracownicy_uprawnienia`
--
ALTER TABLE `raportlink_db`.`pracownicy_uprawnienia`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `nrid_pracownika` (`nrid_pracownika`),
  ADD KEY `nrid_uprawnienia` (`nrid_uprawnienia`);

--
-- Indeksy dla tabeli `raporty`
--
ALTER TABLE `raportlink_db`.`raporty`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `zalozyl` (`zalozyl`),
  ADD KEY `nrid_firmy` (`nrid_firmy`),
  ADD KEY `szablon` (`szablon`),
  ADD KEY `status` (`status`);

--
-- Indeksy dla tabeli `raporty_zawartosc`
--
ALTER TABLE `raportlink_db`.`raporty_zawartosc`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `nrid_raportu` (`nrid_raportu`);

--
-- Indeksy dla tabeli `raport_statusy`
--
ALTER TABLE `raportlink_db`.`raport_statusy`
  ADD PRIMARY KEY (`nrid`);

--
-- Indeksy dla tabeli `szablony`
--
ALTER TABLE `raportlink_db`.`szablony`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `nrid_firmy` (`nrid_firmy`);

--
-- Indeksy dla tabeli `uprawnienia`
--
ALTER TABLE `raportlink_db`.`uprawnienia`
  ADD PRIMARY KEY (`nrid`);

--
-- Indeksy dla tabeli `zdjecie`
--
ALTER TABLE `raportlink_db`.`zdjecie`
  ADD PRIMARY KEY (`nrid`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane_do_logowania`
--
ALTER TABLE `raportlink_db`.`dane_do_logowania`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `firma`
--
ALTER TABLE `raportlink_db`.`firma`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `raportlink_db`.`pracownicy`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pracownicy_uprawnienia`
--
ALTER TABLE `raportlink_db`.`pracownicy_uprawnienia`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `raporty`
--
ALTER TABLE `raportlink_db`.`raporty`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `raporty_zawartosc`
--
ALTER TABLE `raportlink_db`.`raporty_zawartosc`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `raport_statusy`
--
ALTER TABLE `raportlink_db`.`raport_statusy`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `szablony`
--
ALTER TABLE `raportlink_db`.`szablony`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uprawnienia`
--
ALTER TABLE `raportlink_db`.`uprawnienia`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zdjecie`
--
ALTER TABLE `raportlink_db`.`zdjecie`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dane_do_logowania`
--
ALTER TABLE `raportlink_db`.`dane_do_logowania`
  ADD CONSTRAINT `dane_do_logowania_ibfk_1` FOREIGN KEY (`nrid_pracownika`) REFERENCES `pracownicy` (`nrid`);

--
-- Ograniczenia dla tabeli `pracownicy_uprawnienia`
--
ALTER TABLE `raportlink_db`.`pracownicy_uprawnienia`
  ADD CONSTRAINT `pracownicy_uprawnienia_ibfk_1` FOREIGN KEY (`nrid_pracownika`) REFERENCES `pracownicy` (`nrid`),
  ADD CONSTRAINT `pracownicy_uprawnienia_ibfk_2` FOREIGN KEY (`nrid_uprawnienia`) REFERENCES `uprawnienia` (`nrid`);

--
-- Ograniczenia dla tabeli `raporty`
--
ALTER TABLE `raportlink_db`.`raporty`
  ADD CONSTRAINT `raporty_ibfk_1` FOREIGN KEY (`zalozyl`) REFERENCES `pracownicy` (`nrid`),
  ADD CONSTRAINT `raporty_ibfk_2` FOREIGN KEY (`nrid_firmy`) REFERENCES `firma` (`nrid`),
  ADD CONSTRAINT `raporty_ibfk_3` FOREIGN KEY (`szablon`) REFERENCES `szablony` (`nrid`),
  ADD CONSTRAINT `raporty_ibfk_4` FOREIGN KEY (`status`) REFERENCES `raport_statusy` (`nrid`);

--
-- Ograniczenia dla tabeli `raporty_zawartosc`
--
ALTER TABLE `raportlink_db`.`raporty_zawartosc`
  ADD CONSTRAINT `raporty_zawartosc_ibfk_1` FOREIGN KEY (`nrid_raportu`) REFERENCES `raporty` (`nrid`),
  ADD CONSTRAINT `raporty_zawartosc_ibfk_2` FOREIGN KEY (`nrid_raportu`) REFERENCES `zdjecie` (`nrid`);

--
-- Ograniczenia dla tabeli `szablony`
--
ALTER TABLE `raportlink_db`.`szablony`
  ADD CONSTRAINT `szablony_ibfk_1` FOREIGN KEY (`nrid_firmy`) REFERENCES `firma` (`nrid`);
COMMIT;

--
-- Ograniczenia dla tabeli `firma`
--
ALTER TABLE `raportlink_db`.`firma`
  ADD CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`nrid_zdjecie`) REFERENCES `zdjecie` (`nrid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

INSERT INTO `raportlink_db`.`pracownicy` (`nrid`, `Imie`, `Nazwisko`, `Rola_w_systemie`) VALUES ('1', 'Jan', 'Matejko', '0');
INSERT INTO `raportlink_db`.`pracownicy` (`nrid`, `Imie`, `Nazwisko`, `Rola_w_systemie`) VALUES ('2', 'Jan', 'Matejka', '0');
INSERT INTO `raportlink_db`.`pracownicy` (`nrid`, `Imie`, `Nazwisko`, `Rola_w_systemie`) VALUES ('3', 'Bogdan', 'Matej', '0');
INSERT INTO `raportlink_db`.`pracownicy` (`nrid`, `Imie`, `Nazwisko`, `Rola_w_systemie`) VALUES ('4', 'Joachim', 'Mat', '0');

INSERT INTO `raportlink_db`.`dane_do_logowania` (`nrid`, `nrid_pracownika`, `login`, `haslo`, `email`,`ostatnia_zmiana_hasla`) VALUES ('1', '1', 'admin', 'admin','','2021-04-15');
INSERT INTO `raportlink_db`.`dane_do_logowania` (`nrid`, `nrid_pracownika`, `login`, `haslo`, `email`,`ostatnia_zmiana_hasla`) VALUES ('2', '2', 'admin1', 'admin1','','2021-04-15');
INSERT INTO `raportlink_db`.`dane_do_logowania` (`nrid`, `nrid_pracownika`, `login`, `haslo`, `email`,`ostatnia_zmiana_hasla`) VALUES ('3', '3', 'admin2', 'admin2','','2021-04-15');
INSERT INTO `raportlink_db`.`dane_do_logowania` (`nrid`, `nrid_pracownika`, `login`, `haslo`, `email`,`ostatnia_zmiana_hasla`) VALUES ('4', '4', 'admin3', 'admin3','','2021-04-15');

INSERT INTO `firma` (`nrid`, `nrid_zdjecie`, `nazwa`, `adr_kod_pocztowy`, `adr_miasto`, `adr_ulica`, `adr_numer`) VALUES ('1', '1', 'firma 2', '54321', 'op', 'op', '2');
INSERT INTO `firma` (`nrid`, `nrid_zdjecie`, `nazwa`, `adr_kod_pocztowy`, `adr_miasto`, `adr_ulica`, `adr_numer`) VALUES ('2', '2', 'firma 2', '54321', 'op', 'op', '2');

INSERT INTO `zdjecie` (`nrid`, `nazwa`, `szerokosc`, `wysokosc`) VALUES ('1', 'images/Raport_Link_logo_light.svg', '1', '1');
INSERT INTO `zdjecie` (`nrid`, `nazwa`, `szerokosc`, `wysokosc`) VALUES ('2', 'images/test.jpg', '1', '1');