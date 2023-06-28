-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2023 at 05:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebMovies`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories`
(
    `id`          int(11) NOT NULL,
    `title`       varchar(100) NOT NULL,
    `description` varchar(255) NOT NULL,
    `status`      int(11) NOT NULL,
    `slug`        varchar(255) NOT NULL,
    `position`    int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`)
VALUES (1, 'Phim Mới', 'Phim mới cập nhật hằng ngày', 1, 'phim-moi', 0),
       (2, 'Phim Chiếu Rạp', 'Phim chiếu rạp được cập nhật hằng ngày', 1, 'phim-chieu-rap', 5),
       (25, 'Phim Bộ', 'Phim bộ cập nhật hằng ngày', 1, 'phim-bo', 1),
       (26, 'Phim Lẻ', 'Phim lẻ cập nhật thường xuyên', 1, 'phim-le', 2),
       (42, 'Phim Netflix', 'Cập nhật các phim trên Netflix', 1, 'phim-netflix', 7);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries`
(
    `id`          int(11) NOT NULL,
    `title`       varchar(100) NOT NULL,
    `icon`        varchar(10) DEFAULT NULL,
    `description` varchar(255) NOT NULL,
    `status`      int(11) NOT NULL,
    `slug`        varchar(255) NOT NULL,
    `position`    int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `icon`, `description`, `status`, `slug`, `position`)
VALUES (1, 'Việt Nam', 'vn', 'Cập nhật các phim Việt Nam thường xuyên', 1, 'viet-nam', 0),
       (3, 'Ấn Độ', 'in', 'Cập nhật các phim Ấn Độ thường xuyên', 1, 'an-do', 8),
       (4, 'Mỹ', 'us', 'Cập nhật các phim Mỹ thường xuyên', 1, 'my', 5),
       (5, 'Hồng Kông', 'hk', 'Cập nhật các phim Hồng Kông thường xuyên', 1, 'hong-kong', 4),
       (6, 'Nhật Bản', 'jp', 'Cập nhật các phim Nhật Bản thường xuyên', 1, 'nhat-ban', 7),
       (7, 'Trung Quốc', 'cn', 'Cập nhật các phim Trung Quốc thường xuyên', 1, 'trung-quoc', 2),
       (8, 'Hàn Quốc', 'kr', 'Cập nhật các phim Hàn Quốc thường xuyên', 1, 'han-quoc', 1),
       (9, 'Đài Loan', 'tw', 'Cập nhật các phim Đài Loan thường xuyên', 1, 'dai-loan', 6),
       (10, 'Thái Lan', 'th', 'Cập nhật các phim Thái Lan thường xuyên', 1, 'thai-lan', 3),
       (11, 'Philippin', 'ph', 'Cập nhật các phim Philippin thường xuyên', 1, 'philippin', 9),
       (16, 'Indonesia', 'id', 'Cập nhật các phim Indonesia thường xuyên', 1, 'indonesia', 10),
       (30, 'Austria', 'at', 'Cập nhật các phim Austria thường xuyên', 1, 'austria', 11),
       (31, 'Anh', 'UK', 'Các phim thuộc nước Anh', 1, 'anh', 12);

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes`
(
    `id`         int(11) NOT NULL,
    `movie_id`   int(11) NOT NULL,
    `linkphim`   varchar(500) NOT NULL,
    `episode`    varchar(11)  NOT NULL,
    `updated_at` varchar(50)  NOT NULL,
    `created_at` varchar(50)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim`, `episode`, `updated_at`, `created_at`)
