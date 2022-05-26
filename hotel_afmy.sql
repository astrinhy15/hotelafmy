-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2022 pada 14.35
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_afmy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id_fasilitas_hotel` int(10) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id_fasilitas_hotel`, `nama_fasilitas`, `deskripsi`, `foto`) VALUES
(6, 'tempat parkir', 'Tempat parkir yang luas dan dapat menampung 1000 lebih kendaraan', 'images_13.jpg'),
(13, 'kolam renang', 'kolam renang yang sangat luas dan tersedia air hangat', 'kolamrenang_1.jpg'),
(14, 'Bar', 'Bar yang sangat nyaman untuk tempat nongkrong', 'bar_1.jpg'),
(15, 'Gym', 'Gym yang dilengkapi dengan alat alat yang sangat lengkap', 'tempat gym.jpg'),
(16, 'Restaurant', 'Disini kami memiliki banyak tipe makanan yang dimasakkan oleh chef mancanegara', 'restaurant_1.jpg'),
(17, 'Sport Club Sepeda', 'selain untuk gym kami menyediakan banyak sepeda untuk olahraga diluar ruangan', 'sepeda.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fasilitas_kamar` int(10) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fasilitas_kamar`, `id_tipe_kamar`, `nama_fasilitas`) VALUES
(5, 7, 'single bed'),
(6, 9, 'ac'),
(13, 10, 'kasur king size '),
(16, 7, 'sofa'),
(17, 7, 'wifi'),
(18, 9, 'walk in closet'),
(19, 9, 'sofa'),
(20, 10, 'ac'),
(21, 10, 'wifi'),
(22, 11, 'wifi'),
(23, 11, 'sofa'),
(24, 11, 'tv'),
(25, 12, 'tv'),
(26, 12, 'ac'),
(27, 7, 'lemari pakaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(10) NOT NULL,
  `nik` int(50) NOT NULL,
  `cek-in` date NOT NULL,
  `cek-out` date NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `jumlah_kamar` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `status` enum('Chek in','Chek out') NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `nik`, `cek-in`, `cek-out`, `nama_tamu`, `id_tipe_kamar`, `jumlah_kamar`, `harga`, `status`, `telepon`, `email`) VALUES
(27, 2147483647, '2022-05-18', '2022-05-20', 'tari', 10, 1, 800000, 'Chek out', '7643876473643', 'arygh@gyf.nj'),
(28, 2147483647, '2022-05-17', '2022-05-19', 'astri nur hidayah', 11, 1, 600000, 'Chek out', '74654354', '67546444@gmail.com'),
(29, 2147483647, '2022-05-18', '2022-05-20', 'widi', 7, 1, 400000, 'Chek out', '08977652', 'hdg@nj.njk'),
(30, 2147483647, '2022-05-18', '2022-05-22', 'anton', 9, 1, 22000000, 'Chek out', '0897474987', 'anton@hg.nh'),
(31, 453435, '2022-05-25', '2022-05-20', 'KHOLIPAH FITRIA', 12, 2, -500000000, 'Chek out', '74654354', 'kholipahfitria@gmail.com'),
(32, 2147483647, '2022-05-19', '2022-05-21', 'KHOLIPAH FITRIA', 7, 1, 400000, 'Chek out', '76746857656', 'kholipahfitria@gmail.com'),
(33, 2147483647, '2022-05-20', '2022-05-21', 'riyani', 11, 1, 300000, 'Chek out', '089757545456', 'riyani@hjh.huyyu'),
(34, 2147483647, '2022-05-19', '2022-05-21', 'ira', 11, 1, 600000, 'Chek in', '65457656', '67546444@gmail.com'),
(35, 45435534, '2022-05-18', '2022-05-20', 'ira', 10, 1, 800000, '', '08937483764', 'kholipahfitria@gmail.com'),
(36, 45435534, '2022-05-18', '2022-05-20', 'ira', 10, 1, 800000, '', '08937483764', 'kholipahfitria@gmail.com'),
(37, 2147483647, '2022-05-19', '2022-05-20', 'KHOLIPAH FITRIA', 9, 1, 5500000, '', '74654354', 'yani@jfhj');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `nik` int(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`nik`, `nama`, `email`, `no_tlp`) VALUES
(476356, 'hana', 'hana@gmail.com', 8947536),
(3465674, 'dadan', 'dadan@gmail.com', 6845736),
(36457547, 'farah', 'faraah@gmsil.com', 886475),
(73648736, 'jila', 'jilakiala@gmail.com', 8347675),
(320894746, 'fanya', 'faanyaa@gmail.com', 8975643);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `id_kamar` int(10) NOT NULL,
  `no_kamar` varchar(50) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`id_kamar`, `no_kamar`, `id_tipe_kamar`, `status`) VALUES
(37, '15F', 10, 'Tersedia'),
(38, '01P', 7, 'Tersedia'),
(40, '35B', 10, 'Tersedia'),
(41, '13D', 9, 'Tersedia'),
(42, '91k', 11, 'Tersedia'),
(43, '01U', 12, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin','resepsionis','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'afmy', '202cb962ac59075b964b07152d234b70', 'afmy', 'admin'),
(2, 'astri', 'd41d8cd98f00b204e9800998ecf8427e', 'astri nur', 'resepsionis'),
(3, 'admin', '202cb962ac59075b964b07152d234b70', 'admin', 'admin'),
(4, 'resepsionis', '202cb962ac59075b964b07152d234b70', 'resepsionis', 'resepsionis'),
(5, 'nur', '202cb962ac59075b964b07152d234b70', 'astri nur', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe_kamar` int(11) NOT NULL,
  `nama_tipe_kamar` varchar(50) NOT NULL,
  `harga` int(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe_kamar`, `nama_tipe_kamar`, `harga`, `deskripsi`, `foto`) VALUES
(7, 'standar', 200000, 'Tipe kamar standar yang sangat nyaman', '60f83f0d62fea_4.jpg'),
(9, 'presiden suite', 5500000, 'Tipe kamar presiden suite sangat tepat untuk pilihan anda', 'kamar8.jpg'),
(10, 'deluxe', 400000, 'Tipe kamar deluxe adalah pilihan yang sangat tepat', 'kamar2_4.jpg'),
(11, 'superior', 300000, 'Tipe kamar superior pilihan terbaik untuk menginap', 'kamar3_3.jpg'),
(12, 'vip', 50000000, 'Tipe kamar vip sangat lah nyaman untuk anda tempati', 'kamar2_6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id_fasilitas_hotel`);

--
-- Indeks untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas_kamar`),
  ADD KEY `fasilitas_kamar_ibfk_1` (`id_tipe_kamar`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `reservasi_ibfk_1` (`id_tipe_kamar`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `tbl_kamar_ibfk_1` (`id_tipe_kamar`);

--
-- Indeks untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe_kamar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id_fasilitas_hotel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fasilitas_kamar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `nik` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320894747;

--
-- AUTO_INCREMENT untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  MODIFY `id_kamar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_ibfk_1` FOREIGN KEY (`id_tipe_kamar`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_tipe_kamar`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD CONSTRAINT `tbl_kamar_ibfk_1` FOREIGN KEY (`id_tipe_kamar`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
