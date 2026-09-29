-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 29, 2026 lúc 05:23 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `koolnguyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_date` date NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `package`, `category_id`, `price`, `name`, `email`, `phone`, `booking_date`, `message`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Event & Golf', 3, '120.00', 'Thái Hoàng Anh', 'hoanganhlksvn@gmail.com', '0374466344', '2026-09-30', '4 person.', 'completed', '2026-09-28 01:48:21', '2026-09-28 01:49:08'),
(4, 'Personal', 4, '75.00', 'Thái Hoàng Anh', 'hoanganhlksvn@gmail.com', '0374466344', '2026-10-01', 'Chụp chân dung 1 người ở Hội An', 'completed', '2026-09-28 01:53:04', '2026-09-28 01:53:34'),
(5, 'Portrait', 1, '100.00', 'Danny Tran', 'dany@gmail.com', '0968789789', '2026-10-02', '4 person', 'cancelled', '2026-09-28 02:01:51', '2026-09-28 02:02:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `price`, `image`, `features`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Portrait', 'portrait', 'Thoughtful portraits with a cinematic and editorial feel.', '100.00', 'categories/p2mWdTWQt6vpI7AYPkyi7UybEPZUu0Lmcu7PVlpR.jpg', '[\"1\\u20132 hours\",\"2\\u20133 outfits\",\"10\\u201320 retouched images\",\"Creative direction\",\"Online gallery\"]', 1, '2026-09-23 19:55:16', '2026-09-28 01:35:46'),
(2, 'Wedding', 'wedding', 'Timeless photographs documenting the emotions, people and moments of your wedding day.', '300.00', 'categories/sWBSFx5xIntLNoJb8jv5QDrfWPAkmp2fZr7bhsv0.jpg', '[\"Wedding day coverage\",\"Ceremony & Reception\",\"300+ edited images\",\"Signature retouching\",\"Online gallery\"]', 1, '2026-09-23 19:55:28', '2026-09-28 01:32:58'),
(3, 'Event & Golf', 'event-golf', 'Authentic moments, atmosphere and stories captured throughout your event.', '120.00', 'categories/w84iLwdQVGwQcZDSrwnugdXgsxJ0m1uB3j3hLJdQ.jpg', '[\"Event coverage\",\"Candid & key moments\",\"100+ edited images\",\"Professional color grading\",\"Fast online delivery\"]', 1, '2026-09-23 19:55:46', '2026-09-28 01:30:56'),
(4, 'Personal', 'personal', 'Natural portraits and lifestyle moments that feel genuinely you.', '75.00', 'categories/Clb6FjYqLa53qTIyz9uOB2sof4GNfRt6IrCtun1g.jpg', '[\"1\\u20132 hours\",\"Individual \\/ Couple \\/ Family\",\"15\\u201325 edited images\",\"Location guidance\",\"Online gallery\"]', 1, '2026-09-23 19:56:44', '2026-09-28 01:22:45'),
(5, 'Architecture', 'architecture', 'Capturing spaces, details and architecture with a refined visual approach.', '115.00', 'categories/tMFZCVu6XuFFDT0nadaWA4pTvbCeZuKdDeb8qrcQ.jpg', '[\"Interior & Exterior\",\"15\\u201325 edited images\",\"Professional color grading\",\"Perspective correction\",\"Online gallery\"]', 1, '2026-09-23 19:57:07', '2026-09-28 01:19:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `content`, `created_at`, `updated_at`) VALUES
(1, 5, 'Hoàng Anh', 'hoanganhlks@gmail.com', 'Đà Nẵng thật đẹp!', '2026-09-27 19:27:11', '2026-09-27 19:27:11'),
(2, 5, 'Kai', 'kairooney@gmail.com', 'Good', '2026-09-27 19:32:48', '2026-09-27 19:32:48'),
(3, 1, 'Danny', 'danytran@gmail.com', 'Hội An đẹp quá. Mình sẽ quay lại sớm nhất có thể', '2026-09-27 19:39:53', '2026-09-27 19:39:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2026_09_23_000000_add_is_admin_to_users_table', 1),
(5, '2026_09_24_000001_create_categories_table', 2),
(6, '2026_09_24_000002_create_projects_table', 2),
(7, '2026_09_24_000003_create_posts_table', 2),
(8, '2026_09_24_000004_update_projects_for_image_gallery', 3),
(9, '2026_09_24_000005_create_post_categories_table', 4),
(10, '2026_09_24_000006_add_post_category_id_to_posts_table', 4),
(11, '2026_09_24_000007_add_image_to_posts_table', 5),
(12, '2026_09_24_000008_add_engagement_counts_to_posts_table', 6),
(13, '2026_09_24_000009_create_comments_table', 7),
(14, '2026_09_28_000010_create_bookings_table', 8),
(15, '2026_09_28_000011_add_price_to_bookings_table', 9),
(16, '2026_09_28_000012_add_category_to_bookings_and_price_to_categories', 10),
(17, '2026_09_28_000013_add_media_and_features_to_categories', 11),
(18, '2026_09_29_000014_create_site_settings_table', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `likes_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `post_category_id`, `image`, `comments_count`, `likes_count`, `title`, `slug`, `excerpt`, `content`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 4, 'posts/WMTiNo7H64hwO9H0O88jl8kuJJSLfXKU2A6DGbGQ.jpg', 1, 1, 'Có Một Hội An Rất Khác Sau Những Con Phố', 'co-mot-hoi-an-rat-khac-sau-nhung-con-pho', 'Không phải mọi khoảnh khắc đẹp đều được sắp đặt. Đôi khi, một buổi sáng chậm rãi, một ánh nhìn, hay một con đường quen thuộc cũng đủ để trở thành một câu chuyện đáng nhớ.', '<p>Có những ngày tôi mang máy ảnh theo bên mình nhưng không có một kế hoạch cụ thể nào để chụp.</p><p>Không có lịch hẹn. Không có concept. Không có danh sách những khung hình cần hoàn thành.</p><p>Chỉ đơn giản là đi ra ngoài, bước qua những con phố quen thuộc và quan sát cuộc sống diễn ra xung quanh.</p><p>Đó cũng là lúc tôi nhận ra rằng, nhiếp ảnh lifestyle không nhất thiết phải tìm kiếm những điều đặc biệt. Đôi khi, điều đáng để lưu giữ nhất lại chính là những gì chúng ta thường xuyên bỏ qua.</p><p>Một quán cà phê nhỏ vào buổi sáng. Một người ngồi bên cửa sổ đọc sách. Ánh nắng chiếu qua hàng cây. Một gia đình cùng nhau ăn sáng. Hay một người chạy xe chậm trên con đường ven biển.</p><p>Những khoảnh khắc ấy diễn ra mỗi ngày. Chúng bình thường đến mức chúng ta gần như không để ý.</p><p>Nhưng khi nhìn qua ống kính, chúng lại có một vẻ đẹp rất khác.</p><p><br></p><h3>Ánh sáng của một ngày bình thường</h3><p>Tôi thường thích chụp lifestyle vào những thời điểm ánh sáng không quá mạnh.</p><p>Buổi sáng sớm hoặc cuối buổi chiều thường mang lại thứ ánh sáng mềm và tự nhiên. Nó không cố gắng làm cho mọi thứ trở nên hoàn hảo. Nó chỉ đơn giản là làm nổi bật những gì vốn đã tồn tại.</p><p>Một căn phòng có thể không được trang trí cầu kỳ. Một góc bàn có thể không hoàn hảo. Một người có thể không biết mình đang được chụp.</p><p>Nhưng ánh sáng đúng lúc có thể khiến tất cả trở nên có cảm xúc.</p><p>Tôi thích những vùng sáng nhỏ trên khuôn mặt, bóng đổ trên tường, ánh nắng xuyên qua rèm cửa hay phản chiếu trên mặt đường sau một cơn mưa.</p><p>Những chi tiết rất nhỏ đó thường tạo nên cảm giác về thời gian và không gian trong một bức ảnh.</p><p><img src=\"http://localhost:8000/koolnguyen/public/storage/posts/content/f7pWXfP9046SxXdkEGDuesPSwJd5rREiSPRhXDGT.jpg\"></p><p><br></p><h3>Không cần phải tạo dáng</h3><p>Một trong những điều tôi thích nhất ở lifestyle photography là sự tự nhiên.</p><p>Khi chụp chân dung, tôi vẫn có thể hướng dẫn người được chụp cách đứng, cách nhìn hoặc vị trí của cơ thể. Nhưng tôi luôn cố gắng để những hướng dẫn đó trở thành một phần rất nhỏ của buổi chụp.</p><p>Thay vì nói \"hãy cười\", tôi thường muốn họ trò chuyện, đi bộ, uống cà phê hoặc làm một việc mà họ vẫn thường làm.</p><p>Khi đó, máy ảnh gần như trở thành một người quan sát.</p><p>Có những khoảnh khắc chỉ kéo dài vài giây. Một cái nhìn sang người bên cạnh. Một nụ cười rất nhẹ. Một bàn tay đặt lên vai. Một người vô thức chỉnh lại tóc.</p><p>Những khoảnh khắc ấy thường không thể lặp lại giống hệt lần thứ hai.</p><p>Và có lẽ chính vì vậy mà chúng đáng được lưu giữ.</p><p><br></p><h3>Thành phố qua những điều nhỏ bé</h3><p>Đà Nẵng là một trong những nơi tôi thích quan sát cuộc sống bằng máy ảnh.</p><p>Thành phố có biển, có những con đường rộng, những quán cà phê nhỏ và nhịp sống vừa đủ nhanh nhưng vẫn có những khoảng thời gian rất chậm.</p><p>Buổi sáng, khi thành phố chưa quá đông, ánh sáng thường rơi xuống những con đường theo một cách rất nhẹ.</p><p>Đến chiều, mọi thứ thay đổi. Người đi làm trở về, những quán ăn bắt đầu đông khách, trẻ em chơi ở công viên và những con đường ven biển trở nên nhộn nhịp hơn.</p><p>Không cần phải tìm một địa điểm đặc biệt.</p><p>Chỉ cần đi chậm lại một chút, chúng ta sẽ thấy có rất nhiều câu chuyện đang diễn ra.</p><p>Một người bán hàng chuẩn bị mở cửa. Một cặp đôi ngồi cạnh nhau bên ly cà phê. Một người cha đưa con đi dạo. Một nhóm bạn gặp nhau sau giờ làm.</p><p>Đó chính là những điều khiến một thành phố trở nên có sức sống.</p><p><img src=\"http://localhost:8000/koolnguyen/public/storage/posts/content/BaxJQHdbtU9F6WwPFloNWJf4USAS7ynWIFWZ07K2.jpg\"></p><p><br></p><h3>Những bức ảnh có thể trở thành ký ức</h3><p>Tôi nghĩ giá trị của một bức ảnh lifestyle không nằm ở việc nó có hoàn hảo hay không.</p><p>Một bức ảnh hơi thiếu sáng, một mái tóc chưa được chỉnh, một căn phòng chưa thật gọn gàng hay một khoảnh khắc không được chuẩn bị trước đôi khi lại khiến người ta nhớ lâu hơn.</p><p>Bởi vì cuộc sống thật vốn không hoàn hảo.</p><p>Vài năm sau, khi nhìn lại một bức ảnh, thứ chúng ta nhớ có thể không phải là chiếc áo mình đã mặc hay địa điểm mình từng đứng.</p><p>Có thể chúng ta sẽ nhớ cảm giác của ngày hôm đó.</p><p>Nhớ một buổi sáng rất bình thường.</p><p>Nhớ người đã đứng cạnh mình.</p><p>Nhớ căn nhà cũ.</p><p>Nhớ một thành phố mà mình từng sống.</p><p>Hoặc đơn giản là nhớ mình đã từng trẻ như thế nào.</p><p>Đó là lý do tôi thích lifestyle photography.</p><p>Nó không cố gắng tạo ra một cuộc sống hoàn hảo. Nó chỉ cố gắng giữ lại một phần nhỏ của cuộc sống đang diễn ra.</p><p><br></p><h3>Chụp những gì đang tồn tại</h3><p>Có lẽ nhiếp ảnh đối với tôi không chỉ là tìm kiếm những bức ảnh đẹp.</p><p>Đó còn là cách để quan sát.</p><p>Quan sát ánh sáng thay đổi trên một con phố. Quan sát cách một người nhìn người họ yêu. Quan sát những thói quen nhỏ của một gia đình. Quan sát một thành phố thay đổi theo từng mùa.</p><p>Và đôi khi, chỉ cần đứng yên đủ lâu, chúng ta sẽ nhận ra rằng cuộc sống xung quanh mình đã có sẵn rất nhiều câu chuyện.</p><p>Không cần phải tạo ra chúng.</p><p>Chỉ cần nhìn thấy.</p><p>Và nếu may mắn, tôi sẽ có mặt đúng lúc để giữ lại một khoảnh khắc.</p><p>Một khoảnh khắc rất bình thường.</p><p>Nhưng sau nhiều năm, có thể nó sẽ trở thành một trong những điều đáng nhớ nhất.</p>', 'published', '2026-09-24 01:38:32', '2026-09-24 01:36:36', '2026-09-27 19:46:32'),
(2, 2, 'posts/8KaF9HhOklQcQlVnDZKUqjK9pO7IWwV54R88pvTh.jpg', 0, 0, 'Một ngày trên những cung đường Hà Giang', 'mot-ngay-tren-nhung-cung-duong-ha-giang', 'Hà Giang không chỉ là những con đèo và núi đá. Đó còn là những buổi sáng đầy sương, những ngôi nhà nằm nép bên sườn núi và những con người bình dị trên hành trình qua cao nguyên đá.', '<p>Có những chuyến đi bắt đầu bằng một kế hoạch rất rõ ràng.</p><p>Nhưng cũng có những chuyến đi chỉ đơn giản là muốn rời khỏi thành phố vài ngày, mang theo một chiếc máy ảnh và xem con đường sẽ đưa mình đến đâu.</p><p>Chuyến đi Hà Giang của tôi bắt đầu như vậy.</p><p>Từ Hà Nội, chúng tôi mất nhiều giờ để đến thành phố Hà Giang. Khi xe bắt đầu đi sâu vào những cung đường núi, cảnh vật thay đổi rất nhanh. Những tòa nhà dần biến mất, thay vào đó là những sườn núi nối tiếp nhau và những con đường nhỏ chạy giữa thung lũng.</p><p>Tôi bắt đầu hiểu vì sao Hà Giang luôn là một trong những nơi được nhắc đến nhiều nhất khi nói về nhiếp ảnh du lịch ở Việt Nam.</p><p>Không phải vì nơi đây lúc nào cũng đẹp theo cách hoàn hảo.</p><p>Mà bởi vì cảnh vật luôn thay đổi.</p><p><br></p><h3>Buổi sáng trên cao nguyên đá</h3><p>Một trong những điều tôi nhớ nhất về Hà Giang là những buổi sáng rất sớm.</p><p>Không khí lạnh hơn tôi nghĩ. Những đám mây thấp nằm giữa các dãy núi, khiến cảnh vật phía trước lúc rõ lúc mờ.</p><p>Chúng tôi dừng xe ở một đoạn đường khá vắng.</p><p>Không có một địa điểm check-in cụ thể.</p><p>Chỉ là một đoạn đường trên cao, nhìn xuống những thung lũng phía dưới.</p><p>Tôi lấy máy ảnh ra và đứng đó khá lâu.</p><p>Ánh sáng buổi sáng bắt đầu xuất hiện phía sau những ngọn núi. Những mảng sáng đầu tiên chiếu xuống các sườn đá, rồi từ từ lan xuống thung lũng.</p><p>Có những cảnh chỉ đẹp trong vài phút.</p><p>Nếu đến muộn hơn một chút, ánh sáng sẽ thay đổi hoàn toàn.</p><p>Đó cũng là một trong những điều khiến tôi thích chụp ảnh khi đi du lịch.</p><p>Bạn không thể kiểm soát tất cả.</p><p>Bạn chỉ có thể chờ đợi.</p><p><br></p><p><img src=\"http://localhost:8000/koolnguyen/public/storage/posts/content/5GrE90DasViryDQW09xKY0vYdMjU7RDkUrKhymxn.jpg\"></p><p><br></p><h3>Những con đường không có trong lịch trình</h3><p>Hà Giang có rất nhiều cung đường đẹp.</p><p>Nhưng đôi khi những bức ảnh tôi thích nhất lại được chụp ở những nơi không nằm trong kế hoạch ban đầu.</p><p>Một con đường nhỏ rẽ khỏi tuyến chính.</p><p>Một ngôi nhà nằm giữa sườn núi.</p><p>Một nhóm trẻ em đứng bên đường khi chúng tôi đi qua.</p><p>Hay một người phụ nữ đang làm việc trước hiên nhà.</p><p>Những khoảnh khắc ấy không thể tìm thấy trên bản đồ.</p><p>Bạn chỉ có thể bắt gặp chúng khi đi đủ chậm.</p><p>Tôi thường không muốn chụp quá nhiều ảnh trong những khoảnh khắc như vậy.</p><p>Thay vào đó, tôi quan sát trước.</p><p>Người đó đang làm gì?</p><p>Ánh sáng đang ở đâu?</p><p>Phía sau họ là gì?</p><p>Nếu đứng thêm vài giây, liệu có điều gì thay đổi?</p><p>Đôi khi chỉ cần chờ một người bước vào đúng vị trí, bức ảnh đã trở nên khác hoàn toàn.</p><p><br></p><h3>Mèo Vạc và những buổi chiều trên đường</h3><p>Càng đi sâu về phía Mèo Vạc, cảnh quan càng trở nên mạnh mẽ.</p><p>Những vách núi đá cao, những con đường uốn quanh sườn núi và những khoảng không rộng lớn khiến con người trở nên rất nhỏ trong khung hình.</p><p>Ở những nơi như thế, tôi thường sử dụng góc máy rộng.</p><p>Không phải để làm cho cảnh vật trông lớn hơn.</p><p>Mà để giữ lại cảm giác mình thực sự đang đứng ở đó.</p><p>Một chiếc xe máy chạy phía trước.</p><p>Một người đứng bên mép đường.</p><p>Một con đường kéo dài giữa hai vách núi.</p><p>Những chi tiết nhỏ đó giúp bức ảnh có cảm giác về quy mô.</p><p>Nhìn vào ảnh, người xem không chỉ thấy một ngọn núi.</p><p>Họ có thể hình dung được mình đang đứng ở đâu.</p><p><br></p><h3>Khi nhiếp ảnh trở thành một phần của chuyến đi</h3><p>Đi du lịch với máy ảnh đôi khi cũng có một mặt trái.</p><p>Bạn dễ bị cuốn vào việc tìm kiếm những bức ảnh đẹp đến mức quên mất mình đang ở đâu.</p><p>Có những lúc tôi phải chủ động cất máy vào balo.</p><p>Ngồi xuống một quán nhỏ.</p><p>Uống một cốc cà phê.</p><p>Nhìn những chiếc xe chạy qua.</p><p>Không chụp gì cả.</p><p>Những khoảng thời gian đó cũng quan trọng không kém những bức ảnh.</p><p>Bởi vì cuối cùng, chuyến đi không chỉ được tạo nên từ những hình ảnh chúng ta mang về.</p><p>Nó còn được tạo nên từ những điều chúng ta đã nhìn thấy nhưng không chụp lại.</p><p><br></p><h3>Một Hà Giang rất đời thường</h3><p>Hà Giang thường xuất hiện trên những bức ảnh với những ngọn núi hùng vĩ, những con đường quanh co và những mùa hoa rực rỡ.</p><p>Nhưng sau những khung hình đó vẫn là một Hà Giang rất đời thường.</p><p>Những người dân sống và làm việc trên cao nguyên.</p><p>Những ngôi nhà nhỏ bên sườn núi.</p><p>Những phiên chợ buổi sáng.</p><p>Những đứa trẻ đi học trên những con đường quanh co.</p><p>Những chiếc xe chở hàng chạy chậm qua đèo.</p><p>Đó là những điều khiến chuyến đi trở nên có chiều sâu hơn.</p><p>Phong cảnh có thể khiến chúng ta dừng lại để chụp một bức ảnh.</p><p>Nhưng con người mới là thứ khiến chúng ta nhớ về một nơi lâu hơn.</p><p><br></p><h3>Mang về một câu chuyện, không chỉ một bức ảnh</h3><p>Sau chuyến đi, khi xem lại những bức ảnh, tôi nhận ra mình không nhớ tất cả những nơi đã đi qua.</p><p>Tôi chỉ nhớ một vài khoảnh khắc.</p><p>Một buổi sáng lạnh trên đèo.</p><p>Một đoạn đường không có xe.</p><p>Một người phụ nữ đứng trước căn nhà nhỏ.</p><p>Ánh nắng cuối ngày rơi xuống một thung lũng.</p><p>Và cảm giác ngồi trên xe khi con đường cứ tiếp tục kéo dài phía trước.</p><p>Có lẽ đó chính là điều tôi tìm kiếm khi mang máy ảnh đi du lịch.</p><p>Không phải để chứng minh rằng mình đã đến một nơi nào đó.</p><p>Mà để lưu lại cảm giác của mình khi ở nơi đó.</p><p>Hà Giang rồi sẽ thay đổi.</p><p>Những con đường sẽ đông hơn, những điểm đến sẽ được biết đến nhiều hơn.</p><p>Nhưng những khoảnh khắc rất nhỏ của một chuyến đi vẫn có thể nằm lại trong một bức ảnh.</p><p>Và đôi khi, chỉ cần nhìn lại bức ảnh đó, chúng ta có thể nhớ được cả một ngày.</p><p>Một ngày trên những cung đường Hà Giang.</p>', 'published', '2026-09-24 01:41:28', '2026-09-24 01:41:28', '2026-09-24 01:41:28'),
(3, 3, 'posts/3zVl1d0bRu00vGxth5XDMlFFlb72Xw3AaZNKBB3f.jpg', 0, 0, 'Một ngày cưới ở Hội An, nơi mọi khoảnh khắc đều thật', 'mot-ngay-cuoi-o-hoi-an-noi-moi-khoanh-khac-deu-that', 'Từ những giờ chuẩn bị đầu tiên đến buổi tối dưới ánh đèn lồng, một ngày cưới ở Hội An được kể lại qua những khoảnh khắc tự nhiên, những cái ôm và những cảm xúc không cần sắp đặt.', '<h2>Buổi sáng bắt đầu rất chậm</h2><p>Một ngày cưới thường bắt đầu sớm hơn mọi người nghĩ.</p><p>Khi cô dâu vẫn còn đang chuẩn bị tóc và trang điểm, căn phòng đã bắt đầu có những âm thanh quen thuộc của một ngày đặc biệt. Tiếng mọi người trò chuyện, tiếng cửa mở ra đóng vào, tiếng điện thoại liên tục nhận những tin nhắn mới.</p><p>Tôi thường thích có mặt từ những thời điểm như vậy.</p><p>Không phải để chụp ngay những bức ảnh lớn.</p><p>Mà để quan sát.</p><p>Chiếc váy được treo cạnh cửa sổ. Những đôi giày được đặt ngay ngắn dưới bàn. Bó hoa vẫn còn nằm trong giấy gói. Một người mẹ chỉnh lại cổ áo cho con gái. Một người bạn thân đứng bên cạnh và nói vài câu khiến cô dâu bật cười.</p><p>Những chi tiết nhỏ ấy thường không nằm trong timeline của một đám cưới.</p><p>Nhưng sau này, chúng lại trở thành những bức ảnh khiến người ta nhớ nhất.</p><p><br></p><h2>Những phút trước khi mọi thứ bắt đầu</h2><p>Có một khoảng thời gian rất đặc biệt trước lễ cưới.</p><p>Mọi thứ gần như đã sẵn sàng nhưng buổi lễ vẫn chưa bắt đầu.</p><p>Cô dâu ngồi yên trước gương.</p><p>Chú rể có thể đang ở một căn phòng khác, kiểm tra lại bộ vest hoặc nói chuyện với bạn bè.</p><p>Gia đình hai bên bắt đầu tập trung.</p><p>Không ai thực sự biết chính xác vài giờ tiếp theo sẽ diễn ra như thế nào.</p><p>Và chính sự chờ đợi đó tạo nên rất nhiều cảm xúc.</p><p>Tôi không muốn yêu cầu mọi người dừng lại để nhìn vào máy ảnh quá nhiều.</p><p>Thay vào đó, tôi cố gắng đứng ở một vị trí đủ gần để không bỏ lỡ khoảnh khắc nhưng đủ xa để mọi người vẫn cảm thấy thoải mái.</p><p>Một cái nhìn.</p><p>Một cái nắm tay.</p><p>Một nụ cười.</p><p>Một giọt nước mắt được lau thật nhanh.</p><p>Những khoảnh khắc đó thường chỉ xuất hiện một lần.</p><p><img src=\"http://localhost:8000/koolnguyen/public/storage/posts/content/CqUTjKrYBtYaCd3JtdAeT5QPX4UEtd5x4ysPIkxw.jpg\"></p><h2>Hội An và ánh sáng buổi chiều</h2><p>Hội An có một thứ ánh sáng rất riêng.</p><p>Những bức tường vàng, những con phố nhỏ và ánh nắng cuối ngày tạo nên một không gian rất tự nhiên cho ảnh cưới.</p><p>Tôi thích đưa cô dâu chú rể đi bộ thay vì cố gắng tạo quá nhiều dáng.</p><p>Chúng tôi có thể bắt đầu từ một con phố nhỏ, đi qua những căn nhà cũ, dừng lại bên một quán cà phê hoặc đơn giản là đi bộ cạnh nhau.</p><p>Trong những lúc như vậy, họ thường quên mất rằng mình đang được chụp ảnh.</p><p>Và đó chính là lúc những bức ảnh tự nhiên nhất xuất hiện.</p><p>Một cái nhìn sang nhau.</p><p>Một nụ cười khi nói chuyện.</p><p>Một cái nắm tay.</p><p>Một khoảnh khắc cả hai cùng đứng dưới ánh nắng cuối ngày.</p><p>Không cần quá nhiều sự sắp đặt.</p><p>Chỉ cần để hai người ở cạnh nhau.</p><p>8</p><h2>Điều quan trọng không chỉ là cô dâu và chú rể</h2><p>Một đám cưới không chỉ có hai người.</p><p>Có bố mẹ.</p><p>Có anh chị em.</p><p>Có những người bạn đã đi cùng họ nhiều năm.</p><p>Có những người từ rất xa trở về chỉ để có mặt trong ngày hôm đó.</p><p>Vì vậy, tôi luôn dành thời gian để chụp những người xung quanh.</p><p>Một người cha đứng lặng nhìn con gái trong ngày cưới.</p><p>Một người mẹ chỉnh lại chiếc khăn.</p><p>Những người bạn cười lớn trong lúc chụp ảnh.</p><p>Một đứa trẻ chạy giữa những chiếc bàn.</p><p>Hay cả gia đình ngồi cạnh nhau sau khi mọi nghi thức đã kết thúc.</p><p>Những bức ảnh này có thể không phải là những bức ảnh nổi bật nhất trong album.</p><p>Nhưng chúng kể lại đầy đủ hơn về một ngày cưới.</p><p>Bởi vì nhiều năm sau, điều người ta muốn nhìn lại không chỉ là mình đã trông như thế nào.</p><p>Mà là <strong>ai đã ở bên mình trong ngày hôm đó.</strong></p><p><img src=\"http://localhost:8000/koolnguyen/public/storage/posts/content/mPM72zWS2Dsm56BjTQDLbrmR1x7DlxoPK22qY7Z9.jpg\"><img src=\"http://localhost:8000/koolnguyen/public/storage/posts/content/r6eCglfNYYaayzDPyBCQs6WeWCTkUQf0b7s1kBs9.jpg\"></p><p><br></p><h2>Khi thành phố lên đèn</h2><p>Buổi tối ở Hội An mang đến một không khí hoàn toàn khác.</p><p>Những chiếc đèn lồng bắt đầu sáng lên trên các con phố.</p><p>Ánh sáng vàng phản chiếu trên những bức tường cũ và dòng nước.</p><p>Nếu có thời gian, tôi thích thực hiện thêm một khoảng chụp ngắn vào buổi tối.</p><p>Không cần phải tạo một concept phức tạp.</p><p>Chỉ cần hai người đi bộ bên nhau giữa phố.</p><p>Có thể dừng lại dưới một dãy đèn lồng.</p><p>Có thể ngồi bên một quán nhỏ.</p><p>Hoặc chỉ đơn giản là đứng cạnh nhau và nhìn dòng người đi qua.</p><p>Những bức ảnh ban đêm thường có cảm giác khác với ảnh chụp ban ngày.</p><p>Ít ánh sáng hơn.</p><p>Nhiều bóng tối hơn.</p><p>Nhưng cũng vì vậy mà cảm xúc trở nên gần gũi hơn.</p><p>7</p><h2>Không cần một ngày cưới hoàn hảo</h2><p>Tôi nghĩ một ngày cưới đẹp không nhất thiết phải hoàn hảo.</p><p>Có thể trời mưa.</p><p>Có thể kế hoạch bị thay đổi.</p><p>Có thể cô dâu khóc nhiều hơn dự định.</p><p>Có thể chú rể quên mất một chi tiết nào đó.</p><p>Có thể mọi người đến muộn.</p><p>Nhưng chính những điều không nằm trong kế hoạch đôi khi lại tạo nên những câu chuyện đáng nhớ nhất.</p><p>Nhiếp ảnh cưới đối với tôi không phải là cố gắng làm cho một ngày trở nên hoàn hảo hơn.</p><p>Mà là ghi lại nó <strong>đúng như những gì nó đã diễn ra.</strong></p><p>Những niềm vui.</p><p>Những giọt nước mắt.</p><p>Những tiếng cười.</p><p>Những cái ôm.</p><p>Những khoảnh khắc rất nhỏ mà có thể ngay lúc đó không ai để ý.</p><p><br></p><h2>Sau cùng, đó là một câu chuyện</h2><p>Khi một đám cưới kết thúc, những bông hoa sẽ được dọn đi, bàn tiệc sẽ được thu lại và mọi người sẽ trở về nhà.</p><p>Nhưng những bức ảnh vẫn còn ở đó.</p><p>Một bức ảnh của người cha.</p><p>Một bức ảnh của người mẹ.</p><p>Một cái ôm.</p><p>Một nụ cười.</p><p>Một khoảnh khắc hai người nhìn nhau giữa phố Hội An.</p><p>Từng bức ảnh riêng lẻ có thể chỉ là một khoảnh khắc rất nhỏ.</p><p>Nhưng khi đặt chúng cạnh nhau, chúng tạo thành một câu chuyện.</p><p>Và đó là cách tôi muốn kể về một đám cưới.</p><p>Không chỉ bằng những bức ảnh đẹp.</p><p>Mà bằng <strong>những khoảnh khắc thật sự đã xảy ra.</strong></p><p>Bởi sau nhiều năm, điều còn lại không phải là một tư thế hoàn hảo.</p><p>Mà là cảm giác của ngày hôm đó.</p><p><strong>The way it felt.</strong></p>', 'published', '2026-09-24 01:45:01', '2026-09-24 01:45:01', '2026-09-24 01:45:01'),
(4, 1, 'posts/3sVvRDKvab0zrMegOYDtBlgBKEVWbMHaNVwnhJKU.jpg', 0, 0, 'Photography — is meditation in the moment.', 'photography-is-meditation-in-the-moment', 'Modern design and a lack of love dilettantism. Looking for such designers, which all use a little beauty and no matter how much they looked around either; which you always want to do something else. Designers do not only image-makers, but also dreamers who tell stories and think. For me, all the things a good story is more important than its form.', '<p><br></p><p>My job is simple and sophisticated, so it is possible to describe and simple, and flowery language. I love the feel and sophistication of its superiority. I like people with a keen mind and at the same time easy to talk to. These qualities can be combined perfectly natural. However, things like people look miserable, if these properties are connected to them artificially.</p><p>Modern design and a lack of <span style=\"background-color: transparent;\">love dilettantism</span>. Looking for such designers, which all use a little beauty and no matter how much they looked around either; which you always want to do something else. Designers do not only image-makers, but also dreamers who tell stories and think. For me, all the things a good story is more important than its form.</p><p>The designer must be an interpreter, and real and virtual needs must anticipate those questions of people that they do not think, and suddenly opened in the already created objects.</p><p><br></p><blockquote class=\"ql-align-center\"><em>Photography is a kind of visual literature. When you shoot, you do something meaningful: you build a frame, turn something into it, remove something.</em></blockquote><p class=\"ql-align-center\">— Kool Nguyen</p><p>Minimalism has reached a certain critical point, the top. Where to go? I do not know. The main thing for the designer — to create things that are pleasing to him, the work brings satisfaction, and cooperation with the customer — satisfaction. We need to understand what the customer wants, and to connect it with your wishes and possibilities. To create something outstanding, we need the enthusiasm of both. I am a very happy person, because I worked with wonderful customers who have helped me very.</p><p>Think about the content that you want to invest in a created object, and only then will form. The thing is your spirit. A spirit unlike forms hard copy.</p><p>I want to create beautiful things, even if it\'s not necessary for anyone, as a fight against ugly things. This is my intention. Fast, cheap and good — from these three things you should always choose two. If it\'s fast and cheap, it will never be good. If it\'s cheap and good, it will never work out quickly. And if it is good and fast, it will never come cheap. But remember: of the three you still have to always choose two.</p><p>Modern design and a lack of love dilettantism. Looking for such designers, which all use a little beauty and no matter how much they looked around either; which you always want to do something else. Designers do not only image-makers, but also dreamers who tell stories and think. For me, all the things a good story is more important than its form.</p>', 'published', '2026-09-24 02:18:20', '2026-09-24 02:18:20', '2026-09-24 02:33:34'),
(5, 4, 'posts/a1R5YkVfkTrEpvRlEYEpmfrVb4Hr8rY77qsGYjZh.jpg', 2, 0, 'Một ngày rất đỗi bình thường ở Đà Nẵng', 'mot-ngay-rat-doi-binh-thuong-o-da-nang', 'Không phải lúc nào cũng cần một chuyến đi xa để tìm kiếm những câu chuyện đáng kể. Đôi khi, chỉ cần bước ra khỏi nhà và quan sát thành phố vào một ngày bình thường.', '<p>Không phải lúc nào cũng cần một chuyến đi xa để tìm kiếm những câu chuyện đáng kể. Đôi khi, chỉ cần bước ra khỏi nhà và quan sát thành phố vào một ngày bình thường.</p><p>Đà Nẵng thường được nhớ đến bởi biển, những cây cầu và những con đường rộng chạy dọc thành phố.</p><p><br></p><p>Nhưng nếu sống ở đây đủ lâu, bạn sẽ nhận ra thành phố còn có một nhịp sống rất khác.</p><p>Nó chậm hơn vào buổi sáng.</p><p>Ồn ào hơn vào giờ tan tầm.</p><p>Và trở nên rất yên tĩnh ở một vài góc phố khi mặt trời bắt đầu xuống.</p><p>Tôi thích những khoảng thời gian như vậy.</p><p>Không có một lịch trình cụ thể.</p><p>Không có địa điểm đặc biệt.</p><p>Chỉ mang theo máy ảnh và đi bộ quanh thành phố.</p><p><br></p><h2>6:00 sáng</h2><p>Một ngày ở Đà Nẵng thường bắt đầu khá sớm.</p><p>Khi mặt trời vừa lên, những con đường ven biển đã có người chạy bộ và tập thể dục.</p><p>Một vài người ngồi bên vỉa hè uống cà phê.</p><p>Những hàng quán bắt đầu mở cửa.</p><p>Có người đang chuẩn bị nguyên liệu cho một ngày buôn bán mới.</p><p>Có người vừa kết thúc ca làm đêm và đang trở về nhà.</p><p>Ánh sáng lúc này rất mềm.</p><p>Tôi thường thích chụp ở khoảng thời gian này vì mọi thứ vẫn còn khá yên tĩnh.</p><p>Không ai thực sự để ý đến chiếc máy ảnh.</p><p>Và những khoảnh khắc tự nhiên thường xuất hiện rất nhiều.</p><p><br></p><h2>Thành phố bắt đầu thức dậy</h2><p>Khoảng 7 đến 8 giờ sáng, Đà Nẵng bắt đầu thay đổi.</p><p>Xe cộ nhiều hơn.</p><p>Các quán ăn đông khách.</p><p>Những con phố trở nên nhộn nhịp.</p><p>Một người bán hàng đang nhanh tay chuẩn bị đồ ăn cho khách.</p><p>Một gia đình ngồi ăn sáng cùng nhau.</p><p>Những chiếc xe máy nối tiếp nhau trên đường.</p><p>Tôi thích những cảnh như vậy hơn những khung hình được sắp đặt quá kỹ.</p><p>Bởi vì mỗi người đều đang có một câu chuyện riêng.</p><p>Bạn chỉ tình cờ bắt gặp họ trong vài giây.</p><p>Một bức ảnh có thể chỉ ghi lại một người đang ngồi ăn sáng.</p><p>Nhưng khi nhìn kỹ hơn, bạn có thể thấy ánh sáng từ cửa hàng, những vật dụng trên bàn, biểu cảm của người đó và cả không khí của con phố.</p><p>Tất cả những thứ nhỏ bé ấy tạo nên cảm giác về một nơi.</p><p><br></p><h2>Những góc phố quen thuộc</h2><p>Có những con đường tôi đã đi qua rất nhiều lần.</p><p>Ban đầu, tôi nghĩ chẳng có gì để chụp.</p><p>Nhưng khi thay đổi thời gian, ánh sáng hoặc chỉ đơn giản là đi chậm hơn, mọi thứ lại trở nên khác.</p><p>Một bức tường cũ.</p><p>Một chiếc xe dựng trước cửa nhà.</p><p>Một người đang tưới cây.</p><p>Quần áo phơi bên ban công.</p><p>Một chú chó nằm dưới bóng râm.</p><p>Những thứ này không phải là cảnh đẹp theo nghĩa thông thường.</p><p>Nhưng chúng là một phần của thành phố.</p><p>Và khi được đặt cạnh nhau, chúng tạo thành một bức tranh rất riêng về cuộc sống nơi đây.</p><p><br></p><h2>Một buổi chiều bên biển</h2><p>Đến cuối ngày, tôi thường quay trở lại biển.</p><p>Đây có lẽ là một trong những nơi dễ nhìn thấy nhịp sống của Đà Nẵng nhất.</p><p>Người chạy bộ.</p><p>Gia đình đưa trẻ nhỏ đi dạo.</p><p>Những nhóm bạn ngồi trò chuyện.</p><p>Các cặp đôi đi bộ bên nhau.</p><p>Một vài người chỉ đơn giản ngồi nhìn biển.</p><p>Ánh sáng lúc hoàng hôn khiến mọi thứ trở nên nhẹ hơn.</p><p>Tôi không cố gắng yêu cầu mọi người tạo dáng.</p><p>Tôi chỉ đứng ở một khoảng cách vừa đủ và chờ.</p><p>Một người quay đầu.</p><p>Một cặp đôi nắm tay.</p><p>Một đứa trẻ chạy về phía biển.</p><p>Một người ngồi một mình nhìn mặt trời xuống.</p><p>Đôi khi chỉ cần một khoảnh khắc rất ngắn là đủ để có một bức ảnh.</p><p><br></p><h2>Những điều chúng ta thường bỏ qua</h2><p>Tôi nghĩ chúng ta thường chỉ chú ý đến những điều lớn.</p><p>Một chuyến du lịch.</p><p>Một sự kiện.</p><p>Một ngày cưới.</p><p>Một địa điểm nổi tiếng.</p><p>Nhưng cuộc sống thật sự lại được tạo nên từ những ngày rất bình thường.</p><p>Ngày hôm nay giống ngày hôm qua.</p><p>Ngày mai có thể cũng giống ngày hôm nay.</p><p>Chúng ta đi làm, ăn sáng, uống cà phê, gặp bạn bè, trở về nhà và bắt đầu một ngày mới.</p><p>Cho đến một lúc nào đó, chúng ta nhận ra những ngày đó đã trở thành ký ức.</p><p>Và lúc ấy, những bức ảnh đời thường trở nên có ý nghĩa.</p><p>Không phải vì chúng đẹp một cách hoàn hảo.</p><p>Mà bởi vì chúng nhắc chúng ta nhớ mình đã từng sống như thế nào.</p><p><br></p><h2>Chụp lại cuộc sống khi nó đang diễn ra</h2><p>Lifestyle photography đối với tôi không phải là tạo ra một cuộc sống đẹp hơn thực tế.</p><p>Nó là quan sát cuộc sống khi nó đang diễn ra.</p><p>Không chỉnh sửa quá nhiều.</p><p>Không cố gắng kiểm soát mọi thứ.</p><p>Không nhất thiết phải có một địa điểm đặc biệt.</p><p>Chỉ cần ánh sáng phù hợp, một khoảnh khắc thật và một người sẵn sàng nhìn thấy nó.</p><p>Có lẽ đó cũng là lý do tôi luôn thích mang máy ảnh đi cùng trong những ngày không có lịch chụp.</p><p>Bởi vì chúng ta không bao giờ biết khoảnh khắc tiếp theo sẽ xuất hiện ở đâu.</p><p>Có thể là một con phố quen thuộc.</p><p>Một quán cà phê nhỏ.</p><p>Một buổi chiều bên biển.</p><p>Hoặc chỉ đơn giản là ánh nắng rơi xuống căn phòng vào một buổi sáng.</p><p>Những điều rất bình thường.</p><p>Nhưng một ngày nào đó, chúng có thể trở thành những điều chúng ta muốn nhớ nhất.</p><p><strong>Life doesn\'t always need a special occasion to be worth photographing.</strong></p>', 'published', '2026-09-24 02:49:05', '2026-09-24 02:49:05', '2026-09-27 19:32:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `slug`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Photography', 'photography', 'Chia sẻ kỹ thuật, ánh sáng, thiết bị, kinh nghiệm chụp.', 1, '2026-09-24 01:05:06', '2026-09-24 01:05:06'),
(2, 'Travel', 'travel', 'Các chuyến đi, địa điểm, phong cảnh và trải nghiệm cá nhân.', 1, '2026-09-24 01:05:21', '2026-09-24 01:05:21'),
(3, 'Wedding', 'wedding', 'Chuyện cưới, địa điểm, concept, album và những khoảnh khắc trong ngày cưới.', 1, '2026-09-24 01:10:51', '2026-09-24 01:10:51'),
(4, 'Lifestyle', 'lifestyle', 'Những khoảnh khắc đời thường, gia đình, tình yêu, con người và cuộc sống.', 1, '2026-09-24 01:11:05', '2026-09-24 01:11:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `shot_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `title`, `slug`, `excerpt`, `images`, `status`, `shot_at`, `created_at`, `updated_at`) VALUES
(1, 5, 'InterContinental Danang', 'intercontinental-danang', 'Exploring the architecture and interiors of InterContinental Danang, where contemporary design meets the natural landscape of Son Tra.', '[\"projects\\/0yHCrRHu6WjkNRyEVXxmgkPvMFTm8gZzcwaxzwBM.jpg\",\"projects\\/XIf8iBrw40bx04MAa3FOOoGRe5PblSRQB6nZaVso.jpg\"]', 'published', '2026-08-01', '2026-09-23 20:42:27', '2026-09-23 20:45:58'),
(2, 3, 'Vinpearl Golf Nam Hoi An', 'vinpearl-golf-nam-hoi-an', 'A day on the course, documenting the players, atmosphere and moments that shaped the golf event.', '[\"projects\\/N8YpfxWPAMT1cPdt9Q2C3Y3T84rdJNNV1t71166T.jpg\",\"projects\\/fjRpflpfMXho25xK4yVJn7u9OxPkrwnSTynZh6pj.jpg\"]', 'published', '2026-09-11', '2026-09-23 20:52:18', '2026-09-23 20:52:18'),
(3, 1, 'A Morning in Hoi An', 'a-morning-in-hoi-an', NULL, '[\"projects\\/azgTXKFBGBjBszNH5IbQ5XcRCsDv8IegvWiNIrP7.jpg\",\"projects\\/1Wm6OfRtHLmHh4HCv92PJRYN3fOrVTBnVtl359YU.jpg\"]', 'published', '2026-09-25', '2026-09-23 20:52:46', '2026-09-23 20:52:46'),
(4, 2, 'Wedding in Da Nang', 'wedding-in-da-nang', 'From the quiet preparations to the celebration, documenting the genuine moments shared by the couple, family and friends.', '[\"projects\\/v0KCNwS54MRCVT6lj0ktJC9gtX3ZTK5sYrDTUyNp.jpg\"]', 'published', '2026-09-12', '2026-09-23 20:53:30', '2026-09-23 20:53:30'),
(5, 4, 'Along the Central Coast', 'along-the-central-coast', 'A personal journey through the landscapes, coastal roads and everyday moments of Central Vietnam.', '[\"projects\\/6iq1ZWdRs9c8nuhti63cE07w30tM1ZvutY9peqf5.jpg\",\"projects\\/ToCHoPbp7Io97w88CaDccTSXcQONmAF8UFJJN4ML.jpg\",\"projects\\/ka0hG296K1JKisufeTzmTveGeYs86Uxplmw5xC1p.jpg\",\"projects\\/jTjdi7XG3MRhN5TyVW4eRH2PlXbQCNOIjOEIU7Gd.jpg\",\"projects\\/PDADbityqPfCRnbGbPcLNe3icNNwsL3CK8OqastM.jpg\",\"projects\\/Zhk8cyHlikiJroqCFNzCVHY6qFaH9gX3AOdLqwVc.jpg\"]', 'published', '2026-09-16', '2026-09-23 20:54:03', '2026-09-23 20:54:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'Kool Nguyen', NULL, '2026-09-28 19:40:33'),
(2, 'site_logo', '', NULL, '2026-09-28 19:40:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kool Nguyen', 'admin@koolnguyen.vn', '2026-09-23 19:31:58', '$2y$10$fkJK9AEF0AavRVG4i8LMy.d4iB33BtceLsTPDILBygNIlhvGd1pZ6', 1, NULL, '2026-09-23 19:31:58', '2026-09-23 19:31:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_post_category_id_foreign` (`post_category_id`);

--
-- Chỉ mục cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_key_unique` (`key`);

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
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_post_category_id_foreign` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
