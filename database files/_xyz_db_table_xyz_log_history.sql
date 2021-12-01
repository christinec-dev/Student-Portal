
-- --------------------------------------------------------

--
-- Table structure for table `xyz_log_history`
--

CREATE TABLE `xyz_log_history` (
  `ID` int(11) NOT NULL,
  `IPADDRESS` varbinary(16) NOT NULL,
  `TRYTIME` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
