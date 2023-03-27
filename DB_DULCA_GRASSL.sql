-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2023 at 11:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparta`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `ID` int(11) NOT NULL,
  `blogtitle` varchar(64) NOT NULL,
  `blogentry` text NOT NULL,
  `picture` varchar(400) NOT NULL,
  `datum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`ID`, `blogtitle`, `blogentry`, `picture`, `datum`) VALUES
(1, 'Beethoven-Fans besuchen das Hotel Sparta', 'Am vergangenen Wochenende hatten wir das Vergnügen, eine Gruppe von Musikstudenten bei uns im Hotel Sparta willkommen zu heißen. Die Studenten waren auf einer Reise, um die Geburtsstätte von Ludwig van Beethoven zu erkunden und wählten unser Hotel als Unterkunft für ihren Aufenthalt.\r\n\r\nSie waren sehr beeindruckt von der Schönheit und Ruhe unseres Hotels und genossen es, nach einem langen Tag voller Sightseeing in ihren komfortablen Zimmern zu entspannen. Unser Restaurant war auch ein Highlight für die Gruppe, die das Abendessen als einen der Höhepunkte ihres Aufenthalts beschrieben hat.\r\n\r\nWir waren sehr erfreut, dass wir einen Beitrag dazu leisten konnten, dass ihre Reise unvergesslich wurde. Es ist immer eine Freude, Gäste bei uns zu haben, die die Musik und Kultur unserer Region schätzen. Wir hoffen, dass sie eines Tages wieder zu uns zurückkehren werden, um weitere Erkundungen in die Welt von Beethoven und seiner Musik zu unternehmen.', '../uploads/news/thumbnail_hafnerhaus-nach-huetter (1).jpg.jpg', '1668970529'),
(2, 'Eine unvergessliche Weihnachtsfeier im Hotel Sparta', 'Die Weihnachtszeit ist immer eine besondere Zeit im Hotel Sparta und in diesem Jahr haben wir uns besonders viel Mühe gegeben, um unseren Gästen eine unvergessliche Weihnachtsfeier zu bieten.\r\n\r\nAm Heiligabend haben wir unsere Gäste mit einem festlichen Weihnachtsmenü verwöhnt, das von unserem talentierten Küchenteam zubereitet wurde. Die Kombination aus traditionellen Weihnachtsgerichten und modernen Interpretationen hat bei allen Gästen für Begeisterung gesorgt.\r\n\r\nNach dem Essen haben wir uns in unserem Weihnachtszimmer versammelt, um gemeinsam Weihnachtslieder zu singen und Geschenke auszutauschen. Es war eine wunderbare Gelegenheit, sich mit Freunden und Familie zu entspannen und die Weihnachtsstimmung zu genießen.\r\n\r\nAm ersten Weihnachtsfeiertag haben wir eine Schlittschuhbahn auf unserem Hotelhof eröffnet, auf der unsere Gäste den Tag mit Schlittschuhlaufen verbringen konnten. Es war ein großer Erfolg und eine willkommene Abwechslung zu den traditionellen Weihnachtsaktivitäten.\r\n\r\nWir möchten uns bei allen Gästen bedanken, die uns die Ehre gegeben haben, ihre Weihnachtsfeier bei uns zu verbringen. Es war uns eine Freude, Teil ihrer Weihnachtsfeier zu sein und wir freuen uns darauf, sie nächstes Jahr wieder bei uns begrüßen zu dürfen.', '../uploads/news/thumbnail_w1449_h942_x724_y471_66a6b199f2de7175.jpg.jpg', '1672253729'),
(3, 'Ein spektakuläres Silvester im Hotel Sparta', 'Der Silvesterabend ist immer ein besonderer Anlass im Hotel Sparta und in diesem Jahr haben wir uns besonders viel Mühe gegeben, um unseren Gästen einen unvergesslichen Abend zu bieten.\r\n\r\nWir begannen den Abend mit einem köstlichen Silvestermenü, das von unserem talentierten Küchenteam zubereitet wurde. Während des Essens sorgte eine Live-Band für die Unterhaltung und sorgte für ausgelassene Stimmung.\r\n\r\nNach dem Essen haben wir uns auf unsere Terrasse begeben, um das spektakuläre Feuerwerk zu bewundern, das über der Stadt abgebrannt wurde. Es war ein beeindruckender Anblick und ein perfekter Weg, um das alte Jahr ausklingen zu lassen und das neue willkommen zu heißen.\r\n\r\nNach dem Feuerwerk haben wir uns wieder in unseren Festsaal begeben, wo die Party bis in die frühen Morgenstunden weiterging. Unsere Gäste haben getanzt und gefeiert, während die Live-Band weiterhin für Unterhaltung sorgte.\r\n\r\nWir möchten uns bei allen Gästen bedanken, die uns die Ehre gegeben haben, ihren Silvesterabend bei uns zu verbringen. Es war uns eine Freude, Teil ihres Silvesterabends zu sein und wir freuen uns darauf, sie nächstes Jahr wieder bei uns begrüßen zu dürfen.', '../uploads/news/thumbnail_Brix_Aussenansicht_Feuerwerk_01_MS-1.jpg.jpg', '1672772129'),
(4, 'Unser Punschstand - ein riesiger Erfolg!', 'Seit dem 1. Dezember haben wir vor unserem Hotel jedes Wochenende einen Punschstand eingerichtet und das Feedback von unseren Gästen und Besuchern war unglaublich positiv. Der Punschstand hat sich schnell zu einer beliebten Attraktion entwickelt und zieht jede Woche zahlreiche Besucher an.\r\n\r\nUnser Punsch wird frisch zubereitet und enthält eine perfekte Kombination aus fruchtigen Aromen, Gewürzen und Alkohol. Er ist die perfekte Ergänzung für die kalte Jahreszeit und hilft dabei, die Weihnachtsstimmung zu genießen.\r\n\r\nAuch die Atmosphäre bei unserem Punschstand ist einzigartig, dank der festlichen Beleuchtung und der Musik, die von unseren Live-Musikern gespielt wird. Es ist ein Ort, an dem man sich entspannen und die Gesellschaft von Freunden und Familie genießen kann.\r\n\r\nWir freuen uns sehr, dass unser Punschstand so gut ankommt und werden ihn noch bis Ende Januar jedes Wochenende aufrechterhalten. Wir laden alle herzlich ein, vorbeizuschauen und einen Becher Punsch zu genießen, während Sie die Weihnachtsstimmung in vollen Zügen genießen.', '../uploads/news/thumbnail_Punschhütte-Muskelforschung.jpg.jpg', '1673821833');

