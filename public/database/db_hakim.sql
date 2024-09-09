/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_hakim

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 09/09/2024 07:37:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for form_surat
-- ----------------------------
DROP TABLE IF EXISTS `form_surat`;
CREATE TABLE `form_surat`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul_fsurat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_fsurat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `icon_fsurat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content_fsurat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iswatermark_fsurat` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of form_surat
-- ----------------------------
INSERT INTO `form_surat` VALUES (14, 'Permohonan Pembetulan Akta Catatan Sipil', '-', '1725762946-wallpapers-for-the-beautiful-peacock-wallpaper-ai-generated-free-photo.jpg', '2024-09-08 09:35:46', '2024-09-09 06:19:04', '<p style=\"text-align:right\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Pasir Pengaraian, {{ tanggal }}</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Perihal : <strong>Permohonan Pembetulan Akta Catatan Sipil</strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Kepada Yth :<br />\r\nBapak/Ibu Ketua Pengadilan Negeri Pasir Pengaraian<br />\r\nDi Tempat</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Dengan Hormat,<br />\r\nSaya yang bertanda tangan dibawah ini atas nama:</span></span></p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"margin-left:25px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Nama</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">: {{ nama }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Tempat/Tgl Lahir</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">: {{ tempat_tanggal_lahir }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Agama</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">: {{ agama }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Jenis Kelamin</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">: {{ jenis_kelamin }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Pekerjaan</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">: {{ pekerjaan }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Alamat</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">: {{ alamat }}</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Untuk selanjutnya disebut juga sebagai Pemohon<strong>. </strong>Bersamaan dengan permohonan ini, maka Pemohon mengajukan permohonan pembetulan identitas pada akta catatan sipil dengan alasan-alasan sebagai berikut:&nbsp;</span></span></p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">- Bahwa terdapat kesalahan penulisan identitas {{ pemohon }} di pada dokumen kependudukan berupa {{ akta }} Nomor {{ nomor_akta }} dari Dinas Catatan Sipil {{ kabupaten }};<br />\r\n- Bahwa identitas tersebut tertulis dan terbaca {{ pemohon }} {{ ket_salah }} {{ data_salah }};<br />\r\n- Bahwa identitas yang sebenarnya adalah {{ pemohon }} {{ ket_benar }} {{ data_benar }}, sebagaimana data dukung sebagai berikut:</span></span></p>\r\n\r\n<ul style=\"margin-left:40px\">\r\n	<li>\r\n	<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n		<tbody>\r\n			<tr>\r\n				<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Nama Dokumen Pendukung</span></span></td>\r\n				<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">: Kartu Keluarga Nomor {{ nomor_kk }}</span></span></td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Tanggal Dokumen</span></span></td>\r\n				<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">: {{ tanggal_dokumen }}</span></span></td>\r\n			</tr>\r\n			<tr>\r\n				<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Yang Mengeluarkan</span></span></td>\r\n				<td style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">: {{ yang_mengeluarkan }}</span></span></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">- Bahwa saya sangat membutuhkan perbaikan data tersebut untuk kepentingan {{ kepentingan }};</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Berdasarkan uraian dan alasan-alasan yang telah Pemohon sebutkan diatas, Pemohon mohon kepada Ketua Pengadilan Negeri Pasir Pengaraian, memanggil Pemohon mengikuti persidangan yang akan ditentukan pada suatu hari tertentu untuk selanjutnya berkenan pula untuk memberikan Penetapan sebagai berikut:</span></span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Mengabulkan permohonan Pemohon seluruhnya;</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Memberikan izin kepada Pemohon untuk memperbaiki kesalahan penulisan {{ ket_salah }}&nbsp;{{ pemohon }} pada {{ akta }}&nbsp;No. {{ nomor_akta }}&nbsp;dari semula tertulis dan terbaca {{ data_salah&nbsp;}} menjadi {{ data_benar }}.</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Memerintahkan kepada Dinas Kependudukan dan Pencatatan Sipil {{ kabupaten }}&nbsp;setelah menerima Salinan penetapan ini membuat catatan pinggir pada register akta pencatatan sipil dan kutipan akta pencatatan sipil {{ pemohon }};</span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Membebankan kepada Pemohon segala biaya-biaya yang timbul karena adanya permohonan ini.</span></span></li>\r\n</ol>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Demikian permohonan ini diajukan kepada Bapak/Ibu Ketua Pengadilan Negeri Pasir Pengaraian untuk dapat dikabulkan, atas perhatiannya diucapkan terima kasih.</span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Hormat Pemohon</span></span><br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Materai 10.000</span></span><br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">{{&nbsp;nama }}</span></span></p>', 1);
INSERT INTO `form_surat` VALUES (15, 'Permohonan Eksekusi', '-', '1725770642-istockphoto-1403500817-612x612.jpg', '2024-09-08 11:44:02', '2024-09-09 06:14:05', '<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Perihal : <strong>Permohonan Eksekusi</strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Kepada Yth :<br />\r\nBapak/Ibu Ketua Pengadilan Negeri Pasir Pengaraian<br />\r\nDi Tempat</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Dengan Hormat,<br />\r\nSaya yang bertanda tangan dibawah ini atas nama:</span></span></p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"margin-left:25px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Nama</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ nama }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Tempat/Tgl Lahir</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ tempat_tanggal_lahir }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Jenis Kelamin</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ jenis_kelamin }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Pekerjaan</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ pekerjaan }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Alamat</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ alamat }}</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Untuk selanjutnya disebut juga sebagai Pemohon Eksekusi, semula Penggugat/{{ pembanding_terbanding }}/{{ pemohon_termohon_kasasi&nbsp;}}&nbsp;memohon kepada Ketua Pengadilan Negeri Pasir Pengaraian untuk melaksanakan eksekusi atas putusan yang telah berkekuatan hukum tetap terhadap Putusan Pengadilan Negeri Pasir Pengaraian Nomor {{ nomor_putusan&nbsp;}} tanggal {{ tanggal_putusan&nbsp;}}. Putusan Pengadilan Tinggi Nomor {{ nomor_putusan_banding }} tanggal {{ tanggal_putusan_banding&nbsp;}}. Putusan Mahkamah Agung RI Nomor {{ nomor_putusan_ma }}&nbsp;tanggal {{ tanggal_putusan_ma }}.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Adapun alasan permohonan eksekusi adalah didasari hal-hal sebagai berikut:</span></span></p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">- Bahwa Termohon Eksekusi tidak melaksanakan isi putusan tersebut secara sukarela meskipun telah diberitahukan secara patut oleh Jurusita/Jurusita Pengganti Pengadilan Negeri Pasir Pengaraian.<br />\r\n- Bahwa objek eksekusi adalah benda tidak bergerak berupa {{ jenis_benda }} yang terletak dan dikenal di {{ wilayah_benda }}} berdasarkan {{ dokumen_benda }} dengan batas-batas sesuai dengan amar putusan.<br />\r\n- Bahwa objek eksekusi adalah barang bergerak berupa {{ jenis_benda_gerak }} yang dikenal di {{ wilayah_benda_gerak }} dengan bukti identitas barang berupa {{ dokumen_benda_gerak }}.<br />\r\n- Bahwa objek tersebut masih dikuasai oleh Termohon Eksekusi atau orang lain atas kuasa atau izin dari Termohon Eksekusi.<br />\r\n- Bahwa terhadap objek tersebut diatas telah diletakkan sita eksekusi (terlampir) serta telah juga lengkap melakukan aanmaning (peneguran) pada tanggal {{ tanggal_aanmaning }};<br />\r\n- Bahwa sebagai pertimbangan Ketua Pengadilan Negeri Pasir Pengaraian, bersama ini kami lampirkan putusan yang telah berkekuatan hukum tetap sesuai dengan fotokopi (cap stempel basah pengadilan) dan relaas pemberitahuan putusan.</span></span></p>\r\n\r\n<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Demikian surat permohonan eksekusi ini disampaikan, mohon kiranya bapak/ibu Ketua Pengadilan Negeri Pasir Pengaraian dapat melaksanakan eksekusi sesuai dengan ketentuan yang berlaku dan atas bantuannya diucapkan terimakasih.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">{{ tempat_pemohon }}, {{ tanggal_pemohon }}<br />\r\nHormat Saya,<br />\r\nPemohon Eksekusi</span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Materai 10.000</span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">{{&nbsp;nama }}</span></span></p>', 1);
INSERT INTO `form_surat` VALUES (16, 'Permohonan Izin Sebagai Kuasa Insidentil', '-', '1725787690-images.jpeg', '2024-09-08 16:28:10', '2024-09-09 06:13:09', '<p style=\"text-align:right\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Pasir Pengaraian, {{ tanggal_surat }}</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Perihal : <strong>Permohonan Izin Sebagai Kuasa Insidentil</strong></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Kepada Yth :<br />\r\nBapak/Ibu Ketua Pengadilan Negeri Pasir Pengaraian<br />\r\nDi Tempat</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Dengan Hormat,<br />\r\nSaya yang bertanda tangan dibawah ini atas nama:</span></span></p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"margin-left:25px; width:400px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Nama</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ nama }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Tempat/Tgl Lahir</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ tempat_tanggal_lahir }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Agama</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ agama }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Jenis Kelamin</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ jenis_kelamin }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Pekerjaan</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ pekerjaan }}</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Alamat</span></span></td>\r\n			<td style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">: {{ alamat }}</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Untuk selanjutnya disebut juga sebagai Pemohon. Bersamaan dengan permohonan ini, maka Pemohon mengajukan permohonan kepada bapak/ibu Ketua Pengadilan Negeri Pasir Pengaraian agar kiranya dapat diberikan izin bertindak sebagai kuasa insidentil dari {{ nama_pihak }} selaku {{ selaku_pihak }} dalam perkara perdata Nomor {{ nomor_perkara }}.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pemohon merupakan {{ hubungan_dengan_pihak }} dari pihak {{ nama_pihak }} diatas berdasarkan Surat Keterangan Desa/Kelurahan {{ surat_desa }} Nomor {{ nomor_desa }} tanggal {{ tanggal_desa }} dan Kartu Keluarga (terlampir).</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pihak {{ nama_pihak }} saat ini tengah {{ alasan_pihak }} sehingga berhalangan dalam mengurus hak dan kepentingannya sehingga meminta Pemohon mewakilinya pada perkara sebagaimana dimaksud.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian Permohonan ini diajukan kepada Bapak/Ibu Ketua Pengadilan Negeri Pasir Pengaraian dengan harapan dapat diperkenankan dan diberikan izin sebagai kuasa insidentil sebagaimana dimaksud diatas, atas perhatiannya diucapkan terima kasih.</span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Hormat Pemohon,</span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">Materai 10.000</span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12px\">{{&nbsp;nama }}</span></span></p>', 0);

