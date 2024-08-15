/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : inventory_app

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 17/07/2024 21:18:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `barcode_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_id` bigint UNSIGNED NOT NULL,
  `deskripsi_barang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `snornonsn_barang` enum('sn','non sn') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_barang` double NOT NULL,
  `hargajual_barang` double NOT NULL,
  `lokasi_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `status_barang` enum('dijual','tidak dijual') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `barang_satuan_id_foreign`(`satuan_id` ASC) USING BTREE,
  INDEX `barang_kategori_id_foreign`(`kategori_id` ASC) USING BTREE,
  CONSTRAINT `barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `barang_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (1, 'BRG001', 'Barang 1', 1, 'Deskripsi barang 1', 'sn', 56, 50000, 'L.A1', 1, 'dijual', '2024-06-15 15:27:55', '2024-06-17 17:36:10');
INSERT INTO `barang` VALUES (2, 'BRG002', 'Barang 2', 2, 'Deskripsi barang 2', 'sn', 90, 40000, 'A3', 3, 'dijual', '2024-06-15 18:15:19', '2024-06-17 17:36:10');
INSERT INTO `barang` VALUES (3, 'BRG003', 'Barang 3', 3, 'Deskripsi barang 3', 'sn', 53, 45000, 'D55', 3, 'dijual', '2024-06-15 18:17:15', '2024-06-17 17:36:10');
INSERT INTO `barang` VALUES (4, 'BRG004', 'Barang 4', 4, 'Deskripsi barang 4', 'sn', 70, 65000, 'LC.A44', 3, 'dijual', '2024-06-15 18:22:32', '2024-06-17 16:50:40');
INSERT INTO `barang` VALUES (5, 'BRG005', 'Barang 5', 3, 'Deskripsi barang 5', 'sn', 80, 65000, 'LC005', 2, 'dijual', '2024-06-15 18:23:23', '2024-06-17 15:29:23');
INSERT INTO `barang` VALUES (6, 'BRG006', 'Barang 6', 2, 'Deskripsi barang 6', 'sn', 100, 35000, 'BC03', 2, 'dijual', '2024-06-15 18:26:48', '2024-06-15 18:26:48');
INSERT INTO `barang` VALUES (7, 'BRG007', 'Barang 7', 2, 'Deskripsi barang 7', 'sn', 75, 45000, 'AB03', 1, 'dijual', '2024-06-15 18:27:37', '2024-06-17 15:29:09');
INSERT INTO `barang` VALUES (8, 'BRG008', 'Barang 8', 2, 'Deskripsi 8', 'sn', 15, 80000, 'BC003', 2, 'dijual', '2024-06-15 18:33:31', '2024-06-17 15:48:42');
INSERT INTO `barang` VALUES (9, 'BRG009', 'Barang 9', 2, 'Deskripsi barang 9', 'sn', 90, 90000, 'CB009', 2, 'dijual', '2024-06-15 18:34:24', '2024-06-17 15:48:42');
INSERT INTO `barang` VALUES (10, 'BRG010', 'Barang 10', 3, 'Deskripsi barang 10', 'sn', 110, 100000, 'BC010', 1, 'dijual', '2024-06-15 18:35:01', '2024-06-17 15:48:35');
INSERT INTO `barang` VALUES (17, 'BRG012', 'Iphone pro max 15', 12, '-', 'sn', 100, 1000000, 'LC011', 11, 'dijual', '2024-06-17 17:27:00', '2024-06-17 17:27:00');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nowa_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (4, 'Customer 4', '03289328', 'customer4@gmail.com', 'alamat customer 4', '1', '2024-06-15 18:35:57', '2024-06-15 18:35:57');
INSERT INTO `customer` VALUES (5, 'Customer 5', '03289328', 'customer5@gmail.com', 'alamat customer 5', '1', '2024-06-15 18:36:13', '2024-06-15 18:36:13');
INSERT INTO `customer` VALUES (12, 'Budiyono Siregar', '08329723897', 'budiyonosiregar@gmail.com', '-', '1', '2024-06-17 17:27:33', '2024-06-17 17:27:33');

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
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kategori` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Kategori 1', 1, '2024-06-15 15:23:13', '2024-06-15 15:23:13');
INSERT INTO `kategori` VALUES (2, 'Kategori 2', 1, '2024-06-15 15:23:20', '2024-06-15 15:23:20');
INSERT INTO `kategori` VALUES (3, 'Kategori 3', 1, '2024-06-15 15:23:25', '2024-06-15 15:23:25');
INSERT INTO `kategori` VALUES (4, 'Kategori 4', 1, '2024-06-17 11:26:59', '2024-06-17 11:26:59');
INSERT INTO `kategori` VALUES (11, 'Elektronik', 1, '2024-06-17 17:25:59', '2024-06-17 17:25:59');

-- ----------------------------
-- Table structure for kategori_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `kategori_pembayaran`;
CREATE TABLE `kategori_pembayaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kpembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kpembayaran` tinyint(1) NOT NULL DEFAULT 1,
  `tipe_kpembayaran` enum('cash','transfer','deposit') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_pembayaran
-- ----------------------------
INSERT INTO `kategori_pembayaran` VALUES (1, 'Langsung', 1, 'cash', '2024-06-15 18:07:05', '2024-06-15 18:07:05');
INSERT INTO `kategori_pembayaran` VALUES (2, 'Debit', 1, 'transfer', '2024-06-15 18:07:21', '2024-06-15 18:07:21');
INSERT INTO `kategori_pembayaran` VALUES (4, 'Kredit', 1, 'transfer', '2024-06-15 18:07:45', '2024-06-15 18:07:45');

-- ----------------------------
-- Table structure for kategori_pendapatan
-- ----------------------------
DROP TABLE IF EXISTS `kategori_pendapatan`;
CREATE TABLE `kategori_pendapatan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kpendapatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kpendapatan` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_pendapatan
-- ----------------------------
INSERT INTO `kategori_pendapatan` VALUES (2, 'Pendapatan Fee Admin', 1, '2024-06-15 18:11:07', '2024-06-15 18:11:07');
INSERT INTO `kategori_pendapatan` VALUES (4, 'Pendapatan Aplikasi', 1, '2024-06-15 18:11:21', '2024-06-15 18:11:21');
INSERT INTO `kategori_pendapatan` VALUES (5, 'Pendapatan lainnya', 1, '2024-06-15 18:11:30', '2024-06-15 18:11:30');
INSERT INTO `kategori_pendapatan` VALUES (12, 'Biaya Maintainance', 1, '2024-06-17 17:28:52', '2024-06-17 17:28:52');

