-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2023 pada 08.34
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_tekweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'amanda', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `alamat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`alamat_id`, `user_id`, `nama`, `nomor`, `email`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `rt`, `rw`, `kode_pos`, `alamat`) VALUES
(21, 7, 'okok', '09875654', 'ok@gmail.com', 'ppp', 'ppp', 'ppp', 'ppp', 22, 2, 22222, 'Jl.ppp'),
(22, 7, 'aaw', '08633333', 'ok@gmail.com', 'Jawa Timur', 'Surabaya', 'Sawahan', 'Sawahan', 12, 12, 60121, 'Jl. ap no 12'),
(23, 5, 'AAA', '096738327', 'c14220277@john.petra.ac.id', 'Jawa Timur', 'Surabaya', 'Sawahan', 'Sawahan', 12, 12, 60121, 'Jl. oo No. 13'),
(24, 9, 'amanda', '09875654', 'amanda123@gmail.com', 'Jawa Timur', 'Surabaya', 'Sawahan', 'Sawahan', 11, 11, 60444, 'Jl. oo No. 13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `nomor_kartu` bigint(16) NOT NULL,
  `tanggal_kadaluarsa` varchar(5) NOT NULL,
  `cvv` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kode_pos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`bank_id`, `nomor_kartu`, `tanggal_kadaluarsa`, `cvv`, `nama`, `alamat`, `kode_pos`) VALUES
(1, 1111222233334444, '09/25', 123, 'ok', 'wowow', 60333),
(2, 7777777777777777, '08/24', 333, 'amanda', 'Jl. A no. 1', 60777);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` float NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `album` varchar(50) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `nama_barang`, `harga_barang`, `stok_barang`, `deskripsi`, `album`, `jenis_barang`, `foto`) VALUES
(2, 'revelación vinyl', 30, 19, 'Track List\r\n1. De Una Vez\r\n2. Buscando Amor\r\n3. Baila Conmigo\r\n4. Dámelo To‛ (feat. Myke Towers)\r\n5. Vicio\r\n6. Adiós\r\n7. Selfish Love (with DJ Snake)\r\n\r\nLimited to 4 per customer', 'revelación', 'vinyl', 'SG_REV_LP.png'),
(3, 'revelación box set', 52, 20, 'Includes:\r\n\r\nCD EP in a Mini Jacket\r\nPoster\r\n20 Page Mini Book: Photos, Credits, Lyrics\r\n4 Litho Prints\r\n\r\nTrack List\r\n1. De Una Vez\r\n2. Buscando Amor\r\n3. Baila Conmigo\r\n4. Dámelo To‛ (feat. Myke Towers)\r\n5. Vicio\r\n6. Adiós\r\n7. Selfish Love (with DJ Snake)\r\n\r\nLimited to 4 per customer', 'revelación', 'cd', 'SG_box.png'),
(4, 'las flores hoodie', 70, 3, 'Lightweight unisex hoodie featuring “Selena Gomez” printed on front and floral designs printed on sleeves.\r\n\r\n55% cotton, 45% polyester.', 'revelación', 'sweatshirts', 'SG_unavez_floral02HOODIE_1028x.png'),
(5, 'cameo tee', 30, 20, 'White tee shirt featuring photo of Selena Gomez.\r\n\r\n100% cotton.', 'revelación', 'tees', 'SG_albumss.png'),
(6, 'sacred heart pullover', 60, 10, 'Rose pullover featuring sacred heart graphic printed on front.\r\n\r\n55% cotton, 45% polyester.', 'revelación', 'sweatshirts', 'SELENA_Product_1000x1000-01_4_Crewneck-02_1028x.png'),
(7, 'selena gomez bucket hat', 35, 20, 'White bucket hat with printed floral image and “Selena Gomez” embroidered on front.\r\n\r\n100% cotton.', 'revelación', 'accessories', 'SGGSNEW_1028x_1.png'),
(8, 'adios t-shirt', 30, 18, 'White t-shirt with floral image and “Adios” printed on front, \"Selena Gomez\" printed on back upper neck.\r\n\r\n100% cotton.', 'revelación', 'tees', 'SGS2-REV-F.png'),
(9, 'dance with me pin set', 25, 0, 'Set of three enamel pins.\r\n1” wide each.', 'revelación', 'accessories', 'revpinset_1028x.png'),
(10, 'floral lyric t-shirt', 30, 20, 'Red t-shirt with floral image printed on front, ”No están buscando amor” printed on back.\r\n\r\n100% cotton.', 'revelación', 'tees', 'SGS1-F.png'),
(11, 'baila conmigo tank top', 35, 20, 'Black ribbed tank top with “Baila Conmigo” printed on front, “Selena Gomez” printed on back.\r\n\r\n100% cotton.', 'revelación', 'tees', 'SGS1.png'),
(12, 'baila conmigo tie dye crop top', 40, 10, 'Cropped tie-dye t-shirt with “Selena Gomez” printed on left chest, “Baila Conmigo” printed on back.\r\n\r\nPlease note: Due to the custom dye process, each unit will be slightly different in coloration\r\n\r\n100% cotton. ', 'revelación', 'tees', 'SGC1-F_e8b7a41c-1caf-4a2d-b4d0-1c6c193d3844.png'),
(13, 'revelación - digital album', 7, 100, 'Track List\r\n1. De Una Vez\r\n2. Buscando Amor\r\n3. Baila Conmigo\r\n4. Dámelo To‛ (feat. Myke Towers)\r\n5. Vicio\r\n6. Adiós\r\n7. Selfish Love (with DJ Snake)\r\n\r\nDigital download will be delivered via email upon purchase.\r\n\r\nDigital downloads are only available to U.S. Customers.\r\n\r\nDigital downloads are delivered as mp3 44.1khz/24-bit audio files.\r\n\r\nLimited to 4 per customer', 'revelación', 'all music', 'REV_digi_fcfe5e0a-7689-451f-a833-7a178e87dc50_1028x.png'),
(14, 'adios dad hat', 25, 0, 'Black dad cap with “Adios” embroidered in red on front and adjustable back closure.', 'revelación', 'accessories', 'Adios_Hat_940x.png'),
(15, 'de una vez - digital single', 1.29, 99, '\r\nDigital download will be delivered via email upon purchase.\r\n\r\nDigital downloads are only available to U.S. Customers.\r\n\r\nDigital downloads are delivered as mp3 44.1khz/24-bit audio files.\r\n\r\n10% of the net proceeds generated from the purchase of this product will be donated* to Rare Impact Fund.\r\n\r\n*Purchases are not tax deductible as a charitable contribution by consumer/purchaser. Charity participation does not imply endorsement, approval or recommendation by Universal Music Group or its af', 'revelación', 'all music', 'DeUnaVez_Digital_940x.png'),
(16, 'revelación crewneck', 70, 0, 'Mid weight, ultra soft, beige crew neck sweatshirt featuring Revelación graphic printed on front.\r\n\r\n80% cotton, 20% polyester.', 'revelación', 'sweatshirts', 'Rev_Crew_940x.png'),
(17, 'revelación oranges cropped t-shirt', 35, 0, 'Ivory cropped t-shirt with photo image of oranges printed on front.', 'revelación', 'tees', 'Rev_Crop_940x.png'),
(18, 'revelación black window hoodie', 65, 0, 'Heavy weight black hoodie with “Selena Gomez” printed on front shoulders and photo of Selena Gomez with “Revelacion” printed on back.\r\n\r\n70% cotton/30% Polyester.', 'revelación', 'sweatshirts', 'Rev_Hood_Front_940x.png'),
(19, 'revelación heart keychain', 15, 0, 'Red sacred heart 2\" pendant with gold plated keychain. ', 'revelación', 'accessories', 'Rev_Keychain_940x.png'),
(20, 'revelación lithograph', 20, 0, '18\" x 24\" printed lithograph featuring photo of Selena Gomez.', 'revelación', 'merch', 'Rev_Litho_940x.png'),
(21, 'revelación shadowbox t-shirt', 30, 0, 'Black t-shirt featuring center printed image of Selena with “Revelacion.”\r\n\r\n100% combed ring spun cotton.', 'revelación', 'tees', 'Rev_Outline_Tee_940x.png'),
(22, 'revelación halo t-shirt', 30, 0, 'Soft pink t-shirt with image of Selena Gomez printed in center.\r\n\r\n100% combed ring spun cotton', 'revelación', 'tees', 'Rev_Pink_Tee_940x.png'),
(23, 'revelación sweatpants', 65, 0, 'Mid weight, ultra soft, beige sweatpants featuring Revelación graphic printed down left leg. Sweatpants have elastic waistband, flat draw chord and jersey lined pockets.\r\n\r\n80% cotton, 20% polyester.', 'revelación', 'sweats', 'Rev_Sweats1_940x.png'),
(24, 'revelación tie dye cropped crewneck', 90, 0, 'Red and soft pink tie dyed cropped crewneck with “de una vez por todas” embroidered on left collar.\r\n\r\nPlease note: Due to the custom dye process, each unit will be slightly different in coloration', 'revelación', 'sweatshirts', 'SG_RevCropCrew_940x.png'),
(25, 'revelación cassette', 18, 0, 'Track List\n1. De Una Vez\n2. Buscando Amor\n3. Baila Conmigo\n4. Dámelo To‛ (feat. Myke Towers)\n5. Vicio\n6. Adiós\n7. Selfish Love (with DJ Snake)\n\nLimited to 4 per customer\n\n \n\n10% of the net proceeds generated from the purchase of this product will be donated* to Rare Impact Fund.\n\n*Purchases are not tax deductible as a charitable contribution by consumer/purchaser. Charity participation does not imply endorsement, approval or recommendation by Universal Music Group or its affiliate', 'revelación', 'cassette', 'SG_REV-CT.png'),
(26, 'las flores tee', 30, 0, 'Mint green unisex tee featuring floral design printed on front.\r\n\r\n100% ringspun cotton.', 'revelación', 'tees', 'SG_unavez_floral.png'),
(27, 'revival deluxe cd + journal', 60, 9, 'Includes:\r\nRevival Deluxe CD\r\n120-page 6\" x 7\" Journal\r\n\r\nTracklist\r\n1. Revival\r\n2. Kill Em With Kindness\r\n3. Hands To Myself\r\n4. Same Old Love\r\n5. Sober\r\n6. Good For You (feat. A$AP Rocky)\r\n7. Camouflage\r\n8. Me & The Rhythm\r\n9. Survivors\r\n10. Body Heat\r\n11. Rise\r\n12. Me & My Girls\r\n13. Nobody\r\n14. Perfect\r\n15. Outta My Hands (Loco)\r\n16. Cologne', 'revival', 'cd', 'CD_Journal_1028x.png'),
(28, 'revival deluxe cd + poster', 20, 10, 'Includes:\r\n\r\nRevival Deluxe CD\r\n9.75\" x 16.625\" Poster (folded within)\r\n\r\nTracklist\r\n1. Revival\r\n2. Kill Em With Kindness\r\n3. Hands To Myself\r\n4. Same Old Love\r\n5. Sober\r\n6. Good For You (feat. A$AP Rocky)\r\n7. Camouflage\r\n8. Me & The Rhythm\r\n9. Survivors\r\n10. Body Heat\r\n11. Rise\r\n12. Me & My Girls\r\n13. Nobody\r\n14. Perfect\r\n15. Outta My Hands (Loco)\r\n16. Cologne', 'revival', 'cd', 'CDPoster_1028x.png'),
(29, 'i mean i could choker', 15, 20, 'Black choker necklaces featuring “I mean I could but why would I want to” stitched and adjustable chain closure.', 'revival', 'accessories', 'Choker_1028x.png'),
(30, 'cloudy tie dye photo t-shirt', 30, 0, 'Unisex tie dye tee featuring photo of Selena Gomez on front.\r\nPlease note: Due to the custom dye process, each unit will be slightly different in coloration\r\n\r\n100% cotton.', 'revival', 'tees', 'CloudyDyeTee_1028x.png'),
(31, 'revival anniversary deluxe box set', 50, 20, 'Includes:\r\n\r\nRevival Deluxe CD\r\nRare Deluxe CD\r\n9.75\" x 16.625\" Poster (folded within)\r\n\r\n\r\nTracklists\r\nRevival Deluxe CD\r\n1. Revival\r\n2. Kill Em With Kindness\r\n3. Hands To Myself\r\n4. Same Old Love\r\n5. Sober\r\n6. Good For You (feat. A$AP Rocky)\r\n7. Camouflage\r\n8. Me & The Rhythm\r\n9. Survivors\r\n10. Body Heat\r\n11. Rise\r\n12. Me & My Girls\r\n13. Nobody\r\n14. Perfect\r\n15. Outta My Hands (Loco)\r\n16. Cologne', 'revival', 'cd', 'DeluxeBox_1028x.png'),
(32, 'vintage washed gomez hoodie', 70, 5, 'Unisex washed pullover hoodie featuring “GOMEZ” printed on front. \r\n\r\nPlease note: Due to the custom dye process, each unit will be slightly different in coloration\r\n\r\n100% cotton.', 'revival', 'sweatshirts', 'GomezDyeHood_1028x.png'),
(33, 'tie dye kill em with kindness t-shirt', 30, 5, 'Unisex tie dye tee featuring “Kill Em With Kindness” design on front.\r\n\r\nPlease note: Due to the custom dye process, each unit will be slightly different in coloration\r\n\r\n100% cotton.', 'revival', 'tees', 'KindnessDyeTee_1028x.png'),
(34, 'kill em with kindness popsocket™', 15, 0, 'Phone stand by PopSocket™ featuring “Kill Em With Kindness” graphic.', 'revival', 'accessories', 'KindnessPopS_1028x.png'),
(35, 'tie dye gloves photo hoodie', 70, 0, 'Unisex washed pullover hoodie featuring photo of Selena Gomez with “Revival” and “Kill Em With Kindness” graphics.\r\n\r\nPlease note: Due to the custom dye process, each unit will be slightly different in coloration\r\n\r\n100% cotton.', 'revival', 'sweatshirts', 'RevivalDyeHood_1028x.png'),
(36, 'revival pin set', 10, 20, 'Three piece button set each featuring a photo of Selena Gomez.\r\n\r\nEach pin is 1.5” wide.', 'revival', 'accessories', 'RevivalPins_1028x.png'),
(37, 'revival photo t-shirt', 30, 0, 'Unisex charcoal tee featuring photo of Selena Gomez on front and “Revival” printed on back. \r\n\r\n100% cotton.', 'revival', 'tees', 'RevivalTee.png'),
(38, 'perfume bottle crewneck', 60, 0, 'Warm black crewneck sweatshirt, featuring a glowing perfume bottle on the front, and “Boyfriend by Selena Gomez” in script on the back.', 'rare', 'sweatshirts', 'BFCrew.png'),
(39, 'rare cd', 13.48, 20, 'Tracklist:\r\n1. Rare\r\n2. Dance Again\r\n3. Look At Her Now\r\n4. Lose You To Love Me\r\n5. Ring\r\n6. Vulnerable\r\n7. People You Know\r\n8. Let Me Get Me\r\n9. Crowded Room (feat. 6LACK)\r\n10. Kinda Crazy\r\n11. Fun\r\n12. Cut You Off\r\n13. A Sweeter Place (feat. Kid Cudi)', 'rare', 'cd', 'CD.png'),
(40, 'vulnerable purple crop top', 34, 0, 'Lavender crop top featuring Vulnerable on the left chest.\r\n\r\n\r\n100% preshrunk cotton\r\nSeamless rib at neck\r\nTaped shoulder-to-shoulder\r\nDouble-needle stitching throughout\r\n7/8\" collar\r\nClassic fit \r\n \r\n\r\n10% of the net proceeds generated from the purchase of this product will be donated* to Rare Impact Fund.\r\n\r\n*Purchases are not tax deductible as a charitable contribution by consumer/purchaser. Charity participation does not imply endorsement, approval or recommendation by Universal Music Group or its affiliates. Promotion is not directed to residents of Alabama, Hawaii, Massachusetts, Mississippi, South Carolina, or anywhere restricted by law.', 'rare', 'tees', 'Cropped_T_940x.png'),
(41, 'dance again red t-shirt', 30, 0, 'Soft red t-shirt, featuring a black and red image of Selena, and the title of her single, “Dance Again,” printed on the front. \r\n\r\n100% combed ring-spun cotton\r\nset-in collar\r\nhemmed sleeves', 'rare', 'tees', 'DanceAgainRed_1028x.png'),
(42, 'rare (deluxe) digital album', 11.99, 100, 'Tracklist:\r\n\r\n1. Boyfriend\r\n2. Lose You to Love Me\r\n3. Rare\r\n4. Souvenir\r\n5. Look At Her Now\r\n6. She\r\n7. Crowded Room (feat. 6lack)\r\n8. Vulnerable\r\n9. Dance Again\r\n10. Ring\r\n11. A Sweeter Place (feat. Kid Cudi)\r\n12. People You Know\r\n13. Cut You Off\r\n14. Let Me Get Me\r\n15. Kinda Crazy\r\n16. Fun\r\n17. Feel Me\r\nDigital download will be delivered via email upon purchase.\r\n\r\nDigital downloads are only available to U.S. Customers.\r\n\r\nDigital downloads are delivered as mp3 44.1khz/24-bit audio files.', 'rare', 'all music', 'DeluxeDigi_1028x.png'),
(43, 'rare deluxe cd', 14, 20, 'Tracklist\n1. Rare\n2. Dance Again\n3. Look At Her Now\n4. Lose You To Love Me\n5. Ring\n6. Vulnerable\n7. People You Know\n8. Let Me Get Me\n9. Crowded Room (feat. 6LACK)\n10. Kinda Crazy\n11. Fun\n12. Cut You Off\n13. A Sweeter Place (feat. Kid Cudi)\n\nBONUS TRACKS\n14. Bad Liar\n15. Fetish (feat. Gucci Mane)\n16. It Ain‛t Me (with Kygo)\n17. Back To You\n18. Wolves (with Marshmello)\n\nLimited to 4 per customer', 'rare', 'cd', 'DeluxeRareCD_940x.png'),
(44, 'perfume bottle black long sleeve', 50, 0, 'Black long sleeve, featuring “I Want a Boyfriend” on the front. The back of this shirt features “Selena Gomez Boyfriend,” and hands holding a glowing perfume bottle.', 'rare', 'longsleeves', 'LS1.png'),
(45, 'rare cassette', 14.98, 20, 'Tracklist\r\n1. Rare\r\n2. Dance Again\r\n3. Look At Her Now\r\n4. Lose You To Love Me\r\n5. Ring\r\n6. Vulnerable\r\n7. People You Know\r\n8. Let Me Get Me\r\n9. Crowded Room (feat. 6LACK)\r\n10. Kinda Crazy\r\n11. Fun\r\n12. Cut You Off\r\n13. A Sweeter Place (feat. Kid Cudi)', 'rare', 'cassette', 'RAREcassette.png'),
(46, 'rare digital album', 10, 99, 'Tracklist\r\n1. Rare\r\n2. Dance Again\r\n3. Look At Her Now\r\n4. Lose You To Love Me\r\n5. Ring\r\n6. Vulnerable\r\n7. People You Know\r\n8. Let Me Get Me\r\n9. Crowded Room (feat. 6LACK)\r\n10. Kinda Crazy\r\n11. Fun\r\n12. Cut You Off\r\n13. A Sweeter Place (feat. Kid Cudi)\r\n\r\nDigital download will be delivered via email upon purchase.\r\n\r\nDigital downloads are only available to U.S. Customers.\r\n\r\nDigital downloads are delivered as mp3 44.1khz/24-bit audio files.\r\n\r\n ', 'rare', 'all music', 'RAREdigi_1028x.png'),
(47, 'rare exclusive vinyl', 21.48, 0, 'Tracklist:\r\n1. Rare\r\n2. Dance Again\r\n3. Look At Her Now\r\n4. Lose You To Love Me\r\n5. Ring\r\n6. Vulnerable\r\n7. People You Know\r\n8. Let Me Get Me\r\n9. Crowded Room (feat. 6LACK)\r\n10. Kinda Crazy\r\n11. Fun\r\n12. Cut You Off\r\n13. A Sweeter Place (feat. Kid Cudi)', 'rare', 'vinyl', 'RareLP3D1_1_1028x.png'),
(48, '12\" double single vinyl', 19.92, 20, 'Side A: Lose You To Love Me\r\n\r\nSide B: Look At Her Now', 'rare', 'vinyl', 'SG_vinylmain.png'),
(49, 'rare lithograph', 15, 20, 'Exclusive lithograph taken from the music video for “RARE”\r\n12\" x 12\"\r\nMade with 10% recycled post-consumer waste\r\n ', 'rare', 'merch', 'SGlitho.png'),
(50, 'rare (deluxe) 2lp picture disc', 39.5, 0, 'Tracklist:\r\n\r\nSide A\r\n1. Boyfriend\r\n2. Lose You to Love Me\r\n3. Rare\r\n4. Souvenir\r\nSide B\r\n5. Look At Her Now\r\n6. She\r\n7. Crowded Room (feat. 6lack)\r\n8. Vulnerable\r\n9. Dance Again\r\nSide C\r\n10. Ring\r\n11. A Sweeter Place (feat. Kid Cudi)\r\n12. People You Know\r\n13. Cut You Off\r\nSide D\r\n14. Let Me Get Me\r\n15. Kinda Crazy\r\n16. Fun\r\n17. Feel Me', 'rare', 'vinyl', 'SGPictureDiscB.png'),
(51, 'lose you to love me tie dye sweatpants', 70, 5, 'Unisex white sweat pants tie dyed with pink, blue and green. Sweats feature “SG” repeating logo on front left leg. Matching hoodie available.\r\n\r\n8 oz. 50% cotton, 50% polyester\r\n\r\nPlease Note: Due to the custom dye process, each unit will be slightly different in coloration', 'rare', 'sweats', 'SGsweats.png'),
(52, 'rare vinyl', 21.48, 20, 'Tracklist:\r\n1. Rare\r\n2. Dance Again\r\n3. Look At Her Now\r\n4. Lose You To Love Me\r\n5. Ring\r\n6. Vulnerable\r\n7. People You Know\r\n8. Let Me Get Me\r\n9. Crowded Room (feat. 6LACK)\r\n10. Kinda Crazy\r\n11. Fun\r\n12. Cut You Off\r\n13. A Sweeter Place (feat. Kid Cudi)', 'rare', 'vinyl', 'Slp.png'),
(53, 'look at her now socks', 24, 20, 'Hot pink crew socks featuring Look at Her Now printed on the sides.', 'rare', 'accessories', 'Socks.png'),
(54, 'the end burgundy crewneck', 60, 0, 'Warm burgundy crewneck featuring a combination of the words “Boyfriend,” and “The End” on the chest.\r\n\r\n', 'rare', 'sweatshirts', 'TheEndCrew.png'),
(55, 'look at her now tote', 20, 0, 'Cotton canvas tote screen printed with “Lose You To Love Me” single art work.\r\n\r\n20x15x5”\r\n22” handles\r\n12 oz. 100% cotton canvas', 'rare', 'accessories', 'tote_13.png'),
(56, 'lose you to love me tie dye long sleeve', 55, 0, 'Unisex long sleeve tee tie dyed bright green. Front is screen printed with “Lose You To Love Me” single cover art work with “Selena Gomez” and song title overlay.\r\n\r\n100% cotton\r\n\r\nPlease Note: Due to the custom dye process, each unit will be slightly different in coloration', 'rare', 'longsleeves', 'tyedyegreenls.png'),
(57, 'vulnerable dad hat', 34, 0, '“Dad” hat with an adjustable back closure, featuring Vulnerable embroidered in white on the front and Selena Gomez embroidered in white on the back.\r\n\r\n', 'rare', 'accessories', 'Vulnerable1_940x.png'),
(58, 'look at her now yellow long sleeve', 55, 15, 'Oversized yellow long sleeve tee featuring screen printed graphics on front and back\r\n\r\n100% cotton.', 'rare', 'longsleeves', 'yellowfront.png'),
(62, 'stiker selena', 10, 2, '-', 'revelación', 'cd', 'sticker.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `barang_id`, `kuantitas`) VALUES
(84, 5, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_bill`
--

CREATE TABLE `item_bill` (
  `item_bill_id` int(15) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `alamat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `done` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `item_bill`
--

INSERT INTO `item_bill` (`item_bill_id`, `barang_id`, `jumlah`, `subtotal`, `user_id`, `alamat_id`, `date`, `done`) VALUES
(13, 51, 1, 70, 3, 13, '2023-11-07 06:02:09', 1),
(18, 2, 1, 20, 7, 20, '2023-12-14 15:45:20', 1),
(19, 27, 1, 60, 7, 22, '2023-12-14 16:15:59', 1),
(20, 46, 1, 10, 5, 23, '2023-12-14 16:11:20', 1),
(21, 15, 2, 2.58, 5, 23, '2023-12-14 16:25:45', 0),
(22, 8, 1, 30, 7, 21, '2023-12-15 04:42:02', 0),
(23, 8, 1, 30, 9, 24, '2023-12-15 07:25:38', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `response`
--

CREATE TABLE `response` (
  `response_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `response`
--

INSERT INTO `response` (`response_id`, `review_id`, `response`) VALUES
(6, 8, 'thankyouu'),
(7, 9, 'Terima kasih telah berbelanja!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `star` int(1) NOT NULL,
  `deskripsi` varchar(350) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `anonymous` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`review_id`, `barang_id`, `user_id`, `star`, `deskripsi`, `date`, `anonymous`) VALUES
(1, 45, 4, 5, 'I love it… and the delivery was seamless.', '2023-12-02 13:14:14', 'N'),
(2, 27, 5, 4, 'It came on time.\nThe cd is good I love the album.\nThe case came a little dirty though.\nThe cd had some fingerprints on it but its playable.', '2023-12-03 13:35:50', 'Y'),
(7, 13, 6, 3, 'The case was broken and plastic as well', '2023-12-12 08:07:44', 'Y'),
(8, 58, 7, 4, 'Overall good but the sleeve is dirty. Love the color.\r\n', '2023-12-16 08:08:05', 'N'),
(9, 46, 5, 5, 'Pengiriman cepat, seller responsive. lof bngt deh!', '2023-12-14 16:11:13', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(5, 'Amanda', 'Prasetio', 'c14220277@john.petra.ac.id', '123456789'),
(6, 'Nichelle', 'Angeline', 'nichelleangeline@gmail.com', '987654321'),
(7, 'ookkk', 'oo kkkk', 'ok@gmail.com', 'okokokok'),
(8, 'budi', 'do re mi', 'budidoremi@gmail.com', 'doremifasol'),
(9, 'Amanda', 'Prasetio', 'amanda123@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `barang_id`) VALUES
(16, 1, 12),
(17, 4, 11),
(19, 9, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`alamat_id`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_userID` (`user_id`);

--
-- Indeks untuk tabel `item_bill`
--
ALTER TABLE `item_bill`
  ADD PRIMARY KEY (`item_bill_id`);

--
-- Indeks untuk tabel `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`response_id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `alamat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `item_bill`
--
ALTER TABLE `item_bill`
  MODIFY `item_bill_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `response`
--
ALTER TABLE `response`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
