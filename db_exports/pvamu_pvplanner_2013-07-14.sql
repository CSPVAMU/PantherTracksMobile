-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2013 at 08:54 AM
-- Server version: 5.5.28
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pvamu_pvplanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `courseID` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Unique identifier for a course.',
  `subject` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'General subject of course.',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `creditHours` int(11) NOT NULL,
  `level` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Corresponds to recommended year; 1 = freshman, 2 =  sophomore, 3 = junior, 4 = senior, 0 = remedial',
  `fall` tinyint(1) NOT NULL COMMENT 'Set to true if this course is usually offered in the fall.',
  `spring` tinyint(1) NOT NULL COMMENT 'Set to true if this course is usually offered in the spring.',
  `summer` tinyint(1) NOT NULL COMMENT 'Set to true if this course is usually offered in the summer.',
  `coreqs` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'courseID of co-requisite if applicable. ',
  `prereqs` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Catalog description of course.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `courseID` (`courseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=127 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseID`, `subject`, `title`, `creditHours`, `level`, `fall`, `spring`, `summer`, `coreqs`, `prereqs`, `description`) VALUES
(1, 'MATH1124', 'MATH', 'Calculus with Analytic Geometry I', 4, '1', 1, 1, 0, 'GNEG1121', '[[''MATH 1115'',''MATH 1123'']]', 'Functions and graphs, limits and continuity, derivatives of functions, Mean Value Theorem, applications of derivatives. Fundamental Theorem of Calculus and applications of integrals. Prerequisite: Grade of C or higher in both MATH 1113 and MATH 1123 or MATH 1115 or equivalently ready (passing the Calculus preparedness test administered by the Mathematics Departments) ** (MATH 2413)'),
(2, 'GNEG1121', 'GNEG', 'Engineering Application Lab II for Math', 1, '1', 1, 1, 0, 'MATH1124', '', ''),
(5, 'COMP1011', 'COMP', 'Introduction to Engineering Studies', 1, '1', 1, 1, 0, '', '', ''),
(6, 'COMP1021', 'COMP', 'Introduction to Computer Science', 1, '1', 1, 1, 0, '', '', ''),
(7, 'COMP1214', 'COMP', 'Computer Science I and Laboratory I', 4, '1', 1, 1, 0, '', '', ''),
(8, 'ENGL1123', 'ENGL', 'Freshman Composition I', 3, '1', 1, 1, 0, '', '', ''),
(9, 'MATH2024', 'MATH', 'Calculus with Analytic Geometry II', 4, '2', 1, 1, 0, '', '[''MATH 1124'']', 'Applications of integrals, inverse functions, integration techniques, indeterminate forms, improper integrals, parametric equations, polar coordinates, infinite series, power series, Taylor series. Prerequisite: MATH 1124. (with a grade of “C” or higher. ** (MATH 2414)).'),
(10, 'GNEG2021', 'GNEG', 'Engineering Application Lab III for Math', 1, '2', 1, 1, 0, '', '', ''),
(11, 'COMM1003', 'COMM', 'Fundamentals of Speech Communication', 3, '1', 1, 1, 0, '', '', ''),
(13, 'COMP2013', 'COMP', 'Data Structures', 3, '2', 1, 1, 0, '', '', ''),
(14, 'HIST1313', 'HIST', 'U.S. History to 1876', 3, '1', 1, 1, 0, '', '', ''),
(15, 'COMP2103', 'COMP', 'Discrete Structures', 3, '2', 1, 1, 0, '', '', ''),
(16, 'ENGL1143', 'ENGL', 'Technical Writing', 3, '1', 1, 1, 0, '', '', ''),
(19, 'COMP2033', 'COMP', 'Assembly Language', 3, '2', 1, 1, 0, '', '', ''),
(22, 'POSC1113', 'POSC', 'American Government I', 3, '1', 1, 1, 0, '', '', ''),
(25, 'PSYC2213', 'PSYC', 'Mental Hygiene', 3, '2', 0, 0, 0, '', '', ''),
(26, 'MATH3073', 'MATH', 'Linear Algebra', 3, '3', 1, 1, 0, '', '[''MATH 2024'']', 'Systems of linear equations, matrices, real vector spaces, linear transformations, change of bases, determinants, eigenvalues and eigenvectors, diagonalization and inner product spaces. Prerequisite: MATH 2024 with grade of “C” or higher or Approval of the Mathematics Department Head.'),
(27, 'COMP3033', 'COMP', 'Digital Logic Circuit', 3, '3', 1, 1, 0, '', '', ''),
(28, 'COMP3034', 'COMP', 'Computer Organization', 3, '3', 1, 1, 0, '', '', ''),
(29, 'MATH3023', 'MATH', 'Probability and Statistics', 3, '3', 1, 1, 0, '', '[''MATH 1124'']', 'Counting problems, probability theory, infinite sample spaces, random numbers and their usage, random variables, basic movements, variances, binomial geometric, uniform, exponential, and normal distributions, point estimation, confidence limits, hypothesis testing, applications of Bayes’ Theorem, sums of independent random variables, law of large numbers, and Central Limit Theorem. Prerequisites: MATH 1124 with grade of “C” or higher.'),
(30, 'COMP3053', 'COMP', 'Analysis of Algorithms', 3, '3', 1, 1, 0, '', '', ''),
(31, 'COMP3063', 'COMP', 'Operating Systems', 3, '3', 1, 1, 0, '', '', ''),
(32, 'COMP3223', 'COMP', 'Software Engineering', 3, '3', 1, 1, 0, '', '', ''),
(35, 'COMP4001', 'COMP', 'Ethics and Soc. Issues in Computing', 1, '4', 1, 1, 0, '', '', ''),
(36, 'COMP4072', 'COMP', 'Senior Design Project I', 2, '4', 1, 1, 0, '', '', ''),
(37, 'COMP4123', 'COMP', 'Computer Networks', 3, '4', 1, 1, 0, '', '', ''),
(38, 'COMP4133', 'COMP', 'Formal Language Automation', 3, '4', 1, 1, 0, '', '', ''),
(39, 'COMP4953', 'COMP', 'Database Management', 3, '4', 1, 1, 0, '', '', ''),
(41, 'COMP4082', 'COMP', 'Senior Design Project II', 2, '4', 1, 1, 0, '', '', ''),
(42, 'COMP4113', 'COMP', 'Programming Languages Design', 3, '4', 1, 1, 0, '', '', ''),
(44, 'HIST1323', 'HIST', 'U.S. History 1876 to Present', 3, '1', 1, 1, 0, '', '', ''),
(45, 'ARCH1253', 'ARCH', 'Arch Design I', 0, '1', 0, 0, 0, '', '', ''),
(46, 'ARCH2233', 'ARCH', 'History Of Arch I', 3, '2', 0, 0, 0, '', '', ''),
(47, 'ARCH2243', 'ARCH', 'History Of Arch II', 3, '2', 0, 0, 0, '', '', ''),
(48, 'ARTS1203', 'ARTS', 'Introduction to Visual Arts ', 3, '1', 0, 0, 0, '', '', ''),
(49, 'ARTS2223', 'ARTS', 'History Of Arts I', 3, '2', 0, 0, 0, '', '', ''),
(50, 'ARTS2233', 'ARTS', 'History Of Arts II', 3, '2', 0, 0, 0, '', '', ''),
(51, 'ARTS2283', 'ARTS', 'Afro-American Art ', 3, '2', 0, 0, 0, '', '', ''),
(52, 'CHEM1011', 'CHEM', 'Chemistry I Lab', 1, '1', 1, 1, 0, '', '', ''),
(53, 'CHEM1033', 'CHEM', 'Chemistry I', 3, '1', 1, 1, 0, '', '', ''),
(54, 'COMP1211', 'COMP', 'Computer Science Laboritory I', 1, '1', 0, 0, 0, 'COMP1213', '', ''),
(55, 'COMP1213', 'COMP', 'Computer Science I', 3, '1', 0, 0, 0, 'COMP1211', '', ''),
(56, 'COMP1224', 'COMP', 'Computer Science II and Laboratory II', 4, '1', 1, 1, 0, '', '', ''),
(57, 'COMP2003', 'COMP', 'Introduction to Web Design & Multimedia', 3, '2', 0, 0, 0, '', '', ''),
(58, 'COMP2143', 'COMP', 'Introduction to Java', 3, '2', 0, 0, 0, '', '', ''),
(59, 'COMP3113', 'COMP', 'Object Oriented Analysis & Design', 3, '3', 0, 0, 0, '', '', ''),
(60, 'COMP3203', 'COMP', 'System Analysis and Design', 3, '3', 0, 0, 0, '', '', ''),
(61, 'COMP3213', 'COMP', 'Graphics and Visual Computing', 3, '3', 0, 0, 0, '', '', ''),
(62, 'COMP4063', 'COMP', 'Artificial Intelligence', 3, '4', 0, 0, 0, '', '', ''),
(63, 'COMP4073', 'COMP', 'Special Topics', 3, '4', 0, 0, 0, '', '', ''),
(64, 'COMP4843', 'COMP', 'Human-Computer Interaction', 3, '4', 0, 0, 0, '', '', ''),
(65, 'COMP4963', 'COMP', 'Introduction to Service Computing', 3, '4', 0, 0, 0, '', '', ''),
(66, 'COMP4991', 'COMP', 'Independent Study', 3, '4', 0, 0, 0, '', '', ''),
(67, 'COMP4992', 'COMP', 'Independent Study', 3, '4', 0, 0, 0, '', '', ''),
(68, 'COMP4993', 'COMP', 'Independent Study', 3, '4', 0, 0, 0, '', '', ''),
(69, 'CRJS1123', 'CRJS', 'Crime in America', 3, '1', 0, 0, 0, '', '', ''),
(70, 'CRJS1133', 'CRJS', 'Principal of Criminal Justice', 3, '1', 0, 0, 0, '', '', ''),
(71, 'CRJS1223', 'CRJS', 'Prevention and Control ', 3, '1', 0, 0, 0, '', '', ''),
(72, 'DESN1123', 'DESN', 'Design II', 3, '1', 0, 0, 0, '', '', ''),
(73, 'DESN2113', 'DESN', 'Design Illustration', 3, '2', 0, 0, 0, '', '', ''),
(74, 'DRAM1103', 'DRAM', 'Introduction To Theater', 3, '1', 0, 0, 0, '', '', ''),
(75, 'DRAM2113', 'DRAM', 'Theater History I ', 3, '2', 0, 0, 0, '', '', ''),
(76, 'DRAM2123', 'DRAM', 'Theater History II', 3, '2', 0, 0, 0, '', '', ''),
(77, 'DRAM2213', 'DRAM', 'African American Theater I', 3, '2', 0, 0, 0, '', '', ''),
(78, 'DRAM2223', 'DRAM', 'African American Theater II', 3, '2', 0, 0, 0, '', '', ''),
(79, 'ECON2113', 'ECON', 'Principle Of Microeconomics', 3, '2', 0, 0, 0, '', '', ''),
(80, 'ECON2123', 'ECON', 'Principle Of Macroeconomics ', 3, '2', 0, 0, 0, '', '', ''),
(81, 'ENGL0100', 'ENGL', 'Writing Basics', 0, '0', 1, 1, 0, '', '', 'This is a basic writing course designed to focus on the basic elements of composition writing to include the writing process, writing mechanics, sentence structure, and paragraph writing. There is a strong emphasis on identifying correct sentence structure and mechanics in written material and drafting topic sentences that introduce unified, coherent paragraphs. Classroom instruction is enhanced by required lab-based activities. THEA score (0-170), ACCUPLACE Score (0-59), COMPASS Score (0-45).'),
(82, 'ENGL0112', 'ENGL', 'Intermediate Writing', 2, '0', 1, 1, 0, '', '', 'This is an intermediate level writing course designed for those students with a stronger background in grammar skills but who need further help developing paragraphs, essays, and short themes. Emphasis is placed on improving the skills related to writing a thesis statementand writing unified, coherent essays. Classroom instruction is enhanced by required labbased activities. THEA score (171-200), ACCUPLACE Score (60-69), COMPASS Score (46-51) or successfully complete ENGL 0100.'),
(83, 'ENGL0131', 'ENGL', 'Pre-Composition', 1, '0', 1, 1, 0, '', '', 'This is an advanced writing course designed to prepare students for Freshman Composition I. Students will be expected to write compositions similar to those assigned in Freshman Composition I. Emphasis is placed on the use of enhanced critical thinking skills, editing skills, writing multi-paragraph essays, paraphrasing passages, and an introduction to research writing. THEA score (201-219), ACCUPLACE Score (70-79), COMPASS Score (52-58) or successfully complete ENGL 0112.'),
(84, 'ENGL2153', 'ENGL', 'Intro. To Literature', 3, '2', 0, 0, 0, '', '', ''),
(85, 'ENGL2263', 'ENGL', 'English Literature I', 3, '2', 0, 0, 0, '', '', ''),
(86, 'FINA2103', 'FINA', 'Personal financial management', 3, '2', 0, 0, 0, '', '', ''),
(87, 'GEOG2633', 'GEOG', 'Cultural Geography', 3, '2', 0, 0, 0, '', '', ''),
(88, 'HDFM2513', 'HDFM', 'Childhood Disorders', 3, '2', 0, 0, 0, '', '', ''),
(89, 'HDFM2533', 'HDFM', 'Contem. Family in Cross Cult', 3, '2', 0, 0, 0, '', '', ''),
(90, 'HDFM2553', 'HDFM', 'Human Development ', 3, '2', 0, 0, 0, '', '', ''),
(91, 'HIST1813', 'HIST', 'Survey of Civilization to 1500', 3, '1', 1, 1, 0, '', '', ''),
(92, 'HIST1823', 'HIST', 'Survey of Civi.1500 to Present', 3, '1', 0, 0, 0, '', '', ''),
(93, 'JIST1813', 'JIST', 'Survey of Civilization to 1500', 3, '1', 0, 0, 0, '', '', ''),
(94, 'MATH0100', 'MATH', 'Pre-Algebra', 0, '0', 1, 1, 0, '', '', 'This course is designed to improve the student skills involving basic arithmetic computations to include integers, fractions, decimals, and percents. There will be a strong emphasis on solving and graphing linear equations as well as basic polynomial manipulations. Pre-requisite. THEA Score (0-200), ACCUPLACE Score (0-35), COMPASS Score (0-20).'),
(95, 'MATH0113', 'MATH', 'Beginning Algebra', 3, '0', 1, 1, 0, '', '', 'This course is designed to present a careful and guided review of the basic mathematical concepts to improve and strengthen the student fundamental understanding of mathematics. The topics will include solving and graphing linear equations and inequalities, solving linear systems, determining the equation of a line and slope of lines. The course will also cover manipulation of polynomials to include factoring, ratios, solving rational equations and geometric applications. THEA score (201-217), ACCUPLACE Score (36-49), COMPASS Score (21-29) or successfully complete MATH 0100.'),
(96, 'MATH0133', 'MATH', 'Intermediate Algebra', 3, '0', 1, 1, 0, '', '', 'This course is design to make the transition to College Algebra more successful. Topics include advanced algebraic operations, factoring with an emphasis on rational, radical, and quadratic equations. Students will be introduced to functions with emphasis on function evaluation, graphs, composition, and inverse. THEA score (218-229), ACCUPLACE Score (50-62), COMPASS Score (30-38) or successfully complete MATH 0113.'),
(97, 'MATH1113', 'MATH', 'College Algebra', 3, '1', 1, 1, 0, '', '', 'Functions and their graphs, linear and quadratic equations, systems of equations, logarithms, exponential and logarithmic equations, binomial theorem, progressions. ** (MATH 1314) Prerequisite:THEA Math 230 and THEA Exwa 301. Must have a “C” or higher in Pre-Algebra, if applicable.'),
(98, 'MATH1115', 'MATH', 'Algebra and Trigonometry', 5, '1', 1, 1, 0, '', '', 'A basic course in mathematics for students needing additional pre-calculus skills, including algebra and trigonometry. Topics included are linear, quadratic, and higher degree polynomial functions and identities. Combinational formulas, probability, determinants and systems of linear equations, inverse trigonometric functions, and trigonometric equations. Prerequisite: THEA Math 230 and THEA Exwa 301.'),
(99, 'MATH1123', 'MATH', 'Trigonometry', 3, '1', 1, 1, 0, '', '[''MATH 1113'']', 'Trigonometric functions, radian, inverse trigonometric functions, functions of composite angles, and identities; and trigonometric equations. Prerequisite: MATH 1113 or equivalent with grade of “C” or higher ** (MATH 1316).'),
(100, 'MATH2053', 'MATH', 'Discrete Mathematics', 3, '', 0, 0, 0, '', '', ''),
(101, 'MGMT2203', 'MGMT', 'Leadership and ethics in business', 3, '2', 0, 0, 0, '', '', ''),
(102, 'MUSC1213', 'MUSC', 'Fundamentals Of Music', 3, '1', 0, 0, 0, '', '', ''),
(103, 'MUSC1223', 'MUSC', 'Fundamentals Of Music', 3, '1', 0, 0, 0, '', '', ''),
(104, 'MUSC1313', 'MUSC', 'Music in Contemporary Life', 3, '1', 1, 1, 0, '', '', ''),
(105, 'MUSC2333', 'MUSC', 'Afro-American Music', 3, '2', 0, 0, 0, '', '', ''),
(106, 'PHIL2013', 'PHIL', 'Introduction to Philosophy', 3, '2', 0, 0, 0, '', '', ''),
(107, 'PHIL2023', 'PHIL', 'Ethics', 3, '2', 0, 0, 0, '', '', ''),
(108, 'PHYS2511', 'PHYS', 'Physics I Lab', 1, '2', 1, 1, 0, '', '', ''),
(109, 'PHYS2512', 'PHYS', 'Physics I', 3, '2', 1, 1, 0, '', '', ''),
(110, 'PHYS2521', 'PHYS', 'Physics II Lab', 1, '2', 1, 1, 0, '', '', ''),
(111, 'PHYS2523', 'PHYS', 'Physics II', 3, '2', 1, 1, 0, '', '', ''),
(112, 'POSC1123', 'POSC', 'American Government II', 3, '1', 1, 1, 0, '', '', ''),
(113, 'POSC2213', 'POSC', 'Blacks In American Pol. Sys', 3, '2', 0, 0, 0, '', '', ''),
(114, 'POSC2503', 'POSC', 'Intro. To Global Issues', 3, '2', 0, 0, 0, '', '', ''),
(115, 'PSYC1113', 'PSYC', 'General Psychology ', 3, '1', 0, 0, 0, '', '', ''),
(116, 'PSYC2323', 'PSYC', 'Child Psychology', 3, '2', 0, 0, 0, '', '', ''),
(117, 'PSYC2413', 'PSYC', 'Fundamentals of Statistics I ', 3, '2', 0, 0, 0, '', '', ''),
(118, 'PSYC2513', 'PSYC', 'Psychology of Personality', 3, '2', 0, 0, 0, '', '', ''),
(119, 'RDNG0100', 'RDNG', 'Reading Basics', 0, '0', 1, 1, 0, '', '', 'This is a basic reading course designed to improve students’ overall basic reading and critical reading skills. Emphasis is on reading comprehension, vocabulary development, study techniques, and critical thinking skills. Classroom instruction is enhanced by required lab-based activities. THEA Score (0-199), ACCUPLACE Score (0-55), COMPASS Score (68-80).'),
(120, 'RDNG0112', 'RDNG', 'Intermediate Reading', 2, '0', 1, 1, 0, '', '', 'This is an intermediate level reading course designed to improve efficiency through word analysis skills, vocabulary, comprehension, and rate. Sentence/paragraph writing is required to complement extensive and varied reading activities. Emphasis is placed on external reading assignments. Classroom instruction is enhanced by required lab-based activities. THEA score (200-215), ACCUPLACE Score (56-68), COMPASS Score (55-68) or successfully complete RDNG 0100.'),
(121, 'RDNG0131', 'RDNG', 'Comprehensive Reading', 1, '0', 1, 1, 0, '', '', 'This is an advanced level reading course with an emphasis on learning the higher level reading skills required for college level reading assignments. Emphasis is placed on crosscurriculum reading. Short paragraph writing is required to compliment some reading activities. Additionally, a minimum of one novel will be read and accompanied by a critical analysis paper. THEA score (216-229), ACCUPLACE Score (69-77), COMPASS Score (69-80) or successfully complete RDNG 0112.'),
(122, 'SOCG1013', 'SOCG', 'General Sociology', 3, '1', 0, 0, 0, '', '', ''),
(123, 'SOCG2003', 'SOCG', 'Sociology Of Minorities', 3, '2', 0, 0, 0, '', '', ''),
(124, 'SOCG2013', 'SOCG', 'The Family', 3, '2', 0, 0, 0, '', '', ''),
(125, 'SPCH1003', 'SPCH', 'Fundamentals of Speech Comm', 3, '1', 0, 0, 0, '', '', ''),
(126, 'ENGL2273 ', 'ENGL', 'English Literature II', 3, '2', 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `degreePlanData`
--

CREATE TABLE IF NOT EXISTS `degreePlanData` (
  `planID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`planID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `degreePlanData`
--

INSERT INTO `degreePlanData` (`planID`, `name`, `description`) VALUES
(1, 'Computer Science (2012)', ''),
(2, 'Computer Science (2008)', '');

-- --------------------------------------------------------

--
-- Table structure for table `degreePlanRequirements`
--

CREATE TABLE IF NOT EXISTS `degreePlanRequirements` (
  `planID` int(11) NOT NULL,
  `requirement` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `courseOptions` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  KEY `planID` (`planID`),
  KEY `courseOptions` (`courseOptions`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `degreePlanRequirements`
--

INSERT INTO `degreePlanRequirements` (`planID`, `requirement`, `courseOptions`) VALUES
(1, 'MATH1124', 'MATH1124'),
(1, 'SCI CI', 'PHYS2513'),
(1, 'SCI LI', 'PHYS2511'),
(1, 'GNEG1121', 'GNEG1121'),
(1, 'COMP1011', 'COMP1011'),
(1, 'COMP1021', 'COMP1021'),
(1, 'COMP1214', 'COMP1214'),
(1, 'ENGL1123', 'ENGL1123'),
(1, 'MATH2024', 'MATH2024'),
(1, 'GENG2021', 'GENG2021'),
(1, 'COMM1003', 'COMM1003'),
(1, 'COMP1224', 'COMP1224'),
(1, 'SCI CII', 'CHEM1033'),
(1, 'SCI LII', 'CHEM1011'),
(1, 'SCI CII', 'PHYS2513'),
(1, 'SCI LII', 'PHYS2511'),
(1, 'SCI CIII', 'CHEM1043'),
(1, 'SCI LIII', 'CHEM1021'),
(1, 'SCI CIII', 'CHEM1033'),
(1, 'SCI LIII', 'CHEM1011'),
(1, 'SCI CIII', 'BIOL1113'),
(1, 'SCI LIII', 'BIOL1111'),
(1, 'COMP2013 ', 'COMP2013'),
(1, 'HIST1313 ', 'HIST1313'),
(1, 'COMP2103 ', 'COMP2103'),
(1, 'ENGL1143 ', 'ENGL1143'),
(1, 'COMP2033 ', 'COMP2033'),
(1, 'POSC1113 ', 'POSC1113'),
(1, 'COMP LEI', 'COMP2003'),
(1, 'COMP LEII', 'COMP2143'),
(1, 'POSC1123 ', 'POSC1123'),
(1, 'MATH3073 ', 'MATH3073'),
(1, 'COMP3033 ', 'COMP3033'),
(1, 'COMP3043 ', 'COMP3043'),
(1, 'MATH3023 ', 'MATH3023'),
(1, 'COMP3053 ', 'COMP3053'),
(1, 'COMP3063 ', 'COMP3063'),
(1, 'COMP3223 ', 'COMP3223'),
(1, 'COMP UEI', 'COMP3113'),
(1, 'COMP UEI', 'COMP3203'),
(1, 'COMP UEI', 'COMP3213'),
(1, 'COMP UEI', 'COMP4063'),
(1, 'COMP UEI', 'COMP4073'),
(1, 'COMP UEI', 'COMP4843'),
(1, 'COMP UEI', 'COMP4963'),
(1, 'COMP UEI', 'COMP4991'),
(1, 'COMP UEI', 'COMP4992'),
(1, 'COMP UEI', 'COMP4993'),
(1, 'COMP UEII', 'COMP3113'),
(1, 'COMP UEII', 'COMP3203'),
(1, 'COMP UEII', 'COMP3213'),
(1, 'COMP UEII', 'COMP4063'),
(1, 'COMP UEII', 'COMP4073'),
(1, 'COMP UEII', 'COMP4843'),
(1, 'COMP UEII', 'COMP4963'),
(1, 'COMP UEII', 'COMP4991'),
(1, 'COMP UEII', 'COMP4992'),
(1, 'COMP UEII', 'COMP4993'),
(1, 'COMP LEI', 'COMP2143'),
(1, 'COMP LEII', 'COMP2003'),
(1, 'H&V CoreI', 'DRAM2213'),
(1, 'H&V CoreI', 'DRAM2223'),
(1, 'H&V CoreI', 'ENGL2153'),
(1, 'H&V CoreI', 'ENGL2263'),
(1, 'H&V CoreI', 'ENGL2273'),
(1, 'H&V CoreI', 'MGMT2203'),
(1, 'H&V CoreI', 'MUSC1223'),
(1, 'H&V CoreI', 'MUSC2333'),
(1, 'H&V CoreI', 'PHIL2013'),
(1, 'H&V CoreI', 'PHIL2103'),
(1, 'H&V CoreI', 'FINA2103'),
(1, 'H&V CoreI', 'ARCH1253'),
(1, 'H&V CoreI', 'ARCH2233'),
(1, 'H&V CoreI', 'ARCH2243'),
(1, 'H&V CoreI', 'ARTS1203'),
(1, 'H&V CoreI', 'ARTS2223'),
(1, 'H&V CoreI', 'ARTS2233'),
(1, 'H&V CoreI', 'ARTS2283'),
(1, 'H&V CoreI', 'DRAM1103'),
(1, 'H&V CoreI', 'DRAM2113'),
(1, 'H&V CoreI', 'DRAM2123'),
(1, 'H&V CoreI', 'DESN1123'),
(1, 'H&V CoreI', 'DESN2113'),
(1, 'H&V CoreI', 'MUSC1213'),
(1, 'H&V CoreI', 'MUSC1313'),
(1, 'H&V CoreII', 'ARCH1253'),
(1, 'H&V CoreII', 'ARCH2233'),
(1, 'H&V CoreII', 'ARCH2243'),
(1, 'H&V CoreII', 'ARTS1203'),
(1, 'H&V CoreII', 'ARTS2223'),
(1, 'H&V CoreII', 'ARTS2233'),
(1, 'H&V CoreII', 'ARTS2283'),
(1, 'H&V CoreII', 'DRAM1103'),
(1, 'H&V CoreII', 'DRAM2113'),
(1, 'H&V CoreII', 'DRAM2123'),
(1, 'H&V CoreII', 'DESN1123'),
(1, 'H&V CoreII', 'DESN2113'),
(1, 'H&V CoreII', 'MUSC1213'),
(1, 'H&V CoreII', 'MUSC1313'),
(1, 'COMP4001', 'COMP4001'),
(1, 'COMP4072', 'COMP4072'),
(1, 'COMP4123', 'COMP4123'),
(1, 'COMP4133', 'COMP4133'),
(1, 'COMP4953', 'COMP4953'),
(1, 'COMP4082', 'COMP4082'),
(1, 'COMP4113', 'COMP4113'),
(1, 'HIST1323', 'HIST1323'),
(1, 'S&B', 'CRJS1123'),
(1, 'S&B', 'CRJS1133'),
(1, 'S&B', 'CRJS1223'),
(1, 'S&B', 'ECON2113'),
(1, 'S&B', 'ECON2123'),
(1, 'S&B', 'GEOG2633'),
(1, 'S&B', 'HIST1813'),
(1, 'S&B', 'HIST1823'),
(1, 'S&B', 'HDFM2513'),
(1, 'S&B', 'HDFM2533'),
(1, 'S&B', 'HDFM2553'),
(1, 'S&B', 'POSC2213'),
(1, 'S&B', 'POSC2503'),
(1, 'S&B', 'PSYC1113'),
(1, 'S&B', 'PSYC2213'),
(1, 'S&B', 'PSYC2323'),
(1, 'S&B', 'PSYC2413'),
(1, 'S&B', 'PSYC2513'),
(1, 'S&B', 'SOCG1013'),
(1, 'S&B', 'SOCG2003'),
(1, 'S&B', 'SOCG2013'),
(2, 'MATH1124', 'MATH1124'),
(2, 'SCI CI', 'PHYS2513'),
(2, 'SCI LI', 'PHYS2511'),
(2, 'GNEG1121', 'GNEG1121'),
(2, 'COMP1011', 'COMP1011'),
(2, 'COMP1021', 'COMP1021'),
(2, 'COMP1213', 'COMP1213'),
(2, 'ENGL1123', 'ENGL1123'),
(2, 'MATH2024', 'MATH2024'),
(2, 'GENG2021', 'GENG2021'),
(2, 'SPCH1003', 'SPCH1003'),
(2, 'COMP1223', 'COMP1223'),
(2, 'SCI CII', 'CHEM1033'),
(2, 'SCI LII', 'CHEM1011'),
(2, 'SCI CII', 'PHYS2513'),
(2, 'SCI LII', 'PHYS2511'),
(2, 'SCI CIII', 'CHEM1043'),
(2, 'SCI LIII', 'CHEM1021'),
(2, 'SCI CIII', 'CHEM1033'),
(2, 'SCI LIII', 'CHEM1011'),
(2, 'SCI CIII', 'BIOL1113'),
(2, 'SCI LIII', 'BIOL1111'),
(2, 'COMP2013 ', 'COMP2013'),
(2, 'HIST1313 ', 'HIST1313'),
(2, 'COMP2103 ', 'COMP2103'),
(2, 'ENGL1143 ', 'ENGL1143'),
(2, 'COMP2033 ', 'COMP2033'),
(2, 'POSC1113 ', 'POSC1113'),
(2, 'COMP LEI', 'COMP2003'),
(2, 'POSC1123 ', 'POSC1123'),
(2, 'MATH3073 ', 'MATH3073'),
(2, 'COMP3033 ', 'COMP3033'),
(2, 'COMP3043 ', 'COMP3043'),
(2, 'MATH3023 ', 'MATH3023'),
(2, 'COMP3053 ', 'COMP3053'),
(2, 'COMP3063 ', 'COMP3063'),
(2, 'COMP3223 ', 'COMP3223'),
(2, 'COMP UEI', 'COMP3113'),
(2, 'COMP UEI', 'COMP3203'),
(2, 'COMP UEI', 'COMP3213'),
(2, 'COMP UEI', 'COMP4063'),
(2, 'COMP UEI', 'COMP4073'),
(2, 'COMP UEI', 'COMP4843'),
(2, 'COMP UEI', 'COMP4963'),
(2, 'COMP UEI', 'COMP4991'),
(2, 'COMP UEI', 'COMP4992'),
(2, 'COMP UEI', 'COMP4993'),
(2, 'COMP UEII', 'COMP3113'),
(2, 'COMP UEII', 'COMP3203'),
(2, 'COMP UEII', 'COMP3213'),
(2, 'COMP UEII', 'COMP4063'),
(2, 'COMP UEII', 'COMP4073'),
(2, 'COMP UEII', 'COMP4843'),
(2, 'COMP UEII', 'COMP4963'),
(2, 'COMP UEII', 'COMP4991'),
(2, 'COMP UEII', 'COMP4992'),
(2, 'COMP UEII', 'COMP4993'),
(2, 'COMP LEI', 'COMP2143'),
(2, 'H&V CoreI', 'DRAM2213'),
(2, 'H&V CoreI', 'DRAM2223'),
(2, 'H&V CoreI', 'ENGL2153'),
(2, 'H&V CoreI', 'ENGL2263'),
(2, 'H&V CoreI', 'ENGL2273'),
(2, 'H&V CoreI', 'MGMT2203'),
(2, 'H&V CoreI', 'MUSC1223'),
(2, 'H&V CoreI', 'MUSC2333'),
(2, 'H&V CoreI', 'PHIL2013'),
(2, 'H&V CoreI', 'PHIL2103'),
(2, 'H&V CoreI', 'FINA2103'),
(2, 'H&V CoreI', 'ARCH1253'),
(2, 'H&V CoreI', 'ARCH2233'),
(2, 'H&V CoreI', 'ARCH2243'),
(2, 'H&V CoreI', 'ARTS1203'),
(2, 'H&V CoreI', 'ARTS2223'),
(2, 'H&V CoreI', 'ARTS2233'),
(2, 'H&V CoreI', 'ARTS2283'),
(2, 'H&V CoreI', 'DRAM1103'),
(2, 'H&V CoreI', 'DRAM2113'),
(2, 'H&V CoreI', 'DRAM2123'),
(2, 'H&V CoreI', 'DESN1123'),
(2, 'H&V CoreI', 'DESN2113'),
(2, 'H&V CoreI', 'MUSC1213'),
(2, 'H&V CoreI', 'MUSC1313'),
(2, 'H&V CoreII', 'ARCH1253'),
(2, 'H&V CoreII', 'ARCH2233'),
(2, 'H&V CoreII', 'ARCH2243'),
(2, 'H&V CoreII', 'ARTS1203'),
(2, 'H&V CoreII', 'ARTS2223'),
(2, 'H&V CoreII', 'ARTS2233'),
(2, 'H&V CoreII', 'ARTS2283'),
(2, 'H&V CoreII', 'DRAM1103'),
(2, 'H&V CoreII', 'DRAM2113'),
(2, 'H&V CoreII', 'DRAM2123'),
(2, 'H&V CoreII', 'DESN1123'),
(2, 'H&V CoreII', 'DESN2113'),
(2, 'H&V CoreII', 'MUSC1213'),
(2, 'H&V CoreII', 'MUSC1313'),
(2, 'COMP4001', 'COMP4001'),
(2, 'COMP4072', 'COMP4072'),
(2, 'COMP4123', 'COMP4123'),
(2, 'COMP4133', 'COMP4133'),
(2, 'COMP4953', 'COMP4953'),
(2, 'COMP4082', 'COMP4082'),
(2, 'COMP4113', 'COMP4113'),
(2, 'HIST1323', 'HIST1323'),
(2, 'S&B', 'CRJS1123'),
(2, 'S&B', 'CRJS1133'),
(2, 'S&B', 'CRJS1223'),
(2, 'S&B', 'ECON2113'),
(2, 'S&B', 'ECON2123'),
(2, 'S&B', 'GEOG2633'),
(2, 'S&B', 'HIST1813'),
(2, 'S&B', 'HIST1823'),
(2, 'S&B', 'HDFM2513'),
(2, 'S&B', 'HDFM2533'),
(2, 'S&B', 'HDFM2553'),
(2, 'S&B', 'POSC2213'),
(2, 'S&B', 'POSC2503'),
(2, 'S&B', 'PSYC1113'),
(2, 'S&B', 'PSYC2213'),
(2, 'S&B', 'PSYC2323'),
(2, 'S&B', 'PSYC2413'),
(2, 'S&B', 'PSYC2513'),
(2, 'S&B', 'SOCG1013'),
(2, 'S&B', 'SOCG2003'),
(2, 'S&B', 'SOCG2013'),
(2, 'COMP1211', 'COMP1211'),
(2, 'COMP1221', 'COMP1221'),
(2, 'MATH2053', 'MATH2053');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(10) NOT NULL,
  `student` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `student`) VALUES
(194, 160),
(194, 204);

-- --------------------------------------------------------

--
-- Table structure for table `StudentRecords`
--

CREATE TABLE IF NOT EXISTS `StudentRecords` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `studentID` int(10) NOT NULL,
  `classID` int(10) NOT NULL,
  `courseID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `modifiedBy` int(10) NOT NULL,
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `yearTaken` int(4) NOT NULL,
  `semesterTaken` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=403 ;

--
-- Dumping data for table `StudentRecords`
--

INSERT INTO `StudentRecords` (`id`, `studentID`, `classID`, `courseID`, `modifiedBy`, `modifiedOn`, `status`, `yearTaken`, `semesterTaken`) VALUES
(308, 89, 9, 'MATH2024', 89, '2013-04-27 02:36:19', 0, 0, ''),
(309, 89, 10, 'GNEG2021', 89, '2013-04-27 02:36:53', 0, 0, ''),
(314, 89, 11, 'COMM1003', 89, '2013-04-27 13:40:38', 0, 0, ''),
(295, 160, 22, 'POSC1113', 160, '2013-05-01 21:15:50', 0, 2012, 'Fall'),
(291, 89, 7, 'COMP1214', 89, '2013-04-26 18:00:20', 0, 0, ''),
(290, 89, 6, 'COMP1021', 89, '2013-04-26 18:00:20', 0, 0, ''),
(289, 89, 5, 'COMP1011', 89, '2013-04-26 18:00:20', 0, 0, ''),
(288, 89, 4, 'SCI LI', 89, '2013-04-26 18:00:20', 0, 0, ''),
(287, 89, 3, 'SCI CI', 89, '2013-04-26 18:00:20', 0, 0, ''),
(286, 89, 2, 'GNEG1121', 89, '2013-04-26 18:00:20', 0, 0, ''),
(285, 89, 1, 'MATH1124', 89, '2013-04-26 18:00:20', 0, 0, ''),
(282, 160, 25, 'POSC1123', 160, '2013-05-01 21:15:50', 0, 2012, 'Summer II'),
(402, 160, 0, 'COMP1211', 160, '2013-06-22 18:00:36', 0, 2012, 'Fall'),
(277, 160, 16, 'ENGL1143', 160, '2013-05-01 21:15:50', 0, 2012, 'Summer I'),
(276, 160, 8, 'ENGL1123', 160, '2013-05-01 21:15:50', 1, 2012, 'Spring'),
(275, 160, 7, 'COMP1214', 160, '2013-05-01 21:15:50', 0, 2012, 'Spring'),
(274, 160, 6, 'COMP1021', 160, '2013-05-01 21:15:50', 1, 2012, 'Spring'),
(273, 160, 5, 'COMP1011', 160, '2013-05-01 21:15:50', 1, 2011, 'Fall'),
(270, 160, 2, 'GNEG1121', 160, '2013-05-01 21:15:50', 0, 2012, 'Spring'),
(269, 160, 1, 'MATH1124', 160, '2013-05-01 21:15:50', 0, 2012, 'Spring'),
(313, 89, 8, 'ENGL1123', 89, '2013-04-27 13:40:38', 0, 0, ''),
(315, 89, 12, 'COMP1224', 89, '2013-04-27 13:40:38', 0, 0, ''),
(312, 89, 13, 'COMP2013', 98, '2013-04-29 13:34:18', 1, 0, ''),
(316, 160, 11, 'COMM1003', 160, '2013-05-01 21:15:50', 1, 2011, 'Fall'),
(317, 186, 1, 'MATH1124', 153, '2013-04-29 04:15:42', 1, 0, ''),
(318, 186, 2, 'GNEG1121', 153, '2013-04-29 04:15:42', 1, 0, ''),
(319, 186, 3, 'SCI CI', 153, '2013-04-29 04:15:42', 1, 0, ''),
(320, 186, 4, 'SCI LI', 153, '2013-04-29 04:15:42', 1, 0, ''),
(321, 89, 14, 'HIST1313', 98, '2013-04-29 13:34:18', 0, 0, ''),
(322, 89, 21, 'COMP LEII', 98, '2013-04-29 13:34:18', 0, 0, ''),
(323, 192, 1, 'MATH1124', 194, '2013-05-01 13:31:02', 0, 0, ''),
(324, 192, 2, 'GNEG1121', 194, '2013-05-01 13:31:02', 0, 0, ''),
(325, 192, 3, 'SCI CI', 194, '2013-05-01 13:31:02', 0, 0, ''),
(326, 192, 4, 'SCI LI', 194, '2013-05-01 13:31:02', 0, 0, ''),
(327, 192, 5, 'COMP1011', 194, '2013-05-01 13:31:02', 0, 0, ''),
(328, 192, 6, 'COMP1021', 194, '2013-05-01 13:31:02', 0, 0, ''),
(329, 192, 7, 'COMP1214', 194, '2013-05-01 13:31:02', 0, 0, ''),
(330, 192, 8, 'ENGL1123', 194, '2013-05-01 13:31:02', 0, 0, ''),
(331, 192, 9, 'MATH2024', 194, '2013-05-01 13:31:02', 0, 0, ''),
(332, 192, 10, 'GNEG2021', 194, '2013-05-01 13:31:02', 0, 0, ''),
(333, 192, 11, 'COMM1003', 194, '2013-05-01 13:31:02', 0, 0, ''),
(334, 192, 12, 'COMP1224', 194, '2013-05-01 13:31:02', 0, 0, ''),
(335, 192, 14, 'HIST1313', 194, '2013-05-01 13:31:02', 1, 0, ''),
(336, 192, 16, 'ENGL1143', 194, '2013-05-01 13:31:02', 0, 0, ''),
(337, 192, 17, 'SCI CII', 194, '2013-05-01 13:31:02', 0, 0, ''),
(338, 192, 18, 'SCI LII', 194, '2013-05-01 13:31:02', 0, 0, ''),
(339, 192, 22, 'POSC1113', 194, '2013-05-01 13:31:02', 1, 0, ''),
(340, 192, 25, 'POSC1123', 194, '2013-05-01 13:31:02', 0, 0, ''),
(341, 192, 34, 'H&V CoreI', 194, '2013-05-01 13:31:02', 0, 0, ''),
(342, 192, 40, 'S&B', 194, '2013-05-01 13:31:02', 0, 0, ''),
(343, 192, 44, 'HIST1323', 194, '2013-05-01 13:31:02', 1, 0, ''),
(344, 192, 45, 'H&V CoreII', 194, '2013-05-01 13:31:02', 1, 0, ''),
(345, 192, 23, 'SCI CIII', 194, '2013-05-01 13:31:02', 0, 0, ''),
(346, 192, 24, 'SCI LIII', 194, '2013-05-01 13:31:02', 0, 0, ''),
(347, 198, 1, 'MATH1124', 198, '2013-05-01 18:31:26', 0, 0, ''),
(348, 198, 2, 'GNEG1121', 198, '2013-05-01 18:31:26', 0, 0, ''),
(349, 198, 3, 'SCI CI', 198, '2013-05-01 18:31:26', 0, 0, ''),
(350, 203, 1, 'MATH1124', 203, '2013-05-01 19:00:24', 0, 0, ''),
(351, 203, 2, 'GNEG1121', 203, '2013-05-01 19:00:24', 0, 0, ''),
(352, 203, 3, 'SCI CI', 203, '2013-05-01 19:00:24', 0, 0, ''),
(353, 203, 4, 'SCI LI', 203, '2013-05-01 19:00:24', 0, 0, ''),
(354, 203, 5, 'COMP1011', 203, '2013-05-01 19:00:24', 0, 0, ''),
(355, 203, 6, 'COMP1021', 203, '2013-05-01 19:00:24', 0, 0, ''),
(356, 203, 7, 'COMP1214', 203, '2013-05-01 19:00:24', 0, 0, ''),
(357, 204, 1, 'MATH1124', 204, '2013-05-19 14:18:51', 0, 0, ''),
(358, 204, 2, 'GNEG1121', 204, '2013-05-19 14:18:51', 0, 0, ''),
(359, 204, 3, 'SCI CI', 204, '2013-05-19 14:18:51', 0, 0, ''),
(360, 204, 4, 'SCI LI', 204, '2013-05-19 14:18:51', 0, 0, ''),
(361, 204, 5, 'COMP1011', 204, '2013-05-19 14:18:51', 0, 0, ''),
(362, 204, 6, 'COMP1021', 204, '2013-05-19 14:18:51', 0, 0, ''),
(363, 204, 7, 'COMP1214', 204, '2013-05-19 14:18:51', 0, 0, ''),
(364, 204, 8, 'ENGL1123', 204, '2013-05-19 14:18:51', 0, 0, ''),
(365, 204, 9, 'MATH2024', 204, '2013-05-19 14:18:51', 0, 0, ''),
(366, 204, 10, 'GNEG2021', 204, '2013-05-19 14:18:51', 0, 0, ''),
(367, 204, 11, 'COMM1003', 204, '2013-05-19 14:18:51', 0, 0, ''),
(368, 204, 12, 'COMP1224', 204, '2013-05-19 14:18:51', 0, 0, ''),
(369, 204, 13, 'COMP2013', 204, '2013-05-19 14:18:51', 1, 0, ''),
(370, 204, 14, 'HIST1313', 204, '2013-05-19 14:18:51', 1, 0, ''),
(371, 204, 15, 'COMP2103', 204, '2013-05-19 14:18:51', 1, 0, ''),
(372, 204, 16, 'ENGL1143', 204, '2013-05-19 14:18:51', 1, 0, ''),
(373, 204, 17, 'SCI CII', 204, '2013-05-19 14:18:51', 1, 0, ''),
(374, 204, 18, 'SCI LII', 204, '2013-05-19 14:18:51', 1, 0, ''),
(375, 204, 19, 'COMP2033', 204, '2013-05-19 14:18:51', 1, 0, ''),
(376, 204, 20, 'COMP LEI', 204, '2013-05-19 14:18:51', 1, 0, ''),
(377, 204, 21, 'COMP LEII', 204, '2013-05-19 14:18:51', 1, 0, ''),
(378, 204, 22, 'POSC1113', 204, '2013-05-19 14:18:51', 1, 0, ''),
(379, 204, 23, 'SCI CIII', 204, '2013-05-19 14:18:51', 1, 0, ''),
(380, 204, 24, 'SCI LIII', 204, '2013-05-19 14:18:51', 1, 0, ''),
(381, 204, 25, 'POSC1123', 204, '2013-05-19 14:18:51', 1, 0, ''),
(382, 204, 26, 'MATH3073', 204, '2013-05-19 14:18:51', 1, 0, ''),
(383, 204, 27, 'COMP3033', 204, '2013-05-19 14:18:51', 1, 0, ''),
(384, 204, 28, 'COMP3043', 204, '2013-05-19 14:18:51', 1, 0, ''),
(385, 204, 29, 'MATH3023', 204, '2013-05-19 14:18:51', 1, 0, ''),
(386, 204, 30, 'COMP3053', 204, '2013-05-19 14:18:51', 1, 0, ''),
(387, 204, 31, 'COMP3063', 204, '2013-05-19 14:18:51', 1, 0, ''),
(388, 204, 32, 'COMP3223', 204, '2013-05-19 14:18:51', 1, 0, ''),
(389, 204, 33, 'COMP UEI', 204, '2013-05-19 14:18:51', 1, 0, ''),
(390, 204, 34, 'H&V CoreI', 204, '2013-05-19 14:18:51', 1, 0, ''),
(391, 204, 35, 'COMP4001', 204, '2013-05-19 14:18:51', 1, 0, ''),
(392, 204, 36, 'COMP4072', 204, '2013-05-19 14:18:51', 1, 0, ''),
(393, 204, 37, 'COMP4123', 204, '2013-05-19 14:18:51', 1, 0, ''),
(394, 204, 38, 'COMP4133', 204, '2013-05-19 14:18:51', 1, 0, ''),
(395, 204, 39, 'COMP4953', 204, '2013-05-19 14:18:51', 1, 0, ''),
(396, 204, 40, 'S&B', 204, '2013-05-19 14:18:51', 1, 0, ''),
(397, 204, 41, 'COMP4082', 204, '2013-05-19 14:18:51', 1, 0, ''),
(398, 204, 42, 'COMP4113', 204, '2013-05-19 14:18:51', 1, 0, ''),
(399, 204, 43, 'COMP ULII', 204, '2013-05-19 14:18:51', 1, 0, ''),
(400, 204, 44, 'HIST1323', 204, '2013-05-19 14:18:51', 1, 0, ''),
(401, 204, 45, 'H&V CoreII', 204, '2013-05-19 14:18:51', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role` tinyint(4) NOT NULL,
  `first` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Major` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Classification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Departement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logs` tinyint(1) DEFAULT '0',
  `defaultHours` int(2) DEFAULT '15',
  `authorized` tinyint(1) NOT NULL,
  `chosenPlan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=206 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first`, `last`, `username`, `email`, `password`, `Major`, `Classification`, `Departement`, `verified`, `hash`, `logs`, `defaultHours`, `authorized`, `chosenPlan`) VALUES
(160, 3, 'Hazar', 'Kahera', 'hkahera', 'hkahera@pvamu.edu', 'e10adc3949ba59abbe56e057f20f883e', 'Computer Science', 'Senior', '', 1, '3295c76acbf4caaed33c36b1b5fc2cb1', 1, 15, 0, 1),
(204, 3, 'Dezshaun', 'Meeks', 'dmeeks1', 'dmeeks1@pvamu.edu', 'e882b72bccfc2ad578c27b0d9b472a14', 'Computer Science', 'Senior', '', 1, '8d317bdcf4aafcfc22149d77babee96d', 1, 15, 0, 0),
(199, 2, 'Fac', 'Fac', 'fac', 'fac@pvamu.edu', 'e882b72bccfc2ad578c27b0d9b472a14', '', '', 'Computer Science', 1, '38af86134b65d0f10fe33d30dd76442e', 0, 15, 0, 0),
(151, 1, 'PV Admin', '', 'admin', 'admin@pvamu.hazar.us', '0e6b6219c5602c8b4592dc439606e839', '', '', '', 1, '', 0, 15, 1, 0),
(194, 2, 'Kiranmai', 'Bellam', 'kibellam', 'kibellam@pvamu.edu', 'c08ac56ae1145566f2ce54cbbea35fa3', '', '', 'Computer Science', 1, '788d986905533aba051261497ecffcbb', 0, 15, 0, 0),
(153, 2, 'Akhtar', 'Lodgher', 'aklodgher', 'aklodgher@PVAMU.EDU', 'e882b72bccfc2ad578c27b0d9b472a14', '', '', 'Computer Science', 1, '8f121ce07d74717e0b1f21d122e04521', 0, 15, 0, 0),
(205, 3, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Computer Science', 'Freshman', '', 0, '88ae6372cfdc5df69a976e893f4d554b', 0, 15, 0, 0),
(203, 3, 'Travis', 'West', 'twest', 'twest@pvamu.edu', 'e882b72bccfc2ad578c27b0d9b472a14', 'Computer Science', 'Freshman', '', 1, 'a684eceee76fc522773286a895bc8436', 1, 15, 0, 0),
(197, 3, 'Student', 'Student', 'student12345', 'student12345@pvamu.edu', 'e882b72bccfc2ad578c27b0d9b472a14', 'Computer Science', 'Freshman', '', 0, '0336dcbab05b9d5ad24f4333c7658a0e', 0, 15, 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `degreePlanRequirements`
--
ALTER TABLE `degreePlanRequirements`
  ADD CONSTRAINT `degreePlanRequirements_ibfk_1` FOREIGN KEY (`planID`) REFERENCES `degreePlanData` (`planID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
