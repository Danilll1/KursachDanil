-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 19 2025 г., 09:23
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magaz2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ЯХТЫ', 'yahts', '2020-12-12 08:44:47', '2020-12-12 08:44:47'),
(2, 'МАЛЫЕ ЯХТЫ', 'small_yahts', '2020-12-12 08:44:47', '2020-12-12 08:44:47');

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE `data` (
  `id` int NOT NULL,
  `year` int DEFAULT NULL,
  `length` int DEFAULT NULL,
  `guests` int DEFAULT NULL,
  `rooms` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id`, `year`, `length`, `guests`, `rooms`) VALUES
(1, 2020, 67, 14, 7),
(2, 2024, 54, 10, 5),
(3, 2022, 50, 12, 6),
(4, 2021, 49, 10, 5),
(5, 2014, 40, 12, 6),
(6, 2015, 38, 10, 5),
(7, 2018, 35, 8, 4),
(8, 2012, 28, 12, 5),
(9, 2022, 20, 4, 2),
(10, 2022, 18, 6, 3),
(11, 2022, 50, 12, 6),
(12, 2014, 47, 12, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_14_034541_create_orders_table', 2),
(6, '2024_10_14_034553_create_order_products_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `qty` tinyint UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `qty`, `total`, `status`, `name`, `email`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(1, 3, 40071, 0, '123', 'pochta@mail.ru', '+7 912 419-33-82', 'qiurgiqerbgqwehbrt', 'jqbrrgfoiqrgfqye', '2024-10-14 01:46:25', '2024-10-14 01:46:25'),
(2, 2, 26277, 0, '123', 'pochta@mail.ru', '+7 912 419-33-82', 'qiurgiqerbgqwehbrt', 'уршцкруещ', '2024-10-14 01:51:47', '2024-10-14 01:51:47'),
(3, 1, 9006, 0, '123', 'pochta@mail.ru', '1234', 'qiurgiqerbgqwehbrt', 'trjtuy', '2024-10-19 07:31:25', '2024-10-19 07:31:25'),
(4, 1, 3000000, 0, 'danil', 'danil', 'danil.kozlov.03@gmail.com', '4ormo3', 'mrkm3', '2024-11-28 05:27:20', '2024-11-28 05:27:20'),
(5, 1, 15000000, 0, 'Данил', 'daminator_72@mail.ru', '89526777889', '1', 'Пожелание', '2024-12-11 07:14:52', '2024-12-11 07:14:52'),
(6, 1, 9500000, 0, 'ww', 'ww@mail.ru', '2', '2', 'Пожелание', '2024-12-11 07:17:06', '2024-12-11 07:17:06'),
(7, 1, 9500000, 0, '1', '1@mail.ru', '1', '1', 'Пожелание', '2024-12-11 07:19:06', '2024-12-11 07:19:06'),
(8, 3, 30200000, 0, '1', '1@mail.ru', '1', '1', 'Пожелание', '2024-12-11 07:23:18', '2024-12-11 07:23:18'),
(9, 1, 15000000, 0, 'q', 'q@mail.ru', '1', '1', 'Пожелание', '2024-12-11 07:27:26', '2024-12-11 07:27:26'),
(10, 1, 15000000, 0, '1', '1@mail.ru', '1', '1', 'Пожелание', '2024-12-11 07:28:43', '2024-12-11 07:28:43'),
(11, 1, 99000000, 0, '1', '1@mail.ru', '123', '123', 'Пожелание', '2025-05-24 04:18:09', '2025-05-24 04:18:09'),
(12, 1, 4550000, 0, '1', '1@mail.ru', '123', '123', '123', '2025-06-18 08:54:00', '2025-06-18 08:54:00');

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `qty` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `title`, `price`, `qty`) VALUES
(1, 1, 16, 'Crafter MD-42/TR Акустическая гитара', 9006, 1),
(2, 1, 14, 'CRAFTER J18/N акустическая гитара. джамбо', 17271, 1),
(3, 1, 10, 'CRAFTER GA8/BK акустическая гитара', 13794, 1),
(4, 2, 16, 'Crafter MD-42/TR Акустическая гитара', 9006, 1),
(5, 2, 14, 'CRAFTER J18/N акустическая гитара. джамбо', 17271, 1),
(6, 3, 16, 'Crafter MD-42/TR Акустическая гитара', 9006, 1),
(7, 4, 26, 'Чайхона 3', 3000000, 1),
(8, 5, 36, 'BENETTY VELOCE 140', 15000000, 1),
(9, 6, 37, 'CUSTOM LINE NAVETTA 33', 9500000, 1),
(10, 7, 37, 'CUSTOM LINE NAVETTA 33', 9500000, 1),
(11, 8, 37, 'CUSTOM LINE NAVETTA 33', 9500000, 2),
(12, 8, 34, 'CAPE COD ll', 11200000, 1),
(13, 9, 36, 'BENETTY VELOCE 140', 15000000, 1),
(14, 10, 36, 'BENETTY VELOCE 140', 15000000, 1),
(15, 11, 1, 'SPARTA', 99000000, 1),
(16, 12, 31, 'KIKI', 4550000, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('daminator_72@mail.ru', '$2y$10$E97.MFqALsXZI3Mh6vWK5uhkp9hR92YAWphm9gEXPBIVXBKoXVgKC', '2024-12-12 03:24:00'),
('danil@mail.ru', '$2y$10$lWayBawl4ETkESnI69QDuuBxVtvR4ebw5umq/NVR6oJKBJTBcMBzO', '2024-11-20 05:59:02'),
('danil2@mail.ru', '$2y$10$iqj1dYqgaeDz6IQRLgpULemcC2dbc8.NQ4UfLwsejIxv5Jki8UqFq', '2024-12-10 15:14:26'),
('danil3@mail.ru', '$2y$10$ihNqiMeX9SJ8pydlRwPaaeM52RnocruH1fNxNa9vUrezfHAov/uXS', '2024-12-10 12:33:36');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `status_id` int UNSIGNED NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double UNSIGNED NOT NULL DEFAULT '0',
  `old_price` double UNSIGNED NOT NULL DEFAULT '0',
  `hit` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `sale` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `content`, `category_id`, `status_id`, `img`, `price`, `old_price`, `hit`, `sale`, `created_at`, `updated_at`, `data_id`) VALUES
(1, 'SPARTA', '1', 'Яхта SPARTA: Эта просторная яхта предлагает комфорт и стиль в каждом путешествии. Оснащенная современными удобствами, она идеально подходит для семейных поездок. Наслаждайтесь панорамными видами с просторных палуб и проведите незабываемое время на борту.', 1, 1, 'images/mkDat4NBH7D40ZKlFGrgjayFATxnKKBAoNCImoSC.webp', 99000000, 0, 1, 1, '2024-11-19 08:36:12', '2024-12-10 02:10:25', 1),
(2, 'BURKUT', 'caixona-1', 'Яхта BURKUT: Ощутите свободу на борту этой роскошной яхты, которая сочетает элегантность и производительность. Благодаря мощным двигателям и стильному дизайну, она идеально подходит для приключений по живописным бухтам и безмятежным морям.', 2, 2, 'images/HswBL6bEwl1gQS7tRrFXEzvYQMSVa2TbLi1NsdLv.webp', 18750000, 0, 1, 1, '2024-11-19 08:59:42', '2024-12-09 15:50:42', 2),
(3, 'LIBERTY', 'caixona-2', 'Яхта LIBERTY: Эта яхта является воплощением комфорта и стиля. С тремя просторными каютами и элегантной гостиной, она идеально подходит для отдыха с друзьями или романтического уикенда. Откройте для себя новые горизонты в этом плавающем раю.', 1, 1, 'images/4077hd8ihXRXKMTcdbd1sTzmamWAjx9qCGXGdLOc.webp', 16500000, 0, 0, 0, '2024-11-20 06:18:00', '2024-12-09 15:51:23', 3),
(5, 'FREEDAY', 'iaxta', 'Яхта FREEDAY: Созданная для изысканных путешествий, эта яхта сочетает в себе комфорт и стиль. Просторные каюты, великолепный салон и обширная палуба подойдут для романтических вечеров и встреч с друзьями. Откройте мир морских исследований с ней.', 1, 2, 'images/PJhSvJLWDxb7Z2dSCJOTwNmfO4bJxDbtU5FUm7g9.webp', 125000000, 0, 0, 0, '2024-11-29 01:35:52', '2024-12-09 15:55:07', 5),
(29, 'AVALON', 'avalon', 'AVALON — это 67-метровая суперяхта от Heesen, сочетающая в себе элегантность, инновации и мощь. Изготовленная в 2023 году, она является самой большой стальной яхтой, когда-либо построенной голландской верфью, демонстрируя гладкий стальной корпус, спортивный экстерьер от Winch Design и обратную носовую часть — впервые для компании Heesen. Дизайн яхты SPARTA ориентирован на комфорт и универсальность, что делает её идеальной для длительных путешествий с семьёй или друзьями.\r\n\r\nЯхта вмещает 12 гостей в шести просторных каютах, включая две эксклюзивные каюты владельца. Универсальная гостевая зона также включает в себя VIP-комнату во всю ширину яхты, которую можно переоборудовать для различных целей, например, в игровую зону для детей. Темы дизайна яхты — воздух, вода и земля — отражены на всех её палубах, подчёркивая связь с природой.', 1, 1, 'images/c6e8HB7ASYcYrjL9wtTpKzqk7o9RN7KnqWdc53fZ.webp', 9900000, 0, 0, 0, '2024-12-09 11:32:05', '2024-12-09 11:32:05', 7),
(30, 'OCEAN DRIVE', 'ocean-drive', 'OCEAN DRIVE is Windy SR52 for sale, built in 2017. Designed for high-performance cruising, she boasts three powerful Volvo engines (435hp each) and can reach speeds up to 46 knots. She features a sleek design with a single cabin, offering accommodations for two, and a spacious deck ideal for relaxation. Built by Windy Boats, this yacht combines performance with elegance, making it perfect for both day trips and longer excursions​.', 1, 1, 'images/4bikjTDg7AGK9rWfflNAn6foJiqf2KnIdKjY7S8i.webp', 3800000, 0, 0, 0, '2024-12-09 11:44:29', '2024-12-09 11:44:29', 8),
(31, 'KIKI', 'kiki', 'M/Y KIKI - Tecnomar for Lamborghini 63 на продажу и в аренду - воплощение стиля и спортивного дизайна роскошных скоростных яхт. Линии корпуса вдохновлены суперкарами Lamborghini. Дизайн яхты основан на двух основных принципах: скорость и динамическая оптимизация веса. KIKI оснащена двумя двигателями MAN V12 мощностью 2000 л.с. каждый. Яхта достигает максимальной скорости в 63 узла. Использование углеродного волокна - отличительная черта автомобилей Lamborghini - относит яхту к категории ультралегких: максимальный вес составляет всего 24 тонны при длине 20 метров.', 2, 1, 'images/H6dVn94j9gcQAKXJvnftN8BXv4ISbBKcI3i80rCW.webp', 4550000, 0, 1, 1, '2024-12-09 11:46:10', '2024-12-09 11:46:10', 9),
(32, 'VOICE', 'voice', 'Яхта VOICE  \r\nПогрузитесь в мир роскоши на \"Морском ветре\". Эта элегантная яхта, длиной 25 метров, предлагает просторные каюты с панорамными окнами и современным дизайном. Наслаждайтесь вечерними закатами на комфортной палубе, в окружении друзей и семьи. Идеально подходит для долгих круизов и незабываемых путешествий.', 2, 2, 'images/6ixFzaWupv4n1HPNnJfBVRn5EgGv3jTxs20Ws22d.webp', 65000000, 0, 1, 1, '2024-12-09 11:50:26', '2024-12-09 11:50:26', 10),
(33, 'NEXT LEVEL', 'next-level', 'Яхта  NEXT LEVEL — идеальный выбор для любителей приключений на воде. С вместимостью до 10 человек, эта спортивная яхта оснащена мощным двигателем и современными навигационными системами. Исследуйте скрытые бухты и нетронутые пляжи, наслаждаясь каждым мгновением свободы на море.', 1, 1, 'images/kZcmWNb0czU019T7evAT9ILOd3UBBRIpaALfT4X8.webp', 2100000, 0, 0, 1, '2024-12-09 11:51:48', '2024-12-09 11:51:48', 11),
(34, 'CAPE COD ll', 'cape-cod-ll', 'CAPE COD II — 31-метровая экспедиционная яхта на продажу от итальянской верфи Cantiere delle Marche. Построена в 2019 году в рамках серии Darwin Class 102. Эта яхта — идеальный выбор для  дальних морских путешествий в сочетании с роскошными, высококлассными удобствами. Спроектированная Hydro Tec с элегантным интерьером от Francesco Guida, CAPE COD II сочетает в себе мощь и изысканный стиль, что делает её идеальной яхтой для продолжительных круизов с максимальным комфортом.\r\nОснащенная двумя двигателями Caterpillar C18 ACERT, CAPE COD II достигает максимальной скорости в 13 узлов при крейсерской скорости в 11,5 узлов. С впечатляющей дальностью хода в 4700 морских миль на скорости 10 узлов, она идеально подходит для длительных путешествий. Стальной корпус и алюминиевая надстройка обеспечивают максимальную прочность и устойчивость.', 1, 1, 'images/5QfUgg7u55aRtwyKPTGAQTaETk4wpKxN3sF1S6iT.webp', 11200000, 0, 1, 0, '2024-12-09 11:56:28', '2024-12-09 11:56:28', 11),
(36, 'BENETTY VELOCE 140', 'benetty-veloce-140', 'Veloce 140 Benetti — элитная трехпалубная яхта с флайбриджем, которая удачно сочетает в себе надежность, прочность и устойчивость на воде, благодаря большим размерам, но в то же время способность развивать большую скорость, как модели с легким водоизмещением. Oсобенностью яхты Veloce 140\' является современный корпус D2P (Displacement to Planing), разработанный студией морского проектирования Пьерлуиджи Аусонио и научно-исследовательским центром Azimut | Benetti.\r\n\r\nЯхта относится к классу А и предназначена для длительных путешествий в океанских водах. Компания Arconyachts предлагается комплексное обслуживание сделки купли-продажи. Также представлены фото и подробная техническая информация о модели.', 1, 1, 'images/akdB7eBp28tyzDPD0AUGqUpcafOnt2Rto8HcLzvM.webp', 15000000, 0, 0, 1, '2024-12-09 12:01:26', '2024-12-09 12:01:26', 4),
(37, 'CUSTOM LINE NAVETTA 33', 'custom-line-navetta-33', 'CUSTOM LINE NAVETTA 33. Уютная 22-метровая яхта с современным дизайном и открытой палубой. Подходит для романтических уикендов или семейных поездок, предлагая просторные каюты и возможность ловли рыбы в морских водах.', 1, 1, 'images/dilkfrTEqIacKEW29QLVBsTfLqLSQE9oaCO96965.webp', 9500000, 0, 1, 1, '2024-12-09 12:11:38', '2024-12-09 12:11:38', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `title`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'В НАЛИЧИИ', 'fas fa-check text-success', '2020-12-12 08:46:12', '2020-12-12 08:46:12'),
(2, 'ПОД ЗАКАЗ', 'fas fa-regular fa-clock text-danger', '2020-12-12 08:46:12', '2020-12-12 08:46:12');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(28, 'Данил', 'Danil@mail.ru', NULL, '$2y$10$1eWJd17om3bQmpIo.ZDtDumvPyjPKxUouvxstLH3nnin2AFEdWxXm', 1, NULL, '2025-06-15 05:26:19', '2025-06-15 05:26:19'),
(29, 'Данил', 'Danil123@mail.ru', NULL, '$2y$10$3wUZABqAlbqzj7A3bqxz2uppRchPr8Xh.xqhpx8H2KAuTwPBMoylW', NULL, NULL, '2025-06-18 08:34:01', '2025-06-18 08:34:01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_id` (`data_id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `data`
--
ALTER TABLE `data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`data_id`) REFERENCES `data` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
