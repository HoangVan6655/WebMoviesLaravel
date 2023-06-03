-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 02, 2023 lúc 07:21 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

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
-- Cơ sở dữ liệu: `WebMovies`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
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
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`)
VALUES (1, 'Phim Mới', 'Phim mới cập nhật hằng ngày', 1, 'phim-moi', 0),
       (2, 'Phim Chiếu Rạp', 'Phim chiếu rạp được cập nhật hằng ngày', 1, 'phim-chieu-rap', 1),
       (3, 'Phim Thuyết Minh', 'Phim thuyết minh cập nhật hằng ngày', 1, 'phim-thuyet-minh', 4),
       (4, 'Phim Bộ', 'Phim bộ được cập nhật hằng ngày', 1, 'phim-bo', 2),
       (5, 'Phim Lẻ Mới', 'Phim lẻ mới được cập nhật thường xuyên', 1, 'phim-le-moi', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries`
(
    `id`          int(11) NOT NULL,
    `title`       varchar(100) NOT NULL,
    `description` varchar(255) NOT NULL,
    `status`      int(11) NOT NULL,
    `slug`        varchar(255) NOT NULL,
    `position`    int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`, `position`)
VALUES (1, 'Việt Nam', 'Cập nhật các phim Việt Nam thường xuyên', 1, 'viet-nam', 0),
       (3, 'Ấn Độ', 'Cập nhật các phim Ấn Độ thường xuyên', 1, 'an-do', 8),
       (4, 'Mỹ', 'Cập nhật các phim Mỹ thường xuyên', 1, 'my', 1),
       (5, 'Hồng Kông', 'Cập nhật các phim Hồng Kông thường xuyên', 1, 'hong-kong', 2),
       (6, 'Nhật Bản', 'Cập nhật các phim Nhật Bản thường xuyên', 1, 'nhat-ban', 3),
       (7, 'Trung Quốc', 'Cập nhật các phim Trung Quốc thường xuyên', 1, 'trung-quoc', 4),
       (8, 'Hàn Quốc', 'Cập nhật các phim Hàn Quốc thường xuyên', 1, 'han-quoc', 5),
       (9, 'Đài Loan', 'Cập nhật các phim Đài Loan thường xuyên', 1, 'dai-loan', 6),
       (10, 'Thái Lan', 'Cập nhật các phim Thái Lan thường xuyên', 1, 'thai-lan', 7),
       (11, 'Philippin', 'Cập nhật các phim Philippin thường xuyên', 1, 'philippin', 9),
       (14, 'Nga', 'Cập nhật các phim Nga thường xuyên', 1, 'nga', 11),
       (16, 'Indonesia', 'Cập nhật các phim Indonesia thường xuyên', 1, 'indonesia', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
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
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim`, `episode`, `updated_at`, `created_at`)
VALUES (1, 48,
        '<iframe width=\"80%\" height=\"500\" src=\"https://www.youtube.com/embed/89aYxQcGGA4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        'FullHD', '2023-05-31 17:23:19', '2023-05-31 17:23:19'),
       (2, 32,
        '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/BbH2bLqRaDc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        '1', '2023-05-31 17:26:16', '2023-05-31 17:26:16'),
       (3, 32,
        '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/BbH2bLqRaDc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        '2', '2023-05-31 21:50:29', '2023-05-31 21:50:29'),
       (4, 32,
        '<iframe width=\"90%\" height=\"500\" src=\"https://www.youtube.com/embed/BbH2bLqRaDc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        '3', '2023-05-31 17:26:32', '2023-05-31 17:26:32'),
       (6, 32,
        '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/BbH2bLqRaDc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        '4', '2023-05-31 20:07:06', '2023-05-31 20:07:06'),
       (8, 42,
        '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/BbH2bLqRaDc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        '1', '2023-06-01 11:07:15', '2023-06-01 11:07:15'),
       (9, 31,
        '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GpmY5HOK55k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        'FullHD', '2023-06-01 15:35:11', '2023-06-01 15:35:11'),
       (10, 48,
        '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/BbH2bLqRaDc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        'HD', '2023-06-01 16:18:20', '2023-06-01 16:18:20'),
       (11, 32,
        '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/BbH2bLqRaDc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        '5', '2023-06-01 21:26:41', '2023-06-01 21:26:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `genres`
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
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`, `position`)
VALUES (1, 'Hành Động', 'Những bộ phim hành động được cập nhật thường xuyên', 1, 'hanh-dong', 0),
       (3, 'Tâm Lý', 'Những bộ phim tâm lý được cập nhật thường xuyên', 1, 'tam-ly', 1),
       (5, 'Viễn Tưởng', 'Những bộ phim viễn tưởng được cập nhật thường xuyên', 1, 'vien-tuong', 2),
       (6, 'Hoạt Hình', 'Những bộ phim hoạt hình được cập nhật thường xuyên', 1, 'hoat-hinh', 3),
       (7, 'Kinh Dị', 'Những bộ phim kinh dị được cập nhật thường xuyên', 1, 'kinh-di', 4),
       (8, 'Hài Hước', 'Những bộ phim hài hước được cập nhật thường xuyên', 1, 'hai-huoc', 5),
       (9, 'Hình Sự', 'Những bộ phim hình sự được cập nhật thường xuyên', 1, 'hinh-su', 6),
       (10, 'Võ Thuật', 'Những bộ phim võ thuật được cập nhật thường xuyên', 1, 'vo-thuat', 7),
       (11, 'Cổ Trang', 'Những bộ phim cổ trang được cập nhật thường xuyên', 1, 'co-trang', 8),
       (12, 'Phim Ma', 'Những bộ phim ma được cập nhật thường xuyên', 1, 'phim-ma', 9),
       (13, 'Tình Cảm', 'Những bộ phim tình cảm được cập nhật thường xuyên', 1, 'tinh-cam', 10),
       (14, 'Thể Thao - Âm Nhạc', 'Những bộ phim thể thao - âm nhạc được cập nhật thường xuyên', 1, 'the-thao-am-nhac',
        11),
       (15, 'Thần Thoại', 'Những bộ phim thần thoại được cập nhật thường xuyên', 1, 'than-thoai', 12),
       (16, 'Tài Liệu', 'Những bộ phim tài liệu được cập nhật thường xuyên', 1, 'tai-lieu', 13),
       (17, 'Phiêu Lưu', 'Những bộ phim phiêu lưu được cập nhật thường xuyên', 1, 'phieu-luu', 14),
       (18, 'Gia Đình', 'Những bộ phim gia đình được cập nhật thường xuyên', 1, 'gia-dinh', 15),
       (19, 'Chiến Tranh', 'Những bộ phim chiến tranh được cập nhật thường xuyên', 1, 'chien-tranh', 16),
       (20, '18+', 'Những bộ phim 18+ được cập nhật thường xuyên', 1, '18', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations`
(
    `id`        int(10) UNSIGNED NOT NULL,
    `migration` varchar(255) NOT NULL,
    `batch`     int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (1, '2014_10_12_000000_create_users_table', 1),
       (2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
       (3, '2019_08_19_000000_create_failed_jobs_table', 1),
       (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
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
    `SoTap`         int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `ThoiLuong`, `name_original`, `trailer`, `description`, `status`, `image`,
                      `category_id`, `ThuocPhim`, `genre_id`, `country_id`, `slug`, `movie_hot`, `resolution`, `phude`,
                      `NgayTao`, `NgayCapNhat`, `year`, `tags`, `topview`, `season`, `SoTap`)
VALUES (28, 'Vương Hậu: Charlotte: Câu Chuyện Bridgerton', '50 phút/tập', 'Queen Charlotte: A Bridgerton Story 2023',
        NULL,
        'Tóm tắt\r\nVương Hậu: Charlotte: Câu Chuyện Bridgerton – Queen Charlotte: A Bridgerton Story (2023) trong tiền truyện này của “Bridgerton”, cuộc hôn nhân của vương hậu trẻ Charlotte với quốc vương George của nước Anh mở ra một chuyện tình ấn tượng và biến đổi xã hội thượng lưu.',
        1, 'Vuong-Hau-Charlotte1120.jpg', 4, 'phimbo', 3, 4, 'vuong-hau-charlotte-cau-chuyen-bridgerton', 1, 0, 0, NULL,
        '2023-05-23 23:17:08', NULL, NULL, NULL, 0, 1),
       (29, 'Học Viện Đào Tạo Ngôi Sao', '50 phút/tập', 'House of Stars the Series 2023', NULL,
        'Tóm tắt\r\nHọc Viện Đào Tạo Ngôi Sao – House of Stars (2023) mỗi căn nhà đều có những quy tắc riêng. Vậy nếu đó là căn nhà của một người quản lý của các ngôi sao hàng đầu, nơi mà nhiều diễn viên hàng đầu đều tập trung.\r\n\r\nHọ phải sống chung với nhau dưới những quy tắc và cạnh tranh cho công việc của mình. Trái tim và khát vọng của họ đều mong muốn trở thành số một trong ngành công nghiệp. Nhưng luôn có một bí mật đằng sau màn đêm. Liệu họ có thể kiềm chế những khao khát trong đầu? Liệu họ có thể giấu kín những bí mật của chính mình?',
        1, 'House-of-Stars-the-Series3240.jpg', 4, 'phimbo', 3, 7, 'hoc-vien-dao-tao-ngoi-sao', 1, 0, 0, NULL,
        '2023-05-23 23:17:22', NULL, NULL, NULL, 0, 0),
       (30, 'La Pluie: Cơn Mưa Khi Ấy, Em Yêu Anh', '50 phút/tập', 'La Pluie The Series 2023', NULL,
        'Tóm tắt\r\nLa Pluie: Cơn Mưa Khi Ấy, Em Yêu Anh – La Pluie The Series (2023) kể về câu chuyện của “Phat” và “Saeng Tai”, cặp đôi được định mệnh gắn kết bởi cơn mưa cùng nhiều câu chuyện tình cờ xảy đến giữa bầu không khí mưa gió để khẳng định rằng dưới hôm mưa ấy, ta yêu nhau.',
        1, 'La-Pluie7559.jpg', 4, 'phimbo', 3, 7, 'la-pluie-con-mua-khi-ay-em-yeu-anh', 1, 0, 1, NULL,
        '2023-05-23 23:17:31', NULL, NULL, NULL, 0, 1),
       (31, 'Cậu Bé Gạc Nai Phần 2', '', 'Sweet Tooth Season 2 2023', NULL,
        'Tóm tắt\r\nCậu Bé Gạc Nai Phần 2 – Sweet Tooth Season 2 (2023) trong hành trình phiêu lưu đầy hiểm nguy trên khắp thế giới hậu tận thế, cậu bé nửa người nửa nai đáng yêu tìm kiếm khởi đầu mới cùng một người bảo vệ cộc cằn.',
        1, 'Cau-be-gac-nai-phan-24534.jpg', 4, 'phimle', 5, 4, 'cau-be-gac-nai-phan-2', 1, 0, 0, NULL, NULL, NULL, NULL,
        NULL, 0, 1),
       (32, 'Học Kỳ Sinh Tử', NULL, 'Duty After School 2023', 'BbH2bLqRaDc',
        'Học Kỳ Sinh Tử – Duty After School (2023) dựa trên webcomic “Duty After School” của Ha Il-Kwon, lấy bối cảnh Hàn Quốc bị tấn công bởi những sinh vật lạ từ trên trời rơi xuống, gây ra thảm họa thương vong toàn quốc. Để giúp đỡ các lực lượng quân sự, chính phủ Hàn chỉ định tất cả các sinh viên cũng như học sinh trung học phải trở thành quân dự bị. Thay vì ngòi bút, nay học sinh Hàn Quốc phải cầm vũ khí để tiêu diệt những sinh vật này.',
        1, 'Duty-After-School8702.jpg', 4, 'phimbo', 1, 8, 'hoc-ky-sinh-tu', 1, 0, 0, NULL, '2023-05-31 17:25:35',
        '2023', NULL, NULL, 0, 16),
       (33, 'Lính Bắn Tỉa Siberia', '', 'Siberian Sniper 2021', NULL,
        'Tóm tắt\r\nLính Bắn Tỉa Siberia – Siberian Sniper (2021) trong thời kỳ đỉnh cao của Thế chiến thứ hai, người lính bắn tỉa cuối cùng còn sống sót của một đơn vị Liên Xô được cử đi thực hiện một nhiệm vụ liều chết nhằm phá vỡ một thành trì của Đức để cứu những người lính của mình.',
        1, 'Siberian-Sniper8777.jpg', 5, 'phimbo', 19, 14, 'linh-ban-tia-siberia', 0, 1, 0, NULL, NULL, NULL, NULL,
        NULL, 0, 1),
       (38, 'Người Mẹ Sát Thủ', '', 'The Mother 2023', NULL,
        'Tóm tắt\r\nNgười Mẹ Sát Thủ – The Mother (2023) một sát thủ được đào tạo trong quân đội phải ra mặt để bảo vệ cô con gái mà cô chưa từng gặp khỏi bọn tội phạm tàn nhẫn muốn trả thù.',
        1, 'The-mother-20235612.jpg', 5, 'phimbo', 1, 4, 'nguoi-me-sat-thu', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, 0,
        1),
       (40, 'Tay Sai Của Quỷ', '', 'Renfield 2023', NULL,
        'Tóm tắt\r\nTay Sai Của Quỷ – Renfield (2023) Renfield phát ốm vì mối quan hệ đồng phụ thuộc kéo dài hàng thế kỷ với Dracula. Với hy vọng tạo dựng một cuộc sống mới ở thế giới con người, tại New Orleans thời hiện đại, cuộc sống của Renfield trở nên phức tạp hơn khi anh phải lòng một cảnh sát giao thông. Mà trong lúc đó, anh ta vẫn phải đối phó với những yêu cầu, đòi hỏi quái lạ từ Dracula – một ông chủ thực sự đến từ địa ngục.',
        1, 'Tay-Sai-Cua-Quy5373.jpg', 5, 'phimle', 7, 4, 'tay-sai-cua-quy', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0,
        1),
       (41, 'Nộ Hỏa', '', 'Raging Fire 2023', NULL,
        'Tóm tắt\r\nNộ Hỏa – Raging Fire (2023) kể về câu chuyện của đội trưởng Tề Vĩ Bân (do Hình Hãn Khanh thủ vai) và đội phó Trần Mẫn (do Lý Manh Manh thủ vai). Sau khi nhận được cuộc gọi báo cáo về vụ việc buôn bán ma túy, hai người họ dẫn theo các thành viên trong nhóm tiến hành một cuộc điều tra bí mật về mục tiêu bị nghi ngờ. và gặp gỡ các trùm ma túy Duẫn Khôn (do Cố Bân thủ vai) và Duẫn Dực (do Trữ Tiến thủ vai). Đây là một cuộc đấu trí và so gan trong công cuộc chống ma túy.\r\n\r\nTề Vĩ Bân lẻn vào khoang chở hàng khi nghi phạm đang chất hàng lên xe, bám theo chiếc xe đến sào huyệt sản xuất ma túy, lợi dụng địa hình hiểm trở phối hợp với đồng đội chờ cơ hội đột kích triệt phá nhà xưởng. Anh cứ ngỡ mình đã phá được trọng án, nhưng anh nào biết rằng tất cả những điều này là một âm mưu của xã hội đen. Đối mặt với việc bắt hụt anh em nhà họ Duẫn, đồng đội thì thương tích đầy mình, anh rơi vào vòng xoáy tự trách. Càng không ngờ rằng, Nghiêm Khang, một mục tiêu dài hạn khác vốn bị giám sát trong một thời gian dài lại đột ngột qua đời, lúc này, nguồn manh mối về vụ án ma túy ngầm Tân Hải bất ngờ bị gián đoạn. Qua điều tra, đội chống ma túy cuối cùng đã tìm ra điểm đột phá của vụ án, kẻ môi giới mới – Cá Chạch rơi vào diện tình nghi. Cá Chạch là ai? Ai mới là kẻ thực sự đứng đằng sau vụ án ma túy Tân Hải?',
        1, 'No-hoa8968.jpg', 5, 'phimbo', 1, 7, 'no-hoa', 0, 0, 0, NULL, NULL, NULL, NULL, 1, 0, 1),
       (42, 'Địch Nhân Kiệt: Vận Hà Kinh Long', '', 'Legend of Detective Dee 2023', NULL,
        'Tóm tắt\r\nĐịch Nhân Kiệt: Vận Hà Kinh Long – Legend of Detective Dee (2023) nói về hoàng hậu Võ Tắc Thiên và một trăm quan chức tuần tra Vận Hà vào ban đêm, hàng ngàn người ở Lạc Dương đã đổ xô đến chỉ để được nhìn thấy mặt Võ Tắc Thiên, không ngờ trong kênh xuất hiện một con quái vật hình rồng chạm với thuyền rồng.\r\n\r\nNgười dân Lạc Dương bàn tán rất nhiều, cho rằng đó là điềm gở. Như một dấu hiệu, Hoàng hậu Võ Tắc Thiên vô cùng tức giận, khẩn cấp gọi Địch Nhân Kiệt trở lại cung điện để điều tra kỹ lưỡng vụ án của Rồng xuất hiện ở sông. Địch Nhân Kiệt được giao một nhiệm vụ nguy hiểm, sử dụng trí thông minh và sức hút độc đáo của mình, không sợ quyền lực, không sợ hãi đối mặt với các vị thần và ma quỷ, vượt qua những cám dỗ để khám phá sự thật và tìm ra thủ phạm thực sự.',
        1, 'Dich-Nhan-Kiet-Van-Ha-Kinh-Long480.jpg', 5, 'phimbo', 5, 7, 'dich-nhan-kiet-van-ha-kinh-long', 0, 0, 0,
        NULL, NULL, NULL, NULL, 1, 0, 1),
       (48, 'Vệ Binh Dải Ngân Hà 3', '150 phút', 'Guardians of the Galaxy Volume 3 2023', 'JqcncLPi9zw',
        'Vệ Binh Dải Ngân Hà 3 – Guardians of the Galaxy Volume 3 (2023) sau khi mua Knowhere từ The Collector, đội Vệ binh dải Ngân Hà cố gắng biến nó thành nơi trú ẩn an toàn cho những người tị nạn sau cú búng tay di dời. Nhưng sau một cuộc tấn công tàn bạo, Peter Quill, vẫn cảm xúc vì mất Gamora, phải tập hợp các Vệ binh để thực hiện sứ mệnh bảo vệ vũ trụ và bảo vệ một người trong số họ khỏi kẻ thù chung nguy hiểm.',
        1, 'Ve-Binh-Dai-Ngan-Ha-39224.jpg', 2, 'phimle', 1, 4, 've-binh-dai-ngan-ha-3', 1, 4, 0, NULL,
        '2023-06-01 22:16:04', '2023',
        'Phim The Guardians Of The Galaxy Vol.3, Phim Vệ Binh Dải Ngân Hà 3, The Guardians Of The Galaxy Vol.3, The Guardians Of The Galaxy Vol.3 Vietsub, Vệ Binh Dải Ngân Hà 3, Vệ Binh Dải Ngân Hà 3 Vietsub',
        2, 3, 1),
       (49, 'hoàng văn', NULL, 'hoang van', NULL, 'hoàng văn', 1, 'meg-28566.jpg', 1, 'phimle', 5, 1, 'hoang-van', 1, 4,
        1, NULL, '2023-05-31 18:05:14', NULL, NULL, 0, 0, 1),
       (51, 'áđá', '120 phút', 'áđâsd', NULL, 'áđâsd', 1, 'John-Wick-43656.jpg', 1, 'phimle', 8, 1, 'ada', 1, 5, 0,
        '2023-05-22 22:54:03', '2023-06-01 14:48:05', '2023', NULL, 0, 0, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre`
(
    `id`       int(11) NOT NULL,
    `movie_id` int(11) NOT NULL,
    `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`)
VALUES (20, 51, 1),
       (21, 51, 3),
       (22, 51, 5),
       (23, 51, 6),
       (24, 51, 7),
       (25, 51, 8),
       (37, 32, 1),
       (38, 32, 3),
       (39, 32, 8),
       (40, 32, 13),
       (41, 49, 1),
       (42, 49, 3),
       (43, 49, 5),
       (44, 48, 1),
       (45, 48, 5),
       (46, 48, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens`
(
    `email`      varchar(255) NOT NULL,
    `token`      varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`)
VALUES ('lebuihoangvan@gmail.com', '$2y$10$NYGgLxR3JO1q/uzVHRvzheUvhP8iw7Hu6oA0Q1h89wGWEEJ09RMB.',
        '2023-05-06 01:04:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens`
(
    `id`             bigint(20) UNSIGNED NOT NULL,
    `tokenable_type` varchar(255) NOT NULL,
    `tokenable_id`   bigint(20) UNSIGNED NOT NULL,
    `name`           varchar(255) NOT NULL,
    `token`          varchar(64)  NOT NULL,
    `abilities`      text DEFAULT NULL,
    `last_used_at`   timestamp NULL DEFAULT NULL,
    `expires_at`     timestamp NULL DEFAULT NULL,
    `created_at`     timestamp NULL DEFAULT NULL,
    `updated_at`     timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users`
(
    `id`                bigint(20) UNSIGNED NOT NULL,
    `name`              varchar(255) NOT NULL,
    `email`             varchar(255) NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password`          varchar(255) NOT NULL,
    `remember_token`    varchar(100) DEFAULT NULL,
    `created_at`        timestamp NULL DEFAULT NULL,
    `updated_at`        timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`,
                     `updated_at`)
VALUES (1, 'Hoàng Văn', 'lebuihoangvan@gmail.com', NULL, '$2y$10$imwEcgEWkdJELCx8wvi1s.EZx2JVdbe6gHQppu8s.LuBFZBlG.bq2',
        'uLnorM8L3jKUpXbyBX8jyJC4woQxIwzWQQg5L11JVA3lxSjh7kIbx2gczMUa', '2023-05-06 01:04:21', '2023-05-06 01:04:21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
    ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
    ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`country_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
    ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `genre_id` (`genre_id`);

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
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int (10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `episodes`
--
ALTER TABLE `episodes`
    ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movies`
--
ALTER TABLE `movies`
    ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON
DELETE
CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
    ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON
DELETE
CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