-- --------------------------------------------------------

--
-- Table structure for table `personen`
--

CREATE TABLE `personen` (
  `ID` int(11) NOT NULL,
  `vorname` varchar(64) NOT NULL,
  `nachname` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `passwort` varchar(60) NOT NULL,
  `anrede` varchar(8) NOT NULL,
  `admin` int(1) DEFAULT NULL,
  `aktiv` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personen`
--

INSERT INTO `personen` (`ID`, `vorname`, `nachname`, `username`, `email`, `passwort`, `anrede`, `admin`, `aktiv`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.at', '$2y$10$j2XogTGC3PaeScjP55ysreTr34iSfecY/JvN7RYhVSWUFYn4xfs/i', 'Herr', 1, 1),
(2, 'Robert', 'Dulca', 'roby', 'robert.dulca@gmail.com', '$2y$10$OIAcwEoBBTIoBrMBceaBK.18o4/eWB93/mY1hO5katY6O2VXpWV.i', 'Herr', 1, 1),
(3, 'Felix', 'Grassl', 'fx', 'felix.grassl@gmx.at', '$2y$10$JKCoVo.SSnhM6wQJYnwLX.4DCzIeb.zId9eFIcabRXQOvGGpbLDo2', 'Herr', 1, 1),
(4, 'Max', 'Mustermann', 'maxi', 'maxi@muster.at', '$2y$10$dUz08ZgFwNVcEK5XaNT9G.0QVvSM4mudZXeLIZj4CyeMdXO8aGOwW', 'Herr', NULL, 1),
(5, 'Jenny', 'Jokes', 'jennyjokes', 'jenny.jokes@gmail.com', '$2y$10$GNI3EaK0glrCwTu0T5xooeVQlmoQ2dLZf2BCBXhy4UFhp8e6NpnYK', 'Frau', NULL, 1),
(6, 'Sam', 'Rocks', 'justsam', 'sam@gmail.com', '$2y$10$Gp5NJ.A4TrrgajXzjXqHDuDXnVz9m9PPMvKuQcts23Rc6TkweK2zy', 'Divers', NULL, 1),
(7, 'Peter', 'Schuster', 'pete', 'peterschuster@gmail.com', '$2y$10$3pnszxfbVU4idJt9ECoVSuKFkYnPAZRTSiqiMFYEV776baXt5Nyrm', 'Herr', NULL, 1),
(8, 'Julia', 'Baum', 'juli99', 'baum@julia.at', '$2y$10$XHeMvpnshlg40J/ucYFqKe3H0HeJPL1mpFJcj/0P5qmO204ssS4py', 'Frau', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservierung`
--

CREATE TABLE `reservierung` (
  `ID` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `check_in` int(11) NOT NULL,
  `check_out` int(11) NOT NULL,
  `zimmer` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `breakfast` int(1) DEFAULT NULL,
  `parking` int(1) DEFAULT NULL,
  `pets` int(1) DEFAULT NULL,
  `buchungsdatum` varchar(255) NOT NULL,
  `gesamtbetrag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservierung`
--

INSERT INTO `reservierung` (`ID`, `person`, `check_in`, `check_out`, `zimmer`, `status`, `breakfast`, `parking`, `pets`, `buchungsdatum`, `gesamtbetrag`) VALUES
(1, 1, 1673737200, 1674169200, 0, 2, 1, 1, 1, '1673819515', 555),
(2, 4, 1673996400, 1674342000, 1, 1, NULL, 1, NULL, '1673819939', 616),
(3, 4, 1674946800, 1675119600, 2, 1, NULL, NULL, 1, '1673820458', 465),
(4, 7, 1673996400, 1674514800, 2, 1, NULL, 1, NULL, '1673821193', 1344),
(5, 6, 1674514800, 1674687600, 0, 0, NULL, NULL, 1, '1673821917', 205),
(6, 8, 1674169200, 1674428400, 1, 0, 1, NULL, NULL, '1673821955', 486);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `personen`
--
ALTER TABLE `personen`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `reservierung`
--
ALTER TABLE `reservierung`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personen`
--
ALTER TABLE `personen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservierung`
--
ALTER TABLE `reservierung`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
