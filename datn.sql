-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2024 lúc 01:03 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `academics`
--

CREATE TABLE `academics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `academics`
--

INSERT INTO `academics` (`id`, `academic_name`, `created_at`, `updated_at`) VALUES
(1, 'Giáo sư', NULL, NULL),
(2, ' Phó Giáo sư', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `arsearches`
--

CREATE TABLE `arsearches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `arsearch_id` varchar(255) NOT NULL,
  `arsearch_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `arsearches`
--

INSERT INTO `arsearches` (`id`, `arsearch_id`, `arsearch_name`, `created_at`, `updated_at`) VALUES
(1, 'LVNCTL', 'Nghiên cứu tâm lý con người', '2024-05-09 09:25:28', '2024-05-09 09:25:28'),
(2, 'LVNCKH', 'Nghiên cứu khoa học', '2024-05-09 09:25:50', '2024-05-09 09:25:50'),
(3, 'LVNCDSXH', 'Đời sống xã hội', '2024-05-09 09:26:23', '2024-05-09 09:26:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artopics`
--

CREATE TABLE `artopics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artopic_id` varchar(255) NOT NULL,
  `artopic_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `artopics`
--

INSERT INTO `artopics` (`id`, `artopic_id`, `artopic_name`, `created_at`, `updated_at`) VALUES
(1, 'LV2', 'Đề tài 2', '2024-05-09 08:56:40', '2024-05-09 08:56:40'),
(2, 'LV1', 'Đề tài 1', '2024-05-09 08:56:55', '2024-05-20 21:48:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `conferences`
--

CREATE TABLE `conferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conference_name` varchar(255) NOT NULL,
  `seminar_id` bigint(20) UNSIGNED NOT NULL,
  `office` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `money` varchar(255) DEFAULT NULL,
  `status_name` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `conferences`
--

INSERT INTO `conferences` (`id`, `conference_name`, `seminar_id`, `office`, `unit`, `money`, `status_name`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Tọa đàm khoa học Viện Hồ Chí Minh và các lãnh tụ của Đảng nhân dịp kỷ niệm 129 năm Ngày sinh Chủ Tịch Hồ Chí Minh(19/5/1890-19/5/2019)', 2, NULL, NULL, NULL, NULL, '2024-05-17', NULL, '2024-05-17 09:56:47'),
(2, 'Hội thảo khoa học Kỷ niệm ngày sinh Chủ tịch Hồ Chí Minh(19/5/1890-19/5/2019)', 2, NULL, NULL, NULL, NULL, '2024-05-05', '2024-05-17 09:58:44', '2024-05-18 02:38:02'),
(3, 'Hội thảo khoa học Học viện chính trị khu vực I', 2, NULL, NULL, NULL, NULL, '2024-05-20', '2024-05-18 09:06:00', '2024-05-18 09:06:00'),
(4, 'Kỷ yếu hội thảo khoa học', 2, NULL, NULL, NULL, NULL, '2024-06-05', '2024-05-18 09:06:19', '2024-05-26 02:36:12'),
(5, 'Hội thảo khoa học Học viện Chính trị khu vực I, Kỷ niệm 128 năm ngày sinh Chủ tịch Hồ Chí Minh', 2, NULL, NULL, NULL, NULL, '2024-05-17', '2024-05-18 09:07:53', '2024-05-21 01:44:41'),
(6, 'Tọa đàm khoa học Viện Hồ Chí Minh và các lãnh tụ củaĐảng nhân dịp kỷ niệm 129 năm Ngày sinh Chủ Tịch Hồ Chí Minh(19/5/1890-19/5/2019)', 2, NULL, NULL, NULL, NULL, '2024-05-13', '2024-05-18 09:08:12', '2024-05-18 09:08:12'),
(7, 'Hội thảo khoa học Kỷ niệm ngày sinh Chủ tịch Hồ Chí Minh(19/5/1890-19/5/2019)', 2, NULL, NULL, NULL, NULL, '2024-05-16', '2024-05-26 02:39:14', '2024-05-26 02:39:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `councils`
--

CREATE TABLE `councils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `only_position` enum('Có','Không') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `councils`
--

