-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 30, 2024 lúc 03:17 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

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
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `book_name`, `created_at`, `updated_at`) VALUES
(1, 'Giáo trình', NULL, NULL),
(2, 'Sách tham khảo', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `training_id` bigint(20) UNSIGNED NOT NULL,
  `research_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `type`, `role_id`, `training_id`, `research_number`, `created_at`, `updated_at`) VALUES
(1, 'Giáo trình', NULL, 2, 2, 75, NULL, NULL),
(2, 'Giáo trình', NULL, 5, 5, 25, '2024-05-31 08:38:08', '2024-05-31 09:00:06'),
(3, 'Sách tham khảo', NULL, 1, 5, 200, '2024-05-31 08:59:35', '2024-05-31 08:59:35'),
(4, 'Giáo trình', NULL, 3, 5, 150, '2024-05-31 08:59:56', '2024-05-31 08:59:56'),
(5, 'Giáo trình', NULL, 2, 3, 25, '2024-05-31 09:00:30', '2024-05-31 09:08:22'),
(6, 'Giáo trình', NULL, 3, 3, 75, '2024-05-31 09:00:51', '2024-05-31 09:00:51'),
(7, 'Bài báo', 'Tạp chí chuyên ngành không tính điểm', 5, 5, 20, '2024-05-31 09:06:00', '2024-05-31 09:10:05'),
(8, 'Giáo trình', NULL, 2, 5, 25, '2024-05-31 09:08:36', '2024-05-31 09:10:44'),
(9, 'Giáo trình', NULL, 3, 5, 60, '2024-05-31 09:11:01', '2024-05-31 09:11:01'),
(10, 'Giáo trình', NULL, 1, 2, 100, '2024-05-31 09:11:31', '2024-05-31 09:11:31'),
(11, 'Giáo trình', NULL, 2, 5, 75, '2024-05-31 09:11:49', '2024-05-31 09:13:09');

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
(2, 'Hội thảo khoa học Kỷ niệm ngày sinh Chủ tịch Hồ Chí Minh(19/5/1890-19/5/2019)', 2, NULL, NULL, NULL, NULL, '2024-05-05', '2024-05-17 09:58:44', '2024-05-28 04:21:27'),
(3, 'Hội thảo khoa học Học viện chính trị khu vực I', 2, NULL, NULL, NULL, NULL, '2024-05-20', '2024-05-18 09:06:00', '2024-05-18 09:06:00'),
(4, 'Kỷ yếu hội thảo khoa học1', 2, NULL, NULL, NULL, NULL, '2024-06-05', '2024-05-18 09:06:19', '2024-06-26 04:02:09'),
(5, 'Hội thảo khoa học Học viện Chính trị khu vực I, Kỷ niệm 128 năm ngày sinh Chủ tịch Hồ Chí Minh', 2, NULL, NULL, NULL, NULL, '2024-05-17', '2024-05-18 09:07:53', '2024-05-21 01:44:41'),
(6, 'Tọa đàm khoa học Viện Hồ Chí Minh và các lãnh tụ củaĐảng nhân dịp kỷ niệm 129 năm Ngày sinh Chủ Tịch Hồ Chí Minh(19/5/1890-19/5/2019)', 2, NULL, NULL, NULL, NULL, '2024-05-13', '2024-05-18 09:08:12', '2024-05-18 09:08:12'),
(7, 'Hội thảo khoa học Kỷ niệm ngày sinh Chủ tịch Hồ Chí Minh(19/5/1890-19/5/2019)', 2, NULL, NULL, NULL, NULL, '2024-05-16', '2024-05-26 02:39:14', '2024-05-26 02:39:14'),
(8, 'Hội thảo khởi động Xây dựng hệ thống mô phỏng lũ, ngập lụt vùng Đồng bằng sông Cửu Long', 2, NULL, NULL, NULL, NULL, '2023-11-24', '2024-06-09 03:21:07', '2024-06-09 03:21:49');

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
-- Cấu trúc bảng cho bảng `curriculums`
--

CREATE TABLE `curriculums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `training_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `curriculums`
--

INSERT INTO `curriculums` (`id`, `name`, `year`, `publisher`, `book_id`, `training_id`, `created_at`, `updated_at`, `file`) VALUES
(1, 'Xây dựng mô hình nông thôn mới vùng đồng bằng dân tộc thiểu số ở Tây Bắc nước ta hiện nay', 2024, 'Chính trị quốc gia', 1, 2, NULL, NULL, NULL),
(5, 'Hợp tác Công - Tư ở Việt Nam trong điều kiện kinh tế thị trường và hội nhập Quốc tế', 2016, 'Chính trị quốc gia', 2, 2, '2024-06-13 20:37:18', '2024-06-13 20:37:18', NULL),
(9, 'Thực trạng và giải pháp đầu tư công, dịch vụ công trong nông nghiệp ở Việt Nam', 2024, 'Khoa học kỹ thuật', 2, 2, '2024-06-14 18:37:16', '2024-06-14 18:37:16', NULL),
(10, 'Lý thuyết và kinh nghiệm quốc tế về cơ chế chính sách tài chính nhằm huy động, quản lý  và sử dụng nguồn lực tài chính trong ứng phó với biến đổi khí hậu ở Việt Nam', 2024, 'Khoa học kỹ thuật', 2, 2, '2024-06-15 06:44:17', '2024-06-15 06:44:17', NULL),
(11, 'Lịch sử Đảng bộ xấ Thái Học(1930-2020). NXB Thông tin truyền thông. Hà Nội 2023', 2023, 'Thông tin truyền thông', 2, 2, '2024-06-16 14:58:37', '2024-06-27 00:45:00', 'file-sample_150kB.pdf'),
(12, 'Đảng Cộng sản Việt Nam - những tìm tồi và đổi mới trên con đường lên CNXH(1986-2011)', 2014, 'NXB Lý luận chính trị', 2, 2, '2024-06-16 15:00:18', '2024-06-16 15:00:18', NULL),
(16, 'Phát triển hệ thống điều khiển thiết bị điện trong phạm vi một trường đại học', 2024, 'Chính trị quốc gia', 1, 2, '2024-06-27 01:12:49', '2024-06-27 01:25:46', NULL),
(17, 'Ứng dụng một số giải thuật data mining vào kết quả học tập', 2024, 'Chính trị quốc gia', 1, 2, '2024-06-27 01:14:30', '2024-06-27 01:26:06', 'file-sample_150kB.pdf');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `magazines`
--

INSERT INTO `magazines` (`id`, `magazine_name`, `year`, `journal`, `paper_id`, `created_at`, `updated_at`, `file_path`) VALUES
(2, 'Định hướng của Đảng và nhà nước về thực hiện thúc đẩy chuyển đổi số quốc gia', 2023, 'Tạp chí nghiên cứu tài chính kế toán', 1, NULL, '2024-06-21 06:32:29', NULL),
(8, 'Green economy in renovating the growth model in Vietnam nowadays', 2021, '1st Internation conference on Contemporary issues in Econnomics Management and Business', 2, '2024-06-11 08:50:12', '2024-06-22 08:26:29', NULL),
(9, 'Đảng viên là \"Người có Đạo\'\"- bằng chứng thép phản bác những luận điệu xuyên tạc về vấn đề tôn giáo ở Việt Nam', 2024, 'Báo điện tử', 14, '2024-06-11 08:57:00', '2024-06-21 06:32:57', NULL),
(11, 'Bàn về giải pháp phát triển kinh tế số trong bối cảnh hiện nay', 2024, 'Tạp chí kinh tế và dự báo', 1, '2024-06-11 09:10:59', '2024-06-11 09:10:59', NULL),
(12, 'Sử dụng học sâu để phát triển hệ thống trả lời câu hỏi du lịch dựa trên bản đồ Việt Nam', 2024, 'Tạp chí quốc tế danh mục Scopus Q2.', 2, '2024-06-12 02:31:26', '2024-06-26 09:43:52', 'file-sample_150kB.pdf'),
(14, 'Đánh giá sơ bộ sự ô nhiễm và xu hướng biến đổi của DDT trong đất tại Hà Nội', 2008, 'Tạp chí khoa học Thủy Lợi và môi trường', 14, '2024-06-21 01:30:18', '2024-06-22 08:26:38', NULL),
(15, 'Từ vài nét về đào tạo giáo viên ở Pháp đến đề xuất vòng tròn đào tạo giáo viên phổ thông đáp ứng yêu cầu đổi mới giáo dục.', 2024, 'Kỉ yếu hội thảo khoa học quốc tế phát triển năng lực sư phạm đội ngũ giáo viên khoa học tự nhiên đáp ứng yêu cầu đổi mới giáo dục phổ thông', 13, '2024-06-21 06:29:48', '2024-06-21 06:31:13', NULL),
(20, 'Phát triển thương mại điện tử ở Việt Nam', 2024, 'Xây dựng Đảng', 12, '2024-06-26 07:07:28', '2024-06-26 07:07:28', NULL),
(23, 'GIẢI PHÁP XÂY DỰNG HỆ THỐNG BẦU CỬ EVB DỰA TRÊN CÔNG NGHỆ BLOCKCHAIN', 2024, 'Tạp chí Nghiên cứu Tài chính kế toán số 08', 2, '2024-06-26 08:52:20', '2024-06-26 09:43:29', 'Demo_PTTK.docx'),
(24, 'Phát triển dịch vụ Logistics tại Tổng công ty Bưu điện Việt Nam', 2024, 'TC nghiên cứu Châu Âu Trung Đông / Viện Hàn lâm Khoa học Xã hội Việt Nam', 2, '2024-06-27 00:47:14', '2024-06-27 01:30:30', 'Demo_PTTK.docx'),
(25, 'Phát triển thương mại điện tử ở Việt Nam1', 2024, 'Tạp chí Nghiên cứu Tài chính kế toán số 08', 3, '2024-06-30 06:10:10', '2024-06-30 06:10:10', 'Demo_PTTK (6).docx');

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
(41, '2024_05_20_154636_create_scouncils_table', 25),
(42, '2024_05_21_085720_create_profiles_table', 26),
(43, '2024_05_22_171832_create_profiles_table', 27),
(44, '2024_05_23_155541_create_offers_table', 28),
(45, '2024_05_26_035843_create_topics_table', 29),
(46, '2024_05_26_040552_create_topics_table', 30),
(47, '2024_05_29_155051_create_researchers_table', 31),
(48, '2024_05_29_155105_create_projects_table', 31),
(49, '2024_05_30_100941_create_scientist-scientists_table', 32),
(50, '2024_05_31_094122_create_roles_table', 33),
(51, '2024_05_31_094533_create_roles_table', 34),
(52, '2024_05_31_095450_create_categories_table', 35),
(53, '2024_05_31_100354_create_categories_table', 36),
(54, '2024_06_01_081009_create_topics_table', 37),
(55, '2024_06_01_081209_create_topics_table', 38),
(56, '2024_06_01_081547_create_topics_table', 39),
(57, '2024_06_01_135026_create_books_table', 40),
(58, '2024_06_01_135228_create_books_table', 41),
(59, '2024_06_01_135759_create_curriculums_table', 42),
(60, '2024_06_01_140738_create_curriculums_table', 43),
(61, '2024_06_01_140950_create_curriculums_table', 44),
(62, '2024_06_01_150225_create_curriculums_table', 45),
(63, '2024_06_03_095119_create_role_scientist_topic_table', 46),
(65, '2024_06_03_095653_create_role_scientist_topic_table', 47),
(66, '2024_06_03_100540_create_role_scientist_topic_table', 48),
(67, '2024_06_03_102355_create_role_scientist_topic_table', 49),
(68, '2024_06_03_164934_create_role_scientist_topic_table', 50),
(69, '2024_06_04_081559_create_topics_table', 51),
(70, '2024_06_05_094518_create_magazines_table', 52),
(71, '2024_06_10_103703_create_scientist_magazine_role_table', 53),
(72, '2024_06_10_151726_create_scientist_magazine_role_table', 54),
(73, '2024_06_10_151844_create_scientist_magazine_role_table', 55),
(74, '2024_06_10_155441_remove_profile_id_from_magazines_table', 56),
(75, '2024_06_11_092843_remove_role_id_from_magazines_table', 57),
(76, '2024_06_14_022156_remove_profile_id_from_curriculums_table', 58),
(77, '2024_06_14_022640_create_scientist_curriculum_role_table', 59),
(78, '2024_06_14_104306_remove_profile_id_from_topics_table', 60),
(79, '2024_06_14_104454_remove_role_id_from_topics_table', 61),
(80, '2024_06_14_104634_create_scientist_topic_role_table', 62),
(81, '2024_06_17_091137_create_users_table', 63),
(82, '2024_06_23_143632_add_google_id_to_users_table', 64),
(83, '2024_06_25_153626_add_foreign_key_to_scientists_table', 65),
(84, '2024_06_26_132041_add_file_path_to_magazines_table', 66),
(85, '2024_06_29_145834_add_user_id', 67),
(86, '2024_06_29_161329_drop_suggestion_id_foreign_from_offers_table', 67),
(87, '2024_06_29_162453_create_scientist_offer_role', 67),
(88, '2024_06_29_162847_drop_user_id_foreign_from_offers_table', 67),
(89, '2024_06_30_070414_create_scientist_offer_role', 68);

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
  `year` int(11) NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `propose_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `offers`
--

INSERT INTO `offers` (`id`, `year`, `offer_name`, `propose_id`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 2024, 'Hệ thống cảnh báo hạn mặn thời gian thực dựa trên mô hình đa tác tử kết hợp dữ liệu cảm biến', 4, NULL, 'chờ duyệt', NULL, '2024-06-30 01:25:36'),
(4, 2024, 'Nghiên cứu triển khai ứng dụng CNTT dựa trên nền tảng Moodle trong thi trắc nghiệm Olympic các môn Khoa học chính trị và Tư tưởng Hồ Chí Minh', 4, NULL, 'chờ duyệt', '2024-06-30 00:37:02', '2024-06-30 01:24:23');

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
(12, 'Kỷ yếu hội thảo khoa học chuyên ngành', '2024-06-21 06:27:55', '2024-06-21 06:27:55'),
(13, 'Kỷ yếu hội thảo khoa học', '2024-06-21 06:28:16', '2024-06-21 06:28:16'),
(14, 'Tạp chí chuyên ngành khoa học', '2024-06-21 06:32:05', '2024-06-21 06:32:05');

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
(10, '123.890', 'Nguyễn Đình Quỳnh', '1991-12-05', 'Nam', 'Hà Nội', NULL, NULL, NULL, '0966712563', 'ndquynh@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, 3, 'Hà Nội', '2024-05-25 20:24:41', '2024-05-25 20:24:41'),
(11, '11234', 'Biện Thị Hoàng Ngọc', '1989-06-12', 'Nữ', 'Nam Định', NULL, NULL, NULL, '0912668541', 'bthn@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, 6, 'Hà Nội', '2024-05-31 20:16:38', '2024-05-31 20:17:50'),
(12, '112341', 'Đào Quang Tân', '1996-12-03', 'Nam', 'Nam Định', NULL, NULL, NULL, '0123789234', 'dqt@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, 6, 'Hà Nội', '2024-05-31 21:11:32', '2024-05-31 21:11:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `researcher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Cấu trúc bảng cho bảng `researchers`
--

CREATE TABLE `researchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Chủ biên', NULL, NULL),
(2, 'Người tham gia', NULL, NULL),
(3, 'Đồng chủ biên', NULL, NULL),
(4, 'Tác giả', NULL, NULL),
(5, 'Đồng tác giả', NULL, NULL),
(6, 'Chủ nhiệm', NULL, NULL),
(7, 'Thư ký', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scientists`
--

CREATE TABLE `scientists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_id` varchar(255) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` enum('Nam','Nữ') DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `office_phone` int(11) DEFAULT NULL,
  `house_phone` int(11) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL,
  `investiture` varchar(255) DEFAULT NULL,
  `scientific_title` varchar(255) DEFAULT NULL,
  `research_major` varchar(255) DEFAULT NULL,
  `research_title` varchar(255) DEFAULT NULL,
  `research_position` varchar(255) DEFAULT NULL,
  `office_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address_office` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `scientists`
--

INSERT INTO `scientists` (`id`, `user_id`, `profile_id`, `profile_name`, `birthday`, `gender`, `birth_place`, `address`, `office_phone`, `house_phone`, `telephone`, `email`, `degree_id`, `investiture`, `scientific_title`, `research_major`, `research_title`, `research_position`, `office_id`, `address_office`, `created_at`, `updated_at`) VALUES
(1, NULL, '2024.01', 'Biện Thị Hoàng Ngọc', '1998-03-04', 'Nữ', 'Hà Nội', NULL, NULL, NULL, '0314748364', 'bthn@gmail.com', 2, NULL, NULL, 'Lịch Sử Việt Nam', NULL, NULL, 3, 'Hà Nội', NULL, '2024-06-24 23:29:21'),
(16, 14, '2024.2', 'Bùi Lê Ngọc', '1990-12-09', 'Nữ', 'Hà Nội', NULL, NULL, NULL, '0223456789', 'blngoc1234@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, 4, 'Hà Nội', '2024-06-25 09:08:58', '2024-06-26 01:46:45'),
(18, 9, '120', 'hien vu', '1990-12-02', 'Nam', 'fasdfasdfasdf', NULL, NULL, NULL, '01234567', 'vudinhhien689@gmail.com', 3, NULL, NULL, NULL, NULL, NULL, 4, 'sdfg', '2024-06-25 10:15:36', '2024-06-25 10:16:32'),
(19, 18, '2024.3', 'Bùi Quang Thuấn', '1991-12-12', 'Nam', 'Nam Định', NULL, NULL, NULL, '0922668511', 'bqt@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, 5, 'Hà Nội', '2024-06-26 02:01:05', '2024-06-26 02:14:53'),
(20, 19, '2024.4', 'Trần Đình Tân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tdt@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-26 02:55:25', '2024-06-26 02:55:25'),
(21, 20, '2024.5', 'Bùi Thúy Hằng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bth@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-26 02:56:31', '2024-06-26 02:56:31'),
(22, 21, '2024.6', 'Hoàng Ngọc Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hnl@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-26 02:57:37', '2024-06-26 02:57:37'),
(23, 22, '2024.7', 'Cao Quang Đạt', '1991-01-12', 'Nam', 'Nam Định', NULL, NULL, NULL, '0912668540', 'cqd@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, 2, 'Hà Nội', '2024-06-26 02:58:35', '2024-06-26 03:35:02'),
(24, 23, '2024.8', 'Bùi Minh Hải', '2000-01-23', 'Nam', 'Bắc Giang', NULL, NULL, NULL, '0912668540', 'bmh@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, 3, 'Hà Nội', '2024-06-26 02:59:40', '2024-06-26 03:33:49'),
(25, 24, '2024.9', 'Vũ Minh Thắng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vmt@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-26 03:00:19', '2024-06-26 03:00:19'),
(26, 25, 'generated_profile_id_here', 'Hien Vu Dinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vudinhhienf@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-26 08:38:15', '2024-06-26 08:38:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scientist_curriculum_role`
--

CREATE TABLE `scientist_curriculum_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scientist_id` bigint(20) UNSIGNED NOT NULL,
  `curriculum_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `scientist_curriculum_role`
--

INSERT INTO `scientist_curriculum_role` (`id`, `scientist_id`, `curriculum_id`, `role_id`, `created_at`, `updated_at`) VALUES
(14, 1, 1, 4, '2024-06-26 03:41:43', '2024-06-26 03:41:43'),
(15, 16, 5, 4, '2024-06-26 03:42:01', '2024-06-26 03:42:01'),
(16, 19, 5, 5, '2024-06-26 03:42:01', '2024-06-26 03:42:01'),
(17, 25, 9, 4, '2024-06-26 03:42:13', '2024-06-26 03:42:13'),
(18, 24, 10, 4, '2024-06-26 03:46:16', '2024-06-26 03:46:16'),
(19, 1, 10, 5, '2024-06-26 03:46:16', '2024-06-26 03:46:16'),
(20, 21, 11, 4, '2024-06-26 03:46:25', '2024-06-27 00:41:16'),
(21, 22, 12, 4, '2024-06-26 03:46:39', '2024-06-26 03:46:39'),
(22, 24, 12, 4, '2024-06-26 03:46:39', '2024-06-26 03:46:39'),
(24, 23, 11, 4, '2024-06-27 00:41:16', '2024-06-27 00:45:00'),
(26, 23, 16, 1, '2024-06-27 01:12:49', '2024-06-27 01:25:46'),
(27, 23, 17, 4, '2024-06-27 01:14:30', '2024-06-27 01:26:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scientist_magazine_role`
--

CREATE TABLE `scientist_magazine_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scientist_id` bigint(20) UNSIGNED NOT NULL,
  `magazine_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `scientist_magazine_role`
--

INSERT INTO `scientist_magazine_role` (`id`, `scientist_id`, `magazine_id`, `role_id`, `created_at`, `updated_at`) VALUES
(64, 16, 2, 1, '2024-06-26 03:39:00', '2024-06-26 03:39:00'),
(65, 19, 2, 2, '2024-06-26 03:39:00', '2024-06-26 03:39:00'),
(67, 23, 8, 4, '2024-06-26 03:39:26', '2024-06-26 03:39:26'),
(68, 24, 8, 5, '2024-06-26 03:39:26', '2024-06-26 03:39:26'),
(69, 25, 9, 1, '2024-06-26 03:39:35', '2024-06-26 03:39:35'),
(70, 21, 11, 4, '2024-06-26 03:40:42', '2024-06-26 03:40:42'),
(71, 23, 12, 4, '2024-06-26 03:40:55', '2024-06-26 09:43:52'),
(72, 16, 12, 5, '2024-06-26 03:40:55', '2024-06-26 03:40:55'),
(73, 19, 14, 4, '2024-06-26 03:41:03', '2024-06-26 03:41:03'),
(74, 25, 15, 4, '2024-06-26 03:41:19', '2024-06-26 03:41:19'),
(75, 1, 15, 2, '2024-06-26 03:41:19', '2024-06-26 03:41:19'),
(79, 23, 20, 1, '2024-06-26 07:07:28', '2024-06-26 09:18:08'),
(82, 23, 23, 2, '2024-06-26 08:52:20', '2024-06-26 09:43:29'),
(83, 23, 24, 4, '2024-06-27 00:47:14', '2024-06-27 01:30:44'),
(84, 26, 25, 4, '2024-06-30 06:10:10', '2024-06-30 06:10:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scientist_offer_role`
--

CREATE TABLE `scientist_offer_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scientist_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `scientist_offer_role`
--

INSERT INTO `scientist_offer_role` (`id`, `scientist_id`, `offer_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 23, 1, 6, NULL, '2024-06-30 01:25:36'),
(3, 21, 4, 7, '2024-06-30 00:37:02', '2024-06-30 01:24:23'),
(5, 19, 4, 6, '2024-06-30 01:19:40', '2024-06-30 01:24:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scientist_topic_role`
--

CREATE TABLE `scientist_topic_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scientist_id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `scientist_topic_role`
--

INSERT INTO `scientist_topic_role` (`id`, `scientist_id`, `topic_id`, `role_id`, `created_at`, `updated_at`) VALUES
(35, 1, 1, 6, '2024-06-25 09:32:46', '2024-06-25 09:32:46'),
(36, 16, 1, 4, '2024-06-25 09:32:46', '2024-06-25 09:32:46'),
(37, 19, 33, 6, '2024-06-26 02:02:34', '2024-06-26 02:15:49'),
(38, 16, 33, 7, '2024-06-26 02:02:34', '2024-06-26 02:02:34'),
(41, 24, 20, 6, '2024-06-26 03:35:58', '2024-06-26 03:35:58'),
(42, 25, 20, 2, '2024-06-26 03:35:58', '2024-06-26 03:55:50'),
(44, 19, 23, 6, '2024-06-26 03:36:24', '2024-06-26 03:36:24'),
(48, 21, 26, 6, '2024-06-26 03:37:07', '2024-06-26 03:37:07'),
(49, 1, 26, 7, '2024-06-26 03:37:07', '2024-06-26 03:37:07'),
(51, 1, 25, 6, '2024-06-26 03:37:50', '2024-06-26 03:37:50'),
(53, 23, 34, 6, '2024-06-27 01:26:58', '2024-06-27 01:27:28'),
(55, 23, 35, 6, '2024-06-29 09:55:25', '2024-06-29 09:55:25'),
(56, 1, 35, 7, '2024-06-29 09:55:25', '2024-06-29 09:55:25'),
(57, 26, 36, 6, '2024-06-30 06:09:40', '2024-06-30 06:09:40');

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
(1, 1001012, '2024-10-15', 6, 5, 'Hội đồng đánh giá nghiệm thu đề tài', 2024, NULL, '2024-06-08 21:21:12');

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
  `result` enum('Khá','Giỏi','Xuất sắc') NOT NULL,
  `lvtopic_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `result`, `lvtopic_id`, `start_date`, `end_date`, `created_at`, `updated_at`, `file`) VALUES
(1, 'Phát huy dân chủ trong hoạt động của bộ máy nhà nước cấp Trung ương ở Việt Nam hiện nay', 'Khá', 3, '2024-01-10', '2024-10-21', NULL, '2024-06-25 09:32:46', ''),
(20, 'Nghiên cứu thực trạng, đề xuất giải pháp nâng cao chất lượng công tác tham mưu, tổng hợp phục vụ cấp ủy của Văn phòng Tỉnh ủy Hòa Bình giai đoạn 2021-2025', 'Khá', 3, '2024-01-10', '2024-10-10', '2024-06-14 18:42:32', '2024-06-26 03:35:58', ''),
(23, 'Nghiên cứu IOT, xây dựng hệ thống nhúng cảnh báo cháy qua điện thoại di động', 'Khá', 3, '2024-01-23', '2024-11-23', '2024-06-15 06:35:59', '2024-06-26 03:36:24', ''),
(25, 'Xây dựng ứng dụng tra cứu và cảnh báo dịch bệnh Covid -19 tại Việt Nam', 'Giỏi', 3, '2024-03-21', '2024-12-21', '2024-06-15 06:37:46', '2024-06-26 03:37:50', ''),
(26, 'Thiết kế máy rửa tay sát khuẩn tự động sử dụng mạch Arduino', 'Khá', 3, '2024-01-21', '2024-10-21', '2024-06-15 06:38:42', '2024-06-26 03:37:07', ''),
(33, 'Cấu trúc an ninh khu vực Châu á- Thái Bình Dương hiện nay và những tác động đến Việt Nam', 'Khá', 3, '2023-12-21', '2024-10-21', '2024-06-26 02:02:34', '2024-06-26 02:15:49', ''),
(34, 'Dự báo qua hành vi mua sắm của người tiêu dùng trong hoạt động kinh doanh hàng tiêu dùng', 'Khá', 3, '2024-01-21', '2024-10-21', '2024-06-27 01:26:58', '2024-06-27 01:27:28', ''),
(35, 'Nghiên cứu IOT, xây dựng hệ thống nhúng cảnh báo cháy qua điện thoại di động', 'Khá', 3, '2024-02-23', '2024-09-23', '2024-06-29 09:52:35', '2024-06-29 09:55:25', 'Demo_PTTK (6).docx'),
(36, 'Giải pháp nâng cao hiệu quả công tác xây dựng cấp xã đạt chuẩn tiếp cận pháp luật tại tỉnh Nam Định', 'Khá', 3, '2024-02-01', '2024-09-01', '2024-06-30 06:09:40', '2024-06-30 06:09:40', 'Demo_PTTK.docx');

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
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `google_id`) VALUES
(8, 'dsafdfasd', 'ddddd@gmail.com', '$2y$12$qpPj6wfkf.xAAS65UWOu2elGkgPGoovtnJFuh0YjL0dcp2cFXCTnu', 0, NULL, '2024-06-24 23:19:58', '2024-06-24 23:19:58', NULL),
(9, 'hien vu', 'vudinhhien689@gmail.com', '$2y$12$QBeeSF3EUGVXNo1xLJmmHeX.ccSKYRjcE86kheOtXMsiAl6E7uAja', 0, '09JhSX7aVfLS361EbQeaZZiFCdgxwjH0xRjIZthnRuTvWdBht5MHLXEMsWHd', '2024-06-25 08:38:15', '2024-06-25 08:38:15', NULL),
(10, 'Phong Dao Tao', 'pdt@gmail.com', '$2y$12$m4/w7Y5yfVMyazQPK5qd0.A0NfEnafzcAvSilybWk3FXimhfZOrie', 1, NULL, '2024-06-25 08:41:43', '2024-06-25 08:41:43', NULL),
(14, 'Bùi Lê Ngọc', 'blngoc1234@gmail.com', '$2y$12$gxEt4kqXoxdt2sVSW8vpsuijbBEYj2cIjL7d6preeJR.GMGF1EWLS', 0, NULL, '2024-06-25 09:08:58', '2024-06-25 09:08:58', NULL),
(18, 'Bùi Quang Thuấn', 'bqt@gmail.com', '$2y$12$PGf54MTCK9EpW3FPNJhyPuxuQL6PeakWGD1tYdMs3JJQbcMDx6Y0y', 0, NULL, '2024-06-26 02:01:05', '2024-06-26 02:01:05', NULL),
(19, 'Trần Đình Tân', 'tdt@gmail.com', '$2y$12$PFWChR.5z215N6QFApG3dub3Z1lBR870KrAph2sRUFxdmcbar47Fq', 0, NULL, '2024-06-26 02:55:25', '2024-06-26 02:55:25', NULL),
(20, 'Bùi Thúy Hằng', 'bth@gmail.com', '$2y$12$QfABAavdy7CDGwVx6jsg8.olnOGwK5gU1iGVA90cKfFUF4e/Z0Fy6', 0, NULL, '2024-06-26 02:56:31', '2024-06-26 02:56:31', NULL),
(21, 'Hoàng Ngọc Linh', 'hnl@gmail.com', '$2y$12$DJkiaAYMyQxIzfwP.tWzBuafNMOJbQko0Kv4CS.KbRkzeGrWtamwS', 0, NULL, '2024-06-26 02:57:37', '2024-06-26 02:57:37', NULL),
(22, 'Cao Quang Đạt', 'cqd@gmail.com', '$2y$12$Y9q0Dv5bw1Wyrm9Yz7RenuOd0dzig2yr4dA1eKzt.hBq2hYo5.7ci', 0, NULL, '2024-06-26 02:58:35', '2024-06-26 02:58:35', NULL),
(23, 'Bùi Minh Hải', 'bmh@gmail.com', '$2y$12$XAOGNQsq/jD0tMWKmdvlVOmBjrzCpQ1AKcp2IBaaero4qy0ZzRaKa', 0, NULL, '2024-06-26 02:59:40', '2024-06-26 02:59:40', NULL),
(24, 'Vũ Minh Thắng', 'vmt@gmail.com', '$2y$12$qIWYM2xiuen6MSYtx5rG3uLhGkxp98Iny2sudEymQZ/4ckJALGKMu', 0, NULL, '2024-06-26 03:00:19', '2024-06-26 03:00:19', NULL),
(25, 'Hien Vu Dinh', 'vudinhhienf@gmail.com', '$2y$12$yasxuV1vZUnFNl0U/UtrLuq38s0g831CqZfwOlXl5ObmH.4hFNMcq', 0, '1DRruttzD2ldBRPalM3eXIZO8y77oGe7rS4XoWmpAkr4IwYo1L47aRMqcqJg', '2024-06-26 08:38:15', '2024-06-26 08:38:15', NULL);

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
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_role_id_foreign` (`role_id`),
  ADD KEY `categories_training_id_foreign` (`training_id`);

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
-- Chỉ mục cho bảng `curriculums`
--
ALTER TABLE `curriculums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curriculums_book_id_foreign` (`book_id`),
  ADD KEY `curriculums_training_id_foreign` (`training_id`);

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
  ADD KEY `offers_propose_id_foreign` (`propose_id`);

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
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_researcher_id_foreign` (`researcher_id`);

--
-- Chỉ mục cho bảng `proposes`
--
ALTER TABLE `proposes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `researchers`
--
ALTER TABLE `researchers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `scientists`
--
ALTER TABLE `scientists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scientists_degree_id_foreign` (`degree_id`),
  ADD KEY `scientists_office_id_foreign` (`office_id`),
  ADD KEY `scientists_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `scientist_curriculum_role`
--
ALTER TABLE `scientist_curriculum_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scientist_curriculum_role_scientist_id_foreign` (`scientist_id`),
  ADD KEY `scientist_curriculum_role_curriculum_id_foreign` (`curriculum_id`),
  ADD KEY `scientist_curriculum_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `scientist_magazine_role`
--
ALTER TABLE `scientist_magazine_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scientist_magazine_role_scientist_id_foreign` (`scientist_id`),
  ADD KEY `scientist_magazine_role_magazine_id_foreign` (`magazine_id`),
  ADD KEY `scientist_magazine_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `scientist_offer_role`
--
ALTER TABLE `scientist_offer_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scientist_offer_role_scientist_id_foreign` (`scientist_id`),
  ADD KEY `scientist_offer_role_offer_id_foreign` (`offer_id`),
  ADD KEY `scientist_offer_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `scientist_topic_role`
--
ALTER TABLE `scientist_topic_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scientist_topic_role_scientist_id_foreign` (`scientist_id`),
  ADD KEY `scientist_topic_role_topic_id_foreign` (`topic_id`),
  ADD KEY `scientist_topic_role_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `councils`
--
ALTER TABLE `councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `curriculums`
--
ALTER TABLE `curriculums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `money`
--
ALTER TABLE `money`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `papers`
--
ALTER TABLE `papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `proposes`
--
ALTER TABLE `proposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `researchers`
--
ALTER TABLE `researchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `scientists`
--
ALTER TABLE `scientists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `scientist_curriculum_role`
--
ALTER TABLE `scientist_curriculum_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `scientist_magazine_role`
--
ALTER TABLE `scientist_magazine_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `scientist_offer_role`
--
ALTER TABLE `scientist_offer_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `scientist_topic_role`
--
ALTER TABLE `scientist_topic_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `categories_training_id_foreign` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`);

--
-- Các ràng buộc cho bảng `conferences`
--
ALTER TABLE `conferences`
  ADD CONSTRAINT `conferences_seminar_id_foreign` FOREIGN KEY (`seminar_id`) REFERENCES `seminars` (`id`);

--
-- Các ràng buộc cho bảng `curriculums`
--
ALTER TABLE `curriculums`
  ADD CONSTRAINT `curriculums_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `curriculums_training_id_foreign` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`);

--
-- Các ràng buộc cho bảng `magazines`
--
ALTER TABLE `magazines`
  ADD CONSTRAINT `magazines_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`);

--
-- Các ràng buộc cho bảng `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_propose_id_foreign` FOREIGN KEY (`propose_id`) REFERENCES `proposes` (`id`);

--
-- Các ràng buộc cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`),
  ADD CONSTRAINT `profiles_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`);

--
-- Các ràng buộc cho bảng `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_researcher_id_foreign` FOREIGN KEY (`researcher_id`) REFERENCES `researchers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `scientists`
--
ALTER TABLE `scientists`
  ADD CONSTRAINT `scientists_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`),
  ADD CONSTRAINT `scientists_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`),
  ADD CONSTRAINT `scientists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `scientist_curriculum_role`
--
ALTER TABLE `scientist_curriculum_role`
  ADD CONSTRAINT `scientist_curriculum_role_curriculum_id_foreign` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scientist_curriculum_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scientist_curriculum_role_scientist_id_foreign` FOREIGN KEY (`scientist_id`) REFERENCES `scientists` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `scientist_magazine_role`
--
ALTER TABLE `scientist_magazine_role`
  ADD CONSTRAINT `scientist_magazine_role_magazine_id_foreign` FOREIGN KEY (`magazine_id`) REFERENCES `magazines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scientist_magazine_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scientist_magazine_role_scientist_id_foreign` FOREIGN KEY (`scientist_id`) REFERENCES `scientists` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `scientist_offer_role`
--
ALTER TABLE `scientist_offer_role`
  ADD CONSTRAINT `scientist_offer_role_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scientist_offer_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scientist_offer_role_scientist_id_foreign` FOREIGN KEY (`scientist_id`) REFERENCES `scientists` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `scientist_topic_role`
--
ALTER TABLE `scientist_topic_role`
  ADD CONSTRAINT `scientist_topic_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scientist_topic_role_scientist_id_foreign` FOREIGN KEY (`scientist_id`) REFERENCES `scientists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scientist_topic_role_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `topics_lvtopic_id_foreign` FOREIGN KEY (`lvtopic_id`) REFERENCES `lvtopics` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
