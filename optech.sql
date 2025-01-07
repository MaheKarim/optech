-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2025 at 12:42 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optech`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint UNSIGNED NOT NULL,
  `about_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_signature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_image`, `seo_image`, `seo_signature`, `created_at`, `updated_at`) VALUES
(1, 'uploads/custom-images/about_image--2024-07-10-02-06-21-1129.webp', 'uploads/custom-images/seo_image--2024-07-10-01-33-31-3266.webp', 'uploads/custom-images/seo_signature--2024-07-10-01-32-53-1689.webp', NULL, '2024-07-10 08:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_translations`
--

CREATE TABLE `about_us_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `about_us_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_translations`
--

INSERT INTO `about_us_translations` (`id`, `about_us_id`, `lang_code`, `short_title`, `title`, `description`, `item1`, `item2`, `item3`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'About Company', 'Join World\'s Best Marketplace for Workers', '<p class=\"about-desc\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie mi ut arcu conde consequat erat iaculis. Duis quam lorem, bibendum at bibendum ut, auctor a ligula. Alv dolor urna. Proin rutrum lobortis vulputate. Suspendisse tincidunt urna et odio egestas tum. Class aptent taciti sociosqu ad litora torquen. Interdum et malesuada fames ac eu consequat. Nunc facilisis porttitor odio eu finibus.</p>', 'Modern Technology', 'Insured and Bonded', 'One-off, weekly or fortnightly visits', NULL, '2024-05-15 10:53:50'),
(10, 1, 'hd', 'About Company', 'Join World\'s Best Marketplace for Workers', '<p class=\"about-desc\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie mi ut arcu conde consequat erat iaculis. Duis quam lorem, bibendum at bibendum ut, auctor a ligula. Alv dolor urna. Proin rutrum lobortis vulputate. Suspendisse tincidunt urna et odio egestas tum. Class aptent taciti sociosqu ad litora torquen. Interdum et malesuada fames ac eu consequat. Nunc facilisis porttitor odio eu finibus.</p>', 'Modern Technology', 'Insured and Bonded', 'One-off, weekly or fortnightly visits', '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `designation`, `facebook`, `linkedin`, `twitter`, `instagram`, `about_me`, `image`) VALUES
(1, 'Ibrahim Khalil', 'admin@gmail.com', NULL, '$2y$10$KtfJNrKyaQblEXhZ/4rR1OhtsCQnbFqRiDbNg1IlDSm/DXky7Dlee', 'enable', NULL, NULL, '2024-05-09 03:37:54', 'Web Developer', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://www.twitter.com', 'https://www.instagram.com', 'About Me', 'uploads/website-images/ibrahim-khalil-2024-05-09-09-19-12-8740.png');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int NOT NULL DEFAULT '0',
  `blog_category_id` int NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `show_homepage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `is_popular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `slug`, `image`, `admin_id`, `blog_category_id`, `views`, `status`, `show_homepage`, `is_popular`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'emerging-trends-tech-innovations-to-watch', 'uploads/custom-images/blog--2024-07-15-03-58-18-3203.webp', 1, 1, 0, 1, 'no', '0', '[{\"value\":\"web\"},{\"value\":\"design\"},{\"value\":\"technology\"},{\"value\":\"laravel\"},{\"value\":\"wordpress\"}]', '2024-07-10 09:10:19', '2024-07-15 09:58:18'),
(2, 'focused-on-their-studies-cropped-shot-of', 'uploads/custom-images/blog--2024-07-15-03-41-32-3716.webp', 1, 2, 0, 1, 'no', '0', '[{\"value\":\"event1\"},{\"value\":\"children\"},{\"value\":\"copa amercia\"},{\"value\":\"laravel\"},{\"value\":\"euro cup\"}]', '2024-07-15 09:41:32', '2024-07-15 09:41:32'),
(3, 'startup-team-as-concept-cropped-shot', 'uploads/custom-images/blog--2024-07-15-03-43-46-3036.webp', 1, 3, 0, 1, 'no', '0', '[{\"value\":\"larave\"},{\"value\":\"html\"},{\"value\":\"php\"},{\"value\":\"css\"},{\"value\":\"javascript\"}]', '2024-07-15 09:43:46', '2024-07-15 09:43:46'),
(4, 'tell-me-more-about-this-as-cropped-shot', 'uploads/custom-images/blog--2024-07-15-03-45-37-4986.webp', 1, 3, 0, 1, 'no', '0', '[{\"value\":\"larave\"},{\"value\":\"python\"},{\"value\":\"web design\"},{\"value\":\"programming\"}]', '2024-07-15 09:45:37', '2024-07-15 09:45:37'),
(5, 'graphics-designer-editor-workplace', 'uploads/custom-images/blog--2024-07-15-03-48-08-1303.webp', 1, 4, 0, 1, 'no', '0', '[{\"value\":\"php\"},{\"value\":\"laravel\"},{\"value\":\"html\"},{\"value\":\"css\"},{\"value\":\"design\"}]', '2024-07-15 09:48:08', '2024-07-15 09:48:08'),
(6, 'serious-confident-our-curly-bearded-office', 'uploads/custom-images/blog--2024-07-15-03-50-28-5273.webp', 1, 5, 0, 1, 'no', '0', '[{\"value\":\"djongo\"},{\"value\":\"python\"},{\"value\":\"mysql\"},{\"value\":\"database\"}]', '2024-07-15 09:49:50', '2024-07-15 09:50:28'),
(7, 'person-working-in-the-office-workplace', 'uploads/custom-images/blog--2024-07-15-03-54-04-7096.webp', 1, 2, 0, 1, 'no', '0', '[{\"value\":\"web development\"},{\"value\":\"programming\"},{\"value\":\"javascript\"},{\"value\":\"laravel\"}]', '2024-07-15 09:54:05', '2024-07-15 09:54:05'),
(8, 'colleagues-discussing-in-coworking-office', 'uploads/custom-images/blog--2024-07-15-03-58-45-2281.webp', 1, 1, 0, 1, 'no', '0', '[{\"value\":\"web devleopment\"},{\"value\":\"design\"},{\"value\":\"php\"},{\"value\":\"html\"}]', '2024-07-15 09:56:42', '2024-07-15 09:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'web-design', 1, '2024-07-10 09:06:01', '2024-07-10 09:06:01'),
(2, 'laravel', 1, '2024-07-10 09:06:10', '2024-07-10 09:06:10'),
(3, 'wordpress', 1, '2024-07-10 09:06:20', '2024-07-10 09:06:20'),
(4, 'technology', 1, '2024-07-10 09:06:28', '2024-07-10 09:06:28'),
(5, 'flutter-apps', 1, '2024-07-10 09:06:41', '2024-07-10 09:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_translations`
--

CREATE TABLE `blog_category_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_category_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category_translations`
--