INSERT INTO `councils` (`id`, `position_name`, `only_position`, `created_at`, `updated_at`) VALUES
(1, 'Thư Ký', 'Không', '2024-05-06 22:01:41', '2024-05-06 22:01:41'),
(3, 'Chủ tịch hội đồng', 'Có', '2024-05-06 22:18:31', '2024-05-06 22:32:21'),
(4, 'Uỷ viên hội đồng', 'Không', '2024-05-06 22:19:08', '2024-05-06 22:19:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `degrees`
--

INSERT INTO `degrees` (`id`, `degree_name`, `created_at`, `updated_at`) VALUES
(1, 'Tiến sĩ', NULL, NULL),
(2, 'Thạc sĩ', NULL, NULL),
(3, 'Đại học', NULL, NULL),
(4, 'Trung cấp', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lvcouncils`
--

CREATE TABLE `lvcouncils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lvcouncils_id` varchar(255) NOT NULL,
  `lvcouncils_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lvcouncils`
--

INSERT INTO `lvcouncils` (`id`, `lvcouncils_id`, `lvcouncils_name`, `created_at`, `updated_at`) VALUES
(1, 'CK', 'Cấp khoa', '2024-05-09 03:05:12', '2024-05-09 03:05:12'),
(2, 'CHĐ3', 'Cấp nhà nước', '2024-05-09 03:05:28', '2024-05-09 03:05:28'),
(4, 'HV', 'Cấp học viện', '2024-05-09 03:06:02', '2024-05-09 03:06:02'),
(5, 'CHĐ2', 'Cấp bộ', '2024-05-09 03:06:18', '2024-05-09 03:06:18'),
(6, 'CHĐ1', 'Cấp cơ sở', '2024-05-09 03:06:32', '2024-05-09 03:06:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lvtopics`
--

CREATE TABLE `lvtopics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lvtopic_name` varchar(255) NOT NULL,
  `category` enum('Đề tài','Đề án') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lvtopics`
--

INSERT INTO `lvtopics` (`id`, `lvtopic_name`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Đề tài cấp bộ', 'Đề tài', '2024-05-07 09:23:27', '2024-05-07 09:23:27'),
(2, 'Đề tài cấp tỉnh thành phố', 'Đề tài', '2024-05-07 09:31:01', '2024-05-16 08:55:58'),
(3, 'Đề tài cấp cơ sở phân cấp', 'Đề tài', '2024-05-07 09:31:20', '2024-05-07 09:31:20'),
(4, 'Đề tài cấp cơ sở tự chủ', 'Đề tài', '2024-05-07 09:32:01', '2024-05-07 09:32:01'),
(5, 'Đề án cấp cơ sở', 'Đề án', '2024-05-07 09:32:35', '2024-05-07 09:32:35'),
(7, 'Đề tài cấp nhà nước', 'Đề tài', '2024-05-26 02:42:23', '2024-05-26 02:42:23'),
(8, 'Đề tài cấp quỹ Nafosted', 'Đề tài', '2024-05-26 02:42:47', '2024-05-26 02:42:47'),
(9, 'Đề tài liên kết địa phương cấp huyện', 'Đề tài', '2024-05-26 02:43:17', '2024-05-26 02:43:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magazines`
--

CREATE TABLE `magazines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `magazine_name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `journal` varchar(255) NOT NULL,
  `paper_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `magazines`
--

INSERT INTO `magazines` (`id`, `magazine_name`, `year`, `journal`, `paper_id`, `created_at`, `updated_at`) VALUES
(1, 'Phát triển thương mại điện tử ở Việt Nam', 2024, 'Tạp chí Nghiên cứu Tài chính kế toán số 08', 7, NULL, '2024-05-26 02:24:00'),
(3, 'Green economy in renovating the growth model in Vietnam nowadays', 2024, '1st Internation conference on Contemporary issues in Econnomics Management and Business', 8, '2024-05-18 09:11:29', '2024-05-18 09:11:29'),
(4, 'Định hướng của Đảng và Nhà nước về thực hiện thúc đẩy chuyển đổi số quốc gia', 2024, 'Tạp chí Nghiên cứu Tài chính-Kế toán', 7, '2024-05-18 09:13:17', '2024-05-18 09:13:17'),
(5, 'Những bằng chứng thép phản bác những luận điệu xuyên tạc về vấn đề tôn giáo ở VN', 2024, 'Xây dựng Đảng', 7, '2024-05-18 09:14:11', '2024-05-18 09:14:11'),
(6, 'Những bằng chứng thép phản bác những luận điệu xuyên tạc về vấn đề tôn giáo ở VN', 2024, 'Xây dựng Đảng', 9, '2024-05-18 09:14:42', '2024-05-26 02:23:41'),
(7, 'Phát triển thương mại điện tử ở Việt Nam', 2014, 'Xây dựng Đảng', 1, '2024-05-18 09:15:50', '2024-05-18 09:15:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_000000_create_users_table', 2),
(10, '2024_05_07_043047_create_councils_table', 3),
(11, '2024_05_07_154217_create_lvtopics_table', 4),
(12, '2024_05_08_130936_create_papers_table', 5),
(13, '2024_05_08_135036_create_seminars_table', 6),
(14, '2024_05_08_160844_create_proposes_table', 7),
(16, '2024_05_08_171009_create_money_table', 8),
(17, '2024_05_08_171646_create_products_table', 9),
(19, '2024_05_08_174019_create_trainings_table', 11),
(23, '2024_05_09_100151_create_lvcouncils_table', 12),
(24, '2024_05_09_153833_create_artopics_table', 13),
(27, '2024_05_09_162405_create_arsearches_table', 14),
(29, '2024_05_10_140055_create_offices_table', 15),
(30, '2024_05_10_153940_create_suggestions_table', 16),
(31, '2024_05_10_163408_create_tpcouncils_table', 17),
(32, '2024_05_11_133627_create_scores_table', 18),
(36, '2024_05_17_095410_create_conferences_table', 20),
(37, '2024_05_18_132432_create_magazines_table', 21),
(38, '2024_05_20_034349_create_academics_table', 22),
(39, '2024_05_20_034609_create_degrees_table', 23),
(40, '2024_05_20_035522_create_scientists_table', 24),
(41, '2024_05_20_154636_create_scouncils_table', 25),
(42, '2024_05_21_085720_create_profiles_table', 26),
(43, '2024_05_22_171832_create_profiles_table', 27),
(44, '2024_05_23_155541_create_offers_table', 28),
(45, '2024_05_26_035843_create_topics_table', 29),
(46, '2024_05_26_040552_create_topics_table', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `money`
--

CREATE TABLE `money` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `money_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `money`
--

INSERT INTO `money` (`id`, `money_name`, `created_at`, `updated_at`) VALUES
(1, 'Nguồn kinh phí từ quỹ Nafosted', '2024-05-08 10:14:38', '2024-05-08 10:14:38'),
(2, 'Nguồn kinh phí tự chủ của học viện', '2024-05-08 10:15:33', '2024-05-08 10:15:33'),
(4, 'Nguồn kinh phí phân cấp', '2024-05-13 20:01:15', '2024-05-13 20:01:15'),
(5, 'Nguồn kinh phí từ nguồn ngoài Học Viện', '2024-05-13 20:01:51', '2024-05-13 20:01:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposer` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `propose_id` bigint(20) UNSIGNED NOT NULL,
  `suggestion_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `offers`
--

INSERT INTO `offers` (`id`, `proposer`, `year`, `offer_name`, `propose_id`, `suggestion_id`, `note`, `created_at`, `updated_at`) VALUES
(2, 'Hoàng Văn Hoan', 2024, 'Vận dụng kinh nghiệm lãnh đạo phát  triển kinh tế tư nhân của Đảng thời kỳ 1986-2020 vào việc đưa kinh tế tư nhân trở thành động lực quan trọng của nền kinh tế giai đoạn hiện nay', 4, 3, NULL, '2024-05-23 10:15:24', '2024-05-23 20:23:05'),
(3, 'Hoàng Văn Hoan', 2024, 'Phân tích các nhân tố ảnh hưởng đến hiệu quả kinh doanh của các ngân hàng thương mại cổ phần Việt Nam', 4, 3, NULL, '2024-05-23 19:47:07', '2024-05-23 20:24:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_id` varchar(255) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `office_parent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `offices`
--

INSERT INTO `offices` (`id`, `office_id`, `office_name`, `address`, `phone`, `email`, `office_parent`, `created_at`, `updated_at`) VALUES
(2, 'HVCTQG HCM', 'Học viện Chính trị quốc gia Hồ Chí Minh', NULL, NULL, NULL, NULL, '2024-05-10 07:03:48', '2024-05-10 07:03:48'),
(3, 'HVCTKV I', 'Học viện Chính trị khu vực I', NULL, NULL, NULL, NULL, '2024-05-10 07:04:39', '2024-05-10 07:04:39'),
(4, 'TCGDLL', 'TẠP CHÍ GIÁO DỤC LÝ LUẬN', NULL, NULL, NULL, NULL, '2024-05-19 07:17:03', '2024-05-19 07:17:03'),
(5, 'BQLDT', 'BAN QUẢN LÝ ĐÀO TẠO', NULL, NULL, NULL, NULL, '2024-05-19 07:17:31', '2024-05-19 07:17:31'),
(6, 'KCTHVQHQT', 'KHOA CHÍNH TRỊ HỌC VÀ QUAN HỆ QUỐC TẾ', NULL, NULL, NULL, NULL, '2024-05-19 07:18:13', '2024-05-19 07:18:13'),
(7, 'VP', 'VĂN PHÒNG', NULL, NULL, NULL, NULL, '2024-05-19 07:18:33', '2024-05-19 07:18:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `papers`
--

CREATE TABLE `papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paper_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `papers`
--

INSERT INTO `papers` (`id`, `paper_name`, `created_at`, `updated_at`) VALUES
(1, 'Tạp chí chuyên ngành', '2024-05-08 06:32:14', '2024-05-08 06:32:14'),
(2, 'Tạp chí quốc tế', '2024-05-08 06:32:44', '2024-05-08 06:32:44'),
(3, 'Tạp chí kinh tế', '2024-05-08 06:32:55', '2024-05-08 06:32:55'),
(4, 'Tạp chí chuyên ngành không tính điểm', '2024-05-08 06:33:17', '2024-05-08 06:33:27'),
(7, 'Tạp chí chuyên ngành 1 điểm', '2024-05-18 02:42:34', '2024-05-18 02:42:34'),
(8, 'Khác', '2024-05-18 02:42:40', '2024-05-18 02:42:40'),
(9, 'Tạp chí chuyên ngành 0.25-0.5 điểm', '2024-05-23 08:44:10', '2024-05-23 08:44:10'),
(10, 'Tạp chí chuyên ngành 0.75 điểm', '2024-05-23 08:44:30', '2024-05-23 08:44:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `created_at`, `updated_at`) VALUES
(1, 'Không đạt', '2024-05-08 10:38:29', '2024-05-08 10:38:29'),
(2, 'Tốt', '2024-05-08 10:38:36', '2024-05-08 10:38:36'),
(3, 'Đạt', '2024-05-08 10:38:42', '2024-05-08 10:38:42'),
(4, 'Sản phẩm 2', '2024-05-08 10:38:50', '2024-05-08 10:38:50'),
(5, 'Sản phẩm 3', '2024-05-08 10:38:57', '2024-05-08 10:38:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` varchar(255) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('Nam','Nữ') NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `office_phone` int(11) DEFAULT NULL,
  `house_phone` int(11) DEFAULT NULL,
  `telephone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `degree_id` bigint(20) UNSIGNED NOT NULL,
  `investiture` varchar(255) DEFAULT NULL,
  `scientific_title` varchar(255) DEFAULT NULL,
  `research_major` varchar(255) DEFAULT NULL,
  `research_title` varchar(255) DEFAULT NULL,
  `research_position` varchar(255) DEFAULT NULL,
  `office_id` bigint(20) UNSIGNED NOT NULL,
  `address_office` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `profiles`
--

INSERT INTO `profiles` (`id`, `profile_id`, `profile_name`, `birthday`, `gender`, `birth_place`, `address`, `office_phone`, `house_phone`, `telephone`, `email`, `degree_id`, `investiture`, `scientific_title`, `research_major`, `research_title`, `research_position`, `office_id`, `address_office`, `created_at`, `updated_at`) VALUES
(1, '12.2003.007', 'Biện Thị Hoàng Ngọc', '1977-03-04', 'Nữ', 'Nghệ An', NULL, NULL, NULL, '02147483647', 'bthn@gmail.com', 2, NULL, NULL, 'Lịch Sử Việt Nam', NULL, NULL, 2, '15 Khuất Duy Tiến', NULL, NULL),
(3, '112.345', 'Hoàng Văn Quân', '2024-05-08', 'Nam', 'Hà Nội', NULL, NULL, NULL, '0913445621', 'hvquan@gmail.com', 2, NULL, NULL, 'Lịch sử việt nam', NULL, NULL, 3, '23-Huỳnh Thúc Kháng-Hà Nội', '2024-05-22 02:12:00', '2024-05-23 02:39:47'),
(4, '12.4446.234', 'Bùi Lê Dũng', '2000-07-03', 'Nam', 'Thái Bình', NULL, NULL, NULL, '0912668540', 'bldung@gmail.com', 3, NULL, NULL, NULL, NULL, NULL, 5, 'Đại học Thủy Lợi', '2024-05-23 02:47:12', '2024-05-23 02:47:12'),
(5, '112.234.222', 'Bùi Quốc Tuấn', '1992-12-06', 'Nam', 'Hưng Yên', NULL, NULL, NULL, '0966981226', 'bqtuan@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, 6, 'Hà Nội', '2024-05-23 02:49:05', '2024-05-23 02:49:05'),
(6, '12.2223.001', 'Cao Phan Giang', '1982-02-04', 'Nam', 'Hà Giang', NULL, NULL, NULL, '0913664278', 'cpgiang@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, 6, 'Cầu giấy', '2024-05-23 02:51:32', '2024-05-23 02:51:32'),
(7, '12.2225.002', 'Cao Thị Thu Hằng', '1992-12-05', 'Nữ', 'Nam Định', NULL, NULL, NULL, '0981223517', 'ctthang@gmail.com', 3, NULL, NULL, NULL, NULL, NULL, 7, 'Đống Đa', '2024-05-23 02:53:16', '2024-05-23 02:53:16'),
(8, '11234', 'Vũ Thị Hồng Trang', '1992-05-08', 'Nữ', 'Nam Định', NULL, NULL, NULL, '0912668340', 'vthtrang@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, 3, 'Cầu giấy', '2024-05-25 20:20:28', '2024-05-25 20:20:28'),
(9, '123.556', 'Nguyễn Thị Huệ', '1983-05-11', 'Nữ', 'Bắc Giang', NULL, NULL, NULL, '0912783450', 'nthue@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, 3, 'Hà Nội', '2024-05-25 20:23:13', '2024-05-25 20:23:13'),
(10, '123.890', 'Nguyễn Đình Quỳnh', '1991-12-05', 'Nam', 'Hà Nội', NULL, NULL, NULL, '0966712563', 'ndquynh@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, 3, 'Hà Nội', '2024-05-25 20:24:41', '2024-05-25 20:24:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `proposes`
--

CREATE TABLE `proposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `propose_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `proposes`
--

INSERT INTO `proposes` (`id`, `propose_name`, `created_at`, `updated_at`) VALUES
(1, 'Hội thảo liên kết', '2024-05-08 09:20:05', '2024-05-08 09:20:05'),
(2, 'Hội thảo cấp cơ sở', '2024-05-08 09:20:45', '2024-05-08 09:20:45'),
(3, 'Hội thảo cấp tỉnh', '2024-05-08 09:20:57', '2024-05-08 09:20:57'),
(4, 'Đề tài cấp cơ sở phân cấp', '2024-05-08 09:21:13', '2024-05-08 09:21:13'),
(6, 'Hội thảo cấp Bộ', '2024-05-13 20:11:29', '2024-05-13 20:11:29'),
(7, 'Đề tài cấp cơ sở tự chủ', '2024-05-13 20:12:15', '2024-05-13 20:12:15'),
(8, 'Hội thảo cấp quốc gia', '2024-05-13 20:12:49', '2024-05-13 20:12:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scientists`
--

CREATE TABLE `scientists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conference_name` varchar(255) NOT NULL,
  `seminar_id` bigint(20) UNSIGNED NOT NULL,
  `office` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `money` varchar(255) DEFAULT NULL,
  `status_name` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `decision_num` varchar(255) NOT NULL,
  `tbscore_name` varchar(255) NOT NULL,
  `mark` int(11) NOT NULL,
  `council` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `scores`
--

INSERT INTO `scores` (`id`, `year`, `decision_num`, `tbscore_name`, `mark`, `council`, `created_at`, `updated_at`) VALUES
(1, 2016, 'QĐ/01', 'Bảng nghiệm thu đề tài', 100, 'Hội đồng đánh giá, nghiệm thu đề tài', '2024-05-11 07:06:56', '2024-05-11 07:06:56'),
(2, 2021, 'TEST01', 'Bảng điểm A', 100, 'Hội đồng thẩm định trước nghiệm thu', '2024-05-11 07:07:51', '2024-05-11 07:07:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scouncils`
--

CREATE TABLE `scouncils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `decision_number` int(11) NOT NULL,
  `date` date NOT NULL,
  `lvcouncil_id` bigint(20) UNSIGNED NOT NULL,
  `tpcouncil_id` bigint(20) UNSIGNED NOT NULL,
  `scouncil_name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `scouncils`
--

INSERT INTO `scouncils` (`id`, `decision_number`, `date`, `lvcouncil_id`, `tpcouncil_id`, `scouncil_name`, `year`, `created_at`, `updated_at`) VALUES
(1, 1001012, '2024-05-15', 6, 5, 'Hội đồng đánh giá nghiệm thu đề tài', 2024, NULL, '2024-05-21 01:38:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seminars`
--

CREATE TABLE `seminars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seminar_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `seminars`
--

INSERT INTO `seminars` (`id`, `seminar_name`, `created_at`, `updated_at`) VALUES
(1, 'Cấp Bộ', '2024-05-08 07:05:02', '2024-05-08 07:05:02'),
(2, 'Cấp Học Viện (cơ sở)', '2024-05-08 07:05:21', '2024-05-08 07:05:41'),
(3, 'Cấp Quốc Tế', '2024-05-08 07:05:58', '2024-05-08 07:05:58'),
(4, 'Cấp Quốc Gia', '2024-05-08 07:06:08', '2024-05-08 07:06:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suggestion_id` varchar(255) NOT NULL,
  `suggestion_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suggestions`
--

INSERT INTO `suggestions` (`id`, `suggestion_id`, `suggestion_name`, `created_at`, `updated_at`) VALUES
(1, 'NT', 'Đã được thông qua Hội đồng khoa học cấp Học viện', '2024-05-10 08:53:08', '2024-05-10 08:53:08'),
(2, '02', 'Đã được thông qua Hội đồng cấp Khoa', '2024-05-10 08:53:32', '2024-05-10 08:53:32'),
(3, '01', 'Đề xuất mới', '2024-05-10 08:54:26', '2024-05-10 08:54:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `result` enum('Khá','Giỏi','Xuất sắc') NOT NULL,
  `lvtopic_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `profile_id`, `result`, `lvtopic_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Phát huy dân chủ trong hoạt động của bộ máy nhà nước cấp Trung ương ở Việt Nam hiện nay', 8, 'Khá', 1, '2024-01-10', '2024-10-21', NULL, '2024-05-26 02:17:38'),
(2, 'Cấu trúc an ninh khu vực Châu á- Thái Bình Dương hiện nay và những tác động đến Việt Nam', 9, 'Xuất sắc', 3, '2024-01-20', '2024-10-26', '2024-05-25 21:49:43', '2024-05-26 02:17:59'),
(3, 'Quá trình đổi mới tư duy đối ngoại của Đảng , Nhà nước Việt Nam trong quan hệ hợp tác với các quốc gia láng giềng giai đoạn hiện nay', 7, 'Khá', 3, '2024-01-26', '2024-11-26', '2024-05-26 02:18:37', '2024-05-26 02:18:37'),
(4, 'Giải pháp nâng cao hiệu quả công tác xây dựng cấp xã đạt chuẩn tiếp cận pháp luật tại tỉnh Nam Định', 10, 'Xuất sắc', 2, '2024-01-22', '2024-11-20', '2024-05-26 02:19:18', '2024-05-26 02:19:18'),
(5, 'Nghiên cứu thực trạng, đề xuất giải pháp nâng cao chất lượng công tác tham mưu, tổng hợp phục vụ cấp ủy của Văn phòng Tỉnh ủy Hòa Bình giai đoạn 2021-2025', 3, 'Giỏi', 3, '2023-01-12', '2023-10-10', '2024-05-26 02:20:11', '2024-05-26 02:20:11'),
(6, 'Giải pháp nâng cao hiệu quả công tác xây dựng cấp xã đạt chuẩn tiếp cận pháp luật tại tỉnh Nam Định', 5, 'Giỏi', 3, '2024-01-26', '2024-11-06', '2024-05-26 02:20:40', '2024-05-26 02:20:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tpcouncils`
--

CREATE TABLE `tpcouncils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tpcouncil_id` varchar(255) NOT NULL,
  `tpcouncil_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tpcouncils`
--

INSERT INTO `tpcouncils` (`id`, `tpcouncil_id`, `tpcouncil_name`, `created_at`, `updated_at`) VALUES
(1, 'HĐ4', 'Hội đồng nghiệm thu đề tài cấp Bộ', '2024-05-10 10:00:14', '2024-05-10 10:00:14'),
(2, 'HĐ3', 'Hội đồng thẩm định sau nghiệm thu', '2024-05-10 10:00:37', '2024-05-10 10:00:37'),
(4, 'HĐKH', 'Hội đồng KHOA HỌC HỌC VIỆN NĂM 20121', '2024-05-19 02:42:42', '2024-05-19 02:42:42'),
(5, 'HĐ2', 'Hội đồng đánh giá, nghiệm thu đề tài', '2024-05-19 02:43:44', '2024-05-19 02:43:44'),
(6, 'HĐ1', 'Hội đồng thẩm định trước nghiệm thu', '2024-05-19 02:44:08', '2024-05-19 02:44:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `training_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trainings`
--

INSERT INTO `trainings` (`id`, `training_name`, `created_at`, `updated_at`) VALUES
(1, 'Cao đẳng', '2024-05-08 10:43:40', '2024-05-08 10:43:40'),
(2, 'Đại học', '2024-05-08 10:43:51', '2024-05-08 10:43:51'),
(3, 'Cao học', '2024-05-08 10:43:57', '2024-05-08 10:43:57'),
(5, 'Cao cấp lý luận chính trị', '2024-05-13 19:58:42', '2024-05-13 19:58:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Phong Dao Tao', 'pdt@gmail.com', '$2y$12$ElFD8Eq8bOZ8bsym04rY1e6znHP874r/FSPw/ZfMy1CB85O/Yc60q', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `arsearches`
--
ALTER TABLE `arsearches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `artopics`
--
ALTER TABLE `artopics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conferences_seminar_id_foreign` (`seminar_id`);

--
-- Chỉ mục cho bảng `councils`
--
ALTER TABLE `councils`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `lvcouncils`
--
ALTER TABLE `lvcouncils`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lvtopics`
--
ALTER TABLE `lvtopics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `magazines`
--
ALTER TABLE `magazines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magazines_paper_id_foreign` (`paper_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_propose_id_foreign` (`propose_id`),
  ADD KEY `offers_suggestion_id_foreign` (`suggestion_id`);

--
-- Chỉ mục cho bảng `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_degree_id_foreign` (`degree_id`),
  ADD KEY `profiles_office_id_foreign` (`office_id`);

--
-- Chỉ mục cho bảng `proposes`
--
ALTER TABLE `proposes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `scientists`
--
ALTER TABLE `scientists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scientists_seminar_id_foreign` (`seminar_id`);

--
-- Chỉ mục cho bảng `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `scouncils`
--
ALTER TABLE `scouncils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scouncils_lvcouncil_id_foreign` (`lvcouncil_id`),
  ADD KEY `scouncils_tpcouncil_id_foreign` (`tpcouncil_id`);

--
-- Chỉ mục cho bảng `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_profile_id_foreign` (`profile_id`),
  ADD KEY `topics_lvtopic_id_foreign` (`lvtopic_id`);

--
-- Chỉ mục cho bảng `tpcouncils`
--
ALTER TABLE `tpcouncils`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `academics`
--
ALTER TABLE `academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `arsearches`
--
ALTER TABLE `arsearches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `artopics`
--
ALTER TABLE `artopics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `councils`
--
ALTER TABLE `councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lvcouncils`
--
ALTER TABLE `lvcouncils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lvtopics`
--
ALTER TABLE `lvtopics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `magazines`
--
ALTER TABLE `magazines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `money`
--
ALTER TABLE `money`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `papers`
--
ALTER TABLE `papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `proposes`
--
ALTER TABLE `proposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `scientists`
--
ALTER TABLE `scientists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `scouncils`
--
ALTER TABLE `scouncils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `seminars`
--
ALTER TABLE `seminars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tpcouncils`
--
ALTER TABLE `tpcouncils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `conferences`
--
ALTER TABLE `conferences`
  ADD CONSTRAINT `conferences_seminar_id_foreign` FOREIGN KEY (`seminar_id`) REFERENCES `seminars` (`id`);

--
-- Các ràng buộc cho bảng `magazines`
--
ALTER TABLE `magazines`
  ADD CONSTRAINT `magazines_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`);

--
-- Các ràng buộc cho bảng `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_propose_id_foreign` FOREIGN KEY (`propose_id`) REFERENCES `proposes` (`id`),
  ADD CONSTRAINT `offers_suggestion_id_foreign` FOREIGN KEY (`suggestion_id`) REFERENCES `suggestions` (`id`);

--
-- Các ràng buộc cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`),
  ADD CONSTRAINT `profiles_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`);

--
-- Các ràng buộc cho bảng `scientists`
--
ALTER TABLE `scientists`
  ADD CONSTRAINT `scientists_seminar_id_foreign` FOREIGN KEY (`seminar_id`) REFERENCES `seminars` (`id`);

--
-- Các ràng buộc cho bảng `scouncils`
--
ALTER TABLE `scouncils`
  ADD CONSTRAINT `scouncils_lvcouncil_id_foreign` FOREIGN KEY (`lvcouncil_id`) REFERENCES `lvcouncils` (`id`),
  ADD CONSTRAINT `scouncils_tpcouncil_id_foreign` FOREIGN KEY (`tpcouncil_id`) REFERENCES `tpcouncils` (`id`);

--
-- Các ràng buộc cho bảng `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_lvtopic_id_foreign` FOREIGN KEY (`lvtopic_id`) REFERENCES `lvtopics` (`id`),
  ADD CONSTRAINT `topics_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
