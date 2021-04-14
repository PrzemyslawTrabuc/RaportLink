-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Kwi 2021, 19:59
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `raportlink`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_do_logowania`
--

CREATE TABLE `dane_do_logowania` (
  `nrid` int(11) NOT NULL,
  `nrid_pracownika` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` text COLLATE utf8mb4_polish_ci NOT NULL,
  `email` text COLLATE utf8mb4_polish_ci NOT NULL,
  `ostatnia_zmiana_hasla` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dane_do_logowania`
--

INSERT INTO `dane_do_logowania` (`nrid`, `nrid_pracownika`, `login`, `haslo`, `email`, `ostatnia_zmiana_hasla`) VALUES
(1, 1, 'admin', 'admin1', 'mariusz@gmail.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firma`
--

CREATE TABLE `firma` (
  `nrid` int(11) NOT NULL,
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

CREATE TABLE `pracownicy` (
  `nrid` int(11) NOT NULL,
  `Imie` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8mb4_polish_ci NOT NULL,
  `Rola_w_systemie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`nrid`, `Imie`, `Nazwisko`, `Rola_w_systemie`) VALUES
(1, 'Mariusz', 'Sobol', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy_uprawnienia`
--

CREATE TABLE `pracownicy_uprawnienia` (
  `nrid` int(11) NOT NULL,
  `nrid_pracownika` int(11) NOT NULL,
  `nrid_uprawnienia` int(11) NOT NULL,
  `status` smallint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `raporty`
--

CREATE TABLE `raporty` (
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

CREATE TABLE `raporty_zawartosc` (
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

CREATE TABLE `raport_statusy` (
  `nrid` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `szablony`
--

CREATE TABLE `szablony` (
  `nrid` int(11) NOT NULL,
  `nrid_firmy` int(11) NOT NULL,
  `naglowek` text COLLATE utf8mb4_polish_ci NOT NULL,
  `stopka` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uprawnienia`
--

CREATE TABLE `uprawnienia` (
  `nrid` int(11) NOT NULL,
  `nazwa` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecie`
--

CREATE TABLE `zdjecie` (
  `nrid` int(11) NOT NULL,
  `nazwa` text COLLATE utf8mb4_polish_ci NOT NULL,
  `zdjecie` blob NOT NULL,
  `szerokosc` int(11) NOT NULL,
  `wysokosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_do_logowania`
--
ALTER TABLE `dane_do_logowania`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `nrid_pracownika` (`nrid_pracownika`);

--
-- Indeksy dla tabeli `firma`
--
ALTER TABLE `firma`
  ADD PRIMARY KEY (`nrid`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`nrid`);

--
-- Indeksy dla tabeli `pracownicy_uprawnienia`
--
ALTER TABLE `pracownicy_uprawnienia`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `nrid_pracownika` (`nrid_pracownika`),
  ADD KEY `nrid_uprawnienia` (`nrid_uprawnienia`);

--
-- Indeksy dla tabeli `raporty`
--
ALTER TABLE `raporty`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `zalozyl` (`zalozyl`),
  ADD KEY `nrid_firmy` (`nrid_firmy`),
  ADD KEY `szablon` (`szablon`),
  ADD KEY `status` (`status`);

--
-- Indeksy dla tabeli `raporty_zawartosc`
--
ALTER TABLE `raporty_zawartosc`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `nrid_raportu` (`nrid_raportu`);

--
-- Indeksy dla tabeli `raport_statusy`
--
ALTER TABLE `raport_statusy`
  ADD PRIMARY KEY (`nrid`);

--
-- Indeksy dla tabeli `szablony`
--
ALTER TABLE `szablony`
  ADD PRIMARY KEY (`nrid`),
  ADD KEY `nrid_firmy` (`nrid_firmy`);

--
-- Indeksy dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  ADD PRIMARY KEY (`nrid`);

--
-- Indeksy dla tabeli `zdjecie`
--
ALTER TABLE `zdjecie`
  ADD PRIMARY KEY (`nrid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dane_do_logowania`
--
ALTER TABLE `dane_do_logowania`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `firma`
--
ALTER TABLE `firma`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `pracownicy_uprawnienia`
--
ALTER TABLE `pracownicy_uprawnienia`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `raporty`
--
ALTER TABLE `raporty`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `raporty_zawartosc`
--
ALTER TABLE `raporty_zawartosc`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `raport_statusy`
--
ALTER TABLE `raport_statusy`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `szablony`
--
ALTER TABLE `szablony`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zdjecie`
--
ALTER TABLE `zdjecie`
  MODIFY `nrid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dane_do_logowania`
--
ALTER TABLE `dane_do_logowania`
  ADD CONSTRAINT `dane_do_logowania_ibfk_1` FOREIGN KEY (`nrid_pracownika`) REFERENCES `pracownicy` (`nrid`);

--
-- Ograniczenia dla tabeli `pracownicy_uprawnienia`
--
ALTER TABLE `pracownicy_uprawnienia`
  ADD CONSTRAINT `pracownicy_uprawnienia_ibfk_1` FOREIGN KEY (`nrid_pracownika`) REFERENCES `pracownicy` (`nrid`),
  ADD CONSTRAINT `pracownicy_uprawnienia_ibfk_2` FOREIGN KEY (`nrid_uprawnienia`) REFERENCES `uprawnienia` (`nrid`);

--
-- Ograniczenia dla tabeli `raporty`
--
ALTER TABLE `raporty`
  ADD CONSTRAINT `raporty_ibfk_1` FOREIGN KEY (`zalozyl`) REFERENCES `pracownicy` (`nrid`),
  ADD CONSTRAINT `raporty_ibfk_2` FOREIGN KEY (`nrid_firmy`) REFERENCES `firma` (`nrid`),
  ADD CONSTRAINT `raporty_ibfk_3` FOREIGN KEY (`szablon`) REFERENCES `szablony` (`nrid`),
  ADD CONSTRAINT `raporty_ibfk_4` FOREIGN KEY (`status`) REFERENCES `raport_statusy` (`nrid`);

--
-- Ograniczenia dla tabeli `raporty_zawartosc`
--
ALTER TABLE `raporty_zawartosc`
  ADD CONSTRAINT `raporty_zawartosc_ibfk_1` FOREIGN KEY (`nrid_raportu`) REFERENCES `raporty` (`nrid`),
  ADD CONSTRAINT `raporty_zawartosc_ibfk_2` FOREIGN KEY (`nrid_raportu`) REFERENCES `zdjecie` (`nrid`);

--
-- Ograniczenia dla tabeli `szablony`
--
ALTER TABLE `szablony`
  ADD CONSTRAINT `szablony_ibfk_1` FOREIGN KEY (`nrid_firmy`) REFERENCES `firma` (`nrid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