-- ----------------------------
-- Table structure for informasi_sebelum
-- ----------------------------
DROP TABLE IF EXISTS `informasi_sebelum`;
CREATE TABLE `informasi_sebelum`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul_isebelum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deskripsi_isebelum` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `gambar_isebelum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `form_surat_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `informasi_sebelum_form_surat_id_foreign`(`form_surat_id` ASC) USING BTREE,
  CONSTRAINT `informasi_sebelum_form_surat_id_foreign` FOREIGN KEY (`form_surat_id`) REFERENCES `form_surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of informasi_sebelum
-- ----------------------------
INSERT INTO `informasi_sebelum` VALUES (9, NULL, NULL, '1725837568-beautiful-natural-view-landscape_23-2150787996.avif', 14, '2024-09-09 06:19:28', '2024-09-09 06:19:28');
INSERT INTO `informasi_sebelum` VALUES (10, NULL, NULL, '1725837582-forest-landscape_71767-127.avif', 14, '2024-09-09 06:19:42', '2024-09-09 06:19:42');
INSERT INTO `informasi_sebelum` VALUES (11, NULL, NULL, '1725837619-istockphoto-1403500817-612x612.jpg', 14, '2024-09-09 06:20:19', '2024-09-09 06:20:19');
INSERT INTO `informasi_sebelum` VALUES (12, NULL, NULL, '1725837687-360_F_723149335_tA0Fo8zefrHzYlSgXRMYHmBQk7CuWrRd.jpg', 15, '2024-09-09 06:21:27', '2024-09-09 06:21:27');
INSERT INTO `informasi_sebelum` VALUES (13, NULL, NULL, '1725837695-istockphoto-1403500817-612x612.jpg', 15, '2024-09-09 06:21:35', '2024-09-09 06:21:35');
INSERT INTO `informasi_sebelum` VALUES (14, NULL, NULL, '1725837707-360_F_708477508_DNkzRIsNFgibgCJ6KoTgJjjRZNJD4mb4.jpg', 15, '2024-09-09 06:21:47', '2024-09-09 06:21:47');
INSERT INTO `informasi_sebelum` VALUES (15, NULL, NULL, '1725837770-360_F_723149335_tA0Fo8zefrHzYlSgXRMYHmBQk7CuWrRd.jpg', 16, '2024-09-09 06:22:50', '2024-09-09 06:22:50');
INSERT INTO `informasi_sebelum` VALUES (16, NULL, NULL, '1725837784-istockphoto-1403500817-612x612.jpg', 16, '2024-09-09 06:23:05', '2024-09-09 06:23:05');

