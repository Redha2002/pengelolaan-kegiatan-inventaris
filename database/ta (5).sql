-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2023 pada 15.45
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_pemohon`
--

CREATE TABLE `kegiatan_pemohon` (
  `id_k_pemohon` int(50) NOT NULL,
  `tgl_kegiatan` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Jenis_kegiatan` varchar(120) NOT NULL,
  `laporan_kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kegiatan`
--

CREATE TABLE `laporan_kegiatan` (
  `id_laporan` int(50) NOT NULL,
  `id_perencanaan` int(50) NOT NULL,
  `id_proposal` varchar(50) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `laporan_kegiatan` varchar(50) NOT NULL,
  `jenis_kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_kegiatan`
--

INSERT INTO `laporan_kegiatan` (`id_laporan`, `id_perencanaan`, `id_proposal`, `tgl_kegiatan`, `laporan_kegiatan`, `jenis_kegiatan`) VALUES
(7, 3, 'Lina', '2023-09-30', 'laporan_kegiatan5.docx', 'Pilar Sosial'),
(8, 6, 'Salma Nazla', '2023-10-06', 'laporan_kegiatan6.docx', 'Pilar Lingkungan'),
(9, 8, 'Tono Sudrajat', '2023-11-10', 'laporan_kegiatan7.docx', 'Pilar Sosial'),
(10, 9, 'Salsabiil Syafitri', '2023-12-01', 'laporan_kegiatan8.docx', 'Pilar Lingkungan'),
(11, 10, 'Rafi Fadhilah', '2023-11-28', 'laporan_kegiatan9.docx', 'Pilar Lingkungan'),
(12, 12, 'Ulbi', '2023-11-30', 'laporan_kegiatan10.docx', 'Pilar Sosial'),
(13, 13, 'Aditya Wiranda', '2023-08-05', 'laporan_kegiatan11.docx', 'Pilar Sosial'),
(14, 15, 'Zaki', '2023-10-06', 'laporan_kegiatan12.docx', 'Pilar Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembuatan_disposisi`
--

CREATE TABLE `pembuatan_disposisi` (
  `id_disposisi` int(50) NOT NULL,
  `id_proposal` varchar(150) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `kualifikasi` enum('biasa','rahasia') NOT NULL,
  `ditindak_lanjuti` enum('Man. Kemitraan UKM','Man. Purel','Man. BL dan Umum','Man. Bisnis Parnership') NOT NULL,
  `catatan_khusus` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembuatan_disposisi`
--

INSERT INTO `pembuatan_disposisi` (`id_disposisi`, `id_proposal`, `pengirim`, `kualifikasi`, `ditindak_lanjuti`, `catatan_khusus`) VALUES
(3, '4', 'Lina', 'biasa', 'Man. BL dan Umum', 'Tindak lanjuti dan lakukan rapat'),
(4, '5', 'Mutiara Indah', 'biasa', 'Man. Kemitraan UKM', 'Harus dilihat lagi pembiyaan sesuai dana per pilar'),
(5, '6', 'Okta Agnes', 'biasa', 'Man. Bisnis Parnership', 'cobaaaa'),
(6, '7', 'Salma Nazla', 'biasa', 'Man. Kemitraan UKM', 'bisaa'),
(7, '8', 'Siti Fatiman', 'biasa', 'Man. Kemitraan UKM', 'cobaaaa'),
(8, '9', 'Lina', 'biasa', 'Man. BL dan Umum', 'coba'),
(9, '11', 'Tono Sudrajat', 'biasa', 'Man. Kemitraan UKM', 'melihat catatan proposal perpilar'),
(10, '12', 'Salsabiil Syafitri', 'biasa', 'Man. BL dan Umum', 'Coba dirapatkan dan didiskusikan'),
(11, '13', 'Rafi Fadhilah', 'biasa', 'Man. BL dan Umum', 'cobaaaa'),
(12, '15', 'Rafi Fadhilah', 'biasa', 'Man. Purel', 'Harus dilihat lagi pembiyaan sesuai dana per pilar'),
(13, '16', 'Ulbi', 'biasa', 'Man. BL dan Umum', 'Harus dilihat lagi pembiyaan sesuai dana per pilar'),
(14, '17', 'Aditya Wiranda', 'biasa', 'Man. Kemitraan UKM', 'Harus dilihat lagi pembiyaan sesuai dana per pilar'),
(15, '10', 'Rini Yuli', 'biasa', 'Man. BL dan Umum', 'cobaaaa'),
(16, '14', 'Lisa Olivia', 'biasa', 'Man. Purel', 'cobaaaa'),
(17, '19', 'Zaki', 'biasa', 'Man. Kemitraan UKM', 'cobaaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perencanaan_kegiatan`
--

CREATE TABLE `perencanaan_kegiatan` (
  `id_perencanaan` int(50) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `id_proposal` varchar(50) NOT NULL,
  `tempat_kegiatan` varchar(150) NOT NULL,
  `tgl_kegiatan` timestamp NOT NULL DEFAULT current_timestamp(),
  `biaya_approve` int(11) DEFAULT NULL,
  `rekening_pospay` varchar(20) NOT NULL,
  `rapat_kegiatan` varchar(50) NOT NULL,
  `status_kegiatan` enum('Approve','Tidak') DEFAULT 'Approve',
  `keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perencanaan_kegiatan`
--

INSERT INTO `perencanaan_kegiatan` (`id_perencanaan`, `nama_lengkap`, `id_proposal`, `tempat_kegiatan`, `tgl_kegiatan`, `biaya_approve`, `rekening_pospay`, `rapat_kegiatan`, `status_kegiatan`, `keterangan`) VALUES
(3, 'Lina', '4', 'Banyuwangi', '2023-09-29 17:00:00', 1000000, '5678890000', 'rapat_kegiatan7.docx', 'Approve', 'Selamat data proposal anda disetujui silahkan mengecek rekening pospay anda'),
(4, 'Mutiara Indah', '5', 'Padang', '2023-10-05 17:00:00', 0, '3456787654', 'rapat_kegiatan8.docx', 'Tidak', 'Mohon maaf proposal anda ditolak mohon perhatikan penulisan proposal'),
(5, 'Okta Agnes', '6', 'Bogor', '2023-10-10 17:00:00', 1000000, '2345676543', 'rapat_kegiatan9.docx', 'Approve', 'Selamat data proposal anda disetujui silahkan mengecek rekening pospay anda'),
(6, 'Salma Nazla', '7', 'Sukabumi', '2023-10-05 17:00:00', 4000000, '2345678987', 'rapat_kegiatan10.docx', 'Approve', 'Selamat data proposal anda disetujui silahkan mengecek rekening pospay anda'),
(7, 'Lina', '9', 'Bogor', '2023-10-05 17:00:00', 0, '5678890000', 'rapat_kegiatan11.docx', 'Tidak', 'Mohon maaf proposal anda ditolak mohon perhatikan penulisan proposal'),
(8, 'Tono Sudrajat', '11', 'Majalengka', '2023-11-09 17:00:00', 6000000, '2345678876', 'rapat_kegiatan12.docx', 'Approve', 'Selamat data proposal anda disetujui silahkan mengecek rekening pospay anda'),
(9, 'Salsabiil Syafitri', '12', 'Bukittinggi', '2023-11-30 17:00:00', 7000000, '2345678654', 'rapat_kegiatan13.docx', 'Approve', 'Selamat data proposal anda disetujui silahkan mengecek rekening pospay anda'),
(10, 'Rafi Fadhilah', '13', 'Gunung Putri', '2023-11-27 17:00:00', 6000000, '4567887654', 'rapat_kegiatan14.docx', 'Approve', 'Selamat data proposal anda disetujui silahkan mengecek rekening pospay anda'),
(11, 'Rafi Fadhilah', '15', 'Bogor', '2023-11-30 17:00:00', 0, '1332534656', 'rapat_kegiatan15.docx', 'Tidak', 'Mohon maaf proposal anda ditolak mohon perhatikan penulisan proposal'),
(12, 'Ulbi', '16', 'Garut', '2023-11-29 17:00:00', 7000000, '1234567898', 'rapat_kegiatan16.docx', 'Approve', 'Selamat data proposal anda disetujui silahkan mengecek rekening pospay anda'),
(13, 'Aditya Wiranda', '17', 'Jakarta', '2023-08-04 17:00:00', 3000000, '5678890000', 'rapat_kegiatan17.docx', 'Approve', 'Selamat data proposal anda disetujui silahkan mengecek rekening pospay anda'),
(14, 'Rini Yuli', '10', 'Pariaman', '2023-09-29 17:00:00', 3000000, '2345676543', 'rapat_kegiatan18.docx', 'Approve', 'Selamat data proposal anda disetujui silahkan mengecek rekening pospay anda'),
(15, 'Zaki', '19', 'Jakarta', '2023-09-29 17:00:00', 4000000, '3456789876', 'rapat_kegiatan19.docx', 'Approve', 'Selamat data proposal anda disetujui silahkan mengecek rekening pospay anda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `kode_proposal` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `Jenis_kegiatan` varchar(150) NOT NULL,
  `rekening_pospay` varchar(15) DEFAULT NULL,
  `tanggal_terima` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `proposal` varchar(150) NOT NULL,
  `surat_pengantar` varchar(150) NOT NULL,
  `status` enum('Belum Di Disposisi','Sudah Di Disposisi') NOT NULL DEFAULT 'Belum Di Disposisi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `kode_proposal`, `nama_lengkap`, `Jenis_kegiatan`, `rekening_pospay`, `tanggal_terima`, `proposal`, `surat_pengantar`, `status`) VALUES
(4, NULL, 'Lina', 'Pilar Ekonomi', '5678890000', '2023-08-08 13:36:10.863297', 'proposal3.docx', 'surat_pengantar3.docx', 'Sudah Di Disposisi'),
(5, NULL, 'Mutiara Indah', 'Pilar Ekonomi', '3456787654', '2023-08-08 15:20:00.578546', 'proposal4.docx', 'surat_pengantar4.docx', 'Sudah Di Disposisi'),
(6, NULL, 'Okta Agnes', 'Pilar Hukum dan Tata Kelola', '2345676543', '2023-08-08 15:39:23.884484', 'proposal5.docx', 'surat_pengantar5.docx', 'Sudah Di Disposisi'),
(7, NULL, 'Salma Nazla', 'Pilar Lingkungan', '2345678987', '2023-08-08 16:00:01.839558', 'proposal6.docx', 'surat_pengantar6.docx', 'Sudah Di Disposisi'),
(8, NULL, 'Siti Fatiman', 'Pilar Sosial', '2345676543', '2023-08-08 16:14:17.075008', 'proposal7.docx', 'surat_pengantar7.docx', 'Sudah Di Disposisi'),
(9, NULL, 'Lina', 'Pilar Ekonomi', '5678890000', '2023-08-09 14:39:58.810722', 'proposal10.docx', 'surat_pengantar10.docx', 'Sudah Di Disposisi'),
(10, NULL, 'Rini Yuli', 'Pilar Sosial', '2345676543', '2023-08-14 14:34:21.840768', 'proposal11.docx', 'surat_pengantar11.docx', 'Sudah Di Disposisi'),
(11, NULL, 'Tono Sudrajat', 'Pilar Sosial', '2345678876', '2023-08-10 12:25:18.573208', 'proposal12.docx', 'surat_pengantar12.docx', 'Sudah Di Disposisi'),
(12, NULL, 'Salsabiil Syafitri', 'Pilar Lingkungan', '2345678654', '2023-08-10 22:41:13.542370', 'proposal13.docx', 'surat_pengantar13.docx', 'Sudah Di Disposisi'),
(13, NULL, 'Rafi Fadhilah', 'Pilar Lingkungan', '4567887654', '2023-08-11 01:45:05.826546', 'proposal14.docx', 'surat_pengantar14.docx', 'Sudah Di Disposisi'),
(14, NULL, 'Lisa Olivia', 'Pilar Sosial', '7654345678', '2023-08-15 00:44:38.170297', 'proposal15.docx', 'surat_pengantar15.docx', 'Sudah Di Disposisi'),
(15, NULL, 'Rafi Fadhilah', 'Pilar Ekonomi', '1332534656', '2023-08-11 01:46:54.737520', 'proposal16.docx', 'surat_pengantar16.docx', 'Sudah Di Disposisi'),
(16, NULL, 'Ulbi', 'Pilar Sosial', '1234567898', '2023-08-11 03:17:00.495634', 'proposal17.docx', 'catatan_presentasi.pdf', 'Sudah Di Disposisi'),
(17, NULL, 'Aditya Wiranda', 'Pilar Sosial', '5678890000', '2023-08-13 15:30:02.175769', 'proposal18.docx', 'surat_pengantar17.docx', 'Sudah Di Disposisi'),
(18, NULL, 'Rahma', 'Pilar Sosial', '5435678908', '2023-08-22 17:00:00.000000', 'proposal19.docx', 'surat_pengantar18.docx', 'Belum Di Disposisi'),
(19, NULL, 'Zaki', 'Pilar Sosial', '3456789876', '2023-08-23 04:02:18.449129', 'proposal20.docx', 'surat_pengantar19.docx', 'Sudah Di Disposisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `nippos` int(10) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `hak_akses` enum('Pemohon','Admin','Vice President') NOT NULL DEFAULT 'Pemohon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `nippos`, `username`, `password`, `jabatan`, `hak_akses`) VALUES
(1, 'Selo Edi', 970365550, 'vp', '12345', 'Vice President', 'Vice President'),
(2, 'Yana Dwi', 2147483647, 'yanadwi', 'yana12', 'Admin', 'Admin'),
(3, 'Redha Aulia', 0, 'redha', 'redha12', '-', 'Pemohon'),
(9, 'Shafa Zahra', 0, 'shafa', 'shafa12', '-', 'Pemohon'),
(12, 'Siti Fatiman', 0, 'sifa', 'sifa12', '-', 'Pemohon'),
(13, 'Okta Agnes', 0, 'agnes', 'agnes12', '-', 'Pemohon'),
(14, 'Aditya Wiranda', 0, 'adit', 'adit12', '-', 'Pemohon'),
(15, 'Lina', 0, 'lina', 'lina12', '-', 'Pemohon'),
(16, 'Annisa Fitriani', 0, 'annisa', 'annisa12', '', 'Pemohon'),
(17, 'Mutiara Indah', 0, 'indah', 'indah12', '', 'Pemohon'),
(20, 'Hadi Widya', NULL, 'hadi', 'hadi12', NULL, 'Pemohon'),
(21, 'Salma Nazla', NULL, 'salma', 'salma12', NULL, 'Pemohon'),
(23, 'Budi Hartono', NULL, 'budi', 'budi12', NULL, 'Pemohon'),
(26, 'Redha Aulia', NULL, 'redha', 'redha12', NULL, 'Pemohon'),
(28, 'Sifa', NULL, 'sifa', '123', NULL, 'Pemohon'),
(443, 'Susanti Binti', NULL, 'susanti', 'susanti12', NULL, 'Pemohon'),
(879, 'Rini Yuli', NULL, 'rini', 'rini12', NULL, 'Pemohon'),
(882, 'Dudin Saripudin', 465738765, 'dudin', 'dudin12', 'Bina Lingkungan', 'Pemohon'),
(886, 'hadiwidyas', NULL, 'hadiwidyas', '123', NULL, 'Pemohon'),
(887, 'Tono Sudrajat', NULL, 'tono', 'tono12', NULL, 'Pemohon'),
(888, 'Salsabiil Syafitri', NULL, 'salsa', 'salsa12', NULL, 'Pemohon'),
(889, 'Rafi Fadhilah', NULL, 'rafi', 'rafi12', NULL, 'Pemohon'),
(890, 'Lisa Olivia', NULL, 'lisa', 'lisa12', NULL, 'Pemohon'),
(891, 'Ulbi', NULL, 'ulbi', 'ulbi12', NULL, 'Pemohon'),
(892, 'Admin', 678987567, 'admin', 'admin', 'admin', 'Admin'),
(893, 'Rahma', NULL, 'rahma', 'rahma12', NULL, 'Pemohon'),
(894, 'Zaki', NULL, 'zaki', 'zaki', NULL, 'Pemohon');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kegiatan_pemohon`
--
ALTER TABLE `kegiatan_pemohon`
  ADD PRIMARY KEY (`id_k_pemohon`);

--
-- Indeks untuk tabel `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `pembuatan_disposisi`
--
ALTER TABLE `pembuatan_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indeks untuk tabel `perencanaan_kegiatan`
--
ALTER TABLE `perencanaan_kegiatan`
  ADD PRIMARY KEY (`id_perencanaan`);

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kegiatan_pemohon`
--
ALTER TABLE `kegiatan_pemohon`
  MODIFY `id_k_pemohon` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  MODIFY `id_laporan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembuatan_disposisi`
--
ALTER TABLE `pembuatan_disposisi`
  MODIFY `id_disposisi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `perencanaan_kegiatan`
--
ALTER TABLE `perencanaan_kegiatan`
  MODIFY `id_perencanaan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=895;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