-- ----------------------------
-- Table structure for kategori_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `kategori_pengeluaran`;
CREATE TABLE `kategori_pengeluaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kpengeluaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kpengeluaran` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_pengeluaran
-- ----------------------------
INSERT INTO `kategori_pengeluaran` VALUES (1, 'Biaya Listrik 1 Bulan', 1, '2024-06-15 18:12:02', '2024-06-15 18:12:02');
INSERT INTO `kategori_pengeluaran` VALUES (2, 'Telepon & Internet', 1, '2024-06-15 18:12:09', '2024-06-15 18:12:09');
INSERT INTO `kategori_pengeluaran` VALUES (3, 'Perlengkapan Toko', 1, '2024-06-15 18:12:16', '2024-06-15 18:12:16');
INSERT INTO `kategori_pengeluaran` VALUES (4, 'Biaya Penyusutan', 1, '2024-06-15 18:12:22', '2024-06-15 18:12:22');
INSERT INTO `kategori_pengeluaran` VALUES (5, 'Transportasi & Bensin', 1, '2024-06-15 18:12:28', '2024-06-15 18:12:28');
INSERT INTO `kategori_pengeluaran` VALUES (6, 'Biaya Tak Terduga', 1, '2024-06-15 18:12:34', '2024-06-15 18:12:34');
INSERT INTO `kategori_pengeluaran` VALUES (7, 'Pengeluaran Lain', 1, '2024-06-15 18:12:42', '2024-06-15 18:12:42');
INSERT INTO `kategori_pengeluaran` VALUES (8, 'Pengeluaran lainnya', 1, '2024-06-15 18:12:48', '2024-06-15 18:12:48');
INSERT INTO `kategori_pengeluaran` VALUES (15, 'Biaya Admin', 1, '2024-06-17 15:35:10', '2024-06-17 15:35:10');
INSERT INTO `kategori_pengeluaran` VALUES (16, 'Biaya Transportasi', 1, '2024-06-17 16:24:21', '2024-06-17 16:24:21');
INSERT INTO `kategori_pengeluaran` VALUES (17, 'Biaya Perlengkapan Kantor', 1, '2024-06-17 17:29:15', '2024-06-17 17:29:15');

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
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (3, NULL, 1, 'Dashboard', '<i class=\"menu-icon tf-icons bx bx-home-circle\"></i>', '/dashboard', 0, 1, NULL, '2024-07-14 14:07:46', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (4, NULL, 2, 'My Profile', '<i class=\"menu-icon tf-icons bx bxs-user-circle\"></i>', '/myProfile', 0, 1, NULL, '2024-07-14 14:13:12', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (5, NULL, 3, 'Penjualan', '<i class=\"menu-icon tf-icons bx bx-money\"></i>', '#', 1, 0, '[6,7,8,9]', '2024-07-14 14:13:54', '2024-07-14 16:29:54');
INSERT INTO `menu` VALUES (6, NULL, 4, 'Kasir', NULL, '/purchase/kasir', 0, 1, NULL, '2024-07-14 14:30:23', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (7, NULL, 5, 'Invoice Penjualan', NULL, '/purchase/penjualan', 0, 1, NULL, '2024-07-14 14:31:39', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (8, NULL, 6, 'Invoice Hutang', NULL, '/purchase/belumLunas', 0, 1, NULL, '2024-07-14 14:32:25', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (9, NULL, 7, 'Invoice Lunas', NULL, '/purchase/lunas', 0, 1, NULL, '2024-07-14 14:33:17', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (10, NULL, 8, 'Pembelian', '<i class=\"menu-icon tf-icons bx bx-cart-alt\"></i>', '#', 1, 0, '[11,12,13,14]', '2024-07-14 14:34:52', '2024-07-14 16:29:54');
INSERT INTO `menu` VALUES (11, NULL, 9, 'Transaksi Pembelian', NULL, '/transaction/kasir', 0, 1, NULL, '2024-07-14 14:36:02', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (12, NULL, 10, 'Invoice Pembelian', NULL, '/transaction/pembelian', 0, 1, NULL, '2024-07-14 14:37:34', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (13, NULL, 11, 'Invoice Hutang', NULL, '/transaction/belumLunas', 0, 1, NULL, '2024-07-14 14:38:08', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (14, NULL, 12, 'Invoice Lunas', NULL, '/transaction/lunas', 0, 1, NULL, '2024-07-14 14:38:37', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (15, NULL, 13, 'Data Master', '<i class=\"menu-icon tf-icons bx bx-dock-top\"></i>', '#', 1, 0, '[16,17,18,19,20,21,22,23]', '2024-07-14 14:39:19', '2024-07-14 16:29:54');
INSERT INTO `menu` VALUES (16, NULL, 14, 'Kategori', NULL, '/master/kategori', 0, 1, NULL, '2024-07-14 14:39:56', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (17, NULL, 15, 'Satuan', NULL, '/master/satuan', 0, 1, NULL, '2024-07-14 14:40:20', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (18, NULL, 16, 'Barang', NULL, '/master/barang', 0, 1, NULL, '2024-07-14 14:40:50', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (19, NULL, 17, 'Customer', NULL, '/master/customer', 0, 1, NULL, '2024-07-14 14:41:17', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (20, NULL, 18, 'Supplier', NULL, '/master/supplier', 0, 1, NULL, '2024-07-14 14:41:39', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (21, NULL, 19, 'Pembayaran', NULL, '/master/subPembayaran', 0, 1, NULL, '2024-07-14 14:42:04', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (22, NULL, 20, 'Kategori Pendapatan', NULL, '/master/kategoriPendapatan', 0, 1, NULL, '2024-07-14 14:42:44', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (23, NULL, 21, 'Kategori Pengeluaran', NULL, '/master/kategoriPengeluaran', 0, 1, NULL, '2024-07-14 14:43:17', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (24, NULL, 22, 'Laba Bersih', '<i class=\"menu-icon tf-icons bx bxs-report\"></i>', '#', 1, 0, '[25,26,27]', '2024-07-14 14:44:49', '2024-07-14 16:29:54');
INSERT INTO `menu` VALUES (25, NULL, 23, 'Pendapatan', NULL, '/report/pendapatan', 0, 1, NULL, '2024-07-14 14:45:22', '2024-07-14 15:51:46');
INSERT INTO `menu` VALUES (26, NULL, 24, 'Pengeluaran', NULL, '/report/pengeluaran', 0, 1, NULL, '2024-07-14 14:46:35', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (27, NULL, 25, 'Laba Bersih', NULL, '/report/labaBersih', 0, 1, NULL, '2024-07-14 14:47:04', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (28, NULL, 26, 'Laporan Toko', '<i class=\"menu-icon tf-icons bx bxs-report\"></i>', '#', 1, 0, '[29,30,31,36,37,38,39,40,41]', '2024-07-14 14:47:56', '2024-07-14 16:29:54');
INSERT INTO `menu` VALUES (29, NULL, 27, 'Kasir', NULL, '/report/kasir', 0, 1, NULL, '2024-07-14 14:49:21', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (30, NULL, 28, 'Customer', NULL, '/report/customer', 0, 1, NULL, '2024-07-14 14:49:47', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (31, NULL, 29, 'Periode', NULL, '/report/periode', 0, 1, NULL, '2024-07-14 14:50:16', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (36, 28, 30, 'Produk', NULL, '/report/produk', 0, 1, NULL, '2024-07-14 15:26:41', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (37, 28, 31, 'Supplier', NULL, '/report/supplier', 0, 1, NULL, '2024-07-14 15:27:46', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (38, 28, 32, 'Pembelian Produk', NULL, '/report/pembelianProduk', 0, 1, NULL, '2024-07-14 15:29:25', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (39, 28, 33, 'Periode Pembelian', NULL, '/report/periodePembelian', 0, 1, NULL, '2024-07-14 15:33:22', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (40, 28, 34, 'Barang Terlaris', NULL, '/report/barangTerlaris', 0, 1, NULL, '2024-07-14 15:33:58', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (41, 28, 35, 'Stok Terkecil', NULL, '/report/stokTerkecil', 0, 1, NULL, '2024-07-14 15:34:46', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (42, NULL, 37, 'User', NULL, '/setting/user', 0, 1, NULL, '2024-07-14 15:35:51', '2024-07-14 15:51:17');
INSERT INTO `menu` VALUES (43, NULL, 38, 'Role', NULL, '/setting/roles', 0, 1, NULL, '2024-07-14 15:36:49', '2024-07-14 15:51:17');
INSERT INTO `menu` VALUES (44, NULL, 39, 'Profile', NULL, '/setting/pengaturan', 0, 1, NULL, '2024-07-14 15:37:20', '2024-07-14 15:51:17');
INSERT INTO `menu` VALUES (45, NULL, 36, 'Pengaturan', '<i class=\"menu-icon tf-icons bx bxs-lock\"></i>', '#', 1, 0, '[42,43,44,46]', '2024-07-14 15:41:25', '2024-07-14 16:29:54');
INSERT INTO `menu` VALUES (46, 45, 40, 'Menu', NULL, '/setting/menu', 0, 1, NULL, '2024-07-14 15:42:14', '2024-07-14 15:42:41');
INSERT INTO `menu` VALUES (47, NULL, 41, 'Logout', '<i class=\"menu-icon tf-icons bx bx-log-out\"></i>', '/logout', 0, 1, NULL, '2024-07-14 15:43:41', '2024-07-14 15:49:49');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_02_23_173455_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (6, '2024_03_03_071034_create_kategoris_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_03_04_002921_create_customers_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_03_05_004001_create_satuans_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_03_06_010710_create_barangs_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_03_06_045529_create_serial_barangs_table', 1);
INSERT INTO `migrations` VALUES (11, '2024_03_06_135811_create_suppliers_table', 1);
INSERT INTO `migrations` VALUES (12, '2024_03_07_124633_create_penjualans_table', 1);
INSERT INTO `migrations` VALUES (13, '2024_03_07_124652_create_penjualan_products_table', 1);
INSERT INTO `migrations` VALUES (14, '2024_03_08_073856_create_profiles_table', 1);
INSERT INTO `migrations` VALUES (15, '2024_03_08_075828_add_roles_id_to_table_users', 1);
INSERT INTO `migrations` VALUES (16, '2024_03_08_080838_add_status_to_table_users', 1);
INSERT INTO `migrations` VALUES (17, '2024_03_09_090527_create_kategori_pembayarans_table', 1);
INSERT INTO `migrations` VALUES (18, '2024_03_09_090558_create_sub_pembayarans_table', 1);
INSERT INTO `migrations` VALUES (19, '2024_03_10_114723_add_column_to_penjualan_table', 1);
INSERT INTO `migrations` VALUES (20, '2024_03_10_115056_change_column_type_in_penjualan_table', 1);
INSERT INTO `migrations` VALUES (21, '2024_03_10_115735_change_column_type_in_penjualan_table', 1);
INSERT INTO `migrations` VALUES (22, '2024_03_10_115959_add_column_to_penjualan_product_table', 1);
INSERT INTO `migrations` VALUES (23, '2024_03_10_121535_add_column_to_penjualan_table', 1);
INSERT INTO `migrations` VALUES (24, '2024_03_10_122355_remove_column_to_penjualan_product_table', 1);
INSERT INTO `migrations` VALUES (25, '2024_03_10_122626_create_penjualan_pembayarans_table', 1);
INSERT INTO `migrations` VALUES (26, '2024_03_10_123342_change_column_type_in_penjualan_product_table', 1);
INSERT INTO `migrations` VALUES (27, '2024_03_10_124108_rename_table_penjualan_pembayaran', 1);
INSERT INTO `migrations` VALUES (28, '2024_03_10_124825_add_column_to_penjualan_pembayaran_table', 1);
INSERT INTO `migrations` VALUES (29, '2024_03_10_144954_add_column_to_penjualan_product_table', 1);
INSERT INTO `migrations` VALUES (30, '2024_03_10_145128_add_column_to_penjualan_pembayaran_table', 1);
INSERT INTO `migrations` VALUES (31, '2024_03_11_021709_change_column_type_in_penjualan_product_table', 1);
INSERT INTO `migrations` VALUES (32, '2024_03_11_021922_change_column_type_in_penjualan_product_table', 1);
INSERT INTO `migrations` VALUES (33, '2024_03_11_052317_add_column_to_penjualan_table', 1);
INSERT INTO `migrations` VALUES (34, '2024_03_13_000902_create_penjualan_cicilans_table', 1);
INSERT INTO `migrations` VALUES (35, '2024_03_13_143747_add_column_to_penjualan_table', 1);
INSERT INTO `migrations` VALUES (36, '2024_03_14_005829_add_column_to_penjualan_cicilan_table', 1);
INSERT INTO `migrations` VALUES (37, '2024_03_15_231739_create_pembelians_table', 1);
INSERT INTO `migrations` VALUES (38, '2024_03_15_232236_create_pembelian_cicilans_table', 1);
INSERT INTO `migrations` VALUES (39, '2024_03_15_232826_create_pembelian_pembayarans_table', 1);
INSERT INTO `migrations` VALUES (40, '2024_03_15_233322_create_pembelian_products_table', 1);
INSERT INTO `migrations` VALUES (41, '2024_03_18_070009_create_saldo_customers_table', 1);
INSERT INTO `migrations` VALUES (42, '2024_03_20_003236_create_saldo_details_table', 1);
INSERT INTO `migrations` VALUES (43, '2024_03_21_095658_add_column_to_saldo_detail', 1);
INSERT INTO `migrations` VALUES (44, '2024_03_21_102230_add_column_to_saldo_detail', 1);
INSERT INTO `migrations` VALUES (45, '2024_03_24_094040_create_order_barangs_table', 1);
INSERT INTO `migrations` VALUES (46, '2024_04_01_234932_create_kategori_pendapatans_table', 1);
INSERT INTO `migrations` VALUES (47, '2024_04_01_235010_create_kategori_pengeluarans_table', 1);
INSERT INTO `migrations` VALUES (48, '2024_04_02_000555_add_foreign_to_pembelian_product', 1);
INSERT INTO `migrations` VALUES (49, '2024_04_02_002555_create_transaksi_pendapatans_table', 1);
INSERT INTO `migrations` VALUES (50, '2024_04_02_002627_create_transaksi_pengeluarans_table', 1);
INSERT INTO `migrations` VALUES (51, '2024_04_02_042430_add_column_to_transaksi_pendapatan', 1);
INSERT INTO `migrations` VALUES (52, '2024_04_02_042512_add_column_to_transaksi_pengeluaran', 1);
INSERT INTO `migrations` VALUES (53, '2024_04_06_161950_add_column_to_penjualan_jatuhtempo', 1);
INSERT INTO `migrations` VALUES (54, '2024_04_06_162056_add_column_to_pembelian_jatuhtempo', 1);
INSERT INTO `migrations` VALUES (55, '2024_05_12_133936_add_column_to_saldo_detail', 1);
INSERT INTO `migrations` VALUES (56, '2024_06_15_200659_create_pengaturans_table', 2);
INSERT INTO `migrations` VALUES (57, '2024_06_15_232347_create_menus_table', 3);
INSERT INTO `migrations` VALUES (58, '2024_07_14_150637_add_column_to_menu', 4);

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
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 5);
INSERT INTO `model_has_roles` VALUES (4, 'App\\Models\\User', 6);

-- ----------------------------
-- Table structure for order_barang
-- ----------------------------
DROP TABLE IF EXISTS `order_barang`;
CREATE TABLE `order_barang`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `qty_orderbarang` double NOT NULL,
  `typediskon_orderbarang` enum('fix','%') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diskon_orderbarang` double NULL DEFAULT NULL,
  `subtotal_orderbarang` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_barang_users_id_foreign`(`users_id` ASC) USING BTREE,
  INDEX `order_barang_barang_id_foreign`(`barang_id` ASC) USING BTREE,
  CONSTRAINT `order_barang_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_barang_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_barang
-- ----------------------------

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
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_pembelian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_pembelian` datetime NOT NULL,
  `supplier_id` bigint NULL DEFAULT NULL,
  `tipe_pembelian` enum('cash','hutang') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `total_pembelian` double NOT NULL,
  `hutang_pembelian` double NOT NULL,
  `kembalian_pembelian` double NOT NULL,
  `bayar_pembelian` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jatuhtempo_pembelian` date NULL DEFAULT NULL,
  `keteranganjtempo_pembelian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `isinfojtempo_pembelian` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pembelian_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `pembelian_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES (6, '202406171', '2024-06-17 17:36:09', 12, 'cash', 1, 1350000, 0, 150000, 1500000, '2024-06-17 17:36:10', '2024-06-17 17:36:10', NULL, NULL, 0);

-- ----------------------------
-- Table structure for pembelian_cicilan
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_cicilan`;
CREATE TABLE `pembelian_cicilan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_pembayaran_id` bigint UNSIGNED NOT NULL,
  `sub_pembayaran_id` bigint UNSIGNED NOT NULL,
  `bayar_pbcicilan` double NOT NULL,
  `dibayaroleh_pbcicilan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `kembalian_pbcicilan` double NOT NULL,
  `hutang_pbcicilan` double NOT NULL,
  `nomorkartu_pbcicilan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemilikkartu_pbcicilan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pembelian_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pembelian_cicilan_kategori_pembayaran_id_foreign`(`kategori_pembayaran_id` ASC) USING BTREE,
  INDEX `pembelian_cicilan_sub_pembayaran_id_foreign`(`sub_pembayaran_id` ASC) USING BTREE,
  INDEX `pembelian_cicilan_users_id_foreign`(`users_id` ASC) USING BTREE,
  INDEX `pembelian_cicilan_pembelian_id_foreign`(`pembelian_id` ASC) USING BTREE,
  CONSTRAINT `pembelian_cicilan_kategori_pembayaran_id_foreign` FOREIGN KEY (`kategori_pembayaran_id`) REFERENCES `kategori_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_cicilan_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_cicilan_sub_pembayaran_id_foreign` FOREIGN KEY (`sub_pembayaran_id`) REFERENCES `sub_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_cicilan_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian_cicilan
-- ----------------------------

-- ----------------------------
-- Table structure for pembelian_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_pembayaran`;
CREATE TABLE `pembelian_pembayaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_pembayaran_id` bigint UNSIGNED NOT NULL,
  `sub_pembayaran_id` bigint UNSIGNED NOT NULL,
  `bayar_pbpembayaran` double NOT NULL,
  `dibayaroleh_pbpembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `kembalian_pbpembayaran` double NOT NULL,
  `hutang_pbpembayaran` double NOT NULL,
  `nomorkartu_pbpembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemilikkartu_pbpembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pembelian_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pembelian_pembayaran_kategori_pembayaran_id_foreign`(`kategori_pembayaran_id` ASC) USING BTREE,
  INDEX `pembelian_pembayaran_sub_pembayaran_id_foreign`(`sub_pembayaran_id` ASC) USING BTREE,
  INDEX `pembelian_pembayaran_users_id_foreign`(`users_id` ASC) USING BTREE,
  INDEX `pembelian_pembayaran_pembelian_id_foreign`(`pembelian_id` ASC) USING BTREE,
  CONSTRAINT `pembelian_pembayaran_kategori_pembayaran_id_foreign` FOREIGN KEY (`kategori_pembayaran_id`) REFERENCES `kategori_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_pembayaran_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_pembayaran_sub_pembayaran_id_foreign` FOREIGN KEY (`sub_pembayaran_id`) REFERENCES `sub_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_pembayaran_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian_pembayaran
-- ----------------------------
INSERT INTO `pembelian_pembayaran` VALUES (6, 1, 1, 1500000, 'Pt. Budiyono Siregar', 1, 150000, 0, NULL, NULL, 6, NULL, NULL);

-- ----------------------------
-- Table structure for pembelian_product
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_product`;
CREATE TABLE `pembelian_product`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaksi_pembelianproduct` datetime NOT NULL,
  `supplier_id` bigint NULL DEFAULT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `jumlah_pembelianproduct` double NOT NULL,
  `typediskon_pembelianproduct` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diskon_pembelianproduct` double NULL DEFAULT NULL,
  `subtotal_pembelianproduct` double NOT NULL,
  `pembelian_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pembelian_product_barang_id_foreign`(`barang_id` ASC) USING BTREE,
  INDEX `pembelian_product_pembelian_id_foreign`(`pembelian_id` ASC) USING BTREE,
  CONSTRAINT `pembelian_product_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_product_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian_product
-- ----------------------------
INSERT INTO `pembelian_product` VALUES (11, '2024-06-17 17:36:09', 12, 1, 10, NULL, NULL, 500000, 6, NULL, NULL);
INSERT INTO `pembelian_product` VALUES (12, '2024-06-17 17:36:09', 12, 2, 10, NULL, NULL, 400000, 6, NULL, NULL);
INSERT INTO `pembelian_product` VALUES (13, '2024-06-17 17:36:09', 12, 3, 10, NULL, NULL, 450000, 6, NULL, NULL);

-- ----------------------------
-- Table structure for pengaturan
-- ----------------------------
DROP TABLE IF EXISTS `pengaturan`;
CREATE TABLE `pengaturan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `namaaplikasi_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `namainstansi_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notelepon_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `logoaplikasi_pengaturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengaturan
-- ----------------------------
INSERT INTO `pengaturan` VALUES (2, 'Inventory App', 'PT. Inventory Laras', 'Alamat Inventory Laras', '02389328', 'Deskripsi Inventory Laras', '1718598894-profile.jpg', '2024-06-15 22:43:56', '2024-06-17 17:30:39');

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_penjualan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_penjualan` datetime NOT NULL,
  `customer_id` bigint NULL DEFAULT NULL,
  `tipe_penjualan` enum('cash','hutang') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_penjualan` double NOT NULL,
  `hutang_penjualan` double NOT NULL DEFAULT 0,
  `kembalian_penjualan` double NOT NULL,
  `bayar_penjualan` double NOT NULL,
  `jatuhtempo_penjualan` date NULL DEFAULT NULL,
  `keteranganjtempo_penjualan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `isinfojtempo_penjualan` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penjualan_customer_id_foreign`(`customer_id` ASC) USING BTREE,
  INDEX `penjualan_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `penjualan_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES (1, '202406151', '2024-06-15 18:38:02', 1, 'cash', 1, '2024-06-15 18:38:03', '2024-06-15 18:38:03', 175000, 0, 0, 175000, NULL, NULL, 0);
INSERT INTO `penjualan` VALUES (2, '202406152', '2024-06-15 18:40:29', 2, 'cash', 1, '2024-06-15 18:40:30', '2024-06-15 18:58:44', 460000, 0, 10000, 470000, '2024-07-15', 'Transaksi anda sudah melebihi batas waktu pembayaran. Silahkan segera melakukan pembayaran.', 0);
INSERT INTO `penjualan` VALUES (3, '202406153', '2024-06-15 19:40:00', 4, 'cash', 1, '2024-06-15 19:40:01', '2024-06-17 13:39:37', 1600000, 0, 50000, 1650000, '2024-07-15', 'Transaksi anda sudah melebihi batas waktu pembayaran. Silahkan segera melakukan pembayaran.', 0);
INSERT INTO `penjualan` VALUES (13, '202406171', '2024-06-17 17:31:34', 12, 'cash', 1, '2024-06-17 17:31:35', '2024-06-17 17:31:35', 270000, 0, 30000, 300000, NULL, NULL, 0);
INSERT INTO `penjualan` VALUES (14, '202406172', '2024-06-17 17:33:18', 5, 'cash', 1, '2024-06-17 17:33:20', '2024-06-17 17:34:37', 545000, 0, 5000, 550000, '2024-07-17', 'Transaksi anda sudah melebihi batas waktu pembayaran. Silahkan segera melakukan pembayaran.', 0);

-- ----------------------------
-- Table structure for penjualan_cicilan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_cicilan`;
CREATE TABLE `penjualan_cicilan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_pembayaran_id` bigint UNSIGNED NOT NULL,
  `sub_pembayaran_id` bigint UNSIGNED NOT NULL,
  `bayar_pcicilan` double NOT NULL,
  `dibayaroleh_pcicilan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `kembalian_pcicilan` double NOT NULL,
  `hutang_pcicilan` double NOT NULL,
  `nomorkartu_pcicilan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemilikkartu_pcicilan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penjualan_cicilan_penjualan_id_foreign`(`penjualan_id` ASC) USING BTREE,
  INDEX `penjualan_cicilan_kategori_pembayaran_id_foreign`(`kategori_pembayaran_id` ASC) USING BTREE,
  INDEX `penjualan_cicilan_sub_pembayaran_id_foreign`(`sub_pembayaran_id` ASC) USING BTREE,
  INDEX `penjualan_cicilan_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `penjualan_cicilan_kategori_pembayaran_id_foreign` FOREIGN KEY (`kategori_pembayaran_id`) REFERENCES `kategori_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_cicilan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_cicilan_sub_pembayaran_id_foreign` FOREIGN KEY (`sub_pembayaran_id`) REFERENCES `sub_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_cicilan_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan_cicilan
-- ----------------------------
INSERT INTO `penjualan_cicilan` VALUES (1, 1, 1, 30000, 'Bima Ega F', 1, 0, 30000, NULL, NULL, 2, NULL, NULL);
INSERT INTO `penjualan_cicilan` VALUES (2, 1, 1, 40000, 'Bima Ega F/', 1, 10000, 0, NULL, NULL, 2, NULL, NULL);
INSERT INTO `penjualan_cicilan` VALUES (21, 1, 1, 100000, 'Bima Ega F', 1, 0, 500000, NULL, NULL, 3, NULL, NULL);
INSERT INTO `penjualan_cicilan` VALUES (22, 1, 1, 400000, 'Bima Ega F.', 1, 0, 100000, NULL, NULL, 3, NULL, NULL);
INSERT INTO `penjualan_cicilan` VALUES (24, 1, 1, 150000, 'Bima Ega F.', 1, 50000, 0, NULL, NULL, 3, NULL, NULL);
INSERT INTO `penjualan_cicilan` VALUES (30, 1, 1, 50000, 'Bima Ega F.', 1, 5000, 0, NULL, NULL, 14, NULL, NULL);

-- ----------------------------
-- Table structure for penjualan_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_pembayaran`;
CREATE TABLE `penjualan_pembayaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_pembayaran_id` bigint UNSIGNED NOT NULL,
  `sub_pembayaran_id` bigint UNSIGNED NOT NULL,
  `bayar_ppembayaran` double NOT NULL,
  `dibayaroleh_ppembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `kembalian_ppembayaran` double NOT NULL,
  `hutang_ppembayaran` double NOT NULL,
  `nomorkartu_ppembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemilikkartu_ppembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penjualan_pembayaran_kategori_pembayaran_id_foreign`(`kategori_pembayaran_id` ASC) USING BTREE,
  INDEX `penjualan_pembayaran_sub_pembayaran_id_foreign`(`sub_pembayaran_id` ASC) USING BTREE,
  INDEX `penjualan_pembayaran_users_id_foreign`(`users_id` ASC) USING BTREE,
  INDEX `penjualan_pembayaran_penjualan_id_foreign`(`penjualan_id` ASC) USING BTREE,
  CONSTRAINT `penjualan_pembayaran_kategori_pembayaran_id_foreign` FOREIGN KEY (`kategori_pembayaran_id`) REFERENCES `kategori_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_pembayaran_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_pembayaran_sub_pembayaran_id_foreign` FOREIGN KEY (`sub_pembayaran_id`) REFERENCES `sub_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_pembayaran_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan_pembayaran
-- ----------------------------
INSERT INTO `penjualan_pembayaran` VALUES (1, NULL, NULL, 1, 1, 50000, 'Bima Ega Customer', 1, 0, 125000, NULL, NULL, 1);
INSERT INTO `penjualan_pembayaran` VALUES (2, NULL, NULL, 2, 5, 125000, NULL, 1, 0, 0, '032889327', 'Bima Ega Farizky', 1);
INSERT INTO `penjualan_pembayaran` VALUES (3, NULL, NULL, 1, 1, 400000, 'Zulfadli', 1, 0, 60000, NULL, NULL, 2);
INSERT INTO `penjualan_pembayaran` VALUES (4, NULL, NULL, 1, 1, 1000000, 'Customer 4', 1, 0, 600000, NULL, NULL, 3);
INSERT INTO `penjualan_pembayaran` VALUES (16, NULL, NULL, 1, 1, 300000, 'Budiyono Siregar', 1, 30000, 0, NULL, NULL, 13);
INSERT INTO `penjualan_pembayaran` VALUES (17, NULL, NULL, 1, 1, 400000, 'Customer 5', 1, 0, 145000, NULL, NULL, 14);
INSERT INTO `penjualan_pembayaran` VALUES (18, NULL, NULL, 2, 18, 100000, NULL, 1, 0, 45000, '239872398237', 'Bima Ega F', 14);

-- ----------------------------
-- Table structure for penjualan_product
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_product`;
CREATE TABLE `penjualan_product`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaksi_penjualanproduct` datetime NOT NULL,
  `customer_id` bigint NULL DEFAULT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `jumlah_penjualanproduct` double NOT NULL,
  `typediskon_penjualanproduct` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diskon_penjualanproduct` double NULL DEFAULT NULL,
  `subtotal_penjualanproduct` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penjualan_product_customer_id_foreign`(`customer_id` ASC) USING BTREE,
  INDEX `penjualan_product_barang_id_foreign`(`barang_id` ASC) USING BTREE,
  INDEX `penjualan_product_penjualan_id_foreign`(`penjualan_id` ASC) USING BTREE,
  CONSTRAINT `penjualan_product_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penjualan_product_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penjualan_product
-- ----------------------------
INSERT INTO `penjualan_product` VALUES (1, '2024-06-15 18:38:02', 1, 1, 2, 'fix', 30000, 70000, '2024-06-15 18:38:03', '2024-06-15 18:38:03', 1);
INSERT INTO `penjualan_product` VALUES (2, '2024-06-15 18:38:02', 1, 2, 3, '%', 50, 60000, '2024-06-15 18:38:03', '2024-06-15 18:38:03', 1);
INSERT INTO `penjualan_product` VALUES (3, '2024-06-15 18:38:02', 1, 3, 1, NULL, NULL, 45000, '2024-06-15 18:38:03', '2024-06-15 18:38:03', 1);
INSERT INTO `penjualan_product` VALUES (4, '2024-06-15 18:40:29', 2, 2, 7, NULL, NULL, 280000, '2024-06-15 18:40:30', '2024-06-15 18:40:30', 2);
INSERT INTO `penjualan_product` VALUES (5, '2024-06-15 18:40:29', 2, 3, 4, NULL, NULL, 180000, '2024-06-15 18:40:30', '2024-06-15 18:40:30', 2);
INSERT INTO `penjualan_product` VALUES (6, '2024-06-15 19:40:00', 4, 8, 20, NULL, NULL, 1600000, '2024-06-15 19:40:01', '2024-06-15 19:40:01', 3);
INSERT INTO `penjualan_product` VALUES (27, '2024-06-17 17:31:34', 12, 1, 2, NULL, NULL, 100000, '2024-06-17 17:31:35', '2024-06-17 17:31:35', 13);
INSERT INTO `penjualan_product` VALUES (28, '2024-06-17 17:31:34', 12, 2, 2, NULL, NULL, 80000, '2024-06-17 17:31:35', '2024-06-17 17:31:35', 13);
INSERT INTO `penjualan_product` VALUES (29, '2024-06-17 17:31:34', 12, 3, 2, NULL, NULL, 90000, '2024-06-17 17:31:35', '2024-06-17 17:31:35', 13);
INSERT INTO `penjualan_product` VALUES (30, '2024-06-17 17:33:18', 5, 2, 8, NULL, NULL, 320000, '2024-06-17 17:33:20', '2024-06-17 17:33:20', 14);
INSERT INTO `penjualan_product` VALUES (31, '2024-06-17 17:33:18', 5, 3, 5, NULL, NULL, 225000, '2024-06-17 17:33:20', '2024-06-17 17:33:20', 14);

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (1, 'Admin', '082277506232', 'Jakarta pusat - edit', 'L', 1, '2024-06-15 14:49:58', '2024-06-17 17:25:34');
INSERT INTO `profile` VALUES (2, 'Staf1', '03892387', 'alamat staf 1', 'L', 2, '2024-06-17 11:32:56', '2024-07-17 20:50:51');
INSERT INTO `profile` VALUES (5, 'Staf2', '02389237', 'alamat staf 2', 'L', 5, '2024-06-17 15:35:47', '2024-07-17 20:50:59');
INSERT INTO `profile` VALUES (6, 'Staf 3', '09328237', '-', 'L', 6, '2024-06-17 16:24:52', '2024-06-17 16:24:52');

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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'web', '2024-06-15 14:49:57', '2024-06-15 14:49:57');
INSERT INTO `roles` VALUES (2, 'Pelanggan', 'web', '2024-06-15 19:04:22', '2024-07-17 20:49:57');
INSERT INTO `roles` VALUES (3, 'Kasir', 'web', '2024-06-15 19:04:31', '2024-07-17 20:50:07');
INSERT INTO `roles` VALUES (4, 'Karyawan Gudang', 'web', '2024-06-15 19:04:38', '2024-07-17 20:50:25');

-- ----------------------------
-- Table structure for saldo_customer
-- ----------------------------
DROP TABLE IF EXISTS `saldo_customer`;
CREATE TABLE `saldo_customer`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` bigint UNSIGNED NOT NULL,
  `jumlah_saldocustomer` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `saldo_customer_customer_id_foreign`(`customer_id` ASC) USING BTREE,
  CONSTRAINT `saldo_customer_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of saldo_customer
-- ----------------------------

-- ----------------------------
-- Table structure for saldo_detail
-- ----------------------------
DROP TABLE IF EXISTS `saldo_detail`;
CREATE TABLE `saldo_detail`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `saldo_customer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totalsaldo_detail` double NOT NULL,
  `kembaliansaldo_detail` double NOT NULL DEFAULT 0,
  `hutangsaldo_detail` double NOT NULL DEFAULT 0,
  `is_with_draw` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `saldo_detail_saldo_customer_id_foreign`(`saldo_customer_id` ASC) USING BTREE,
  CONSTRAINT `saldo_detail_saldo_customer_id_foreign` FOREIGN KEY (`saldo_customer_id`) REFERENCES `saldo_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of saldo_detail
-- ----------------------------

-- ----------------------------
-- Table structure for satuan
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_satuan` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of satuan
-- ----------------------------
INSERT INTO `satuan` VALUES (1, 'Satuan 1', 1, '2024-06-15 15:23:35', '2024-06-15 15:23:35');
INSERT INTO `satuan` VALUES (2, 'Satuan 2', 1, '2024-06-15 15:23:40', '2024-06-15 15:23:40');
INSERT INTO `satuan` VALUES (3, 'Satuan 3', 1, '2024-06-15 15:23:45', '2024-06-15 15:23:45');
INSERT INTO `satuan` VALUES (4, 'Satuan 4', 1, '2024-06-15 15:24:24', '2024-06-15 15:24:24');
INSERT INTO `satuan` VALUES (12, 'Pcs', 1, '2024-06-17 17:26:14', '2024-06-17 17:26:14');

-- ----------------------------
-- Table structure for serial_barang
-- ----------------------------
DROP TABLE IF EXISTS `serial_barang`;
CREATE TABLE `serial_barang`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor_serial_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_serial_barang` enum('ready','return','cancel transaction','not sold') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `serial_barang_barang_id_foreign`(`barang_id` ASC) USING BTREE,
  CONSTRAINT `serial_barang_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of serial_barang
-- ----------------------------
INSERT INTO `serial_barang` VALUES (1, '23829', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (2, '829238', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (3, '6287', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (4, '86987', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (5, '789897', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (6, '8382937', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (7, '32689237', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (8, '36292387', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (9, '3892379', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (12, '8732698236', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (13, '328732687687', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (14, '73629', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (15, '238762386', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (16, '237897', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (17, '98697897', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (18, '9827982379', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (19, '8927', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (20, '82972947', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (21, '39287329279', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (22, '928729837', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (23, '892729', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (24, '8979427', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (25, '948279247', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (26, '849279287', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (27, '4298729', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (28, '94827927', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (29, '429872947', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (30, '948792479', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (31, '9472979', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (32, '94827924798', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (33, '329328239', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (34, '8979237', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (35, '89792387', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (36, '849278', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (37, '28972397', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (38, '982792837', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (39, '429872498', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (40, '9837923', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (41, '4229879', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (42, '4798274987', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (43, '24987897', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (44, '82972498724', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (45, '328973298', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (46, '894789247', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (47, '4892792487', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (48, '4298797', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (49, '89472', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (50, '328932732', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (51, '8239837298', 'ready', 1, NULL, NULL);
INSERT INTO `serial_barang` VALUES (52, '84297247', 'ready', 1, NULL, NULL);

-- ----------------------------
-- Table structure for sub_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `sub_pembayaran`;
CREATE TABLE `sub_pembayaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_spembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_spembayaran` tinyint(1) NOT NULL DEFAULT 1,
  `kategori_pembayaran_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sub_pembayaran_kategori_pembayaran_id_foreign`(`kategori_pembayaran_id` ASC) USING BTREE,
  CONSTRAINT `sub_pembayaran_kategori_pembayaran_id_foreign` FOREIGN KEY (`kategori_pembayaran_id`) REFERENCES `kategori_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_pembayaran
-- ----------------------------
INSERT INTO `sub_pembayaran` VALUES (1, 'Tunai', 1, 1, '2024-06-15 18:08:07', '2024-06-15 18:08:07');
INSERT INTO `sub_pembayaran` VALUES (2, 'Gopay', 1, 1, '2024-06-15 18:08:56', '2024-06-15 18:08:56');
INSERT INTO `sub_pembayaran` VALUES (3, 'Ovo', 1, 1, '2024-06-15 18:09:12', '2024-06-15 18:09:12');
INSERT INTO `sub_pembayaran` VALUES (4, 'Dana', 1, 1, '2024-06-15 18:09:22', '2024-06-15 18:09:22');
INSERT INTO `sub_pembayaran` VALUES (5, 'BRI', 1, 2, '2024-06-15 18:09:37', '2024-06-15 18:09:37');
INSERT INTO `sub_pembayaran` VALUES (6, 'BCA', 1, 2, '2024-06-15 18:09:51', '2024-06-15 18:09:51');
INSERT INTO `sub_pembayaran` VALUES (7, 'Mandiri', 1, 2, '2024-06-15 18:10:03', '2024-06-15 18:10:03');
INSERT INTO `sub_pembayaran` VALUES (8, 'BCA', 1, 4, '2024-06-15 18:10:14', '2024-06-15 18:10:14');
INSERT INTO `sub_pembayaran` VALUES (9, 'Bank Jago', 1, 4, '2024-06-15 18:10:36', '2024-06-15 18:10:36');
INSERT INTO `sub_pembayaran` VALUES (16, 'Bank Muamalat', 1, 2, '2024-06-17 15:34:36', '2024-06-17 15:34:36');
INSERT INTO `sub_pembayaran` VALUES (18, 'Bank Riau Kepri', 1, 2, '2024-06-17 17:28:30', '2024-06-17 17:28:30');

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nowa_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_supplier` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `perusahaan_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_supplier` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (1, 'Supplier 1', '02898247', 'Deskripsi supplier 1', 'PT Supplier 1', 1, '2024-06-15 15:44:24', '2024-06-15 15:44:24');
INSERT INTO `supplier` VALUES (2, 'Supplier 2', '023893279', 'Deskripsi Supplier 1', 'PT. Supplier 2', 1, '2024-06-15 15:44:41', '2024-06-15 15:44:41');
INSERT INTO `supplier` VALUES (4, 'Supplier 4', '3029832789', 'Deskripsi Supplier 4', 'PT. Supplier 4', 1, '2024-06-15 15:45:21', '2024-06-15 15:45:21');
INSERT INTO `supplier` VALUES (5, 'Supplier 5', '32098237', 'Deskripsi Supplier 5', 'PT. Supplier 5', 1, '2024-06-15 15:45:59', '2024-06-15 15:45:59');
INSERT INTO `supplier` VALUES (12, 'Pt. Budiyono Siregar', '892827', '-', 'PT. Kapal laut', 1, '2024-06-17 17:28:01', '2024-06-17 17:28:01');

-- ----------------------------
-- Table structure for transaksi_pendapatan
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pendapatan`;
CREATE TABLE `transaksi_pendapatan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_pendapatan_id` bigint UNSIGNED NOT NULL,
  `jumlah_tpendapatan` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_tpendapatan` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaksi_pendapatan_kategori_pendapatan_id_foreign`(`kategori_pendapatan_id` ASC) USING BTREE,
  CONSTRAINT `transaksi_pendapatan_kategori_pendapatan_id_foreign` FOREIGN KEY (`kategori_pendapatan_id`) REFERENCES `kategori_pendapatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_pendapatan
-- ----------------------------
INSERT INTO `transaksi_pendapatan` VALUES (1, 4, 150000000, '2024-06-15 19:34:34', '2024-06-15 19:34:34', '2024-06-15');
INSERT INTO `transaksi_pendapatan` VALUES (2, 2, 20000000, '2024-06-15 19:34:46', '2024-06-15 19:34:46', '2024-06-15');
INSERT INTO `transaksi_pendapatan` VALUES (3, 5, 20000000, '2024-06-15 19:35:41', '2024-06-15 19:35:41', '2024-06-15');
INSERT INTO `transaksi_pendapatan` VALUES (4, 4, 300000, '2024-06-17 17:37:08', '2024-06-17 17:37:08', '2024-06-17');

-- ----------------------------
-- Table structure for transaksi_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pengeluaran`;
CREATE TABLE `transaksi_pengeluaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_pengeluaran_id` bigint UNSIGNED NOT NULL,
  `jumlah_tpengeluaran` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_tpengeluaran` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaksi_pengeluaran_kategori_pengeluaran_id_foreign`(`kategori_pengeluaran_id` ASC) USING BTREE,
  CONSTRAINT `transaksi_pengeluaran_kategori_pengeluaran_id_foreign` FOREIGN KEY (`kategori_pengeluaran_id`) REFERENCES `kategori_pengeluaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_pengeluaran
-- ----------------------------
INSERT INTO `transaksi_pengeluaran` VALUES (1, 1, 100000, '2024-06-17 17:37:28', '2024-06-17 17:37:28', '2024-06-17');

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$yvQVhyJKTJ67cEuZ0Lk28ORfHgtejSEOF2tqjsX9yxhUxZFPlwTem', NULL, '2024-06-15 14:49:58', '2024-06-17 14:46:00', 1, 1);
INSERT INTO `users` VALUES (2, 'Staf1', 'staf1@gmail.com', 'staf1', NULL, '$2y$10$MDC9EHIBnMNO8aBW4cvftOQS8/9EP74TQvdO3RJt.PXmUtQzenyfS', NULL, '2024-06-17 11:32:56', '2024-07-17 20:50:51', 2, 1);
INSERT INTO `users` VALUES (5, 'Staf2', 'staf2@gmail.com', 'staf2', NULL, '$2y$10$S1bQJrkDbP3ksYVi/1.7KeZJE3afqLhEiVQipiFkvGyG7VBui2oIe', NULL, '2024-06-17 15:35:47', '2024-07-17 20:50:59', 3, 1);
INSERT INTO `users` VALUES (6, 'Staf 3', 'staf3@gmail.com', 'staf3', NULL, '$2y$10$AHYC.9idpNumqflH9649NORAveZaUN7wOs.CbRx0PhW8wO/UuLEK2', NULL, '2024-06-17 16:24:52', '2024-06-17 16:24:52', 4, 1);

SET FOREIGN_KEY_CHECKS = 1;
