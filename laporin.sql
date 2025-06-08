-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2025 at 07:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporin`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(25) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `tanggal`, `penulis`, `gambar`) VALUES
(13, 'Pjs Bupati Ajak Warga Ciptakan Lingkungan Sehat dengan Geber Sidoarjo', 'Sidoarjo - Penjabat Sementara (Pjs) Bupati Sidoarjo, Isa Anshori mengajak seluruh masyarakat Sidoarjo untuk berpartisipasi aktif menjaga kebersihan lingkungan. Dia menginisiasi program Gerakan Bersih Sidoarjo (Geber Sidoarjo).\r\nProgram Geber Sidoarjo itu bertujuan untuk mewujudkan lingkungan yang bersih dan sehat dan meningkatkan kesadaran masyarakat tentang pentingnya kebersihan lingkungan. Gerakan ini digelar serentak pada Jumat, 4 Oktober 2024 dimulai pukul 06.00 WIB.\r\n\r\nMelalui kegiatan kerja bakti massal ini, Isa Anshori berharap seluruh elemen masyarakat mulai dari OPD, pemerintah desa, organisasi masyarakat, hingga warga Sidoarjo bisa bergotong royong untuk membersihkan lingkungan di sekitar mereka.\r\n\r\n\"Kebersihan menjadi tanggung jawab kita bersama. Melalui Geber Sidoarjo kami ingin menciptakan lingkungan yang sehat dan nyaman untuk seluruh masyarakat,\" kata Anshori di pendopo, Kamis (3/10).\r\n\r\n\"Saya mengajak seluruh warga Sidoarjo untuk bersama-sama turun tangan menjaga kebersihan lingkungan,\" katanya.\r\n\r\nSelain membersihkan lingkungan Anshori juga mengingatkan pentingnya menjaga kebiasaan hidup bersih di kehidupan sehari-hari. Dia berharap program ini dapat menjadi awal dari gerakan yang lebih besar dalam menjaga kelestarian lingkungan di Kabupaten Sidoarjo.\r\n\r\n\"Mari kita jadikan kebersihan sebagai budaya. Dengan menjaga kebersihan lingkungan, kita turut menjaga kesehatan dan masa depan anak cucu kita,\" tambah Isa Anshori.\r\n\r\nDengan antusiasme yang tinggi dari warga dia berharap Geber Sidoarjo bisa terus berlanjut dan menjadi inspirasi bagi daerah lain dalam menggalakkan kebersihan lingkungan.', '2024-10-03', 'Suparno - detikJatim', 'gerakan-bersih-sidoarjo_169.jpeg'),
(14, 'Pegiat Lingkungan Sidoarjo Sebut Kesadaran Masyarakat soal Sampah Rendah', 'Sidoarjo - Jelang Hari Peduli Sampah Nasional 2022 yang jatuh pada Senin (21/2) pegiat lingkungan di Sidoarjo mengingatkan masyarakat agar sadar pada persoalan sampah. Itu karena kesadaran terkait sampah di masyarakat masih rendah.\r\nBahkan, selama pandemi COVID-19, sampah diketahui mengalami lonjakan yang signifikan. Hal ini karena adanya pembatasan aktivitas atau di rumah saja saat bekerja dan belajar. Sehingga menyebabkan sampah semakin menumpuk. Tak hanya pada kemasan sekali pakai, namun sampah medis seperti masker dan sarung tangan juga menumpuk.\r\n\r\nEdi Priyanto, pegiat lingkungan dari Kampung Edukasi Sampah berpendapat bahwa sebagian masyarakat masih egois karena masih memandang sebelah mata akan persoalan sampah ini, menanggap buangan sampah yang mereka hasilkan adalah urusan tukang sampah yang telah dibayar.\r\n\r\nBahkan pemandangan yang memprihatinkan adanya buangan sampah sembarangan di pinggir jalan, pada aliran sungai, lokasi tanah kosong menjadi hal lumrah. Tak jarang sampah yang dilemparkan begitu saja ke jalanan dari sebuah mobil juga sering kita temui.\r\n\r\nUntuk mengatasi hal ini, lanjut Edi, kesadaran masyarakat harus terus ditingkatkan. Tak hanya sebatas mengimbau tapi masyarakat juga harus diajarkan mengenai pengelolaan sampah yang baik dan benar.\r\n\r\n\"Pengelolaan sampah membutuhkan kesadaran warga. Inisiatif pengelolaan sampah di lingkungan masyarakat tak hanya bermanfaat menekan jumlah sampah yang dihasilkan, sampah sendiri dapat dimanfaatkan sebagai pupuk kompos bagi tanaman dan demikian juga mampu memiliki nilai ekonomis. Hanya saja, untuk mewujudkan hal tersebut dibutuhkan pengetahuan dan kemauan untuk dapat mewujudkan hal tersebut\" kata Edi, Jumat (13/2/2022).\r\n\r\nEdi menambahkan masih terbatasnya partisipasi dari masyarakat Indonesia dalam melakukan pemilahan sampah, menunjukkan bahwa pengetahuan tentang pemilahan sampah masih belum dipahami dengan baik. Padahal sampah yang telah dipilah dengan baik dapat memberikan banyak manfaat demikian juga mampu menciptakan ekonomi dari pengolahan sampah itu sendiri.\r\n\r\nPengelolaan sampah yang tidak benar akan menjadi musibah di masa mendatang, karena akan menyebabkan banyak masalah, diantaranya timbulnya berbagai penularan penyakit, bau yang tidak sedap, dan bahkan bisa menyebabkan terjadinya banjir.\r\n\r\n\"Cara efektif menyelesaikan masalah sampah sebenarnya dimulai dari kebiasaan memilahnya dari rumah. Sampah mestinya dipilah sejak dari rumah agar mudah untuk dilakukan pengolahan berikutnya, sampah organik bisa diolah sehingga bermanfaat menjadi kompos dan sampah anorganik menjadi bernilai ekonomis melalui manajemen bank sampah\", ujar Edi.\r\n\r\nEdi selanjutnya menegaskan bahwa ketika sampah dikelola dengan baik, maka sampah tak lagi menjadi musibah bagi manusia namun justru akan memberikan banyak manfaat, mengingat sesungguhnya manusia merupakan sumber penghasil sampah.\r\n\r\nSampah yang kita hasilkan sebenarnya bukan untuk kita wariskan kepada anak cucu namun sampah harus dikelola agar menjadi berkah. Bentuk kepedulian bisa kita lakukan dengan aksi kecil dan nyata dengan ikut serta melakukan pemilahan dan pengolahan sampah mulai sekarang, memberi contoh mulai dari diri kita sendiri dan keluarga dan selanjutnya mengajak lingkungan kita masing-masing.\r\n\r\nEdi Priyanto yang pada Januari 2022 lalu juga dianugerahi penghargaan sebagai pemerhati Keselamatan dan Kesehatan Kerja (K3) oleh Gubernur Jawa Timur merupakan seorang pegiat lingkungan dari Kampung Edukasi Sampah. Di lokasi ini memang khusus didedikasikan oleh warga sebagai role model sekaligus sarana edukasi bagi masyarakat umum tentang pengelolaan sampah.', '2022-02-18', 'Suparno - detikJatim', 'pegiat-lingkungan-di-sidoarjo_169.jpeg'),
(15, 'Sampah di TPA Sidoarjo Berkurang 60 Ton per Hari Selama Semester Pertama 2023', 'REPUBLIKA.CO.ID, SIDOARJO -- Jumlah sampah yang masuk ke Tempat Pembuangan Akhir (TPA) Jabon, Sidoarjo, Jawa Timur, berkurang sekitar 60 ton per hari selama semester pertama tahun 2023 di mana pada Januari tercatat 17.860 ton dan Juni hanya sebesar 14.740 ton. \"Angka tersebut tercatat rata-rata penurunannya mencapai 60 ton per hari,\" kata Bupati Sidoarjo Ahmad Muhdlor, Selasa (2/8/2023).\r\n\r\nIa mengatakan, upaya ini berbanding lurus dengan program pengurangan sampah yang telah dicanangkan oleh Pemerintah Kabupaten Sidoarjo hingga akhirnya membuahkan hasil. \"Keberhasilan ini kami lakukan dengan cara treatment (perlakuan) pengelolaan sampah kepada masyarakat salah satunya adalah mengacu pada UU Nomor 18 tahun 2008 tentang pengelolaan sampah pasal 12, yaitu setiap orang bertanggung jawab mengurangi sampah, mengarah pada perilaku,\" katanya.\r\n\r\nGus Muhdlor sapaan lekatnya juga menekankan bahwa limbah sampah makanan atau organik memiliki sumbangsih terbesar, yaitu 60 persen dari total sampah yang ada. Sehingga, limbah kuliner ini perlu dikelola atau dimanfaatkan kembali seperti untuk pakan ternak atau pupuk kompos.\r\n\r\n\"Untuk mengurangi sampah di TPA (tempat pembuangan sampah) upaya kami adalah pertama mengolah sampah makanan untuk dijadikan kompos atau untuk pakan hewan ternak, sedangkan untuk sampah unorganic diolah menjadi biomassa,\" katanya. \r\n\r\nKepala Dinas Lingkungan Hidup dan Kebersihan (DLHK) Kabupaten Sidoarjo M. Bahrul Amiq mengungkapkan keberhasilan pengurangan volume sampah ini, yaitu dengan memaksimalkan pengelolaan sampah di TPST (tempat pembuangan sampah terpadu) di setiap kecamatan. Jumlah TPST yang dimiliki Sidoarjo saat ini mencapai 170 TPST yang tersebar di desa-desa.\r\n\r\n\"Pemaksimalan yang kami lakukan adalah pemilahan sampah, pengomposan, dan pemanfaatan sampah menjadi maggot,\" ujarnya.', '2023-08-02', 'Nora Azizah - Republika', '045484200-1690173316-830-556.jpg'),
(17, 'Morgen Green Action: Aksi Nyata Bank Sampah RW 08 Sumokali Menuju Lingkungan Bebas Sampah', 'Sumokali, RW 08 — Gerakan lingkungan hidup berbasis masyarakat terus menunjukkan dampak positifnya. Salah satu contohnya adalah Morgen Green Action, sebuah aksi nyata pengelolaan sampah yang diinisiasi oleh bank sampah di lingkungan RW 08 Sumokali. Kegiatan ini menjadi bagian dari rangkaian upaya warga dalam mewujudkan lingkungan bersih dan berkelanjutan, yang sebelumnya juga telah terdokumentasi melalui platform Laporin Ngunu sebagai bukti transparansi dan pelaporan aksi lingkungan berbasis digital.\r\n\r\nAksi yang berlangsung secara gotong royong ini melibatkan warga, kader lingkungan, serta tim penggerak bank sampah dalam kegiatan pemilahan, pengumpulan, dan penyaluran sampah secara sistematis. Sampah anorganik yang bernilai ekonomi dikumpulkan untuk didaur ulang, sementara sampah organik diolah menjadi kompos yang bermanfaat bagi pertanian lokal. Tak hanya sebagai kegiatan rutin, Morgen Green Action menjadi momentum penting untuk memperkuat kesadaran masyarakat akan pentingnya memilah sampah dari sumbernya.\r\n\r\nMelalui pendekatan yang inklusif dan kolaboratif, kegiatan ini juga mengangkat peran penting sektor informal—seperti pemulung dan pengepul lokal—dalam ekosistem pengelolaan sampah berbasis digital. Dengan dukungan teknologi pelaporan seperti Laporin Ngunu, seluruh proses tercatat secara transparan dan dapat ditelusuri, menjadi bagian dari sistem yang mendukung visi Indonesia bebas polusi sampah pada tahun 2025.\r\n\r\nKetua RW 08 menyampaikan apresiasinya kepada seluruh warga yang telah terlibat dalam aksi ini. “Kami bangga bahwa lingkungan kami terus bergerak maju dalam pengelolaan sampah yang bertanggung jawab. Ini bukan hanya tentang kebersihan, tetapi juga tentang kemandirian dan pemberdayaan masyarakat,” ujarnya.\r\n\r\nMorgen Green Action membuktikan bahwa perubahan besar bisa dimulai dari skala lokal. Dengan semangat kebersamaan, pemanfaatan teknologi, dan komitmen terhadap keberlanjutan, RW 08 Sumokali menjadi contoh nyata bahwa masa depan bebas sampah bukan sekadar wacana, melainkan sesuatu yang dapat dicapai bersama.', '2025-06-08', 'Dimas - KetDivLing', 'prokerminggu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keluhan` text DEFAULT NULL,
  `penyebab` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `lo` varchar(30) DEFAULT NULL,
  `la` varchar(30) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_user`, `keluhan`, `penyebab`, `lokasi`, `lo`, `la`, `foto`) VALUES
(16, 3, 'efdr', 'rfr', 'TELKOM SIDOARJO VOCATIONAL SCHOOL, Jalan Anggur, Sekardangan, Sidoarjo, East Java, Java, 61215, Indonesia', '112.7249941543107', '-7.466691570711329', 'Screenshot 2025-02-20 at 19.37.36.png'),
(21, 3, 'iefoeiohrforf', 'irhgr', 'Jalan Kemlaten Baru, RW 05, Kebraon, Karang Pilang, Surabaya, East Java, Java, 60233, Indonesia', '112.70386287046749', '-7.331471206332181', 'Arsitektur 2-4G-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `nomor` varchar(15) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `alamat`, `nomor`, `password`, `level`) VALUES
(3, 'aal', 'Alfaz', 'adwddw', 'wdwwdwd', '123', 'admin'),
(8, '1', '1', '1', '1', '1', 'admin'),
(9, 'qwee', 'we', 'ww', 'ww', 'ww', 'user'),
(10, 'ffe', 'efe', 'efef', 'fefe', 'effe', 'user'),
(11, 'wew', 'jrf', 'jr', 'rgr', 'grg', 'user'),
(12, 'a', 'a', 'a', 'a', 'a', 'user'),
(13, 'al', 'alfaz', 'alfaz', 'alfaz', 'a', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
