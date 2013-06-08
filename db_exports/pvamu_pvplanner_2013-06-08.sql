-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2013 at 07:51 AM
-- Server version: 5.5.23
-- PHP Version: 5.2.17

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
  `courseID` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `creditHours` int(11) NOT NULL,
  `lectureHours` int(11) NOT NULL,
  `labHours` int(11) NOT NULL,
  `fall` int(11) NOT NULL,
  `spring` int(11) NOT NULL,
  `summer` int(11) NOT NULL,
  `coreqs` varchar(100) NOT NULL,
  `prereqs` varchar(1000) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `title`, `creditHours`, `lectureHours`, `labHours`, `fall`, `spring`, `summer`, `coreqs`, `prereqs`, `description`) VALUES
('CHEM1011', 'Chemistry I Lab', 1, 0, 0, 1, 1, 0, '', '', ''),
('CHEM1033', 'Chemistry I', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMM1003', 'Fundamentals of Speech Communication', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP1011', 'Introduction to Engineering Studies', 1, 0, 0, 1, 1, 0, '', '', ''),
('COMP1021', 'Introduction to Computer Science', 1, 0, 0, 1, 1, 0, '', '', ''),
('COMP1214', 'Computer Science I', 4, 0, 0, 1, 1, 0, '', '', ''),
('COMP1224', 'Computer Science II', 4, 0, 0, 1, 1, 0, '', '', ''),
('COMP2013', 'Data Structures', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP2033', 'Assembly Language', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP2103', 'Discrete Structures', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3033', 'Digital Logic Circuit', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3034', 'Computer Organization', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3053', 'Analysis of Algorithms', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3063', 'Operating Systems', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3223', 'Software Engineering', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4001', 'Ethics and Soc. Issues in Computing', 1, 0, 0, 1, 1, 0, '', '', ''),
('COMP4072', 'Senior Design Project I', 2, 0, 0, 1, 1, 0, '', '', ''),
('COMP4082', 'Senior Design Project II', 2, 0, 0, 1, 1, 0, '', '', ''),
('COMP4113', 'Programming Languages Design', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4123', 'Computer Networks', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4133', 'Formal Language Automation', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4953', 'Database Management', 3, 0, 0, 1, 1, 0, '', '', ''),
('CHEM1011', 'Chemistry I Lab', 1, 0, 0, 1, 1, 0, '', '', ''),
('CHEM1033', 'Chemistry I', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMM1003', 'Fundamentals of Speech Communication', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP1011', 'Introduction to Engineering Studies', 1, 0, 0, 1, 1, 0, '', '', ''),
('COMP1021', 'Introduction to Computer Science', 1, 0, 0, 1, 1, 0, '', '', ''),
('COMP1214', 'Computer Science I', 4, 0, 0, 1, 1, 0, '', '', ''),
('COMP1224', 'Computer Science II', 4, 0, 0, 1, 1, 0, '', '', ''),
('COMP2013', 'Data Structures', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP2033', 'Assembly Language', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP2103', 'Discrete Structures', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3033', 'Digital Logic Circuit', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3034', 'Computer Organization', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3053', 'Analysis of Algorithms', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3063', 'Operating Systems', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3223', 'Software Engineering', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4001', 'Ethics and Soc. Issues in Computing', 1, 0, 0, 1, 1, 0, '', '', ''),
('COMP4072', 'Senior Design Project I', 2, 0, 0, 1, 1, 0, '', '', ''),
('COMP4082', 'Senior Design Project II', 2, 0, 0, 1, 1, 0, '', '', ''),
('COMP4113', 'Programming Languages Design', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4123', 'Computer Networks', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4133', 'Formal Language Automation', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4953', 'Database Management', 3, 0, 0, 1, 1, 0, '', '', ''),
('ENGL0100', 'Writing Basics', 0, 0, 0, 1, 1, 0, '', '', 'This is a basic writing course designed to focus on the basic elements of composition writing to include the writing process, writing mechanics, sentence structure, and paragraph writing. There is a strong emphasis on identifying correct sentence structure and mechanics in written material and drafting topic sentences that introduce unified, coherent paragraphs. Classroom instruction is enhanced by required lab-based activities. THEA score (0-170), ACCUPLACE Score (0-59), COMPASS Score (0-45).'),
('ENGL0112', 'Intermediate Writing', 2, 0, 0, 1, 1, 0, '', '', 'This is an intermediate level writing course designed for those students with a stronger background in grammar skills but who need further help developing paragraphs, essays, and short themes. Emphasis is placed on improving the skills related to writing a thesis statementand writing unified, coherent essays. Classroom instruction is enhanced by required labbased activities. THEA score (171-200), ACCUPLACE Score (60-69), COMPASS Score (46-51) or successfully complete ENGL 0100.'),
('ENGL0131', 'Pre-Composition', 1, 0, 0, 1, 1, 0, '', '', 'This is an advanced writing course designed to prepare students for Freshman Composition I. Students will be expected to write compositions similar to those assigned in Freshman Composition I. Emphasis is placed on the use of enhanced critical thinking skills, editing skills, writing multi-paragraph essays, paraphrasing passages, and an introduction to research writing. THEA score (201-219), ACCUPLACE Score (70-79), COMPASS Score (52-58) or successfully complete ENGL 0112.'),
('ENGL1123', 'Freshman Composition I', 3, 0, 0, 1, 1, 0, '', '', ''),
('ENGL1143', 'Technical Writing', 3, 0, 0, 1, 1, 0, '', '', ''),
('GNEG1121', 'Engineering Application Lab II for Math', 1, 0, 0, 1, 1, 0, '', '', ''),
('GNEG2021', 'Engineering Application Lab III for Math', 1, 0, 0, 1, 1, 0, '', '', ''),
('HIST1313', 'U.S. History to 1876', 3, 0, 0, 1, 1, 0, '', '', ''),
('HIST1323', 'U.S. History 1876 to Present', 3, 0, 0, 1, 1, 0, '', '', ''),
('HIST1813', 'Survey of Civilization to 1500', 3, 0, 0, 1, 1, 0, '', '', ''),
('MATH0100', 'Pre-Algebra', 0, 0, 0, 1, 1, 0, '', '', 'This course is designed to improve the student skills involving basic arithmetic computations to include integers, fractions, decimals, and percents. There will be a strong emphasis on solving and graphing linear equations as well as basic polynomial manipulations. Pre-requisite. THEA Score (0-200), ACCUPLACE Score (0-35), COMPASS Score (0-20).'),
('MATH0113', 'Beginning Algebra', 3, 3, 0, 1, 1, 0, '', '', 'This course is designed to present a careful and guided review of the basic mathematical concepts to improve and strengthen the student fundamental understanding of mathematics. The topics will include solving and graphing linear equations and inequalities, solving linear systems, determining the equation of a line and slope of lines. The course will also cover manipulation of polynomials to include factoring, ratios, solving rational equations and geometric applications. THEA score (201-217), ACCUPLACE Score (36-49), COMPASS Score (21-29) or successfully complete MATH 0100.'),
('MATH0133', 'Intermediate Algebra', 3, 3, 0, 1, 1, 0, '', '', 'This course is design to make the transition to College Algebra more successful. Topics include advanced algebraic operations, factoring with an emphasis on rational, radical, and quadratic equations. Students will be introduced to functions with emphasis on function evaluation, graphs, composition, and inverse. THEA score (218-229), ACCUPLACE Score (50-62), COMPASS Score (30-38) or successfully complete MATH 0113.'),
('MATH1113', 'College Algebra', 3, 3, 0, 1, 1, 0, '', '', 'Functions and their graphs, linear and quadratic equations, systems of equations, logarithms, exponential and logarithmic equations, binomial theorem, progressions. ** (MATH 1314) Prerequisite:THEA Math 230 and THEA Exwa 301. Must have a “C” or higher in Pre-Algebra, if applicable.'),
('MATH1115', 'Algebra and Trigonometry', 5, 5, 0, 1, 1, 0, '', '', 'A basic course in mathematics for students needing additional pre-calculus skills, including algebra and trigonometry. Topics included are linear, quadratic, and higher degree polynomial functions and identities. Combinational formulas, probability, determinants and systems of linear equations, inverse trigonometric functions, and trigonometric equations. Prerequisite: THEA Math 230 and THEA Exwa 301.'),
('CHEM1011', 'Chemistry I Lab', 1, 0, 0, 1, 1, 0, '', '', ''),
('CHEM1033', 'Chemistry I', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMM1003', 'Fundamentals of Speech Communication', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP1011', 'Introduction to Engineering Studies', 1, 0, 0, 1, 1, 0, '', '', ''),
('COMP1021', 'Introduction to Computer Science', 1, 0, 0, 1, 1, 0, '', '', ''),
('COMP1214', 'Computer Science I', 4, 0, 0, 1, 1, 0, '', '', ''),
('COMP1224', 'Computer Science II', 4, 0, 0, 1, 1, 0, '', '', ''),
('COMP2013', 'Data Structures', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP2033', 'Assembly Language', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP2103', 'Discrete Structures', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3033', 'Digital Logic Circuit', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3034', 'Computer Organization', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3053', 'Analysis of Algorithms', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3063', 'Operating Systems', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP3223', 'Software Engineering', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4001', 'Ethics and Soc. Issues in Computing', 1, 0, 0, 1, 1, 0, '', '', ''),
('COMP4072', 'Senior Design Project I', 2, 0, 0, 1, 1, 0, '', '', ''),
('COMP4082', 'Senior Design Project II', 2, 0, 0, 1, 1, 0, '', '', ''),
('COMP4113', 'Programming Languages Design', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4123', 'Computer Networks', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4133', 'Formal Language Automation', 3, 0, 0, 1, 1, 0, '', '', ''),
('COMP4953', 'Database Management', 3, 0, 0, 1, 1, 0, '', '', ''),
('ENGL0100', 'Writing Basics', 0, 0, 0, 1, 1, 0, '', '', 'This is a basic writing course designed to focus on the basic elements of composition writing to include the writing process, writing mechanics, sentence structure, and paragraph writing. There is a strong emphasis on identifying correct sentence structure and mechanics in written material and drafting topic sentences that introduce unified, coherent paragraphs. Classroom instruction is enhanced by required lab-based activities. THEA score (0-170), ACCUPLACE Score (0-59), COMPASS Score (0-45).'),
('ENGL0112', 'Intermediate Writing', 2, 0, 0, 1, 1, 0, '', '', 'This is an intermediate level writing course designed for those students with a stronger background in grammar skills but who need further help developing paragraphs, essays, and short themes. Emphasis is placed on improving the skills related to writing a thesis statementand writing unified, coherent essays. Classroom instruction is enhanced by required labbased activities. THEA score (171-200), ACCUPLACE Score (60-69), COMPASS Score (46-51) or successfully complete ENGL 0100.'),
('ENGL0131', 'Pre-Composition', 1, 0, 0, 1, 1, 0, '', '', 'This is an advanced writing course designed to prepare students for Freshman Composition I. Students will be expected to write compositions similar to those assigned in Freshman Composition I. Emphasis is placed on the use of enhanced critical thinking skills, editing skills, writing multi-paragraph essays, paraphrasing passages, and an introduction to research writing. THEA score (201-219), ACCUPLACE Score (70-79), COMPASS Score (52-58) or successfully complete ENGL 0112.'),
('ENGL1123', 'Freshman Composition I', 3, 0, 0, 1, 1, 0, '', '', ''),
('ENGL1143', 'Technical Writing', 3, 0, 0, 1, 1, 0, '', '', ''),
('GNEG1121', 'Engineering Application Lab II for Math', 1, 0, 0, 1, 1, 0, '', '', ''),
('GNEG2021', 'Engineering Application Lab III for Math', 1, 0, 0, 1, 1, 0, '', '', ''),
('HIST1313', 'U.S. History to 1876', 3, 0, 0, 1, 1, 0, '', '', ''),
('HIST1323', 'U.S. History 1876 to Present', 3, 0, 0, 1, 1, 0, '', '', ''),
('HIST1813', 'Survey of Civilization to 1500', 3, 0, 0, 1, 1, 0, '', '', ''),
('MATH0100', 'Pre-Algebra', 0, 0, 0, 1, 1, 0, '', '', 'This course is designed to improve the student skills involving basic arithmetic computations to include integers, fractions, decimals, and percents. There will be a strong emphasis on solving and graphing linear equations as well as basic polynomial manipulations. Pre-requisite. THEA Score (0-200), ACCUPLACE Score (0-35), COMPASS Score (0-20).'),
('MATH0113', 'Beginning Algebra', 3, 3, 0, 1, 1, 0, '', '', 'This course is designed to present a careful and guided review of the basic mathematical concepts to improve and strengthen the student fundamental understanding of mathematics. The topics will include solving and graphing linear equations and inequalities, solving linear systems, determining the equation of a line and slope of lines. The course will also cover manipulation of polynomials to include factoring, ratios, solving rational equations and geometric applications. THEA score (201-217), ACCUPLACE Score (36-49), COMPASS Score (21-29) or successfully complete MATH 0100.'),
('MATH0133', 'Intermediate Algebra', 3, 3, 0, 1, 1, 0, '', '', 'This course is design to make the transition to College Algebra more successful. Topics include advanced algebraic operations, factoring with an emphasis on rational, radical, and quadratic equations. Students will be introduced to functions with emphasis on function evaluation, graphs, composition, and inverse. THEA score (218-229), ACCUPLACE Score (50-62), COMPASS Score (30-38) or successfully complete MATH 0113.'),
('MATH1113', 'College Algebra', 3, 3, 0, 1, 1, 0, '', '', 'Functions and their graphs, linear and quadratic equations, systems of equations, logarithms, exponential and logarithmic equations, binomial theorem, progressions. ** (MATH 1314) Prerequisite:THEA Math 230 and THEA Exwa 301. Must have a “C” or higher in Pre-Algebra, if applicable.'),
('MATH1115', 'Algebra and Trigonometry', 5, 5, 0, 1, 1, 0, '', '', 'A basic course in mathematics for students needing additional pre-calculus skills, including algebra and trigonometry. Topics included are linear, quadratic, and higher degree polynomial functions and identities. Combinational formulas, probability, determinants and systems of linear equations, inverse trigonometric functions, and trigonometric equations. Prerequisite: THEA Math 230 and THEA Exwa 301.'),
('MATH1123', 'Trigonometry', 3, 3, 0, 1, 1, 0, '', '[''MATH 1113'']', 'Trigonometric functions, radian, inverse trigonometric functions, functions of composite angles, and identities; and trigonometric equations. Prerequisite: MATH 1113 or equivalent with grade of “C” or higher ** (MATH 1316).'),
('MATH1124', 'Calculus with Analytic Geometry I', 4, 4, 0, 1, 1, 0, '', '[[''MATH 1115'',''MATH 1123'']]', 'Functions and graphs, limits and continuity, derivatives of functions, Mean Value Theorem, applications of derivatives. Fundamental Theorem of Calculus and applications of integrals. Prerequisite: Grade of C or higher in both MATH 1113 and MATH 1123 or MATH 1115 or equivalently ready (passing the Calculus preparedness test administered by the Mathematics Departments) ** (MATH 2413)'),
('MATH2024', 'Calculus with Analytic Geometry II', 4, 4, 0, 1, 1, 0, '', '[''MATH 1124'']', 'Applications of integrals, inverse functions, integration techniques, indeterminate forms, improper integrals, parametric equations, polar coordinates, infinite series, power series, Taylor series. Prerequisite: MATH 1124. (with a grade of “C” or higher. ** (MATH 2414)).'),
('MATH3023', 'Probability and Statistics', 3, 3, 0, 1, 1, 0, '', '[''MATH 1124'']', 'Counting problems, probability theory, infinite sample spaces, random numbers and their usage, random variables, basic movements, variances, binomial geometric, uniform, exponential, and normal distributions, point estimation, confidence limits, hypothesis testing, applications of Bayes’ Theorem, sums of independent random variables, law of large numbers, and Central Limit Theorem. Prerequisites: MATH 1124 with grade of “C” or higher.'),
('MATH3073', 'Linear Algebra', 3, 3, 0, 1, 1, 0, '', '[''MATH 2024'']', 'Systems of linear equations, matrices, real vector spaces, linear transformations, change of bases, determinants, eigenvalues and eigenvectors, diagonalization and inner product spaces. Prerequisite: MATH 2024 with grade of “C” or higher or Approval of the Mathematics Department Head.'),
('MUSC1313', 'Music in Contemporary Life', 3, 0, 0, 1, 1, 0, '', '', ''),
('PHYS2511', 'Physics I Lab', 1, 0, 0, 1, 1, 0, '', '', ''),
('PHYS2512', 'Physics I', 3, 0, 0, 1, 1, 0, '', '', ''),
('PHYS2521', 'Physics II Lab', 1, 0, 0, 1, 1, 0, '', '', ''),
('PHYS2523', 'Physics II', 3, 0, 0, 1, 1, 0, '', '', ''),
('POSC1113', 'American Government I', 3, 0, 0, 1, 1, 0, '', '', ''),
('POSC1123', 'American Government II', 3, 0, 0, 1, 1, 0, '', '', ''),
('RDNG0100', 'Reading Basics', 0, 0, 0, 1, 1, 0, '', '', 'This is a basic reading course designed to improve students’ overall basic reading and critical reading skills. Emphasis is on reading comprehension, vocabulary development, study techniques, and critical thinking skills. Classroom instruction is enhanced by required lab-based activities. THEA Score (0-199), ACCUPLACE Score (0-55), COMPASS Score (68-80).'),
('RDNG0112', 'Intermediate Reading', 2, 0, 0, 1, 1, 0, '', '', 'This is an intermediate level reading course designed to improve efficiency through word analysis skills, vocabulary, comprehension, and rate. Sentence/paragraph writing is required to complement extensive and varied reading activities. Emphasis is placed on external reading assignments. Classroom instruction is enhanced by required lab-based activities. THEA score (200-215), ACCUPLACE Score (56-68), COMPASS Score (55-68) or successfully complete RDNG 0100.'),
('RDNG0131', 'Comprehensive Reading', 1, 0, 0, 1, 1, 0, '', '', 'This is an advanced level reading course with an emphasis on learning the higher level reading skills required for college level reading assignments. Emphasis is placed on crosscurriculum reading. Short paragraph writing is required to compliment some reading activities. Additionally, a minimum of one novel will be read and accompanied by a critical analysis paper. THEA score (216-229), ACCUPLACE Score (69-77), COMPASS Score (69-80) or successfully complete RDNG 0112.');

-- --------------------------------------------------------

--
-- Table structure for table `degreePlanData`
--

CREATE TABLE IF NOT EXISTS `degreePlanData` (
  `planID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`planID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `degreePlanData`
--

INSERT INTO `degreePlanData` (`planID`, `name`) VALUES
(1, 'Computer Science (2012)'),
(2, 'Basket Weaving'),
(4, 'English'),
(5, 'Computer Science (2008)');

-- --------------------------------------------------------

--
-- Table structure for table `degreePlanRequirements`
--

CREATE TABLE IF NOT EXISTS `degreePlanRequirements` (
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `planID` int(11) NOT NULL,
  `requirement` varchar(25) NOT NULL,
  `courseOptions` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degreePlanRequirements`
--

INSERT INTO `degreePlanRequirements` (`timestamp`, `planID`, `requirement`, `courseOptions`) VALUES
('2013-06-01 21:45:06', 1, 'MATH1124', 'MATH1124'),
('2013-06-01 21:45:13', 1, 'GNEG1121', 'GNEG1121'),
('2013-06-01 21:45:22', 1, 'Science1', 'PHYS2513'),
('2013-06-01 21:45:32', 1, 'Science2', 'BIOL1113'),
('2013-06-01 21:46:43', 1, 'Science3', 'CHEM1043'),
('2013-06-01 21:46:28', 1, 'ScienceLab1', 'PHYS2511'),
('0000-00-00 00:00:00', 2, 'Science1', 'PHYS2513'),
('0000-00-00 00:00:00', 1, 'Science2', 'CHEM1033'),
('0000-00-00 00:00:00', 1, 'Science3', 'PHYS2523'),
('2013-06-02 15:58:53', 1, 'testing', 'COMM1003'),
('2013-06-02 15:58:58', 1, 'testing', 'COMP1011'),
('0000-00-00 00:00:00', 1, 'upper level elective 1', 'COMP3033'),
('0000-00-00 00:00:00', 1, 'upper level elective 1', 'COMP3034'),
('0000-00-00 00:00:00', 1, 'upper level elective 1', 'COMP3053'),
('0000-00-00 00:00:00', 1, 'upper level elective 1', 'COMP3063'),
('0000-00-00 00:00:00', 1, 'upper level elective 1', 'COMP3223'),
('0000-00-00 00:00:00', 5, 'COMP2013', 'COMP2013');

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
  `modifiedBy` int(10) NOT NULL,
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=402 ;

--
-- Dumping data for table `StudentRecords`
--

INSERT INTO `StudentRecords` (`id`, `studentID`, `classID`, `modifiedBy`, `modifiedOn`, `status`) VALUES
(308, 89, 9, 89, '2013-04-27 02:36:19', 0),
(309, 89, 10, 89, '2013-04-27 02:36:53', 0),
(314, 89, 11, 89, '2013-04-27 13:40:38', 0),
(295, 160, 22, 160, '2013-05-01 21:15:50', 0),
(291, 89, 7, 89, '2013-04-26 18:00:20', 0),
(290, 89, 6, 89, '2013-04-26 18:00:20', 0),
(289, 89, 5, 89, '2013-04-26 18:00:20', 0),
(288, 89, 4, 89, '2013-04-26 18:00:20', 0),
(287, 89, 3, 89, '2013-04-26 18:00:20', 0),
(286, 89, 2, 89, '2013-04-26 18:00:20', 0),
(285, 89, 1, 89, '2013-04-26 18:00:20', 0),
(284, 160, 40, 160, '2013-05-01 21:15:50', 0),
(283, 160, 34, 160, '2013-05-01 21:15:50', 0),
(282, 160, 25, 160, '2013-05-01 21:15:50', 0),
(281, 160, 24, 160, '2013-05-01 21:15:50', 0),
(280, 160, 23, 160, '2013-05-01 21:15:50', 0),
(279, 160, 18, 160, '2013-05-01 21:15:50', 0),
(278, 160, 17, 160, '2013-05-01 21:15:50', 0),
(277, 160, 16, 160, '2013-05-01 21:15:50', 0),
(276, 160, 8, 160, '2013-05-01 21:15:50', 1),
(275, 160, 7, 160, '2013-05-01 21:15:50', 0),
(274, 160, 6, 160, '2013-05-01 21:15:50', 1),
(273, 160, 5, 160, '2013-05-01 21:15:50', 1),
(272, 160, 4, 160, '2013-05-01 21:15:50', 0),
(271, 160, 3, 160, '2013-05-01 21:15:50', 0),
(270, 160, 2, 160, '2013-05-01 21:15:50', 0),
(269, 160, 1, 160, '2013-05-01 21:15:50', 0),
(313, 89, 8, 89, '2013-04-27 13:40:38', 0),
(315, 89, 12, 89, '2013-04-27 13:40:38', 0),
(312, 89, 13, 98, '2013-04-29 13:34:18', 1),
(316, 160, 11, 160, '2013-05-01 21:15:50', 1),
(317, 186, 1, 153, '2013-04-29 04:15:42', 1),
(318, 186, 2, 153, '2013-04-29 04:15:42', 1),
(319, 186, 3, 153, '2013-04-29 04:15:42', 1),
(320, 186, 4, 153, '2013-04-29 04:15:42', 1),
(321, 89, 14, 98, '2013-04-29 13:34:18', 0),
(322, 89, 21, 98, '2013-04-29 13:34:18', 0),
(323, 192, 1, 194, '2013-05-01 13:31:02', 0),
(324, 192, 2, 194, '2013-05-01 13:31:02', 0),
(325, 192, 3, 194, '2013-05-01 13:31:02', 0),
(326, 192, 4, 194, '2013-05-01 13:31:02', 0),
(327, 192, 5, 194, '2013-05-01 13:31:02', 0),
(328, 192, 6, 194, '2013-05-01 13:31:02', 0),
(329, 192, 7, 194, '2013-05-01 13:31:02', 0),
(330, 192, 8, 194, '2013-05-01 13:31:02', 0),
(331, 192, 9, 194, '2013-05-01 13:31:02', 0),
(332, 192, 10, 194, '2013-05-01 13:31:02', 0),
(333, 192, 11, 194, '2013-05-01 13:31:02', 0),
(334, 192, 12, 194, '2013-05-01 13:31:02', 0),
(335, 192, 14, 194, '2013-05-01 13:31:02', 1),
(336, 192, 16, 194, '2013-05-01 13:31:02', 0),
(337, 192, 17, 194, '2013-05-01 13:31:02', 0),
(338, 192, 18, 194, '2013-05-01 13:31:02', 0),
(339, 192, 22, 194, '2013-05-01 13:31:02', 1),
(340, 192, 25, 194, '2013-05-01 13:31:02', 0),
(341, 192, 34, 194, '2013-05-01 13:31:02', 0),
(342, 192, 40, 194, '2013-05-01 13:31:02', 0),
(343, 192, 44, 194, '2013-05-01 13:31:02', 1),
(344, 192, 45, 194, '2013-05-01 13:31:02', 1),
(345, 192, 23, 194, '2013-05-01 13:31:02', 0),
(346, 192, 24, 194, '2013-05-01 13:31:02', 0),
(347, 198, 1, 198, '2013-05-01 18:31:26', 0),
(348, 198, 2, 198, '2013-05-01 18:31:26', 0),
(349, 198, 3, 198, '2013-05-01 18:31:26', 0),
(350, 203, 1, 203, '2013-05-01 19:00:24', 0),
(351, 203, 2, 203, '2013-05-01 19:00:24', 0),
(352, 203, 3, 203, '2013-05-01 19:00:24', 0),
(353, 203, 4, 203, '2013-05-01 19:00:24', 0),
(354, 203, 5, 203, '2013-05-01 19:00:24', 0),
(355, 203, 6, 203, '2013-05-01 19:00:24', 0),
(356, 203, 7, 203, '2013-05-01 19:00:24', 0),
(357, 204, 1, 204, '2013-05-19 14:18:51', 0),
(358, 204, 2, 204, '2013-05-19 14:18:51', 0),
(359, 204, 3, 204, '2013-05-19 14:18:51', 0),
(360, 204, 4, 204, '2013-05-19 14:18:51', 0),
(361, 204, 5, 204, '2013-05-19 14:18:51', 0),
(362, 204, 6, 204, '2013-05-19 14:18:51', 0),
(363, 204, 7, 204, '2013-05-19 14:18:51', 0),
(364, 204, 8, 204, '2013-05-19 14:18:51', 0),
(365, 204, 9, 204, '2013-05-19 14:18:51', 0),
(366, 204, 10, 204, '2013-05-19 14:18:51', 0),
(367, 204, 11, 204, '2013-05-19 14:18:51', 0),
(368, 204, 12, 204, '2013-05-19 14:18:51', 0),
(369, 204, 13, 204, '2013-05-19 14:18:51', 1),
(370, 204, 14, 204, '2013-05-19 14:18:51', 1),
(371, 204, 15, 204, '2013-05-19 14:18:51', 1),
(372, 204, 16, 204, '2013-05-19 14:18:51', 1),
(373, 204, 17, 204, '2013-05-19 14:18:51', 1),
(374, 204, 18, 204, '2013-05-19 14:18:51', 1),
(375, 204, 19, 204, '2013-05-19 14:18:51', 1),
(376, 204, 20, 204, '2013-05-19 14:18:51', 1),
(377, 204, 21, 204, '2013-05-19 14:18:51', 1),
(378, 204, 22, 204, '2013-05-19 14:18:51', 1),
(379, 204, 23, 204, '2013-05-19 14:18:51', 1),
(380, 204, 24, 204, '2013-05-19 14:18:51', 1),
(381, 204, 25, 204, '2013-05-19 14:18:51', 1),
(382, 204, 26, 204, '2013-05-19 14:18:51', 1),
(383, 204, 27, 204, '2013-05-19 14:18:51', 1),
(384, 204, 28, 204, '2013-05-19 14:18:51', 1),
(385, 204, 29, 204, '2013-05-19 14:18:51', 1),
(386, 204, 30, 204, '2013-05-19 14:18:51', 1),
(387, 204, 31, 204, '2013-05-19 14:18:51', 1),
(388, 204, 32, 204, '2013-05-19 14:18:51', 1),
(389, 204, 33, 204, '2013-05-19 14:18:51', 1),
(390, 204, 34, 204, '2013-05-19 14:18:51', 1),
(391, 204, 35, 204, '2013-05-19 14:18:51', 1),
(392, 204, 36, 204, '2013-05-19 14:18:51', 1),
(393, 204, 37, 204, '2013-05-19 14:18:51', 1),
(394, 204, 38, 204, '2013-05-19 14:18:51', 1),
(395, 204, 39, 204, '2013-05-19 14:18:51', 1),
(396, 204, 40, 204, '2013-05-19 14:18:51', 1),
(397, 204, 41, 204, '2013-05-19 14:18:51', 1),
(398, 204, 42, 204, '2013-05-19 14:18:51', 1),
(399, 204, 43, 204, '2013-05-19 14:18:51', 1),
(400, 204, 44, 204, '2013-05-19 14:18:51', 1),
(401, 204, 45, 204, '2013-05-19 14:18:51', 1);

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=206 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first`, `last`, `username`, `email`, `password`, `Major`, `Classification`, `Departement`, `verified`, `hash`, `logs`, `defaultHours`, `authorized`) VALUES
(160, 3, 'Hazar', 'Kahera', 'hkahera', 'hkahera@pvamu.edu', 'e10adc3949ba59abbe56e057f20f883e', 'Computer Science', 'Senior', '', 1, '3295c76acbf4caaed33c36b1b5fc2cb1', 1, 15, 0),
(204, 3, 'Dezshaun', 'Meeks', 'dmeeks1', 'dmeeks1@pvamu.edu', 'e882b72bccfc2ad578c27b0d9b472a14', 'Computer Science', 'Senior', '', 1, '8d317bdcf4aafcfc22149d77babee96d', 1, 15, 0),
(199, 2, 'Fac', 'Fac', 'fac', 'fac@pvamu.edu', 'e882b72bccfc2ad578c27b0d9b472a14', '', '', 'Computer Science', 1, '38af86134b65d0f10fe33d30dd76442e', 0, 15, 0),
(151, 1, 'PV Admin', '', 'admin', 'admin@pvamu.hazar.us', '0e6b6219c5602c8b4592dc439606e839', '', '', '', 1, '', 0, 15, 1),
(194, 2, 'Kiranmai', 'Bellam', 'kibellam', 'kibellam@pvamu.edu', 'c08ac56ae1145566f2ce54cbbea35fa3', '', '', 'Computer Science', 1, '788d986905533aba051261497ecffcbb', 0, 15, 0),
(153, 2, 'Akhtar', 'Lodgher', 'aklodgher', 'aklodgher@PVAMU.EDU', 'e882b72bccfc2ad578c27b0d9b472a14', '', '', 'Computer Science', 1, '8f121ce07d74717e0b1f21d122e04521', 0, 15, 0),
(205, 3, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Computer Science', 'Freshman', '', 0, '88ae6372cfdc5df69a976e893f4d554b', 0, 15, 0),
(203, 3, 'Travis', 'West', 'twest', 'twest@pvamu.edu', 'e882b72bccfc2ad578c27b0d9b472a14', 'Computer Science', 'Freshman', '', 1, 'a684eceee76fc522773286a895bc8436', 1, 15, 0),
(197, 3, 'Student', 'Student', 'student12345', 'student12345@pvamu.edu', 'e882b72bccfc2ad578c27b0d9b472a14', 'Computer Science', 'Freshman', '', 0, '0336dcbab05b9d5ad24f4333c7658a0e', 0, 15, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