-- ----------------------------
-- Table structure for informasi_setelah
-- ----------------------------
DROP TABLE IF EXISTS `informasi_setelah`;
CREATE TABLE `informasi_setelah`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul_isetelah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deskripsi_isetelah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `gambar_isetelah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `form_surat_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `informasi_setelah_form_surat_id_foreign`(`form_surat_id` ASC) USING BTREE,
  CONSTRAINT `informasi_setelah_form_surat_id_foreign` FOREIGN KEY (`form_surat_id`) REFERENCES `form_surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of informasi_setelah
-- ----------------------------
INSERT INTO `informasi_setelah` VALUES (7, NULL, NULL, '1725837639-360_F_723149335_tA0Fo8zefrHzYlSgXRMYHmBQk7CuWrRd.jpg', 14, '2024-09-09 06:20:39', '2024-09-09 06:20:39');
INSERT INTO `informasi_setelah` VALUES (8, NULL, NULL, '1725837649-360_F_162692511_SidIKVCDnt5UKHPNqpCb2MSKvfBlx1lG.jpg', 14, '2024-09-09 06:20:49', '2024-09-09 06:20:49');
INSERT INTO `informasi_setelah` VALUES (9, NULL, NULL, '1725837664-forest-landscape_71767-127.avif', 14, '2024-09-09 06:21:04', '2024-09-09 06:21:04');
INSERT INTO `informasi_setelah` VALUES (10, NULL, NULL, '1725837729-forest-landscape_71767-127.avif', 15, '2024-09-09 06:22:09', '2024-09-09 06:22:09');
INSERT INTO `informasi_setelah` VALUES (11, NULL, NULL, '1725837738-wallpapers-for-the-beautiful-peacock-wallpaper-ai-generated-free-photo.jpg', 15, '2024-09-09 06:22:18', '2024-09-09 06:22:18');
INSERT INTO `informasi_setelah` VALUES (12, NULL, NULL, '1725837748-a-beautiful-spring-day-with-pink-trees-and-flowers-ai-generated-photo.jpg', 15, '2024-09-09 06:22:28', '2024-09-09 06:22:28');
INSERT INTO `informasi_setelah` VALUES (13, NULL, NULL, '1725837810-a-beautiful-spring-day-with-pink-trees-and-flowers-ai-generated-photo.jpg', 16, '2024-09-09 06:23:30', '2024-09-09 06:23:30');
INSERT INTO `informasi_setelah` VALUES (14, NULL, NULL, '1725837819-istockphoto-1403500817-612x612.jpg', 16, '2024-09-09 06:23:39', '2024-09-09 06:23:39');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_root` int NULL DEFAULT NULL,
  `no_menu` int NULL DEFAULT NULL,
  `nama_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_node` tinyint(1) NOT NULL DEFAULT 0,
  `is_children` tinyint(1) NOT NULL DEFAULT 0,
  `children_menu` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, NULL, 1, 'Dashboard', '<i class=\"menu-icon tf-icons bx bx-home-circle\"></i>', '/Dashboard', 1, 0, '[3,4,8,9]', '2024-08-17 20:18:42', '2024-08-25 19:06:00');