VALUES (28, 57,
        '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/eoOaKN4qCKw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        'HD', '2023-06-10 22:00:28', '2023-06-10 22:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs`
(
    `id`         bigint(20) UNSIGNED NOT NULL,
    `uuid`       varchar(255) NOT NULL,
    `connection` text         NOT NULL,
    `queue`      text         NOT NULL,
    `payload`    longtext     NOT NULL,
    `exception`  longtext     NOT NULL,
    `failed_at`  timestamp    NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres`
(
    `id`          int(11) NOT NULL,
    `title`       varchar(100) NOT NULL,
    `description` varchar(255) NOT NULL,
    `status`      int(11) NOT NULL,
    `slug`        varchar(255) NOT NULL,
    `position`    int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`, `position`)
VALUES (3, 'Tâm Lý', 'Những bộ phim tâm lý được cập nhật thường xuyên', 1, 'tam-ly', 6),
       (6, 'Hoạt Hình', 'Những bộ phim hoạt hình được cập nhật thường xuyên', 1, 'hoat-hinh', 8),
       (8, 'Hài Hước', 'Những bộ phim hài hước được cập nhật thường xuyên', 1, 'hai-huoc', 17),
       (9, 'Hình Sự', 'Những bộ phim hình sự được cập nhật thường xuyên', 1, 'hinh-su', 11),
       (10, 'Võ Thuật', 'Những bộ phim võ thuật được cập nhật thường xuyên', 1, 'vo-thuat', 2),
       (11, 'Cổ Trang', 'Những bộ phim cổ trang được cập nhật thường xuyên', 1, 'co-trang', 0),
       (12, 'Phim Ma', 'Những bộ phim ma được cập nhật thường xuyên', 1, 'phim-ma', 21),
       (13, 'Tình Cảm', 'Những bộ phim tình cảm được cập nhật thường xuyên', 1, 'tinh-cam', 7),
       (14, 'Thể Thao', 'Những bộ phim thể thao được cập nhật thường xuyên', 1, 'the-thao', 18),
       (15, 'Thần Thoại', 'Những bộ phim thần thoại được cập nhật thường xuyên', 1, 'than-thoai', 1),
       (18, 'Gia Đình', 'Những bộ phim gia đình được cập nhật thường xuyên', 1, 'gia-dinh', 22),
       (19, 'Chiến Tranh', 'Những bộ phim chiến tranh được cập nhật thường xuyên', 1, 'chien-tranh', 12),
       (20, 'Học Đường', 'Những bộ phim học đường được cập nhật thường xuyên', 1, 'hoc-duong', 23),
       (42, 'Hành Động', 'Những bộ phim hành động được cập nhật thường xuyên', 1, 'hanh-dong', 5),
       (43, 'Kiếm Hiệp', 'Những bộ phim kiếm hiệp được cập nhật thường xuyên', 1, 'kiem-hiep', 3),
       (44, 'Phiêu Lưu', 'Những bộ phim phiêu lưu được cập nhật thường xuyên', 1, 'phieu-luu', 4),
       (46, 'Viễn Tưởng', 'Những bộ phim khoa học được cập nhật thường xuyên', 1, 'vien-tuong', 10),
       (47, 'Tài Liệu', 'Những bộ phim khoa học được cập nhật thường xuyên', 1, 'tai-lieu', 13),
       (48, 'Khám Phá', 'Những bộ phim khoa học được cập nhật thường xuyên', 1, 'kham-pha', 14),
       (49, 'Văn Hoá', 'Những bộ phim khoa học được cập nhật thường xuyên', 1, 'van-hoa', 15),
       (50, 'Tâm Linh', 'Những bộ phim khoa học được cập nhật thường xuyên', 1, 'tam-linh', 16),
       (51, 'Âm Nhạc', 'Những bộ phim âm nhac được cập nhật thường xuyên', 1, 'am-nhac', 19),
       (52, 'Kinh dị', 'Những bộ phim kinh dị được cập nhật thường xuyên', 1, 'kinh-di', 20),
       (53, 'Bí Ẩn', 'Những bộ phim bí ẩn được cập nhật thường xuyên', 1, 'bi-an', 24),
       (54, 'Khoa Học', 'Những bộ phim khoa học được cập nhật thường xuyên', 1, 'khoa-hoc', 9),
       (55, 'Kịch Tính', 'Nhữg bộ phim kịch tính được cập nhật thường xuyên', 1, 'kich-tinh', 25),
       (56, 'Chính Kịch', 'Cập nhật các phim thể loại Chính Kịch mơi nhất', 1, 'chinh-kich', 26);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations`
(
    `id`        int(10) UNSIGNED NOT NULL,
    `migration` varchar(255) NOT NULL,
    `batch`     int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (1, '2014_10_12_000000_create_users_table', 1),
       (2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
       (3, '2019_08_19_000000_create_failed_jobs_table', 1),
       (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies`
(
    `id`            int(11) NOT NULL,
    `title`         varchar(100) NOT NULL,
    `ThoiLuong`     varchar(50)  DEFAULT NULL,
    `name_original` varchar(100) NOT NULL,
    `trailer`       varchar(100) DEFAULT NULL,
    `description`   longtext     NOT NULL,
    `status`        int(11) NOT NULL,
    `image`         varchar(255) NOT NULL,
    `category_id`   int(11) NOT NULL,
    `ThuocPhim`     varchar(10)  NOT NULL,
    `genre_id`      int(11) NOT NULL,
    `country_id`    int(11) NOT NULL,
    `slug`          varchar(255) NOT NULL,
    `movie_hot`     int(11) NOT NULL,
    `resolution`    int(11) NOT NULL DEFAULT 0,
    `phude`         int(11) NOT NULL DEFAULT 0,
    `NgayTao`       varchar(50)  DEFAULT NULL,
    `NgayCapNhat`   varchar(50)  DEFAULT NULL,
    `year`          varchar(20)  DEFAULT NULL,
    `tags`          text         DEFAULT NULL,
    `topview`       int(11) DEFAULT NULL,
    `season`        int(11) NOT NULL,
    `SoTap`         int(11) NOT NULL DEFAULT 1,
    `count_views`   int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `ThoiLuong`, `name_original`, `trailer`, `description`, `status`, `image`,
                      `category_id`, `ThuocPhim`, `genre_id`, `country_id`, `slug`, `movie_hot`, `resolution`, `phude`,
                      `NgayTao`, `NgayCapNhat`, `year`, `tags`, `topview`, `season`, `SoTap`, `count_views`)
VALUES (48, 'Vệ Binh Dải Ngân Hà 3 Vệ Binh Dải Ngân Hà 3', '150 phút',
        'Guardians of the Galaxy Volume 3 2023 Guardians of the Galaxy Volume 3 2023', 'JqcncLPi9zw',
        'Vệ Binh Dải Ngân Hà 3 – Guardians of the Galaxy Volume 3 (2023) sau khi mua Knowhere từ The Collector, đội Vệ binh dải Ngân Hà cố gắng biến nó thành nơi trú ẩn an toàn cho những người tị nạn sau cú búng tay di dời. Nhưng sau một cuộc tấn công tàn bạo, Peter Quill, vẫn cảm xúc vì mất Gamora, phải tập hợp các Vệ binh để thực hiện sứ mệnh bảo vệ vũ trụ và bảo vệ một người trong số họ khỏi kẻ thù chung nguy hiểm.',
        1, 'Ve-Binh-Dai-Ngan-Ha-39224.jpg', 2, 'phimle', 1, 4, 've-binh-dai-ngan-ha-3', 1, 4, 0, NULL,
        '2023-06-10 12:26:12', '2023',
        'Phim The Guardians Of The Galaxy Vol.3, Phim Vệ Binh Dải Ngân Hà 3, The Guardians Of The Galaxy Vol.3, The Guardians Of The Galaxy Vol.3 Vietsub, Vệ Binh Dải Ngân Hà 3, Vệ Binh Dải Ngân Hà 3 Vietsub',
        2, 3, 10, 123126),
       (57, 'Quá Nhanh Quá Nguy Hiểm 10', '150 phút', 'Fast And Furious 10 2023', 'eoOaKN4qCKw',
        'Quá Nhanh Quá Nguy Hiểm 10 – Fast and Furious 10 (2023) xoay quanh việc Dom Toretto cùng gia đình anh ấy đã trở thành mục tiếu tấn công bởi chính con trai ông trùm ma túy, kẻ trước đây bị X 10 tiêu diệt. Mời các bạn cùng đón xem bộ phim Quá Nhanh Quá Nguy Hiểm 10 – Fast X cực hấp dẫn này.',
        1, 'Qua-Nhanh-Qua-Nguy-Hiem-10-20234038.jpg', 2, 'phimle', 4, 4, 'qua-nhanh-qua-nguy-hiem-10', 1, 0, 0,
        '2023-06-10 21:57:43', '2023-06-10 21:58:41', '2023', 'Quá nhanh quá nguy hiểm, Fast and Furios', 1, 10, 1,
        105),
       (58, 'Nhanh Như Chớp 2023', '144 phút', 'The Flash 2023', 'cvn0h6cuUPQ',
        'The Flash (2023) vì muốn cứu mẹ, Barry Allen tìm cách quay trở lại quá khứ tuy nhiên hành động của anh vô tình thiết lập một thế giới mới nơi thế lực ngoài hành tinh của tướng Zod quay trở lại và tìm cách tàn phá Trái Đất một lần nữa',
        1, 'The-Flash-vietsub9160.jpg', 2, 'phimle', 5, 4, 'nhanh-nhu-ch-2023', 1, 3, 0, '2023-06-27 16:57:16',
        '2023-06-27 16:57:16', '2023', 'DC, The Flash, The Flash 2023, Nhanh Như Chớp, Nhanh như chớp 2023', NULL, 0, 1,
        NULL),
       (59, 'Mãn Giang Hồng', '157 phút', 'Full River Red 2023', '1nrBhJE2w7E',
        'Mãn Giang Hồng – Full River Red (2023) lấy bối cảnh thời Thiệu Hưng, nhà Nam Tống (Trung Quốc), bốn năm sau khi Tướng quân Nhạc Phi qua đời. Vào đêm trước cuộc đàm phán dẫn đầu bởi Tể tướng Tần Cối với nhà Tấn, sứ giả của nước này bị phát hiện chết tại dinh thự của ông ta, và bức thư bí mật mang theo đã biến mất. Người lính Trương Đại và phó chỉ huy quân đội Tôn Quân tình cờ bị cuốn vào âm mưu to lớn này và được lệnh cho cả hai phải tìm ra kẻ giết người trong vòng một giờ.',
        1, 'Phim-man-giang-hong6594.jpg', 2, 'phimle', 5, 7, 'man-giang-hong', 1, 0, 0, '2023-06-28 11:28:22',
        '2023-06-28 11:28:22', NULL, 'Phim Bí Ẩn, Phim Chiếu Rạp, Phim Chính Kịch, Phim Cổ Trang, Phim Hài', 2, 0, 1,
        NULL),
       (60, 'Thái Hi Sư: Vân Cơ Hiện Thế', '90 phút', 'Master of Juggling 2023', 'QqiHKKiFvYQ',
        'Thái Hi Sư: Vân Cơ Hiện Thế – Master of Juggling (2023) vào những năm đầu của thời Thiên Thịnh, Lâm Kiên với sự giúp đỡ của “bậc thầy tung hứng” Hồng Y đã khuất phục được vùng Cửu Châu và Hồng Y được tôn làm quốc sư, thành lập hội Vân Cơ để đào tạo “bậc thầy tung hứng”. Vài năm sau, Lâm Kiên lâm bệnh nằm liệt giường, nhị hoàng tử Lâm Quảng âm mưu với thượng thư triều đình để chiếm đoạt ngai vàng.\r\n\r\nĐể thoát khỏi kẻ gây rối lớn Hồng Y, thượng thư đã mua chuộc thành công đệ tử của Hồng Y là Châu Phương và biết được nơi ghi chép lại kỹ thuật tung hứng. Châu Phương đến thị trấn Long Du để tìm hồ sơ ghi chép kỹ thuật tung hứng không có kết quả, nhưng vô tình phát hiện phát hiện ra người giống hệt Hồng Y và lên kế hoạch bắt cóc. Đồng thời, thượng thư và những người khác đang thực hiện một âm mưu gây sốc..',
        1, 'Thai-Hi-Su-Van-Co-Hien-The2294.jpg', 26, 'phimle', 5, 7, 'thai-hi-su-van-co-hien-the', 1, 0, 0,
        '2023-06-28 11:33:18', '2023-06-28 11:33:18', NULL,
        'Phim Chính Kịch, Phim Cổ Trang, Phim Kịch Tính, Phim Viễn Tưởng', 1, 0, 1, NULL),
       (61, 'Ngư Yêu', '84 phút', 'The Legend of Aqua Witch 2022', 'ilEIVvSwUoY',
        'Ngư Yêu – The Legend of Aqua Witch (2022) đã có rất nhiều tin đồn. Gần đến tết trung thu, theo phong tục, Thái tử sẽ để tang người mẹ đã khuất của mình bên dòng sông trong Vườn thượng uyển. Quách Trưởng Chi lo lắng cho sự an toàn của Thái tử và ra lệnh cho ra lệnh cho Đại Lý Tự giải quyết vụ việc càng sớm càng tốt. Đại Lí Tự Chính Tiết Dương cùng với Đinh Nha Nhi liên thủ để cùng tìm ra hung thủ.\r\n\r\nTrong quá trình điều tra phát hiện ra ở dưới sông có một quái thú khổng lồ ăn thịt người được người ta nuôi, mà người nuôi cá quái thú lại là con quỷ võ công cao cường biến hóa tài tình. Vì một trận động đất, con quỷ cá đã thoát ra khỏi lồng khiến thảm kịch xảy ra. Mục đích của hắn là muốn quái thú cá ăn thịt Thái tử. Liên quan đến việc kế vị ngai vàng, Tiết Dương bị vu oan và bị tống vào nhà giam. May mắn thay, Quách Trưởng Chi đã giúp và bí mật cử người đến giúp đỡ. Vào đêm Trung thu trên sông Khúc, một trận chiến của người và cá đã ngăn chặn âm mưu giết Thái tử.',
        1, 'ngu-yeu4929.jpg', 26, 'phimle', 5, 7, 'ngu-yeu', 1, 0, 0, '2023-06-28 11:36:36', '2023-06-28 11:36:36',
        NULL, 'Phim Bí Ẩn, Phim Cổ Trang, Phim Kịch Tính, Phim Kinh Dị', 0, 0, 1, NULL),
       (62, 'Người Giấy Hoàn Hồn', '96 phút', 'Get in the Dark 2023', 'mKga6oHX5Xw',
        'Người Giấy Hoàn Hồn – Get in the Dark (2023) kể về một phóng viên nghe thấy ba câu chuyện kinh dị khi điều tra một vụ án về linh hồn búp bê giấy 20 năm trước. Khi đó cô Qiao đã chết một cách vô ích, và người quản gia của cô đã trả tiền cho một thợ thủ công bằng giấy để làm một con búp bê bằng giấy để chôn cùng cô. Linh hồn của cô Qiao được hồi sinh để trả thù khi đôi mắt của con búp bê bị rút ra, và hàng loạt sự kiện khủng khiếp bắt đầu xảy ra.',
        1, 'nguoi-giay-hoan-hon3467.jpg', 1, 'phimbo', 5, 7, 'nguoi-giay-hoan-hon', 1, 0, 0, '2023-06-28 11:39:00',
        '2023-06-28 11:39:00', NULL, 'Phim Chính Kịch, Phim Cổ Trang, Phim Kịch Tính, Phim Kinh Dị', 2, 0, 1, NULL),
       (63, 'Quỷ Núi', '71 phút', 'Wild Ghost 2023', 'zPGqy6Taxj0',
        'Quỷ Núi – Wild Ghost (2023) 20 năm trước, một thiên thạch không gian mang trong mình 3 viên pha lê rơi xuống nhân gian, 20 năm sau sơn quỷ lộ diện dẫn đến bao huyết án, chân tướng bị che giấu lúc đầu dần dần được hé mở…',
        1, 'quy-nui8049.jpg', 1, 'phimle', 5, 7, 'quy-nui', 1, 0, 0, '2023-06-28 11:45:12', '2023-06-28 11:45:12', NULL,
        'Phim Chính Kịch, Phim Cổ Trang, Phim Hành Động, Phim Viễn Tưởng', 1, 0, 1, NULL),
       (64, 'Sơn Tước Ma Thây', '85 phút', 'Zombie Chickadee 2022', 'BVDDLWBic1w',
        'Sơn Tước Ma Thây – Zombie Chickadee (2022) người huấn luyện chim hàng đầu Mao Sơn Hào phải đối mặt với cuộc tấn công của một loài đột biến trên Đảo Phượng Hoàng. Mọi người biến mất một cách bí ẩn, nỗi sợ hãi bao trùm mọi người. Để tìm ra sự thật, Anh Hào và đội trưởng đội an ninh, Mạnh Tiền Băng, đã cùng nhau hợp tác. Sự thật từng bước được hé lộ…',
        1, 'Son-Tuoc-Ma-Thay7277.jpg', 26, 'phimle', 5, 7, 'son-tuoc-ma-thay', 0, 0, 0, '2023-06-28 11:48:45',
        '2023-06-28 11:48:45', NULL, 'Phim Bí Ẩn, Phim Chính Kịch, Phim Cổ Trang, Phim Kịch Tính, Phim Kinh Dị', 1, 0,
        1, NULL),
       (65, 'Phong Thần Ngoại Truyện: Lôi Chấn Tử', '80 phút', 'League of Gods: Leizhenzi 2023', 'bpU_c46QaHk',
        'Phong Thần Ngoại Truyện: Lôi Chấn Tử – League of Gods: Leizhenzi (2023) Hạ Đinh ban đầu là con của một gia đình tướng quân ở thànhTây Kì. Những kẻ man rợ đã xâm chiếm và giết cha mẹ của Hạ Đinh và tất cả binh lính của thànhTây Kì. Hạ Đinh chạy trốn đến trấn Thái Bình và lớn lên ở đây và hay bị con trai tù trưởng bắt nạt..\r\n\r\nTuy nhiên, để bảo vệ người dân ở thị trấn Thái Bình, Hạ Đinh đã chiến đấu chống lại những con rồng và sói xấu xa, khi những kẻ man rợ xâm chiếm thị trấn Thái Bình, Hạ Đinh cuối cùng cũng biết rằng mình là người được Thor lựa chọn. Anh mọc ra đôi cánh, tạo ra sấm sét, giết tất cả những kẻ man rợ, và cũng giết chết phù thủy độc ác. Đáng tiếc cuối cùng người yêu A Lê bị mụ phù thủy làm cho đau lòng mà chết, Hạ Đinh dùng đôi cánh của mình bảo vệ A Lê, biến thành người đá, trăm năm sau, sấm sét đánh tới, hòn đá nứt ra mà sinh ra đến một cậu bé tên Lôi Chấn Tử. Kể từ đó, Lôi Chấn Tử tạo ra sức mạnh của sấm sét và đã giúp đỡ mọi người',
        1, 'Phong-Than-Ngoai-Truyen-Loi-Chan-Tu1436.jpg', 1, 'phimle', 5, 7, 'phong-than-ngoai-truyen-loi-chan-tu', 0,
        0, 0, '2023-06-28 11:50:58', '2023-06-28 11:50:58', NULL, 'Phim Cổ Trang, Phim Kịch Tính, Phim Viễn Tưởng',
        NULL, 0, 1, NULL),
       (66, 'Long Sinh Cửu Tử', '100 phút', 'The Dragon Nine 2022', 'XaQoqhw1gcE',
        'Long Sinh Cửu Tử – The Dragon Nine (2022) huyết thống cuối cùng của gia tộc rồng Phong Nhất Phàm đã vô tình nuốt phải viên thuốc thần của tổ tiên và sinh ra Long Cửu Tử tài giỏi. Cửu Tử đã có thể nói khi vừa sinh ra, và truyền thuyết kể rằng máu thịt của Cửu Tử khi thanh lọc và dung hợp cùng nhau có thể trường sinh.\r\n\r\nĐiều này khiến Cửu Tử bị nhiều thế lực xấu thèm muốn, vì vậy gia đình bắt đầu một cuộc hành trình trốn thoát. Hành trình chạy trốn điên cuồng cùng trải nghiệm cận kề cái chết khiến cả gia đình trở nên hưng thịnh, đồng thời cũng khiến Cửu Tử tài năng hiểu được trách nhiệm vai trò tồn tại của mỗi người. Cuối cùng, Cửu Tử đã có thể bảo vệ mọi người bằng tinh thần đồng đội và sự hợp tác.',
        1, 'Long-sinh-cuu-tu5023.jpg', 26, 'phimle', 5, 7, 'long-sinh-cuu-tu', 0, 0, 0, '2023-06-28 11:54:09',
        '2023-06-28 11:54:09', NULL, 'Phim Chính Kịch, Phim Cổ Trang, Phim Hài, Phim Viễn Tưởng', 2, 0, 1, NULL),
       (67, 'Sự Tích Cá Trích', '77 phút', 'Unspoken Stories: The Legend of Herring 2022', 'xK7-PNP5f2w&t=7s',
        'Sự Tích Cá Trích – The Legend of Herring (2022) nói về Liễu Thiên Chi là đệ tử của Bất Ngôn Môn chuyên hàng yêu diệt ma, tình cờ gặp Tiểu Thanh, một ngư yêu muốn tu luyện thành rồng. Tiểu Thanh đã nói dối rằng cô ấy cũng là một pháp sư trừ yêu để người khác không phát hiện ra thân phận ngư yêu của mình Sau đó, cả hai cùng nhau phiêu bạt và trải qua nhiều khó khăn trở ngại.\r\n\r\nTrên đường đi, trái tim nhân hậu của Tiểu Thanh không chỉ thay đổi suy nghĩ của Liễu Thiên Chi rằng quái vật là xấu xa mà còn trở thành chỗ dựa lẫn nhau. Cuối cùng, cả hai đã chung tay đánh bại âm mưu của ác long và bảo vệ những người dân thường trên thế giới, kể cả Tiểu Thanh sẵn sàng hy sinh thân rồng để đổi lấy sự hồi sinh của Liễu Thiên Chi;',
        1, 'su-tich-ca-trich8143.jpg', 26, 'phimle', 5, 7, 'su-tich-ca-trich', 0, 0, 0, '2023-06-28 11:56:37',
        '2023-06-28 11:56:37', NULL, 'Phim Chính Kịch, Phim Cổ Trang, Phim Tâm Lý, Phim Tình Cảm', 1, 0, 1, NULL),
       (68, 'Ông Kẹ', '99 phút', 'The Boogeyman 2023', 'cFqCmIU0-_M',
        'Ông Kẹ – The Boogeyman (2023) từ nguyên tác truyện ngắn của bậc thầy truyện kinh dị Stephen King, “Ông Kẹ” kể về câu chuyện của gia đình Harper khi một thực thể siêu nhiên bám theo và liên tục phá rối gia đình họ. Khi mà con quái vật này lấp ló trong bóng tối và chực chờ làm hại cô bé Sawyer như chực chờ một con mồi, chị gái Sadie và bố Will sẽ phải hành động để ngăn chặn điều này trước khi quá muộn.',
        1, 'Phim-ong-ke2840.jpg', 2, 'phimle', 5, 4, 'ong-ke', 1, 3, 0, '2023-06-28 12:07:10', '2023-06-28 12:07:10',
        NULL, 'Phim Bí Ẩn, Phim Chiếu Rạp, Phim Kịch Tính, Phim Kinh Dị', NULL, 0, 1, NULL),
       (69, 'Transformers 7: Quái Thú Trỗi Dậy', '110 phút', 'Transformers: Rise of the Beasts 2023', 'itnqEauWQZM',
        'Transformers 7: Quái Thú Trỗi Dậy – Transformers: Rise of the Beasts (2023) dựa trên sự kiện Beast Wars trong loạt phim hoạt hình “Transformers”, nơi mà các robot có khả năng biến thành động vật khổng lồ cùng chiến đấu chống lại một mối đe dọa tiềm tàng.',
        1, 'Phim-Transformers-77470.jpg', 2, 'phimle', 5, 4, 'transformers-7-quai-thu-troi-day', 1, 2, 0,
        '2023-06-28 12:09:27', '2023-06-28 12:09:27', NULL,
        'Phim Chiếu Rạp, Phim Hành Động, Phim Khoa Học, Phim Kịch Tính', 2, 0, 1, NULL),
       (70, 'John Wick: Phần 4', '169 phút', 'John Wick: Chapter 4 2023', 'qEVUtrk8_B4',
        'John Wick: Phần 4 – John Wick: Chapter 4 là câu chuyện của John Wick (Keanu Reeves) đã khám phá ra con đường để đánh bại High Table. Nhưng trước khi có thể kiếm được tự do, Wick phải đối đầu với kẻ thù mới với những liên minh hùng mạnh trên toàn cầu và những lực lượng biến những người bạn cũ thành kẻ thù.',
        1, 'John-Wick-46921.jpg', 2, 'phimle', 5, 4, 'john-wick-phan-4', 1, 0, 0, '2023-06-28 12:12:25',
        '2023-06-28 12:12:25', NULL, 'Phim Chiếu Rạp, Phim Hành Động, Phim Hình Sự, Phim Kịch Tính', 1, 0, 1, NULL),
       (71, 'Gấu Pooh: Máu Và Mật', '84 phút', 'Winnie the Pooh: Blood and Honey 2023', 'Ud-FBr74K8o&t=1s',
        'Gấu Pooh: Máu Và Mật – Winnie the Pooh: Blood and Honey (2023) những ngày phiêu lưu và vui vẻ đã kết thúc, khi Christopher Robin, giờ là một chàng trai trẻ, đã để lại Gấu Pooh và Piglet phía sau cho chúng tự lo liệu. Thời gian trôi qua, cảm thấy tức giận và bị bỏ rơi, cả hai dần trở nên hoang dã và thèm khát thức ăn. Và khi Christopher trở lại cũng là lúc cơn thịnh nộ của những sinh vật này bắt đầu.',
        1, 'Winnie-the-Pooh-Blood-and-Honey6603.jpg', 1, 'phimle', 5, 31, 'gau-pooh-mau-va-mat', 0, 0, 0,
        '2023-06-28 12:15:23', '2023-06-28 12:15:23', NULL, 'Phim Kịch Tính, Phim Kinh Dị, Phim Tâm Lý', NULL, 0, 1,
        NULL),
       (72, 'Khắc Tinh Của Quỷ', '104 phút',
        'The Pope\'s Exorcist 2023', 'YJXqvnT_rsk', 'Khắc Tinh Của Quỷ – The Pope’s Exorcist (2023) lấy cảm hứng từ những hồ sơ có thật của Cha Gabriele Amorth,
        Trưởng Trừ Tà của Vatican (Russell Crowe, đoạt giải Oscar®),
        bộ phim “The Pope’s Exorcist” theo chân Amorth trong cuộc điều tra về vụ quỷ ám kinh hoàng của một cậu bé và dần khám phá ra những bí mật hàng thế kỷ mà Vatican đã cố gắng giấu kín.', 1, 'khac-tinh-cua-quy1595.jpg', 2, 'phimle', 5, 4, 'khac-tinh-cua-quy', 1, 0, 0, '2023-06-28 12:28:37', '2023-06-28 12:28:37', NULL, 'Phim Bí Ẩn,
        Phim Chiếu Rạp, Phim Kịch Tính, Phim Kinh Dị', 2, 0, 1, NULL),
(73, 'Avatar: Dòng Chảy Của Nước', '192 phút', 'Avatar: The Way of Water 2022', 'o5F8MOz_IDw', 'Avatar: Dòng Chảy Của Nước – Avatar: The Way of Water lấy bối cảnh 10 năm sau những sự kiện xảy ra ở phần đầu tiên. Phim kể câu chuyện về gia đình mới của Jake Sully (Sam Worthington thủ vai) cùng những rắc rối theo sau và bi kịch họ phải chịu đựng khi phe loài người xâm lược hành tinh Pandora.', 1, 'avatar-24544.jpg', 2, 'phimle', 5, 4, 'avatar-dong-chay-cua-nuoc', 0, 0, 0, '2023-06-28 12:32:08', '2023-06-28 12:32:08', NULL, 'Phim Chiếu Rạp,
        Phim Hành Động, Phim Khoa Học, Phim Phiêu Lưu', 1, 0, 1, NULL),
(74, 'Trạm Tàu Ma', '80 phút', 'The Ghost Station 2023', 'gHeWP9R6-eU', 'Trạm Tàu Ma – The Ghost Station (2023) lời đồn ma ám về nhà ga Oksu ngày càng nhiều khi những vụ án kinh hoàng liên tục xảy ra. Một đường ray cũ kỹ,
        một chiếc giếng bỏ hoang,
        những con số gây ám ảnh hay những vết thương kỳ dị trên thi thể người xấu số… Tất cả dẫn đến một bí mật đau lòng bị chôn vùi nhiều năm trước.', 1, 'Tram-tau-ma1362.jpg', 2, 'phimbo', 5, 8, 'tram-tau-ma', 1, 0, 0, '2023-06-28 20:45:53', '2023-06-28 21:43:12', NULL, 'Phim Chiếu Rạp,
        Phim Kịch Tính, Phim Kinh Dị, Phim Tâm Lý', NULL, 0, 1, 17057),
(75, 'Black Adam', '125 phút', 'Black Adam 2022', 'X0tOpBuYasI', 'Black Adam do Dwayne Johnson sẽ góp mặt trong tác phẩm hành động – phiêu lưu mới của New Line Cinema,
        mang tên BLACK ADAM. Đây là bộ phim đầu tiên trên màn ảnh rộng khai thác câu chuyện của siêu anh hùng DC này.\r\n\r\nDưới sự sáng tạo của đạo diễn Jaume Collet-Serra (đạo diễn của Jungle Cruise). Gần 5.000 năm sau khi bị cầm tù với quyền năng tối thượng từ những vị thần cổ đại,
        Black Adam (Dwayne Johnson) sẽ được giải phóng khỏi nấm mồ chết chóc của mình,
        mang tới thế giới hiện đại một kiểu nhận thức về công lý hoàn toàn mới.', 1, 'Phim-Black-Adam7244.jpg', 2, 'phimle', 5, 4, 'black-adam', 0, 0, 0, '2023-06-28 20:49:01', '2023-06-28 20:49:01', NULL, 'Phim Chiếu Rạp,
        Phim Hành Động, Phim Khoa Học, Phim Viễn Tưởng', 2, 0, 1, NULL),
(76, 'Chiến Binh Báo Đen: Wakanda Bất Diệt', '162 phút', 'Black Panther: Wakanda Forever 2022', '_Z3QKkl1WyM', 'Chiến Binh Báo Đen: Wakanda Bất Diệt – Black Panther: Wakanda Forever nói về Nữ hoàng Ramonda,
        Shuri, M’Baku,
        Okoye và Dora Milaje chiến đấu để bảo vệ quốc gia của họ khỏi sự can thiệp của các thế lực thế giới sau cái chết của Vua T’Challa. Khi người Wakanda cố gắng nắm bắt chương tiếp theo của họ,
        các anh hùng phải hợp tác với nhau với sự giúp đỡ của War Dog Nakia và Everett Ross và tạo ra một con đường mới cho vương quốc Wakanda.', 1, 'Chien-Binh-Bao-Den-Wakanda-Bat-Diet401.jpg', 2, 'phimle', 4, 4, 'chien-binh-bao-den-wakanda-bat-diet', 0, 0, 0, '2023-06-28 20:53:13', '2023-06-28 20:53:13', NULL, 'Phim Chiếu Rạp,
        Phim Hành Động, Phim Phiêu Lưu, Phim Viễn Tưởng', 1, 0, 1, NULL),
(77, 'Thế Thân', '114 phút', 'The Other Child 2022', 'imNDfoYZBgk', 'Thế Thân – The Other Child (2022) một cặp vợ chồng quyết định nhận con nuôi để vượt qua nỗi mất mát đứa con thứ ba mà họ đã mất trong một vụ tai nạn. Họ nhận nuôi một cậu bé khiếm thị với hy vọng rằng việc nuôi nấng cậu bé sẽ bù đắp được tình yêu thương không đủ mà họ dành cho đứa con đã mất của mình. Cậu con nuôi có một giác quan nhạy bén và bắt đầu nhận thấy rằng có một sự hiện diện khác trong nhà.\r\n\r\nAnh ta phát hiện ra rằng sự hiện diện là một cậu bé đã chết một năm trước và triệu tập cậu ta trở lại gia đình. Người mẹ bị ám ảnh bởi việc giao tiếp với đứa con đã mất của mình. Người cha và những đứa trẻ khác tin rằng cậu bé được nhận nuôi đang nói dối,
        và bắt đầu lo sợ về nỗi ám ảnh ngày càng lớn của người mẹ đối với đứa con đã mất và cậu bé được nhận nuôi. Những đứa trẻ cảm thấy bắt buộc phải nói với cha mẹ chúng về bí mật về đứa trẻ đã mất,
        điều này đã thay đổi mọi thứ đối với gia đình.', 1, 'The-Than7753.jpg', 1, 'phimle', 5, 8, 'the-than', 0, 0, 0, '2023-06-28 20:58:31', '2023-06-28 20:58:31', NULL, 'Phim Bí Ẩn,
        Phim Chính Kịch, Phim Kịch Tính, Phim Kinh Dị', NULL, 0, 1, NULL),
(78, 'Quái Thú', '103 phút', 'Pet Sematary 1989', 'JMao8sg4DPA', 'Quái Thú – Pet Sematary (1989) Louis tìm thấy một khu đất chôn cất có thể làm người chết sống lại – nhưng với một chút ma quỷ thêm vào. Bi kịch khiến Louis sớm phải sử dụng quyền năng của khu đất đó.', 1, 'quai-thu6617.jpg', 26, 'phimle', 5, 1, 'quai-thu', 1, 0, 0, '2023-06-28 21:04:28', '2023-06-28 21:04:28', NULL, 'Phim Chính Kịch,
        Phim Kịch Tính, Phim Kinh Dị, Phim Tâm Lý', 2, 0, 1, NULL),
(79, 'Cá Mập Siêu Bạo Chúa 2: Vực Sâu', '150 phút', 'Meg 2: The Trench 2023', 'dG91B3hHyY4', 'Cá Mập Siêu Bạo Chúa 2: Vực Sâu – Meg 2: The Trench (2023) tiếp tục nhiệm vụ đã được đề cập trong phần phim trước,
        nhóm của Jonas Taylor (Jason Statham thủ vai) tiếp cận gần khu vực Rãnh Mariana,
        nơi họ đụng độ một quái vật bí ẩn,
        khiến một thành viên trong nhóm thiệt mạng ngay sau đó. Cái chết của người đồng đội báo hiệu cho cả nhóm về một mối đe dọa to lớn đang giấu mình trong những vách đá tối tăm. Thế nhưng,
        trong cả những viễn cảnh hoang đường nhất,
        họ cũng không thể ngờ những mối nguy đang chực chờ đe dọa họ có thể tàn ác đến mức nào.', 1, 'meg-24377.jpg', 2, 'phimle', 5, 7, 'ca-map-sieu-bao-chua-2-vuc-sau', 1, 0, 0, '2023-06-28 21:06:54', '2023-06-28 21:06:54', NULL, 'Phim Chiếu Rạp,
        Phim Hành Động, Phim Kịch Tính, Phim Kinh Dị', 1, 0, 1, NULL),
(80, 'Quái Vật Sông Mekong', '105 phút', 'The Lake 2022', 'Uux_6u-q1Rg', 'Quái Vật Sông Mekong – The Lake (2022) đặt bối cảnh tại làng Buengkan,
        một tỉnh thuộc miền Bắc Thái Lan,
        Quái Vật Sông Mekong chính thức trở thành cơn ác mộng đối với dân làng và được coi là khơi nguồn của thảm họa ngay khi nó phá hủy mọi thứ và khiến mọi người bị mất kết nối hoàn toàn với thế giới bên ngoài. Sự kiện chấn động toàn Thái Lan này đã khiến các cơ quan chức năng cùng những nhà khoa học vô tình đến Bueng Kan để tiến hành nghiên cứu phải huy động tất cả các lực lượng để bắt con quái vật điên rồ này trước khi quá muộn.', 1, 'phim-quai-vat-song-me-kong5628.jpg', 2, 'phimle', 5, 10, 'quai-vat-song-mekong', 0, 5, 0, '2023-06-28 21:32:23', '2023-06-28 21:32:23', NULL, 'Phim Chiếu Rạp,
        Phim Kịch Tính, Phim Kinh Dị, Phim viễn Tưởng', 0, 0, 1, NULL),
(81, 'Tyler Rake: Nhiệm Vụ Giải Cứu 2', '123 phút', 'Extraction 2 2023', 'Y274jZs5s7s', 'Tyler Rake: Nhiệm Vụ Giải Cứu 2 – Extraction 2 (2023) sau khi suýt chết,
        đặc công ưu tú Tyler Rake nhận một nhiệm vụ nguy hiểm khác: giải cứu gia đình đang bị giam giữ của tay xã hội đen tàn nhẫn.', 1, 'Untitled-15608.jpg', 26, 'phimle', 5, 30, 'tyler-rake-nhiem-vu-giai-cuu-2', 0, 0, 0, '2023-06-28 21:35:25', '2023-06-28 21:35:25', NULL, 'Phim Hành Động,
        Phim Kịch Tính, Phim Tâm Lý', 2, 0, 1, NULL),
(82, 'Cuộc Xâm Lược Bí Mật', '56 phút', 'Secret Invasion 2023', 'Tp_YZNqNBhw', 'Cuộc Xâm Lược Bí Mật – Secret Invasion (2023) truyền hình Mỹ do Kyle Bradstreet tạo ra cho dịch vụ phát trực tuyến Disney+,
        dựa trên cốt truyện cùng tên của Marvel Comics. Đây là loạt phim truyền hình thứ chín trong Vũ trụ Điện ảnh Marvel do Marvel Studios sản xuất,
        chia sẻ tính liên tục với các phim của loạt phim.', 1, 'Secret-Invasion5024.jpg', 25, 'phimle', 5, 4, 'cuoc-xam-luoc-bi-mat', 0, 0, 0, '2023-06-28 21:50:08', '2023-06-28 21:50:08', NULL, 'Phim Chính Kịch,
        Phim Hành Động, Phim Khoa Học', 1, 0, 6, NULL),
(83, 'The Idol', '56 phút', 'The Idol 2023', '_FelvYr_k2g', 'The Idol (Jennie Ruby Jane / Blackpink) là một bộ phim truyền hình dài tập của Mỹ được tạo ra bởi Abel “The Weeknd” Tesfaye,
        Reza Fahim và Sam Levinson.\r\n\r\nLoạt phim tập trung vào một thần tượng nhạc pop đầy tham vọng ( Lily-Rose Depp ) và mối quan hệ phức tạp của cô với một bậc thầy tự lực và thủ lĩnh giáo phái Tedros (Tesfaye). Xuất hiện với các vai phụ là Suzanna Son,
        Troye Sivan, Moses Sumney, Jane Adams, Dan Levy, Jennie Ruby Jane, Eli Roth, Rachel Sennott, Hari Nef, Da’Vine
        Joy Randolph, Mike Dean,
        Ramsey và Hank Azaria', 1, 'the-idol4343.jpg', 25, 'phimbo', 5, 4, 'the-idol', 1, 0, 0, '2023-06-28 21:52:40', '2023-06-28 21:52:40', NULL, 'Phim Chính Kịch,
        Phim Tâm Lý', NULL, 0, 6, NULL),
(84, 'Hiệp Sĩ Áo Đen', '62 phút', 'Black Knight 2023', 'Se26Op9sEC8', 'Hiệp Sĩ Áo Đen – Black Knight (2023) ở tương lai tăm tối bị ô nhiễm không khí tàn phá,
        chuyện sống còn của loài người phụ thuộc vào nhóm Hiệp sĩ áo đen và họ khác xa những người giao hàng bình thường.', 1, 'hiep-si-ao-den4772.jpg', 42, 'phimbo', 5, 8, 'hiep-si-ao-den', 1, 0, 0, '2023-06-28 21:55:32', '2023-06-28 21:55:32', NULL, 'Phim Chính Kịch,
        Phim Hành Động, Phim Khoa Học', 0, 0, 6, NULL),
(85, 'Bạn Trai Tôi Là Hồ Ly 2', '45 phút', 'Tale of the Nine Tailed 1938 2023', 'UIp2o2wOtzY', 'Bạn Trai Tôi Là Hồ Ly 2 – Tale of the Nine Tailed 1938 (2023) lấy bối cảnh vào năm 1930,
        kể về quá trình Lee Yeon (Lee Dong Wook) trở thành người thống trị ngọn núi và câu chuyện về Lee Rang (Kim Bum) không được tiết lộ trong phần trước.\r\n\r\nKim Soyeon sẽ vào vai Ryu Hongju,
        người được đồn đại là trẻ mãi không già. Ryu Hongju là chủ của một nhà hàng sang trọng ở Gyeongseong (tên cũ của thành phố Seoul) và là người từng là người cai quản ngọn núi phía tây. Ryu Hongju và Lee Yeon là 2 trong 4 chúa sơn lâm trên Bán đảo Triều Tiên!!', 1, 'Ban-Trai-Toi-La-Ho-Ly-2-20239677.jpg', 25, 'phimbo', 5, 8, 'ban-trai-toi-la-ho-ly-2', 0, 0, 0, '2023-06-28 21:58:10', '2023-06-28 21:58:10', NULL, 'Phim Bí Ẩn,
        Phim Chính Kịch, Phim Tâm Lý, Phim Tình Cảm', 2, 0, 12, NULL),
(86, 'Công Tố Tinh Anh', '55 phút', 'Prosecution Elite 2023', 'gJ6l70w9xMQ', 'Công Tố Tinh Anh – Prosecution Elite (2023) nói về nữ kiểm sát viên An Nị của viện Kiểm sát Giang Thành nhận được chỉ thị của kiểm sát trưởng là Hứa Ái Lâm,
        tham gia trước thời hạn vào việc điều tra một vụ án mất tích và nhảy cầu “tự sát” của sinh viên đại học. Trong quá trình điều tra,
        cô đã phát hiện ra một phần mềm livestream “Tháp ngà” đang lợi dụng phần Back-end trong trò chơi của Huệ Quyền. An Nị đã bắt tay vào điều tra từ những hành vi phạm pháp của tổng giám đốc mảng game của Huệ Quyền là Triệu Ký Khải,
        rà soát mối quan hệ của người này với tổ chức chuyên livestream bắt nạt người khác ở nước ngoài,
        cuối cùng đã bắt gọn những phần tử tội phạm của phần mềm “Tháp ngà” này.\r\n\r\nSau sự việc,
        giá cổ phiếu của tập đoàn Huệ Quyền giảm mạnh,
        khiến chủ tịch của tập đoàn là Doãn Huệ Quyền phải lấy danh nghĩa làm từ thiện để quyên góp tiền cho “Học viện Giang Hiếu”,
        một nơi chuyên dùng thủ đoạn bất hợp pháp để ngược đãi trẻ vị thành niên. Nhờ có nhiều học sinh trong trường như Lý Hiểu Văn chịu đứng ra vạch trần việc nhà trường dùng thủ đoạn bất hợp pháp để khống chế học sinh,
        nên khi vụ việc được xét xử trên tòa án, An Nị đã đưa ra được bằng chứng xác đáng, khiến “Học viện Giang Hiếu”
        phải đóng cửa.\r\n\r\nNhững người có liên quan đều bị xử lý theo pháp luật.Nghiêm Tần,
        người tiếp quản mảng game của tập đoàn Huệ Quyền,
        đã biển thủ của công để đầu tư vào việc khai thác quặng đồng. Tuy nhiên,
        dự án đầu tư này chỉ là một hình thức lừa đảo theo mô hình Ponzi do tổ chức tội phạm lừa đảo tài chính trên mạng thiết lập nên. An Nị lại mang theo đầy đủ bằng chứng để ra nước ngoài,
        tiến hành một phiên tòa xuyên quốc gia. Nhờ sự hợp tác giữa cơ quan tư pháp Trung Quốc và nước ngoài,
        Tiền Thiêm Tín đã bị trục xuất về nước,
        toàn bộ tài sẩn của hắn cũng bị phong tỏa.', 1, 'Cong-To-Tinh-Anh4343.jpg', 25, 'phimbo', 5, 7, 'cong-to-tinh-anh', 0, 0, 0, '2023-06-28 22:01:40', '2023-06-28 22:01:40', NULL, 'Phim Bí Ẩn,
        Phim Chính Kịch, Phim Kịch Tính, Phim Tâm Lý', 1, 0, 15, NULL),
(87, 'Soi Sáng Cho Em', '30 phút', 'A Date With the Future 2023', 'o4gorkpFgbs', 'Soi Sáng Cho Em – A Date With The Future xoay quanh mối tình sâu sắc của Từ Lai và Cận Thời Xuyên. Mười năm trước,
        Từ Lai bị mắc kẹt trong một trận động đất và được cứu bởi lính cứu hoả Cận Thời Xuyên cùng chú chó tìm kiếm cứu nạn “Truy Phong”. Để xoa dịu Từ Lai đang bị thương,
        Cận Thời Xuyên đã hứa với cô hẹn ước mười năm.\r\n\r\nMười năm sau, Từ Lai kết thúc chương trình học,
        quay về nước,
        trở thành một cô phóng viên kiêm huấn luyện viên chó quốc tế. Sau nhiều lần tiếp xúc trong những tình huống khẩn cấp,
        cùng nhau trải qua thử thách sinh tử,
        họ nhận ra tình cảm dành cho nhau.', 1, 'Soi-Sang-Cho-Em1936.jpg', 25, 'phimbo', 5, 7, 'soi-sang-cho-em', 0, 0, 0, '2023-06-28 22:04:27', '2023-06-28 22:04:27', NULL, 'Phim Chính Kịch,
        Phim Tâm Lý, Phim Tình Cảm', 0, 0, 36, NULL),
(88, 'Ngôi Trường Bí Ẩn', '40 phút', 'Home School 2023', 'JrkJHCCyjlw', 'Ngôi Trường Bí Ẩn – Home School (2023) xoay quanh một ngôi trường nội trú nằm giữa một khu rừng hẻo lánh. Ba năm một lần,
        trường chọn những học sinh mới đáp ứng các tiêu chí của họ,
        mỗi thế hệ bao gồm không quá mười ba học sinh. Các sinh viên dành tổng cộng ba năm tại trường.\r\n\r\nNgôi trường nhằm thu hút những sinh viên giàu có với chương trình giảng dạy độc đáo và tất cả những tiện nghi như ở nhà. Tuy nhiên,
        Home School có vẻ giống một nhà tù hơn là một trường học với những quy tắc nghiêm ngặt và sự cô lập hoàn toàn.', 1, 'ngoi-truong-bi-an41.jpg', 25, 'phimbo', 5, 10, 'ngoi-truong-bi-an', 0, 0, 0, '2023-06-28 22:08:15', '2023-06-28 22:08:15', NULL, 'Phim Bí Ẩn,
        Phim Kịch Tính, Phim Kinh Dị, Phim Tâm Lý', 2, 0, 8, NULL),
(89, 'Qua Ô Cửa Sổ: Phần 2', '110', 'Through My Window: Across the Sea (2023)', '5LvVaQPNqHU', 'Qua Ô Cửa Sổ: Phần 2 – Through My Window: Across the Sea (2023) sau một năm xa cách,
        Raquel và Ares đoàn tụ trong chuyến đi biển ướt át. Đối mặt với những lời tán tỉnh mới mẻ và nỗi bất an,
        liệu tình yêu của họ có thắng thế?', 1, 'qua-o-cua-so-21071.jpg', 42, 'phimle', 5, 4, 'qua-o-cua-so-phan-2', 1, 0, 0, '2023-06-28 22:11:02', '2023-06-28 22:11:02', NULL, 'Phim Chính Kịch,
        Phim Netflix, Phim Tâm Lý', 1, 0, 1, NULL),
(90, 'Black Clover: Thanh Kiếm Của Ma Pháp Vương', '113', 'Black Clover: Sword of the Wizard King 2023', '6g3xi65r80o', 'Black Clover: Thanh Kiếm Của Ma Pháp Vương – Black Clover: Sword of the Wizard King (2023) khi một cậu bé không biết dùng ma thuật song có trái tim quả cảm cố giành danh hiệu Ma pháp Vương,
        bốn Ma pháp Vương bị trục xuất thời xưa quay lại để nghiền nát Vương quốc Clover.', 1, 'Black-Clover-Thanh-Kiem-cua-Ma-Phap-Vuong9791.jpg', 42, 'phimle', 4, 6, 'black-clover-thanh-kiem-cua-ma-phap-vuong', 0, 0, 0, '2023-06-28 22:13:10', '2023-06-28 22:13:10', NULL, 'Phim Hoạt Hình,
        Phim Netflix, Phim Viễn Tưởng', 0, 0, 1, NULL),
(91, 'Những Điều Tôi Chưa Từng: Phần 4', '58 phút', 'Never Have I Ever Season 4 2023', 'IemUKB4kCWM', 'Những Điều Tôi Chưa Từng: Phần 4 – Never Have I Ever Season 4 (2023) cuối cùng đã đến năm cuối cấp. Giữa những câu hỏi hóc búa về trường đại học,
        khủng hoảng bản sắc và mối tình khó quên,
        liệu Devi và nhóm đã sẵn sàng đối mặt với tương lai?', 1, 'Nhung-Dieu-Toi-Chua-Tung-Phan-4646.jpg', 42, 'phimbo', 5, 4, 'nhung-dieu-toi-chua-tung-phan-4', 0, 0, 0, '2023-06-28 22:15:27', '2023-06-28 22:15:27', NULL, 'Phim Chính Kịch,
        Phim Hài, Phim Netflix, Phim Tâm Lý', 2, 0, 10, NULL),
(92, 'FUBAR', '65 phút', 'FUBAR 2023', 'f6A56zcGeWE', 'FUBAR (2023) khi bộ đôi bố và con gái phát hiện ra cả hai đều bí mật làm việc cho CIA,
        nhiệm vụ nằm vùng vốn nguy hiểm bỗng trở thành chuyện gia đình đầy bi hài.', 1, 'FUBAR5397.jpg', 42, 'phimbo', 5, 4, 'fubar', 0, 0, 0, '2023-06-28 22:17:24', '2023-06-28 22:17:24', NULL, 'Phim Chính Kịch,
        Phim Hài, Phim Netflix', 0, 0, 8, NULL),
(93, 'Máu Và Vàng', '100 phút', 'Blood & Gold 2023', 'eDsrUYd2VbE', 'Máu Và Vàng – Blood & Gold (2023) trong giai đoạn cuối đầy tàn khốc của Thế chiến II,
        một viên lính đào ngũ người Đức và một phụ nữ trẻ bị kéo vào trận chiến đẫm máu với nhóm Đức Quốc xã đang săn lùng vàng bị giấu.', 1, 'ubsnl8tEVI4C7dZQansuRp4z8bJ2343.jpg', 42, 'phimbo', 5, 4, 'mau-va-vang', 0, 0, 0, '2023-06-28 22:21:05', '2023-06-28 22:21:05', NULL, 'Phim Chính Kịch,
        Phim Hành Động, Phim Netflix', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(63, 57, 9),
(64, 57, 42),
(65, 58, 42),
(66, 58, 44),
(67, 58, 46),
(68, 58, 54),
(69, 59, 8),
(70, 59, 11),
(71, 59, 53),
(72, 60, 11),
(73, 60, 46),
(74, 60, 55),
(75, 60, 56),
(76, 61, 11),
(77, 61, 52),
(78, 61, 53),
(79, 61, 55),
(80, 62, 11),
(81, 62, 52),
(82, 62, 55),
(83, 62, 56),
(84, 63, 11),
(85, 63, 42),
(86, 63, 46),
(87, 63, 56),
(88, 64, 11),
(89, 64, 52),
(90, 64, 53),
(91, 64, 55),
(92, 64, 56),
(93, 65, 11),
(94, 65, 46),
(95, 65, 55),
(96, 66, 8),
(97, 66, 11),
(98, 66, 46),
(99, 66, 56),
(100, 67, 3),
(101, 67, 11),
(102, 67, 13),
(103, 67, 56),
(104, 68, 52),
(105, 68, 53),
(106, 68, 55),
(107, 69, 42),
(108, 69, 54),
(109, 69, 55),
(110, 70, 9),
(111, 70, 42),
(112, 70, 55),
(113, 71, 3),
(114, 71, 52),
(115, 71, 55),
(116, 72, 52),
(117, 72, 53),
(118, 72, 55),
(119, 73, 42),
(120, 73, 44),
(121, 73, 54),
(122, 74, 3),
(123, 74, 52),
(124, 74, 55),
(125, 75, 42),
(126, 75, 46),
(127, 75, 54),
(128, 76, 42),
(129, 76, 44),
(130, 76, 46),
(131, 77, 52),
(132, 77, 53),
(133, 77, 55),
(134, 77, 56),
(135, 78, 3),
(136, 78, 52),
(137, 78, 55),
(138, 78, 56),
(139, 79, 42),
(140, 79, 52),
(141, 79, 55),
(142, 80, 46),
(143, 80, 52),
(144, 80, 55),
(145, 81, 3),
(146, 81, 42),
(147, 81, 55),
(148, 82, 42),
(149, 82, 54),
(150, 82, 56),
(151, 83, 3),
(152, 83, 56),
(153, 84, 42),
(154, 84, 54),
(155, 84, 56),
(156, 85, 3),
(157, 85, 13),
(158, 85, 53),
(159, 85, 56),
(160, 86, 3),
(161, 86, 53),
(162, 86, 55),
(163, 86, 56),
(164, 87, 3),
(165, 87, 13),
(166, 87, 56),
(167, 88, 3),
(168, 88, 52),
(169, 88, 53),
(170, 88, 55),
(171, 89, 3),
(172, 89, 56),
(173, 90, 46),
(174, 91, 3),
(175, 91, 8),
(176, 91, 56),
(177, 92, 8),
(178, 92, 56),
(179, 93, 42),
(180, 93, 56);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('lebuihoangvan@gmail.com', '$2y$10$NYGgLxR3JO1q/uzVHRvzheUvhP8iw7Hu6oA0Q1h89wGWEEJ09RMB.', '2023-05-06 01:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Văn', 'lebuihoangvan@gmail.com', NULL, '$2y$10$DynIryS8KZKCvBcGj5/92.3cBJcdCMhzfnQyxmVPDlT3PThbabLh6', 'xdGs74SSmVpAnH2s0uKH36bxdYKwqGqAQb6XewzJ9GLptd5i7fECZDrrFGdx', '2023-05-06 01:04:21', '2023-06-19 10:26:10'),
(2, 'Lê Bùi Hoàng Văn', 'Vankuner0605@gmail.com', NULL, '$2y$10$bJxSMJMU7aQo1tFEULx0vOVOtRLeDMNBTZoT0cG0EiRYoaXN/3qq.', NULL, '2023-06-05 07:35:00', '2023-06-05 07:35:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`country_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
