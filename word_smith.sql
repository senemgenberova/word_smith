-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 07:59 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `word_smith`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `onTop` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`, `onTop`, `created_at`, `updated_at`) VALUES
(1, 'jksdjak', 'ajdkjaksd', 1, '2018-12-20 01:44:28', '2018-12-20 01:44:28'),
(2, 'jwakldaj', 'alsdklsakdlasdkla;', 0, '2018-12-20 01:44:38', '2018-12-20 01:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'lifestyle_a', 'lifestyle-a', '2018-12-19 15:46:48', '2018-12-20 01:43:50'),
(2, 'music', 'music', '2018-12-19 16:03:20', '2018-12-19 16:03:20'),
(3, 'management', 'management', '2018-12-19 16:03:41', '2018-12-19 16:03:41'),
(4, 'self care', 'self-care', '2018-12-19 16:03:47', '2018-12-19 16:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2018_11_21_174031_create_categories_table', 1),
(11, '2018_11_21_175351_create_sliders_table', 1),
(12, '2018_11_21_194443_create_posts_table', 1),
(13, '2018_11_21_222246_create_contacts_table', 1),
(14, '2018_12_05_123553_create_abouts_table', 1),
(15, '2018_12_19_211007_create_subscribers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `description`, `image`, `post_slug`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '7 Stunning Holiday Hair Looks You Need To Recreate', 'It’s the time of year to literally light it up – and not just on the Christmas tree! Our latest obsession for adding all the glow to our face is Ofra’s Glow Up Highlighter Palette, $49. Everyone knows the Ofra highlighters are lit (Nikkie Tutorial’s fave highlighter brand), and this palette that launched a few months ago is the epitome of an essential highlighter product. Here’s why we fell for it:\r\n\r\nWhat it is: A four-pan highlighter palette with one full-sized pan of Beverly Hills – a wheel of five impossibly pretty highlighters – and three minis: Rodeo Drive, a bronzey-gold shade, Blissful, a sultry bronze, and Star Island, a warm ivory shade with golden undertones.', '2018-12-19_sample-image.jpg', '7-stunning-holiday-hair-looks-you-need-to-recreate-2', 0, '2018-12-19 16:11:10', '2018-12-19 16:11:30'),
(2, 1, 4, 'Is This The Highlighter Palette Of The Year?', 'We also love that the pans are magnetic, so you can replace shades as you need to with Ofra’s refills. It also comes with a massive glass mirror, which is perfect for when you’re on the go.\r\n\r\nWhat we didn’t like: It’s pretty damn perfect, but we struggled to get the pans out, so just be careful if you’re trying to refill these – you may need a tool to help you dig the pan out.\r\n\r\nThe palette is on the pricier side, but the quality and value for money is worth it – you’ll also probably never hit pan as you don’t have to build it up to get megawatt glow. If you’re looking for a new highlighter, you won’t be disappointed with this!\r\n\r\nTop Tips: Dip lightly!!! Try mixing up the Beverly Hills shade for the most heavenly, multi-dimensional highlighter shade. Once we’ve applied the product to the tops of the cheeks, we like to take any leftover product and dust it over the high points of our face (sometimes we get carried away and do it all over) for a seriously dewy, glowy complexion.\r\n\r\nHave you guys tried Ofra highlighters or the Ofra Glow UP Palette? Let us know in the comments below.', '2018-12-19_avian-400.jpg', 'is-this-the-highlighter-palette-of-the-year-2', 0, '2018-12-19 16:14:32', '2018-12-19 16:14:41'),
(3, 1, 1, 'Celeb MUA Sam Fine Reveals How To Get Flawless Makeup', 'You guys have probably noticed I’m just a little bit obsessed with glitter (ahem… Hello, KiraKira), and I’ve been dying to recreate a classic lipstick with a twist. Holidays are slowly creepin’ up, and IMO the best way to rise to the occasion is with glitter EVERYWHERE! Our new Metallic Power Bullet Lipstick is exactly that. The most comfortable, smooth formula, drenched in glitter, and waiting to be worn for life’s boldest moments! I’m so happy I can finally show you guys our amazing new sparkly formula, the limited edition Huda Beauty Metallic Power Bullet Collection, which comes in three metallic shades to add decadence to all your most important moments.You guys have probably noticed I’m just a little bit obsessed with glitter (ahem… Hello, KiraKira), and I’ve been dying to recreate a classic lipstick with a twist. Holidays are slowly creepin’ up, and IMO the best way to rise to the occasion is with glitter EVERYWHERE! Our new Metallic Power Bullet Lipstick is exactly that. The most comfortable, smooth formula, drenched in glitter, and waiting to be worn for life’s boldest moments! I’m so happy I can finally show you guys our amazing new sparkly formula, the limited edition Huda Beauty Metallic Power Bullet Collection, which comes in three metallic shades to add decadence to all your most important moments.', '2018-12-19_flowers-400.jpg', 'celeb-mua-sam-fine-reveals-how-to-get-flawless-makeup', 4, '2018-12-19 16:19:29', '2018-12-19 16:55:43'),
(4, 1, 2, 'Visiting Theme Parks Improves Your Health.', 'Nothing says celebration like shimmers, and we really wanted to give the effect of loose glitter without all the mess and grit. So we created a revolutionary new formula that combines stunning multi-reflective glitter, rich pearl pigments, and iridescent shimmers, all packed into a diamond-shaped bullet to make shaping your lips extra easy. The result is a super smooth satin effect, with the ultimate party-essential; a glitter finish.', '2018-12-19_sydney-800.jpg', 'visiting-theme-parks-improves-your-health', 3, '2018-12-19 16:20:10', '2018-12-19 16:24:13'),
(5, 1, 3, 'The Power of Photography to Reduce Stress.', 'Nothing says celebration like shimmers, and we really wanted to give the effect of loose glitter without all the mess and grit. So we created a revolutionary new formula that combines stunning multi-reflective glitter, rich pearl pigments, and iridescent shimmers, all packed into a diamond-shaped bullet to make shaping your lips extra easy. The result is a super smooth satin effect, with the ultimate party-essential; a glitter finish.Nothing says celebration like shimmers, and we really wanted to give the effect of loose glitter without all the mess and grit. So we created a revolutionary new formula that combines stunning multi-reflective glitter, rich pearl pigments, and iridescent shimmers, all packed into a diamond-shaped bullet to make shaping your lips extra easy. The result is a super smooth satin effect, with the ultimate party-essential; a glitter finish.', '2018-12-19_shutterbug-400.jpg', 'the-power-of-photography-to-reduce-stress', 0, '2018-12-19 16:21:08', '2018-12-19 16:21:08'),
(6, 1, 4, 'What’s Your KAYALI Scent? See What Your Fragrance Says About You!', 'To celebrate the launch of our new fragrance KAYALI, and to help you decide which fragrance is perfect for you, we just had to do an old-school personality quiz – who doesn’t love a throwback quiz?\r\n\r\nIn case you haven’t heard, we just launched KAYALI, which means ‘my imagination’ in Arabic. The collection features four luxurious fragrances that you can layer to create your own signature scent. The art of layering fragrances is a Middle Eastern tradition that goes back centuries, and it helps you create a rich and luxurious scent that is truly unique. It also allows you to switch up your scent according to your mood, so whether you’re feeling a little sultry for the evening or you want something light and fresh for daytime, you can layer them to find the perfect blend. Take our quiz to find your KAYALI mood:', '2018-12-19_fuji-800.jpg', 'whats-your-kayali-scent-see-what-your-fragrance-says-about-you', 1, '2018-12-19 16:21:46', '2018-12-19 18:36:56'),
(7, 1, 4, 'This New Beauty Oil Is The Answer To All Your Skin Problems', 'The skincare community has sung the praises of coconut oil for years now, but there’s a new beauty oil hitting bathroom shelfies and it’s gaining serious momentum. We’re talking about French plum oil, a highly nourishing ingredient that’s derived from the seeds, or kernels, of that familiar purple fruit.\r\n\r\nWe’re not saying you should forget about tried and true favorites — such as beloved coconut, argan, rosehip, or jojoba — but we are saying you might want to consider adding plum oil to your current skincare regimen.\r\n\r\nWhat Makes Plum Oil So Special\r\nOK… so what’s the big fuss about plum when there’s already a diverse lineup of oils out there? To begin, plum oil is a rich source of antioxidants, polyphenols, and fatty acids — basically a skincare trifecta. It deeply hydrates and softens, protects skin from free radical damage, and helps repair existing damage. Consistent usage results in skin that’s healthier and a complexion that’s more even and vibrant.\r\n\r\nIf that didn’t sell you, know that plum oil is considered eight times more powerful than argan oil and six times more powerful than marula oil. Another wonderful quality is that it’s exceptionally lightweight. It sinks into the skin quickly instead of leaving a heavy, oily residue.\r\n\r\nSkin Types Plum Oil’s Best Suited For\r\nPlum oil is approved and recommended for all skin types. People with sensitive skin (including those with psoriasis and eczema) will appreciate how gentle it is, those worried about signs of aging will enjoy its reparative, firming, and brightening abilities, and those with dry skin will love how moisturizing it is.\r\n\r\n5 Ways to Use Plum Oil\r\nApply Straight to Skin — Plum oil can be applied directly to your skin after cleansing and toning. A little bit will go a long way, too.\r\nAdd to Your Moisturizer — Add a few drops of plum oil to your favorite moisturizer for an added boost of antioxidants and hydration.\r\nMix into Foundation — For a glowy finish, add one or two drops of plum oil to your foundation. Alternatively, place the drops on your Beautyblender before blending.\r\nHydrate Your Cuticles — A small amount of plum oil makes for healthier cuticles and nail beds.\r\nSoften Your Lips — After exfoliating, press plum oil into your lips and let it absorb. Your lips will be ridiculously soft.', '2018-12-19_jump-400.jpg', 'this-new-beauty-oil-is-the-answer-to-all-your-skin-problems', 2, '2018-12-19 16:22:22', '2018-12-19 16:57:17'),
(10, 1, 4, 'This Pre-Makeup Ritual Is The Key To A Flawless Af Face', 'Even if you’ve heard this advice before, it warrants repeating every once in a while: what you do to your skin before applying an ounce of makeup is super-duper important. In fact, it can make the difference between a flawless, radiant face and one that’s not quite as glowing as it could be. Beyond that, prepping your skin means your makeup will apply more easily and it’ll even help it stay put for longer.\r\n\r\nCleaning, toning, and moisturizing are all key, but a step that often gets forgotten is exfoliating. We’re not talking about physical exfoliators (the kind with salt or sugar bits) or more aggressive night-time exfoliants that you use once a week. Rather, we’re talking about gentle, pre-makeup exfoliators that you swipe on before your moisturizer to nix dead cells, dry bits, and to help minimize pores.\r\n\r\nCompleting this step means you’ll have a great foundation for, well, your foundation! Below we’ve rounded up some awesome options for you in every price point.', '2018-12-19_music-400.jpg', 'this-pre-makeup-ritual-is-the-key-to-a-flawless-af-face', 1, '2018-12-19 19:41:07', '2018-12-19 19:41:19'),
(11, 1, 2, 'Life is beuaty', 'hasjkdasdjalk', '2018-12-20_jump-400.jpg', 'life-is-beuaty', 2, '2018-12-20 01:35:13', '2018-12-20 01:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `inSlide` tinyint(1) NOT NULL DEFAULT '1',
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `inSlide`, `link`, `created_at`, `updated_at`) VALUES
(1, 'The Pomodoro Technique Really Works.', '2018-12-19_wheel-2000.jpg', 1, 'https://www.facebook.com/', '2018-12-19 16:15:37', '2018-12-19 16:15:37'),
(2, 'Drugstore Product of the Week!', '2018-12-19_featured-watch.jpg', 1, 'https://www.google.com/', '2018-12-19 16:17:19', '2018-12-19 16:17:19'),
(3, 'Product Reveal: Our New Metallic Power Bullet Collection', '2018-12-19_standard-2000.jpg', 1, 'http://hudabeauty.com/2018/11/25/product-reveal-new-metallic-power-bullet-collection/', '2018-12-19 16:18:19', '2018-12-19 16:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(3, 'senemgenberova@gmail.com', '2018-12-19 19:09:03', '2018-12-19 19:09:03'),
(5, 'ferid@g.com', '2018-12-19 19:23:23', '2018-12-19 19:23:23'),
(6, 'nigar@g.com', '2018-12-19 21:37:28', '2018-12-19 21:37:28'),
(7, 'yusif@g.com', '2018-12-20 01:24:21', '2018-12-20 01:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `isAdmin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Senem', 'senem@g.com', 1, NULL, '$2y$10$e3LnsLM3taqPplHwtk.pZOsHXTeLJMdbqzZQCz6qkK5s2OqLzgBLq', NULL, '2018-12-19 19:44:31', '2018-12-19 19:44:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
