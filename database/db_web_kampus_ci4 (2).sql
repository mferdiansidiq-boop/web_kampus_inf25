-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2026 at 02:53 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web_kampus_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app`
--

CREATE TABLE `tbl_app` (
  `id_app` int NOT NULL,
  `nama_app` varchar(255) NOT NULL,
  `link_app` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_app`
--

INSERT INTO `tbl_app` (`id_app`, `nama_app`, `link_app`) VALUES
(1, 'Simbaru', 'https://sim.peradaban.ac.id/'),
(2, 'Perpustakaan', 'https://opac.peradaban.ac.id/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `nama_dosen` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `alamat` text,
  `id_prodi` int DEFAULT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `nip`, `nama_dosen`, `foto`, `jenis_kelamin`, `email`, `no_telp`, `alamat`, `id_prodi`, `pendidikan_terakhir`) VALUES
(1, '4242304911', 'Muhammad Isa Irawanto M.Kom', '1_1768141228_b8e624acf762a3754cdb.jpg', 'Laki-laki', 'muh.isairawanto@gmail.com', '082329221051', 'grengseng taraban paguyangan', 1, 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kampus`
--

CREATE TABLE `tbl_kampus` (
  `id` int NOT NULL,
  `nama_kampus` varchar(255) NOT NULL,
  `logo_kampus` varchar(255) NOT NULL,
  `logo_header` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `operasional` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twiter` varchar(255) DEFAULT NULL,
  `foto_pimpinan` varchar(255) DEFAULT NULL,
  `nama_pimpinan` varchar(255) DEFAULT NULL,
  `dipimpin_oleh` varchar(255) DEFAULT NULL,
  `sambutan` text,
  `sejarah` text,
  `visi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `misi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `organisasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kampus`
--

INSERT INTO `tbl_kampus` (`id`, `nama_kampus`, `logo_kampus`, `logo_header`, `alamat`, `no_telp`, `email`, `operasional`, `youtube`, `facebook`, `linkedin`, `instagram`, `twiter`, `foto_pimpinan`, `nama_pimpinan`, `dipimpin_oleh`, `sambutan`, `sejarah`, `visi`, `misi`, `organisasi`) VALUES
(1, 'Universitas Peradaban', '1768028137_ca58ea48592e1042ab56.png', '1768027039_df18a1c522c5783f59ad.jpg', 'jalan raya pagojengan, paguyangan, berebes jawa tengah', '0975547899976', 'peradaban@gmail.com', '08:00 - 16:00', 'www.youtube.com/@peradabanuniversity', 'https://www.facebook.com/p/Universitas-Peradaban-100054496507599/', 'https://www.instagram.com/peradaban_university/', 'https://www.instagram.com/peradaban_university/', 'https://www.facebook.com/p/Universitas-Peradaban-100054496507599/', '1768033106_31c4961f08cd2929b8d8.jpg', 'Moh.Khadasihman SH,M.Si', NULL, 'Selamat datang di laman resmi Universitas Peradaban Bumiayu\r\nDi era transformasi digital yang semakin melaju pesat pada tahun 2026 ini, dunia pendidikan tinggi menghadapi tantangan sekaligus peluang yang luar biasa. Universitas Peradaban Bumiayu hadir bukan sekadar sebagai institusi pendidikan, melainkan sebagai ekosistem inovasi yang mempertemukan kecerdasan intelektual dengan karakter yang luhur.\r\nKami berkomitmen untuk menyelenggarakan pendidikan yang adaptif dan relevan dengan kebutuhan industri masa depan. Melalui kurikulum berbasis teknologi, kolaborasi global, dan penguatan riset, kami membekali mahasiswa dengan kompetensi yang melampaui batas ruang kelas.\r\nVisi kami jelas: Menjadi pusat unggulan yang mencetak pemimpin masa depan, inovator, dan agen perubahan yang siap berkontribusi nyata bagi bangsa dan dunia. Kami percaya bahwa setiap individu di Universitas Peradaban Bumiayu memiliki potensi unik untuk menciptakan dampak positif bagi masyarakat.', '                      <p>                      <b>Universitas Peradaban (UP) </b>di Brebes lahir pada 18 Oktober 2014 dari penggabungan STKIP Islam dan STIE Islam Bumiayu, didirikan oleh Yayasan Wakaf Ta\'allumul Huda Bumiayu, dan diresmikan oleh perwakilan Kemendikbud dengan rektor pertama Prof. Dr. H. Yahya A. Muhaimin, mengemban misi mencetak insan cerdas berakhlak mulia melalui pengembangan program studi beragam, termasuk Sains dan Teknologi, dengan harapan menjadi kampus unggul di Jawa Tengah.</p><p> \r\nLatar Belakang Pendirian:</p><p><span style=\"font-size: 1rem;\">Berada di bawah naungan Yayasan Wakaf Ta\'allumul Huda Bumiayu.</span></p><p>\r\nMerupakan pengembangan dari dua institusi pendidikan tinggi sebelumnya: Sekolah Tinggi Keguruan dan Ilmu Pendidikan (STKIP) Islam Bumiayu dan Sekolah Tinggi Ilmu Ekonomi (STIE) Islam Bumiayu. </p><p>\r\nPeresmian:\r\n</p><p>Diresmikan pada tanggal 18 Oktober 2014.\r\n</p><p>Peresmian dihadiri oleh Direktur Kelembagaan Perguruan Tinggi (mewakili Mendiknas), Bupati Brebes, dan Rektor pertama UP, Prof. Dr. H. Yahya A. Muhaimin.</p><p> \r\nPerkembangan &amp; Program Studi:\r\n</p><p>Selain Fakultas Ekonomika dan Bisnis (FEB) yang sudah ada, UP berkembang dengan Fakultas Sains dan Teknologi (FST) yang memiliki program studi seperti Farmasi, Informatika, Sistem Informasi, Agribisnis, dan Teknik Elektro.\r\n</p><p>Fokus pada pengembangan sumber daya manusia unggul dengan nilai intelektual tinggi dan akhlak mulia, serta menyediakan pendidikan terjangkau.                                         </p>                    ', '                      <p style=\"margin: 0px 0px 12px; padding: 0px; list-style: disc; padding-inline-start: 4px;\"><span class=\"T286Pc\" data-sfc-cp=\"\" jscontroller=\"fly6D\" jsuid=\"IVCV2e_m\" data-processed=\"true\" style=\"overflow-wrap: break-word;\">Menjadi Universitas terkemuka dalam mengembangkan peradaban bangsa dengan menciptakan insan yang cerdas dan berakhlak mulia pada tahun 2030.</span><span jsuid=\"IVCV2e_n\" class=\"uJ19be notranslate\" jsaction=\"rcuQ6b:&amp;IVCV2e_n|npT2md\" jscontroller=\"udAs2b\" data-wiz-uids=\"IVCV2e_o,IVCV2e_p\" data-processed=\"true\"><span class=\"vKEkVd\" data-animation-atomic=\"\" data-wiz-attrbind=\"class=IVCV2e_n/TKHnVd\" data-processed=\"true\" style=\"text-wrap-mode: nowrap; position: relative;\">&nbsp;</span></span></p>', '<ul class=\"KsbFXc U6u95\" jscontroller=\"mPWODf\" jsuid=\"IVCV2e_w\" data-processed=\"true\" style=\"margin: 10px 0px 20px; padding: 0px; font-family: &quot;Google Sans&quot;, Arial, sans-serif; line-height: 24px; padding-inline-start: 16px; color: rgb(10, 10, 10);\"><li jscontroller=\"vsuOFb\" jsuid=\"IVCV2e_x\" data-hveid=\"CAUQAA\" data-processed=\"true\" style=\"margin: 0px 0px 12px; padding: 0px; list-style: disc; padding-inline-start: 4px;\"><span class=\"T286Pc\" data-sfc-cp=\"\" jscontroller=\"fly6D\" jsuid=\"IVCV2e_y\" data-processed=\"true\" style=\"overflow-wrap: break-word;\">Mewujudkan pendidikan tinggi berkualitas yang menghasilkan lulusan cerdas, berakhlak mulia, dan profesional.</span></li><li jscontroller=\"vsuOFb\" jsuid=\"IVCV2e_z\" data-hveid=\"CAUQAQ\" data-processed=\"true\" style=\"margin: 0px 0px 12px; padding: 0px; list-style: disc; padding-inline-start: 4px;\"><span class=\"T286Pc\" data-sfc-cp=\"\" jscontroller=\"fly6D\" jsuid=\"IVCV2e_10\" data-processed=\"true\" style=\"overflow-wrap: break-word;\">Mengembangkan ilmu pengetahuan dan teknologi yang inovatif dan relevan dengan kebutuhan bangsa dan peradaban dunia.</span></li><li jscontroller=\"vsuOFb\" jsuid=\"IVCV2e_11\" data-hveid=\"CAUQAg\" data-processed=\"true\" style=\"margin: 0px 0px 12px; padding: 0px; list-style: disc; padding-inline-start: 4px;\"><span class=\"T286Pc\" data-sfc-cp=\"\" jscontroller=\"fly6D\" jsuid=\"IVCV2e_12\" data-processed=\"true\" style=\"overflow-wrap: break-word;\">Melaksanakan penelitian dan pengabdian kepada masyarakat yang berorientasi pada pembangunan berkelanjutan dan kearifan lokal.</span></li><li jscontroller=\"vsuOFb\" jsuid=\"IVCV2e_13\" data-hveid=\"CAUQAw\" data-processed=\"true\" style=\"margin: 0px 0px 12px; padding: 0px; list-style: disc; padding-inline-start: 4px;\"><span class=\"T286Pc\" data-sfc-cp=\"\" jscontroller=\"fly6D\" jsuid=\"IVCV2e_14\" data-processed=\"true\" style=\"overflow-wrap: break-word;\">Membangun budaya akademik yang inklusif, toleran, dan menjunjung tinggi nilai-nilai kebangsaan serta keislaman.</span></li><li jscontroller=\"vsuOFb\" jsuid=\"IVCV2e_15\" data-hveid=\"CAUQBA\" data-processed=\"true\" style=\"margin: 0px 0px 12px; padding: 0px; list-style: disc; padding-inline-start: 4px;\"><span class=\"T286Pc\" data-sfc-cp=\"\" jscontroller=\"fly6D\" jsuid=\"IVCV2e_16\" data-processed=\"true\" style=\"overflow-wrap: break-word;\">Membina kerjasama strategis dengan berbagai institusi nasional dan internasional untuk memperkuat pengembangan universitas.</span><span jsuid=\"IVCV2e_17\" class=\"uJ19be notranslate\" jsaction=\"rcuQ6b:&amp;IVCV2e_17|npT2md\" jscontroller=\"udAs2b\" data-wiz-uids=\"IVCV2e_18,IVCV2e_19\" data-processed=\"true\"><span class=\"vKEkVd\" data-animation-atomic=\"\" data-wiz-attrbind=\"class=IVCV2e_17/TKHnVd\" data-processed=\"true\" style=\"text-wrap-mode: nowrap; position: relative;\">&nbsp;</span></span></li></ul>                      ', '1768065393_909f49ad5d22b29446f3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int NOT NULL,
  `nama_prodi` varchar(255) DEFAULT NULL,
  `deskripsi_prodi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `nama_prodi`, `deskripsi_prodi`) VALUES
(1, 'Informatika', 'informatika'),
(2, 'Manajemen', 'Manajemen mantap'),
(3, 'sistem informasi', '                      Manajemen mantap sekali uhuy'),
(4, 'Akuntansi', 'Ngetung duit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id_slider` int NOT NULL,
  `judul_slider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `url_terkait` varchar(255) NOT NULL,
  `gambar_slider` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id_slider`, `judul_slider`, `url_terkait`, `gambar_slider`) VALUES
(1, 'wawiwu', 'https://www.justinmind.com/web-design/slider', '1767975323_28e9e7d42bcc9afda40e.jpg'),
(2, 'hahahihi', 'https://www.justinmind.com/web-design/slider', '1767975357_f1502dcbf6b56fe1f698.jpg'),
(4, 'slider 3', 'https://sim.peradaban.ac.id/', '1768033766_4388f61ce2e1396be7c9.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'Admin', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(2, 'User', 'User', '8cb2237d0679ca88db6464eac60da96345513964', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_app`
--
ALTER TABLE `tbl_app`
  ADD PRIMARY KEY (`id_app`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_kampus`
--
ALTER TABLE `tbl_kampus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_app`
--
ALTER TABLE `tbl_app`
  MODIFY `id_app` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kampus`
--
ALTER TABLE `tbl_kampus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id_slider` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
