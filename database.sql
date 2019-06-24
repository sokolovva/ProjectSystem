SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmi_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `teachers` (
  `username` varchar(6) DEFAULT NULL,
  `password` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `teachers` (`username`, `password`) VALUES
('maria', 1111),
('svetla', 2222),
('vaska', 3333);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `projects` (
  `id` int(1) DEFAULT NULL,
  `title` varchar(38) DEFAULT NULL,
  `project` varbinary,
  `comment` text,
  `stundets` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `majors`
--
/* 
INSERT INTO `majors` (`id`, `title`, `type`, `students_count`, `accepted_students`, `min_grade`) VALUES
(1, 'Софтуерно инженерство', 'Бакалавър', 8, '9601132569 9608243781 9604278567 9611278572 9603132564 9609132567 8911204509 9205127622', '0.00'),
(2, 'Компютърни науки', 'Бакалавър', 8, '9604278575 9601232565 9612243785 9602243786 9604278568 9608283789 9601132562 9103024572', '0.00'),
(3, 'Информатика', 'Бакалавър', 7, '9608243782 9411126210 9608043788 9604278570 9601032568 9606179405 9608243783', '0.00'),
(4, 'Информационни системи', 'Бакалавър', 6, '9601282566 9608143787 9601132563 9608243790 9604278576 9604278569', '0.00'),
(5, 'Изкуствен интелект', 'Магистър', 8, '9108243782 9202243786 9203132564 9201132564 9204278569 9211278573 9212243786 9208243786', '0.00'),
(6, 'Компютърна графика', 'Магистър', 8, '9201232565 9609243781 9205278571 9211278572 9204278571 9205167833 8906224509 8910224509', '0.00'),
(7, 'Логика и алгоритми', 'Магистър', 7, '9201232566 9212243785 9201282566 9202278567 9208243785 9204278568 9208243784', '0.00'),
(8, 'Математическо моделиране в икономиката', 'Магистър', 7, '9202243787 9607174408 9205167832 9204278570 9201132561 9201132562 9201132565', '0.00');
 */
-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `username` varchar(27) DEFAULT NULL,
  `password` varchar(27) DEFAULT NULL,
  `FN` int(9) DEFAULT NULL,
  `projects` varchar(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`username`, `password`, `FN`, `projects`) VALUES
('petya','1234', 893671455),
('Красимира Найденова Нанчева','tgdfnhgxcn' 893674455),
('Павел Станиславов Миленков', '6457httrhtr6' 882356780),
('Димитър Янков Младенов','6fw44576' 883658370),


--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`EGN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;