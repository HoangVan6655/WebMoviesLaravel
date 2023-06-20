-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 20, 2023 lúc 07:58 PM
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
       (2, 'Phim Chiếu Rạp', 'Phim chiếu rạp được cập nhật hằng ngày', 1, 'phim-chieu-rap', 3),
       (25, 'Phim Bộ', 'Phim bộ cập nhật hằng ngày', 1, 'phim-bo', 1),
       (26, 'Phim Lẻ', 'Phim lẻ cập nhật thường xuyên', 1, 'phim-le', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
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
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `icon`, `description`, `status`, `slug`, `position`)
VALUES (1, 'Việt Nam', 'vn', 'Cập nhật các phim Việt Nam thường xuyên', 1, 'viet-nam', 0),
       (3, 'Ấn Độ', 'in', 'Cập nhật các phim Ấn Độ thường xuyên', 1, 'an-do', 8),
       (4, 'Mỹ', 'us', 'Cập nhật các phim Mỹ thường xuyên', 1, 'my', 1),
       (5, 'Hồng Kông', 'hk', 'Cập nhật các phim Hồng Kông thường xuyên', 1, 'hong-kong', 2),
       (6, 'Nhật Bản', 'jp', 'Cập nhật các phim Nhật Bản thường xuyên', 1, 'nhat-ban', 3),
       (7, 'Trung Quốc', 'cn', 'Cập nhật các phim Trung Quốc thường xuyên', 1, 'trung-quoc', 4),
       (8, 'Hàn Quốc', 'kr', 'Cập nhật các phim Hàn Quốc thường xuyên', 1, 'han-quoc', 5),
       (9, 'Đài Loan', 'tw', 'Cập nhật các phim Đài Loan thường xuyên', 1, 'dai-loan', 6),
       (10, 'Thái Lan', 'th', 'Cập nhật các phim Thái Lan thường xuyên', 1, 'thai-lan', 7),
       (11, 'Philippin', 'ph', 'Cập nhật các phim Philippin thường xuyên', 1, 'philippin', 9),
       (16, 'Indonesia', 'id', 'Cập nhật các phim Indonesia thường xuyên', 1, 'indonesia', 10);

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
VALUES (28, 57,
        '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/eoOaKN4qCKw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>',
        'HD', '2023-06-10 22:00:28', '2023-06-10 22:00:28');

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
VALUES (3, 'Tâm Lý', 'Những bộ phim tâm lý được cập nhật thường xuyên', 1, 'tam-ly', 1),
       (6, 'Hoạt Hình', 'Những bộ phim hoạt hình được cập nhật thường xuyên', 1, 'hoat-hinh', 7),
       (8, 'Hài Hước', 'Những bộ phim hài hước được cập nhật thường xuyên', 1, 'hai-huoc', 9),
       (9, 'Hình Sự', 'Những bộ phim hình sự được cập nhật thường xuyên', 1, 'hinh-su', 8),
       (10, 'Võ Thuật', 'Những bộ phim võ thuật được cập nhật thường xuyên', 1, 'vo-thuat', 3),
       (11, 'Cổ Trang', 'Những bộ phim cổ trang được cập nhật thường xuyên', 1, 'co-trang', 0),
       (12, 'Phim Ma', 'Những bộ phim ma được cập nhật thường xuyên', 1, 'phim-ma', 12),
       (13, 'Tình Cảm', 'Những bộ phim tình cảm được cập nhật thường xuyên', 1, 'tinh-cam', 2),
       (14, 'Thể Thao - Âm Nhạc', 'Những bộ phim thể thao - âm nhạc được cập nhật thường xuyên', 1, 'the-thao-am-nhac',
        15),
       (15, 'Thần Thoại', 'Những bộ phim thần thoại được cập nhật thường xuyên', 1, 'than-thoai', 14),
       (18, 'Gia Đình', 'Những bộ phim gia đình được cập nhật thường xuyên', 1, 'gia-dinh', 6),
       (19, 'Chiến Tranh', 'Những bộ phim chiến tranh được cập nhật thường xuyên', 1, 'chien-tranh', 5),
       (20, '18+', 'Những bộ phim 18+ được cập nhật thường xuyên', 1, '18', 4),
       (42, 'Hành Động', 'Cập nhật các phim hành động', 1, 'hanh-dong', 16);

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
    `SoTap`         int(11) NOT NULL DEFAULT 1,
    `count_views`   int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `ThoiLuong`, `name_original`, `trailer`, `description`, `status`, `image`,
                      `category_id`, `ThuocPhim`, `genre_id`, `country_id`, `slug`, `movie_hot`, `resolution`, `phude`,
                      `NgayTao`, `NgayCapNhat`, `year`, `tags`, `topview`, `season`, `SoTap`, `count_views`)
