-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 11 2023 г., 12:00
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
-- База данных: `tal-on`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `doctor_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `appointments`
--

INSERT INTO `appointments` (`id`, `comments`, `user_id`, `doctor_id`, `created_at`, `updated_at`, `date`, `time`) VALUES
(1, 'шшшш', 2, 1, '2023-07-07 06:10:26', '2023-07-07 06:10:30', '2023-07-07', '09:15:00'),
(2, 'aefsfsef', 1, 3, '2023-07-07 06:12:04', '2023-07-07 06:15:40', '2023-07-07', '09:30:00'),
(3, 'Типо запись', 1, 1, '2023-07-07 06:17:34', '2023-07-07 06:19:13', '2023-07-07', '08:30:00'),
(4, 'fymffyfy', 2, 3, '2023-07-07 10:24:02', '2023-07-07 10:49:22', '2023-07-07', '08:45:00'),
(5, 'dtjz', 2, 3, '2023-07-07 10:50:03', '2023-07-07 11:09:50', '2023-07-07', '11:15:00'),
(6, 'awdadawd', 1, 3, '2023-07-07 11:02:15', '2023-07-07 11:02:21', '2023-07-07', '09:00:00'),
(7, NULL, NULL, 1, '2023-07-07 11:29:15', '2023-07-07 11:29:15', '2023-07-07', '08:15:00'),
(8, NULL, NULL, 1, '2023-07-07 11:29:18', '2023-07-07 11:29:18', '2023-07-07', '10:00:00'),
(9, 'etdnz', 2, 1, '2023-07-11 04:33:14', '2023-07-11 04:33:56', '2023-07-11', '08:00:00'),
(10, 'Sssvcs', 2, 1, '2023-07-11 04:35:48', '2023-07-11 04:35:53', '2023-07-11', '12:00:00'),
(11, 'fxhtfhtf', 2, 1, '2023-07-11 04:41:14', '2023-07-11 04:41:19', '2023-07-11', '10:00:00'),
(12, 'asrgesg', 2, 1, '2023-07-11 04:42:06', '2023-07-11 04:42:10', '2023-07-11', '08:45:00'),
(13, 'kjbh', 2, 1, '2023-07-11 04:43:58', '2023-07-11 04:44:06', '2023-07-11', '10:15:00'),
(14, 'esf', 2, 1, '2023-07-11 04:44:35', '2023-07-11 04:44:39', '2023-07-11', '09:30:00'),
(15, NULL, 2, 1, '2023-07-11 04:47:20', '2023-07-11 04:47:26', '2023-07-11', '08:15:00'),
(16, NULL, 2, 1, '2023-07-11 04:49:05', '2023-07-11 04:49:08', '2023-07-11', '09:45:00'),
(17, NULL, 2, 1, '2023-07-11 05:02:57', '2023-07-11 05:05:55', '2023-07-11', '12:15:00');

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint UNSIGNED NOT NULL,
  `poly_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `office` smallint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `poly_id`, `name`, `field`, `created_at`, `updated_at`, `office`) VALUES
(1, 1, 'Врач 1', 'Терапевт', NULL, NULL, 0),
(2, 1, 'Врач 2', 'Хирург', NULL, NULL, 0),
(3, 2, 'Попов Р.Н.', 'ЛОР', NULL, NULL, 306);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_06_14_114854_create_polyclinics_table', 1),
(2, '2023_06_14_114922_create_doctors_table', 2),
(3, '2023_06_14_121127_delete_column_on_users_table', 3),
(4, '2023_06_14_121934_add_column_on_users_table', 4),
(5, '2023_06_16_084737_add_office_field_to_doctors_table', 5),
(6, '2023_06_16_122657_add_contacts_field_to_polyclinics_table', 6),
(7, '2023_06_19_071635_create_tickets_table', 7),
(9, '2023_06_21_081048_create_appointments_table', 8),
(10, '2023_06_28_125253_drop_columns_start_finish_time_from_appointments_table', 9),
(11, '2023_06_28_125613_add_columns_date_time_on_appointments_table', 10),
(12, '2023_07_05_105506_add_column_available_to_appointments_table', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `polyclinics`
--

CREATE TABLE `polyclinics` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contacts` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `polyclinics`
--

INSERT INTO `polyclinics` (`id`, `name`, `address`, `created_at`, `updated_at`, `contacts`) VALUES
(1, 'Поликлиника 1', 'Адрес 1', NULL, NULL, '375291234567'),
(2, 'Поликлиника 2', 'Адрес 2', NULL, NULL, '0');

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
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@test.com', NULL, '$2y$10$z0ECeFKz1cuREWiWnNLNC.YCEEbWN9NVNSsRPi8.AGn9Hmjeyg.t6', '6vFuQmRiCzOMWAOYflKIffCuAux7tJOAypw2qniaM5QzTYNnxBfbHHDXOsOf', '2023-06-14 09:55:14', '2023-06-14 09:55:14'),
(2, 'Пупов Сырок', 'mail@test.com', NULL, '$2y$10$JSLXmwA3mlZv7j4jR1DkreUF7u0KF0VaD3rxMQ7a5ENn1qjj8OeaC', 'yps7eKilnYxid70TQ6LoGlT5ALhOgK6a2k4Tusi5H2o74oeIbOtOT6gzqttc', '2023-06-30 04:33:03', '2023-06-30 04:33:03');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`);

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_poly_id_foreign` (`poly_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `polyclinics`
--
ALTER TABLE `polyclinics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `polyclinics`
--
ALTER TABLE `polyclinics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_poly_id_foreign` FOREIGN KEY (`poly_id`) REFERENCES `polyclinics` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