INSERT INTO `menu` VALUES (2, NULL, 6, 'My Profile', '<i class=\'menu-icon tf-icons bx bxs-user-circle\'></i>', '/myProfile', 1, 0, '[5,6,7,10]', '2024-08-21 03:42:57', '2024-08-25 19:06:00');
INSERT INTO `menu` VALUES (3, NULL, 2, 'Pengaturan', '<i class=\"menu-icon tf-icons bx bxs-lock\"></i>', '#', 0, 1, NULL, '2024-08-21 03:43:39', '2024-08-25 18:59:20');
INSERT INTO `menu` VALUES (4, 3, 3, 'Menu', NULL, '/setting/menu', 0, 1, NULL, '2024-08-21 03:44:39', '2024-08-25 18:59:20');
INSERT INTO `menu` VALUES (5, 3, 7, 'Permission', NULL, '/setting/permissions', 0, 1, NULL, '2024-08-21 03:45:08', '2024-08-25 18:59:23');
INSERT INTO `menu` VALUES (6, 3, 8, 'User', NULL, '/setting/user', 0, 1, NULL, '2024-08-21 03:45:36', '2024-08-25 19:05:57');
INSERT INTO `menu` VALUES (7, 3, 9, 'Role', NULL, '/setting/roles', 0, 1, NULL, '2024-08-21 03:45:53', '2024-08-25 19:06:00');
INSERT INTO `menu` VALUES (8, 3, 4, 'Profile', NULL, '/setting/pengaturan', 0, 1, NULL, '2024-08-21 03:46:21', '2024-08-25 18:59:20');
INSERT INTO `menu` VALUES (9, NULL, 5, 'Logout', '<i class=\'menu-icon tf-icons bx bx-log-out\'></i>', '/setting/logout', 0, 1, NULL, '2024-08-21 03:46:49', '2024-08-25 18:59:20');

