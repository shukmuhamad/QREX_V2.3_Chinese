-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 10:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inspection`
--

-- --------------------------------------------------------

--
-- Table structure for table `sfg_fg`
--

CREATE TABLE `sfg_fg` (
  `factory` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `batch_id` varchar(255) NOT NULL,
  `inspection_stage` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pallet_no` varchar(255) NOT NULL,
  `inspection_level` varchar(255) NOT NULL,
  `quantity_ctn_bag` varchar(255) NOT NULL,
  `carton_no` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `so_no` varchar(255) NOT NULL,
  `lot_no` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `production_line` varchar(255) NOT NULL,
  `product_detail` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `pack_date` date NOT NULL,
  `verify_by_qa_id` varchar(255) NOT NULL,
  `weighing_scale_id` varchar(255) NOT NULL,
  `ruler_id` varchar(255) NOT NULL,
  `thickness_gauge_id` varchar(255) NOT NULL,
  `glove_weight_p_f` varchar(255) NOT NULL,
  `glove_weight_code` varchar(255) NOT NULL,
  `counting_p_f` varchar(255) NOT NULL,
  `counting_code` varchar(255) NOT NULL,
  `packaging_defect_p_f` varchar(255) NOT NULL,
  `layering` varchar(255) NOT NULL,
  `gripness` varchar(255) NOT NULL,
  `black_cloth` varchar(255) NOT NULL,
  `dispensing` varchar(255) NOT NULL,
  `smelly` varchar(255) NOT NULL,
  `donning_tearing` varchar(255) NOT NULL,
  `sticking` varchar(255) NOT NULL,
  `white_cloth` varchar(255) NOT NULL,
  `test1_name` varchar(255) NOT NULL,
  `test1_disposition` varchar(100) NOT NULL,
  `test2_name` varchar(100) NOT NULL,
  `test2_disposition` varchar(100) NOT NULL,
  `test3_name` varchar(100) NOT NULL,
  `test3_disposition` varchar(100) NOT NULL,
  `test4_name` varchar(100) NOT NULL,
  `test4_disposition` varchar(100) NOT NULL,
  `test5_name` varchar(100) NOT NULL,
  `test5_disposition` varchar(100) NOT NULL,
  `method` varchar(255) NOT NULL,
  `length1` varchar(255) NOT NULL,
  `length2` varchar(255) NOT NULL,
  `length3` varchar(255) NOT NULL,
  `length4` varchar(255) NOT NULL,
  `length5` varchar(255) NOT NULL,
  `length6` varchar(255) NOT NULL,
  `length7` varchar(255) NOT NULL,
  `length8` varchar(255) NOT NULL,
  `length9` varchar(255) NOT NULL,
  `length10` varchar(255) NOT NULL,
  `length11` varchar(255) NOT NULL,
  `length12` varchar(255) NOT NULL,
  `length13` varchar(255) NOT NULL,
  `length_p_f` varchar(255) NOT NULL,
  `width1` varchar(255) NOT NULL,
  `width2` varchar(255) NOT NULL,
  `width3` varchar(255) NOT NULL,
  `width4` varchar(255) NOT NULL,
  `width5` varchar(255) NOT NULL,
  `width6` varchar(255) NOT NULL,
  `width7` varchar(255) NOT NULL,
  `width8` varchar(255) NOT NULL,
  `width9` varchar(255) NOT NULL,
  `width10` varchar(255) NOT NULL,
  `width11` varchar(255) NOT NULL,
  `width12` varchar(255) NOT NULL,
  `width13` varchar(255) NOT NULL,
  `width_p_f` varchar(255) NOT NULL,
  `cuff1` varchar(255) NOT NULL,
  `cuff2` varchar(255) NOT NULL,
  `cuff3` varchar(255) NOT NULL,
  `cuff4` varchar(255) NOT NULL,
  `cuff5` varchar(255) NOT NULL,
  `cuff6` varchar(255) NOT NULL,
  `cuff7` varchar(255) NOT NULL,
  `cuff8` varchar(255) NOT NULL,
  `cuff9` varchar(255) NOT NULL,
  `cuff10` varchar(255) NOT NULL,
  `cuff11` varchar(255) NOT NULL,
  `cuff12` varchar(255) NOT NULL,
  `cuff13` varchar(255) NOT NULL,
  `cuff_p_f` varchar(255) NOT NULL,
  `palm1` varchar(255) NOT NULL,
  `palm2` varchar(255) NOT NULL,
  `palm3` varchar(255) NOT NULL,
  `palm4` varchar(255) NOT NULL,
  `palm5` varchar(255) NOT NULL,
  `palm6` varchar(255) NOT NULL,
  `palm7` varchar(255) NOT NULL,
  `palm8` varchar(255) NOT NULL,
  `palm9` varchar(255) NOT NULL,
  `palm10` varchar(255) NOT NULL,
  `palm11` varchar(255) NOT NULL,
  `palm12` varchar(255) NOT NULL,
  `palm13` varchar(255) NOT NULL,
  `palm_p_f` varchar(255) NOT NULL,
  `fingertip1` varchar(255) NOT NULL,
  `fingertip2` varchar(255) NOT NULL,
  `fingertip3` varchar(255) NOT NULL,
  `fingertip4` varchar(255) NOT NULL,
  `fingertip5` varchar(255) NOT NULL,
  `fingertip6` varchar(255) NOT NULL,
  `fingertip7` varchar(255) NOT NULL,
  `fingertip8` varchar(255) NOT NULL,
  `fingertip9` varchar(255) NOT NULL,
  `fingertip10` varchar(255) NOT NULL,
  `fingertip11` varchar(255) NOT NULL,
  `fingertip12` varchar(255) NOT NULL,
  `fingertip13` varchar(255) NOT NULL,
  `fingertip_p_f` varchar(255) NOT NULL,
  `bead_diameter1` varchar(255) NOT NULL,
  `bead_diameter2` varchar(255) NOT NULL,
  `bead_diameter3` varchar(255) NOT NULL,
  `bead_diameter4` varchar(255) NOT NULL,
  `bead_diameter5` varchar(255) NOT NULL,
  `bead_diameter6` varchar(255) NOT NULL,
  `bead_diameter7` varchar(255) NOT NULL,
  `bead_diameter8` varchar(255) NOT NULL,
  `bead_diameter9` varchar(255) NOT NULL,
  `bead_diameter10` varchar(255) NOT NULL,
  `bead_diameter11` varchar(255) NOT NULL,
  `bead_diameter12` varchar(255) NOT NULL,
  `bead_diameter13` varchar(255) NOT NULL,
  `bead_diameter_p_f` varchar(255) NOT NULL,
  `cuff_edge1` varchar(255) NOT NULL,
  `cuff_edge2` varchar(255) NOT NULL,
  `cuff_edge3` varchar(255) NOT NULL,
  `cuff_edge4` varchar(255) NOT NULL,
  `cuff_edge5` varchar(255) NOT NULL,
  `cuff_edge6` varchar(255) NOT NULL,
  `cuff_edge7` varchar(255) NOT NULL,
  `cuff_edge8` varchar(255) NOT NULL,
  `cuff_edge9` varchar(255) NOT NULL,
  `cuff_edge10` varchar(255) NOT NULL,
  `cuff_edge11` varchar(255) NOT NULL,
  `cuff_edge12` varchar(255) NOT NULL,
  `cuff_edge13` varchar(255) NOT NULL,
  `cuff_edge_p_f` varchar(255) NOT NULL,
  `g_weight1` varchar(255) NOT NULL,
  `g_weight2` varchar(255) NOT NULL,
  `g_weight3` varchar(255) NOT NULL,
  `g_weight4` varchar(255) NOT NULL,
  `g_weight5` varchar(255) NOT NULL,
  `g_weight6` varchar(255) NOT NULL,
  `g_weight7` varchar(255) NOT NULL,
  `g_weight8` varchar(255) NOT NULL,
  `g_weight9` varchar(255) NOT NULL,
  `g_weight10` varchar(255) NOT NULL,
  `g_weight11` varchar(255) NOT NULL,
  `g_weight12` varchar(255) NOT NULL,
  `g_weight13` varchar(255) NOT NULL,
  `g_weight_p_f` varchar(255) NOT NULL,
  `machine_id` varchar(255) NOT NULL,
  `sample_size` varchar(255) NOT NULL,
  `test_method` varchar(255) NOT NULL,
  `AQL_minor` varchar(255) NOT NULL,
  `AQL_major` varchar(255) NOT NULL,
  `AQL_critical` varchar(255) NOT NULL,
  `AQL_holes1` varchar(255) NOT NULL,
  `AQL_holes2` varchar(255) NOT NULL,
  `AQL_holes3` varchar(255) NOT NULL,
  `Acceptance_minor` varchar(255) NOT NULL,
  `Acceptance_major` varchar(255) NOT NULL,
  `Acceptance_critical` varchar(255) NOT NULL,
  `Acceptance_holes1` varchar(255) NOT NULL,
  `Acceptance_holes2` varchar(255) NOT NULL,
  `Acceptance_holes3` varchar(255) NOT NULL,
  `DB` varchar(20) NOT NULL,
  `SD` varchar(10) NOT NULL,
  `SP` varchar(10) NOT NULL,
  `CA` varchar(10) NOT NULL,
  `CL` varchar(10) NOT NULL,
  `CLD` varchar(10) NOT NULL,
  `CS` varchar(10) NOT NULL,
  `DF` varchar(10) NOT NULL,
  `DT` varchar(10) NOT NULL,
  `FM` varchar(10) NOT NULL,
  `FNO` varchar(10) NOT NULL,
  `GNO` varchar(10) NOT NULL,
  `IB` varchar(10) NOT NULL,
  `L` varchar(10) NOT NULL,
  `PMI` varchar(20) NOT NULL,
  `PMO` varchar(20) NOT NULL,
  `PLM` varchar(20) NOT NULL,
  `RC` varchar(20) NOT NULL,
  `RM` varchar(20) NOT NULL,
  `SAG` varchar(20) NOT NULL,
  `SG` varchar(20) NOT NULL,
  `SHN` varchar(20) NOT NULL,
  `SI` varchar(20) NOT NULL,
  `SKV` varchar(20) NOT NULL,
  `SLD` varchar(20) NOT NULL,
  `SO` varchar(20) NOT NULL,
  `STK` varchar(255) NOT NULL,
  `STN` varchar(255) NOT NULL,
  `TA` varchar(255) NOT NULL,
  `TS` varchar(255) NOT NULL,
  `WL` varchar(255) NOT NULL,
  `CR` varchar(255) NOT NULL,
  `BPC` varchar(255) NOT NULL,
  `DC` varchar(255) NOT NULL,
  `DD` varchar(255) NOT NULL,
  `DIS` varchar(255) NOT NULL,
  `FMT` varchar(255) NOT NULL,
  `GL` varchar(255) NOT NULL,
  `MG` varchar(255) NOT NULL,
  `MS` varchar(255) NOT NULL,
  `NB` varchar(255) NOT NULL,
  `SML` varchar(255) NOT NULL,
  `WG` varchar(255) NOT NULL,
  `CH` varchar(255) NOT NULL,
  `FK` varchar(255) NOT NULL,
  `FNE` varchar(255) NOT NULL,
  `TAHc` varchar(255) NOT NULL,
  `TH` varchar(255) NOT NULL,
  `TR` varchar(255) NOT NULL,
  `BF` varchar(255) NOT NULL,
  `P` varchar(255) NOT NULL,
  `CF` varchar(255) NOT NULL,
  `SF` varchar(255) NOT NULL,
  `TAH` varchar(255) NOT NULL,
  `FKS` varchar(255) NOT NULL,
  `THS` varchar(255) NOT NULL,
  `FT` varchar(255) NOT NULL,
  `TRS` varchar(255) NOT NULL,
  `GB` varchar(255) NOT NULL,
  `BF_2` varchar(255) NOT NULL,
  `P_2` varchar(255) NOT NULL,
  `CF_2` varchar(255) NOT NULL,
  `SF_2` varchar(255) NOT NULL,
  `TAH_2` varchar(255) NOT NULL,
  `FKS_2` varchar(255) NOT NULL,
  `THS_2` varchar(255) NOT NULL,
  `FT_2` varchar(255) NOT NULL,
  `TRS_2` varchar(255) NOT NULL,
  `GB_2` varchar(255) NOT NULL,
  `BF_3` varchar(255) NOT NULL,
  `P_3` varchar(255) NOT NULL,
  `CF_3` varchar(255) NOT NULL,
  `SF_3` varchar(255) NOT NULL,
  `TAH_3` varchar(255) NOT NULL,
  `FKS_3` varchar(255) NOT NULL,
  `THS_3` varchar(255) NOT NULL,
  `FT_3` varchar(255) NOT NULL,
  `TRS_3` varchar(255) NOT NULL,
  `GB_3` varchar(255) NOT NULL,
  `total_minor` varchar(255) NOT NULL,
  `total_major` varchar(255) NOT NULL,
  `total_critical` varchar(255) NOT NULL,
  `total_holes1` varchar(255) NOT NULL,
  `total_holes2` varchar(255) NOT NULL,
  `total_holes3` varchar(255) NOT NULL,
  `total_holes` varchar(255) NOT NULL,
  `overall_AQL` varchar(255) NOT NULL,
  `UD_disposition` varchar(255) NOT NULL,
  `final_disposition` varchar(255) NOT NULL,
  `verify_by` varchar(255) NOT NULL,
  `date_verify` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sfg_fg`
--

INSERT INTO `sfg_fg` (`factory`, `date`, `batch_id`, `inspection_stage`, `category`, `size`, `pallet_no`, `inspection_level`, `quantity_ctn_bag`, `carton_no`, `customer`, `brand`, `so_no`, `lot_no`, `product`, `product_code`, `colour`, `production_line`, `product_detail`, `shift`, `pack_date`, `verify_by_qa_id`, `weighing_scale_id`, `ruler_id`, `thickness_gauge_id`, `glove_weight_p_f`, `glove_weight_code`, `counting_p_f`, `counting_code`, `packaging_defect_p_f`, `layering`, `gripness`, `black_cloth`, `dispensing`, `smelly`, `donning_tearing`, `sticking`, `white_cloth`, `test1_name`, `test1_disposition`, `test2_name`, `test2_disposition`, `test3_name`, `test3_disposition`, `test4_name`, `test4_disposition`, `test5_name`, `test5_disposition`, `method`, `length1`, `length2`, `length3`, `length4`, `length5`, `length6`, `length7`, `length8`, `length9`, `length10`, `length11`, `length12`, `length13`, `length_p_f`, `width1`, `width2`, `width3`, `width4`, `width5`, `width6`, `width7`, `width8`, `width9`, `width10`, `width11`, `width12`, `width13`, `width_p_f`, `cuff1`, `cuff2`, `cuff3`, `cuff4`, `cuff5`, `cuff6`, `cuff7`, `cuff8`, `cuff9`, `cuff10`, `cuff11`, `cuff12`, `cuff13`, `cuff_p_f`, `palm1`, `palm2`, `palm3`, `palm4`, `palm5`, `palm6`, `palm7`, `palm8`, `palm9`, `palm10`, `palm11`, `palm12`, `palm13`, `palm_p_f`, `fingertip1`, `fingertip2`, `fingertip3`, `fingertip4`, `fingertip5`, `fingertip6`, `fingertip7`, `fingertip8`, `fingertip9`, `fingertip10`, `fingertip11`, `fingertip12`, `fingertip13`, `fingertip_p_f`, `bead_diameter1`, `bead_diameter2`, `bead_diameter3`, `bead_diameter4`, `bead_diameter5`, `bead_diameter6`, `bead_diameter7`, `bead_diameter8`, `bead_diameter9`, `bead_diameter10`, `bead_diameter11`, `bead_diameter12`, `bead_diameter13`, `bead_diameter_p_f`, `cuff_edge1`, `cuff_edge2`, `cuff_edge3`, `cuff_edge4`, `cuff_edge5`, `cuff_edge6`, `cuff_edge7`, `cuff_edge8`, `cuff_edge9`, `cuff_edge10`, `cuff_edge11`, `cuff_edge12`, `cuff_edge13`, `cuff_edge_p_f`, `g_weight1`, `g_weight2`, `g_weight3`, `g_weight4`, `g_weight5`, `g_weight6`, `g_weight7`, `g_weight8`, `g_weight9`, `g_weight10`, `g_weight11`, `g_weight12`, `g_weight13`, `g_weight_p_f`, `machine_id`, `sample_size`, `test_method`, `AQL_minor`, `AQL_major`, `AQL_critical`, `AQL_holes1`, `AQL_holes2`, `AQL_holes3`, `Acceptance_minor`, `Acceptance_major`, `Acceptance_critical`, `Acceptance_holes1`, `Acceptance_holes2`, `Acceptance_holes3`, `DB`, `SD`, `SP`, `CA`, `CL`, `CLD`, `CS`, `DF`, `DT`, `FM`, `FNO`, `GNO`, `IB`, `L`, `PMI`, `PMO`, `PLM`, `RC`, `RM`, `SAG`, `SG`, `SHN`, `SI`, `SKV`, `SLD`, `SO`, `STK`, `STN`, `TA`, `TS`, `WL`, `CR`, `BPC`, `DC`, `DD`, `DIS`, `FMT`, `GL`, `MG`, `MS`, `NB`, `SML`, `WG`, `CH`, `FK`, `FNE`, `TAHc`, `TH`, `TR`, `BF`, `P`, `CF`, `SF`, `TAH`, `FKS`, `THS`, `FT`, `TRS`, `GB`, `BF_2`, `P_2`, `CF_2`, `SF_2`, `TAH_2`, `FKS_2`, `THS_2`, `FT_2`, `TRS_2`, `GB_2`, `BF_3`, `P_3`, `CF_3`, `SF_3`, `TAH_3`, `FKS_3`, `THS_3`, `FT_3`, `TRS_3`, `GB_3`, `total_minor`, `total_major`, `total_critical`, `total_holes1`, `total_holes2`, `total_holes3`, `total_holes`, `overall_AQL`, `UD_disposition`, `final_disposition`, `verify_by`, `date_verify`) VALUES
('F11', '2019-08-01', '0112446', 'FINISHED GOOD', 'Non Medical', '7.0', '1212', '4th Level', '11', '22', ' Ansell Global Trading Center', 'Airclean', '10004411', '211', 'NSPFPT', 'CW064', 'Avocado Green', 'L06', 'dad3adada', 'shift 1', '2019-07-27', '212121', '1234', '21121', '313', 'FAIL', '', 'PASS', '7676', 'FAIL', 'N/A', 'PASS', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'OMT', 'FAIL ', 'Foaming ', 'PASS', 'OMT', 'PASS', 'OMT', 'FAIL ', 'OMT', 'PASS', 'SINGLE WALL', '211', '11', '2121', '', '', '', '', '', '', '', '', '', '', 'PASS', '1221', '1313', '1313', '', '', '', '', '', '', '', '', '', '', 'PASS', '13', '13', '13', '', '', '', '', '', '', '', '', '', '', 'PASS', '13', '13', '13', '', '', '', '', '', '', '', '', '', '', 'PASS', '13', '13', '13', '', '', '', '', '', '', '', '', '', '', 'PASS', '13', '34', '343', '', '', '', '', '', '', '', '', '', '', 'PASS', '34', '334', '34', '', '', '', '', '', '', '', '', '', '', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PASS', '343', '34334343', 'WTT', '4.0', '2.5', 'N/L', '0.65', '0.65', '0.65', '21', '1', '1', '1', '1', '1', '12', '2', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '11', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '', '1', '8', '8', '8', '8', '8', '88', '8', '8', '1', '7777', '77', '7', '7', '7', '7', '', '7', '7', '7', '1', '1', '11', '11', '1', '1', '21', '1.5', 'RDR', 'FAIL', 'helmi zaini', '2019-08-01'),
('M09', '2019-07-31', 'sertdyfugi', 'SEMI FINISHED GOOD', '', '7.5', 'dtfuyghij', '2nd Level', 'rtbthyd', '432', 'ALFA Trading S.A.S', 'Alfa Safe', '465789', 'gfyiu', 'LPFS', 'CW038', 'Green', '', 'vfedwsq', 'shift 2', '2019-08-01', 'jgeuhicksd', 'drttyfguhij', 'gcfhjkl', '', 'PASS', '456789', 'FAIL', '9876', 'PASS', 'PASS', 'N/A', 'FAIL', 'PASS', 'N/A', 'FAIL', 'PASS', 'N/A', 'OMT', 'PASS', 'Foaming ', 'FAIL ', 'Rubbing', 'PASS', 'IPA ', 'FAIL ', 'OMT', 'PASS', 'DOUBLE WALL', '1', '1', '1', '', '', '', '', '', '', '', '', '', '', 'PASS', '2', '2', '2', '', '', '', '', '', '', '', '', '', '', 'FAIL', '3', '3', '3', '', '', '', '', '', '', '', '', '', '', 'PASS', '4', '4', '4', '', '', '', '', '', '', '', '', '', '', 'FAIL', '5', '5', '5', '', '', '', '', '', '', '', '', '', '', 'PASS', '6', '6', '6', '', '', '', '', '', '', '', '', '', '', 'FAIL', '7', '7', '7', '', '', '', '', '', '', '', '', '', '', 'PASS', '', '', '', '', '', '', '', '', '', '', '', '', '', 'FAIL', '45678', 'etr', 'UT', '1.0', '1.5', '2.5', '4.0', '6.5', '1.0', '1', '2', '3', '4', '5', '6', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '4', '4', '4', '4', '4', '4', '4', '4', '4', '', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '1', '2', '3', '4', '5', '6', '67', '2.5', 'RDR', 'PASS', 'Sheleena', '2019-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `badge_id` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `badge_id`, `password`, `name`) VALUES
(1, 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id_worker` int(11) NOT NULL,
  `badge_id` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id_worker`, `badge_id`, `password`, `name`) VALUES
(0, 'worker', 'worker', 'worker'),
(1, 'worker', 'worker', 'worker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sfg_fg`
--
ALTER TABLE `sfg_fg`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id_worker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
