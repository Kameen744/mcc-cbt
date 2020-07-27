-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 25, 2020 at 11:58 PM
-- Server version: 10.5.3-MariaDB-log
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcchstexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `ex_admin`
--

CREATE TABLE `ex_admin` (
  `id` int(11) NOT NULL,
  `ex_admin_user` varchar(100) DEFAULT NULL,
  `ex_admin_password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_admin`
--

INSERT INTO `ex_admin` (`id`, `ex_admin_user`, `ex_admin_password`) VALUES
(1, 'Kamal', '$2y$10$4xynRiJG/0kvIbHuAdC71OGEaPM/ccOo56mRXHMcxm9xO1IzQz3hi'),
(2, 'Admin', '$2y$10$xnQ6ASukNQWXxYs2IjkbmuIGdoXC/.vgMHVG7RU9yYANJ/zCDlxgq');

-- --------------------------------------------------------

--
-- Table structure for table `ex_courses`
--

CREATE TABLE `ex_courses` (
  `id` int(11) NOT NULL,
  `ex_course` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_courses`
--

INSERT INTO `ex_courses` (`id`, `ex_course`) VALUES
(1, 'CHEWRT'),
(2, 'FRESH'),
(3, 'ENGLISH LANGUAGE'),
(4, 'MATHEMATICS'),
(5, 'CURRENT AFFAIRS'),
(6, 'EVTRT'),
(7, 'DHDRT'),
(8, 'BIOLOGY'),
(9, 'CHEMISTRY'),
(10, 'ISLAMIC STUDIES');

-- --------------------------------------------------------

--
-- Table structure for table `ex_departments`
--

CREATE TABLE `ex_departments` (
  `id` int(11) NOT NULL,
  `ex_department` varchar(100) NOT NULL,
  `ex_department_code` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_departments`
--

INSERT INTO `ex_departments` (`id`, `ex_department`, `ex_department_code`) VALUES
(2, 'Biomedical Engineering Department', 'BME'),
(3, 'Community Health Department', 'CHD'),
(4, 'Dental Health Department', 'DHD'),
(5, 'Environmental Health Department', 'EHD'),
(6, 'Health Information Management', 'HIM'),
(7, 'Medical Laboratory Science', 'MLS'),
(8, 'Fresh', 'Fresh');

-- --------------------------------------------------------

--
-- Table structure for table `ex_departments_has_ex_courses`
--

CREATE TABLE `ex_departments_has_ex_courses` (
  `id` int(11) NOT NULL,
  `ex_departments_id` int(11) NOT NULL,
  `ex_courses_id` int(11) NOT NULL,
  `ex_noof_questions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_departments_has_ex_courses`
--

INSERT INTO `ex_departments_has_ex_courses` (`id`, `ex_departments_id`, `ex_courses_id`, `ex_noof_questions`) VALUES
(1, 2, 2, 40),
(2, 8, 3, 50),
(3, 8, 4, 10),
(4, 8, 5, 10),
(5, 8, 8, 10),
(6, 8, 9, 10),
(7, 8, 10, 10),
(8, 4, 3, 50),
(9, 4, 1, 50),
(10, 3, 3, 50),
(11, 3, 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `ex_duration`
--

CREATE TABLE `ex_duration` (
  `id` int(11) NOT NULL,
  `ex_hours` int(11) NOT NULL,
  `ex_minutes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ex_duration`
--

INSERT INTO `ex_duration` (`id`, `ex_hours`, `ex_minutes`) VALUES
(1, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `ex_instructions`
--

CREATE TABLE `ex_instructions` (
  `id` int(11) NOT NULL,
  `ex_instruction` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_instructions`
--

INSERT INTO `ex_instructions` (`id`, `ex_instruction`) VALUES
(1, 'Answer all questions\n');

-- --------------------------------------------------------

--
-- Table structure for table `ex_mark_sheet`
--

CREATE TABLE `ex_mark_sheet` (
  `id` int(11) NOT NULL,
  `ex_mark_sheet_Answer` varchar(5) NOT NULL,
  `ex_questions_id` int(11) NOT NULL,
  `ex_questions_ex_question_part_id` int(11) NOT NULL,
  `ex_questions_ex_question_part_section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ex_questions`
--

CREATE TABLE `ex_questions` (
  `id` int(11) NOT NULL,
  `ex_question` mediumtext NOT NULL,
  `option_a` mediumtext NOT NULL,
  `option_b` mediumtext NOT NULL,
  `option_c` mediumtext DEFAULT NULL,
  `option_d` mediumtext DEFAULT NULL,
  `option_r` varchar(10) NOT NULL,
  `ex_courses_id` int(11) NOT NULL,
  `ex_section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_questions`
--

INSERT INTO `ex_questions` (`id`, `ex_question`, `option_a`, `option_b`, `option_c`, `option_d`, `option_r`, `ex_courses_id`, `ex_section_id`) VALUES
(1, 'Which of the following best describes the topic of the passage?', 'Successful life', 'Our environment today', 'Environmental social vices', 'Remote and immediate cause of problems', 'B', 3, 1),
(2, 'According to the passage which among the social vices is devastating?', 'Kidnapping', 'Unemployment', 'Illiteracy', 'Poverty', 'C', 3, 1),
(3, 'One of the following is not among the common social vices in our environment?', 'Poverty', 'Illiteracy', 'Unemployment', 'Earthquake', 'D', 3, 1),
(4, 'Other name for social vice is ??????????.', 'Social interaction', 'Social problem', 'Social enjoyment', 'Social arrangement', 'B', 3, 1),
(5, 'According to the passage, innovation is one of the factors that ????? brings about.', '????? Employment', '????? Literacy', '????? Education', '???? Poverty', 'B', 3, 1),
(6, 'Another name for illiteracy is ??????.', '????? Literacy', '????? Intelligence', '????? Brilliance', '???? Ignorance', 'D', 3, 1),
(7, '????? How many paragraphs does the passage have?', '????? 5', '????? 3', '????? 4', '???? 1', 'B', 3, 1),
(8, '????? One of the following is the opposite of illiteracy.', '????? Education', '????? Marketing', '????? Travelling', '???? Teaching', 'A', 3, 1),
(9, 'According to the passage, two of the listed social vices are the most dangerous.', 'Poverty and illiteracy', 'Kidnapping and poverty', 'Illiteracy and', 'unemployment', 'C', 3, 1),
(10, '????? ??????????. is the bedrock of every successful life.', '????? Intelligence', '????? Exposure', '????? Literacy', '???? None of the above', 'C', 3, 1),
(11, 'Everyone of the students __________________ to be excited about the excursion.', '????? Was seeming', '????? Is seeming', '????? Seem', '???? Seems', 'C', 3, 2),
(12, 'We should assist the poor, _________________?', '????? Shall we', '????? Isn?t it', '????? Shouldn?t we', '???? We shouldn?t', 'C', 3, 2),
(13, 'I _________________ have done the dishes but I haven?t had the time', '????? Will', '????? Should', '????? Might', '???? Shall', 'B', 3, 2),
(14, 'I am totally disappointed _____________ such poor grades.', '????? From', '????? With', '????? For', '???? On', 'B', 3, 2),
(15, 'He spends a _______________ deal of his time studying,', '????? Large', '????? Great', '????? Big', '???? Huge', 'B', 3, 2),
(16, 'I look forward to _________________ from you.', '????? Hear', '????? Hearing', '????? Be hearing', '???? Have heard', 'B', 3, 2),
(17, 'The beans have not been properly _________________', '????? Grind', '????? Ground', '????? Grinding', '???? Grounded', 'A', 3, 2),
(18, 'I have made remarkable progress ____________ learning English.', '????? By', '????? At', '????? In', '???? For', 'A', 3, 2),
(19, 'The evening was rounded ____________ with a dance.', '????? Off', '????? Up', '????? Out', '???? Down', 'B', 3, 2),
(20, 'My brother ______________ in Lagos for the past ten years.', '????? Is living', '????? Lived', '????? Will have lived', '???? Has been living', 'D', 3, 2),
(21, 'The accused was asked to retract his statement.', '????? Recall', '????? Withdraw', '????? Make', '???? Rewrite', 'B', 3, 3),
(22, 'On the death of her father, friends went to express their condolences.', '????? Sympathy', '????? Pity', '????? Concern', '???? Worries', 'A', 3, 3),
(23, 'A magnificent structure was erected close to our house.', '????? Real', '????? Splendid', '????? Colourful', '???? Fine', 'B', 3, 3),
(24, 'A group of experts was brought in to verify the authenticity of the evidence.', '????? Support', '????? Improve', '????? Correct', '???? Ascertain', 'D', 3, 3),
(25, 'Due to the pressure of work, the old man had no alternative but to relinquish his post.', '????? Give out', '????? Give in', '????? Give up', '???? Give away', 'C', 3, 3),
(26, 'Industrious workers should be promoted and ___________________ ones should be dismissed.', '????? Indolent', '????? Dishonest', '????? Brilliant', '???? Sluggish', 'A', 3, 3),
(27, 'While some people _______ jollof rice, others enjoy it.', '????? Rebuff', '????? Abhor', '????? Ignore', '???? Condemn', 'B', 3, 3),
(28, 'Rather than heed the advice, the children _________ it.', '????? Defied', '????? Countered', '????? Ignored', '???? Spurned', 'A', 3, 3),
(29, 'Dishonest traders sell fake products instead of __________ ones.', '????? Costly', '????? Durable', '????? Genuine', '???? Perfect', 'C', 3, 3),
(30, 'Parents should persuade their children to do chores, not ___________ them.', '????? Implore', '????? Coerce', '????? Enjoin', '???? Cajole', 'B', 3, 3),
(31, 'I think children are more robust than adults.', '????? Healthy and strong', '????? Pleasant and cheerful', '????? Vital and dependable', '???? Plump and curry', 'A', 3, 4),
(32, 'The new law was meant to mitigate the people?s suffering.', '????? Restrain', '????? Moderate', '????? Stop', '???? Alleviate', 'D', 3, 4),
(33, 'The judge is incorruptible.', '????? Consistent', '????? Honest', '????? Responsible', '???? Outspoken', 'B', 3, 4),
(34, 'Whatever my boss decides is irrevocable.', '????? Final', '????? True', '????? Necessary', '???? Enforced', 'A', 3, 4),
(35, 'The printer took a cursory look at the document.', '????? Quick', '????? Long', '????? Puzzled', '???? Careful', 'A', 3, 4),
(36, 'This morning Audu arrived at the school looking disheveled.', '????? Worried', '????? Terrified', '????? Untidy', '???? Confused', 'C', 3, 4),
(37, 'Corporal punishment is meant to be a deterrent to indiscipline.', '????? Remedy', '????? Measure', '????? Discouragement', '???? Prevention', 'B', 3, 4),
(38, 'The new bank is thriving.', '????? Evolving', '????? Attractive', '????? Flourishing', '???? Supportive', 'C', 3, 4),
(39, 'It is not safe to engage in clandestine deals.', '????? Secret', '????? Exclusive', '????? Unimportant', '???? Doubtful', 'A', 3, 4),
(40, 'Bola vehemently denied stealing the money.', '????? Strongly', '????? Fearlessly', '????? Openly', '???? Strictly', 'A', 3, 4),
(43, 'Our mother always warns us against washing our dirty linen in public. This means that she warns us _______________', '????? Not to discuss private matters in public', '????? To fetch enough water for washing', '????? Not to soil our clothes', '???? To keep our mouth shut', 'A', 3, 5),
(44, 'Let us draw a veil over this matter. This means that we should ___________', '????? Avoid discussing the matter', '????? Take the matter to court', '????? Cover our heads with veil', '???? Get the elders to resolve the matter', 'A', 3, 5),
(45, 'Children think their parents are behind the times. This means that they think that their parents are ________', '????? Always late for work', '????? Not worried about new things', '????? Old fashioned', '???? Not duty conscious', 'B', 3, 5),
(46, 'Ever since that issue came up, I have been sitting on the fence. This means that I have been _', '????? Continuously in trouble', '????? Sitting above in the house', '????? Walking around to find a job', '???? Avoiding stating opinion', 'D', 3, 5),
(47, 'You must square up to your problems. This means that you have to _________', '????? Deal with your problems effectively', '????? Consider your problems from all angles', '????? Forget your problem', '???? Arrange your problems', 'A', 3, 5),
(48, 'Many of us escaped with the skin of our teeth during the crisis. This means that we _____', '????? Lost some of our teeth', '????? Narrowly escaped', '????? Quickly escaped', '???? Had marks on our skin', 'B', 3, 5),
(49, 'Peter and Paul get along like a house on fire. This means that they _________', '????? Have a very good relationship', '????? Are not on speaking terms', '????? Avoid each other always', '???? Pretend to like each other', 'D', 3, 5),
(50, 'When Victor?s father gave him a new car, he was lost for words. This means that Victor ___', '????? Did not like the car', '????? Forgot to show his gratitude', '????? Was overwhelmed', '???? Was not grateful', 'C', 3, 5),
(51, 'This film is a cut above the others. This means that it is _________', '????? Cut to look like the others', '????? Much better than the others', '????? Different from the others', '???? Inferior to the others', 'C', 3, 5),
(52, 'We knew our father was talking tongue-in-check when he spoke of a vacation abroad. This means that our father was ___________', '????? Sincere', '????? Courageous', '????? Joking', '???? Reasonable', 'C', 3, 5),
(53, '3 (1 + x) = 2, find the value of x', 'a)????? x =', 'b)????? =', 'c)????? x =', 'd)???? x = 2', 'A', 4, 0),
(54, 'Simplify 5 ? 2O', 'a)????? 2', 'b)????? 3', 'c)????? 4', 'd)???? 7', 'C', 4, 0),
(55, '?? Solve', '', '', '', '', '', 4, 0),
(56, '= 2', 'a)????? 20', 'b)????? 10', 'c)????? 5', 'd)???? 2', 'A', 4, 0),
(57, '4.????? If a = 2, b = 3, c = 6', '', '', '', '', '', 4, 0),
(58, 'Evaluate', '', '', '', '', '', 4, 0),
(59, 'Make P the subject of the relation, q =', '', '', '', '', 'C', 4, 0),
(60, 'a)????? ? 0.80', '-0.8', '-0.16', '-10.24', '-12.8', 'B', 4, 0),
(61, 'Simplify 5O', '5', '0', '1', '4', 'C', 4, 0),
(62, 'The value of 2O ? 1 is ___________', '0', '2', '1', '-1', 'A', 4, 0),
(63, 'K is inversely proportional to P can be express as _________', 'K', 'P', '1', 'Non', 'A', 4, 0),
(64, '2^5', '32', '31', '8', '16', 'a', 4, 0),
(65, 'a)????? K', '', '', '', '', '', 4, 0),
(66, 'b)????? K', '', '', '', '', '', 4, 0),
(67, 'P', '', '', '', '', '', 4, 0),
(68, 'c)????? K', '', '', '', '', '', 4, 0),
(69, 'd)???? K = P', '', '', '', '', '', 4, 0),
(70, '10.?  Find the 7th term of the sequence', '', '', '', '', '', 4, 0),
(71, '2, 5, 10, 17, 26 ????', '', '', '', '', '', 4, 0),
(72, 'a)????? 37', '', '', '', '', '', 4, 0),
(73, 'b)????? 48', '', '', '', '', '', 4, 0),
(74, 'c)????? 50', '', '', '', '', '', 4, 0),
(75, 'd)???? 63', '', '', '', '', '', 4, 0),
(76, 'Simplify 5 ? 2O', 'a)????? 2', 'b)????? 3', 'c)????? 4', 'd)???? 7', 'C', 4, 0),
(77, '?? Solve', '', '', '', '', '', 4, 0),
(78, '4.????? If a = 2, b = 3, c = 6', '', '', '', '', '', 4, 0),
(79, 'a)????? ? 0.80', '-0.8', '-0.16', '-10.24', '-12.8', 'B', 4, 0),
(80, 'The value of 2O ? 1 is ___________', '0', '2', '1', '-1', 'A', 4, 0),
(81, 'a)????? K', '', '', '', '', '', 4, 0),
(82, 'b)????? K', '', '', '', '', '', 4, 0),
(83, 'c)????? K', '', '', '', '', '', 4, 0),
(84, 'd)???? K = P', '', '', '', '', '', 4, 0),
(85, '10.?  Find the 7th term of the sequence', '', '', '', '', '', 4, 0),
(86, '2, 5, 10, 17, 26 ????', '', '', '', '', '', 4, 0),
(87, 'a)????? 37', '', '', '', '', '', 4, 0),
(88, 'b)????? 48', '', '', '', '', '', 4, 0),
(89, 'c)????? 50', '', '', '', '', '', 4, 0),
(90, 'd)???? 63', '', '', '', '', '', 4, 0),
(91, 'Biology simply referred to as ___________', '????? Study of life', '????? Study of animals only', '????? Study of plants only', '???? Study of chemics', 'A', 8, 0),
(92, 'Which of the following organisms is NOT a protozoan?', '????? Amoeba', '????? Ascaris', '????? Plasmodium', '???? Paramecium', 'B', 8, 0),
(93, 'The maintenance of a constant internal in an organism is known as _______', '????? Homeostasis', '????? Homoiothermy', '????? Dieresis', '???? Dialysis', 'A', 8, 0),
(94, 'Which of the following actions is NOT a voluntary action?', '????? Stealing', '????? Sneezing', '????? Fighting', '???? Cheating', 'B', 8, 0),
(95, 'The two main branches of biology are ___________', '????? Chemistry & Physics', '????? Ecology & Microbiology', '????? Botany & Zoology', '???? None of the above', 'C', 8, 0),
(96, 'The association between two organisms in which one of the organisms gains and the other loses is referred to as __________', '????? Saprophytism', '????? Commensalism', '????? Mutualism', '???? Parasitism', 'D', 8, 0),
(97, '7.????? Which of the following structures is NOT an organ of the digestive system?', '????? Oesophagus', '????? Pancreas', '????? Stomach', '???? Kidney', 'D', 8, 0),
(98, '8.????? The natural dwelling place of an organism is called ________________', '????? Ecological niche', '????? Habitat', '????? Population', '???? Environment', 'B', 8, 0),
(99, '9.????? Which of the following substances is NOT an excretory product of animals?', '????? Carbon dioxide', '????? Urea', '????? Sweat', '???? Oxygen', 'D', 8, 0),
(100, '10.? The organisms that feed on both plants and animals are referred to as ________', 'Canivore', 'Harbivore', 'Omnivore', 'Non of above', 'C', 8, 0),
(109, 'Which of the following structures is NOT an organ of the digestive system?', '????? Oesophagus', '????? Pancreas', '????? Stomach', '???? Kidney', 'D', 8, 6),
(110, 'The natural dwelling place of an organism is called ________________', '????? Ecological niche', '????? Habitat', '????? Population', '???? Environment', 'B', 8, 6),
(111, 'Which of the following substances is NOT an excretory product of animals?', '????? Carbon dioxide', '????? Urea', '????? Sweat', '???? Oxygen', 'D', 8, 6),
(112, 'The organisms that feed on both plants and animals are referred to as ________', 'Canivore', 'Harbivore', 'Omnivore', 'Non of above', 'C', 8, 6),
(113, 'The greatest thing Allah has forbidden is _________', '????? Zina', '????? Shirk', '????? Killing', '???? Fighting', 'B', 10, 7),
(114, 'According to Hadith 34 of an-Nawawi, evil in society can be corrected by the ____', '????? Preacher, teacher and sultan', '????? Hand, tongue and heart', '????? Sword, bow and arrow', 'Non', 'B', 10, 7),
(115, 'The first female to convert to Islam was _________', '????? Sumayyah Bint Khabba', '????? Khadija Bint Khuwaylid', '????? Asma? Bint Abu-Bakr', '???? Fatima Bint Muhammad', 'B', 10, 7),
(116, 'Who were those people with whom Allah was pleased and they were pleased with Him, as mentioned in Qur?an?', '????? Prophets', '????? Companions of Prophet Muhammad (SAW)', '????? Angels', '???? Jinns', 'B', 10, 7),
(117, 'Where was the Qur?an revealed first?', '????? Madina', '????? Makkah', '????? Misrah', '???? Riyad', 'B', 10, 7),
(118, 'The significance of Sadaqah is to ______________', '????? Recognize the rich', '????? Alleviate poverty', '????? Accumulate wealth', '???? Recognize the poor', 'B', 10, 7),
(119, 'When do you pray Maghrib?', '????? Sunrise', '????? Sunset', '????? Afternoon', '???? Evening', 'B', 10, 7),
(120, 'Who was the first person to deliver the call to prayer?', '????? Abu-Bakr (R', '????? Bilal Ibn Rabah (R', '????? Abdullahi Ibn Zaid (R', '???? Umar Ibn Khattab (R', 'B', 10, 7),
(121, 'What is the total number of prophets?', '????? 25', '????? 50', '????? Unknown', '???? None of the above', 'C', 10, 7),
(122, 'Who is the dearest friend of Prophet Muhammad (SAW)?', '????? Umar (R', '????? Abu-Bakr (R', '????? Usman (R', '???? Aliyu (R', 'B', 10, 7),
(123, 'Who were those people with whom Allah was pleased and they were pleased with Him, as mentioned in Qur?an?', '????? Prophets', '????? Companions of Prophet Muhammad (SAW)', '????? Angels', '???? Jinns', 'B', 10, 7),
(124, 'Where was the Qur?an revealed first?', '????? Madina', '????? Makkah', '????? Misrah', '???? Riyad', 'B', 10, 7),
(125, 'Who were those people with whom Allah was pleased and they were pleased with Him, as mentioned in Qur?an?', '????? Prophets', '????? Companions of Prophet Muhammad (SAW)', '????? Angels', '???? Jinns', 'B', 10, 7),
(126, 'Where was the Qur?an revealed first?', '????? Madina', '????? Makkah', '????? Misrah', '???? Riyad', 'B', 10, 7),
(127, 'Water molecules are hold together by:', '????? Covelant bond', '????? Hydrogen bond', '????? Lonk forces', '???? Vander Waals forces', 'B', 9, 8),
(128, 'Which among the following acids is an organic acid?', '????? Sulphoric acid', '????? Hydrochronic acid', '????? Alkanoic acid', '???? Nitric acid', 'C', 9, 8),
(129, 'A negatively charged particle in an atom is the _______', '????? Electron', '????? Neutron', '????? Positron', '???? Proton', 'A', 9, 8),
(130, 'The general gas equation was driven from _______________', '????? Boyle?s and Lussac?s Law', '????? Boyle?s and Graham?s Law', '????? Boyle?s and Charles law', '???? Dalton?s atomic theory', 'C', 9, 8),
(131, 'The equation below represents NaOH + Hcl ? Nacl + H2O', '????? Neutralization', '????? Hydrolysis', '????? Oxidation', '???? Reduction', 'A', 9, 8),
(132, '? The positively charged ion is known as ___________', '????? Anion', '????? Cation', '????? Alloy', '???? Proton', 'B', 9, 8),
(133, 'In the periodic table, all the elements within the same group have the same ______', '????? Number of neutrons', '????? Number of valence electrons', '????? Number of isotopes', '???? Atomic number', 'B', 9, 8),
(134, 'The solution which has pH > 7 is _____________', '????? Acidic', '????? Neutral', '????? Alkaline', '???? Ionic', 'C', 9, 8),
(135, '_____________________ turns red litmus paper blue', '????? Acid', '????? Base', '????? Alkane', '???? Alkene', 'B', 9, 8),
(136, 'Which of the following is not among the requirements for filtration?', '????? Funnal', '????? Filter paper', '????? Bunsen burner', 'Beaker', 'C', 9, 8),
(137, 'The positively charged ion is known as ___________', 'Anion', 'Cation', 'Alloy', 'Proton', 'B', 9, 8),
(138, 'What does the eagle in the Nigerian Coat of Arm represents?', '????? Peace', '????? Unity', '????? Strength', '???? Terrorism', 'C', 5, 10),
(139, 'What is the name of the current INEC Chairman?', '????? Prof. Attahiru Jega', '????? Prof. Maurice Iwu', '????? Prof. Auwalu Yadudu', '???? Prof. Mahmoud Yakubu', 'D', 5, 10),
(140, 'Which of the following is NOT among the courses offered by MCCHST Funtua?', '????? CHEW', '????? MLT', '????? RADIOLOGY', '???? DHT', 'C', 5, 10),
(141, 'The current Nigerian Central Bank Governor is __________', '????? Alh. Sanusi Lamido Sanusi', '????? Godwin Emifiele', '????? Dr Obadiah Mailafiya', '???? Kemi Adeosun', 'B', 5, 10),
(142, 'When did Nigeria got her independence?', '????? 29th May, 1960', '????? 11th October, 1960', '????? 1st October, 1960', '???? 30th October, 1960', 'C', 5, 10),
(143, 'The name of the current Vice President is _____________', '????? Chief Olusegun Obasanjo', '????? Prof. Yemi Osinbajo', '????? Bola Ahmed Tinubu', '???? Raji Fashola', 'B', 5, 10),
(144, 'What does the white colour in Nigerian flag stands for?', '????? Unity', '????? Peace', '????? Agriculture', '???? Strength', 'B', 5, 10),
(145, 'Which of the following is the MOST affected state on the issue of kidnapping?', '????? Kano State', '????? Jigawa State', '????? Kebbi State', '???? Zamfara State', 'D', 5, 10),
(146, 'Where is Muslim Community College of Health Science & Technology located?', '????? Sokoto Road', '????? Katsina Road', '????? Bakori Road', '???? Zaria Road', 'A', 5, 10),
(147, 'Today?s date is ________________', '????? 20/05/2019', '????? 21/05/2019', '????? 22/05/2019', '23/05/2019', 'DATE OF TH', 5, 10),
(163, '3 (1 + x) = 6, find the value of x', '1', '2', '3', '3', 'A', 4, 11),
(164, 'Simplify x + 3, When x=2', '3', '2', '5', '4', 'C', 4, 11),
(165, 'Which of the following is not a prime number', '2', '9', '3', '7', 'B', 4, 11),
(166, 'Which of the following numbers is the smallest', '-1', '-0.5', '0', '1', 'A', 4, 11),
(167, 'Solve the equation 12a+26b-4b-16a', '4a+22b', 'Neg28a+30b)', 'Neg4a+22b)', '28a+30b', 'C', 4, 11),
(168, 'What is /-20/', '-20', '0', '1', '20', 'D', 4, 11),
(169, 'Simplify (x-4)(x+5)', 'x^2+5x-20', 'x^2+-4x-20', 'x^2-x-20', 'x^2+x-20', 'D', 4, 11),
(170, 'Rice weighing 3.5Kg was devided equally and placed in four containers. How many grams of rice were in each container?', '758', '875', '578', '857', 'B', 4, 11),
(171, 'What is the radius of a circle that has a circumference of 3.14 meters. Take pi=3.14', '0.5', '1', '-1', '-0.5', 'A', 4, 11),
(172, 'If Logx (1/8) is -3/2, find the value of X', '-4', '4', '0.25', '10', 'B', 4, 11),
(183, '&lt;p&gt;What is the &lt;i&gt;name&lt;/i&gt; of the &lt;u&gt;&lt;b&gt;current&lt;/b&gt;&lt;/u&gt; governor of &lt;b&gt;Katsina State&lt;/b&gt;?&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Aminu Muhammad Masari&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Aminu Ahmad Masari&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Aminu Bello Masari&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;Dallatun Masari&lt;br&gt;&lt;/p&gt;', 'C', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ex_scores`
--

CREATE TABLE `ex_scores` (
  `id` int(11) NOT NULL,
  `ex_score` int(11) NOT NULL,
  `ex_courses_id` int(11) NOT NULL,
  `ex_students_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ex_sections`
--

CREATE TABLE `ex_sections` (
  `id` int(11) NOT NULL,
  `ex_section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_sections`
--

INSERT INTO `ex_sections` (`id`, `ex_section`) VALUES
(1, 'SECTION 1'),
(2, 'SECTION II'),
(3, 'SECTION III'),
(4, 'SECTION IV'),
(5, 'SECTION V'),
(7, 'Part C IRS'),
(8, 'Part E Chem'),
(9, 'PartB Bio'),
(10, 'Part F CA'),
(11, 'Part D Math');

-- --------------------------------------------------------

--
-- Table structure for table `ex_section_questions`
--

CREATE TABLE `ex_section_questions` (
  `id` int(11) NOT NULL,
  `ex_section_question` longtext DEFAULT NULL,
  `ex_sections_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_section_questions`
--

INSERT INTO `ex_section_questions` (`id`, `ex_section_question`, `ex_sections_id`) VALUES
(1, '&lt;p class=&quot;MsoNormal&quot; style=&quot;margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;text-indent:.5in&quot;&gt;&lt;span style=&quot;font-size:12.0pt;line-height:115%;\r\nfont-family:&amp;quot;Times New Roman&amp;quot;,&amp;quot;serif&amp;quot;;mso-ascii-theme-font:major-bidi;\r\nmso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi&quot;&gt;Our Environment\r\nis faced with so many kinds of social vices. The most common among them are\r\nilliteracy, poverty, unemployment, kidnapping and area boysm.&lt;o:p&gt;&lt;/o:p&gt;&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot; style=&quot;margin-bottom:0in;margin-bottom:.0001pt;text-align:\r\njustify;text-indent:.5in&quot;&gt;&lt;span style=&quot;font-size:12.0pt;line-height:115%;\r\nfont-family:&amp;quot;Times New Roman&amp;quot;,&amp;quot;serif&amp;quot;;mso-ascii-theme-font:major-bidi;\r\nmso-hansi-theme-font:major-bidi;mso-bidi-theme-font:major-bidi&quot;&gt;While some\r\npeople are of the view that ‘unemployment’ is the remote cause of social vices,\r\nothers are of the view that ‘illiteracy’ is the most devastating one and the\r\nremote cause of other social vices.&lt;o:p&gt;&lt;/o:p&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;\r\n\r\n\r\n\r\n&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot; style=&quot;margin-right:-.25in;text-align:justify;text-indent:\r\n.5in&quot;&gt;&lt;span style=&quot;font-size:12.0pt;line-height:115%;font-family:&amp;quot;Times New Roman&amp;quot;,&amp;quot;serif&amp;quot;;\r\nmso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:\r\nmajor-bidi&quot;&gt;For example, illiteracy → unemployment → poverty → area boys →\r\nkidnapping. Being literate brings about good reasoning, innovation, social\r\ninteraction, exposure etc. Literacy is the bedrock of every successful life.&amp;nbsp;&lt;o:p&gt;&lt;/o:p&gt;&lt;/span&gt;&lt;/p&gt;', 1),
(2, '&lt;p class=&quot;MsoNormal&quot; style=&quot;margin-top:0in;margin-right:-.25in;margin-bottom:\r\n0in;margin-left:0in;margin-bottom:.0001pt;text-align:justify&quot;&gt;&lt;span style=&quot;font-size:12.0pt;line-height:115%;font-family:&amp;quot;Times New Roman&amp;quot;,&amp;quot;serif&amp;quot;;\r\nmso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:\r\nmajor-bidi&quot;&gt;From the words or group of lettered A to D, choose the word or\r\ngroup of words that best completes each of the following sentences.&lt;o:p&gt;&lt;/o:p&gt;&lt;/span&gt;&lt;/p&gt;', 2),
(4, '&lt;p&gt;&lt;span style=&quot;font-size:12.0pt;line-height:115%;\r\nfont-family:&amp;quot;Times New Roman&amp;quot;,&amp;quot;serif&amp;quot;;mso-ascii-theme-font:major-bidi;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:\r\nmajor-bidi;mso-bidi-theme-font:major-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA&quot;&gt;From the list of words lettered A to D, choose\r\nthe one that is most nearly opposite in meaning to the underlined word, and\r\nthat will, at the same time, correctly fill the gap in the sentence&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 3),
(5, '&lt;p class=&quot;MsoNormal&quot; style=&quot;margin-top:0in;margin-right:-.25in;margin-bottom:\r\n0in;margin-left:0in;margin-bottom:.0001pt;text-align:justify&quot;&gt;&lt;span style=&quot;font-size:12.0pt;line-height:115%;font-family:&amp;quot;Times New Roman&amp;quot;,&amp;quot;serif&amp;quot;;\r\nmso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:\r\nmajor-bidi&quot;&gt;From the words lettered A to D below each of the following\r\nsentences, choose the word or group of words that is nearest in meaning to the\r\nunderlined word as it is used in the sentence.&lt;o:p&gt;&lt;/o:p&gt;&lt;/span&gt;&lt;/p&gt;', 4),
(6, '&lt;p class=&quot;MsoNormal&quot; style=&quot;margin-right:-.25in;text-align:justify&quot;&gt;&lt;span style=&quot;font-size:12.0pt;line-height:115%;font-family:&amp;quot;Times New Roman&amp;quot;,&amp;quot;serif&amp;quot;;\r\nmso-ascii-theme-font:major-bidi;mso-hansi-theme-font:major-bidi;mso-bidi-theme-font:\r\nmajor-bidi&quot;&gt;After each of the following sentences, a list of possible\r\ninterpretations is given. Choose the interpretation that is &lt;b&gt;&lt;i&gt;most\r\nappropriate&lt;/i&gt;&lt;/b&gt;&lt;i&gt; &lt;/i&gt;for each sentence.&lt;o:p&gt;&lt;/o:p&gt;&lt;/span&gt;&lt;/p&gt;', 5),
(7, '&lt;p&gt;Answer All Questions&lt;/p&gt;', 6),
(9, '&lt;p&gt;Answer all Questions&lt;/p&gt;', 7),
(10, '&lt;p&gt;Answer all Questions&lt;/p&gt;', 10),
(11, '&lt;p&gt;Answer all Questions&lt;/p&gt;', 11),
(12, '&lt;p&gt;Answer All Questions&lt;/p&gt;', 8),
(13, '&lt;p&gt;Answer all Questions&lt;/p&gt;', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ex_start_stop`
--

CREATE TABLE `ex_start_stop` (
  `id` int(11) NOT NULL,
  `ex_start` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_start_stop`
--

INSERT INTO `ex_start_stop` (`id`, `ex_start`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ex_students`
--

CREATE TABLE `ex_students` (
  `id` int(11) NOT NULL,
  `ex_serial_no` varchar(100) NOT NULL,
  `ex_full_name` varchar(200) NOT NULL,
  `ex_gender` varchar(45) DEFAULT NULL,
  `ex_state` varchar(45) NOT NULL,
  `ex_phone` varchar(45) DEFAULT NULL,
  `ex_modeofentry` varchar(45) NOT NULL,
  `ex_first_choice` varchar(250) NOT NULL,
  `ex_second_choice` varchar(250) DEFAULT NULL,
  `ex_password` varchar(200) NOT NULL,
  `ex_departments_id` varchar(45) NOT NULL,
  `ex_created_at` date DEFAULT NULL,
  `ex_apprv` varchar(45) DEFAULT NULL,
  `ex_remark` varchar(45) DEFAULT NULL,
  `ex_olevel` varchar(200) DEFAULT NULL,
  `ex_olevel_2` varchar(45) DEFAULT NULL,
  `ex_recomd` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ex_stu_attempts`
--

CREATE TABLE `ex_stu_attempts` (
  `id` int(11) NOT NULL,
  `ex_students_id` int(11) NOT NULL,
  `ex_questions_id` int(11) NOT NULL,
  `ex_answer` varchar(10) DEFAULT NULL,
  `ex_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ex_stu_status`
--

CREATE TABLE `ex_stu_status` (
  `id` int(11) NOT NULL,
  `ex_stu_finished` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ex_stu_time`
--

CREATE TABLE `ex_stu_time` (
  `id` int(11) NOT NULL,
  `ex_stu_hours` int(11) NOT NULL,
  `ex_stu_minutes` int(11) NOT NULL,
  `ex_stu_seconds` int(11) NOT NULL,
  `ex_students_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ex_stu_time`
--

INSERT INTO `ex_stu_time` (`id`, `ex_stu_hours`, `ex_stu_minutes`, `ex_stu_seconds`, `ex_students_id`) VALUES
(2, 0, 22, 46, 3),
(3, 0, 2, 25, 2),
(4, 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ex_admin`
--
ALTER TABLE `ex_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_courses`
--
ALTER TABLE `ex_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_departments`
--
ALTER TABLE `ex_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_departments_has_ex_courses`
--
ALTER TABLE `ex_departments_has_ex_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_duration`
--
ALTER TABLE `ex_duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_instructions`
--
ALTER TABLE `ex_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_mark_sheet`
--
ALTER TABLE `ex_mark_sheet`
  ADD PRIMARY KEY (`id`,`ex_questions_id`,`ex_questions_ex_question_part_id`,`ex_questions_ex_question_part_section_id`);

--
-- Indexes for table `ex_questions`
--
ALTER TABLE `ex_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_scores`
--
ALTER TABLE `ex_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_sections`
--
ALTER TABLE `ex_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_section_questions`
--
ALTER TABLE `ex_section_questions`
  ADD PRIMARY KEY (`id`,`ex_sections_id`);

--
-- Indexes for table `ex_start_stop`
--
ALTER TABLE `ex_start_stop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_students`
--
ALTER TABLE `ex_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_stu_attempts`
--
ALTER TABLE `ex_stu_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_stu_status`
--
ALTER TABLE `ex_stu_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_stu_time`
--
ALTER TABLE `ex_stu_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ex_admin`
--
ALTER TABLE `ex_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ex_courses`
--
ALTER TABLE `ex_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ex_departments`
--
ALTER TABLE `ex_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ex_departments_has_ex_courses`
--
ALTER TABLE `ex_departments_has_ex_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ex_duration`
--
ALTER TABLE `ex_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ex_instructions`
--
ALTER TABLE `ex_instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ex_mark_sheet`
--
ALTER TABLE `ex_mark_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ex_questions`
--
ALTER TABLE `ex_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `ex_scores`
--
ALTER TABLE `ex_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ex_sections`
--
ALTER TABLE `ex_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ex_section_questions`
--
ALTER TABLE `ex_section_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ex_start_stop`
--
ALTER TABLE `ex_start_stop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ex_students`
--
ALTER TABLE `ex_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `ex_stu_attempts`
--
ALTER TABLE `ex_stu_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT for table `ex_stu_status`
--
ALTER TABLE `ex_stu_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ex_stu_time`
--
ALTER TABLE `ex_stu_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
