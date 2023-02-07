-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2023 a las 13:33:32
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfg_denuncias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acussations`
--

CREATE TABLE `acussations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','in process','finished') DEFAULT 'pending',
  `type_of_acusation` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `acussations`
--

INSERT INTO `acussations` (`id`, `users_id`, `status`, `type_of_acusation`, `description`, `lat`, `lon`, `created_at`, `updated_at`) VALUES
(1, 1, 'in process', 'standard', 'una denuncia estandar', -25.5066112, -54.6308096, '2023-01-29 20:10:22', '2023-01-29 23:30:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(155, '2014_10_12_000000_create_users_table', 1),
(156, '2014_10_12_100000_create_password_resets_table', 1),
(157, '2019_08_19_000000_create_failed_jobs_table', 1),
(158, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(159, '2023_01_13_185003_acussation', 1),
(160, '2023_01_17_142151_create_permission_tables', 1),
(161, '2023_01_22_132846_create_urgente_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrar_denuncias', 'web', '2023-01-27 00:07:55', '2023-01-27 00:07:55'),
(2, 'administrar_usuarios', 'web', '2023-01-27 00:07:55', '2023-01-27 00:07:55'),
(3, 'Ver_denuncias_propias', 'web', '2023-01-27 00:07:56', '2023-01-27 00:07:56'),
(4, 'Realizar_denuncia', 'web', '2023-01-27 00:07:56', '2023-01-27 00:07:56'),
(5, 'Registrarse', 'web', '2023-01-27 00:07:56', '2023-01-27 00:07:56'),
(6, 'Crear_denuncia_urgente', 'web', '2023-01-27 00:07:56', '2023-01-27 00:07:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-01-27 00:07:55', '2023-01-27 00:07:55'),
(2, 'usuario_logueado', 'web', '2023-01-27 00:07:55', '2023-01-27 00:07:55'),
(3, 'visitante', 'web', '2023-01-27 00:07:56', '2023-01-27 00:07:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urgente`
--

CREATE TABLE `urgente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `ci` int(11) DEFAULT NULL,
  `status` enum('pending','in process','finished') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `urgente`
--

INSERT INTO `urgente` (`id`, `description`, `lat`, `lon`, `ci`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ayudaaa', -25.5066112, -54.6308096, 369883, 'finished', '2023-01-27 00:28:52', '2023-01-29 23:36:54'),
(2, 'atoi', -27.3237484, -55.8356907, 3692882, 'in process', '2023-01-27 21:08:46', '2023-01-29 02:09:58'),
(3, 'yo', -27.3307706, -55.8458364, 12456, 'in process', '2023-01-27 21:41:06', '2023-01-29 02:10:21'),
(4, 'anorio me pega por la tola234 fwewrw er', -27.3377703, -55.8603829, 3692882, 'in process', '2023-01-29 02:17:26', '2023-01-29 23:27:19'),
(5, NULL, -25.5066112, -54.6308096, 10000000, 'in process', '2023-01-29 02:44:52', '2023-01-29 20:11:05'),
(6, 'nueva denuncia', -25.5066112, -54.6308096, 444444, 'in process', '2023-01-30 03:23:17', '2023-01-30 03:58:48'),
(7, 'nueva denuncia 333', -25.5066112, -54.6308096, 444444, 'in process', '2023-01-30 03:23:59', '2023-01-30 03:58:55'),
(8, 'fwefwe ew r 324 23 324fff', -25.5066112, -54.6308096, 4444, 'in process', '2023-01-30 03:24:14', '2023-01-30 03:59:02'),
(9, 'wer wer we', -25.5066112, -54.6308096, 33, 'in process', '2023-01-30 03:25:19', '2023-01-30 03:59:09'),
(10, 'sdfwewe wer rw erwe', -25.5066112, -54.6308096, NULL, 'in process', '2023-01-30 03:26:39', '2023-01-30 03:59:16'),
(11, 'sdfwewe wer rw erwe', -25.5066112, -54.6308096, NULL, 'in process', '2023-01-30 03:26:53', '2023-01-30 03:59:23'),
(12, '3ert eter et', -25.5066112, -54.6308096, NULL, 'in process', '2023-01-30 03:28:04', '2023-01-30 03:59:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `user_ci` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_number` varchar(255) NOT NULL,
  `user_date_of_birth` date NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_surname`, `user_ci`, `user_email`, `password`, `user_number`, `user_date_of_birth`, `user_gender`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin1', 'Admin', 3256489, 'admin1@gmail.com', '$2y$10$EwFkVyy8GbeMMCTUbrb5RuPfutv5pPQmKZweCNiwccY/SKpOcEHEC', '0981659235', '2003-02-12', 'Femenino', NULL, '2023-01-27 00:07:56', '2023-01-27 00:07:56'),
(2, 'Elizabeth', 'Grantt', 3256489, 'admin2@gmail.com', '$2y$10$cnQX9BJgogjJy52ADGNbP..B4.a05gW/Fw30i90hZtrUAqh8No.lW', '0981659235', '2003-02-12', 'Femenino', NULL, '2023-01-27 00:07:57', '2023-01-27 00:07:57'),
(3, 'Stefanni', 'Germanotta', 3256489, 'admin3@gmail.com', '$2y$10$D1TmWIJEqZ6ACQysqsrMceVMF6nXikCC1vPXVqApkpSUasosAhd..', '0981659235', '2003-02-12', 'Femenino', NULL, '2023-01-27 00:07:57', '2023-01-27 00:07:57'),
(4, 'Denunciante1', 'Denunciante', 5689213, 'denunciante1@gmail.com', '$2y$10$2sVTtABdMrgiNrcIsTJaauvZa4AhlewQ8CQRrZYXBckrlR03VmGvG', '0981651235', '2003-02-12', 'Masculino', NULL, '2023-01-27 00:07:57', '2023-01-27 00:07:57'),
(5, 'Jenna', 'Ortega', 1256145, 'jenna@gmail.com', '$2y$10$g17i60lvpYf5mVGBk1tEfeYGW3OB4FIt./QyuqmON5kEsjdo1RxLm', '0981651235', '2003-02-12', 'Sin especificar', NULL, '2023-01-27 00:07:58', '2023-01-27 00:07:58'),
(6, 'Alexander', 'Paniagua', 125369, 'alex@gmail.com', '$2y$10$4/9vwG9RfydJxlCUukl56u6I7iXqGMh/K8/YrLgPU//M86OzbnAg.', '0981651235', '2003-02-12', 'Masculino', NULL, '2023-01-27 00:07:58', '2023-01-27 00:07:58'),
(7, 'Sara', 'Armoa', 3256489, 'sariavaal@gmail.com', '$2y$10$KLZtKPrxVURVW7JUY0GR8OmRxeKwIhXluHqTtzOLLdmHUhSov1X9a', '0981659235', '1994-10-12', 'Femenino', NULL, '2023-01-27 00:07:58', '2023-01-27 00:07:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acussations`
--
ALTER TABLE `acussations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acussations_users_id_foreign` (`users_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `urgente`
--
ALTER TABLE `urgente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acussations`
--
ALTER TABLE `acussations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `urgente`
--
ALTER TABLE `urgente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acussations`
--
ALTER TABLE `acussations`
  ADD CONSTRAINT `acussations_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
