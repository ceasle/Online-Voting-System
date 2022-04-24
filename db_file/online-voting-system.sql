SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+05:30";


--
-- Database: `online-voting-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
   PRIMARY KEY (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `voter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;



CREATE TABLE `candidates` (
   `id` int(11) NOT NULL, 
   FOREIGN KEY (`id`) REFERENCES `voter`(`id`),
  `position` int(1) not null,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `candidates` ADD `lastUpdated` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ; 




CREATE TABLE `status` (
  `id` int(11) NOT NULL, 
  `position` int(1) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `voter` (`name`, `mobile`, `password`, `address`, `photo`,`role`) VALUES
('Bharat Mishra', 1111111111, 123456, 'A', 'boy.png', 1),
('Sujith Reddy', 1111111112, 123456, 'B', 'boy1.jpg', 1);