VALUES (48, 'Vệ Binh Dải Ngân Hà 3 Vệ Binh Dải Ngân Hà 3', '150 phút',
        'Guardians of the Galaxy Volume 3 2023 Guardians of the Galaxy Volume 3 2023', 'JqcncLPi9zw',
        'Vệ Binh Dải Ngân Hà 3 – Guardians of the Galaxy Volume 3 (2023) sau khi mua Knowhere từ The Collector, đội Vệ binh dải Ngân Hà cố gắng biến nó thành nơi trú ẩn an toàn cho những người tị nạn sau cú búng tay di dời. Nhưng sau một cuộc tấn công tàn bạo, Peter Quill, vẫn cảm xúc vì mất Gamora, phải tập hợp các Vệ binh để thực hiện sứ mệnh bảo vệ vũ trụ và bảo vệ một người trong số họ khỏi kẻ thù chung nguy hiểm.',
        1, 'Ve-Binh-Dai-Ngan-Ha-39224.jpg', 2, 'phimbo', 1, 4, 've-binh-dai-ngan-ha-3', 1, 4, 0, NULL,
        '2023-06-10 12:26:12', '2023',
        'Phim The Guardians Of The Galaxy Vol.3, Phim Vệ Binh Dải Ngân Hà 3, The Guardians Of The Galaxy Vol.3, The Guardians Of The Galaxy Vol.3 Vietsub, Vệ Binh Dải Ngân Hà 3, Vệ Binh Dải Ngân Hà 3 Vietsub',
        2, 3, 10, 123126),
       (49, 'hoàng văn', '50 phút/tập', 'hoang van', 'JqcncLPi9zw', 'hoàng văn', 1, 'John-Wick-447.jpg', 25, 'phimbo',
        3, 1, 'hoang-van', 1, 3, 1, NULL, '2023-06-10 17:31:45', NULL, NULL, 0, 0, 1, 12317),
       (57, 'Quá Nhanh Quá Nguy Hiểm 10', '150 phút', 'Fast And Furious 10 2023', 'eoOaKN4qCKw',
        'Quá Nhanh Quá Nguy Hiểm 10 – Fast and Furious 10 (2023) xoay quanh việc Dom Toretto cùng gia đình anh ấy đã trở thành mục tiếu tấn công bởi chính con trai ông trùm ma túy, kẻ trước đây bị X 10 tiêu diệt. Mời các bạn cùng đón xem bộ phim Quá Nhanh Quá Nguy Hiểm 10 – Fast X cực hấp dẫn này.',
        1, 'Qua-Nhanh-Qua-Nguy-Hiem-10-20234038.jpg', 2, 'phimle', 4, 4, 'qua-nhanh-qua-nguy-hiem-10', 1, 4, 0,
        '2023-06-10 21:57:43', '2023-06-10 21:58:41', '2023', 'Quá nhanh quá nguy hiểm, Fast and Furios', 0, 10, 1, 96);

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
VALUES (42, 49, 3),
       (49, 49, 6),
       (50, 49, 8),
       (51, 49, 9),
       (52, 49, 10),
       (53, 49, 11),
       (54, 49, 12),
       (55, 49, 13),
       (56, 49, 14),
       (57, 49, 15),
       (59, 49, 18),
       (60, 49, 19),
       (61, 49, 20),
       (63, 57, 9),
       (64, 57, 42);

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
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating`
(
    `id`         int(11) NOT NULL,
    `rating`     int(11) NOT NULL,
    `movie_id`   int(11) NOT NULL,
    `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
VALUES (1, 'Hoàng Văn', 'lebuihoangvan@gmail.com', NULL, '$2y$10$DynIryS8KZKCvBcGj5/92.3cBJcdCMhzfnQyxmVPDlT3PThbabLh6',
        'xdGs74SSmVpAnH2s0uKH36bxdYKwqGqAQb6XewzJ9GLptd5i7fECZDrrFGdx', '2023-05-06 01:04:21', '2023-06-19 10:26:10'),
       (2, 'Lê Bùi Hoàng Văn', 'Vankuner0605@gmail.com', NULL,
        '$2y$10$bJxSMJMU7aQo1tFEULx0vOVOtRLeDMNBTZoT0cG0EiRYoaXN/3qq.', NULL, '2023-06-05 07:35:00',
        '2023-06-05 07:35:00');

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
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int (10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
