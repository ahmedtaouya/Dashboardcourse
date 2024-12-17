SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Alter the table to add the auto-incrementing id column
ALTER TABLE tablecourse ADD id INT AUTO_INCREMENT PRIMARY KEY;

CREATE TABLE `tablecourse` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `course1` varchar(80) NOT NULL,
  `course2` varchar(80) NOT NULL,
  `course3` varchar(80) NOT NULL,
  `course4` varchar(80) NOT NULL,
  `course5` varchar(80) NOT NULL,
  `course6` varchar(80) NOT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into tablecourse with appropriate values
INSERT INTO `tablecourse` (`course1`, `course2`, `course3`, `course4`, `course5`, `course6`) VALUES
('billard', 'water foot', 'football american', 'tennis', 'volleyball', 'football'),
('francais', 'anglais', 'arabe', 'phisique', 'math', 'svt');

-- Create users table
CREATE TABLE `users` (
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(80) NOT NULL,
  `middleName` varchar(80) NOT NULL,
  `dob` datetime(6) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `Courses` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into users table
INSERT INTO `users` (`firstName`, `lastName`, `middleName`, `dob`, `email`, `password`, `Courses`) VALUES
('', '', '', '0000-00-00 00:00:00.000000', '', '', ''),
('ahmed', 'Taouya', '', '1994-03-04 00:00:00.000000', 'ahmad.taouya@gmail.com', '12345', ''),
('Yassir', 'albakri', '', '2021-04-03 00:00:00.000000', 'yassirelbakri@gmail.com', '060504', '');
COMMIT;
