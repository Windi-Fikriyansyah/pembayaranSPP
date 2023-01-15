-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2022 pada 03.09
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkatan`
--

CREATE TABLE `angkatan` (
  `id_angkatan` int(11) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `nominal` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angkatan`
--

INSERT INTO `angkatan` (`id_angkatan`, `tahun`, `nominal`) VALUES
(10, '2022/2023', '200000'),
(11, '2021/2022', '180000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(14, 'X'),
(15, 'XI'),
(17, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `invoice_spp` varchar(17) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `kd_siswa` int(11) NOT NULL,
  `grand_total` varchar(30) NOT NULL,
  `kd_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran_spp`
--

INSERT INTO `pembayaran_spp` (`invoice_spp`, `tanggal`, `bulan`, `kd_siswa`, `grand_total`, `kd_petugas`) VALUES
('INV-000001', '2022-10-26', 'Januari', 55, '200000', 13),
('INV-000004', '2022-10-26', 'Januari', 56, '200000', 13),
('INV-000005', '2022-10-27', 'Januari', 57, '200000', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak_akses` varchar(100) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `email`, `username`, `password`, `hak_akses`, `id_siswa`) VALUES
(13, 'ilham tria jaya', 'ilhamtriajaya@gmail.com', 'ilham', '8cb2237d0679ca88db6464eac60da96345513964', 'Admin', 0),
(26, 'Riska', 'diwin321@gmail.com', 'Riska', '8cb2237d0679ca88db6464eac60da96345513964', 'Kepala sekolah', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `angkatan` varchar(150) NOT NULL,
  `id_angkatan` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `hak_akses` varchar(100) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `tanggal_lahir`, `no_tlp`, `email`, `id_kelas`, `jurusan`, `username`, `password`, `angkatan`, `id_angkatan`, `status`, `hak_akses`, `id_petugas`) VALUES
(55, '3720', 'DEBY', '2006-04-23', '-', 'ilhamgame0@gmail.com', 14, 'IPS', '3720', '8cb2237d0679ca88db6464eac60da96345513964', '', 10, 1, 'Siswa', 0),
(56, '3721', 'GREZI ARA BELA', '2006-02-12', '-', 'ilhamgame0@gmail.com', 14, 'IPS', '3721', '8cb2237d0679ca88db6464eac60da96345513964', '', 10, 1, 'Siswa', 0),
(57, '3722', 'ICA JULIATI', '2006-04-15', '-', 'ilhamgame0@gmail.com', 14, 'IPS', '3722', '8cb2237d0679ca88db6464eac60da96345513964', '', 10, 1, 'Siswa', 0),
(58, '3723', 'IPAN MARTINUS', '2006-03-26', '-', 'ilhamgame0@gmail.com', 14, 'IPS', '3723', '8cb2237d0679ca88db6464eac60da96345513964', '', 10, 1, 'Siswa', 0),
(59, '3724', 'MAISA JENA', '2007-08-20', '-', 'ilhamgame0@gmail.com', 14, 'IPS', '3724', '8cb2237d0679ca88db6464eac60da96345513964', '', 10, 1, 'Siswa', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(61, 'diwin321@gmail.com', 'j8fLVkfjAoB143k1tw5PtunfCzHv1i2bzKvIRs+ZE4c=', 1666109671),
(64, 'ilhamtriajaya@gmail.com', 'erUJi3zRL8lwDfuEJMCgabwcUNI/Qe/dQq3pYqVT70s=', 1666633234);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_pembayaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_pembayaran` (
`invoice_spp` varchar(17)
,`tanggal` date
,`bulan` varchar(20)
,`kd_siswa` int(11)
,`grand_total` varchar(30)
,`kd_petugas` int(11)
,`nis` varchar(50)
,`nama` varchar(150)
,`tanggal_lahir` date
,`id_kelas` int(11)
,`jurusan` varchar(100)
,`angkatan` varchar(150)
,`id_angkatan` int(11)
,`status` int(1)
,`nama_petugas` varchar(150)
,`nama_kelas` varchar(25)
,`tahun` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_petugas`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_petugas` (
`id_petugas` int(11)
,`nama_petugas` varchar(150)
,`username` varchar(150)
,`password` varchar(225)
,`hak_akses` varchar(100)
,`id_siswa` int(11)
,`nis` varchar(50)
,`nama` varchar(150)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_siswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_siswa` (
`id_siswa` int(11)
,`nis` varchar(50)
,`nama` varchar(150)
,`tanggal_lahir` date
,`no_tlp` varchar(15)
,`email` varchar(100)
,`id_kelas` int(11)
,`jurusan` varchar(100)
,`username` varchar(150)
,`password` varchar(150)
,`id_angkatan` int(11)
,`status` int(1)
,`hak_akses` varchar(100)
,`nama_kelas` varchar(25)
,`tahun` varchar(20)
,`nominal` varchar(150)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_pembayaran`
--
DROP TABLE IF EXISTS `v_pembayaran`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_pembayaran`  AS   (select `pembayaran_spp`.`invoice_spp` AS `invoice_spp`,`pembayaran_spp`.`tanggal` AS `tanggal`,`pembayaran_spp`.`bulan` AS `bulan`,`pembayaran_spp`.`kd_siswa` AS `kd_siswa`,`pembayaran_spp`.`grand_total` AS `grand_total`,`pembayaran_spp`.`kd_petugas` AS `kd_petugas`,`siswa`.`nis` AS `nis`,`siswa`.`nama` AS `nama`,`siswa`.`tanggal_lahir` AS `tanggal_lahir`,`siswa`.`id_kelas` AS `id_kelas`,`siswa`.`jurusan` AS `jurusan`,`siswa`.`angkatan` AS `angkatan`,`siswa`.`id_angkatan` AS `id_angkatan`,`siswa`.`status` AS `status`,`petugas`.`nama_petugas` AS `nama_petugas`,`kelas`.`nama_kelas` AS `nama_kelas`,`angkatan`.`tahun` AS `tahun` from ((((`pembayaran_spp` join `siswa`) join `petugas`) join `kelas`) join `angkatan`) where `pembayaran_spp`.`kd_petugas` = `petugas`.`id_petugas` and `pembayaran_spp`.`kd_siswa` = `siswa`.`id_siswa` and `siswa`.`id_kelas` = `kelas`.`id` and `siswa`.`id_angkatan` = `angkatan`.`id_angkatan`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_petugas`
--
DROP TABLE IF EXISTS `v_petugas`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_petugas`  AS   (select `petugas`.`id_petugas` AS `id_petugas`,`petugas`.`nama_petugas` AS `nama_petugas`,`petugas`.`username` AS `username`,`petugas`.`password` AS `password`,`petugas`.`hak_akses` AS `hak_akses`,`petugas`.`id_siswa` AS `id_siswa`,`siswa`.`nis` AS `nis`,`siswa`.`nama` AS `nama` from (`petugas` join `siswa`) where `petugas`.`id_siswa` = `siswa`.`id_siswa`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_siswa`
--
DROP TABLE IF EXISTS `v_siswa`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_siswa`  AS   (select `siswa`.`id_siswa` AS `id_siswa`,`siswa`.`nis` AS `nis`,`siswa`.`nama` AS `nama`,`siswa`.`tanggal_lahir` AS `tanggal_lahir`,`siswa`.`no_tlp` AS `no_tlp`,`siswa`.`email` AS `email`,`siswa`.`id_kelas` AS `id_kelas`,`siswa`.`jurusan` AS `jurusan`,`siswa`.`username` AS `username`,`siswa`.`password` AS `password`,`siswa`.`id_angkatan` AS `id_angkatan`,`siswa`.`status` AS `status`,`siswa`.`hak_akses` AS `hak_akses`,`kelas`.`nama_kelas` AS `nama_kelas`,`angkatan`.`tahun` AS `tahun`,`angkatan`.`nominal` AS `nominal` from ((`siswa` join `kelas`) join `angkatan`) where `siswa`.`id_kelas` = `kelas`.`id` and `siswa`.`id_angkatan` = `angkatan`.`id_angkatan`)  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`invoice_spp`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
