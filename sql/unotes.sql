-- phpMyAdmin SQL Dump
-- version 5.0.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2018 at 10:40 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `file_name` varchar(260) NOT NULL,
  `extension` varchar(260) NOT NULL,
  `url` varchar(2083) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `note_id`, `file_name`, `extension`, `url`) VALUES
(1, 1, 'lorem-impsum', 'pdf', 'user_uploads/note_files/pdf/lorem-ipsum.pdf'),
(2, 1, 'image', 'jpg', 'user_uploads/note_files/jpg/image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` varchar(180) NOT NULL,
  `text_content` text NOT NULL,
  `num_views` int(11) NOT NULL DEFAULT '0',
  `author_id` int(11) NOT NULL DEFAULT '-1',
  `num_files` int(11) NOT NULL,
  `category` int(11) NOT NULL COMMENT '0: uni, etc.',
  `subcategory` varchar(30) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `description`, `text_content`, `num_views`, `author_id`, `num_files`, `category`, `subcategory`, `creation_date`) VALUES
(1, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim. ', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget justo sem. Nam fermentum ipsum sed erat varius, eget feugiat enim varius. Aliquam in eros semper, bibendum massa non, viverra nisl. Mauris egestas dolor in fringilla malesuada. Sed laoreet nibh in est pellentesque efficitur. Maecenas iaculis placerat ultricies. Morbi id sagittis arcu, id imperdiet mauris. Etiam consequat et neque sit amet consectetur. Maecenas molestie, tellus vel dignissim tristique, justo tellus varius risus, sit amet accumsan elit dolor sit amet leo. Nullam ac orci nibh. Aenean accumsan ligula urna, non viverra mauris tincidunt quis.\r\n\r\nAenean dictum ullamcorper lobortis. Duis tempus tincidunt facilisis. Integer enim lectus, volutpat eget dictum a, tempus sed enim. Phasellus sem mi, vehicula sed augue nec, dignissim suscipit turpis. Nunc hendrerit, neque eget convallis sodales, massa orci congue sem, quis vulputate velit metus vel purus. Vestibulum eu hendrerit felis, et sodales felis. Sed volutpat congue mi, vitae placerat eros scelerisque at. Aenean ultricies tempor augue nec rhoncus. Morbi sollicitudin mollis fermentum. Maecenas a tortor et dolor varius scelerisque. Quisque nec ornare tortor. Pellentesque vulputate vitae dui vel lacinia. Praesent libero leo, pellentesque sit amet ante et, aliquet cursus dui.\r\n\r\nMorbi justo nunc, dignissim vel facilisis eget, vestibulum eu lectus. Nullam convallis odio sem, dignissim commodo sapien euismod non. Integer sem ipsum, mollis vitae ex quis, malesuada volutpat velit. Vestibulum ipsum neque, semper et porta nec, aliquet et ligula. Pellentesque sed pulvinar nisl, vel dictum magna. Suspendisse luctus fermentum interdum. Aenean id nunc velit. Aenean nec justo vitae ante fringilla aliquet nec a lorem. Donec pellentesque velit nec ligula blandit placerat. ', 71, -1, 1, 0, '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
