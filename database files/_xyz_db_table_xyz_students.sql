
-- --------------------------------------------------------

--
-- Table structure for table `xyz_students`
--

CREATE TABLE `xyz_students` (
  `STID` int(4) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` char(25) NOT NULL,
  `CONFIRM_PASSWORD` char(25) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `SURNAME` varchar(30) NOT NULL,
  `EMAIL` text NOT NULL,
  `QUALIFICATION` varchar(15) NOT NULL,
  `CELL_NUMBER` int(10) NOT NULL,
  `GENDER` varchar(6) NOT NULL,
  `NATIONALITY` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
