-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 08:12 PM
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
-- Database: `thedailynews`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_ID` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `View` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Name`, `View`) VALUES
(1, 'National', 'Menu'),
(2, 'International', 'Menu'),
(3, 'Sports', 'Menu'),
(4, 'Politics', 'Menu'),
(5, 'Health', ''),
(6, 'Technology', ''),
(8, 'Editor\'s Pick', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Cat_ID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(50) NOT NULL,
  `DateTime` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_ID`, `Title`, `User_ID`, `Cat_ID`, `Description`, `Image`, `DateTime`) VALUES
(5, 'Messi claims record sixth men\'s Ballon d\'Or', 2, 3, '<p><strong>Lionel&nbsp;Messi&nbsp;won a record sixth men\'s Ballon d\'Or award at a ceremony in Paris on Monday, beating Liverpool defender Virgil van Dijk to take the honours.</strong></p><p>Now aged 32, it is&nbsp;Messi\'s first Ballon d\'Or since 2015 and his sixth overall as he moves one ahead of his old rival Cristiano Ronaldo, who finished third in the voting.</p><p>Messi, who attended the ceremony at the Chatelet Theatre in the French capital with his wife and children, succeeds Luka Modric, the Real Madrid and Croatia midfielder who won the prize last year.</p><p>The Barcelona number 10 previously won the award in 2009, 2010, 2011 and in 2012 before claiming his fifth Ballon d\'Or in 2015.</p><p>This latest honour comes after he also claimed FIFA\'s equivalent award, The Best, in September.</p>', 'lib/image/5de6a3da82def3.11559336.jpg', '03-12-2019'),
(6, 'In quest of managing high risk labour and delivery management', 2, 5, '<p>Recently SAJIDA Foundation, in collaboration with Canadian health professionals Team Broken Earth, organised a three-day hands-on training programme on the best practices of High Risk Labour and Delivery Management with an inauguration ceremony chaired by National Prof Dr Shahla Khatun and inaugurated by the Director General Health Services, Ministry of Health and Family Welfares, Md Abul Kalam Azad.</p><p>Ms Zahida Fizza Kabir, Executive Director of SAJIDA Foundation, addressed the audience with a welcome speech. She said, â€œBangladesh is gradually moving into digitising the health systems as technology is addressing the enormity of the need.â€</p><p>The three-day comprehensive training designed to ensure the learnings be applied to combat the maternal and neonatal mortality and morbidity in Bangladesh, is based on the high burdens of maternal and new-born mortality during intra and postpartum periods in Bangladesh.</p><p>It works as a highly relevant initiative in the improvement of care in this field for health practitioners like physicians, nurses and midwives alike. The course was aimed to provide an understanding of the latest best practices to help health practitioners in providing better care for women during labour, their foetuses, as well as new-borns and their families.</p>', 'lib/image/5de6a8abb7b394.03140964.jpg', '03-12-2019'),
(8, 'Emerging technologies for an emerging economy', 2, 6, '<p>Bangladesh has been riding the growth waves in the last two-and-a-half decades with spectacular results: our exports grew six folds, our GDP quadrupled and our extreme poverty levels got slashed by more than half, not to mention our 30 percent increase in longevity and other human development achievements. Many global institutions from Gartner and McKinsey to Wall Street investment banks and the World Bank have been projecting continued healthy growth of our economy and our sure-shot place among the top economic powerhouses of this century.</p>', 'lib/image/5de7a87a084470.77746475.jpg', '04-12-2019'),
(9, 'Buet students decide to return to classes', 2, 1, '<p>The agitating Buet students today announced to return to classes as the university authority met their three-point demand including expulsion of its 26 students for their alleged involvement in Abrar Fahad murder case.</p><p>â€œBuet authorities accepted our three-point demand within stipulated time and thus we are announcing conclusion of our movement,â€ Mahmudur Rahman Sayam, spokesperson of the student, came up with the announcement at a press conference on the Shaheed Minar premise of the university this afternoon.</p>', 'lib/image/5de7d698696136.23316000.jpg', '04-12-2019'),
(10, 'Ducsu VP Nurâ€™s office locked', 2, 1, '<p><strong>Muktijuddho Moncho, a platform comprising descendants of freedom fighters, today padlocked Ducsu Vice President Nurul Haque Nurâ€™s office, issuing 48-hour ultimatum to stepdown from his post.</strong></p><p>Labelling Nur as corrupt, some activists of the platform led by its spokesperson Prof AKM Jamal Uddin of sociology department of the DU locked Nurâ€™s office room at the Ducsu building around 1:00 pm.</p><p>Earlier, they burnt an effigy of Nur centring an unverified audio clip in which a person was requesting another one to be a bank guarantor for a project.&nbsp;</p><p>Following the incident, activists of the platforms pasted two posters on the door of the office that read â€œCorrupt VP Nur has to resign, he has no place on Dhaka University campus.â€</p><p>â€œWe gave Nur a 48-hour time to resign from his post willingly and leave the campus by the time. Muktijuddho Moncho does not want to see him on the campus anymore, Jamal Uddin said after pasting the posters.</p>', 'lib/image/5de7daba8f02e0.81802032.jpg', '04-12-2019'),
(11, 'Untreated medical waste: A serious threat to public health', 2, 8, '<p>Untreated medical wastes are accumulating at landfills in seven divisional cities, posing serious threat to public health.</p><p>These divisional cities, excluding the capital, have around 1,380 healthcare establishments -- public and private -- which produce over 20 tonnes of medical wastes every day.</p><p>Although there have been many reports on the same scenario in Dhaka city, the other divisional cities have often escaped scrutiny in this regard.</p><p>But the picture there is also quite alarming.</p><p>With no comprehensive official data on medical wastes available, The Daily Star has obtained the approximate figure after talking with civil surgeons, city corporation officials and third parties.</p><p>&nbsp;</p><p>The Daily Star correspondents have found an alarming picture of medical waste management -- from collecting and sorting wastes at the primary sources (hospitals and clinics) to dumping at designated landfills in Chattogram, Rajshahi, Barishal, Khulna, Rangpur, Sylhet and Mymensingh.</p><p>In these cities, there are designated bins for hazardous medical waste in almost every healthcare facility, but the healthcare professionals hardly follow the procedure regarding proper disposal of medical wastes.</p><p>According to experts, medical waste is not like other wastes and it can infect through the skin, as well as through inhalation or ingestion.</p><p>They said HIV, and Hepatitis B and C present the greatest risk from such waste. Besides, antibiotic resistant germs (superbugs) and other dangerous germs can spread from medical waste.</p>', 'lib/image/5de7e603f1a098.83578629.jpg', '04-12-2019'),
(13, 'ACC approves charges against ex-CJ Sinha', 2, 1, '<p><strong>The Anti-Corruption Commission (ACC) today approved charges against 11 people including former chief justice SK Sinha in a case filed for his alleged involvement in withdrawing of Tk four crore from Farmers Bank.</strong></p><p>On July 10, the national anti-graft agency filed a case against SK Sinha and 10 others on charges of misappropriating and laundering around Tk 4 crore from the then Farmers Bank now Padma Bank in 2016.</p><p>The other accused include the bankâ€™s former MD AKM Shamim, Senior Executive Vice President and former head of Credit Division Gazi Salahuddin, First Vice President of Credit Division Swapan Kumar Roy, Senior Vice President and former branch manager Zia Uddin Ah-med, First Vice President Shafiuddin Askary and Vice President Lutful Haque.</p><p>Rest of the accused are one Shahjahan of Tangailâ€™s Sreehoripur village; Ranjit Chandra Saha of the districtâ€™s Jodunathpur village, his wife Santri Roy and nephew Niranjan Chandra Saha.</p>', 'lib/image/5de7f1f7248555.84929937.jpg', '04-12-2019'),
(14, 'Cristiano Ronaldo produces another iconic Champions League display', 2, 3, '<p><strong>Cristiano Ronaldo was signed to win Juventus the Champions League - and he might yet do just that.</strong></p><p>The Portuguese produced his latest masterclass in Europe\'s elite competition to bring the Italian side back from the brink of a last-16 exit against Atletico Madrid and book their place in the quarter-finals.</p><p>Trailing 2-0 from the first leg in Spain, Ronaldo was facing up to the prospect of failing to reach at least the semi-finals for the first time since 2010 - and only the second time in 12 seasons.</p>', 'lib/image/5de7fc76485a93.91436182.jpg', '04-12-2019'),
(15, 'Child life expectancy projections cut by years', 2, 5, '<p><strong>Years have been knocked off official projections of children\'s life expectancies in the UK, an Office for National Statistics (ONS) report shows.</strong></p><p>A baby girl born in 2019 is now expected to celebrate three fewer birthdays on average, than under previous calculations.</p><p>Official 2014 data thought that girl would make it to 93.6. Now the figure is 90.4.</p><p>The report also slashed the likelihood of children reaching 100.</p><h2>What\'s going on?</h2><p>Although life expectancies have been and are still improving, experts say previous estimates were too high.</p><p>The improvement is much smaller than previously thought, as part of a widely acknowledged slowdown in life expectancy since 2011.</p><p>In 2018, life expectancy growth stalled <strong>for the first time in more than 30 years</strong>.</p><p>This has led statisticians to re-evaluate their assumptions about future improvements in life expectancy, resulting in the figures released today.</p>', 'lib/image/5de7fe57d6f359.62383709.jpg', '04-12-2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `UserType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Email`, `Password`, `UserType`) VALUES
(1, 'arifaust', 'arif.ishan05@gmail.com', 'a', 'Admin'),
(2, 'Aadee', 'kafiaslam07@gmail.com', '123', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
