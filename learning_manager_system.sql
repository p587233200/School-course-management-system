-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-05-15 17:32:33
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `learning_manager_system`
--

-- --------------------------------------------------------

--
-- 資料表結構 `announcement`
--

CREATE TABLE `announcement` (
  `announcementID` bigint(20) UNSIGNED NOT NULL,
  `courseID` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `announcement`
--

INSERT INTO `announcement` (`announcementID`, `courseID`, `title`, `content`, `timestamp`) VALUES
(1, 1, '請寫homework_1', '加油1', '2025-05-13 05:33:19'),
(2, 1, '請寫homework_2', '加油2', '2025-05-13 05:33:19'),
(3, 8, '請寫 veritatis', 'Et voluptas ad veniam ut totam ut.', '2025-05-13 05:33:19'),
(4, 1, '請寫 tenetur', 'Ut repellendus architecto eos culpa enim magnam.', '2025-05-13 05:33:19'),
(5, 8, '請寫 recusandae', 'Repellendus optio non magni iste.', '2025-05-13 05:33:19'),
(6, 4, '請寫 quas', 'Eos corporis neque beatae officia libero consequatur voluptas.', '2025-05-13 05:33:19'),
(7, 6, '請寫 sit', 'Rerum omnis porro in eos ad minus adipisci quisquam.', '2025-05-13 05:33:19'),
(8, 6, '請寫 nulla', 'Eius sunt ratione qui voluptatem.', '2025-05-13 05:33:19'),
(9, 7, '請寫 iure', 'Enim assumenda magni rerum animi ratione quia.', '2025-05-13 05:33:19'),
(10, 6, '請寫 nisi', 'Ea officia provident aperiam cum ab.', '2025-05-13 05:33:19'),
(11, 2, '請寫 molestiae', 'Iure a sunt sed non omnis ad voluptatem.', '2025-05-13 05:33:19'),
(12, 3, '請寫 voluptatem', 'Consectetur autem in sit sit quo adipisci aut.', '2025-05-13 05:33:19'),
(13, 3, '請寫 inventore', 'Inventore animi temporibus illo quo asperiores sapiente.', '2025-05-13 05:33:19'),
(14, 3, '請寫 voluptatem', 'Voluptates ut est assumenda provident vitae.', '2025-05-13 05:33:19'),
(15, 10, '請寫 perferendis', 'Aut quo aut facere numquam voluptatem itaque modi.', '2025-05-13 05:33:19'),
(16, 7, '請寫 rerum', 'Quaerat facilis laudantium enim eos laboriosam quo repudiandae.', '2025-05-13 05:33:19'),
(17, 5, '請寫 enim', 'Aut sequi laboriosam incidunt explicabo occaecati dolores fuga.', '2025-05-13 05:33:19'),
(18, 5, '請寫 officiis', 'Eum excepturi eum in.', '2025-05-13 05:33:19'),
(19, 1, '請寫 nihil', 'Quibusdam reiciendis aut omnis eaque laboriosam ut.', '2025-05-13 05:33:19'),
(20, 3, '請寫 et', 'Quaerat vel possimus iusto iure eveniet eum id.', '2025-05-13 05:33:19'),
(21, 9, '請寫 blanditiis', 'Quia fuga hic consequatur sequi ut et nobis sunt.', '2025-05-13 05:33:19'),
(22, 3, '請寫 ullam', 'Nam amet voluptatem dolorem nulla aut qui.', '2025-05-13 05:33:19'),
(23, 6, '請寫 provident', 'Expedita fugit vero aut veniam exercitationem.', '2025-05-13 05:33:19'),
(24, 9, '請寫 est', 'Non rem voluptas molestiae deleniti aliquid.', '2025-05-13 05:33:19'),
(25, 5, '請寫 praesentium', 'Debitis libero explicabo dolores quia.', '2025-05-13 05:33:19'),
(26, 8, '請寫 est', 'Aut debitis omnis ducimus ut sint vitae consequuntur.', '2025-05-13 05:33:19'),
(27, 4, '請寫 necessitatibus', 'Corporis quibusdam optio earum voluptatum consequatur.', '2025-05-13 05:33:19'),
(28, 10, '請寫 necessitatibus', 'Animi tenetur repudiandae placeat id quod eum voluptas nisi.', '2025-05-13 05:33:19'),
(29, 8, '請寫 facere', 'Assumenda aut corporis placeat sunt nobis omnis.', '2025-05-13 05:33:19'),
(30, 5, '請寫 voluptas', 'Et consequuntur ut nostrum similique vero rerum.', '2025-05-13 05:33:19'),
(31, 2, '請寫 voluptates', 'Vitae est eos quae exercitationem eos.', '2025-05-13 05:33:19'),
(32, 10, '請寫 ut', 'Corporis asperiores assumenda eum odio.', '2025-05-13 05:33:19');

-- --------------------------------------------------------

--
-- 資料表結構 `assignment`
--

CREATE TABLE `assignment` (
  `assignmentID` bigint(20) UNSIGNED NOT NULL,
  `courseID` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `assignment`
--

INSERT INTO `assignment` (`assignmentID`, `courseID`, `title`, `content`, `deadline`) VALUES
(1, 1, 'homework_1', '我是作業內容1', '2025-04-30 23:59:59'),
(2, 1, 'homework_2', '我是作業內容2', '2025-12-31 23:59:59');

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `courseID` bigint(20) UNSIGNED NOT NULL,
  `teacherID` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `taID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `course`
--

INSERT INTO `course` (`courseID`, `teacherID`, `name`, `taID`) VALUES
(1, 'T123456789', '資料庫系統', 'M133040021'),
(2, 'T123456789', '分散式計算系統', 'M133040001'),
(3, 'T123456789', '作業系統', 'M133040001'),
(4, 'T123456789', '網際網路系統', 'M133040021'),
(5, 'T123456789', '編譯器製作', 'M133040021'),
(6, 'T123456789', '專題製作實驗', 'M133040021'),
(7, 'T123456788', '高等網路', 'M133040006'),
(8, 'T123456787', 'Unix', 'M133040006'),
(9, 'T123456787', '英文寫作', 'M133040006'),
(10, 'T123456786', '電子層級設計', 'M133040021');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_4_30_01_create_student_table', 1),
(2, '2025_4_30_02_create_teacher_table', 1),
(3, '2025_4_30_03_create_course_table', 1),
(4, '2025_4_30_04_create_announcement_table', 1),
(5, '2025_4_30_05_create_assignment_table', 1),
(6, '2025_4_30_06_create_student_select_course_table', 1),
(7, '2025_4_30_07_create_student_submit_assignment_table', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `studentID` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `student`
--

INSERT INTO `student` (`studentID`, `name`, `email`, `password`) VALUES
('M133040001', '路人1', 'm133040001@gmail.com', '$2y$12$tQn4JI7CYus1flEhilMFfetIo9FffhPT8bPl5Je7vY0KehUtyorDG'),
('M133040006', '丁襄龍', 'm133040006@gmail.com', '$2y$12$v/jfY2soXx/tx9iAwzKHjOoPIc5M1mn849vI7Aw87EhLwDsaE1z02'),
('M133040021', '許哲晟', 'm133040021@gmail.com', '$2y$12$N992xIzSfQX2zhUaywKknOh/o4QOpURhOOm/46lDaAEgJ6kGVMj0.');

-- --------------------------------------------------------

--
-- 資料表結構 `student_select_course`
--

CREATE TABLE `student_select_course` (
  `studentID` varchar(10) NOT NULL,
  `courseID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `student_select_course`
--

INSERT INTO `student_select_course` (`studentID`, `courseID`) VALUES
('M133040006', 1),
('M133040006', 2),
('M133040021', 1),
('M133040021', 2),
('M133040021', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `student_submit_assignment`
--

CREATE TABLE `student_submit_assignment` (
  `studentID` varchar(10) NOT NULL,
  `assignmentID` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `submit_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `student_submit_assignment`
--

INSERT INTO `student_submit_assignment` (`studentID`, `assignmentID`, `score`, `feedback`, `submit_timestamp`, `file_url`) VALUES
('M133040006', 2, 66, 'so so !', '2025-05-13 05:33:19', 'assignments/M133040006_assignment_homework_2.docx'),
('M133040021', 1, 100, 'homework_1寫得太棒了1', '2025-05-13 05:33:19', 'assignments/M133040021_assignment_homework_1.docx'),
('M133040021', 2, 99, 'homework_2寫得太棒了1', '2025-05-13 05:33:19', 'assignments/M133040021_assignment_homework_2.docx');

-- --------------------------------------------------------

--
-- 資料表結構 `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `teacher`
--

INSERT INTO `teacher` (`teacherID`, `name`, `email`, `password`) VALUES
('T123456786', '鄺獻榮', 't123456786@gmail.com', '$2y$12$UfVE0F/W3/Ln/dswv2Vlxee8MfY4ugQHNDSEIhmYyaKnDA29BcOVu'),
('T123456787', '希家史提夫', 't123456787@gmail.com', '$2y$12$2n3bZvL76wmA1dyo.mWyO.gqfFnozbfV3tKLC5.3Ul/y/G94lqThu'),
('T123456788', '林俊宏', 't123456788@gmail.com', '$2y$12$PMLyYkkPVZ59WmAVszB/g.svWyAkfu3cDDTbO2Y/MrRYvS3cUCmDu'),
('T123456789', '張玉盈', 't123456789@gmail.com', '$2y$12$2wkodJRL7UlRQIgjyuyuYuokKziJ0kytXF5JmcIUOVO2lwLROLOTG');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcementID`),
  ADD KEY `announcement_courseid_foreign` (`courseID`);

--
-- 資料表索引 `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentID`),
  ADD KEY `assignment_courseid_foreign` (`courseID`);

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `course_teacherid_foreign` (`teacherID`),
  ADD KEY `course_taid_foreign` (`taID`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `student_studentid_unique` (`studentID`);

--
-- 資料表索引 `student_select_course`
--
ALTER TABLE `student_select_course`
  ADD PRIMARY KEY (`studentID`,`courseID`),
  ADD KEY `student_select_course_courseid_foreign` (`courseID`);

--
-- 資料表索引 `student_submit_assignment`
--
ALTER TABLE `student_submit_assignment`
  ADD PRIMARY KEY (`studentID`,`assignmentID`),
  ADD KEY `student_submit_assignment_assignmentid_foreign` (`assignmentID`);

--
-- 資料表索引 `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcementID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignmentID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course`
--
ALTER TABLE `course`
  MODIFY `courseID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_courseid_foreign` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`);

--
-- 資料表的限制式 `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_courseid_foreign` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`);

--
-- 資料表的限制式 `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_taid_foreign` FOREIGN KEY (`taID`) REFERENCES `student` (`studentID`),
  ADD CONSTRAINT `course_teacherid_foreign` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacherID`);

--
-- 資料表的限制式 `student_select_course`
--
ALTER TABLE `student_select_course`
  ADD CONSTRAINT `student_select_course_courseid_foreign` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`),
  ADD CONSTRAINT `student_select_course_studentid_foreign` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);

--
-- 資料表的限制式 `student_submit_assignment`
--
ALTER TABLE `student_submit_assignment`
  ADD CONSTRAINT `student_submit_assignment_assignmentid_foreign` FOREIGN KEY (`assignmentID`) REFERENCES `assignment` (`assignmentID`),
  ADD CONSTRAINT `student_submit_assignment_studentid_foreign` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