INSERT INTO `blog_category_translations` (`id`, `blog_category_id`, `lang_code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Web Design', '2024-07-10 09:06:01', '2024-07-10 09:06:01'),
(2, 1, 'hd', 'Web Design', '2024-07-10 09:06:01', '2024-07-10 09:06:01'),
(3, 2, 'en', 'Laravel', '2024-07-10 09:06:10', '2024-07-10 09:06:10'),
(4, 2, 'hd', 'Laravel', '2024-07-10 09:06:10', '2024-07-10 09:06:10'),
(5, 3, 'en', 'WordPress', '2024-07-10 09:06:20', '2024-07-10 09:06:20'),
(6, 3, 'hd', 'WordPress', '2024-07-10 09:06:20', '2024-07-10 09:06:20'),
(7, 4, 'en', 'Technology', '2024-07-10 09:06:28', '2024-07-10 09:06:28'),
(8, 4, 'hd', 'Technology', '2024-07-10 09:06:28', '2024-07-10 09:06:28'),
(9, 5, 'en', 'Flutter Apps', '2024-07-10 09:06:41', '2024-07-10 09:06:41'),
(10, 5, 'hd', 'Flutter Apps', '2024-07-10 09:06:41', '2024-07-10 09:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `name`, `email`, `phone`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'John Doe', 'user@gmail.com', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majoritys have suai alteration in som don&#039;t. Rando words which don&#039;t look even slightly believable.', 1, '2024-07-15 09:59:56', '2024-07-15 10:00:14'),
(3, 1, 'Jonas Lawrence', 'client@gmail.com', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majoritys have suai alteration in som don&#039;t. Rando words which don&#039;t look even slightly believable.', 1, '2024-07-15 10:00:08', '2024-07-15 10:00:14'),
(4, 1, 'David Simmonsss', 'david@gmail.com', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majoritys have suai alteration in som don&#039;t. Rando words which don&#039;t look even slightly believable.', 1, '2024-07-15 10:01:30', '2024-07-15 10:02:15'),
(5, 2, 'David Richard', 'user@gmail.com', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majoritys have suai alteration in som don&#039;t. Rando words which don&#039;t look even slightly believable.', 1, '2024-07-15 10:01:46', '2024-07-15 10:02:16'),
(6, 2, 'David Warner', 'david@gmail.com', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majoritys have suai alteration in som don&#039;t. Rando words which don&#039;t look even slightly believable.', 1, '2024-07-15 10:02:11', '2024-07-15 10:02:16'),
(7, 1, 'Mahe Karim', 'rashedadnaan@gmail.com', NULL, 'Framework  For What Should I Use next', 1, '2024-12-31 09:35:43', '2024-12-31 09:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `blog_translations`
--

CREATE TABLE `blog_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seo_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_translations`
--

INSERT INTO `blog_translations` (`id`, `blog_id`, `lang_code`, `title`, `description`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Emerging Trends: Tech Innovations to Watch', '<p><strong>Blog Post Title: \"Cloud Computing: Enhancing Business Operations Globally\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-58-18-3203.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Emerging Trends: Tech Innovations to Watch', 'In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale.', '2024-07-10 09:10:19', '2024-07-15 09:58:28'),
(2, 1, 'hd', 'Emerging Trends: Tech Innovations to Watch', '<p><strong>Blog Post Title: \"Cloud Computing: Enhancing Business Operations Globally\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Emerging Trends: Tech Innovations to Watch', 'In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale.', '2024-07-10 09:10:19', '2024-07-10 09:10:19'),
(3, 2, 'en', 'Focused on their studies cropped shot of', '<p><strong>Blog Post Title: \"Focused on their studies cropped shot of\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-41-32-3716.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Focused on their studies cropped shot of', 'Focused on their studies cropped shot of', '2024-07-15 09:41:32', '2024-07-15 09:42:59'),
(4, 2, 'hd', 'Focused on their studies cropped shot of', '<p><strong>Blog Post Title: \"Cloud Computing: Enhancing Business Operations Globally\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Focused on their studies cropped shot of', 'Focused on their studies cropped shot of', '2024-07-15 09:41:32', '2024-07-15 09:41:32'),
(5, 3, 'en', 'Startup & team as concept cropped shot', '<p><strong>Blog Post Title: \"Startup &amp; team as concept cropped shot\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-43-46-3036.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Startup & team as concept cropped shot', 'Startup & team as concept cropped shot', '2024-07-15 09:43:46', '2024-07-15 09:44:45'),
(6, 3, 'hd', 'Startup & team as concept cropped shot', '<p><strong>Blog Post Title: \"Focused on their studies cropped shot of\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p>&nbsp;</p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Startup & team as concept cropped shot', 'Startup & team as concept cropped shot', '2024-07-15 09:43:46', '2024-07-15 09:43:46'),
(7, 4, 'en', 'Tell me more about this as cropped shot', '<p><strong>Blog Post Title: \"Tell me more about this as cropped shot\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-45-37-4986.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Tell me more about this as cropped shot', 'Tell me more about this as cropped shot', '2024-07-15 09:45:37', '2024-07-15 09:46:05'),
(8, 4, 'hd', 'Tell me more about this as cropped shot', '<p><strong>Blog Post Title: \"Startup &amp; team as concept cropped shot\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../uploads/custom-images/blog--2024-07-15-03-43-46-3036.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Tell me more about this as cropped shot', 'Tell me more about this as cropped shot', '2024-07-15 09:45:37', '2024-07-15 09:45:37'),
(9, 5, 'en', 'Graphics designer editor workplace', '<p><strong>Blog Post Title: \"Graphics designer editor workplace\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-48-08-1303.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Graphics designer editor workplace', 'Graphics designer editor workplace', '2024-07-15 09:48:08', '2024-07-15 09:48:26'),
(10, 5, 'hd', 'Graphics designer editor workplace', '<p><strong>Blog Post Title: \"Graphics designer editor workplace\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../uploads/custom-images/blog--2024-07-15-03-45-37-4986.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Graphics designer editor workplace', 'Graphics designer editor workplace', '2024-07-15 09:48:08', '2024-07-15 09:48:08'),
(11, 6, 'en', 'Serious confident our curly bearded office', '<p><strong>Blog Post Title: \"Serious confident our curly bearded office\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-50-28-5273.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Serious confident our curly bearded office', 'Serious confident our curly bearded office', '2024-07-15 09:49:50', '2024-07-15 09:53:10');
INSERT INTO `blog_translations` (`id`, `blog_id`, `lang_code`, `title`, `description`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(12, 6, 'hd', 'Serious confident our curly bearded office', '<p><strong>Blog Post Title: \"Serious confident our curly bearded office\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p>&nbsp;</p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Serious confident our curly bearded office', 'Serious confident our curly bearded office', '2024-07-15 09:49:50', '2024-07-15 09:49:50'),
(13, 7, 'en', 'Person working in the office workplace', '<p><strong>Blog Post Title: \"Person working in the office workplace\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-54-04-7096.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Person working in the office workplace', 'Person working in the office workplace', '2024-07-15 09:54:05', '2024-07-15 09:54:18'),
(14, 7, 'hd', 'Person working in the office workplace', '<p><strong>Blog Post Title: \"Person working in the office workplace\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../uploads/custom-images/blog--2024-07-15-03-50-28-5273.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Person working in the office workplace', 'Person working in the office workplace', '2024-07-15 09:54:05', '2024-07-15 09:54:05'),
(15, 8, 'en', 'Colleagues discussing in coworking office', '<p><strong>Blog Post Title: \"Colleagues discussing in coworking office\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p><img src=\"../../../../uploads/custom-images/blog--2024-07-15-03-58-45-2281.webp\" alt=\"\" width=\"940\" height=\"618\"></p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Colleagues discussing in coworking office', 'Colleagues discussing in coworking office', '2024-07-15 09:56:42', '2024-07-15 09:59:02'),
(16, 8, 'hd', 'Colleagues discussing in coworking office', '<p><strong>Blog Post Title: \"Colleagues discussing in coworking office\"</strong></p>\r\n<p>In today\'s digital age, cloud computing has revolutionized the way businesses operate and store their data. With the ability to access resources and applications over the internet, cloud computing offers unparalleled flexibility, scalability, and cost-efficiency for organizations worldwide. From small startups to large enterprises, businesses are leveraging the power of the cloud to streamline operations, improve collaboration, and drive innovation.</p>\r\n<p>Cloud computing provides businesses with the agility to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance. This flexibility enables companies to respond quickly to changing market conditions, launch new products and services faster, and stay ahead of the competition. Additionally, the pay-as-you-go model of cloud services allows organizations to pay only for the resources they use, reducing overall IT costs and maximizing operational efficiency.</p>\r\n<p>One of the key benefits of cloud computing is its global reach, enabling businesses to expand their operations beyond geographical boundaries. With cloud-based solutions, teams can collaborate in real-time from anywhere in the world, breaking down communication barriers and fostering a more connected and productive workforce. This global accessibility not only enhances business operations but also improves customer service by providing seamless access to products and services on a global scale.</p>\r\n<p>Security is a top priority for businesses when it comes to adopting cloud computing solutions. Cloud service providers invest heavily in robust security measures to protect data from unauthorized access, breaches, and cyber threats. By storing data in secure cloud environments, businesses can mitigate risks, ensure compliance with data privacy regulations, and safeguard sensitive information against potential security vulnerabilities.<br><br></p>\r\n<ul>\r\n<li><strong>Scalability:</strong>&nbsp;Cloud computing allows businesses to scale resources up or down based on demand, eliminating the need for costly hardware investments and infrastructure maintenance.</li>\r\n<li><strong>Global Reach:</strong>&nbsp;Cloud-based solutions enable teams to collaborate globally in real-time, breaking down communication barriers and fostering a connected workforce.</li>\r\n<li><strong>Cost-Efficiency:</strong>&nbsp;The pay-as-you-go model of cloud services reduces overall IT costs by allowing organizations to pay only for the resources they use.</li>\r\n<li><strong>Security Measures:</strong>&nbsp;Cloud service providers invest in robust security measures to protect data from unauthorized access, breaches, and cyber threats.</li>\r\n<li><strong>Innovation:</strong> Cloud computing empowers businesses to experiment with emerging technologies and drive digital transformation initiatives without the constraints of traditional IT infrastructure.<br><br></li>\r\n</ul>\r\n<p>Moreover, cloud computing empowers companies to innovate and experiment with emerging technologies without the constraints of traditional IT infrastructure. From machine learning and artificial intelligence to Internet of Things (IoT) applications, the cloud provides a platform for organizations to test new ideas, develop custom solutions, and drive digital transformation initiatives. By harnessing the power of cloud-based tools and services, businesses can stay agile, competitive, and future-ready in a rapidly evolving technological landscape.</p>\r\n<p>In conclusion, cloud computing is a game-changer for businesses looking to enhance their operations on a global scale. By embracing cloud technologies, organizations can optimize efficiency, reduce costs, improve collaboration, strengthen security measures, and drive innovation across all facets of their operations. As businesses continue to navigate the complexities of the digital economy, leveraging the capabilities of cloud computing will be essential for staying agile, resilient, and competitive in an increasingly interconnected world.</p>', 'Colleagues discussing in coworking office', 'Colleagues discussing in coworking office', '2024-07-15 09:56:42', '2024-07-15 09:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `status`, `created_at`, `updated_at`, `icon`) VALUES
(2, 'graphics-design', 'enable', '2024-07-10 05:57:39', '2024-07-10 05:57:39', 'uploads/custom-images/category--2024-07-10-11-57-39-8697.webp'),
(3, 'digital-marketing', 'enable', '2024-07-10 05:58:10', '2024-07-10 05:58:10', 'uploads/custom-images/category--2024-07-10-11-58-10-4298.webp'),
(4, 'animation', 'enable', '2024-07-10 05:58:25', '2024-07-10 06:10:33', 'uploads/custom-images/category--2024-07-10-11-58-25-6568.webp'),
(5, 'programming', 'enable', '2024-07-10 05:58:38', '2024-07-10 05:58:38', 'uploads/custom-images/category--2024-07-10-11-58-38-9116.webp'),
(6, 'design-creative', 'enable', '2024-07-10 05:58:56', '2024-07-10 05:58:56', 'uploads/custom-images/category--2024-07-10-11-58-56-5158.webp'),
(7, 'photography', 'enable', '2024-07-10 05:59:21', '2024-07-10 05:59:21', 'uploads/custom-images/category--2024-07-10-11-59-21-7503.webp'),
(8, 'development-it', 'enable', '2024-07-10 05:59:39', '2024-07-10 05:59:45', 'uploads/custom-images/category--2024-07-10-11-59-39-3517.webp'),
(9, 'business-style', 'enable', '2024-07-10 06:00:17', '2024-07-10 06:00:17', 'uploads/custom-images/category--2024-07-10-12-00-17-4763.webp'),
(10, 'ai-services', 'enable', '2024-07-10 06:00:34', '2024-07-10 06:00:37', 'uploads/custom-images/category--2024-07-10-12-00-34-4230.webp'),
(11, 'web-design', 'enable', '2024-07-10 06:00:48', '2024-07-10 06:11:17', 'uploads/custom-images/category--2024-07-10-12-00-48-3620.webp'),
(12, 'architecture', 'enable', '2024-07-10 06:01:00', '2024-07-10 06:01:00', 'uploads/custom-images/category--2024-07-10-12-01-00-5020.webp'),
(13, 'marketing', 'enable', '2024-07-10 06:01:20', '2024-07-10 06:11:04', 'uploads/custom-images/category--2024-07-10-12-01-20-4028.webp');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `lang_code`, `name`, `created_at`, `updated_at`, `category_id`) VALUES
(3, 'en', 'Graphics & Design', '2024-07-10 05:57:39', '2024-07-10 05:57:39', 2),
(4, 'hd', 'Graphics & Design', '2024-07-10 05:57:39', '2024-07-10 05:57:39', 2),
(5, 'en', 'Digital Marketing', '2024-07-10 05:58:10', '2024-07-10 05:58:10', 3),
(6, 'hd', 'Digital Marketing', '2024-07-10 05:58:10', '2024-07-10 05:58:10', 3),
(7, 'en', 'Animation', '2024-07-10 05:58:25', '2024-07-10 06:10:33', 4),
(8, 'hd', 'Video & Animation', '2024-07-10 05:58:25', '2024-07-10 05:58:25', 4),
(9, 'en', 'Programming', '2024-07-10 05:58:38', '2024-07-10 05:58:38', 5),
(10, 'hd', 'Programming', '2024-07-10 05:58:38', '2024-07-10 05:58:38', 5),
(11, 'en', 'Design & Creative', '2024-07-10 05:58:56', '2024-07-10 05:58:56', 6),
(12, 'hd', 'Design & Creative', '2024-07-10 05:58:56', '2024-07-10 05:58:56', 6),
(13, 'en', 'Photography', '2024-07-10 05:59:21', '2024-07-10 05:59:21', 7),
(14, 'hd', 'Photography', '2024-07-10 05:59:21', '2024-07-10 05:59:21', 7),
(15, 'en', 'Development & It', '2024-07-10 05:59:39', '2024-07-10 05:59:39', 8),
(16, 'hd', 'Development & It', '2024-07-10 05:59:39', '2024-07-10 05:59:39', 8),
(17, 'en', 'Business Style', '2024-07-10 06:00:17', '2024-07-10 06:00:17', 9),
(18, 'hd', 'Business Style', '2024-07-10 06:00:17', '2024-07-10 06:00:17', 9),
(19, 'en', 'AI Services', '2024-07-10 06:00:34', '2024-07-10 06:00:34', 10),
(20, 'hd', 'AI Services', '2024-07-10 06:00:34', '2024-07-10 06:00:34', 10),
(21, 'en', 'Web Design', '2024-07-10 06:00:48', '2024-07-10 06:11:17', 11),
(22, 'hd', 'Branding Design', '2024-07-10 06:00:48', '2024-07-10 06:00:48', 11),
(23, 'en', 'Architecture', '2024-07-10 06:01:00', '2024-07-10 06:01:00', 12),
(24, 'hd', 'Architecture', '2024-07-10 06:01:00', '2024-07-10 06:01:00', 12),
(25, 'en', 'Marketing', '2024-07-10 06:01:20', '2024-07-10 06:11:04', 13),
(26, 'hd', 'Sales & Marketing', '2024-07-10 06:01:20', '2024-07-10 06:01:20', 13);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `image`) VALUES
(1, '2024-07-10 06:27:43', '2024-07-10 06:27:43', 'uploads/custom-images/city--2024-07-10-12-27-43-4809.webp'),
(2, '2024-07-10 06:27:56', '2024-07-10 06:27:56', 'uploads/custom-images/city--2024-07-10-12-27-56-3200.webp'),
(3, '2024-07-10 06:28:12', '2024-07-10 06:28:12', 'uploads/custom-images/city--2024-07-10-12-28-12-2224.webp');

-- --------------------------------------------------------

--
-- Table structure for table `city_translations`
--

CREATE TABLE `city_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `city_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_translations`
--

INSERT INTO `city_translations` (`id`, `city_id`, `lang_code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Dhaka', '2024-07-10 06:27:43', '2024-07-10 06:27:43'),
(2, 1, 'hd', 'Dhaka', '2024-07-10 06:27:43', '2024-07-10 06:27:43'),
(3, 2, 'en', 'Noakhali', '2024-07-10 06:27:56', '2024-07-10 06:27:56'),
(4, 2, 'hd', 'Noakhali', '2024-07-10 06:27:56', '2024-07-10 06:27:56'),
(5, 3, 'en', 'Chittagong', '2024-07-10 06:28:12', '2024-07-10 06:28:12'),
(6, 3, 'hd', 'Chittagong', '2024-07-10 06:28:12', '2024-07-10 06:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ibrahim Khalil', 'user@gmail.com', '123-343-4444434', 'Award-winning, family owned dealership of new and pre-owned Workzone with several \r\nlocations across the city.', '2024-07-10 07:40:27', '2024-07-10 07:40:27'),
(3, 'Mahe Karim', 'rashedadnaan@gmail.com', '01303062727', 'wfwfwweffwe', '2025-01-01 05:17:22', '2025-01-01 05:17:22'),
(4, 'Aubrey Benson', 'giresiry@mailinator.com', NULL, 'Quia velit repellend', '2025-01-01 10:23:17', '2025-01-01 10:23:17'),
(5, 'Mahe Karim', 'rashedadnaan@gmail.com', '01303062727', 'Karim ZYX', '2025-01-02 04:51:50', '2025-01-02 04:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phone2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `phone`, `email`, `phone2`, `email2`, `map_code`, `created_at`, `updated_at`) VALUES
(1, '+88 234 567 8991', 'abdur.rohman2003@gmail.com', '+88 234 567 8992', 'workzone@gmail.com', 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14599.579502735794!2d90.36542960000001!3d23.82233695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1701237009812!5m2!1sen!2sbd', NULL, '2024-07-10 07:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_translations`
--

CREATE TABLE `contact_us_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `contact_us_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_translations`
--

INSERT INTO `contact_us_translations` (`id`, `contact_us_id`, `lang_code`, `address`, `title`, `description`, `contact_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', '4517 Washington', 'Get in Touch', 'Award-winning, family owned dealership of new and pre-owned Workzone with several locations across the city.', 'Contrary to popular belief Lorem Ipsum is not simply random text.It has roots in a piece of classical Latin literature', '2024-01-28 09:47:29', '2024-07-12 08:58:17'),
(28, 1, 'hd', '4517 Washington', 'Get in Touch', 'Award-winning, family owned dealership of new and pre-owned Aadfirst with several locations across the city.', NULL, '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `currency_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `currency_rate` decimal(8,2) NOT NULL,
  `currency_position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'before_price',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_name`, `currency_code`, `country_code`, `currency_icon`, `is_default`, `currency_rate`, `currency_position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'USD', 'USA', '$', 'yes', '1.00', 'before_price', 'active', '2024-05-07 12:20:36', '2024-05-07 12:20:36'),
(8, 'INR', 'INR', 'IN', '₹', 'no', '2.00', 'before_price', 'active', '2024-07-10 05:35:14', '2024-07-10 05:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_pages`
--

INSERT INTO `custom_pages` (`id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'custom-page-one', 1, '2024-07-10 08:25:59', '2024-07-10 08:25:59'),
(2, 'custom-page-two', 1, '2024-07-10 08:26:08', '2024-07-10 08:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `custom_page_translations`
--

CREATE TABLE `custom_page_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `custom_page_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_page_translations`
--

INSERT INTO `custom_page_translations` (`id`, `custom_page_id`, `lang_code`, `page_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Custom Page One', '<p><strong>1. What is custom page?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. How does work custom page</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 08:25:59', '2024-07-10 08:25:59'),
(2, 1, 'hd', 'Custom Page One', '<p><strong>1. What is custom page?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. How does work custom page</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 08:25:59', '2024-07-10 08:25:59'),
(3, 2, 'en', 'Custom Page Two', '<p><strong>1. What is custom page?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. How does work custom page</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 08:26:08', '2024-07-10 08:26:08'),
(4, 2, 'hd', 'Custom Page Two', '<p><strong>1. What is custom page?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. How does work custom page</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 08:26:08', '2024-07-10 08:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'sender_name', 'WorkZone', NULL, '2024-07-10 04:49:08'),
(2, 'mail_host', 'workzone.minionionbd.com', NULL, '2024-07-10 04:49:08'),
(3, 'email', 'sendmail@workzone.minionionbd.com', NULL, '2024-07-10 04:49:08'),
(4, 'smtp_username', 'sendmail@workzone.minionionbd.com', NULL, '2024-07-10 04:49:08'),
(5, 'smtp_password', ',{dK=1Ov5Vmc', NULL, '2024-07-10 04:49:08'),
(6, 'mail_port', '465', NULL, '2024-07-10 04:49:08'),
(7, 'mail_encryption', 'tls', NULL, '2024-07-10 04:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Reset Password', 'Reset Password', '<h4>Dear <strong>{{user_name}}</strong>,</h4><p>Do you want to reset your password? Please Click the following link and Reset Your Password.</p><p><strong>{{reset_link}}</strong></p><p>&nbsp;</p><p>Thank You</p><p>QuomodoSoft</p>', NULL, NULL),
(2, 'Contact Email', 'Contact Email', '<p>Hello there,</p><p><strong>Mr. {{user_name}} </strong>has send a new email to you. See the message description below:</p><p>Email: <strong>{{user_email}}</strong></p><p>Phone: <strong>{{user_phone}}</strong></p><p><span style=\"background-color: transparent;\">Subject: <strong>{{message_subject}}</strong></span></p><p>Message: <strong>{{message}}</strong></p><p>&nbsp;</p><p>Thank You</p><p>QuomodoSoft</p>', NULL, NULL),
(3, 'NewsLetter Verification', 'NewsLetter Verification', '<h2><strong>Hi there</strong>,</h2><p>Congratulations! Your Subscription has been created successfully. Please Click the following link and Verified Your Subscription.&nbsp;</p><p><strong>{{verification_link}}</strong></p><p>&nbsp;</p><p>Thank You</p><p>QuomodoSoft</p>', NULL, NULL),
(4, 'User Verification', 'User Verification', '<p>Dear <strong>{{user_name}}</strong>,</p><p>Congratulations! Your Account has been created successfully. Please Click the following link and Active your Account.</p><p><strong>{{varification_link}}</strong></p><p>&nbsp;</p><p>Thank You</p><p>QuomodoSoft</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `created_at`, `updated_at`) VALUES
(2, '2024-07-15 08:25:58', '2024-07-15 08:25:58'),
(3, '2024-07-15 08:26:14', '2024-07-15 08:26:14'),
(4, '2024-07-15 08:26:32', '2024-07-15 08:26:32'),
(5, '2024-07-15 08:26:48', '2024-07-15 08:26:48'),
(6, '2024-07-15 08:27:24', '2024-07-15 08:27:24'),
(7, '2024-07-15 08:27:44', '2024-07-15 08:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `faq_translations`
--

CREATE TABLE `faq_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `faq_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_translations`
--

INSERT INTO `faq_translations` (`id`, `faq_id`, `lang_code`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(3, 2, 'en', 'How do I create a freelance profile on the marketplace?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:25:58', '2024-07-15 08:25:58'),
(4, 2, 'hd', 'How do I create a freelance profile on the marketplace?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:25:58', '2024-07-15 08:25:58'),
(5, 3, 'en', 'What steps are involved in submitting a proposal for a job?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:26:14', '2024-07-15 08:26:14'),
(6, 3, 'hd', 'What steps are involved in submitting a proposal for a job?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:26:14', '2024-07-15 08:26:14'),
(7, 4, 'en', 'Are there any fees associated with using the freelance marketplace?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:26:32', '2024-07-15 08:26:32'),
(8, 4, 'hd', 'Are there any fees associated with using the freelance marketplace?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:26:32', '2024-07-15 08:26:32'),
(9, 5, 'en', 'What should I do if I encounter issues with a client or project?', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur.</p>', '2024-07-15 08:26:48', '2024-07-15 08:26:48'),
(10, 5, 'hd', 'What should I do if I encounter issues with a client or project?', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur.</p>', '2024-07-15 08:26:48', '2024-07-15 08:26:48'),
(11, 6, 'en', 'What precautions should I take to avoid scams?', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur.</p>', '2024-07-15 08:27:24', '2024-07-15 08:27:24'),
(12, 6, 'hd', 'What precautions should I take to avoid scams?', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur.</p>', '2024-07-15 08:27:24', '2024-07-15 08:27:24'),
(13, 7, 'en', 'Can I make bank payment ?', '<p>Vestibulum quis neque nunc. Maecenas pharetra libero id efficitur gravida. Aenean risus enim, condimentum vela aliquams in, consequat nec lacus. Aenean faucibus venenatis aliquet. Sed nulla quam, vehicula ut libero molestie volu our as satpat quam. Phasellus semper vitae tellus sit amet scelerisque</p>', '2024-07-15 08:27:44', '2024-07-15 08:28:28'),
(14, 7, 'hd', 'How do I handle test influencer and inspections?', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur.</p>', '2024-07-15 08:27:44', '2024-07-15 08:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint UNSIGNED NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `playstore` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appstore` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `facebook`, `twitter`, `linkedin`, `instagram`, `copyright`, `address`, `phone`, `email`, `playstore`, `appstore`, `created_at`, `updated_at`) VALUES
(1, 'https://www.fb.com/MaheKarim', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'Copyright 2025, QuomodoSoft. All Rights Reserved.', 'Los Angeles, CA, USA', '123-343-4444', 'optech_mike@optech.com', 'https://play.google.com/', 'https://www.apple.com/app-store/', NULL, '2024-12-26 05:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `footer_translations`
--

CREATE TABLE `footer_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `footer_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_translations`
--

INSERT INTO `footer_translations` (`id`, `footer_id`, `lang_code`, `about_us`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Hi Optech is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout the point of using lorem varius sit amet ipsum.', NULL, '2024-12-26 09:34:15'),
(8, 1, 'hd', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout the point of using lorem varius sit amet ipsum.', '2024-07-02 12:15:43', '2024-07-02 12:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` bigint UNSIGNED NOT NULL,
  `data_keys` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data_translations` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `created_at`, `updated_at`, `data_translations`) VALUES
(6, 'about.content', '{\"heading\":\"Hello Heading 28bv\",\"description\":\"Tom Hank 2 m\",\"solar_image\":{},\"images\":{\"solar_image\":\"uploads\\/website-images\\/1733563235_solar_image.jpeg\"}}', '2024-12-04 06:21:03', '2024-12-07 09:20:35', NULL),
(7, 'categories.content', '{\"heading\":\"Nah Bhalo nai\"}', '2024-12-04 06:22:01', '2024-12-23 06:46:04', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Nah Bhalo nai\"}},{\"language_code\":\"hd\",\"values\":{\"heading\":\"Nah Bhalo nai\"}}]'),
(8, 'main_demo_hero.content', '{\"heading\":\"Amar Sonar Bangla Ami Tomay\",\"description\":\"Qwen DeepSeek OpenAI Gemini\",\"small_description\":\"We Quomodo transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"left_button_text\":\"Work With Me\",\"left_button_url\":\"http:\\/\\/localhost\\/optech\\/left\",\"right_button_text\":\"View Service\",\"right_button_url\":\"http:\\/\\/localhost\\/optech\\/right\",\"hero_image\":{},\"images\":{\"hero_image\":\"uploads\\/website-images\\/1735985574_hero_image.png\"}}', '2024-12-18 11:58:28', '2025-01-04 10:12:54', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Amar Sonar Bangla Ami Tomay\",\"description\":\"Qwen DeepSeek OpenAI Gemini\",\"small_description\":\"We Quomodo transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"left_button_text\":\"Work With Me\",\"left_button_url\":\"http:\\/\\/localhost\\/optech\\/left\",\"right_button_text\":\"View Service\",\"right_button_url\":\"http:\\/\\/localhost\\/optech\\/right\",\"hero_image\":{}}},{\"language_code\":\"hd\",\"values\":{\"heading\":\"\\u092e\\u0948\\u0902 \\u0905\\u092a\\u0928\\u0947 \\u0926\\u0947\\u0936 \\u0938\\u0947 \\u092a\\u094d\\u092f\\u093e\\u0930 \\u0915\\u0930\\u0924\\u093e \\u0939\\u0941\\u0901\",\"description\":\"\\u0915\\u094d\\u0935\\u0947\\u0928 \\u0921\\u0940\\u092a\\u0938\\u0940\\u0915 \\u0913\\u092a\\u0928\\u090f\\u0906\\u0908 \\u091c\\u0947\\u092e\\u093f\\u0928\\u0940\",\"small_description\":\"\\u0939\\u092e \\u0915\\u094d\\u0935\\u094b\\u092e\\u094b\\u0921\\u094b \\u0906\\u091c \\u0915\\u0940 \\u091c\\u0930\\u0942\\u0930\\u0924\\u094b\\u0902 \\u0915\\u094b \\u092a\\u0942\\u0930\\u093e \\u0915\\u0930\\u0928\\u0947 \\u0935\\u093e\\u0932\\u0947 \\u0936\\u0915\\u094d\\u0924\\u093f\\u0936\\u093e\\u0932\\u0940 \\u0914\\u0930 \\u0905\\u0928\\u0941\\u0915\\u0942\\u0932\\u0928\\u0940\\u092f \\u0921\\u093f\\u091c\\u093f\\u091f\\u0932 \\u0938\\u092e\\u093e\\u0927\\u093e\\u0928\\u094b\\u0902 \\u0915\\u0947 \\u0938\\u093e\\u0925 \\u0905\\u0927\\u093f\\u0915\\u093e\\u0902\\u0936 \\u092a\\u094d\\u0930\\u092e\\u0941\\u0916 \\u0915\\u094d\\u0937\\u0947\\u0924\\u094d\\u0930\\u094b\\u0902 \\u0915\\u0947 \\u0935\\u094d\\u092f\\u0935\\u0938\\u093e\\u092f\\u094b\\u0902 \\u0915\\u094b \\u092c\\u0926\\u0932\\u0924\\u0947 \\u0939\\u0948\\u0902\\u0964\",\"left_button_text\":\"\\u092e\\u0947\\u0930\\u0947 \\u0938\\u093e\\u0925 \\u0915\\u093e\\u092e \\u0915\\u0930\\u094b\",\"left_button_url\":\"http:\\/\\/localhost\\/optech\\/left\",\"right_button_text\":\"\\u0938\\u0947\\u0935\\u093e \\u0926\\u0947\\u0916\\u0947\\u0902\",\"right_button_url\":\"http:\\/\\/localhost\\/optech\\/right\"}}]'),
(9, 'key_feature.content', '{\"title\":\"Why you should pick us?\",\"heading_1\":\"Highly Expert Demo\",\"description_1\":\"We provide the most responsive and functional Qumodo\",\"service_url_1\":\"blogs\",\"heading_2\":\"24\\/7 Customer Service\",\"description_2\":\"We provide the most responsive and functional Qumod\",\"service_url_2\":\"blogs\",\"heading_3\":\"Competitive Pricing\",\"description_3\":\"We provide the most responsive and functional Qum\",\"service_url_3\":\"blogs\",\"images\":{\"image1\":\"uploads\\/website-images\\/1734599667_image1.png\",\"image2\":\"uploads\\/website-images\\/1734599667_image2.png\",\"image3\":\"uploads\\/website-images\\/1734599667_image3.png\"}}', '2024-12-19 09:14:27', '2025-01-01 10:45:44', '[{\"language_code\":\"en\",\"values\":{\"title\":\"Why you should pick us?\",\"heading_1\":\"Highly Expert Demo\",\"description_1\":\"We provide the most responsive and functional Qumodo\",\"service_url_1\":\"blogs\",\"heading_2\":\"24\\/7 Customer Service\",\"description_2\":\"We provide the most responsive and functional Qumod\",\"service_url_2\":\"blogs\",\"heading_3\":\"Competitive Pricing\",\"description_3\":\"We provide the most responsive and functional Qum\",\"service_url_3\":\"blogs\"}},{\"language_code\":\"hd\",\"values\":{\"heading_1\":\"\\u0905\\u0924\\u093f\\u0936\\u092f \\u092a\\u0942\\u0930\\u094d\\u0935 \\u0939\\u093f\\u0928\\u094d\\u0926\\u0940\",\"description_1\":\"\\u0939\\u092e \\u0938\\u092c\\u0938\\u0947 \\u0905\\u0927\\u093f\\u0915 \\u0938\\u0902\\u0935\\u0947\\u0926\\u0928\\u0936\\u0940\\u0932 \\u0914\\u0930 \\u0915\\u093e\\u0930\\u094d\\u092f\\u093e\\u0924\\u094d\\u092e\\u0915 \\u0915\\u094d\\u092f\\u0942\\u092e\\u094b\\u0921\\u094b \\u092a\\u094d\\u0930\\u0926\\u093e\\u0928 \\u0915\\u0930\\u0924\\u0947 \\u0939\\u0948\\u0902\",\"heading_2\":\"24\\/7 \\u0917\\u094d\\u0930\\u093e\\u0939\\u0915 \\u0938\\u0947\\u0935\\u093e\",\"description_2\":\"\\u0939\\u092e \\u0938\\u092c\\u0938\\u0947 \\u0905\\u0927\\u093f\\u0915 \\u0938\\u0902\\u0935\\u0947\\u0926\\u0928\\u0936\\u0940\\u0932 \\u0914\\u0930 \\u0915\\u093e\\u0930\\u094d\\u092f\\u093e\\u0924\\u094d\\u092e\\u0915 \\u092a\\u094d\\u0930\\u0926\\u093e\\u0928 \\u0915\\u0930\\u0924\\u0947 \\u0939\\u0948\\u0902\",\"heading_3\":\"\\u092a\\u094d\\u0930\\u0924\\u093f\\u0938\\u094d\\u092a\\u0930\\u094d\\u0927\\u0940 \\u092e\\u0942\\u0932\\u094d\\u092f \\u0928\\u093f\\u0930\\u094d\\u0927\\u093e\\u0930\\u0923\",\"description_3\":\"\\u0939\\u092e \\u0938\\u092c\\u0938\\u0947 \\u0905\\u0927\\u093f\\u0915 \\u0938\\u0902\\u0935\\u0947\\u0926\\u0928\\u0936\\u0940\\u0932 \\u0914\\u0930 \\u0915\\u093e\\u0930\\u094d\\u092f\\u093e\\u0924\\u094d\\u092e\\u0915 \\u092a\\u094d\\u0930\\u0926\\u093e\\u0928 \\u0915\\u0930\\u0924\\u0947 \\u0939\\u0948\\u0902\"}}]'),
(10, 'about_us.content', '{\"heading\":\"nepira english\",\"description\":\"text\",\"button_link\":\"text\",\"image\":{},\"images\":{\"image\":\"uploads\\/website-images\\/1734943931_image.jpg\"}}', '2024-12-23 06:47:17', '2024-12-23 08:52:15', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"nepira english\",\"description\":\"text\",\"button_link\":\"text\",\"image\":[]}},{\"language_code\":\"hd\",\"values\":{\"heading\":\"nepira hindi\",\"description\":\"text\",\"button_link\":\"text\"}}]'),
(11, 'main_demo_about_us.content', '{\"heading\":\"More than 25+ years we provide IT solutions\",\"sub_heading\":\"During this time, we\\u2019ve built a reputation for excellent clients satisfaction as evidenced by our\",\"description\":\"Each demo built will look different. You can customize almost anything in the appearance of your website with only a few clicks. Each demo built with Teba will look different.\",\"button_text\":\"More About Us\",\"button_link\":\"about-us\",\"left_text\":\"Happy Agents\",\"left_counter\":\"100\",\"right_text\":\"Deal Closed\",\"right_counter\":\"600\",\"images\":{\"image_1\":\"uploads\\/website-images\\/1735015738_image_1.png\",\"image_2\":\"uploads\\/website-images\\/1735015738_image_2.png\"}}', '2024-12-24 04:48:14', '2025-01-01 11:28:12', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"More than 25+ years we provide IT solutions\",\"sub_heading\":\"During this time, we\\u2019ve built a reputation for excellent clients satisfaction as evidenced by our\",\"description\":\"Each demo built will look different. You can customize almost anything in the appearance of your website with only a few clicks. Each demo built with Teba will look different.\",\"button_text\":\"More About Us\",\"button_link\":\"about-us\",\"left_text\":\"Happy Agents\",\"left_counter\":\"100\",\"right_text\":\"Deal Closed\",\"right_counter\":\"600\"}},{\"language_code\":\"hd\",\"values\":{\"heading\":\"25+ \\u0935\\u0930\\u094d\\u0937\\u094b\\u0902 \\u0938\\u0947 \\u0905\\u0927\\u093f\\u0915 \\u0938\\u092e\\u092f \\u0938\\u0947 \\u0939\\u092e \\u0906\\u0908\\u091f\\u0940 \\u0938\\u092e\\u093e\\u0927\\u093e\\u0928 \\u092a\\u094d\\u0930\\u0926\\u093e\\u0928 \\u0915\\u0930 \\u0930\\u0939\\u0947 \\u0939\\u0948\\u0902\",\"sub_heading\":\"\\u0907\\u0938 \\u0938\\u092e\\u092f \\u0915\\u0947 \\u0926\\u094c\\u0930\\u093e\\u0928, \\u0939\\u092e\\u0928\\u0947 \\u0909\\u0924\\u094d\\u0915\\u0943\\u0937\\u094d\\u091f \\u0917\\u094d\\u0930\\u093e\\u0939\\u0915 \\u0938\\u0902\\u0924\\u0941\\u0937\\u094d\\u091f\\u093f \\u0915\\u0947 \\u0932\\u093f\\u090f \\u092a\\u094d\\u0930\\u0924\\u093f\\u0937\\u094d\\u0920\\u093e \\u092c\\u0928\\u093e\\u0908 \\u0939\\u0948 \\u091c\\u0948\\u0938\\u093e \\u0915\\u093f \\u0939\\u092e\\u093e\\u0930\\u0947 \\u0926\\u094d\\u0935\\u093e\\u0930\\u093e \\u092a\\u094d\\u0930\\u092e\\u093e\\u0923\\u093f\\u0924 \\u0939\\u0948\",\"description\":\"Teba \\u0915\\u0947 \\u0938\\u093e\\u0925 \\u092c\\u0928\\u093e\\u092f\\u093e \\u0917\\u092f\\u093e \\u092a\\u094d\\u0930\\u0924\\u094d\\u092f\\u0947\\u0915 \\u0921\\u0947\\u092e\\u094b \\u0905\\u0932\\u0917 \\u0926\\u093f\\u0916\\u093e\\u0908 \\u0926\\u0947\\u0917\\u093e\\u0964 \\u0906\\u092a \\u0905\\u092a\\u0928\\u0940 \\u0935\\u0947\\u092c\\u0938\\u093e\\u0907\\u091f \\u0915\\u0947 \\u0938\\u094d\\u0935\\u0930\\u0942\\u092a \\u092e\\u0947\\u0902 \\u0915\\u0941\\u091b \\u092d\\u0940 \\u092c\\u0926\\u0932\\u093e\\u0935 \\u0915\\u0947\\u0935\\u0932 \\u0915\\u0941\\u091b \\u0915\\u094d\\u0932\\u093f\\u0915 \\u0938\\u0947 \\u0915\\u0930 \\u0938\\u0915\\u0924\\u0947 \\u0939\\u0948\\u0902\\u0964 Teba \\u0915\\u0947 \\u0938\\u093e\\u0925 \\u092c\\u0928\\u093e\\u092f\\u093e \\u0917\\u092f\\u093e \\u092a\\u094d\\u0930\\u0924\\u094d\\u092f\\u0947\\u0915 \\u0921\\u0947\\u092e\\u094b \\u0905\\u0932\\u0917 \\u0926\\u093f\\u0916\\u093e\\u0908 \\u0926\\u0947\\u0917\\u093e\\u0964\",\"button_text\":\"\\u0939\\u092e\\u093e\\u0930\\u0947 \\u092c\\u093e\\u0930\\u0947 \\u092e\\u0947\\u0902 \\u0905\\u0927\\u093f\\u0915 \\u091c\\u093e\\u0928\\u0915\\u093e\\u0930\\u0940\",\"button_link\":\"faq\"}}]'),
(12, 'main_demo_service_section.content', '{\"heading\":\"Our awesome services to give you success\"}', '2024-12-24 05:16:26', '2024-12-24 05:16:43', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Our awesome services to give you success\"}},{\"language_code\":\"hd\",\"values\":{\"heading\":\"\\u0939\\u092e\\u093e\\u0930\\u0940 \\u0936\\u093e\\u0928\\u0926\\u093e\\u0930 \\u0938\\u0947\\u0935\\u093e\\u090f\\u0901 \\u0906\\u092a\\u0915\\u094b \\u0938\\u092b\\u0932\\u0924\\u093e \\u0926\\u093f\\u0932\\u093e\\u090f\\u0902\\u0917\\u0940\"}}]'),
(13, 'how_to_order.content', '{\"heading\":\"text\",\"description\":\"text\",\"button_link\":\"text\",\"video_link\":\"text\",\"image\":{},\"images\":{\"image\":\"uploads\\/website-images\\/1735129123_image.JPG\"}}', '2024-12-25 12:18:43', '2024-12-25 12:18:43', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"text\",\"description\":\"text\",\"button_link\":\"text\",\"video_link\":\"text\",\"image\":{}}}]'),
(14, 'main_demo_cta_section.content', '{\"heading\":\"Let\'s grow together\",\"description\":\"Each CTA built will look different. You can customize anything appearance of your website with only a few clicks\",\"button_link\":\"contact-us\",\"button_text\":\"Let\'s do this!\"}', '2024-12-26 06:49:24', '2024-12-26 09:43:00', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Let\'s grow together\",\"description\":\"Each CTA built will look different. You can customize anything appearance of your website with only a few clicks\",\"button_link\":\"contact-us\",\"button_text\":\"Let\'s do this!\"}}]'),
(15, 'main_demo_sidebar_cta_section.content', '{\"heading\":\"Don\'t hesitate to contact\",\"description\":\"At our solution , we are committed to exceptional\",\"button_link\":\"contact-us\",\"button_text\":\"Poke us\"}', '2024-12-26 10:49:17', '2024-12-26 10:49:17', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Don\'t hesitate to contact\",\"description\":\"At our solution , we are committed to exceptional\",\"button_link\":\"contact-us\",\"button_text\":\"Poke us\"}}]'),
(16, 'main_demo_process_section.content', '{\"heading\":\"Our working process on how to grow your agency complex 2\",\"step_1\":\"Initiation & Planning\",\"step_2\":\"Execution & Deployment\",\"step_3\":\"Testing & Maintenance\",\"description_1\":\"We are architects innovation trailblazers of technological advancement\",\"description_2\":\"We are architects innovation trailblazers of technological advancement training\",\"description_3\":\"We are architects innovation trailblazers of technological advancement\",\"images\":{\"image_1\":\"uploads\\/website-images\\/1735218545_image_1.png\",\"image_2\":\"uploads\\/website-images\\/1735218545_image_2.png\",\"image_3\":\"uploads\\/website-images\\/1735218545_image_3.png\"}}', '2024-12-26 13:09:05', '2025-01-04 09:52:43', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Our working process on how to grow your agency complex 2\",\"step_1\":\"Initiation & Planning\",\"step_2\":\"Execution & Deployment\",\"step_3\":\"Testing & Maintenance\",\"description_1\":\"We are architects innovation trailblazers of technological advancement\",\"description_2\":\"We are architects innovation trailblazers of technological advancement training\",\"description_3\":\"We are architects innovation trailblazers of technological advancement\"}}]'),
(17, 'main_demo_service_success_section.content', '{\"heading\":\"Increasing business success with stack\",\"description\":\"Each demo built  look different. You can customize almost anything in the appearance of your website with only a few clicks. Each demo built with Teba will look different.\",\"service_name_1\":\"SAAS & Micro SAAS\",\"service_percentage_1\":\"80\",\"service_name_2\":\"SEO & Digital Marketing\",\"service_percentage_2\":\"70\",\"service_name_3\":\"AI & AI Agent Dev\",\"service_percentage_3\":\"95\",\"image_1\":{},\"image_2\":{},\"images\":{\"image_1\":\"uploads\\/website-images\\/1735367602_image_1.png\",\"image_2\":\"uploads\\/website-images\\/1735367602_image_2.png\"}}', '2024-12-28 06:22:04', '2024-12-28 06:33:22', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Increasing business success with stack\",\"description\":\"Each demo built  look different. You can customize almost anything in the appearance of your website with only a few clicks. Each demo built with Teba will look different.\",\"service_name_1\":\"SAAS & Micro SAAS\",\"service_percentage_1\":\"80\",\"service_name_2\":\"SEO & Digital Marketing\",\"service_percentage_2\":\"70\",\"service_name_3\":\"AI & AI Agent Dev\",\"service_percentage_3\":\"95\",\"image_1\":{},\"image_2\":{}}}]'),
(18, 'main_demo_testimonial_section.content', '{\"heading\":\"Don\\u2019t take our word, see what our customers say\"}', '2024-12-28 11:07:59', '2024-12-28 11:07:59', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Don\\u2019t take our word, see what our customers say\"}}]'),
(19, 'main_demo_blog_section.content', '{\"heading\":\"Recent blog & articles about stack\",\"button_text\":\"View Posts\",\"button_link\":\"blogs\"}', '2024-12-28 11:14:57', '2024-12-28 11:14:57', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Recent blog & articles about stack\",\"button_text\":\"View Posts\",\"button_link\":\"blogs\"}}]'),
(20, 'expert_feature.content', '{\"heading\":\"Our expert team is always ready horny\",\"images\":{\"image_1\":\"uploads\\/website-images\\/1735541415_image_1.png\",\"image_2\":\"uploads\\/website-images\\/1735541415_image_2.png\",\"image_3\":\"uploads\\/website-images\\/1735541415_image_3.png\",\"image_4\":\"uploads\\/website-images\\/1735541415_image_4.png\"}}', '2024-12-30 06:50:15', '2024-12-30 11:11:06', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Our expert team is always ready horny\"}}]'),
(21, 'expert_feature_section.content', '{\"heading\":\"Our expert is ready to take you\"}', '2024-12-30 11:12:19', '2024-12-30 11:12:19', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Our expert is ready to take you\"}}]'),
(22, 'contact_us_section.content', '{\"heading\":\"Let\\u2019s build an awesome app together\",\"description\":\"Each demo built look different. You can customize almost anything in the appearance of your website with only a few clicks.\"}', '2024-12-31 11:21:18', '2024-12-31 11:21:18', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Let\\u2019s build an awesome app together\",\"description\":\"Each demo built look different. You can customize almost anything in the appearance of your website with only a few clicks.\"}}]'),
(23, 'it_consulting_hero_section.content', '{\"heading\":\"Optimize your enterprise data with our RAG System\",\"description\":\"We transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"left_button_text\":\"Contact with us\",\"form_title\":\"Fill The Doc\",\"form_description\":\"Get Free Consultation For IT Solutions\",\"form_button_text\":\"Submit Here\",\"images\":{\"hero_image\":\"uploads\\/website-images\\/1735726192_hero_image.png\"}}', '2025-01-01 10:09:52', '2025-01-04 09:55:03', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Optimize your enterprise data with our RAG System\",\"description\":\"We transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"left_button_text\":\"Contact with us\",\"form_title\":\"Fill The Doc\",\"form_description\":\"Get Free Consultation For IT Solutions\",\"form_button_text\":\"Submit Here\"}},{\"language_code\":\"hd\",\"values\":{\"heading\":\"Optimize your enterprise data with our RAG System Hindi\",\"description\":\"We transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"left_button_text\":\"Contact with us\",\"form_title\":\"Fill The Doc\",\"form_description\":\"Get Free Consultation For IT Solutions\",\"form_button_text\":\"Submit Here\"}}]'),
(24, 'it_consulting_counter_section.content', '{\"counter_1\":\"50\",\"title_1\":\"50 Clients\",\"counter_2\":\"100\",\"title_2\":\"100 Clients\",\"counter_3\":\"150\",\"title_3\":\"150 Clients\",\"counter_4\":\"200\",\"title_4\":\"200 Clients\",\"images\":{\"image_1\":\"uploads\\/website-images\\/1735734941_image_1.png\",\"image_2\":\"uploads\\/website-images\\/1735734941_image_2.png\",\"image_3\":\"uploads\\/website-images\\/1735734941_image_3.png\",\"image_4\":\"uploads\\/website-images\\/1735734941_image_4.png\"}}', '2025-01-01 12:35:41', '2025-01-02 11:12:37', '[{\"language_code\":\"en\",\"values\":{\"counter_1\":\"50\",\"title_1\":\"50 Clients\",\"counter_2\":\"100\",\"title_2\":\"100 Clients\",\"counter_3\":\"150\",\"title_3\":\"150 Clients\",\"counter_4\":\"200\",\"title_4\":\"200 Clients\"}}]'),
(25, 'it_solutions_hero_section.content', '{\"heading\":\"The best innovative tech solutions\",\"description\":\"We transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"button_text\":\"Know More\",\"images\":{\"hero_image\":\"uploads\\/website-images\\/1735800869_hero_image.png\"}}', '2025-01-02 06:54:29', '2025-01-02 06:54:35', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"The best innovative tech solutions\",\"description\":\"We transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"button_text\":\"Know More\"}}]'),
(26, 'it_solutions_about_us.content', '{\"heading\":\"Exclusive tech to provide IT solutions\",\"description\":\"Each demo built will look different. You can customize almost anything in the appearance of your website with only a few clicks. Each demo built will look different.\",\"feature_text_1\":\"Easily Build Custom Reports And Dashboards\",\"feature_text_2\":\"Legacy Software OSS For Modernization\",\"feature_text_3\":\"Software For The Open Source\",\"button_text\":\"Know More\",\"images\":{\"image_1\":\"uploads\\/website-images\\/1735806260_image_1.png\",\"image_2\":\"uploads\\/website-images\\/1735806260_image_2.png\"}}', '2025-01-02 08:24:20', '2025-01-02 08:24:50', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Exclusive tech to provide IT solutions\",\"description\":\"Each demo built will look different. You can customize almost anything in the appearance of your website with only a few clicks. Each demo built will look different.\",\"feature_text_1\":\"Easily Build Custom Reports And Dashboards\",\"feature_text_2\":\"Legacy Software OSS For Modernization\",\"feature_text_3\":\"Software For The Open Source\",\"button_text\":\"Know More\"}}]'),
(27, 'contact_form_section.content', '{\"heading\":\"Poke Us ASAP Today\",\"description\":\"Feel free to contact with us, we don\\u2019t spam your email\",\"button_text\":\"Send Poookie Message\"}', '2025-01-02 10:03:02', '2025-01-02 10:03:02', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Poke Us ASAP Today\",\"description\":\"Feel free to contact with us, we don\\u2019t spam your email\",\"button_text\":\"Send Poookie Message\"}}]'),
(28, 'contact_info_section.content', '{\"heading\":\"Let\\u2019s build some awesome project together with AI Image\",\"description\":\"Each demo built will look different. You can customize almost anything in the appearance of your website with only a few clicks.\",\"office_hours\":\"Office Hours: Sat\\u2013 Fri: 10:00 AM \\u2013 06:30 PM\"}', '2025-01-02 10:09:37', '2025-01-04 08:37:08', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Let\\u2019s build some awesome project together with AI Image\",\"description\":\"Each demo built will look different. You can customize almost anything in the appearance of your website with only a few clicks.\",\"office_hours\":\"Office Hours: Sat\\u2013 Fri: 10:00 AM \\u2013 06:30 PM\"}}]'),
(29, 'it_solutions_pricing_section.content', '{\"heading\":\"Explore flexible pricing for you\",\"package_information\":{\"package_1\":{\"title\":\"Startup\",\"description\":\"Package 1 Description\",\"price\":\"99\",\"features\":{\"feature_1\":\"10 GB disk space availability\",\"feature_2\":\"50 GB NVMe SSD for use\",\"feature_3\":\"Free platform access for all\"}},\"package_2\":{\"title\":\"Business\",\"description\":\"Social Economic Business\",\"price\":\"299\",\"features\":{\"feature_1\":\"10 GB disk space availability\",\"feature_2\":\"50 GB NVMe SSD for use\",\"feature_3\":\"Free platform access for all\"}},\"package_3\":{\"title\":\"Enterprise\",\"description\":\"Package 3 Description\",\"price\":\"779\",\"features\":{\"feature_1\":\"100 GB disk space availability\",\"feature_2\":\"1150 GB NVMe SSD for use\",\"feature_3\":\"Free platform access for all\"}}}}', '2025-01-02 11:15:13', '2025-01-04 09:53:20', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Explore flexible pricing for you\",\"package_information\":{\"package_1\":{\"title\":\"Startup\",\"description\":\"Package 1 Description\",\"price\":\"99\",\"features\":{\"feature_1\":\"10 GB disk space availability\",\"feature_2\":\"50 GB NVMe SSD for use\",\"feature_3\":\"Free platform access for all\"}},\"package_2\":{\"title\":\"Business\",\"description\":\"Social Economic Business\",\"price\":\"299\",\"features\":{\"feature_1\":\"10 GB disk space availability\",\"feature_2\":\"50 GB NVMe SSD for use\",\"feature_3\":\"Free platform access for all\"}},\"package_3\":{\"title\":\"Enterprise\",\"description\":\"Package 3 Description\",\"price\":\"779\",\"features\":{\"feature_1\":\"100 GB disk space availability\",\"feature_2\":\"1150 GB NVMe SSD for use\",\"feature_3\":\"Free platform access for all\"}}}}},{\"language_code\":\"hd\",\"values\":{\"heading\":\"Explore flexible pricing Hindi\",\"package_information\":{\"package_1\":{\"title\":\"Startup Hindi\",\"description\":\"Package 1 Description\",\"price\":\"99\",\"features\":{\"feature_1\":\"10 GB disk space availability\",\"feature_2\":\"50 GB NVMe SSD for use\",\"feature_3\":\"Free platform access for all\"}},\"package_2\":{\"title\":\"Business\",\"description\":\"Social Economic Business\",\"price\":\"299\",\"features\":{\"feature_1\":\"10 GB disk space availability\",\"feature_2\":\"50 GB NVMe SSD for use\",\"feature_3\":\"Free platform access for all\"}},\"package_3\":{\"title\":\"Enterprise\",\"description\":\"Package 3 Description\",\"price\":\"779\",\"features\":{\"feature_1\":\"100 GB disk space availability\",\"feature_2\":\"1150 GB NVMe SSD for use\",\"feature_3\":\"Free platform access for all\"}}}}}]'),
(30, 'digital_agency_hero_section.content', '{\"heading\":\"We Provide Professional IT Solutions\",\"title\":\"Software crafting for digital success\",\"description\":\"We transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs X.\",\"left_button_text\":\"Work With Us\",\"right_button_text\":\"View Services\",\"images\":{\"hero_image\":\"uploads\\/website-images\\/1735989344_hero_image.png\"}}', '2025-01-04 11:15:44', '2025-01-04 11:18:10', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"We Provide Professional IT Solutions\",\"title\":\"Software crafting for digital success\",\"description\":\"We transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs X.\",\"left_button_text\":\"Work With Us\",\"right_button_text\":\"View Services\"}}]'),
(31, 'customer_brand_section.content', '{\"heading\":\"Empowered professionals to connect with top-tier opportunities\",\"image_6\":{},\"image_7\":{},\"images\":{\"image_1\":\"uploads\\/website-images\\/1735992456_image_1.png\",\"image_2\":\"uploads\\/website-images\\/1735992456_image_2.png\",\"image_3\":\"uploads\\/website-images\\/1735992456_image_3.png\",\"image_4\":\"uploads\\/website-images\\/1735992456_image_4.png\",\"image_5\":\"uploads\\/website-images\\/1735992456_image_5.png\",\"image_6\":\"uploads\\/website-images\\/1735993237_image_6.png\",\"image_7\":\"uploads\\/website-images\\/1735993237_image_7.png\"}}', '2025-01-04 12:06:26', '2025-01-04 12:20:37', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Empowered professionals to connect with top-tier opportunities\",\"image_6\":{},\"image_7\":{}}}]'),
(32, 'digital_agency_feature_section.content', '{\"heading\":\"Providing IT solutions & services for SaaS\",\"feature_1_heading\":\"Quality Solution for SaaS\",\"feature_2_heading\":\"Amazing Expert Teams\",\"feature_3_heading\":\"Urgent Support For Clients\",\"feature_1_url\":\"contact-us\",\"feature_2_url\":\"services\",\"feature_3_url\":\"about-us\",\"feature_description_1\":\"Each demo built will look different. customize almost anything in the appearance of your\",\"feature_description_2\":\"Each demo built will look different. customize almost anything in the appearance of your\",\"feature_description_3\":\"Each demo built will look different. customize almost anything in the appearance of your\",\"images\":{\"image_1\":\"uploads\\/website-images\\/1735994169_image_1.png\",\"image_2\":\"uploads\\/website-images\\/1735994169_image_2.png\",\"image_3\":\"uploads\\/website-images\\/1735994169_image_3.png\",\"image_4\":\"uploads\\/website-images\\/1735994169_image_4.png\",\"image_5\":\"uploads\\/website-images\\/1735994169_image_5.png\"}}', '2025-01-04 12:36:09', '2025-01-04 12:45:27', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Providing IT solutions & services for SaaS\",\"feature_1_heading\":\"Quality Solution for SaaS\",\"feature_2_heading\":\"Amazing Expert Teams\",\"feature_3_heading\":\"Urgent Support For Clients\",\"feature_1_url\":\"contact-us\",\"feature_2_url\":\"services\",\"feature_3_url\":\"about-us\",\"feature_description_1\":\"Each demo built will look different. customize almost anything in the appearance of your\",\"feature_description_2\":\"Each demo built will look different. customize almost anything in the appearance of your\",\"feature_description_3\":\"Each demo built will look different. customize almost anything in the appearance of your\"}}]'),
(33, 'digital_agency_faqs.content', '{\"heading\":\"Have you any questions? Here answers\",\"description\":\"Each demo built with look different. You can customize almost anything in the appearance of your website with only\",\"button_text\":\"Ask ME Anything\"}', '2025-01-05 06:35:16', '2025-01-05 06:35:16', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Have you any questions? Here answers\",\"description\":\"Each demo built with look different. You can customize almost anything in the appearance of your website with only\",\"button_text\":\"Ask ME Anything\"}}]'),
(34, 'startup_home_hero_section.content', '{\"heading\":\"We provide professional IT services\",\"description\":\"Best SAAS services for your agency\",\"small_description\":\"We transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"left_button_text\":\"Work With Us\",\"left_button_url\":\"contact-us\",\"right_button_text\":\"View Services\",\"right_button_url\":\"services\",\"images\":{\"hero_image\":\"uploads\\/website-images\\/1736081730_hero_image.png\"}}', '2025-01-05 12:55:30', '2025-01-05 12:57:31', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"We provide professional IT services\",\"description\":\"Best SAAS services for your agency\",\"small_description\":\"We transform businesses of most major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"left_button_text\":\"Work With Us\",\"left_button_url\":\"contact-us\",\"right_button_text\":\"View Services\",\"right_button_url\":\"services\"}}]'),
(35, 'startup_home_about_us.content', '{\"heading\":\"We provide perfect SAAS solutions & tech\",\"sub_heading\":\"During this time, we\\u2019ve built a reputation for excellent clients satisfaction\",\"description\":\"Each demo built with different. You can customize almost anything in the appearance of your website with only a few clicks.\",\"left_text\":\"Provide Skills Services\",\"right_text\":\"Support For Clients\",\"images\":{\"image_1\":\"uploads\\/website-images\\/1736139443_image_1.png\",\"image_2\":\"uploads\\/website-images\\/1736139443_image_2.png\"}}', '2025-01-06 04:54:56', '2025-01-06 04:57:52', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"We provide perfect SAAS solutions & tech\",\"sub_heading\":\"During this time, we\\u2019ve built a reputation for excellent clients satisfaction\",\"description\":\"Each demo built with different. You can customize almost anything in the appearance of your website with only a few clicks.\",\"left_text\":\"Provide Skills Services\",\"right_text\":\"Support For Clients\"}}]'),
(36, 'tech_agency_hero_section.content', '{\"heading\":\"Delivering SAAS solutions for your startup\",\"description\":\"We transform SAAS  major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"left_button_text\":\"Contact us\",\"left_button_url\":\"contact-us\",\"right_button_text\":\"Our Services\",\"right_button_url\":\"services\",\"images\":{\"hero_image\":\"uploads\\/website-images\\/1736144806_hero_image.png\"}}', '2025-01-06 06:26:46', '2025-01-06 06:27:45', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Delivering SAAS solutions for your startup\",\"description\":\"We transform SAAS  major sectors with powerful and adaptable digital solutions that satisfy the needs of today.\",\"left_button_text\":\"Contact us\",\"left_button_url\":\"contact-us\",\"right_button_text\":\"Our Services\",\"right_button_url\":\"services\"}}]'),
(37, 'tech_agency_brand_section.content', '{\"heading\":\"Empowered professionals to connect with top-tier SAAS\",\"images\":{\"image_1\":\"uploads\\/website-images\\/1736145168_image_1.png\",\"image_2\":\"uploads\\/website-images\\/1736145168_image_2.png\",\"image_3\":\"uploads\\/website-images\\/1736145168_image_3.png\",\"image_4\":\"uploads\\/website-images\\/1736145168_image_4.png\",\"image_5\":\"uploads\\/website-images\\/1736145168_image_5.png\",\"image_6\":\"uploads\\/website-images\\/1736145168_image_6.png\",\"image_7\":\"uploads\\/website-images\\/1736145168_image_7.png\"}}', '2025-01-06 06:31:20', '2025-01-06 06:32:52', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"Empowered professionals to connect with top-tier SAAS\"}}]'),
(38, 'tech_company_hero_section.content', '{\"heading\":\"We provide best tech solutions for your SAAS\",\"description\":\"We are architects of innovation, trailblazers of technological advancement, and partners in your success. As a dynamic and forward-thinking SAAS\",\"left_button_text\":\"Work With Us\",\"left_button_url\":\"contact-us\",\"right_button_text\":\"View Services\",\"right_button_url\":\"services\"}', '2025-01-06 10:31:20', '2025-01-06 10:31:20', '[{\"language_code\":\"en\",\"values\":{\"heading\":\"We provide best tech solutions for your SAAS\",\"description\":\"We are architects of innovation, trailblazers of technological advancement, and partners in your success. As a dynamic and forward-thinking SAAS\",\"left_button_text\":\"Work With Us\",\"left_button_url\":\"contact-us\",\"right_button_text\":\"View Services\",\"right_button_url\":\"services\"}}]');

-- --------------------------------------------------------

--
-- Table structure for table `global_settings`
--

CREATE TABLE `global_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `global_settings`
--

INSERT INTO `global_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'logo', 'uploads/website-images/logo-2025-01-02-11-48-55-5041.png', NULL, '2025-01-02 05:48:55'),
(2, 'favicon', 'uploads/website-images/favicon-2024-12-18-03-53-38-7740.png', NULL, '2024-12-18 09:53:38'),
(3, 'app_name', 'Optech', NULL, '2024-12-25 12:18:06'),
(4, 'contact_message_mail', 'workzone.contact@gmail.com', NULL, '2024-12-25 12:18:06'),
(5, 'timezone', 'Asia/Dhaka', NULL, '2024-12-25 12:18:06'),
(6, 'selected_theme', 'main_demo', NULL, '2024-12-25 12:18:06'),
(7, 'recaptcha_status', '0', NULL, '2024-07-10 05:25:54'),
(8, 'recaptcha_site_key', '6LdnfvkpAAAAAOoDqEeVqqOA-BIdVmYd4bBPejuq', NULL, '2024-07-10 05:25:54'),
(9, 'recaptcha_secret_key', '6LdnfvkpAAAAAC0GBj1_ERX2y581bVRUdSpNDgJm', NULL, '2024-07-10 05:25:54'),
(10, 'tawk_chat_link', 'https://embed.tawk.to/5a7c31ded7591465c7077c48/default', NULL, '2024-05-07 10:53:59'),
(11, 'tawk_status', '1', NULL, '2024-05-07 10:53:59'),
(12, 'google_analytic_id', '55525522', NULL, '2024-07-10 05:25:46'),
(13, 'google_analytic_status', '0', NULL, '2024-07-10 05:25:46'),
(14, 'pixel_app_id', '156905933', NULL, '2024-07-02 12:10:44'),
(15, 'pixel_status', '1', NULL, '2024-07-02 12:10:44'),
(16, 'placeholder_image', 'uploads/website-images/placeholder-image.png', NULL, '2024-05-07 11:05:22'),
(17, 'cookie_consent_status', '0', NULL, '2024-07-10 07:23:48'),
(18, 'cookie_consent_message', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the when an unknown printer took.', NULL, '2024-07-10 07:23:48'),
(19, 'error_image', 'uploads/website-images/error-image-2024-07-02-09-51-10-1816.png', NULL, '2024-07-02 03:51:10'),
(20, 'login_page_bg', 'uploads/website-images/login-bg-image-2024-07-02-09-51-30-6904.png', NULL, '2024-07-02 03:51:30'),
(21, 'admin_login', 'uploads/website-images/admin-bg-image-2024-07-16-11-20-09-9979.png', NULL, '2024-07-16 05:20:09'),
(22, 'breadcrumb_image', 'uploads/website-images/breadcrumb-image-2024-05-17-11-50-01-3653.png', NULL, '2024-05-17 05:50:03'),
(23, 'is_facebook', '1', NULL, '2024-07-10 04:51:29'),
(24, 'facebook_client_id', '1844188565781706', NULL, '2024-07-10 04:51:29'),
(25, 'facebook_secret_id', '18441885657817', NULL, '2024-07-10 04:51:29'),
(26, 'facebook_redirect_url', 'http://localhost/callback/facebook', NULL, '2024-07-10 04:51:29'),
(27, 'is_gmail', '1', NULL, '2024-07-10 04:51:29'),
(28, 'gmail_client_id', '673210704627-g002lb3mstedn57b4geupsfhakcqo316.apps.googleusercontent.com', NULL, '2024-07-10 04:51:29'),
(29, 'gmail_secret_id', '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', NULL, '2024-07-10 04:51:29'),
(30, 'gmail_redirect_url', 'https://workzone.minionionbd.com/buyer/callback/google', NULL, '2024-07-10 04:51:29'),
(31, 'default_avatar', 'uploads/website-images/avatar-image-2024-07-02-10-08-24-5849.png', NULL, '2024-07-02 04:08:24'),
(32, 'default_cover_image', 'uploads/website-images/default-cover-image-2024-05-09-06-53-46-2041.png', NULL, '2024-05-09 00:53:47'),
(33, 'maintenance_status', '0', NULL, '2024-07-10 04:39:56'),
(34, 'maintenance_image', 'uploads/website-images/maintenance-image-2024-07-08-03-59-12-7938.png', NULL, '2024-07-08 09:59:12'),
(35, 'maintenance_text', 'We are upgrading our site.  We will come back soon.  \r\nPlease stay with us. \r\nThank you.', NULL, '2024-07-10 04:39:56'),
(36, 'app_version', '3.0.0', NULL, '2024-09-15 04:46:44'),
(37, 'facebook_link', 'facebook_link', NULL, NULL),
(38, 'twitter_link', 'twitter_link', NULL, NULL),
(39, 'linkedin_link', 'linkedin_link', NULL, NULL),
(40, 'instagram_link', 'instagram_link', NULL, NULL),
(41, 'footer_logo', 'uploads/website-images/footer-logo-2025-01-02-11-37-45-6803.png', '2024-07-02 11:51:07', '2025-01-02 05:37:45'),
(42, 'empty_image', 'uploads/website-images/empty-2024-05-17-11-50-01-3653.png', '2024-07-03 14:39:42', NULL),
(43, 'not_found', 'uploads/website-images/not-found-2024-05-17-11-50-01-3653.png', '2024-07-08 10:07:05', NULL),
(44, 'commission_type', 'commission', '2024-09-15 03:54:23', '2024-12-25 12:18:06'),
(45, 'commission_per_sale', '1', '2024-09-15 03:54:23', '2024-12-25 12:18:06'),
(46, 'commission_type', 'commission', '2024-09-15 04:46:44', '2024-12-25 12:18:06'),
(47, 'commission_per_sale', '1', '2024-09-15 04:46:44', '2024-12-25 12:18:06'),
(48, 'white_logo', 'uploads/website-images/white_logo-2025-01-02-11-54-26-4338.png', '2024-12-18 08:49:33', '2025-01-02 05:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `homepages`
--

CREATE TABLE `homepages` (
  `id` bigint UNSIGNED NOT NULL,
  `intro_banner_one` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_banner_two` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explore_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explore_total_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explore_total_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explore_total_job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_seller_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_app_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_step_icon1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_step_icon2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_step_icon3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_step_icon4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile_playstore` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_appstore` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_icon1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_icon2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_icon3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_icon4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_icon5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_intro_bg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_intro_forground` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_intro_tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepages`
--

INSERT INTO `homepages` (`id`, `intro_banner_one`, `intro_banner_two`, `customer_image`, `explore_image`, `explore_total_customer`, `explore_total_service`, `explore_total_job`, `join_seller_image`, `mobile_app_image`, `working_step_icon1`, `working_step_icon2`, `working_step_icon3`, `working_step_icon4`, `created_at`, `updated_at`, `mobile_playstore`, `mobile_appstore`, `feature_icon1`, `feature_icon2`, `feature_icon3`, `feature_icon4`, `feature_icon5`, `home2_intro_bg`, `home2_intro_forground`, `home2_intro_tags`) VALUES
(1, 'uploads/custom-images/intro-one--2024-07-10-12-03-05-5735.webp', 'uploads/custom-images/intro-one--2024-05-14-10-06-01-1053.webp', 'uploads/custom-images/intro-two--2024-07-10-12-24-55-5158.webp', 'uploads/custom-images/explore--2024-07-10-12-28-50-6980.webp', '56', '59', '65', 'uploads/custom-images/working-step--2024-07-10-12-58-03-4540.webp', 'uploads/custom-images/working-step--2024-05-14-12-08-19-7969.webp', 'uploads/custom-images/working-step--2024-07-10-12-34-52-1055.webp', 'uploads/custom-images/working-step--2024-07-10-12-34-52-8063.webp', 'uploads/custom-images/working-step--2024-07-10-12-34-52-8354.webp', 'uploads/custom-images/working-step--2024-07-10-12-34-52-1463.webp', NULL, '2024-07-10 06:58:03', 'Play store link', 'App store link', 'uploads/custom-images/feature_icon1--2024-07-10-12-39-51-1271.webp', 'uploads/custom-images/feature_icon2--2024-07-10-12-45-16-9285.webp', 'uploads/custom-images/feature_icon3--2024-07-10-12-45-16-1439.webp', 'uploads/custom-images/feature_icon4--2024-07-10-12-45-16-7641.webp', 'uploads/custom-images/feature_icon5--2024-07-10-12-45-16-9388.webp', 'uploads/custom-images/intro-one--2024-07-10-12-55-27-4546.webp', 'uploads/custom-images/intro-two--2024-07-10-12-08-32-3503.webp', '[{\"value\":\"laravel\"},{\"value\":\"php\"},{\"value\":\"javascript\"},{\"value\":\"html\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_translations`
--

CREATE TABLE `homepage_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `homepage_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explore_short_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explore_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `explore_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `working_step_title1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_step_title2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_step_title3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_step_title4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_seller_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `join_seller_des` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mobile_app_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_app_des` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `working_step_des1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_step_des2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_step_des3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_step_des4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_title1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_title2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_title3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_title4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_title5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_intro_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `home2_intro_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_translations`
--

INSERT INTO `homepage_translations` (`id`, `homepage_id`, `lang_code`, `intro_title`, `total_customer`, `total_rating`, `explore_short_title`, `explore_title`, `explore_description`, `working_step_title1`, `working_step_title2`, `working_step_title3`, `working_step_title4`, `join_seller_title`, `join_seller_des`, `mobile_app_title`, `mobile_app_des`, `created_at`, `updated_at`, `working_step_des1`, `working_step_des2`, `working_step_des3`, `working_step_des4`, `feature_title1`, `feature_title2`, `feature_title3`, `feature_title4`, `feature_title5`, `home2_intro_title`, `home2_intro_description`) VALUES
(1, 1, 'en', 'Find Your Perfect <span>Freelancer</span> Quick and Easy', '35M+', '4.9', 'Explore New Life', 'Don’t just find. Be found put your CV in front of great employers', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.', 'Proof of Quality Works', 'No Cost Until You Hire', 'Safe and Secure Payment Both', 'A whole world of freelance talent at your fingertip', 'Find the talent needed to get your business growing.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.', 'Get a Mobile Application Enjoy Food Experience', 'We\'ve done it carefully and simply. Combined with the ingredients makes for beautiful landings.', NULL, '2024-07-12 09:14:29', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', 'Pay online with Multiple credit Cards or Cash!', 'Hourly Rated Jobs', 'Projects Gig Catalogue', 'Paid Membership', 'Custom Order', 'Live Chat System', 'Hire the best freelancers for any job, online', 'For optimal online freelancing hires, precisely outline project requirements, select reputable platforms, and thoroughly vet candidates\' profiles, ensuring a seamless collaboration.'),
(9, 1, 'hd', 'Find Your Perfect <span>Freelancer</span> Quick and Easy', '35M+', '4.9', 'Explore New Life', 'Don’t just find. Be found put your CV in front of great employers', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.', 'Proof of Quality Works', 'No Cost Until You Hire', 'Safe and Secure Payment Both', 'A whole world of freelance talent at your fingertip', 'Find the talent needed to get your business growing.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.', 'Get a Mobile Application Enjoy Food Experience', 'We\'ve done it carefully and simply. Combined with the ingredients makes for beautiful landings.', '2024-07-10 05:34:58', '2024-07-10 05:34:58', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', 'There are many variations of passages of Lorem our Ipsum available, but the majority have suffered', NULL, 'Hourly Rated Jobs', 'Projects Gig Catalogue', 'Paid Membership', 'Custom Order', 'Live Chat System', 'Hire the best freelancers for any job, online', 'For optimal online freelancing hires, precisely outline project requirements, select reputable platforms, and thoroughly vet candidates\' profiles, ensuring a seamless collaboration.');

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `category_id` int NOT NULL,
  `city_id` int NOT NULL,
  `thumb_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_view` bigint NOT NULL DEFAULT '0',
  `regular_price` decimal(8,2) NOT NULL,
  `is_urgent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `approved_by_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `user_id`, `category_id`, `city_id`, `thumb_image`, `slug`, `job_type`, `total_view`, `regular_price`, `is_urgent`, `status`, `approved_by_admin`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-14-02-30-59-4201.webp', 'video-editor-for-creative-projects', 'Monthly', 0, '199.00', 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 08:17:23'),
(2, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-14-02-31-26-8758.webp', 'video-editor-for-creative-projects2', 'Yearly', 0, '199.00', 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 08:17:36'),
(3, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-14-02-31-35-7682.webp', 'video-editor-for-creative-projects3', 'Monthly', 0, '199.00', 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 08:17:46'),
(4, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-57-15-9738.webp', 'video-editor-for-creative-projects4', 'Daily', 0, '199.00', 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 06:57:15'),
(5, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-01-01-41-8015.webp', 'video-editor-for-creative-projects5', 'Daily', 0, '199.00', 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 07:01:41'),
(6, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-57-38-8735.webp', 'video-editor-for-creative-projects6', 'Monthly', 0, '199.00', 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 08:18:04'),
(7, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-57-53-7875.webp', 'video-editor-for-creative-projects7', 'Daily', 0, '199.00', 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 06:57:53'),
(8, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-59-33-5051.webp', 'video-editor-for-creative-projects8', 'Yearly', 0, '199.00', 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 06:59:33'),
(9, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-59-44-8950.webp', 'video-editor-for-creative-projects9', 'Daily', 0, '199.00', 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 06:59:44'),
(10, 1, 4, 1, 'uploads/custom-images/jobpost-2024-07-15-12-59-53-4692.webp', 'video-editor-for-creative-projects10', 'Daily', 0, '199.00', 'disable', 'enable', 'approved', '2024-07-10 06:29:03', '2024-07-15 06:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `job_post_translations`
--

CREATE TABLE `job_post_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `job_post_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_translations`
--

INSERT INTO `job_post_translations` (`id`, `job_post_id`, `lang_code`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-14 08:30:59'),
(2, 1, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(3, 2, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-14 08:31:26'),
(4, 2, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(5, 3, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-14 08:31:35'),
(6, 3, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(7, 4, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:57:15'),
(8, 4, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(9, 5, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:57:25'),
(10, 5, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(11, 6, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:57:38'),
(12, 6, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(13, 7, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:57:53'),
(14, 7, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(15, 8, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:58:45'),
(16, 8, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(17, 9, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:59:44');
INSERT INTO `job_post_translations` (`id`, `job_post_id`, `lang_code`, `title`, `description`, `created_at`, `updated_at`) VALUES
(18, 9, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03'),
(19, 10, 'en', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\r\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\r\n<p><strong>Key Responsibilities:</strong></p>\r\n<ul>\r\n<li>Designing and developing iOS applications using Swift programming language.</li>\r\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\r\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\r\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\r\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\r\n</ul>\r\n<p><strong>Qualifications:</strong></p>\r\n<ul>\r\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\r\n<li>Strong understanding of mobile app development principles and best practices.</li>\r\n<li>Excellent problem-solving skills and attention to detail.</li>\r\n<li>Ability to work independently and in a team environment.</li>\r\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\r\n</ul>\r\n<p><strong>Why Join Us:</strong></p>\r\n<ul>\r\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\r\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\r\n<li>Competitive compensation and benefits package.</li>\r\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\r\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\r\n</ul>\r\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\r\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-15 06:59:53'),
(20, 10, 'hd', 'Video Editor for Creative Projects', '<p><strong>iOS App Developer for Mobile:</strong></p>\n<p>Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users. As an iOS App Developer, you will play a crucial role in designing, developing, and testing iOS applications that meet the needs and expectations of our diverse user base. Your creativity and technical expertise will be instrumental in bringing our app ideas to life and ensuring they deliver exceptional value and usability.</p>\n<p><strong>Key Responsibilities:</strong></p>\n<ul>\n<li>Designing and developing iOS applications using Swift programming language.</li>\n<li>Collaborating with cross-functional teams to define app features and functionalities.</li>\n<li>Conducting thorough testing to ensure apps are bug-free and deliver optimal performance.</li>\n<li>Implementing best practices in mobile app development to create intuitive and seamless user experiences.</li>\n<li>Staying updated on the latest trends and technologies in mobile app development to continuously improve our apps.</li>\n</ul>\n<p><strong>Qualifications:</strong></p>\n<ul>\n<li>Proficiency in Swift programming language and familiarity with iOS frameworks.</li>\n<li>Strong understanding of mobile app development principles and best practices.</li>\n<li>Excellent problem-solving skills and attention to detail.</li>\n<li>Ability to work independently and in a team environment.</li>\n<li>Experience in developing and launching successful iOS applications is a plus.</li>\n</ul>\n<p><strong>Why Join Us:</strong></p>\n<ul>\n<li>Opportunity to work on exciting projects that push the boundaries of mobile app development.</li>\n<li>Collaborative and supportive work environment that encourages creativity and innovation.</li>\n<li>Competitive compensation and benefits package.</li>\n<li>Professional growth and development opportunities to enhance your skills and expertise.</li>\n<li>Be part of a dynamic team that values diversity, inclusion, and teamwork.</li>\n</ul>\n<p>If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us. If you are passionate about creating cutting-edge mobile applications, thrive in a dynamic work environment, and are eager to contribute your skills to impactful projects, we invite you to apply for this exciting opportunity to shape the future of mobile technology with us.</p>\n<p>&nbsp;Would you like detailed description for another title or more information on this topic?</p>', '2024-07-10 06:29:03', '2024-07-10 06:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `job_requests`
--

CREATE TABLE `job_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `job_post_id` int NOT NULL,
  `seller_id` int NOT NULL,
  `user_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_requests`
--

INSERT INTO `job_requests` (`id`, `job_post_id`, `seller_id`, `user_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 1, 'fjxdfg', 'approved', '2024-07-13 09:11:44', '2024-07-15 09:22:42'),
(2, 6, 3, 1, 'Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users.', 'approved', '2024-07-15 09:21:07', '2024-07-15 09:22:24'),
(3, 9, 3, 1, 'Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users.', 'approved', '2024-07-15 09:21:17', '2024-07-15 09:22:34'),
(4, 10, 3, 1, 'Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users.', 'pending', '2024-07-15 09:21:25', '2024-07-15 09:21:25'),
(5, 4, 3, 1, 'Are you a talented iOS App Developer looking to make a difference in the mobile app world? Join our team as we embark on creating innovative and user-friendly applications that enhance the mobile experience for our users.', 'pending', '2024-07-15 09:21:36', '2024-07-15 09:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_information`
--

CREATE TABLE `kyc_information` (
  `id` bigint UNSIGNED NOT NULL,
  `kyc_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kyc_information`
--

INSERT INTO `kyc_information` (`id`, `kyc_id`, `user_id`, `file`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'uploads/custom-images/kyc-2024-08-29-02-03-01-2814.webp', '&lt;p&gt;This is my NID, please check and verified my account. Thanks&lt;/p&gt;', 1, '2024-08-29 08:03:01', '2024-08-29 08:04:03'),
(2, 2, 4, 'uploads/custom-images/kyc-2024-08-29-02-08-49-5243.webp', '&lt;p&gt;I have attached my driving license, please check and verified my account. thanks&lt;/p&gt;', 1, '2024-08-29 08:08:50', '2024-08-29 08:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_types`
--

CREATE TABLE `kyc_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kyc_types`
--

INSERT INTO `kyc_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NID', 1, '2024-08-29 08:00:57', '2024-08-29 08:00:57'),
(2, 'Driving License', 1, '2024-08-29 08:02:04', '2024-08-29 08:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `lang_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_direction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang_name`, `lang_code`, `lang_direction`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'left_to_right', 'No', 1, '2024-05-07 11:56:30', '2024-05-07 12:01:16'),
(22, 'Hindi', 'hd', 'left_to_right', 'No', 1, '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED DEFAULT '0',
  `category_id` int NOT NULL,
  `thumb_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seo_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `sub_category_id`, `category_id`, `thumb_image`, `slug`, `status`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(12, NULL, 6, 'uploads/custom-images/listing-2024-12-25-11-55-32-6051.webp', 'web-design-service', 'enable', 'rerere errr3rgfergerg rgrtgtr', 'regegrgteg regregeegggerg34', '2024-12-24 09:32:52', '2024-12-26 13:19:52'),
(13, NULL, 8, 'uploads/custom-images/listing-2024-12-26-07-20-52-6532.webp', 'micro-saas-niche', 'enable', 'Micro Niche SAAS', 'Creating and editing content\r\nWorkflows, reporting, and content organization\r\nUser & role-based administration and security\r\nFlexibility, scalability, and performance and analysis\r\nMultilingual content capabilities', '2024-12-26 13:20:52', '2024-12-26 13:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `listing_galleries`
--

CREATE TABLE `listing_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `listing_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_galleries`
--

INSERT INTO `listing_galleries` (`id`, `listing_id`, `image`, `created_at`, `updated_at`) VALUES
(6, 1, 'uploads/custom-images/listing-gallery-2024-07-10-12-37-44-54380.webp', '2024-07-10 06:37:44', '2024-07-10 06:37:44'),
(7, 1, 'uploads/custom-images/listing-gallery-2024-07-10-12-37-44-82411.webp', '2024-07-10 06:37:44', '2024-07-10 06:37:44'),
(8, 1, 'uploads/custom-images/listing-gallery-2024-07-10-12-37-44-34692.webp', '2024-07-10 06:37:44', '2024-07-10 06:37:44'),
(9, 1, 'uploads/custom-images/listing-gallery-2024-07-10-12-37-44-32443.webp', '2024-07-10 06:37:44', '2024-07-10 06:37:44'),
(10, 1, 'uploads/custom-images/listing-gallery-2024-07-10-12-37-44-56654.webp', '2024-07-10 06:37:44', '2024-07-10 06:37:44'),
(11, 2, 'uploads/custom-images/listing-gallery-2024-07-10-01-07-48-91900.webp', '2024-07-10 07:07:48', '2024-07-10 07:07:48'),
(12, 2, 'uploads/custom-images/listing-gallery-2024-07-10-01-07-48-15131.webp', '2024-07-10 07:07:48', '2024-07-10 07:07:48'),
(13, 2, 'uploads/custom-images/listing-gallery-2024-07-10-01-07-48-57172.webp', '2024-07-10 07:07:48', '2024-07-10 07:07:48'),
(14, 2, 'uploads/custom-images/listing-gallery-2024-07-10-01-07-48-25053.webp', '2024-07-10 07:07:48', '2024-07-10 07:07:48'),
(15, 3, 'uploads/custom-images/listing-gallery-2024-07-10-01-09-31-54880.webp', '2024-07-10 07:09:31', '2024-07-10 07:09:31'),
(16, 3, 'uploads/custom-images/listing-gallery-2024-07-10-01-09-31-96001.webp', '2024-07-10 07:09:31', '2024-07-10 07:09:31'),
(17, 3, 'uploads/custom-images/listing-gallery-2024-07-10-01-09-31-27572.webp', '2024-07-10 07:09:31', '2024-07-10 07:09:31'),
(18, 3, 'uploads/custom-images/listing-gallery-2024-07-10-01-09-31-27953.webp', '2024-07-10 07:09:31', '2024-07-10 07:09:31'),
(19, 4, 'uploads/custom-images/listing-gallery-2024-07-10-01-11-00-80070.webp', '2024-07-10 07:11:00', '2024-07-10 07:11:00'),
(20, 4, 'uploads/custom-images/listing-gallery-2024-07-10-01-11-00-54651.webp', '2024-07-10 07:11:00', '2024-07-10 07:11:00'),
(21, 4, 'uploads/custom-images/listing-gallery-2024-07-10-01-11-00-91302.webp', '2024-07-10 07:11:00', '2024-07-10 07:11:00'),
(23, 6, 'uploads/custom-images/listing-gallery-2024-07-10-02-55-22-99870.webp', '2024-07-10 08:55:22', '2024-07-10 08:55:22'),
(24, 6, 'uploads/custom-images/listing-gallery-2024-07-10-02-55-22-96961.webp', '2024-07-10 08:55:22', '2024-07-10 08:55:22'),
(25, 6, 'uploads/custom-images/listing-gallery-2024-07-10-02-55-22-45182.webp', '2024-07-10 08:55:22', '2024-07-10 08:55:22'),
(26, 6, 'uploads/custom-images/listing-gallery-2024-07-10-02-55-22-41983.webp', '2024-07-10 08:55:22', '2024-07-10 08:55:22'),
(27, 7, 'uploads/custom-images/listing-gallery-2024-07-10-03-02-34-13930.webp', '2024-07-10 09:02:34', '2024-07-10 09:02:34'),
(28, 7, 'uploads/custom-images/listing-gallery-2024-07-10-03-02-34-82151.webp', '2024-07-10 09:02:34', '2024-07-10 09:02:34'),
(29, 8, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-09-85650.webp', '2024-07-10 09:03:09', '2024-07-10 09:03:09'),
(30, 8, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-09-36261.webp', '2024-07-10 09:03:09', '2024-07-10 09:03:09'),
(31, 8, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-09-39682.webp', '2024-07-10 09:03:09', '2024-07-10 09:03:09'),
(32, 8, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-09-78773.webp', '2024-07-10 09:03:09', '2024-07-10 09:03:09'),
(33, 9, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-49-17110.webp', '2024-07-10 09:03:49', '2024-07-10 09:03:49'),
(34, 9, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-49-20441.webp', '2024-07-10 09:03:49', '2024-07-10 09:03:49'),
(35, 9, 'uploads/custom-images/listing-gallery-2024-07-10-03-03-49-38572.webp', '2024-07-10 09:03:49', '2024-07-10 09:03:49'),
(36, 10, 'uploads/custom-images/listing-gallery-2024-07-10-03-04-24-29590.webp', '2024-07-10 09:04:24', '2024-07-10 09:04:24'),
(37, 10, 'uploads/custom-images/listing-gallery-2024-07-10-03-04-24-47971.webp', '2024-07-10 09:04:24', '2024-07-10 09:04:24'),
(38, 10, 'uploads/custom-images/listing-gallery-2024-07-10-03-04-24-91602.webp', '2024-07-10 09:04:24', '2024-07-10 09:04:24'),
(39, 10, 'uploads/custom-images/listing-gallery-2024-07-10-03-04-24-32533.webp', '2024-07-10 09:04:24', '2024-07-10 09:04:24'),
(43, 13, 'uploads/custom-images/listing-gallery-2025-01-06-12-52-01-11550.webp', '2025-01-06 06:52:01', '2025-01-06 06:52:01'),
(44, 12, 'uploads/custom-images/listing-gallery-2025-01-06-12-52-24-55580.webp', '2025-01-06 06:52:24', '2025-01-06 06:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `listing_translations`
--

CREATE TABLE `listing_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `listing_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_translations`
--

INSERT INTO `listing_translations` (`id`, `listing_id`, `lang_code`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 12, 'en', 'Web Design Service', '<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\n<h3>Features</h3>\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\n<ul>\n<li>Creating and editing content</li>\n<li>Workflows, reporting, and content organization</li>\n<li>User &amp; role-based administration and security</li>\n<li>Flexibility, scalability, and performance and analysis</li>\n<li>Multilingual content capabilities</li>\n</ul>\n<h3>Goal</h3>\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>', '2024-12-24 09:32:52', '2024-12-26 13:19:52'),
(2, 12, 'hd', 'Allow for 5-10 Years', '<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\n\n\n<h3>Features</h3>\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\n\n<ul>\n<li>Creating and editing content</li>\n<li>Workflows, reporting, and content organization</li>\n<li>User &amp; role-based administration and security</li>\n<li>Flexibility, scalability, and performance and analysis</li>\n<li>Multilingual content capabilities</li>\n</ul>\n\n\n\n<h3>Goal</h3>\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\n', '2024-12-24 09:32:52', '2024-12-24 09:32:52'),
(25, 13, 'en', 'Micro SAAS Niche', '<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\n\n\n<h3>Features</h3>\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\n\n<ul>\n<li>Creating and editing content</li>\n<li>Workflows, reporting, and content organization</li>\n<li>User &amp; role-based administration and security</li>\n<li>Flexibility, scalability, and performance and analysis</li>\n<li>Multilingual content capabilities</li>\n</ul>\n\n\n\n<h3>Goal</h3>\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\n', '2024-12-26 13:20:52', '2024-12-26 13:20:52'),
(26, 13, 'hd', 'Micro SAAS Niche', '<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\n\n\n<h3>Features</h3>\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\n\n<ul>\n<li>Creating and editing content</li>\n<li>Workflows, reporting, and content organization</li>\n<li>User &amp; role-based administration and security</li>\n<li>Flexibility, scalability, and performance and analysis</li>\n<li>Multilingual content capabilities</li>\n</ul>\n\n\n\n<h3>Goal</h3>\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\n', '2024-12-26 13:20:52', '2024-12-26 13:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `buyer_id` int NOT NULL DEFAULT '1',
  `seller_id` int NOT NULL DEFAULT '1',
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `buyer_read_msg` int NOT NULL DEFAULT '0',
  `seller_read_msg` int NOT NULL DEFAULT '0',
  `send_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `buyer_id`, `seller_id`, `message`, `buyer_read_msg`, `seller_read_msg`, `send_by`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Hello brother, How are you ? I have a laravel project.', 1, 1, 'buyer', 0, '2024-07-26 09:12:38', '2024-07-26 09:13:05'),
(2, 1, 3, 'Hello', 1, 1, 'seller', 0, '2024-07-26 09:13:12', '2024-08-29 07:58:42'),
(3, 1, 3, 'I&#039;m fine. What&#039;s about you ?', 1, 1, 'seller', 0, '2024-07-26 09:13:21', '2024-08-29 07:58:42'),
(4, 1, 3, 'Let&#039;s discuss the project', 1, 1, 'seller', 0, '2024-07-26 09:13:30', '2024-08-29 07:58:42'),
(5, 1, 3, 'Please share google meet link', 1, 0, 'buyer', 0, '2024-07-26 09:13:42', '2024-07-26 09:13:42'),
(6, 1, 7, 'Hello, I have laravel project. I need a fixing the bug. can you help me ?', 1, 0, 'buyer', 0, '2024-07-26 09:14:31', '2024-07-26 09:14:31'),
(7, 1, 7, 'Please response me', 1, 0, 'buyer', 0, '2024-07-26 09:14:42', '2024-07-26 09:14:42'),
(8, 1, 7, 'Can you share the bug sample ?', 1, 1, 'seller', 0, '2024-07-26 09:14:42', '2024-08-29 07:58:43'),
(9, 1, 7, 'Sure, Give me time please', 1, 0, 'buyer', 0, '2024-07-26 09:15:33', '2024-07-26 09:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 2),
(9, '2024_05_06_161335_create_admins_table', 3),
(10, '2024_05_06_182035_create_global_settings_table', 4),
(11, '2024_05_07_174113_create_languages_table', 5),
(12, '2024_05_07_180516_create_currencies_table', 6),
(15, '2024_05_09_045544_create_testimonials_table', 7),
(16, '2024_05_09_045555_create_testimonial_trasnlations_table', 7),
(19, '2024_05_09_080956_create_email_settings_table', 8),
(20, '2024_05_09_082850_create_email_templates_table', 9),
(21, '2024_05_09_090449_add_statu_to_users', 10),
(22, '2024_05_09_090506_add_personal_info_to_admins', 10),
(23, '2024_05_09_091106_add_avatar_to_admins', 11),
(24, '2024_05_09_100009_create_seo_settings_table', 12),
(27, '2024_05_09_110823_create_term_and_conditions_table', 13),
(28, '2024_05_09_111521_create_privacy_policies_table', 13),
(29, '2024_05_09_114012_create_faqs_table', 14),
(30, '2024_05_09_114027_create_faq_translations_table', 14),
(31, '2024_05_08_151634_create_blogs_table', 15),
(32, '2024_05_08_152208_create_blog_categories_table', 15),
(33, '2024_05_08_152741_create_blog_translations_table', 15),
(34, '2024_05_08_152807_create_blog_category_translations_table', 15),
(35, '2024_05_12_064013_create_blog_comments_table', 16),
(36, '2024_01_31_044113_create_cities_table', 17),
(37, '2024_01_31_045030_create_city_translations_table', 17),
(38, '2024_02_24_052456_create_categories_table', 17),
(39, '2024_02_24_054937_create_sub_categories_table', 17),
(40, '2024_02_24_054952_create_sub_category_translations_table', 17),
(44, '2024_05_13_053040_add_city_image_to_cities', 18),
(45, '2024_05_13_060052_create_category_translations', 19),
(46, '2024_05_13_062301_add_icon_to_categories', 20),
(47, '2024_05_13_062424_add_category_id_to_category_translation', 21),
(48, '2024_05_13_081716_create_payment_gateways_table', 22),
(53, '2024_05_13_121650_create_homepages_table', 24),
(54, '2024_05_13_122614_create_homepage_translations_table', 24),
(55, '2024_05_14_102923_add_working_des_to_homepage_translations', 25),
(56, '2024_05_14_115626_add_app_link_to_homepages', 26),
(58, '2024_01_31_092624_create_listing_translations_table', 50),
(59, '2024_02_01_104552_create_listing_galleries_table', 50),
(60, '2024_03_20_060641_create_job_requests_table', 27),
(61, '2024_05_02_171413_create_job_posts_table', 27),
(62, '2024_05_02_171618_create_job_post_translations_table', 27),
(63, '2024_05_14_144849_add_banned_to_users', 28),
(64, '2024_05_15_163816_create_about_us_table', 29),
(65, '2024_05_15_163829_create_about_us_translations_table', 29),
(66, '2024_05_27_161629_create_listing_packages_table', 50),
(67, '2024_06_09_155059_create_newsletters_table', 31),
(68, '2024_06_15_154748_create_footers_table', 32),
(69, '2024_06_15_155130_create_footer_translations_table', 32),
(70, '2024_06_26_105119_create_orders_table', 33),
(71, '2024_06_28_122222_create_reviews_table', 34),
(72, '2024_06_28_145313_create_withdraw_methods_table', 34),
(73, '2024_06_28_161601_create_seller_withdraws_table', 34),
(74, '2024_07_02_220449_create_custom_pages_table', 35),
(75, '2024_07_02_221522_create_custom_page_translations_table', 35),
(76, '2024_07_03_121953_create_contact_messages_table', 36),
(77, '2024_07_03_125356_add_features_to_homepages', 37),
(78, '2024_07_03_125617_add_features_to_homepage_translations', 38),
(79, '2024_07_06_105541_add_home2_intro_to_homepages', 39),
(80, '2024_07_06_105607_add_home2_intro_to_homepage_translations', 39),
(81, '2024_07_06_171027_create_wishlists_table', 40),
(82, '2024_07_25_123830_create_messages_table', 41),
(83, '2024_07_25_204121_create_wallets_table', 42),
(84, '2024_07_25_204251_create_wallet_transactions_table', 42),
(85, '2024_07_28_212722_add_submit_file_to_orders', 43),
(86, '2024_07_28_215446_create_refund_requests_table', 43),
(89, '2024_08_24_165133_create_sub_categories_table', 44),
(90, '2024_08_24_165613_create_sub_category_translates_table', 44),
(92, '2024_08_27_155829_create_kyc_types_table', 46),
(93, '2024_08_27_155830_create_kyc_information_table', 46),
(94, '2024_08_27_182402_add_kyc_status_to_users_table', 46),
(95, '2024_08_28_141156_add_status_columns_to_users_table', 46),
(100, '2024_02_11_095157_create_subscription_plans_table', 47),
(101, '2024_02_14_121751_create_subscription_histories_table', 47),
(102, '2024_11_25_125500_create_frontends_table', 48),
(103, '2024_12_19_162802_add_data_translations_column_to_frontends_table', 49),
(106, '2024_08_25_122955_add_category_id_to_listings_table', 52),
(107, '2024_01_31_090220_create_listings_table', 53),
(110, '2024_12_28_144301_create_project_galleries_table', 54),
(111, '2024_12_28_160450_add_rating_column_to_testimonial_table', 54),
(114, '2024_12_28_144245_create_project_translations_table', 56),
(115, '2024_12_28_144236_create_projects_table', 57),
(117, '2025_01_05_163935_create_sliders_table', 59),
(119, '2025_01_05_163956_create_slider_translations_table', 60),
(120, '2025_01_06_190028_create_team_translations_table', 62),
(121, '2024_12_30_142443_create_teams_table', 63);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_id` int NOT NULL,
  `seller_id` int NOT NULL,
  `listing_id` int NOT NULL,
  `listing_package_id` int NOT NULL,
  `total_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `package_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `additional_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `package_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `revision` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `fn_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `number_of_page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `responsive` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `source_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `content_upload` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `speed_optimized` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by_seller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `completed_by_buyer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `submit_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `buyer_id`, `seller_id`, `listing_id`, `listing_package_id`, `total_amount`, `package_amount`, `additional_amount`, `package_name`, `package_description`, `delivery_date`, `revision`, `fn_website`, `number_of_page`, `responsive`, `source_code`, `content_upload`, `speed_optimized`, `payment_method`, `payment_status`, `transaction_id`, `order_status`, `approved_by_seller`, `completed_by_buyer`, `created_at`, `updated_at`, `submit_file`) VALUES
(1, '1532267775', 1, 7, 2, 2, '99.00', '99.00', '0.00', 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Stripe', 'success', 'txn_3PcjoYF56Pb8BOOX1O6qD8NJ', 'pending', 'pending', 'pending', '2024-07-15 07:59:19', '2024-07-15 07:59:19', NULL),
(2, '17774696', 1, 5, 3, 3, '99.00', '99.00', '0.00', 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Paypal', 'success', 'ZUJKUEUDELUGE', 'cancel_by_buyer', 'pending', 'pending', '2024-07-15 07:59:51', '2024-07-30 02:15:38', NULL),
(3, '928264438', 1, 7, 10, 10, '99.00', '99.00', '0.00', 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Mollie', 'success', 'tr_aB8CcdG94i', 'complete_by_buyer', 'approved', 'complete', '2024-07-15 08:00:28', '2024-07-15 08:09:31', NULL),
(4, '1720558422', 1, 3, 4, 4, '99.00', '99.00', '0.00', 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Stripe', 'success', 'txn_3PcjrVF56Pb8BOOX0zsOfVSe', 'complete_by_buyer', 'approved', 'complete', '2024-07-15 08:02:22', '2024-07-15 08:08:54', NULL),
(5, '535722509', 1, 3, 4, 4, '99.00', '99.00', '0.00', 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Mollie', 'success', 'tr_rY7HW8CoWJ', 'complete_by_buyer', 'approved', 'complete', '2024-07-15 08:03:26', '2024-07-15 08:11:17', NULL),
(6, '1246543857', 1, 3, 4, 4, '30.00', '30.00', '0.00', 'Basic', 'Get a basic 10-screen Mobile App Design or Development', '1', '1', 'no', '4', 'yes', 'no', 'no', 'no', 'Paypal', 'success', 'ZUJKUEUDELUGE', 'complete_by_buyer', 'approved', 'complete', '2024-07-15 08:10:35', '2024-07-15 08:11:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'stripe_status', '1', NULL, '2024-06-26 03:47:57'),
(2, 'stripe_image', 'uploads/website-images/stripe-2024-06-26-09-11-39-8478.png', NULL, '2024-06-26 03:11:39'),
(3, 'stripe_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(4, 'stripe_key', 'pk_test_51JU61aF56Pb8BOOX5ucAe5DlDwAkCZyffqlKMDUWsAwhKbdtuY71VvIzr0NgFKjq4sOVVaaeeyVXXnNWwu5dKgeq00kMzCBUm5', NULL, '2024-06-26 03:47:57'),
(5, 'stripe_secret', 'sk_test_51JU61aF56Pb8BOOXlz7jGkzJsCkozuAoRlFJskYGsgunfaHLmcvKLubYRQLCQOuyYHq0mvjoBFLzV7d8F6q8f6Hv00CGwULEEV', NULL, '2024-06-26 03:47:57'),
(6, 'paypal_status', '1', NULL, '2024-06-27 06:52:59'),
(7, 'paypal_image', 'uploads/website-images/paypal-2024-06-26-09-12-11-9195.png', NULL, '2024-06-26 03:12:11'),
(8, 'paypal_account_mode', 'sandbox', NULL, '2024-06-27 06:52:59'),
(9, 'paypal_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(10, 'paypal_client_id', 'AWlV5x8Lhj9BRF8-TnawXtbNs-zt69mMVXME1BGJUIoDdrAYz8QIeeTBQp0sc2nIL9E529KJZys32Ipy', NULL, '2024-06-27 06:52:59'),
(11, 'paypal_secret_key', 'EEvn1J_oIC6alxb-FoF4t8buKwy4uEWHJ4_Jd_wolaSPRMzFHe6GrMrliZAtawDDuE-WKkCKpWGiz0Yn', NULL, '2024-06-27 06:52:59'),
(12, 'razorpay_status', '1', NULL, '2024-07-26 08:49:08'),
(13, 'razorpay_image', 'uploads/website-images/paypal-2024-06-26-09-12-18-5252.png', NULL, '2024-06-26 03:12:18'),
(14, 'razorpay_currency_id', '8', NULL, '2024-07-26 08:49:08'),
(15, 'razorpay_key', 'rzp_test_K7CipNQYyyMPiS', NULL, '2024-07-26 08:49:08'),
(16, 'razorpay_secret', 'zSBmNMorJrirOrnDrbOd1ALO', NULL, '2024-07-26 08:49:08'),
(17, 'razorpay_name', 'WorkZone', NULL, '2024-07-26 08:49:08'),
(18, 'razorpay_description', 'Online MarketPlace', NULL, '2024-07-26 08:49:08'),
(19, 'razorpay_theme_color', '#57c20f', NULL, '2024-07-26 08:49:08'),
(20, 'flutterwave_status', '1', NULL, '2024-06-30 08:03:34'),
(21, 'flutterwave_logo', 'uploads/website-images/paypal-2024-06-26-09-12-33-6846.png', NULL, '2024-06-26 03:12:33'),
(22, 'flutterwave_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(23, 'flutterwave_public_key', 'FLWPUBK_TEST-5760e3ff9888aa1ab5e5cd1ec3f99cb1-X', NULL, '2024-06-30 08:03:34'),
(24, 'flutterwave_secret_key', 'FLWSECK_TEST-81cb5da016d0a51f7329d4a8057e766d-X', NULL, '2024-06-30 08:03:34'),
(25, 'flutterwave_title', 'WorkZone', NULL, '2024-06-30 08:03:34'),
(26, 'mollie_status', '1', NULL, '2024-07-03 04:47:49'),
(27, 'mollie_image', 'uploads/website-images/paypal-2024-06-26-09-12-39-3044.png', NULL, '2024-06-26 03:12:39'),
(28, 'mollie_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(29, 'mollie_key', 'test_p9qgUn7Sg22xF3Q8D9heBSVEzrzM5Q', NULL, '2024-07-03 04:47:49'),
(30, 'paystack_status', '1', NULL, '2024-07-03 05:17:44'),
(31, 'paystack_image', 'uploads/website-images/paypal-2024-06-26-09-12-47-9168.png', NULL, '2024-06-26 03:12:47'),
(32, 'paystack_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(33, 'paystack_public_key', 'pk_test_057dfe5dee14eaf9c3b4573df1e3760c02c06e38', NULL, '2024-07-03 05:17:44'),
(34, 'paystack_secret_key', 'sk_test_77cb93329abbdc18104466e694c9f720a7d69c97', NULL, '2024-07-03 05:17:44'),
(35, 'instamojo_status', '1', NULL, '2024-07-03 06:04:33'),
(36, 'instamojo_image', 'uploads/website-images/paypal-2024-06-26-09-12-53-1868.png', NULL, '2024-06-26 03:12:53'),
(37, 'instamojo_account_mode', 'Sandbox', NULL, '2024-07-03 06:04:33'),
(38, 'instamojo_currency_id', '1', NULL, '2024-07-10 05:34:33'),
(39, 'instamojo_api_key', 'test_5f4a2c9a58ef216f8a1a688910f', NULL, '2024-07-03 06:04:33'),
(40, 'instamojo_auth_token', 'test_994252ada69ce7b3d282b9941c2', NULL, '2024-07-03 06:04:33'),
(41, 'bank_status', '1', NULL, '2024-06-26 05:52:39'),
(42, 'bank_image', 'uploads/website-images/paypal-2024-06-26-09-12-59-4505.png', NULL, '2024-06-26 03:12:59'),
(43, 'bank_account_info', 'Bank Name: Your bank name\r\nAccount Number:  Your bank account number\r\nRouting Number: Your bank routing number\r\nBranch: Your bank branch name', NULL, '2024-06-26 05:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `lang_code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'en', '<h4>01.Introduction</h4>\r\n<p>A Privacy Policy is a legal document that informs users about the data collected, how it\'s used, and how it\'s protected. It typically includes information about the type of personal our ainformation collected (such as names, email addresses, etc.), the purpose of collection, and whether the information is shared with third parties. It outlines the rights of users regarding their data, such as the right to access, correct, or delete their information.</p>\r\n<h4>02.Workzone of Privacy and Policy</h4>\r\n<p>Terms of Service (also known as Terms and Conditions or Terms of Use) set the rules and guidelines for using a particular service or platform. They establish the contractual relationship between the user and the service provider. They often include details about user behavior, content usage policies, disclaimers, limitations of liability, and procedures for dispute resolution.Users typically agree to these terms by using the service.When you visit a website or use an online service, you are usually asked to agree to both the Privacy Policy and the Terms of Service. These documents are crucial for transparency, legal compliance, and establishing the terms under which users can access and use the service.</p>\r\n<p>It\'s important for businesses and service providers to keep these documents up-to-date and easily accessible to users. If you have specific questions or concerns about privacy policies or terms of service, feel free to provide more details, and I\'ll do my best to assist you.</p>\r\n<h4>3. Protect Your Property</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown as printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining as essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<h4>4. What to Include in Terms and Conditions for Limitations of Liability</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic ki typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>ive centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset as sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type our as specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas Ipsum to make a type specimen book.</p>\r\n<h4>05.Pricing and Payment Policy</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic as typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen our as book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', NULL, '2024-07-10 08:24:22'),
(19, 'hd', '<h4>01.Introduction</h4>\r\n<p>A Privacy Policy is a legal document that informs users about the data collected, how it\'s used, and how it\'s protected. It typically includes information about the type of personal our ainformation collected (such as names, email addresses, etc.), the purpose of collection, and whether the information is shared with third parties. It outlines the rights of users regarding their data, such as the right to access, correct, or delete their information.</p>\r\n<h4>02.Freelance Terms of Service (Privacy and Policy)</h4>\r\n<p>Terms of Service (also known as Terms and Conditions or Terms of Use) set the rules and guidelines for using a particular service or platform. They establish the contractual relationship between the user and the service provider. They often include details about user behavior, content usage policies, disclaimers, limitations of liability, and procedures for dispute resolution.Users typically agree to these terms by using the service.When you visit a website or use an online service, you are usually asked to agree to both the Privacy Policy and the Terms of Service. These documents are crucial for transparency, legal compliance, and establishing the terms under which users can access and use the service.</p>\r\n<p>It\'s important for businesses and service providers to keep these documents up-to-date and easily accessible to users. If you have specific questions or concerns about privacy policies or terms of service, feel free to provide more details, and I\'ll do my best to assist you.</p>\r\n<h4>3. Protect Your Property</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown as printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining as essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<h4>4. What to Include in Terms and Conditions for Limitations of Liability</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic ki typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>ive centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset as sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type our as specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas Ipsum to make a type specimen book.</p>\r\n<h4>05.Pricing and Payment Policy</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic as typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen our as book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `sub_category_id` int DEFAULT NULL,
  `thumb_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_fb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_x` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `sub_category_id`, `thumb_image`, `slug`, `website_url`, `project_date`, `project_fb`, `project_x`, `project_linkedin`, `project_instagram`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, NULL, 'uploads/custom-images/project-2024-12-29-04-51-00-3580.webp', 'facebook-hacking-service', 'https://github.com/copilot', '2024-02-05', 'https://fb.com/copilot', 'https://x.com/copilot', 'https://linkedin.com/copilot', 'https://instagram.com/copilot', 'enable', '2024-12-29 10:51:01', '2024-12-29 10:51:01'),
(3, 5, NULL, 'uploads/custom-images/project-2024-12-30-12-14-41-7560.webp', 'uiux-design-service', 'https://github.com/copilot', '2025-10-10', 'https://github.com/copilot', 'https://github.com/copilot', 'https://github.com/copilot', 'https://github.com/copilot', 'enable', '2024-12-29 10:58:23', '2024-12-30 06:14:46'),
(4, 12, NULL, 'uploads/custom-images/project-2024-12-30-12-07-50-3074.webp', 'web-security', 'https://github.com/copilot', '2024-10-02', 'https://github.com/copilot', 'https://github.com/copilot', 'https://linkedin.com/copilot', 'https://instagram.com/copilot', 'enable', '2024-12-29 11:00:41', '2024-12-30 06:07:52'),
(5, 11, NULL, 'uploads/custom-images/project-2024-12-30-11-56-16-2642.webp', 'market-research', 'https://x.com/copilot', '2025-10-10', 'https://x.com/copilot', 'https://x.com/copilot', 'https://x.com/copilot', 'https://x.com/copilot', 'enable', '2024-12-30 05:56:18', '2024-12-30 05:56:18'),
(6, 8, NULL, 'uploads/custom-images/project-2024-12-30-12-22-12-4052.webp', 'motion-device', 'https://github.com/copilot', '2021-10-02', 'https://github.com/copilot', 'https://github.com/copilot', 'https://github.com/copilot', 'https://instagram.com/copilot', 'enable', '2024-12-30 06:19:47', '2024-12-30 06:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `project_galleries`
--

CREATE TABLE `project_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_galleries`
--

INSERT INTO `project_galleries` (`id`, `project_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 2, 'uploads/custom-images/project-gallery-2024-12-29-04-51-16-76540.webp', '2024-12-29 10:51:16', '2024-12-29 10:51:16'),
(6, 2, 'uploads/custom-images/project-gallery-2024-12-29-04-51-16-56491.webp', '2024-12-29 10:51:17', '2024-12-29 10:51:17'),
(7, 3, 'uploads/custom-images/project-gallery-2024-12-30-11-49-25-83880.webp', '2024-12-30 05:49:25', '2024-12-30 05:49:25'),
(8, 3, 'uploads/custom-images/project-gallery-2024-12-30-11-49-25-69651.webp', '2024-12-30 05:49:25', '2024-12-30 05:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `project_translations`
--

CREATE TABLE `project_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` int NOT NULL,
  `lang_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_translations`
--

INSERT INTO `project_translations` (`id`, `project_id`, `lang_code`, `title`, `description`, `client_name`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(3, 2, 'en', 'Facebook Hacking Service', '\r\n<h3>Project overview</h3>\r\n<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n\r\n\r\n<h3>The challenge of project</h3>\r\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\r\n<p>&nbsp;</p>\r\n\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n\r\n\r\n<ul>\r\n<li>Creating and editing content</li>\r\n<li>Workflows, reporting, and content organization</li>\r\n<li>User &amp; role-based administration and security</li>\r\n<li>Flexibility, scalability, and performance and analysis</li>\r\n<li>Multilingual content capabilities</li>\r\n</ul>\r\n\r\n\r\n<h3>Final results</h3>\r\n<p>Having a content management system for your website allows you to have control of your content. It means having the ability to update, change or delete any images, text, video, or audio. It allows you to keep your site organized, up to date and looking.</p>\r\n\r\n', 'Anthony Fu', 'Laravel package which was created to manage your large Laravel', 'Laravel package which was created to manage your large Laravel', '2024-12-29 10:51:01', '2024-12-29 10:51:01'),
(4, 2, 'hd', 'Facebook Hacking Service', '\r\n<h3>Project overview</h3>\r\n<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n\r\n\r\n<h3>The challenge of project</h3>\r\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\r\n<p>&nbsp;</p>\r\n\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n\r\n\r\n<ul>\r\n<li>Creating and editing content</li>\r\n<li>Workflows, reporting, and content organization</li>\r\n<li>User &amp; role-based administration and security</li>\r\n<li>Flexibility, scalability, and performance and analysis</li>\r\n<li>Multilingual content capabilities</li>\r\n</ul>\r\n\r\n\r\n<h3>Final results</h3>\r\n<p>Having a content management system for your website allows you to have control of your content. It means having the ability to update, change or delete any images, text, video, or audio. It allows you to keep your site organized, up to date and looking.</p>\r\n\r\n', 'Anthony Fu', 'Laravel package which was created to manage your large Laravel', 'Laravel package which was created to manage your large Laravel', '2024-12-29 10:51:01', '2024-12-29 10:51:01'),
(5, 3, 'en', 'UI-UX Design Service', '<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n<ul>\r\n<li>Creating and editing content</li>\r\n<li>Workflows, reporting, and content organization</li>\r\n<li>User &amp; role-based administration and security</li>\r\n<li>Flexibility, scalability, and performance and analysis</li>\r\n<li>Multilingual content capabilities</li>\r\n</ul>\r\n<h3>Final results</h3>\r\n<p>Having a content management system for your website allows you to have control of your content. It means having the ability to update, change or delete any images, text, video, or audio. It allows you to keep your site organized, up to date and looking.<br><br></p>\r\n<h3>Project overview</h3>\r\n<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n<h3>The challenge of project</h3>\r\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>', 'Nas Academy', 'Laravel package which was created to manage your large Laravel', 'Laravel package which was created to manage your large Laravel', '2024-12-29 10:58:23', '2024-12-30 06:08:44'),
(6, 3, 'hd', 'UI-UX Design Service', '\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n\r\n\r\n<ul>\r\n<li>Creating and editing content</li>\r\n<li>Workflows, reporting, and content organization</li>\r\n<li>User &amp; role-based administration and security</li>\r\n<li>Flexibility, scalability, and performance and analysis</li>\r\n<li>Multilingual content capabilities</li>\r\n</ul>\r\n\r\n\r\n<h3>Final results</h3>\r\n<p>Having a content management system for your website allows you to have control of your content. It means having the ability to update, change or delete any images, text, video, or audio. It allows you to keep your site organized, up to date and looking.<br><br></p>\r\n\r\n<h3>Project overview</h3>\r\n<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n\r\n\r\n<h3>The challenge of project</h3>\r\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\r\n\r\n', 'Nas Academy', 'Laravel package which was created to manage your large Laravel', 'Laravel package which was created to manage your large Laravel', '2024-12-29 10:58:23', '2024-12-29 10:58:23'),
(7, 4, 'en', 'Web Security', '<h3>Project overview</h3>\r\n<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n<h3>The challenge of project</h3>\r\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\r\n<h3>Project overview</h3>\r\n<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n<h3>The challenge of project</h3>\r\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>', 'Project Night fall', 'Laravel package which was created to manage your large Laravel', 'A content management system helps you create, manage, and pblish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available—from cloud-based to a headless', '2024-12-29 11:00:41', '2024-12-30 06:07:52'),
(8, 4, 'hd', 'Web Security', '\r\n<h3>Project overview</h3>\r\n<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n\r\n\r\n<h3>The challenge of project</h3>\r\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\r\n\r\n<h3>Project overview</h3>\r\n<p>A content management system helps you create, manage, and publish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available&mdash;from cloud-based to a headless</p>\r\n<p>CMS provides user-friendly features for easy editing and is compatible with installing plugins and tools that provide even more features for advanced functions. API CMS&rsquo;s are built to have an excellent user-friendly interface that is easy to use.</p>\r\n\r\n\r\n<h3>The challenge of project</h3>\r\n<p>A content management system (CMS) is an application that is used to manage content, allowing multiple contributors to create, edit and publish. Content in a CMS is typically stored in a database and displayed in a presentation layer based on a set of templates like a website.</p>\r\n\r\n', 'Project Night fall', 'Laravel package which was created to manage your large Laravel', 'A content management system helps you create, manage, and pblish content on the web. It also keep content organized and accessible so it can be used and repurposed effectively. There are various kinds of content management systems available—from cloud-based to a headless', '2024-12-29 11:00:41', '2024-12-29 11:00:41'),
(9, 5, 'en', 'Market Research', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>', 'Abu Domain', 'Laborum tempor labor', 'Laravel Delvevehnkwjvegbhhujb jhm', '2024-12-30 05:56:18', '2024-12-30 05:56:18'),
(10, 5, 'hd', 'Market Research', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>', 'Abu Domain', 'Laborum tempor labor', 'Laravel Delvevehnkwjvegbhhujb jhm', '2024-12-30 05:56:18', '2024-12-30 05:56:18'),
(11, 6, 'en', 'Motion Device', '<h2 class=\"heading-element\" dir=\"auto\" tabindex=\"-1\">A convenient Android app for checking your Dhaka MRT Card balance on the go.</h2>\r\n<p><a id=\"user-content-a-convenient-android-app-for-checking-your-dhaka-mrt-card-balance-on-the-go\" class=\"anchor\" href=\"https://github.com/aniruddha-adhikary/mrt-buddy#a-convenient-android-app-for-checking-your-dhaka-mrt-card-balance-on-the-go\" aria-label=\"Permalink: A convenient Android app for checking your Dhaka MRT Card balance on the go.\"></a></p>\r\n<h3 class=\"heading-element\" dir=\"auto\" tabindex=\"-1\">Overview</h3>\r\n<p><a id=\"user-content-overview\" class=\"anchor\" href=\"https://github.com/aniruddha-adhikary/mrt-buddy#overview\" aria-label=\"Permalink: Overview\"></a></p>\r\n<p dir=\"auto\">MRT Buddy is an unofficial community-driven Android app designed to check the balance of your Dhaka MRT Card. This app is not affiliated with DMTCL, JICA, Government of Bangladesh or any of its affiliates.</p>\r\n<h3 class=\"heading-element\" dir=\"auto\" tabindex=\"-1\">Key Features</h3>\r\n<p><a id=\"user-content-key-features\" class=\"anchor\" href=\"https://github.com/aniruddha-adhikary/mrt-buddy#key-features\" aria-label=\"Permalink: Key Features\"></a></p>\r\n<ul dir=\"auto\">\r\n<li>View and store the balance and last 19 transactions directly on your device from the RapidPass / MRT Card, which is a FeliCa Card.</li>\r\n<li>No API connectivity required.</li>\r\n<li>Limited to 10 transactions; for more, an official solution from DMTCL is necessary.</li>\r\n</ul>\r\n<h3 class=\"heading-element\" dir=\"auto\" tabindex=\"-1\">Instructions</h3>\r\n<ul dir=\"auto\">\r\n<li>Ensure your phone supports NFC.</li>\r\n<li>Place the MRT pass near the back of your phone properly for a successful scan.</li>\r\n</ul>\r\n<h3 class=\"heading-element\" dir=\"auto\" tabindex=\"-1\">Stay Updated</h3>\r\n<p><a id=\"user-content-stay-updated\" class=\"anchor\" href=\"https://github.com/aniruddha-adhikary/mrt-buddy#stay-updated\" aria-label=\"Permalink: Stay Updated\"></a></p>\r\n<p dir=\"auto\">Want to receive notifications when updates are available? Until approval on the Play Store, all updates will be announced on this WhatsApp channel!</p>', 'Al Kaseem Bigrede', 'Laborum tempor labor', 'laracvelk Lkshdiufhwi mjhbgjh,g uykhgyujh', '2024-12-30 06:19:47', '2024-12-30 06:22:15'),
(12, 6, 'hd', 'Motion Device', '\r\n<h2 class=\"heading-element\" dir=\"auto\" tabindex=\"-1\">A convenient Android app for checking your Dhaka MRT Card balance on the go.</h2>\r\n<a id=\"user-content-a-convenient-android-app-for-checking-your-dhaka-mrt-card-balance-on-the-go\" class=\"anchor\" href=\"https://github.com/aniruddha-adhikary/mrt-buddy#a-convenient-android-app-for-checking-your-dhaka-mrt-card-balance-on-the-go\" aria-label=\"Permalink: A convenient Android app for checking your Dhaka MRT Card balance on the go.\"></a>\r\n\r\n<h3 class=\"heading-element\" dir=\"auto\" tabindex=\"-1\">Overview</h3>\r\n<a id=\"user-content-overview\" class=\"anchor\" href=\"https://github.com/aniruddha-adhikary/mrt-buddy#overview\" aria-label=\"Permalink: Overview\"></a>\r\n<p dir=\"auto\">MRT Buddy is an unofficial community-driven Android app designed to check the balance of your Dhaka MRT Card. This app is not affiliated with DMTCL, JICA, Government of Bangladesh or any of its affiliates.</p>\r\n\r\n<h3 class=\"heading-element\" dir=\"auto\" tabindex=\"-1\">Key Features</h3>\r\n<a id=\"user-content-key-features\" class=\"anchor\" href=\"https://github.com/aniruddha-adhikary/mrt-buddy#key-features\" aria-label=\"Permalink: Key Features\"></a>\r\n<ul dir=\"auto\">\r\n<li>View and store the balance and last 19 transactions directly on your device from the RapidPass / MRT Card, which is a FeliCa Card.</li>\r\n<li>No API connectivity required.</li>\r\n<li>Limited to 10 transactions; for more, an official solution from DMTCL is necessary.</li>\r\n</ul>\r\n\r\n<h3 class=\"heading-element\" dir=\"auto\" tabindex=\"-1\">Instructions</h3>\r\n<ul dir=\"auto\">\r\n<li>Ensure your phone supports NFC.</li>\r\n<li>Place the MRT pass near the back of your phone properly for a successful scan.</li>\r\n</ul>\r\n\r\n<h3 class=\"heading-element\" dir=\"auto\" tabindex=\"-1\">Stay Updated</h3>\r\n<a id=\"user-content-stay-updated\" class=\"anchor\" href=\"https://github.com/aniruddha-adhikary/mrt-buddy#stay-updated\" aria-label=\"Permalink: Stay Updated\"></a>\r\n<p dir=\"auto\">Want to receive notifications when updates are available? Until approval on the Play Store, all updates will be announced on this WhatsApp channel!</p>\r\n', 'Al Kaseem Bigrede', 'Laborum tempor labor', 'laracvelk Lkshdiufhwi mjhbgjh,g uykhgyujh', '2024-12-30 06:19:47', '2024-12-30 06:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `refund_requests`
--

CREATE TABLE `refund_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `buyer_id` int NOT NULL DEFAULT '0',
  `seller_id` int NOT NULL DEFAULT '0',
  `order_id` int NOT NULL DEFAULT '0',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `refund_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending,rejected,approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refund_requests`
--

INSERT INTO `refund_requests` (`id`, `buyer_id`, `seller_id`, `order_id`, `note`, `refund_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, 'please refund the balance', '99.00', 'approved', '2024-07-30 02:15:52', '2024-07-30 02:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `listing_id` int NOT NULL,
  `buyer_id` int NOT NULL,
  `seller_id` int NOT NULL,
  `rating` int NOT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `review_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'buyer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `order_id`, `listing_id`, `buyer_id`, `seller_id`, `rating`, `review`, `status`, `review_by`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 1, 3, 4, 'There are many variations of passages of Lorem Ipsum available, but the our as majoritys have su alteration in some form, by injected humour, or randomised words which don&#039;t.', 'enable', 'buyer', '2024-07-15 08:09:21', '2024-07-15 08:09:50'),
(2, 3, 10, 1, 7, 3, 'There are many variations of passages of Lorem Ipsum available, but the our as majoritys have su alteration in some form, by injected humour, or randomised words which don&#039;t.', 'enable', 'buyer', '2024-07-15 08:09:36', '2024-07-15 08:09:44'),
(3, 6, 4, 1, 3, 3, 'There are many variations of passages of Lorem Ipsum available, but the our as majoritys have su alteration in some form, by injected humour, or randomised words which don&#039;t.', 'enable', 'buyer', '2024-07-15 08:11:12', '2024-07-15 08:11:49'),
(4, 5, 4, 1, 3, 5, 'There are many variations of passages of Lorem Ipsum available, but the our as majoritys have su alteration in some form, by injected humour, or randomised words which don&#039;t.', 'enable', 'buyer', '2024-07-15 08:11:22', '2024-07-15 08:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `seller_withdraws`
--

CREATE TABLE `seller_withdraws` (
  `id` bigint UNSIGNED NOT NULL,
  `seller_id` int NOT NULL,
  `withdraw_method_id` int NOT NULL,
  `withdraw_method_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `withdraw_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `charge_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_withdraws`
--

INSERT INTO `seller_withdraws` (`id`, `seller_id`, `withdraw_method_id`, `withdraw_method_name`, `total_amount`, `withdraw_amount`, `charge_amount`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Bank Payment', '10.00', '9.95', '0.05', 'Account : 93843943\r\nIBBL Dhaka', 'approved', '2024-07-15 09:24:22', '2024-07-15 09:25:16'),
(2, 3, 1, 'Bank Payment', '10.00', '9.95', '0.05', 'Account : 93843945\r\nDBBL Dhaka', 'approved', '2024-07-15 09:24:48', '2024-07-15 09:25:01'),
(3, 3, 1, 'Bank Payment', '10.00', '9.95', '0.05', 'Branch: Your bank branch name', 'pending', '2024-09-15 03:55:24', '2024-09-15 03:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `page_name`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Home Page', '<p>Home Page</p>', NULL, '2024-05-09 04:12:51'),
(2, 'Blogs', 'Blogs', 'Blogs', NULL, NULL),
(3, 'About Us', 'About Us', '<p>About Us</p>', NULL, '2024-07-02 11:43:46'),
(4, 'Contact Us', 'Contact Us', '<p>Contact Us</p>', NULL, '2024-05-09 04:12:54'),
(5, 'FAQ', 'FAQ', 'FAQ', NULL, NULL),
(6, 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', NULL, NULL),
(7, 'Freelancer', 'Freelancer', 'Freelancer', NULL, NULL),
(8, 'Job Post', 'Job Post', 'Job Post', NULL, NULL),
(9, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', NULL, NULL),
(10, 'Service', 'Service', 'Service', NULL, NULL),
(11, 'Teams', 'Teams', 'Teams', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 'uploads/custom-images/slider-2025-01-05-05-23-35-4676.webp', 'about-us', '2025-01-05 11:23:35', '2025-01-05 11:23:35'),
(2, 'uploads/custom-images/slider-2025-01-05-05-53-25-9809.webp', 'contact-us', '2025-01-05 11:53:26', '2025-01-05 11:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `slider_id` int NOT NULL,
  `lang_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `slider_id`, `lang_code`, `title`, `small_text`, `button_text`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'In Night Before Any Doll', 'Crafting Digital Success Story', 'See More', '2025-01-05 11:23:35', '2025-01-05 11:23:35'),
(2, 1, 'hd', 'In Night Before Any Doll', 'Crafting Digital Success Story', 'See More', '2025-01-05 11:23:35', '2025-01-05 11:23:35'),
(3, 2, 'en', 'Anybody Can Dance', 'Anybody Can Dance Season VII', 'Watch More', '2025-01-05 11:53:26', '2025-01-05 11:53:26'),
(4, 2, 'hd', 'Anybody Can Dance', 'Anybody Can Dance Season VII', 'Watch More', '2025-01-05 11:53:26', '2025-01-05 11:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_histories`
--

CREATE TABLE `subscription_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `subscription_plan_id` int NOT NULL,
  `plan_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_price` decimal(8,2) NOT NULL,
  `expiration_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_listing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_listing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended_seller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_histories`
--

INSERT INTO `subscription_histories` (`id`, `order_id`, `user_id`, `subscription_plan_id`, `plan_name`, `plan_price`, `expiration_date`, `expiration`, `max_listing`, `featured_listing`, `recommended_seller`, `status`, `payment_method`, `payment_status`, `transaction`, `created_at`, `updated_at`) VALUES
(1, '1145225003', 4, 2, 'Silver', '19.99', '2025-09-12', 'yearly', '50', '10', 'active', 'expired', 'hand_cash', 'success', 'hand_cash', '2024-09-12 10:05:58', '2024-09-12 10:18:29'),
(3, '1505247687', 3, 3, 'Gold', '49.99', 'lifetime', 'lifetime', '50', '15', 'active', 'expired', 'hand_cash', 'success', 'hand_cash', '2024-09-12 10:14:00', '2024-09-15 05:14:59'),
(4, '1498578875', 3, 1, 'Free', '0.00', '2024-10-12', 'monthly', '20', '5', 'inactive', 'expired', 'Free', 'success', 'hand_cash', '2024-09-12 10:15:18', '2024-09-15 05:14:59'),
(5, '349907814', 4, 2, 'Silver', '19.99', '2025-09-12', 'yearly', '50', '10', 'active', 'active', 'hand_cash', 'success', 'hand_cash', '2024-09-12 10:18:29', '2024-09-12 10:18:29'),
(6, '739253305', 3, 2, 'Silver', '19.99', '2025-09-13', 'yearly', '50', '10', 'active', 'expired', 'hand_cash', 'success', 'hand_cash', '2024-09-13 11:59:31', '2024-09-15 05:14:59'),
(7, '175171775', 3, 2, 'Silver', '19.99', '2025-09-14', 'yearly', '50', '10', 'active', 'expired', 'Paypal', 'success', 'ZUJKUEUDELUGE', '2024-09-13 12:10:44', '2024-09-15 05:14:59'),
(8, '528079858', 3, 2, 'Silver', '19.99', '2025-09-14', 'yearly', '50', '10', 'active', 'expired', 'Instamojo', 'success', 'MOJO4913005A66463449', '2024-09-13 12:14:54', '2024-09-15 05:14:59'),
(11, '1382072656', 3, 4, 'Premium', '99.99', 'lifetime', 'lifetime', '100', '20', 'active', 'active', 'Stripe', 'success', 'txn_3PzAnWF56Pb8BOOX1Emhu447', '2024-09-15 05:14:59', '2024-09-15 05:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `plan_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_price` decimal(8,2) NOT NULL,
  `expiration_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_listing` int NOT NULL DEFAULT '0',
  `featured_listing` int NOT NULL DEFAULT '0',
  `recommended_seller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `plan_name`, `plan_price`, `expiration_date`, `max_listing`, `featured_listing`, `recommended_seller`, `status`, `serial`, `created_at`, `updated_at`) VALUES
(1, 'Free', '0.00', 'monthly', 20, 0, 'inactive', 'active', 1, '2024-08-29 05:44:14', '2024-09-12 11:11:24'),
(2, 'Silver', '19.99', 'yearly', 20, 0, 'inactive', 'active', 2, '2024-08-29 05:48:12', '2024-09-15 04:53:39'),
(3, 'Gold', '49.99', 'lifetime', 50, 15, 'active', 'active', 3, '2024-08-29 05:48:48', '2024-08-29 05:48:48'),
(4, 'Premium', '99.99', 'lifetime', 100, 20, 'active', 'active', 4, '2024-09-15 04:53:27', '2024-09-15 04:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(11, 6, 'logo-design', 'enable', '2024-08-26 04:50:41', '2024-08-26 04:50:41'),
(12, 6, 'brand-style-guides', 'enable', '2024-08-26 04:50:54', '2024-08-26 04:50:54'),
(13, 6, 'business-cards-stationery', 'enable', '2024-08-26 04:51:06', '2024-08-26 04:51:06'),
(14, 6, 'fonts-typography', 'enable', '2024-08-26 04:51:18', '2024-08-26 04:51:18'),
(15, 6, 'illustration', 'enable', '2024-08-26 04:51:31', '2024-08-26 04:51:31'),
(16, 8, 'frontend-development', 'enable', '2024-08-26 04:53:38', '2024-08-26 04:53:38'),
(17, 8, 'backend-development', 'enable', '2024-08-26 04:53:49', '2024-08-26 04:53:49'),
(18, 8, 'fullstack-development', 'enable', '2024-08-26 04:54:01', '2024-08-26 04:54:01'),
(19, 8, 'web-mobile-design', 'enable', '2024-08-26 04:54:12', '2024-08-26 04:54:12'),
(20, 8, 'cms-development-eg-wordpress-joomla', 'enable', '2024-08-26 04:54:21', '2024-08-26 04:54:21'),
(21, 3, 'social-media-marketing', 'enable', '2024-08-26 04:54:40', '2024-08-26 04:54:40'),
(22, 3, 'seo-optimization', 'enable', '2024-08-26 04:54:52', '2024-08-26 04:54:52'),
(23, 3, 'content-marketing', 'enable', '2024-08-26 04:55:01', '2024-08-26 04:55:01'),
(24, 3, 'email-marketing', 'enable', '2024-08-26 04:55:13', '2024-08-26 04:55:13'),
(25, 3, 'paid-advertising-eg-google-ads-facebook-ads', 'enable', '2024-08-26 04:55:24', '2024-08-26 04:55:24'),
(26, 12, 'residential-design', 'enable', '2024-08-26 05:02:47', '2024-08-26 05:02:47'),
(27, 12, 'commercial-design', 'enable', '2024-08-26 05:03:04', '2024-08-26 05:03:04'),
(28, 12, 'landscape-architecture', 'enable', '2024-08-26 05:03:14', '2024-08-26 05:03:14'),
(29, 12, 'interior-design', 'enable', '2024-08-26 05:03:24', '2024-08-26 05:03:24'),
(30, 12, 'urban-planning', 'enable', '2024-08-26 05:03:34', '2024-08-26 05:03:34'),
(31, 11, 'xui-design', 'enable', '2024-08-26 05:03:53', '2024-08-26 05:03:53'),
(32, 11, 'responsive-design', 'enable', '2024-08-26 05:04:02', '2024-08-26 05:04:02'),
(33, 11, 'wordpress-design', 'enable', '2024-08-26 05:04:10', '2024-08-26 05:04:10'),
(34, 11, 'ecommerce-design', 'enable', '2024-08-26 05:04:20', '2024-08-26 05:04:20'),
(35, 11, 'landing-page-design', 'enable', '2024-08-26 05:04:29', '2024-08-26 05:04:29'),
(36, 10, 'machine-learning', 'enable', '2024-08-26 05:04:39', '2024-08-26 05:04:39'),
(37, 10, 'ai-chatbots', 'enable', '2024-08-26 05:04:48', '2024-08-26 05:04:48'),
(38, 10, 'natural-language-processing', 'enable', '2024-08-26 05:05:03', '2024-08-26 05:05:03'),
(39, 10, 'predictive-analytics', 'enable', '2024-08-26 05:05:14', '2024-08-26 05:05:14'),
(40, 10, 'computer-vision', 'enable', '2024-08-26 05:05:23', '2024-08-26 05:05:23'),
(41, 7, 'portrait-photography', 'enable', '2024-08-26 05:06:09', '2024-08-26 05:06:09'),
(42, 7, 'event-photography', 'enable', '2024-08-26 05:06:20', '2024-08-26 05:06:20'),
(43, 7, 'product-photography', 'enable', '2024-08-26 05:06:30', '2024-08-26 05:06:30'),
(44, 7, 'photo-editing', 'enable', '2024-08-26 05:06:38', '2024-08-26 05:06:38'),
(45, 7, 'stock-photography', 'enable', '2024-08-26 05:06:49', '2024-08-26 05:06:49'),
(46, 4, '2d-animation', 'enable', '2024-08-26 05:07:03', '2024-08-26 05:07:03'),
(47, 4, '3d-animation', 'enable', '2024-08-26 05:07:13', '2024-08-26 05:07:13'),
(48, 4, 'motion-graphics', 'enable', '2024-08-26 05:07:24', '2024-08-26 05:07:24'),
(49, 4, 'whiteboard-animation', 'enable', '2024-08-26 05:07:35', '2024-08-26 05:07:35'),
(50, 4, 'character-animation', 'enable', '2024-08-26 05:07:46', '2024-08-26 05:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_translates`
--

CREATE TABLE `sub_category_translates` (
  `id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category_translates`
--

INSERT INTO `sub_category_translates` (`id`, `subcategory_id`, `lang_code`, `name`, `created_at`, `updated_at`) VALUES
(13, 11, 'en', 'Logo Design', '2024-08-26 04:50:41', '2024-08-26 04:50:41'),
(14, 11, 'hd', 'Logo Design', '2024-08-26 04:50:41', '2024-08-26 04:50:41'),
(15, 12, 'en', 'Brand Style Guides', '2024-08-26 04:50:54', '2024-08-26 04:50:54'),
(16, 12, 'hd', 'Brand Style Guides', '2024-08-26 04:50:54', '2024-08-26 04:50:54'),
(17, 13, 'en', 'Business Cards & Stationery', '2024-08-26 04:51:06', '2024-08-26 04:51:06'),
(18, 13, 'hd', 'Business Cards & Stationery', '2024-08-26 04:51:06', '2024-08-26 04:51:06'),
(19, 14, 'en', 'Fonts & Typography', '2024-08-26 04:51:18', '2024-08-26 04:51:18'),
(20, 14, 'hd', 'Fonts & Typography', '2024-08-26 04:51:18', '2024-08-26 04:51:18'),
(21, 15, 'en', 'Illustration', '2024-08-26 04:51:31', '2024-08-26 04:51:31'),
(22, 15, 'hd', 'Illustration', '2024-08-26 04:51:31', '2024-08-26 04:51:31'),
(23, 16, 'en', 'Frontend Development', '2024-08-26 04:53:38', '2024-08-26 04:53:38'),
(24, 16, 'hd', 'Frontend Development', '2024-08-26 04:53:38', '2024-08-26 04:53:38'),
(25, 17, 'en', 'Backend Development', '2024-08-26 04:53:49', '2024-08-26 04:53:49'),
(26, 17, 'hd', 'Backend Development', '2024-08-26 04:53:49', '2024-08-26 04:53:49'),
(27, 18, 'en', 'Full-Stack Development', '2024-08-26 04:54:01', '2024-08-26 04:54:01'),
(28, 18, 'hd', 'Full-Stack Development', '2024-08-26 04:54:01', '2024-08-26 04:54:01'),
(29, 19, 'en', 'Web & Mobile Design', '2024-08-26 04:54:12', '2024-08-26 04:54:12'),
(30, 19, 'hd', 'Web & Mobile Design', '2024-08-26 04:54:12', '2024-08-26 04:54:12'),
(31, 20, 'en', 'CMS Development (e.g., WordPress, Joomla)', '2024-08-26 04:54:21', '2024-08-26 04:54:21'),
(32, 20, 'hd', 'CMS Development (e.g., WordPress, Joomla)', '2024-08-26 04:54:21', '2024-08-26 04:54:21'),
(33, 21, 'en', 'Social Media Marketing', '2024-08-26 04:54:40', '2024-08-26 04:54:40'),
(34, 21, 'hd', 'Social Media Marketing', '2024-08-26 04:54:40', '2024-08-26 04:54:40'),
(35, 22, 'en', 'SEO Optimization', '2024-08-26 04:54:52', '2024-08-26 04:54:52'),
(36, 22, 'hd', 'SEO Optimization', '2024-08-26 04:54:52', '2024-08-26 04:54:52'),
(37, 23, 'en', 'Content Marketing', '2024-08-26 04:55:01', '2024-08-26 04:55:01'),
(38, 23, 'hd', 'Content Marketing', '2024-08-26 04:55:01', '2024-08-26 04:55:01'),
(39, 24, 'en', 'Email Marketing', '2024-08-26 04:55:13', '2024-08-26 04:55:13'),
(40, 24, 'hd', 'Email Marketing', '2024-08-26 04:55:13', '2024-08-26 04:55:13'),
(41, 25, 'en', 'Paid Advertising (e.g., Google Ads, Facebook Ads)', '2024-08-26 04:55:24', '2024-08-26 04:55:24'),
(42, 25, 'hd', 'Paid Advertising (e.g., Google Ads, Facebook Ads)', '2024-08-26 04:55:24', '2024-08-26 04:55:24'),
(43, 26, 'en', 'Residential Design', '2024-08-26 05:02:47', '2024-08-26 05:02:47'),
(44, 26, 'hd', 'Residential Design', '2024-08-26 05:02:47', '2024-08-26 05:02:47'),
(45, 27, 'en', 'Commercial Design', '2024-08-26 05:03:04', '2024-08-26 05:03:04'),
(46, 27, 'hd', 'Commercial Design', '2024-08-26 05:03:04', '2024-08-26 05:03:04'),
(47, 28, 'en', 'Landscape Architecture', '2024-08-26 05:03:14', '2024-08-26 05:03:14'),
(48, 28, 'hd', 'Landscape Architecture', '2024-08-26 05:03:14', '2024-08-26 05:03:14'),
(49, 29, 'en', 'Interior Design', '2024-08-26 05:03:24', '2024-08-26 05:03:24'),
(50, 29, 'hd', 'Interior Design', '2024-08-26 05:03:24', '2024-08-26 05:03:24'),
(51, 30, 'en', 'Urban Planning', '2024-08-26 05:03:34', '2024-08-26 05:03:34'),
(52, 30, 'hd', 'Urban Planning', '2024-08-26 05:03:34', '2024-08-26 05:03:34'),
(53, 31, 'en', 'X/UI Design', '2024-08-26 05:03:53', '2024-08-26 05:03:53'),
(54, 31, 'hd', 'X/UI Design', '2024-08-26 05:03:53', '2024-08-26 05:03:53'),
(55, 32, 'en', 'Responsive Design', '2024-08-26 05:04:02', '2024-08-26 05:04:02'),
(56, 32, 'hd', 'Responsive Design', '2024-08-26 05:04:02', '2024-08-26 05:04:02'),
(57, 33, 'en', 'WordPress Design', '2024-08-26 05:04:10', '2024-08-26 05:04:10'),
(58, 33, 'hd', 'WordPress Design', '2024-08-26 05:04:10', '2024-08-26 05:04:10'),
(59, 34, 'en', 'eCommerce Design', '2024-08-26 05:04:20', '2024-08-26 05:04:20'),
(60, 34, 'hd', 'eCommerce Design', '2024-08-26 05:04:20', '2024-08-26 05:04:20'),
(61, 35, 'en', 'Landing Page Design', '2024-08-26 05:04:29', '2024-08-26 05:04:29'),
(62, 35, 'hd', 'Landing Page Design', '2024-08-26 05:04:29', '2024-08-26 05:04:29'),
(63, 36, 'en', 'Machine Learning', '2024-08-26 05:04:39', '2024-08-26 05:04:39'),
(64, 36, 'hd', 'Machine Learning', '2024-08-26 05:04:39', '2024-08-26 05:04:39'),
(65, 37, 'en', 'AI Chatbots', '2024-08-26 05:04:48', '2024-08-26 05:04:48'),
(66, 37, 'hd', 'AI Chatbots', '2024-08-26 05:04:48', '2024-08-26 05:04:48'),
(67, 38, 'en', 'Natural Language Processing', '2024-08-26 05:05:03', '2024-08-26 05:05:03'),
(68, 38, 'hd', 'Natural Language Processing', '2024-08-26 05:05:03', '2024-08-26 05:05:03'),
(69, 39, 'en', 'Predictive Analytics', '2024-08-26 05:05:14', '2024-08-26 05:05:14'),
(70, 39, 'hd', 'Predictive Analytics', '2024-08-26 05:05:14', '2024-08-26 05:05:14'),
(71, 40, 'en', 'Computer Vision', '2024-08-26 05:05:23', '2024-08-26 05:05:23'),
(72, 40, 'hd', 'Computer Vision', '2024-08-26 05:05:23', '2024-08-26 05:05:23'),
(73, 41, 'en', 'Portrait Photography', '2024-08-26 05:06:09', '2024-08-26 05:06:09'),
(74, 41, 'hd', 'Portrait Photography', '2024-08-26 05:06:09', '2024-08-26 05:06:09'),
(75, 42, 'en', 'Event Photography', '2024-08-26 05:06:20', '2024-08-26 05:06:20'),
(76, 42, 'hd', 'Event Photography', '2024-08-26 05:06:20', '2024-08-26 05:06:20'),
(77, 43, 'en', 'Product Photography', '2024-08-26 05:06:30', '2024-08-26 05:06:30'),
(78, 43, 'hd', 'Product Photography', '2024-08-26 05:06:30', '2024-08-26 05:06:30'),
(79, 44, 'en', 'Photo Editing', '2024-08-26 05:06:38', '2024-08-26 05:06:38'),
(80, 44, 'hd', 'Photo Editing', '2024-08-26 05:06:38', '2024-08-26 05:06:38'),
(81, 45, 'en', 'Stock Photography', '2024-08-26 05:06:49', '2024-08-26 05:06:49'),
(82, 45, 'hd', 'Stock Photography', '2024-08-26 05:06:49', '2024-08-26 05:06:49'),
(83, 46, 'en', '2D Animation', '2024-08-26 05:07:03', '2024-08-26 05:07:03'),
(84, 46, 'hd', '2D Animation', '2024-08-26 05:07:03', '2024-08-26 05:07:03'),
(85, 47, 'en', '3D Animation', '2024-08-26 05:07:13', '2024-08-26 05:07:13'),
(86, 47, 'hd', '3D Animation', '2024-08-26 05:07:13', '2024-08-26 05:07:13'),
(87, 48, 'en', 'Motion Graphics', '2024-08-26 05:07:24', '2024-08-26 05:07:24'),
(88, 48, 'hd', 'Motion Graphics', '2024-08-26 05:07:24', '2024-08-26 05:07:24'),
(89, 49, 'en', 'Whiteboard Animation', '2024-08-26 05:07:35', '2024-08-26 05:07:35'),
(90, 49, 'hd', 'Whiteboard Animation', '2024-08-26 05:07:35', '2024-08-26 05:07:35'),
(91, 50, 'en', 'Character Animation', '2024-08-26 05:07:46', '2024-08-26 05:07:46'),
(92, 50, 'hd', 'Character Animation', '2024-08-26 05:07:46', '2024-08-26 05:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `slug`, `image`, `mail`, `phone_number`, `facebook`, `twitter`, `linkedin`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'mahe-karim', 'uploads/custom-images/team-2025-01-07-12-33-17-8147.webp', 'mahe@grasshopper.digital', '1303062727', 'https://www.facebook.com', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://www.instagram.com', '2025-01-06 13:40:23', '2025-01-07 06:33:17'),
(2, 'rashed-karim', 'uploads/custom-images/team-2025-01-07-12-29-07-4685.webp', 'rashed@mail.com', '01303062727', 'https://www.facebook.com', 'https://www.facebook.com', 'https://www.linkedin.com', 'https://www.instagram.com', '2025-01-07 06:05:54', '2025-01-07 06:29:07'),
(3, 'mark-mahi', 'uploads/custom-images/team-2025-01-07-12-27-37-4366.webp', 'mail@mail.com', '+1 (344) 722-7403', 'https://www.facebook.com', 'https://www.facebook.com', 'https://www.facebook.com', 'https://www.facebook.com', '2025-01-07 06:27:37', '2025-01-07 06:27:37'),
(4, 'maetho-mahi', 'uploads/custom-images/team-2025-01-07-12-31-24-8319.webp', 'software@deligram.com', '0130306272727', 'https://www.fb.com/MaheKarim', 'https://www.fb.com/MaheKarim', 'https://www.fb.com/MaheKarim', 'https://www.fb.com/MaheKarim', '2025-01-07 06:31:24', '2025-01-07 06:31:24'),
(5, 'michael-mahi', 'uploads/custom-images/team-2025-01-07-12-38-48-4993.webp', 'cmo@cmo.com', '01303062727', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.facebook.com', 'https://www.facebook.com', '2025-01-07 06:38:49', '2025-01-07 06:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `team_translations`
--

CREATE TABLE `team_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` int NOT NULL,
  `lang_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_translations`
--

INSERT INTO `team_translations` (`id`, `team_id`, `lang_code`, `name`, `description`, `designation`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Mahe Karim', '<p>Mahe Karim is a software developer and lifestyle photographer based in Dhaka, Bangladesh. He specializes in building innovative SaaS, AI, and ETL solutions aimed at driving business transformation. As the founder of two agencies&mdash;GrassHopper Digital and OnDemand Agency&mdash;he focuses on delivering tailored tech solutions, ranging from web development to AI-driven applications.</p>\r\n<p>Beyond his professional endeavors, Mahe is passionate about photography and coffee. As a lifestyle photographer, he enjoys capturing moments that tell stories, blending creativity with technical expertise. Additionally, he is a self-proclaimed coffee enthusiast, exploring new flavors and sharing his reviews with fellow coffee lovers.Mahe is active on social media platforms, including X (formerly Twitter) and Facebook, where he shares insights into his work and personal interests.</p>\r\n<p>In addition to his technical and creative pursuits, Mahe contributes to discussions on socio-political issues in Bangladesh, as evidenced by his writings on platforms like Medium.</p>', 'Product Manager', '2025-01-06 13:40:23', '2025-01-07 04:59:44'),
(2, 1, 'hd', 'Mahe Karim Hindi', '<p>Mahe Karim is a software developer and lifestyle photographer based in Dhaka, Bangladesh. He specializes in building innovative SaaS, AI, and ETL solutions aimed at driving business transformation. As the founder of two agencies&mdash;GrassHopper Digital and OnDemand Agency&mdash;he focuses on delivering tailored tech solutions, ranging from web development to AI-driven applications.</p>\r\n<p>Beyond his professional endeavors, Mahe is passionate about photography and coffee. As a lifestyle photographer, he enjoys capturing moments that tell stories, blending creativity with technical expertise. Additionally, he is a self-proclaimed coffee enthusiast, exploring new flavors and sharing his reviews with fellow coffee lovers.Mahe is active on social media platforms, including X (formerly Twitter) and Facebook, where he shares insights into his work and personal interests.</p>\r\n<p>&nbsp;</p>', 'Product Manager', '2025-01-06 13:40:23', '2025-01-07 04:56:35'),
(3, 2, 'en', 'Rashed Karim', '<p>Mahe Karim is a software developer and lifestyle photographer based in Dhaka, Bangladesh. He specializes in building innovative SaaS, AI, and ETL solutions aimed at driving business transformation. As the founder of two agencies&mdash;GrassHopper Digital and OnDemand Agency&mdash;he focuses on delivering tailored tech solutions, ranging from web development to AI-driven applications.</p>', 'Team Lead, AI & NLP Integrate', '2025-01-07 06:05:54', '2025-01-07 06:05:54'),
(4, 2, 'hd', 'Rashed Karim', '<p>Mahe Karim is a software developer and lifestyle photographer based in Dhaka, Bangladesh. He specializes in building innovative SaaS, AI, and ETL solutions aimed at driving business transformation. As the founder of two agencies&mdash;GrassHopper Digital and OnDemand Agency&mdash;he focuses on delivering tailored tech solutions, ranging from web development to AI-driven applications.</p>', 'Team Lead, AI & NLP Integrate', '2025-01-07 06:05:54', '2025-01-07 06:05:54'),
(5, 3, 'en', 'Mark Mahi', '<p><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3\">A Coffeeholic </span><img class=\"r-4qtqp9 r-dflpy8 r-k4bwe5 r-1kpi4qh r-pp5qcn r-h9hxbl\" draggable=\"false\" src=\"https://abs-0.twimg.com/emoji/v2/svg/2615.svg\" alt=\"☕\"><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3\"> Software Dev &amp; IndieHacker. Building </span><span class=\"r-18u37iz\"><a class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-1loqt21\" dir=\"ltr\" role=\"link\" href=\"https://mobile.x.com/search?q=%23buildinpublic&amp;src=hashtag_click\">#buildinpublic</a></span><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3\"> &bull; Agency - </span><a class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-1loqt21\" dir=\"ltr\" role=\"link\" href=\"https://t.co/gnl4zZP8Fy\" target=\"_blank\" rel=\"noopener noreferrer nofollow\"><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-qlhcfr r-qvk6io\" aria-hidden=\"true\">https://</span>ondemand.agency</a> <img class=\"r-4qtqp9 r-dflpy8 r-k4bwe5 r-1kpi4qh r-pp5qcn r-h9hxbl\" draggable=\"false\" src=\"https://abs-0.twimg.com/emoji/v2/svg/1f680.svg\" alt=\"🚀\"><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3\"> &bull; AI Writter - </span><a class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-1loqt21\" dir=\"ltr\" role=\"link\" href=\"https://t.co/YxJThc9Bve\" target=\"_blank\" rel=\"noopener noreferrer nofollow\"><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-qlhcfr r-qvk6io\" aria-hidden=\"true\">https://</span>mediumlisty.com</a></p>', 'Security Analyst', '2025-01-07 06:27:37', '2025-01-07 06:27:37'),
(6, 3, 'hd', 'Mark Mahi', '<p><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3\">A Coffeeholic </span><img class=\"r-4qtqp9 r-dflpy8 r-k4bwe5 r-1kpi4qh r-pp5qcn r-h9hxbl\" draggable=\"false\" src=\"https://abs-0.twimg.com/emoji/v2/svg/2615.svg\" alt=\"☕\"><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3\"> Software Dev &amp; IndieHacker. Building </span><span class=\"r-18u37iz\"><a class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-1loqt21\" dir=\"ltr\" role=\"link\" href=\"https://mobile.x.com/search?q=%23buildinpublic&amp;src=hashtag_click\">#buildinpublic</a></span><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3\"> &bull; Agency - </span><a class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-1loqt21\" dir=\"ltr\" role=\"link\" href=\"https://t.co/gnl4zZP8Fy\" target=\"_blank\" rel=\"noopener noreferrer nofollow\"><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-qlhcfr r-qvk6io\" aria-hidden=\"true\">https://</span>ondemand.agency</a> <img class=\"r-4qtqp9 r-dflpy8 r-k4bwe5 r-1kpi4qh r-pp5qcn r-h9hxbl\" draggable=\"false\" src=\"https://abs-0.twimg.com/emoji/v2/svg/1f680.svg\" alt=\"🚀\"><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3\"> &bull; AI Writter - </span><a class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-1loqt21\" dir=\"ltr\" role=\"link\" href=\"https://t.co/YxJThc9Bve\" target=\"_blank\" rel=\"noopener noreferrer nofollow\"><span class=\"css-1jxf684 r-bcqeeo r-1ttztb7 r-qvutc0 r-poiln3 r-qlhcfr r-qvk6io\" aria-hidden=\"true\">https://</span>mediumlisty.com</a></p>', 'Security Analyst', '2025-01-07 06:27:37', '2025-01-07 06:27:37'),
(7, 4, 'en', 'Maetho Mahi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Software Developer', '2025-01-07 06:31:24', '2025-01-07 06:31:24'),
(8, 4, 'hd', 'Maetho Mahi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Software Developer', '2025-01-07 06:31:24', '2025-01-07 06:31:24'),
(9, 5, 'en', 'Michael Mahi', '<p>Mahe Karim is a software developer and lifestyle photographer based in Dhaka, Bangladesh. He specializes in building innovative SaaS, AI, and ETL solutions aimed at driving business transformation. As the founder of two agencies&mdash;GrassHopper Digital and OnDemand Agency&mdash;he focuses on delivering tailored tech solutions, ranging from web development to AI-driven applications.</p>', 'CMO', '2025-01-07 06:38:49', '2025-01-07 06:38:49'),
(10, 5, 'hd', 'Michael Mahi', '<p>Mahe Karim is a software developer and lifestyle photographer based in Dhaka, Bangladesh. He specializes in building innovative SaaS, AI, and ETL solutions aimed at driving business transformation. As the founder of two agencies&mdash;GrassHopper Digital and OnDemand Agency&mdash;he focuses on delivering tailored tech solutions, ranging from web development to AI-driven applications.</p>', 'CMO', '2025-01-07 06:38:49', '2025-01-07 06:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `term_and_conditions`
--

CREATE TABLE `term_and_conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_and_conditions`
--

INSERT INTO `term_and_conditions` (`id`, `lang_code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'en', '<h4>01.Introduction</h4>\r\n<p>A Privacy Policy is a legal document that informs users about the data collected, how it\'s used, and how it\'s protected. It typically includes information about the type of personal our ainformation collected (such as names, email addresses, etc.), the purpose of collection, and whether the information is shared with third parties. It outlines the rights of users regarding their data, such as the right to access, correct, or delete their information.</p>\r\n<h4>02. Workzone Terms of Service</h4>\r\n<p>Terms of Service (also known as Terms and Conditions or Terms of Use) set the rules and guidelines for using a particular service or platform. They establish the contractual relationship between the user and the service provider. They often include details about user behavior, content usage policies, disclaimers, limitations of liability, and procedures for dispute resolution.Users typically agree to these terms by using the service.When you visit a website or use an online service, you are usually asked to agree to both the Privacy Policy and the Terms of Service. These documents are crucial for transparency, legal compliance, and establishing the terms under which users can access and use the service.</p>\r\n<p>It\'s important for businesses and service providers to keep these documents up-to-date and easily accessible to users. If you have specific questions or concerns about privacy policies or terms of service, feel free to provide more details, and I\'ll do my best to assist you.</p>\r\n<h4>3. Protect Your Property</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown as printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining as essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<h4>4. What to Include in Terms and Conditions for Limitations of Liability</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic ki typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>ive centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset as sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type our as specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas Ipsum to make a type specimen book.</p>\r\n<h4>05.Pricing and Payment Policy</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic as typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen our as book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', NULL, '2024-07-12 08:57:41'),
(19, 'hd', '<h4>01.Introduction</h4>\r\n<p>A Privacy Policy is a legal document that informs users about the data collected, how it\'s used, and how it\'s protected. It typically includes information about the type of personal our ainformation collected (such as names, email addresses, etc.), the purpose of collection, and whether the information is shared with third parties. It outlines the rights of users regarding their data, such as the right to access, correct, or delete their information.</p>\r\n<h4>02.Freelance Terms of Service (Privacy and Policy)</h4>\r\n<p>Terms of Service (also known as Terms and Conditions or Terms of Use) set the rules and guidelines for using a particular service or platform. They establish the contractual relationship between the user and the service provider. They often include details about user behavior, content usage policies, disclaimers, limitations of liability, and procedures for dispute resolution.Users typically agree to these terms by using the service.When you visit a website or use an online service, you are usually asked to agree to both the Privacy Policy and the Terms of Service. These documents are crucial for transparency, legal compliance, and establishing the terms under which users can access and use the service.</p>\r\n<p>It\'s important for businesses and service providers to keep these documents up-to-date and easily accessible to users. If you have specific questions or concerns about privacy policies or terms of service, feel free to provide more details, and I\'ll do my best to assist you.</p>\r\n<h4>3. Protect Your Property</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown as printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining as essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<h4>4. What to Include in Terms and Conditions for Limitations of Liability</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic ki typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>ive centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset as sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type our as specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas Ipsum to make a type specimen book.</p>\r\n<h4>05.Pricing and Payment Policy</h4>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the as 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic as typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen our as book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2024-07-10 05:34:58', '2024-07-10 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `logo`, `image`, `status`, `created_at`, `updated_at`, `rating`) VALUES
(1, NULL, NULL, 'active', '2024-12-28 10:25:26', '2024-12-28 10:48:59', 5),
(2, NULL, NULL, 'active', '2024-12-28 10:58:11', '2024-12-28 10:58:11', 4);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_trasnlations`
--

CREATE TABLE `testimonial_trasnlations` (
  `id` bigint UNSIGNED NOT NULL,
  `testimonial_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_trasnlations`
--

INSERT INTO `testimonial_trasnlations` (`id`, `testimonial_id`, `lang_code`, `name`, `designation`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'John Max', 'Daman+', 'Sylhet rocks , Beder meye josna amay kotha diyeche , asi si bnole kosnma dkal  SOUEWXJW   ASI ASI NBOLLE KOSMNA FAAK DIUECJE', '2024-12-28 10:25:26', '2024-12-28 10:25:26'),
(2, 1, 'hd', 'John Max', 'Daman+', 'Sylhet rocks , Beder meye josna amay kotha diyeche , asi si bnole kosnma dkal  SOUEWXJW   ASI ASI NBOLLE KOSMNA FAAK DIUECJE', '2024-12-28 10:25:26', '2024-12-28 10:25:26'),
(3, 2, 'en', 'Ami Na Tahkle', 'Product Manager', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', '2024-12-28 10:58:11', '2024-12-28 10:58:11'),
(4, 2, 'hd', 'Ami Na Tahkle', 'Product Manager', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.', '2024-12-28 10:58:11', '2024-12-28 10:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kyc_status` int DEFAULT '0',
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hourly_payment` decimal(8,2) NOT NULL DEFAULT '0.00',
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_top_seller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `is_banned` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `is_seller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `about_me` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_time_period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_time_period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `verification_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_password_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feez_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `online_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `online` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `kyc_status`, `phone`, `address`, `gender`, `image`, `hourly_payment`, `designation`, `is_top_seller`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `is_banned`, `is_seller`, `about_me`, `language`, `university_name`, `university_location`, `university_time_period`, `school_name`, `school_location`, `school_time_period`, `skills`, `verification_token`, `provider`, `provider_id`, `forget_password_token`, `feez_status`, `online_status`, `online`) VALUES
(1, 'John Doe', 'john-doe-20240710113541', 'buyer@gmail.com', 0, '125-985-4587', 'Los Angeles, CA, USA', 'Male', 'uploads/custom-images/john-doe-2024-07-10-04-01-57-4496.png', '0.00', 'Web Developer', 'disable', '2024-07-10 05:35:57', '$2y$10$hPSxen6nSk7nTL6s8hxoFe3rZXYjLmU/UfjjJWLxVo1Jig30oi0Hu', NULL, '2024-07-10 05:35:41', '2024-07-10 10:04:36', 'enable', 'no', '0', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;},{&quot;value&quot;:&quot;Bangla&quot;},{&quot;value&quot;:&quot;Hindi&quot;},{&quot;value&quot;:&quot;Spanish&quot;}]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 0),
(3, 'David Richard', 'david-richard-20240710113753', 'seller@gmail.com', 1, '125-985-4587', 'Dhaka, Bangladesh', 'Male', 'uploads/custom-images/david-richard-2024-07-10-11-40-49-2937.png', '10.00', 'Laravel Developer', 'enable', '2024-07-10 05:38:03', '$2y$10$6d8wpHW7Yg9jl/3q65kzxuv5SbQz2aZ/VOZLUFyIFda6/oTrR5jWu', 'K2agyG2bHLnVgew5zP2sfmmn3CLwpGJDCKRurWdLAx5MsM8kRfdZV4x8AidN', '2024-07-10 05:37:53', '2024-08-29 08:39:51', 'enable', 'no', '1', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;}]', 'North South University', 'Aperiam deserunt dol, Burundi', '2015 - 2020', 'Independent University BD', 'Aperiam deserunt dol, Burundi', '2020-2024', '[{&quot;value&quot;:&quot;Php&quot;},{&quot;value&quot;:&quot;Laravel&quot;},{&quot;value&quot;:&quot;Html&quot;},{&quot;value&quot;:&quot;Css&quot;},{&quot;value&quot;:&quot;Javascript&quot;}]', NULL, NULL, NULL, NULL, '0', '1', 1),
(4, 'David Simmonsss', 'david-simmons-20240710113753', 'seller2@gmail.com', 1, '125-985-4587', 'Dhaka, Bangladesh', 'Male', 'uploads/custom-images/david-simmonsss-2024-07-10-11-42-35-3948.png', '10.00', 'Laravel Developer', 'enable', '2024-07-10 05:38:03', '$2y$10$6d8wpHW7Yg9jl/3q65kzxuv5SbQz2aZ/VOZLUFyIFda6/oTrR5jWu', NULL, '2024-07-10 05:37:53', '2024-08-29 08:09:42', 'enable', 'no', '1', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;},{&quot;value&quot;:&quot;Arabic&quot;},{&quot;value&quot;:&quot;Hindi&quot;},{&quot;value&quot;:&quot;Bangla&quot;},{&quot;value&quot;:&quot;Spanish&quot;}]', 'North South University', 'Aperiam deserunt dol, Burundi', '2015 - 2020', 'Independent University BD', 'Aperiam deserunt dol, Burundi', '2020-2024', '[{&quot;value&quot;:&quot;Php&quot;},{&quot;value&quot;:&quot;Laravel&quot;},{&quot;value&quot;:&quot;Html&quot;},{&quot;value&quot;:&quot;Css&quot;},{&quot;value&quot;:&quot;Javascript&quot;}]', NULL, NULL, NULL, NULL, '0', '1', 0),
(5, 'Naymr Jhon', 'naymr-jhon-20240710113753', 'seller3@gmail.com', 0, '125-985-4587', 'Dhaka, Bangladesh', 'Male', 'uploads/custom-images/naymr-jhon-2024-07-10-11-43-55-9474.png', '15.00', 'Graphic Designer', 'enable', '2024-07-10 05:38:03', '$2y$10$6d8wpHW7Yg9jl/3q65kzxuv5SbQz2aZ/VOZLUFyIFda6/oTrR5jWu', NULL, '2024-07-10 05:37:53', '2024-07-10 05:43:55', 'enable', 'no', '1', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;},{&quot;value&quot;:&quot;Arabic&quot;},{&quot;value&quot;:&quot;Hindi&quot;},{&quot;value&quot;:&quot;Bangla&quot;},{&quot;value&quot;:&quot;Spanish&quot;}]', 'North South University', 'Aperiam deserunt dol, Burundi', '2015 - 2020', 'Independent University BD', 'Aperiam deserunt dol, Burundi', '2020-2024', '[{&quot;value&quot;:&quot;Php&quot;},{&quot;value&quot;:&quot;Laravel&quot;},{&quot;value&quot;:&quot;Html&quot;},{&quot;value&quot;:&quot;Css&quot;},{&quot;value&quot;:&quot;Javascript&quot;}]', NULL, NULL, NULL, NULL, '0', '0', 0),
(6, 'Madge Jordan', 'madge-jordan-20240710113753', 'seller4@gmail.com', 0, '125-985-4587', 'Dhaka, Bangladesh', 'Male', 'uploads/custom-images/madge-jordan-2024-07-10-11-45-29-6149.png', '20.00', 'Graphic Designer', 'enable', '2024-07-10 05:38:03', '$2y$10$6d8wpHW7Yg9jl/3q65kzxuv5SbQz2aZ/VOZLUFyIFda6/oTrR5jWu', NULL, '2024-07-10 05:37:53', '2024-07-10 05:45:29', 'enable', 'no', '1', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;},{&quot;value&quot;:&quot;Arabic&quot;},{&quot;value&quot;:&quot;Hindi&quot;},{&quot;value&quot;:&quot;Bangla&quot;},{&quot;value&quot;:&quot;Spanish&quot;}]', 'North South University', 'Aperiam deserunt dol, Burundi', '2015 - 2020', 'Independent University BD', 'Aperiam deserunt dol, Burundi', '2020-2024', '[{&quot;value&quot;:&quot;Php&quot;},{&quot;value&quot;:&quot;Laravel&quot;},{&quot;value&quot;:&quot;Html&quot;},{&quot;value&quot;:&quot;Css&quot;},{&quot;value&quot;:&quot;Javascript&quot;}]', NULL, NULL, NULL, NULL, '0', '0', 0),
(7, 'David Miller', 'david-miller-20240710113753', 'seller5@gmail.com', 0, '125-985-4587', 'Dhaka, Bangladesh', 'Male', 'uploads/custom-images/david-miller-2024-07-10-11-47-42-9536.png', '25.00', 'Web Designer', 'enable', '2024-07-10 05:38:03', '$2y$10$6d8wpHW7Yg9jl/3q65kzxuv5SbQz2aZ/VOZLUFyIFda6/oTrR5jWu', NULL, '2024-07-10 05:37:53', '2024-07-10 05:47:42', 'enable', 'no', '1', 'There are many variations of passages of Lorem Ipsum our a available, but the majority have oneks suffered alteration in some form, ki by injected humour, or randomised tomar a words which don&#039;t look even slightly believable. If you are going to use a valas passage of Lorem Ipsum, you need.Fusce eget pulvinar tor tor. Quisque suscipit ante ac nisi a rutrumnec mollis nulla.', '[{&quot;value&quot;:&quot;English&quot;},{&quot;value&quot;:&quot;Arabic&quot;},{&quot;value&quot;:&quot;Hindi&quot;},{&quot;value&quot;:&quot;Bangla&quot;},{&quot;value&quot;:&quot;Spanish&quot;}]', 'North South University', 'Aperiam deserunt dol, Burundi', '2015 - 2020', 'Independent University BD', 'Aperiam deserunt dol, Burundi', '2020-2024', '[{&quot;value&quot;:&quot;Php&quot;},{&quot;value&quot;:&quot;Laravel&quot;},{&quot;value&quot;:&quot;Html&quot;},{&quot;value&quot;:&quot;Css&quot;},{&quot;value&quot;:&quot;Javascript&quot;}]', NULL, NULL, NULL, NULL, '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `buyer_id` int NOT NULL,
  `balance` decimal(8,2) DEFAULT '0.00',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `buyer_id`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '264.00', 'active', '2024-07-26 07:10:15', '2024-07-30 02:16:36'),
(2, 3, '0.00', 'active', '2024-07-30 02:40:53', '2024-07-30 02:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `buyer_id` int NOT NULL,
  `amount` decimal(8,2) DEFAULT '0.00',
  `payment_gateway` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'credit',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'success',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`id`, `buyer_id`, `amount`, `payment_gateway`, `transaction_id`, `payment_status`, `payment_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '20.00', 'Stripe', 'txn_3PgiKnF56Pb8BOOX1Z3Cx1F7', 'success', 'credit', NULL, 'success', '2024-07-26 07:13:04', '2024-07-26 07:13:04'),
(2, 1, '25.00', 'Paypal', 'ZUJKUEUDELUGE', 'success', 'credit', NULL, 'success', '2024-07-26 07:13:35', '2024-07-26 07:13:35'),
(3, 1, '60.00', 'Mollie', 'tr_uFXZkrJmaB', 'success', 'credit', NULL, 'success', '2024-07-26 08:46:07', '2024-07-26 08:46:07'),
(4, 1, '20.00', 'Stripe', 'txn_3PgjnHF56Pb8BOOX0UIM554V', 'success', 'credit', NULL, 'success', '2024-07-26 08:46:34', '2024-07-26 08:46:34'),
(5, 1, '20.00', 'Paypal', 'ZUJKUEUDELUGE', 'success', 'credit', NULL, 'success', '2024-07-26 08:48:21', '2024-07-26 08:48:21'),
(6, 1, '20.00', 'Razorpay', 'pay_OdCV21UF8xttCi', 'success', 'credit', NULL, 'success', '2024-07-26 08:49:37', '2024-07-26 08:49:37'),
(7, 1, '99.00', 'Refund amount', 'from_refund', 'success', 'credit', NULL, 'success', '2024-07-30 02:16:36', '2024-07-30 02:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `item_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-07-15 09:27:46', '2024-07-15 09:27:46'),
(2, 3, 1, '2024-07-15 09:27:48', '2024-07-15 09:27:48'),
(3, 5, 1, '2024-07-15 09:27:49', '2024-07-15 09:27:49'),
(4, 6, 1, '2024-07-15 09:27:51', '2024-07-15 09:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `method_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `max_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `withdraw_charge` decimal(8,2) NOT NULL DEFAULT '0.00',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `method_name`, `min_amount`, `max_amount`, `withdraw_charge`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank Payment', '1.00', '10.00', '0.50', '<p>Bank Name: Your bank name<br>Account Number: &nbsp;Your bank account number<br>Routing Number: Your bank routing number<br>Branch: Your bank branch name</p>', 'enable', '2024-07-15 09:23:29', '2024-07-15 09:23:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_translations`
--
ALTER TABLE `blog_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_translations`
--
ALTER TABLE `contact_us_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_page_translations`
--
ALTER TABLE `custom_page_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_translations`
--
ALTER TABLE `faq_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_translations`
--
ALTER TABLE `footer_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_settings`
--
ALTER TABLE `global_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepages`
--
ALTER TABLE `homepages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_translations`
--
ALTER TABLE `homepage_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post_translations`
--
ALTER TABLE `job_post_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_requests`
--
ALTER TABLE `job_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_information`
--
ALTER TABLE `kyc_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_types`
--
ALTER TABLE `kyc_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_galleries`
--
ALTER TABLE `listing_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_translations`
--
ALTER TABLE `listing_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_galleries`
--
ALTER TABLE `project_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_translations`
--
ALTER TABLE `project_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund_requests`
--
ALTER TABLE `refund_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_withdraws`
--
ALTER TABLE `seller_withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_histories`
--
ALTER TABLE `subscription_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`);

--
-- Indexes for table `sub_category_translates`
--
ALTER TABLE `sub_category_translates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_slug_unique` (`slug`);

--
-- Indexes for table `team_translations`
--
ALTER TABLE `team_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_and_conditions`
--
ALTER TABLE `term_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_trasnlations`
--
ALTER TABLE `testimonial_trasnlations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_translations`
--
ALTER TABLE `blog_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_translations`
--
ALTER TABLE `contact_us_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_page_translations`
--
ALTER TABLE `custom_page_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq_translations`
--
ALTER TABLE `faq_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_translations`
--
ALTER TABLE `footer_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `global_settings`
--
ALTER TABLE `global_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `homepages`
--
ALTER TABLE `homepages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage_translations`
--
ALTER TABLE `homepage_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_post_translations`
--
ALTER TABLE `job_post_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `job_requests`
--
ALTER TABLE `job_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kyc_information`
--
ALTER TABLE `kyc_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kyc_types`
--
ALTER TABLE `kyc_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `listing_galleries`
--
ALTER TABLE `listing_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `listing_translations`
--
ALTER TABLE `listing_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_galleries`
--
ALTER TABLE `project_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_translations`
--
ALTER TABLE `project_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `refund_requests`
--
ALTER TABLE `refund_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seller_withdraws`
--
ALTER TABLE `seller_withdraws`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription_histories`
--
ALTER TABLE `subscription_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sub_category_translates`
--
ALTER TABLE `sub_category_translates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team_translations`
--
ALTER TABLE `team_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `term_and_conditions`
--
ALTER TABLE `term_and_conditions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonial_trasnlations`
--
ALTER TABLE `testimonial_trasnlations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
