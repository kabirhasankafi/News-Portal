-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2019 at 05:37 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Con_ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Message` text NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Con_ID`, `Username`, `Subject`, `Email`, `Message`, `Status`) VALUES
(1, 'a', 'aa', 'q@gmail.com', 'aa21 2', 1),
(2, 'sa', 'sa', 'inari55@gmail.com', 'sa', 1),
(3, 'wq', 'wq', 'arifishadn@gmail.com', 'wq', 0),
(4, 'Ishan', 'Help', 'mir.ishan77@gmail.com', 'Ki obostha', 1),
(5, 'kabir hasan', 'The Daily News', 'kafiaslam07@gmail.com', 'Its first artificial-intelligence robotic racing contest was the result of a collaboration between aerospace giant Lockheed Martin and crowd-sourced problem-solving platform HeroX.', 0),
(6, 'kafi', 'post', 'kabirhasankafi07@gmail.com', 'Myanmar civilian leader Aung San Suu Kyi defended her government from accusations of genocide against the Rohingya community at the United Nationâ€™s top court yesterday, calling the allegations â€œincomplete and misleading.â€', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_ID` int(11) NOT NULL,
  `Approved` int(11) NOT NULL,
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

INSERT INTO `post` (`Post_ID`, `Approved`, `Title`, `User_ID`, `Cat_ID`, `Description`, `Image`, `DateTime`) VALUES
(23, 1, 'Muslims not part of conflict in Rakhine: Suu Kyi', 2, 2, '<p><strong>Refuting the allegation of the ongoing genocide against Rohingyas in Rakhine, Myanmar leader Aung San Suu Kyi today told the UNâ€™s highest court that Muslims are not part of the conflict.</strong></p><p>She was speaking in Myanmar\'s defence at the UN\'s top court, a day after the Gambia brought&nbsp;the allegation of the ongoing genocide against Rohingya Muslims in Rakhine.</p><p>â€œMuslims are not the part of this conflict,â€ the told the International Court of Justice at the Haque.</p><p>She said there is a conflict between the Buddhist Arakan army and Myanmar defence forces.</p><p>A 17-member panel of judges of ICJ was hearing a case, the first international legal attempt to bring Myanmar to justice over alleged mass killings of the Rohingya minorities in 2017, filed by the Gambia on November 11.</p><p>&nbsp;</p><p>Yesterday, the Gambia accused Myanmar of breaching the 1948 genocide convention and urged the UN top court to order Myanmar to stop genocide against the Rohingya minority.</p><p>The African country unfolded the evidence of genocide against Rohingyas before the International Court of Justice and urged the court to prosecute the Myanmar generals responsible for the bloody crackdown.</p>', 'lib/upload/5df12fb190e8b3.49567771.jpg', '11-12-2019'),
(24, 1, '1 killed, 33 burnt in Keraniganj plastic factory fire', 2, 1, '<p><strong>At least a worker was killed and 33 others burnt in a fire that broke out at a plastic factory in Keraniganj of Dhaka this afternoon.</strong></p><p>Of the 33 burnt workers, 10 victims are with 100 per cent while others with 20 to 70 per cent burn injuries, Brig Gen AKM Nasir Uddin, Director of Dhaka Medical College Hospital (DMCH), told The Daily Star.</p><p>They were taken at the burn and plastic unit of the hospital, he said.&nbsp;</p><p>Meanwhile, identity of the deceased could not be known yet, Shah Jaman, officer-in-charge (OC) of South Keraniganj Police Station, told The Daily Star.</p><p>The fire broke out at the tin-shed building of Prime Pattern Plastic Limited located at Chunkutia in South Keraniganj around 4:30pm, said Ziaur Rahman, duty officer of Fire Service and Civil Defence Headquarters.</p><p>&nbsp;</p><p>On information, 10 units of fire-fighters rushed to the spot and doused the blaze around 5:45pm, said Ziaur Rahman.</p><p>The fire service officials recovered the charred body of a man and rescued the 33 workers, who suffered burn injuries.</p><p>However, the reason behind the fire could not be known yet.</p><p>External respiratory organs of most of the victims were burnt, said Prof Md Abul Kalam, director of Sheikh Hasina National Burn and Plastic Surgery Institute of DMCH.</p>', 'lib/upload/5df13069c16fc9.86885637.jpg', '30-12-2019'),
(25, 1, 'Genocidal intent there for decades, experts say', 2, 1, '<p><strong>Denial of Rohingya citizenship, systematic deprivation and violation of basic rights by the Myanmar authorities over the decades were not mentioned by any of the lawyers at the ICJ â€“ making their arguments weak that there was no genocidal intent, analysts said.</strong></p><p>â€œGenocidal intent was not only in 2016 or 2017 in the military crackdown against the Rohingya. Myanmar took up a genocidal policy since 1962. It was a slow genocide that found its momentum in 2017,â€ said former Ambassador Munshi Faiz Ahmad.</p><p>He responded to the arguments presented by Myanmar State Counsellor Aung San Suu Kyi and other lawyers on the second day of the hearing at the International Court of Justice (ICJ) at The Hague.</p><p>The Gambia, which filed a lawsuit against Myanmar, accusing it of genocide against the Rohingya on November 11, presented its arguments on Tuesday. Yesterday was the turn of Myanmar. Its salient features were that Myanmar militaryâ€™s attack on August 25 in 2017 was a response to the attacks by the Arakan Rohingya Salvation Army (ARSA) and that there is no sign of ongoing genocide in Rakhine now.</p><p>Suu Kyi said the Gambia has not taken into account the ongoing internal armed conflict between the Arakan Army and the Myanmar military. She said that Myanmar has taken a number of initiatives for establishing harmony and peace and development in Rakhine state.</p>', 'lib/upload/5df130f1b2f084.06034297.jpg', '11-12-2019'),
(26, 1, 'Cumilla thrash Rangpur', 2, 3, '<p><strong>Cumilla Warriors registered a whopping 105-run victory against Rangpur Rangers in the second match of the ongoing Bangabandhu Bangladesh Premier League (BBPL) under the lights at the Sher-e-Bangla National Stadium in Mirpur today.</strong></p><p>Coming in to chase a challenging 173 for seven posted by Cumilla, Rangpur faltered and were bundled out for a meagre 68 in just 14 overs.</p><p>Rangpur suffered a batting collapse with only three of their batsmen being able to cross double-figure mark. Al Amin Hossain struck twice in the sixth over with back to back deliveries that saw Rangpur struggling at 34 for four. After that Rangpur could not recover as they kept on losing wickets at regular intervals. Rangpur\'s opener Mohammad Naim scored a team high of 27-ball 17 runs. Cumilla\'s Al Amin finished with impressive figures of three for 14 in three overs.</p><p>Earlier, skipper Dasun Shanaka\'s 31-ball 75, laced with three boundaries and nine maximums,&nbsp;powered Cumilla to a challenging total.&nbsp;&nbsp;</p>', 'lib/upload/5df13184e28fa3.30958386.jpg', '11-12-2019'),
(27, 1, 'Two vaping advisories released by CDC', 2, 5, '<p>The United States Centres for Disease Control and Prevention (CDC) has issued two advisories â€” one on how to evaluate flu-like symptoms in the face of concerns about vaping, and the other about how the CDC will count and report e-cigarette and vapingâ€“associated lung injuries (EVALIs).</p><p>Given that EVALI symptoms are similar to those of influenza, the agency makes several recommendations in Morbidity and Mortality Weekly Report (MMWR), among them:Ask patients with flu-like symptoms about their use of e-cigarettes and vapingStrongly consider influenza testing during flu seasonEvaluate suspected EVALI cases with pulse oximetry and chest imagingConsider outpatient management for stable EVALIUse corticosteroids with caution in patients who are not admitted</p><p>From an epidemiologic standpoint, the CDC says it will no longer count non-hospitalised EVALI cases, given that hospitalised and non-hospitalised patients share similar characteristics and that only 5% of cases were non-hospitalised.</p><p>The advisory recommends that patients with EVALI can be managed as outpatients if they have oxygen saturations at 95% or above on room air, no respiratory distress, and no comorbid conditions that could impair pulmonary reserve.</p>', 'lib/upload/5df132434c1bf5.85284508.jpg', '11-12-2019'),
(28, 1, 'Peopleâ€™s lack of enthusiasm for polls an ominous sign: EC Mahbub', 2, 4, '<p><strong>Election Commissioner Mahbub Talukder today said the lack of enthusiasm for election among the people is an ominous sign for a democratic nation.</strong></p><p>EC Mahbub said this in a press statement expressing his opinion on the fifth phase of Upazila Parishad Elections which ended yesterday.</p><p>Terming it as the most alarming aspect, EC Mahbub said, â€œIt is an ominous sign for a democratic nation if the people are not enthusiastic about the elections.â€</p><p>â€œBy holding free and fair elections, we must uphold our democracy,â€ he said.</p><p>â€œThe nation is being pushed to the edge of a cliff by peopleâ€™s lack of enthusiasm and participation in the elections,â€ he said, adding that lopsided elections are responsible for this situation.</p>', 'lib/upload/5df133e5c0f202.47102264.jpg', '11-12-2019'),
(29, 1, 'Elevating the rank of Dhaka University', 2, 8, '<p>The Dhaka University Alumni Association of New England (DUAANE) organised a seminar in Cambridge, Massachusetts, USA on February 24, 2019 to discuss and debate the low standing of Dhaka University in the global academic arena. The event was triggered by some concerns about the universityâ€™s low ranking in some recent surveys or â€œpollsâ€. Two very well-respected rankings, the Times Higher Educationâ€™s World University Rankings (WUS) and QS University Rankings (QS), have left out DU from its panel of the worldâ€™s top 300 universities.</p><p>At the seminar, attended by many former faculty members of DU, there was almost unanimous agreement that the quality of education at DU has been declining for some years. Several problems including lack of resources, the effect of political influence, and the role of private universities were identified. However, and most importantly, the panellists primarily turned their attention to the methodology used by the polling organisations. As an invited panellist, and a former faculty of the university, I was asked to share with the participants my thoughts on the low ranking and to offer some suggestions to improve the state of affairs. I will provide more details on this later.</p><p>By the end of the seminar, we had a good idea as to why WUS and QS ranked Dhaka University, my alma mater, so low. And the consensus was that one does not have to look very far to find the reason for the low ranking. The key finding is that the faculty of DU are lacking in their research publications in refereed journals. This is not to say that our professors and research staff are not engaged in writing books, journal papers, monographs, research papers, or survey reports. They are doing so, and probably in volumes every year. But they do not receive the attention of the rest of the world for an important reason. These papers, however well-written or well-documented, lie buried in obscure journals, and seldom see the light of day in refereed journals! As a result, they escape the attention of other researchers. And that is a shame!</p><p>It needs to be noted that the methodologies used by WUS and QS are very similar. There is general agreement in the global academic community that the reputation of a university depends on the quality of its students, faculty, and scholarship. Every university, whether in the US, Europe, China or Singapore, hires and promotes faculty on the basis of their teaching abilities as judged by their students, their research capabilities and contribution to their respective discipline and, above all, their publications in peer-reviewed and world-class professional journals.</p>', 'lib/upload/5df1349c1a90a2.65259702.jpg', '11-12-2019'),
(30, -1, 'a', 1, 1, 'a', 'lib/upload/5e0a0650c9ba27.24927837.png', '30-12-2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Bio` varchar(200) NOT NULL,
  `Work` varchar(50) NOT NULL,
  `Study` varchar(50) NOT NULL,
  `Lives` varchar(50) NOT NULL,
  `ProfilePic` varchar(60) NOT NULL,
  `CoverPic` varchar(60) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `UserType` varchar(10) NOT NULL,
  `Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Email`, `Bio`, `Work`, `Study`, `Lives`, `ProfilePic`, `CoverPic`, `Password`, `UserType`, `Code`) VALUES
(1, 'arifaust', 'arif.ishan@gmail.com', '', 'q', 'q', 'qa', 'lib/upload/5e0a12835dbfa7.31939754.png', 'lib/upload/5e0a12835dbfa7.31939754.png', 'a', 'Admin', 0),
(2, 'Aadee', 'kafiaslam07@gmail.com', '', '', '', '', 'lib/upload/5e0a12835dbfa7.31939754.png', 'lib/upload/5e0a12835dbfa7.31939754.png', '123', 'Admin', 0),
(3, 'kafi', 'kafiaslam07@gmail.com', '', '', '', '', 'lib/upload/5e0a12835dbfa7.31939754.png', 'lib/upload/5e0a12835dbfa7.31939754.png', '12345', 'User', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Con_ID`);

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Con_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