-- ----------------------------
-- Table structure for menu_permissions
-- ----------------------------
DROP TABLE IF EXISTS `menu_permissions`;
CREATE TABLE `menu_permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `root_mpermissions` int NULL DEFAULT NULL,
  `no_mpermissions` int NULL DEFAULT NULL,
  `nama_mpermissions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link_mpermissions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isnode_mpermissions` tinyint(1) NOT NULL DEFAULT 0,
  `ischildren_mpermissions` tinyint(1) NOT NULL DEFAULT 0,
  `childrenmenu_mpermissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_permissions
-- ----------------------------
INSERT INTO `menu_permissions` VALUES (1, NULL, 10, 'login', 'login', 0, 1, NULL, NULL, '2024-08-25 20:33:02');
INSERT INTO `menu_permissions` VALUES (2, NULL, 11, 'auth.login', 'auth.login', 0, 1, NULL, NULL, '2024-08-25 20:33:02');
INSERT INTO `menu_permissions` VALUES (3, NULL, 13, 'myProfile.index', 'myProfile.index', 0, 1, NULL, NULL, '2024-08-25 20:33:02');
INSERT INTO `menu_permissions` VALUES (4, NULL, 14, 'myProfile.edit', 'myProfile.edit', 0, 1, NULL, NULL, '2024-08-25 20:33:02');
INSERT INTO `menu_permissions` VALUES (5, NULL, 15, 'myProfile.update', 'myProfile.update', 0, 1, NULL, NULL, '2024-08-25 20:33:02');
INSERT INTO `menu_permissions` VALUES (6, NULL, 2, 'kategori.index', 'kategori.index', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (7, NULL, 3, 'kategori.create', 'kategori.create', 0, 1, NULL, NULL, '2024-08-25 20:32:45');
INSERT INTO `menu_permissions` VALUES (8, NULL, 4, 'kategori.store', 'kategori.store', 0, 1, NULL, NULL, '2024-08-25 20:32:48');
INSERT INTO `menu_permissions` VALUES (9, NULL, 5, 'kategori.show', 'kategori.show', 0, 1, NULL, NULL, '2024-08-25 20:32:55');
INSERT INTO `menu_permissions` VALUES (10, NULL, 6, 'kategori.edit', 'kategori.edit', 0, 1, NULL, NULL, '2024-08-25 20:32:54');
INSERT INTO `menu_permissions` VALUES (11, NULL, 7, 'kategori.update', 'kategori.update', 0, 1, NULL, NULL, '2024-08-25 20:32:59');
INSERT INTO `menu_permissions` VALUES (12, NULL, 8, 'kategori.destroy', 'kategori.destroy', 0, 1, NULL, NULL, '2024-08-25 20:33:02');
INSERT INTO `menu_permissions` VALUES (13, NULL, 16, 'setting.index', 'setting.index', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (14, NULL, 17, 'roles.index', 'roles.index', 1, 0, '[15,16,17,18,19,20]', NULL, '2024-08-27 21:32:56');
INSERT INTO `menu_permissions` VALUES (15, NULL, 18, 'roles.create', 'roles.create', 0, 1, NULL, NULL, '2024-08-27 21:31:54');
INSERT INTO `menu_permissions` VALUES (16, NULL, 19, 'roles.store', 'roles.store', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (17, NULL, 20, 'roles.show', 'roles.show', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (18, NULL, 21, 'roles.edit', 'roles.edit', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (19, NULL, 22, 'roles.update', 'roles.update', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (20, NULL, 23, 'roles.destroy', 'roles.destroy', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (21, NULL, 24, 'pengaturan.index', 'pengaturan.index', 1, 0, '[22,23,24,25,26,27]', NULL, '2024-08-27 21:32:56');
INSERT INTO `menu_permissions` VALUES (22, NULL, 25, 'pengaturan.create', 'pengaturan.create', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (23, NULL, 26, 'pengaturan.store', 'pengaturan.store', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (24, NULL, 27, 'pengaturan.show', 'pengaturan.show', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (25, NULL, 28, 'pengaturan.edit', 'pengaturan.edit', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (26, NULL, 29, 'pengaturan.update', 'pengaturan.update', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (27, NULL, 30, 'pengaturan.destroy', 'pengaturan.destroy', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (28, NULL, 31, 'user.index', 'user.index', 1, 0, '[29,30,31,32,33,34]', NULL, '2024-08-27 21:32:56');
INSERT INTO `menu_permissions` VALUES (29, NULL, 32, 'user.create', 'user.create', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (30, NULL, 33, 'user.store', 'user.store', 0, 1, NULL, NULL, '2024-08-27 21:32:21');
INSERT INTO `menu_permissions` VALUES (31, NULL, 34, 'user.show', 'user.show', 0, 1, NULL, NULL, '2024-08-27 21:32:23');
INSERT INTO `menu_permissions` VALUES (32, NULL, 35, 'user.edit', 'user.edit', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (33, NULL, 36, 'user.update', 'user.update', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (34, NULL, 37, 'user.destroy', 'user.destroy', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (35, NULL, 38, 'backup.index', 'backup.index', 1, 0, '[36,37,38,39,40,41]', NULL, '2024-08-27 21:32:56');
INSERT INTO `menu_permissions` VALUES (36, NULL, 39, 'backup.create', 'backup.create', 0, 1, NULL, NULL, '2024-08-27 21:32:47');
INSERT INTO `menu_permissions` VALUES (37, NULL, 40, 'backup.store', 'backup.store', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (38, NULL, 41, 'backup.show', 'backup.show', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (39, NULL, 42, 'backup.edit', 'backup.edit', 0, 1, NULL, NULL, '2024-08-27 21:32:53');
INSERT INTO `menu_permissions` VALUES (40, NULL, 43, 'backup.update', 'backup.update', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (41, NULL, 44, 'backup.destroy', 'backup.destroy', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (42, NULL, 45, 'restore.index', 'restore.index', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (43, NULL, 46, 'restore.create', 'restore.create', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (44, NULL, 47, 'restore.store', 'restore.store', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (45, NULL, 48, 'restore.show', 'restore.show', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (46, NULL, 49, 'restore.edit', 'restore.edit', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (47, NULL, 50, 'restore.update', 'restore.update', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (48, NULL, 51, 'restore.destroy', 'restore.destroy', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (49, NULL, 52, 'menu.index', 'menu.index', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (50, NULL, 53, 'menu.create', 'menu.create', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (51, NULL, 54, 'menu.store', 'menu.store', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (52, NULL, 55, 'menu.edit', 'menu.edit', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (53, NULL, 56, 'menu.update', 'menu.update', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (54, NULL, 57, 'menu.destroy', 'menu.destroy', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (55, NULL, 58, 'menu.renderTree', 'menu.renderTree', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (56, NULL, 59, 'menu.dataTable', 'menu.dataTable', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (57, NULL, 60, 'menu.sortAndNested', 'menu.sortAndNested', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (58, NULL, 61, 'permissions.index', 'permissions.index', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (59, NULL, 62, 'permissions.create', 'permissions.create', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (60, NULL, 63, 'permissions.store', 'permissions.store', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (61, NULL, 64, 'permissions.edit', 'permissions.edit', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (62, NULL, 65, 'permissions.update', 'permissions.update', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (63, NULL, 66, 'permissions.destroy', 'permissions.destroy', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (64, NULL, 67, 'permissions.renderTree', 'permissions.renderTree', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (65, NULL, 68, 'permissions.dataTable', 'permissions.dataTable', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (66, NULL, 69, 'permissions.sortAndNested', 'permissions.sortAndNested', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (67, NULL, 70, 'permissions.refresh', 'permissions.refresh', 0, 1, NULL, NULL, '2024-08-25 20:32:42');
INSERT INTO `menu_permissions` VALUES (68, NULL, 9, 'Management Login', '#', 1, 0, '[1,2]', '2024-08-25 20:22:19', '2024-08-27 21:32:56');
INSERT INTO `menu_permissions` VALUES (69, NULL, 12, 'Management Profile', '#', 1, 0, '[3,4,5]', '2024-08-25 20:22:40', '2024-08-27 21:32:56');
INSERT INTO `menu_permissions` VALUES (70, NULL, 1, 'Management Kategori', '#', 1, 0, '[6,7,8,9,10,11,12]', '2024-08-25 20:32:37', '2024-08-27 21:32:56');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_02_23_173455_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (6, '2024_03_08_073856_create_profiles_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_03_08_075828_add_roles_id_to_table_users', 1);
INSERT INTO `migrations` VALUES (8, '2024_03_08_080838_add_status_to_table_users', 1);
INSERT INTO `migrations` VALUES (9, '2024_06_15_200659_create_pengaturans_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_06_15_232347_create_menus_table', 1);
INSERT INTO `migrations` VALUES (11, '2024_07_14_150637_add_column_to_menu', 1);
INSERT INTO `migrations` VALUES (12, '2024_07_17_222033_create_menu_permissions_table', 1);
INSERT INTO `migrations` VALUES (13, '2024_08_15_191509_create_form_surats_table', 1);
INSERT INTO `migrations` VALUES (14, '2024_08_15_191617_create_informasi_sebelums_table', 1);
INSERT INTO `migrations` VALUES (15, '2024_08_15_191716_create_informasi_setelahs_table', 1);
INSERT INTO `migrations` VALUES (16, '2024_08_15_203938_create_permintaan_surats_table', 1);
INSERT INTO `migrations` VALUES (17, '2024_09_08_021803_add_column_to_content_fsurat', 2);
INSERT INTO `migrations` VALUES (18, '2024_09_08_083323_add_column_to_iswatermark_fsurat', 3);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pengaturan
-- ----------------------------
DROP TABLE IF EXISTS `pengaturan`;
CREATE TABLE `pengaturan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `namaaplikasi_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `namainstansi_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notelepon_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deskripsi_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `logoaplikasi_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengaturan
-- ----------------------------
INSERT INTO `pengaturan` VALUES (1, 'Surat Menyurat', 'Pengadilan Negeri', 'Alamat Surat Menyurat', '082277506232', 'Deskripsi Surat Menyurat', '1725320245-Rooster-Farm-Logo.png', '', '2024-08-15 21:14:28', '2024-09-03 06:37:25');

-- ----------------------------
-- Table structure for permintaan_surat
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_surat`;
CREATE TABLE `permintaan_surat`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_permintaan_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `form_surat_id` bigint UNSIGNED NOT NULL,
  `data_permintaan_surat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `permintaan_surat_form_surat_id_foreign`(`form_surat_id` ASC) USING BTREE,
  CONSTRAINT `permintaan_surat_form_surat_id_foreign` FOREIGN KEY (`form_surat_id`) REFERENCES `form_surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permintaan_surat
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_profile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `jeniskelamin_profile` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `profile_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `profile_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (1, 'admin', '082277506232', 'Jakarta pusat', 'L', 1, '2024-08-15 21:14:28', '2024-08-17 20:18:05');
INSERT INTO `profile` VALUES (2, 'HelloBro', '382903280', 'alamat helo bro', 'L', 2, '2024-08-17 20:20:37', '2024-08-17 20:20:37');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'web', '2024-08-15 21:14:28', '2024-08-15 21:14:28');
INSERT INTO `roles` VALUES (2, 'Karyawan', 'web', '2024-08-17 20:20:52', '2024-08-27 21:23:23');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles_id` bigint UNSIGNED NOT NULL,
  `status_users` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username` ASC) USING BTREE,
  INDEX `users_roles_id_foreign`(`roles_id` ASC) USING BTREE,
  CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$WDj8cYVR8nxQJJTQMEUZPenoe5N10GqznG.Ln5cRcuPoDINnuDAPK', NULL, '2024-08-15 21:14:28', '2024-08-15 21:14:28', 1, 1);
INSERT INTO `users` VALUES (2, 'HelloBro', 'helobro15@gmail.com', 'hellobro', NULL, '$2y$10$m6N1va1oyYooPAbs5RNIC.jirEjizQXyRJzt3FdgxT.xjqWtcl4jC', NULL, '2024-08-17 20:20:37', '2024-08-17 20:20:37', 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
